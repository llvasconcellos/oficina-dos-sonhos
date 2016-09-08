<?php
// $Id: russian.php,v 1.7 2004/10/05 20:23:01 mleinmueller Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Перевод: Дмитрий Недавний (DJ SLIDER). Исправлено и дополнено: Яна Пазына (Rosida) v.1.1 20/04/2004 13:53

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_CAL_LANG_INCLUDED", 1);

// Months
DEFINE("_CAL_LANG_JANUARY", "Январь");
DEFINE("_CAL_LANG_FEBRUARY", "Февраль");
DEFINE("_CAL_LANG_MARCH", "Март");
DEFINE("_CAL_LANG_APRIL", "Апрель");
DEFINE("_CAL_LANG_MAY", "Май");
DEFINE("_CAL_LANG_JUNE", "Июнь");
DEFINE("_CAL_LANG_JULY", "Июль");
DEFINE("_CAL_LANG_AUGUST", "Август");
DEFINE("_CAL_LANG_SEPTEMBER", "Сентябрь");
DEFINE("_CAL_LANG_OCTOBER", "Октябрь");
DEFINE("_CAL_LANG_NOVEMBER", "Ноябрь");
DEFINE("_CAL_LANG_DECEMBER", "Декабрь");

// Short day names
DEFINE("_CAL_LANG_SUN", "Вс");
DEFINE("_CAL_LANG_MON", "Пн");
DEFINE("_CAL_LANG_TUE", "Вт");
DEFINE("_CAL_LANG_WED", "Ср");
DEFINE("_CAL_LANG_THU", "Чт");
DEFINE("_CAL_LANG_FRI", "Пт");
DEFINE("_CAL_LANG_SAT", "Сб");

// Days
DEFINE("_CAL_LANG_SUNDAY", "Воскресенье");
DEFINE("_CAL_LANG_MONDAY", "Понедельник");
DEFINE("_CAL_LANG_TUESDAY", "Вторник");
DEFINE("_CAL_LANG_WEDNESDAY", "Среда");
DEFINE("_CAL_LANG_THURSDAY", "Четверг");
DEFINE("_CAL_LANG_FRIDAY", "Пятница");
DEFINE("_CAL_LANG_SATURDAY", "Суббота");

// Days letters
DEFINE("_CAL_LANG_SUNDAYSHORT", "Вс");
DEFINE("_CAL_LANG_MONDAYSHORT", "Пн");
DEFINE("_CAL_LANG_TUESDAYSHORT", "Вт");
DEFINE("_CAL_LANG_WEDNESDAYSHORT", "Ср");
DEFINE("_CAL_LANG_THURSDAYSHORT", "Чт");
DEFINE("_CAL_LANG_FRIDAYSHORT", "Пт");
DEFINE("_CAL_LANG_SATURDAYSHORT", "Сб");

// Repeat type
DEFINE("_CAL_LANG_ALLDAYS", "Каждый день");
DEFINE("_CAL_LANG_EACHWEEK", "Каждую неделю");
DEFINE("_CAL_LANG_EACHWEEKPAIR", "Каждую четную неделю");
DEFINE("_CAL_LANG_EACHWEEKIMPAIR", "Каждую нечетную неделю");
DEFINE("_CAL_LANG_EACHMONTH", "Каждый месяц");
DEFINE("_CAL_LANG_EACHYEAR", "Каждый год");
DEFINE("_CAL_LANG_ONLYDAYS", "Только выбранные дни");
DEFINE("_CAL_LANG_EACH", "Кажд.");
DEFINE("_CAL_LANG_EACHOF","Каждого");
DEFINE("_CAL_LANG_ENDMONTH", "конец месяца");

// Repeat days
DEFINE("_CAL_LANG_BYDAYNUMBER", "Тем же числам");

// User type
DEFINE("_CAL_LANG_ANONYME", "Анонимный");

// Post
//PAS D'ACCENTS DANS LES _ACT_
DEFINE("_CAL_LANG_ACT_ADDED", "Благодарим вас за добавление события! Мы проверим и опубликуем его в ближайшее время"); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_MODIFIED", "Данное событие было изменено."); //NO ACCENT !!
DEFINE("_CAL_LANG_ACT_DELETED", "Данное событие было удалено!"); //NO ACCENT !!
DEFINE("_CAL_LANG_NOPERMISSION", "У вас нет доступа к этому сервису!"); //NO ACCENT !!

DEFINE("_CAL_LANG_MAIL_ADDED", "Новое добавление:");
DEFINE("_CAL_LANG_MAIL_MODIFIED", "Новое изменение");

// Presentation
DEFINE("_CAL_LANG_BY", "Представлено:");
DEFINE("_CAL_LANG_FROM", "С");
DEFINE("_CAL_LANG_TO", "До");
DEFINE("_CAL_LANG_ARCHIVE", "Архивы");
DEFINE("_CAL_LANG_WEEK", "Неделю");
DEFINE("_CAL_LANG_NO_EVENTS", "Нет событий");
DEFINE("_CAL_LANG_NO_EVENTFOR", "Нет событий за:");
DEFINE("_CAL_LANG_NO_EVENTFORTHE", "Нет событий за:");
DEFINE("_CAL_LANG_THIS_DAY", "Этот день");
DEFINE("_CAL_LANG_THIS_MONTH", "В этом месяце...");
DEFINE("_CAL_LANG_LAST_MONTH", "В прошлом месяце...");
DEFINE("_CAL_LANG_NEXT_MONTH", "В следующем месяце...");
DEFINE("_CAL_LANG_EVENTSFOR", "События за:");
DEFINE("_CAL_LANG_EVENTSFORTHE", "События за");
DEFINE("_CAL_LANG_REP_DAY", "день");
DEFINE("_CAL_LANG_REP_WEEK", "неделю по:");
DEFINE("_CAL_LANG_REP_WEEKPAIR", "Четная неделя");
DEFINE("_CAL_LANG_REP_WEEKIMPAIR", "Нечетная неделя");
DEFINE("_CAL_LANG_REP_MONTH", "месяц по:");
DEFINE("_CAL_LANG_REP_YEAR", "год по:");
DEFINE("_CAL_LANG_REP_NOEVENTSELECTED", "Please select an event first");

// Navigation
DEFINE("_CAL_LANG_VIEWTODAY", "События&nbsp;на&nbsp;сегодня");
DEFINE("_CAL_LANG_VIEWTOCOME", "События&nbsp;в&nbsp;этом&nbsp;месяце");
DEFINE("_CAL_LANG_VIEWBYDAY", "Посмотреть на день");
DEFINE("_CAL_LANG_VIEWBYCAT", "Посмотреть по категориям");
DEFINE("_CAL_LANG_VIEWBYMONTH", "Посмотреть на месяц");
DEFINE("_CAL_LANG_VIEWBYYEAR", "Посмотреть на год");
DEFINE("_CAL_LANG_VIEWBYWEEK", "Посмотреть на неделю");
DEFINE("_CAL_LANG_BACK", "Обратно");
DEFINE("_CAL_LANG_CLOSE", "Close");
DEFINE("_CAL_LANG_PREVIOUSDAY", "Предыдущий день");
DEFINE("_CAL_LANG_PREVIOUSWEEK", "Предыдущая неделя");
DEFINE("_CAL_LANG_PREVIOUSMONTH", "Предыдущий месяц");
DEFINE("_CAL_LANG_PREVIOUSYEAR", "Предыдущий год");
DEFINE("_CAL_LANG_NEXTDAY", "Следущий день");
DEFINE("_CAL_LANG_NEXTWEEK", "Следущая неделя");
DEFINE("_CAL_LANG_NEXTMONTH", "Следущий месяц");
DEFINE("_CAL_LANG_NEXTYEAR", "Следущий год");

DEFINE("_CAL_LANG_ADMINPANEL", "Админ. панель");
DEFINE("_CAL_LANG_ADDEVENT", ":: Добавить событие");
DEFINE("_CAL_LANG_MYEVENTS", ":: Мои события");
DEFINE("_CAL_LANG_DELETE", "Удалить");
DEFINE("_CAL_LANG_MODIFY", "Изменить");

// Form
DEFINE("_CAL_LANG_HELP", "Помощь");

DEFINE("_CAL_LANG_CAL_TITLE", "События");
DEFINE("_CAL_LANG_ADD_TITLE", "Добавить");
DEFINE("_CAL_LANG_MODIFY_TITLE", "Изменить");

DEFINE("_CAL_LANG_EVENT_TITLE", "Событие");
DEFINE("_CAL_LANG_EVENT_COLOR", "Цвет");
DEFINE("_CAL_LANG_EVENT_CATCOLOR", "Использовать цвет");
DEFINE("_CAL_LANG_EVENT_CATEGORY", "Категория");
DEFINE("_CAL_LANG_EVENT_CHOOSE_CATEG", "Выберите категорию");
DEFINE("_CAL_LANG_EVENT_ACTIVITY", "Действие");
DEFINE("_CAL_LANG_EVENT_URLMAIL_INFO", "Для добавления URL или E-mail, заполняйте в следующем формате <u>http://www.mysite.com</u> или <u>mailto:my@mail.com</u>");
DEFINE("_CAL_LANG_EVENT_ADRESSE", "Ваше местоположение");
DEFINE("_CAL_LANG_EVENT_CONTACT", "Контакт");
DEFINE("_CAL_LANG_EVENT_EXTRA", "Дополнительная информация");
DEFINE("_CAL_LANG_EVENT_AUTHOR_ALIAS", "Автор (Псевдоним)");
DEFINE("_CAL_LANG_EVENT_STARTDATE", "Дата начала публикации");
DEFINE("_CAL_LANG_EVENT_ENDDATE", "Дата окончания публикации");
DEFINE("_CAL_LANG_EVENT_STARTHOURS", "Время начала");
DEFINE("_CAL_LANG_EVENT_ENDHOURS", "Время конца");
DEFINE("_CAL_LANG_EVENT_STARTTIME", "Время начала");
DEFINE("_CAL_LANG_EVENT_ENDTIME", "Время конца");
DEFINE("_CAL_LANG_PUB_INFO", "Публикуемая информация");
DEFINE("_CAL_LANG_EVENT_REPEATTYPE", "Тип повтора");
DEFINE("_CAL_LANG_EVENT_REPEATDAY", "День повтора");
DEFINE("_CAL_LANG_EVENT_CHOOSE_WEEKDAYS", "Дней в неделю");
DEFINE("_CAL_LANG_EVENT_PER", "в");
DEFINE("_CAL_LANG_EVENT_WEEKOPT", "Неделя(и) месяца по порядковому номеру");

DEFINE("_CAL_LANG_SUBMITPREVIEW", "Предпросмотр");
DEFINE("_CAL_LANG_SUBMITCANCEL", "Отмена");
DEFINE("_CAL_LANG_SUBMITSAVE", "Сохранить");

DEFINE("_CAL_LANG_E_WARNWEEKS", "Предупреждение.");
DEFINE("_CAL_LANG_E_WARNDAYS", "Предупреждение.");

// Admin
DEFINE("_CAL_LANG_EVENT_ALLCAT", "Все категории");
DEFINE("_CAL_LANG_EVENT_ACCESSLEVEL", "Уровень доступа");
DEFINE("_CAL_LANG_EVENT_HITS", "Показов");
DEFINE("_CAL_LANG_EVENT_STATE", "Состояние");
DEFINE("_CAL_LANG_EVENT_CREATED", "Дата создания");
DEFINE("_CAL_LANG_EVENT_NEWEVENT", "Новое событие");
DEFINE("_CAL_LANG_EVENT_MODIFIED", "Дата последнего изменения");
DEFINE("_CAL_LANG_EVENT_NOTMODIFIED", "Не изменено");

// dmcd aug 22/04  new warning alert for no specified activity in event entry
DEFINE("_CAL_LANG_WARNACTIVITY", "Непредусмотренные действия\\nдолжно быть описание.");


	$com_events_form_help_color = <<<END
        <tr>
		  <td width="110" align="left" valign="top">
            <b>Цвет</b>
          </td>
          <td>Выберите цвет фона, который будет использован при показе заголовка события в режиме месяца. Если отмечен чекбокс категории, цвет будет установлен по умолчанию равным цвету категории (определяется администратором сайта), который выбран в контент-закладке событий и кнопка выбора цвета будет отключена .</td>
        </tr>
END;

	$com_events_form_help = <<<END
    	<tr>
          <td align="left"><b>Дата</b></td>
          <td>Выбор даты начала и окончания вашего события.</td>
        </tr>
    	<tr>
          <td align="left" valign="top"><b>Время</b></td>
          <td>Выберите время вашего события. Формат - <span style='color:blue;font-weight:bold;'>hh:mm {am|pm}</span>.<br/>Время может быть использовано как в 12-, так и в 24-часовом формате.<br/><br/><b><i><span style='color:red;'>(Новое)</span></i> Примечание:</b> особенности введения <span style='color:red;font-weight:bold;'>ночных событий</span>. IE. Для ночного события, начинающегося в 19.00 и заканчивающегося в 3.00, начальная и конечная даты <b>ДОЛЖНЫ БЫТЬ</b> 
		  одинаковыми - дата начала события (до полуночи).</td>
        </tr>
END;

	$com_events_form_help_extended = <<<END
        <tr>
    	  <td align="left" valign="top" nowrap><b>Тип повтора</b></td>
  	  	<td colspan="2"></td>
  		</tr>
  		<tr>
    	  <td colspan="2" align="left" valign="top">
	    	<table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u>По дням</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Каждый день<br/><i>(default)</i></font>
                </td>
                <td align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000">Выберите эту опцию для неповторяющегося события или для события, назначенного на конкретные даты, не имеющего непрерывной продолжительности (то есть если нельзя просто указать дату начала и конца события)</font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="3" align="left" valign="top"><u>В неделю</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Раз в неделю
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  Эта опция позволяет выбрать день недели для повторяющегося события
                  <table border="0" width="100%" height="100%"><tr><td><b>Номер дня</b> для повторов типа \"каждого 10 числа\" </td></tr><tr><td><b>День недели</b> для повторов типа \"каждый понедельник\"</td></tr></table>
                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                    Несколько раз в неделю
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">Эта опция позволяет вам выбрать, по каким дням недели ваше событие будет показано.</font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"><i>Номер недели месяца <br>Для режимов 'раз в неделю' и 'несколько раз в неделю'</i></font></td>
                  <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000">
                  <table border="0" width="100%" height="100%">
                    <tr><td><b>Week 1 :</b> 1-я неделя месяца</td></tr>
                    <tr><td><b>Week 2 :</b> 2-я неделя месяца</td></tr>
                    <tr><td><b>Week 3 :</b> 3-я неделя месяца</td></tr>
                    <tr><td><b>Week 4 :</b> 4-я неделя месяца</td></tr>
                    <tr><td><b>Week 5 :</b> 5-я неделя месяца (если есть)</td></tr>
                   </table>
                 </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>В месяц</u></td>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">Раз в месяц</font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                     Эта опция позволяет выбрать вам повтор события по определенным дням месяца
                     <table border="0" width="100%" height="100%"><tr><td><b>Номер дня</b> для повторов типа \"каждого 10 числа\" </td></tr><tr><td><b>День недели</b> для повторов типа \"каждый понедельник\"</td></tr></table>

                  </font>
                </td>
              </tr>
              <tr>
                <td width="110" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
                  Последний день месяца
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000">
				   Событие, происходящее в последний день каждого месяца, независимо от его даты.
                  </font>
                </td>
              </tr>
              <tr>
                <td width="60" rowspan="2" align="left" valign="top"><u>В год</u></td>
                <td width="110" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Раз в год
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000">
                  Этой опцией вы можете выбрать для события единственный день каждый год
                  <table border="0" width="100%" height="100%"><tr><td><b>Номер дня</b> для повторов типа \"каждого 10 числа\" </td></tr><tr><td><b>День недели</b> для повторов типа \"каждый понедельник\"</td></tr></table>
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
