<?php
// $Id: catalan.php,v 1.1 2005/01/13 21:43:34 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// Catalan translation
//
// Manel Zaera <manelzaera@yahoo.es>, 31/08/2004
//


defined( '_VALID_MOS' ) or die( 'No es permet accedir directament aqu&iacute;.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Gener");
DEFINE("_CAL_LANG_FEBRUARY", "Febrer");
DEFINE("_CAL_LANG_MARCH", "Març");
DEFINE("_CAL_LANG_APRIL", "Abril");
DEFINE("_CAL_LANG_MAY", "Maig");
DEFINE("_CAL_LANG_JUNE", "Juny");
DEFINE("_CAL_LANG_JULY", "Juliol");
DEFINE("_CAL_LANG_AUGUST", "Agost");
DEFINE("_CAL_LANG_SEPTEMBER", "Setembre");
DEFINE("_CAL_LANG_OCTOBER", "Octubre");
DEFINE("_CAL_LANG_NOVEMBER", "Novembre");
DEFINE("_CAL_LANG_DECEMBER", "Desembre");

// Short day names
DEFINE("_CAL_LANG_MON", "Dl");
DEFINE("_CAL_LANG_TUE", "Dm");
DEFINE("_CAL_LANG_WED", "Dc");
DEFINE("_CAL_LANG_THU", "Dj");
DEFINE("_CAL_LANG_FRI", "Dv");
DEFINE("_CAL_LANG_SAT", "Ds");
DEFINE("_CAL_LANG_SUN", "Dg");

// Days
DEFINE("_CAL_LANG_MONDAY", "Dilluns");
DEFINE("_CAL_LANG_TUESDAY", "Dimarts");
DEFINE("_CAL_LANG_WEDNESDAY", "Dimecres");
DEFINE("_CAL_LANG_THURSDAY", "Dijous");
DEFINE("_CAL_LANG_FRIDAY", "Divendres");
DEFINE("_CAL_LANG_SATURDAY", "Dissabte");
DEFINE("_CAL_LANG_SUNDAY", "Diumenge");

// Days lettres
DEFINE("_CAL_LANG_MONDAYSHORT", "Dl");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Dm");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Dc");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Dj");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Dv");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Ds");
DEFINE("_CAL_LANG_SUNDAYSHORT", "Dj");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Cada dia");
DEFINE("_CAL_LANG_EACHWEEK", "Cada setmana");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Cada setmana parell");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Cada setmana senar");
DEFINE("_CAL_LANG_EACHMONTH", "Cada mes");
DEFINE("_CAL_LANG_EACHYEAR", "Cada any");
DEFINE("_CAL_LANG_ONLYDAYS", "Nom&eacute;s els dies escollits");
DEFINE("_CAL_LANG_EACH", "Cada");
DEFINE("_CAL_LANG_EACHOF","de cada");
DEFINE("_CAL_LANG_ENDMONTH", "final de mes");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Per n&uacute;mero de dia");

// User type
DEFINE("_CAL_LANG_ANONYME", "An&ograve;nim");

// Post
DEFINE("_CAL_LANG_ACT_ADDED", "La proposta ha de ser verificada abans de ser publicada."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Esdeveniment modificat."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Esdeveniment eliminat."); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "No teniu acc&eacute;s al servei."); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nova publicaci&oacute;");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nova modificaci&oacute; el");

// Presentation
DEFINE("_CAL_LANG_BY", "per");
DEFINE("_CAL_LANG_FROM", "Des de");
DEFINE("_CAL_LANG_TO", "Fins");
DEFINE("_CAL_LANG_ARCHIVE", "Arxius");
DEFINE("_CAL_LANG_WEEK", "la setmana");
DEFINE("_CAL_LANG_NO_EVENTS", "Sense esdeveniments");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Sense esdeveniments per a");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Sense esdeveniments per al");
DEFINE("_CAL_LANG_THIS_DAY", "aquest dia");
DEFINE("_CAL_LANG_THIS_MONTH", "Aquest mes");
DEFINE("_CAL_LANG_LAST_MONTH", "Darrer mes");
DEFINE("_CAL_LANG_NEXT_MONTH", "Mes següent");
DEFINE("_CAL_LANG_EVENTSFOR", "Esdeveniments per a");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Esdeveniments per al");
DEFINE("_CAL_LANG_REP_DAY", "dia");
DEFINE("_CAL_LANG_REP_WEEK", "setmana");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "setmana parell");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "setmana senar");
DEFINE("_CAL_LANG_REP_MONTH", "mes");
DEFINE("_CAL_LANG_REP_YEAR", "any");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Mostra avui");
DEFINE("_CAL_LANG_VIEWTOCOME", "Resta del mes");
DEFINE("_CAL_LANG_VIEWBYDAY", "Mostra dia");
DEFINE("_CAL_LANG_VIEWBYCAT", "Mostra categories");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Mostra mes");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Mostra any");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Mostra setmana");
DEFINE("_CAL_LANG_BACK", "Torna");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Dia anterior");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Setmana anterior");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Mes anterior");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Any anterior");
DEFINE("_CAL_LANG_NEXTDAY", "Dia següent");
DEFINE("_CAL_LANG_NEXTWEEK", "Setmana següent");
DEFINE("_CAL_LANG_NEXTMONTH", "Mes següent");
DEFINE("_CAL_LANG_NEXTYEAR", "Any següent");

DEFINE("_CAL_LANG_ADMINPANEL", "Eina d'administraci&oacute;");
DEFINE("_CAL_LANG_ADDEVENT", "Afegeix esdeveniment");
DEFINE("_CAL_LANG_MYEVENTS", "Els meus esdeveniments");
DEFINE("_CAL_LANG_DELETE", "Elimina");
DEFINE("_CAL_LANG_MODIFY", "Modifica");

// Form
DEFINE("_CAL_LANG_HELP", "Ajuda");

DEFINE("_CAL_LANG_CAL_TITLE", "Esdeveniments");
DEFINE("_CAL_LANG_ADD_TITLE", "Afegeix");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Modifica");

DEFINE("_CAL_LANG_EVENT_TITLE", "Assumpte");
DEFINE("_CAL_LANG_EVENT_COLOR", "Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Categories");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Utilitza el color de la categoria");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Seleccioneu una categoria");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Activitat");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "per incloure una URL o a/e, escriviu <br><u>http://www.servidor.com</u> o <u>mailto:usuari@correu.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Localitzaci&oacute;");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contacte");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Info. extra");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (&agrave;lies)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Data inicial");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Data final");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Hora inicial");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Hora final");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Hora inicial");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Hora final");
DEFINE("_CAL_LANG_PUB_INFO", "Informaci&oacute; de la publicaci&oacute;");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Tipus de repetici&oacute;");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Repeteix dies");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Dies del mes");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Setmana(es) d'un mes - tipus de repetició setmana");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Vista pr&egrave;via");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Cancel&middot;la");
DEFINE("_CAL_LANG_SUBMITSAVE", "Desa");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Selecciona una setmana.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Selecciona un dia.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Totes les categories");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Nivell d'acc&eacute;s");
DEFINE("_CAL_LANG_EVENT_HITS", "Accessos");
DEFINE("_CAL_LANG_EVENT_STATE", "Estat");
DEFINE("_CAL_LANG_EVENT_CREATED", "Creat");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nou esdeveniment");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Darrera modificaci&oacute;");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "No modificat");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "S'ha d'introduir una descripció de l'activitat.");


	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Color</b>
          </td>
          <td>Seleccioneu el color de fons que es mostrarà en la vista per mes del calendari. Si la casella de verificació d'utilització del color de la categoria està activada, el color serà per defecte el de la categoria (definit en l'administració del web) que se selecciona en el formulari de creació/edició de la categoria de l'esdeveniment, i el botó per triar color serà desactivat.</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Data</b></td>
          <td>Seleccioneu la data d'inici i de final de l'esdeveniment.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Hora</b></td>
          <td>Seleccioneu l'hora del dia de l'esdeveniment. El format és <span style='color:blue;font-weight:bold;'>hh:mm {am|pm}</span>.<br/>L'hora es pot especificar en format de 12 o bé 24 hores.<br/><br/><b><i><span style='color:red;'>(Nou)</span></i> Noteu</b> que hi ha un cas especial per a <span style='color:red;font-weight:bold;'>esdeveniments d'un dia que ocorren durant la nit</span>.  Ex. Per a un esdeveniment d'un sol dia que comen&ccedil;a a les 19:00h i acaba a les 3:00h, la data d'inici i de final <b>HA DE SER</b> la mateixa, i ha de correspondre's al dia abans de mitjanit.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Tipus de repetició</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>Per dia</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Cada dia<br/><i>(per defecte)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Seleccioneu aquesta opció per a un esdeveniment d'un o més dies, no recurrent, amb una repetició cada dia des de la data d'inici a la de final</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>Per setmana</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Un cop per setmana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Aquesta opció permet seleccionar el dia de la setmana de la repetició
                  <table border="0" width="100%" height="100%"><tr><td><b>Número de dia</b> per repetir cada 10/../2003</td></tr><tr><td><b>Nom del dia</b> per repetir cada Dilluns</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Múltiples dies per setmana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Aquesta opció permet seleccionar en quins dies de la setmana serà visible l'esdeveniment</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Setmana # del mes<br>Per a les opcions 'Un cop per setmana' i 'Múltiples dies per setmana' anteriors</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Setmana 1 :</b> 1a setmana del mes</td></tr>
                    <tr><td><b>Setmana 2 :</b> 2a setmana del mes</td></tr>
                    <tr><td><b>Setmana 3 :</b> 3a setmana del mes</td></tr>
                    <tr><td><b>Setmana 4 :</b> 4a setmana del mes</td></tr>
                    <tr><td><b>Setmana 5 :</b> 5a setmana del mes (en cas que es pugui)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>By Month</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Un cop per mes</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Aquesta opció permet seleccionar el dia de del mes de la repetició
                     <table border="0" width="100%" height="100%"><tr><td><b>Número de dia</b> per repetir cada 10/../2003</td></tr><tr><td><b>Nom del dia</b> per repetir cada Dilluns</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Final de cada mes
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
				   L'esdeveniment es troba en el darrer dia de cada mes, independentment del número de dia, si aquest dia queda entre la data d'inici i de final de l'esdeveniment.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>By Year</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Un cop per any
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Aquesta opció permet seleccionar un dia concret cada any
                  <table border="0" width="100%" height="100%"><tr><td><b>Número de dia</b> per repetir cada 10/../2003</td></tr><tr><td><b>Nom del dia</b> per repetir cada Dilluns</td></tr></table>
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
