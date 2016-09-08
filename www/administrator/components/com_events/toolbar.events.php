<?php 
// $Id: toolbar.events.php,v 1.3 2004/08/16 19:38:18 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

switch ( $act ) {
        case "conf":		
		menuEvents::CONF_MENU();//$option
		break;	
        
        default:
          switch ( $task ) {
                case "new":                
	  	      menuEvents::NEW_MENU(); //$option
	        	break;
	
		case "edit":		
			menuEvents::EDIT_MENU();//$option
			break;	              
	
		default:
			menuEvents::DEFAULT_MENU();//$option
			break;
	  }
}
?>