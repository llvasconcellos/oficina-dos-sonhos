<?php
// $Id: italian.php,v 1.8 2004/10/05 20:23:01 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Italian translation by sakara

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Gennaio");
DEFINE("_CAL_LANG_FEBRUARY", "Febbraio");
DEFINE("_CAL_LANG_MARCH", "Marzo");
DEFINE("_CAL_LANG_APRIL", "Aprile");
DEFINE("_CAL_LANG_MAY", "Maggio");
DEFINE("_CAL_LANG_JUNE", "Giugno");
DEFINE("_CAL_LANG_JULY", "Luglio");
DEFINE("_CAL_LANG_AUGUST", "Agosto");
DEFINE("_CAL_LANG_SEPTEMBER", "Settembre");
DEFINE("_CAL_LANG_OCTOBER", "Ottobre");
DEFINE("_CAL_LANG_NOVEMBER", "Novembre");
DEFINE("_CAL_LANG_DECEMBER", "Dicembre");

// Short day names
DEFINE("_CAL_LANG_SUN", "Dom");
DEFINE("_CAL_LANG_MON", "Lun");
DEFINE("_CAL_LANG_TUE", "Mar");
DEFINE("_CAL_LANG_WED", "Mer");
DEFINE("_CAL_LANG_THU", "Gio");
DEFINE("_CAL_LANG_FRI", "Ven");
DEFINE("_CAL_LANG_SAT", "Sab");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Domenica");
DEFINE("_CAL_LANG_MONDAY", "Lunedi");
DEFINE("_CAL_LANG_TUESDAY", "Martedi");
DEFINE("_CAL_LANG_WEDNESDAY", "Mercoledi");
DEFINE("_CAL_LANG_THURSDAY", "Giovedi");
DEFINE("_CAL_LANG_FRIDAY", "Venerdi");
DEFINE("_CAL_LANG_SATURDAY", "Sabato");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "Do");
DEFINE("_CAL_LANG_MONDAYSHORT", "Lu");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Ma");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Me");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Gi");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Ve");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Sa");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Ogni Giorno");
DEFINE("_CAL_LANG_EACHWEEK", "Ogni Settimana");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Ogni Settimana Pari");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Ogni Settimana Dispari");
DEFINE("_CAL_LANG_EACHMONTH", "Ogni Mese");
DEFINE("_CAL_LANG_EACHYEAR", "Ogni Anno");
DEFINE("_CAL_LANG_ONLYDAYS", "Solo i Giorni Selezionati");
DEFINE("_CAL_LANG_EACH", "Ogni");
DEFINE("_CAL_LANG_EACHOF","di ogni");
DEFINE("_CAL_LANG_ENDMONTH", "fine del Mese");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "per numero giorno");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonimo");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Grazie per il tuo contributo - Verificheremo la tua proposta!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Evento modificato."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Evento eliminato!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Non hai accesso a questo servizio!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nuovo contributo su");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nuova modifica su");

// Presentation
DEFINE("_CAL_LANG_BY", "per"); 
DEFINE("_CAL_LANG_FROM", "Da"); 
DEFINE("_CAL_LANG_TO", "A"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archivi"); 
DEFINE("_CAL_LANG_WEEK", "la settimana"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Nessun evento");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Nessun evento per");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Nessun evento per il");
DEFINE("_CAL_LANG_THIS_DAY", "Questo giorno");
DEFINE("_CAL_LANG_THIS_MONTH", "Questo Mese");
DEFINE("_CAL_LANG_LAST_MONTH", "Ultimo Mese");
DEFINE("_CAL_LANG_NEXT_MONTH", "Mese Successivo");
DEFINE("_CAL_LANG_EVENTSFOR", "Eventi per");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Eventi per il");
DEFINE("_CAL_LANG_REP_DAY", "giorno");
DEFINE("_CAL_LANG_REP_WEEK", "settimana");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "settimana pari");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "settimana dispari");
DEFINE("_CAL_LANG_REP_MONTH", "mese");
DEFINE("_CAL_LANG_REP_YEAR", "anno");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Vedi Oggi");
DEFINE("_CAL_LANG_VIEWTOCOME", "Prossimi Eventi del mese");
DEFINE("_CAL_LANG_VIEWBYDAY", "Ordina per Giorno");
DEFINE("_CAL_LANG_VIEWBYCAT", "Ordina per Categoria");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Ordina per Mese");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Ordina per Anno");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Ordina per Settimana");
DEFINE("_CAL_LANG_BACK", "Indietro");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Giorno Precedente");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Settimana Precedente");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Mese Precedente");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Anno Precedente");
DEFINE("_CAL_LANG_NEXTDAY", "Giorno Successivo");
DEFINE("_CAL_LANG_NEXTWEEK", "Settimana Successiva");
DEFINE("_CAL_LANG_NEXTMONTH", "Mese Successivo");
DEFINE("_CAL_LANG_NEXTYEAR", "Anno Successivo");

DEFINE("_CAL_LANG_ADMINPANEL", "Pannello di Controllo");
DEFINE("_CAL_LANG_ADDEVENT", "Aggiungi Evento");
DEFINE("_CAL_LANG_MYEVENTS", "Miei Eventi");
DEFINE("_CAL_LANG_DELETE", "Elimina");
DEFINE("_CAL_LANG_MODIFY", "Modifica");

// Form
DEFINE("_CAL_LANG_HELP", "Aiuto");

DEFINE("_CAL_LANG_CAL_TITLE", "Eventi");
DEFINE("_CAL_LANG_ADD_TITLE", "Aggiungi");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Modifica");

DEFINE("_CAL_LANG_EVENT_TITLE", "Soggetto");
DEFINE("_CAL_LANG_EVENT_COLOR", "Colore");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Categorie");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Selezionare la Categoria");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Attività");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Per aggiungere una URL o una email, scrivere semplicemente <br><u>http://www.miosito.net</u> o <u>mailto:mia@mail.net</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Luogo");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contatti");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Informazioni Extra");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autore (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Data Inizio");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Data Fine");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Ora Inizio");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Ora Fine");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Ora Inizio");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Ora Fine");
DEFINE("_CAL_LANG_PUB_INFO", "Pubblicazione");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Ripeti Tipo");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Ripeti Giorno");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Giorni della Settimana");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Anteprima");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Annulla");
DEFINE("_CAL_LANG_SUBMITSAVE", "Salva");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Scegliere una Settimana.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Scegliere un Giorno.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Tutte le Categorie");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Livello Accesso");
DEFINE("_CAL_LANG_EVENT_HITS", "Visite");
DEFINE("_CAL_LANG_EVENT_STATE", "Stato");
DEFINE("_CAL_LANG_EVENT_CREATED", "Creato");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nuovo Evento");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Ultima Modifica");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Non Modificato");

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
