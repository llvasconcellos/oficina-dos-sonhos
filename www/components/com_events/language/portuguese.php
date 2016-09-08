<?php
// $Id: portuguese.php,v 1.10 2004/10/05 20:23:01 mleinmueller Exp $
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
DEFINE("_CAL_LANG_JANUARY", "Janeiro");
DEFINE("_CAL_LANG_FEBRUARY", "Fevereiro");
DEFINE("_CAL_LANG_MARCH", "Março");
DEFINE("_CAL_LANG_APRIL", "Abril");
DEFINE("_CAL_LANG_MAY", "Maio");
DEFINE("_CAL_LANG_JUNE", "Junho");
DEFINE("_CAL_LANG_JULY", "Julho");
DEFINE("_CAL_LANG_AUGUST", "Agosto");
DEFINE("_CAL_LANG_SEPTEMBER", "Setembro");
DEFINE("_CAL_LANG_OCTOBER", "Outubro");
DEFINE("_CAL_LANG_NOVEMBER", "Novembro");
DEFINE("_CAL_LANG_DECEMBER", "Dezembro");

// Short day names
DEFINE("_CAL_LANG_SUN", "Dom");
DEFINE("_CAL_LANG_MON", "Seg");
DEFINE("_CAL_LANG_TUE", "Ter");
DEFINE("_CAL_LANG_WED", "Qua");
DEFINE("_CAL_LANG_THU", "Qui");
DEFINE("_CAL_LANG_FRI", "Sex");
DEFINE("_CAL_LANG_SAT", "Sab");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Domingo");
DEFINE("_CAL_LANG_MONDAY", "Segunda");
DEFINE("_CAL_LANG_TUESDAY", "Terça");
DEFINE("_CAL_LANG_WEDNESDAY", "Quarta");
DEFINE("_CAL_LANG_THURSDAY", "Quinta");
DEFINE("_CAL_LANG_FRIDAY", "Sexta");
DEFINE("_CAL_LANG_SATURDAY", "Sábado");

// Days lettres
DEFINE("_CAL_LANG_SUNDAYSHORT", "D");
DEFINE("_CAL_LANG_MONDAYSHORT", "S");
DEFINE("_CAL_LANG_TUESDAYSHORT", "T");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Q");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Q");
DEFINE("_CAL_LANG_FRIDAYSHORT", "S");
DEFINE("_CAL_LANG_SATURDAYSHORT", "S");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Todos os dias");
DEFINE("_CAL_LANG_EACHWEEK", "Todas as semanas");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Todas as semanas pares");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Todas as semanas ímpares");
DEFINE("_CAL_LANG_EACHMONTH", "Todos os mêses");
DEFINE("_CAL_LANG_EACHYEAR", "Todos os anos");
DEFINE("_CAL_LANG_ONLYDAYS", "Somente os dias marcados");
DEFINE("_CAL_LANG_EACH", "Cada");
DEFINE("_CAL_LANG_EACHOF","de cada");
DEFINE("_CAL_LANG_ENDMONTH", "término do mês");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Pelo número do dia");

// User type
DEFINE("_CAL_LANG_ANONYME", "Anónimo");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Obrigado pela sua colaboração - Verificaremos a sua proposta!"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Este evento foi modificado."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Este evento foi apagado!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "Não tem acesso a esse serviço!"); //NO ACCENT !!
DEFINE("_CAL_LANG_MAIL_ADDED", "Nova submissão");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Nova modificação");

// Presentation
DEFINE("_CAL_LANG_BY", "por"); 
DEFINE("_CAL_LANG_FROM", "De"); 
DEFINE("_CAL_LANG_TO", "Para"); 
DEFINE("_CAL_LANG_ARCHIVE", "Arquivos"); 
DEFINE("_CAL_LANG_WEEK", "a semana"); 
DEFINE("_CAL_LANG_NO_EVENTS", "Nenhum evento");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Nenhum evento para");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Nenhum evento para");
DEFINE("_CAL_LANG_THIS_DAY", "esse dia");
DEFINE("_CAL_LANG_THIS_MONTH", "Este mês");
DEFINE("_CAL_LANG_LAST_MONTH", "Mês anterior");
DEFINE("_CAL_LANG_NEXT_MONTH", "Mês seguinte");
DEFINE("_CAL_LANG_EVENTSFOR", "Eventos para");
DEFINE("_CAL_LANG_EVENTSFORTHE", "Eventos para");
DEFINE("_CAL_LANG_REP_DAY", "dia");
DEFINE("_CAL_LANG_REP_WEEK", "semana");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "semana par");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "semana ímpar");
DEFINE("_CAL_LANG_REP_MONTH", "mês");
DEFINE("_CAL_LANG_REP_YEAR", "ano");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "Hoje");
DEFINE("_CAL_LANG_VIEWTOCOME", "Este mês");
DEFINE("_CAL_LANG_VIEWBYDAY", "Ver o dia");
DEFINE("_CAL_LANG_VIEWBYCAT", "Ver por categorias");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Ver o ano");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Ver o mês");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Ver a semana");
DEFINE("_CAL_LANG_BACK", "Voltar");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Dia anterior");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Semana anterior");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Mês anterior");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Ano anterior");
DEFINE("_CAL_LANG_NEXTDAY", "Dia seguinte");
DEFINE("_CAL_LANG_NEXTWEEK", "Semana seguinte");
DEFINE("_CAL_LANG_NEXTMONTH", "Mês seguinte");
DEFINE("_CAL_LANG_NEXTYEAR", "Ano seguinte");
DEFINE("_CAL_LANG_ADMINPANEL", "Painel de administração");
DEFINE("_CAL_LANG_ADDEVENT", "Adicionar um evento");
DEFINE("_CAL_LANG_MYEVENTS", "Meus eventos");
DEFINE("_CAL_LANG_DELETE", "Apagar");
DEFINE("_CAL_LANG_MODIFY", "Modificar");

// Form
DEFINE("_CAL_LANG_HELP", "Ajuda");

DEFINE("_CAL_LANG_CAL_TITLE", "Eventos");
DEFINE("_CAL_LANG_ADD_TITLE", "Adicionar");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Modificar");

DEFINE("_CAL_LANG_EVENT_TITLE", "Assunto");
DEFINE("_CAL_LANG_EVENT_COLOR", "Cor");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Utilizar Cor da Categoria");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Categorias");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Por favor seleccione uma categoria");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Actividade");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Para incluir uma URL ou um EMAIL, simplesmente digite <u>http://www.meusite.com</u> ou <u>mailto:meu@email.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Endereço");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Contacto");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Informações Complementares");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Autor (alias)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Data de Início");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Data de Término");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Hora de Início");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Hora de Término");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Hora de Inicio");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Hora de Término");
DEFINE("_CAL_LANG_PUB_INFO", "Informações de Publicação");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Tipo de Repetição");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "Dia de Repetição");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Dias da semana");
DEFINE("_CAL_LANG_SUBMITPREVIEW", "Prever");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Cancelar");
DEFINE("_CAL_LANG_SUBMITSAVE", "Salvar");
DEFINE("_CAL_LANG_E_WARNWEEKS", "Escolha uma Semana");
DEFINE("_CAL_LANG_E_WARNDAYS", "Escolha um Dia");
DEFINE("_CAL_LANG_EVENT_PER", "por");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Semana(s) de um mês - Repete nas semanas seleccionadas");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Todas as categorias");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Nivel de Acesso");
DEFINE("_CAL_LANG_EVENT_HITS", "Visualizações");
DEFINE("_CAL_LANG_EVENT_STATE", "Estado");
DEFINE("_CAL_LANG_EVENT_CREATED", "Criado");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Novo evento");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Última modificação");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Não modificado");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Tem de escrever algo na descrição\\nda actividade.");

	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Cor</b>
          </td>
          <td>Escolha a cor do fundo que será visível na vista de mês do calendário. Se a opção da Categoria estiver seleccionada, será assumida por defeito a cor da Categoria (definida pelo Administrador do Sitio) que foi escolhida no espaço de conteúdo do evento e o botão 'Color Picker' estará inactivo.</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Data</b></td>
          <td>Escolha a data de início e de término do seu evento.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Hora</b></td>
          <td>Escolha a Hora do Dia do seu evento.  O formato é <span style='color:blue;font-weight:bold;'>hh:mm {am|pm}</span>.<br/>As horas podem ser específicadas nos formatos de 12 ou 24 hrs.<br/><br/><b><i><span style='color:red;'>(Novo)</span></i> Note</b> que ocorre um caso especial nos casos <span style='color:red;font-weight:bold;'>de eventos de um dia que se prologam ao longo da noite</span>.  Isto é, para um evento de um único dia que se inicie às 19:00 e acabe às 3:00, a data de início e de término <b>têm</b> de&nbsp; ser a mesma, e devem ser definidas de acordo com a data correspondente ao dia antes da meia-noite.</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Repetição do Evento</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>Por dia</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Todo o dia<br/><i>(Por defeito)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Escolha esta opção para um evento de um ou vários dias que não se irá repetir, tendo uma nova ocorrência do evento todos os dias desde a data de início à data de término</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>Por Semana</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Uma vez por Semana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Esta opção permite seleccionar o dia da semana a repetir
                  <table border="0" width="100%" height="100%"><tr><td><b>Número do dia:</b> Para repetir o evento em cada 10/../2003</td></tr><tr><td><b>Nome do dia:</b> Para repetir o evento em cada Segunda-Feira</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Multiplos Dias por Semana
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Esta opção permite indicar em que dias da semana o evento será visível</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Semana do Mês # <br>Para as opções 'Uma vez por Semana' e 'Multiplos Dias por Semana'</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Semana 1 :</b> 1ª semana do mês</td></tr>
                    <tr><td><b>Semana 2 :</b> 2ª semana do mês</td></tr>
                    <tr><td><b>Semana 3 :</b> 3ª semana do mês</td></tr>
                    <tr><td><b>Semana 4 :</b> 4ª semana do mês</td></tr>
                    <tr><td><b>Semana 5 :</b> 5ª semana do mês (se aplicável)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Por Mês</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Uma vez por Mês</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Esta opção permite escolher o dia repetido do mês
                     <table border="0" width="100%" height="100%"><tr><td><b>Número do dia:</b> Para repetir o evento em cada 10/../2003</td></tr><tr><td><b>Nome do dia:</b> Para repetir o evento em cada Segunda-Feira</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Fim de cada Mês
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
				   O evento é no último dia de cada mês, independentemente do número do dia, se o último dia estiver dentro do intervalo definido para o início e fim do evento
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>Por Ano</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Uma vez por Ano
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Esta opção permite escolher um único dia todos os anos
                  <table border="0" width="100%" height="100%"><tr><td><b>Número do Dia:</b> Para repetir o evento em cada 10/../2003</td></tr><tr><td><b>Nome do dia:</b> Para repetir o evento em cada Segunda-Feira</td></tr></table>
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