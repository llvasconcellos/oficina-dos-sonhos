<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* Main Installer Page - This is where all action is initiated from
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

/** ************************************************************************ */
/** Initialization                                                           */
/** ************************************************************************ */
/** Set flag that this is a parent file */
define( '_VALID_MOS', 1 );

// Find absolute directory of the installer. This is the safest way against possible exploits
define( 'JPIDIR', realpath( dirname(__FILE__) ) );

@error_reporting( E_ERROR );
$old_error_handler = set_error_handler("userErrorHandler");

/* Include Joomla! files */
@include( JPIDIR . '/../globals.php' );

/* Include common.php */
require( JPIDIR . '/includes/common.php' );

/* Include (S)AJAX library */
require( JPIDIR . '/includes/sajax.php' );
require( JPIDIR . '/includes/ajaxtool.php' );

/* Find the task at hand. Defaults to 'index' (the first page displayed) */
$task = mosGetParam($_REQUEST, 'task', 'index');

// Loads the internationalisation installer files
loadLanguages();

/** Make sure we have tried to load the configuration.php */
require_once( JPIDIR . '/includes/CJConfigManager.php' );

// Joomla! 1.5.x requires a little more overhead...
if($ConfigManager->JoomlaVersion == '1.5' )
{
	define( '_JEXEC', 1 );
	define('JPATH_BASE', realpath(JPIDIR . '/../') );
	define('DS', DIRECTORY_SEPARATOR);
	require_once( JPATH_BASE . '/includes'.DS.'defines.php');
	require_once( JPATH_BASE . '/libraries'.DS.'loader.php');
	JLoader::import( 'joomla.base.object' );
	
	// ### Fix 1.2.b2 -- Dummy JText and JException classes to keep PHP from complaining
	class JTEXT
	{
		function _($string)
		{
			return $string;
		}
	}
	
	class JException
	{
		function getErrorMsg( $string )
		{
			return $string;
		}
	}
	// ### End of fix
}

/** ************************************************************************ */
/** Installer's Main Loop                                                    */
/** ************************************************************************ */


switch( $task )
{    
    // Default starting page
    case "index":
        require_once( JPIDIR . '/includes/CIndex.php' );
        $myIndex = new CIndex();
		echo $myIndex->getFullHTML();
		break;

	case "license":
        require_once( JPIDIR . '/includes/CLicense.php' );
        $myPage = new CLicense();
		echo $myPage->getFullHTML();
		break;

	case "db":
        require_once( JPIDIR . '/includes/CDatabase.php' );
		$myPage = new CDatabase();
		echo $myPage->getFullHTML();
		break;

	case "config":
		require_once( JPIDIR . '/includes/CConfig.php' );
		$myPage = new CConfig();
		echo $myPage->getFullHTML();
		break;
		
	case "finish":
		require_once( JPIDIR . '/includes/CFinish.php' );
		$myPage = new CFinish();
		echo $myPage->getFullHTML();
		break;
		
    // Special case used for AJAX calls
    case "ajax":
        // Try to handle the client's request
		sajax_handle_client_request();
		break;
	
	default:
		die('Access Denied');
}

ob_end_flush();

/**
 * Custom PHP error handler, to cope for all those cheapy hosts who won't provide access to the
 * server's error logs. Kudos to the 1&1 how-to section for providing the bulk of this function.
 *
 * @param integer $errno PHP error type number
 * @param string $errmsg The message of the error
 * @param string $filename Script's filename where this error occured
 * @param integer $linenum Script's line number where this error occured
 * @param array $vars The variables passed (?) to the function, or something like that
 */
function userErrorHandler ($errno, $errmsg, $filename, $linenum,  $vars) 
{
	global $JPConfiguration;

	$time=date("d M Y H:i:s"); 
	// Get the error type from the error number 
	$errortype = array (1    => "Error",
						2    => "Warning",
						4    => "Parsing Error",
						8    => "Notice",
						16   => "Core Error",
						32   => "Core Warning",
						64   => "Compile Error",
						128  => "Compile Warning",
						256  => "User Error",
						512  => "User Warning",
						1024 => "User Notice");
	$errlevel=$errortype[$errno];

	//Write error to log file (CSV format) 
	$errfile = @fopen( JPIDIR .  "/errors.csv", "a");
	if (!($errfile === FALSE)) { 
		fputs( $errfile, "\"$time\",\"$filename:$linenum\",\"($errlevel) $errmsg\"\r\n"); 
		fclose($errfile);
	}
 
	if( ($errno == 4) && ($errno == 16) && ($errno == 64) && ($errno == 256) ) {
		//Terminate script if fatal error
		die("A fatal error has occurred. Script execution has been aborted.");
	} 
}
?>