<?php
// $Id: czech.php,v 1.5 2004/10/05 20:23:01 mleinmueller Exp $
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

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Leden");
DEFINE("_CAL_LANG_FEBRUARY", "Únor");
DEFINE("_CAL_LANG_MARCH", "Bøezen");
DEFINE("_CAL_LANG_APRIL", "Duben");
DEFINE("_CAL_LANG_MAY", "Kvìten");
DEFINE("_CAL_LANG_JUNE", "Èerven");
DEFINE("_CAL_LANG_JULY", "Èervenec");
DEFINE("_CAL_LANG_AUGUST", "Srpen");
DEFINE("_CAL_LANG_SEPTEMBER", "Záøí");
DEFINE("_CAL_LANG_OCTOBER", "Øíjen");
DEFINE("_CAL_LANG_NOVEMBER", "Listopad");
DEFINE("_CAL_LANG_DECEMBER", "Prosinec");

// Short day names
DEFINE("_CAL_LANG_SUN", "Ne");
DEFINE("_CAL_LANG_MON", "Po");
DEFINE("_CAL_LANG_TUE", "Út");
DEFINE("_CAL_LANG_WED", "St");
DEFINE("_CAL_LANG_THU", "Èt");
DEFINE("_CAL_LANG_FRI", "Pá");
DEFINE("_CAL_LANG_SAT", "So");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Nedìle");
DEFINE("_CAL_LANG_MONDAY", "Pondìlí");
DEFINE("_CAL_LANG_TUESDAY", "Úterý");
DEFINE("_CAL_LANG_WEDNESDAY", "Støeda");
DEFINE("_CAL_LANG_THURSDAY", "Ètvrtek");
DEFINE("_CAL_LANG_FRIDAY", "Pátek");
DEFINE("_CAL_LANG_SATURDAY", "Sobota");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "N");
DEFINE("_CAL_LANG_MONDAYSHORT", "P");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Ú");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "S");
DEFINE("_CAL_LANG_THURSDAYSHORT", "È");
DEFINE("_CAL_LANG_FRIDAYSHORT", "P");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Ka¾dý den");
DEFINE("_CAL_LANG_EACHWEEK", "Ka¾dý týden");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Ka¾dý sudý týden");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Ka¾dý lichý týden");
DEFINE("_CAL_LANG_EACHMONTH", "Ka¾dý mìsíc");
DEFINE("_CAL_LANG_EACHYEAR", "Ka¾dý rok");
DEFINE("_CAL_LANG_ONLYDAYS", "Pouze vybrané dny");
DEFINE("_CAL_LANG_EACH", "Ka¾dý");
DEFINE("_CAL_LANG_EACHOF","ka¾dého");
DEFINE("_CAL_LANG_ENDMONTH", "konec mìsíce");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "By day number");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonymní");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Dìkujeme za pøíspìvek. Pøed publikováním, bude Vá¹ pøíspìvek zkontrolován!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Tato událost byla zmìnìna."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Tato událost byla smazána!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Nemáte pøístup k této slu¾bì!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nový pøíspìvek k");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nová zmìna k");

// Presentation
DEFINE("_CAL_LANG_BY", "autor"); 
DEFINE("_CAL_LANG_FROM", "Od"); 
DEFINE("_CAL_LANG_TO", "Do"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archív"); 
DEFINE("_CAL_LANG_WEEK", "týden"); 
DEFINE("_CAL_LANG_NO_EVENTS", "®ádná událost");
DEFINE("_CAL_LANG_NO_EVENTFOR", "®ádná událost");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "®ádná událost pro");
DEFINE("_CAL_LANG_REP_DAY", "day");
DEFINE("_CAL_LANG_THIS_DAY", "tento den");
DEFINE("_CAL_LANG_THIS_MONTH", "Tento mìsíc");
DEFINE("_CAL_LANG_LAST_MONTH", "Last month");
DEFINE("_CAL_LANG_NEXT_MONTH", "Next month");
DEFINE("_CAL_LANG_EVENTSFOR", "Událost pro");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Událost pro");
DEFINE("_CAL_LANG_REP_WEEK", "týden");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "sudý týden");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "lichý týden");
DEFINE("_CAL_LANG_REP_MONTH", "mìsíc");
DEFINE("_CAL_LANG_REP_YEAR", "rok");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Dnes");
DEFINE("_CAL_LANG_VIEWTOCOME", "UpComing this month");
DEFINE("_CAL_LANG_VIEWBYDAY", "See by day");
DEFINE("_CAL_LANG_VIEWBYCAT", "Náhled podle kategorií");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Tento mìsíc");
DEFINE("_CAL_LANG_VIEWBYYEAR", "See by year");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Tento týden");
DEFINE("_CAL_LANG_BACK", "Zpìt");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Pøedchozí den");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Previous week");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Pøedchozí mìsíc");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Previous year");
DEFINE("_CAL_LANG_NEXTDAY", "Dal¹í den");
DEFINE("_CAL_LANG_NEXTWEEK", "Next week");
DEFINE("_CAL_LANG_NEXTMONTH", "Dal¹í mìsíc");
DEFINE("_CAL_LANG_NEXTYEAR", "Next year");

DEFINE("_CAL_LANG_ADMINPANEL", "Asministrace");
DEFINE("_CAL_LANG_ADDEVENT", "Pøidat událost");
DEFINE("_CAL_LANG_MYEVENTS", "Moje události");
DEFINE("_CAL_LANG_DELETE", "Smazat");
DEFINE("_CAL_LANG_MODIFY", "Zmìnit");

// Form
DEFINE("_CAL_LANG_HELP", "Nápovìda");

DEFINE("_CAL_LANG_CAL_TITLE", "Událost");
DEFINE("_CAL_LANG_ADD_TITLE", "Pøidat");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Zmìnit");

DEFINE("_CAL_LANG_EVENT_TITLE", "Pøedmìt");
DEFINE("_CAL_LANG_EVENT_COLOR", "Barva");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategorie");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Vyberte prosím kategorii");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Èinnost");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Pokud chcete pøidat URL nebo EMAIL, napi¹tì jednodu¹e <u>tp://www.príklad.cz</u> or <u>mailto:muj@email.cz</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Místo");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kontakt");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Dal¹í info");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Zaèátek (datum)");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Konec (datum)");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Zaèátek (hodina)");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Konec (hodina)");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Zaèátek (hodina)");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Konec (hodina)");
DEFINE("_CAL_LANG_PUB_INFO", "Publikovat");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Repeat type");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Opakovat den");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Dny v týdnu");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Náhled");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Zru¹it");
DEFINE("_CAL_LANG_SUBMITSAVE", "Ulo¾it");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Veuillez choisir une semaine.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Veuillez choisir un jour.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "V¹echny kategorie");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Úroveò pøístupu");
DEFINE("_CAL_LANG_EVENT_HITS", "Shlédnuto");
DEFINE("_CAL_LANG_EVENT_STATE", "Status");
DEFINE("_CAL_LANG_EVENT_CREATED", "Vytvoøeno");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nová událost");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Naposledy zmìnìno");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Nezmìnìno");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Some sort of Activity\\ndescription must be entered.");
 

	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Color</b>
          </td>
          <td>Choose the color of the background which will be visible in month calendar view.  If the Category checkbox is checked,
		  the color will default to the color of the category (defined by the site admin) that is chosen under the Content tab form for the event, and the
		  'Color Picker' button will be disabled.</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Date</b></td>
          <td>Choose the Begin Date and the End Date of your event.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Time</b></td>
          <td>Choose the Time of Day of your event.  Format is <span style='color:blue;font-weight:bold;'>hh:mm {am|pm}</span>.<br/>Time can be specified in either 12 or 24 hr format.<br/><br/><b><i><span style='color:red;'>(New)</span></i> Note</b> that a special case occurs for <span style='color:red;font-weight:bold;'>single day over-night events</span>.  IE. For a single day event beginning at say 19:00 and finishing at 3:00, the Start and End Dates <b>MUST</b> be&nbsp;
		   the same date, and should be set to the date corresponding to the day before midnight.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Repeat Type</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>By Day</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Every Day<br/><i>(default)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Choose this option for a non-reoccurring single or multi-day event, with a new event occurrence for every day within the Start and End Date range</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>By Week</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Once Per Week
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  This option allow to choose the weekday of repeat
                  <table border="0" width="100%" height="100%"><tr><td><b>Day number</b> for repeat type each 10/../2003</td></tr><tr><td><b>Day name</b> for repeat type each Monday</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Multiple Week Days Per Week
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">This option allow to choose on which week days your event will be visible.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Week of Month # <br>For 'Once per Week' and 'Multiple Days Per Week' options above</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Week 1 :</b> 1st week of the month</td></tr>
                    <tr><td><b>Week 2 :</b> 2nd week of the month</td></tr>
                    <tr><td><b>Week 3 :</b> 3rd week of the month</td></tr>
                    <tr><td><b>Week 4 :</b> 4th week of the month</td></tr>
                    <tr><td><b>Week 5 :</b> 5th week of the month (if applicable)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>By Month</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Once Per Month</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     This option allow to choose the repeating Day of the Month
                     <table border="0" width="100%" height="100%"><tr><td><b>Day number</b> for repeat type each 10/../2003</td></tr><tr><td><b>Day name</b> for repeat type each Monday</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  End of Each Month
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
				   The event is on the last day of each month independently of the day number, if that last day
		falls within the date range specified by the Start and End Dates for the event.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>By Year</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Once Per Year
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  This option allow to choose a single day every Year
                  <table border="0" width="100%" height="100%"><tr><td><b>Day number</b> for repeat type each 10/../2003</td></tr><tr><td><b>Day name</b> for repeat type each Monday</td></tr></table>
                  </font>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!-- END REPEAT -->
END;


// Do not change below
DEFINE("_CAL_LANG_EVENT_FORM_HELP_ADMIN", $com_events_form_help_color . $com_events_form_help .$com_events_form_help_extended);

if(!defined("_CAL_FORCE_CAT_COLOR_EVENT_FORM") || _CAL_FORCE_CAT_COLOR_EVENT_FORM == "NO")
	$com_events_form_help = $com_events_form_help_color . $com_events_form_help;
	
if(!defined("_CAL_SIMPLE_EVENT_FORM") || _CAL_SIMPLE_EVENT_FORM == "NO")
	$com_events_form_help .= $com_events_form_help_extended;
	
DEFINE("_CAL_LANG_EVENT_FORM_HELP", $com_events_form_help);

?>
