<?php
//if ( function_exists("DebugBreak") ) {
//DebugBreak();
//}
//
// Copyright (C) 2003 Eric Lamette
// All rights reserved.
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//

// $Id: events_calendar_cell.php,v 1.8 2005/11/30 10:39:10 g_edwards Exp $
// Eric Lamette <ericlmt@ibelgique.com>
// Thanks to Andrew Eddie for his help

// ################################################################
// MOS Intruder Alerts
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################

// this file controls the events component month calendar display cell output.  It is separated from the
// showCalendar function in the events.php file to allow users to customize this portion of the code easier.
// The event information to be displayed within a month day on the calendar can be modified, as well as any
// overlay window information printed with a javascript mouseover event.  Each event prints as a separate table
// row with a single column, within the month table's cell.

// On mouse over date formats
// Note that the date formats for the events can be easily changed by modifying the sprintf formatting
// string below.  These are used for the default overlay window.  As well, the strftime() function could
// also be used instead to provide more powerful date formatting which supports locales if php function
// 'set_locale()' is being used.

$start_date = mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,0);
$start_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_up->get12hrTime() : $event_up->get24hrTime();
$stop_date = mosEventsHTML::getDateFormat($event_down->year,$event_down->month,$event_down->day,0);
$stop_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_down->get12hrTime() : $event_down->get24hrTime();

// add the event color as the column background color
$colStart .= "bgcolor=\"$bgeventcolor\" ";

// The title is printed as a link to the event's detail page
$title_event_link = "<a class='cal_titlelink' href='index.php?option=".$option."&task=view_detail&agid=".$id."&year=".$year."&month=".$month."&day=".$do."&Itemid=".$Itemid."'>".$title."</a>\n";

$publish_inform_title = addslashes(htmlspecialchars($title));

// The one overlay popup window defined for multi-day events.  Any number of different overlay windows
// can be defined here and used according to the event's repeat type, length, whatever.  Note that the
// definition of the overlib function call arguments is ( html_window_contents, extra optional paramenters ... )
// 'extra parameters' includes things like window positioning, display delays, window caption, etc.
// Documentation on the javascript overlib library can be found at: http://www.bosrup.com/web/overlib

if($stop_publish == $start_publish)
	$publish_inform_overlay = "onMouseOver=\"return overlib('<table border=0 height=100%>" .
		"<tr><td nowrap >".addcslashes($start_date,"'")."<br/>$start_time - $stop_time</td></tr></table>'" .
		", CAPTION, '$publish_inform_title', BELOW, LEFT);\" onMouseOut=\"return nd();\"";
else
	$publish_inform_overlay = "onMouseOver=\"return overlib('<table border=0 width=100% height=100%>" .
		"<tr><td><b>"._CAL_LANG_FROM.":&nbsp;</b>".addcslashes($start_date,"'").""."&nbsp;<b>"._CAL_LANG_TO.":&nbsp;</b>".addcslashes($stop_date,"'")."<br/>".
		"<b>Time:&nbsp;</b>$start_time&nbsp;-&nbsp;$stop_time</td></tr></table>'" .
		", CAPTION, '$publish_inform_title', BELOW, LEFT);\" onMouseOut=\"return nd();\"";


// Event Repeat Type Qualifier and Day Within Event Quailfiers:
// the if statements below basically will print different information for the event
// depending upon whether it is the start/stop day, repeat events type, or some date in between the
// start and the stop dates of a multi-day event.  This behavior can be modified at will here.
// Currently, an overlay window will only display on a mouseover if the event is a multi-day
// event (ie. every day repeat type) AND the month cell is a day WITHIN the event day range BUT NOT
// the start and stop days.  The overlay window displays the start and stop publish dates.  Different
// overlay windows can be displayed for the different states below by simply defining a new overlay
// window definition variable similar to the $publish_inform_overlay variable above and using it in the
// statements below.  Another possibility here is to control the max. length of any string used within the
// month cell to avoid calendar formatting issues.  Any string that exceeds this will get an overlay window
// in order to display the full length/width of the month cell.

// Note that we want multi-day events to display a titlelink for the first day only, but a popup for every day
// Fix this.

if ($checkprint->viewable == true){
	//if ($repeat_event_type == 0){ //all days
		if (($cellDate == $stop_publish) && ($stop_publish == $start_publish)) {// single day event
      		$cellString = $publish_inform_overlay.">".$title_event_link; // just print the title
        } elseif ($cellDate == $start_publish) { // first day of a multi-day event
            $cellString = $publish_inform_overlay.">".$title_event_link; // just print the title
        } elseif ($cellDate == $stop_publish) { // last day of a multi-day event
            $cellString = $publish_inform_overlay.">".$title_event_link; // enable an overlib popup
        } elseif (($cellDate < $stop_publish) && ($cellDate > $start_publish)  && $d != 1) { // middle day of a multi-day event
            $cellString = $publish_inform_overlay.">".$title_event_link;   // enable the display of an overlib popup describing publish date
        } elseif (($cellDate < $stop_publish) && ($cellDate > $start_publish)  && $d == 1) { // middle day of a multi-day event
            $cellString = $publish_inform_overlay.">".$title_event_link;   // enable the display of an overlib popup describing publish date
        } else { // this should never happen, but is here just in case...
            $cellString = ""; $colStart = ""; $colEnd = "";
        }
  	//} elseif ($repeat_event_type >= 1){ // each week, month, year
    	//$cellString = ">".$title_event_link;  //just display the title
  	//} else { // this should never happen, but is here just in case...
    	//$cellString = ""; $colStart = ""; $colEnd = "";
  	//}
 	echo $colStart.$cellString.$colEnd;
}

?>