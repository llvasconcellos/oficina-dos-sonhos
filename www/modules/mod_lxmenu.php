<?php
/**
* A DHTML menu component for mambo
* @version 1.14
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

if (!defined( '_MOS_LXMENU_MODULE' )) {
	/** ensure that functions are declared only once */
	define( '_MOS_LXMENU_MODULE', 1 );

	if(!function_exists('ampReplace')){
		function ampReplace( $text ) {
			$text = str_replace( '&#', '*-*', $text );
			$text = str_replace( '&', '&amp;', $text );
			$text = str_replace( '*-*', '&#', $text );
			return $text;
		}
	}

	class lxmenu {
		var $items=null;
		var $config=null;
		var $count_main=0;
		var $name_prefix;
		var $regular_module=null;
		
		function lxmenu(&$params){
			global $database, $mosConfig_shownoauth, $my;
			if ($mosConfig_shownoauth) {
				$sql = "SELECT * FROM #__menu"
				. "\nWHERE menutype='". $params->get('menutype') ."' AND published='1'"
				. "\nORDER BY parent,ordering";
			} else {
				$sql = "SELECT * FROM #__menu"
				. "\nWHERE menutype='". $params->get('menutype') ."' AND published='1' AND access <= '$my->gid'"
				. "\nORDER BY parent,ordering";
			}
			$database->setQuery($sql);
			$items = $database->loadObjectList('id');
			
			$sql = "SELECT * FROM #__lxmenu_main"
			. "\n WHERE name='".$params->get('menutype')."'";
			$database->setQuery($sql);
			$this->config['main'] = $database->loadObjectList();

			$sql = "SELECT * FROM #__lxmenu_sub"
			. "\n WHERE main_id='".$this->config['main'][0]->id."'";
			$database->setQuery($sql);
			$this->config['sub'] = $database->loadObjectList();

			$sql = "SELECT * FROM #__lxmenu"
			. "\n WHERE main_id='".$this->config['main'][0]->id."'";
			$database->setQuery($sql);
			$this->config['common_main'] = $database->loadObjectList();

			$sql = "SELECT * FROM #__lxmenu"
			. "\n WHERE sub_id='".$this->config['sub'][0]->id."'";
			$database->setQuery($sql);
			$this->config['common_sub'] = $database->loadObjectList();

			$sql = "SELECT id, params FROM #__modules"
			. "\n WHERE module='mod_mainmenu'";
			$database->setQuery($sql);
			if($rows = $database->loadObjectList()){
				foreach($rows as $row){
					$parms =& new mosParameters( $row->params );
					if($parms->get("menutype") == $params->get('menutype')){
						$this->regular_module = $row->id;
						break;
					}
				}
			}

			$this->name_prefix = str_replace(" ", "_", $this->config['main'][0]->name);
			$this->name_prefix = str_replace("-", "_", $this->name_prefix);

			if(count($items)){
				foreach($items as $item){
					if($item->parent == 0){
						$this->count_main++;
					}
					if($item->parent == 0 || array_key_exists($item->parent, $items)){
						$this->items[$item->id]['name'] = $item->name;
						$this->items[$item->id]['parent'] = $item->parent;
						$this->items[$item->id]['link'] = $this->_get_menu_link($item);
						$this->items[$item->id]['target'] = $item->browserNav;
					}
				}
			}
		}
		
		function create(){
			global $mosConfig_absolute_path, $mosConfig_live_site;
			
			$pos_file_exists = file_exists($mosConfig_absolute_path.'/modules/mod_lxmenu/pos_lxmenu.js');
			$css_file_exists = file_exists($mosConfig_absolute_path.'/modules/mod_lxmenu/css_lxmenu.css');
			
			$init_menu = $build_menu = '';
			if(count($this->items) && count($this->config['main'])){
				$init_menu .= "\n<script type=\"text/javascript\" src=\"modules/mod_lxmenu/functions.js\"></script>";
				$init_menu .= "\n<script type=\"text/javascript\" src=\"modules/mod_lxmenu/menu.js\"></script>";
				$init_menu .= ($pos_file_exists) ? "\n<script type=\"text/javascript\" src=\"modules/mod_lxmenu/pos_lxmenu.js\"></script>" : '';
				$init_menu .= "\n<script type=\"text/javascript\">\n";
				$init_menu .= $this->_build_menu_items();
				$init_menu .= (!$pos_file_exists) ? $this->_build_menu_pos() : '';
				$init_menu .= "\n</script>";
				if($css_file_exists){
//					$init_menu .= '<link href="'.$mosConfig_live_site.'/modules/mod_lxmenu/css_lxmenu.css" rel="stylesheet" type="text/css"/>';
					$init_menu .= '';
				}else{
					$init_menu .= "\n<style type=\"text/css\">";
					$init_menu .= $this->_build_css();
					$init_menu .= "\n</style>";
				}
				
				$height = $this->config['common_main'][0]->item_height;
				$width = $this->config['common_main'][0]->item_width;
				$align_style = $div_prefix = $div_suffix = "";
				if($this->config['main'][0]->direction == "vertical"){
					$height = $height * $this->count_main;
					$position = $this->config['main'][0]->position_style;
					$align_style = "width:".$width."px; left:".$this->config['main'][0]->position_left."px;";
				}else{
					$div_prefix = "\n<div style=\"position:relative; top:0px; left:0px; width:auto; height:".$height."px;\">";
					$div_suffix = "\n</div>";
					$position = "absolute";
					$width = $width * $this->count_main;
					if($this->config['main'][0]->menu_align == 'center'){
						$margin_left = $width / 2;
						$align_style = "width:".$width."px; left:50%; margin-left:-".$margin_left."px;";
					}else{
						$align_style = "width:".$width."px; ".$this->config['main'][0]->menu_align.":".$this->config['main'][0]->position_left."px;";
					}
				}
				
				$build_menu .= $div_prefix;
				$build_menu .= "\n<div id=\"".$this->name_prefix."_menu\" style=\"position:".$position."; top:".$this->config['main'][0]->position_top."px; ".$align_style." height:".$height."px;\">";
				$build_menu .= "\n<script type=\"text/javascript\">";
				$build_menu .= "\nnew menu (".$this->name_prefix."_MENU_ITEMS, ".$this->name_prefix."_MENU_POS);";
				$build_menu .= "\n</script>";
				$build_menu .= "\n</div>";
				$build_menu .= $div_suffix;
			}elseif(!$this->items){
				echo 'Lxmenu Error: Either the menu does not have any menu items or all menu items are unpublished!';
			}else{
				echo 'Lxmenu Error: The menu type in the module does not correspond to the menu name in the component!';
			}
			echo $init_menu.$build_menu;
		}
		
		function _get_menu_link($item){
			global $mainframe;
			$link = '';

			switch ($item->type) {
				case 'separator':
				case 'component_item_link':
				break;
				
				case 'content_item_link':
				$temp = split("&task=view&id=", $item->link);
				$item->link .= '&Itemid='. $mainframe->getItemid($temp[1]);
				break;
				
				case 'url':
				if ( eregi( 'index.php\?', $item->link ) ) {
					if ( !eregi( 'Itemid=', $item->link ) ) {
						$item->link .= '&Itemid='. $item->id;
					}
				}
				break;
				
				case 'content_typed':
				default:
				$item->link .= '&Itemid='. $item->id;
				break;
			}

			$item->link = ampReplace( $item->link );

			if ( strcasecmp( substr( $item->link,0,4 ), 'http' ) ) {
				$item->link = sefRelToAbs( $item->link );
			}

			switch ($item->browserNav) {
				// cases are slightly different
				case 1:
				// open in a new window
//				$link = "window.open('". $item->link ."')";
				$link = $item->link;
				break;

				case 2:
				// open in a popup window
//				$link = "window.open('". $item->link ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550')";
				$link = $item->link;
				break;

				case 3:
				// don't link it
				$link = '';
				break;

				default:	// formerly case 2
				// open in parent window
				$link = $item->link;
				break;
			}

			return $link;
		}
		
		function _build_menu_items(){
			$name = empty($this->name_prefix) ? '' : $this->name_prefix."_" ;

			$menu_items = array();
			foreach($this->items as $itemid => $item){
				$item_name = addslashes($item['name']);
				$menu_items[$item['parent']][$itemid] = "['".$item_name."','".$item['link']."',{'tw':'".$item['target']."','sb':'".$item_name."'}";
			}

			$menu = $this->_get_sub_menu_items($menu_items);
			return "var ".$name."MENU_ITEMS = [\n".$menu."\n];";
		}
		
		function _get_sub_menu_items($menu_items, $parent_id=0){
			$str = '';
			if(array_key_exists($parent_id, $menu_items)){
				if(is_array($menu_items[$parent_id])){
					foreach($menu_items[$parent_id] as $item_id => $value){
						$str .= "\n".$value;
						if($sub_menus = $this->_get_sub_menu_items($menu_items, $item_id)){
							$str .= ",\n".$sub_menus."],";
						}else{
							$str .= "],";
						}
					}
				}
			}
			return $str;
		}
		
		function _build_menu_pos(){
			$name = empty($this->name_prefix) ? '' : $this->name_prefix."_" ;
			
			$menu_pos = "\nvar ".$name."MENU_POS = [\n";
			$menu_pos .= "{\n";
			$menu_pos .= "'height':".$this->config['common_main'][0]->item_height.",\n";
			$menu_pos .= "'width':".$this->config['common_main'][0]->item_width.",\n";
			$menu_pos .= "'block_top':0,\n";
			$menu_pos .= "'block_left':0,\n";
			if($this->config['main'][0]->direction == "vertical"){
				$menu_pos .= "'top':".$this->config['common_main'][0]->item_height.",\n";
				$menu_pos .= "'left':0,\n";
			}else{
				$menu_pos .= "'top':0,\n";
				$menu_pos .= "'left':".$this->config['common_main'][0]->item_width.",\n";
			}
			$menu_pos .= "'hide_delay':".$this->config['main'][0]->hide_delay.",\n";
			if($this->config['main'][0]->pop_on_click == '1'){
				$menu_pos .= "'expd_delay':-1,\n";
			}else{
				$menu_pos .= "'expd_delay':".$this->config['main'][0]->expand_delay.",\n";
			}
			$menu_pos .= "'css':{\n";
			$menu_pos .= "'outer':['".$name."l0oout','".$name."l0oover'],\n";
			$menu_pos .= "'inner':['".$name."l0iout','".$name."l0iover']\n";
			$menu_pos .= "}\n";
			$menu_pos .= "},\n";
			$menu_pos .= "{\n";
			$menu_pos .= "'height':".$this->config['common_sub'][0]->item_height.",\n";
			$menu_pos .= "'width':".$this->config['common_sub'][0]->item_width.",\n";
			if($this->config['main'][0]->direction == "vertical"){
				$block_left = $this->config['common_main'][0]->item_width;
				if($this->config['sub'][0]->direction == 'left'){
					$block_left = '-'.$this->config['common_sub'][0]->item_width;
				}
				$menu_pos .= "'block_top':0,\n";
				$menu_pos .= "'block_left':".$block_left.",\n";
//				$menu_pos .= "'block_left':".$this->config['common_main'][0]->item_width.",\n";
			}else{
				$menu_pos .= "'block_top':".$this->config['common_main'][0]->item_height.",\n";
				$menu_pos .= "'block_left':0,\n";
			}
			$menu_pos .= "'top':".$this->config['common_sub'][0]->item_height.",\n";
			$menu_pos .= "'left':0,\n";
			$menu_pos .= "'css':{\n";
			$menu_pos .= "'outer':['".$name."l1oout','".$name."l1oover'],\n";
			$menu_pos .= "'inner':['".$name."l1iout','".$name."l1iover']\n";
			$menu_pos .= "}\n";
			$menu_pos .= "},\n";
			$menu_pos .= "{\n";
			$menu_pos .= "'block_top':0,\n";
			$block_left = $this->config['common_sub'][0]->item_width;
			if($this->config['sub'][0]->direction == 'left'){
				$block_left = '-'.$this->config['common_sub'][0]->item_width;
			}
			$menu_pos .= "'block_left':".$block_left."\n";
//			$menu_pos .= "'block_left':".$this->config['common_sub'][0]->item_width."\n";
			$menu_pos .= "}\n";
			$menu_pos .= "]\n";
			return $menu_pos;
		}
		
		function _build_css(){
			$name = empty($this->name_prefix) ? '' : $this->name_prefix."_";

			//level 0 outer mouseout
			$style = "\ntable.moduletable a.".$name."l0oout, table.moduletable .".$name."l0oout, a.".$name."l0oout, .".$name."l0oout {";
			$style .= "\ntext-decoration: ".$this->config['common_main'][0]->item_text_decoration." !important;";
			$background = empty($this->config['common_main'][0]->outer_bg_color) ? 'transparent' : $this->config['common_main'][0]->outer_bg_color;
			$style .= "\nbackground: ".$background.";";
			if($this->config['main'][0]->transparency_create == '1'){
				$style .= "\nfilter: alpha(opacity=".$this->config['main'][0]->transparency.");";
				$transparency = $this->config['main'][0]->transparency / 100;
				$style .= "\n-moz-opacity: ".$transparency.";";
			}
			$style .= "\n}";

			//level 0 outer mouseover
			$style .= "\ntable.moduletable a.".$name."l0oover, table.moduletable .".$name."l0oover, a.".$name."l0oover, .".$name."l0oover {";
			$style .= "\ntext-decoration: ".$this->config['common_main'][0]->item_text_decoration_hl." !important;";
			$background = empty($this->config['common_main'][0]->outer_bg_color_hl) ? 'transparent' : $this->config['common_main'][0]->outer_bg_color_hl;
			$style .= "\nbackground: ".$background.";";
			if($this->config['main'][0]->transparency_create == '1'){
				$style .= "\nfilter: alpha(opacity=".$this->config['main'][0]->transparency.");";
				$transparency = $this->config['main'][0]->transparency / 100;
				$style .= "\n-moz-opacity: ".$transparency.";";
			}
			$style .= "\n}";
			
			//level 0 inner mouseout
			$style .= "\ntable.moduletable div.".$name."l0iout, table.moduletable .".$name."l0iout, div.".$name."l0iout, .".$name."l0iout {";
			$style .= "\nfont-size: ".$this->config['common_main'][0]->font_size."pt;";
			$style .= "\nfont-family: ".$this->config['common_main'][0]->font_family.";";
			$style .= "\nfont-weight: ".$this->config['common_main'][0]->item_text_weight.";";
			$style .= "\ntext-align: ".$this->config['common_main'][0]->item_text_align.";";
//			$style .= "\ndirection: ".$this->config['common_main'][0]->item_text_direction.";";
//			$style .= "\nunicode-bidi: bidi-override;";
			$style .= "\ntext-decoration: ".$this->config['common_main'][0]->item_text_decoration." !important;";
			if($this->config['common_main'][0]->inner_border_type != 'none'){
				$style .= "\nborder-width: ".$this->config['common_main'][0]->inner_border_size."px;";
				$style .= "\nborder-style: ".$this->config['common_main'][0]->inner_border_type.";";
				$style .= "\nborder-color: ".$this->config['common_main'][0]->inner_border_color.";";
			}
			$style .= "\nmargin-top: ".$this->config['common_main'][0]->outer_padding_top."px;";
			$style .= "\nmargin-right: ".$this->config['common_main'][0]->outer_padding_right."px;";
			$style .= "\nmargin-bottom: ".$this->config['common_main'][0]->outer_padding_bottom."px;";
			$style .= "\nmargin-left: ".$this->config['common_main'][0]->outer_padding_left."px;";
			$style .= "\npadding-top: ".$this->config['common_main'][0]->inner_padding_top."px;";
			$style .= "\npadding-right: ".$this->config['common_main'][0]->inner_padding_right."px;";
			$style .= "\npadding-bottom: ".$this->config['common_main'][0]->inner_padding_bottom."px;";
			$style .= "\npadding-left: ".$this->config['common_main'][0]->inner_padding_left."px;";
			$background = empty($this->config['common_main'][0]->inner_bg_color) ? 'transparent' : $this->config['common_main'][0]->inner_bg_color;
			$style .= "\nbackground: ".$background.";";
			$style .= "\ncolor: ".$this->config['common_main'][0]->item_text_color.";";
			$style .= "\n}";

			//level 0 inner mouseover
			$style .= "\ntable.moduletable div.".$name."l0iover, table.moduletable .".$name."l0iover, div.".$name."l0iover, .".$name."l0iover {";
			$style .= "\nfont-size: ".$this->config['common_main'][0]->font_size."pt;";
			$style .= "\nfont-family: ".$this->config['common_main'][0]->font_family.";";
			$style .= "\nfont-weight: ".$this->config['common_main'][0]->item_text_weight_hl.";";
			$style .= "\ntext-align: ".$this->config['common_main'][0]->item_text_align_hl.";";
//			$style .= "\ndirection: ".$this->config['common_main'][0]->item_text_direction.";";
//			$style .= "\nunicode-bidi: bidi-override;";
			$style .= "\ntext-decoration: ".$this->config['common_main'][0]->item_text_decoration_hl." !important;";
			if($this->config['common_main'][0]->inner_border_type_hl != 'none'){
				$style .= "\nborder-width: ".$this->config['common_main'][0]->inner_border_size."px;";
				$style .= "\nborder-style: ".$this->config['common_main'][0]->inner_border_type_hl.";";
				$style .= "\nborder-color: ".$this->config['common_main'][0]->inner_border_color_hl.";";
			}
			$style .= "\nmargin-top: ".$this->config['common_main'][0]->outer_padding_top."px;";
			$style .= "\nmargin-right: ".$this->config['common_main'][0]->outer_padding_right."px;";
			$style .= "\nmargin-bottom: ".$this->config['common_main'][0]->outer_padding_bottom."px;";
			$style .= "\nmargin-left: ".$this->config['common_main'][0]->outer_padding_left."px;";
			$style .= "\npadding-top: ".$this->config['common_main'][0]->inner_padding_top."px;";
			$style .= "\npadding-right: ".$this->config['common_main'][0]->inner_padding_right."px;";
			$style .= "\npadding-bottom: ".$this->config['common_main'][0]->inner_padding_bottom."px;";
			$style .= "\npadding-left: ".$this->config['common_main'][0]->inner_padding_left."px;";
			$background = empty($this->config['common_main'][0]->inner_bg_color_hl) ? 'transparent' : $this->config['common_main'][0]->inner_bg_color_hl;
			$style .= "\nbackground: ".$background.";";
			$style .= "\ncolor: ".$this->config['common_main'][0]->item_text_color_hl.";";
			$style .= "\n}";
			
			//level 1 outer mouseout
			$style .= "\ntable.moduletable a.".$name."l1oout, table.moduletable .".$name."l1oout, a.".$name."l1oout, .".$name."l1oout {";
			$style .= "\nposition: absolute;";
			$style .= "\ntext-decoration: ".$this->config['common_sub'][0]->item_text_decoration." !important;";
			$background = empty($this->config['common_sub'][0]->outer_bg_color) ? 'transparent' : $this->config['common_sub'][0]->outer_bg_color;
			$style .= "\nbackground: ".$background.";";
			if($this->config['sub'][0]->transparency_create == '1'){
				$style .= "\nfilter: alpha(opacity=".$this->config['sub'][0]->transparency.");";
				$transparency = $this->config['sub'][0]->transparency / 100;
				$style .= "\n-moz-opacity: ".$transparency.";";
			}
			$style .= "\n}";
			
			//level 1 outer mouseover
			$style .= "\ntable.moduletable a.".$name."l1oover, table.moduletable .".$name."l1oover, a.".$name."l1oover, .".$name."l1oover {";
			$style .= "\ntext-decoration: ".$this->config['common_sub'][0]->item_text_decoration_hl." !important;";
			$background = empty($this->config['common_sub'][0]->outer_bg_color_hl) ? 'transparent' : $this->config['common_sub'][0]->outer_bg_color_hl;
			$style .= "\nbackground: ".$background.";";
			if($this->config['sub'][0]->transparency_create == '1'){
				$style .= "\nfilter: alpha(opacity=".$this->config['sub'][0]->transparency.");";
				$transparency = $this->config['sub'][0]->transparency / 100;
				$style .= "\n-moz-opacity: ".$transparency.";";
			}
			$style .= "\n}";

			//level 1 inner mouseout
			$style .= "\ntable.moduletable div.".$name."l1iout, table.moduletable .".$name."l1iout, div.".$name."l1iout, .".$name."l1iout {";
			$style .= "\nfont-size: ".$this->config['common_sub'][0]->font_size."pt;";
			$style .= "\nfont-family: ".$this->config['common_sub'][0]->font_family.";";
			$style .= "\nfont-weight: ".$this->config['common_sub'][0]->item_text_weight.";";
			$style .= "\ntext-align: ".$this->config['common_sub'][0]->item_text_align.";";
//			$style .= "\ndirection: ".$this->config['common_sub'][0]->item_text_direction.";";
//			$style .= "\nunicode-bidi: bidi-override;";
			$style .= "\ntext-decoration: ".$this->config['common_sub'][0]->item_text_decoration." !important;";
			if($this->config['common_sub'][0]->inner_border_type != 'none'){
				$style .= "\nborder-width: ".$this->config['common_sub'][0]->inner_border_size."px;";
				$style .= "\nborder-style: ".$this->config['common_sub'][0]->inner_border_type.";";
				$style .= "\nborder-color: ".$this->config['common_sub'][0]->inner_border_color.";";
			}
			$style .= "\nmargin-top: ".$this->config['common_sub'][0]->outer_padding_top."px;";
			$style .= "\nmargin-right: ".$this->config['common_sub'][0]->outer_padding_right."px;";
			$style .= "\nmargin-bottom: ".$this->config['common_sub'][0]->outer_padding_bottom."px;";
			$style .= "\nmargin-left: ".$this->config['common_sub'][0]->outer_padding_left."px;";
			$style .= "\npadding-top: ".$this->config['common_sub'][0]->inner_padding_top."px;";
			$style .= "\npadding-right: ".$this->config['common_sub'][0]->inner_padding_right."px;";
			$style .= "\npadding-bottom: ".$this->config['common_sub'][0]->inner_padding_bottom."px;";
			$style .= "\npadding-left: ".$this->config['common_sub'][0]->inner_padding_left."px;";
			$background = empty($this->config['common_sub'][0]->inner_bg_color) ? 'transparent' : $this->config['common_sub'][0]->inner_bg_color;
			$style .= "\nbackground: ".$background.";";
			$style .= "\ncolor: ".$this->config['common_sub'][0]->item_text_color.";";
			$style .= "\n}";

			//level 1 inner mouseover
			$style .= "\ntable.moduletable div.".$name."l1iover, table.moduletable .".$name."l1iover, div.".$name."l1iover, .".$name."l1iover {";
			$style .= "\nfont-size: ".$this->config['common_sub'][0]->font_size."pt;";
			$style .= "\nfont-family: ".$this->config['common_sub'][0]->font_family.";";
			$style .= "\nfont-weight: ".$this->config['common_sub'][0]->item_text_weight_hl.";";
			$style .= "\ntext-align: ".$this->config['common_sub'][0]->item_text_align_hl.";";
//			$style .= "\ndirection: ".$this->config['common_sub'][0]->item_text_direction.";";
//			$style .= "\nunicode-bidi: bidi-override;";
			$style .= "\ntext-decoration: ".$this->config['common_sub'][0]->item_text_decoration_hl." !important;";
			if($this->config['common_sub'][0]->inner_border_type_hl != 'none'){
				$style .= "\nborder-width: ".$this->config['common_sub'][0]->inner_border_size."px;";
				$style .= "\nborder-style: ".$this->config['common_sub'][0]->inner_border_type_hl.";";
				$style .= "\nborder-color: ".$this->config['common_sub'][0]->inner_border_color_hl.";";
			}
			$style .= "\nmargin-top: ".$this->config['common_sub'][0]->outer_padding_top."px;";
			$style .= "\nmargin-right: ".$this->config['common_sub'][0]->outer_padding_right."px;";
			$style .= "\nmargin-bottom: ".$this->config['common_sub'][0]->outer_padding_bottom."px;";
			$style .= "\nmargin-left: ".$this->config['common_sub'][0]->outer_padding_left."px;";
			$style .= "\npadding-top: ".$this->config['common_sub'][0]->inner_padding_top."px;";
			$style .= "\npadding-right: ".$this->config['common_sub'][0]->inner_padding_right."px;";
			$style .= "\npadding-bottom: ".$this->config['common_sub'][0]->inner_padding_bottom."px;";
			$style .= "\npadding-left: ".$this->config['common_sub'][0]->inner_padding_left."px;";
			$background = empty($this->config['common_sub'][0]->inner_bg_color_hl) ? 'transparent' : $this->config['common_sub'][0]->inner_bg_color_hl;
			$style .= "\nbackground: ".$background.";";
			$style .= "\ncolor: ".$this->config['common_sub'][0]->item_text_color_hl.";";
			$style .= "\n}";

//			$style .= "\n#".$name."menu {";
//			$style .= "\ndisplay: none;";
//			$style .= "\n}";

			return $style;
		}
		
		function create_regular_menu($style = 0) {
			global 	$mosConfig_gzip, $mosConfig_absolute_path, $database, $my,
					$Itemid, $mosConfig_caching;

			if(!$this->regular_module) return;
			
			$module = new mosModule( $database );
			$module->load( $this->regular_module );

			$params =& new mosParameters( $module->params );

			if ($style == 1) {
				echo "<table cellspacing=\"1\" cellpadding=\"0\" border=\"0\" width=\"100%\">\n";
				echo "<tr>\n";
			}
			$prepend = ($style == 1) ? "<td valign=\"top\">\n" : '';
			$postpend = ($style == 1) ? "</td>\n" : '';

			echo $prepend;

			include( $mosConfig_absolute_path . '/modules/' . $module->module . '.php' );

			echo $postpend;

			if ($style == 1) {
				echo "</tr>\n</table>\n";
			}
		}

		function create_fallback_menu(){
			echo "\n<noscript>";
			$this->create_regular_menu();
			echo "\n</noscript>";
		}
	}
}

$menu = new lxmenu($params);
$menu->create();
$menu->create_fallback_menu();
?>
