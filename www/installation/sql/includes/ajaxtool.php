<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* AJAX methods reside in here. This scipt is NOT to be called directly!
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

// Try to grant ourselves infinite time for running this script
@set_time_limit(0);

// (S)AJAX Main Loop
// Initialize (S)AJAX - NKD: This currently does nothing?!
sajax_init();
// Export functions to the (S)AJAX library
//sajax_export("AjaxPing", "TryConnect", "populateDB", "DropOrRenameTables");
sajax_export( "AJAXPing", "dbtick", "dbupdate", "dbrequest", "getRestoringMessage",
              "getDBFinish", "getRandPass", "applyConfig" );

/*****************************************************************************/
/* Functions exposed to AJAX                                                 */
/*****************************************************************************/
function AJAXPing()
{
	return 1;
}

function dbtick()
{
	require_once( JPIDIR . '/includes/CDatabase.php' );
	global $JPDBFunc;
	
	return $JPDBFunc->tick();
}

function dbupdate($host, $dbname, $user, $pass, $prefix, $drop = true, $backup = true, $skipnonj = false )
{
	require_once( JPIDIR . '/includes/CDatabase.php' );
	global $JPDBFunc;
	
	return $JPDBFunc->UpdateParams( $host, $dbname, $user, $pass, $prefix, $drop, $backup, $skipnonj );
}

function dbrequest()
{
	require_once( JPIDIR . '/includes/CDatabase.php' );
	$myPage = new CDatabase();
	return $myPage->getRequestHTML();
}

function getRestoringMessage()
{
	require_once( JPIDIR . '/includes/CDatabase.php' );
	global $JPDBFunc, $lang;
	return '<p>' . sprintf($lang['db']['running'], $JPDBFunc->databases[ $JPDBFunc->current ]['DBName']) . '</p><div id="messages">&nbsp;</div><div id="error">&nbsp;</div>';
}

function getDBFinish()
{
	global $lang;
	
	return $lang['db']['finish'];
}

function getRandPass()
{
	return mosMakePassword(8);
}

function applyConfig($sitename, $mailfrom, $adminpass, $dirperms = "", $fileperms = "", $ftp_enable = false, $ftp_host = '', $ftp_port = '21', $ftp_user = '', $ftp_pass = '', $ftp_root = '')
{
	require_once( JPIDIR . '/includes/CConfig.php' );
	$myPage = new CConfig;
	return $myPage->SaveConfig($sitename, $mailfrom, $adminpass, $dirperms, $fileperms, $ftp_enable, $ftp_host, $ftp_port, $ftp_user, $ftp_pass, $ftp_root);
}
?>