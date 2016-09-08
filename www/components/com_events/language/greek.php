<?php
// $Id: greek.php,v 1.4 2004/10/05 20:23:01 mleinmueller Exp $
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
DEFINE("_CAL_LANG_JANUARY", "ΙΑΝΟΥΑΡΙΟΣ");
DEFINE("_CAL_LANG_FEBRUARY", "ΦΕΒΡΟΥΑΡΙΟΣ");
DEFINE("_CAL_LANG_MARCH", "ΜΑΡΤΙΟΣ");
DEFINE("_CAL_LANG_APRIL", "ΑΠΡΙΛΙΟΣ");
DEFINE("_CAL_LANG_MAY", "ΜΑΙΟΣ");
DEFINE("_CAL_LANG_JUNE", "ΙΟΥΝΙΟΣ");
DEFINE("_CAL_LANG_JULY", "ΙΟΥΛΙΟΣ");
DEFINE("_CAL_LANG_AUGUST", "ΑΥΓΟΥΣΤΟΣ");
DEFINE("_CAL_LANG_SEPTEMBER", "ΣΕΠΤΕΜΒΡΙΟΣ");
DEFINE("_CAL_LANG_OCTOBER", "ΟΚΤΩΜΒΡΙΟΣ");
DEFINE("_CAL_LANG_NOVEMBER", "ΝΟΕΜΒΡΙΟΣ");
DEFINE("_CAL_LANG_DECEMBER", "ΔΕΚΕΜΒΡΙΟΣ");

// Short day names
DEFINE("_CAL_LANG_SUN", "Κυρ");
DEFINE("_CAL_LANG_MON", "Δευ");
DEFINE("_CAL_LANG_TUE", "Τρι");
DEFINE("_CAL_LANG_WED", "Τετ");
DEFINE("_CAL_LANG_THU", "Πεμ");
DEFINE("_CAL_LANG_FRI", "Παρ");
DEFINE("_CAL_LANG_SAT", "Σαβ");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Κυριακή");
DEFINE("_CAL_LANG_MONDAY", "Δευτέρα");
DEFINE("_CAL_LANG_TUESDAY", "Τρίτη");
DEFINE("_CAL_LANG_WEDNESDAY", "Τετάρτη");
DEFINE("_CAL_LANG_THURSDAY", "Πέμπτη");
DEFINE("_CAL_LANG_FRIDAY", "Παρασκευή");
DEFINE("_CAL_LANG_SATURDAY", "Σαββάτο");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "Κ");
DEFINE("_CAL_LANG_MONDAYSHORT", "Δ");
DEFINE("_CAL_LANG_TUESDAYSHORT", "T");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Τ");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Π");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Π");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Σ");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Κάθε Μέρα");
DEFINE("_CAL_LANG_EACHWEEK", "Κάθε Εβδομάδα");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Κάθε επομενη Εβδομάδα");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Κάθε προηγούμενη Εβδομάδα");
DEFINE("_CAL_LANG_EACHMONTH", "Κάθε Μήνα");
DEFINE("_CAL_LANG_EACHYEAR", "Καθε Χρόνο");
DEFINE("_CAL_LANG_ONLYDAYS", "Μόνον Τις Επιλεγμένες Μέρες");
DEFINE("_CAL_LANG_EACH", "Αυτές");
DEFINE("_CAL_LANG_EACHOF","Από Αυτές");
DEFINE("_CAL_LANG_ENDMONTH", "τέλος του μήνα");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Απο νούμερο του μήνα");

// User type
DEFINE("_CAL_LANG_ANONYME", "Ανώνυμος");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Ευχαριστώ για την ενημέρωση- Θα πιστοποιήσουμε την θέση σου!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Αυτό το γεγονός άλλαξε."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Αυτό το γεγονός διεγράφη!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Δεν έχετε προσπέλαση σε αυτήν την ενέργεια!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Νέα προσθήκη ανοικτή");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Νέα αλλαγή ανοικτή");

// Presentation
DEFINE("_CAL_LANG_BY", "από"); 
DEFINE("_CAL_LANG_FROM", "από"); 
DEFINE("_CAL_LANG_TO", "Σε"); 
DEFINE("_CAL_LANG_ARCHIVE", "Αρχείο"); 
DEFINE("_CAL_LANG_WEEK", "η εβδομάδα"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Δέν υπάρχουν γεγονότα");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Δέν υπάρχουν γεγονότα για");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Δέν υπάρχουν γεγονότα για το");
DEFINE("_CAL_LANG_THIS_DAY", "αυτην την μέρα");
DEFINE("_CAL_LANG_THIS_MONTH", "αυτον τον μηνα");
DEFINE("_CAL_LANG_LAST_MONTH", "προηγουμενο μήνα");
DEFINE("_CAL_LANG_NEXT_MONTH", "επόμενο μήνα");
DEFINE("_CAL_LANG_EVENTSFOR", "Γεγονότα για");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Γεγονοτα για τον");
DEFINE("_CAL_LANG_REP_DAY", "ημέρα");
DEFINE("_CAL_LANG_REP_WEEK", "ευδομάδα");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "επόμενη εβδομάδα");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "προηγούμενη εβδομάδα");
DEFINE("_CAL_LANG_REP_MONTH", "μήνα");
DEFINE("_CAL_LANG_REP_YEAR", "χρόνο");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Δές Σήμερα");
DEFINE("_CAL_LANG_VIEWTOCOME", "Έρχετε αυτην την εβδομάδα");
DEFINE("_CAL_LANG_VIEWBYDAY", "Δες με την μέρα");
DEFINE("_CAL_LANG_VIEWBYCAT", "Δες με τις κατηγορίες");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Δες με τον μηνα");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Δες με τον χρόνο");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Δες με την εβδομάδα");
DEFINE("_CAL_LANG_BACK", "Πίσω");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Προηγολυμενη μέρα");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Προηγούμενη ευβδομάδα");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Προηγούμενοσ μήνας");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Προηγούμενος χρόνος");
DEFINE("_CAL_LANG_NEXTDAY", "Επόμενη μέρα");
DEFINE("_CAL_LANG_NEXTWEEK", "Επόμενη εβδομάδα");
DEFINE("_CAL_LANG_NEXTMONTH", "Επόμενοσ μήνασ");
DEFINE("_CAL_LANG_NEXTYEAR", "Επόμενος χρόνος");

DEFINE("_CAL_LANG_ADMINPANEL", "Πάνελ Διαχείρισης");
DEFINE("_CAL_LANG_ADDEVENT", "Πρόσθεσε Γεγονός");
DEFINE("_CAL_LANG_MYEVENTS", "Τα Γεγονότα μου");
DEFINE("_CAL_LANG_DELETE", "Διέγραψε");
DEFINE("_CAL_LANG_MODIFY", "Άλλαξε");

// Form
DEFINE("_CAL_LANG_HELP", "Βοήθεια");

DEFINE("_CAL_LANG_CAL_TITLE", "Γεγονότα");
DEFINE("_CAL_LANG_ADD_TITLE", "Προσθήκη");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Αλλαγή");

DEFINE("_CAL_LANG_EVENT_TITLE", "Θέμα");
DEFINE("_CAL_LANG_EVENT_COLOR", "Χρώμα");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Κατηγορίες");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Χρησιμοποίησε χρώμα κατηγορίας");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Παρακαλώ επιλέξτε κατηγορία");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Δραστηριότητα");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "για να προσθέσετε μια ηλεκτονικη διεύθυνση ή ηλεκτρονικό ταχυδρομείο απλά γράψτε <br><u>http://www.mysite.com</u> or <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Θέση");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Επαφή");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Εξτρα πληροφορίες");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Συγραφέας (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Αρχική Μέρα");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Τελική μέρα");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Αρχή ώρας");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Τέλος ώρας");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Αρχή ώρας");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Τέλος ώρας");
DEFINE("_CAL_LANG_PUB_INFO", "Πληροφορίες δημοσίευσης");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Επανέλαβε την εγραφή");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Επανέλαβε τις μέρες");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Μέρες της εβδομάδας");
DEFINE("_CAL_LANG_EVENT_PER", "γιά");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Εβδομάδα(ες) από μήνα επανέλαβε εκτυπόνωντας εβδομάδα");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Προεσκόπιση");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Ακύρωση");
DEFINE("_CAL_LANG_SUBMITSAVE", "Αποθήκευση");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Παρακαλώ επιλέξτε εβδομαδα.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Παρακαλώ επιλέξτε ημέρες.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Όλες τις κατηγορίες");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Επίπεδο ");
DEFINE("_CAL_LANG_EVENT_HITS", "Κτυπήματα");
DEFINE("_CAL_LANG_EVENT_STATE", "Κατάσταση");
DEFINE("_CAL_LANG_EVENT_CREATED", "Δημιουργήθηκε");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Νέο γεγονος");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Τελευταία αλλαγή");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Δέν άλλαξε");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Some sort of Activity \\n description must be entered.");
 

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
