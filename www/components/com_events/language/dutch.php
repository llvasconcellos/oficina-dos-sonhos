<?php
// $Id: dutch.php,v 1.11 2004/12/07 22:42:29 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Dutch translation by Arthur van der Molen (15-04-2004)
// Revised & spell checked by Paul van Voorst (28-11-04)

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "januari");
DEFINE("_CAL_LANG_FEBRUARY", "februari");
DEFINE("_CAL_LANG_MARCH", "maart");
DEFINE("_CAL_LANG_APRIL", "april");
DEFINE("_CAL_LANG_MAY", "mei");
DEFINE("_CAL_LANG_JUNE", "juni");
DEFINE("_CAL_LANG_JULY", "juli");
DEFINE("_CAL_LANG_AUGUST", "augustus");
DEFINE("_CAL_LANG_SEPTEMBER", "september");
DEFINE("_CAL_LANG_OCTOBER", "oktober");
DEFINE("_CAL_LANG_NOVEMBER", "november");
DEFINE("_CAL_LANG_DECEMBER", "december");

// Short day names
DEFINE("_CAL_LANG_SUN", "Zo");
DEFINE("_CAL_LANG_MON", "Ma");
DEFINE("_CAL_LANG_TUE", "Di");
DEFINE("_CAL_LANG_WED", "Wo");
DEFINE("_CAL_LANG_THU", "Do");
DEFINE("_CAL_LANG_FRI", "Vr");
DEFINE("_CAL_LANG_SAT", "Za");

// Days
DEFINE("_CAL_LANG_SUNDAY", "zondag");
DEFINE("_CAL_LANG_MONDAY", "maandag");
DEFINE("_CAL_LANG_TUESDAY", "dinsdag");
DEFINE("_CAL_LANG_WEDNESDAY", "woensdag");
DEFINE("_CAL_LANG_THURSDAY", "donderdag");
DEFINE("_CAL_LANG_FRIDAY", "vrijdag");
DEFINE("_CAL_LANG_SATURDAY", "zaterdag");

// Day one-letter abbreviation
DEFINE("_CAL_LANG_SUNDAYSHORT", "Zo");
DEFINE("_CAL_LANG_MONDAYSHORT", "Ma");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Di");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Wo");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Do");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Vr");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Za");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Elke dag");
DEFINE("_CAL_LANG_EACHWEEK", "Elke week");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Elke even week");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Elke oneven week");
DEFINE("_CAL_LANG_EACHMONTH", "Elke maand");
DEFINE("_CAL_LANG_EACHYEAR", "Elk jaar");
DEFINE("_CAL_LANG_ONLYDAYS", "Alleen geselecteerde dagen");
DEFINE("_CAL_LANG_EACH", "elk");
DEFINE("_CAL_LANG_EACHOF","van iedere");
DEFINE("_CAL_LANG_ENDMONTH", "einde maand");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "op de dag v/d opgegeven datum");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anoniem");

// Post,
// Please do not use accents in data!
DEFINE("_CAL_LANG_ACT_ADDED", "Bedankt voor de inzending - Wij zullen hem beoordelen!"); //NO ACCENTS !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Agendapunt gewijzigd!"); //NO ACCENTS !!
DEFINE("_CAL_LANG_ACT_DELETED", "Agendapunt verwijderd!"); //NO ACCENTS !!
DEFINE("_CAL_LANG_NOPERMISSION", "U heeft geen toegang tot deze dienst!"); //NO ACCENTS !!
DEFINE("_CAL_LANG_MAIL_ADDED", "Nieuwe inzending agendapunt ");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Wijziging van agendapunt");

// Presentation
DEFINE("_CAL_LANG_BY", "Door:"); 
DEFINE("_CAL_LANG_FROM", "van"); 
DEFINE("_CAL_LANG_TO", "tot"); 
DEFINE("_CAL_LANG_ARCHIVE", "archief"); 
DEFINE("_CAL_LANG_WEEK", "de week"); 
DEFINE("_CAL_LANG_NO_EVENTS", "agenda leeg");
DEFINE("_CAL_LANG_NO_EVENTFOR", "agenda leeg voor");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "agenda leeg voor");
DEFINE("_CAL_LANG_REP_DAY", "dag");
DEFINE("_CAL_LANG_THIS_DAY", "deze dag");
DEFINE("_CAL_LANG_THIS_MONTH", "deze maand");
DEFINE("_CAL_LANG_LAST_MONTH", "Vorige maand");
DEFINE("_CAL_LANG_NEXT_MONTH", "Volgende maand"); 
DEFINE("_CAL_LANG_EVENTSFOR", "agenda voor");
DEFINE("_CAL_LANG_EVENTSFORTHE", "agenda voor");
DEFINE("_CAL_LANG_REP_WEEK", "week");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "even week");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "oneven week");
DEFINE("_CAL_LANG_REP_MONTH", "maand");
DEFINE("_CAL_LANG_REP_YEAR", "jaar");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Selecteer eerst een agendapunt");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "vandaag");
DEFINE("_CAL_LANG_VIEWTOCOME", "deze maand");
DEFINE("_CAL_LANG_VIEWBYDAY", "per dag");
DEFINE("_CAL_LANG_VIEWBYCAT", "per categorie");
DEFINE("_CAL_LANG_VIEWBYMONTH", "per maand");
DEFINE("_CAL_LANG_VIEWBYYEAR", "per jaar");
DEFINE("_CAL_LANG_VIEWBYWEEK", "per week");
DEFINE("_CAL_LANG_BACK", "Terug");
DEFINE("_CAL_LANG_CLOSE", "Sluiten");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Vorige dag");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Vorige week");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Vorige maand");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Vorig jaar");
DEFINE("_CAL_LANG_NEXTDAY", "Volgende dag");
DEFINE("_CAL_LANG_NEXTWEEK", "Volgende week");
DEFINE("_CAL_LANG_NEXTMONTH", "Volgende maand");
DEFINE("_CAL_LANG_NEXTYEAR", "Volgend jaar");

DEFINE("_CAL_LANG_ADMINPANEL", "Beheer");
DEFINE("_CAL_LANG_ADDEVENT", "Toevoegen");
DEFINE("_CAL_LANG_MYEVENTS", "Mijn ingediende agendapunten");
DEFINE("_CAL_LANG_DELETE", "Verwijderen");
DEFINE("_CAL_LANG_MODIFY", "Wijzigen");

// Form
DEFINE("_CAL_LANG_HELP", "Help");
DEFINE("_CAL_LANG_CAL_TITLE", "Agenda");
DEFINE("_CAL_LANG_ADD_TITLE", "Toevoegen");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Wijzigen");
DEFINE("_CAL_LANG_EVENT_TITLE", "Onderwerp");
DEFINE("_CAL_LANG_EVENT_COLOR", "Kleur");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Gebruik Categoriekleur");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Categorie");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Kies categorie");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Activiteit");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Voor toevoegen van URL of email adres, gebruik <br><u>http://www.mijnsite.nl</u> of <u>mailto:adres@provider.nl</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Locatie");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contactpersoon");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Extra Info");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Door (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Begin datum");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Eind datum");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Begin uur");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Einde uur");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Begin uur");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Einde uur");
DEFINE("_CAL_LANG_PUB_INFO", "Informatie");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Type Herhaling");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Herhaal dag");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Dagen van de week");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Welke We(e)k(en) v/d maand herhalen?");
DEFINE("_CAL_LANG_SUBMITPREVIEW", "Voorbeeld");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Annuleer");
DEFINE("_CAL_LANG_SUBMITSAVE", "Opslaan");
DEFINE("_CAL_LANG_E_WARNWEEKS", "Week kiezen aub");
DEFINE("_CAL_LANG_E_WARNDAYS", "Dag kiezen aub");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Alle categorien");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Toegangsnivo");
DEFINE("_CAL_LANG_EVENT_HITS", "Hits");
DEFINE("_CAL_LANG_EVENT_STATE", "Status");
DEFINE("_CAL_LANG_EVENT_CREATED", "Aangemaakt");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nieuw");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Laatste wijziging");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Geen wijziging");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Er moet een beschrijving van het \\nagendapunt ingevuld worden.");
 

	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Kleur</b>
          </td>
          <td>Kies een achtergrondkleur die dan zichtbaar wordt in het maandoverzicht van de kalender.
          Als de Categorie checkbox is aangevinkt, zal de kleur standaard de gekozen kleur van de
          categorie aannemen (gedefinieerd door de site admin) die gekozen is onder het Content tabblad
          van het agendapunt. De 'kleurenkiezer' knop zal dan uitgeschakeld zijn.</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Datum</b></td>
          <td>Kies de Begin en de Einddatum van het agendapunt.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Tijd</b></td>
          <td>Kies de Tijd van de dag voor het agendapunt. Formaat is <span style='color:blue;font-weight:bold;'>
          uu:mm {am|pm}</span>.<br/>Tijd kan gespecificeerd worden in 12 of 24 uurs formaat.<br/><br/><b><i>
          <span style='color:red;'>(Nieuw)</span></i>Opmerking:</b> Een speciale situatie doet zich voor met
          <span style='color:red;font-weight:bold;'>enkelvoudige dag gebeurtenissen die na 12uur middernacht zijn
          afgelopen</span>.  Bv: Voor een een-dags evenement die om 19:00u begint en om 03:00 'nachts is afgelopen,
          <b>MOET</b> de Start en Eind datum het zelfde zijn. Dwz de einddatum moet gelijk zijn aan de startdatum
          van de dag voor middernacht.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Type herhaling</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>Dagelijks</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Elke Dag<br/><i>(standaard)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Kies deze optie voor een niet-herhalend eenmalig evenement of een dagelijks agendapunt dat zich herhaalt tussen de opgegeven Begin en Einddatum</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>Wekelijks</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Eens Per Week
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Deze optie geeft de keuze welke weekdag er wekelijks herhaald moet worden
                  <table border="0" width="100%" height="100%"><tr><td><b>* Op de dag v/d opgegeven datum</b> - Herhaal  elke week op opgegeven dag</td></tr><tr><td><b>* Dag-naam</b> - Herhaal op b.v. elke maandag van de week</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Meerdere Dagen per Week
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Met deze optie kan je bepalen op welke weekdagen het evenement wordt herhaald.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Week v/d Maand<br><i>Herhaal op één of meerdere weken per maand</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Week 1 :</b> 1e week van de maand</td></tr>
                    <tr><td><b>Week 2 :</b> 2e week van de maand</td></tr>
                    <tr><td><b>Week 3 :</b> 3e week van de maand</td></tr>
                    <tr><td><b>Week 4 :</b> 4e week van de maand</td></tr>
                    <tr><td><b>Week 5 :</b> 5e week van de maand (indien van toepasssing)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Per Maand</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Eens per Maand</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Deze optie geeft de keuze welke weekdag er maandelijks herhaald moet worden
                     <table border="0" width="100%" height="100%"><tr><td><b>* Op de dag v/d opgegeven datum</b> - Herhaal elke maand op opgegeven dag</td></tr><tr><td><b>* Dag-naam</b> - Herhaal op b.v. elke maandag van de maand</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Laatste dag van elke Maand
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
				   Het evenement valt op de laatste weekdag aan het eind van elke maand. Dit is onafhankelijk van het dagnummer. Zolang die laatste dag maar valt in het bereik zoals opgegeven in bij de start- en ein-datum van het evenement.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Per jaar</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Eens per jaar
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Deze optie geeft de keuze welke weekdag er jaarlijks herhaald moet worden
                  <table border="0" width="100%" height="100%"><tr><td><b>* Op de dag v/d opgegeven datum</b> - Herhaal elk jaar op opgegeven dag</td></tr><tr><td><b>* Dag-naam</b> - Herhaal op b.v. elke maandag van het jaar</td></tr></table>
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
