<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: dutch.php                                                 |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOm Media Gallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
//Language translation
define("_ZOOM_DATEFORMAT","%d.%m.%Y %H:%M"); // gebruikt de PHP strftime format, meer info op http://www.php.net
define("_ZOOM_ISO","iso-8859-1");
define("_ZOOM_PICK","Kies een galerij");
define("_ZOOM_DELETE","Verwijder");
define("_ZOOM_BACK","Ga Terug");
define("_ZOOM_MAINSCREEN","Hoofdscherm");
define("_ZOOM_BACKTOGALLERY","Terug naar galerij");
define("_ZOOM_INFO_DONE","klaar!");
define("_ZOOM_TOOLTIP", "zOOm ToolTip");
define("_ZOOM_WARNING", "zOOm Waarschuwing!");

//Gallery admin page
define("_ZOOM_ADMINSYSTEM","Admin Systeem");
define("_ZOOM_USERSYSTEM","Gebruiker Systeem");
define("_ZOOM_ADMIN_TITLE","Mediagalerij Administratie Systeem");
define("_ZOOM_USER_TITLE","Mediagalerij Gebruiker Systeem");
define("_ZOOM_CATSMGR","Galerij Beheer");
define("_ZOOM_CATSMGR_DESCR","maak nieuwe galerijen aan voor uw nieuwe media, bewerk en verwijder ze hier in Galerij Beheer.");
define("_ZOOM_NEW","Nieuwe galerij");
define("_ZOOM_DEL","Verwijder galerij");
define("_ZOOM_MEDIAMGR","Media Beheer");
define("_ZOOM_MEDIAMGR_DESCR","verplaats, bewerk, verwijder, scan media of upload zelf uw nieuwe media handmatig.");
define("_ZOOM_UPLOAD","Upload bestand(en)");
define("_ZOOM_EDIT","Bewerk galerij");
define("_ZOOM_ADMIN_CREATE","Database aanmaken");
define("_ZOOM_ADMIN_CREATE_DESCR","maak de benodigde tabellen aan, zodat u kunt beginnen de Galerij te gebruiken.");
define("_ZOOM_HD_PREVIEW","Voorbeeld");
define("_ZOOM_HD_CHECKALL","Markeer/Demarkeer Alle");
define("_ZOOM_HD_CREATEDBY","Gemaakt door");
define("_ZOOM_HD_AFTER","Toevoegen na");
define("_ZOOM_HD_HIDEMSG","'geen media'-tekst verbergen");
define("_ZOOM_HD_NAME","Naam galerij");
define("_ZOOM_HD_DIR","Map");
define("_ZOOM_HD_NEW","Nieuwe galerij aanmaken");
define("_ZOOM_HD_SHARE","Deel galerij");
define("_ZOOM_SHARE","Delen");
define("_ZOOM_UNSHARE","Niet Delen");
define("_ZOOM_PUBLISH","Publiceer");
define("_ZOOM_UNPUBLISH","De-Publiceer");
define("_ZOOM_TOPLEVEL","Hoogste niveau");
define("_ZOOM_HD_UPLOAD","Bestand uploaden");
define("_ZOOM_A_ERROR_ERRORTYPE","Error type");
define("_ZOOM_A_ERROR_IMAGENAME","Media naam");
define("_ZOOM_A_ERROR_NOFFMPEG","<u>FFmpeg</u> niet beschikbaar");
define("_ZOOM_A_ERROR_NOPDFTOTEXT","<u>PDFtoText</u> niet beschikbaar");
define("_ZOOM_A_ERROR_NOTINSTALLED","Niet geinstalleerd");
define("_ZOOM_A_ERROR_CONFTODB","Error tijdens wegschrijven van configuratie!");
define("_ZOOM_A_MESS_NOT_SHURE","* Als u niet zeker bent, vul dan \"auto\" in ");
define("_ZOOM_A_MESS_SAFEMODE1","NB: \"Safe Mode\" is geactiveerd, waardoor het mogelijk is dat het downloaden/ uploaden van grotere bestanden fouten oplevert!<br />U kunt naar de FTP-Modus inschakelen in het Admin-systeem.");
define("_ZOOM_A_MESS_SAFEMODE2","NB: \"Safe Mode\" is geactiveerd, waardoor het mogelijk is dat het downloaden/ uploaden van grotere bestanden fouten oplevert!!<br />zOOm raad u aan de FTP-Modus in te schakelen in het Admin Systeem.");
define("_ZOOM_A_MESS_PROCESSING_FILE","Bestand verwerken...");
define("_ZOOM_A_MESS_NOTOPEN_URL","Kon url niet openen:");
define("_ZOOM_A_MESS_PARSE_URL","Parsen van \"%s\" voor media... "); // %s = $url
define("_ZOOM_A_MESS_NOJAVA","Als u hierboven enkel een grijs vlak ziet of problemen heeft met uploaden, kan het zijn dat<br />de meest recente java run-time niet geinstalleerd hebt. Ga naar <a href=\"http://www.java.com\" target=\"_blank\">Java.com</a> <br /> en download de laatste versie.");
define("_ZOOM_SETTINGS","Instellingen");
define("_ZOOM_SETTINGS_DESCR","u kunt hier alle configuratie-instellingen bekijken en wijzigen.");
define("_ZOOM_SETTINGS_TAB1","Systeem");
define("_ZOOM_SETTINGS_TAB2","Images");
define("_ZOOM_SETTINGS_TAB3","Weergave");
//Tab 4 is Module
define("_ZOOM_SETTINGS_TAB5","Safe Mode");
define("_ZOOM_SETTINGS_TAB6","Gebruikerstoegang");
define("_ZOOM_SETTINGS_CONVTYPE","Afbeelding Conversietype");
define("_ZOOM_SETTINGS_AUTODET","auto-gedetecteerd: ");
define("_ZOOM_SETTINGS_IMGPATH","Locatie van media:");
define("_ZOOM_SETTINGS_TTIMGPATH","Huidige locatie van media is ");
define("_ZOOM_SETTINGS_CONVSETTINGS","Media conversie instellingen:");
define("_ZOOM_SETTINGS_IMPATH","Locatie van ImageMagick: ");
define("_ZOOM_SETTINGS_NETPBMPATH"," of NetPBM: ");
define("_ZOOM_SETTINGS_FFMPEGPATH","Locatie van FFmpeg");
define("_ZOOM_SETTINGS_FFMPEGTOOLTIP","FFmpeg is benodigd om thumbnails te kunnen maken van uw video bestanden.");
define("_ZOOM_SETTINGS_PDFTOTEXTPATH","Locatie van PDFtoText");
define("_ZOOM_SETTINGS_XPDFTOOLTIP","pdf2text, welke een onderdeel is van het Xpdf pakket, is benodigd voor het indexeren van PDF bestanden.");
define("_ZOOM_SETTINGS_MAXSIZE","Afbeelding max. breedte: ");
define("_ZOOM_SETTINGS_THUMBSETTINGS","Thumbnail instellingen:");
define("_ZOOM_SETTINGS_QUALITY","NetPBM en GD2 JPEG kwaliteit: ");
define("_ZOOM_SETTINGS_SIZE","Thumbnail max. breedte: ");
define("_ZOOM_SETTINGS_TEMPNAME","Tijdelijke Naam: ");
define("_ZOOM_SETTINGS_AUTONUMBER","auto-nummer medianamen (bijv. 1,2,3)");
define("_ZOOM_SETTINGS_TEMPDESCR","Tijdelijke omschrijving: ");
define("_ZOOM_SETTINGS_TITLE","Titel Media galerij:");
define("_ZOOM_SETTINGS_SUBCATSPG","Aantal sub-galerij kolommen");
define("_ZOOM_SETTINGS_COLUMNS","Aantal thumbnail kolommen");
define("_ZOOM_SETTINGS_THUMBSPG","Thumbs per pagina");
define("_ZOOM_SETTINGS_CMTLENGTH", "Max. lengte commentaar");
define("_ZOOM_SETTINGS_CHARS","tekens");
define("_ZOOM_SETTINGS_GALLERYPREFIX","Galerij-naam prefix");
define("_ZOOM_SETTINGS_SHOWOCCSPACE","Geef gebruikte ruimte weer in Media Manager");
define("_ZOOM_SETTINGS_FEATURES_TITLE","Functies AAN/ UIT");
define("_ZOOM_SETTINGS_CSS_TITLE","Edit Stylesheets");
define("_ZOOM_SETTINGS_DISPLAY_TITLE","Weergave data AAN/ UIT");
define("_ZOOM_SETTINGS_COMMENTS","Commentaar");
define("_ZOOM_SETTINGS_POPUP","PopUp Media");
define("_ZOOM_SETTINGS_CATIMG","Galerij afbeelding");
define("_ZOOM_SETTINGS_SLIDESHOW","Slideshow");
define("_ZOOM_SETTINGS_ZOOMLOGO","zOOm-logo weergeven");
define("_ZOOM_SETTINGS_SHOWHITS","Aantal hits weergeven");
define("_ZOOM_SETTINGS_READEXIF","Lees EXIF-data");
define("_ZOOM_SETTINGS_EXIFTOOLTIP","Deze optie laat extra EXIF en andere IPTC info weergeven. De EXIF module voor PHP hoeft niet geintalleerd te worden.");
define("_ZOOM_SETTINGS_READID3","Lees mp3 ID3-data");
define("_ZOOM_SETTINGS_ID3TOOLTIP","Deze optie laat extra ID3 v1.1 en v2.0 data weergeven tijdens het bekijken van de details van een mp3 bestand.");
define("_ZOOM_SETTINGS_RATING","Stemmen");
define("_ZOOM_SETTINGS_CSS","Pop-up venster");
define("_ZOOM_SETTINGS_CSSZOOM","zOOm galerij &amp; medium views");
define("_ZOOM_SETTINGS_SUCCESS","Configuratie succesvol opgeslagen!");
define("_ZOOM_SETTINGS_ZOOMING","Zoom afbeelding");
define("_ZOOM_SETTINGS_ORDERBY","Thumbnail sorteer methode; sorteren op");
define("_ZOOM_SETTINGS_CATORDERBY","(sub-)Galerij sorteer methode; sorteren op");
define("_ZOOM_SETTINGS_DATE_ASC","DATUM, oplopend");
define("_ZOOM_SETTINGS_DATE_DESC","DATUM, aflopend");
define("_ZOOM_SETTINGS_FLNM_ASC","BESTANDSNAAM, oplopend");
define("_ZOOM_SETTINGS_FLNM_DESC","BESTANDSNAAM, aflopend");
define("_ZOOM_SETTINGS_NAME_ASC","NAAM, oplopend");
define("_ZOOM_SETTINGS_NAME_DESC","NAAM, aflopend");
define("_ZOOM_SETTINGS_LBTOOLTIP","Een lightbox is een soort winkelwagentje gevuld met media geselecteerd door de gebruiker. Deze kunnen ineens worden gedownload in ZIP-formaat.");
define("_ZOOM_SETTINGS_SHOWNAME","Naam weergeven");
define("_ZOOM_SETTINGS_SHOWDESCR","Omschrijving weergeven");
define("_ZOOM_SETTINGS_SHOWKEYWORDS","Sleutelwoorden weergeven");
define("_ZOOM_SETTINGS_SHOWDATE","Datum weergeven");
define("_ZOOM_SETTINGS_SHOWUNAME","Gebruikersnaam weergeven");
define("_ZOOM_SETTINGS_SHOWFILENAME","Bestandsnaam weergeven");
define("_ZOOM_SETTINGS_METABOX","Box weergeven met media-info op galerij pagina");
define("_ZOOM_SETTINGS_METABOXTOOLTIP","Deselecteer deze optie om de snelheid van uw galerij te verbeteren.");
define("_ZOOM_SETTINGS_ECARDS","E-cards");
define("_ZOOM_SETTINGS_ECARDS_LIFETIME","E-cards geldigheid");
define("_ZOOM_SETTINGS_ECARDS_ONEWEEK","een week");
define("_ZOOM_SETTINGS_ECARDS_TWOWEEKS","twee weken");
define("_ZOOM_SETTINGS_ECARDS_ONEMONTH","een maand");
define("_ZOOM_SETTINGS_ECARDS_THREEMONTHS","drie maanden");
define("_ZOOM_SETTINGS_SHOWSEARCH","Zoek-veld op alle pagina's");
define("_ZOOM_SETTINGS_BOX_ANIMATE","Box animatie");
define("_ZOOM_SETTINGS_BOX_PROPERTIES","'Eigenschappen' box zichtbaarheid");
define("_ZOOM_SETTINGS_BOX_META","'Metadata' box zichtbaarheid");
define("_ZOOM_SETTINGS_BOX_COMMENTS","'Commentaar' box zichtbaarheid");
define("_ZOOM_SETTINGS_BOX_RATING","'Waardering' box zichtbaarheid");
define("_ZOOM_SETTINGS_SETMENUOPTION","Laat 'Upload Media' link in User Menu zien");
define("_ZOOM_SETTINGS_USEFTP","Gebruik FTP modus?");
define("_ZOOM_SETTINGS_FTPHOST","Host naam");
define("_ZOOM_SETTINGS_FTPUNAME","Gebruikersnaam");
define("_ZOOM_SETTINGS_FTPPASS","Wachtwoord");
define("_ZOOM_SETTINGS_FTPWARNING","Waarschuwing: Opslag van het Wachtwoord is onbeveiligd!");
define("_ZOOM_SETTINGS_FTPHOSTDIR","Directory op host");
define("_ZOOM_SETTINGS_MESS_FTPHOSTDIR","Vul hier het pad naar uw Joomla! installatie in vanaf uw ftp-root.");
define("_ZOOM_SETTINGS_GROUP","Groep"); //added: 16-08
define("_ZOOM_SETTINGS_PRIV_DESCR","U kunt de privileges van elke gebruikersgroep in Joomla! veranderen en daarmee de privileges van
    elke gebruiker die lid is van deze groep!<br />
    Een gebruiker kan, in theorie, de volgende acties uitvoeren: bestand(en) uploaden, media bewerken/ verwijderen, galerij(en) aanmaken/ bewerken/ verwijderen.<br />
    Wat zij mogen in de praktijk is aan u."); //added: 16-08
define("_ZOOM_SYSTEM_TITLE","Systeem Configuraties");
define("_ZOOM_YES","ja");
define("_ZOOM_NO","nee");
define("_ZOOM_VISIBLE","zichtbaar");
define("_ZOOM_HIDDEN","verborgen");
define("_ZOOM_SAVE","Opslaan");
define("_ZOOM_RESET","Reset");
define("_ZOOM_MOVEFILES","Verplaats media");
define("_ZOOM_BUTTON_MOVE","Verplaats");
define("_ZOOM_ALERT_MOVE","%s media succevol verplaatst, %s media konden niet verplaatst worden.");
define("_ZOOM_MOVEFILES_STEP1","Selecteer de doelgalerij & verplaats de media");
define("_ZOOM_OPTIMIZE","Optimaliseer tabellen");
define("_ZOOM_OPTIMIZE_DESCR","zOOm Media Gallery gebruikt haar tabellen regelmatig en laat overhead data, oftewel 'afval data', achter. Klik hier om dit afval te verwijderen.");
define("_ZOOM_OPTIMIZE_SUCCESS","zOOm Media Gallery tabellen geoptimaliseerd!");
define("_ZOOM_UPDATE","Update zOOm Media Gallery");
define("_ZOOM_UPDATE_DESCR","voeg nieuwe functionaliteit toe, los problemen op en verhelp bugs! Check <a href=\"http://www.zoomfactory.org\" target=\"_blank\">www.zoomfactory.org</a> voor de meest recente update!");
define("_ZOOM_UPDATE_XMLDATE","Datum van laatste update");
define("_ZOOM_UPDATE_NOUPDATES","no updates yet!");
define("_ZOOM_UPDATE_PACKAGE","Update ZIP bestand: ");
define("_ZOOM_CREDITS","zOOm Media Gallery info & Credits");

//Image actions
define("_ZOOM_DISKSPACEUSAGE","Schijfruimte dat %s verbruikt op dit moment");
define("_ZOOM_UPLOAD_SINGLE","enkel (ZIP-)bestand");
define("_ZOOM_UPLOAD_MULTIPLE","meerdere bestanden");
define("_ZOOM_UPLOAD_DRAGNDROP","Drag n Drop");
define("_ZOOM_UPLOAD_SCANDIR","scan directory");
define("_ZOOM_UPLOAD_INTRO","Klik op de knop <b>Bladeren</b> om een medium te selecteren.");
define("_ZOOM_UPLOAD_STEP1","1. Selecteer het aantal bestanden dat u wilt uploaden: ");
define("_ZOOM_UPLOAD_STEP2","2. Selecteer de galerij voor uw media: ");
define("_ZOOM_UPLOAD_STEP3","3. Gebruik de knop Bladeren om media te vinden op uw computer.");
define("_ZOOM_SCAN_STEP1","Stap 1: geef een lokatie om te scannen naar media...");
define("_ZOOM_SCAN_STEP2","Stap 2: selecteer de media die u wilt uploaden...");
define("_ZOOM_SCAN_STEP3","Stap 3: zOOm verwerkt de opgegeven media...");
define("_ZOOM_SCAN_STEP1_DESCR","De lokatie mag zowel een URL als een directory zijn op de server.<br />&nbsp;   Tip: FTP media naar een directory op uw server en vul hier de lokatie in!");
define("_ZOOM_SCAN_STEP2_DESCR1","zOOm verwerkt");
define("_ZOOM_SCAN_STEP2_DESCR2","als een lokale directory");
define("_ZOOM_FORMCREATE_SHOWPIC","Afbeelding weergeven op album-pagina");
define("_ZOOM_FORM_IMAGEFILE","Medium");
define("_ZOOM_FORM_IMAGEFILTER","Ondersteunde media extensies");
define("_ZOOM_FORM_INGALLERY","In galerij");
define("_ZOOM_FORM_SETFILENAME","Sla media op met de oorspronkelijke bestandsnaam als naam.");
define("_ZOOM_FORM_IGNORESIZES","Negeer vastgestelde maximum afbeeldingsdimensies");
define("_ZOOM_FORM_LOCATION","Locatie");
define("_ZOOM_BUTTON_SCAN","Scan URL of directory");
define("_ZOOM_BUTTON_UPLOAD","Uploaden");
define("_ZOOM_BUTTON_EDIT","Wijzig");
define("_ZOOM_BUTTON_CREATE","Aanmaken");
define("_ZOOM_CONFIRM_DEL","Deze optie verwijdert een galerij, inclusief uw media!\\nWilt u doorgaan?");
define("_ZOOM_CONFIRM_DELMEDIUM","U staat op het punt dit medium te verwijderen!\\nWilt u doorgaan?");
define("_ZOOM_ALERT_DEL","De galerij is verwijderd!");
define("_ZOOM_ALERT_NOCAT","Geen galerij geselecteerd!");
define("_ZOOM_ALERT_NOMEDIA","Geen media geselecteerd!");
define("_ZOOM_ALERT_EDITOK","De gegevens van de galerij zijn gewijzigd!");
define("_ZOOM_ALERT_NEWGALLERY","Nieuwe galerij aangemaakt.");
define("_ZOOM_ALERT_NONEWGALLERY","Aanmaken mislukt!");
define("_ZOOM_ALERT_EDITIMG","Eigenschappen van het medium succesvol opgeslagen.");
define("_ZOOM_ALERT_DELPIC","De media zijn succesvol verwijderd.");
define("_ZOOM_ALERT_NODELPIC","Het medium kon niet worden verwijderd!");
define("_ZOOM_ALERT_NOPICSELECTED","Geen medium geselecteerd.");
define("_ZOOM_ALERT_NOPICSELECTED_MULT","Geen media geselecteerd.");
define("_ZOOM_ALERT_UPLOADOK","Medium succesvol geupload!");
define("_ZOOM_ALERT_UPLOADSOK","media succesvol geupload!");
define("_ZOOM_ALERT_WRONGFORMAT","Verkeerde bestandsformaat.");
define("_ZOOM_ALERT_WRONGFORMAT_MULT","Verkeerde bestandsformaat.");
define("_ZOOM_ALERT_IMGERROR","Fout tijdens wijzigen afbeeldingsgrootte/ aanmaken thumbnail");
define("_ZOOM_ALERT_PCLZIPERROR","Fout bij uitpakken van archief.");
define("_ZOOM_ALERT_INDEXERROR","Fout bij indexeren van document.");
define("_ZOOM_ALERT_IMGFOUND","media gevonden.");
define("_ZOOM_INFO_CHECKCAT","Kies a.u.b. eerst een galerij, voor u begint met uploaden!");
define("_ZOOM_BUTTON_ADDIMAGES","Media toevoegen");
define("_ZOOM_BUTTON_REMIMAGES","Afb. verwijderen");
define("_ZOOM_INFO_PROCESSING","Medium verwerken:");
define("_ZOOM_ITEMEDIT_TAB1","Eigenschappen");
define("_ZOOM_ITEMEDIT_TAB2","Leden");
define("_ZOOM_ITEMEDIT_TAB3","Handelingen");
define("_ZOOM_USERSLIST_LINE1",">>Selecteer leden voor dit item<<");
define("_ZOOM_USERSLIST_ALLOWALL",">>Publieke toegang<<");
define("_ZOOM_USERSLIST_MEMBERSONLY",">>Alleen leden<<");
define("_ZOOM_PUBLISHED","Gepubliceerd");
define("_ZOOM_SHARED","Gedeeld");
define("_ZOOM_ROTATE","Afbeelding 90 graden draaien");
define("_ZOOM_CLOCKWISE","rechtsom");
define("_ZOOM_CCLOCKWISE","linksom");
define("_ZOOM_FLIP_HORIZ","Flip afbeelding horizontaal");
define("_ZOOM_FLIP_VERT","Flip afbeelding verticaal");
define("_ZOOM_PROGRESS_DESCR","Uw verzoek wordt verwerkt... Een moment geduld a.u.b.");

//Navigation (including Slideshow buttons and reset-link)
define("_ZOOM_SLIDESHOW","Slideshow:");
define("_ZOOM_PREV_IMG","vorige medium");
define("_ZOOM_NEXT_IMG","volgende medium");
define("_ZOOM_FIRST_IMG","eerste medium");
define("_ZOOM_LAST_IMG","laatste medium");
define("_ZOOM_PLAY","afspelen");
define("_ZOOM_STOP","stop");
define("_ZOOM_RESET","herstel");
define("_ZOOM_FIRST","Eerste");
define("_ZOOM_LAST","Laatste");
define("_ZOOM_PREVIOUS","Vorige");
define("_ZOOM_NEXT","Volgende");
define("_ZOOM_IN_DESC", "beweeg met de muis over de afbeelding.");

//Gallery actions
define("_ZOOM_SEARCH_BOX","Snelzoeken...");
define("_ZOOM_ADVANCED_SEARCH","Geavanceerd zoeken");
define("_ZOOM_SEARCH_KEYWORD","Zoeken naar Sleutelwoord");
define("_ZOOM_IMAGES","media");
define("_ZOOM_IMGFOUND","%s media gevonden - u bent op pagina %s van %s");
define("_ZOOM_SUBGALLERIES","sub-galerij(en)");
define("_ZOOM_ALERT_COMMENTOK","Uw commentaar is nu toegevoegd!");
define("_ZOOM_ALERT_COMMENTERROR","U heeft al commentaar gegeven op dit medium!");
define("_ZOOM_ALERT_VOTE_OK","Uw stem is meegeteld! Dank u.");
define("_ZOOM_ALERT_VOTE_ERROR","U heeft al gestemd voor dit medium!");
define("_ZOOM_WINDOW_CLOSE","Sluiten");
define("_ZOOM_NOPICS","Geen media in de galerij aanwezig");
define("_ZOOM_PROPERTIES","Eigenschappen");
define("_ZOOM_COMMENTS","Commentaar");
define("_ZOOM_NO_COMMENTS","Nog geen commentaar toegevoegd.");
define("_ZOOM_YOUR_NAME","Naam");
define("_ZOOM_ADD","Toevoegen");
define("_ZOOM_HITS","hits");
define("_ZOOM_NAME","Naam");
define("_ZOOM_KEYWORDS","Sleutelwoorden");
define("_ZOOM_DATE","Datum toegevoegd");
define("_ZOOM_UNAME","Toegevoegd door");
define("_ZOOM_DESCRIPTION","Omschrijving");
define("_ZOOM_IMGNAME","Naam");
define("_ZOOM_FILENAME","Bestandsnaam");
define("_ZOOM_CLICKDOCUMENT","(klik op de bestandsnaam om het document te openen)");
define("_ZOOM_CLOSE","Sluiten");
define("_ZOOM_NOIMG", "Geen media gevonden!");
define("_ZOOM_NONAME", "U moet een naam opgeven!");
define("_ZOOM_NOCAT", "Selecteer a.u.b. een Galerij!");
define("_ZOOM_EDITPIC", "Bewerk Medium");
define("_ZOOM_SETCATIMG","Instellen als galerij-afbeelding");
define("_ZOOM_SETPARENTIMG","Instellen als galerij-afbeelding van de PARENT");
define("_ZOOM_PASS","Wachtwoord");
define("_ZOOM_PASS_REQUIRED","Deze galerij vereist een wachtwoord.<br />Geef hieronder het wachwoord<br />en druk op de Verder-knop. Dank u.");
define("_ZOOM_PASS_BUTTON","Verder");
define("_ZOOM_PASS_GALLERY","Wachtwoord");
define("_ZOOM_PASS_INNCORRECT","Ongeldig wachtwoord.");

//Lightbox
define("_ZOOM_LIGHTBOX","Lightbox");
define("_ZOOM_LIGHTBOX","Lightbox deze galerij!");
define("_ZOOM_LIGHTBOX_ITEM","Lightbox dit item!");
define("_ZOOM_LIGHTBOX_GALLERY","Lightbox deze galerij!");
define("_ZOOM_LIGHTBOX_VIEW","Bekijk uw Lightbox");
define("_ZOOM_YOUR_LIGHTBOX","Inhoud van uw Lightbox:");
define("_ZOOM_LIGHTBOX_EMPTY","Uw Lightbox is leeg op dit moment.");
define("_ZOOM_LIGHTBOX_ZIPBTN","Genereer ZIP-bestand");
define("_ZOOM_LIGHTBOX_PLAYLISTBTN","Genereer Afspeellijst & Afspelen");
define("_ZOOM_LIGHTBOX_CATS","Gallerijen");
define("_ZOOM_LIGHTBOX_TITLEDESCR","Naam & Omschrijving");
define("_ZOOM_ACTION","Actie");
define("_ZOOM_LIGHTBOX_ADDED","Item is toegevoegd aan uw lightbox!");
define("_ZOOM_LIGHTBOX_NOTADDED","Fout tijdens toevoegen item aan uw lightbox!");
define("_ZOOM_LIGHTBOX_EDITED","Item eigenschappen gewijzigd!");
define("_ZOOM_LIGHTBOX_NOTEDITED","Fout tijdens wijzigen item!");
define("_ZOOM_LIGHTBOX_DEL","Item is verwijderd van uw lightbox!");
define("_ZOOM_LIGHTBOX_NOTDEL","Fout tijdens verwijderen van item!");
define("_ZOOM_LIGHTBOX_NOZIP","U heeft al een Zip bestand gegenereert van uw lightbox of uw lightbox bevat geen items!");
define("_ZOOM_LIGHTBOX_PARSEZIP","Bezig met verwerken van afbeeldingen...");
define("_ZOOM_LIGHTBOX_DOZIP","Bezig met aanmaken ZIP bestand...");
define("_ZOOM_LIGHTBOX_DLHERE","U kunt nu uw lightbox downloaden");
define("_ZOOM_LIGHTBOX_PLSUCCESS","Afspeellijst aangemaakt! U moet nu het Player-venster vernieuwen.");
define("_ZOOM_LIGHTBOX_PLERROR","Fout tijdens aanmaken van Afspeellijst.");
define("_ZOOM_LIGHTBOX_NOAUDIO","U moet eerst Audio bestanden aan uw Lightbox toevoegen!");
define("_ZOOM_LIGHTBOX_NOITEMS","Uw Lightbox blijkt leeg te zijn.");

//EXIF/ IPTC information
define("_ZOOM_EXIF","EXIF");
define("_ZOOM_EXIF_SHOWHIDE","Toon/ verberg Metadata");

//MP3 id3 v1.1 or later information
define("_ZOOM_AUDIO_PLAYING","bezig met afspelen:");
define("_ZOOM_AUDIO_CLICKTOPLAY","Klik hier om dit bestand af te spelen.");
define("_ZOOM_ID3","ID3");
define("_ZOOM_ID3_SHOWHIDE","Toon/ verberg ID3-tag data");
define("_ZOOM_ID3_LENGTH","Lengte");
define("_ZOOM_ID3_QUALITY","Kwaliteit");
define("_ZOOM_ID3_TITLE","Titel");
define("_ZOOM_ID3_ARTIST","Artiest");
define("_ZOOM_ID3_ALBUM","Album");
define("_ZOOM_ID3_YEAR","Jaar");
define("_ZOOM_ID3_COMMENT","Commentaar");
define("_ZOOM_ID3_GENRE","Genre");

//Video metadata information
define("_ZOOM_VIDEO_SHOWHIDE","Show/ hide Video data");
define("_ZOOM_VIDEO_PIXELRATIO","Pixel ratio");
define("_ZOOM_VIDEO_QUALITY","Video kwaliteit");
define("_ZOOM_VIDEO_AUDIOQUALITY","Audio kwaliteit");
define("_ZOOM_VIDEO_CODEC","Codec");
define("_ZOOM_VIDEO_RESOLUTION","Resolutie");

//rating
define("_ZOOM_RATING","Waardering");
define("_ZOOM_NOTRATED","Nog niet gewaardeerd!");
define("_ZOOM_VOTE","stem");
define("_ZOOM_VOTES","stemmen");
define("_ZOOM_RATE0","waardeloos");
define("_ZOOM_RATE1","slecht");
define("_ZOOM_RATE2","gemiddeld");
define("_ZOOM_RATE3","mooi");
define("_ZOOM_RATE4","zeer mooi");
define("_ZOOM_RATE5","perfekt!");

//special
define("_ZOOM_TOPTEN","Top Tien");
define("_ZOOM_LASTSUBM","Laatst toegevoegd");
define("_ZOOM_LASTCOMM","Laatst becommentarieerd");
define("_ZOOM_SEARCHRESULTS","Zoekresultaten");
define("_ZOOM_TOPRATED","Hoogst gewaardeerd");

//ecard
define("_ZOOM_ECARD_SENDAS","Verzend dit medium als E-card!");
define("_ZOOM_ECARD_YOURNAME","Jouw naam");
define("_ZOOM_ECARD_YOUREMAIL","Jouw email adres");
define("_ZOOM_ECARD_FRIENDSNAME","Je vriend(in)'s naam");
define("_ZOOM_ECARD_FRIENDSEMAIL","Je vriend(in)'s email adres");
define("_ZOOM_ECARD_MESSAGE","Bericht");
define("_ZOOM_ECARD_SENDCARD","Verzend eCard");
define("_ZOOM_ECARD_SUCCESS","Uw kaart is succesvol verzonden.");
define("_ZOOM_ECARD_CLICKHERE","Klik hier om het te bekijken!");
define("_ZOOM_ECARD_ERROR","Fout tijdens verzenden van eCard naar");
define("_ZOOM_ECARD_TURN","Bekijk de achterzijde van deze kaart!");
define("_ZOOM_ECARD_TURN2","Bekijk de voorzijde van deze kaart!");
define("_ZOOM_ECARD_SENDER","Deze kaart is naar jou verzonden door:");
define("_ZOOM_ECARD_SUBJ","U heeft een eCard ontvangen van:");
define("_ZOOM_ECARD_MSG1","heeft een eCard verzonden van");
define("_ZOOM_ECARD_MSG2","Klik op de onderstaande link om uw persoonlijke eCard te bekijken!");
define("_ZOOM_ECARD_MSG3","Beantwoord deze e-mail niet, omdat deze automatisch gegenereerd is.");
define("_ZOOM_ECARD_ECARDEXPIRED","Sorry, deze eCard is niet meer beschikbaar.");

//installation-screen
define ('_ZOOM_INSTALL_CREATE_DIR','zOOm Media Gallery Installatie maakt de map "images/zoom" aan...');
define ('_ZOOM_INSTALL_CREATE_DIR_SUCC','klaar!');
define ('_ZOOM_INSTALL_CREATE_DIR_FAIL','fout!');
define ('_ZOOM_INSTALL_MESS1','zOOm Media Gallery is geinstalleerd.<br>U kunt nu uw albums vullen met media!');
define ('_ZOOM_INSTALL_MESS2','NOTE: U moet nu eerst naar het Components-menu gaan,<br>klikken op "zOOm Media Gallery Admin" en<br>de Instellingen-pagina bekijken.');
define ('_ZOOM_INSTALL_MESS3','Hier kunt u alle variabelen invullen die zOOm nodig heeft om te functioneren.');
define ('_ZOOM_INSTALL_MESS4','Vergeet niet een galerij aan te maken en u kunt beginnen!');
define ('_ZOOM_INSTALL_MESS_FAIL1','zOOm Media Gallery kon niet compleet worden geinstalleerd!');
define ('_ZOOM_INSTALL_MESS_FAIL2','De volgende mappen moeten aangemaakt worden voor zOOm en daarna ge-CHMOD worden naar "0777":<br />'
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
define ('_ZOOM_INSTALL_MESS_FAIL3','Wanneer u deze mappen aangemaakt hebt en de rechten veranderd, ga dan naar <br /> "Components -> zOOm Media Gallery" en verander de instellingen voor uw systeem.');
?>
