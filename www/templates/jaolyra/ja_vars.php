<?php
/**
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'ja_templatetools.php');
$tmpTools = new JA_Tools($this);
$tmpTools->setColorThemes(array('default','blue','green'));
$ja_iconmenu = 1;
//Main navigation
$japarams = new JParameter('');
$japarams->set( 'menu_images_align', 'left' );
$japarams->set( 'menutype', 'topmenu' );
$japarams->set( 'menupath', $tmpTools->templateurl() .'/ja_menus');

$menu = '';
switch ($tmpTools->getParam(JA_TOOL_MENU)) {
	case 2:
		$menu = "CSSmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 3:
		$menu = "Moomenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 4:
		$menu = "Slidemenu";
		$japarams->set('minwidth', 80);
		$japarams->set('maxwidth', 180);
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 5:
		$menu = "Transmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 6:
		$menu = "DLmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	default:
		$menu = "Splitmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
}
$menuclass = "JA_$menu";
$jamenu = new $menuclass ($japarams);
//menu icon
 if ($tmpTools->getParam(JA_TOOL_ICONMENU)){
$japarams_2 = new JParameter('');
$japarams_2->set( 'menupath', $tmpTools->templateurl() .'/ja_menus');
$japarams_2->set( 'menutype', 'othermenu' );
$japarams_2->set( 'level', 0 );
$japarams_2->set( 'icon_big', 64 );
$japarams_2->set( 'icon_small', 64 );
$japarams_2->set( 'menu_height', 80 );
$japarams_2->set( 'anim_int', 20 );
$japarams_2->set( 'anim_change', 15 );
$japarams_2->set( 'icon_padding', 4 );
$menu_icon='';
$menu_icon="IconMenu";
include_once(dirname(__FILE__).DS.'ja_menus'.DS.'Iconmenu.class.php');

}
$menuiconclass="JA_$menu_icon";
$jamenuicon=new $menuiconclass ($japarams_2);
//end
$hasSubnav = false;
if (($jamenu->hasSubMenu (1) && $tmpTools->getParam(JA_TOOL_MENU) == 1) || $tmpTools->getParam(JA_TOOL_MENU) == 6) 
	$hasSubnav = true;
//End for main navigation




# Auto Collapse Divs Functions ##########
$ja_left = $this->countModules('left') || ($hasSubnav);
$ja_right = $this->countModules('right');

if ( $ja_left && $ja_right ) {
	$divid = '';
	} elseif ( $ja_left ) {
	$divid = '-fr';
	} elseif ( $ja_right ) {
	$divid = '-fl';
	} else {
	$divid = '-f';
}

$msie='/msie\s(5\.[5-9]|[6]\.[0-9]*).*(win)/i';
$supported_browsers = !isset($_SERVER['HTTP_USER_AGENT']) ||
	!preg_match($msie,$_SERVER['HTTP_USER_AGENT']) ||
	preg_match('/opera/i',$_SERVER['HTTP_USER_AGENT']);

?>
