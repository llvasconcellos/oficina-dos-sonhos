<?php
// $Id: admin.events.main.php,v 1.11 2005/11/30 10:39:10 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
switch ($act) {
      case "conf":
           include_once("components/".$option."/events_config.php");
           $filename = stripslashes("../components/com_events/events_css.css");
      	   if ($fp = fopen( $filename, "r" )) {
		$config_style = fread( $fp, filesize( $filename ) );
		$config_style = htmlspecialchars( $config_style );
		DEFINE("_CAL_CONF_STYLE", $config_style);
		fclose ($fp);
	   } else {
		mosRedirect( "index2.php?option=$option&mosmsg=Operation Failed: Could not open $filename" );
	   }

      	   HTML_events::showConfig($option,
      	                             _CAL_CONF_ADMINMAIL,
      	                             _CAL_CONF_STARDAY,
      	                             _CAL_CONF_ADMINLEVEL,
      	                             _CAL_CONF_MAILVIEW,
      	                             _CAL_CONF_BYVIEW,
				     _CAL_CONF_HITSVIEW,
                                     _CAL_CONF_REPEATVIEW,
      	                             _CAL_CONF_DATEFORMAT,
      	                             _CAL_CONF_NAVBARCOLOR,
      	                             _CAL_CONF_STARTVIEW,
      	                             _CAL_CONF_STYLE,
      	                             _CAL_CONF_DEFCOLOR,
      	                             
				    _MOD_CAL_DISPLASTMONTH,
				    _MOD_CAL_DISPLASTMONTHDAYS,
				    _MOD_CAL_DISPNEXTMONTH,
				    _MOD_CAL_DISPNEXTMONTHDAYS,
				    _MOD_LATEST_MAXEVENTS,
				    _MOD_LATEST_MODE,
				    _MOD_LATEST_DAYS,
				    _MOD_LATEST_NOREPEAT,
				    _MOD_LATEST_DISPLAYLINKS,
				    _MOD_LATEST_DISPLAYYEAR,
				    _MOD_LATEST_CUSTFMTSTR,
				    _MOD_LATEST_DISDATESTYLE,
				    _MOD_LATEST_DISTITLESTYLE,
				    _CAL_SIMPLE_EVENT_FORM,
				    _CAL_FORCE_CAT_COLOR_EVENT_FORM,
					_CAL_CONF_EVENT_LIST_ROWS_PPG,
					_CAL_USE_STD_TIME,
					_CAL_CONF_FRONTENDPUBLISH
      	                             );
      break;

      case "missingconf":
           $config_style = "";
	   include_once("components/".$option."/events_config.php");
           missConfig();
	   HTML_events::showConfig($option,
      	                             _CAL_CONF_ADMINMAIL,
      	                             _CAL_CONF_STARDAY,
      	                             _CAL_CONF_ADMINLEVEL,
      	                             _CAL_CONF_MAILVIEW,
      	                             _CAL_CONF_BYVIEW,
				     _CAL_CONF_HITSVIEW,
                                     _CAL_CONF_REPEATVIEW,
      	                             _CAL_CONF_DATEFORMAT,
      	                             _CAL_CONF_NAVBARCOLOR,
      	                             _CAL_CONF_STARTVIEW,
      	                             _CAL_CONF_STYLE,
      	                             _CAL_CONF_DEFCOLOR,
				    _MOD_CAL_DISPLASTMONTH,
				    _MOD_CAL_DISPLASTMONTHDAYS,
				    _MOD_CAL_DISPNEXTMONTH,
				    _MOD_CAL_DISPNEXTMONTHDAYS,
				    _MOD_LATEST_MAXEVENTS,
				    _MOD_LATEST_MODE,
				    _MOD_LATEST_DAYS,
				    _MOD_LATEST_NOREPEAT,
				    _MOD_LATEST_DISPLAYLINKS,
				    _MOD_LATEST_DISPLAYYEAR,
				    _MOD_LATEST_CUSTFMTSTR,
				    _MOD_LATEST_DISDATESTYLE,
				    _MOD_LATEST_DISTITLESTYLE,
				    _CAL_SIMPLE_EVENT_FORM,
				    _CAL_FORCE_CAT_COLOR_EVENT_FORM,
					_CAL_CONF_EVENT_LIST_ROWS_PPG,
					_CAL_USE_STD_TIME,
					_CAL_CONF_FRONTENDPUBLISH
      	                             );
      break;

      case "missingcss":
	   $config_style = "";
	   include_once("components/".$option."/events_config.php");
           missCss();
	   HTML_events::showConfig($option,
      	                             _CAL_CONF_ADMINMAIL,
      	                             _CAL_CONF_STARDAY,
      	                             _CAL_CONF_ADMINLEVEL,
      	                             _CAL_CONF_MAILVIEW,
      	                             _CAL_CONF_BYVIEW,
				     _CAL_CONF_HITSVIEW,
                                     _CAL_CONF_REPEATVIEW,
      	                             _CAL_CONF_DATEFORMAT,
      	                             _CAL_CONF_NAVBARCOLOR,
      	                             _CAL_CONF_STARTVIEW,
      	                             _CAL_CONF_STYLE,
      	                             _CAL_CONF_DEFCOLOR,
				    _MOD_CAL_DISPLASTMONTH,
				    _MOD_CAL_DISPLASTMONTHDAYS,
				    _MOD_CAL_DISPNEXTMONTH,
				    _MOD_CAL_DISPNEXTMONTHDAYS,
				    _MOD_LATEST_MAXEVENTS,
				    _MOD_LATEST_MODE,
				    _MOD_LATEST_DAYS,
				    _MOD_LATEST_DISPLAYLINKS,
				    _MOD_LATEST_DISPLAYYEAR,
				    _MOD_LATEST_CUSTFMTSTR,
				    _MOD_LATEST_DISDATESTYLE,
				    _MOD_LATEST_DISTITLESTYLE,
				    _CAL_SIMPLE_EVENT_FORM,
				    _CAL_FORCE_CAT_COLOR_EVENT_FORM,
					_CAL_CONF_EVENT_LIST_ROWS_PPG,
					_CAL_USE_STD_TIME,
					_CAL_CONF_FRONTENDPUBLISH
        	                             );
      break;

      default:

	switch ($task) {
		case "saveconfig":
                	saveConfig ($option);
                	break;

        	case "cancelconfig":
                	mosRedirect("index2.php?option=$option", '');
                	break;

		case "new":
			include_once("components/".$option."/events_config.php");
			editEvents( $option, 0 );
			break;

		case "edit":
			include_once("components/".$option."/events_config.php");
			editEvents( $option, $cid[0] );
			break;

		case "save":
			include_once("components/".$option."/events_config.php");
			saveEvents( $option );
			break;

		case "remove":
			removeEvents( $cid, $option );
			break;

		case "publish":
			changeEvents( $id, $cid, 1, $option );
			break;

		case "unpublish":
			changeEvents( $id, $cid, 0, $option );
			break;

        	case "approve":
			break;

		case "cancel":
			cancelEvents($option);
			break;

		default:
			viewEvents( $option );
		break;
	}
	// CHECK CONFIG
	include_once("components/".$option."/events_config.php");
	if (_CAL_CONF_ADMINMAIL == "your@mail.com"){
	        mosRedirect( "index2.php?option=$option&act=conf&mosmsg=Go to EVENTS CONFIG SECTION first and change EMAIL adress." );
	}
      break;
}

/**
* Compiles a list of installed or defined modules
* @param database A database connector object
*/
function viewEvents( $option ) {
	global $database, $mainframe;

	$catid = $mainframe->getUserStateFromRequest( "catid{$option}", 'catid', 0 );
	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
	$search = $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
	$search = $database->getEscaped( trim( strtolower( $search ) ) );
	$where = array();

	if ($catid > 0) {
		$where[] = "a.catid='$catid'";
	}
	if ($search) {
		$where[] = "LOWER(a.title) LIKE '%$search%'";
	}

	// get the total number of records
	$database->setQuery( "SELECT count(*) FROM #__events AS a"
	. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
	);
	$total = $database->loadResult();
	echo $database->getErrorMsg();

	if ($limit > $total) {
		$limitstart = 0;
	}

	$where[] = "a.catid=cc.id";

	$database->setQuery( "SELECT a.*, cc.name AS category, u.name AS editor, g.name AS groupname"
		. "\nFROM #__events AS a, #__categories AS cc"
		. "\nLEFT JOIN #__users AS u ON u.id = a.checked_out"
		. "\nLEFT JOIN #__groups AS g ON g.id = a.access"
		. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY a.catid"
		//. "\nAND a.state ASC"
		. "\nLIMIT $limitstart,$limit"
	);

	$rows = $database->loadObjectList();
  	//echo $database->getErrorMsg();
        if ($database->getErrorNum()) {
	    echo $database->stderr();
	    return false;
        }

	// get list of categories
	$categories[] = mosHTML::makeOption( '0', _CAL_LANG_EVENT_CHOOSE_CATEG );
	$categories[] = mosHTML::makeOption( '-1', '- '._CAL_LANG_EVENT_ALLCAT );
	$database->setQuery( "SELECT id AS value, title AS text FROM #__categories"
		. "\nWHERE section='$option' ORDER BY ordering" );
	$categories = array_merge( $categories, $database->loadObjectList() );

	$clist = mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"',
	'value', 'text', $catid );

	/*$section = new mosSection( $database );
	$section->load( $sectionid );
	*/
	include_once("includes/pageNavigation.php");
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );

	HTML_events::showEvents( $rows, $clist, $search, $pageNav, $option );

}


/**
* Compiles information to add or edit the record
* @param database A database connector object
* @param integer The unique id of the record to edit (0 if new)
* @param integer The id of the content section
*/
function editEvents( $option, $eventid ) {
	global $database, $my;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;

	$row = new mosEvents( $database );
	// load the row from the db table
	$row->load( $eventid );

	// get list of categories
	//$categories[] = mosHTML::makeOption( '0', _CAL_LANG_EVENT_CHOOSE_CATEG );
	$database->setQuery( "SELECT id AS value, name AS text FROM #__categories"
		. "\nWHERE section='$option' ORDER BY ordering" );
	//$categories = array_merge( $categories, $database->loadObjectList() );
        $categories = $database->loadObjectList();
	if (count( $categories ) < 1) {
		mosRedirect( "index2.php?option=categories&section=$option",
			'You must add a category for this section first.' );
	}


	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out <> $my->id) {
		mosRedirect( "index2.php?option=$option",
		"The module $row->title is currently being edited by another administrator" );
	}

	if ($eventid) {
	    $mode = 'modify';
            $row->checkout( $my->id );

		if (trim( $row->images )) {
			$row->images = explode( "\n", $row->images );
		} else {
			$row->images = array();
		}

		if (trim( $row->publish_down ) == "0000-00-00 00:00:00") {
			$row->publish_down = "Never";
		}
        $event_up = new mosEventDate( $row->publish_up );	        
	    $start_publish = sprintf( "%4d-%02d-%02d",$event_up->year,$event_up->month,$event_up->day);
	    $start_time = $event_up->hour .":". $event_up->minute;
	        	
	    $event_down = new mosEventDate( $row->publish_down );	        
	    $stop_publish = sprintf( "%4d-%02d-%02d",$event_down->year,$event_down->month,$event_down->day);
	    $end_time = $event_down->hour .":". $event_down->minute;

	        $row->reccurday_month = 99;
                $row->reccurday_week = 99;
                $row->reccurday_year = 99;

                if ($row->reccurday <> ""){
                    if ($row->reccurtype == 1) {
                        $row->reccurday_week = $row->reccurday;
                    } elseif ($row->reccurtype == 3) {
                        $row->reccurday_month = $row->reccurday;
                    } elseif ($row->reccurtype == 5) {
                        $row->reccurday_year = $row->reccurday;
                    }
                }
	} else {
		$mode='new';
                $row->state = 0;
		$row->images = array();
        $start_publish = strftime( "%Y-%m-%d", time()+($mosConfig_offset*60*60) );
        $stop_publish = strftime( "%Y-%m-%d", time()+($mosConfig_offset*60*60) ); 
        $start_time = "08:00";
        $end_time = "17:00";
		$row->color_bar = mosEventsHTML::getColorBar(null,'');

		$row->reccurday_month = -1;
                $row->reccurday_week = -1;
                $row->reccurday_year = -1;
	}

	// get list of images
	$imgFiles = mosReadDirectory( "$mosConfig_absolute_path/images/stories" );
	$images = array();
	$folders = array();
	$folders[] = mosHTML::makeOption( "/" );
	foreach ($imgFiles as $file) {
		if (is_dir( "$mosConfig_absolute_path/images/stories/$file" )) {
			$folders[] = mosHTML::makeOption( "/$file" );
			$folder = mosReadDirectory( "$mosConfig_absolute_path/images/stories/$file" );
			foreach ($folder as $file2) {
				if (eregi( "bmp|gif|jpg|png", $file2 )
						&& is_file( "$mosConfig_absolute_path/images/stories/$file/$file2" )) {
					$images["/$file"][] = mosHTML::makeOption( "$file/$file2" );
				}
			}

		} else if (eregi( "bmp|gif|jpg|png", $file )
				&& is_file( "$mosConfig_absolute_path/images/stories/$file" )) {
			$images['/'][] = mosHTML::makeOption( $file );
		}
	}

	$ilist = mosHTML::selectList( $images['/'], 'imagefiles', "class=\"inputbox\" size=\"10\" multiple=\"multiple\""
	. " onchange=\"previewImage('imagefiles','view_imagefiles','$mosConfig_live_site/images/stories/')\"",
	'value', 'text', null );

	$folderlist = mosHTML::selectList( $folders, 'folders', "class=\"inputbox\" size=\"1\" "
	."onchange=\"changeDynaList('imagefiles',folderimages,document.adminForm.folders.options[document.adminForm.folders.selectedIndex].value, 0, 0)\"",
	'value', 'text', '/' );

	// make the list of saved images
	$images2 = array();
	foreach ($row->images as $file) {
		$temp = explode( '|', $file );
		$images2[] = mosHTML::makeOption( $file, $temp[0] );
	}

	$i2list = mosHTML::selectList( $images2, 'imagelist', "class=\"inputbox\" size=\"10\""
	. " onchange=\"showImageProps('$mosConfig_live_site/images/stories/')\"",
	'value', 'text', null );

	// make the select list for the image positions
	$pos[] = mosHTML::makeOption( 'left' );
	$pos[] = mosHTML::makeOption( 'center' );
	$pos[] = mosHTML::makeOption( 'right' );

	// build the html select list
	$poslist = mosHTML::selectList( $pos, '_align', 'class="inputbox" size="3"',
	'value', 'text', null );


	// get list of groups
	$database->setQuery( "SELECT id AS value, name AS text FROM #__groups ORDER BY id" );
	$groups = $database->loadObjectList();

	// build the html select list
	$glist = mosHTML::selectList( $groups, 'access', 'class="inputbox" size="1"',
	'value', 'text', intval( $row->access ) );

	$creator="";
	$modifier="";
	if ($eventid) {
	    $database->setQuery( "SELECT name from #__users"
		               . "\nWHERE id=$row->created_by"
	                       );
	    $creator = $database->loadResult();

	    $database->setQuery( "SELECT name from #__users"
		               . "\nWHERE id=$row->modified_by"
	                       );
	    $modifier = $database->loadResult();
	}
			
	
	// dmcd May 20/04  fetch the new category colors from the '#__events_category' db table
	$database->setQuery( "SELECT * from #__events_categories");
	$catColors = $database->loadObjectList('id');
		
	$section = 0; // NO YET IMPLEMENTED
	HTML_events::editEvents( $row,  $start_publish, $stop_publish, $start_time, $end_time, $section, 
							$glist, $folderlist, $images, $ilist, $i2list, $poslist,
	                         $my->id, $creator, $modifier, $option, $mode, $catColors );
}

/**
* Saves the content item an edit form submit
* @param database A database connector object
*/
function saveEvents( $option ) {
	global $mosConfig_offset, $my, $database; 
       
    $start_time= mosGetParam( $_POST, 'start_time', '08:00' );    
	$start_pm= intval( mosGetParam( $_POST, 'start_pm', '0' ) );
    $end_time= mosGetParam( $_POST, 'end_time', '17:00' );    
	$end_pm= intval( mosGetParam( $_POST, 'end_pm', '0' ) );
	
	$reccurweekdays = mosGetParam( $_POST, 'reccurweekdays', '' );
	$reccurweeks = mosGetParam( $_POST, 'reccurweeks', '' );
	$reccurday_week = mosGetParam( $_POST, 'reccurday_week', '' );
	$reccurday_month = mosGetParam( $_POST, 'reccurday_month', '' );		
    $reccurday_year = mosGetParam( $_POST, 'reccurday_year', '' );	
        
	$row = new mosEvents( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if(is_null($row->useCatColor)) $row->useCatColor = 0;
	
	if ($row->id) {
		$row->modified = strftime( "%Y-%m-%d %H:%M:%S", time()+($mosConfig_offset*60*60));
		   //date( "Y-m-d H:i:s" );
		if ($my->id) {$row->modified_by = $my->id;}
	} else {
		$row->created = strftime( "%Y-%m-%d %H:%M:%S", time()+($mosConfig_offset*60*60));
		   //date( "Y-m-d H:i:s" );
		if ($my->id) {$row->created_by = $my->id;}
	}
	        
        if ($row->catid){
	    $row->catid = intval( $row->catid );
	}
	
			
	
	// reformat the time into 24hr format if necessary
	if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME =="YES"){
		list($hrs,$mins) = explode(":", $start_time);
		$hrs = intval($hrs);
		$mins = intval($mins);
		if ($hrs != 12 && $start_pm) $hrs += 12;
		else if ($hrs == 12 && !$start_pm) $hrs = 0;
	    	if ($hrs < 10) $hrs = '0'.$hrs;
		if($mins < 10) $mins = '0'.$mins;
		$start_time = $hrs.':'.$mins;
		
		list($hrs,$mins) = explode(":", $end_time);
		$hrs = intval($hrs);
		$mins = intval($mins);
		if ($hrs!= 12 && $end_pm) $hrs += 12;
		else if ($hrs == 12 && !$end_pm) $hrs = 0;
	    	if ($hrs < 10) $hrs = '0'.$hrs;
		if($mins < 10) $mins = '0'.$mins;
		$end_time = $hrs.':'.$mins;
	}
	
	if ($row->publish_up) {
		$publishtime = $row->publish_up." ".$start_time.":00";		                         
	    $row->publish_up = strftime("%Y-%m-%d %H:%M:%S",strtotime($publishtime));
	} else {	
	   $row->publish_up = strftime( "%Y-%m-%d 00:00:00", time()+($mosConfig_offset*60*60));
	       //date( "Y-m-d 00:00:00" );
	}
	
	if ($row->publish_down) {
		$publishtime = $row->publish_down." ".$end_time.":00";			     
	        $row->publish_down = strftime("%Y-%m-%d %H:%M:%S",strtotime($publishtime));
	} else {
	     $row->publish_down = strftime( "%Y-%m-%d 23:59:59", time()+($mosConfig_offset*60*60));
	         //date( "Y-m-d 23:59:59" );
	}	
		        
        if ($row->publish_up <> $row->publish_down) {
	    $row->reccurtype = intval( $row->reccurtype );                      	    	    
	} else {
            $row->reccurtype = 0;                      	    
        }
	
if ($row->reccurtype == 0) {
            $row->reccurday = "";
        } elseif ($row->reccurtype == 1) {
            $row->reccurday =  $reccurday_week;
        } elseif ($row->reccurtype == 2) {                    	
            $row->reccurday = "";
        } elseif ($row->reccurtype == 3) {                    	
            $row->reccurday = $reccurday_month;
        } elseif ($row->reccurtype == 4) {                    	
            $row->reccurday = "";
        } elseif ($row->reccurtype == 5) {                    	
            $row->reccurday = $reccurday_year;
        }	
		
	// Reccur week days		
	if ($reccurweekdays == "") {		
	    $weekdays = "";
	} else {	    	
	    $weekdays = implode( '|', $reccurweekdays );
	}
        $row->reccurweekdays = $weekdays;
        
        // Reccur viewable weeks
        if ($reccurweeks == "") {		
	    $weekweeks = "";
	} else {	    
	    $weekweeks = implode( '|', $reccurweeks );	    
	}
	$row->reccurweeks = $weekweeks;

// MLr: commenting out fixes bug #2959 ($access not defined - only in front end code
/*	
	// Always unpublish if no Publisher otherwise publish automatically
	if (!$access->canPublish) {
		$row->state = 0;
	} else {
		$row->state = 1;
	}   
*/
	// dmcd - nov 16/04  if this is a new event, publish it, otherwise retain its state
    if(!$row->id) $row->state = 1;
	
	$row->mask = 0;
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "catid='$row->catid' AND state >= 0" );

	// Update Category Count
	$database->setQuery( "UPDATE #__categories SET count=count+1"
	. "\nWHERE id = $row->catid"
	);
	if (!$database->query()) {
		echo "<script> alert('".$database->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	$return2cat = intval( mosGetParam( $_POST, 'return2cat', 0 ) );
	mosRedirect( "index2.php?option=$option&catid=$return2cat" );
}

/**
* Changes the state of one or more content pages
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function changeEvents( $id=null, $cid=null, $state=0, $option ) {
	global $database, $my, $catid;

	if (!is_array( $cid )) {
		$cid = array();
	}
	if ($id) {
		$cid[] = $id;
	}

	if (count( $cid ) < 1) {
		$action = $publish == 1 ? 'publish' : ($publish == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$cids = implode( ',', $cid );

        $database->setQuery( "UPDATE #__events SET state='$state'"
	. "\nWHERE id IN ($cids) AND (checked_out=0 OR (checked_out='$my->id'))"
	);
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosEvents( $database );
		$row->checkin( $cid[0] );
	}

	mosRedirect( "index2.php?option=$option&catid=$catid" );
}

function removeEvents( $cid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	}
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		//Get Category ID prior to removing content, in order to update counts
		$database->setQuery( "SELECT catid FROM #__events WHERE id IN ($cids)" );
		$catid = $database->loadResult();
		$database->setQuery( "DELETE FROM #__events WHERE id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}

	// Update Category Count
	$database->setQuery( "UPDATE #__categories SET count=count-1"
	. "\nWHERE id = $catid"
	);
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	mosRedirect( "index2.php?option=$option" );
}

/**
* Cancels an edit operation
* @param database A database connector object
*/
function cancelEvents($option) {
	global $database;

	$row = new mosEvents( $database );
	$row->bind( $_POST );
	$row->checkin();
	$return2cat = intval( mosGetParam( $_POST, 'return2cat', 0 ) );
	mosRedirect( "index2.php?option=$option&catid=$return2cat" );
}


//////////////////////////////////////// CONFIG /////////////////////////////////////
function saveConfig ($option) {
   //Options
	$conf_adminmail = trim( strtolower( mosGetParam( $_POST, 'conf_adminmail', '' ) ) );
	$conf_starday = intval(mosGetParam( $_POST, 'conf_starday', 1) );
	$conf_adminlevel = intval(mosGetParam( $_POST, 'conf_adminlevel', 0) );
	$conf_mailview = trim(mosGetParam( $_POST, 'conf_mailview', 'YES') );
	$conf_frontendPublish = trim(mosGetParam( $_POST, 'conf_frontendPublish', 'YES') );
	$conf_byview = trim(mosGetParam( $_POST, 'conf_byview', 'YES') );
	$conf_hitsview = trim(mosGetParam( $_POST, 'conf_hitsview', 'YES') );
	$conf_repeatview = trim(mosGetParam( $_POST, 'conf_repeatview', 'YES') );
	$conf_dateformat = intval(mosGetParam( $_POST, 'conf_dateformat', 0) );
	$conf_navbarcolor = trim(mosGetParam( $_POST, 'conf_navbarcolor', 'green') );
	$conf_startview = trim(mosGetParam( $_POST, 'conf_startview', 'view_month') );
	$conf_style = mosGetParam( $_POST, 'conf_style', '' );
	$conf_defColor = trim(mosGetParam( $_POST, 'conf_defColor', 'random') );
	
// dmcd May 10/04  added new config parameters for the events cal and latest mods

	$conf_modCalDispLastMonth = trim(mosGetParam( $_POST, 'conf_modCalDispLastMonth', "NO") );
	$conf_modCalDispLastMonthDays = intval(mosGetParam( $_POST, 'conf_modCalDispLastMonthDays', 0 ));
	$conf_modCalDispNextMonth = trim(mosGetParam( $_POST, 'conf_modCalDispNextMonth', "NO") );
	$conf_modCalDispNextMonthDays = intval(mosGetParam( $_POST, 'conf_modCalDispNextMonthDays', 0 ));
	$conf_modLatestMaxEvents = intval(mosGetParam( $_POST, 'conf_modLatestMaxEvents', 5 ));
	$conf_modLatestMode = intval(mosGetParam( $_POST, 'conf_modLatestMode', 0 ));
	$conf_modLatestDays = intval(mosGetParam( $_POST, 'conf_modLatestDays', 7 ));
	$conf_modLatestDispLinks = trim(mosGetParam( $_POST, 'conf_modLatestDispLinks', "NO"));
	$conf_modLatestNoRepeat = trim(mosGetParam( $_POST, 'conf_modLatestNoRepeat', "NO"));
	$conf_modLatestDispYear = trim(mosGetParam( $_POST, 'conf_modLatestDispYear', "NO"));
	$conf_modLatestDisDateStyle = trim(mosGetParam( $_POST, 'conf_modLatestDisDateStyle', "NO"));
	$conf_modLatestDisTitleStyle = trim(mosGetParam( $_POST, 'conf_modLatestDisTitleStyle', "NO"));

	$conf_modLatestCustFmtStr  = mosGetParam( $_POST, 'conf_modLatestCustFmtStr', '', _MOS_ALLOWHTML|_MOS_NOTRIM);
        // need to escape any '$' char used for fields, lest php will attempt to parse it.
	$conf_modLatestCustFmtStr = preg_replace("/\\$\{/", '\\\\\${', $conf_modLatestCustFmtStr);
	$conf_calSimpleEventForm = trim(mosGetParam( $_POST, 'conf_calSimpleEventForm', "NO"));
	$conf_calForceCatColorEventForm = trim(mosGetParam( $_POST, 'conf_calForceCatColorEventForm', "NO"));
	$conf_calEventListRowsPpg = intval(mosGetParam( $_POST, 'conf_calEventListRowsPpg', 20 ));
	$conf_calUseStdTime = trim(mosGetParam( $_POST, 'conf_calUseStdTime', "NO") );

      $configfile = "components/".$option."/events_config.php";
      $cssfile = "../components/".$option."/events_css.css";
      clearstatcache();
	  @chmod ($cssfile, 0766);
      @chmod ($configfile, 0766);
      $csspermission = is_writable($cssfile);
      //$configpermission = is_writable($configfile);
      $configpermission = true;
      if (!$configpermission) {
         // $mosmsg = "Config File Not writeable";
          mosRedirect("index2.php?option=$option&act=missingconf");
          break;
      }
      if (!$csspermission) {
         // $mosmsg = "Config File Not writeable";
          mosRedirect("index2.php?option=$option&act=missingcss");
          break;
      }
         $configtxt = "<?php\n";
         $configtxt .= "DEFINE(\"_CAL_CONF_ADMINMAIL\", \"".$conf_adminmail."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_STARDAY\", ".$conf_starday.");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_ADMINLEVEL\", ".$conf_adminlevel.");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_MAILVIEW\", \"".$conf_mailview."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_FRONTENDPUBLISH\", \"".$conf_frontendPublish."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_BYVIEW\", \"".$conf_byview."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_HITSVIEW\", \"".$conf_hitsview."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_REPEATVIEW\", \"".$conf_repeatview."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_DATEFORMAT\", ".$conf_dateformat.");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_NAVBARCOLOR\", \"".$conf_navbarcolor."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_STARTVIEW\", \"".$conf_startview."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_DEFCOLOR\", \"".$conf_defColor."\");\n";

// dmcd May 10/04  added new config parameters for the events cal and latest mods

	 $configtxt .= "DEFINE(\"_MOD_CAL_DISPLASTMONTH\", \"".$conf_modCalDispLastMonth."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_CAL_DISPLASTMONTHDAYS\", \"".$conf_modCalDispLastMonthDays."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_CAL_DISPNEXTMONTH\", \"".$conf_modCalDispNextMonth."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_CAL_DISPNEXTMONTHDAYS\", \"".$conf_modCalDispNextMonthDays."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_MAXEVENTS\", \"".$conf_modLatestMaxEvents."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_MODE\", \"".$conf_modLatestMode."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_DAYS\", \"".$conf_modLatestDays."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_NOREPEAT\", \"".$conf_modLatestNoRepeat."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_DISPLAYLINKS\", \"".$conf_modLatestDispLinks."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_DISPLAYYEAR\", \"".$conf_modLatestDispYear."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_CUSTFMTSTR\", \"".$conf_modLatestCustFmtStr."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_DISDATESTYLE\", \"".$conf_modLatestDisDateStyle."\");\n";
	 $configtxt .= "DEFINE(\"_MOD_LATEST_DISTITLESTYLE\", \"".$conf_modLatestDisTitleStyle."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_SIMPLE_EVENT_FORM\", \"".$conf_calSimpleEventForm."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_FORCE_CAT_COLOR_EVENT_FORM\", \"".$conf_calForceCatColorEventForm."\");\n";
	 $configtxt .= "DEFINE(\"_CAL_CONF_EVENT_LIST_ROWS_PPG\", \"". $conf_calEventListRowsPpg. "\");\n";
	 $configtxt .= "DEFINE(\"_CAL_USE_STD_TIME\", \"". $conf_calUseStdTime. "\");\n";
     $configtxt .= "?>\n";

         if ($fp = fopen("$configfile", "w+")) {
           fputs($fp, $configtxt, strlen($configtxt));
           fclose ($fp);
         }
         // Css save
         $csstxt = $conf_style;
         if ($fp = fopen("$cssfile", "w+")) {
           fputs($fp, $csstxt, strlen($csstxt));
           fclose ($fp);
         }
      $mosmsg = "Config is saved !";
      mosRedirect("index2.php?option=$option&act=conf",$mosmsg);
}

function missConfig() {
      echo "<center><h1><font color=red>Warning...</FONT></h1><BR>";
      echo "<B>You need to chmod config file to 766 in order for the config to be updated</B></center><BR><BR>";
}

function missCss() {
      echo "<center><h1><font color=red>Warning...</FONT></h1><BR>";
      echo "<B>You need to chmod CSS file to 766 in order for the config to be updated</B></center><BR><BR>";
}

function defaultConfig() {
?>
<script language="javascript" type="text/javascript">
		function defaultConfig() {
var style = (""
  +  "\n"+"/*********************"
  +  "\n"+"* Calendar style"
  +  "\n"+"**********************/"
  +  "\n"+".cal_table {"
  +  "\n"+"   border: 1px solid #000000;"
  +  "\n"+"}"
  +  "\n"+".cal_td_daysnames {"
  +  "\n"+"    border-bottom: 1px solid #000000;"
  +  "\n"+"}"
  +  "\n"+".cal_daysnames {"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: #000000;"
  +  "\n"+"    text-decoration: none"
  +  "\n"+"}"
  +  "\n"+".cal_td_daysoutofmonth {"
  +  "\n"+"    background-color: #B0C4DE;"
  +  "\n"+"}"
  +  "\n"+".cal_daysoutofmonth {"
  +  "\n"+"    font-family:  Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    line-height: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: #000000;"
  +  "\n"+"    text-decoration: none"
  +  "\n"+"}"
  +  "\n"+".cal_td_today {"
  +  "\n"+"    background-color:#E9B4A1;"
  +  "\n"+"}"
  +  "\n"+".cal_td_daysnoevents {"
  +  "\n"+"    background-color: #FFDEAD;"
  +  "\n"+"}"
  +  "\n"+"a.cal_daylink:link {"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: #000000;"
  +  "\n"+"    text-decoration: none"
  +  "\n"+"}"
  +  "\n"+"a.cal_daylink:visited{"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: #000000;"
  +  "\n"+"    text-decoration: none"
  +  "\n"+"}"
  +  "\n"+"a.cal_daylink:hover{"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: Red;"
  +  "\n"+"    text-decoration: none"
  +  "\n"+"}"
  +  "\n"+"a.cal_titlelink:link {"
  +  "\n"+"    font-size:8px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color:white;"
  +  "\n"+"}"
  +  "\n"+"a.cal_titlelink:visited  {"
  +  "\n"+"    font-size:8px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color:white;"
  +  "\n"+"}"
  +  "\n"+"a.cal_titlelink:hover  {"
  +  "\n"+"    font-size:8px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color:white;"
  +  "\n"+"}"
  +  "\n"+""
  +  "\n"+"/***************************"
  +  "\n"+"* List style"
  +  "\n"+"**************************/"
  +  "\n"+"a.ev_link_cat:link {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_cat:visited  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_cat:hover  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Black;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_row:link {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_row:visited  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_row:hover  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Black;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_unpublished {"
  +  "\n"+"    color:red;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_weekday:link {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_weekday:visited  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Gray;"
  +  "\n"+"}"
  +  "\n"+"a.ev_link_weekday:hover  {"
  +  "\n"+"    font-size:12px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Black;"
  +  "\n"+"}"
  +  "\n"+".ev_fieldset {"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+".ev_table {"
  +  "\n"+"    border-right: 1px solid black;"
  +  "\n"+"    border-left: 1px solid black;"
  +  "\n"+"    border-bottom: 1px solid black;"
  +  "\n"+"}"
  +  "\n"+".ev_td_right {"
  +  "\n"+"    background-color: #FFFFFF;"
  +  "\n"+"    border-top: 1px solid #000000;"
  +  "\n"+"}"
  +  "\n"+".ev_td_left {"
  +  "\n"+"    background-color: #c5d5e5;"
  +  "\n"+"    border-right: 1px solid #000000;"
  +  "\n"+"    border-top: 1px solid #000000;"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: normal;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+".ev_td_today {"
  +  "\n"+"    background-color: #E9B4A1;"
  +  "\n"+"    border-right: 1px solid #000000;"
  +  "\n"+"    border-top: 1px solid #000000;"
  +  "\n"+"    font-family: Arial;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    font-style: normal;"
  +  "\n"+"    font-weight: normal;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+""
  +  "\n"+"/**********************"
  +  "\n"+"* Form style"
  +  "\n"+"**********************/"
  +  "\n"+" /* Styles for dhtml tabbed-pages */"
  +  "\n"+".ontab {"
  +  "\n"+"    font-family : Verdana, Arial, Helvetica, sans-serif;"
  +  "\n"+"    font-size: 10px;"
  +  "\n"+"    background-color: ThreedShadow;"
  +  "\n"+"    border-left: outset 1px #ff9900;"
  +  "\n"+"    border-right: outset 1px #808080;"
  +  "\n"+"    border-top: outset 1px #ff9900;"
  +  "\n"+"    border-bottom: solid 1px #d5d5d5;"
  +  "\n"+"    text-align: center;"
  +  "\n"+"    cursor: hand;"
  +  "\n"+"    font-weight: bold;"
  +  "\n"+"    color: #FFFFFF;"
  +  "\n"+"}"
  +  "\n"+".offtab {"
  +  "\n"+"	font-family : Verdana, Arial, Helvetica, sans-serif;"
  +  "\n"+"	font-size: 10px;"
  +  "\n"+"	background-color: #EEEEEE;"
  +  "\n"+"	border-left: outset 1px #E0E0E0;"
  +  "\n"+"	border-right: outset 1px #E0E0E0;"
  +  "\n"+"	border-top: outset 1px #E0E0E0;"
  +  "\n"+"	border-bottom: solid 1px #d5d5d5;"
  +  "\n"+"	text-align: center;"
  +  "\n"+"	cursor: hand;"
  +  "\n"+"	font-weight: normal;"
  +  "\n"+"}"
  +  "\n"+".tabpadding {"
  +  "\n"+"	border-bottom: solid 0px #777777;"
  +  "\n"+"}"
  +  "\n"+".tabheading {"
  +  "\n"+"	background-color: #ffae00;"
  +  "\n"+"	border-left: solid 1px #777777;"
  +  "\n"+"	border-right: solid 1px #777777;"
  +  "\n"+"	color: #FFFFFF;"
  +  "\n"+"	font-family : Verdana, Arial, Helvetica, sans-serif;"
  +  "\n"+"	font-size: 10pt;"
  +  "\n"+"	text-align: left;"
  +  "\n"+"}"
  +  "\n"+".tabcontent {"
  +  "\n"+"    background-color: ThreedFace;"
  +  "\n"+"    border-top: solid 1px #777777;"
  +  "\n"+"    border-left: solid 1px #777777;"
  +  "\n"+"    border-right: solid 1px #777777;"
  +  "\n"+"    border-bottom: solid 1px #777777;"
  +  "\n"+"    color: #FFFFFF;"
  +  "\n"+"    font-family : Verdana, Arial, Helvetica, sans-serif;"
  +  "\n"+"    font-size: 10pt;"
  +  "\n"+"    text-align: left;"
  +  "\n"+"}"
  +  "\n"+".pagetext {"
  +  "\n"+"	visibility: hidden;"
  +  "\n"+"   display: none;"
  +  "\n"+"	position: relative;"
  +  "\n"+"	top: 0;"
  +  "\n"+"}"
  +  "\n"+".frm_td_bydays {"
  +  "\n"+"    background-color: #FFF8DC;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+".frm_td_byweeks {"
  +  "\n"+"    background-color: #FFF0F5;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+".frm_td_bymonth {"
  +  "\n"+"    background-color: #FDF5E6;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+".frm_td_byyear {"
  +  "\n"+"    background-color: #F0F8FF;"
  +  "\n"+"    font-size: 12px;"
  +  "\n"+"    color: black;"
  +  "\n"+"}"
  +  "\n"+"/**********************"
  +  "\n"+"* Nav bar style"
  +  "\n"+"**********************/"
  +  "\n"+"a.nav_bar_link:link {"
  +  "\n"+"    font-size: 10px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Green;"
  +  "\n"+"}"
  +  "\n"+"a.nav_bar_link:visited  {"
  +  "\n"+"    font-size:10px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Teal;"
  +  "\n"+"}"
  +  "\n"+"a.nav_bar_link:hover  {"
  +  "\n"+"    font-size:10px;"
  +  "\n"+"    font-family: Verdana;"
  +  "\n"+"    color: Lime;"
  +  "\n"+"}");

 adminForm.conf_adminmail.value = "your@mail.com";
 adminForm.conf_starday.value = 1;
 adminForm.conf_adminlevel.value = 0;
 adminForm.conf_mailview.value = "YES";
 adminForm.conf_byview.value = "YES";
 adminForm.conf_hitsview.value = "YES";
 adminForm.conf_repeatview.value = "YES";
 adminForm.conf_dateformat.value = 1;
 adminForm.conf_navbarcolor.value = "green";
 adminForm.conf_startview.value = "view_month";
 adminForm.conf_style.value = style;
 adminForm.conf_defColor.value = "Random";

 adminForm.conf_modCalDispLastMonth.value =  "NO"
 adminForm.conf_modCalDispLastMonthDays.value = "0"
 adminForm.conf_modCalDispNextMonth.value =  "NO"
 adminForm.conf_modCalDispNextMonthDays.value = "0"
 adminForm.conf_modLatestMaxEvents.value = 5
 adminForm.conf_modLatestMode.value = 0
 adminForm.conf_modLatestDays.value = 7
 adminForm.conf_modLatestNoRepeat.value =  "NO"
 adminForm.conf_modLatestDispLinks.value =  "NO"
 adminForm.conf_modLatestDispYear.value =  "NO"
 adminForm.conf_modLatestCustFmtStr.value = ""
 adminForm.conf_modLatestDisDateStyle.value =  "NO"
 adminForm.conf_modLatestDisTitleStyle.value = "NO"
 adminForm.conf_calSimpleEventForm.value = "NO"
 adminForm.conf_calForceCatColorEventForm = "NO"
 adminForm.conf_calUseStdTime = "NO"
 adminForm.conf_calEventListRowsPpg = 20

 }
</script>
<?php
}
?>
