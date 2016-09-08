<?php
//zOOm Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
| Date: Dezember, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2005 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| Filename: germani.php  (Du)                                         |
| Version: 2.5rc1                                                     |
| Translation: Matthias Buchwald - www.illumics.de                    |
| Translation: Per Lasse Baasch  - www.skycube.net                    |
|                                                                     |
----------------------------------------------------------------------|
* @package zOOm Media Gallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
//Language translation
define("_ZOOM_DATEFORMAT","%d.%m.%Y %H:%M"); // use the PHP strftime Format, more info at http://www.php.net
define("_ZOOM_ISO","iso-8859-1");
define("_ZOOM_PICK","W&auml;hle ein Album");
define("_ZOOM_DELETE","L&ouml;schen");
define("_ZOOM_BACK","Zur&uuml;ck");
define("_ZOOM_MAINSCREEN","Hauptseite");
define("_ZOOM_BACKTOGALLERY","Zur&uuml;ck zum Album");
define("_ZOOM_INFO_DONE","Fertig!");
define("_ZOOM_TOOLTIP", "zOOm ToolTipp");
define("_ZOOM_WARNING", "zOOm Warnung!");

//Gallery admin page
define("_ZOOM_ADMINSYSTEM","Admin System");
define("_ZOOM_USERSYSTEM","Benutzer System");
define("_ZOOM_ADMIN_TITLE","Media Gallery Admin System");
define("_ZOOM_USER_TITLE","Media Gallery Benutzer System");
define("_ZOOM_CATSMGR","Album-Manager");
define("_ZOOM_CATSMGR_DESCR","Erstelle neue Alben f&uuml;r Deine neuen Medien, erstelle und l&ouml;sche sie hier im Album-Manager.");
define("_ZOOM_NEW","Neues Album");
define("_ZOOM_DEL","Album l&ouml;schen");
define("_ZOOM_MEDIAMGR","Medien-Manager");
define("_ZOOM_MEDIAMGR_DESCR","verschieben, &auml;ndern, l&ouml;schen und suchen nach neuen Medien automatisch oder manuell.");
define("_ZOOM_UPLOAD","Datei(en) hochladen");
define("_ZOOM_EDIT","Album bearbeiten");
define("_ZOOM_ADMIN_CREATE","Datenbank erzeugen");
define("_ZOOM_ADMIN_CREATE_DESCR","Erstelle die ben&ouml;tigten Datenbanktabellen, dann kannst Du beginnen, das Album zu benutzen.");
define("_ZOOM_HD_PREVIEW","Vorschau");
define("_ZOOM_HD_CHECKALL","Ausw&auml;hlen/Abw&auml;hlen alle");
define("_ZOOM_HD_CREATEDBY","Erstellt von");
define("_ZOOM_HD_AFTER","Einf&uuml;gen danach");
define("_ZOOM_HD_HIDEMSG","Verberge 'keine Medien' Text");
define("_ZOOM_HD_NAME","Name Album");
define("_ZOOM_HD_DIR","Verzeichnis");
define("_ZOOM_HD_NEW","Neues Album");
define("_ZOOM_HD_SHARE","Dieses Album freigeben");
define("_ZOOM_SHARE","Freigeben");
define("_ZOOM_UNSHARE","Zur&uuml;ckziehen");
define("_ZOOM_PUBLISH","Ver&ouml;ffentlichen");
define("_ZOOM_UNPUBLISH","Zur&uuml;ckziehen");
define("_ZOOM_TOPLEVEL","Hauptseite");
define("_ZOOM_HD_UPLOAD","Datei hochladen");
define("_ZOOM_A_ERROR_ERRORTYPE","Fehlertyp");
define("_ZOOM_A_ERROR_IMAGENAME","Medienname");
define("_ZOOM_A_ERROR_NOFFMPEG","<u>FFmpeg</u> nicht verf&uuml;gbar");
define("_ZOOM_A_ERROR_NOPDFTOTEXT","<u>PDFtoText</u> nicht verf&uuml;gbar");
define("_ZOOM_A_ERROR_NOTINSTALLED","nicht installiert");
define("_ZOOM_A_ERROR_CONFTODB","Fehler beim speichern der Konfiguration in die Datenbank!");
define("_ZOOM_A_MESS_NOT_SHURE","* Wenn Du Dir nicht sicher bist, benutze default \"auto\" ");
define("_ZOOM_A_MESS_SAFEMODE1","Note: \"Safe Mode\" ist aktiv, deswegen k&ouml;nnte es sein, dass man keine gro&szlig;en Datei hochladen kann!<br />Sie sollten in das Admininterface wechseln und dort zu FTP wechseln.");
define("_ZOOM_A_MESS_SAFEMODE2","Note: \"Safe Mode\" ist aktiv, deswegen k&ouml;nnte es sein, dass man keine gro&szlig;en Datei hochladen kann!<br />zOOm erfordert das aktivieren des FTP-Mode im Admininterface.");
define("_ZOOM_A_MESS_PROCESSING_FILE","Verarbeitung der Datei...");
define("_ZOOM_A_MESS_NOTOPEN_URL","Konnte folgende url nicht &ouml;ffnen:");
define("_ZOOM_A_MESS_PARSE_URL","Syntaxanalyse \"%s\" f&uuml;r Datei... "); // %s = $url
define("_ZOOM_A_MESS_NOJAVA","Wenn Du hier eine graue Box siehst oder Probleme beim hochladen hast, <br /> k&ouml;nnte es sein, dass Du eine neuere Java run-time installieren mu&szlig;t. Geh auf <a href=\"http://www.java.com\" target=\"_blank\">Java.com</a> <br /> und lade die neueste Version herunter.");
define("_ZOOM_SETTINGS","Einstellungen");
define("_ZOOM_SETTINGS_DESCR","betrachte und ver&auml;nder alle verf&uuml;gbaren Konfigurationseinstellungen hier.");
define("_ZOOM_SETTINGS_TAB1","System");
define("_ZOOM_SETTINGS_TAB2","Media");
define("_ZOOM_SETTINGS_TAB3","Layout");
//Tab 4 is Module
define("_ZOOM_SETTINGS_TAB5","Safe Mode");
define("_ZOOM_SETTINGS_TAB6","Berechtigungen");
define("_ZOOM_SETTINGS_CONVTYPE","Konvertierungsart");
define("_ZOOM_SETTINGS_AUTODET","Auto-Erkennung: ");
define("_ZOOM_SETTINGS_IMGPATH","Pfad zu den Mediendateien:");
define("_ZOOM_SETTINGS_TTIMGPATH","Pfad zu den Medien ist ");
define("_ZOOM_SETTINGS_CONVSETTINGS","Medien Konvertierungseinstellungen:");
define("_ZOOM_SETTINGS_IMPATH","Pfad zu ImageMagick: ");
define("_ZOOM_SETTINGS_NETPBMPATH"," oder NetPBM: ");
define("_ZOOM_SETTINGS_FFMPEGPATH","Pfad zu FFmpeg");
define("_ZOOM_SETTINGS_FFMPEGTOOLTIP","FFmpeg ist erforderlich um Thumbnails f&uuml;r Videos zu erstellen.<br />Unterst&uuml;tzte Formate: ");
define("_ZOOM_SETTINGS_PDFTOTEXTPATH","Pfad zu PDFtoText");
define("_ZOOM_SETTINGS_XPDFTOOLTIP","pdf2text, welches Teil vom Xpdf Packet ist, wird ben&ouml;tigt f&uuml;r PDF Dateien.");
define("_ZOOM_SETTINGS_MAXSIZE","Medien max. Gr&ouml;&szlig;e: ");
define("_ZOOM_SETTINGS_THUMBSETTINGS","Thumbnail Einstellungen:");
define("_ZOOM_SETTINGS_QUALITY","NetPBM und GD2 JPEG Qualit&auml;t: ");
define("_ZOOM_SETTINGS_SIZE","Thumbnail max. Gr&ouml;&szlig;e: ");
define("_ZOOM_SETTINGS_TEMPNAME","Tempor&auml;rer Name: ");
define("_ZOOM_SETTINGS_AUTONUMBER","automatische Medienbenennung (z.B. 1,2,3)");
define("_ZOOM_SETTINGS_TEMPDESCR","Tempor&auml;re Beschreibung: ");
define("_ZOOM_SETTINGS_TITLE","Album Name:");
define("_ZOOM_SETTINGS_SUBCATSPG","Anzahl der Spalten in (Unter-)Alben");
define("_ZOOM_SETTINGS_COLUMNS","Anzahl der Thumbnail-Spalten");
define("_ZOOM_SETTINGS_THUMBSPG","Thumbnails pro Seite");
define("_ZOOM_SETTINGS_CMTLENGTH","Kommentare max. L&auml;nge");
define("_ZOOM_SETTINGS_CHARS","Zeichen");
define("_ZOOM_SETTINGS_GALLERYPREFIX","Pr&auml;fix f&uuml;r Albumtitel");
define("_ZOOM_SETTINGS_SHOWOCCSPACE","Zeige belegten Speicher im Medien-Manager");
define("_ZOOM_SETTINGS_FEATURES_TITLE","Eigenschaften AN/AUS"); //added: 22-08
define("_ZOOM_SETTINGS_CSS_TITLE","CSS Einstellungen"); //added: 22-08
define("_ZOOM_SETTINGS_DISPLAY_TITLE","Anzeigeoptionen AN/AUS"); //added: 22-08
define("_ZOOM_SETTINGS_COMMENTS","Kommentare");
define("_ZOOM_SETTINGS_POPUP","PopUp-Media");
define("_ZOOM_SETTINGS_CATIMG","Zeige Albumbild");
define("_ZOOM_SETTINGS_SLIDESHOW","Diashow");
define("_ZOOM_SETTINGS_ZOOMLOGO","Zeige zOOm-Logo");
define("_ZOOM_SETTINGS_SHOWHITS","Zeige Anzahl der Zugriffe");
define("_ZOOM_SETTINGS_READEXIF","Lese EXIF-Daten");
define("_ZOOM_SETTINGS_EXIFTOOLTIP","Dieses Feature erlaubt EXIF und oder IPTC daten anzuschauen, ohne eine Installation vom EXIF Modul in PHP.");
define("_ZOOM_SETTINGS_READID3","Lese mp3 ID3-Informationen");
define("_ZOOM_SETTINGS_ID3TOOLTIP","Dieses Feature zeigt erweiterte ID3 v1.1 und v2.0 Informationen beim anzeigen/ abspielen einer MP3.");
define("_ZOOM_SETTINGS_RATING","Bewertung");
define("_ZOOM_SETTINGS_CSS","CSS PopUp-Fenster");
define("_ZOOM_SETTINGS_CSSZOOM","zOOm Media gallery &amp; Medien Ansicht"); //added: 22-08
define("_ZOOM_SETTINGS_SUCCESS","Einstellungen erfolgreich aktualisiert!");
define("_ZOOM_SETTINGS_ZOOMING","Medienvergr&ouml;&szlig;erung");
define("_ZOOM_SETTINGS_ORDERBY","Thumbnail Sortierungs-Methode; sortiere nach");
define("_ZOOM_SETTINGS_CATORDERBY","(Unter-)Alben Sortierung; sortiert nach");
define("_ZOOM_SETTINGS_DATE_ASC","Datum, aufsteigend");
define("_ZOOM_SETTINGS_DATE_DESC","Datum, absteigend");
define("_ZOOM_SETTINGS_FLNM_ASC","Dateiname, aufsteigend");
define("_ZOOM_SETTINGS_FLNM_DESC","Dateiname, absteigend");
define("_ZOOM_SETTINGS_NAME_ASC","Name, aufsteigend");
define("_ZOOM_SETTINGS_NAME_DESC","Name, absteigend");
define("_ZOOM_SETTINGS_LBTOOLTIP","Eine Lightbox ist wie ein Warenkorb, Benutzer k&ouml;nnen Medien sammeln und dann als ZIP Datei herunterladen.");
define("_ZOOM_SETTINGS_SHOWNAME","Zeige Name");
define("_ZOOM_SETTINGS_SHOWDESCR","Zeige Beschreibung");
define("_ZOOM_SETTINGS_SHOWKEYWORDS","Zeige Schl&uuml;sselw&ouml;rter");
define("_ZOOM_SETTINGS_SHOWDATE","Zeige Datum");
define("_ZOOM_SETTINGS_SHOWUNAME","Zeige Benutzernamen");
define("_ZOOM_SETTINGS_SHOWFILENAME","Zeige Dateiname");
define("_ZOOM_SETTINGS_METABOX","Zeige Box mit Medien-Info im Album");
define("_ZOOM_SETTINGS_METABOXTOOLTIP","Unbenutzt erh&ouml;ht dies die Geschwindigkeit des Fotoalbums. Effektiv f&uuml;r gro&szlig;e Datenbanken.");
define("_ZOOM_SETTINGS_ECARDS","E-Cards");
define("_ZOOM_SETTINGS_ECARDS_LIFETIME","E-Cards G&uuml;ltigkeit");
define("_ZOOM_SETTINGS_ECARDS_ONEWEEK","Eine Woche");
define("_ZOOM_SETTINGS_ECARDS_TWOWEEKS","Zwei Wochen");
define("_ZOOM_SETTINGS_ECARDS_ONEMONTH","Einen Monat");
define("_ZOOM_SETTINGS_ECARDS_THREEMONTHS","Drei Monate");
define("_ZOOM_SETTINGS_SHOWSEARCH","Such-Feld auf ALLEN Seiten");
define("_ZOOM_SETTINGS_BOX_ANIMATE","Boxen animieren"); //added: 15-09
define("_ZOOM_SETTINGS_BOX_PROPERTIES","Eigenschaften (visual state)"); //added: 15-09
define("_ZOOM_SETTINGS_BOX_META","EXIF-Info (visual state)"); //added: 15-09
define("_ZOOM_SETTINGS_BOX_COMMENTS","Kommentare (visual state)"); //added: 15-09
define("_ZOOM_SETTINGS_BOX_RATING","Bewertung (visual state)"); //added: 15-09
define("_ZOOM_SETTINGS_TOPTEN","Zeige \"Top Ten\" Link auf Hauptseite");
define("_ZOOM_SETTINGS_LASTSUBM","Zeige \"Neueste Medien\" Link auf Hauptseite");
define("_ZOOM_SETTINGS_SETMENUOPTION","Zeige 'Hochladen'-Link im Benutzermen&uuml;");
define("_ZOOM_SETTINGS_USEFTP","Nutze FTP-Modus?");
define("_ZOOM_SETTINGS_FTPHOST","Servername");
define("_ZOOM_SETTINGS_FTPUNAME","Benutzername");
define("_ZOOM_SETTINGS_FTPPASS","Passwort");
define("_ZOOM_SETTINGS_FTPWARNING","Warnung: Das Passwort ist nicht sicher gespeichert!");
define("_ZOOM_SETTINGS_FTPHOSTDIR","Verzeichnis auf dem Servername");
define("_ZOOM_SETTINGS_MESS_FTPHOSTDIR","Bitte den Pfad von Joomla! zu FTP hier eingeben. WICHTIG: Ende <b>ohne</b> einen Slash oder Backslash!");
define("_ZOOM_SETTINGS_GROUP","Gruppe");
define("_ZOOM_SETTINGS_PRIV_DESCR","Du hast die M&ouml;glichkeit, die Privilegien jeder in Joomla! bekannten Gruppe zu &auml;ndern und dadurch auch die Privilegien von
    jedem Benutzer in dieser Gruppe<br />
    Ein Benutzer k&ouml;nnte -beispielsweise- folgendes tun: Daten hochladen, Medien &auml;ndern/l&ouml;schen, (&ouml;ffentlich) Alben erstellen/&auml;ndern/l&ouml;schen.<br />
    Was Sie nun aber tats&auml;chlich machen d&uuml;rfen h&auml;ngt allein von Dir ab.");
define("_ZOOM_SETTINGS_CLOSE","Zeige \"Schlie&szlig;en\" Link in Popupfenster");
define("_ZOOM_SETTINGS_MAINSCREEN","Mainscreen Link im Pfad anzeigen");
define("_ZOOM_SETTINGS_NAVBUTTONS","Zeige Navigations Buttons in Popupfenster");
define("_ZOOM_SETTINGS_PROPERTIES","Zeige Eigenschaften unter dem Media");
define("_ZOOM_SETTINGS_MEDIAFOUND","Zeige \"Media gefunden\" Text im Album");
define("_ZOOM_SYSTEM_TITLE","System Einstellungen");
define("_ZOOM_YES","Ja");
define("_ZOOM_NO","Nein");
define("_ZOOM_VISIBLE","sichtbar"); //added: 15-09
define("_ZOOM_HIDDEN","versteckt"); //added: 15-09
define("_ZOOM_SAVE","Speichern");
define("_ZOOM_MOVEFILES","Medien verschieben");
define("_ZOOM_BUTTON_MOVE","verschieben");
define("_ZOOM_MOVEFILES_STEP1","W&auml;hle das Zielalbum");
define("_ZOOM_ALERT_MOVEOK","%s erfolgreich verschoben!");
define("_ZOOM_OPTIMIZE","Tabellen optimieren");
define("_ZOOM_OPTIMIZE_DESCR","zOOm Media Gallery benutzt viele Tabellen, daher entstehen einige &uuml;bersch&uuml;ssige Daten. Klicke hier, um diese zu entfernen.");
define("_ZOOM_OPTIMIZE_SUCCESS","zOOm Media Galerie Tabellen optimiert!");
define("_ZOOM_UPDATE","Update zOOm Media Galerie");
define("_ZOOM_UPDATE_DESCR","Neue Features zuf&uuml;gen, l&ouml;se Probleme und Bugs! Gehe zu <a href=\"http://www.zoomfactory.org\" target=\"_blank\">www.zoomfactory.org</a> f&uuml;r die letzten Updates!");
define("_ZOOM_UPDATE_XMLDATE","Datum des letzten Updates");
define("_ZOOM_UPDATE_NOUPDATES","Keine Updates vorhanden!"); // added 11-08
define("_ZOOM_UPDATE_PACKAGE","Update ZIP-Datei: ");
define("_ZOOM_CREDITS","&Uuml;ber zOOm Media Gallery & Credits");

//Image actions
define("_ZOOM_DISKSPACEUSAGE","Speicherplatz den %s benutzt");
define("_ZOOM_UPLOAD_SINGLE","einzelne (ZIP-)Datei");
define("_ZOOM_UPLOAD_MULTIPLE","mehrere Dateien");
define("_ZOOM_UPLOAD_DRAGNDROP","Drag n Drop");
define("_ZOOM_UPLOAD_SCANDIR","durchsuche Verzeichnis");
define("_ZOOM_UPLOAD_INTRO","Dr&uuml;cke den <b>Durchsuchen</b>-Knopf, um ein Foto zum Hochladen auszuw&auml;hlen.");
define("_ZOOM_UPLOAD_STEP1","1. W&auml;hle die Anzahl der Dateien, die Du hochladen willst: ");
define("_ZOOM_UPLOAD_STEP2","2. W&auml;hle das Album, in das Du die Dateien ablegen willst: ");
define("_ZOOM_UPLOAD_STEP3","3. Benutze den Durchsuchen-Knopf, um Medien von Deinem Computer auszuw&auml;hlen");
define("_ZOOM_SCAN_STEP1","Step 1: W&auml;hle einen Ort, der nach Medien durchsucht werden soll...");
define("_ZOOM_SCAN_STEP2","Step 2: W&auml;hle die Medien aus, die Du hochladen willst...");
define("_ZOOM_SCAN_STEP3","Step 3: zOOm verarbeitet die Medien, die Du ausgew&auml;hlt hast...");
define("_ZOOM_SCAN_STEP1_DESCR","Der Ort kann eine URL oder ein Verzeichnis auf dem Server sein.<br>&nbsp;   Tipp: FTP, Medien in ein Verzeichnis hochladen und hier den Pfad angeben!");
define("_ZOOM_SCAN_STEP2_DESCR1","Verarbeitung");
define("_ZOOM_SCAN_STEP2_DESCR2","als ein lokales Verzeichnis");
define("_ZOOM_FORMCREATE_NAME","Name");
define("_ZOOM_FORM_IMAGEFILE","Media");
define("_ZOOM_FORM_IMAGEFILTER","Unterst&uuml;tzte Medienarten");
define("_ZOOM_FORM_INGALLERY","Im Album");
define("_ZOOM_FORM_SETFILENAME","Setze Mediennamen gleich dem Orginal-Dateinamen.");
define("_ZOOM_FORM_IGNORESIZES","Voreingestellte Maximalgr&ouml;&szlig;e des Media ignorieren"); //added: 12-08
define("_ZOOM_FORM_LOCATION","Ort");
define("_ZOOM_BUTTON_SCAN","&Uuml;bermittle URL oder Verzeichnis");
define("_ZOOM_BUTTON_UPLOAD","Hochladen");
define("_ZOOM_BUTTON_EDIT","Bearbeiten");
define("_ZOOM_BUTTON_CREATE","Erstellen");
define("_ZOOM_CONFIRM_DEL","Diese Option wird ein Album komplett enfernen, inklusive Inhalt!\\nWillst Du wirklich fortfahren?");
define("_ZOOM_CONFIRM_DELMEDIUM","Du bist dabei, dieses Media komplett zu enfernen!\\nWillst Du wirklich fortfahren?");
define("_ZOOM_ALERT_DEL","Album ist gel&ouml;scht!");
define("_ZOOM_ALERT_NOCAT","Kein Album ausgew&auml;hlt!");
define("_ZOOM_ALERT_NOMEDIA","Nichts ausgew&auml;hlt!");
define("_ZOOM_ALERT_EDITOK","Albumfelder erfolgreich bearbeitet!");
define("_ZOOM_ALERT_NEWGALLERY","Neues Album erstellt.");
define("_ZOOM_ALERT_NONEWGALLERY","Album nicht erstellt!!");
define("_ZOOM_ALERT_EDITIMG","Medieneigenschaften erfolgreich bearbeitet");
define("_ZOOM_ALERT_DELPIC","Media ist gel&ouml;scht!");
define("_ZOOM_ALERT_NODELPIC","Media kann nicht gel&ouml;scht werden!");
define("_ZOOM_ALERT_NOPICSELECTED","Kein Media ausgew&auml;hlt.");
define("_ZOOM_ALERT_NOPICSELECTED_MULT","Kein Media ausgew&auml;hlt.");
define("_ZOOM_ALERT_UPLOADOK","Media erfolgreich hochgeladen!");
define("_ZOOM_ALERT_UPLOADSOK","Medien erfolgreich hochgeladen!");
define("_ZOOM_ALERT_WRONGFORMAT","Falsches Medienformat.");
define("_ZOOM_ALERT_WRONGFORMAT_MULT","Falsches Medienformat.");
define("_ZOOM_ALERT_IMGERROR","Fehler beim Ver&auml;ndern des Media/ Erstellung Thumbnail.");
define("_ZOOM_ALERT_PCLZIPERROR","Fehler beim Entpacken des Archivs.");
define("_ZOOM_ALERT_INDEXERROR","Fehler beim Indizieren des Dokuments.");
define("_ZOOM_ALERT_IMGFOUND","Medien gefunden.");
define("_ZOOM_INFO_CHECKCAT","Bitte w&auml;hle erst ein Album, bevor Du den Hochladen-Knopf benutzt!");
define("_ZOOM_BUTTON_ADDIMAGES","Medien hinzuf&uuml;gen");
define("_ZOOM_BUTTON_REMIMAGES","Medien entfernen");
define("_ZOOM_INFO_PROCESSING","Verabeitung der Medien:");
define("_ZOOM_ITEMEDIT_TAB1","Eigenschaften");
define("_ZOOM_ITEMEDIT_TAB2","Mitglieder");
define("_ZOOM_ITEMEDIT_TAB3","Aktionen");
define("_ZOOM_USERSLIST_LINE1",">>W&auml;hle Mitglieder f&uuml;r diesen Bereich<<");
define("_ZOOM_USERSLIST_ALLOWALL",">>Allg. Zugriff<<");
define("_ZOOM_USERSLIST_MEMBERSONLY",">>Nur f&uuml;r Mitglieder<<");
define("_ZOOM_PUBLISHED","Ver&ouml;ffentlicht");
define("_ZOOM_SHARED","Dieses Album freigeben");
define("_ZOOM_ROTATE","Drehe das Media um 90 Grad");
define("_ZOOM_CLOCKWISE","im Uhrzeigersinn");
define("_ZOOM_CCLOCKWISE","gegen den Uhrzeigersinn");
define("_ZOOM_FLIP_HORIZ","Media horizontal spiegeln");
define("_ZOOM_FLIP_VERT","Media vertikal spiegeln");
define("_ZOOM_PROGRESS_DESCR","Die Anfrage wird bearbeitet... Bitte warten.");

//Navigation (including Slideshow buttons)
define("_ZOOM_SLIDESHOW","Diashow:");
define("_ZOOM_PREV_IMG","vorheriges Media");
define("_ZOOM_NEXT_IMG","n&auml;chstes Media");
define("_ZOOM_FIRST_IMG","erstes Media");
define("_ZOOM_LAST_IMG","letztes Media");
define("_ZOOM_PLAY","abspielen");
define("_ZOOM_STOP","stop");
define("_ZOOM_RESET","zur&uuml;cksetzen");
define("_ZOOM_FIRST","Erstes");
define("_ZOOM_LAST","Letztes");
define("_ZOOM_PREVIOUS","Vorherige");
define("_ZOOM_NEXT","N&auml;chste");
define("_ZOOM_IN_DESC", "Gehe &uuml;ber das Media klicke mit der Maus.");

//Gallery actions
define("_ZOOM_SEARCH_BOX","Schnellsuche...");
define("_ZOOM_ADVANCED_SEARCH","Erweiterte Suche");
define("_ZOOM_SEARCH_KEYWORD","Suche nach Schl&uuml;sselwort");
define("_ZOOM_IMAGES","Medien");
define("_ZOOM_IMGFOUND","%s Medien gefunden - Du bist auf Seite %S von %s");
define("_ZOOM_SUBGALLERIES","Unter-Album");
define("_ZOOM_ALERT_COMMENTOK","Dein Kommentar wurde erfolgreich gespeichert!");
define("_ZOOM_ALERT_COMMENTERROR","Du hast dieses Media bereits kommentiert!");
define("_ZOOM_ALERT_VOTE_OK","Deine Bewertung wurde gespeichert! Dankesch&ouml;n!");
define("_ZOOM_ALERT_VOTE_ERROR","Du hast dieses Media bereits bewertet!");
define("_ZOOM_WINDOW_CLOSE","Schlie&szlig;en");
define("_ZOOM_NOPICS","Keine Medien im Album vorhanden");
define("_ZOOM_PROPERTIES","Eigenschaften");
define("_ZOOM_COMMENTS","Kommentare");
define("_ZOOM_NO_COMMENTS","Keine Kommentare bisher.");
define("_ZOOM_YOUR_NAME","Name");
define("_ZOOM_ADD","hinzuf&uuml;gen");
define("_ZOOM_NAME","Name");
define("_ZOOM_DATE","Datum");
define("_ZOOM_UNAME","Hinzugef&uuml;gt von");
define("_ZOOM_DESCRIPTION","Beschreibung");
define("_ZOOM_IMGNAME","Name");
define("_ZOOM_FILENAME","Dateiname");
define("_ZOOM_CLICKDOCUMENT","(zum &Ouml;ffnen auf Dateinamen klicken)");
define("_ZOOM_KEYWORDS","Schl&uuml;sselw&ouml;rter");
define("_ZOOM_HITS","Aufrufe");
define("_ZOOM_CLOSE","Schlie&szlig;en");
define("_ZOOM_NOIMG", "Keine Medien gefunden!");
define("_ZOOM_NONAME", "Sie m&uuml;ssen einen Namen angeben!");
define("_ZOOM_NOCAT", "Kein Album ausgew&auml;hlt!");
define("_ZOOM_EDITPIC", "Media bearbeiten");
define("_ZOOM_SETCATIMG","Als Albumbild festlegen");
define("_ZOOM_SETPARENTIMG","Als Albumbild des dar&uuml;berliegenden Albums festlegen");
define("_ZOOM_PASS","Passwort");
define("_ZOOM_PASS_REQUIRED","Dieses Album ben&ouml;tigt ein Passwort.<br>Bitte gib das Passwort ein<br>und dr&uuml;cke den Weiter-Knopf. Dankesch&ouml;n!");
define("_ZOOM_PASS_BUTTON","Weiter");
define("_ZOOM_PASS_GALLERY","Passwort");
define("_ZOOM_PASS_INNCORRECT","Passwort falsch");

//Lightbox
define("_ZOOM_LIGHTBOX","Lightbox");
define("_ZOOM_LIGHTBOX_GALLERY","Dieses Album in die Lightbox!");
define("_ZOOM_LIGHTBOX_ITEM","Diese Datei in die Lightbox!");
define("_ZOOM_LIGHTBOX_VIEW","Lightbox anschauen");
define("_ZOOM_YOUR_LIGHTBOX","Ihr Lightbox Inhalt:");
define("_ZOOM_LIGHTBOX_EMPTY","Ihre Lightbox ist leer.");
define("_ZOOM_LIGHTBOX_ZIPBTN","ZIP-Datei erstellen");
define("_ZOOM_LIGHTBOX_PLAYLISTBTN","Playliste erstellen & abspielen");
define("_ZOOM_LIGHTBOX_CATS","Alben");
define("_ZOOM_LIGHTBOX_TITLEDESCR","Titel &amp; Beschreibung");
define("_ZOOM_ACTION","Ausf&uuml;hren");
define("_ZOOM_LIGHTBOX_ADDED","Datei erfolgreich zu Ihrer Lightbox hinzugef&uuml;gt!");
define("_ZOOM_LIGHTBOX_NOTADDED","Fehler beim Einf&uuml;gen in die Lightbox!");
define("_ZOOM_LIGHTBOX_EDITED","Datei erfolgreich editiert!");
define("_ZOOM_LIGHTBOX_NOTEDITED","Fehler beim Editieren der Datei!");
define("_ZOOM_LIGHTBOX_DEL","Datei erfolgreich aus der Lightbox entfernt!");
define("_ZOOM_LIGHTBOX_NOTDEL","Fehler beim Enfernen der Datei aus der Lightbox!");
define("_ZOOM_LIGHTBOX_NOZIP","Du hast schon eine ZIP-Datei in Deiner Lightbox erstellt!");
define("_ZOOM_LIGHTBOX_PARSEZIP","F&uuml;ge Medien aus Album ein...");
define("_ZOOM_LIGHTBOX_DOZIP","Erstelle ZIP-Datei...");
define("_ZOOM_LIGHTBOX_DLHERE","Du kannst nun die Lightbox herunterladen");
define("_ZOOM_LIGHTBOX_PLSUCCESS","Playliste erfolgreich erstellt! Du mu&szlig;t das Playerfenster jetzt aktualisieren.");
define("_ZOOM_LIGHTBOX_PLERROR","Fehler beim erstellen der Playliste.");
define("_ZOOM_LIGHTBOX_NOAUDIO","Du mu&szlig;t erst Audiodateien in Deine Lightbox legen!");
define("_ZOOM_LIGHTBOX_NOITEMS","Deine Lightbox scheint leer zu sein.");

//EXIF information
define("_ZOOM_EXIF","EXIF");
define("_ZOOM_EXIF_SHOWHIDE","Zeige/ verberge EXIF-info");

//MP3 id3 v1.1 or later information
define("_ZOOM_AUDIO_PLAYING","gerade spielt:");
define("_ZOOM_AUDIO_CLICKTOPLAY","Klicke hier zum abspielen.");
define("_ZOOM_ID3","ID3");
define("_ZOOM_ID3_SHOWHIDE","Zeige/ verberge ID3-tag Informationen");
define("_ZOOM_ID3_LENGTH","L&auml;nge");
define("_ZOOM_ID3_QUALITY","Qualit&auml;t");
define("_ZOOM_ID3_TITLE","Titel");
define("_ZOOM_ID3_ARTIST","Interpret");
define("_ZOOM_ID3_ALBUM","Album");
define("_ZOOM_ID3_YEAR","Jahr");
define("_ZOOM_ID3_COMMENT","Kommentar");
define("_ZOOM_ID3_GENRE","Genre");

//Video metadata information
define("_ZOOM_VIDEO_SHOWHIDE","Zeige/verstecke Videoeigenschaften");
define("_ZOOM_VIDEO_PIXELRATIO","Pixelverh&auml;ltnis");
define("_ZOOM_VIDEO_QUALITY","Videoqualit&auml;t");
define("_ZOOM_VIDEO_AUDIOQUALITY","Audioqualit&auml;t");
define("_ZOOM_VIDEO_CODEC","Codec");
define("_ZOOM_VIDEO_RESOLUTION","Aufl&ouml;sung");

//rating
define("_ZOOM_RATING","Bewertung");
define("_ZOOM_NOTRATED","Keine Bewertungen verf&uuml;gbar!");
define("_ZOOM_VOTE","Stimme");
define("_ZOOM_VOTES","Stimmen");
define("_ZOOM_RATE0","schlecht");
define("_ZOOM_RATE1","nicht so toll");
define("_ZOOM_RATE2","befriedigend");
define("_ZOOM_RATE3","gut");
define("_ZOOM_RATE4","sehr gut");
define("_ZOOM_RATE5","perfekt!");

//special
define("_ZOOM_TOPTEN","Die Besten 10");
define("_ZOOM_LASTSUBM","Zuletzt &uuml;bermittelt");
define("_ZOOM_LASTCOMM","Zuletzt kommentiert");
define("_ZOOM_SEARCHRESULTS","Suchergebnisse");
define("_ZOOM_TOPRATED","Am Besten bewertet");

//ecard
define("_ZOOM_ECARD_SENDAS","Sende dieses Media als E-Card an einen Freund!");
define("_ZOOM_ECARD_YOURNAME","Dein Name");
define("_ZOOM_ECARD_YOUREMAIL","Deine E-Mail Addresse");
define("_ZOOM_ECARD_FRIENDSNAME","Name Deines Freundes");
define("_ZOOM_ECARD_FRIENDSEMAIL","E-Mail Addresse Deines Freundes");
define("_ZOOM_ECARD_MESSAGE","Nachricht");
define("_ZOOM_ECARD_SENDCARD","Sende E-Card");
define("_ZOOM_ECARD_SUCCESS","Deine E-Card wurde erfolgreich versandt.");
define("_ZOOM_ECARD_CLICKHERE","Klicke hier um die E-Card zu sehen!");
define("_ZOOM_ECARD_ERROR","Fehler beim Versenden.");
define("_ZOOM_ECARD_TURN","R&uuml;ckseite ansehen");
define("_ZOOM_ECARD_TURN2","Vorderseite ansehen");
define("_ZOOM_ECARD_SENDER","An Dich gesandt von:");
define("_ZOOM_ECARD_SUBJ","Du hast eine E-Card erhalten von:");
define("_ZOOM_ECARD_MSG1","hat Dir eine E-Card geschickt von");
define("_ZOOM_ECARD_MSG2","Klicke auf den Link darunter, um Deine pers&ouml;nliche E-Card zu sehen");
define("_ZOOM_ECARD_MSG3","Bitte nicht auf diese E-Mail antworten, da diese automatisch erstellt wurde!");
define("_ZOOM_ECARD_ECARDEXPIRED","Diese eCard gibt es nicht mehr!");

//installation-screen
define ('_ZOOM_INSTALL_CREATE_DIR','zOOm Installation versucht das Medienverzeichnis zu erstellen "images/zoom" ...');
define ('_ZOOM_INSTALL_CREATE_DIR_SUCC','fertig!');
define ('_ZOOM_INSTALL_CREATE_DIR_FAIL','fehlgeschlagen!');
define ('_ZOOM_INSTALL_MESS1','zOOm Media Gallery wurde erfolgreich installiert.<br>Du kannst nun Deine Fotos und Alben ver&ouml;ffentlichen!');
define ('_ZOOM_INSTALL_MESS2','Anmerkung: Das erste, was Du jetzt tun solltest ist, in das Componenten Men&uuml; zu wechseln.<br>Suche nach dem Eintrag "zOOm Media Gallery Admin", anklicken und in die <br>Einstellungen wechseln.');
define ('_ZOOM_INSTALL_MESS3','Hier kannst Du alle Parameter f&uuml;r zOOm &auml;ndern.');
define ('_ZOOM_INSTALL_MESS4','Vergiss nicht ein Album zu erstellen');
define ('_ZOOM_INSTALL_MESS_FAIL1','zOOM Media Gallery konnte nicht erfolgreich installiert werden!');
define ('_ZOOM_INSTALL_MESS_FAIL2','Folgende Verzeichnisse m&uuml;ssen noch erstellt werden und ben&ouml;tigen die Rechte "0777":<br />'
. '"images/zoom"<br />'
. '/components/com_zoom/images"<br />'
. '"/components/com_zoom/admin"<br />'
. '"/components/com_zoom/classes"<br />'
. '"/components/com_zoom/images"<br />'
. '"/components/com_zoom/images/admin"<br />'
. '"/components/com_zoom/images/filetypes"<br />'
. '"/components/com_zoom/images/rating"<br />'
. '"/components/com_zoom/images/smilies"<br />'
. '"/components/com_zoom/language"<br />'
. '"/components/com_zoom/tabs"');
define ('_ZOOM_INSTALL_MESS_FAIL3','Wenn Du diese Verzeichnisse eingerichtet hast, gehe zu <br /> "Components -> zOOm Media Gallery" und &auml;ndere die Einstellungen.');
?>
