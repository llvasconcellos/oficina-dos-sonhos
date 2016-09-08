<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* This file contains the finish screen
*
* For bugs regarding this part of JoomlaPack, contact Nicholas K. Dionysopoulos
* (JoomlaPack Support Forum user: nicholas, email: nikosdion@gmail.com)
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

class CFinish
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
		return getStepBar('finish');		
	}

	function getMainHTML()
	{
		global $lang, $ConfigManager;
		$mainHTML = "";
		
		$mainHTML .= getPageHeader( $lang['global']['step5'], $this->_getButtonsHTML() );
		
		$configWritten = $this->_writeConfig();
		if( !$configWritten )
		{
			$mainHTML .= "<p>" . $lang['finish']['config'] . "</p>";
			$mainHTML .= "<textarea rows=\"20\" cols=\"80\">" . $ConfigManager->ConfigurationContents() . '</textarea>';
		}
		
		$mainHTML .= '<p>' . $lang['finish']['message'] . '</p>';
		
		return $mainHTML;
	}
	
	function _getButtonsHTML()
	{
		global $lang;
		return '';
	}

	function _writeConfig()
	{
		global $ConfigManager;
		$content = $ConfigManager->ConfigurationContents();
		
		// Try writing
		$fp = @fopen( JPIDIR . '/../configuration.php', 'w' );
		if( $fp === false ) return false;
		fwrite( $fp, $content );
		fclose( $fp );
		return true;
	}
}
?>