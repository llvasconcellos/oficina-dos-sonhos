<?php
// $Id: toolbar.events.html.php,v 1.3 2004/08/16 19:38:18 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
Class menuEvents {
	function CONF_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::save('saveconfig');
		mosMenuBar::cancel('cancelconfig');
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	
	function NEW_MENU() { 
		mosMenuBar::startTable();
		mosMenuBar::preview( 'contentwindow' );
		mosMenuBar::divider();
		mosMenuBar::save();
		mosMenuBar::divider();
		mosMenuBar::media_manager();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();	
	}
	
	function EDIT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::preview( 'contentwindow' );
		mosMenuBar::divider();
		mosMenuBar::save();
		mosMenuBar::divider();
		mosMenuBar::media_manager();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();	
	}

	function DEFAULT_MENU() {
		mosMenuBar::startTable();		
		mosMenuBar::publishList(); 
		mosMenuBar::unpublishList();		
		mosMenuBar::divider();		
		mosMenuBar::addNew(); 
		mosMenuBar::editList(); 
		mosMenuBar::deleteList();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
}?>