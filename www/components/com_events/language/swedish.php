<?php
// $Id: swedish.php,v 1.11 2004/10/05 20:23:01 mleinmueller Exp $
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
DEFINE("_CAL_LANG_JANUARY", "Januari");
DEFINE("_CAL_LANG_FEBRUARY", "Februari");
DEFINE("_CAL_LANG_MARCH", "Mars");
DEFINE("_CAL_LANG_APRIL", "April");
DEFINE("_CAL_LANG_MAY", "Maj");
DEFINE("_CAL_LANG_JUNE", "Juni");
DEFINE("_CAL_LANG_JULY", "Juli");
DEFINE("_CAL_LANG_AUGUST", "Augusti");
DEFINE("_CAL_LANG_SEPTEMBER", "September");
DEFINE("_CAL_LANG_OCTOBER", "Oktober");
DEFINE("_CAL_LANG_NOVEMBER", "November");
DEFINE("_CAL_LANG_DECEMBER", "December");

// Short day names
DEFINE("_CAL_LANG_SUN", "Sön");
DEFINE("_CAL_LANG_MON", "Mån");
DEFINE("_CAL_LANG_TUE", "Tis");
DEFINE("_CAL_LANG_WED", "Ons");
DEFINE("_CAL_LANG_THU", "Tor");
DEFINE("_CAL_LANG_FRI", "Fre");
DEFINE("_CAL_LANG_SAT", "Lör");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Söndag");
DEFINE("_CAL_LANG_MONDAY", "Måndag");
DEFINE("_CAL_LANG_TUESDAY", "Tisdag");
DEFINE("_CAL_LANG_WEDNESDAY", "Onsdag");
DEFINE("_CAL_LANG_THURSDAY", "Torsdag");
DEFINE("_CAL_LANG_FRIDAY", "Fredag");
DEFINE("_CAL_LANG_SATURDAY", "Lördag");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "S");
DEFINE("_CAL_LANG_MONDAYSHORT", "M");
DEFINE("_CAL_LANG_TUESDAYSHORT", "T");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "O");
DEFINE("_CAL_LANG_THURSDAYSHORT", "T");
DEFINE("_CAL_LANG_FRIDAYSHORT", "F");
DEFINE("_CAL_LANG_SATURDAYSHORT", "L");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Varje dag");
DEFINE("_CAL_LANG_EACHWEEK", "Varje vecka");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Alla jämna veckor");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Alla udda veckor");
DEFINE("_CAL_LANG_EACHMONTH", "Varje månad");
DEFINE("_CAL_LANG_EACHYEAR", "Varje år");
DEFINE("_CAL_LANG_ONLYDAYS", "Endast utvalda dagar");
DEFINE("_CAL_LANG_EACH", "varje");
DEFINE("_CAL_LANG_EACHOF","i varje");
DEFINE("_CAL_LANG_ENDMONTH", "sista dag i månaden");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "På datumet");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonym");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Tack för ditt bidrag - Vi kommer kontrollera dina uppgifter!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Denna aktivitet har ändrats."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Denna aktivitet har raderats!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Du har inte tillgång till denna funktion!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nytt bidrag på");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Ny förändring på");

// Presentation
DEFINE("_CAL_LANG_BY", "registerat av");
DEFINE("_CAL_LANG_FROM", "Från");
DEFINE("_CAL_LANG_TO", "Till");
DEFINE("_CAL_LANG_ARCHIVE", "Arkivet");
DEFINE("_CAL_LANG_WEEK", "veckan");
DEFINE("_CAL_LANG_NO_EVENTS", "Inga händelser");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Inga händelser");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Inga händelser den");
DEFINE("_CAL_LANG_THIS_DAY", "Vad händer idag?");
DEFINE("_CAL_LANG_THIS_MONTH", "Vad händer denna månad?");
DEFINE("_CAL_LANG_LAST_MONTH", "Föregående månad");
DEFINE("_CAL_LANG_NEXT_MONTH", "Nästa månad");
DEFINE("_CAL_LANG_EVENTSFOR", "Händelser");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Händelser");
DEFINE("_CAL_LANG_REP_DAY", "dag");
DEFINE("_CAL_LANG_REP_WEEK", "vecka");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "jämn vecka");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "udda vecka");
DEFINE("_CAL_LANG_REP_MONTH", "månad");
DEFINE("_CAL_LANG_REP_YEAR", "år");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Dagens händelser");
DEFINE("_CAL_LANG_VIEWTOCOME", "Månadens händelser");
DEFINE("_CAL_LANG_VIEWBYDAY", "Urval per dag");
DEFINE("_CAL_LANG_VIEWBYCAT", "Urval per kategori");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Urval per månad");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Urval per år");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Urval per vecka");
DEFINE("_CAL_LANG_BACK", "Tillbaka");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Föregående dag");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Föregående vecka");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Föregående månad");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Föregående år");
DEFINE("_CAL_LANG_NEXTDAY", "Nästa dag");
DEFINE("_CAL_LANG_NEXTWEEK", "Nästa vecka");
DEFINE("_CAL_LANG_NEXTMONTH", "Nästa månad");
DEFINE("_CAL_LANG_NEXTYEAR", "Nästa år");

DEFINE("_CAL_LANG_ADMINPANEL", "Administrationspanel");
DEFINE("_CAL_LANG_ADDEVENT", "Lägg till händelse");
DEFINE("_CAL_LANG_MYEVENTS", "Min kalender");
DEFINE("_CAL_LANG_DELETE", "Ta bort");
DEFINE("_CAL_LANG_MODIFY", "Ändra");

// Form
DEFINE("_CAL_LANG_HELP", "Hjälp");

DEFINE("_CAL_LANG_CAL_TITLE", "Kalendarium");
DEFINE("_CAL_LANG_ADD_TITLE", "Lägg till");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Ändra");

DEFINE("_CAL_LANG_EVENT_TITLE", "Rubrik");
DEFINE("_CAL_LANG_EVENT_COLOR", "Färg");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Kategorier");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Välj kategori");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Händelser");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "För att lägga till en URL eller en epostadress, skriv <br><u>http://www.mysite.com</u> eller <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Plats");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Kontakta");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Extra information");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Författare (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Startdatum");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Slutdatum");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Starttid");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Sluttid");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Start Time");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "End Time");
DEFINE("_CAL_LANG_PUB_INFO", "Publiceringsinformation");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Repetitionstyp");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Repetera dag");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Veckodagar");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Veckor i en månad för repetition varje vecka");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Förhandsgranska");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Avbryt");
DEFINE("_CAL_LANG_SUBMITSAVE", "Spara");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Var vänlig och välj en vecka.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Var vänlig och välj en dag.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Alla kategorier");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Accessnivå");
DEFINE("_CAL_LANG_EVENT_HITS", "Besök");
DEFINE("_CAL_LANG_EVENT_STATE", "Tillstånd");
DEFINE("_CAL_LANG_EVENT_CREATED", "Skapad");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Ny händelse");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Senast ändrad");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Aldrig ändrad");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Du måste ge någon beskrivning\\nav händelsen.");


	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Färgväljare</b>
          </td>
          <td>Välj den bakgrundsfärg som skall visas i kalendervyn. Om du kryssar i
	Kategori-rutan kommer bakgrundsfärgen att väljas efter den av webadministratören
	förinställda för händelsens kategori. Kategori väljer du på Innehålls-fliken. Färgväljaren kommer då också att avaktiveras.
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Datum</b></td>
          <td>Välj Startdatum och Slutdatum för händelsen.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Tid</b></td>
	<td>Välj Klockslag för händelsen. Klockslagen skall följa formatet <span style='color:blue;font-weight:bold;'>tt:mm {am|pm}</span>.<br/>Klockslag kan anges i 12- eller 24-timmarsformat.<br/><br/><b><i><span style='color:red;'>(Nyhet)</span></i> Notera</b> specialfallet <span style='color:red;font-weight:bold;'>enstaka händelse över natt</span>.  T.ex. en enstaka händelse som startar 19:00 och slutar 03:00 <b>MÅSTE</b> ha Startdatum och Slutdatum lika, dvs. den dag som händelsen startade (före midnatt).</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Repetitionsintervall</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top">
                  <u>Per Dag</u>
                  </td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">
	            Varje Dag<br/><i>(standard)</i>
	          </font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">För icke återkommande händelser och för flerdagarshändelser som har ett nytt tillfälle varje dag inom intervallet.</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top">
	          <u>Per Vecka</u>
                </td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    En Gång Per Vecka
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Välj veckodag som händelsen repeteras på.
	  <table border="0" width="100%" height="100%"><tr><td><b>Datum</b> för repetition på samma datum, t.ex den 7:e oavsett vilken veckodag det är.</td></tr><tr><td><b>Dag</b> för repetition, t.ex varje måndag.</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Flera Gånger Per Vecka
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Välj vilka veckodagar händelsen inträffar.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Vecka I Månaden<br><i>För alternativen 'En Gång Per Vecka' och 'Flera Gånger Per Vecka' ovan, ange om händelsen bara inträffar vissa veckor</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
	  <tr><td><b>Vecka 1 :</b> 1:a veckan i månaden</td></tr>
	  <tr><td><b>Vecka 2 :</b> 2:a veckan i månaden</td></tr>
	  <tr><td><b>Vecka 3 :</b> 3:e veckan i månaden</td></tr>
	  <tr><td><b>Vecka 4 :</b> 4:e veckan i månaden</td></tr>
	  <tr><td><b>Vecka 5 :</b> 5:e veckan i månaden (om tillämpligt)</td></tr>                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top">
	          <u>Per Månad</u>
                </td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
	            En Gång Per Månad
	          </font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Välj dag i månaden som händelsen repeteras.
	  <table border="0" width="100%" height="100%"><tr><td><b>Datum</b> för repetition på datumet, t.ex den 7:e varje månad.</td></tr><tr><td><b>Dag</b> för repetition t.ex den första måndagen.</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Månadens Sista Dag
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
	  Händelsen inträffar sista dagen i månaden, oavsett datum, om den dagen infaller i intervallet.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top">
	          <u>Per År</u>
	        </td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  En Gång Om Året
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Välj en dag varje år
                  <table border="0" width="100%" height="100%"><tr><td><b>Datum</b> för repetition på datumet</td></tr><tr><td><b>Dag</b> för repetion t.ex på första måndagen på året.</td></tr></table>
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
