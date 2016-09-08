<?php
// $Id: mod_events_cal.php,v 1.18 2005/11/30 20:23:45 mleinmueller Exp $
//Events Calendar Module//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

/**
*    Events Calendar Module for Mambo Site Server Open Source Edition Version 4.5
*    Dynamic portal server and Content managment engine
*
*    Distributed under the terms of the GNU General Public License
*    This software may be used without warrany provided these statements are left intact.
*
*    Eric Lamette http://www.socialsquare.com
*
*    Comments: Works with Events Component 1.0

    Version 1.4 Modified May 7/04 by dmcd to fix some calendar display bug relating to last days outside current month
    as well as support for displaying up to 3 calendars (IE. Last, This, and Next Month's calendars)
    
    Module Parameters:
    ==================

    displayLastMonth = controls the display of a previous month calendar relative to current date.
                    = 'none' or 0 (default): never display a Last Month's calendar
                    = 'always' : always display a Last Month's calendar
                    = 'always,r' : display a Last Month's calendar. Stop displaying Last Month's
                       calendar if this month's current day of month is at least r.
                    = 'events' : display a Last Month's calendar only if there were scheduled events in that month.
                    = 'events,r' : display Last Month's calendar only if there were events scheduled for that month.
                       Stop displaying Last Month's calendar if this month's current day of month is at least r.
                       
    displayNextMonth = controls the display of a next month calendar relative to current date.
                    = 'none' or 0 (default): never display a Next Month's calendar
                    = 'always' : always display a Next Month's calendar
                    = 'always,r' : display a Next Month's calendar. Start displaying Next Month's
                       calendar if this month's current day of month is within r days of the first day of Next month.
                    = 'events' : display a Next Month's calendar (with current month) only if there are future scheduled
                       events in that month.
                    = 'events,r' : display Next Month's calendar only if there are events scheduled for that month.
                       Start displaying Next Month's calendar if this month's current day of month is within r days
                       of the first day of Next month.
    
    Example:
                displayLastMonth=always,7
                displayNextMonth=always,7
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_offset;
global $mosConfig_lang;



// CHECK EVENTS COMPONENT 
if (file_exists("administrator/components/com_events/events_config.php") ) { 
    include_once("administrator/components/com_events/events_config.php");
    if (!class_exists("mosEvents")) {
        include_once("components/com_events/events.class.php");
    }
} else { 
    die ("Events Calendar\n<br />This module needs the Events component");   
}

// CHECK LANGUAGE
if (!defined( '_CAL_LANG_INCLUDED' )) {
    if (file_exists("components/com_events/language/".$mosConfig_lang.".php") ) { 
        include_once("components/com_events/language/".$mosConfig_lang.".php");
    } else { 
        include_once("components/com_events/language/english.php");
    }
    //if (!defined( '_CAL_LANG_INCLUDED' )) DEFINE("_CAL_LANG_INCLUDED", 1);
}

$params = mosParseParams( $module->params );

if(!isset( $params->displayLastMonth ) && defined("_MOD_CAL_DISPLASTMONTH")){
    // get com_event config parameters for this module
    // get com_event config parameters for this module
    switch(_MOD_CAL_DISPLASTMONTH) {
        case 'YES_stop':
            $disp_lastMonthDays = abs(intval(_MOD_CAL_DISPLASTMONTHDAYS));
            $disp_lastMonth = 1;
            break;
        case 'YES_stop_events':
            $disp_lastMonthDays = abs(intval(_MOD_CAL_DISPLASTMONTHDAYS));
            $disp_lastMonth = 2;
            break;
        case 'ALWAYS':
            $disp_lastMonthDays = 0;
            $disp_lastMonth = 1;
            break;
        case 'ALWAYS_events':
            $disp_lastMonthDays = 0;
            $disp_lastMonth = 2;
            break;
        case 'NO':
        default:
            $disp_lastMonthDays = 0;
            $disp_lastMonth = 0;
            break;
    }
}
else {
    // parse this module parameter
    $displayLastMonth = isset( $params->displayLastMonth ) ? $params->displayLastMonth : 'none';
    $displayLastMonth=trim($displayLastMonth);

    if(preg_match("/^always/i", $displayLastMonth)) $disp_lastMonth = 1;
    else if(preg_match("/^events/i", $displayLastMonth)) $disp_lastMonth = 2;
    else $disp_lastMonth = 0;

    if($disp_lastMonth){
    list($jnk,$disp_lastMonthDays) = split("[\t ]*,[\t ]*", $displayLastMonth);
    if(!isset($disp_lastMonthDays)) $disp_lastMonthDays = 0;
    $disp_lastMonthDays = abs(intval($disp_lastMonthDays));
    }
}


if(!isset( $params->displayNextMonth ) && defined("_MOD_CAL_DISPNEXTMONTH")){
    // get com_event config parameters for this module
    switch(_MOD_CAL_DISPNEXTMONTH) {
        case 'YES_stop':
            $disp_nextMonthDays = abs(intval(_MOD_CAL_DISPNEXTMONTHDAYS));
            $disp_nextMonth = 1;
            break;
        case 'YES_stop_events':
            $disp_nextMonthDays = abs(intval(_MOD_CAL_DISPNEXTMONTHDAYS));
            $disp_nextMonth = 2;
            break;
        case 'ALWAYS':
            $disp_nextMonthDays = 0;
            $disp_nextMonth = 1;
            break;
        case 'ALWAYS_events':
            $disp_nextMonthDays = 0;
            $disp_nextMonth = 2;
            break;
        case 'NO':
        default:
            $disp_nextMonthDays = 0;
            $disp_nextMonth = 0;
            break;
    }
}
else {
    $displayNextMonth = isset( $params->displayNextMonth ) ? $params->displayNextMonth : 'none';
    $displayNextMonth=trim($displayNextMonth);

    if(preg_match("/^always/i", $displayNextMonth)) $disp_nextMonth = 1;
    else if(preg_match("/^events/i", $displayNextMonth)) $disp_nextMonth = 2;
    else $disp_nextMonth = 0;

    if($disp_nextMonth){
    list($jnk,$disp_nextMonthDays) = split("[\t ]*,[\t ]*", $displayNextMonth);
    if(!isset($disp_nextMonthDays)) $disp_nextMonthDays = 0;
    $disp_nextMonthDays = abs(intval($disp_nextMonthDays));
    }
}

// Itemid, search for menuid with lowest access rights
global $my;
$query = "SELECT id"
. "\n FROM #__menu WHERE"
. "\n link = 'index.php?option=com_events'"
. "\n AND published = 1"
. "\n AND access <= $my->gid"
. "\n ORDER BY access ASC";
$database->setQuery($query);
global $myItemid;
$myItemid = intval( $database->loadResult() );

////////////////////////////////////////////////
global $timeWithOffset, $startday, $mainframe;

$timeWithOffset = time() + ($mosConfig_offset*60*60);

//date( "Y-m-d H:i:s", mktime() );
$startday = ((!_CAL_CONF_STARDAY) || (_CAL_CONF_STARDAY > 1)) ? 0 : _CAL_CONF_STARDAY;
//$start=((date("w",mktime(0,0,0,$cal_month,0,$cal_year))-$startday+7)%7);

$day_name=array("<font color=\"red\">"._CAL_LANG_SUNDAYSHORT."</font>",_CAL_LANG_MONDAYSHORT,_CAL_LANG_TUESDAYSHORT,_CAL_LANG_WEDNESDAYSHORT,_CAL_LANG_THURSDAYSHORT,_CAL_LANG_FRIDAYSHORT,_CAL_LANG_SATURDAYSHORT);
$mainframe->addCustomHeadTag( "<link href=\"modules/mod_events_cal.css\" rel=\"stylesheet\" type=\"text/css\" />");
$content = "<link href=\"modules/mod_events_cal.css\" rel=\"stylesheet\" type=\"text/css\" />\n";

// dmcd - May 7/04, make calendar display a function.  Want to show 1,2, or 3 calendars optionally
// depending upon module parameters. (IE. Last Month, This Month, or Next Month)

$thisDayOfMonth = date("j", $timeWithOffset);
$daysLeftInMonth = date("t", $timeWithOffset) - date("j", $timeWithOffset) + 1;

if($disp_lastMonth && (!$disp_lastMonthDays || $thisDayOfMonth <= $disp_lastMonthDays))
	$content .= displayCalendarMod(mktime(0,0,0,date("n")-1,1,date("Y")), _CAL_LANG_LAST_MONTH, $day_name, $disp_lastMonth == 2);

$content .= displayCalendarMod(mktime(0,0,0,date("n"),1,date("Y")), _CAL_LANG_THIS_MONTH, $day_name);

if($disp_nextMonth && (!$disp_nextMonthDays || $daysLeftInMonth <= $disp_nextMonthDays))
	$content .= displayCalendarMod(mktime(0,0,0,date("n")+1,1,date("Y")), _CAL_LANG_NEXT_MONTH, $day_name, $disp_nextMonth == 2);


function displayCalendarMod($time, $linkString, &$day_name, $monthMustHaveEvent=false){

    global $startday;
    global $database;
    global $myItemid;
    global $timeWithOffset;
    global $my;
    
    $gid = $my->gid;
    
    $cal_year=date("Y",$time);
    $cal_month=date("m",$time);
    $calmonth=date("n",$time);

    $month_name = mosEventsHTML::getMonthName($cal_month);
    $to_day = date("Y-m-d", $timeWithOffset);

    $content ="<table width=\"140\" align=\"center\">\n";
    $content.="<tr><td class=\"mod_events_monthyear\">\n";
    //$content.="<div align=\"center\">$month_name $cal_year</div>\n";
	$seflink=sefRelToAbs("index.php?option=com_events&amp;task=view_month&amp;Itemid=".$myItemid."&amp;month=".$cal_month."&amp;year=".$cal_year);
    $content.="<div align=\"center\"><a class=\"mod_events_link\" href=\"".$seflink."\">$month_name $cal_year</a></div>\n";    
    $content.="</td></tr></table>\n";
    $content.="<table align=\"center\" class=\"mod_events_table\" cellspacing=\"0\" cellpadding=\"2\" ><tr class=\"mod_events_dayname\">\n";

    // Days name rows
    for ($i=0;$i<7;$i++) {
        $content.="<td class=\"mod_events_td_dayname\">".$day_name[($i+$startday)%7]."</td>\n";
    }

    $content.="</tr><tr>\n";

    // dmcd May 7/04 fix to fill in end days out of month correctly
    $dayOfWeek=$startday;

    $start= (date("w",mktime(0,0,0,$cal_month,1,$cal_year))-$startday+7)%7;

    $d=date("t",mktime(0,0,0,$cal_month,0,$cal_year))-$start + 1;

    for($a=$start; $a>0; $a--) {
        $content.="<td class=\"mod_events_td_dayoutofmonth\">".$d++."</td>";
        $dayOfWeek++;
    }


    $monthHasEvent=false;
    $eventCheck = new mosEventRepeat;
    $lastDayOfMonth = date("t",mktime(0,0,0,$cal_month,1,$cal_year));

    $useGeraintVersion = false;
    /* GERAINT's ACCELERATION */
    /* Must also fix mosEventRepeat? */
    if ( $useGeraintVersion ){
    $firstSelectedDate = "$cal_year-$cal_month-01";
    $lastSelectedDate = "$cal_year-$cal_month-$lastDayOfMonth";
        $sql = "SELECT #__events.* FROM #__events, #__categories as b"
                . "\nWHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid"
                . "\nAND ((publish_up >= '$firstSelectedDate 00:00:00' AND publish_up <= '$lastSelectedDate 23:59:59')"
		. "\n	OR (publish_down >= '$firstSelectedDate 00:00:00' AND publish_down <= '$lastSelectedDate 23:59:59')"
		. "\n	OR (publish_up <= '$firstSelectedDate 00:00:00' AND publish_down >= '$lastSelectedDate 23:59:59')) AND state='1'"
		. "\nORDER BY publish_up ASC";
        $database->setQuery($sql);       
	// no need to translate 
        $allrows = $database->loadObjectList('',false);    
    }
    /* END GERAINT's ACCELERATION */
    
    if (!$useGeraintVersion || count($allrows)>-1) for($d=1;$d<=$lastDayOfMonth;$d++) { 
        $do = ($d<10) ? "0$d" : "$d";
        $selected_date = "$cal_year-$cal_month-$do";    
	if (!$useGeraintVersion){
           $sql = "SELECT #__events.* FROM #__events, #__categories as b"
                . "\nWHERE #__events.catid = b.id AND b.access <= $gid AND #__events.access <= $gid"
                . "\nAND ((publish_up >= '$selected_date 00:00:00' AND publish_up <= '$selected_date 23:59:59')"
		. "\n	OR (publish_down >= '$selected_date 00:00:00' AND publish_down <= '$selected_date 23:59:59')"
		. "\n	OR (publish_up <= '$selected_date 00:00:00' AND publish_down >= '$selected_date 23:59:59')) AND state='1'"
		. "\nORDER BY publish_up ASC";
   
        $database->setQuery($sql);       
        $rows = $database->loadObjectList();            
        $mark_bold = "";
        $mark_close_bold = "";
        $class = ($selected_date == $to_day) ? "mod_events_td_todaynoevents" : "mod_events_td_daynoevents";       

        for ($r = 0; $r < count($rows); $r++) {
            if ($eventCheck->mosEventRepeat($rows[$r], $cal_year, $cal_month, $do)) {
                $monthHasEvent=true;
                $mark_bold = "<b>";
                $mark_close_bold = "</b>";
                $class = ($selected_date == $to_day) ? "mod_events_td_todaywithevents" : "mod_events_td_daywithevents";                         
                break;
	  }
        }
	}
	else{
        $mark_bold = "";
        $mark_close_bold = "";
        $class = ($selected_date == $to_day) ? "mod_events_td_todaynoevents" : "mod_events_td_daynoevents";       

	$testDateStart = mktime(0,0,0,$cal_month,$d,$cal_year);
	$testDateEnd = mktime(23,59,59,$cal_month,$d,$cal_year);
	foreach ($allrows as $testrow){
	  $pupTime = strtotime($testrow->publish_up);
	  $pdnTime = strtotime($testrow->publish_down);
	  if (($pupTime>=$testDateStart && $pupTime<=$testDateEnd)
	      || ($pdnTime>=$testDateStart && $pdnTime<=$testDateEnd)
	      || ($pupTime<=$testDateStart && $pdnTime>=$testDateEnd))
	    {
                $monthHasEvent=true;
                $mark_bold = "<b>";
                $mark_close_bold = "</b>";
                $class = ($selected_date == $to_day) ? "mod_events_td_todaywithevents" : "mod_events_td_daywithevents";                         
                break;
	    }
	}
	}
        $sefdaylink=sefRelToAbs("index.php?option=com_events&amp;task=view_day&amp;year=".$cal_year."&amp;month=".$cal_month."&amp;day=".$do."&amp;Itemid=".$myItemid);
        $content.="<td class=\"".$class."\"><a class=\"mod_events_daylink\" href=\"".$sefdaylink."\">"."$mark_bold"."$d"."$mark_close_bold"."</a></td>\n";
 
        // Check if Next week row
        // dmcd May 7/04 fix to fill in end days out of month correctly
        //if(((date("w",mktime(0,0,0,$cal_month,$d,$cal_year))-$startday+1)%7)==0) {
        if((1 + $dayOfWeek++)%7 == $startday) $content .= "</tr>\n<tr>";
    }

// Days out of the month
// dmcd May 7/04 fix to fill in end days out of month correctly
//if(((date("w",mktime(0,0,0,$cal_month+1,1,$cal_year))-$startday)%7)<>1) {
    $d=1;
//    while(((date("w",mktime(0,0,0,($cal_month+1),$d,$cal_year))-$startday+1)%7)<>1) {
     while($dayOfWeek++ %7 != $startday) {
       $content.="<td class=\"mod_events_td_dayoutofmonth\">".$d."</td>\n";        
        $d++;
    }

    $content.="</tr></table><table width=\"140\" align=\"center\"><tr><td class=\"mod_events_thismonth\" >\n";
    //Many people found this confusing!
    //$seflink=sefRelToAbs("index.php?option=com_events&amp;task=view_month&amp;Itemid=".$myItemid."&amp;month=".$cal_month."&amp;year=".$cal_year);
    //$content.="<div align=\"center\"><a class=\"mod_events_link\" href=\"".$seflink."\">".$linkString."</a></div>\n";
    $content.="</td></tr>\n";
    $content.="</table>\n";

    // Now check to see if this month needs to have at least 1 event in order to display
    if (!$monthMustHaveEvent || $monthHasEvent) return $content;
    else return '';
}
?>