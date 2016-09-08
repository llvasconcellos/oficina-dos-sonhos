<?php
// $Id: lithuanian.php,v 1.5 2004/10/05 20:23:01 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Lithuanian translation by Dainius JARUTIS - dainius@dve.lt 16/01/2004 

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );


//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Sausis");
DEFINE("_CAL_LANG_FEBRUARY", "Vasaris");
DEFINE("_CAL_LANG_MARCH", "Kovas");
DEFINE("_CAL_LANG_APRIL", "Balandis");
DEFINE("_CAL_LANG_MAY", "Geguþë");
DEFINE("_CAL_LANG_JUNE", "Birþelis");
DEFINE("_CAL_LANG_JULY", "Liepa");
DEFINE("_CAL_LANG_AUGUST", "Rugpjûtis");
DEFINE("_CAL_LANG_SEPTEMBER", "Rugsëjis");
DEFINE("_CAL_LANG_OCTOBER", "Spalis");
DEFINE("_CAL_LANG_NOVEMBER", "Lapkritis");
DEFINE("_CAL_LANG_DECEMBER", "Gruodis");

// Short day names
DEFINE("_CAL_LANG_SUN", "Sk");
DEFINE("_CAL_LANG_MON", "Pr");
DEFINE("_CAL_LANG_TUE", "An");
DEFINE("_CAL_LANG_WED", "Tr");
DEFINE("_CAL_LANG_THU", "Kt");
DEFINE("_CAL_LANG_FRI", "Pn");
DEFINE("_CAL_LANG_SAT", "Ðt");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Sekmadienis");
DEFINE("_CAL_LANG_MONDAY", "Pirmadienis");
DEFINE("_CAL_LANG_TUESDAY", "Antradienis");
DEFINE("_CAL_LANG_WEDNESDAY", "Treèiadienis");
DEFINE("_CAL_LANG_THURSDAY", "Ketvirtadienis");
DEFINE("_CAL_LANG_FRIDAY", "Penktadienis");
DEFINE("_CAL_LANG_SATURDAY", "Ðeðtadienis");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "S");
DEFINE("_CAL_LANG_MONDAYSHORT", "P");
DEFINE("_CAL_LANG_TUESDAYSHORT", "A");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "T");
DEFINE("_CAL_LANG_THURSDAYSHORT", "K");
DEFINE("_CAL_LANG_FRIDAYSHORT", "P");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Ð");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Visomis dienomis");
DEFINE("_CAL_LANG_EACHWEEK", "Visomis savaitëmis");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Visomis nelyginëmis savaitëmis");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Visomis lyginëmis savaitëmis");
DEFINE("_CAL_LANG_EACHMONTH", "Visais mënesiais");
DEFINE("_CAL_LANG_EACHYEAR", "Visais metais");
DEFINE("_CAL_LANG_ONLYDAYS", "Tik paþymëtomis dienomis");
DEFINE("_CAL_LANG_EACH", "Kiekvienà");
DEFINE("_CAL_LANG_EACHOF","Kiekvienà ið");
DEFINE("_CAL_LANG_ENDMONTH", "mënesio pabaigos");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Pagal dienos numerá");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonimas");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Aèiû uþ pasiûlytà renginá - Mes patikrinæ informacijà, já patalpinsime!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Ðis renginis pakeistas sëkmingai."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Ðis renginys panaikintas!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Jums nesuteikta teisi atlikti ðá veiksmà !"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Naujas renginys: ");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Naujas pataisymas: ");

// Presentation
DEFINE("_CAL_LANG_BY", "patalpino"); 
DEFINE("_CAL_LANG_FROM", "Nuo"); 
DEFINE("_CAL_LANG_TO", "Iki"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archyvas"); 
DEFINE("_CAL_LANG_WEEK", "savaitë"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Nëra renginiø");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Nëra renginiø: ");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Nëra renginiø: ");
DEFINE("_CAL_LANG_THIS_DAY", "ðiai dienai");
DEFINE("_CAL_LANG_THIS_MONTH", "ðiam mënesiui");
DEFINE("_CAL_LANG_LAST_MONTH", "Last month");
DEFINE("_CAL_LANG_NEXT_MONTH", "Next month");
DEFINE("_CAL_LANG_EVENTSFOR", "Renginiai: ");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Renginiai: ");
DEFINE("_CAL_LANG_REP_DAY", "diena");
DEFINE("_CAL_LANG_REP_WEEK", "savaitei");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "nelyginei savaitei");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "lyginei savaitei");
DEFINE("_CAL_LANG_REP_MONTH", "mënesiui");
DEFINE("_CAL_LANG_REP_YEAR", "metams");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Ðiandien");
DEFINE("_CAL_LANG_VIEWTOCOME", "Ðá mënesá");
DEFINE("_CAL_LANG_VIEWBYDAY", "Diena");
DEFINE("_CAL_LANG_VIEWBYCAT", "Kategorija");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Mënuo");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Metai");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Savaitë");
DEFINE("_CAL_LANG_BACK", "Atgal");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Praëjusi diena");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Praëjusi sàvaitë");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Praëjæs mënuo");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Praëjæ metai");
DEFINE("_CAL_LANG_NEXTDAY", "Sekanti diena");
DEFINE("_CAL_LANG_NEXTWEEK", "Sekanti savaitë");
DEFINE("_CAL_LANG_NEXTMONTH", "Sekantis mënuo");
DEFINE("_CAL_LANG_NEXTYEAR", "Sekantys metai");

DEFINE("_CAL_LANG_ADMINPANEL", "Administratoriaus irankiai");
DEFINE("_CAL_LANG_ADDEVENT", "Naujas renginys");
DEFINE("_CAL_LANG_MYEVENTS", "Mano renginiai");
DEFINE("_CAL_LANG_DELETE", "Ðalinti");
DEFINE("_CAL_LANG_MODIFY", "Keisti");

// Form
DEFINE("_CAL_LANG_HELP", "Pagalba");

DEFINE("_CAL_LANG_CAL_TITLE", "Renginiai");
DEFINE("_CAL_LANG_ADD_TITLE", "Pridëti");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Keisti");

DEFINE("_CAL_LANG_EVENT_TITLE", "Tema");
DEFINE("_CAL_LANG_EVENT_COLOR", "Spalva");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategorijos");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Pasirinkite kategorijà");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Aktyvumas");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Norëdami ávesti interneto adresà ar e-mail adresà, paprasèiausiai raðykite <u>http://www.adresas.com</u> arba <u>mailto:mano@pastas.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Adresas");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kontaktai");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Extra Informacija");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autorius (nikas)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Pradþios data");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Pabaigos data");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Pradþios valanda");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Pabaigos valanda");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Pradþios valanda");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Pabaigos valanda");
DEFINE("_CAL_LANG_PUB_INFO", "Publication informations");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Kartojimo tipas");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Kartojimo diena");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Savaitës dienos");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Perziura");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Atðaukti");
DEFINE("_CAL_LANG_SUBMITSAVE", "Iðsaugoti");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Pasirinkite savaitæ.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Pasirinkite dienà.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Visos kategorijos");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Priëjimo lygis");
DEFINE("_CAL_LANG_EVENT_HITS", "Perþiûrëta");
DEFINE("_CAL_LANG_EVENT_STATE", "Bûklë");
DEFINE("_CAL_LANG_EVENT_CREATED", "Patalpinta");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Naujas renginys");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Paskutiná kartà keista");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Nepakeista");

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


