<?php
// $Id: spanish.php,v 1.10 2005/10/27 19:11:11 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Ramon Gomez <ramongomez@us.es>

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Enero");
DEFINE("_CAL_LANG_FEBRUARY", "Febrero");
DEFINE("_CAL_LANG_MARCH", "Marzo");
DEFINE("_CAL_LANG_APRIL", "Abril");
DEFINE("_CAL_LANG_MAY", "Mayo");
DEFINE("_CAL_LANG_JUNE", "Junio");
DEFINE("_CAL_LANG_JULY", "Julio");
DEFINE("_CAL_LANG_AUGUST", "Agosto");
DEFINE("_CAL_LANG_SEPTEMBER", "Septiembre");
DEFINE("_CAL_LANG_OCTOBER", "Octubre");
DEFINE("_CAL_LANG_NOVEMBER", "Noviembre");
DEFINE("_CAL_LANG_DECEMBER", "Diciembre");

// Short day names
DEFINE("_CAL_LANG_MON", "Lun");
DEFINE("_CAL_LANG_TUE", "Mar");
DEFINE("_CAL_LANG_WED", "Mié;");
DEFINE("_CAL_LANG_THU", "Jue");
DEFINE("_CAL_LANG_FRI", "Vie");
DEFINE("_CAL_LANG_SAT", "Sáb");
DEFINE("_CAL_LANG_SUN", "Dom");

// Days
DEFINE("_CAL_LANG_MONDAY", "Lunes");
DEFINE("_CAL_LANG_TUESDAY", "Martes");
DEFINE("_CAL_LANG_WEDNESDAY", "Miércoles");
DEFINE("_CAL_LANG_THURSDAY", "Jueves");
DEFINE("_CAL_LANG_FRIDAY", "Viernes");
DEFINE("_CAL_LANG_SATURDAY", "Sábado");
DEFINE("_CAL_LANG_SUNDAY", "Domingo");

// Days lettres
DEFINE("_CAL_LANG_MONDAYSHORT", "L");
DEFINE("_CAL_LANG_TUESDAYSHORT", "M");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "X");
DEFINE("_CAL_LANG_THURSDAYSHORT", "J");
DEFINE("_CAL_LANG_FRIDAYSHORT", "V");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");
DEFINE("_CAL_LANG_SUNDAYSHORT", "D");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Cada d&iacute;a");
DEFINE("_CAL_LANG_EACHWEEK", "Cada semana");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Cada semana par");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Cada semana impar");
DEFINE("_CAL_LANG_EACHMONTH", "Cada mes");
DEFINE("_CAL_LANG_EACHYEAR", "Cada a&ntilde;o");
DEFINE("_CAL_LANG_ONLYDAYS", "S&oacute;lo los d&iacute;as elegidos");
DEFINE("_CAL_LANG_EACH", "Cada");
DEFINE("_CAL_LANG_EACHOF","de cada");
DEFINE("_CAL_LANG_ENDMONTH", "fin de mes");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Por n&uacute;mero del d&iacute;a");

// User type
DEFINE("_CAL_LANG_ANONYME", "An&oacute;nimo");

// Post
DEFINE("_CAL_LANG_ACT_ADDED", "La propuesta debe ser verificada antes de ser publicada."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Acontecimiento modificado."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Acontecimiento eliminado."); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "No tienes acceso al servicio."); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Nueva publicaci&oacute;n el");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nueva modificaci&oacute;n el");

// Presentation
DEFINE("_CAL_LANG_BY", "por"); 
DEFINE("_CAL_LANG_FROM", "Desde"); 
DEFINE("_CAL_LANG_TO", "Hasta"); 
DEFINE("_CAL_LANG_ARCHIVE", "Archivos"); 
DEFINE("_CAL_LANG_WEEK", "la semana"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Sin acontecimientos");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Sin acontecimientos para");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Sin acontecimientos para el");
DEFINE("_CAL_LANG_THIS_DAY", "este d&iacute;a");
DEFINE("_CAL_LANG_THIS_MONTH", "Este mes");
DEFINE("_CAL_LANG_LAST_MONTH", "&Uacute;ltimo mes");
DEFINE("_CAL_LANG_NEXT_MONTH", "Mes siguiente");
DEFINE("_CAL_LANG_EVENTSFOR", "Acontecimientos para");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Acontecimientos para el");
DEFINE("_CAL_LANG_REP_DAY", "d&iacute;a");
DEFINE("_CAL_LANG_REP_WEEK", "semana");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "semana par");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "semana impar");
DEFINE("_CAL_LANG_REP_MONTH", "mes");
DEFINE("_CAL_LANG_REP_YEAR", "a&ntilde;o");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Ver hoy");
DEFINE("_CAL_LANG_VIEWTOCOME", "Resto del mes");
DEFINE("_CAL_LANG_VIEWBYDAY", "Ver d&iacute;a");
DEFINE("_CAL_LANG_VIEWBYCAT", "Ver categor&iacute;as");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Ver mes");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Ver a&ntilde;o");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Ver semana");
DEFINE("_CAL_LANG_BACK", "Volver");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "D&iacute;a anterior");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Semana anterior");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Mes anteior");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "A&ntilde;o anterior");
DEFINE("_CAL_LANG_NEXTDAY", "D&iacute;a siguiente");
DEFINE("_CAL_LANG_NEXTWEEK", "Semana siguiente");
DEFINE("_CAL_LANG_NEXTMONTH", "Mes siguiente");
DEFINE("_CAL_LANG_NEXTYEAR", "A&ntilde;o siguiente");

DEFINE("_CAL_LANG_ADMINPANEL", "Panel administrador");
DEFINE("_CAL_LANG_ADDEVENT", "A&ntilde;adir acontecimiento");
DEFINE("_CAL_LANG_MYEVENTS", "Mis acontecimientos");
DEFINE("_CAL_LANG_DELETE", "Borrar");
DEFINE("_CAL_LANG_MODIFY", "Modificar");

// Form
DEFINE("_CAL_LANG_HELP", "Ayuda");

DEFINE("_CAL_LANG_CAL_TITLE", "Acontecimientos");
DEFINE("_CAL_LANG_ADD_TITLE", "A&ntilde;adir");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Modificar");

DEFINE("_CAL_LANG_EVENT_TITLE", "Asunto");
DEFINE("_CAL_LANG_EVENT_COLOR", "Color");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Use Category Color");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Categor&iacute;as");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Elegir una categor&iacute;a");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Actividad");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "para incluir un URL o e-mail, escribir <br><u>http://www.servidor.com</u> o <u>mailto:usuario@correo.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Localizaci&oacute;n");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contacto");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Info. extra");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Fecha inicial");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Fecha final");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Hora inicial");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Hora final");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Hora inicial");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Hora final");
DEFINE("_CAL_LANG_PUB_INFO", "Informaci&oacute;n de la publicaci&oacute;n");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Tipo de repetici&oacute;n");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Repetir d&iacute;as");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "D&iacute;as del mes");
DEFINE("_CAL_LANG_EVENT_PER", "per");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Week(s) of a month repeat type week");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Vista previa");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Cancelar");
DEFINE("_CAL_LANG_SUBMITSAVE", "Guardar");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Elegir una semana.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Elegir un d&iacute;a.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Todas las categor&iacute;as");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Nivel de accesso");
DEFINE("_CAL_LANG_EVENT_HITS", "Accesos");
DEFINE("_CAL_LANG_EVENT_STATE", "Estado");
DEFINE("_CAL_LANG_EVENT_CREATED", "Creado");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Nuevo acontecimiento");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "&Uacute;ltima modificaci&oacute;n");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "No modificado");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Debe especificar una peque&ntilde;a descripci&oacute;n de la acividad.");
 

	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Color</b>
          </td>
          <td>Elige el color de fondo que mostrar&aacute; en la vista por meses del calendario. Si el cuadro de confirmaci&oacute;n de la categor&iacute;a est&aacute; seleccionado, el color por defecto ser&aacute; el de la categor&iacute;a (definida por el administrador del sistema) que es escogida en la pesta&ntilde;a de contenido del evento.</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Date</b></td>
          <td>Elige la fecha de inicio y fin del acontecimiento.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Time</b></td>
          <td>Elige el horario del evento. El formato es <span style='color:blue;font-weight:bold;'>hh:mm {am|pm}</span>.<br/>La hora se puede especificar en formato de 12 &oacute; 24 horas.<br/><br/><b><i><span style='color:red;'>(Nuevo)</span></i> N&oacute;tese</b> que se puede dar un caso especial para <span style='color:red;font-weight:bold;'>eventos de un s&oacute;lo d&iacute;a que sobrepasan la medianoche</span>.  Ej: evento que comienza a las 19:00 y termina a las 3 3:00, la fecha de comienzo y final <b>DEBEN</b> ser el mismo d&iacute;a, y deber&iacute;an ser especificadas en la fecha del d&iacute;a de inicio.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Tipo de Repetici&oacute;n</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>Por D&iacute;a</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Cada d&iacute;a<br/><i>(por defecto)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Elige esta opci&oacute;n para acontecimientos que no se repiten o para aquellos que duran varios d&iacute;as que tienen fecha de inicio y fin</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>Por Semana</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Una vez por semana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
				  Esta opci&oacute;n permite elegir el d&iacute;a de la semana que se repite el evento
                  <table border="0" width="100%" height="100%"><tr><td><b>N&uacute;mero de D&iacute;a</b> para la repetici&oacute;n cada 10/../2003</td></tr><tr><td><b>Nombre del D&iacute;a</b> para la repetici&oacute;n cada Lunes</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    M&uacute;ltiples d&iacute;as a la semana por semana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
				  Esta opci&oacute;n permite especificar en qu&eacute; d&iacute;as el evento ser&aacute; visible.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Semana de Mes # <br>Para "una vez por semana" y "m&uacute;ltiple d&iacute;as por semana"</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Semana 1 :</b> Primera semana del mes</td></tr>
                    <tr><td><b>Semana 2 :</b> Segunda semana del mes</td></tr>
                    <tr><td><b>Semana 3 :</b> Tercera semana del mes</td></tr>
                    <tr><td><b>Semana 4 :</b> Cuarta semana del mes</td></tr>
                    <tr><td><b>Semana 5 :</b> Quinta semana del mes (si existe)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Por Mes</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Una vez por mes</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
					 Permite elegir el d&iacute;a del mes en que se repite el evento
                     <table border="0" width="100%" height="100%"><tr><td><b>N&uacute;mero de D&iacute;a</b> para la repetici&oacute;n cada 10/../2003</td></tr><tr><td><b>Nombre de D&iacute;a</b> para la repetici&oacute;n cada Lunes</td></tr></table>

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
				   Este acontecimiento es el &uacute;ltimo d&iacute;a de mes independientemente de su n&uacute;mero, si este d&iacute;a coincide en el rango de inicio y fin del evento.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Por A&ntilde;o</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Una vez al a&ntilde;o
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
				  Permite elegir un d&iacute;a concreto cada a&ntilde;o
                  <table border="0" width="100%" height="100%"><tr><td><b>N&uacute;mero de D&iacute;a</b> para la repetici&oacute;n cada 10/../2003</td></tr><tr><td><b>Nombre de D&iacute;a</b> para la repetici&oacute;n cada Lunes</td></tr></table>
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

DEFINE("_CAL_LANG_VIEWBYSUBCAT","Ver por subcategorías");
DEFINE("_CAL_LANG_EVENT_SUBCATEGORY","Subcategoría");
DEFINE("_CAL_LANG_EVENT_CHOOSE_SUBCATEG","Vista por Subcategorías");

?>
