<?php
// $Id: admin.events.php,v 1.11 2005/11/30 10:39:10 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// dmcd May 7/04 fix for accessing registered categories in backend
$gid = $my->gid;

//require_once("includes/auth.php");
require_once($mosConfig_absolute_path ."/components/".$option."/events.class.php");

require_once( $mainframe->getPath( 'admin_html' ) );
$cid = mosGetParam( $_POST, 'cid', array(0) );
$option = mosGetParam( $_REQUEST, 'option', 'com_events');
//$sectionid = mosGetParam( $_REQUEST, 'sectionid', 0 );

// CHECK LANGUAGE
if (!defined( '_CAL_LANG_INCLUDED' )) {
    if (file_exists($mosConfig_absolute_path ."/components/com_events/language/".$mosConfig_lang.".php") ) { 
        include_once($mosConfig_absolute_path ."/components/com_events/language/".$mosConfig_lang.".php");
    } else { 
        include_once($mosConfig_absolute_path ."/components/com_events/language/english.php");
    }
}

// dmcd Aug 6/04.  DB Patches for upgraded component
// Check the Events Table to see if the new useCatColor field is in
// If not dynamically insert it now

    $database->setQuery("SELECT useCatColor FROM #__events");
    if(!$database->query()){
     	// dmcd go add the NEW FIELD NOW
	    $database->setQuery("ALTER TABLE #__events ADD useCatColor TINYINT(1) NOT NULL DEFAULT '0' AFTER color_bar");
	    if(!$database->query()){
		    // trouble, maybe 'ALTER' SQL command disabled?
	        ?> alert('DV alter table error:\n' + '<?php echo $database->errorMsg; ?>'); <?php
		}
     }
     //xdebug_break();
     $database->setQuery("SHOW TABLES");
     $tables = $database->loadResultArray();
	if($tables && array_search($database->_table_prefix.'events_categories', $tables)===false){
		// ok need to create new table
		$database->setQuery("CREATE TABLE IF NOT EXISTS #__events_categories ".
			"(id INT(12) NOT NULL DEFAULT 0 PRIMARY KEY, color VARCHAR(8) NOT NULL DEFAULT '')");
		$database->query();
		// create table entries for any existing event categories
		$database->setQuery( "SELECT id FROM #__categories"
		. "\nWHERE section='$option' ORDER BY ordering" );
        	$cats = $database->loadObjectList();
		foreach($cats as $cat){
			$database->setQuery("INSERT INTO #__events_categories VALUES (".$cat->id.", '')");
			$database->query();
		}
    	}

// check to see if the old admin submenu entry for 'Manage Events Categories' is present
// change it so it links to new event categories code.  Only problem here is admin user will have
// to go into events config or 'manage events' before attempting to view event categories to make the change
$database->setQuery("SELECT admin_menu_link FROM #__components WHERE name='Manage Events Categories'");
$category_link = $database->loadResult();
if($category_link != "option=com_events&act=categories"){
	// fix the link to the new code
	$database->setQuery("UPDATE #__components SET admin_menu_link='option=com_events&act=categories' WHERE name='Manage Events Categories' LIMIT 1");
	$database->query();
}
	
// dmcd May 20/04, new files to handle event categories due to further
// customization beyond MOS core.  Therefore I have split up the file
// to include only the necessary code.

if($act == 'categories' )
	require_once($mosConfig_absolute_path ."/administrator/components/com_events/admin.events.categories.php");
else
	require_once($mosConfig_absolute_path ."/administrator/components/com_events/admin.events.main.php");


