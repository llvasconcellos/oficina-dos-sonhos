<?php
/**
* A DHTML menu component for Joomla!
* @version 1.14
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo
* @subpackage lxmenu
*/

// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
		| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_kompetenzteams' ))) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}

$language = isset($GLOBALS['mosConfig_alang']) ? $GLOBALS['mosConfig_alang'] : $GLOBALS['mosConfig_lang'];
$lang_path = $mosConfig_absolute_path.DIRECTORY_SEPARATOR.'administrator'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.$option.DIRECTORY_SEPARATOR.'language'.DIRECTORY_SEPARATOR;
if(file_exists($lang_path.$language.'.php')){
	require_once($lang_path.$language.'.php');
}else{
	require_once($lang_path.'english.php');
}

require_once($mainframe->getPath('admin_html'));
require_once($mainframe->getPath('class'));

switch ($task) {
	case 'apply':
	case 'save':
		save($task);
		break;

	case 'cancel':
		mosRedirect('index2.php');
		break;

	default:
		show($option);
		break;
}


function show($option) {
	global $database, $mosConfig_absolute_path, $adminLanguage;

	$database->setQuery( "SELECT id FROM #__lxmenu_main" );
	$row = $database->loadObjectList();
	if(!$row){
		$database->setQuery( "INSERT INTO #__lxmenu_main VALUES ('1', 'mainmenu', 'vertical', 'relative', '0', '0', '0', '100', '600', '0', '80', 'left')" );
		$database->query();
		$database->setQuery( "SELECT id FROM #__lxmenu_main" );
		$row = $database->loadObjectList();
	}
	$main = new mosLxmenuMain($database);
	$main->load($row[0]->id);
	
	$database->setQuery( "SELECT id FROM #__lxmenu_sub WHERE main_id='$main->id'" );
	$row = $database->loadObjectList();
	if(!$row){
		$database->setQuery( "INSERT INTO #__lxmenu_sub VALUES ('1', '$main->id', '0', '80', 'right')" );
		$database->query();
		$database->setQuery( "SELECT id FROM #__lxmenu_sub WHERE main_id='$main->id'" );
		$row = $database->loadObjectList();
	}
	$sub = new mosLxmenuSub($database);
	$sub->load($row[0]->id);
	
	$common = array();
	$database->setQuery( "SELECT id FROM #__lxmenu WHERE main_id='$main->id'" );
	$row = $database->loadObjectList();
	if(!$row){
		$database->setQuery( "INSERT INTO #__lxmenu VALUES ('', '$main->id', '0', '#BFBFBF', '#DFDFDF', '#6F6F6F', '#FFFFFF', 'none', 'none', '#676767', '#676767', '0', 'tahoma,verdana,arial', '9', '116', '20', '#000000', 'left', 'bold', 'none', 'normal', '#505050', 'left', 'bold', 'none', 'normal', '3', '0', '3', '3', '0', '0', '0', '6')" );
		$database->query();
		$database->setQuery( "SELECT id FROM #__lxmenu WHERE main_id='$main->id'" );
		$row = $database->loadObjectList();
	}
	$common['main'] = new mosLxmenu($database);
	$common['main']->load($row[0]->id);
	
	$database->setQuery( "SELECT id FROM #__lxmenu WHERE sub_id='$sub->id'" );
	$row = $database->loadObjectList();
	if(!$row){
		$database->setQuery( "INSERT INTO #__lxmenu VALUES ('', '0', '$sub->id', '#BFBFBF', '#DFDFDF', '#6F6F6F', '#FFFFFF', 'none', 'none', '#676767', '#676767', '0', 'tahoma,verdana,arial', '9', '116', '20', '#000000', 'left', 'bold', 'none', 'normal', '#505050', 'left', 'bold', 'none', 'normal', '3', '0', '3', '3', '0', '0', '0', '6')" );
		$database->query();
		$database->setQuery( "SELECT id FROM #__lxmenu WHERE sub_id='$sub->id'" );
		$row = $database->loadObjectList();
	}
	$common['sub'] = new mosLxmenu($database);
	$common['sub']->load($row[0]->id);
//		echo $database->getErrorMsg();
	
	// get list of menuitems
//	$query = "SELECT DISTINCT menutype AS value, menutype AS text FROM #__menu"
//	. "\n ORDER BY menutype"
//	;
//	$database->setQuery( $query );
//	$menu_items = $database->loadObjectList();

	$menutypes = mosAdminMenus::menutypes();
	$menu_items = array();
	foreach($menutypes as $menutype){
		array_unshift($menu_items, mosHTML::makeOption($menutype, $menutype));
	}
	array_multisort($menu_items);
	
	$orientation_values = array(
		mosHTML::makeOption( 'horizontal', _LX_LIST_VALUES_HORIZONTAL ),
		mosHTML::makeOption( 'vertical', _LX_LIST_VALUES_VERTICAL ),
	);
	
	$direction_values = array(
		mosHTML::makeOption( 'right', _LX_LIST_VALUES_RIGHT ),
		mosHTML::makeOption( 'left', _LX_LIST_VALUES_LEFT ),
	);

	$border_type_values = array(
		mosHTML::makeOption( 'none', _LX_LIST_VALUES_BORDER_NONE ),
		mosHTML::makeOption( 'dotted', _LX_LIST_VALUES_BORDER_DOTTED ),
		mosHTML::makeOption( 'dashed', _LX_LIST_VALUES_BORDER_DASHED ),
		mosHTML::makeOption( 'solid', _LX_LIST_VALUES_BORDER_SOLID ),
		mosHTML::makeOption( 'double', _LX_LIST_VALUES_BORDER_DOUBLE ),
		mosHTML::makeOption( 'groove', _LX_LIST_VALUES_BORDER_GROOVE ),
		mosHTML::makeOption( 'ridge', _LX_LIST_VALUES_BORDER_RIDGE ),
		mosHTML::makeOption( 'inset', _LX_LIST_VALUES_BORDER_INSET ),
		mosHTML::makeOption( 'outset', _LX_LIST_VALUES_BORDER_OUTSET ),
	);
	
	$align_values = array(
		mosHTML::makeOption( 'left', _LX_LIST_VALUES_LEFT ),
		mosHTML::makeOption( 'center', _LX_LIST_VALUES_CENTER ),
		mosHTML::makeOption( 'right', _LX_LIST_VALUES_RIGHT ),
	);

	$weight_values = array(
		mosHTML::makeOption( 'normal', _LX_LIST_VALUES_NORMAL ),
		mosHTML::makeOption( 'bold', _LX_LIST_VALUES_BOLD ),
		mosHTML::makeOption( 'bolder', _LX_LIST_VALUES_BOLDER ),
		mosHTML::makeOption( 'lighter', _LX_LIST_VALUES_LIGHTER ),
	);

	$decoration_values = array(
		mosHTML::makeOption( 'none', _LX_LIST_VALUES_NONE ),
		mosHTML::makeOption( 'underline', _LX_LIST_VALUES_UNDERLINE ),
		mosHTML::makeOption( 'overline', _LX_LIST_VALUES_OVERLINE ),
		mosHTML::makeOption( 'line-through', _LX_LIST_VALUES_LINE_THROUGH ),
	);

	$whitespace_values = array(
		mosHTML::makeOption( 'normal', _LX_LIST_VALUES_NORMAL ),
		mosHTML::makeOption( 'nowrap', _LX_LIST_VALUES_NOWRAP ),
	);

	$bool_values = array(
		mosHTML::makeOption( '0', _LX_LIST_VALUES_NO ),
		mosHTML::makeOption( '1', _LX_LIST_VALUES_YES ),
	);

	$position_values = array(
		mosHTML::makeOption( 'relative', _LX_LIST_VALUES_RELATIVE ),
		mosHTML::makeOption( 'absolute', _LX_LIST_VALUES_ABSOLUTE ),
	);

	$font_family_values = array(
		mosHTML::makeOption( 'arial,helvetica,sans-serif', 'Arial, Helvetica, sans-serif' ),
		mosHTML::makeOption( 'times new roman,times,serif', 'Times New Roman, Times, serif' ),
		mosHTML::makeOption( 'georgia,times new roman,times,serif', 'Georgia, Times New Roman, Times, serif' ),
		mosHTML::makeOption( 'verdana,arial,helvetica,sans-serif', 'Verdana, Arial, Helvetica, sans-serif' ),
		mosHTML::makeOption( 'tahoma,verdana,arial', 'Tahoma, Verdana, Arial' ),
		mosHTML::makeOption( 'geneva,arial,helvetica,sans-serif', 'Geneva, Arial, Helvetica, sans-serif' ),
	);

	$lists = array();
	// build the html select list

	foreach($common as $index => $fields){
		foreach($fields as $field => $value){
			$list_values = '';
			$javascript = '';
			if(preg_match("/border_type/i", $field)){
				$list_values = $border_type_values;
				$javascript = ' onchange="change_preview(this)" ';
			}elseif(preg_match("/_align/i", $field)){
				$javascript = ' onchange="change_preview(this)" ';
				$list_values = $align_values;
			}elseif(preg_match("/_weight/i", $field)){
				$javascript = ' onchange="change_preview(this)" ';
				$list_values = $weight_values;
			}elseif(preg_match("/_decoration/i", $field)){
				$javascript = ' onchange="change_preview(this)" ';
				$list_values = $decoration_values;
			}elseif(preg_match("/_wspace/i", $field)){
				$javascript = ' onchange="change_preview(this)" ';
				$list_values = $whitespace_values;
			}elseif(preg_match("/font_family/i", $field)){
				$javascript = ' onchange="change_preview(this)" ';
				$list_values = $font_family_values;
			}elseif(preg_match("/_create/i", $field)){
				$list_values = $bool_values;
				$javascript = ' onchange="javascript: hide(this.value, \''.$index.'-'.$field.'\')" ';
			}
			
			if(!empty($list_values)){
				$lists[$index][$field] = mosHTML::selectList( $list_values, $index.'_'.$field, 'class="inputbox" size="1"'.$javascript, 'value', 'text', $value );
			}
		}
	}

	$lists['main']['name'] = mosHTML::selectList( $menu_items, 'main_name', 'class="inputbox" size="1"', 'value', 'text', $main->name );
	$lists['main']['direction'] = mosHTML::selectList( $orientation_values, 'main_direction', 'class="inputbox" size="1" onChange="hide(this.value, \'main-direction\'); change_preview(this); return false"', 'value', 'text', $main->direction );
	$lists['main']['position_style'] = mosHTML::selectList( $position_values, 'main_position_style', 'class="inputbox" size="1"', 'value', 'text', $main->position_style );
	$lists['main']['pop_on_click'] = mosHTML::selectList( $bool_values, 'main_pop_on_click', 'class="inputbox" size="1"', 'value', 'text', $main->pop_on_click );
	$lists['main']['inner_border_type_hl'] = mosHTML::selectList( $border_type_values, 'main_inner_border_type_hl', 'class="inputbox" size="1" onchange="javascript:change_preview(this)"', 'value', 'text', $common['main']->inner_border_type_hl );
	$lists['main']['transparency_create'] = mosHTML::selectList( $bool_values, 'main_transparency_create', 'class="inputbox" size="1" onchange="javascript: hide(this.value, \'main-transparency_create\'); change_preview(this);"', 'value', 'text', $main->transparency_create );
	$lists['main']['menu_align'] = mosHTML::selectList( $align_values, 'main_menu_align', 'class="inputbox" size="1"', 'value', 'text', $main->menu_align );

	$lists['sub']['transparency_create'] = mosHTML::selectList( $bool_values, 'sub_transparency_create', 'class="inputbox" size="1" onchange="javascript: hide(this.value, \'sub-transparency_create\'); change_preview(this);"', 'value', 'text', $sub->transparency_create );
	$lists['sub']['inner_border_type_hl'] = mosHTML::selectList( $border_type_values, 'sub_inner_border_type_hl', 'class="inputbox" size="1" onchange="javascript: change_palette(this)"', 'value', 'text', $common['sub']->inner_border_type_hl );
	$lists['sub']['direction'] = mosHTML::selectList( $direction_values, 'sub_direction', 'class="inputbox" size="1" onChange="change_preview(this)"', 'value', 'text', $sub->direction );

	HTML_lxmenu::show( $main, $sub, $common, $lists, $option );
}

function save( $task ) {
	global $database, $mosConfig_absolute_path;

	$main = array();
	$sub = array();
	foreach($_POST as $field => $value){
		if(preg_match("/main_/i", $field)){
			$index = str_replace("main_", "", $field);
			$main[$index] = $value;
		}elseif(preg_match("/sub_/i", $field)){
			$index = str_replace("sub_", "", $field);
			$sub[$index] = $value;
		}
	}
	
	if(!_save_common($main)){
		mosRedirect( "index2.php", $row->getError() );
	}

	if(!_save_common($sub)){
		mosRedirect( "index2.php", $row->getError() );
	}

	if(!_save_main($main)){
		mosRedirect( "index2.php", $row->getError() );
	}

	if(!_save_sub($sub)){
		mosRedirect( "index2.php", $row->getError() );
	}
	
	_create_files($main, $sub);

	_save_module($main);
	
	switch ( $task ) {
		case 'apply':
			mosRedirect( 'index2.php?option=com_lxmenu', $msg );
			break;

		case 'save':
		default:
			mosRedirect( 'index2.php', $msg );
			break;
	} // end switch
}

function _save_common($post){
	global $database;
	
	//replace the id by common_id
	$post['id'] = $post['common_id'];
	
	$row = new mosLxmenu($database);
	if (!$row->bind($post)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	return true;
}

function _save_main($post){
	global $database;
	
	$row = new mosLxmenuMain($database);
	if (!$row->bind($post)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	return true;
}

function _save_sub($post){
	global $database;
	
	$row = new mosLxmenuSub($database);
	if (!$row->bind($post)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	return true;
}

function _create_files($main, $sub){
	global $mosConfig_absolute_path;

	$name = str_replace(" ", "_", $main['name']);
	$name = str_replace("-", "_", $name);
	$name = $name.'_';

	$pos = "\nvar ".$name."MENU_POS = [\n";
	$pos .= "{\n";
	$pos .= "'height':".$main['item_height'].",\n";
	$pos .= "'width':".$main['item_width'].",\n";
	$pos .= "'block_top':0,\n";
	$pos .= "'block_left':0,\n";
	if($main['direction'] == "vertical"){
		$pos .= "'top':".$main['item_height'].",\n";
		$pos .= "'left':0,\n";
	}else{
		$pos .= "'top':0,\n";
		$pos .= "'left':".$main['item_width'].",\n";
	}
	$pos .= "'hide_delay':".$main['hide_delay'].",\n";
	if($main['pop_on_click'] == '1'){
		$pos .= "'expd_delay':-1,\n";
	}else{
		$pos .= "'expd_delay':".$main['expand_delay'].",\n";
	}
	$pos .= "'css':{\n";
	$pos .= "'outer':['".$name."l0oout','".$name."l0oover'],\n";
	$pos .= "'inner':['".$name."l0iout','".$name."l0iover']\n";
	$pos .= "}\n";
	$pos .= "},\n";
	$pos .= "{\n";
	$pos .= "'height':".$sub['item_height'].",\n";
	$pos .= "'width':".$sub['item_width'].",\n";
	if($main['direction'] == "vertical"){
		$block_left = $main['item_width'];
		if($sub['direction'] == 'left'){
			$block_left = '-'.$sub['item_width'];
		}
		$pos .= "'block_top':0,\n";
		$pos .= "'block_left':".$block_left.",\n";
	}else{
		$pos .= "'block_top':".$main['item_height'].",\n";
		$pos .= "'block_left':0,\n";
	}
	$pos .= "'top':".$sub['item_height'].",\n";
	$pos .= "'left':0,\n";
	$pos .= "'css':{\n";
	$pos .= "'outer':['".$name."l1oout','".$name."l1oover'],\n";
	$pos .= "'inner':['".$name."l1iout','".$name."l1iover']\n";
	$pos .= "}\n";
	$pos .= "},\n";
	$pos .= "{\n";
	$pos .= "'block_top':0,\n";
	$block_left = $sub['item_width'];
	if($sub['direction'] == 'left'){
		$block_left = '-'.$sub['item_width'];
	}
	$pos .= "'block_left':".$block_left."\n";
	$pos .= "}\n";
	$pos .= "]\n";

	//level 0 outer mouseout
	$css = "\ntable.moduletable a.".$name."l0oout, table.moduletable .".$name."l0oout, a.".$name."l0oout, .".$name."l0oout {";
	$css .= "\ntext-decoration: ".$main['item_text_decoration']." !important;";
	$background = empty($main['outer_bg_color']) ? 'transparent' : $main['outer_bg_color'];
	$css .= "\nbackground: ".$background.";";
	if($main['transparency_create'] == '1'){
		$css .= "\nfilter: alpha(opacity=".$main['transparency'].");";
		$transparency = $main['transparency'] / 100;
		$css .= "\n-moz-opacity: ".$transparency.";";
	}
	$css .= "\n}";

	//level 0 outer mouseover
	$css .= "\ntable.moduletable a.".$name."l0oover, table.moduletable .".$name."l0oover, a.".$name."l0oover, .".$name."l0oover {";
	$css .= "\ntext-decoration: ".$main['item_text_decoration_hl']." !important;";
	$background = empty($main['outer_bg_color_hl']) ? 'transparent' : $main['outer_bg_color_hl'];
	$css .= "\nbackground: ".$background.";";
	if($main['transparency_create'] == '1'){
		$css .= "\nfilter: alpha(opacity=".$main['transparency'].");";
		$transparency = $main['transparency'] / 100;
		$css .= "\n-moz-opacity: ".$transparency.";";
	}
	$css .= "\n}";
			
	//level 0 inner mouseout
	$css .= "\ntable.moduletable div.".$name."l0iout, table.moduletable .".$name."l0iout, div.".$name."l0iout, .".$name."l0iout {";
	$css .= "\nfont-size: ".$main['font_size']."pt;";
	$css .= "\nfont-family: ".$main['font_family'].";";
	$css .= "\nfont-weight: ".$main['item_text_weight'].";";
	$css .= "\ntext-align: ".$main['item_text_align'].";";
//	$css .= "\ndirection: ".$main['item_text_direction'].";";
//	$css .= "\nunicode-bidi: bidi-override;";
	$css .= "\ntext-decoration: ".$main['item_text_decoration']." !important;";
	if($main['inner_border_type'] != 'none'){
		$css .= "\nborder-width: ".$main['inner_border_size']."px;";
		$css .= "\nborder-style: ".$main['inner_border_type'].";";
		$css .= "\nborder-color: ".$main['inner_border_color'].";";
	}
	$css .= "\nmargin-top: ".$main['outer_padding_top']."px;";
	$css .= "\nmargin-right: ".$main['outer_padding_right']."px;";
	$css .= "\nmargin-bottom: ".$main['outer_padding_bottom']."px;";
	$css .= "\nmargin-left: ".$main['outer_padding_left']."px;";
	$css .= "\npadding-top: ".$main['inner_padding_top']."px;";
	$css .= "\npadding-right: ".$main['inner_padding_right']."px;";
	$css .= "\npadding-bottom: ".$main['inner_padding_bottom']."px;";
	$css .= "\npadding-left: ".$main['inner_padding_left']."px;";
	$background = empty($main['inner_bg_color']) ? 'transparent' : $main['inner_bg_color'];
	$css .= "\nbackground: ".$background.";";
	$css .= "\ncolor: ".$main['item_text_color'].";";
	$css .= "\n}";

	//level 0 inner mouseover
	$css .= "\ntable.moduletable div.".$name."l0iover, table.moduletable .".$name."l0iover, div.".$name."l0iover, .".$name."l0iover {";
	$css .= "\nfont-size: ".$main['font_size']."pt;";
	$css .= "\nfont-family: ".$main['font_family'].";";
	$css .= "\nfont-weight: ".$main['item_text_weight_hl'].";";
	$css .= "\ntext-align: ".$main['item_text_align_hl'].";";
//	$css .= "\ndirection: ".$main['item_text_direction'].";";
//	$css .= "\nunicode-bidi: bidi-override;";
	$css .= "\ntext-decoration: ".$main['item_text_decoration_hl']." !important;";
	if($main['inner_border_type_hl'] != 'none'){
		$css .= "\nborder-width: ".$main['inner_border_size']."px;";
		$css .= "\nborder-style: ".$main['inner_border_type_hl'].";";
		$css .= "\nborder-color: ".$main['inner_border_color_hl'].";";
	}
	$css .= "\nmargin-top: ".$main['outer_padding_top']."px;";
	$css .= "\nmargin-right: ".$main['outer_padding_right']."px;";
	$css .= "\nmargin-bottom: ".$main['outer_padding_bottom']."px;";
	$css .= "\nmargin-left: ".$main['outer_padding_left']."px;";
	$css .= "\npadding-top: ".$main['inner_padding_top']."px;";
	$css .= "\npadding-right: ".$main['inner_padding_right']."px;";
	$css .= "\npadding-bottom: ".$main['inner_padding_bottom']."px;";
	$css .= "\npadding-left: ".$main['inner_padding_left']."px;";
	$background = empty($main['inner_bg_color_hl']) ? 'transparent' : $main['inner_bg_color_hl'];
	$css .= "\nbackground: ".$background.";";
	$css .= "\ncolor: ".$main['item_text_color_hl'].";";
	$css .= "\n}";
			
	//level 1 outer mouseout
	$css .= "\ntable.moduletable a.".$name."l1oout, table.moduletable .".$name."l1oout, a.".$name."l1oout, .".$name."l1oout {";
	$css .= "\nposition: absolute;";
	$css .= "\ntext-decoration: ".$sub['item_text_decoration']." !important;";
	$background = empty($sub['outer_bg_color']) ? 'transparent' : $sub['outer_bg_color'];
	$css .= "\nbackground: ".$background.";";
	if($sub['transparency_create'] == '1'){
		$css .= "\nfilter: alpha(opacity=".$sub['transparency'].");";
		$transparency = $sub['transparency'] / 100;
		$css .= "\n-moz-opacity: ".$transparency.";";
	}
	$css .= "\n}";
			
	//level 1 outer mouseover
	$css .= "\ntable.moduletable a.".$name."l1oover, table.moduletable .".$name."l1oover, a.".$name."l1oover, .".$name."l1oover {";
	$css .= "\ntext-decoration: ".$sub['item_text_decoration_hl']." !important;";
	$background = empty($sub['outer_bg_color_hl']) ? 'transparent' : $sub['outer_bg_color_hl'];
	$css .= "\nbackground: ".$background.";";
	if($sub['transparency_create'] == '1'){
		$css .= "\nfilter: alpha(opacity=".$sub['transparency'].");";
		$transparency = $sub['transparency'] / 100;
		$css .= "\n-moz-opacity: ".$transparency.";";
	}
	$css .= "\n}";

	//level 1 inner mouseout
	$css .= "\ntable.moduletable div.".$name."l1iout, table.moduletable .".$name."l1iout, div.".$name."l1iout, .".$name."l1iout {";
	$css .= "\nfont-size: ".$sub['font_size']."pt;";
	$css .= "\nfont-family: ".$sub['font_family'].";";
	$css .= "\nfont-weight: ".$sub['item_text_weight'].";";
	$css .= "\ntext-align: ".$sub['item_text_align'].";";
//	$css .= "\ndirection: ".$sub['item_text_direction'].";";
//	$css .= "\nunicode-bidi: bidi-override;";
	$css .= "\ntext-decoration: ".$sub['item_text_decoration']." !important;";
	if($sub['inner_border_type'] != 'none'){
		$css .= "\nborder-width: ".$sub['inner_border_size']."px;";
		$css .= "\nborder-style: ".$sub['inner_border_type'].";";
		$css .= "\nborder-color: ".$sub['inner_border_color'].";";
	}
	$css .= "\nmargin-top: ".$sub['outer_padding_top']."px;";
	$css .= "\nmargin-right: ".$sub['outer_padding_right']."px;";
	$css .= "\nmargin-bottom: ".$sub['outer_padding_bottom']."px;";
	$css .= "\nmargin-left: ".$sub['outer_padding_left']."px;";
	$css .= "\npadding-top: ".$sub['inner_padding_top']."px;";
	$css .= "\npadding-right: ".$sub['inner_padding_right']."px;";
	$css .= "\npadding-bottom: ".$sub['inner_padding_bottom']."px;";
	$css .= "\npadding-left: ".$sub['inner_padding_left']."px;";
	$background = empty($sub['inner_bg_color']) ? 'transparent' : $sub['inner_bg_color'];
	$css .= "\nbackground: ".$background.";";
	$css .= "\ncolor: ".$sub['item_text_color'].";";
	$css .= "\n}";

	//level 1 inner mouseover
	$css .= "\ntable.moduletable div.".$name."l1iover, table.moduletable .".$name."l1iover, div.".$name."l1iover, .".$name."l1iover {";
	$css .= "\nfont-size: ".$sub['font_size']."pt;";
	$css .= "\nfont-family: ".$sub['font_family'].";";
	$css .= "\nfont-weight: ".$sub['item_text_weight_hl'].";";
	$css .= "\ntext-align: ".$sub['item_text_align_hl'].";";
//	$css .= "\ndirection: ".$sub['item_text_direction'].";";
//	$css .= "\nunicode-bidi: bidi-override;";
	$css .= "\ntext-decoration: ".$sub['item_text_decoration_hl']." !important;";
	if($sub['inner_border_type_hl'] != 'none'){
		$css .= "\nborder-width: ".$sub['inner_border_size']."px;";
		$css .= "\nborder-style: ".$sub['inner_border_type_hl'].";";
		$css .= "\nborder-color: ".$sub['inner_border_color_hl'].";";
	}
	$css .= "\nmargin-top: ".$sub['outer_padding_top']."px;";
	$css .= "\nmargin-right: ".$sub['outer_padding_right']."px;";
	$css .= "\nmargin-bottom: ".$sub['outer_padding_bottom']."px;";
	$css .= "\nmargin-left: ".$sub['outer_padding_left']."px;";
	$css .= "\npadding-top: ".$sub['inner_padding_top']."px;";
	$css .= "\npadding-right: ".$sub['inner_padding_right']."px;";
	$css .= "\npadding-bottom: ".$sub['inner_padding_bottom']."px;";
	$css .= "\npadding-left: ".$sub['inner_padding_left']."px;";
	$background = empty($sub['inner_bg_color_hl']) ? 'transparent' : $sub['inner_bg_color_hl'];
	$css .= "\nbackground: ".$background.";";
	$css .= "\ncolor: ".$sub['item_text_color_hl'].";";
	$css .= "\n}";
	
//	$css .= "\n#".$name."menu {";
//	$css .= "\ndisplay: none;";
//	$css .= "\n}";

	$path = $mosConfig_absolute_path.'/modules/mod_lxmenu';
	$file = $path.'/pos_lxmenu.js';
	if (file_exists($file)) {
		$writable = is_writable($file);
	} else {
		$writable = is_writable($path);
	}

	if ($writable && ($fp = fopen($file, "w"))) {
		fputs($fp, $pos, strlen($pos));
		fclose($fp);
	}

	$file = $path.'/css_lxmenu.css';
	if (file_exists($file)) {
		$writable = is_writable($file);
	} else {
		$writable = is_writable($path);
	}

	if ($writable && ($fp = fopen($file, "w"))) {
		fputs($fp, $css, strlen($css));
		fclose($fp);
	}
}

function _save_module($post){
	global $database;
	
	$database->setQuery( "SELECT * FROM #__modules WHERE module='mod_lxmenu'" );
	$row = $database->loadObjectList();
	
	if(!$row){
		return false;
	}
	
	$module['id'] = $row[0]->id;
	$module['title'] = $row[0]->title;
	$module['published'] = '1';
	$module['params'] = 'menutype='.$post['name'];
	
	$row = new mosModule($database);
	if (!$row->bind($module)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		return false;
	}
	return true;
}
?>
