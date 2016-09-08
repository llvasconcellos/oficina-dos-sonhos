<?php
/**
* @package		JoomlaPack
* @copyright	Copyright (C) 2006-2008 JoomlaPack Developers. All rights reserved.
* @version		1.2.3
* @license 	http://www.gnu.org/copyleft/gpl.html GNU/GPL
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* 
**/

// Ensure this file is being included by a parent file - Joomla! 1.0.x
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * Frontend XMLRPC server functions
 *
 */
class CXMLRPC
{
	
	/**
	 * Static method to return the loaded instance of the class, or create a new if none is present.
	 * Implements the Singleton desing pattern
	 *
	 * @return CXMLRPC
	 */
	function getInstance()
    {
		static $instance;
		
		$c = __CLASS__;
		return isset($instance) ? $instance : $instance = new $c;
	}
	
	/**
	 * Main functionality of this class. Implements the XML-RPC server.
	 */
	function server()
	{
		// Make sure the front-end backup option is enabled
		jpimport('classes.core.utility.configuration');
		$JPConfiguration = JoomlapackConfiguration::getInstance();
		if( !$JPConfiguration->enableFrontend )
		{
			die( JoomlapackLangManager::_('FRONTEND_ACCESSDENIED') );
		}

		// Load the XML-RPC library
		jpimport('includes.xmlrpc.xmlrpc',false);
		jpimport('includes.xmlrpc.xmlrpcs',false);
		jpimport('includes.xmlrpc.xmlrpc_wrappers',false);

		// Get the global XML-RPC types
		global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString,
		$xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue;

		// Define the available methods (implements JoomlaPack Remoting API 1.0)
		$a=array(
			'joomlapack.getAPI' => array
			(
				'function' => 'CXMLRPC::getAPI',
				'docstring' => 'Gets the JoomlaPack Remoting Services API version',
				'signature' => array(array($xmlrpcString))
			),
			
			'joomlapack.getProfiles' => array
			(
				'function' => 'CXMLRPC::getProfiles',
				'docstring' => 'Retrieves a list of valid backup profile ID\'s and their descriptions.',
				'signature' => array(array($xmlrpcArray, $xmlrpcString, $xmlrpcString))
			),

			'joomlapack.startBackup' => array
			(
				'function' => 'CXMLRPC::startBackup',
				'docstring' => 'Starts a new backup attempt.',
				'signature' => array(
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString, $xmlrpcInt, $xmlrpcString, $xmlrpcString),
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString, $xmlrpcInt, $xmlrpcString),
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString, $xmlrpcInt),
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString)
				)
			),
			
			'joomlapack.continueBackup' => array
			(
				'function' => 'CXMLRPC::continueBackup',
				'docstring' => 'Continues an already started backup attempt.',
				'signature' => array(
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString, $xmlrpcInt),
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString)
				)
			),

			'joomlapack.getFilename' => array
			(
				'function' => 'CXMLRPC::getFilename',
				'docstring' => 'Gets the backup archive filename.',
				'signature' => array(
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString, $xmlrpcInt),
					array($xmlrpcStruct, $xmlrpcString, $xmlrpcString)
				)
			)
		);
		
		// Create the server and process the request
		$s=new xmlrpc_server($a, false);
		$s->setdebug(3);
		$s->compress_response = true;
		$s->service();
		exit;
	}
	
	/**
	 * Returns the implemented JoomlaPack Remoting Services API version
	 * @return string;
	 */
	function getAPI()
	{
		return new xmlrpcresp(new xmlrpcval("1.0", "string"));
	}
	
	function getProfiles($mangled)
	{
		global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString,
		$xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue,
		$xmlrpcerruser;
		
		// Decode arguments
		$unmangled = php_xmlrpc_decode($mangled);
		$username = $unmangled[0];
		$password = $unmangled[1];
		
		// Authenticate user
		if(!CXMLRPC::_authenticate($username, $password))
			return new xmlrpcresp(0, $xmlrpcerruser+1, "Login Failed");
			
		// Do the job
		$structarray = array();
		$aProfile = new xmlrpcval(array(
			'id' => new xmlrpcval(1, $xmlrpcInt),
			'description' => new xmlrpcval('Default Backup Profile', $xmlrpcString)
		), 'struct');
		$structarray[] = $aProfile;
		return new xmlrpcresp(new xmlrpcval( $structarray , $xmlrpcArray));
	}
	
	function startBackup($mangled)
	{
		global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString,
		$xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue,
		$xmlrpcerruser;
		
		// Decode arguments
		$unmangled = php_xmlrpc_decode($mangled);
		$username = $unmangled[0];
		$password = $unmangled[1];
		$profileid = isset($unmangled[2]) ? $unmangled[2] : 1;
		$description = isset($unmangled[3]) ? $unmangled[3] : null;
		$comment = isset($unmangled[4]) ? $unmangled[4] : null;
		
		// Authenticate user
		if(!CXMLRPC::_authenticate($username, $password))
			return new xmlrpcresp(0, $xmlrpcerruser+1, "Login Failed");
		
		// Initialize a new backup attempt
		jpimport('classes.core.utility.configuration');
		jpimport('classes.core.cube');
		
		global $CUBE;
		$CUBE =& JoomlapackCUBE::getInstance( true, false );
		$ret = $CUBE->tick();
		$CUBE->save();
		
		return new xmlrpcresp(new xmlrpcval( array(
			'IsFinished'	=> new xmlrpcval( $ret['HasRun'] != 0, $xmlrpcBoolean ),
			'Domain'		=> new xmlrpcval( $ret['Domain'], $xmlrpcString ),
			'Step'			=> new xmlrpcval( $ret['Step'], $xmlrpcString ),
			'Substep'		=> new xmlrpcval( $ret['Substep'], $xmlrpcString ),
			'Error'			=> new xmlrpcval( $ret['Error'], $xmlrpcString ),
			'Warnings'		=> new xmlrpcval( $ret['Warnings'], $xmlrpcString )
		) , $xmlrpcStruct));
	}

	function continueBackup($mangled)
	{
		global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString,
		$xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue,
		$xmlrpcerruser;
		
		// Decode arguments
		$unmangled = php_xmlrpc_decode($mangled);
		$username = $unmangled[0];
		$password = $unmangled[1];
		$profileid = isset($unmangled[2]) ? $unmangled[2] : 1;
		$description = isset($unmangled[3]) ? $unmangled[3] : null;
		$comment = isset($unmangled[4]) ? $unmangled[4] : null;
		
		// Authenticate user
		if(!CXMLRPC::_authenticate($username, $password))
			return new xmlrpcresp(0, $xmlrpcerruser+1, "Login Failed");
		
		// Initialize a new backup attempt
		jpimport('classes.core.utility.configuration');
		jpimport('classes.core.cube');
		
		global $CUBE;
		$CUBE =& JoomlapackCUBE::getInstance( false );
		$ret = $CUBE->tick();
		$CUBE->save();
		
		return new xmlrpcresp(new xmlrpcval( array(
			'IsFinished'	=> new xmlrpcval( $ret['HasRun'] != 0, $xmlrpcBoolean ),
			'Domain'		=> new xmlrpcval( $ret['Domain'], $xmlrpcString ),
			'Step'			=> new xmlrpcval( $ret['Step'], $xmlrpcString ),
			'Substep'		=> new xmlrpcval( $ret['Substep'], $xmlrpcString ),
			'Error'			=> new xmlrpcval( $ret['Error'], $xmlrpcString ),
			'Warnings'		=> new xmlrpcval( $ret['Warnings'], $xmlrpcString )
		) , $xmlrpcStruct));
	}
	
	function getFilename($mangled)
	{
		global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString,
		$xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue,
		$xmlrpcerruser;
		
		// Decode arguments
		$unmangled = php_xmlrpc_decode($mangled);
		$username = $unmangled[0];
		$password = $unmangled[1];
		$profileid = isset($unmangled[2]) ? $unmangled[2] : 1;
		
		// Authenticate user
		if(!CXMLRPC::_authenticate($username, $password))
			return new xmlrpcresp(0, $xmlrpcerruser+1, "Login Failed");
		
		jpimport('classes.core.utility.configuration');
		jpimport('classes.core.cube');
		global $CUBE;
		$CUBE =& JoomlapackCUBE::getInstance( false );
		return new xmlrpcresp(new xmlrpcval( $CUBE->relativeBackupFilename, $xmlrpcString ));		
	}
	
	function _authenticate($username, $passwd)
	{
		global $database, $acl;

		$query = "SELECT id, name, username, password, usertype, block, gid"
		. "\n FROM #__users"
		. "\n WHERE username = ". $database->Quote( $username )
		;

		$database->setQuery( $query );
		$database->loadObject( $row );
		
		if (is_object($row))
		{
			// user blocked from login
			if ($row->block == 1) {
				return false;
			}
			
			// Conversion to new type
			if ((strpos($row->password, ':') === false) && $row->password == md5($passwd)) {
				// Old password hash storage but authentic ... lets convert it
				$salt = mosMakePassword(16);
				$crypt = md5($passwd.$salt);
				$row->password = $crypt.':'.$salt;
			}

			list($hash, $salt) = explode(':', $row->password);
			$cryptpass = md5($passwd.$salt);
			if ($hash != $cryptpass) {
				return false;
			}

			// Make sure we are on GID 25 (Super Administrator)
			if($row->gid == 25)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
}