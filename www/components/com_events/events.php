<?php
//if ( function_exists("asdbg_break") ) {
//asdbg_break();
//}

// $Id: events.php,v 1.50 2005/12/07 19:51:49 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2005 Eric Lamette, Dave McDonnelle, Geraint Edwards
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// ################################################################
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################


/*************************************************
*
* CORE
*
**************************************************/
include_once("administrator/components/".$option."/events_config.php");
//include_once("includes/debuglib.php");

// SOMES VARIABLES
$option = mosGetParam( $_REQUEST, 'option', 'com_events');
$task = mosGetParam( $_REQUEST, 'task', _CAL_CONF_STARTVIEW);
$mode = mosGetParam( $_REQUEST, 'mode', 'com_events');
$limit = intval( mosGetParam( $_REQUEST, 'limit', '' ) );
$limitstart = intval( mosGetParam( $_REQUEST, 'limitstart', 0 ) );

$offset = intval( mosGetParam( $_REQUEST, 'offset', 0 ) );
$catid = intval( mosGetParam( $_REQUEST, 'catid', 0 ) );
$agid = intval( mosGetParam( $_REQUEST, 'agid', 0 ) );
$keyword = mosGetParam( $_REQUEST, 'keyword', '' );
$goodexit = mosGetParam( $_REQUEST, 'goodexit', 0 );
$Itemid= mosGetParam( $_REQUEST, 'Itemid', '' );

$pop = mosGetParam( $_REQUEST, 'pop', 0 );

// SET LOCAL
$year = intval( mosGetParam( $_REQUEST, 'year', strftime("%Y", time()+($mosConfig_offset*60*60)) ));
$month = intval( mosGetParam( $_REQUEST, 'month', strftime("%m", time()+($mosConfig_offset*60*60)) ));
$day = intval( mosGetParam( $_REQUEST, 'day', strftime("%d", time()+($mosConfig_offset*60*60)) ));

if ($day<="9"&ereg("(^[1-9]{1})",$day)) {
        $day="0$day";
}
if ($month<="9"&ereg("(^[1-9]{1})",$month)) {
        $month="0$month";
}

// SOMES INCLUDES
require_once( $mainframe->getPath( 'front_html' ) );
if (!class_exists("mosEvents")) {
        require_once( $mainframe->getPath( 'class' ) );
}

// paging must be implemented
//require_once( "includes/pageNavigation.php" );

// PREVENT Itemid MISSING
if (!isset($Itemid) || empty($Itemid)){
    $database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=$option'");
    $_REQUEST['Itemid'] = $database->loadResult();   
} 
$Itemid = intval( mosgetParam( $_REQUEST, 'Itemid') );

// CHECK LANGUAGE
if (!defined( '_CAL_LANG_INCLUDED' )) {
    if (file_exists("components/com_events/language/".$mosConfig_lang.".php") ) { 
        include_once("components/com_events/language/".$mosConfig_lang.".php");
    } else { 
        include_once("components/com_events/language/english.php");
    }
}

// CHECK ACCESS
$gid = intval( $my->gid );
$username = $my->username;
$is_event_editor = 0;
// override standard MOS ACLs with Events Config settings
if (( _CAL_CONF_ADMINLEVEL == 0) && ( strtolower($my->usertype) == 'registered')) {
    $is_event_editor = 1;
} elseif ( _CAL_CONF_ADMINLEVEL == 2 && ( strtolower($my->usertype) == '')) {
    $is_event_editor = 1;
} else {
    $is_event_editor = (strtolower($my->usertype) == 'author' || strtolower($my->usertype) == 'publisher' 
    || strtolower($my->usertype) == 'editor' || strtolower($my->usertype) == 'manager' || strtolower($my->usertype) == 'administrator' 
    || strtolower($my->usertype) == 'super administrator' );
}


// Editor usertype check
$access = new stdClass();
$access->canEdit = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'all' );
$access->canEditOwn = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'own' );
$access->canPublish = $acl->acl_check( 'action', 'publish', 'users', $my->usertype, 'content', 'all' );

// cache
$now = date( 'Y-m-d H:i', time() + $mosConfig_offset * 60 * 60 );
// cache activation
$cache =& mosCache::getCache( 'com_events' );

//////////////////////////////////////////////////////////////////// 
//  FONCTIONS
////////////////////////////////////////////////////////////////////
function sendAdminMail($adminName, $adminEmail, $subject='', $title='', $content='', $author='', $live_site, $modifylink) {
    $headers = "";	
    $content .= "\r\nEvents submited from : $live_site by $author";
    // currently do not have event id since the save process needs to be reordered
    //$content .= "\r\nEdit : $modifylink";
    eval ("\$content = \"$content\";");
    /*
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "From: ".$adminName." <".$adminEmail.">\r\n";
    $headers .= "Reply-To: <".$adminEmail.">\r\n";
    $headers .= "X-Priority: 3\r\n"; 
    $headers .= "X-MSMail-Priority: Low\r\n";    
    $headers .= "X-Mailer: Mambo Open Source 4.5\r\n";
    @mail($adminEmail, $subject, $content, $headers);
    */
	
	// mail function
	//mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $email, $subject, $msg );
	mosMail( $adminEmail, $adminName, $adminEmail, $subject, $content );
	// Using the global email settings
	//mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $adminEmail, $subject, $content );   
}

function saveEvent( $db ) {
	global $mosConfig_offset, $access, $my, $is_event_editor, $Itemid, $option; 
       
    $start_time= mosGetParam( $_POST, 'start_time', '08:00' );    
	$start_pm= intval( mosGetParam( $_POST, 'start_pm', '0' ) );
    $end_time= mosGetParam( $_POST, 'end_time', '17:00' );    
	$end_pm= intval( mosGetParam( $_POST, 'end_pm', '0' ) );
	
	$reccurweekdays = mosGetParam( $_POST, 'reccurweekdays', '' );
	$reccurweeks = mosGetParam( $_POST, 'reccurweeks', '' );
	$reccurday_week = mosGetParam( $_POST, 'reccurday_week', '' );
	$reccurday_month = mosGetParam( $_POST, 'reccurday_month', '' );		
    $reccurday_year = mosGetParam( $_POST, 'reccurday_year', '' );	
        
	$row = new mosEvents( $db );
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
	
	$row->title = htmlentities($row->title);
		
	// Clean content
	$row->content = preg_replace("'<script[^>]*?>.*?</script>'si", "", $row->content);
	$row->content = preg_replace("'<head[^>]*?>.*?</head>'si", "", $row->content);
	$row->content = preg_replace("'<body[^>]*?>.*?</body>'si", "", $row->content);
	$row->content = str_replace('&','&amp;',$row->content);
	$row->content = html_entity_decode($row->content);

	
	// Clean adresse
	$row->adresse_info = preg_replace("'<script[^>]*?>.*?</script>'si", "", $row->adresse_info);
	$row->adresse_info = preg_replace("'<head[^>]*?>.*?</head>'si", "", $row->adresse_info);
	$row->adresse_info = preg_replace("'<body[^>]*?>.*?</body>'si", "", $row->adresse_info);
	$row->adresse_info = str_replace('&','&amp;',$row->adresse_info);
	$row->adresse_info = strip_tags ($row->adresse_info);		
	$row->adresse_info = htmlspecialchars($row->adresse_info,ENT_QUOTES);
	
	// Clean contact
	$row->contact_info = preg_replace("'<script[^>]*?>.*?</script>'si", "", $row->contact_info);
	$row->contact_info = preg_replace("'<head[^>]*?>.*?</head>'si", "", $row->contact_info);
	$row->contact_info = preg_replace("'<body[^>]*?>.*?</body>'si", "", $row->contact_info);
	$row->contact_info = str_replace('&','&amp;',$row->contact_info);
	$row->contact_info = strip_tags ($row->contact_info);		
	$row->contact_info = htmlspecialchars($row->contact_info,ENT_QUOTES);
	
	// Clean extra
	$row->extra_info = preg_replace("'<script[^>]*?>.*?</script>'si", "", $row->extra_info);
	$row->extra_info = preg_replace("'<head[^>]*?>.*?</head>'si", "", $row->extra_info);
	$row->extra_info = preg_replace("'<body[^>]*?>.*?</body>'si", "", $row->extra_info);
	$row->extra_info = str_replace('&','&amp;',$row->extra_info);
	$row->extra_info = strip_tags ($row->extra_info);
	$row->extra_info = htmlspecialchars($row->extra_info,ENT_QUOTES);
	
	$row->created_by_alias = htmlentities($row->created_by_alias);				
			
	
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
	
	// Always unpublish if no Publisher otherwise publish automatically
	// dmcd nov 16/04 if this is a modified event rather than a new one,
    // reflect whatever change the user has made to the publish state?
    if ($row->state == ''){
		if (!$access->canPublish)
			$row->state = 0;
		else
			$row->state = 1;
	}   
		
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
	// Update Category Count
	$db->setQuery( "UPDATE #__categories SET count = count+1 WHERE id = '$row->catid'");
        
        $returnlink = "index.php?option=$option&Itemid=$Itemid";
		
		if ($access->canPublish) {
        	mosRedirect("$returnlink", _CAL_LANG_ACT_MODIFIED);
		} else {
			mosRedirect("$returnlink", _CAL_LANG_ACT_ADDED);
		}
}

function removeEvent( $agid ) { 
    global $database, $option, $Itemid;

    //Get Category ID prior to removing event, in order to update counts
    $database->setQuery( "SELECT catid FROM #__events WHERE id = '$agid'" );
    $catid = $database->loadResult();
    $database->setQuery( "DELETE FROM #__events WHERE id = '$agid'" );
    if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    }
    
    // Update Category Count
    $database->setQuery( "UPDATE #__categories SET count = count-1 WHERE id = '$catid'" );
    if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
        exit();
    }

    $returnlink = "index.php?option=$option&Itemid=$Itemid";
    mosRedirect("$returnlink", _CAL_LANG_ACT_DELETED);	
}

/* New function to allow Mambelfish to work */
function accessibleCategoryList(){
    global $database, $gid;
    $sqltemp =  "SELECT id from  #__categories AS b WHERE b.access <= $gid";
    $database->setQuery($sqltemp);
    $catlist =  $database->loadObjectList('',false);

    $catListString="-1";
    foreach ($catlist as $tempcat)
      {
	$catListString .= ",".$tempcat->id;
      }
    return  $catListString;
}

function listEventsById ($agid, $includeUnpublished=0) {
    global $database, $gid, $access;
// dmcd May 7/04 added category access condition
//$sql = "SELECT * FROM #__events WHERE id = '$agid' AND state = '1'";  
/*
    $sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
            #__events.id = '$agid' AND #__events.state = '1'";

$database->setQuery($sql);
*/
    if ($access->canPublish && $includeUnpublished)
    	$sql = "SELECT * FROM #__events WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid AND #__events.id = '$agid'";
	else 
		$sql = "SELECT * FROM #__events WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid AND #__events.id = '$agid' AND #__events.state = '1'";
    $database->setQuery($sql);

    $detevent = $database->loadObjectList();
    return $detevent;
}

function listEventsByDate ($select_date) {
    global $database, $gid;    
 
// dmcd May 7/04 added category access condition
/*    $sql = "SELECT * FROM #__events"
		. "\nWHERE ("
		. "\n   (publish_up >= '$select_date 00:00:00' AND publish_up <= '$select_date 23:59:59')"
		. "\n	OR (publish_down >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"
		. "\n	OR (publish_up <= '$select_date 00:00:00' AND publish_down >= '$select_date 23:59:59')"
		. "\n   OR (publish_up >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"  // added RC3
		. "\n )"
		. "\nAND state = '1' ORDER BY publish_up ASC";
*/
/*
    $sql = "SELECT #__events.* FROM #__categories AS b, #__events"
                . "\n WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND"
		. "\n   ((publish_up >= '$select_date 00:00:00' AND publish_up <= '$select_date 23:59:59')"
		. "\n	OR (publish_down >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"
		. "\n	OR (publish_up <= '$select_date 00:00:00' AND publish_down >= '$select_date 23:59:59')"
		. "\n   OR (publish_up >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"  // added RC3
		. "\n )"
		. "\nAND #__events.state = '1' ORDER BY publish_up ASC";
/*
/* GWE change to allow mambelfish to work!*/

    $sql = "SELECT #__events.* FROM #__events"
                . "\n WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid AND"
		. "\n   ((publish_up >= '$select_date 00:00:00' AND publish_up <= '$select_date 23:59:59')"
		. "\n	OR (publish_down >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"
		. "\n	OR (publish_up <= '$select_date 00:00:00' AND publish_down >= '$select_date 23:59:59')"
		. "\n   OR (publish_up >= '$select_date 00:00:00' AND publish_down <= '$select_date 23:59:59')"  // added RC3
		. "\n )"
		. "\nAND #__events.state = '1' ORDER BY publish_up ASC";

    $database->setQuery($sql);   
    $detevent = $database->loadObjectList();        
    return $detevent;
}

function listEventsByMonth ($year,$month,$order) {
    global $database, $gid;    
    $select_date = $year."-".$month."-01 00:00:00";
    $select_date_fin = $year."-".$month."-".date("t",mktime(0,0,0,($month+1),0,$year))." 23:59:59";    
    if (!$order){$order='publish_up';}
// dmcd May 7/04 added category access condition
/*
    $sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
           (((publish_up >= '$select_date%' AND publish_up <= '$select_date_fin%') 
            OR (publish_down >= '$select_date%' AND publish_down <= '$select_date_fin%') 
            OR (publish_up >= '$select_date%' AND publish_down <= '$select_date_fin%') 
            OR (publish_up <= '$select_date%' AND publish_down >= '$select_date_fin%')) 
            AND #__events.state = '1') ORDER BY $order ASC"; //publish_up ASC, reccurtype ASC         
*/
/* GWE change to allow mambelfish to work!*/

    $sql = "SELECT #__events.* FROM #__events"
            . "\n WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid AND"
            . "\n    (((publish_up >= '$select_date%' AND publish_up <= '$select_date_fin%')"
            . "\n    OR (publish_down >= '$select_date%' AND publish_down <= '$select_date_fin%')"
            . "\n    OR (publish_up >= '$select_date%' AND publish_down <= '$select_date_fin%')"
            . "\n    OR (publish_up <= '$select_date%' AND publish_down >= '$select_date_fin%')"
            . "\n )"
            . "\n AND #__events.state = '1') ORDER BY $order ASC"; //publish_up ASC, reccurtype ASC         
  
    $database->setQuery($sql);
    $detevent = $database->loadObjectList();
    return $detevent;
}

// listEventsByWeek NOT USED
/*
function listEventsByWeek ($year,$month,$day,$offset) {
    global $database;   
    
    $rows_per_page=20;  
    if (empty($offset) || !$offset) $offset=1;
    $from = ($offset-1) * $rows_per_page;    
    
    $limit = "LIMIT $from, $rows_per_page";       
    
    $startday = _CAL_CONF_STARDAY;    
    $numday=((date("w",mktime(0,0,0,$month,$day,$year))-$startday)%7);               
    if ($numday == -1){
       $numday = 6;
    } 
    $week_start = mktime (0, 0, 0, $month, ($day - $numday), $year );      
    $week_end = $week_start + ( 3600 * 24 * 6 );
    $startdate = date ( "Y-m-d 00:00:00", $week_start );
    $enddate = date ( "Y-m-d 23:59:59", $week_end );
   
    $sql = "SELECT * FROM #__events 
            WHERE ((publish_up >= '$startdate%' AND publish_up <= '$enddate%') 
            OR (publish_down >= '$startdate%' AND publish_down <= '$enddate%') 
            OR (publish_up >= '$startdate%' AND publish_down <= '$enddate%') 
            OR (publish_down >= '$enddate%' AND publish_up <= '$startdate%')) 
            AND state = '1' ORDER BY publish_up ASC $limit";      
    
    $database->setQuery($sql);
    $detevent = $database->loadObjectList();
    return $detevent;
}
*/

function listEventsByYear ($year, $limitstart, $limit) {
    global $database, $gid;
        
    $rows_per_page = $limit;
    if (empty($limitstart) || !$limitstart) $limitstart=0;
    
    $limit = "LIMIT $limitstart, $rows_per_page";       
        
// dmcd May 7/04 added category access condition
/*
    $sql = "SELECT * FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
            publish_up LIKE '$year%' AND (publish_down >= '$year%' OR publish_down = '0000-00-00 00:00:00')
            AND #__events.state = '1' ORDER BY publish_up ASC $limit"; 
*/
/* GWE change to allow mambelfish to work!*/

    $sql = "SELECT * FROM #__events"
            . "\n WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid AND"
            . "\n    publish_up LIKE '$year%' AND (publish_down >= '$year%' OR publish_down = '0000-00-00 00:00:00')"
            . "\n AND #__events.state = '1' ORDER BY publish_up ASC $limit"; 

    $database->setQuery($sql);
    $detevent = $database->loadObjectList();    
    return $detevent;
}

function listEventsByCreator ($creator_id, $limitstart, $limit) {
    global $database, $gid, $access;

    $rows_per_page = $limit;
    if (empty($limitstart) || !$limitstart) $limitstart=0;
    
    $limit = "LIMIT $limitstart, $rows_per_page";
    
    $where = "";      
    if ($creator_id <> "ADMIN"){
    	$where = " AND created_by = '$creator_id' ";
    	
    }
    // dmcd May 7/04 added category access condition
    /*
    $sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
           $where #__events.state='1' ORDER BY publish_up ASC $limit";
    */
    // Show unpublished events too for publishers and above listing events created by others too!
   	$frontendPublish = _CAL_CONF_FRONTENDPUBLISH=="YES";   	
    if ($access->canPublish && $frontendPublish ) 
    $sql = "SELECT * FROM #__events WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid ORDER BY publish_up ASC $limit";
    else  
    $sql = "SELECT * FROM #__events WHERE #__events.catid IN(".accessibleCategoryList().") AND #__events.access <= $gid $where AND #__events.state='1'  ORDER BY publish_up ASC $limit";
    $database->setQuery($sql);
    $detevent = $database->loadObjectList();    
    return $detevent;
}

function listEventsByCat ($catid, $limitstart, $limit) {
    global $database, $gid, $option;
    $rows_per_page = $limit;
    if (empty($limitstart) || !$limitstart) $limitstart=0;
    
    $limit = "LIMIT $limitstart, $rows_per_page";
    
    // dmcd May 7/04  not sure if this is correct, need to look at function caller to see
    if ($catid) {
      /*
        $sql = "SELECT * FROM #__categories AS b,#__events
                WHERE #__events.catid = '$catid' AND #__events.catid = b.id AND b.access <= $gid AND
                #__events.access <= $gid AND #__events.state = '1' ORDER BY #__events.publish_up ASC $limit";
      */
/* GWE change to allow mambelfish to work!*/

        $sql = "SELECT #__events.* FROM #__events WHERE #__events.catid IN($catid) AND #__events.access <= $gid AND #__events.state = '1' ORDER BY publish_up ASC";

    } else {
/*      
        $sql = "SELECT #__events.* FROM #__categories AS b, #__events
                WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
                b.section='$option' AND b.published='1' AND #__events.state = '1' ORDER BY #__events.publish_up ASC $limit";
 */     
/* GWE change to allow mambelfish to work!*/

        $sql = "SELECT #__events.* FROM #__events 
                WHERE #__events.catid  IN(".accessibleCategoryList().") AND #__events.access <= $gid 
                AND #__events.state = '1' ORDER BY publish_up ASC $limit";

    }

    $database->setQuery($sql);
    $detevent = $database->loadObjectList();
  
    return $detevent;
}

function listEventsByKeyword($keyword,$order,$limit,$limitstart,$useRegX=false) {
    global $database, $gid; 

    $rows_per_page = $limit;
    if (empty($limitstart) || !$limitstart) $limitstart=0;
    
    $limit = "LIMIT $limitstart, $rows_per_page";
    
// dmcd May 7/04, added a FULLTEXT index if not present to events db table for better search
// Note this is really temporary.  Need to add this to the db schema for events table

    if(!$useRegX){
        $sql = "SHOW INDEX FROM #__events";
        $database->setQuery($sql);
        $index = $database->loadObjectList('Key_name');
        if(!array_key_exists('searchIdx',$index) || $index['searchIdx']->Index_type != 'FULLTEXT'){
                // dmcd go add the required index now
                $sql = "ALTER TABLE #__events ADD FULLTEXT searchIdx (title, content)";
                $database->setQuery($sql);
                $database->query();
        }
    }
    
    //$limit = "LIMIT $from, $rows_per_page";
    $limit = "LIMIT $limitstart, $rows_per_page";
    
    if (!$order){$order='publish_up';}
    $order = preg_replace("/[\t ]+/", '', $order);
    $orders = explode(",", $order);
    function app_db ($strng) {return '#__events.' . $strng;}
    $order = implode(",", array_map("app_db", $orders));

    // dmcd May 7/04 added category access condition
//   $sql = "SELECT * FROM #__events WHERE (title LIKE '$keyword' OR content LIKE '$keyword') AND state = '1' ORDER BY $order ASC $limit";  
   $sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND\n";
   $sql .= ($useRegX) ? "(#__events.title RLIKE '$keyword' OR #__events.content RLIKE '$keyword')\n" :
                        "MATCH (#__events.title, #__events.content) AGAINST ('$keyword' IN BOOLEAN MODE)\n";
   $sql .= "AND #__events.state = '1' ORDER BY $order ASC $limit";    

    $database->setQuery($sql);
    $detevent = $database->loadObjectList();
    return $detevent;
}

/* MLr: ugly hack to cope with PHP4/PHP5 differences 
 * concerning use of references (thanks to http://www.acko.net/node/54)
*/
// don't need this for joomla 1.0.x 
 /*
if (version_compare(phpversion(), '5.0') < 0) {
    eval('
    function clone($object) {
      return $object;
    }
    ');
} 
*/
 
function showNavTableBar($year,$month,$day,$option,$task,$Itemid) {
    // this, previous and next date handling
    
    global $mosConfig_offset;
    $datetime = strftime( "%Y-%m-%d %H:%M:%S", time()+($mosConfig_offset*60*60));
    ereg("([0-9]{4})-([0-9]{2})-([0-9]{2})[ ]([0-9]{2}):([0-9]{2}):([0-9]{2})",$datetime,$regs);        
        
    $this_date = new mosEventDate();
    $this_date->setDate( $year, $month, $day );
    
    $today_date = clone($this_date);
    $today_date->setDate( $regs[1], $regs[2], $regs[3] );    
    
    $prev_year = clone($this_date);
    $prev_year->addMonths( -12 );
    $next_year = clone($this_date);
    $next_year->addMonths( +12 );

    $prev_month = clone($this_date);
    $prev_month->addMonths( -1 );
	$next_month = clone($this_date);
    $next_month->addMonths( +1 );

    $prev_week = clone($this_date);
    $prev_week->addDays( -7 );
    $next_week = clone($this_date);
    $next_week->addDays( +7 );

    $prev_day = clone($this_date);
    $prev_day->addDays( -1 );
    $next_day = clone($this_date);
    $next_day->addDays( +1 );
                
    switch ($task) {
        case "view_year":
	    $dates['prev2'] = $prev_year;
            $dates['prev1'] = $prev_year;
            $dates['next1'] = $next_year;
            $dates['next2'] = $next_year;

            $alts['prev2'] = _CAL_LANG_PREVIOUSYEAR;
            $alts['prev1'] = _CAL_LANG_PREVIOUSYEAR;
            $alts['next1'] = _CAL_LANG_NEXTYEAR;
            $alts['next2'] = _CAL_LANG_NEXTYEAR;

            // Show
            HTML_events::viewNavTableBar( $today_date, $this_date, $dates, $alts, $option, $task, $Itemid );
        break;

        case "view_month":
            $dates['prev2'] = $prev_year;
            $dates['prev1'] = $prev_month;
            $dates['next1'] = $next_month;
            $dates['next2'] = $next_year;

            $alts['prev2'] = _CAL_LANG_PREVIOUSYEAR;
            $alts['prev1'] = _CAL_LANG_PREVIOUSMONTH;
            $alts['next1'] = _CAL_LANG_NEXTMONTH;
            $alts['next2'] = _CAL_LANG_NEXTYEAR;

            // Show
            HTML_events::viewNavTableBar( $today_date, $this_date, $dates, $alts, $option, $task, $Itemid );
        break;

        case "view_week":
            $dates['prev2'] = $prev_month;
            $dates['prev1'] = $prev_week;
            $dates['next1'] = $next_week;
            $dates['next2'] = $next_month;

            $alts['prev2'] = _CAL_LANG_PREVIOUSMONTH;
            $alts['prev1'] = _CAL_LANG_PREVIOUSWEEK;
            $alts['next1'] = _CAL_LANG_NEXTWEEK;
            $alts['next2'] = _CAL_LANG_NEXTMONTH;

            // Show
            HTML_events::viewNavTableBar( $today_date, $this_date, $dates, $alts, $option, $task, $Itemid );
        break;

        case "view_day":
        default:
            $dates['prev2'] = $prev_month;
            $dates['prev1'] = $prev_day;
            $dates['next1'] = $next_day;
            $dates['next2'] = $next_month;

            $alts['prev2'] = _CAL_LANG_PREVIOUSMONTH;
            $alts['prev1'] = _CAL_LANG_PREVIOUSDAY;
            $alts['next1'] = _CAL_LANG_NEXTDAY;
            $alts['next2'] = _CAL_LANG_NEXTMONTH;

            // Show
            HTML_events::viewNavTableBar( $today_date, $this_date, $dates, $alts, $option, $task, $Itemid );
        break;
    }
}

function showNavTableText($year, $total, $limitstart, $limit, $task) {         
    global $option, $Itemid;
    if ( ( $total <= $limit ) ) {
	// not visible when they is no 'other' pages to display
        } else {
	// get the total number of records
	$limitstart = $limitstart ? $limitstart : 0;
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );
	$link = 'index.php?option=' .$option. '&amp;task=' .$task. '&amp;year=' .$year. '&amp;Itemid='. $Itemid;
	//echo '<tr>';
	//echo '<td valign="top" align="center">';
        echo  '<center>';
	echo $pageNav->writePagesLinks( $link );
	echo  '</center><br />';
	//echo '</td>';
	//echo '</tr>';
	}
}

function showEventsByYear ($year,$limit,$limitstart) {
    global $database, $option, $Itemid, $gid, $mosConfig_list_limit;    
    
    $sql = "SELECT * FROM #__categories as b, #__events WHERE #__events.catid = b.id  AND b.access <= $gid AND #__events.access <= $gid AND publish_up LIKE '$year%' AND (publish_down >= '$year%' OR publish_down = '0000-00-00 00:00:00') AND #__events.state = '1'";
 
    $database->setQuery($sql);
    $counter = $database->loadObjectList();
    $total = count( $counter );
    
    // MLr: discuss replacing _CAL_CONF_EVENT_LIST_ROWS_PPG with $mosConfig_list_limit
    $limit = $limit ? $limit : _CAL_CONF_EVENT_LIST_ROWS_PPG;

    if ( $total <= $limit ) {
	$limitstart = 0;
	}
    
    $rows = listEventsByYear ($year,$limitstart,$limit);          
    $num_events = count($rows); 
       
    $chdate = "";   	
    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_ARCHIVE."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";       
    if ($num_events>0){
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];            
            
            $event_up = new mosEventDate( $row->publish_up );	        
	    $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
            $event_month_year = $event_up->month . $event_up->year;
	    $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);   
            
            $catid = $row->catid;
	    $catname = mosEventsHTML::getCategoryName($row->catid);
	        
            if (($event_month_year <> $chdate) && $chdate<>""){            	               
                echo "</td>\n";             
            }
            if ($event_month_year <> $chdate){             
                echo "<tr><td width='50' class='ev_td_left'>".mosEventsHTML::getDateFormat($event_up->year,$event_up->month,'',3)."</td>\n";
                echo "<td class='ev_td_right'><ul class='ev_ul'>\n ";
            }             	             
            HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                         
            echo "&nbsp;::&nbsp;";
            HTML_events::viewEventCatRow ($catid,$catname,'view_cat',$event_up->year,$event_up->month,$event_up->day,$option,$Itemid);	    
            $chdate = $event_month_year;
            if ($event_month_year <> $chdate){             
                echo "</ul>\n ";
            }
        }
        
    } else {
        echo "<tr>";
        echo "<td align='left' valign='top' class='ev_td_right'>\n";
        echo _CAL_LANG_NO_EVENTFOR."&nbsp;<b>".$year."</b></td>";
    }   
    echo "</tr></table><br />\n";
    echo "</fieldset><br />\n";
    showNavTableText($year, $total, $limitstart, $limit, 'view_year');
}

function showEventsById ($agid,$year,$month,$day) {
    global $database, $option, $Itemid,$mainframe,$pop;
    // MLr: check if called from detail navigation. if yes, only showEventsByDate make sense
    if (0==$agid) {
	showEventsByDate ($year,$month,$day);
    } else {    	
    $rows = listEventsById ($agid, 1);  // include unpublished events for publishers and above
 
    if ($rows) $row = $rows[0]; else $row=null;
    $num_row = count($row);
    if($num_row){
    	// XXXX - attribs is not part of this table 0 why was this code here ?? 
       //$params =& new mosParameters( $row->attribs );
       $params =& new mosParameters(null);       
       $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);          
        
        $event_up = new mosEventDate( $row->publish_up );	        
	$row->start_date = mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,0);
	$row->start_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_up->get12hrTime() : $event_up->get24hrTime();
		
	        
        $event_down = new mosEventDate( $row->publish_down );	        


        $row->stop_date = mosEventsHTML::getDateFormat($event_down->year,$event_down->month,$event_down->day,0);
	$row->stop_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_down->get12hrTime() : $event_down->get24hrTime();
        
        // jul 8th/04  dmcd - kludge for overnite events, advance the displayed stop_date by 1 day
        // when an overniter is detected
        if($row->stop_time < $row->start_time)
                $event_down->addDays(1);	        
        
	// Parse http and mailto
	$alphadigit = "([a-z]|[A-Z]|[0-9])";
	
	// Adresse
	$row->adresse_info = preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->adresse_info);   	
	$row->adresse_info = preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5$8'>$1$2$5$8</A>", $row->adresse_info); 
  	
  	//Contact
  	$row->contact_info = preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->contact_info);   	
	$row->contact_info = preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5$8'>$1$2$5$8</A>", $row->contact_info); 
  	
	//Extra
	$row->extra_info = preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->extra_info);   	
	//$row->extra_info = preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5'>$1$2$5</A>", $row->extra_info); 
	$row->extra_info = preg_replace('#(http://)([^\s]*)#', '<a href="\\1\\2">\\1\\2</a>', $row->extra_info);
  	
  	//Images
  	// replace the {mosimage} mambots in both text areas
	if ($row->images) {
		$row->images = explode( "\n", $row->images );
		$images = array();

		foreach ($row->images as $img) {
			$temp = explode( '|', trim( $img ) );
			if(!isset($temp[1]))
			$temp[1] = "left";

			if(!isset($temp[2]))
			$temp[2] = "Image";

			if(!isset($temp[3]))
			$temp[3] = "0";

			$images[] = "<img src=\"./images/stories/$temp[0]\" align=\"$temp[1]\" hspace=\"6\" alt=\"$temp[2]\" border=\"$temp[3]\" />";
		}

		$text = explode( '{mosimage}', $row->content );

		$row->content = $text[0];

		for ($i=0, $n=count( $text )-1; $i < $n; $i++) {
			if (isset( $images[$i] )) {
				$row->content .= $images[$i];
			}
			if (isset( $text[$i+1] )) {
				$row->content .= $text[$i+1];
			}
		}
		unset( $text );
	} 
        
 	$mask = $mainframe->getCfg( 'hideAuthor' ) ? MASK_HIDEAUTHOR : 0;
	$mask |= $mainframe->getCfg( 'hideCreateDate' ) ? MASK_HIDECREATEDATE : 0;
	$mask |= $mainframe->getCfg( 'hideModifyDate' ) ? MASK_HIDEMODIFYDATE : 0;

	$mask |= $mainframe->getCfg( 'hidePdf' ) ? MASK_HIDEPDF : 0;
	$mask |= $mainframe->getCfg( 'hidePrint' ) ? MASK_HIDEPRINT : 0;
	$mask |= $mainframe->getCfg( 'hideEmail' ) ? MASK_HIDEEMAIL : 0;

	//$mask |= $mainframe->getCfg( 'vote' ) ? MASK_VOTES : 0;
	$mask |= $mainframe->getCfg( 'vote' ) ? (MASK_VOTES|MASK_VOTEFORM) : 0;
	$mask |= $pop ? MASK_POPUP | MASK_IMAGES | MASK_BACKTOLIST : 0;
	
	// Dynamic Page Title
	$mainframe->SetPageTitle( $row->title );

	HTML_events::viewEventDetail($row, $contactlink, $mask, $params);
        
        $database->setQuery("UPDATE #__events SET hits=(hits+1) WHERE id='$row->id'");
        if (!$database->query()) {
            echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
            exit();
        }            	           	
       
    }
    }
}

function showEventsByDate ($year,$month,$day) {    
    global $database, $option, $Itemid;       
    
    $select_date = sprintf( "%4d-%02d-%02d", $year, $month, $day );
    $rows = listEventsByDate ($select_date);              
    usort($rows, "sortEvents");	
    $num_events = count($rows);        
    $chhours = "";  
    $printcount = 0; 
    $new_rows_events = array();
    
    if ($num_events>0){                	
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];            
                
	    $event_up = new mosEventDate( $row->publish_up );	        
	    $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
	    $start_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_up->get12hrTime() : $event_up->get24hrTime();
	    
                         
	    $new_contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);    
	    $new_catname = mosEventsHTML::getCategoryName($row->catid);
	        	        
	    $checkprint = new mosEventRepeat($row, $year, $month, $day  );
	    if ($checkprint->viewable == true){ 
	        $new_rows_events[] = array($start_time,
	                                   $row->id,
	                                   $row->title,
	                                   $event_up->year,
	                                   $event_up->month,
	                                   $event_up->day,
	                                   $new_contactlink,
	                                   $row->catid,
	                                   $new_catname);	            	                                                                                           
                $printcount++;     
	    }             	           	                           
	} // end for         
    }
    
    //////////////////////////////////// AFFICHAGE DU TABLEAU     
    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_EVENTSFORTHE."&nbsp;".mosEventsHTML::getDateFormat($year,$month,$day,0)."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";       
    if ($new_rows_events) {
    	$num_newevents = count($new_rows_events);           
    } else {
        $num_newevents = 0;
    }
    if ($num_newevents>0){  
   
    //sort ($new_rows_events); // Commenting out fixes bug #2606
    for ($t = 0; $t < $num_newevents; $t++) { 
       list($start_time,
            $id,
            $title,
            $event_year,
            $event_month,
            $event_day,
            $contactlink,
            $catid,
            $catname) =  $new_rows_events[$t];                    
            
            if (($start_time <> $chhours) && $chhours<>""){            	               
	        echo "</ul></td>\n";             
	    }
	    if ($start_time <> $chhours) {  
	        echo "<tr><td align='center' valign='top' width='50' class='ev_td_left'>".$start_time."</td>\n";
	        echo "<td class='ev_td_right'><ul class='ev_ul'>\n";                	                 
	    }	               
	    HTML_events::viewEventRow ($id,$title,'view_detail',$event_year,$event_month,$event_day,$contactlink,$option,$Itemid);                                          	            
	    echo "&nbsp;::&nbsp;";
		HTML_events::viewEventCatRow ($catid,$catname,'view_cat',$year,$month,$day,$option,$Itemid);
	    $chhours = $start_time;
        }      
    } else {   
    	echo "<tr>";
        echo "<td align='left' valign='top' class='ev_td_right'>\n";        
        echo _CAL_LANG_NO_EVENTFORTHE."&nbsp;<b>".mosEventsHTML::getDateFormat($year,$month,$day,0)."</b>";
    } // end if     
      echo "</td></tr></table><br />\n";
      echo "</fieldset><br /><br />\n";
    //  showNavTableText(10, 10, $num_events, $offset, '');                          
}

function showEventsByMonth ($year,$month) {
    global $database, $option, $Itemid, $mosConfig_offset;    
    
    $rows = listEventsByMonth ($year,$month,'publish_up,catid');          
    $num_events = count($rows);    
    $chdate = "";
    $chcat = "";
    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_EVENTSFOR."&nbsp;".mosEventsHTML::getDateFormat($year,$month,'',3)."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";               
         
    if ($num_events>0){    	            
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];            
            
            $event_up = new mosEventDate( $row->publish_up );	        	    	        
            $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
	    $event_day_month_year = $event_up->day . $event_up->month . $event_up->year;
	    $event_day_month = $event_up->day . $event_up->month;
            $catname = mosEventsHTML::getCategoryName($row->catid);        
            
            $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);

            if (($event_day_month_year <> $chdate) && $chdate<>""){            	               
                echo "</td></tr></table></td>\n";         
            }
            
            if ($event_day_month_year <> $chdate){             
                echo "<tr>";
                if( $event_up->month == strftime( "%m", time()+($mosConfig_offset*60*60) ) 
                  && $event_up->year == strftime( "%Y", time()+($mosConfig_offset*60*60) )
                  && $event_up->day == strftime( "%d", time()+($mosConfig_offset*60*60) )
                  ) { 
                    $bg="class='ev_td_today'";
				} else { 
					$bg="class='ev_td_left'"; //ev_td_left
                  }
                echo "<td align='center' valign='top' width='50' ".$bg.">";                
                echo mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,4);
                echo "</td>\n";
                echo "<td align='left' valign='top' class='ev_td_right'>\n";
                echo "<table align='center' width='100%' cellspacing='0' cellpadding='0'>";
                echo "<tr><td align='center' valign='top' width='80'>"; // class='ev_td_left'>";
                $chcat = "";
            }     
            if (($row->catid <> $chcat) && $chcat <> ""){            	               
                echo "</td></tr>\n";             
            }
            if ($row->catid <> $chcat) {                             
                echo "<tr><td align='left' valign='top' width='80'>"; // class='ev_td_left'
                echo "<b>";
                HTML_events::viewEventCatRow ($row->catid,$catname,'view_cat',$event_up->year,$event_up->month,$event_up->day,$option,$Itemid);
                echo "</b>&nbsp;::&nbsp;</td>\n";
				echo "<td align='left' valign='top'><ul class='ev_ul'>\n"; // class='ev_td_right'>\n";
            }
                            
            if ($row->reccurtype == 5){ //each year                                   
                if ($month == $event_day_month) {                                                                                       	                       	                                    	                                                                              
                    HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                                                         
                } else {
                    echo "&nbsp;";
                }	 
            } else {
            	HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                                                                                               
            }
            $chcat = $row->catid;  
            $chdate = $event_day_month_year;
        } 
        echo "</ul></td></tr></table>\n";   
    } else {    	
    	//echo "<tr>";
        //echo "<td align='left' valign='top' class='ev_td_right'>\n";        
        echo _CAL_LANG_NO_EVENTFOR."&nbsp;<b>".mosEventsHTML::getDateFormat($year,$month,'',3)."</b>"; 
    } // end if  
      
      echo "</td></tr></table><br />\n";
      echo "</fieldset><br /><br />\n";  
      //showNavTableText(10, 10, $num_events, 1, $option, 'view_year', $Itemid);                
}

function showEventsByWeek ($year,$month,$day) {
    global $mosConfig_offset, $database, $option, $Itemid;    
    
    // Other methode to investigate
    //$rows = listEventsByWeek ($year,$month,$day,$offset);          
    //$max_events = count($rows);    
       
    $startday = _CAL_CONF_STARDAY;    
    $numday=((date("w",mktime(0,0,0,$month,$day,$year))-$startday)%7);               
    if ($numday == -1){
       $numday = 6;
    } 
    $week_start = mktime (0, 0, 0, $month, ($day - $numday), $year );          
       
    $this_date = new mosEventDate();
    $this_date->setDate(  strftime("%Y", $week_start ), strftime("%m", $week_start ), strftime("%d", $week_start ));                
    //$this_date->setDate( date ( "Y", $week_start ),date ( "m", $week_start ),date ( "d", $week_start ));        
    $this_enddate = clone($this_date);
    $this_enddate->addDays( +6 );
        
    $startdate =  mosEventsHTML::getDateFormat($this_date->year,$this_date->month,$this_date->day ,1);
    $enddate =  mosEventsHTML::getDateFormat($this_enddate->year,$this_enddate->month,$this_enddate->day ,1);

    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_EVENTSFOR."&nbsp;"._CAL_LANG_WEEK." : ".$startdate." - ".$enddate."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";       
    $this_currentdate = clone($this_date);
    for ($d = 0; $d < 7; $d++) {
        if ($d > 0) {
    	    $this_currentdate->addDays( +1 );    	   
    	} 
    	$week_day = sprintf( "%02d", $this_currentdate->day);
        $week_month = sprintf( "%02d", $this_currentdate->month);
        $week_year = sprintf( "%4d", $this_currentdate->year);   	
    	 
        $day_link = '<a class="ev_link_weekday" href="index.php?option='.$option.'&amp;task=view_day&amp;year='.$week_year.'&amp;month='.$week_month.'&amp;day='.$week_day.'&amp;Itemid='.$Itemid.'">'.mosEventsHTML::getDateFormat($week_year,$week_month,$week_day,2).'</a>'."\n";        
        
        //if($week_month==date("m")&$week_year==date("Y")&$week_day==date("d")) {
        
        if( $week_month == strftime( "%m", time()+($mosConfig_offset*60*60) ) 
            && $week_year == strftime( "%Y", time()+($mosConfig_offset*60*60) )
            && $week_day == strftime( "%d", time()+($mosConfig_offset*60*60) )
            ) {        
                  $bg="class='ev_td_today'";}else{$bg="class='ev_td_left'";
        }
        echo "<tr><td align='center' valign='top' width=50' ".$bg.">".$day_link."</td>\n";
        echo "<td class='ev_td_right'><ul class='ev_ul'>\n";

    	$select_date = sprintf( "%4d-%02d-%02d", $week_year, $week_month, $week_day );
        $rows = listEventsByDate ($select_date);       
        $num_events = count($rows);
        $countprint = 0;
       
        if ($num_events>0){              
            for ($r = 0; $r < count($rows); $r++) {  //
                $row = $rows[$r];            
            
                $event_up = new mosEventDate( $row->publish_up );	        
	        	$event_up->day = sprintf( "%02d", $event_up->day);
                $event_up->month = sprintf( "%02d", $event_up->month);
                $event_up->year = sprintf( "%4d", $event_up->year);   	
                     
                $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);   
            
                $catname = mosEventsHTML::getCategoryName($row->catid);	    		  	        	        
	        
	        $checkprint = new mosEventRepeat($row, $week_year, $week_month, $week_day); 	        	       
	        if ($checkprint->viewable == true){     
                    HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                         
                    echo "&nbsp;::&nbsp;";
                    HTML_events::viewEventCatRow ($row->catid,$catname,'view_cat',$event_up->year,$event_up->month,$event_up->day,$option,$Itemid);	                    
                    $countprint++;
                }
            } 
            if ($countprint == 0){
                echo "&nbsp;";
            }
            echo "</ul></td>\n";        
        } else {
            // dmcd Aug 6/04  commented this anoying message out
	    //echo _CAL_LANG_NO_EVENTFORTHE."&nbsp;<b>".mosEventsHTML::getDateFormat($week_year,$week_month,$week_day ,4)."</b>\n";
            echo "&nbsp;</ul></td>\n";
			echo "</td>\n";
        }      
    } // end for days  
    echo "</tr></table><br />\n";
    echo "</fieldset><br /><br />\n";
    //showNavTableText(20, 20, $max_events, $offset, 'view_week');
}

function showEventsByCat ($catid,$limit,$limitstart) {
    global $database, $option, $Itemid, $gid;    
   
    // no category selected
    if (!$catid) {
//      	$sql = "SELECT * FROM #__categories as b, #__events WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND #__events.state = '1'";
/* GWE change to allow mambelfish to work!*/	
	$sql = "SELECT * FROM #__categories as b, #__events WHERE #__events.catid  IN(".accessibleCategoryList().") AND b.access <= $gid AND #__events.access <= $gid AND #__events.state = '1'";
    }
    // category selected
    else {
      	//$sql = "SELECT * FROM #__categories as b, #__events WHERE #__events.catid = b.id AND #__events.catid = '$catid' AND b.access <= $gid AND #__events.access <= $gid AND #__events.state = '1'";
/* GWE change to allow mambelfish to work!*/
	$sql = "SELECT * FROM #__categories as b, #__events WHERE #__events.catid  IN(".accessibleCategoryList().")  AND #__events.catid = '$catid' AND b.access <= $gid AND #__events.access <= $gid AND #__events.state = '1'";
    }
    
    $database->setQuery($sql);
    //$max_events = $database->loadResult();
    $counter = $database->loadObjectList();
    $total = count( $counter );
    
    // MLr: discuss replacing _CAL_CONF_EVENT_LIST_ROWS_PPG with $mosConfig_list_limit
    $limit = $limit ? $limit : _CAL_CONF_EVENT_LIST_ROWS_PPG;

    if ( $total <= $limit ) {
	$limitstart = 0;
	}
          
    $rows = listEventsByCat ($catid, $limitstart, $limit);
    $catname = mosEventsHTML::getCategoryName($catid);      
    $num_events = count($rows);    
    $chdate = ""; 
	if ($catid==0) {
	    $catname = _CAL_LANG_EVENT_CHOOSE_CATEG;
	}  	
    echo "<fieldset><legend class='ev_fieldset'>".$catname."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";       
    if ($num_events>0){
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];                                     
            
            $event_up = new mosEventDate( $row->publish_up );	        	    	        
            $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
	    $event_day_month_year = $event_up->day . $event_up->month . $event_up->year;
            
            $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);            
            
            if (($event_day_month_year <> $chdate) && $chdate<>""){            	               
                echo "</ul></td>\n";             
            }
            if ($event_day_month_year <> $chdate){             
                //echo "<tr><td align='center' valign='top' width='50' class='ev_td_left'>".mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,1)."</td>\n";
                //echo "<td align='left' valign='top' class='ev_td_right'>\n";
            	echo "<tr><td align='center' valign='top' width='50' class='ev_td_left'>".mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,1)."</td>\n";
                echo "<td align='left' valign='top' class='ev_td_right'><ul class='ev_ul'>\n";
            }             	             
            
            HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);
			$chdate = $event_day_month_year;
        }
    } else {
    	echo "<tr>";
        echo "<td align='left' valign='top' class='ev_td_right'>\n";
    	if ($catid==0){
            echo _CAL_LANG_EVENT_CHOOSE_CATEG."</td>";
        } else {           
            echo _CAL_LANG_NO_EVENTFOR."&nbsp;<b>".$catname."</b></td>";
        }
    }   
    echo "</tr></table><br />\n";
    echo "</fieldset><br /><br />\n";   
	global $year;
    showNavTableText($year, $total, $limitstart, $limit, 'view_cat&catid='.$catid);
     
}

function showEventsByKeyword ($keyword,$limit,$limitstart) {
    global $database, $option, $Itemid, $mosConfig_offset , $gid;    

    $keyword = preg_replace("/[[:space:]]/", "+", $keyword);
    $keyword = trim($keyword);  
    $keyword = preg_replace("/\++/", "+", $keyword);
    $keywordcheck = preg_replace("/\+/", "", $keyword);
    if(empty($keyword) || strlen($keywordcheck)<3 || $keyword=="%%" || $keywordcheck=="") {
        $keyword = "Not a valid keyword";
        $num_events = 0;
    } else {
	
	$sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND\n";
	$sql .= ($useRegX) ? "(#__events.title RLIKE '$keyword' OR #__events.content RLIKE '$keyword')\n" :
                        "MATCH (#__events.title, #__events.content) AGAINST ('$keyword' IN BOOLEAN MODE)\n";
	$sql .= "AND #__events.state = '1'"; 
	
	$database->setQuery($sql);
	$counter = $database->loadObjectList();
	$total = count( $counter );
	
	// MLr: discuss replacing _CAL_CONF_EVENT_LIST_ROWS_PPG with $mosConfig_list_limit
        $limit = $limit ? $limit : _CAL_CONF_EVENT_LIST_ROWS_PPG;
	
	if ( $total <= $limit ) {
		$limitstart = 0;
	}
	
        $rows = listEventsByKeyword ($keyword,'publish_up,catid',$limit,$limitstart); 
        $num_events = count($rows);          
    }
       
    $chdate = "";
    $chcat = "";
    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_EVENTSFOR."&nbsp;".$keyword."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";               
    //echo "<tr>"; 
    //echo "<td align='left' valign='top' class='ev_td_left'>\n";
              
    if ($num_events>0){    	            
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];            
            
            $event_up = new mosEventDate( $row->publish_up );	        	    	        
            $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
	    $event_day_month_year = $event_up->day . $event_up->month . $event_up->year;
         
            $catname = mosEventsHTML::getCategoryName($row->catid);        
            
            $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);

            if (($event_day_month_year <> $chdate) && $chdate<>""){            	               
                echo "</td></tr></table></td>\n";         
            }
            
            if ($event_day_month_year <> $chdate){             
                echo "<tr>";
                if( $event_up->month == strftime( "%m", time()+($mosConfig_offset*60*60) ) 
                  && $event_up->year == strftime( "%Y", time()+($mosConfig_offset*60*60) )
                  && $event_up->day == strftime( "%d", time()+($mosConfig_offset*60*60) )
                  ) { 
                      $bg="class='cal_td_today'";}else{$bg="class='ev_td_left'";
                  }
                echo "<td align='center' valign='top' width='50' ".$bg.">";
                echo mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,1);
                echo "</td>\n";
                echo "<td align='left' valign='top' class='ev_td_right'>\n";
                echo "<table align='center' width='100%' cellspacing='0' cellpadding='0'>";
                echo "<tr><td align='center' valign='top' width='80'>"; // class='ev_td_left'>";
                $chcat = "";
            }     
            if (($row->catid <> $chcat) && $chcat <> ""){            	               
                echo "</td></tr>\n";             
            }
            if ($row->catid <> $chcat) {                             
                echo "<tr><td align='center' valign='top' width='80' class='ev_td_left'>";
                echo "<b>";
                HTML_events::viewEventCatRow ($row->catid,$catname,'view_cat',$event_up->year,$event_up->month,$event_up->day,$option,$Itemid);
                echo "</b></td>\n";
                echo "<td align='left' valign='top'>"; // class='ev_td_right'>\n";
            }
                            
            if ($row->reccurtype == 5){ //each year                                   
                if ($month == $event_up->month) {                                                                                       	                       	                                    	                                                                              
                    HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                                                         
                } else {
                    echo "&nbsp;";
                }	 
            } else {
            	HTML_events::viewEventRow ($row->id,$row->title,'view_detail',$event_up->year,$event_up->month,$event_up->day,$contactlink, $option, $Itemid);                                                                                               
            }
			
            $chcat = $row->catid;  
            $chdate = $event_day_month_year;
        } 
        echo "</td></tr></table>\n";   
    } else {    	
    	//echo "<tr>";
        //echo "<td align='left' valign='top' class='ev_td_right'>\n";        
        echo _CAL_LANG_NO_EVENTFOR."&nbsp;<b>".$keyword."</b>"; 
    } // end if  
      
      echo "</td></tr></table><br />\n";
      echo "</fieldset><br /><br />\n";  
	  global $year;
      showNavTableText($year, $total, $limitstart, $limit, 'search&keyword='.$keyword);
}

function showEventsForAdmin ($creator_id,$limit,$limitstart) {
    global $database, $option, $Itemid, $is_event_editor, $my, $gid, $access;

    $where = "";      
    if ($creator_id <> "ADMIN"){
    	//$where = "created_by = '$creator_id' AND";
    	$where = "AND created_by = '$creator_id'";
    }

    //$sql = "SELECT count(id) as count FROM #__events WHERE created_by='$creator_id' AND state='1'";
    /*
    $sql = "SELECT #__events.* FROM #__categories AS b, #__events
            WHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid AND
           $where #__events.state='1'";
     */

    $frontendPublish = _CAL_CONF_FRONTENDPUBLISH=="YES";

	if ($access->canPublish && $frontendPublish ) {
		$sql = "SELECT #__jevents.* FROM #__jevents"
				. "\n WHERE #__jevents.catid IN(".accessibleCategoryList().")"
				. "\n AND #__jevents.access <= $gid";
	} else {
		$sql = "SELECT #__jevents.* FROM #__jevents"
				. "\n WHERE #__jevents.catid IN(".accessibleCategoryList().")"
				. "\n AND #__jevents.access <= $gid $where"
				. "\n AND #__jevents.state='1'";
	}
    
    $database->setQuery($sql);
    //$max_events = $database->loadResult();
    $counter = $database->loadObjectList();
    $total = count( $counter );
    
    // MLr: discuss replacing _CAL_CONF_EVENT_LIST_ROWS_PPG with $mosConfig_list_limit
    $limit = $limit ? $limit : _CAL_CONF_EVENT_LIST_ROWS_PPG;

    if ( $total <= $limit ) {
	$limitstart = 0;
	}
         
    $rows = listEventsByCreator ($creator_id, $limitstart, $limit);          
    $num_events = count($rows);    
    $chdate = "";
    echo "<fieldset><legend class='ev_fieldset'>"._CAL_LANG_ADMINPANEL."</legend><br />\n"; 
    echo "<table align='center' width='90%' cellspacing='0' cellpadding='5' class='ev_table'>\n";       
       
    if ($num_events>0){
        for ($r = 0; $r < count($rows); $r++) {
            $row = $rows[$r];            

            $event_up = new mosEventDate( $row->publish_up );	        	    	        
            $event_up->day = sprintf( "%02d", $event_up->day);
            $event_up->month = sprintf( "%02d", $event_up->month);
            $event_up->year = sprintf( "%4d", $event_up->year);   	
	    $event_month_year = $event_up->month.$event_up->year;
            $contactlink = mosEventsHTML::getUserMailtoLink($row->id, $row->created_by);	    
            
            if ($is_event_editor) {
            	$link_day = sprintf( "%02d", $event_up->day);
                $link_month = sprintf( "%02d", $event_up->month);
                $link_year = sprintf( "%4d", $event_up->year);   	
    	
                $deletelink = "<a href='".sefRelToAbs("index.php?option=$option&amp;task=delete&amp;agid=$row->id&amp;year=$link_year&amp;month=$link_month&amp;day=$link_day&amp;Itemid=$Itemid")."'><b>"._CAL_LANG_DELETE."</b></a>\n";
                $modifylink = "<a href='".sefRelToAbs("index.php?option=$option&amp;task=modify&amp;agid=$row->id&amp;year=$link_year&amp;month=$link_month&amp;day=$link_day&amp;Itemid=$Itemid")."'><b>"._CAL_LANG_MODIFY."</b></a>\n";
            }
            
            if ($event_month_year <> $chdate){            	
                echo "<tr><td align='center' valign='top' width='50' class='ev_td_left'>".mosEventsHTML::getDateFormat($event_up->year,$event_up->month,'',3)."</td>\n";
                echo "<td class='ev_td_right'><ul class='ev_ul'>\n";                  
            }	
                                  	             
            HTML_events::viewEventRowAdmin ($row,'view_detail',$event_up->year,$event_up->month,$event_up->day,$deletelink,$modifylink,$contactlink, $option, $Itemid, $row->state);           
            $chdate = $event_month_year;
        } 
		echo "</ul>";                   
    } else {
    	echo "<tr>";
        echo "<td align='left' valign='top' class='ev_td_right'>\n";    	        
        echo _CAL_LANG_NO_EVENTS;
    } 
    echo "</td></tr></table><br />\n";
    echo "</fieldset><br /><br />\n";     
	global $year;
    showNavTableText($year, $total, $limitstart, $limit, 'admin');
}

function sortEvents ($a, $b) {
  list($adate, $atime) = split(" ",$a->publish_up);
  list($bdate, $btime) = split(" ",$b->publish_up);
  return strcmp($atime, $btime);
}


function showCalendar ($rows,$year,$month,$day){
    global $mosConfig_offset,$database,$option,$Itemid;
    
    $cellcount = count($rows);    
    usort($rows, "sortEvents");
    while(list($key,$value)=each($rows)) {    	            
                $id_Array[] = $value->id;                           
                $title_Array[] = $value->title;
                $color_Array[] = $value->color_bar;
                $publish_up_Array[] = $value->publish_up;
                $publish_down_Array[] = $value->publish_down;  
                $reccurtype_Array[] = $value->reccurtype;
                $reccurday_Array[] = $value->reccurday;  
                $reccurweekdays_Array[] = $value->reccurweekdays;          
    }
    
    $thisday="$year-$month-$day";
    $day_name=array("<font color='red'>"._CAL_LANG_SUNDAYSHORT."</font>",_CAL_LANG_MONDAYSHORT,_CAL_LANG_TUESDAYSHORT,_CAL_LANG_WEDNESDAYSHORT,_CAL_LANG_THURSDAYSHORT,_CAL_LANG_FRIDAYSHORT,_CAL_LANG_SATURDAYSHORT);
    // $y=date("Y");
    $month_name = mosEventsHTML::getMonthName($month);
    if ($month<="9"&ereg("(^[1-9]{1})",$month)) {
        $month="0$month";
    } 
    
    ?>
    <div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000;'></div>
    <script language='Javascript' src='includes/js/overlib_mini.js'></script>
    
    <fieldset><legend class='ev_fieldset'><?php echo mosEventsHTML::getDateFormat($year,$month,'',3);?></legend>
    <br />
    <table width="95%" align="center" border="0" cellspacing="1" cellpadding="0" class="cal_table">
      <tr>
        <td colspan="7">      
        </td>
      </tr>
      <tr valign='top'>
        <?php
          $startday = _CAL_CONF_STARDAY;           
          if((!$startday) || ($startday > 1)) $startday = 0;
          for ($i=0;$i<7;$i++) {
              ?>
              <td width="14%" align='center' class="cal_td_daysnames">
                <!-- <div class="cal_daysnames"> -->
                  <?php echo mosEventsHTML::getLongDayName(($i+$startday)%7);?>
                <!-- </div> -->                  
              </td>
              <?php
          }
          ?>
      </tr>
      <tr valign="top" height="80">
        <?php
        //Start days
		  // Comment out the following if you experience bug #4475
          $start=((date("w",mktime(0,0,0,$month,1,$year))-$startday+7)%7);
          for($a=$start;$a>0;$a--) {
		  // Remove comment if you get problems with wrong month displays(bug #4475)
		  // $start=((date("w",mktime(0,0,0,$month,1,$year))-$startday+6)%7);
          // for($a=$start;$a>=0 && $a<6;$a--) {
              $d=date("t",mktime(0,0,0,$month,0,$year))-$a+1;
              ?>
              <td width="14%" class="cal_td_daysoutofmonth" valign="top">
                  <?php echo $d;?>
              </td>
              <?php
          }
          
        //Current month
          for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++) {
            //  if($month==date("m")&$year==date("Y")&$d==date("d")) {
              if( $month == strftime( "%m", time()+($mosConfig_offset*60*60) ) 
                  && $year == strftime( "%Y", time()+($mosConfig_offset*60*60) )
                  && $d == strftime( "%d", time()+($mosConfig_offset*60*60) )
                  ) { 
                  $bg="class='cal_td_today'";}else{$bg="class='cal_td_daysnoevents'";
              }
              
              if ($d<="9"&ereg("(^[1-9]{1})",$d)) {
                  $do="0$d";
              } else {
                  $do = $d;
              }              
              ?>
    
              <td <?php echo $bg;?> width="14%" valign="top">
                <!-- <div> -->
                  <a class="cal_daylink" href="index.php?option=<?php echo $option;?>&amp;task=view_day&amp;year=<?php echo $year;?>&amp;month=<?php echo $month;?>&amp;day=<?php echo $do;?>&amp;Itemid=<?php echo $Itemid;?>"><?php echo $d;?></a>
                <!-- </div> -->
                 <!-- <br /> -->
              
                <?php 
              //PRESENTATION CONSTRUCTION                  
                  $cellDate = mktime (0, 0, 0, $month, $d, $year);                  
   		 if ($cellcount>0){
		   echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
                for ($i=0;$i<$cellcount;$i++) {                    
		      	// Event publication infomations
            	  	$event_up = new mosEventDate( $publish_up_Array[$i] );
	              	$event_down = new mosEventDate( $publish_down_Array[$i] );
	              	// Event repeat variable initiate
                  	$repeat_event_type =  $reccurtype_Array[$i];

                  	// BAR COLOR GENERATION
                  	$bgeventcolor = $color_Array[$i];

	              	$start_publish = mktime (0, 0, 0, $event_up->month, $event_up->day, $event_up->year);
	              	$stop_publish = mktime (0, 0, 0, $event_down->month, $event_down->day, $event_down->year);

	              	$event_day = $event_up->day;
	              	$event_month = $event_up->month;
	              	$checkprint = new mosEventRepeat($rows[$i], $year, $month, $do);
			$title=$title_Array[$i];
			$id=$id_Array[$i];
					
	       		$colStart = "<tr valign='top'><td width=100% height=12 ";
	       		$colEnd = "</td></tr><tr><td height=1></td></tr>\n";
      			require("components/".$option."/events_calendar_cell.php");
			}// print all events for this date?  Not going to be pretty for a large # of events!!  Need to
			// work on this to make it scale better?
	        echo "</table>\n";
		 }
	      // END PRESENTATION                        
                ?>
              </td>
              <?php

              if(((date("w",mktime(0,0,0,$month,$d,$year))-$startday+1)%7)==0) { //&date("t",mktime(0,0,0,($month+1),0,$year))>$d) {
                  ?> 
                  <!-- </div> -->
                  </tr>
                  <tr valign="top" height="80">
                  <?php
              }
          }//End Current
       
        //End days             
          $da=$d+1;
// dmcd may 7/04, fix for bug where end days are not always printed depending upon how month ends

//if(((date("w",mktime(0,0,0,$month+1,1,$year))-$startday)%7)<>1) {
          $days = (7 - date("w",mktime(0,0,0,$month+1,1,$year))+$startday)%7;
          $d=1;
          for($d=1;$d<=$days;$d++) {
//              while(((date("w",mktime(0,0,0,($month+1),$d,$year))-$startday+1)%7)<>1) {
                  ?>
                  <td class="cal_td_daysoutofmonth" width="14%" valign='top'>
                    <?php echo $d;?>
                  </td>
                  <?php
//                  $d++;
//              }
          }
          ?>
      </tr>
      <tr>
        <td colspan="7">         
        </td>
      </tr>
    </table>
    <br />
    </fieldset>
    <?php
}


	  function viewYear($Itemid, $year,$month,$day,$option,$task ,$limit, $limitstart){
            //echo $cssHTML;
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);
            showEventsByYear ($year,$limit,$limitstart);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
	  }
	  function viewMonth($Itemid,  $year,$month,$day,$option,$task){
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);                      
            $rows = listEventsByMonth ($year,$month,'reccurtype ASC,publish_up');                                          
            showCalendar($rows,$year,$month,$day); 
            //echo "<br />";
            //showEventsByMonth ($year,$month);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
	  }
	  function view_week($Itemid,  $year,$month,$day,$option,$task){
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);                       
            showEventsByWeek ($year,$month,$day);                                
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);  
            HTML_events::viewCopyright();
	  }
	  function view_day($Itemid,$year,$month,$day,$option,$task ){
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);                       
            showEventsByDate ($year,$month,$day);                                
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);  
            HTML_events::viewCopyright();
	  }
	  function view_last($Itemid, $year,$month,$day,$option,$task){
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);                      
            showEventsByMonth ($year,$month);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
	  }
	  function view_detail($Itemid, $year,$month,$day,$option,$task,$pop,$agid){
            // dmcd oct 4/04  don't show navbar stuff for events detail popup
            if(!$pop) showNavTableBar($year,$month,$day,$option,$task,$Itemid);
            showEventsById ($agid,$year,$month,$day);
            if(!$pop) HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
	  }
	  function view_cat($Itemid, $year,$month,$day,$option,$task,$catid,$limit,$limitstart){
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);         
            HTML_events::viewNavCatText($catid, $option, 'view_cat', $Itemid);
            showEventsByCat ($catid,$limit,$limitstart);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
	  }

/////////////////////////////////////// CHOOSE SECTION //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////   
  
  //  if (!isset($task) || empty($task)) {$task = _CAL_CONF_STARTVIEW;}   
   
// dmcd Aug 6/04.  Check the Events Table to see if the new useCatColor field is in
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
	// dmcd May 29/04  create the new events_categories db table here to hold the color field.
	// eventually we will delete this code for the newer version since it will be created by the xml install file.
	// This at least allows an easier upgrade for people with minimal performance issues
	// dmcd Sep 14/04  new mos does not like DB errors.  It will flag a php 'NOTICE' message to user by default if
	// enabled.  Now instead, test for presence of the events_categories table in the DB instead

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

    $cssHTML = "<link href=\"".$mosConfig_live_site."/components/com_events/events_css.css\" rel=\"stylesheet\" type=\"text/css\" />\n";  
    $mainframe->addCustomHeadTag( $cssHTML );
    switch($task) {   	
        case "add"://ok   
	  mosCache::cleanCache( 'com_events' );
	    if($is_event_editor){
  	        if ($mode == "write") { 
	            if ($goodexit==1){
			    	$adminEmail = _CAL_CONF_ADMINMAIL;
		        	$subject = _CAL_LANG_MAIL_ADDED." ".$mosConfig_sitename;
	                $modifylink = "<a href='".sefRelToAbs("index.php?option=$option&amp;task=modify&amp&amp;Itemid=".$_POST['Itemid'])."'><b>"._CAL_LANG_MODIFY."</b></a>\n";
		        	
		        	sendAdminMail($mosConfig_sitename, $adminEmail, $subject, $_POST['title'], $_POST['content'], $_POST['created_by_alias'], $mosConfig_live_site, $modifylink);		
		        	saveEvent($database);
		        	//$returnlink = "index.php?option=$option&Itemid=$Itemid";
        			//mosRedirect("$returnlink", _CAL_LANG_ACT_ADDED);
		        }
            } else {
                if($year && $month && $day){
                     $start_publish = $year."-".$month."-".$day;
                     $stop_publish = $year."-".$month."-".$day;                    
                } else {                    	         
                     $start_publish = strftime( "%Y-%m-%d", time()+($mosConfig_offset*60*60) );
                     //date( "Y-m-d" );
                     $stop_publish = strftime( "%Y-%m-%d", time()+($mosConfig_offset*60*60) ); 
                     //date( "Y-m-d" );
                }
                $row = new mosEvents( $database );
                // if user hits refresh, try to maintain event form state
				$row->bind( $_POST );
                $row->color_bar = mosEventsHTML::getColorBar(null,'');
                $start_time = "08:00";
                $end_time = "17:00";
                $row->reccurday_month = -1;
                $row->reccurday_week = -1;
                $row->reccurday_year = -1;
                $row->created_by_alias = $my->username;
                $row->reccurtype = 0;
		    
                $lists ="";

                // dmcd May 20/04  fetch the new category colors from the '#__events_category' db table
		        $database->setQuery( "SELECT * from #__events_categories");
		        $catColors = $database->loadObjectList('id');
		        HTML_events::viewFormEvent( $row, $start_publish, $stop_publish, $start_time, $end_time, $lists, $Itemid, $option, $task, 'new', $catColors, $agid);
                }           
            } else { 
                $returnlink = "index.php?option=$option&Itemid=$Itemid";
                mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);	
            }
        break;
               
        case "delete": 
	  mosCache::cleanCache( 'com_events' );
            if($is_event_editor && !( strtolower($my->usertype) == '')){              	            	        
            	if($agid){ 
            	    $rows = listEventsById ($agid, 1);  // include unpublished events for publishers and above
	            $row = $rows[0]; 
				// Have to check this condition
	            if(strtolower($my->usertype) == 'editor' || strtolower($my->usertype) == 'administrator' || strtolower($my->usertype) == 'super administrator' ) {    	                
    	                removeEvent( $agid );    	            
    	            } else {
                        if ($row->created_by == $my->id){ 
    	             	    removeEvent( $agid );      	             
                        } else {
                            echo $my->usertype; 
                            $returnlink = "index.php?option=$option&Itemid=$Itemid";
                            mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);
                        }
    	                
                    }        	                                                	               
                } 
            } else { 
                $returnlink = "index.php?option=$option&Itemid=$Itemid";
                mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);	
	    }
        break;
                	
	case "modify"://ok
	  mosCache::cleanCache( 'com_events' );
	    if($is_event_editor && !( strtolower($my->usertype) == '')){
	    	$rows = listEventsById ($agid, 1);  // include unpublished events for publishers and above
	        $row = $rows[0]; 	    	
	    	if(strtolower($my->usertype) == 'user' || strtolower($my->usertype) == '') {    	         
    	            if ($row->creator_id != $my->id){ 
    	                $returnlink = "index.php?option=$option&Itemid=$Itemid";
                        mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);
    	            }
    	        }
	        if ($mode == "write") { 
            	    if ($goodexit==1){
		        $adminEmail = _CAL_CONF_ADMINMAIL;
		        $subject = _CAL_LANG_MAIL_MODIFIED." ".$mosConfig_sitename;	        
                $modifylink = "<a href='".sefRelToAbs("index.php?option=$option&amp;task=modify&amp;Itemid=".$_POST['Itemid'])."'><b>"._CAL_LANG_MODIFY."</b></a>\n";
		        sendAdminMail($mosConfig_sitename, $adminEmail, $subject, $_POST['title'], $_POST['content'], $_POST['created_by_alias'], $mosConfig_live_site, $modifylink);				        
		        saveEvent($database);		       	
			        
		    }            	            
                } else {
            	    if($agid){
            	        $rows = listEventsById ($agid, 1);  // include unpublished events for publishers and above
	                $row = $rows[0]; 
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
                        $lists['state'] = mosHTML::yesnoSelectList( 'state', 'size="1" class="inputbox"', $row->state );
     
	                // dmcd May 20/04  fetch the new category colors from the '#__events_category' db table
					$database->setQuery( "SELECT * from #__events_categories");
					$catColors = $database->loadObjectList('id');
					HTML_events::viewFormEvent( $row, $start_publish, $stop_publish, $start_time, $end_time, $lists, $Itemid, $option, $task, 'modify', $catColors, $agid);
	            }
                }		                           
            } else { 
                $returnlink = "index.php?option=$option&Itemid=$Itemid";
                mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);	
	    }
        break; 
		
        case "cancel":
	  mosCache::cleanCache( 'com_events' );
	  $row = new mosEvents( $database );
	  $row->bind( $_POST );
	  
	  if ($access->canEdit || ($access->canEditOwn && $row->created_by == $my->id)) {
	    $row->checkin();
	  }  
	  mosRedirect( "index.php?option=$option&Itemid=$Itemid" );
	break;
                        
        case "view_year"://ok   
	  $cache->call( 'viewYear', $Itemid, $year,$month,$day,$option,$task ,$limit, $limitstart,$mosConfig_lang);
        break;    
       
        case "view_month"://ok     
	$cache->call( 'viewMonth', $Itemid,  $year,$month,$day,$option,$task ,$mosConfig_lang); 
        break; 
       
        case "view_week":
	  $cache->call( 'view_week', $Itemid,  $year,$month,$day,$option,$task ,$mosConfig_lang);
        break;
       
        case "view_day":
	  $cache->call( 'view_day', $Itemid, $year,$month,$day,$option,$task ,$mosConfig_lang);
        break;
     
        case "view_last"://ok     
	  $cache->call( 'view_last', $Itemid, $year,$month,$day,$option,$task ,$mosConfig_lang);
        break;
     
        case "view_detail"://ok           
	  $cache->call( 'view_detail', $Itemid, $year,$month,$day,$option,$task,$pop,$agid ,$mosConfig_lang);
        break;
       
        case "view_cat":   
	  $cache->call( 'view_cat', $Itemid,$year,$month,$day,$option,$task,$catid,$limit,$limitstart ,$mosConfig_lang);
        break;
       
        case "view_search":   
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);         
            HTML_events::viewSearchForm('', $option, $task, $Itemid);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
        break;
        
        case "search":   
            showNavTableBar($year,$month,$day,$option,$task,$Itemid);         
            showEventsByKeyword ($keyword, $limit,$limitstart);
            HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);
            HTML_events::viewCopyright();
        break;
      
        case "admin":
           if($is_event_editor){                 	         	      
    	       if(strtolower($my->usertype) == 'administrator' || strtolower($my->usertype) == 'super administrator' ) {    	         
    	           $creator_id = "ADMIN";
    	       } else {
                   $creator_id = $my->id;
               }   
               showNavTableBar($year,$month,$day,$option,$task,$Itemid);                 	
               showEventsForAdmin ($creator_id,$limit,$limitstart);
               HTML_events::viewNavAdminPanel($year,$month,$day,$option,$Itemid);   
           } else { 
              $returnlink = "index.php?option=$option&Itemid=$Itemid";
              mosRedirect("$returnlink", _CAL_LANG_NOPERMISSION);	
	   }
        break;
                 
        default:           
        
        break;
    }        
?>
