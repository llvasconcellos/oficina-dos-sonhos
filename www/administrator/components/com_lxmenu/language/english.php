<?php
/**
* A DHTML menu component for mambo
* @version 1.15
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Action Labels
DEFINE('_LX_NEW','New');
DEFINE('_LX_COPY','Copy');
DEFINE('_LX_EDIT','Edit');
DEFINE('_LX_DELETE','Delete');
DEFINE('_LX_CANCEL','Cancel');
DEFINE('_LX_APPLY','Apply');
DEFINE('_LX_SAVE','Save');
DEFINE('_LX_PREVIEW','Preview');

//Heading Labels
DEFINE('_LX_MENU_CONFIG','LxMenu Configuration ');
DEFINE('_LX_MENU_PRO_CONFIG','LxMenu Pro Configuration ');
DEFINE('_LX_MENU_ENTRIES','LxMenu Pro Entries');

//Column Labels
DEFINE('_LX_DIRECTION','Direction');
DEFINE('_LX_POSITION_STYLE','Position style');
DEFINE('_LX_MODULE_NAME','Module name');
DEFINE('_LX_PUBLISHED','Module published');
DEFINE('_LX_ACCESS','Module access');
DEFINE('_LX_MODULE_POSITION','Module position');
DEFINE('_LX_MENU_NAME','Menu name');

//Tab Labels
DEFINE('_LX_TAB_COMMON','Common');
DEFINE('_LX_TAB_BACKGROUND','Background');
DEFINE('_LX_TAB_BORDER','Border');
DEFINE('_LX_TAB_LABEL','Label');
DEFINE('_LX_TAB_SUB_MENU','Sub menu');

//Section Labels
DEFINE('_LX_SECTION_COMMON','Common settings');
DEFINE('_LX_SECTION_BACKGROUND_OUTER','Background settings (outer)');
DEFINE('_LX_SECTION_BACKGROUND_INNER','Background settings (inner)');
DEFINE('_LX_SECTION_BACKGROUND_MARGIN','Spacing settings inner <> outer (margin)');
DEFINE('_LX_SECTION_BORDER','Border settings');
DEFINE('_LX_SECTION_BORDER_SIZE','Border size');
DEFINE('_LX_SECTION_LABEL_TEXT_SETTINGS','Menuitem text label settings');
DEFINE('_LX_SECTION_LABEL_PADDING','Padding settings');
DEFINE('_LX_SECTION_MAIN_ITEM','Main item settings');
DEFINE('_LX_SECTION_SUB_ITEM','Sub item settings');
DEFINE('_LX_SECTION_BACKGROUND_IMAGE','Background image');

//Field Labels
DEFINE('_LX_FIELD_MENU_NAME','Menu name');
DEFINE('_LX_FIELD_MENU_DIRECTION','Menu direction');
DEFINE('_LX_FIELD_POSITION_STYLE','Position style');
DEFINE('_LX_FIELD_POSITION_LEFT','Position left');
DEFINE('_LX_FIELD_POSITION_TOP','Position top');
DEFINE('_LX_FIELD_ITEM_WIDTH','Item width');
DEFINE('_LX_FIELD_ITEM_HEIGHT','Item height');
DEFINE('_LX_FIELD_CREATE_EXPAND_SYMBOL','Create expand symbol');
DEFINE('_LX_FIELD_EXPAND_SYMBOL','Expand symbol');
DEFINE('_LX_FIELD_POPUP_ON_CLICK','Popup on click');
DEFINE('_LX_FIELD_EXPAND_DELAY','Expand delay');
DEFINE('_LX_FIELD_HIDE_DELAY','Hide delay');
DEFINE('_LX_FIELD_COLOR','Color');
DEFINE('_LX_FIELD_COLOR_ON_HIGHLIGHT','On highlight');
DEFINE('_LX_FIELD_TOP','Top');
DEFINE('_LX_FIELD_RIGHT','Right');
DEFINE('_LX_FIELD_BOTTOM','Bottom');
DEFINE('_LX_FIELD_LEFT','Left');
DEFINE('_LX_FIELD_BORDER_SIZE','Size');
DEFINE('_LX_FIELD_BORDER_TYPE','Type');
DEFINE('_LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT','Type on highlight');
DEFINE('_LX_FIELD_FONT_FAMILY','Font family');
DEFINE('_LX_FIELD_FONT_SIZE','Font size');
DEFINE('_LX_FIELD_ALIGN','Align');
DEFINE('_LX_FIELD_ALIGN_ON_HIGHLIGHT','Align on highlight');
DEFINE('_LX_FIELD_WEIGHT','Weight');
DEFINE('_LX_FIELD_WEIGHT_ON_HIGHLIGHT','Weight on highlight');
DEFINE('_LX_FIELD_DECORATION','Decoration');
DEFINE('_LX_FIELD_DECORATION_ON_HIGHLIGHT','Decoration on highlight');
DEFINE('_LX_FIELD_WHITE_SPACE','White space');
DEFINE('_LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT','White space on highlight');
DEFINE('_LX_FIELD_INHERIT_SETTINGS','Inherit settings from main menu');
DEFINE('_LX_FIELD_TOP_OFFSET','Top offset');
DEFINE('_LX_FIELD_LEFT_OFFSET','Left offset');
DEFINE('_LX_FIELD_SET_TRANSPARENCY','Set transparency');
DEFINE('_LX_FIELD_TRANSPARENCY','Transparency');
DEFINE('_LX_FIELD_TEMPLATE','Template');
DEFINE('_LX_FIELD_MENU_ALIGN','Menu align');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE','Select image file');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_HL','Image on highlight');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_UPLOAD','Upload image file');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_USE','Use background image');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_REPEAT','Repeat image');
DEFINE('_LX_FIELD_SUB_DIRECTION','Expand to');
DEFINE('_LX_FIELD_SET_FADING','Enable fading effect');
DEFINE('_LX_FIELD_BG_COLOR','Background color');
DEFINE('_LX_FIELD_EXPANSION_DIRECTION','Expansion direction');
DEFINE('_LX_FIELD_BACKGROUND_IMAGE_POSITION','Image position');

//Value Labels
DEFINE('_LX_LIST_VALUES_VERTICAL','vertical');
DEFINE('_LX_LIST_VALUES_HORIZONTAL','horizontal');
DEFINE('_LX_LIST_VALUES_RELATIVE','relative');
DEFINE('_LX_LIST_VALUES_ABSOLUTE','absolute');
DEFINE('_LX_LIST_VALUES_FIXED','fixed');
DEFINE('_LX_LIST_VALUES_YES','Yes');
DEFINE('_LX_LIST_VALUES_NO','No');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_1','Right arrow grey 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_GREY_2','Right arrow grey 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_1','Bottom arrow grey 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_GREY_2','Bottom arrow grey 2');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_1','Right arrow white 1');
DEFINE('_LX_LIST_VALUES_RIGHT_ARROW_WHITE_2','Right arrow white 2');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_1','Bottom arrow white 1');
DEFINE('_LX_LIST_VALUES_BOTTOM_ARROW_WHITE_2','Bottom arrow white 2');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_BLACK','Plus node black');
DEFINE('_LX_LIST_VALUES_PLUS_NODE_WHITE','Plus node white');
DEFINE('_LX_LIST_VALUES_BORDER_NONE','none');
DEFINE('_LX_LIST_VALUES_BORDER_DOTTED','dotted');
DEFINE('_LX_LIST_VALUES_BORDER_DASHED','dashed');
DEFINE('_LX_LIST_VALUES_BORDER_SOLID','solid');
DEFINE('_LX_LIST_VALUES_BORDER_DOUBLE','double');
DEFINE('_LX_LIST_VALUES_BORDER_GROOVE','groove');
DEFINE('_LX_LIST_VALUES_BORDER_RIDGE','ridge');
DEFINE('_LX_LIST_VALUES_BORDER_INSET','inset');
DEFINE('_LX_LIST_VALUES_BORDER_OUTSET','outset');
DEFINE('_LX_LIST_VALUES_LEFT','left');
DEFINE('_LX_LIST_VALUES_CENTER','center');
DEFINE('_LX_LIST_VALUES_RIGHT','right');
DEFINE('_LX_LIST_VALUES_NORMAL','normal');
DEFINE('_LX_LIST_VALUES_BOLD','bold');
DEFINE('_LX_LIST_VALUES_BOLDER','bolder');
DEFINE('_LX_LIST_VALUES_LIGHTER','lighter');
DEFINE('_LX_LIST_VALUES_NONE','none');
DEFINE('_LX_LIST_VALUES_UNDERLINE','underline');
DEFINE('_LX_LIST_VALUES_OVERLINE','overline');
DEFINE('_LX_LIST_VALUES_LINE_THROUGH','line-through');
DEFINE('_LX_LIST_VALUES_NOWRAP','nowrap');
DEFINE('_LX_LIST_VALUES_PALETTE_WINDOWS','Windows system palette');
DEFINE('_LX_LIST_VALUES_PALETTE_WEBSAFE','Web safe palette');
DEFINE('_LX_LIST_VALUES_PALETTE_GREYSCALE','Grey scale palette');
DEFINE('_LX_LIST_VALUES_PALETTE_MAC','Mac OS palette');
DEFINE('_LX_LIST_VALUES_INDEPENDENT','- independent -');
DEFINE('_LX_LIST_VALUES_NO_REPEAT','don\'t repeat either');
DEFINE('_LX_LIST_VALUES_REPEAT','repeat horizontally and vertically');
DEFINE('_LX_LIST_VALUES_REPEAT_X','repeat horizontally only');
DEFINE('_LX_LIST_VALUES_REPEAT_Y','repeat vertically only');

//Other Labels
DEFINE('_LX_MAIN_MENU','Main menu');
DEFINE('_LX_SUB_MENU','Sub menu');
DEFINE('_LX_NONE_MODULE','Please open and save to recover the module');
DEFINE('_LX_TOOLTIP_IMG_UPLOAD','Upload image file');
DEFINE('_LX_TOOLTIP_IMG_CANCEL','Cancel upload');
DEFINE('_LX_TOOLTIP_IMG_REMOVE','Delete image file');

//Help Labels
DEFINE('_LX_HELP_MENU_NAME','Select the menu you want to set up LxMenu for <b>(does not affect the preview until you apply your changes)</b>');
DEFINE('_LX_HELP_TEMPLATE','This menu appears in the selected template');
DEFINE('_LX_HELP_MENU_DIRECTION','Decide here if the menu should expand vertically or horizontally');
DEFINE('_LX_HELP_POSITION_STYLE','How should the menu positioned into the parent element <b>(does not affect the preview)</b>');
DEFINE('_LX_HELP_POSITION_LEFT','Depends on position style <b>(does not affect the preview)</b>');
DEFINE('_LX_HELP_POSITION_TOP','Depends on position style <b>(does not affect the preview)</b>');
DEFINE('_LX_HELP_ITEM_WIDTH',"Define here the menu items\' width in pixels");
DEFINE('_LX_HELP_ITEM_HEIGHT',"Define here the menu items\' height in pixels");
DEFINE('_LX_HELP_CREATE_EXPAND_SYMBOL','Should the expand symbol appear on menu items containing at least one sub item?');
DEFINE('_LX_HELP_POPUP_ON_CLICK','Should the sub menu items expand only when the parent menu item was clicked?');
DEFINE('_LX_HELP_EXPAND_DELAY','Time delay in milliseconds before the sub menu items expand');
DEFINE('_LX_HELP_HIDE_DELAY','Time delay in milliseconds before the sub menus fold up');
DEFINE('_LX_HELP_BG_COLOR','Background color');
DEFINE('_LX_HELP_BG_COLOR_ON_HIGHLIGHT','Background color on mouse over events');
DEFINE('_LX_HELP_MARGIN_TOP','Top margin in pixels');
DEFINE('_LX_HELP_MARGIN_RIGHT','Right margin in pixels');
DEFINE('_LX_HELP_MARGIN_BOTTOM','Bottom margin in pixels');
DEFINE('_LX_HELP_MARGIN_LEFT','Left margin in pixels');
DEFINE('_LX_HELP_BORDER_TYPE','Border type');
DEFINE('_LX_HELP_BORDER_TYPE_ON_HIGHLIGHT','Border type on mouse over events');
DEFINE('_LX_HELP_BORDER_SIZE','Border width in pixels');
DEFINE('_LX_HELP_BORDER_COLOR','Border color');
DEFINE('_LX_HELP_BORDER_COLOR_ON_HIGHLIGHT','Border color on mouse over events');
DEFINE('_LX_HELP_FONT_FAMILY',"Font family <b>(on change you may need to adjust items\' height, label padding or boder settings)</b>");
DEFINE('_LX_HELP_FONT_SIZE',"Font size <b>(on change you may need to adjust items\' height, label padding or boder settings)</b>");
DEFINE('_LX_HELP_COLOR','Text color');
DEFINE('_LX_HELP_COLOR_ON_HIGHLIGHT','Text color on mouse over events');
DEFINE('_LX_HELP_ALIGN','Text alignment');
DEFINE('_LX_HELP_ALIGN_ON_HIGHLIGHT','Text alignment on mouse over events');
DEFINE('_LX_HELP_WEIGHT','Font weight');
DEFINE('_LX_HELP_WEIGHT_ON_HIGHLIGHT','Font weight on mouse over events');
DEFINE('_LX_HELP_DECORATION','Text decoration');
DEFINE('_LX_HELP_DECORATION_ON_HIGHLIGHT','Text decoration on mouse over events');
DEFINE('_LX_HELP_WHITE_SPACE','Treatment of white space');
DEFINE('_LX_HELP_WHITE_SPACE_ON_HIGHLIGHT','Treatment of white space on mouse over events');
DEFINE('_LX_HELP_PADDING_TOP','Padding top');
DEFINE('_LX_HELP_PADDING_RIGHT','Padding right');
DEFINE('_LX_HELP_PADDING_BOTTOM','Padding bottom');
DEFINE('_LX_HELP_PADDING_LEFT','Padding left');
DEFINE('_LX_HELP_INHERIT_SETTINGS','Inherit settings from main menu?');
DEFINE('_LX_HELP_TOP_OFFSET','Top offset for sub menus');
DEFINE('_LX_HELP_LEFT_OFFSET','Left offset for sub menus');
DEFINE('_LX_HELP_SET_TRANSPARENCY','Should transparency be activated? <b>(works on IE and Gecko browsers only)</b>');
DEFINE('_LX_HELP_TRANSPARENCY','Transparency value in percent (smaller value means more transparency, 100% means no transparency)');
DEFINE('_LX_HELP_MENU_ALIGN','Alignment from the whole menu block. Horizontal menus only. (does not affect the preview)');
DEFINE('_LX_HELP_MAIN_ITEM_WIDTH',"Define here the menu items\' width in pixels. When set to 0 (main menu items only) on horizontal orientation the width from main menu items will depend on text label length <b>(not supported on LxMenu Free)</b>.");
DEFINE('_LX_HELP_SUB_ITEM_HEIGHT',"Define here the sub menu items\' height in pixels. When set to 0 (sub menu items only) either on horizontal or vertical orientations the height from sub menu items will depend on text label length <b>(not supported on LxMenu Free)</b>.");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_USE',"Do you want to use a background image?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE',"Background image to be used");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_HL',"Background image to be used on mouse over events");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_REPEAT',"On which way the background image should be repeated if either");
DEFINE('_LX_HELP_SUB_DIRECTION','Direction which the submenus should expand to');
DEFINE('_LX_HELP_SET_FADING',"Would you like to enable a fading effect for sub menu items?");
DEFINE('_LX_HELP_MENU_BG_COLOR',"Background color from the menu block on horizontal orientation. <b>(does not affect the preview)</b>");
DEFINE('_LX_HELP_EXPANSION_DIRECTION',"Which direction should sub menu items expand to?");
DEFINE('_LX_HELP_BACKGROUND_IMAGE_POSITION',"Choose the position the image should placed to.");
?>