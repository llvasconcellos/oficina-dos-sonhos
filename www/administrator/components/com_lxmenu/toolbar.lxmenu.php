<?php
/**
* A DHTML menu component for Joomla!
* @version 1.12
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );

$language = isset($GLOBALS['mosConfig_alang']) ? $GLOBALS['mosConfig_alang'] : $GLOBALS['mosConfig_lang'];
$lang_path = $mosConfig_absolute_path.DIRECTORY_SEPARATOR.'administrator'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.$option.DIRECTORY_SEPARATOR.'language'.DIRECTORY_SEPARATOR;
if(file_exists($lang_path.$language.'.php')){
	require_once($lang_path.$language.'.php');
}else{
	require_once($lang_path.'english.php');
}

switch ( $task ) {
	default:
		TOOLBAR_config::_DEFAULT();
		break;
}
?>