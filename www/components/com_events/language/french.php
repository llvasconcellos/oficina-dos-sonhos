<?php
// $Id: french.php,v 1.9 2004/10/05 20:23:01 mleinmueller Exp $
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
DEFINE("_CAL_LANG_JANUARY", "Janvier");
DEFINE("_CAL_LANG_FEBRUARY", "Février");
DEFINE("_CAL_LANG_MARCH", "Mars");
DEFINE("_CAL_LANG_APRIL", "Avril");
DEFINE("_CAL_LANG_MAY", "Mai");
DEFINE("_CAL_LANG_JUNE", "Juin");
DEFINE("_CAL_LANG_JULY", "Juillet");
DEFINE("_CAL_LANG_AUGUST", "Août");
DEFINE("_CAL_LANG_SEPTEMBER", "Septembre");
DEFINE("_CAL_LANG_OCTOBER", "Octobre");
DEFINE("_CAL_LANG_NOVEMBER", "Novembre");
DEFINE("_CAL_LANG_DECEMBER", "Decembre");

// Short day names
DEFINE("_CAL_LANG_SUN", "Dim");
DEFINE("_CAL_LANG_MON", "Lun");
DEFINE("_CAL_LANG_TUE", "Mar");
DEFINE("_CAL_LANG_WED", "Mer");
DEFINE("_CAL_LANG_THU", "Jeu");
DEFINE("_CAL_LANG_FRI", "Ven");
DEFINE("_CAL_LANG_SAT", "Sam");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Dimanche");
DEFINE("_CAL_LANG_MONDAY", "Lundi");
DEFINE("_CAL_LANG_TUESDAY", "Mardi");
DEFINE("_CAL_LANG_WEDNESDAY", "Mercredi");
DEFINE("_CAL_LANG_THURSDAY", "Jeudi");
DEFINE("_CAL_LANG_FRIDAY", "Vendredi");
DEFINE("_CAL_LANG_SATURDAY", "Samedi");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "D");
DEFINE("_CAL_LANG_MONDAYSHORT", "L");
DEFINE("_CAL_LANG_TUESDAYSHORT", "M");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "M");
DEFINE("_CAL_LANG_THURSDAYSHORT", "J");
DEFINE("_CAL_LANG_FRIDAYSHORT", "V");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Tous les jours");
DEFINE("_CAL_LANG_EACHWEEK", "Toutes les semaines");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Toutes les semaines paires");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Toutes les semaines impaires");
DEFINE("_CAL_LANG_EACHMONTH", "Tous les mois");
DEFINE("_CAL_LANG_EACHYEAR", "Tous les ans");
DEFINE("_CAL_LANG_ONLYDAYS", "Seulement les jours choisis");
DEFINE("_CAL_LANG_EACH", "Chaque");
DEFINE("_CAL_LANG_EACHOF","de chaque");
DEFINE("_CAL_LANG_ENDMONTH", "fin du mois");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Par numéro du jour");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anonyme");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Merci pour votre envoi - Nous allons verifier votre proposition!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Cet evenement a ete modifie."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Cet evenement est efface!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Vous n'avez pas acces a ce service !"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nouvelle soumission sur");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nouvelle modification sur");

// Presentation
DEFINE("_CAL_LANG_BY", "par"); 
DEFINE("_CAL_LANG_FROM", "Du"); 
DEFINE("_CAL_LANG_TO", "Au"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archives"); 
DEFINE("_CAL_LANG_WEEK", "la semaine"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Pas d'événements");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Pas d'activité pour");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Pas d'activité pour le");
DEFINE("_CAL_LANG_THIS_DAY", "ce jour");
DEFINE("_CAL_LANG_THIS_MONTH", "Ce mois");
DEFINE("_CAL_LANG_LAST_MONTH", "Le mois dernier");
DEFINE("_CAL_LANG_NEXT_MONTH", "Mois suivant");
DEFINE("_CAL_LANG_EVENTSFOR", "Evénements pour");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Evénements pour le");
DEFINE("_CAL_LANG_REP_DAY", "jour");
DEFINE("_CAL_LANG_REP_WEEK", "semaine");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "semaine paire");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "semaine impaire");
DEFINE("_CAL_LANG_REP_MONTH", "mois");
DEFINE("_CAL_LANG_REP_YEAR", "année");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Aujourd'hui");
DEFINE("_CAL_LANG_VIEWTOCOME", "Prochainement");
DEFINE("_CAL_LANG_VIEWBYDAY", "Vue par jour");
DEFINE("_CAL_LANG_VIEWBYCAT", "Vue par categories");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Vue par mois");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Vue par an");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Vue par semaine");
DEFINE("_CAL_LANG_BACK", "Retour");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Jour précédent");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Semaine précédente");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Mois précédent");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Année précédente");
DEFINE("_CAL_LANG_NEXTDAY", "Jour suivant");
DEFINE("_CAL_LANG_NEXTWEEK", "Semaine suivante");
DEFINE("_CAL_LANG_NEXTMONTH", "Mois suivant");
DEFINE("_CAL_LANG_NEXTYEAR", "Année suivante");

DEFINE("_CAL_LANG_ADMINPANEL", "Panneau d'administration");
DEFINE("_CAL_LANG_ADDEVENT", "Ajouter un evénement");
DEFINE("_CAL_LANG_MYEVENTS", "Mes événements");
DEFINE("_CAL_LANG_DELETE", "Effacer");
DEFINE("_CAL_LANG_MODIFY", "Modifier");

// Form
DEFINE("_CAL_LANG_HELP", "Aide");

DEFINE("_CAL_LANG_CAL_TITLE", "Evénements");
DEFINE("_CAL_LANG_ADD_TITLE", "Ajouter");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Modifier");

DEFINE("_CAL_LANG_EVENT_TITLE", "Sujet");
DEFINE("_CAL_LANG_EVENT_COLOR", "Couleur");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Catégories");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Veuillez choisir une catégorie");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Activité");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "For add an URL or a MAIL, simply write <u>http://www.mysite.com</u> or <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Adresse");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contact");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Infos complémentaires");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Auteur (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Date de début");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Date de fin");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Heure de début");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Heure de fin");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Heure de début");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Heure de fin");
DEFINE("_CAL_LANG_PUB_INFO", "Informations de publication");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Type de réccurence");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Jour de réccurence");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Jours de la semaine");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Prévisualiser");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Annuler");
DEFINE("_CAL_LANG_SUBMITSAVE", "Sauvegarder");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Veuillez choisir une semaine.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Veuillez choisir un jour.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Toutes les catégories");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Niveau d'accès");
DEFINE("_CAL_LANG_EVENT_HITS", "Vues");
DEFINE("_CAL_LANG_EVENT_STATE", "Etat");
DEFINE("_CAL_LANG_EVENT_CREATED", "Crée le");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nouvel événement");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Dernière modification le");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Pas modifié");

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
