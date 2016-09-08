<?php
// $Id: hungarian.php,v 1.5 2004/10/05 20:23:01 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Translation by: Csaba Kiss <ckiss@tujvaros.hu>

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Január");
DEFINE("_CAL_LANG_FEBRUARY", "Február");
DEFINE("_CAL_LANG_MARCH", "Március");
DEFINE("_CAL_LANG_APRIL", "Április");
DEFINE("_CAL_LANG_MAY", "Május");
DEFINE("_CAL_LANG_JUNE", "Június");
DEFINE("_CAL_LANG_JULY", "Július");
DEFINE("_CAL_LANG_AUGUST", "Augusztus");
DEFINE("_CAL_LANG_SEPTEMBER", "Szeptember");
DEFINE("_CAL_LANG_OCTOBER", "Október");
DEFINE("_CAL_LANG_NOVEMBER", "November");
DEFINE("_CAL_LANG_DECEMBER", "December");

// Short day names
DEFINE("_CAL_LANG_SUN", "Vas");
DEFINE("_CAL_LANG_MON", "Hét");
DEFINE("_CAL_LANG_TUE", "Ke");
DEFINE("_CAL_LANG_WED", "Szer");
DEFINE("_CAL_LANG_THU", "Csüt");
DEFINE("_CAL_LANG_FRI", "Pén");
DEFINE("_CAL_LANG_SAT", "Szo");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Vasárnap");
DEFINE("_CAL_LANG_MONDAY", "Hétfõ");
DEFINE("_CAL_LANG_TUESDAY", "Kedd");
DEFINE("_CAL_LANG_WEDNESDAY", "Szerda");
DEFINE("_CAL_LANG_THURSDAY", "Csütörtök");
DEFINE("_CAL_LANG_FRIDAY", "Péntek");
DEFINE("_CAL_LANG_SATURDAY", "Szombat");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "V");
DEFINE("_CAL_LANG_MONDAYSHORT", "H");
DEFINE("_CAL_LANG_TUESDAYSHORT", "K");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "S");
DEFINE("_CAL_LANG_THURSDAYSHORT", "C");
DEFINE("_CAL_LANG_FRIDAYSHORT", "P");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Minden nap");
DEFINE("_CAL_LANG_EACHWEEK", "Minden héten");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Minden páros héten");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Minden páratlan héten");
DEFINE("_CAL_LANG_EACHMONTH", "Minden hónapban");
DEFINE("_CAL_LANG_EACHYEAR", "Minden évben");
DEFINE("_CAL_LANG_ONLYDAYS", "Csak a kiválasztott napon");
DEFINE("_CAL_LANG_EACH", "Each");
DEFINE("_CAL_LANG_EACHOF","of each");
DEFINE("_CAL_LANG_ENDMONTH", "hónap vége");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "By day number");

// User type
DEFINE("_CAL_LANG_ANONYME", "Név nélül");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Kösz a rögzítést - Átnézzük!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Ez az esemény módosult."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Esemény törlõdött!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Nincs jogosultságod a szervízhez !"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Új rögzítés");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Új módosítás");

// Presentation
DEFINE("_CAL_LANG_BY", ""); 
DEFINE("_CAL_LANG_FROM", "kezdet::"); 
DEFINE("_CAL_LANG_TO", "vége::"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archiv"); 
DEFINE("_CAL_LANG_WEEK", "a hét"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Nincs esemény");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Nincs esemény");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Nincs esemény");
DEFINE("_CAL_LANG_THIS_DAY", "ez a nap");
DEFINE("_CAL_LANG_THIS_MONTH", "ez a hónap");
DEFINE("_CAL_LANG_LAST_MONTH", "Utolsó hónap");
DEFINE("_CAL_LANG_NEXT_MONTH", "Következõ hónap");
DEFINE("_CAL_LANG_EVENTSFOR", "Események");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Események");
DEFINE("_CAL_LANG_REP_DAY", "nap");
DEFINE("_CAL_LANG_REP_WEEK", "hét");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "páros hét");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "páratlan hét");
DEFINE("_CAL_LANG_REP_MONTH", "hónap");
DEFINE("_CAL_LANG_REP_YEAR", "év");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Mai nap");
DEFINE("_CAL_LANG_VIEWTOCOME", "Következõ ebben a hónapban");
DEFINE("_CAL_LANG_VIEWBYDAY", "Naponként");
DEFINE("_CAL_LANG_VIEWBYCAT", "Kategóriánként");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Hónapként");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Évenként");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Hetente");
DEFINE("_CAL_LANG_BACK", "Vissza");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Elõzõ nap");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Elõzõ hét");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Elõzõ hónap");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Elõzõ év");
DEFINE("_CAL_LANG_NEXTDAY", "Következõ nap");
DEFINE("_CAL_LANG_NEXTWEEK", "Következõ hét");
DEFINE("_CAL_LANG_NEXTMONTH", "Következõ hónap");
DEFINE("_CAL_LANG_NEXTYEAR", "Következõ év");

DEFINE("_CAL_LANG_ADMINPANEL", "Admin panel");
DEFINE("_CAL_LANG_ADDEVENT", "Esemény hozzáadása");
DEFINE("_CAL_LANG_MYEVENTS", "Eseményeim");
DEFINE("_CAL_LANG_DELETE", "Törlés");
DEFINE("_CAL_LANG_MODIFY", "Módosítás");

// Form
DEFINE("_CAL_LANG_HELP", "Help");

DEFINE("_CAL_LANG_CAL_TITLE", "Események");
DEFINE("_CAL_LANG_ADD_TITLE", "Hozzáad");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Módosít");

DEFINE("_CAL_LANG_EVENT_TITLE", "Tárgy");
DEFINE("_CAL_LANG_EVENT_COLOR", "Szín");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategória");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Válassz kategóriát");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Aktivitás");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "URL vagy MAIL hozzáadásakor használd  ezt a fórmát: <u>http://www.mysite.com</u> vagy <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Hely");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kapcsolat");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Extra info");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Szerzõ (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Induló dátum");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Vége dátum");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Induló óra");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Vége óra");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Induló óra");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Vége óra");
DEFINE("_CAL_LANG_PUB_INFO", "Publikáció");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Ismétlés tipusa");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Napi ismétlés");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "A hét napjai");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Nézet");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Elvet");
DEFINE("_CAL_LANG_SUBMITSAVE", "Ment");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Veuillez choisir une semaine.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Veuillez choisir un jour.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Minden kategória");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Jogosultság szint");
DEFINE("_CAL_LANG_EVENT_HITS", "Látták");
DEFINE("_CAL_LANG_EVENT_STATE", "Állapot");
DEFINE("_CAL_LANG_EVENT_CREATED", "Készítve");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Új esemény");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Utolsó módosítás");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Nem módosult");

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
