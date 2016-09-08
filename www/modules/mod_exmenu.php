<?php
/**
* @version 1.0.3
* @author Daniel Ecer
* @package exmenu_1.0.3
* @copyright (C) 2005-2006 Daniel Ecer (de.siteof.de)
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Notice: some parts are based on the default mainmenu module.
* Beside this it were havily redesigned to separate module from view. 
*/

if (!defined('_VALID_MOS')) {
	if (isset($_POST['url'])) {
		// redirect to url (used for select list)
		
		// Set flag that this is a parent file
		define( '_VALID_MOS', 1 );
		
		include_once('../globals.php' );
		require_once('../configuration.php' );
		require_once('../includes/mambo.php' );
		
		$url	= mosGetParam($_POST, 'url', '');
		if ($url != '') {
			$url		= trim(str_replace(array('\r', '\n', '\t'), ' ', $url));
			if ($url != '') {
				if (strpos($url, ':') === FALSE) {	// relative URL?
					$url		= $mosConfig_live_site.'/'.$url;
				}
				mosRedirect($url);
			}
		}
	}
	
	/** ensure this file is being included by a parent file */
	die('Direct Access to this location is not allowed.');
}

// requested module allows to include other modules without immediately displaying them
if (!isset($requestedModule)) {
	$requestedModule	= 'exmenu';
}

if (!defined( '_EXTENDED_MENU_INCLUDED_' )) {
	/** ensure that functions are declared only once */
	define( '_EXTENDED_MENU_INCLUDED_', 1 );

	if (!defined('EXTENDED_MENU_HOME')) {
		define('EXTENDED_MENU_HOME', dirname(__FILE__).'/exmenu');
	}
	require_once(constant('EXTENDED_MENU_HOME').'/exmenu.class.php');	
}

if ((isset($params)) && ($requestedModule == 'exmenu')) {
	if ((isset($module)) && (is_object($module)) && (isset($module->title))) {
		$params->def('title', $module->title);
	}
	ExtendedMenuModule::showModule($params);
}

?>