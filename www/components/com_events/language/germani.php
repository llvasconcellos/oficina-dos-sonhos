<?php
// $Id: germani.php,v 1.8 2004/10/05 20:23:01 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

defined( '_VALID_MOS' ) or die( 'Direkter Zugriff zu diesem Bereich ist nicht erlaubt.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Januar");
DEFINE("_CAL_LANG_FEBRUARY", "Februar");
DEFINE("_CAL_LANG_MARCH", "März");
DEFINE("_CAL_LANG_APRIL", "April");
DEFINE("_CAL_LANG_MAY", "Mai");
DEFINE("_CAL_LANG_JUNE", "Juni");
DEFINE("_CAL_LANG_JULY", "Juli");
DEFINE("_CAL_LANG_AUGUST", "August");
DEFINE("_CAL_LANG_SEPTEMBER", "September");
DEFINE("_CAL_LANG_OCTOBER", "Oktober");
DEFINE("_CAL_LANG_NOVEMBER", "November");
DEFINE("_CAL_LANG_DECEMBER", "Dezember");

// Short day names
DEFINE("_CAL_LANG_SUN", "So");
DEFINE("_CAL_LANG_MON", "Mo");
DEFINE("_CAL_LANG_TUE", "Di");
DEFINE("_CAL_LANG_WED", "Mi");
DEFINE("_CAL_LANG_THU", "Do");
DEFINE("_CAL_LANG_FRI", "Fr");
DEFINE("_CAL_LANG_SAT", "Sa");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Sonntag");
DEFINE("_CAL_LANG_MONDAY", "Montag");
DEFINE("_CAL_LANG_TUESDAY", "Dienstag");
DEFINE("_CAL_LANG_WEDNESDAY", "Mittwoch");
DEFINE("_CAL_LANG_THURSDAY", "Donnerstag");
DEFINE("_CAL_LANG_FRIDAY", "Freitag");
DEFINE("_CAL_LANG_SATURDAY", "Samstag");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "So");
DEFINE("_CAL_LANG_MONDAYSHORT", "Mo");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Di");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Mi");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Do");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Fr");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Sa");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Täglich");
DEFINE("_CAL_LANG_EACHWEEK", "Wöchentlich");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Jede gerade Woche");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Jede ungerade Woche");
DEFINE("_CAL_LANG_EACHMONTH", "Monatlich");
DEFINE("_CAL_LANG_EACHYEAR", "Jährlich");
DEFINE("_CAL_LANG_ONLYDAYS", "Nur an bestimmten Tagen");
DEFINE("_CAL_LANG_EACH", "jeden / jedes");
DEFINE("_CAL_LANG_EACHOF","jede");
DEFINE("_CAL_LANG_ENDMONTH", "Monatsende");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Ausgehend vom Startdatum");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonym");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Danke für Deinen Beitrag - wir werden ihn schnell bearbeiten!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Dieser Termin wurde bearbeitet."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Dieser Termin wurde entfernt!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Du hast keinen Zugriff!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Neuer Beitrag vom");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Neue Änderung vom");

// Presentation
DEFINE("_CAL_LANG_BY", "von"); 
DEFINE("_CAL_LANG_FROM", "von"); 
DEFINE("_CAL_LANG_TO", "bis"); 
DEFINE("_CAL_LANG_ARCHIVE", "Übersicht"); 
DEFINE("_CAL_LANG_WEEK", "die Woche"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Keine Termine");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Keine Termine für");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Keine Termine für");
DEFINE("_CAL_LANG_THIS_DAY", "diesen Tag");
DEFINE("_CAL_LANG_THIS_MONTH", "Aktueller Monat");
DEFINE("_CAL_LANG_LAST_MONTH", "Letzter Monat");
DEFINE("_CAL_LANG_NEXT_MONTH", "Nächster Monat");
DEFINE("_CAL_LANG_EVENTSFOR", "Termine für");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Termine für");
DEFINE("_CAL_LANG_REP_DAY", "Tag");
DEFINE("_CAL_LANG_REP_WEEK", "Woche");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "alle 2 Wochen");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "alle 3 Wochen");
DEFINE("_CAL_LANG_REP_MONTH", "Monat");
DEFINE("_CAL_LANG_REP_YEAR", "Jahr");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Bitte wähle zuerst einen Termin aus");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Heute");
DEFINE("_CAL_LANG_VIEWTOCOME", "Zukünftig");
DEFINE("_CAL_LANG_VIEWBYDAY", "Tagesansicht");
DEFINE("_CAL_LANG_VIEWBYCAT", "Kategorieansicht");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Monatsansicht");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Wochenansicht");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Jahresansicht");
DEFINE("_CAL_LANG_BACK", "Zurück");
DEFINE("_CAL_LANG_CLOSE", "Schließen");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Vorheriger Tag");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Vorherige Woche");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Vorheriger Monat");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Vorheriges Jahr");
DEFINE("_CAL_LANG_NEXTDAY", "Nächster Tag");
DEFINE("_CAL_LANG_NEXTWEEK", "Nächste Woche");
DEFINE("_CAL_LANG_NEXTMONTH", "Nächster Monat");
DEFINE("_CAL_LANG_NEXTYEAR", "Nächstes Jahr");

DEFINE("_CAL_LANG_ADMINPANEL", "Administrationsoberfläche");
DEFINE("_CAL_LANG_ADDEVENT", "Termin eintragen");
DEFINE("_CAL_LANG_MYEVENTS", "Meine Termine");
DEFINE("_CAL_LANG_DELETE", "Löschen");
DEFINE("_CAL_LANG_MODIFY", "Ändern");

// Form
DEFINE("_CAL_LANG_HELP", "Hilfe");

DEFINE("_CAL_LANG_CAL_TITLE", "Termine");
DEFINE("_CAL_LANG_ADD_TITLE", "Hinzufügen");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Ändern");

DEFINE("_CAL_LANG_EVENT_TITLE", "Thema");
DEFINE("_CAL_LANG_EVENT_COLOR", "Farbe");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Kategoriefarbe verwenden");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategorien");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Bitte wähle eine Kategorie aus");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Aktivität");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Für Links oder E-Mail-Adressen, benutze bitte <u>http://www.mysite.com</u> oder <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Ort");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kontakt");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Zusatzinformationen");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Erster Tag");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Letzter Tag");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Beginn");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Ende");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Startzeit");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Endzeit");
DEFINE("_CAL_LANG_PUB_INFO", "Informationen zur Veröffentlichung");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Wiederholungstyp");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Wiederholungstag");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Wochentag");
DEFINE("_CAL_LANG_EVENT_PER", "pro");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Woche(n) innerhalb eines Monats für Wiederholungstyp Woche");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Vorschau");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Abbrechen");
DEFINE("_CAL_LANG_SUBMITSAVE", "Speichern");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Bitte wähle eine Woche.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Bitte wähle einen Tag.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Alle Kategorien");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Zugriffsstufe");
DEFINE("_CAL_LANG_EVENT_HITS", "Aufrufe");
DEFINE("_CAL_LANG_EVENT_STATE", "Status");
DEFINE("_CAL_LANG_EVENT_CREATED", "Erstellt");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Neuer Termin");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "zuletzt bearbeitet");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Nicht bearbeitet");


// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Eine Beschreibung der\\Aktivität muss eingegeben werden.");
 

	$com_events_form_help_color = <<<END
        <tr>
            <td width="110" align="left" valign="top">
                <b>Farbe</b>
            </td>
            <td>Wähle die Hintergrundfarbe, die in der Monatsansicht des Kalendars verwendet werden soll. 
            Sofern Du die Kategorie-Auswahlbox aktivierst, wird die vom Administrator vorgegebene Farbe verwendet und der 'Farbpicker'-Knopf inaktiv gesetzt.
            </td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Datum</b></td>
          <td>Wähle das Start- und Endedatum Deines Ereignisses aus.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Zeit</b></td>
          <td>Wähle die Zeitdauer Deines Ereignisses. Das Format ist <span style='color:blue;font-weight:bold;'>hh:mm</span>.<br/> 
          Die Zeit kann entweder im 12 oder 24 Stundenformat eingegeben werden.<br/><br/>
          <b><i><span style='color:red;'>Neu:</span></i></b> Bitte beachte den Spezialfall für ein <span style='color:red;font-weight:bold;'>eintägiges Ereignis über Mitternacht</span>.  
          D.h., für ein eintägiges Ereignis, das z.B. um 19:00 beginnt und um 3:00 endet, <b>müssen</b> Start- und Endedatum&nbsp;
          gleichlauten und auf das Datum vor Mitternacht gesetzt werden.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
            <td align="left" valign="top" nowrap><b>Wiederholungstyp</b></td>
            <td colspan="2"></td>
        </tr>
  	<tr>
            <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
                <tr>
                <td width="60" align="left" valign="top"><u>Tag</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Jeden Tag<br/><i>(Vorgabe)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Wähle diese Option für einen sich nicht wiederholendes 
                  ein- oder mehrtägiges Ereignis. Es wird ein neues Ereignis für jeden Tag innerhalb des
                  Start-/Endezeitraums eingetragen.</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>Woche</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Einmal pro Woche
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Diese Option erlaubt es den Wiederholungswochentag zu setzen.
                  <table border="0" width="100%" height="100%">
                  <tr><td><b>Tag</b> z.B. jeden 10.</td></tr>
                  <tr><td><b>Tagesname</b> z.B. jeden Montag</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Mehrere Tage in einer Woche
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Diese Option erlaubt es auszuwählen, an welchen Wochentagen Ihr Ereignis sichtbar sein wird.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Woche(n) innerhalb eines Monats für Wiederholungstyp Woche</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Woche 1 :</b> 1. Woche des Monats</td></tr>
                    <tr><td><b>Woche 2 :</b> 2. Woche des Monats</td></tr>
                    <tr><td><b>Woche 3 :</b> 3. Woche des Monats</td></tr>
                    <tr><td><b>Woche 4 :</b> 4. Woche des Monats</td></tr>
                    <tr><td><b>Woche 5 :</b> 5. Woche des Monats (falls möglich)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Monat</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Einmal pro Monat</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Diese Option erlaubt es den Wiederholungstag für den Monat auszuwählen.
                     <table border="0" width="100%" height="100%"><tr><td><b>Tag</b> z.B. jeden 10.</td></tr><tr><td><b>Tagesname</b> z.B. jeden Montag</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Am Ende jeden Monats
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Das Ereignis ist jeweils am letzten Tage eines Monats, falls der letzte Tag in den durch Start-/Endedatum festgelegten Zeitraum fällt.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Jahr</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Once Per Year
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                     Diese Option erlaubt es den Wiederholungstag für ein Jahr auszuwählen.
                     <table border="0" width="100%" height="100%"><tr><td><b>Tag</b> z.B. jeden 10.</td></tr><tr><td><b>Tagesname</b> z.B. jeden Montag</td></tr></table>
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
