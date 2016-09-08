<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* The CIndex class for the Index page (the first page which is loaded upon calling this script)
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

class CIndex
{
	var $areRequirementsMet = false;
	var $areDirectoriesWritable = false;
	var $reqHTML = "";
	var $dirHTML = "";

	function CIndex()
	{
		$this->_checkRequirements();
		$this->_checkDirectories();
	}
	
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
		return getStepBar('index');
	}
	
	function getMainHTML()
	{
		global $lang;

		$mainHTML = "";
		$mainHTML .= getPageHeader( $lang['global']['step1'], $this->_getButtonsHTML() );
		
		$mainHTML .= '<script language="Javascript">do_ping_bench()</script>';
		
		$mainHTML .= "<h2>" . $lang['index']['required_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['index']['required_desc'], $this->reqHTML);
		
		$mainHTML .= "<h2>" . $lang['index']['recommended_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['index']['recommended_description'], $this->_getRecommended());

		$mainHTML .= "<h2>" . $lang['index']['dir_title'] . "</h2>\n";
		$mainHTML .= getLayoutTable( $lang['index']['dir_desc'], $this->dirHTML );
		
		return $mainHTML;
	}
	
	function _getButtonsHTML()
	{
		global $lang;
		
		$canProceed = $this->areRequirementsMet && $this->areDirectoriesWritable;	
		if ($canProceed) {
			return '<input name="ButtonNext" type="submit" class="button" value="' . $lang['global']['btnNext'] . '" onclick="document.location=\'index.php?task=license\'" />';
		} else {
			return '<input name="ButtonRetry" type="submit" class="button" value="' . $lang['global']['btnRetry'] . '" onclick="document.location=document.location" />';
		}
	}
	
	/**
	* Checks that the Joomla! and JoomplaPackInstaller requirements are met
	*/
	function _checkRequirements()
	{
		global $lang;
		
		// Gets the session path
		$sp = ini_get( 'session.save_path' );
		
		// Performs the checks
		$checkPHPVersion = !(phpversion() < '4.1');
		$checkZLib = extension_loaded('zlib');
		$checkXML = extension_loaded('xml');
		$checkMySQL = function_exists('mysql_connect');
		$checkConfigWritable = $this->_isConfigWritable();
		$checkSessionPathWritable = is_writable( $sp );
		
		global $ConfigManager;
		if ($ConfigManager->isConfigLoaded) {
			$checkConfigLoad = true;
			if( file_exists( realpath(JPIDIR . '/../configuration.php') ) ) {
				$confSource = $lang['index']['source1'];
			} else {
				$confSource = $lang['index']['source2'];
			}
		} else {
			$checkConfigLoad = false;
			$confSource = $lang['index']['source3'];
		}
		
		// Are all requirements met?
		//$this->areRequirementsMet = $checkPHPVersion && $checkZLib && $checkXML && $checkMySQL && $checkConfigWritable && $checkConfigLoad;
		// # FIX 1.2.b2 - Relax requirements: configuration writable and session path writable are no longer "hard" requirements
		$this->areRequirementsMet = $checkPHPVersion && $checkZLib && $checkXML && $checkMySQL;
		
		// Create HTML for this
		$myArray = array(
			array('php_ver', $checkPHPVersion, 'Yes1', 'No1' ),
			array('zlib', $checkZLib, 'Available', 'NotAvailable' ),
			array('xml', $checkXML, 'Available', 'NotAvailable' ),
			array('mysql', $checkMySQL, 'Available', 'NotAvailable' ),
			array('config', $checkConfigWritable, 'Writable', 'Unwritable' ),
			array('session', $checkSessionPathWritable, 'Writable', 'Unwritable', $sp )
		);
		
		$out = "";
		$out .= '<table>' . "\n";
		foreach( $myArray as $myParams )
			$out .= $this->_getReqRow( $myParams );
		$out .= '	<tr>' . "\n";
		$out .= '	<td width="50%">' . $lang['index']['defconfig'] . '</td>' . "\n";
		$out .= '	<td width="50%">' . getColored( $confSource, !$checkConfigLoad ) . '</td>' . "\n";
		$out .= '	</tr>' . "\n";
		$out .= '</table>';
		
		// Return the HTML
		$this->reqHTML = $out;
	}
	
	function _getReqRow( $myParams )
	// label, value, ok, not ok, extra
	{
		global $lang;
		$out .= "";
		$out .= '	<tr>' . "\n";
		$text = $lang['index'][ $myParams[0] ];
		$text = $myParams[4] != "" ? $text . "<br /><b>" . $myParams[4] . "</b>" : $text;
		$out .= '		<td valign="top">' . $text . '</td>'  . "\n";
		$text = $myParams[1] ? $lang['index'][ $myParams[2] ]: $lang['index'][ $myParams[3] ];
		$out .= '		<td valign="top">' . getColored( $text, !$myParams[1] ) . '</td>'  . "\n";
		$out .= '	</tr>' . "\n";
		
		return $out;
	}
	
	/**
	* Returns true in configuration.php exists and is writable or if it doesn't exist but the site's root folder is writable
	*/
	function _isConfigWritable() {
        if (@file_exists( JPIDIR . '/../configuration.php') &&  @is_writable( JPIDIR . '/../configuration.php' )){
            return true;
        } else if (@is_writable( JPIDIR . '/..' )) {
            return true;
        } else {
            return false;
        }
	}
	
	function _getRecommended()
	{
		global $lang;

		$php_recommended_settings = array(
			array ('rec1','safe_mode',false),
			array ('rec2','display_errors',true),
			array ('rec3','file_uploads',true),
			array ('rec4','magic_quotes_gpc',true),
			array ('rec5','magic_quotes_runtime',false),
			array ('rec6','register_globals',false),
			array ('rec7','output_buffering',false),
			array ('rec8','session.auto_start',false),
		);

		$out = "";
		$out .= '<table>' . "\n";
		$out .= '	<thead>' . "\n";
		$out .= '	<tr>' . "\n";
		$out .= '	<th>' . $lang['index']['Directive'] . '</th>' ."\n";
		$out .= '	<th>' . $lang['index']['Recommended'] . '</th>' ."\n";
		$out .= '	<th>' . $lang['index']['Actual'] . '</th>' ."\n";
		$out .= '	</thead>' . "\n";
		$out .= '	</tr>' . "\n";
		
		foreach ($php_recommended_settings as $mySetting)
		{
			$value = (ini_get( $mySetting[1] ) == 1);
			$red = !($value == $mySetting[2]);
			$directive = $lang['index'][ $mySetting[0] ];
			$recommended = $mySetting[2] ? $lang['index']['ON1'] : $lang['index']['OFF1'];
			$actual = $value ? $lang['index']['ON1'] : $lang['index']['OFF1'];
			$out .= '	<tr>';
			$out .= '		<td width="50%">' . $directive . '</td>' . "\n";
			$out .= '		<td width="25%">' . $recommended . '</td>' . "\n";
			$out .= '		<td width="25%">' . getColored( $actual, $red ) . '</td>' . "\n";
			$out .= '	</tr>';
		}

		$out .= '	<tr>';
		$out .= '		<td>' . $lang['index']['rec9'] . '</td>' . "\n";
		$out .= '		<td>' . $lang['index']['OFF1'] . '</td>' . "\n";
		$actual = RG_EMULATION ? $lang['index']['ON1'] : $lang['index']['OFF1'];
		$out .= '		<td>' . getColored( $actual, RG_EMULATION ) . '</td>' . "\n";
		$out .= '	</tr>';
		
		$out .= '</table>' . "\n";
		return $out;
	}

	function _checkDirectories()
	{
		global $ConfigManager;
		
		switch($ConfigManager->JoomlaVersion)
		{
			case "1.0.x":
				$dirs = array(
					"installation",
					"administrator/backups",
					"administrator/components",
					"administrator/modules",
					"administrator/templates",
					"cache",
					"components",
					"images",
					"images/banners",
					"images/stories",
					"language",
					"mambots",
					"mambots/content",
					"mambots/editors",
					"mambots/editors-xtd",
					"mambots/search",
					"mambots/system",
					"media",
					"modules",
					"templates"
				);
				break;
				
			case "1.5":
				$dirs = array(
					"installation",
					"administrator/backups",
					"administrator/components",
					"administrator/modules",
					"administrator/templates",
					"cache",
					"components",
					"images",
					"images/banners",
					"images/stories",
					"language",
					"logs",
					"plugins",
					"plugins/authentication",
					"plugins/content",
					"plugins/editors",
					"plugins/editors-xtd",
					"plugins/search",
					"plugins/system",
					"plugins/user",
					"plugins/tmp",
					"plugins/xmlrpc",
					"media",
					"modules",
					"templates"
				);
				break;
		}
		
		$this->areDirectoriesWritable = true;
		
		$this->dirHTML = '<table>' . "\n";
		foreach( $dirs as $dir )
		{
			global $lang;
			
			$isWritable = is_writable( JPIDIR . '/../' . $dir );
			$writableText = $isWritable ? $lang['index']['Writable'] : $lang['index']['Unwritable'];
			$this->areDirectoriesWritable = $this->areDirectoriesWritable && $isWritable;
			$this->dirHTML .= '	<tr>' . "\n";
			$this->dirHTML .= '		<td width="50%">' . $dir . '</td>' . "\n";
			$this->dirHTML .= '		<td width="50%">' . getColored( $writableText, !$isWritable ) . '</td>' . "\n";
			$this->dirHTML .= '	</tr>' . "\n";
		}
		$this->dirHTML .= '</table>' . "\n";
	}
}
?>