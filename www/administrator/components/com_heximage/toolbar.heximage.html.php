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

class menuheximage {

  function ADMIN_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }	
  function CONFIG_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::save( 'savesettings', 'Save' );
    mosMenuBar::spacer();
    mosMenuBar::endTable();
   }
  function MENU_album() {
	mosMenuBar::startTable();
    mosMenuBar::back();	
	mosMenuBar::custom('upload_thumb', 'upload.png', 'upload_f2.png', 'Upload',false);		
	mosMenuBar::divider();	
	mosMenuBar::publishList('publish_album');
	mosMenuBar::unpublishList('unpublish_album');
	mosMenuBar::divider();
	mosMenuBar::addNew('new_album');
	mosMenuBar::editList('edit_album');
	mosMenuBar::deleteList('','remove_album');
	mosMenuBar::spacer();
	mosMenuBar::endTable();
	}		
  function MENU_Edit_album() {
	mosMenuBar::startTable();
    mosMenuBar::back();	
	mosMenuBar::save( 'save_album', 'Save' );
//	mosMenuBar::cancel( 'cancel_album', 'Cancel album' );
	mosMenuBar::spacer();
	mosMenuBar::endTable();  
	}	
  function MENU_photo() {
	mosMenuBar::startTable();
    mosMenuBar::back();
	mosMenuBar::custom('upload_thumb', 'upload.png', 'upload_f2.png', 'Upload',false);	
	mosMenuBar::divider();
	mosMenuBar::publishList('publish_photo');
	mosMenuBar::unpublishList('unpublish_photo');
	mosMenuBar::divider();
	mosMenuBar::addNew('new_photo');
	mosMenuBar::editList('edit_photo');
	mosMenuBar::deleteList('','remove_photo');
	mosMenuBar::spacer();
	mosMenuBar::endTable();
	}	
  function MENU_Edit_photo() {
	mosMenuBar::startTable();
    mosMenuBar::back();
	mosMenuBar::save( 'save_photo', 'Save' );
//	mosMenuBar::cancel( 'cancel_photo', 'Cancel photo' );
	mosMenuBar::spacer();
	mosMenuBar::endTable();  
	}	
  function MENU_uploadthumb() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }	
  function MENU_uploadthumb2() {
    mosMenuBar::startTable();
    mosMenuBar::back();
	mosMenuBar::save( 'save_photo', 'Save' );	
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }	  

//  function MENU_database() {
//    mosMenuBar::startTable();
//    mosMenuBar::back();
//    mosMenuBar::spacer();
//    mosMenuBar::endTable();
//  }	  
  function ABOUT_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }	
}
?>
