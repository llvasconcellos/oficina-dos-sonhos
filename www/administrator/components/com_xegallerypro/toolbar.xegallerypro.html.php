<?php

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class menuxegallerypro {



  function NEW_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save();

    mosMenuBar::cancel();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }  
  
  function NEW_CTG_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save("savecatg");

    mosMenuBar::cancel("cancelcatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function EDIT_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save();

    mosMenuBar::cancel();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }


  function EDIT_CTG_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save("savecatg");

    mosMenuBar::cancel("cancelcatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function DEFAULT_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::addNew();

    mosMenuBar::editList();

    mosMenuBar::deleteList();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }

  function CTG_MENU() {

    mosMenuBar::startTable();
    
    mosMenuBar::publishList("publishcatg");

    mosMenuBar::unpublishList("unpublishcatg");


    
    mosMenuBar::addNew("newcatg");

    mosMenuBar::editList("editcatg");

    mosMenuBar::deleteList("","removecatg");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }
  
  function XEMAIN_MENU() {

    mosMenuBar::startTable();
    
    mosMenuBar::publishList("publish");

    mosMenuBar::unpublishList("unpublish");


    mosMenuBar::divider();

    mosMenuBar::divider();
        
    mosMenuBar::addNew("new");

    mosMenuBar::editList("edit");

    mosMenuBar::deleteList("","remove");

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function CONFIG_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::save( 'savesettings', 'Save Settings' );

    mosMenuBar::back();

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



  function COMMENTS_MENU() {

    mosMenuBar::startTable();

    mosMenuBar::publishList( 'publishcmt', 'Publish Comment' );

    mosMenuBar::unpublishList( 'unpublishcmt', 'Unpublish Comment' );

    mosMenuBar::divider();

    mosMenuBar::deleteList( ' ', 'removecmt', 'Remove Comment' );

    mosMenuBar::spacer();

    mosMenuBar::endTable();

  }



}

?>