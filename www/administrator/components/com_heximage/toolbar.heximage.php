<?php
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/


// ensure this file is being included by a parent file
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );

switch($task) {
	case "new": 
	case "admin": 
		menuheximage::ADMIN_MENU();
		break;
	// Album task	
	case "album": 
		menuheximage::MENU_album();
		break;
	case "new_album": 
		menuheximage::MENU_Edit_album();
		break;
	case "edit_album": 
		 menuheximage::MENU_Edit_album();
		 break;
	// Photo task		 				
	case "photo": 
		 menuheximage::MENU_photo();
		 break;	
	case "new_photo": 
		menuheximage::MENU_Edit_photo();
		break;
	case "edit_photo": 
		 menuheximage::MENU_Edit_photo();
		 break;
    // About tasks
	case "about":
         menuheximage::ABOUT_MENU();
         break;
	// Configuration tasks
	  case "config":
        menuheximage::CONFIG_MENU();
        break;
	// Upload & Create thumb tasks
	  case "upload_thumb":
        menuheximage::MENU_uploadthumb();
        break;		
	  case "upload_thumb2":
        menuheximage::MENU_uploadthumb2();
        break;		
	//Default
	default:
		menuheximage::MENU_photo();
		break;
		
}
?>
