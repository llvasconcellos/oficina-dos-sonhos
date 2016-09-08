<?php
/**
* A DHTML menu component for mambo
* @version 1.11
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
* @dutch-language by Michiel Rensen
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Action Labels
DEFINE('_LX_NEW','Nieuw');
DEFINE('_LX_COPY','Kopieer');
DEFINE('_LX_EDIT','Wijzig');
DEFINE('_LX_DELETE','Verwijder');
DEFINE('_LX_CANCEL','Annuleer');
DEFINE('_LX_APPLY','Toepassen');
DEFINE('_LX_SAVE','Bewaar');
DEFINE('_LX_PREVIEW','Voorvertoning');

//Heading Labels
DEFINE('_LX_MENU_CONFIG','LxMenu Configuratie ');
DEFINE('_LX_MENU_PRO_CONFIG','LxMenu Pro Configuratie ');
DEFINE('_LX_MENU_ENTRIES','LxMenu Pro Waarden');

//Column Labels
DEFINE('_LX_DIRECTION','Richting');
DEFINE('_LX_POSITION_STYLE','Positie stijl');
DEFINE('_LX_MODULE_NAME','Module naam');
DEFINE('_LX_PUBLISHED','Module gepubliceerd');
DEFINE('_LX_ACCESS','Module toegang');
DEFINE('_LX_MODULE_POSITION','Modulepositie');
DEFINE('_LX_MENU_NAME','Menunaam');

//Tab Labels
DEFINE('_LX_TAB_COMMON','Algemeen');
DEFINE('_LX_TAB_BACKGROUND','Achtergrond');
DEFINE('_LX_TAB_BORDER','Kader');
DEFINE('_LX_TAB_LABEL','Label');
DEFINE('_LX_TAB_SUB_MENU','Submenu');

//Section Labels
DEFINE('_LX_SECTION_COMMON','Algemene instellingen');
DEFINE('_LX_SECTION_BACKGROUND_OUTER','Achtergrond instellingen (buiten)');
DEFINE('_LX_SECTION_BACKGROUND_INNER','Achtergrond instellingen (binnen)');
DEFINE('_LX_SECTION_BACKGROUND_MARGIN','Ruimte tussen binnen <> buiten (margin)');
DEFINE('_LX_SECTION_BORDER','Kader instellingen');
DEFINE('_LX_SECTION_BORDER_SIZE','Kadergrootte');
DEFINE('_LX_SECTION_LABEL_TEXT_SETTINGS','Menuitem tekstlabel instellingen');
DEFINE('_LX_SECTION_LABEL_PADDING','Ruimte tussen tekst en binnenste kader (padding)');
DEFINE('_LX_SECTION_MAIN_ITEM','Hoofditem instellingen');
DEFINE('_LX_SECTION_SUB_ITEM','Subitem instellingen');
DEFINE('_LX_SECTION_BACKGROUND_IMAGE','Achtergrondafbeelding');

//Field Labels
DEFINE('_LX_FIELD_MENU_NAME','Menu naam');
DEFINE('_LX_FIELD_MENU_DIRECTION','Menu richting');
DEFINE('_LX_FIELD_POSITION_STYLE','Positie stijl');
DEFINE('_LX_FIELD_POSITION_LEFT','Positie links');
DEFINE('_LX_FIELD_POSITION_TOP','Positie boven');
DEFINE('_LX_FIELD_ITEM_WIDTH','Item breedte');
DEFINE('_LX_FIELD_ITEM_HEIGHT','Item hoogte');
DEFINE('_LX_FIELD_CREATE_EXPAND_SYMBOL','Maak uitklap-symbool');
DEFINE('_LX_FIELD_EXPAND_SYMBOL','Uitklap symbool');
DEFINE('_LX_FIELD_POPUP_ON_CLICK','Popup na muisklik');
DEFINE('_LX_FIELD_EXPAND_DELAY','Uitklap vertraging');
DEFINE('_LX_FIELD_HIDE_DELAY','Verberg vertraging');
DEFINE('_LX_FIELD_COLOR','Kleur');
DEFINE('_LX_FIELD_COLOR_ON_HIGHLIGHT','Muisover');
DEFINE('_LX_FIELD_TOP','Boven');
DEFINE('_LX_FIELD_RIGHT','Rechts');
DEFINE('_LX_FIELD_BOTTOM','Onder');
DEFINE('_LX_FIELD_LEFT','Links');
DEFINE('_LX_FIELD_BORDER_SIZE','Size');
DEFINE('_LX_FIELD_BORDER_TYPE','Kadertype');
DEFINE('_LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT','Kadertype bij muisover');
DEFINE('_LX_FIELD_FONT_FAMILY','Lettertypefamilie');
DEFINE('_LX_FIELD_FONT_SIZE','Lettergrootte');
DEFINE('_LX_FIELD_ALIGN','Uitlijning');
DEFINE('_LX_FIELD_ALIGN_ON_HIGHLIGHT','Uitlijning bij muisover');
DEFINE('_LX_FIELD_WEIGHT','Zwaarte');
DEFINE('_LX_FIELD_WEIGHT_ON_HIGHLIGHT','Zwaarte letters bij muisover');
DEFINE('_LX_FIELD_DECORATION','Decoratie');
DEFINE('_LX_FIELD_DECORATION_ON_HIGHLIGHT','Decoratie bij muisover');
DEFINE('_LX_FIELD_WHITE_SPACE','Witte ruimte');
DEFINE('_LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT','Witte ruimte bij muisover');
DEFINE('_LX_FIELD_INHERIT_SETTINGS','Neem instellingen van hoofdmenu over');
DEFINE('_LX_FIELD_TOP_OFFSET','Positionering Boven');
DEFINE('_LX_FIELD_LEFT_OFFSET','Positionering Links');
DEFINE('_LX_FIELD_SET_TRANSPARENCY','Transparantie instellen');
DEFINE('_LX_FIELD_TRANSPARENCY','Transparentie');
DEFINE('_LX_FIELD_TEMPLATE','Template');
DEFINE('_LX_FIELD_MENU_ALIGN','Menu-uitlijning');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE','Selecteer afbeelding');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_HL','Afbeelding bij muisover');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_UPLOAD','Upload afbeelding');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_USE','Gebruik achtergrondafbeelding');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_REPEAT','Herhaal afbeelding');
DEFINE('_LX_FIELD_SUB_DIRECTION','Expand to'); //new
DEFINE('_LX_FIELD_SET_FADING','Enable fading effect');//needs translation
DEFINE('_LX_FIELD_BG_COLOR','Background color');//needs translation
DEFINE('_LX_FIELD_EXPANSION_DIRECTION','Expansion direction');//needs translation
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_POSITION','Image position');//needs translation

//Value Labels
DEFINE('_LX_LIST_VALUES_VERTICAL','verticaal');
DEFINE('_LX_LIST_VALUES_HORIZONTAL','horizontaal');
DEFINE('_LX_LIST_VALUES_RELATIVE','relatief');
DEFINE('_LX_LIST_VALUES_ABSOLUTE','absoluut');
DEFINE('_LX_LIST_VALUES_FIXED','gefixeerd');
DEFINE('_LX_LIST_VALUES_YES','Ja');
DEFINE('_LX_LIST_VALUES_NO','Nee');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_1','Pijl naar rechts grijs 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_2','Pijl naar rechts grijs 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_1','Pijl naar beneden grijs 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_2','Pijl naar beneden grijs 2');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_1','Pijl naar rechts wit 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_2','Pijl naar rechts wit 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_1','Pijl naar beneden wit 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_2','Pijl naar beneden wit 2');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_BLACK','Plusteken zwart');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_WHITE','Plusteken wit');
DEFINE('_LX_LIST_VALUES_BORDER_NONE','geen');
DEFINE('_LX_LIST_VALUES_BORDER_DOTTED','gestippeld');
DEFINE('_LX_LIST_VALUES_BORDER_DASHED','gestreept');
DEFINE('_LX_LIST_VALUES_BORDER_SOLID','solide');
DEFINE('_LX_LIST_VALUES_BORDER_DOUBLE','dubbel');
DEFINE('_LX_LIST_VALUES_BORDER_GROOVE','3D-lijn (groove)');
DEFINE('_LX_LIST_VALUES_BORDER_RIDGE','3D-lijn (ridge)');
DEFINE('_LX_LIST_VALUES_BORDER_INSET','3D-lijn (verdiept)');
DEFINE('_LX_LIST_VALUES_BORDER_OUTSET','3D-lijn (verhoogd)');
DEFINE('_LX_LIST_VALUES_LEFT','links');
DEFINE('_LX_LIST_VALUES_CENTER','midden');
DEFINE('_LX_LIST_VALUES_RIGHT','rechts');
DEFINE('_LX_LIST_VALUES_NORMAL','normaal');
DEFINE('_LX_LIST_VALUES_BOLD','vet');
DEFINE('_LX_LIST_VALUES_BOLDER','vetter');
DEFINE('_LX_LIST_VALUES_LIGHTER','lichter');
DEFINE('_LX_LIST_VALUES_NONE','geen');
DEFINE('_LX_LIST_VALUES_UNDERLINE','onderstreept');
DEFINE('_LX_LIST_VALUES_OVERLINE','overstreept');
DEFINE('_LX_LIST_VALUES_LINE_THROUGH','doorgestreept');
DEFINE('_LX_LIST_VALUES_NOWRAP','geen wrap');
DEFINE('_LX_LIST_VALUES_PALETTE_WINDOWS','Windows systeem palet');
DEFINE('_LX_LIST_VALUES_PALETTE_WEBSAFE','Webveilig palet');
DEFINE('_LX_LIST_VALUES_PALETTE_GREYSCALE','Grijstinten palet');
DEFINE('_LX_LIST_VALUES_PALETTE_MAC','MacOS palet');
DEFINE('_LX_LIST_VALUES_INDEPENDENT','- onafhankelijk -');
DEFINE('_LX_LIST_VALUES_NO_REPEAT','herhaal ook niet');
DEFINE('_LX_LIST_VALUES_REPEAT','herhaal horizontaal en verticaal');
DEFINE('_LX_LIST_VALUES_REPEAT_X','herhaal alleen horizontaal');
DEFINE('_LX_LIST_VALUES_REPEAT_Y','herhaal alleen verticaal');

//Other Labels
DEFINE('_LX_MAIN_MENU','Hoofdmenu');
DEFINE('_LX_SUB_MENU','Submenu');
DEFINE('_LX_NONE_MODULE','Open en bewaar om de module te herstellen');
DEFINE('_LX_TOOLTIP_IMG_UPLOAD','Upload afbeelding');
DEFINE('_LX_TOOLTIP_IMG_CANCEL','Annuleer upload');
DEFINE('_LX_TOOLTIP_IMG_REMOVE','Verwijder afbeelding');

//Help Labels
DEFINE('_LX_HELP_MENU_NAME','Selecteer welk menu je wilt gebruiken voor LxMenu <b>(heeft geen effect op de voorvertoning voordat je je wijzigingen hebt opgeslagen)</b>');
DEFINE('_LX_HELP_TEMPLATE','Dit menu wordt in de geselecteerde template getoond');
DEFINE('_LX_HELP_MENU_DIRECTION','Beslis hier of het menu horizontaal of verticaal moet uitklappen');
DEFINE('_LX_HELP_POSITION_STYLE','Hoe moet het menu gepositioneerd worden in het hoofdelement <b>(heeft geen effect op de voorvertoning)</b>');
DEFINE('_LX_HELP_POSITION_LEFT','Afhankelijk van positiestijl <b>(heeft geen effect op de voorvertoning)</b>');
DEFINE('_LX_HELP_POSITION_TOP','Afhankelijk van positiestijl <b>(heeft geen effect op de voorvertoning)</b>');
DEFINE('_LX_HELP_ITEM_WIDTH',"Stel hier de breedte van de menuitems in (in pixels)");
DEFINE('_LX_HELP_ITEM_HEIGHT',"Stel hier de hoogte van de menuitems in (in pixels)");
DEFINE('_LX_HELP_CREATE_EXPAND_SYMBOL','Moet het uitklapsymbool weergegeven worden bij menuitems met tenminste ŽŽn subitem?');
DEFINE('_LX_HELP_POPUP_ON_CLICK','Moet het submenu alleen uitklappen wanneer er op het hoofdmenuitem geklikt wordt?');
DEFINE('_LX_HELP_EXPAND_DELAY','Tijdsvertraging in miliseconden voordat het submenu uitklapt');
DEFINE('_LX_HELP_HIDE_DELAY','Tijdsvertraging in miliseconden voordat het submenu inklapt');
DEFINE('_LX_HELP_BG_COLOR','Achtergrondkleur');
DEFINE('_LX_HELP_BG_COLOR_ON_HIGHLIGHT','Achtergrondkleur bij muisover');
DEFINE('_LX_HELP_MARGIN_TOP','Bovenmarge in pixels');
DEFINE('_LX_HELP_MARGIN_RIGHT','Rechtermarge in pixels');
DEFINE('_LX_HELP_MARGIN_BOTTOM','Ondermarge in pixels');
DEFINE('_LX_HELP_MARGIN_LEFT','Linkermarge in pixels');
DEFINE('_LX_HELP_BORDER_TYPE','Kadertype');
DEFINE('_LX_HELP_BORDER_TYPE_ON_HIGHLIGHT','Kadertype bij muisover');
DEFINE('_LX_HELP_BORDER_SIZE','Kaderbreedte in pixels');
DEFINE('_LX_HELP_BORDER_COLOR','Kaderkleur');
DEFINE('_LX_HELP_BORDER_COLOR_ON_HIGHLIGHT','Kaderkleur bij muisover');
DEFINE('_LX_HELP_FONT_FAMILY',"Lettertypefamilie <b>(bij verandering moet je misschien ook de hoogte, labelruimte en kaderinstellingen aanpassen van het item)</b>");
DEFINE('_LX_HELP_FONT_SIZE',"Lettergrootte <b>(bij verandering moet je misschien ook de hoogte, labelruimte en kaderinstellingen aanpassen van het item)</b>");
DEFINE('_LX_HELP_COLOR','Tekstkleur');
DEFINE('_LX_HELP_COLOR_ON_HIGHLIGHT','Tekstkleur bij muisover');
DEFINE('_LX_HELP_ALIGN','Tekstuitlijning');
DEFINE('_LX_HELP_ALIGN_ON_HIGHLIGHT','Tekstuitlijning bij muisover');
DEFINE('_LX_HELP_WEIGHT','Font weight');
DEFINE('_LX_HELP_WEIGHT_ON_HIGHLIGHT','Font weight on mouse over events');
DEFINE('_LX_HELP_DECORATION','Tekstdecoratie');
DEFINE('_LX_HELP_DECORATION_ON_HIGHLIGHT','Tekstdecoratie bij muisover');
DEFINE('_LX_HELP_WHITE_SPACE','Behandeling van witte ruimte');
DEFINE('_LX_HELP_WHITE_SPACE_ON_HIGHLIGHT','Behandeling van witte ruimte bij muisover');
DEFINE('_LX_HELP_PADDING_TOP','Padding boven');
DEFINE('_LX_HELP_PADDING_RIGHT','Padding rechts');
DEFINE('_LX_HELP_PADDING_BOTTOM','Padding onder');
DEFINE('_LX_HELP_PADDING_LEFT','Padding links');
DEFINE('_LX_HELP_INHERIT_SETTINGS','Neem instellingen over van hoofdmenu?');
DEFINE('_LX_HELP_TOP_OFFSET','Positionering boven voor submenu\'s');
DEFINE('_LX_HELP_LEFT_OFFSET','Positionering links voor submenu\'s');
DEFINE('_LX_HELP_SET_TRANSPARENCY','Moet transparantie worden geactiveerd? <b>(werkt alleen in IE en Gecko browsers)<b>');
DEFINE('_LX_HELP_TRANSPARENCY','Transparantiewaarde in procenten (kleinere waarde betekent meer transparantie, 100% betekent geen transparantie)');
DEFINE('_LX_HELP_MENU_ALIGN','Uitlijning van gehele menu. Alleen voor horizontale menu\'s. (geen effect op voorvertoning)');
DEFINE('_LX_HELP_MAIN_ITEM_WIDTH',"Stel hier de breedte van de menuitems in (in pixels). Ingesteld op 0 (alleen hoofdmenuitems) bij horizontale ori‘ntatie is de breedte van de menuitems afhankelijk van de tekstlabellengte <b>(wordt niet ondersteund door LxMenu Free)</b>.");
DEFINE('_LX_HELP_SUB_ITEM_HEIGHT',"Stel hier de hoogte van de menuitems in (in pixels). Ingesteld op 0 (alleen voor submenuitems) bij zowel horizontale als verticale ori‘ntatie is de hoogte van de submenuitems afhankelijk van de tekstlabellengte <b>(wordt niet ondersteund door LxMenu Free)</b>.");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_USE',"Wil je een achtergrondafbeelding gebruiken?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE',"Gebruik deze achtergrondafbeelding");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_HL',"Achtergrondafbeelding te gebruiken bij muisover");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_REPEAT',"In welke richting moet de achtergrondafbeelding al of niet herhaald worden?");
DEFINE('_LX_HELP_SUB_DIRECTION','Direction which the submenus should expand to'); //new
DEFINE('_LX_HELP_SET_FADING',"Would you like to enable a fading effect for sub menu items?");//needs translation
DEFINE('_LX_HELP_MENU_BG_COLOR',"Background color from the menu block on horizontal orientation. <b>(does not affect the preview)</b>");//needs translation
DEFINE('_LX_HELP_EXPANSION_DIRECTION',"Which direction should sub menu items expand to?");//needs translation
DEFINE('_LX_HELP_BACKGROUND_IMAGE_POSITION',"Choose the position the image should placed to.");//needs translation
?>