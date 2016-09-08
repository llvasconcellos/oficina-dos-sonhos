<?php
// $Id: polish.php,v 1.7 2004/10/05 20:23:01 mleinmueller Exp $
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
DEFINE("_CAL_LANG_JANUARY", "Styczeñ");
DEFINE("_CAL_LANG_FEBRUARY", "Luty");
DEFINE("_CAL_LANG_MARCH", "Marzec");
DEFINE("_CAL_LANG_APRIL", "Kwiecieñ");
DEFINE("_CAL_LANG_MAY", "Maj");
DEFINE("_CAL_LANG_JUNE", "Czerwiec");
DEFINE("_CAL_LANG_JULY", "Lipiec");
DEFINE("_CAL_LANG_AUGUST", "Sierpieñ");
DEFINE("_CAL_LANG_SEPTEMBER", "Wrzesieñ");
DEFINE("_CAL_LANG_OCTOBER", "Pa¥dziernik");
DEFINE("_CAL_LANG_NOVEMBER", "Listopad");
DEFINE("_CAL_LANG_DECEMBER", "Grudzieñ");

// Short day names
DEFINE("_CAL_LANG_SUN", "Nie");
DEFINE("_CAL_LANG_MON", "Pon");
DEFINE("_CAL_LANG_TUE", "Wto");
DEFINE("_CAL_LANG_WED", "¦ro");
DEFINE("_CAL_LANG_THU", "Czw");
DEFINE("_CAL_LANG_FRI", "Pi±");
DEFINE("_CAL_LANG_SAT", "Sob");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Niedziela");
DEFINE("_CAL_LANG_MONDAY", "Poniedzia³ek");
DEFINE("_CAL_LANG_TUESDAY", "Wtorek");
DEFINE("_CAL_LANG_WEDNESDAY", "¦roda");
DEFINE("_CAL_LANG_THURSDAY", "Czwartek");
DEFINE("_CAL_LANG_FRIDAY", "Pi±tek");
DEFINE("_CAL_LANG_SATURDAY", "Sobota");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "N");
DEFINE("_CAL_LANG_MONDAYSHORT", "P");
DEFINE("_CAL_LANG_TUESDAYSHORT", "W");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "¦");
DEFINE("_CAL_LANG_THURSDAYSHORT", "C");
DEFINE("_CAL_LANG_FRIDAYSHORT", "P");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Ka¿dego dnia");
DEFINE("_CAL_LANG_EACHWEEK", "Ka¿dy tydzieñ");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Ka¿dy parzysty tydzieñ");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Ka¿dy nieparzysty tydzieñ");
DEFINE("_CAL_LANG_EACHMONTH", "Ka¿dy miesi±c");
DEFINE("_CAL_LANG_EACHYEAR", "Ka¿dy rok");
DEFINE("_CAL_LANG_ONLYDAYS", "Tylko wybrane dni");
DEFINE("_CAL_LANG_EACH", "Ka¿dy");
DEFINE("_CAL_LANG_EACHOF","w ka¿dy");
DEFINE("_CAL_LANG_ENDMONTH", "koniec miesi±ca");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Przez liczbê dni");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonimowy");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Thanks for you submission - We will verify your proposition!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "This event has been modified."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "This event has been deleted!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "You don't have access to this service !"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "New submission on");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "New modification on");

// Presentation
DEFINE("_CAL_LANG_BY", "Przez"); 
DEFINE("_CAL_LANG_FROM", "Z"); 
DEFINE("_CAL_LANG_TO", "Do"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archiwum"); 
DEFINE("_CAL_LANG_WEEK", "tydzieñ"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Brak wydarzeñ");
DEFINE("_CAL_LANG_NO_EVENTFOR", "brak wydarzeñ dla");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "No event for the");
DEFINE("_CAL_LANG_THIS_DAY", "aktualny dzieñ");
DEFINE("_CAL_LANG_THIS_MONTH", "Aktualny miesi±c");
DEFINE("_CAL_LANG_LAST_MONTH", "Ostatni miesi±c");
DEFINE("_CAL_LANG_NEXT_MONTH", "Nastêpny miesi±c");
DEFINE("_CAL_LANG_EVENTSFOR", "Wydarzenia - ");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Wydarzenia - ");
DEFINE("_CAL_LANG_REP_DAY", "dzieñ");
DEFINE("_CAL_LANG_REP_WEEK", "tydzieñ");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "parzysty tydzieñ");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "nieparzysty tydzieñ");
DEFINE("_CAL_LANG_REP_MONTH", "miesi±c");
DEFINE("_CAL_LANG_REP_YEAR", "rok");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Zobacz dzisiejsze");
DEFINE("_CAL_LANG_VIEWTOCOME", "W nadchodz±cym miesi±cu");
DEFINE("_CAL_LANG_VIEWBYDAY", "Zobacz po dniach");
DEFINE("_CAL_LANG_VIEWBYCAT", "Zobacz po kategoriach");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Zobacz po miesi±cach");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Zobacz po latach");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Zobacz po tygodniach");
DEFINE("_CAL_LANG_BACK", "Wróæ");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Poprzedni dzieñ");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Poprzedni tydzieñ");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Poprzedni miesi±c");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Poprzedni rok");
DEFINE("_CAL_LANG_NEXTDAY", "Nastêpny dzieñ");
DEFINE("_CAL_LANG_NEXTWEEK", "Nastêpny tydzieñ");
DEFINE("_CAL_LANG_NEXTMONTH", "Nastêpny miesi±c");
DEFINE("_CAL_LANG_NEXTYEAR", "Nastêpny rok");

DEFINE("_CAL_LANG_ADMINPANEL", "Panel administratora");
DEFINE("_CAL_LANG_ADDEVENT", "Dodaj wydarzenie");
DEFINE("_CAL_LANG_MYEVENTS", "Moje wydarzenia");
DEFINE("_CAL_LANG_DELETE", "Usuñ");
DEFINE("_CAL_LANG_MODIFY", "Edycja");

// Form
DEFINE("_CAL_LANG_HELP", "Pomoc");

DEFINE("_CAL_LANG_CAL_TITLE", "Wydarzenia");
DEFINE("_CAL_LANG_ADD_TITLE", "Dodaj");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Edytuj");

DEFINE("_CAL_LANG_EVENT_TITLE", "Temat");
DEFINE("_CAL_LANG_EVENT_COLOR", "Kolor");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategorie");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Wybierz kategoriê");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Aktywno¶æ");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Aby dodaæ URL lub adres email, napisz <br><u>http://www.mysite.com</u> lub <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Miejsce");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kontakt");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Informacje dodatkowe");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Data rozpoczêcia");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Data zakoñczenia");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Godzina rozpoczêcia");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Godzina zakoñczenia");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Godzina rozpoczêcia");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Godzina zakoñczenia");
DEFINE("_CAL_LANG_PUB_INFO", "Publikowane informacje");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Typ powtórzenia");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Dzieñ powtórzenia");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Dzieñ tygodnia");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Podgl±d");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Anuluj");
DEFINE("_CAL_LANG_SUBMITSAVE", "Zapisz");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Veuillez choisir une semaine.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Veuillez choisir un jour.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Wszystkie kategorie");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Poziom dostêpu");
DEFINE("_CAL_LANG_EVENT_HITS", "Wybrañ");
DEFINE("_CAL_LANG_EVENT_STATE", "Stan");
DEFINE("_CAL_LANG_EVENT_CREATED", "Stworzone");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nowe wydarzenie");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Ostatnio modyfikowany");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Nie modyfikowany");

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
