<?php
/***************************************************************************
 *                            lang_main.php [Nynorsk]
 *                              -------------------
 *     begin                : 22. feb 2004
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *              $Id: lang_main.php, v 1.0.2 30. apr 2004$
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
// Meir informasjon i LES MEG fila som er inkludert i språkpakka
//

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Generelt';
$lang['Users'] = 'Brukar';
$lang['Groups'] = 'Grupper';
$lang['Forums'] = 'Forum';
$lang['Styles'] = 'Stilar';

$lang['Configuration'] = 'Konfigurasjon';
$lang['Permissions'] = 'Rettar og løyver';
$lang['Manage'] = 'Administrer';
$lang['Disallow'] = 'Ulovlege namn';
$lang['Prune'] = 'Sletting';
$lang['Mass_Email'] = 'Masse e-post';
$lang['Ranks'] = 'Rangering';
$lang['Smilies'] = 'Smilefjes';
$lang['Ban_Management'] = 'Utestenging';
$lang['Word_Censor'] = 'Ordsensur';
$lang['Export'] = 'Eksporter';
$lang['Create_new'] = 'Opprett ny';
$lang['Add_new'] = 'Legg til';
$lang['Backup_DB'] = 'DB sikkerhetskopiering';
$lang['Restore_DB'] = 'DB gjenoppretting';


//
// Index
//
$lang['Admin'] = 'Administrasjon';
$lang['Not_admin'] = 'Du har ikkje løyve til å administrere dette forumet';
$lang['Welcome_phpBB'] = 'Velkomen til phpBB';
$lang['Admin_intro'] = 'Takk for at du valde phpBB. På denne sida finn du enkel statistikk over forumet ditt. Du kjem tilbake til denne sida ved å klikke på <u>Admin indeks</u> i venstre ramme. For å gå tilbake til hovedsida på forumet ditt, klikker du på phpBB logoen som og ligg i venstre ramme. Resten av lenkjene i venstre ramme tek deg til dei til forskjellige kontrollfunksjonane for forumet. Alle kontrollpanela har forklaringar for korleis dei skal brukast.';
$lang['Main_index'] = 'Hovedside';
$lang['Forum_stats'] = 'Statistikk';
$lang['Admin_Index'] = 'Admin indeks';
$lang['Preview_forum'] = 'Førehandvis forumet';

$lang['Click_return_admin_index'] = '%sAttende til admin indeks%s';

$lang['Statistic'] = 'Statistikk';
$lang['Value'] = 'Verdi';
$lang['Number_posts'] = 'Innlegg';
$lang['Posts_per_day'] = 'Innlegg per dag';
$lang['Number_topics'] = 'Emner';
$lang['Topics_per_day'] = 'Emner per dag';
$lang['Number_users'] = 'Brukarar';
$lang['Users_per_day'] = 'Brukarar per dag';
$lang['Board_started'] = 'Forum opretta';
$lang['Avatar_dir_size'] = 'Avatarkatalog storleik';
$lang['Database_size'] = 'Database storleik';
$lang['Gzip_compression'] ='Gzip-komprimering';
$lang['Not_available'] = 'Ikkje tilgjengeleg';

$lang['ON'] = 'På'; // This is for GZip compression
$lang['OFF'] = 'Av';


//
// DB Utils
//
$lang['Database_Utilities'] = 'Databaseverkty';

$lang['Restore'] = 'Gjenopprett';
$lang['Backup'] = 'Sikkerhetskopier';
$lang['Restore_explain'] = 'Her kan du gjenopprette alle phpBB tabellane frå ein lagra sikkerhetskopi. Om serveren støttar det, kan du laste opp ei gzip-komprimert fil som vil bli pakka ut automatisk. <b>ADVARSEL:</b> Dette vil overskrive alle eksisterande data! Gjenopprettinga kan ta lang tid, så ikkje forlat denne sida før gjenopprettinga er fullført.';
$lang['Backup_explain'] = 'Her kan du ta sikkerhetskopi av phpBB-relaterte data. Om du ynskjer å ta sikkerhetskopi av andre tabellar i same database, skriv du inn namna, separert med komma, i tilleggstabellar feltet. Om serveren din har støtte for det, kan du gzip-komprimere fila før du laster den ned.';

$lang['Backup_options'] = 'Alternativ';
$lang['Start_backup'] = 'Start sikkerhetskopiering';
$lang['Full_backup'] = 'Komplett sikkerhetskopi';
$lang['Structure_backup'] = 'Berre struktur';
$lang['Data_backup'] = 'Berre data';
$lang['Additional_tables'] = 'Tilleggstabellar';
$lang['Gzip_compress'] = 'Gzip-komprimer';
$lang['Select_file'] = 'Vel ei fil';
$lang['Start_Restore'] = 'Start gjenoppretting';

$lang['Restore_success'] = 'Databasen er gjenoppretta.<br /><br />Forumet skal no vere slik det var då sikkerhetskopien vart teken.';
$lang['Backup_download'] = 'Nedlastninga vil byrje snarast mogleg. Vent litt.';
$lang['Backups_not_supported'] = 'Sikkerhetskopiering av databaser er ikkje støtta av serveren din.';

$lang['Restore_Error_uploading'] = 'Feil under opplasting';
$lang['Restore_Error_filename'] = 'Det er eit problem med filnamnet. Prøv ei anna fil';
$lang['Restore_Error_decompress'] = 'Kan ikkje pakke ut gzip-fila. Prøv med ein tekstversjon.';
$lang['Restore_Error_no_file'] = 'Inga fil blei lasta opp';


//
// Auth pages
//
$lang['Select_a_User'] = 'Vel ein brukar';
$lang['Select_a_Group'] = 'Vel ein gruppe';
$lang['Select_a_Forum'] = 'Vel eit forum';
$lang['Auth_Control_User'] = 'Brukarrettar';
$lang['Auth_Control_Group'] = 'Grupperettar';
$lang['Auth_Control_Forum'] = 'Forumrettar';
$lang['Look_up_User'] = 'Vel brukar';
$lang['Look_up_Group'] = 'Vel gruppe';
$lang['Look_up_Forum'] = 'Vel forum';

$lang['Group_auth_explain'] = 'Her kan du endre løyver, rettar og moderatorstatus til kvar enkelt gruppe. Om du endrer løyva og rettane til ei gruppe kan det vere at nokre av meldemane av gruppa endå har løyve og rettar utover det vanlige. Du vil bli varsla viss dette er tilfelle.';
$lang['User_auth_explain'] = 'Her kan du endre løyver, rettar og moderatorstatus til kvar enkelt brukargruppe. Om du endrer løyva og rettane til ei gruppe kan det vere at nokre av meldemane av gruppa endå har løyver og rettar utover det vanlige. Du vil bli varsla viss dette er tilfelle.';
$lang['Forum_auth_explain'] = 'Her kan du endre løyver og rettar for kvart enkelt forum. Det er ein enkel og ein avansert måte å gjere dette på. Den avanserte metoden gjev større kontroll over forumoperasjonane. Endrer du løyvene og rettane til eit forum, vil dette påvirke kva brukarar som kan utføre ulike operasjoner i det.';

$lang['Simple_mode'] = 'Enkel';
$lang['Advanced_mode'] = 'Avansert';
$lang['Moderator_status'] = 'Moderatorstatus';

$lang['Allowed_Access'] = 'Tillat tilgjenge';
$lang['Disallowed_Access'] = 'Nekt tilgjenge';
$lang['Is_Moderator'] = 'er moderator';
$lang['Not_Moderator'] = 'er ikkje moderator';

$lang['Conflict_warning'] = 'Autorisasjonskonflikt';
$lang['Conflict_access_userauth'] = 'Denne brukaren har endå tilgjenge til dette forumet gjennom eit gruppemedlemsskap. Du vil kanskje endre på grupperettane eller slette denne brukargruppa for å sikre deg at ho/han ikkje har tilgjenge. Gruppa sine løyve og rettar (og foruma dei gjeld) er vist nedanfor.';
$lang['Conflict_mod_userauth'] = 'Denne brukaren har framleis moderatorløyve i dette forumet gjennom eit gruppemedlemsskap. Du vil kanskje endre på grupperettane eller slette denne brukargruppa for å sikre deg at ho/han ikkje har moderatorløyve. Gruppa sine løyve og rettar (og foruma dei gjeld) er vist nedanfor.';

$lang['Conflict_access_groupauth'] = 'Følgjande brukar/brukarar har framleis tilgjenge til dette forumet gjennom instillingane i brukarrettar. Du vil kanskje endre brukarrettane for å sikre deg at dei ikkje har tilgjenge? Brukaren/brukarane sine løyve og rettar (og foruma dei gjeld) er vist nedanfor.';
$lang['Conflict_mod_groupauth'] = 'Følgjande brukar/brukarar har framleis moderatorløyve i dette forumet gjennom instillingane i brukarrettar. Du vil kanskje endre grupperettane for å sikre deg at dei ikkje har moderatorløyve? Brukaren/brukarane sine løyve og rettar (og foruma dei gjeld) er vist nedanfor.';

$lang['Public'] = 'Offentleg';
$lang['Private'] = 'Private';
$lang['Registered'] = 'Registrerte';
$lang['Administrators'] = 'Administratorar';
$lang['Hidden'] = 'Skjult';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'ALLE';
$lang['Forum_REG'] = 'REG';
$lang['Forum_PRIVATE'] = 'PRIVAT';
$lang['Forum_MOD'] = 'MOD';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Vise';
$lang['Read'] = 'Lese';
$lang['Post'] = 'Skrive';
$lang['Reply'] = 'Svare';
$lang['Edit'] = 'Endre';
$lang['Delete'] = 'Slette';
$lang['Sticky'] = 'Førerett';
$lang['Announce'] = 'Kunngjering';
$lang['Vote'] = 'Røyste';
$lang['Pollcreate'] = 'Lage røysting';

$lang['Permissions'] = 'Rettar';
$lang['Simple_Permission'] = 'Enkle rettar';

$lang['User_Level'] = 'Brukarnivå';
$lang['Auth_User'] = 'Brukar';
$lang['Auth_Admin'] = 'Administrator';
$lang['Group_memberships'] = 'Medlem av gruppa(ene)';
$lang['Usergroup_members'] = 'Denne gruppa har følgjande medlemar';

$lang['Forum_auth_updated'] = 'Forumrettane er oppdatert';
$lang['User_auth_updated'] = 'Brukarrettane er oppdatert';
$lang['Group_auth_updated'] = 'Grupperettane er oppdatert';

$lang['Auth_updated'] = 'Rettane er oppdatert';
$lang['Click_return_userauth'] = '%sAttende til brukarrettar%s';
$lang['Click_return_groupauth'] = '%sAttende til grupperettar%s';
$lang['Click_return_forumauth'] = '%sAttende til forumrettar%s';


//
// Banning
//
$lang['Ban_control'] = 'Utestenging';
$lang['Ban_explain'] = 'Her kan du kontrollere utestenging av brukarar. Du kan oppnå dette ved å skrive inn eit domenenamn, ei IP-adresse eller ein IP-serie som passar med brukaren du vil stenge ute. Desse metodane hindrer brukaren frå å i det heile tatt å nå hovedsida til forumet ditt. For å hindre at brukaren registrerer seg med eit anna brukarnamn, kan du og utestenge ei e-postadresse. Hugs at utestengelse av ei e-postadresse aleine ikkje kan forhindre brukaren i å logge seg inn eller skrive innlegg i forumet ditt, du bør bruke ein av dei to fyrste metodene for å oppnå dette.';
$lang['Ban_explain_warn'] = 'Viss du skriv inn ein IP-serie, vil alle adressene mellom start og slutt bli lagt i utestengtlista. For mange adresser på denne lista kan føre til treig lasting av forumet. Forsøk på å minimere antal adresser som blir lagra i databasen ved å bruke joker (*) vil bli gjort. Viss du virkelig må skrive inn ei heil IP-rekke, prøv å lage den minst mulig. Det beste er allikevel å skrive inn spesifikke adresser.';

$lang['Select_username'] = 'Vel eit brukarnamn';
$lang['Select_ip'] = 'Vel ei IP-adresse';
$lang['Select_email'] = 'Vel ei e-postadresse';

$lang['Ban_username'] = 'Utesteng ein eller fleire brukarar';
$lang['Ban_username_explain'] = 'Du kan utestenge ein eller fleire brukarar vha. riktig mus- og tastaturkombinasjon.';

$lang['Ban_IP'] = 'Utesteng ei eller fleire IP-adresser og/eller domenenamn';
$lang['IP_hostname'] = 'IP-adresse(r) eller domenenamn';
$lang['Ban_IP_explain'] = 'Du kan angje fleire IP-adresser eller domenenamn ved å skilje dei med komma. Du kan og angje ein heil IP-serie ved bruke bindestrek mellom første og siste IP-adresse. Du kan nytte * som joker.';

$lang['Ban_email'] = 'Utesteng ei eller fleire e-postadresser';
$lang['Ban_email_explain'] = 'Du kan angje fleire e-postadresser ved å skilje dei med komma. Du kan nytte * som joker, f.eks. «*@online.no»';

$lang['Unban_username'] = 'Avslutt utestenginga for eit eller fleire brukarnamn';
$lang['Unban_username_explain'] = 'Du kan avslutte utestenginga for fleire brukarnamn samstundes ved å bruke riktig kombinasjon av musepeikar og tastatur for ditt operativsystem og nettlesar';

$lang['Unban_IP'] = 'Avslutt utestenginga for ei eller fleire IP-adresser';
$lang['Unban_IP_explain'] = 'Du kan avslutte utestenginga for fleire IP-adresser samstundes ved å bruke riktig kombinasjon av musepeikar og tastatur for ditt operativsystem og nettlesar';

$lang['Unban_email'] = 'Avslutt utestenginga for ei eller fleire e-postadresser';
$lang['Unban_email_explain'] = 'Du kan avslutte utestenginga for fleire e-postadresser samstundes ved å bruke riktig kombinasjon av musepeikar og tastatur for ditt operativsystem og nettlesar';

$lang['No_banned_users'] = 'Ingen utestengte brukarnamn';
$lang['No_banned_ip'] = 'Ingen utestengte IP-adresser';
$lang['No_banned_email'] = 'Ingen utestengte e-postadresser';

$lang['Ban_update_sucessful'] = 'Lista er oppdatert!';
$lang['Click_return_banadmin'] = '%sAttende til utestenging%s';


//
// Configuration
//
$lang['General_Config'] = 'Generell konfigurasjon';
$lang['Config_explain'] = 'Du kan tilpasse alle generelle konfigurasjonsalternativ med skjemaet under. For brukar- og forumkonfigurasjon, bruk lenkjene i ramma til venstre.';

$lang['Click_return_config'] = '%sAttende til generell konfigurasjon%s';

$lang['General_settings'] = 'Generelle foruminnstillingar';
$lang['Server_name'] = 'Domenenamn';
$lang['Server_name_explain'] = 'Domenenamnet dette forumet ligg under';
$lang['Script_path'] = 'Skript sti';
$lang['Script_path_explain'] = 'Sti til phpBB2-mappen i høve til domenet';
$lang['Server_port'] = 'Serverport';
$lang['Server_port_explain'] = 'Porten serveren køyrer på, vanligvis 80. Du skal berre endre denne om du veit at serveren brukar ein annan port.';
$lang['Site_name'] = 'Namnet på nettstaden';
$lang['Site_desc'] = 'Skildring av nettstaden';
$lang['Board_disable'] = 'Steng forumet';
$lang['Board_disable_explain'] = 'Dette vil gjere forumet utilgjengeleg for brukarane. Ikkje logg ut etter du har stengt forumet, for du vil ikkje kunne logge inn igjen!';
$lang['Acct_activation'] = 'Kontoaktivering';
$lang['Acc_None'] = 'Ingen'; // These three entries are the type of activation
$lang['Acc_User'] = 'Brukarane';
$lang['Acc_Admin'] = 'Administrator';

$lang['Abilities_settings'] = 'Brukar- og foruminnstillingar';
$lang['Max_poll_options'] = 'Maks alternativ ved røystingar';
$lang['Flood_Interval'] = 'Flood intervall';
$lang['Flood_Interval_explain'] = 'Sekund ein brukar må vente mellom kvart innlegg ho/han skriv';
$lang['Board_email_form'] = 'E-post gjennom forumet';
$lang['Board_email_form_explain'] = 'Brukarane kan sende e-post til kvarandre gjennom forumet';
$lang['Topics_per_page'] = 'Emner per side';
$lang['Posts_per_page'] = 'Innlegg per side';
$lang['Hot_threshold'] = 'Svar som skal til for at eit emne skal markerast som omtykt';
$lang['Default_style'] = 'Standardstil';
$lang['Override_style'] = 'Overstyr brukarane sine val av stil';
$lang['Override_style_explain'] = 'Overstyrer brukarane sine val av stil. Viser forumet med standardstil uansett';
$lang['Default_language'] = 'Standardspråk';
$lang['Date_format'] = 'Datoformat';
$lang['System_timezone'] = 'Tidssone';
$lang['Enable_gzip'] = 'Aktiver gzip-komprimering';
$lang['Enable_prune'] = 'Aktiver sletting';
$lang['Allow_HTML'] = 'Tillat HTML';
$lang['Allow_BBCode'] = 'Tillat BBKode';
$lang['Allowed_tags'] = 'Lovlege HTML-taggar';
$lang['Allowed_tags_explain'] = 'Skil lovlege HTML-taggar med komma';
$lang['Allow_smilies'] = 'Tillat smilefjes';
$lang['Smilies_path'] = 'Sti til smilefjesmappa';
$lang['Smilies_path_explain'] = 'Sti til smilefjesmappa i høve til phpBB2-mappa (standard er images/smilies)';
$lang['Allow_sig'] = 'Tillat signaturer';
$lang['Max_sig_length'] = 'Maks signaturlengde';
$lang['Max_sig_length_explain'] = 'Maks tal teikn i brukarane sine signaturer';
$lang['Allow_name_change'] = 'Tillat endringer i brukarnamn';

$lang['Avatar_settings'] = 'Avatarinnstillingar';
$lang['Allow_local'] = 'Aktiver lokalt avatargalleri';
$lang['Allow_remote'] = 'Tillat eksterne avatarer';
$lang['Allow_remote_explain'] = 'Avatarer som ligg på ein annan server/nettstad';
$lang['Allow_upload'] = 'Tillat opplasting av eigne avatarer';
$lang['Max_filesize'] = 'Maks avatarstorleik';
$lang['Max_filesize_explain'] = 'For opplasta avatarfiler';
$lang['Max_avatar_size'] = 'Maks avatardimensjonar';
$lang['Max_avatar_size_explain'] = 'Høgde x breidde, målt i pikslar';
$lang['Avatar_storage_path'] = 'Sti til opplasta avatarer';
$lang['Avatar_storage_path_explain'] = 'Sti til avatarmappa i høve til phpBB2-mappa (f.eks. images/avatarer).';
$lang['Avatar_gallery_path'] = 'Sti til avatargalleri';
$lang['Avatar_gallery_path_explain'] = 'Sti til avatargallerimappa i høve til phpBB2-mappa (f.eks. images/avatarer/galleri).';

$lang['COPPA_settings'] = 'COPPA-innstillingar';
$lang['COPPA_fax'] = 'COPPA-faksnummer';
$lang['COPPA_mail'] = 'COPPA-postadresse';
$lang['COPPA_mail_explain'] = 'Dette er postadressa foreldre sender COPPA-registreringsskjemaet til.';

$lang['Email_settings'] = 'E-postinnstillingar';
$lang['Admin_email'] = 'E-postadresse til administrator';
$lang['Email_sig'] = 'E-postsignatur';
$lang['Email_sig_explain'] = 'Denne signaturen blir lagt til i slutten av all e-post som forumet sender.';
$lang['Use_SMTP'] = 'Bruk SMTP-tjener';
$lang['Use_SMTP_explain'] = 'Marker ja viss du vil sende e-post ved hjelp av ein SMTP-server i staden for den lokale e-postfunksjonen.';
$lang['SMTP_server'] = 'SMTP serveradresse';
$lang['SMTP_username'] = 'SMTP brukarnamn';
$lang['SMTP_username_explain'] = 'Berre skriv inn eit brukarnamn om SMTP-serveren krevjer det.';
$lang['SMTP_password'] = 'SMTP passord';
$lang['SMTP_password_explain'] = 'Berre skriv inn eit passord om SMTP-serveren krevjer det.';

$lang['Disable_privmsg'] = 'Personlege meldinger';
$lang['Inbox_limits'] = 'Maks meldingar i innboksen';
$lang['Sentbox_limits'] = 'Maks meldingar i sendtboksen';
$lang['Savebox_limits'] = 'Maks meldingar i lagringsboksen';

$lang['Cookie_settings'] = 'Informasjonskapslar';
$lang['Cookie_settings_explain'] = 'Desse instillingane definerer korleis informasjonskapslar (cookies) skal bli sendt til nettlesaren brukaren nyttar. I dei fleste tilfelle vil standardinnstillingane fungere, men om du endrer dei, må du vere sikker på at det blir gjort korrekt. Feil innstillingar kan hindre brukarane i å logge inn.';
$lang['Cookie_domain'] = 'Domene';
$lang['Cookie_name'] = 'Namn';
$lang['Cookie_path'] = 'Sti';
$lang['Cookie_secure'] = 'Sikre informasjonskapsler';
$lang['Cookie_secure_explain'] = 'Skru berre på om serveren din nyttar SSL (https://)';
$lang['Session_length'] = 'Øktlengde i sekund';

// Visual Confirmation
$lang['Visual_confirm'] = 'Aktiver bilete bekrefting';
$lang['Visual_confirm_explain'] = 'Krevjer at brukarane må skrive inn ein kode som står i eit bilete ved registrering';

//
// Forum Management
//
$lang['Forum_admin'] = 'Forumadministrasjon';
$lang['Forum_admin_explain'] = 'Her kan du legge til, slette, endre, flytte og resynkronisere kategoriar og forum';
$lang['Edit_forum'] = 'Endre forum';
$lang['Create_forum'] = 'Nytt forum';
$lang['Create_category'] = 'Ny kategori';
$lang['Remove'] = 'Fjern';
$lang['Action'] = 'Handling';
$lang['Update_order'] = 'Oppdater rekkjefølgje';
$lang['Config_updated'] = 'Forumkonfigurasjonen er oppdatert';
$lang['Edit'] = 'Endre';
$lang['Delete'] = 'Slett';
$lang['Move_up'] = 'Flytt opp';
$lang['Move_down'] = 'Flytt ned';
$lang['Resync'] = 'Resynkroniser';
$lang['No_mode'] = 'Ingen handling definert';
$lang['Forum_edit_delete_explain'] = 'Med skjemaet under kan du definere alle dei generelle foruminnstillingane. For brukar- og forumkonfigurasjon, bruk lenkjene i ramma til venstre.';

$lang['Move_contents'] = 'Flytt innhald';
$lang['Forum_delete'] = 'Slett forum';
$lang['Forum_delete_explain'] = 'Med skjemaet under kan du slette eit forum eller ein kategori og sette kor du vil gjere av emna forumet/kategorien inneheldt.';

$lang['Status_locked'] = 'Stengt';
$lang['Status_unlocked'] = 'Opent';
$lang['Forum_settings'] = 'Generelle foruminnstillingar';
$lang['Forum_name'] = 'Forumnamn';
$lang['Forum_desc'] = 'Skildring';
$lang['Forum_status'] = 'Forumstatus';
$lang['Forum_pruning'] = 'Autosletting';

$lang['prune_freq'] = 'Sjekk emnealder kvar';
$lang['prune_days'] = 'Slett emner som ikkje er besvart på';
$lang['Set_prune_data'] = 'Du må angje sjekkfrekvens og tal dager før sletting når du aktiverer autosletting.';

$lang['Move_and_Delete'] = 'Flytt og slett';

$lang['Delete_all_posts'] = 'Slett alle innlegg';
$lang['Nowhere_to_move'] = 'Ingen stad å flytte til';

$lang['Edit_Category'] = 'Endre kategori';
$lang['Edit_Category_explain'] = 'Her kan du endre namnet på kategorien.';

$lang['Forums_updated'] = 'Forum- og kategoriinformasjonen er oppdatert!';

$lang['Must_delete_forums'] = 'Du må slette alle foruma før du kan slette kategorien.';

$lang['Click_return_forumadmin'] = '%sAttende til forumadministrasjon%s';


//
// Smiley Management
//
$lang['smiley_title'] = 'Smilefjes';
$lang['smile_desc'] = 'Her kan du opprette, slette og endre smilefjes som brukarane kan bruke i innlegg og private meldinger.';

$lang['smiley_config'] = 'Smilefjesinnstillingar';
$lang['smiley_code'] = 'Smilefjeskode';
$lang['smiley_url'] = 'Bildefil';
$lang['smiley_emot'] = 'Kjensle';
$lang['smile_add'] = 'Legg til smilefjes';
$lang['Smile'] = 'Smil';
$lang['Emotion'] = 'Kjensle';

$lang['Select_pak'] = 'Velg filpakke (.pak)'; 
$lang['replace_existing'] = 'Erstatt eksistrande smilefjes';
$lang['keep_existing'] = 'Behald eksisterande smilefjes';
$lang['smiley_import_inst'] = 'Du må pakke ut smilefjespakka (.zip) for så å laste opp alle filene til smilefjesmappa før innstallasjon. Velg så korrekt informasjon i felta under for å importere smilefjespakken.';
$lang['smiley_import'] = 'Import av smilefjespakke';
$lang['choose_smile_pak'] = 'Vel ein smilefjespakke (.pak)';
$lang['import'] = 'Importer smilefjes';
$lang['smile_conflicts'] = 'Kva skal gjerast ved evt. konflikter?';
$lang['del_existing_smileys'] = 'Slett eksisterande smilefjes før importering';
$lang['import_smile_pack'] = 'Importer smilefjespakke';
$lang['export_smile_pack'] = 'Lag ny smilefjespakke';
$lang['export_smiles'] = 'For å lage ein smilefjespakke av smilefjesa du har installert, må du %slaste ned smilies.pak%s. Om du ynskjer å endre filnamn, må du passe på å behalde .pak endinga. Så må du lage ei zip-fil som inneheld alle smilefjesbileta og .pak-fila.';

$lang['smiley_add_success'] = 'Smilefjeset er lagt til!';
$lang['smiley_edit_success'] = 'Smilefjeset er oppdatert!';
$lang['smiley_import_success'] = 'Smilefjespakka er importert!';
$lang['smiley_del_success'] = 'Smilefjeset er fjerna!';
$lang['Click_return_smileadmin'] = '%sAttende til smilefjes%s';


//
// User Management
//
$lang['User_admin'] = 'Brukaradministrasjon';
$lang['User_admin_explain'] = 'Her kan du endre informasjonen til brukarane og enkelte innstillingar. For å endre rettane og løyvene til ein brukar, bruk gruppe og brukarrettar systema.';

$lang['Look_up_user'] = 'Vel brukar';

$lang['Admin_user_fail'] = 'Kan ikkje oppdatere profilen.';
$lang['Admin_user_updated'] = 'Brukerprofilen er oppdatert!';
$lang['Click_return_useradmin'] = '%sAttende til brukaradministrasjon%s';

$lang['User_delete'] = 'Slett denne brukaren';
$lang['User_delete_explain'] = 'Klikk her for å slette denne brukaren. NB! Dette kan du ikkje angre på!';
$lang['User_deleted'] = 'Brukaren er sletta!';

$lang['User_status'] = 'Brukaren er aktiv';
$lang['User_allowpm'] = 'Kan sende private meldinger';
$lang['User_allowavatar'] = 'Kan vise avatar';

$lang['Admin_avatar_explain'] = 'Her kan du sjå og/eller slette avataren.';

$lang['User_special'] = 'Spesielle felt kun for administrator';
$lang['User_special_explain'] = 'Desse felta kan ikkje brukarane endre sjølv. Her kan du bestemme statusen til brukaren og andre val.';


//
// Group Management
//
$lang['Group_administration'] = 'Gruppeadministrasjon';
$lang['Group_admin_explain'] = 'Her kan du administrere alle brukargruppene. Du kan slette, opprette og endre grupper. Du kan og velje moteratorar, om gruppa skal være open eller lukka, gruppenamnet og skildringa';
$lang['Error_updating_groups'] = 'Feil ved oppdatering av gruppene';
$lang['Updated_group'] = 'Gruppa er oppdatert!';
$lang['Added_new_group'] = 'Den nye gruppa er oppretta!';
$lang['Deleted_group'] = 'Gruppa er sletta!';
$lang['New_group'] = 'Opprett ei ny gruppe';
$lang['Edit_group'] = 'Endre gruppe';
$lang['group_name'] = 'Gruppenamn';
$lang['group_description'] = 'Gruppeskildring';
$lang['group_moderator'] = 'Gruppemoderator';
$lang['group_status'] = 'Gruppestatus';
$lang['group_open'] = 'Open gruppe';
$lang['group_closed'] = 'Lukka gruppe';
$lang['group_hidden'] = 'Sjult gruppe';
$lang['group_delete'] = 'Slett gruppe';
$lang['group_delete_check'] = 'Slett denne gruppa';
$lang['submit_group_changes'] = 'Gjennomfør endringar';
$lang['reset_group_changes'] = 'Tilbakestill endringar';
$lang['No_group_name'] = 'Du må skrive inn eit gruppenamn';
$lang['No_group_moderator'] = 'Du må velje ein gruppemoderator';
$lang['No_group_mode'] = 'Du må velje om gruppa skal vere open eller lukka';
$lang['No_group_action'] = 'Inga handling spesifisert';
$lang['delete_group_moderator'] = 'Slett den gamle gruppemoderatoren';
$lang['delete_moderator_explain'] = 'Viss du endrer gruppemoderator, kryss av i denne boksen for å fjerne den gamle moderatoren frå gruppa. Viss du ikkje krysser av, vil brukaren bli eit vanleg medlem av gruppa.';
$lang['Click_return_groupsadmin'] = '%sAttende til gruppeadministrasjon%s';
$lang['Select_group'] = 'Vel ei gruppe';
$lang['Look_up_group'] = 'Vis gruppe';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'Autosletting';
$lang['Forum_Prune_explain'] = 'Dette vil slette alle emner som ikkje er svart på på det talet dagar du vel. Viss du ikkje skriv inn eit tal, vil alle emner bli sletta. Kunngjeringar og emner med aktive røystinager vil ikkje bli sletta. Slike emner må fjernast manuelt.';
$lang['Do_Prune'] = 'Slett';
$lang['All_Forums'] = 'Alle foruma';
$lang['Prune_topics_not_posted'] = 'Slett emner som ikkje er besvart på';
$lang['Topics_pruned'] = 'Emner sletta';
$lang['Posts_pruned'] = 'Innlegg sletta';
$lang['Prune_success'] = 'Slettinga er gjennomført!';


//
// Word censor
//
$lang['Words_title'] = 'Ordsensur';
$lang['Words_explain'] = 'Her kan du legge til, endre og fjerne ord som skal bli automatisk sensurert. I tillegg vil det ikkje vere mogleg å registrere brukarnamn som inneheld desse orda. Du kan bruke joker (*) i ordfeltet. Eksempel: *ord vil passe med bord, ord* vil passe med ordning og *ord* vil passe med utfordning.';
$lang['Word'] = 'Ord';
$lang['Edit_word_censor'] = 'Endre ordsensur';
$lang['Replacement'] = 'Erstatningsord';
$lang['Add_new_word'] = 'Legg til nytt ord';
$lang['Update_word'] = 'Oppdater ord';

$lang['Must_enter_word'] = 'Du må skrive inn både ordet som skal sesurerast og ordet som skal erstatte det';
$lang['No_word_selected'] = 'Du må velje eit ord å endre';

$lang['Word_updated'] = 'Ordet er oppdatert!';
$lang['Word_added'] = 'Ordet er lagt til!';
$lang['Word_removed'] = 'Ordet er fjerna!';

$lang['Click_return_wordadmin'] = '%sAttende til ordsensur%s';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Her kan du sende e-post til anten alle brukarane eller alle medlemane av ein gruppe. Dette vil bli gjort ved at ein e-post bli sendt til e-postadressa til administratoren, med kopiar til alle mottakarane. Det kan ta lang tid å sende mail til mange på samme tid, så ver tolmodig og ikkje avbryt prosessen midt i. Du vil få beskjed når sendinga er gjennomført.';
$lang['Compose'] = 'Skriv e-post';

$lang['Recipients'] = 'Mottakarar';
$lang['All_users'] = 'Alle brukarane';

$lang['Email_successfull'] = 'E-posten er sendt!';
$lang['Click_return_massemail'] = '%sAttende til masse e-post%s';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Rangadministrasjon';
$lang['Ranks_explain'] = 'Her kan du legge til, endre og slette rangeringar. Du kan og opprette nye rangeringar som kan bli tildelt brukarane gjennom brukaradministrasjonen.';

$lang['Add_new_rank'] = 'Legg til ny rang';

$lang['Rank_title'] = 'Tittel';
$lang['Rank_special'] = 'Spesialrang';
$lang['Rank_minimum'] = 'Min antal innlegg';
$lang['Rank_maximum'] = 'Maks antal innlegg';
$lang['Rank_image'] = 'Bilete';
$lang['Rank_image_explain'] = 'Skriv inn adressa til eit bilete i høve til phpBB2-mappa, som skal assosierast med rangen, f.eks. images/rangeringar/admin.gif.';

$lang['Must_select_rank'] = 'Du må velje ein rang!';
$lang['No_assigned_rank'] = 'Ingen spesialrang er tildelt';

$lang['Rank_updated'] = 'Rangen er oppdatert!';
$lang['Rank_added'] = 'Rangen er lagt til!';
$lang['Rank_removed'] = 'Rangen er sletta!';
$lang['No_update_ranks'] = 'Rangen er sletta, men brukarar som er tildelt denne rangen blei ikkje oppdatert. Du må manuelt slette rangen til desse brukarane.';

$lang['Click_return_rankadmin'] = '%sAttende til rangamninistrasjon%s';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Ulovlege brukarnamn';
$lang['Disallow_explain'] = 'Her kan du kontrollere brukarnamn som ikkje skal være tilletne. Ulovlege brukarnamn kan innehelde joker (*). Du kan ikkje nekte brukarnamn som allereie er registrert. Viss det er dette du vil, må du først slette brukaren med det brukarnamnet.';

$lang['Delete_disallow'] = 'Slett';
$lang['Delete_disallow_title'] = 'Fjern ulovleg brukarnamn';
$lang['Delete_disallow_explain'] = 'Fjerne eit ulovleg brukarnamn ved å velje namnet frå denne lista.';

$lang['Add_disallow'] = 'Legg til';
$lang['Add_disallow_title'] = 'Legg til eit ulovleg brukarnamn';
$lang['Add_disallow_explain'] = 'Her kan du skrive inn brukarnamn som skal vere ulovlege. Du kan nytte * som joker.';

$lang['No_disallowed'] = 'Ingen ulovlege brukarnamn er definert';

$lang['Disallowed_deleted'] = 'Det tidlegare ulovlege brukarnamnet er no lovleg!';
$lang['Disallow_successful'] = 'Brukernamnet er no ulovleg!';
$lang['Disallowed_already'] = 'Brukernamnet du skreiv inn kan ikkje settast som ulovleg. Anten eksisterer det ein brukar med dette namnet, eller så er namnet på ordesurlista eller lista over ulovlege brukarnamn frå før.';

$lang['Click_return_disallowadmin'] = '%sAttende til ulovlege brukarnamn%s';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Stiladministrasjon';
$lang['Styles_explain'] = 'Her kan du legge til, slette eller endre utsjånaden på forumet.';
$lang['Styles_addnew_explain'] = 'Følgjande liste inneheld alle stilane som er tilgjengelege for drakta du bruker. Elementa på lista er ikkje installert i phpBB-databasen. Klikk på installeringlenkja ved eit element for å installere det.';

$lang['Select_template'] = 'Vel ei drakt';

$lang['Style'] = 'Stil';
$lang['Template'] = 'Drakt';
$lang['Install'] = 'Installer';
$lang['Download'] = 'Last ned';

$lang['Edit_theme'] = 'Endre tema';
$lang['Edit_theme_explain'] = 'Her kan du endre innstillingene for det valde temaet.';

$lang['Create_theme'] = 'Lag tema';
$lang['Create_theme_explain'] = 'Her kan du lage eit nytt tema for ei drakt. Når du skriver inn hexfarger, må du ikkje ta med det fortegnet #. Eksempel: CCCCCC er korrekt, #CCCCCC er feil.';

$lang['Export_themes'] = 'Eksporter tema';
$lang['Export_explain'] = 'Her kan du eksportere temadata for ei drakt. Vel drakta frå lista under og temakonfigurasjonsfila vil bli forsøkt lagra i den valde draktmappa. Viss det ikkje er mogleg å lagre fila automatisk, kan du laste den ned. For at fila skal kunne bli lagra automatisk, må du gje skriverettar for serveren til den valde mappa. Sjå brukarrettleiinga for meir informasjon.';

$lang['Theme_installed'] = 'Det valde temaet er installert';
$lang['Style_removed'] = 'Den valde stilen er sletta frå databasen. For å slette stilen fullstendig, må du og slette den frå draktmappa.';
$lang['Theme_info_saved'] = 'Temainformasjonen for den valde drakta er lagra. Du bør no endre tilbake rettane for theme_info.cfg (og den valde draktmappa).';
$lang['Theme_updated'] = 'Det valde temaet er oppdatert. Du bør no eksportere dei nye temainnstillingane.';
$lang['Theme_created'] = 'Temaet er opprettet. Du bør no eksportere temaet til temakonfigurasjonsfila for lagring eller til bruk andre stader.';

$lang['Confirm_delete_style'] = 'Er du sikker på at du ynskjer å slette denne stilen?';

$lang['Download_theme_cfg'] = 'Kan ikkje skrive til temainformasjonsfila. Klikk under for å laste ned fila. Når du har lasta ned fila, kan du overføre den til mappa som inneheld draktfilene. Så kan du, om ynskjeleg, pakke filene for distribusjon eller bruk andre stader.';
$lang['No_themes'] = 'Drakta du valde har ingen tema knytta til seg. Klikk på \"Lag tema\" i ramma til venstre for å for å lage eit nytt tema.';
$lang['No_template_dir'] = 'Kan ikkje åpne draktmappa. Enten er den ikkje lesbar for serveren eller så eksisterer den ikkje.';
$lang['Cannot_remove_style'] = 'Du kan ikkje flytte den valde stilen fordi den er sett som standard i forumet. Endre standardstilen og prøv igjen.';
$lang['Style_exists'] = 'Stilnamnet du valde eksisterer allereie. Gå attende og vel eit anna namn.';

$lang['Click_return_styleadmin'] = '%sAttende til stiladministrasjon%s';

$lang['Theme_settings'] = 'Temainnstillingar';
$lang['Theme_element'] = 'Temaelement';
$lang['Simple_name'] = 'Enkeltnamn';
$lang['Value'] = 'Verdi';
$lang['Save_Settings'] = 'Lagre innstillingar';

$lang['Stylesheet'] = 'Stilark';
$lang['Background_image'] = 'Bakgrunnsbilete';
$lang['Background_color'] = 'Bakgrunnsfarge';
$lang['Theme_name'] = 'Temanamn';
$lang['Link_color'] = 'Lenkjefarge';
$lang['Text_color'] = 'Tekstfarge';
$lang['VLink_color'] = 'Besøkt lenkjefarge';
$lang['ALink_color'] = 'Aktiv lenkjefarge';
$lang['HLink_color'] = 'Peikar-over lenkjefarge';
$lang['Tr_color1'] = 'Tabellradfarge 1';
$lang['Tr_color2'] = 'Tabellradfarge 2';
$lang['Tr_color3'] = 'Tabellradfarge 3';
$lang['Tr_class1'] = 'Tabellradklasse 1';
$lang['Tr_class2'] = 'Tabellradklasse 2';
$lang['Tr_class3'] = 'Tabellradklasse 3';
$lang['Th_color1'] = 'Tabelloverskriftfarge 1';
$lang['Th_color2'] = 'Tabelloverskriftfarge 2';
$lang['Th_color3'] = 'Tabelloverskriftfarge 3';
$lang['Th_class1'] = 'Tabelloverskriftklasse 1';
$lang['Th_class2'] = 'Tabelloverskriftklasse 2';
$lang['Th_class3'] = 'Tabelloverskriftklasse 3';
$lang['Td_color1'] = 'Tabellcellefarge 1';
$lang['Td_color2'] = 'Tabellcellefarge 2';
$lang['Td_color3'] = 'Tabellcellefarge 3';
$lang['Td_class1'] = 'Tabellcelleklasse 1';
$lang['Td_class2'] = 'Tabellcelleklasse 2';
$lang['Td_class3'] = 'Tabellcelleklasse 3';
$lang['fontface1'] = 'Skrifttype 1';
$lang['fontface2'] = 'Skrifttype 2';
$lang['fontface3'] = 'Skrifttype 3';
$lang['fontsize1'] = 'Skriftstorleik 1';
$lang['fontsize2'] = 'Skriftstorleik 2';
$lang['fontsize3'] = 'Skriftstorleik 3';
$lang['fontcolor1'] = 'Skriftfarge 1';
$lang['fontcolor2'] = 'Skriftfarge 2';
$lang['fontcolor3'] = 'Skriftfarge 3';
$lang['span_class1'] = 'Tekstklasse 1';
$lang['span_class2'] = 'Tekstklasse 2';
$lang['span_class3'] = 'Tekstklasse 3';
$lang['img_poll_size'] = 'Storleik på røystingsbilete i piksler';
$lang['img_pm_size'] = 'Storleik på privat meldingsbilete i piksler';


//
// Install Process
//
$lang['Welcome_install'] = 'Velkomen til installasjonen av phpBB 2';
$lang['Initial_config'] = 'Grunnleggjande konfigurasjon';
$lang['DB_config'] = 'Databasekonfigurasjon';
$lang['Admin_config'] = 'Administratorkonfigurasjon';
$lang['continue_upgrade'] = 'Når du har lasta ned konfigurasjonsfila (config.php), kan du trykke på knappen \"Hald fram med oppgradering\" nedanfor for å halde fram med oppgraderingsprosessen. Vent med å laste opp konfigurasjonsfila til oppgraderings prosessen er fullført.';
$lang['upgrade_submit'] = 'Hald fram med oppgradering';

$lang['Installer_Error'] = 'Feil under installasjonen';
$lang['Previous_Install'] = 'Ein tidligere installasjon er oppdaga';
$lang['Install_db_error'] = 'Feil under oppdatering av databasen';

$lang['Re_install'] = 'Den tidlegare installasjonen er framleis aktiv.<br /><br />Viss du vil re-installere phpBB 2, må du trykke på \"Ja\" knappen under. Alle eksisterende data vil bli sletta og ingen sikkerhetskopier vil bli laga! Administratorbrukarnamnet og passordet som du har brukt for å logge deg inn på forumet vil bli laga på nytt etter re-installasjonen; ingen andre innstillingar bli tatt vare på.<br /><br />Tenk deg godt om før du bestemmer deg!';

$lang['Inst_Step_0'] = 'Takk for at du valde phpBB 2. Fyll inn all naudsam informasjon i felta under for å fullføre installasjonen. Databasen du vil installere i må allereie eksistere. Viss du vil installere i ein database som brukar ODBC, som f.eks. MS Access, må du lage ein DSN før du held fram.';

$lang['Start_Install'] = 'Start installering';
$lang['Finish_Install'] = 'Avslutt installering';

$lang['Default_lang'] = 'Standardspråk';
$lang['DB_Host'] = 'Databaseservernamn/DSN';
$lang['DB_Name'] = 'Databasenamn';
$lang['DB_Username'] = 'Databasebrukarnamn';
$lang['DB_Password'] = 'Databasepassord';
$lang['Database'] = 'Databasen din';
$lang['Install_lang'] = 'Vel språk for denne installasjonen';
$lang['dbms'] = 'Databasetype';
$lang['Table_Prefix'] = 'Prefiks for tabellane som skal opprettast';
$lang['Admin_Username'] = 'Administratorbrukarnamn';
$lang['Admin_Password'] = 'Administratorpassord';
$lang['Admin_Password_confirm'] = 'Bekreft administratorpassord';

$lang['Inst_Step_2'] = 'Administratorkontoen er oppretta. Den grunnleggande installasjonen er fullført. Du vil no bli overførd til ei side kor du kan administrere den nye installasjonen. Sjekk spesielt om informasjonen under \"Generell konfigurasjon\" er korrekt. Takk for at du valde phpBB 2!';

$lang['Unwriteable_config'] = 'Kan ikkje skrive til konfigurasjonsfila (config.php). Du kan laste ned ein kopi av konfigurasjonsfila viss du trykker på knappen under. Denne fila må lastast opp til phpBB2-mappa. Når dette er gjort, logger du deg inn som administrator ved å bruke brukarnamnet og passordet som du oppga tidlegare under intallasjonen. Besøk administrasjonspanelet (ei lenkje blir vist nedst på alle sidene når du har logga inn) for å sjekke om informasjonen under «Generell konfigurasjon» er korrekt. Takk for at du valde phpBB 2!';
$lang['Download_config'] = 'Last ned konfigurasjonsfila';

$lang['ftp_choose'] = 'Velg nedlastningsmetode';
$lang['ftp_option'] = '<br />FTP extensions er tilgjengeleg, og du kan prøve å sende konfigurasjonsfila automatisk med FTP til rett stad.';
$lang['ftp_instructs'] = 'Du valde å sende konfigurasjonsfila automatisk med FTP. Fyll inn informasjonen under for å komme igang. Merk at FTP-stien skal vere den ekstakte stien gjennom FTP til phpBB2-mappa di (som om du hadde brukt ein vanleg FTP-klient).';
$lang['ftp_info'] = 'Fyll inn FTP-informasjon';
$lang['Attempt_ftp'] = 'Prøv å sende konfigurasjonsfila til riktig stad med FTP';
$lang['Send_file'] = 'Berre send fila til meg slik at eg kan laste den opp manuelt med FTP';
$lang['ftp_path'] = 'FTP-sti til phpBB2-mappa';
$lang['ftp_username'] = 'FTP-brukarnamn';
$lang['ftp_password'] = 'FTP-passord';
$lang['Transfer_config'] = 'Start overføring';
$lang['NoFTP_config'] = 'Kan ikkje laste opp fila automatisk med FTP. Last ned konfigurasjonsfila og last den opp manuelt.';

$lang['Install'] = 'Installer';
$lang['Upgrade'] = 'Oppgrader';


$lang['Install_Method'] = 'Velg installasjonsmetode';

$lang['Install_No_Ext'] = 'PHP-konfigurasjonen på serveren din støtter ikkje databasetypen du valde.';

$lang['Install_No_PCRE'] = 'phpBB2 krevjer ein sokalla «Perl-Compatible Regular Expressions Module» for PHP, men det viser seg at denne modulen diverre ikkje er tilgjengeleg.';

//
// That's all Folks!
// -------------------------------------------------

?>