<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* This file contains two classes:
* - CDatabase	: UI part of the database restoration page
* - CDBFunc	: Non-UI part of the database restoration workflow
*
* This is completely rewritten to accomodate for multiple database backups
* (at the time of this writting this is a feature planned for JoomlaPack 1.2.x).
* It is also designed to handle big database backups gracefuly.
*
* For bugs regarding this part of JoomlaPack, contact Nicholas K. Dionysopoulos
* (JoomlaPack Support Forum user: nicholas, email: nikosdion@gmail.com)
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

// Default chunk size to process; this is DELIBERATELY very small to minimize failure possibility
define("JPI_CHUNK_LENGTH", 65536);

// Include Joomla! database class
if( defined('_JEXEC') )
{
	jimport( 'joomla.error.exception' ); // Fixed 1.1.1 - JError is required for database error handling
	jimport( 'joomla.error.error' );
	jimport( 'joomla.database.database' );
	jimport( 'joomla.database.database.mysql' );
	
	function getDB( $host='localhost', $user, $pass, $db='', $table_prefix='', $offline = true )
	{
		$options = array (
				'driver' => 'mysql', 'host' => $host, 'user' => $user,
				'password' => $pass, 'database' => $db, 'prefix' => $table_prefix );
		return JDatabase::getInstance( $options );
	}
} else {
	require_once( JPIDIR . '/../includes/database.php' );

	function getDB( $host='localhost', $user, $pass, $db='', $table_prefix='', $offline = true )
	{
		return new database( $host, $user, $pass, $db, $table_prefix, $offline );
	}
}


class CDatabase
{
	function getFullHTML()
	{
		return getPageHTML( $this->getStepBarHTML(), $this->getMainHTML() );
	}
	
	function getBodyHTML()
	{
		return getBodyHTML( $this->getStepBarHTML(), $this->getMainHTML() );
	}
	
	function getStepBarHTML()
	{
		return getStepBar('db');
	}

	function getMainHTML()
	{
		global $lang;

		$mainHTML = "";
		$mainHTML .= getPageHeader( $lang['global']['step3'], $this->_getButtonsHTML() );
		
		$mainHTML .= '<script language="Javascript">db_start();</script>';
		
		$mainHTML .= '<div id="error">&nbsp;</div>';
		$mainHTML .= '<div id="db">&nbsp;</db>';
		
		return $mainHTML;
	}
	
	function _getButtonsHTML()
	{
		global $lang;
		return '<input name="ButtonNext" type="submit" class="button" value="' . $lang['global']['btnNext'] . '" onclick="document.location=\'index.php?task=config\'" />';
	}

	function getRequestHTML()
	{
		global $lang, $JPDBFunc;

		$DBName = $JPDBFunc->databases[ $JPDBFunc->current ]['DBName'];
		$title = sprintf( $lang['db']['dbparam_title'], $DBName);

		$mainHTML = "<h2>" . $title . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['db']['dbparam_desc'], $this->_reqHTML());
		
		$mainHTML .= "<h2>" . $lang['db']['restoreopt_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['db']['restoreopt_desc'], $this->_optHTML());

		return $mainHTML;
	}
	
	function _reqHTML()
	{
		global $JPDBFunc, $lang;
		
		$curDB = $JPDBFunc->databases[ $JPDBFunc->current ];

		$html = "";
		$html .= '<table><tr><td>';
		$html .= $this->_makeText( 'host', $curDB['Host'], $lang['db']['host'] );
		$html .= $this->_makeText( 'dbname', $curDB['DBName'], $lang['db']['dbname'] );
		$html .= $this->_makeText( 'user', $curDB['Username'], $lang['db']['username'] );
		$html .= $this->_makeText( 'pass', $curDB['Password'], $lang['db']['password'], true );
		$html .= $this->_makeText( 'dbprefix', $curDB['Prefix'], $lang['db']['prefix'] );
		$html .= '</td></tr><tr><td align="right">';
		$html .= '<input type="button" name="submit" value="' . $lang['db']['submit'] . '" onclick="do_UpdateParams();" />';
		$html .= '</td></tr></table>';

		return $html;
	}
	
	// Returns a text box
	function _makeText( $key, $value, $label, $ispass = false )
	{		
		return '<label for="' . $key . '">' . $label . '</label><input name="' . $key . '" id="' . $key . '" value="' . $value . '" length="30" type="' . ($ispass ? 'password' : 'text') . '" class="text" />';
	}
	
	function _optHTML()
	{
		global $lang, $JPDBFunc;
		
		$curDB = $JPDBFunc->databases[ $JPDBFunc->current ];
		$html = "";
		$html .= $this->_makeCheckbox( 'drop', $curDB['Drop'], $lang['db']['drop'] );
		$html .= $this->_makeCheckbox( 'backup', $curDB['Backup'], $lang['db']['backup'] );
		$html .= $this->_makeCheckbox( 'skipnonj', $curDB['SkipNonJ'], $lang['db']['skipnonj'] );

		return $html;
	}

	function _makeCheckbox( $key, $value, $label )
	{
		return '<input name="' . $key . '" id="' . $key . '" type="checkbox" '. ( $value ? 'checked' : '' ) . ' class="check" />' . '<label for="' . $key . '" class="check">' . $label . '</label><br />';
	}

}

/**
* The CDBFunc class is meant to be serialized on disk to facilitate restoration, much like JoomlaPack's CUBE
* engine. You should never have to instanciate it yourself; as soon as you include this file the global
* variable $JPDBFunc will be populated with the restored version of this class.
*/
class CDBFunc
{
	var $databases = array();	// Database parameters
	var $dbcount = 0;			// How many database backups are present
	var $current = -1;			// The ID of the currently processed array slot
	var $errorMessage = "";		// Last error message
		
	/**
	* The constructor will search for databases.ini, test validity and if it the files doesn't exist, it will
	* simulate one (compatibility with JoomlaPack 1.1.x)
	*/
	function CDBFunc()
	{
		$this->_loadDBINI();
		$this->save();
	}
	
	/**
	* Save ourself to disk (serialized, of course)
	*/
	function save()
	{
		$serialized = serialize( $this );
		$fp = @fopen( JPIDIR . '/db.dat', 'w' );
		if ($fp === false) die ('The installation directory is unwritable or unable to create db.dat file in it');
		fwrite( $fp , $serialized );
		unset( $serialized );
		fclose( $fp );
	}

	function _loadDBINI()
	{
		if( file_exists( JPIDIR . '/sql/databases.ini' ) )
		{
			// Load the databases.ini
			$tempArray = parse_ini_file( JPIDIR . '/sql/databases.ini', true );
			if( count($tempArray) == 0 ) die("Invalid SQL backup description file");
			
			$this->databases = array();
			
			// Loop all INI entries
			foreach( $tempArray as $dbe )
			{
				// Make sure we have a VALID entry
				if( !(($dbe['dbname'] == "") && ($dbe['sqlfile'] == "")) )
				{
					$newDB = $this->_templateDB();
					$newDB['DBName']	= $dbe['dbname'];
					$newDB['SQLFile']	= $dbe['sqlfile'];
					$newDB['Host']		= $dbe['dbhost'];
					$newDB['Username']	= $dbe['dbuser'];
					$newDB['Password']	= $dbe['dbpass'];
					$newDB['Prefix']	= $dbe['prefix'];
					
					$this->databases[] = $newDB;
				}
			}
			
			$this->dbcount = count( $this->databases );
			if ($this->dbcount == 0) die ('No valid database entries defined in databases.ini.');
		} else {
			global $ConfigManager;
			
			// There is no databases.ini. Does the joomla.sql file exist?
			if (!file_exists( JPIDIR . '/sql/joomla.sql' )) die("No database backup file (joomla.sql) found.");
			
			// Since it exists, let's try reading the parameters off configuration.php
			$this->databases = array();
			
			$newDB = $this->_templateDB();
			$newDB['DBName']	= $ConfigManager->config['db'];
			$newDB['SQLFile']	= 'joomla.sql';
			$newDB['Host']		= $ConfigManager->config['host'];
			$newDB['Username']	= $ConfigManager->config['user'];
			$newDB['Password']	= $ConfigManager->config['password'];
			$newDB['Prefix']	= $ConfigManager->config['dbprefix'];
			
			$this->databases[] = $newDB;
			
			$this->dbcount = count( $this->databases );
		}
	}
	
	function tick()
	{
		/**
		 * The return format is array( "status"=>"(see note 1)", "message"=>"(see note 2)" );
		 *
		 * Note 1: Status can be one of...
		 *         - "continue"	Restoration is underway; instructs client to call tick() again
		 *         - "request"	Client part has to load a form for the user to supply connection parameters
		 *         - "finish"	We are done restoring all databases, instruct the client to show the "Next" button
		 *         - "error"	An error occured, other than connection failure
		 *
		 * Note 2: The message, for each case, contains...
		 *         - name of database, bytes processed, total bytes per file
		 *         - id of the array element for which parameters are required
		 *         - nothing!
		 *         - the error message
		 *
		 * WORKFLOW:
		 * 1. If current is less than 0, increase by 1
		 * 2. If CanConnect is false, send a "request" reply
		 *    [supplied parameters processing and updating CanConnect property is the
		 *     responsibility of UpdateParams method of this class]
		 * 3. If CanConnect is true, try fetching and processing the next chunk of data.
		 * 4. If an error occured, send an "error" reply
		 * 5. If there are more lines left, send a "continue" reply.
		 * 6. If there are no more lines left on this file:
		 *    a. If it was the last file send a "finish" reply
		 *    b. If it's not the last file, increment current and send a "continue" reply.
		 */
		 
		 // If current is less than 0, increase by 1
		 if( $this->current < 0 ) $this->current++;
		 
		 // If CanConnect is false, send a "request" reply
		 $current = $this->current;
		 if( !$this->databases[$current]['CanConnect'] ) {
			$this->save();
			return $this->_makeReturn('request', $current);
		 }
		 
		 // If CanConnect is true, try fetching and processing the next chunk of data.
		 $status = $this->_FetchAndRestore();
		 
		 switch( $status )
		 {
			case "error":
				// If an error occured, send an "error" reply
				$this->save();
				return $this->_makeReturn( "error", $this->errorMessage );
				break;
				
			case "continue":
				// If there are more lines left, send a "continue" reply.
				$maxSize = filesize( JPIDIR . '/sql/' . $this->databases[ $this->current ]['SQLFile'] );
				$message = basename($this->databases[ $this->current ]['SQLFile']) . ': ' . $this->databases[ $this->current ]['Line'] . ' / ' . $maxSize . ' bytes';
				$this->save();
				return $this->_makeReturn( "continue", $message );
				break;
			
			
			case "finish":
				// If there are no more lines left on this file:
				if( $this->current == (count($this->databases) - 1) )
				{
					// If it was the last file send a "finish" reply
					$this->save();
					return $this->_makeReturn( "finish", "" );
				} else {
					// If it's not the last file, increment current and send a "continue" reply.
					$this->current++;
					$maxSize = filesize( $this->databases[ $this->current ]['SQLFile'] );
					$message = basename($this->databases[ $this->current ]['SQLFile']) . ': ' . $maxSize . ' / ' . $maxSize . ' bytes';
					$this->save();
					return $this->_makeReturn( "continue", $message );
				}
				break;
				
			default:
			case "error":
				// If an error occured, send an "error" reply
				$this->save();
				return $this->_makeReturn( "error", "Internal error; status is unspecified" );
				break;
		 }
	}
	
	/**
	* Updates the current database definition with user-supplied parameters
	* Returns a status message (empty on successful connection)
	*/
	function UpdateParams( $host, $dbname, $user, $pass, $prefix, $drop = true, $backup = true, $skipnonj = false )
	{
		global $lang;
		
		$current = $this->databases[ $this->current ];
		$current['Host']		= $host;
		$current['DBName']		= $dbname;
		$current['Username']	= $user;
		$current['Password']	= $pass;
		$current['Prefix']		= $prefix;
		
		$current['Drop']		= $drop;
		$current['Backup']		= $backup;
		$current['SkipNonJ']	= $skipnonj;
		
		$current['CanConnect'] 	= false;
		$this->databases[ $this->current ] = $current;
		$this->save();
		
		// Test db connection
		$database = null;

		if (!$host || !$user || !$dbname) {
			return $lang['db']['error1'];
		}

		if($prefix == '') {
			return $lang['db']['error2'];
		}

		if($prefix == 'bak_') {
			return $lang['db']['error3'];
		}

		$database = getDB( $host, $user, $pass, '', '', false );
		$test = $database->getErrorMsg();

		if (!is_resource($database->_resource)) {
			return $lang['db']['error4'];
		}

		// Try creating a database
		$sql = "CREATE DATABASE `$dbname`";
		$database->setQuery( $sql );
		$database->query();
		$test = $database->getErrorNum();

		if ($test != 0 && $test != 1007) {
			return $lang['db']['error5'] . ' ' . $database->getErrorMsg();
		}

		$current['CanConnect'] = true;
		
		$this->databases[ $this->current ] = $current;
		$this->save();

		if( $this->current == 0 )
		{
			// The first database is ALWAYS Joomla!'s
			global $ConfigManager;
			$ConfigManager->config['host']			= $current['Host'];
			$ConfigManager->config['user']			= $current['Username'];
			$ConfigManager->config['password']		= $current['Password'];
			$ConfigManager->config['db']			= $current['DBName'];
			$ConfigManager->config['dbprefix']		= $current['Prefix'];
			$ConfigManager->save();
		}

		return '';
	}
	
	/**
	* Reads a chunk of the SQL file. It returns an array with three keys:
	* "status"		It can be one of:
	*		"continue"	More work is needed on this file
	*		"finish"		We have finished processing this file
	*		"error"		An error occured; consult $this->errorMessage
	* "data"			Contains data read from the file
	* "nextOffset"	The next offset we should start reading from
	*/
	function _Fetch( $nextOffset )
	{
		// If we tried to go past end of file, return "finish"
		if ( $nextOffset >= filesize( JPIDIR . '/sql/' . $this->databases[ $this->current ]['SQLFile'] ) ) {
			return array('status' => "finish", 'data' => null, 'nextOffset' => null);
		}

		// Try opening the file, or return "error" on error
		$fp = @fopen(JPIDIR . '/sql/' . $this->databases[ $this->current ]['SQLFile'], "rb");

		if ($fp === FALSE) {
			$this->errorMessage = "Could not open " . $this->databases[ $this->current ]['SQLFile'] . " for reading.";
			return array('status' => "error", 'data' => null, 'nextOffset' => null);
		}

		$retArray = array("status" => "continue", 'data' => "", 'nextOffset' => null);
		
		// Seek to last file position
		if( $nextOffset === '' ) $nextOffset = 0;
		
		if ($nextOffset > 0) {
			fseek($fp, $nextOffset,  SEEK_SET);
		}

		// Read a chunk
		$mqr = @get_magic_quotes_runtime();
		@set_magic_quotes_runtime(0);
		$retArray['data'] = fread($fp, JPI_CHUNK_LENGTH );
		@set_magic_quotes_runtime($mqr);

		// Find position of last line return (newline mark)
		$pos = strrpos($retArray['data'], "\n");

		// If there was no newline found, we've got to read more blocks
		if (($pos === FALSE) && (!feof($fp))) {
			$tmpRet = $this->_Fetch($nextOffset + strlen($retArray['data']));
			if ( ($tmpRet['data'] != "") && ( !is_null($tmpRet['data']) ) ) {
				$retArray['data'] .= $tmpRet['data'];
			}
			$pos = strrpos($retArray['data'], "\n");
			if ($pos === false) {
				$pos = strlen($retArray['data']);
			}
		}

		// Discard partial data after the last newline
		$tmp = @str_split($retArray['data'], $pos);
		$retArray['data'] = $tmp[0];
		$dataLength = strlen($retArray['data']);
		if ($dataLength == 0) {
			$dataLength = 1;
		}
		$retArray['nextOffset'] = $nextOffset + $dataLength + 1;

		return $retArray;
	}
	
	/**
	* Tries to fetch a block and put it in the database
	*/
	function _FetchAndRestore()
	{
		require_once( JPIDIR . '/../includes/database.php' );
		
		$chunkData = $this->_Fetch( $this->databases[ $this->current ]['Line'] );
		
		switch( $chunkData['status'] )
		{
			case "finish":
					return "finish";
				break;
				
			case "error":
					return "error";
				break;
				
			case "continue":
				// Try connecting to database, or fail gracefully (well, as graceful a die command can be)
				$myDB = $this->databases[ $this->current ];
				$database = getDB( $myDB['Host'], $myDB['Username'], $myDB['Password'], $myDB['DBName'], $myDB['Prefix'] );
				$test = $database->getErrorMsg();

				if (!$database->_resource) {
					$this->errorMessage = "Invalid username/password. This shouldn't happen!";
					return "error";
				}

				if ($test != 0 && $test != 1007) {
					$this->errorMessage = 'A database error occurred: ' . $database->getErrorMsg();
					return "error";
				}

				// Process lines
				$sqlLines = @explode("\n", $chunkData['data']);
				foreach($sqlLines as $sql) {
					$sql = trim( $sql );
					$split_sql = @str_split($sql);
					
					if ( ( !empty( $sql ) ) && ( $split_sql[0] != '#' ) && ( !($sql==';') ) ) {
						$data = $this->_parseSQLLine( $sql );
						$process = $myDB['SkipNonJ'] ? $data['target'] == 'joomla' : true;
						
						// Drop
						
						if( $process )
						{
							// Before creating a table, check if backup and/or drop option is set
							if( $data['type'] == 'create' )
							{
								// Backup tables if option is set
								if( $myDB['Backup'] ) {
									$database->setQuery( $data['backup'] );
									// Ignore error when backing up tables; this usu. means the table doesn't exist or there is already a backup table
									/*
									if (!$database->query()) {
										$this->errorMessage = 'A database error occurred when running query<br /><tt>' . $database->getQuery() . "</tt><br />The error was:<br />" . $database->getErrorMsg();
										return "error";
									}
									*/
								}
								// Drop existing tables if option is set
								if( $myDB['Drop'] ) {
									$database->setQuery( $data['drop'] );
									if (!$database->query()) {
										$this->errorMessage = 'A database error occurred when running query<br /><tt>' . $database->getQuery() . "</tt><br />The error was:<br />" . $database->getErrorMsg();
										return "error";
									}
								}
							}
							
							// Process the SQL statement
							$database->setQuery( $sql );
							if (!$database->query()) {
								$this->errorMessage = 'A database error occurred when running query<br /><tt>' . $database->getQuery() . "</tt><br />The error was:<br />" . $database->getErrorMsg();
								return "error";
							}
							
						} // if process
					} // if not a comment
				} // foreach
				
				// Once all lines are processed, update internal data and return "continue"
				$this->databases[ $this->current ]['Line'] = $chunkData['nextOffset'];
				return "continue";
				break;
		} //switch status
	}
	
	/**
	* Does basic parsing of an SQL line and returns a table with the following keys:
	* "type"			=> Type of statement, can be "create", "insert", "other"
	* "target"		=> can be "joomla" for Joomla! tables, "backup" for tables starting with "bak_" or "other" for other tables
	* "drop"			=> Drop statement for "create" statements
	* "backup"		=> Backup statemenet for "create" statements
	*/
	function _parseSQLLine( $sql )
	{
		// Default return array ("other" statement, which is not tested against below)
		$ret = array(
			'type'			=> 'other',
			'target'		=> 'joomla',
			'drop'			=> '',
			'backup'		=> ''
		);
		
		if( strtoupper(substr( $sql, 0, 12 )) == "CREATE TABLE" ) {
			// Create table detected.
			$ret['type'] = 'create';
			
			// Try fetching the table's name from the query
			$afterCommand = substr($sql, 13);
			$tableName = substr($afterCommand,0,strpos($afterCommand," ")+1);
			// Remove backticks, if present
			if( (substr($tableName,0,1) == '`') ) $tableName = substr( $tableName, 1, strlen($tableName)-3 );
			
			// Make DROP statement
			$ret['drop'] = 'DROP TABLE IF EXISTS `' . $tableName . '`;';
			
			// Sense the target
			$sense = $this->_senseTarget( $tableName );
			$ret['target'] = $sense['target'];
			$buname = $sense['buname'];
			
			// Make backup SQL and drop backup SQL
			$ret['backup'] = 'RENAME TABLE `' . $tableName . '` TO `' . $buname . '`;';
			$ret['dropbackup'] = 'DROP TABLE IF EXISTS `' . $buname . '`;';
		} elseif( strtoupper( substr( $sql, 0, 11 ) ) == "INSERT INTO" ) {
			// Insert statement detected
			$ret['type'] = 'insert';

			// Try fetching the table's name from the query
			$afterCommand = substr($sql, 12);
			$tableName = substr($afterCommand,0,strpos($afterCommand," ")+1);
			// Remove backticks, if present
			if( (substr($tableName,0,1) == '`') ) $tableName = substr( $tableName, 1, strlen($tableName)-3 );

			// Sense the target
			$sense = $this->_senseTarget( $tableName );
			$ret['target'] = $sense['target'];
			$buname = $sense['buname'];
		}

		return $ret;
	}
	
	/**
	 * Intelligent target sensing. Decides if a given table by the name of $tableName is a
	 * Joomla! table, a backup table or a third-party script's table.
	 *
	 * @param string $tableName The name of the table to test for
	 * @return array Contains the sensed target type in 'target' key and the backup table's name in th 'backup' key.
	 */
	function _senseTarget( $tableName )
	{
		$ret = array();
		
		// Sense the targets
		if( substr( $tableName, 0, 3) == "#__" ) {
			// A Joomla! table
			$ret['target'] = 'joomla';
			$ret['buname'] = str_replace( "#__", "", $tableName );
		} elseif( substr( $tableName, 0, 4 ) == "bak_" ) {
			$ret['target'] = 'backup';
			$ret['buname'] = "bak_" . $tableName;
		} else {
			$ret['target'] = 'other';
			$ret['buname'] = "bak_" . $tableName;
		}		
		return $ret;
	}
	
	/**
	* Creates a return message for the tick function
	*/
	function _makeReturn( $status, $message )
	{
		return array(
			'status' => $status,
			'message' => $message
		);
	}
	
	function _templateDB()
	{
		return array(
			"Host" => '',			// Hostname
			"DBName" => '',		// Database name
			"Username" => '',		// MySQL username
			"Password" => '',		// MySQL password
			"Prefix" => '',		// Tables' prefix (e.g. "jos_")
			"SQLFile" => "",		// The path to the .sql file, realtive to <root>/installation/sql
			"CanConnect" => false,	// Has connection test succeeded?
			"Line" => '',			// Actually, the byte position we are processing on the file
			"Finished" => false,	// Are we done with this file?
			"Drop" => true,		// Should I drop tables before creating them?
			"Backup" => false,		// Should I backup tables before creating the new ones? (Drop must be true)
			"SkipNonJ" => false	// Should I exclude non-Joomla tables from the set? (ignores SQL statements not refering to tables starting with "`#__")
		);
	}
}

// Make sure we always have a current copy of CDBFunc in memory.
global $JPDBFunc;
$task = mosGetParam($_REQUEST, 'task', 'index');

switch( $task )
{
	case "db":
		// Force a fresh instance every time the database restoration page is loaded.
		$JPDBFunc = new CDBFunc();
		break;
	default:
		if( file_exists( JPIDIR . '/db.dat' ) )
		{
			// If the file exists, load it
			$serializedFunc = file_get_contents( JPIDIR . '/db.dat' );
			$JPDBFunc = unserialize( $serializedFunc );
		} else {
			// This shouldn't happen!
			die('Could not load db.dat; is someone messing with this installer?!');
			//$JPDBFunc = new CDBFunc();
		}
}
?>