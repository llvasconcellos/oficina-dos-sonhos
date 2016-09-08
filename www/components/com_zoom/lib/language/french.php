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
|              Mambo. It's the most feature-rich gallery component    |
|              for Mambo! For documentation and a detailed list       |
|              of features, check the zOOm homepage:                  |
|              http://zoom.ummagumma.nl                               |
| License: GPL                                                        |
| Filename: french.php                                               |
| Version: 2.5 beta3                                                        |
|                                                                     |
-----------------------------------------------------------------------
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
//Language translation
define("_ZOOM_DATEFORMAT","%d.%m.%Y %H:%M"); // use the PHP strftime Format, more info at http://www.php.net
define("_ZOOM_ISO","iso-8859-1");
define("_ZOOM_PICK","Choisir une Galerie");
define("_ZOOM_DELETE","Supprimer");
define("_ZOOM_BACK","Retour");
define("_ZOOM_MAINSCREEN","Ecran principal");
define("_ZOOM_BACKTOGALLERY","Retour à la Galerie");
define("_ZOOM_INFO_DONE","terminé!");
define("_ZOOM_TOOLTIP", "zOOm Astuce");
define("_ZOOM_WARNING", "zOOm Alerte!");

//Gallery admin page
if ($zoom->_isAdmin || $zoom->_isUser){
define("_ZOOM_ADMINSYSTEM","Espace Administrateur");
define("_ZOOM_USERSYSTEM","Espace Utilisateur");
define("_ZOOM_ADMIN_TITLE","Espace Administrateur de Galerie");
define("_ZOOM_USER_TITLE","Espace Utilisateur de Galerie");
define("_ZOOM_CATSMGR","Manager de Galerie");
define("_ZOOM_CATSMGR_DESCR","créer une nouvelle galerie d'images et la supprimer dans le Manager de Galeries, ici.");
define("_ZOOM_NEW","Nouvelle Galerie");
define("_ZOOM_DEL","Supprimer une Galerie");
define("_ZOOM_MEDIAMGR","Manager d'Images");
define("_ZOOM_MEDIAMGR_DESCR","publier, effaçer, charger automatiquement une image ou envoyer manuellement plusieurs images.");
define("_ZOOM_UPLOAD","Fichier(s) à envoyer");
define("_ZOOM_EDIT","Publier une Galerie");
define("_ZOOM_ADMIN_CREATE","Créer une base de données");
define("_ZOOM_ADMIN_CREATE_DESCR","construire les tables de la base de données requise pour pouvoir utiliser un album.");
define("_ZOOM_HD_PREVIEW","Visualiser");
define("_ZOOM_HD_CHECKALL","Tout vérifier ou non");
define("_ZOOM_HD_CREATEDBY","Créée par");
define("_ZOOM_HD_AFTER","Insérer après");
define("_ZOOM_HD_HIDEMSG","Cacher le texte 'pas d'images'");
define("_ZOOM_HD_NAME","Nom de la Galerie");
define("_ZOOM_HD_DIR","Répertoire");
define("_ZOOM_HD_NEW","Nouvelle Galerie");
define("_ZOOM_HD_SHARE","Partager cette Galerie");
define("_ZOOM_SHARE","Partager");
define("_ZOOM_UNSHARE","Ne plus partager");
define("_ZOOM_PUBLISH","Publier");
define("_ZOOM_UNPUBLISH","Dépublier");
define("_ZOOM_TOPLEVEL","Premier niveau");
define("_ZOOM_HD_UPLOAD","Envoi fichier");
define("_ZOOM_A_ERROR_ERRORTYPE","Erreur");
define("_ZOOM_A_ERROR_IMAGENAME","Nom de l'image");
define("_ZOOM_A_ERROR_NOFFMPEG","<u>FFmpeg</u> non disponible");
define("_ZOOM_A_ERROR_NOPDFTOTEXT","<u>PDFtoText</u> non disponible");
define("_ZOOM_A_ERROR_NOTINSTALLED","Non installée");
define("_ZOOM_A_ERROR_CONFTODB","Erreur de configuration pendant la sauvegarde dans la base de données!");
define("_ZOOM_A_MESS_NOT_SHURE","* Si vous n'êtes pas sûr, utilisez \"auto\" par défaut.");
define("_ZOOM_A_MESS_SAFEMODE1","Note: \"Safe Mode\" est activé; dans ce cas, il est possible que l'envoi de fichiers plus gros ne soit pas traité!<br />Vous deriez changer le FTP-Mode dans l'Espace Administrateur.");
define("_ZOOM_A_MESS_SAFEMODE2","Note: \"Safe Mode\" est activé; dans ce cas, il est possible que l'envoi de fichiers plus gros ne soit pas traité!<br />zOOm recommande d'activer le FTP-Mode dans l'Espace Administrateur.");
define("_ZOOM_A_MESS_PROCESSING_FILE","Traitement en cours...");
define("_ZOOM_A_MESS_NOTOPEN_URL","Non ouverture de l'url:");
define("_ZOOM_A_MESS_PARSE_URL","Analyse \"%s\" des images... "); // %s = $url
define("_ZOOM_A_MESS_NOJAVA","Si vous voyez seulement une boîte grise ci-dessus ou si vous avez des problèmes de téléchargement,<br />il est possible que vous n'ayez pas la dernière version de Java. Rendez-vous ici: <a href=\"http://www.java.com\" target=\"_blank\">Java.com</a> <br /> et téléchargez la dernière version.");
define("_ZOOM_SETTINGS","Paramètres");
define("_ZOOM_SETTINGS_DESCR","modifiez et visualisez ici les paramètres disponibles.");
define("_ZOOM_SETTINGS_TAB1","Système");
define("_ZOOM_SETTINGS_TAB2","Fichiers");
define("_ZOOM_SETTINGS_TAB3","Apparence"); 
//Tab 4 is Module
define("_ZOOM_SETTINGS_TAB5","Safe Mode");
define("_ZOOM_SETTINGS_TAB6","Accessibilité");
define("_ZOOM_SETTINGS_CONVTYPE","Type de conversion");
define("_ZOOM_SETTINGS_AUTODET","auto-détecté: ");
define("_ZOOM_SETTINGS_IMGPATH","Chemin vers le fichier images:");
define("_ZOOM_SETTINGS_TTIMGPATH","Le chemin courant est ");
define("_ZOOM_SETTINGS_CONVSETTINGS","Paramètres de conversion d'image:");
define("_ZOOM_SETTINGS_IMPATH","Chemin vers ImageMagick: ");
define("_ZOOM_SETTINGS_NETPBMPATH"," ou NetPBM: ");
define("_ZOOM_SETTINGS_FFMPEGPATH","Chemin vers FFmpeg");
define("_ZOOM_SETTINGS_FFMPEGTOOLTIP","FFmpeg est requis pour créer les fichiers 'Thumbnails' de vos fivhiers vidéos.<br />Les extensions supportées sont: ");
define("_ZOOM_SETTINGS_PDFTOTEXTPATH","Chemin vers PDFtoText");
define("_ZOOM_SETTINGS_XPDFTOOLTIP","pdf2text est un élément de Xpdf package et est requis pour l'indexation d'un fichier PDF.");
define("_ZOOM_SETTINGS_MAXSIZE","Volume max. d'une image: ");
define("_ZOOM_SETTINGS_THUMBSETTINGS","Paramètres 'Thumbnails':");
define("_ZOOM_SETTINGS_QUALITY","Qualité de NetPBM et GD2 JPEG: ");
define("_ZOOM_SETTINGS_SIZE","Volume max. d'un 'Thumbnail': ");
define("_ZOOM_SETTINGS_TEMPNAME","Nom provisoire: ");
define("_ZOOM_SETTINGS_AUTONUMBER","numérotation auto des noms d'images (eg. 1,2,3)");
define("_ZOOM_SETTINGS_TEMPDESCR","Description provisoire: ");
define("_ZOOM_SETTINGS_TITLE","Titre de la galerie:");
define("_ZOOM_SETTINGS_SUBCATSPG","Nbre de colonne d'une (sous)galerie");
define("_ZOOM_SETTINGS_COLUMNS","Nbre de colonne d'un 'thumbnail'");
define("_ZOOM_SETTINGS_THUMBSPG","Onglets par page");
define("_ZOOM_SETTINGS_CMTLENGTH","Longueur max. des commentaires");
define("_ZOOM_SETTINGS_CHARS","caractères");
define("_ZOOM_SETTINGS_GALLERYPREFIX","Préfixe du titre de Galerie");
define("_ZOOM_SETTINGS_FEATURES_TITLE","Capacité avancée ON/ OFF");
define("_ZOOM_SETTINGS_CSS_TITLE","Edition Style");
define("_ZOOM_SETTINGS_DISPLAY_TITLE","Données à afficher ON/ OFF");
define("_ZOOM_SETTINGS_COMMENTS","Commentaires");
define("_ZOOM_SETTINGS_POPUP","PopUp Images");
define("_ZOOM_SETTINGS_CATIMG","Montrer la catégorie d'image");
define("_ZOOM_SETTINGS_SLIDESHOW","Diaporama");
define("_ZOOM_SETTINGS_ZOOMLOGO","Montrer le logo zOOm");
define("_ZOOM_SETTINGS_SHOWHITS","Afficher le score");
define("_ZOOM_SETTINGS_READEXIF","Lire les données EXIF");
define("_ZOOM_SETTINGS_EXIFTOOLTIP","Ce mémo montrera les données additionnelles EXIF et autre IPTC, sans que le module EXIF ait besoin d'être présent sur votre système.");
define("_ZOOM_SETTINGS_READID3","Lire mp3 ID3-data"); // Per Lasse - this one has been added!
define("_ZOOM_SETTINGS_ID3TOOLTIP","Cette fonction montre des paramètres ID3 v1.1 et v2.0 lorsqu'on voit le détail d\'un fichier MP3."); // Per Lasse - this one has been added!
define("_ZOOM_SETTINGS_RATING","Classement");
define("_ZOOM_SETTINGS_CSS","fenêtre popup de la feuille de style");
define("_ZOOM_SETTINGS_CSSZOOM","zOOm galerie &amp; vue moyenne");
define("_ZOOM_SETTINGS_USERUPL","Autoriser l'envoi par un utilisateur:");
define("_ZOOM_SETTINGS_ACCESSLVL","Niveau d'accès: ");
define("_ZOOM_SETTINGS_SUCCESS","Configuration mise à jour avec succès!");
define("_ZOOM_SETTINGS_ZOOMING","Zoom image");
define("_ZOOM_SETTINGS_ORDERBY","Méthode de tri'Thumbnail'; trier par:");
define("_ZOOM_SETTINGS_CATORDERBY","Méthode de tri d'une (sous-)galerie; trier par:");
define("_ZOOM_SETTINGS_DATE_ASC","DATE, ascendante");
define("_ZOOM_SETTINGS_DATE_DESC","DATE, descendante");
define("_ZOOM_SETTINGS_FLNM_ASC","Nom de fichier, ascendant");
define("_ZOOM_SETTINGS_FLNM_DESC","Nom de fichier, descendant");
define("_ZOOM_SETTINGS_NAME_ASC","NOM, ascendant");
define("_ZOOM_SETTINGS_NAME_DESC","NOM, descendant");
define("_ZOOM_SETTINGS_LIGHTBOX","Lightbox");
define("_ZOOM_SETTINGS_LBTOOLTIP","Une 'Lightbox' est comme un album rempli par les images choisies par un utilisateur et pouvant être téléchargées comme un dossier ZIP.");
define("_ZOOM_SETTINGS_SHOWNAME","Affichage du Nom");
define("_ZOOM_SETTINGS_SHOWDESCR","Affichage de la description");
define("_ZOOM_SETTINGS_SHOWKEYWORDS","Affichage des mots-clés");
define("_ZOOM_SETTINGS_SHOWDATE","Affichage de la date");
define("_ZOOM_SETTINGS_SHOWUNAME","Afficher nom utilisateur");
define("_ZOOM_SETTINGS_SHOWFILENAME","Affichage du nom de fichier");
define("_ZOOM_SETTINGS_METABOX","Affichage détaillé des pages-galeries");
define("_ZOOM_SETTINGS_METABOXTOOLTIP","Supprimez ce dispositif pour accélérer l'affichage de votre galerie. Efficace avec de grandes bases de données.");
define("_ZOOM_SETTINGS_ECARDS","E-cartes");
define("_ZOOM_SETTINGS_ECARDS_LIFETIME","E-cartes permanentes");
define("_ZOOM_SETTINGS_ECARDS_ONEWEEK","une semaine");
define("_ZOOM_SETTINGS_ECARDS_TWOWEEKS","deux semaines");
define("_ZOOM_SETTINGS_ECARDS_ONEMONTH","un mois");
define("_ZOOM_SETTINGS_ECARDS_THREEMONTHS","trois mois");
define("_ZOOM_SETTINGS_SHOWSEARCH","Champ de recherche sur TOUTES les pages");
define("_ZOOM_SETTINGS_ALLOWCREATE","Autoriser un utilisateur à créer une galerie");
define("_ZOOM_SETTINGS_ALLOWDEL","Autoriser un utilisateur à supprimer une galerie partagée");
define("_ZOOM_SETTINGS_ALLOWEDIT","Autoriser un utilisateur à publier une galerie (partagée)");
define("_ZOOM_SETTINGS_SETMENUOPTION","Afficher le lien 'Envoi Media' dans le menu Utilisateur");
define("_ZOOM_SETTINGS_USEFTP","Utiliser FTP mode?");
define("_ZOOM_SETTINGS_FTPHOST","Nom de l'ordinateur");
define("_ZOOM_SETTINGS_FTPUNAME","Nom utilisateur");
define("_ZOOM_SETTINGS_FTPPASS","Mot de passe");
define("_ZOOM_SETTINGS_FTPWARNING","Attention: Mot de passe non sauvegardé!");
define("_ZOOM_SETTINGS_FTPHOSTDIR","Répertoire sur l'ordinateur");
define("_ZOOM_SETTINGS_MESS_FTPHOSTDIR","SVP, veuillez indiquer ici le chemin de votre racine FTP à Mambo. IMPORTANT: Terminer <b>sans</b> 'slash' ni 'backslash'!");
define("_ZOOM_SETTINGS_GROUP","Groupe");
define("_ZOOM_SETTINGS_PRIV_DESCR","Vous êtes habilité à changer les privilèges de tous les groupes d'utilisateurs connus de Mambo et ainsi modifier les privilèges de tout utilisateur membre de ces groupes!<br />
    Un utilisateur peut, en théorie, faire les actions suivantes: envoi de fichier(s), éditer/effacer media, créer/éditer/effacer (partagé) galeries.<br />
    Ce qu'ils peuvent faire et ne pas faire dans la vie réelle ne tient qu'à vous.");
define("_ZOOM_SYSTEM_TITLE","Configuration système");
define("_ZOOM_YES","oui");
define("_ZOOM_NO","non");
define("_ZOOM_SAVE","Sauvegarder");
define("_ZOOM_MOVEFILES","Déplacer les images");
define("_ZOOM_MOVEFILES_DESCR","déplacer une image d'une galerie à une autre.");
define("_ZOOM_BUTTON_MOVE","Déplacer");
define("_ZOOM_MOVEFILES_STEP1","Etape 1: Selectionner la galerie-source");
define("_ZOOM_MOVEFILES_STEP2","Etape 2: Sélectionner les images que vous voulez déplacer");
define("_ZOOM_MOVEFILES_STEP3","Etape 3: Selectionner la galerie-cible et déplacer les images");
define("_ZOOM_ALERT_MOVEOK","Images déplacées avec succès!");
define("_ZOOM_OPTIMIZE","Optimiser les tables");
define("_ZOOM_OPTIMIZE_DESCR","zOOm Media Gallery utilise beaucoup de tables et crée ainsi des données volatiles, ie. 'données bric-à-brac'. Cliquer ici pour les supprimer.");
define("_ZOOM_OPTIMIZE_SUCCESS","Tables zOOm Media Gallery optimisées!");
define("_ZOOM_UPDATE","Mise à jour zOOm Media Gallery");
define("_ZOOM_UPDATE_DESCR","ajoutez des nouveautés, solutionnez les problèmes et résolvez les bogues! Allez sur <a href=\"http://zoom.ummagumma.nl\" target=\"_blank\">zoom.ummagumma.nl</a> pour connaître la dernière version!");
define("_ZOOM_UPDATE_XMLDATE","Date de la dernière mise à jour");
define("_ZOOM_UPDATE_PACKAGE","Mise à jour fichier ZIP: ");
define("_ZOOM_CREDITS","A propos de zOOm Media Gallery & Credits");

//Image actions
define("_ZOOM_DISKSPACEUSAGE","Espace disque actuellement utilisé");
define("_ZOOM_UPLOAD_SINGLE","fichier unique (ZIP)");
define("_ZOOM_UPLOAD_MULTIPLE","fichiers multiples");
define("_ZOOM_UPLOAD_DRAGNDROP","Glisser-déposer");
define("_ZOOM_UPLOAD_SCANDIR","analyser un répertoire");
define("_ZOOM_UPLOAD_INTRO","Cliquez sur <b>Browse</b> pour rechercher une image à envoyer.");
define("_ZOOM_UPLOAD_STEP1","1. Selectionner le nbre de fichiers que vous voulez envoyer: ");
define("_ZOOM_UPLOAD_STEP2","2. Selectionner la galerie où vous voulez que les fichiers soient chargés: ");
define("_ZOOM_UPLOAD_STEP3","3. Utilisez 'Browse' pour rechercher des photos sur votre ordinateur");
define("_ZOOM_SCAN_STEP1","Etape 1: indiquez l'emplacement à examiner pour les images...");
define("_ZOOM_SCAN_STEP2","Etape 2: sélectionnez les fichiers à charger...");
define("_ZOOM_SCAN_STEP3","Etape 3: zOOm traite les fichiers choisis...");
define("_ZOOM_SCAN_STEP1_DESCR","L'emplacement peut être soit une URL soit un répertoire sur le serveur.<br />&nbsp;   Info: Les images FTP indiquent alors le chemin vers votre répertoire sur le serveur, ici!");
define("_ZOOM_SCAN_STEP2_DESCR1","En cours...");
define("_ZOOM_SCAN_STEP2_DESCR2","comme un répertoire local");
define("_ZOOM_FORMCREATE_NAME","Nom");
define("_ZOOM_FORM_IMAGEFILE","Image");
define("_ZOOM_FORM_IMAGEFILTER","Type Images supporté");
define("_ZOOM_FORM_INGALLERY","Dans la galerie");
define("_ZOOM_FORM_SETFILENAME","Nommer les images comme les fichiers.");
define("_ZOOM_FORM_LOCATION","Emplacement");
define("_ZOOM_BUTTON_SCAN","Soumettre une URL ou un répertoire");
define("_ZOOM_BUTTON_UPLOAD","Envoyer");
define("_ZOOM_BUTTON_EDIT","Publier");
define("_ZOOM_BUTTON_CREATE","Créer");
define("_ZOOM_CONFIRM_DEL","Cette option supprimera complètement la galerie, y compris les images!\\nConfirmez vous?");
define("_ZOOM_CONFIRM_DELMEDIUM","Vous allez complètement supprimer cette image!\\nConfirmez vous?");
define("_ZOOM_ALERT_DEL","La galerie est supprimée!");
define("_ZOOM_ALERT_NOCAT","Aucune galerie sélectionnée!");
define("_ZOOM_ALERT_NOMEDIA","Aucune image sélectionnée!");
define("_ZOOM_ALERT_EDITOK","Les champs de galerie ont été édités avec succès!");
define("_ZOOM_ALERT_NEWGALLERY","Nouvelle galerie créée.");
define("_ZOOM_ALERT_NONEWGALLERY","Galerie non créée!");
define("_ZOOM_ALERT_EDITIMG","Les propriétés de l'image ont été éditées avec succès.");
define("_ZOOM_ALERT_DELPIC","Groupe d'images supprimé!.");
define("_ZOOM_ALERT_NODELPIC","L'image ne peut être effaçée!");
define("_ZOOM_ALERT_NOPICSELECTED","Aucune image sélectionnée.");
define("_ZOOM_ALERT_NOPICSELECTED_MULT","Aucun groupe d'images sélectionné.");
define("_ZOOM_ALERT_UPLOADOK","Image correctement chargée!");
define("_ZOOM_ALERT_UPLOADSOK","Groupe d'images correctement chargé!");
define("_ZOOM_ALERT_WRONGFORMAT","Format d'image erroné!.");
define("_ZOOM_ALERT_WRONGFORMAT_MULT","Format erroné!.");
define("_ZOOM_ALERT_MOVEFAILURE","Transfert de fichier erroné.");
define("_ZOOM_ALERT_IMGERROR","Erreur de redimensionnement d'image/ de création de 'thumbnail'.");
define("_ZOOM_ALERT_PCLZIPERROR","Erreur pendant l'extraction d'une archive.");
define("_ZOOM_ALERT_INDEXERROR","Erreur pendant l'indexation du document.");
define("_ZOOM_ALERT_IMGFOUND","image(s) trouvée(s).");
define("_ZOOM_INFO_CHECKCAT","Veuillez sélectionner une galerie avant de cliquer sur 'Upload'!");
define("_ZOOM_BUTTON_ADDIMAGES","Ajouter des images");
define("_ZOOM_BUTTON_REMIMAGES","Supprimer des images");
define("_ZOOM_INFO_PROCESSING","Traitement du fichier:");
define("_ZOOM_ITEMEDIT_TAB1","Propriétés");
define("_ZOOM_ITEMEDIT_TAB2","Membres");
define("_ZOOM_ITEMEDIT_TAB3","Actions");
define("_ZOOM_USERSLIST_LINE1",">>Choisir les membres de cet article<<");
define("_ZOOM_USERSLIST_ALLOWALL",">>Accès public<<");
define("_ZOOM_USERSLIST_MEMBERSONLY",">>Membres seulement<<");
define("_ZOOM_PUBLISHED","Publié");
define("_ZOOM_SHARED","Partager cette galerie");
define("_ZOOM_ROTATE","Rotation 90°");
define("_ZOOM_CLOCKWISE","dans le sens des aiguilles d'une montre");
define("_ZOOM_CCLOCKWISE","compteur dans le sens des aiguilles d'une montre");
define("_ZOOM_FLIP_HORIZ","Glissement image horizontal");
define("_ZOOM_FLIP_VERT","Glissement image vertical");
define("_ZOOM_PROGRESS_DESCR","Votre requête est en cours de traitement... Veuillez patienter.");
}

//Navigation (including Slideshow buttons)
define("_ZOOM_SLIDESHOW","Diaporama:");
define("_ZOOM_PREV_IMG","Image précédente");
define("_ZOOM_NEXT_IMG","Image suivante");
define("_ZOOM_FIRST_IMG","Première image");
define("_ZOOM_LAST_IMG","Dernière image");
define("_ZOOM_PLAY","démarrer");
define("_ZOOM_STOP","stop");
define("_ZOOM_RESET","remise à zéro");
define("_ZOOM_FIRST","Premier");
define("_ZOOM_LAST","Dernier");
define("_ZOOM_PREVIOUS","Précédent");
define("_ZOOM_NEXT","Suivant");

//Gallery actions
define("_ZOOM_SEARCH_BOX","Recherche rapide...");
define("_ZOOM_ADVANCED_SEARCH","Recherche avançée");
define("_ZOOM_SEARCH_KEYWORD","Recherche par mots-clés");
define("_ZOOM_IMAGES","images");
define("_ZOOM_IMGFOUND","trouvées - vous êtes sur la page");
define("_ZOOM_IMGFOUND2","de");
define("_ZOOM_SUBGALLERIES","sous-galeries");
define("_ZOOM_ALERT_COMMENTOK","Votre commentaire a bien été ajouté!");
define("_ZOOM_ALERT_COMMENTERROR","Vous avez déjà commenté cette image!");
define("_ZOOM_ALERT_VOTE_OK","Votre vote a été pris en compte. Merçi! ");
define("_ZOOM_ALERT_VOTE_ERROR","Vous avez déjà voté pour cette image!");
define("_ZOOM_WINDOW_CLOSE","Fermer");
define("_ZOOM_NOPICS","Pas d'images dans la galerie");
define("_ZOOM_PROPERTIES","Propriétés");
define("_ZOOM_COMMENTS","Commentaires");
define("_ZOOM_NO_COMMENTS","Pas de commentaires encore ajoutés!");
define("_ZOOM_YOUR_NAME","Nom");
define("_ZOOM_ADD","Ajouter");
define("_ZOOM_NAME","Nom");
define("_ZOOM_DATE","Date ajoutée");
define("_ZOOM_UNAME","Ajouté par");
define("_ZOOM_DESCRIPTION","Description");
define("_ZOOM_IMGNAME","Nom");
define("_ZOOM_FILENAME","Nom du fichier");
define("_ZOOM_CLICKDOCUMENT","(cliquer le nom du fichier pour ouvrir le document)");
define("_ZOOM_KEYWORDS","Mots-clés");
define("_ZOOM_HITS","score");
define("_ZOOM_CLOSE","Fermer");
define("_ZOOM_NOIMG", "Aucune image trouvée!");
define("_ZOOM_NONAME", "Vous devez indiquer un nom!");
define("_ZOOM_NOCAT", "Pas de catégorie sélectionnée!");
define("_ZOOM_EDITPIC", "Publier une image");
define("_ZOOM_SETCATIMG","Placer comme image d'une galerie");
define("_ZOOM_SETPARENTIMG","Placer comme image de galerie d'une galerie PARENTE");
define("_ZOOM_PASS","Mot de passe");
define("_ZOOM_PASS_REQUIRED","Cette galerie requiert un mot de passe.<br />Veuillez saisir un mot de passe<br />et cliquer sur 'Go'. Merçi.");
define("_ZOOM_PASS_BUTTON","Go");
define("_ZOOM_PASS_GALLERY","Mot de passe");
define("_ZOOM_PASS_INNCORRECT","Mot de passe erroné");

//Lightbox
define("_ZOOM_LIGHTBOX","Sélection"); //Per Lasse - this one has moved from _ZOOM_SETTINGS_LIGHTBOX to here for general use.
define("_ZOOM_LIGHTBOX_GALLERY","Mettre cette galerie dans ma sélection!");
define("_ZOOM_LIGHTBOX_ITEM","Mettre cet article dans ma sélection!");
define("_ZOOM_LIGHTBOX_VIEW","Voir ma sélection");
define("_ZOOM_YOUR_LIGHTBOX","Votre sélection contient:");
define("_ZOOM_LIGHTBOX_EMPTY","Votre sélection est actuellement vide.");
define("_ZOOM_LIGHTBOX_ZIPBTN","Créer un fichier ZIP");
define("_ZOOM_LIGHTBOX_CATS","Galeries");
define("_ZOOM_LIGHTBOX_TITLEDESCR","Titre & Description");
define("_ZOOM_ACTION","Action");
define("_ZOOM_LIGHTBOX_ADDED","Article ajouté à votre sélection!");
define("_ZOOM_LIGHTBOX_NOTADDED","Erreur lors de l'ajout d'un article dans votre sélection!");
define("_ZOOM_LIGHTBOX_EDITED","Article édité correctement!");
define("_ZOOM_LIGHTBOX_NOTEDITED","Erreur d'édition de l'article!");
define("_ZOOM_LIGHTBOX_DEL","Article supprimé de votre sélection!");
define("_ZOOM_LIGHTBOX_NOTDEL","Erreur lors de la suppression de l'article de votre sélection!");
define("_ZOOM_LIGHTBOX_NOZIP","Vous avez déjà créé le fichier ZIP de votre sélection!");
define("_ZOOM_LIGHTBOX_PARSEZIP","Analyse d'images depuis la galerie...");
define("_ZOOM_LIGHTBOX_DOZIP","création du fichier ZIP...");
define("_ZOOM_LIGHTBOX_DLHERE","Vous pouvez maintenant télécharger la sélection");

//EXIF information
define("_ZOOM_EXIF","EXIF");
define("_ZOOM_EXIF_SHOWHIDE","Montrer/ cacher les Metadonnées");

//MP3 id3 v1.1 or later information
define("_ZOOM_AUDIO_PLAYING","Lecture en cours:"); // Per Lasse - this one has been added!
define("_ZOOM_AUDIO_CLICKTOPLAY","Cliquer ici pour lire le fichier."); // Per Lasse - this one has been added!
define("_ZOOM_ID3","ID3"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_SHOWHIDE","Montrer/cacher les données ID3"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_LENGTH","Longueur"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_TITLE","Titre"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_ARTIST","Artist"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_ALBUM","Album"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_YEAR","Année"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_COMMENT","Commentaire"); // Per Lasse - this one has been added!
define("_ZOOM_ID3_GENRE","Genre"); // Per Lasse - this one has been added!

//rating
define("_ZOOM_RATING","Classement");
define("_ZOOM_NOTRATED","Pas encore classé!");
define("_ZOOM_VOTE","vote");
define("_ZOOM_VOTES","votes");
define("_ZOOM_RATE0","à jeter!");
define("_ZOOM_RATE1","bof!!");
define("_ZOOM_RATE2","sans opinion!");
define("_ZOOM_RATE3","bien!");
define("_ZOOM_RATE4","trés bien!");
define("_ZOOM_RATE5","parfait!");

//special
define("_ZOOM_TOPTEN","Top 10");
define("_ZOOM_LASTSUBM","Dernière soumission");
define("_ZOOM_LASTCOMM","Dernier commentaire");
define("_ZOOM_SEARCHRESULTS","Résultats de recherche");
define("_ZOOM_TOPRATED","Top Classement");

//ecard
define("_ZOOM_ECARD_SENDAS","Envoyer cette E-carte à un ami!");
define("_ZOOM_ECARD_YOURNAME","Votre nom");
define("_ZOOM_ECARD_YOUREMAIL","Votre e-mail");
define("_ZOOM_ECARD_FRIENDSNAME","Le nom de votre ami");
define("_ZOOM_ECARD_FRIENDSEMAIL","L'e-mail de votre ami");
define("_ZOOM_ECARD_MESSAGE","Message");
define("_ZOOM_ECARD_SENDCARD","Envoyer l'E-carte");
define("_ZOOM_ECARD_SUCCESS","Votre carte a bien été envoyée.");
define("_ZOOM_ECARD_CLICKHERE","La visualiser ici!");
define("_ZOOM_ECARD_ERROR","Echec de l'envoi de votre E-carte à");
define("_ZOOM_ECARD_TURN","Regardez au dos de la carte!");
define("_ZOOM_ECARD_TURN2","Regardez le recto de cette carte!");
define("_ZOOM_ECARD_SENDER","Envoyée par:");
define("_ZOOM_ECARD_SUBJ","Vous avez reçu une E-carte de:");
define("_ZOOM_ECARD_MSG1","E-carte expédiée depuis");
define("_ZOOM_ECARD_MSG2","Cliquer sur le lien ci-dessous pour voir votre carte!");
define("_ZOOM_ECARD_MSG3","Merçi de ne pas répondre à ce message généré automatiquement.");

//installation-screen
define ('_ZOOM_INSTALL_CREATE_DIR','zOOm Installation essaie de créer un répertoire images "images/zoom" ...');
define ('_ZOOM_INSTALL_CREATE_DIR_SUCC','fait!');
define ('_ZOOM_INSTALL_CREATE_DIR_FAIL','échec!');
define ('_ZOOM_INSTALL_MESS1','zOOm Image Gallery installé avec succès.<br>Vous pouvez maintenant rendre public vos albums!');
define ('_ZOOM_INSTALL_MESS2','NOTE: la première chose que vous devriez faire maintenant est d\'aller dans le menu composant ci-dessus,<br>repérer l\'accès à "zOOm Media Gallery Admin", le cliquer et<br>vérifier les paramètres de la page dans l\'espace Administrateur.');
define ('_ZOOM_INSTALL_MESS3','Ici vous pouvez modifier toutes les variables pour adapter zOOm à votre configuration.');
define ('_ZOOM_INSTALL_MESS4','N\'oubliez pas de créer une galerie et vous aurez fait le plus dur!');
define ('_ZOOM_INSTALL_MESS_FAIL1','zOOM Gallery n\'a pu être installé correctement!');
define ('_ZOOM_INSTALL_MESS_FAIL2','Les répertoires suivants doivent être créés et ensuite les droits passés à "0777":<br />'
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
define ('_ZOOM_INSTALL_MESS_FAIL3','Une fois que vous avez créé ces répertoires et changé les droits, aller à <br /> "Components -> zOOm Media Gallery" et adaptez les paramètres aux vôtres.');


//Module Language
define("_ZOOM_M_config","Module");
define("_ZOOM_M_method","Méthode de visualisation");
define("_ZOOM_M_all","tout");
define("_ZOOM_M_random","au hasard");
define("_ZOOM_M_newest","nouveau");
define("_ZOOM_M_hits","classements");
define("_ZOOM_M_votes","votes");
define("_ZOOM_M_count","Nbre d\'images:");
define("_ZOOM_M_lastup","Dernière mise à jour:");
define("_ZOOM_M_admin_count","Montrer le nombre d\'images:");
define("_ZOOM_M_admin_lastup","Montrer la date mise à jour:");
define("_ZOOM_M_admin_cats","Montrer le nom des galeries:");
define("_ZOOM_M_admin_meth","Montrer la méthode:");
define("_ZOOM_M_admin_df","Format de Date (j M, H:i):");
?>
