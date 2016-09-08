<?php
/**
* A DHTML menu component for mambo
* @version 1.13

* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
* Preklad: Vamp_, pchvojka@centrum.cz, zdnek.machek@atlas.cz 
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Action Labels
DEFINE('_LX_NEW','Nové');
DEFINE('_LX_COPY','Kopírovat');
DEFINE('_LX_EDIT','Upravit');
DEFINE('_LX_DELETE','Vymazat');
DEFINE('_LX_CANCEL','Zru¹it');
DEFINE('_LX_APPLY','Potvrdit');
DEFINE('_LX_SAVE','Ulo¾it');
DEFINE('_LX_PREVIEW','Náhled');

//Heading Labels
DEFINE('_LX_MENU_CONFIG','LxMenu Konfigurace ');
DEFINE('_LX_MENU_PRO_CONFIG','LxMenu Pro Konfigurace ');
DEFINE('_LX_MENU_ENTRIES','LxMenu Pro Polo¾ky');

//Column Labels
DEFINE('_LX_DIRECTION','Smìrování');
DEFINE('_LX_POSITION_STYLE','Pozice stylu');
DEFINE('_LX_MODULE_NAME','Název modulu');
DEFINE('_LX_PUBLISHED','Publikovat modul');
DEFINE('_LX_ACCESS','Pøístup k modulu');
DEFINE('_LX_MODULE_POSITION','Pozice modulu');
DEFINE('_LX_MENU_NAME','Jméno menu');

//Tab Labels
DEFINE('_LX_TAB_COMMON','Hlavní');
DEFINE('_LX_TAB_BACKGROUND','Pozadí');
DEFINE('_LX_TAB_BORDER','Okraj');
DEFINE('_LX_TAB_LABEL','Vzhled polo¾ky');
DEFINE('_LX_TAB_SUB_MENU','Podmenu');

//Section Labels
DEFINE('_LX_SECTION_COMMON','Hlavní nastavení');
DEFINE('_LX_SECTION_BACKGROUND_OUTER','Nastavení pozadí (vnìj¹í)');
DEFINE('_LX_SECTION_BACKGROUND_INNER','Nastavení pozadí (vnitøní)');
DEFINE('_LX_SECTION_BACKGROUND_MARGIN','Nastavení mezer vnitøní<>  vnìj¹í (margin)');
DEFINE('_LX_SECTION_BORDER','Nastavení okrajù');
DEFINE('_LX_SECTION_BORDER_SIZE','Velikost okraje');
DEFINE('_LX_SECTION_LABEL_TEXT_SETTINGS','Nastavení polo¾ky menu ');
DEFINE('_LX_SECTION_LABEL_PADDING','Nastavení Padding ');
DEFINE('_LX_SECTION_MAIN_ITEM','Nastavení hlavní polo¾ky menu');
DEFINE('_LX_SECTION_SUB_ITEM','Nastavení polo¾ky podmenu');
DEFINE('_LX_SECTION_BACKGROUND_IMAGE','Obrázek na pozadí');

//Field Labels
DEFINE('_LX_FIELD_MENU_NAME','Jméno menu');
DEFINE('_LX_FIELD_MENU_DIRECTION','Orientace menu');
DEFINE('_LX_FIELD_POSITION_STYLE','Pozice stylu');
DEFINE('_LX_FIELD_POSITION_LEFT','Pozice vlevo');
DEFINE('_LX_FIELD_POSITION_TOP','Pozice nahore');
DEFINE('_LX_FIELD_ITEM_WIDTH','Délka polo¾ky');
DEFINE('_LX_FIELD_ITEM_HEIGHT','Vý¹ka polo¾ky');
DEFINE('_LX_FIELD_CREATE_EXPAND_SYMBOL','Vytvoøit expand symbol');
DEFINE('_LX_FIELD_EXPAND_SYMBOL','Expandovaný symbol');
DEFINE('_LX_FIELD_POPUP_ON_CLICK','Vytahování menu pokliknutím');
DEFINE('_LX_FIELD_EXPAND_DELAY','Spo¾dìní rozvinutí menu');
DEFINE('_LX_FIELD_HIDE_DELAY','Spo¾dìní stáhnutí menu');
DEFINE('_LX_FIELD_COLOR','Barva');
DEFINE('_LX_FIELD_COLOR_ON_HIGHLIGHT','Po najetí');
DEFINE('_LX_FIELD_TOP','Nahoøe');
DEFINE('_LX_FIELD_RIGHT','Vpravo');
DEFINE('_LX_FIELD_BOTTOM','Dole');
DEFINE('_LX_FIELD_LEFT','Vlevo');
DEFINE('_LX_FIELD_BORDER_SIZE','Velikost');
DEFINE('_LX_FIELD_BORDER_TYPE','Typ');
DEFINE('_LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT','Typ po najetí');
DEFINE('_LX_FIELD_FONT_FAMILY','Font písma');
DEFINE('_LX_FIELD_FONT_SIZE','Velikost písma');
DEFINE('_LX_FIELD_ALIGN','Zarovnání');
DEFINE('_LX_FIELD_ALIGN_ON_HIGHLIGHT','Zarovnání po najetí');
DEFINE('_LX_FIELD_WEIGHT','©íøka');
DEFINE('_LX_FIELD_WEIGHT_ON_HIGHLIGHT','©íøka po najetí');
DEFINE('_LX_FIELD_DECORATION','Zvýraznìní');
DEFINE('_LX_FIELD_DECORATION_ON_HIGHLIGHT','Zvýraznìní po najetí');
DEFINE('_LX_FIELD_WHITE_SPACE','White space');
DEFINE('_LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT','White space po najetí');
DEFINE('_LX_FIELD_INHERIT_SETTINGS','Dìdièné nastavení z hlavního menu');
DEFINE('_LX_FIELD_TOP_OFFSET','Odsazení zvrchu');
DEFINE('_LX_FIELD_LEFT_OFFSET','Odsazení zleva');
DEFINE('_LX_FIELD_SET_TRANSPARENCY','Nastavení prùhlednosti');
DEFINE('_LX_FIELD_TRANSPARENCY','Prùhlednost');
DEFINE('_LX_FIELD_TEMPLATE','Vzhled');
DEFINE('_LX_FIELD_MENU_ALIGN','Zarovnání menu');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE','Vybrat obrázek');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_HL','Obrázek po najetí');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_UPLOAD','Nahrát obrázek');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_USE','Pou¾ij obrázek na pozadí');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_REPEAT','Opakovat obrázek');
DEFINE('_LX_FIELD_SUB_DIRECTION','Expand to'); //new
DEFINE('_LX_FIELD_SET_FADING','Zapnout  slábnoucí efekt');
DEFINE('_LX_FIELD_BG_COLOR','Barva pozadí');
DEFINE('_LX_FIELD_EXPANSION_DIRECTION','Orientace pøeteèení');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_POSITION','Pozice obrázku');

//Value Labels
DEFINE('_LX_LIST_VALUES_VERTICAL','Vertikální');
DEFINE('_LX_LIST_VALUES_HORIZONTAL','Horizontální');
DEFINE('_LX_LIST_VALUES_RELATIVE','relativní');
DEFINE('_LX_LIST_VALUES_ABSOLUTE','absolutní');
DEFINE('_LX_LIST_VALUES_FIXED','fixovaná');
DEFINE('_LX_LIST_VALUES_YES','Ano');
DEFINE('_LX_LIST_VALUES_NO','Ne');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_1','Pravá ¹ipka ¹edá 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_2','Pravá ¹ipka ¹edá 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_1','Dolní ¹ipka ¹edá 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_2','Dolní ¹ipka ¹edá2');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_1','Pravá ¹ipka bílá 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_2','Pravá ¹ipka bílá 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_1','Dolní ¹ipka bílá 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_2','Dolní ¹ipka bílá 2');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_BLACK','Znak plus èerný');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_WHITE','Znak plus bílý');
DEFINE('_LX_LIST_VALUES_BORDER_NONE','nic');
DEFINE('_LX_LIST_VALUES_BORDER_DOTTED','teèkovanì');
DEFINE('_LX_LIST_VALUES_BORDER_DASHED','èárkovanì');
DEFINE('_LX_LIST_VALUES_BORDER_SOLID','vcelku');
DEFINE('_LX_LIST_VALUES_BORDER_DOUBLE','dvojitì');
DEFINE('_LX_LIST_VALUES_BORDER_GROOVE','¾lábek');
DEFINE('_LX_LIST_VALUES_BORDER_RIDGE','ridge');
DEFINE('_LX_LIST_VALUES_BORDER_INSET','uvnitø');
DEFINE('_LX_LIST_VALUES_BORDER_OUTSET','vnì');
DEFINE('_LX_LIST_VALUES_LEFT','vlevo');
DEFINE('_LX_LIST_VALUES_CENTER','nastøed');
DEFINE('_LX_LIST_VALUES_RIGHT','vpravo');
DEFINE('_LX_LIST_VALUES_NORMAL','normal');
DEFINE('_LX_LIST_VALUES_BOLD','tuènì');
DEFINE('_LX_LIST_VALUES_BOLDER','tuènìj¹í');
DEFINE('_LX_LIST_VALUES_LIGHTER','lehèí, svìtlej¹í');
DEFINE('_LX_LIST_VALUES_NONE','¾ádný');
DEFINE('_LX_LIST_VALUES_UNDERLINE','podtr¾ený');
DEFINE('_LX_LIST_VALUES_OVERLINE','nadtr¾ený');
DEFINE('_LX_LIST_VALUES_LINE_THROUGH','pøe¹krtnutý');
DEFINE('_LX_LIST_VALUES_NOWRAP','neopakovat');
DEFINE('_LX_LIST_VALUES_PALETTE_WINDOWS','Windows system paleta');
DEFINE('_LX_LIST_VALUES_PALETTE_WEBSAFE','Web safe paleta');
DEFINE('_LX_LIST_VALUES_PALETTE_GREYSCALE','Grey scale paleta');
DEFINE('_LX_LIST_VALUES_PALETTE_MAC','Mac OS paleta');
DEFINE('_LX_LIST_VALUES_INDEPENDENT','- nezávlislý/e -');
DEFINE('_LX_LIST_VALUES_NO_REPEAT','nadále neopakovat');
DEFINE('_LX_LIST_VALUES_REPEAT','opakovat vodorovnì a svisle');
DEFINE('_LX_LIST_VALUES_REPEAT_X','opakovat jen vodorovnì');
DEFINE('_LX_LIST_VALUES_REPEAT_Y','opakovat jen svisle');

//Other Labels
DEFINE('_LX_MAIN_MENU','Hlavní menu');
DEFINE('_LX_SUB_MENU','Pod menu');
DEFINE('_LX_NONE_MODULE','Prosím otevøete a ulo¾te pro obnovení modul');
DEFINE('_LX_TOOLTIP_IMG_UPLOAD','Nahraní obrázku');
DEFINE('_LX_TOOLTIP_IMG_CANCEL','Zru¹ení nahrávání');
DEFINE('_LX_TOOLTIP_IMG_REMOVE','Vymazání obrázku');

//Help Labels
DEFINE('_LX_HELP_MENU_NAME','Vyber menu, pro které chce¹ nastavit LxMenu <b>(neovlivní náhled, dokud nejsou ulo¾eny zmìny)</b>');
DEFINE('_LX_HELP_TEMPLATE','Toto menu se objeví ve zvolené ¹ablonì');
DEFINE('_LX_HELP_MENU_DIRECTION','Rozhodni, zda se má menu zobrazit horizontálnì nebo vertikálnì');
DEFINE('_LX_HELP_POSITION_STYLE','Jak by mìlo být menu umístìno v rodièovském elementu<b>(neovlivní náhled)</b>');
DEFINE('_LX_HELP_POSITION_LEFT','Je ovlivnìno nastavením stylu umístìní<b>(neovlivní náhled)</b>');
DEFINE('_LX_HELP_POSITION_TOP','Je ovlivnìno nastavením stylu umístìní <b>(neovlivní náhled)</b>');
DEFINE('_LX_HELP_ITEM_WIDTH',' Zadejte ¹íøku polo¾ky menu v pixelech');
DEFINE('_LX_HELP_ITEM_HEIGHT',' Zadejte vý¹ku polo¾ky menu v pixelech ');
DEFINE('_LX_HELP_CREATE_EXPAND_SYMBOL','Mìl by se expandovaný sysmbol objevit v polo¾ce menu obsahující alespoò jednu podpolo¾ku?');
DEFINE('_LX_HELP_POPUP_ON_CLICK','Zobrazit rozevírací podmenu poklikáním na polo¾ku menu?');
DEFINE('_LX_HELP_EXPAND_DELAY','Èas prodlevy v milisekundách pøed otevøením podmenu');
DEFINE('_LX_HELP_HIDE_DELAY','Èas prodlevy v milisekundách pøed schováním podmenu');
DEFINE('_LX_HELP_BG_COLOR','Barva pozadí');
DEFINE('_LX_HELP_BG_COLOR_ON_HIGHLIGHT','Barva pozadí po najetí my¹í');
DEFINE('_LX_HELP_MARGIN_TOP','Odsazení zezhora v pixelech');
DEFINE('_LX_HELP_MARGIN_RIGHT','Odsazení zprava v pixelech');
DEFINE('_LX_HELP_MARGIN_BOTTOM','Odsazení zespodu v pixelech');
DEFINE('_LX_HELP_MARGIN_LEFT','Odsazení zleva v pixelech');
DEFINE('_LX_HELP_BORDER_TYPE','Typ okraje');
DEFINE('_LX_HELP_BORDER_TYPE_ON_HIGHLIGHT','Typ okraje po najetí my¹í');
DEFINE('_LX_HELP_BORDER_SIZE','Okraj v pixelech');
DEFINE('_LX_HELP_BORDER_COLOR','Barva okraje');
DEFINE('_LX_HELP_BORDER_COLOR_ON_HIGHLIGHT','Barva okraje po najetí ');
DEFINE('_LX_HELP_FONT_FAMILY',"Font family <b>(po zmìnì nastavení bude¹ muset pøenastavit polo¾ky\' vý¹ky, odsazení popisku nebo nastavení okraje)</b>");
DEFINE('_LX_HELP_FONT_SIZE',"Font size <b>(po zmìnì nastavení bude¹ muset pøenastavit polo¾ky\' vý¹ky, odsazení popisku nebo nastavení okraje)</b>");
DEFINE('_LX_HELP_COLOR','Barva textu');
DEFINE('_LX_HELP_COLOR_ON_HIGHLIGHT','Barva textu po najetí');
DEFINE('_LX_HELP_ALIGN','Zarovnání textu');
DEFINE('_LX_HELP_ALIGN_ON_HIGHLIGHT','Zarovnání textu po najetí');
DEFINE('_LX_HELP_WEIGHT','Tlou¹»ka textu');
DEFINE('_LX_HELP_WEIGHT_ON_HIGHLIGHT','Tlou¹»ka textu po najetí');
DEFINE('_LX_HELP_DECORATION','Zvýraznìní textu');
DEFINE('_LX_HELP_DECORATION_ON_HIGHLIGHT','Zvýraznìní textu po najetí');
DEFINE('_LX_HELP_WHITE_SPACE','Úprava bílých míst');
DEFINE('_LX_HELP_WHITE_SPACE_ON_HIGHLIGHT','Upravení bílých míst po najetí');
DEFINE('_LX_HELP_PADDING_TOP','Odsazení od vrchu');
DEFINE('_LX_HELP_PADDING_RIGHT','Odsazení zprava');
DEFINE('_LX_HELP_PADDING_BOTTOM','Odsazení od spodu');
DEFINE('_LX_HELP_PADDING_LEFT','Odsazení zleva');
DEFINE('_LX_HELP_INHERIT_SETTINGS','Dìdit nastavení z hlavního menu?');
DEFINE('_LX_HELP_TOP_OFFSET','Odsazení zvrchu pro sub menu');
DEFINE('_LX_HELP_LEFT_OFFSET','Odsazení zleva pro sub menu');
DEFINE('_LX_HELP_SET_TRANSPARENCY','Aktivovat prùsvitnost? <b>(pracuje pouze na IE, Firefox)</b>');
DEFINE('_LX_HELP_TRANSPARENCY','Prùsvitnost v procentech (ni¾¹í hodnota znamená prùsvitnìj¹í, 100% neprùsvitné)');
DEFINE('_LX_HELP_MENU_ALIGN','Zarovnání celého bloku menu. Pouze horizontální menu. (neovlivní náhled)');
DEFINE('_LX_HELP_MAIN_ITEM_WIDTH',"Nastav vý¹ku polo¾ky \' v pixelech. 0 (pouze polo¾ky hlavního menu) horizontální i vertikální nastavení bude zále¾et na délkách textù<b>(není k dispozici na  LxMenu Free)</b>.");
DEFINE('_LX_HELP_SUB_ITEM_HEIGHT',"Nastav vý¹ku pod polo¾ky items\' v pixelech. 0 (pouze pod polo¾ky) horizontální i vertikální nastavení bude zále¾et na délkách textù<b>(není k dispozici na LxMenu Free)</b>.");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_USE',"Pou¾ít obrázek na pozadí?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE',"Obrázek pro pozadí");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_HL',"Obrázek pozadí, který se pou¾ije po najetí my¹í");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_REPEAT',"Pokud se bude opakovat obrázek pozadí, jakým zpùsobem");
DEFINE('_LX_HELP_SUB_DIRECTION','Direction which the submenus should expand to'); //new
DEFINE('_LX_HELP_SET_FADING',"Zapnout padací efekt pro zobrazování menu?");
DEFINE('_LX_HELP_MENU_BG_COLOR',"Pozadí z bliku menu pro horizontální zobrazení. <b>(neovlivní náhled)</b>");
DEFINE('_LX_HELP_EXPANSION_DIRECTION',"Kterým smìrem rozbalit menu?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_POSITION',"Vyber pozici pro umístìní obrázku.");?>
