<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* This file contains the final configuration page
*
* For bugs regarding this part of JoomlaPack, contact Nicholas K. Dionysopoulos
* (JoomlaPack Support Forum user: nicholas, email: nikosdion@gmail.com)
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

class CConfig
{

	var $dberror = "";
	
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
		return getStepBar('config');
	}

	function getMainHTML()
	{
		global $lang, $ConfigManager;
		
		$mainHTML = "";

		$mainHTML .= getPageHeader( $lang['global']['step4'], $this->_getButtonsHTML() );

		$mainHTML .= '<div id="error">&nbsp;</div>' . "\n";
		
		$mainHTML .= "<h2>" . $lang['config']['basic_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['config']['basic_desc'], $this->_getMainOptionsHTML());

		$mainHTML .= "<h2>" . $lang['config']['chmod_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['config']['chmod_desc'], $this->_getPermsHTML());

		if( $ConfigManager->JoomlaVersion != "1.0.x" ) {
			$mainHTML .= "<h2>" . $lang['config']['ftp_title'] . "</h2>\n";
			$mainHTML .= getLayoutTable( $lang['config']['ftp_desc'], $this->_getFTPHTML());
		}

		return $mainHTML;
	}

	function SaveConfig($sitename, $mailfrom, $adminpass, $dirperms = "", $fileperms = "", $ftp_enable = false, $ftp_host = '', $ftp_port = '21', $ftp_user = '', $ftp_pass = '', $ftp_root = '')
	{
		/*
		* 1. Basic configuration:
		*    sitename, mailfrom, {admin password}
		* 2. FTP Layer configuration - 1.5.x:
		*    ftp_enable, ftp_host, ftp_port, ftp_user, ftp_pass, ftp_root
		* 3. Automatically calculated - 1.0.x:
		*    absolute_path, live_site
		*/
		
		global $lang, $ConfigManager;
		
		// First, we check for required parameters
		$errors = "";
		
		$errors .= $sitename ? "" : $lang['config']['error1'] . '<br />';
		$errors .= $mailfrom ? "" : $lang['config']['error2'] . '<br />';
		if( ($ConfigManager->JoomlaVersion != "1.0.x") && ($ftp_enable == "on") ) {
			$errors .= $ftp_host ? "" : $lang['config']['error3'] . '<br />';
			$errors .= $ftp_port ? "" : $lang['config']['error4'] . '<br />';
			$errors .= $ftp_user ? "" : $lang['config']['error5'] . '<br />';
			$errors .= $ftp_pass ? "" : $lang['config']['error6'] . '<br />';
			$errors .= $ftp_root ? "" : $lang['config']['error7'] . '<br />';
		}
		
		if( $errors ) return $errors; // If errors occured, inform the user about them
		
		// No errors. Good. Update basic parameters.
		$ConfigManager->config['sitename'] = $sitename;
		$ConfigManager->config['mailfrom'] = $mailfrom;
		if( $ConfigManager->JoomlaVersion != "1.0.x" )
		{
			$ConfigManager->config['ftp_enable']	= ($ftp_enable == "on") ? true : false;
			$ConfigManager->config['ftp_host']		= $ftp_host;
			$ConfigManager->config['ftp_port']		= $ftp_port;
			$ConfigManager->config['ftp_user']		= $ftp_user;
			$ConfigManager->config['ftp_pass']		= $ftp_pass;
			$ConfigManager->config['ftp_root']		= $ftp_root;
		}
		
		// Request admin password change if requested
		if( $adminpass != "" ) {
			if( !$this->_changeAdminPass( $adminpass ) ) $errors .= $lang['config']['error8'] . '<br />';
		}
		
		// Change permissions if requested
		$dirperms = $dirperms == "" ? null : $dirperms;
		$fileperms = $fileperms == "" ? null : $fileperms;
		if( (!is_null($dirperms)) || (!is_null($fileperms)) ) mosChmodRecursive( realpath( JPIDIR . '/../' ), octdec($fileperms), octdec($dirperms) );
		
		// Test connect to FTP
		if( !$this->_testFTP($ftp_host, $ftp_port, $ftp_user, $ftp_pass, $ftp_root) ) $errors .= $lang['config']['error9'] . '<br />';
		
		// Live site's URL sensing
		$port = ( $_SERVER['SERVER_PORT'] == 80 ) ? '' : ":".$_SERVER['SERVER_PORT'];
		$root = $_SERVER['SERVER_NAME'] . $port . $_SERVER['PHP_SELF'];
		$upto = strpos( $root, "/installation" );
		$root = substr( $root, 0, $upto );
		$url = "http://".$root;
		
		// Joomla! 1.0.x parameters
		if( $ConfigManager->JoomlaVersion == "1.0.x" )
		{
			$ConfigManager->config['absolute_path'] = realpath( JPIDIR . '/../' );
			$ConfigManager->config['live_site'] = $url;
		}
		else
		{
			// Joomla! 1.5.x: If live_site is non-blank, please update it
			if( $ConfigManager->config['live_site'] != '' )
			{
				$ConfigManager->config['live_site'] = $url;
			}
		}
		
		// Database parameters which must be saved in configuration.php
		require_once( JPIDIR . '/includes/CDatabase.php' );
		global $JPDBFunc;
		
		$myDB = $JPDBFunc->databases[0];
		
		$ConfigManager->config['host']		= $myDB['Host'];
		$ConfigManager->config['user']		= $myDB['Username'];
		$ConfigManager->config['password']	= $myDB['Password'];
		$ConfigManager->config['db']		= $myDB['DBName'];
		$ConfigManager->config['dbprefix']	= $myDB['Prefix'];
		
		$ConfigManager->save();
		
		// Return - if we had errors a non-empty string will be returned
		return $errors;
	}

	// Change the administrator's password to $pass. Returns true on success
	function _changeAdminPass( $pass )
	{
		require_once( JPIDIR . '/includes/CDatabase.php' );
		require_once( JPIDIR . '/../includes/database.php' );
		
		global $JPDBFunc, $lang;

		$myDB = $JPDBFunc->databases[0];
		$database = new database( $myDB['Host'], $myDB['Username'], $myDB['Password'], $myDB['DBName'], $myDB['Prefix'] );
		
		$cryptpass = md5( $pass );
		$sql = "UPDATE `#__users` SET `password` = '$cryptpass' WHERE id=62";
		$database->setQuery( $sql );
		$test = $database->getErrorNum();

		if ($test != 0) {
			$this->dberror = $database->getErrorMsg();
			return false;
		} else {
			return true;
		}
	}
	
	// Tries to connect to FTP. Returns true on success
	function _testFTP($ftp_host, $ftp_port, $ftp_user, $ftp_pass, $ftp_root)
	{
		// TODO
		return true;
	}
	
	function _getButtonsHTML()
	{
		global $lang;
		return '<input name="ButtonNext" type="submit" class="button" value="' . $lang['global']['btnNext'] . '" onclick="applyConfig();" />';
	}
	
	function _getMainOptionsHTML()
	{
		// sitename, mailfrom, {admin password}
		global $lang, $ConfigManager;
		
		$out = "";
		$out .= <<<ENDOFDATAMARK
			<table class="config">
				<tr>
					<td colspan="2">{$lang['config']['sitename']}</td>
				</tr>
				<tr>
					<td colspan="2"><input id="sitename" type="text" value="{$ConfigManager->config['sitename']}" class="text" /></td>
				</tr>
				<tr>
					<td colspan="2">{$lang['config']['mailfrom']}</td>
				</tr>
				<tr>
					<td colspan="2"><input id="mailfrom" type="text" value="{$ConfigManager->config['mailfrom']}" class="text" /></td>
				</tr>
				<tr>
					<td colspan="2">
						{$lang['config']['adminpass']}<br />
						<span style="font-weight: normal; font-size: smaller;">{$lang['config']['adminpassinfo']}</span>
					</td>
				</tr>
				<tr>
					<td><input id="adminpass" type="text" class="text" /></td>
 					<td width="10%"><input type="button" id="mkrand" value="{$lang['config']['getrandom']}" onclick="getRandomPassword();" /></td>
				</tr>
			</table>
ENDOFDATAMARK;
		return $out;
	}
	
	function _getPermsHTML()
	{
		global $lang;
		
		return <<<ENDOFDATAMARK
		<table>
			<tr>
				<td valign="top">
					<input type="checkbox" id="chmoddir" />
					<span style="font-weight: bold;">{$lang['config']['chmod_directory']}</span>
				</td>
				<td>
					<table>
						<thead>
							<tr>
								<th width="110px">&nbsp;</th>
								<th width="50px">{$lang['config']['chmod_user']}</th>
								<th width="50px">{$lang['config']['chmod_group']}</th>
								<th>{$lang['config']['chmod_others']}</th>
							</tr>
						</thead>
						<tr>
							<td>{$lang['config']['chmod_r']}</td>
							<td><input type="checkbox" id="dur" value="4" checked /></td>
							<td><input type="checkbox" id="dgr" value="4" checked /></td>
							<td><input type="checkbox" id="dor" value="4" checked /></td>
						</tr>
						<tr>
							<td>{$lang['config']['chmod_w']}</td>
							<td><input type="checkbox" id="duw" value="2" checked /></td>
							<td><input type="checkbox" id="dgw" value="2" checked /></td>
							<td><input type="checkbox" id="dow" value="2" /></td>
						</tr>
						<tr>
							<td>{$lang['config']['chmod_xd']}</td>
							<td><input type="checkbox" id="dux" value="1" checked /></td>
							<td><input type="checkbox" id="dgx" value="1" checked /></td>
							<td><input type="checkbox" id="dox" value="1" checked /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<input type="checkbox" id="chmodfiles" />
					<span style="font-weight: bold;">{$lang['config']['chmod_files']}</span>
				</td>
				<td>
					<table>
						<thead>
							<tr>
								<th width="110px">&nbsp;</th>
								<th width="50px">{$lang['config']['chmod_user']}</th>
								<th width="50px">{$lang['config']['chmod_group']}</th>
								<th>{$lang['config']['chmod_others']}</th>
							</tr>
						</thead>
						<tr>
							<td>{$lang['config']['chmod_r']}</td>
							<td><input type="checkbox" id="fur" value="4" checked /></td>
							<td><input type="checkbox" id="fgr" value="4" checked /></td>
							<td><input type="checkbox" id="for" value="4" checked /></td>
						</tr>
						<tr>
							<td>{$lang['config']['chmod_w']}</td>
							<td><input type="checkbox" id="fuw" value="2" checked /></td>
							<td><input type="checkbox" id="fgw" value="2" checked /></td>
							<td><input type="checkbox" id="fow" value="2" /></td>
						</tr>
						<tr>
							<td>{$lang['config']['chmod_x']}</td>
							<td><input type="checkbox" id="fux" value="1" checked /></td>
							<td><input type="checkbox" id="fgx" value="1" checked /></td>
							<td><input type="checkbox" id="fox" value="1" checked /></td>
						</tr>
					</table>
				</td>
			</tr>	
		</table>
ENDOFDATAMARK;
	}
	
	function _getFTPHTML()
	{
		global $lang, $ConfigManager;
		
		$checked = $ConfigManager->config['ftp_enable'] ? "checked" : "";
		return <<<ENDOFDATAMARK
			<input type="checkbox" id="ftp_enable" {$checked} />
			<span style="font-weight: bold;">{$lang['config']['ftp_enable']}</span>
			
			<label for="ftp_host">{$lang['config']['ftp_host']}</label>
			<input type="text" id="ftp_host" value="{$ConfigManager->config['ftp_host']}" class="text" />

			<label for="ftp_port">{$lang['config']['ftp_port']}</label>
			<input type="text" id="ftp_port" value="{$ConfigManager->config['ftp_port']}" class="text" />

			<label for="ftp_user">{$lang['config']['ftp_user']}</label>
			<input type="text" id="ftp_user" value="{$ConfigManager->config['ftp_user']}" class="text" />

			<label for="ftp_pass">{$lang['config']['ftp_pass']}</label>
			<input type="text" id="ftp_pass" value="{$ConfigManager->config['ftp_pass']}" class="text" />

			<label for="ftp_root">{$lang['config']['ftp_root']}</label>
			<input type="text" id="ftp_root" value="{$ConfigManager->config['ftp_root']}" class="text" />
ENDOFDATAMARK;

	}


}
?>