<?php
/**
* A DHTML menu component for mambo
* @version 1.11
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

//** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class mosLxmenuMain extends mosDBTable {
	/** @var int Primary key */
	var $id=null;
	/** @var string */
	var $name=null;
	/** @var string */
	var $direction=null;
	/** @var string */
	var $position_style=null;
	/** @var smallint */
	var $position_left=null;
	/** @var smallint */
	var $position_top=null;
	/** @var tinyint */
	var $pop_on_click=null;
	/** @var smallint */
	var $expand_delay=null;
	/** @var smallint */
	var $hide_delay=null;
	/** @var tinyint */
	var $transparency_create=null;
	/** @var smallint */
	var $transparency=null;
	/** @var string */
	var $menu_align=null;

	/**
	* @param database A database connector object
	*/
	function mosLxmenuMain( &$db ) {
		$this->mosDBTable( '#__lxmenu_main', 'id', $db );
	}
}

class mosLxmenu extends mosDBTable {
	/** @var int Primary key */
	var $id=null;
	/** @var int */
	var $main_id=null;
	/** @var int */
	var $sub_id=null;
	/** @var string */
	var $outer_bg_color=null;
	/** @var string */
	var $inner_bg_color=null;
	/** @var string */
	var $outer_bg_color_hl=null;
	/** @var string */
	var $inner_bg_color_hl=null;
	/** @var string */
	var $outer_border_type=null;
	/** @var string */
	var $inner_border_type=null;
	/** @var string */
	var $outer_border_type_hl=null;
	/** @var string */
	var $inner_border_type_hl=null;
	/** @var string */
	var $outer_border_color=null;
	/** @var string */
	var $inner_border_color=null;
	/** @var string */
	var $outer_border_color_hl=null;
	/** @var string */
	var $inner_border_color_hl=null;
	/** @var int */
	var $outer_border_size=null;
	/** @var int */
	var $inner_border_size=null;
	/** @var string */
	var $font_family=null;
	/** @var string */
	var $font_size=null;
	/** @var smallint */
	var $item_width=null;
	/** @var smallint */
	var $item_height=null;
	/** @var string */
	var $item_text_color=null;
	/** @var string */
	var $item_text_align=null;
	/** @var string */
	var $item_text_weight=null;
	/** @var string */
	var $item_text_decoration=null;
	/** @var string */
	var $item_text_wspace=null;
	/** @var string */
	var $item_text_color_hl=null;
	/** @var string */
	var $item_text_align_hl=null;
	/** @var string */
	var $item_text_weight_hl=null;
	/** @var string */
	var $item_text_decoration_hl=null;
	/** @var string */
	var $item_text_wspace_hl=null;
	/** @var smallint */
	var $inner_padding_top=null;
	/** @var smallint */
	var $inner_padding_right=null;
	/** @var smallint */
	var $inner_padding_bottom=null;
	/** @var smallint */
	var $inner_padding_left=null;
	/** @var smallint */
	var $outer_padding_top=null;
	/** @var smallint */
	var $outer_padding_right=null;
	/** @var smallint */
	var $outer_padding_bottom=null;
	/** @var smallint */
	var $outer_padding_left=null;

	/**
	* @param database A database connector object
	*/
	function mosLxmenu( &$db ) {
		$this->mosDBTable( '#__lxmenu', 'id', $db );
	}
}

class mosLxmenuSub extends mosDBTable {
	/** @var int Primary key */
	var $id=null;
	/** @var int */
	var $main_id=null;
	/** @var tinyint */
	var $transparency_create=null;
	/** @var smallint */
	var $transparency=null;
	/** @var string */
	var $direction=null;

	/**
	* @param database A database connector object
	*/
	function mosLxmenuSub( &$db ) {
		$this->mosDBTable( '#__lxmenu_sub', 'id', $db );
	}
}
?>
