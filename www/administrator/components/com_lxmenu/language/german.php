<?php
/**
* A DHTML menu component for mambo
* @version 1.11
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

defined( '_VALID_MOS' ) or die( 'Direkter Zugriff auf diese Seite nicht gestattet.' );

//Action Labels
DEFINE('_LX_NEW','Neu');
DEFINE('_LX_COPY','Kopieren');
DEFINE('_LX_EDIT','Bearbeiten');
DEFINE('_LX_DELETE','L&ouml;schen');
DEFINE('_LX_CANCEL','Abbrechen');
DEFINE('_LX_APPLY','&Uuml;bernehmen');
DEFINE('_LX_SAVE','Speichern');
DEFINE('_LX_PREVIEW','Vorschau');

//Heading Labels
DEFINE('_LX_MENU_CONFIG','LxMenu Konfiguration ');
DEFINE('_LX_MENU_PRO_CONFIG','LxMenu Pro Konfiguration ');
DEFINE('_LX_MENU_ENTRIES','LxMenu Pro Eintr&auml;ge');

//Column Labels
DEFINE('_LX_DIRECTION','Ausrichtung');
DEFINE('_LX_POSITION_STYLE','Positionierung');
DEFINE('_LX_MODULE_NAME','Modulname');
DEFINE('_LX_PUBLISHED','Modul ver&ouml;ffentlicht');
DEFINE('_LX_ACCESS','Modulberechtigung');
DEFINE('_LX_MODULE_POSITION','Modulposition');
DEFINE('_LX_MENU_NAME','Men&uuml;name');

//Tab Labels
DEFINE('_LX_TAB_COMMON','Allgemein');
DEFINE('_LX_TAB_BACKGROUND','Hintergrund');
DEFINE('_LX_TAB_BORDER','Rahmen');
DEFINE('_LX_TAB_LABEL','Text');
DEFINE('_LX_TAB_SUB_MENU','Untermen&uuml;');

//Section Labels
DEFINE('_LX_SECTION_COMMON','Allgemeine Einstellungen');
DEFINE('_LX_SECTION_BACKGROUND_OUTER','Hintergrundeinstellungen (aussen)');
DEFINE('_LX_SECTION_BACKGROUND_INNER','Hintergrundeinstellungen (innen)');
DEFINE('_LX_SECTION_BACKGROUND_MARGIN','Abstand zwischen dem inneren und &auml;usseren Bereich (margin)');
DEFINE('_LX_SECTION_BORDER','Rahmeneinstellungen');
DEFINE('_LX_SECTION_BORDER_SIZE','Rahmenst&auml;rke');
DEFINE('_LX_SECTION_LABEL_TEXT_SETTINGS','Texteinstellungen');
DEFINE('_LX_SECTION_LABEL_PADDING','Abstand zwischen Text und dem inneren Bereich (padding)');
DEFINE('_LX_SECTION_MAIN_ITEM','Einstellungen Hauptmen&uuml;elemente');
DEFINE('_LX_SECTION_SUB_ITEM','Einstellungen Untermen&uuml;elemente');
DEFINE('_LX_SECTION_BACKGROUND_IMAGE','Hintergrundbild');

//Field Labels
DEFINE('_LX_FIELD_MENU_NAME','Men&uuml;name');
DEFINE('_LX_FIELD_MENU_DIRECTION','Ausrichtung des Men&uuml;s');
DEFINE('_LX_FIELD_POSITION_STYLE','Positionierung');
DEFINE('_LX_FIELD_POSITION_LEFT','Positionierung links');
DEFINE('_LX_FIELD_POSITION_TOP','Positionierung oben');
DEFINE('_LX_FIELD_ITEM_WIDTH','Elementbreite');
DEFINE('_LX_FIELD_ITEM_HEIGHT','Elementh&ouml;he');
DEFINE('_LX_FIELD_CREATE_EXPAND_SYMBOL','Erweiterungssymbol anzeigen');
DEFINE('_LX_FIELD_EXPAND_SYMBOL','Erweiterungssymbol');
DEFINE('_LX_FIELD_POPUP_ON_CLICK','Men&uuml; bei Mausklick expandieren');
DEFINE('_LX_FIELD_EXPAND_DELAY','Verz&ouml;gerung der Expansion um');
DEFINE('_LX_FIELD_HIDE_DELAY','Verz&ouml;gerung des Zuklappens um');
DEFINE('_LX_FIELD_COLOR','Farbe');
DEFINE('_LX_FIELD_COLOR_ON_HIGHLIGHT','Farbe beim Hervorheben');
DEFINE('_LX_FIELD_TOP','Oben');
DEFINE('_LX_FIELD_RIGHT','Rechts');
DEFINE('_LX_FIELD_BOTTOM','Unten');
DEFINE('_LX_FIELD_LEFT','Links');
DEFINE('_LX_FIELD_BORDER_SIZE','Rahmenst&auml;rke');
DEFINE('_LX_FIELD_BORDER_TYPE','Rahmentyp');
DEFINE('_LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT','Rahmentyp beim Hervorheben');
DEFINE('_LX_FIELD_FONT_FAMILY','Schriftart-Familie');
DEFINE('_LX_FIELD_FONT_SIZE','Gr&ouml;sse der Schriftart');
DEFINE('_LX_FIELD_ALIGN','Textausrichtung');
DEFINE('_LX_FIELD_ALIGN_ON_HIGHLIGHT','Textausrichtung beim Hervorheben');
DEFINE('_LX_FIELD_WEIGHT','Schriftst&auml;rke');
DEFINE('_LX_FIELD_WEIGHT_ON_HIGHLIGHT','Schriftst&auml;rke beim Hervorheben');
DEFINE('_LX_FIELD_DECORATION','Textdekoration');
DEFINE('_LX_FIELD_DECORATION_ON_HIGHLIGHT','Textdekoration beim Hervorheben');
DEFINE('_LX_FIELD_WHITE_SPACE','Zeilenumbruch');
DEFINE('_LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT','Zeilenumbruch beim Hervorheben');
DEFINE('_LX_FIELD_INHERIT_SETTINGS','Einstellungen vom Hauptmen&uuml; &uuml;bernehmen');
DEFINE('_LX_FIELD_TOP_OFFSET','Versatz oben um');
DEFINE('_LX_FIELD_LEFT_OFFSET','Verstaz links um');
DEFINE('_LX_FIELD_SET_TRANSPARENCY','Transparenz setzen');
DEFINE('_LX_FIELD_TRANSPARENCY','Transparenz');
DEFINE('_LX_FIELD_TEMPLATE','Vorlage');
DEFINE('_LX_FIELD_MENU_ALIGN','Ausrichtung');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE','Bild ausw&auml;hlen');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_HL','Bild beim Hervorheben');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_UPLOAD','Bilddatei hochladen');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_USE','Hintergrundbild verwenden');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_REPEAT','Bild wiederholen');
DEFINE('_LX_FIELD_SUB_DIRECTION','Ausklappen nach');
DEFINE('_LX_FIELD_SET_FADING','Einblendungseffekt');
DEFINE('_LX_FIELD_BG_COLOR','Hintergrundfarbe');
DEFINE('_LX_FIELD_EXPANSION_DIRECTION','Ausklappen nach');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_POSITION','Bildposition');

//Value Labels
DEFINE('_LX_LIST_VALUES_VERTICAL','vertikal');
DEFINE('_LX_LIST_VALUES_HORIZONTAL','horizontal');
DEFINE('_LX_LIST_VALUES_RELATIVE','relativ');
DEFINE('_LX_LIST_VALUES_ABSOLUTE','absolut');
DEFINE('_LX_LIST_VALUES_FIXED','fixiert');
DEFINE('_LX_LIST_VALUES_YES','Ja');
DEFINE('_LX_LIST_VALUES_NO','Nein');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_1','Pfeil nach rechts grau 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_2','Pfeil nach rechts grau 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_1','Pfeil nach unten grau 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_2','Pfeil nach unten grau 2');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_1','Pfeil nach unten weiss 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_2','Pfeil nach unten weiss 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_1','Pfeil nach unten weiss 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_2','Pfeil nach unten weiss 2');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_BLACK','Pluszeichen schwarz');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_WHITE','Pluszeichen weiss');
DEFINE('_LX_LIST_VALUES_BORDER_NONE','kein');
DEFINE('_LX_LIST_VALUES_BORDER_DOTTED','gepunktet');
DEFINE('_LX_LIST_VALUES_BORDER_DASHED','gestrichelt');
DEFINE('_LX_LIST_VALUES_BORDER_SOLID','durchgezogen');
DEFINE('_LX_LIST_VALUES_BORDER_DOUBLE','doppelt');
DEFINE('_LX_LIST_VALUES_BORDER_GROOVE','3D-Linie (groove)');
DEFINE('_LX_LIST_VALUES_BORDER_RIDGE','3D-Linie (ridge)');
DEFINE('_LX_LIST_VALUES_BORDER_INSET','3D-Linie vertieft');
DEFINE('_LX_LIST_VALUES_BORDER_OUTSET','3D-Linie angehoben');
DEFINE('_LX_LIST_VALUES_LEFT','links');
DEFINE('_LX_LIST_VALUES_CENTER','zentriert');
DEFINE('_LX_LIST_VALUES_RIGHT','rechts');
DEFINE('_LX_LIST_VALUES_NORMAL','normal');
DEFINE('_LX_LIST_VALUES_BOLD','fett');
DEFINE('_LX_LIST_VALUES_BOLDER','sehr fett');
DEFINE('_LX_LIST_VALUES_LIGHTER','schmal');
DEFINE('_LX_LIST_VALUES_NONE','keine');
DEFINE('_LX_LIST_VALUES_UNDERLINE','unterstrichen');
DEFINE('_LX_LIST_VALUES_OVERLINE','&uuml;berstrichen');
DEFINE('_LX_LIST_VALUES_LINE_THROUGH','durchgestrichen');
DEFINE('_LX_LIST_VALUES_NOWRAP','kein Zeilenumbruch');
DEFINE('_LX_LIST_VALUES_PALETTE_WINDOWS','Windows Systemfarben');
DEFINE('_LX_LIST_VALUES_PALETTE_WEBSAFE','Websichere Farben');
DEFINE('_LX_LIST_VALUES_PALETTE_GREYSCALE','Graustufen');
DEFINE('_LX_LIST_VALUES_PALETTE_MAC','Mac OS Systemfarben');
DEFINE('_LX_LIST_VALUES_INDEPENDENT','- unabh&auml;ngig -');
DEFINE('_LX_LIST_VALUES_NO_REPEAT','nicht wiederholen');
DEFINE('_LX_LIST_VALUES_REPEAT','wiederholen horizontal und vertikal');
DEFINE('_LX_LIST_VALUES_REPEAT_X','wiederholen horizontal');
DEFINE('_LX_LIST_VALUES_REPEAT_Y','wiederholen vertikal');

//Other Labels
DEFINE('_LX_MAIN_MENU','Hauptmen&uuml;');
DEFINE('_LX_SUB_MENU','Untermen&uuml;');
DEFINE('_LX_NONE_MODULE','Bitte &ouml;ffnen und speichern zur Wiederherstellung');
DEFINE('_LX_TOOLTIP_IMG_UPLOAD','Bilddatei hochladen');
DEFINE('_LX_TOOLTIP_IMG_CANCEL','Hochladen abbrechen');
DEFINE('_LX_TOOLTIP_IMG_REMOVE','Bilddatei l&ouml;schen');

//Help Labels
DEFINE('_LX_HELP_MENU_NAME','Bitte Men&uuml; w&auml;hlen, um LxMenu Pro darauf abzubilden <b>(wirkt sich nicht auf die Vorschau aus, es sei denn man speichert die vorgenommene &Auml;nderung)</b>');
DEFINE('_LX_HELP_TEMPLATE','In welcher Design-Vorlage soll dieses Men&uuml; erscheinen?');
DEFINE('_LX_HELP_MENU_DIRECTION','Soll das Men&uuml; vertikal oder horizontal ausgerichtet werden?');
DEFINE('_LX_HELP_POSITION_STYLE','Die Art der Positionierung des Men&uuml;s in dessen Elternelement <b>(wirkt sich nicht auf die Vorschau aus)</b>');
DEFINE('_LX_HELP_POSITION_LEFT','Positionierung von links <b>(wirkt sich nicht auf die Vorschau aus)</b>');
DEFINE('_LX_HELP_POSITION_TOP','Positionierung von oben <b>(wirkt sich nicht auf die Vorschau aus)</b>');
DEFINE('_LX_HELP_ITEM_WIDTH',"Hier wird die Breite der Men&uuml;elemente definiert (in Pixel)");
DEFINE('_LX_HELP_ITEM_HEIGHT',"Hier wird H&ouml;he der Men&uuml;elemente definiert (in Pixel)");
DEFINE('_LX_HELP_CREATE_EXPAND_SYMBOL','Soll ein Symbol angezeigt werden, welches die Existenz von Untermen&uuml;s signalisiert?');
DEFINE('_LX_HELP_POPUP_ON_CLICK','Sollen die Untermen&uuml;s erst beim Klick mit der Maus aufklappen?');
DEFINE('_LX_HELP_EXPAND_DELAY','Verz&ouml;gerung in Millisekunden bevor das Untermen&uuml; aufklappt');
DEFINE('_LX_HELP_HIDE_DELAY','Verz&ouml;gerung in Millisekunden bevor das Untermen&uuml; zuklappt');
DEFINE('_LX_HELP_BG_COLOR','Hintergrundfarbe');
DEFINE('_LX_HELP_BG_COLOR_ON_HIGHLIGHT','Hintergrundfarbe bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_MARGIN_TOP','Der obere Aussenabstand in Pixel');
DEFINE('_LX_HELP_MARGIN_RIGHT','Der rechte Aussenabstand in Pixel');
DEFINE('_LX_HELP_MARGIN_BOTTOM','Der untere Aussenabstand in Pixel');
DEFINE('_LX_HELP_MARGIN_LEFT','Der linke Aussenabstand in Pixel');
DEFINE('_LX_HELP_BORDER_TYPE','Rahmentyp');
DEFINE('_LX_HELP_BORDER_TYPE_ON_HIGHLIGHT','Rahmentyp bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_BORDER_SIZE','Rahmenbreite in Pixel');
DEFINE('_LX_HELP_BORDER_COLOR','Rahmenfarbe');
DEFINE('_LX_HELP_BORDER_COLOR_ON_HIGHLIGHT','Rahmenfarbe bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_FONT_FAMILY',"Schriftart (bei &Auml;nderung ist unter Umst&auml;nden eine Anpassung von Elementh&ouml;he, Innenabstand und/oder Rahmenbreite erforderlich)");
DEFINE('_LX_HELP_FONT_SIZE',"Gr&ouml;sse der Schriftart (bei &Auml;nderung ist unter Umst&auml;nden eine Anpassung von Elementh&ouml;he, Innenabstand und/oder Rahmenbreite erforderlich)");
DEFINE('_LX_HELP_COLOR','Schriftfarbe');
DEFINE('_LX_HELP_COLOR_ON_HIGHLIGHT','Schriftfarbe bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_ALIGN','Textausrichtung');
DEFINE('_LX_HELP_ALIGN_ON_HIGHLIGHT','Textausrichtung bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_WEIGHT','Schriftst&auml;rke');
DEFINE('_LX_HELP_WEIGHT_ON_HIGHLIGHT','Schriftst&auml;rke bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_DECORATION','Textdekoration');
DEFINE('_LX_HELP_DECORATION_ON_HIGHLIGHT','Textdekoration bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_WHITE_SPACE','Behandlung von Zeilenumbr&uuml;chen');
DEFINE('_LX_HELP_WHITE_SPACE_ON_HIGHLIGHT','Behandlung von Zeilenumbr&uuml;chen bei Mausber&uuml;hrung');
DEFINE('_LX_HELP_PADDING_TOP','Innenabstand oben');
DEFINE('_LX_HELP_PADDING_RIGHT','Innenabstand rechts');
DEFINE('_LX_HELP_PADDING_BOTTOM','Innenabstand unten');
DEFINE('_LX_HELP_PADDING_LEFT','Innenabstand links');
DEFINE('_LX_HELP_INHERIT_SETTINGS','Die Einstellungen vom Hauptmen&uuml; &uuml;bernehmen?');
DEFINE('_LX_HELP_TOP_OFFSET','Versatz oben in Pixel');
DEFINE('_LX_HELP_LEFT_OFFSET','Versatz links in Pixel');
DEFINE('_LX_HELP_SET_TRANSPARENCY','Soll die Transparenz aktiviert werden? <b>(funktioniert nur bei IE und Mozilla/Firefox/Netscape)</b>');
DEFINE('_LX_HELP_TRANSPARENCY','Transparenz in Prozent <b>(je kleiner der Wert, desto mehr Transparenz, bei 100% keine Transparenz)</b>');
DEFINE('_LX_HELP_MENU_ALIGN','Ausrichtung des gesamten Men&uuml;blocks. <b>(wirkt sich nicht auf die Vorschau aus)</b>');
DEFINE('_LX_HELP_MAIN_ITEM_WIDTH',"Hier wird die Breite der Men&uuml;elemente definiert (in Pixel). Bei 0 (gilt nur f&uuml;r Elemente der Hauptmen&uuml;s) und bei horizontaler Ausrichtung des Men&uuml;s h&auml;ngt die Breite der Men&uuml;elemente von der Textl&auml;nge ab <b>(nich unterst&uuml;tzt von LxMenu Free)</b>.");
DEFINE('_LX_HELP_SUB_ITEM_HEIGHT',"Hier wird die H&ouml;he der Men&uuml;elemente definiert (in Pixel). Bei 0 (gilt nur f&uuml;r Elemente der Untermen&uuml;s sowohl bei horizontaler als auch vertikaler Ausrichtung des Men&uuml;s) h&auml;ngt die H&ouml;he der Men&uuml;elemente von der Textl&auml;nge ab <b>(nich unterst&uuml;tzt von LxMenu Free)</b>.");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_USE',"Soll ein Hintergrundbild f&uuml;r die Men&uuml;s verwendet werden?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE',"Hintergrundbild");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_HL',"Hintergrundbild bei Mausber&uuml;hrung");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_REPEAT',"Soll das Hintergrundbild wiederholt werden?");
DEFINE('_LX_HELP_SUB_DIRECTION','In welche Richtung sollen die Untermen&uuml;s aufklappen');
DEFINE('_LX_HELP_SET_FADING',"Ist ein Einblendungseffekt beim Ausklappen der Untermen&uuml;s erw&uuml;nscht?");
DEFINE('_LX_HELP_MENU_BG_COLOR',"Hintergrundfarbe des Men&uuml;blocks bei horizontaler Ausrichtung. <b>(wirkt sich nicht auf die Vorschau aus)</b>");
DEFINE('_LX_HELP_EXPANSION_DIRECTION',"Zu welcher Seite sollen die Untermen&uuml;s ausklappen?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_POSITION',"Wo soll das Bild positioniert werden?");
?>