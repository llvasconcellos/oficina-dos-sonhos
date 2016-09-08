<?php
/***************************************************************************
 *                            lang_main.php [Nynorsk]
 *                              -------------------
 *     begin                : 12. feb 2004
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *              $Id: lang_main.php, v 1.0.4 04. apr 2004$
 * 
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// Norwegian - Nynorsk translation by Reiel Haugland.
//
// Nynorsk is one of two varations of the Norwegian language, the other is 
// "bokmål", which normally is just refered to as norwegian. Feel free to 
// mail me at reiel@organizer.net if you have any questions concering this matter.
// 

//
// Nynorsk omsetting av Reiel Haugland. 
//
// Spørsmål, kommentarar, rettingar og elles andre ting som har med denne 
// språkpakka å gjere, kan sendast til reiel@organizer.net, evt. leggast ut 
// i forumet på www.phpbb.no 
// Meir informasjon i LES MEG fila som er inkludert i språkpakken
//


//---Skal ikkje gjerast noko med.  http://www.phpbb.com/kb/article.php?article_id=41
$lang['ENCODING'] = 'iso-8859-1';
$lang['DIRECTION'] = 'ltr';
$lang['LEFT'] = 'left';
$lang['RIGHT'] = 'right';
//------------------------------
$lang['DATE_FORMAT'] =  'd.m.Y'; // This should be changed to the default date format for your language, php date() format


// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.
// $lang['TRANSLATION'] = '';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum';
$lang['Category'] = 'Kategori';
$lang['Topic'] = 'Emne';
$lang['Topics'] = 'Emner';
$lang['Replies'] = 'Svar';
$lang['Views'] = 'Lese';
$lang['Post'] = 'Innlegg';
$lang['Posts'] = 'Innlegg';
$lang['Posted'] = 'Skrive';
$lang['Username'] = 'Brukarnamn';
$lang['Password'] = 'Passord';
$lang['Email'] = 'E-post';
$lang['Poster'] = 'Skrive av';
$lang['Author'] = 'Forfattar';
$lang['Time'] = 'Tid';
$lang['Hours'] = 'Timar';
$lang['Message'] = 'Melding';

$lang['1_Day'] = '1 dag';
$lang['7_Days'] = '7 dagar';
$lang['2_Weeks'] = '2 veker';
$lang['1_Month'] = '4 veker';
$lang['3_Months'] = '3 månader';
$lang['6_Months'] = '6 månader';
$lang['1_Year'] = '1 år';

$lang['Go'] = 'Gå';
$lang['Jump_to'] = 'Gå til';
$lang['Submit'] = 'OK';
$lang['Reset'] = 'Attendestill';
$lang['Cancel'] = 'Avslutt';
$lang['Preview'] = 'Førehandsvisning';
$lang['Confirm'] = 'Bekreft';
$lang['Spellcheck'] = 'Stavekontroll';
$lang['Yes'] = 'Ja';
$lang['No'] = 'Nei';
$lang['Enabled'] = 'På';
$lang['Disabled'] = 'Av';
$lang['Error'] = 'Feil';

$lang['Next'] = 'Neste';
$lang['Previous'] = 'Føregåande';
$lang['Goto_page'] = 'Side';
$lang['Joined'] = 'Registrert';
$lang['IP_Address'] = 'IP-adresse';

$lang['Select_forum'] = 'Vel eit forum';
$lang['View_latest_post'] = 'Les siste innlegg';
$lang['View_newest_post'] = 'Les nyaste innlegg';
$lang['Page_of'] = 'Side <b>%d</b> av <b>%d</b>'; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = 'ICQ nr.';
$lang['AIM'] = 'AIM adr.';
$lang['MSNM'] = 'MSN Messenger adr.';
$lang['YIM'] = 'Yahoo Messenger adr.';

$lang['Forum_Index'] = "%s - Forum Hovedside";  // eg. sitename Forum Index, %s can be removed if you prefer';

$lang['Post_new_topic'] = 'Nytt emne';
$lang['Reply_to_topic'] = 'Svar på emnet';
$lang['Reply_with_quote'] = 'Svar med sitat frå dette innlegget';

$lang['Click_return_topic'] = '%sAttende til emnet%s';// %s's here are for uris, do not remove!
$lang['Click_return_login'] = '%sPrøv igjen%s';
$lang['Click_return_forum'] = '%sAttende til forumet%s';
$lang['Click_view_message'] = '%sLes innlegget%s';
$lang['Click_return_modcp'] = '%sAttende til kontrollpanelet%s';
$lang['Click_return_group'] = '%sAttende til gruppeinformasjonen%s';

$lang['Admin_panel'] = 'Administrasjonspanel';

$lang['Board_disable'] = 'Forumet er førebels nede, prøv igjen seinare';


//
// Global Header strings
//
$lang['Registered_users'] = 'Registerte brukarar:';
$lang['Browsing_forum'] = 'Brukarar i dette forumet:';
$lang['Online_users_zero_total'] = 'Det er <b>ingen</b> brukarar i forumet: ';
$lang['Online_users_total'] = 'Det er <b>%d</b> brukarar i forumet: ';
$lang['Online_user_total'] = 'Det er <b>%d</b> brukar i forumet: ';
$lang['Reg_users_zero_total'] = 'ingen registerte, ';
$lang['Reg_users_total'] = '%d registrerte, ';
$lang['Reg_user_total'] = '%d registrert, ';
$lang['Hidden_users_zero_total'] = 'ingen skjulte og ';
$lang['Hidden_user_total'] = '%d skjult og ';
$lang['Hidden_users_total'] = '%d skjulte og ';
$lang['Guest_users_zero_total'] = 'ingen gjester';
$lang['Guest_users_total'] = '%d gjester';
$lang['Guest_user_total'] = '%d gjest';
$lang['Record_online_users'] = 'Høgast tal samstundes brukarar i forumet var <b>%s</b>, på %s'; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = '%sAdministrator%s';
$lang['Mod_online_color'] = '%sModerator%s';

$lang['You_last_visit'] = 'Du var her sist: %s'; // %s replaced by date/time
$lang['Current_time'] = 'No er det: %s'; // %s replaced by time

$lang['Search_new'] = 'Vis nye innlegg';
$lang['Search_your_posts'] = 'Vis dine innlegg';
$lang['Search_unanswered'] = 'Vis ubesvarde innlegg';

$lang['Register'] = 'Registrer deg';
$lang['Profile'] = 'Profil';
$lang['Edit_profile'] = 'Endre profil';
$lang['Search'] = 'Søk';
$lang['Memberlist'] = 'Medlemsliste';
$lang['FAQ'] = 'Spørsmål og Svar';
$lang['BBCode_guide'] = 'BBCode rettleiing';
$lang['Usergroups'] = 'Grupper';
$lang['Last_Post'] = 'Siste innlegg';
$lang['Moderator'] = 'Moderator';
$lang['Moderators'] = 'Moderatorar';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Brukarane har ikkje skrive eit einaste innlegg';
$lang['Posted_articles_total'] = 'Brukarane har skrive <b>%d</b> innlegg';
$lang['Posted_article_total'] = 'Brukarane har skrive <b>%d</b> innlegg';
$lang['Registered_users_zero_total'] = 'Forumet har <b>ingen</b> registrerte brukarar';
$lang['Registered_users_total'] = 'Forumet har <b>%d</b> registrerte brukarar';
$lang['Registered_user_total'] = 'Forumet har <b>%d</b> registrert brukar';
$lang['Newest_user'] = 'Den siste registrerte brukaren er <b>%s%s%s</b>';

$lang['No_new_posts_last_visit'] = 'Ingen nye innlegg sidan du var her sist';
$lang['No_new_posts'] = 'Ingen nye innlegg';
$lang['New_posts'] = 'Nye innlegg';
$lang['New_post'] = 'Nytt innlegg';
$lang['No_new_posts_hot'] = 'Ingen nye innlegg [ Omtykt ]';
$lang['New_posts_hot'] = 'Nye innlegg [ Omtykt ]';
$lang['No_new_posts_locked'] = 'Ingen nye innlegg [ Stengt ]';
$lang['New_posts_locked'] = 'Nye innlegg [ Stengt ]';
$lang['Forum_is_locked'] = 'Forumet er stengt';


//
// Login
//
$lang['Enter_password'] = 'Skriv inn brukarnamn og passord';
$lang['Login'] = 'Logg inn';
$lang['Logout'] = 'Logg ut';

$lang['Forgotten_password'] = 'Eg har gløymt passordet';
$lang['Log_me_in'] = 'Logg meg inn automatisk kvar gong';
$lang['Error_login'] = 'Feil brukarnamn/passord';


//
// Index page
//
$lang['Index'] = 'Hovedside';
$lang['No_Posts'] = 'Ingen innlegg';
$lang['No_forums'] = 'Ingen forum';

$lang['Private_Message'] = 'Privat melding';
$lang['Private_Messages'] = 'Private meldingar';
$lang['Who_is_Online'] = 'Kven er i foruma';

$lang['Mark_all_forums'] = 'Marker heile forumet som lese';
$lang['Forums_marked_read'] = 'Heile forumet er markert som lese';


//
// Viewforum
//
$lang['View_forum'] = 'Vis forum';

$lang['Forum_not_exist'] = 'Forumet du valde eksisterer ikkje';
$lang['Reached_on_error'] = 'Du har kome til denne sida ved ein feil';

$lang['Display_topics'] = 'Vis emner frå';
$lang['All_Topics'] = 'Alle emner';

$lang['Topic_Announcement'] = '<b>Kunngjering:</b>';
$lang['Topic_Sticky'] = '<b>Førerett:</b>';
$lang['Topic_Moved'] = '<b>Flytta:</b>';
$lang['Topic_Poll'] = '<b>Røysting:</b>';

$lang['Mark_all_topics'] = 'Marker alle emna som lese';
$lang['Topics_marked_read'] = 'Emna er no markert som lese';
$lang['Rules_post_can'] = 'Du <b>kan starte</b> nye emner';
$lang['Rules_post_cannot'] = 'Du <b>kan ikkje starte</b> nye emner';
$lang['Rules_reply_can'] = 'Du <b>kan svare</b> på emner';
$lang['Rules_reply_cannot'] = 'Du <b>kan ikkje svare</b> på emner';
$lang['Rules_edit_can'] = 'Du <b>kan endre</b> dine eigne innlegg';
$lang['Rules_edit_cannot'] = 'Du <b>kan ikkje endre</b> dine eigne innlegg';
$lang['Rules_delete_can'] = 'Du <b>kan slette</b> dine eigne innlegg';
$lang['Rules_delete_cannot'] = 'Du <b>kan ikkje slette</b> dine eigne innlegg';
$lang['Rules_vote_can'] = 'Du <b>kan røyste</b> ved røystingar';
$lang['Rules_vote_cannot'] = 'Du <b>kan ikkje røyste</b> ved røystingar';
$lang['Rules_moderate'] = 'Du <b>kan</b> %smoderere%s dette forumet'; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = 'Det er ingen innlegg i dette forumet.<br /><br />Klikk på Nytt emne for å starte det fyrste emnet!';


//
// Viewtopic
//
$lang['View_topic'] = 'Vis emnet';

$lang['Guest'] = 'Gjest';
$lang['Post_subject'] = 'Emne';
$lang['View_next_topic'] = 'Les neste emne';
$lang['View_previous_topic'] = 'Les føregåande emne';

$lang['Submit_vote'] = 'Røyst!';
$lang['View_results'] = 'Resultat';

$lang['No_newer_topics'] = 'Det er ingen nyare emner i forumet';
$lang['No_older_topics'] = 'Det er ingen eldre emner i forumet';
$lang['Topic_post_not_exist'] = 'Finn ikkje emnet eller innlegget i forumet';
$lang['No_posts_topic'] = 'Det er ingen innlegg i dette emnet';

$lang['Display_posts'] = 'Vis innlegg frå';
$lang['All_Posts'] = 'Alle';
$lang['Newest_First'] = 'Nyaste først';
$lang['Oldest_First'] = 'Eldste først';

$lang['Back_to_top'] = 'Til toppen!';

$lang['Read_profile'] = 'Vis profilen til brukaren';
$lang['Send_email'] = 'Send e-post til brukaren';
$lang['Visit_website'] = 'Besøk brukaren sin nettstad';
$lang['ICQ_status'] = 'ICQ-status';
$lang['Edit_delete_post'] = 'Endre/slett innlegget';
$lang['View_IP'] = 'Vis IP-adressa til brukaren';
$lang['Delete_post'] = 'Slett innlegget';

$lang['wrote'] = 'skreiv'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Sitat'; // comes before bbcode quote output.
$lang['Code'] = 'Kode'; // comes before bbcode code output.

$lang['Edited_time_total'] = 'Sist endra av %s %s, totalt endra %d gong'; // Last edited by me on 12 Oct 2001; edited 1 time in total
$lang['Edited_times_total'] = 'Sist endra av %s %s, totalt endra %d gonger'; // Last edited by me on 12 Oct 2001; edited 2 times in total

$lang['Lock_topic'] = 'Steng emnet';
$lang['Unlock_topic'] = 'Opne emnet';
$lang['Move_topic'] = 'Flytt emnet';
$lang['Delete_topic'] = 'Slett emnet';
$lang['Split_topic'] = 'Del emnet';

$lang['Stop_watching_topic'] = 'Avslutt abonnementet på dette emnet';
$lang['Start_watching_topic'] = 'Abonner på dette emnet';
$lang['No_longer_watching'] = 'Du abonnerer ikkje på emnet lenger';
$lang['You_are_watching'] = 'Du abonnerer no på emnet';

$lang['Total_votes'] = 'Tal røyster';


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Innlegg';
$lang['Topic_review'] = 'Førehandsvisning';

$lang['No_post_mode'] = 'Handlings modus er ikkje spesifisert'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = 'Start eit nytt emne';
$lang['Post_a_reply'] = 'Svar på innlegg';
$lang['Post_topic_as'] = 'Skriv emnet som';
$lang['Edit_Post'] = 'Endre innlegget';
$lang['Options'] = 'Innstillingar';

$lang['Post_Announcement'] = 'Kunngjering';
$lang['Post_Sticky'] = 'Førerett';
$lang['Post_Normal'] = 'Normal';

$lang['Confirm_delete'] = 'Er du sikker på at du vil slette innlegget?';
$lang['Confirm_delete_poll'] = 'Er du sikker på at du vil slette røystinga?';

$lang['Flood_Error'] = 'Du må vente min. 30 sekund før du kan skrive eit nytt innlegg';
$lang['Empty_subject'] = 'Du må spesifisere ein tittel når du startar eit nytt emne';
$lang['Empty_message'] = 'Du må skrive inn ei melding';
$lang['Forum_locked'] = 'Dette forumet er stengt, og du kan derfor ikkje skrive eller endre innlegg';
$lang['Topic_locked'] = 'Dette emnet er stengt, og du kan derfor ikkje skrive eller endre innlegg';
$lang['No_post_id'] = 'Du må velje eit innlegg å endre';
$lang['No_topic_id'] = 'Du må velje eit innlegg å svare på';
$lang['No_valid_mode'] = 'Du kan berre skrive, svare på eller sitere innlegg. Gå attende og prøv igjen';
$lang['No_such_post'] = 'Innlegget eksisterer ikkje. Gå attende og prøv igjen';
$lang['Edit_own_posts'] = 'Du kan berre endre dine eigne innlegg';
$lang['Delete_own_posts'] = 'Du kan berre slette dine eigne innlegg';
$lang['Cannot_delete_replied'] = 'Du kan ikkje slette innlegg det har blitt svart på';
$lang['Cannot_delete_poll'] = 'Du kan ikkje slette ei aktiv røysting';
$lang['Empty_poll_title'] = 'Du må skrive inn ein tittel på røystinga di';
$lang['To_few_poll_options'] = 'Du må skrive inn minst to svaralternativ';
$lang['To_many_poll_options'] = 'Du har skrive inn for mange svaralternativ';
$lang['Post_has_no_poll'] = 'Dette innlegget har inga røysting';
$lang['Already_voted'] = 'Du har allereie røysta i denne røystinga';
$lang['No_vote_option'] = 'Du må oppgje kva alternativ du ynskjer å røyste på';

$lang['Add_poll'] = 'Legg til røysting';
$lang['Add_poll_explain'] = 'Lat desse felta stå tomme viss du ikkje ynskjer å ha ei røysting i innlegget ditt';
$lang['Poll_question'] = 'Spørsmål';
$lang['Poll_option'] = 'Svaralternativ';
$lang['Add_option'] = 'Legg til svaralternativ';
$lang['Update'] = 'Oppdater';
$lang['Delete'] = 'Slett';
$lang['Poll_for'] = 'Røystinga skal vare i';
$lang['Days'] = 'dagar'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[ Skriv 0 eller lat feltet vere tomt for ei røysting utan sluttdato ]';
$lang['Delete_poll'] = 'Slett røysting';

$lang['Disable_HTML_post'] = 'Slå av HTML';
$lang['Disable_BBCode_post'] = 'Slå av BBKode';
$lang['Disable_Smilies_post'] = 'Slå av smilefjes';

$lang['HTML_is_ON'] = 'HTML er <b>på</b>';
$lang['HTML_is_OFF'] = 'HTML er <b>av</b>';
$lang['BBCode_is_ON'] = '%sBBKode%s er <b>på</b>'; // %s are replaced with URL pointing to FAQ
$lang['BBCode_is_OFF'] = '%sBBKode%s er <b>av</b>';
$lang['Smilies_are_ON'] = 'Smilefjes er <b>på</b>';
$lang['Smilies_are_OFF'] = 'Smilefjes er <b>av</b>';

$lang['Attach_signature'] = 'Bruk signatur';
$lang['Notify'] = 'Gje meg beskjed over e-post når nokon svarar på dette innlegget';
$lang['Delete_post'] = 'Slett innlegget';

$lang['Stored'] = 'Innlegget ditt er lagt til!';
$lang['Deleted'] = 'Innlegget er sletta!';
$lang['Poll_delete'] = 'Røystinga di er sletta!';
$lang['Vote_cast'] = 'Røysta di er registrert!';

$lang['Topic_reply_notification'] = 'Gje meg beskjed over e-post når nokon svarar på dette innlegget';

$lang['bbcode_b_help'] = 'Feit tekst: [b]tekst[/b] (Alt+B)';
$lang['bbcode_i_help'] = 'Kursiv tekst: [i]tekst[/i] (Alt+I)';
$lang['bbcode_u_help'] = 'Understreka tekst: [u]tekst[/u] (Alt+U)';
$lang['bbcode_q_help'] = 'Sitat: [quote]sitat[/quote] (Alt+Q)';
$lang['bbcode_c_help'] = 'Kode: [code]kode[/code] (Alt+C)';
$lang['bbcode_l_help'] = 'Uordna liste: [list]liste[/list] (Alt+L)';
$lang['bbcode_o_help'] = 'Ordna liste: [list=]liste[/list] (Alt+O)';
$lang['bbcode_p_help'] = 'Bilete: [img]http://lenkje til bilete[/img] (Alt+P)';
$lang['bbcode_w_help'] = 'Lenkje: [url]http://lenkje[/url] eller [url=http://lenkje]lenkjetekst[/url] (Alt+w)';
$lang['bbcode_a_help'] = 'Steng opne BBKode-taggar';
$lang['bbcode_s_help'] = 'Tekstfarge: [color=red]tekst[/color] Tips: Du kan og bruke color=#FF0000';
$lang['bbcode_f_help'] = 'Tekststorleik: [size=x-small]liten tekst[/size]';

$lang['Emoticons'] = 'Smilefjes';
$lang['More_emoticons'] = 'Fleire smilefjes';

$lang['Font_color'] = 'Skriftfarge';
$lang['color_default'] = 'Standard';
$lang['color_dark_red'] = 'Mørk raud';
$lang['color_red'] = 'Raud';
$lang['color_orange'] = 'Oransje';
$lang['color_brown'] = 'Brun';
$lang['color_yellow'] = 'Gul';
$lang['color_green'] = 'Grøn';
$lang['color_olive'] = 'Oliven';
$lang['color_cyan'] = 'Cyan';
$lang['color_blue'] = 'Blå';
$lang['color_dark_blue'] = 'Mørk blå';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Fiolett';
$lang['color_white'] = 'Kvit';
$lang['color_black'] = 'Svart';

$lang['Font_size'] = 'Skriftstørelse';
$lang['font_tiny'] = 'Veldig liten';
$lang['font_small'] = 'Liten';
$lang['font_normal'] = 'Normal';
$lang['font_large'] = 'Stor';
$lang['font_huge'] = 'Veldig stor';

$lang['Close_Tags'] = 'Steng taggar';
$lang['Styles_tip'] = 'Merka tekst kan enkelt formaterast';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Private meldingar';

$lang['Login_check_pm'] = 'Private meldingar';
$lang['New_pms'] = 'Innboks <b>(%d nye)</b>';
$lang['New_pm'] = 'Innboks <b>(%d ny)</b>';
$lang['No_new_pm'] = 'Innboks <b>(ingen nye)</b>';
$lang['Unread_pms'] = 'Du har <b>%d</b> ulese meldingar';
$lang['Unread_pm'] = 'Du har <b>%d</b> ulese melding';
$lang['No_unread_pm'] = 'Du har ingen ulese meldingar';
$lang['You_new_pm'] = 'Du har fått ei ny privat melding. Sjekk innboksen din!';
$lang['You_new_pms'] = 'Du har fått fleire nye private meldingar. Sjekk innboksen din!';
$lang['You_no_new_pm'] = 'Du har ingen nye private meldingar';

$lang['Unread_message'] = 'Ulese melding';
$lang['Read_message'] = 'Lese melding';

$lang['Read_pm'] = 'Les melding';
$lang['Post_new_pm'] = 'Skriv ei ny melding';
$lang['Post_reply_pm'] = 'Svar på melding';
$lang['Post_quote_pm'] = 'Siter melding';
$lang['Edit_pm'] = 'Endre melding';

$lang['Inbox'] = 'Innboks';
$lang['Outbox'] = 'Utboks';
$lang['Savebox'] = 'Lagra meldingar';
$lang['Sentbox'] = 'Sendte meldingar';
$lang['Flag'] = 'Flagg';
$lang['Subject'] = 'Emne';
$lang['From'] = 'Frå';
$lang['To'] = 'Til';
$lang['Date'] = 'Dato';
$lang['Mark'] = 'Merk';
$lang['Sent'] = 'Sendt';
$lang['Saved'] = 'Lagra';
$lang['Delete_marked'] = 'Slett merka meldingar';
$lang['Delete_all'] = 'Slett alle';
$lang['Save_marked'] = 'Lagre merka meldingar';
$lang['Save_message'] = 'Lagre melding';
$lang['Delete_message'] = 'Slett melding';

$lang['Display_messages'] = 'Vis meldingar frå'; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Alle meldingar';

$lang['No_messages_folder'] = 'Det er ingen meldingar i denne mappa';

$lang['PM_disabled'] = 'Funskjonalitet for private meldingar er ikkje aktivert i dette forumet';
$lang['Cannot_send_privmsg'] = 'Administrator har nekta deg å sende private meldingar';
$lang['No_to_user'] = 'Du må spesifisere eit brukarnamn å sende meldinga til';
$lang['No_such_user'] = 'Brukaren eksisterer ikkje';

$lang['Disable_HTML_pm'] = 'Slå av HTML';
$lang['Disable_BBCode_pm'] = 'Slå av BBKode';
$lang['Disable_Smilies_pm'] = 'Slå av smilefjes';

$lang['Message_sent'] = 'Meldinga er sendt';

$lang['Click_return_inbox'] = '%sAttende til innboksen%s';
$lang['Click_return_index'] = '%sAttende til hovedsida%s';

$lang['Send_a_new_message'] = 'Send ei privat melding';
$lang['Send_a_reply'] = 'Svar på privat melding';
$lang['Edit_message'] = 'Endre privat melding';

$lang['Notification_subject'] = 'Du har motteke ei ny privat melding';

$lang['Find_username'] = 'Finn eit brukarnamn';
$lang['Find'] = 'Søk';
$lang['No_match'] = 'Ingen treff';

$lang['No_post_id'] = 'Ingen meldings-ID er oppgjeve';
$lang['No_such_folder'] = 'Mappa eksisterer ikkje';
$lang['No_folder'] = 'Inga mappe spesifisert';

$lang['Mark_all'] = 'Merk alle';
$lang['Unmark_all'] = 'Fjern alle';

$lang['Confirm_delete_pm'] = 'Er du sikker på at du vil slette denne meldinga?';
$lang['Confirm_delete_pms'] = 'Er du sikker på at du vil slette desse meldingane?';

$lang['Inbox_size'] = 'Du har brukt opp %d%% av innboksen';
$lang['Sentbox_size'] = 'Du har brukt opp %d%% av utboksen';
$lang['Savebox_size'] = 'Du har brukt opp %d%% av lagringsboksen';

$lang['Click_view_privmsg'] = '%sGå til innboksen%s';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Profil: %s'; // %s is username 
$lang['About_user'] = 'Informasjon om %s'; // %s is username 

$lang['Preferences'] = 'Alternativ';
$lang['Items_required'] = 'Felt merka med stjerne (*) er obligatoriske';
$lang['Registration_info'] = 'Registreringsinformasjon';
$lang['Profile_info'] = 'Profilinformasjon';
$lang['Profile_info_warn'] = 'Denne informasjonen vil vere synleg for alle';
$lang['Avatar_panel'] = 'Kontrollpanel for avatarer';
$lang['Avatar_gallery'] = 'Avatargalleri';

$lang['Website'] = 'Nettstad';
$lang['Location'] = 'Bustad';
$lang['Contact'] = 'Kontakt';
$lang['Email_address'] = 'E-postadresse';
$lang['Email'] = 'E-post';
$lang['Send_private_message'] = 'Send ei privat melding';
$lang['Hidden_email'] = '[ Skjult ]';
$lang['Search_user_posts'] = 'Søk etter innlegg skrive av denne brukaren';
$lang['Interests'] = 'Interesser';
$lang['Occupation'] = 'Yrke';
$lang['Poster_rank'] = 'Rang';

$lang['Total_posts'] = 'Tal innlegg';
$lang['User_post_pct_stats'] = '%.2f %% av alle innlegg';
$lang['User_post_day_stats'] = '%.2f innlegg pr. dag';
$lang['Search_user_posts'] = 'Finn alle innlegg skrive av %s';

$lang['No_user_id_specified'] = 'Brukar-ID er ikkje oppgjeve';
$lang['Wrong_Profile'] = 'Du kan berre endre din eigen profil!';

$lang['Only_one_avatar'] = 'Berre ein type avatar kan bli spesifisert';
$lang['File_no_data'] = 'Avatarfila inneheld ikkje data';
$lang['No_connection_URL'] = 'Kan ikkje kople til adressa';
$lang['Incomplete_URL'] = 'Adressa til avataren er ikkje gyldig';
$lang['Wrong_remote_avatar_format'] = 'Adressa til avataren er ikkje gyldig';
$lang['No_send_account_inactive'] = 'Passord kan ikkje sendast fordi brukarkontoen din er deaktivert, kontakt adminsitratoren for meir informasjon.';

$lang['Always_smile'] = 'Tillat smilefjes';
$lang['Always_html'] = 'Tillat HTML';
$lang['Always_bbcode'] = 'Tillat BBKode';
$lang['Always_add_sig'] = 'Legg alltid til signaturen min';
$lang['Always_notify'] = 'Varsle ved alle svar';
$lang['Always_notify_explain'] = 'Sender ein e-post kvar gong nokon svarer i et emne du deltek i. Dette kan du endre for kvart enkelt emne.';

$lang['Board_style'] = 'Stil';
$lang['Board_lang'] = 'Språk';
$lang['No_themes'] = 'Ingen stilar er tilgjengelige';
$lang['Timezone'] = 'Tidssone';
$lang['Date_format'] = 'Datoformat';
$lang['Date_format_explain'] = 'Sjå i <a href="http://www.php.net/date">PHP-manualen</a> for meir informasjon om korleis du kan angje datoformat.';
$lang['Signature'] = 'Signatur';
$lang['Signature_explain'] = 'Tekst som blir lagt til i slutten av alle innlegg og personlige meldingar du skriv. Maks %d teikn.';
$lang['Public_view_email'] = 'Vis alltid e-postadressa mi';

$lang['Current_password'] = 'Noverande passord';
$lang['New_password'] = 'Nytt passord';
$lang['Confirm_password'] = 'Bekreft nytt passord';
$lang['Confirm_password_explain'] = 'Du må bekrefte med ditt noverande passord for å skifte passord eller e-postadresse.';
$lang['password_if_changed'] = 'Du skal berre skrive inn eit nytt passord om du ynskjer å endre det noverande.';
$lang['password_confirm_if_changed'] = 'Du skal berre bekrefte nytt passord om du ynskjer å endre det.';

$lang['Avatar'] = 'Avatar';
$lang['Avatar_explain'] = 'Ein avatar er eit bilete som blir vist i innlegga dine i tillegg til detaljane dine. Det er berre mogleg å vise eit bilete, og det kan ikkje vere større en %d piksler breitt og %d piksler høgt. Maksstorleik er %d kb.';
$lang['Upload_Avatar_file'] = 'Last opp ein avatar frå di maskin';
$lang['Upload_Avatar_URL'] = 'Hent ein avatar frå ei nettadresse';
$lang['Upload_Avatar_URL_explain'] = 'Skriv inn adressa til avateren. Den vil bli kopiert hit til forumet.';
$lang['Pick_local_Avatar'] = 'Vel ein avatar frå galleriet';
$lang['Link_remote_Avatar'] = 'Lenkje til ein avatar på ein annan nettstad';
$lang['Link_remote_Avatar_explain'] = 'Skriv inn adressa til avataren';
$lang['Avatar_URL'] = 'Adressa til avataren';
$lang['Select_from_gallery'] = 'Vel avatar fra galleriet';
$lang['View_avatar_gallery'] = 'Vis galleriet';

$lang['Select_avatar'] = 'Vel avatar';
$lang['Return_profile'] = 'Avbryt - Attende til profilen';
$lang['Select_category'] = 'Vel kategori';

$lang['Delete_Image'] = 'Slett bilete';
$lang['Current_Image'] = 'Noverande bilete';

$lang['Notify_on_privmsg'] = 'Gje meg beskjed over e-post om nye private meldingar';
$lang['Popup_on_privmsg'] = 'Sprettoppvarsling ved nye private meldingar';
$lang['Popup_on_privmsg_explain'] = 'Nokre stilar kan opne eit sprettoppvindauge (popup) når du mottek nye private meldingar.';
$lang['Hide_user'] = 'Skjul onlinestatus';

$lang['Profile_updated'] = 'Profilen er oppdatert!';
$lang['Profile_updated_inactive'] = 'Profilen er oppdatert, men sidan du har endra eit eller fleire viktige element, er brukarkontoen din midlertidig deaktivert. Det er sendt ein e-post til deg med naudsam informasjon for korleis reaktivere brukarkontoen. Viss administrator må reaktivere brukarkontoen din, vil dette skje snarast mogleg.';

$lang['Password_mismatch'] = 'Passorda samsvarar ikkje';
$lang['Current_password_mismatch'] = 'Det noverande passordet ditt stemmer ikkje med det som er lagra i databasen';
$lang['Password_long'] = 'Passordet kan ikkje vere lengre enn 32 teikn';
$lang['Too_many_registers'] = 'Du har forsøkt å registrere deg for mange gonger. Prøv igjen seinare.';
$lang['Username_taken'] = 'Brukarnamnet er allereie i bruk';
$lang['Username_invalid'] = 'Brukarnamnet inneheld eit ugyldig tegn';
$lang['Username_disallowed'] = 'Brukarnamnet er ikkje tillete';
$lang['Email_taken'] = 'E-postadressa er allereie registrert av ein annan brukar';
$lang['Email_banned'] = 'Denne e-postadressa er utestengd frå dette forumet';
$lang['Email_invalid'] = 'E-postadressa er ikkje gyldig';
$lang['Signature_too_long'] = 'Signaturen din er for lang';
$lang['Fields_empty'] = 'Du må fylle ut alle dei obligatoriske felta';
$lang['Avatar_filetype'] = 'Avataren må vere ei jpg-, gif- eller png-fil';
$lang['Avatar_filesize'] = 'Avataren må vere mindre enn %d kb';
$lang['Avatar_imagesize'] = 'Avataren kan maks vere %d piksler brei og %d piksler høg';

$lang['Welcome_subject'] = 'Velkomen til %s - forumet'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Ny brukarkonto';
$lang['Account_activated_subject'] = 'Kontoen er aktivert';

$lang['Account_added'] = 'Takk for at du registrerte deg, kontoen din er oppretta. Du kan logge deg på med brukarnamnet og passordet ditt.';
$lang['Account_inactive'] = 'Kontoen din er oppretta. Du må aktivere kontoen før du kan logge deg inn. Aktiveringsnøkkelen er sendt til e-postadressa di.';
$lang['Account_inactive_admin'] = 'Kontoen din er oppretta, men må godkjennast av ein administrator. Naudsam informasjon blir sendt til e-postadressa di når kontoen er aktivert.';
$lang['Account_active'] = 'Kontoen din er aktivert. Takk for at du registrerte deg';
$lang['Account_active_admin'] = 'Kontoen er aktivert';
$lang['Reactivate'] = 'Reaktiver kontoen din!';
$lang['Already_activated'] = 'Du har allereie aktivert kontoen din';
$lang['COPPA'] = 'Kontoen din er oppretta, men må godkjennast. Du har moteke ein e-post med naudsam informasjon.';

$lang['Registration'] = 'Vilkår du aksepterer ved registrering';
$lang['Reg_agreement'] = '<p>Administrator(ane) og moderator(ane) i forumet vil forsøke å fjerne eller redigere alle støytande innlegg så fort som mulig, men det er umogeleg å overvake alle emner og innlegg til einkvar tid. Du må akseptere at alle innlegg i forumet representerer den enkelte brukar sine syn og haldninger, og du kan ikkje stille administrator(ane), moderator(ane), og/eller den som er ansvarleg for nettstaden til ansvar for innhaldet i innlegga, med unnatak av deira eigne.</p><p>Du aksepterer at du ikkje har høve til å skrive støytende, uanstendige, vulgære, injurierende, hatske, truande, pornografiske eller andre typar innlegg som kan vere eller er i strid med gjeldande lovverk. Om du skriv innlegg av denne typen, vil du bli permanent utestengt frå forumet med ein gong, og internettleverandøren din vil bli varsla. IP-adressene innlegga blir skrive frå blir registrert og vil bli nytta til å oppretthalde desse vilkåra. Du aksepterer at administrator(ane), moderator(ane), og/eller den som er ansvarleg for nettstaden har rett til å fjerne, redigere, flytte eller stenge eit kvart emne og innlegg når dei ser det som naudsamt. Som brukar godtar du at all informasjon du oppgjev blir lagra i ein database. Denne informasjonen vil ikkje bli utlevert til tredjepart utan di godkjenning, men administrator(ane), moderator(ane), og/eller den som er ansvarleg for nettstaden, kan ikkje stillast ansvarleg for hacking o.l. som kan medføre tap av eller innsyn i databasen.</p><p>Dette forumet brukar informasjonskapsler (cookies) til å lagre informasjon lokalt på di datamaskin. Desse kapslane inneheld ikkje den informasjonen du oppgjev, men blir brukt for å tilby ei best mogleg brukaroppleving på forumet. E-postadressa di blir berre brukt i samband med registeringsprosessen, og for å sende nytt passord om du ynskjer/ber om det.</p><p>Du aksepterer desse vilkåra ved å klikke på registeringslenkja under.</p>';

$lang['Agree_under_13'] = 'Eg aksepterer vilkåra og er <b>under 13 år</b>';
$lang['Agree_over_13'] = 'Eg aksepterer vilkåra og er <b>13 år eller eldre</b>';
$lang['Agree_not'] = 'Eg aksepterer <b>ikkje</b> vilkåra';

$lang['Wrong_activation'] = 'Aktiveringsnøkkelen samsvarar ikkje med den i databasen';
$lang['Send_password'] = 'Send meg eit nytt passord';
$lang['Password_updated'] = 'Eit nytt passord er generert og sendt til e-postadressa di';
$lang['No_email_match'] = 'E-postadressa samsvarar ikkje med brukarnamnet';
$lang['New_password_activation'] = 'Aktiver nytt passord';
$lang['Password_activated'] = 'Brukarkontoen din er reaktivert, logg på med passordet du fekk tilsendt over e-post';

$lang['Send_email_msg'] = 'Send ein e-post';
$lang['No_user_specified'] = 'Du har ikkje spesifisert eit brukarnamn';
$lang['User_prevent_email'] = 'Denne brukaren ynskjer ikkje å motta e-post. Prøv å sende ei privat melding';
$lang['User_not_exist'] = 'Brukaren eksisterer ikkje';
$lang['CC_email'] = 'Send ein kopi av denne e-posten til deg sjølv';
$lang['Email_message_desc'] = 'E-posten vil bli sendt som rein tekst, så du kan ikkje nytte HTML eller BBKode. E-postadressa di blir sett som returadresse';
$lang['Flood_email_limit'] = 'Du kan ikkje sende ein e-post til med ein gong, prøv igjen seinare';
$lang['Recipient'] = 'Mottakar';
$lang['Email_sent'] = 'E-posten er sendt';
$lang['Send_email'] = 'Send e-post';
$lang['Empty_subject_email'] = 'Du må fylle inn eit emne for å sende e-posten';
$lang['Empty_message_email'] = 'Du må skrive ei melding for å sende e-posten';


//
// Visual confirmation system strings
//
$lang['Confirm_code_wrong'] = 'Godkjenningskoden er feil!';
$lang['Too_many_registers'] = 'Du har gjort for mange registreringsforsøk. Prøv igjen seinare.';
$lang['Confirm_code_impaired'] = 'Viss du ikkje kan lese koden, kontakt %sadministrator%s for hjelp.';
$lang['Confirm_code'] = 'Godkjenningskode';
$lang['Confirm_code_explain'] = 'Fyll inn koden nøyaktig som den står. Koden er sensitiv for store og små bokstavar. Gjennom talet 0 (null) går det ein diagonal strek.';


//
// Memberslist
//
$lang['Select_sort_method'] = 'Sorter etter';
$lang['Sort'] = 'Vis';
$lang['Sort_Top_Ten'] = 'Dei ti mest aktive';
$lang['Sort_Joined'] = 'Registrert';
$lang['Sort_Username'] = 'Brukarnamn';
$lang['Sort_Location'] = 'Bustad';
$lang['Sort_Posts'] = 'Innlegg';
$lang['Sort_Email'] = 'E-post';
$lang['Sort_Website'] = 'Nettstad';
$lang['Sort_Ascending'] = 'Stigande';
$lang['Sort_Descending'] = 'Synkande';
$lang['Order'] = 'Rekkjefølgje';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Grupper - kontrollpanel';
$lang['Group_member_details'] = 'Dine gruppemedlemsskap';
$lang['Group_member_join'] = 'Bli medlem i ei gruppe';

$lang['Group_Information'] = 'Gruppeinformasjon';
$lang['Group_name'] = 'Gruppenamn';
$lang['Group_description'] = 'Gruppeskildring';
$lang['Group_membership'] = 'Din status';
$lang['Group_Members'] = 'Gruppemedlemar';
$lang['Group_Moderator'] = 'Gruppemoderator';
$lang['Pending_members'] = 'Brukarar som har søkt';

$lang['Group_type'] = 'Gruppetype';
$lang['Group_open'] = 'Open gruppe';
$lang['Group_closed'] = 'Lukka gruppe';
$lang['Group_hidden'] = 'Skjult gruppe';

$lang['Current_memberships'] = 'Du er medlem i';
$lang['Non_member_groups'] = 'Du er ikkje medlem i';
$lang['Memberships_pending'] = 'Du har søkt om medlemskap i';

$lang['No_groups_exist'] = 'Forumet har ingen grupper';
$lang['Group_not_exist'] = 'Gruppa eksisterer ikkje';

$lang['Join_group'] = 'Bli medlem i gruppa';
$lang['No_group_members'] = 'Gruppa har ingen medlemer';
$lang['Group_hidden_members'] = 'Gruppa er skjult. Du kan ikkje sjå medlemane';
$lang['No_pending_group_members'] = 'Gruppa har ingen ubehandla søknader om medlemsskap';
$lang['Group_joined'] = 'Du er lagt til i gruppa.<br />Du vil bli varsla over e-post når medlemsskapet er godkjent av gruppemoderatoren';
$lang['Group_request'] = 'Søknad om å bli medlem i denne gruppa er sendt';
$lang['Group_approved'] = 'Søknaden er godkjent';
$lang['Group_added'] = 'Du er lagt til i gruppa';
$lang['Already_member_group'] = 'Du er allereie medlem av denne gruppa';
$lang['User_is_member_group'] = 'Brukaren er allereie medlem av gruppa';
$lang['Group_type_updated'] = 'Gruppetypen er oppdatert';

$lang['Could_not_add_user'] = 'Brukaren du valde eksisterer ikkje';
$lang['Could_not_anon_user'] = 'Ein gjest kan ikkje bli gruppemedlem';

$lang['Confirm_unsub'] = 'Er du sikker på at du vil bli fjerna frå denne gruppa?';
$lang['Confirm_unsub_pending'] = 'Søknaden om medlemskap i denne gruppa er ikkje behandla endå, er du sikker på at du vil bli fjerna?';

$lang['Unsub_success'] = 'Du er fjerna frå gruppa';

$lang['Approve_selected'] = 'Godkjenn merka';
$lang['Deny_selected'] = 'Avvis merka';
$lang['Not_logged_in'] = 'Du må vere innlogga for å kunne bli medlem';
$lang['Remove_selected'] = 'Slett merka';
$lang['Add_member'] = 'Legg til som medlem';
$lang['Not_group_moderator'] = 'Du er ikkje gruppemoderator, og har ikkje løyve til å utføre denne operasjonen.';

$lang['Login_to_join'] = 'Logg inn for å søke om medlemsskap eller administrere grupper';
$lang['This_open_group'] = 'Dette er ei open gruppe: klikk for å søke om medlemsskap';
$lang['This_closed_group'] = 'Dette er ei lukka gruppe: du vil ikkje kunne bli medlem';
$lang['This_hidden_group'] = 'Dette er ei skjult gruppe: automatisk oppretting av medlemskap er ikkje tillete';
$lang['Member_this_group'] = 'Du er medlem av denne gruppa';
$lang['Pending_this_group'] = 'Din søknad om medlemskap er ikkje behandla endå';
$lang['Are_group_moderator'] = 'Du er gruppemoderator i denne gruppa';
$lang['None'] = 'Ingen';

$lang['Subscribe'] = 'Søk om medlemskap';
$lang['Unsubscribe'] = 'Avbryt medlemsskap';
$lang['View_Information'] = 'Vis gruppeinformasjon';


//
// Search
//
$lang['Search_query'] = 'Søkekriteriar';
$lang['Search_options'] = 'Innstillingar';

$lang['Search_keywords'] = 'Søk etter stikkord';
$lang['Search_keywords_explain'] = 'Du kan nytte <u>AND</u> for å spesifisere ord som skal gje treff, <u>OR</u> for å spesifisere ord som kan gje treff og <u>NOT</u> for å spesifisere ord som ikkje skal gje treff. Bruk * som joker for å søke etter delar av ord.';
$lang['Search_author'] = 'Søk etter medlem';
$lang['Search_author_explain'] = 'Bruk * som joker for å søke etter delar av ord.';

$lang['Search_for_any'] = 'Søk etter eit enkelt ord eller alle orda.';
$lang['Search_for_all'] = 'Søk etter den nøyaktige setninga';
$lang['Search_title_msg'] = 'Søk i tittel og tekst';
$lang['Search_msg_only'] = 'Søk i tekst';

$lang['Return_first'] = 'Vis dei'; // followed by xxx characters in a select box
$lang['characters_posts'] = 'fyrste teikna i innlegget';

$lang['Search_previous'] = 'Tidsbegrens søket'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = 'Sorter etter';
$lang['Sort_Time'] = 'Dato';
$lang['Sort_Post_Subject'] = 'Innleggstittel';
$lang['Sort_Topic_Title'] = 'Emnetittel';
$lang['Sort_Author'] = 'Forfattar';
$lang['Sort_Forum'] = 'Forum';

$lang['Display_results'] = 'Vis resultat som';
$lang['All_available'] = 'Alle';
$lang['No_searchable_forums'] = 'Du har ikkje lov til å søke i forumet';

$lang['No_search_match'] = 'Fann ingen emner eller innlegg passa med søkekriteriane';
$lang['Found_search_match'] = '%d treff';
$lang['Found_search_matches'] = '%d treff';

$lang['Close_window'] = 'Lat att vindauge';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = 'Berre %s kan skrive innlegg som kunngjeringar';
$lang['Sorry_auth_sticky'] = 'Berre %s kan skrive innlegg med førerett';
$lang['Sorry_auth_read'] = 'Berre %s kan lese innlegg';
$lang['Sorry_auth_post'] = 'Berre %s kan lage innlegg';
$lang['Sorry_auth_reply'] = 'Berre %s kan svare på innlegg';
$lang['Sorry_auth_edit'] = 'Berre %s kan endre svar på innlegg';
$lang['Sorry_auth_delete'] = 'Berre %s kan slette innlegg';
$lang['Sorry_auth_vote'] = 'Berre %s kan røyste ved røystingar';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>anonyme brukarar</b>';
$lang['Auth_Registered_Users'] = '<b>registrerte brukarar</b>';
$lang['Auth_Users_granted_access'] = '<b>brukarar med særskilde løyver</b>';
$lang['Auth_Moderators'] = '<b>moderatorar</b>';
$lang['Auth_Administrators'] = '<b>administratorar</b>';

$lang['Not_Moderator'] = 'Du er ikkje moderator i dette forumet';
$lang['Not_Authorised'] = 'Ikkje autorisert';

$lang['You_been_banned'] = 'Du er blitt utestengt frå forumet.<br /><br />Kontakt administratoren av forumet for meir informasjon.';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Det er ingen registrerte brukarar og ';
$lang['Reg_users_online'] = 'Det er %d registrerte brukarar og ';
$lang['Reg_user_online'] = 'Det er %d registrert brukar og ';
$lang['Hidden_users_zero_online'] = 'ingen skjulte brukarar i forumet';
$lang['Hidden_users_online'] = '%d skjulte brukarar i forumet';
$lang['Hidden_user_online'] = '%d skjult brukarar i forumet';
$lang['Guest_users_online'] = 'Det er %d gjester i forumet';
$lang['Guest_users_zero_online'] = 'Det er ingen gjester i forumet';
$lang['Guest_user_online'] = 'Det er %d gjest i forumet';
$lang['No_users_browsing'] = 'Det er ingen brukarar i forumet';

$lang['Online_explain'] = 'Informasjonen er basert på aktiviteten dei siste fem minutta.';

$lang['Forum_Location'] = 'Side';
$lang['Last_updated'] = 'Sist oppdatert';

$lang['Forum_index'] = 'Forum Hovedside';
$lang['Logging_on'] = 'Logger inn';
$lang['Posting_message'] = 'Skriv eit innlegg';
$lang['Searching_forums'] = 'Søker';
$lang['Viewing_profile'] = 'Profil';
$lang['Viewing_online'] = 'Kven er i foruma';
$lang['Viewing_member_list'] = 'Medlemslista';
$lang['Viewing_priv_msgs'] = 'Private meldingar';
$lang['Viewing_FAQ'] = 'Spørsmål og Svar';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Moderator - kontrollpanel';
$lang['Mod_CP_explain'] = 'Ved å bruke skjemaet under, kan du moderere emna i dette forumet. Du kan stenge, opne, flytte eller slette eit eller fleire emner samtidig.';

$lang['Select'] = 'Vel';
$lang['Delete'] = 'Slett';
$lang['Move'] = 'Flytt';
$lang['Lock'] = 'Steng';
$lang['Unlock'] = 'Opne';

$lang['Topics_Removed'] = 'Dei merka emna er fjerna';
$lang['Topics_Locked'] = 'Dei merka emna er stengde';
$lang['Topics_Moved'] = 'Dei merka emna er flytta';
$lang['Topics_Unlocked'] = 'Dei merka emna er opna';
$lang['No_Topics_Moved'] = 'Ingen emner er flytta';

$lang['Confirm_delete_topic'] = 'Er du sikker på at du vil slette emnet/emna?';
$lang['Confirm_lock_topic'] = 'Er du sikker på at du vil stenge emnet/emna?';
$lang['Confirm_unlock_topic'] = 'Er du sikker på at du vil opne emnet/emna?';
$lang['Confirm_move_topic'] = 'Er du sikker på at du vil flytte emnet/emna?';

$lang['Move_to_forum'] = 'Flytt til forum';
$lang['Leave_shadow_topic'] = 'Behald ein spegla kopi i det opprinnelege forumet.';

$lang['Split_Topic'] = 'Emnedeling - kontrollpanel';
$lang['Split_Topic_explain'] = 'Du kan dele eit emne ved å merke kvart innlegg manuelt eller ved å angje eit innlegg emnet skal delast ved.';
$lang['Split_title'] = 'Tittel på det nye emnet';
$lang['Split_forum'] = 'Flytt det nye emnet til';
$lang['Split_posts'] = 'Skil ut merka innlegg';
$lang['Split_after'] = 'Del ved merka innlegg';
$lang['Topic_split'] = 'Emnet er delt!';

$lang['Too_many_error'] = 'Du har merka fleire innlegg, du skal berre merke eit (1) innlegg å dele emnet ved!';
$lang['None_selected'] = 'Du har ikkje merka kva innlegg som skal skiljast ut, gå attende og merk minst eit.';
$lang['New_forum'] = 'Nytt forum';

$lang['This_posts_IP'] = 'IP-adressa innlegget er skrive frå';
$lang['Other_IP_this_user'] = 'Andre IP-adresser brukaren har nytta for å skrive innlegg';
$lang['Users_this_IP'] = 'Brukarar som har nytta denne IP-adressa for å skrive innlegg';
$lang['IP_info'] = 'IP informasjon';
$lang['Lookup_IP'] = 'Undersøk IP-adressa';


//
// Timezones ... for display on each page
//
$lang['All_times'] = 'Alle tider er %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12';
$lang['-11'] = 'GMT - 11';
$lang['-10'] = 'HST (Hawaii)';
$lang['-9'] = 'GMT - 9';
$lang['-8'] = 'PST (USA/Canada)';
$lang['-7'] = 'MST (USA/Canada)';
$lang['-6'] = 'CST (USA/Canada)';
$lang['-5'] = 'EST (USA/Canada)';
$lang['-4'] = 'GMT - 4';
$lang['-3.5'] = 'GMT - 3.5';
$lang['-3'] = 'GMT - 3';
$lang['-2'] = 'Mid-Atlantic';
$lang['-1'] = 'GMT - 1';
$lang['0'] = 'GMT';
$lang['1'] = 'CET (Central European Time)';
$lang['2'] = 'EET (Europe)';
$lang['3'] = 'GMT + 3';
$lang['3.5'] = 'GMT + 3.5';
$lang['4'] = 'GMT + 4';
$lang['4.5'] = 'GMT + 4.5';
$lang['5'] = 'GMT + 5';
$lang['5.5'] = 'GMT + 5.5';
$lang['6'] = 'GMT + 6';
$lang['6.5'] = 'GMT + 6.5';
$lang['7'] = 'GMT + 7';
$lang['8'] = 'WST (Australia)';
$lang['9'] = 'GMT + 9';
$lang['9.5'] = 'CST (Australia)';
$lang['10'] = 'EST (Australia)';
$lang['11'] = 'GMT + 11';
$lang['12'] = 'GMT + 12';
$lang['13'] = 'GMT + 13';

// Desse visast i ein tidssone-nedtrekksboks, bla. under registrering og i profil
$lang['tz']['-12'] = '(GMT -12:00) Eniwetok, Kwajalein';
$lang['tz']['-11'] = '(GMT -11:00) Midway Island, Samoa';
$lang['tz']['-10'] = '(GMT -10:00) Hawaii';
$lang['tz']['-9'] = '(GMT -9:00) Alaska';
$lang['tz']['-8'] = '(GMT -8:00) Pacific Time (US &amp; Canada), Tijuana';
$lang['tz']['-7'] = '(GMT -7:00) Mountain Time (US &amp; Canada), Arizona';
$lang['tz']['-6'] = '(GMT -6:00) Central Time (US &amp; Canada), Mexico City';
$lang['tz']['-5'] = '(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito';
$lang['tz']['-4'] = '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz';
$lang['tz']['-3.5'] = '(GMT -3:30) Newfoundland';
$lang['tz']['-3'] = '(GMT -3:00) Brassila, Buenos Aires, Georgetown, Falkland Is';
$lang['tz']['-2'] = '(GMT -2:00) Mid-Atlantic, Ascension Is., St. Helena';
$lang['tz']['-1'] = '(GMT -1:00) Azores, Cape Verde Islands';
$lang['tz']['0'] = '(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia';
$lang['tz']['1'] = '(GMT +1:00) Oslo, Amsterdam, Berlin, Brussels, Madrid, Paris, Rome';
$lang['tz']['2'] = '(GMT +2:00) Cairo, Helsinki, Kaliningrad, South Africa';
$lang['tz']['3'] = '(GMT +3:00) Baghdad, Riyadh, Moscow, Nairobi';
$lang['tz']['3.5'] = '(GMT +3:30) Tehran';
$lang['tz']['4'] = '(GMT +4:00) Abu Dhabi, Baku, Muscat, Tbilisi';
$lang['tz']['4.5'] = '(GMT +4:30) Kabul';
$lang['tz']['5'] = '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent';
$lang['tz']['5.5'] = '(GMT +5:30) Bombay, Calcutta, Madras, New Delhi';
$lang['tz']['6'] = '(GMT +6:00) Almaty, Colombo, Dhaka, Novosibirsk';
$lang['tz']['6.5'] = '(GMT +6:30) Rangoon';
$lang['tz']['7'] = '(GMT +7:00) Bangkok, Hanoi, Jakarta';
$lang['tz']['8'] = '(GMT +8:00) Beijing, Hong Kong, Perth, Singapore, Taipei';
$lang['tz']['9'] = '(GMT +9:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk';
$lang['tz']['9.5'] = '(GMT +9:30) Adelaide, Darwin';
$lang['tz']['10'] = '(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok';
$lang['tz']['11'] = '(GMT +11:00) Magadan, New Caledonia, Solomon Islands';
$lang['tz']['12'] = '(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island';

$lang['datetime']['Sunday'] = 'søndag';
$lang['datetime']['Monday'] = 'mandag';
$lang['datetime']['Tuesday'] = 'tirsdag';
$lang['datetime']['Wednesday'] = 'onsdag';
$lang['datetime']['Thursday'] = 'torsdag';
$lang['datetime']['Friday'] = 'fredag';
$lang['datetime']['Saturday'] = 'lørdag';

$lang['datetime']['Sun'] = 'søn';
$lang['datetime']['Mon'] = 'man';
$lang['datetime']['Tue'] = 'tir';
$lang['datetime']['Wed'] = 'ons';
$lang['datetime']['Thu'] = 'tor';
$lang['datetime']['Fri'] = 'fre';
$lang['datetime']['Sat'] = 'lør';

$lang['datetime']['January'] = 'januar';
$lang['datetime']['February'] = 'februar';
$lang['datetime']['March'] = 'mars';
$lang['datetime']['April'] = 'april';
$lang['datetime']['May'] = 'mai';
$lang['datetime']['June'] = 'juni';
$lang['datetime']['July'] = 'juli';
$lang['datetime']['August'] = 'august';
$lang['datetime']['September'] = 'september';
$lang['datetime']['October'] = 'oktober';
$lang['datetime']['November'] = 'november';
$lang['datetime']['December'] = 'desember';

$lang['datetime']['Jan'] = 'jan';
$lang['datetime']['Feb'] = 'feb';
$lang['datetime']['Mar'] = 'mar';
$lang['datetime']['Apr'] = 'apr';
$lang['datetime']['May'] = 'mai';
$lang['datetime']['Jun'] = 'jun';
$lang['datetime']['Jul'] = 'jul';
$lang['datetime']['Aug'] = 'aug';
$lang['datetime']['Sep'] = 'sep';
$lang['datetime']['Oct'] = 'okt';
$lang['datetime']['Nov'] = 'nov';
$lang['datetime']['Dec'] = 'des';


//
// Errors (not related to a specific failure on a page)
//
$lang['Information'] = 'Informasjon';
$lang['Critical_Information'] = 'Viktig informasjon!';

$lang['General_Error'] = 'Generell feil';
$lang['Critical_Error'] = 'Kritisk feil';
$lang['An_error_occured'] = 'Det har oppstått ein feil';
$lang['A_critical_error'] = 'Ein kritisk feil';


//
// That's all, Folks!
// -------------------------------------------------
?>