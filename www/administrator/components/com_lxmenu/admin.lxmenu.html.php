<?php
/**
* A DHTML menu component for mambo
* @version 1.11
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_lxmenu {

	function show( &$main, &$sub, &$common, &$lists, $option) {
		global $mosConfig_absolute_path, $mosConfig_live_site, $adminLanguage;
		$tabs = new mosTabs(1);
?>
		<style>
			a.picker, a.picker:hover, a.picker:visited {
				display:block;
				width:16px;
				height:16px;
				border:1px solid black;
				text-decoration:none;
			}
			.close_button{
				display:block;
				width:100%;
				height:100%;
				color:#606060;
				background:#BFBFBF;
				border:1px solid #BFBFBF;
				font-weight:bold;
				text-align:center;
				text-decoration:none;
			}
			.close_button:hover{
				color:#BFBFBF;
				background:#606060;
				border:1px solid #606060;
				text-decoration:none;
			}
			.palette {
				border-right:1px solid grey;
				border-bottom:1px solid grey;
			}
			.cell {
				border-top:1px solid grey;
				border-left:1px solid grey;
			}
			.cell a {
				display:block;
				width:10px;
				height:10px;
			}
			#current_color{
				width:150px;
				height:30px;
				border:1px solid grey;
				margin-top:5px;
				margin-bottom:5px;
			}
			#new_color{
				width:50%;
				height:20px;
				margin:5px;
			}
			td.sub {
				background: url(components/<?php echo $option; ?>/images/arrow.gif) no-repeat left;
			}
			td.sub span {
				margin-left: 10px;
			}
		</style>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/administrator/components/com_lxmenu/js/functions.js"></script>
		<script type="text/javascript">
			draginit();
		</script>

		<form action="index2.php" method="post" name="adminForm">
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
<?php
		$path = $mosConfig_absolute_path.DIRECTORY_SEPARATOR.'administrator'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.$option.DIRECTORY_SEPARATOR;
		require_once($path."picker.inc.php");
		require_once($path."preview.inc.php");
?>
	    <table cellpadding="1" cellspacing="1" border="0" width="100%">
	    <tr>
	        <td width="250"><table class="adminheading"><tr><th nowrap class="config"><?php echo _LX_MENU_CONFIG; ?></th></tr></table></td>
	        <td width="270">
	        </td>
	    </tr>
	    </table>

		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
		<td width="65%" valign="top">
<?php
		$tabs->startPane( 'mainPane' );
		$tabs->startTab( _LX_TAB_COMMON, 'main_common' );
?>		
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_COMMON; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_MENU_NAME; ?>:</td>
			<td><?php echo $lists['main']['name']; echo mosToolTip( _LX_HELP_MENU_NAME ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_MENU_DIRECTION; ?>:</td>
			<td><?php echo $lists['main']['direction']; echo mosToolTip( _LX_HELP_MENU_DIRECTION ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<?php
		$style = ($main->direction == 'vertical') ? 'style="display:none;"' : '';
		?>
		<tr id="main-direction" <?php echo $style; ?>>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" style="background-color:#E7EBEF;" border="0">
			<tr>
				<td colspan="2" align="left">
				<table cellpadding="0" cellspacing="0" style="background-color:#E7EBEF;" border="0">
				<tr>
				<td class="sub" width="185"><span><?php echo _LX_FIELD_MENU_ALIGN; ?>:</span></td>
				<td colspan="3"><?php echo $lists['main']['menu_align']; echo mosToolTip( _LX_HELP_MENU_ALIGN ); ?></td>
				</tr>
				</table>
				</td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_POSITION_STYLE; ?>:</td>
			<td><?php echo $lists['main']['position_style']; echo mosToolTip( _LX_HELP_POSITION_STYLE ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" style="background-color:#E7EBEF;">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_POSITION_LEFT; ?>:</span></td>
			<td>
			<input class="text_area" type="text" name="main_position_left" size="4" value="<?php echo $main->position_left; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_POSITION_LEFT ); ?>
			</td>
			</tr><tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_POSITION_TOP; ?>:</span></td>
			<td>
			<input class="text_area" type="text" name="main_position_top" size="4" value="<?php echo $main->position_top; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_POSITION_TOP ); ?>
			</td>
			</tr></table>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_ITEM_WIDTH; ?>:</td>
			<td><input class="text_area" type="text" name="main_item_width" size="3" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->item_width; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_ITEM_WIDTH ); ?>
			</td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_ITEM_HEIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="main_item_height" size="3" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->item_height; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_ITEM_HEIGHT ); ?>
			</td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_POPUP_ON_CLICK; ?>:</td>
			<td><?php echo $lists['main']['pop_on_click']; echo mosToolTip( _LX_HELP_POPUP_ON_CLICK ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_EXPAND_DELAY; ?>:</td>
			<td><input class="text_area" type="text" name="main_expand_delay" size="4" value="<?php echo $main->expand_delay; ?>" />&nbsp;ms&nbsp;<?php echo mosToolTip( _LX_HELP_EXPAND_DELAY ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_HIDE_DELAY; ?>:</td>
			<td><input class="text_area" type="text" name="main_hide_delay" size="4" value="<?php echo $main->hide_delay; ?>" />&nbsp;ms&nbsp;<?php echo mosToolTip( _LX_HELP_HIDE_DELAY ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_SET_TRANSPARENCY; ?>:</td>
			<td><?php echo $lists['main']['transparency_create']; ?><?php echo mosToolTip( _LX_HELP_SET_TRANSPARENCY ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<?php
		$style = ($main->transparency_create == '0') ? 'style="display:none;"' : '';
		?>
		<tr id="main-transparency_create" <?php echo $style; ?>>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" style="background-color:#E7EBEF;">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_TRANSPARENCY; ?>:</span></td>
			<td><input class="text_area" type="text" name="main_transparency" size="3" onchange="javascript:change_preview(this)" value="<?php echo $main->transparency; ?>" />&nbsp;%&nbsp;<?php echo mosToolTip( _LX_HELP_TRANSPARENCY ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_BACKGROUND, 'main_bg' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_OUTER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-outer_bg_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_outer_bg_color" size="7" value="<?php echo $common['main']->outer_bg_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_outer_bg_color')" id="main-outer_bg_color" class="picker" style="background-color:<?php echo $common['main']->outer_bg_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-outer_bg_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_outer_bg_color_hl" size="7" value="<?php echo $common['main']->outer_bg_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_outer_bg_color_hl')" id="main-outer_bg_color_hl" class="picker" style="background-color:<?php echo $common['main']->outer_bg_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_INNER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-inner_bg_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_inner_bg_color" size="7" value="<?php echo $common['main']->inner_bg_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_inner_bg_color')" id="main-inner_bg_color" class="picker" style="background-color:<?php echo $common['main']->inner_bg_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-inner_bg_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_inner_bg_color_hl" size="7" value="<?php echo $common['main']->inner_bg_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_inner_bg_color_hl')" id="main-inner_bg_color_hl" class="picker" style="background-color:<?php echo $common['main']->inner_bg_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_MARGIN; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_TOP; ?>:</td>
			<td><input class="text_area" type="text" name="main_outer_padding_top" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->outer_padding_top; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_TOP ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_RIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="main_outer_padding_right" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->outer_padding_right; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_RIGHT ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_BOTTOM; ?>:</td>
			<td><input class="text_area" type="text" name="main_outer_padding_bottom" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->outer_padding_bottom; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_BOTTOM ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_LEFT; ?>:</td>
			<td><input class="text_area" type="text" name="main_outer_padding_left" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->outer_padding_left; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_LEFT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_BORDER, 'main_border' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_BORDER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_BORDER_TYPE; ?>:</td>
			<td colspan="3"><?php echo $lists['main']['inner_border_type']; ?><?php echo mosToolTip( _LX_HELP_BORDER_TYPE ); ?></td>
			</tr></table>
			</td>
		</tr>
		<tr id="main-inner_border_type">
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT; ?>:</span></td>
			<td colspan="2"><?php echo $lists['main']['inner_border_type_hl']; ?><?php echo mosToolTip( _LX_HELP_BORDER_TYPE_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_BORDER_SIZE; ?>:</span></td>
			<td colspan="2"><input class="text_area" type="text" name="main_inner_border_size" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->inner_border_size; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_BORDER_SIZE ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td align="left">
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_COLOR; ?>:</span></td>
			<td style="width:10px;"><input onChange="javascript:document.getElementById('main-inner_border_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_inner_border_color" size="7" value="<?php echo $common['main']->inner_border_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_inner_border_color')" id="main-inner_border_color" class="picker" style="background-color:<?php echo $common['main']->inner_border_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BORDER_COLOR ); ?></td>
			</tr>
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</span></td>
			<td style="width:10px;"><input onChange="javascript:document.getElementById('main-inner_border_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_inner_border_color_hl" size="7" value="<?php echo $common['main']->inner_border_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_inner_border_color_hl')" id="main-inner_border_color_hl" class="picker" style="background-color:<?php echo $common['main']->inner_border_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BORDER_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</tr>
			</table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_LABEL, 'main_label' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_LABEL_TEXT_SETTINGS; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_FONT_FAMILY; ?>:</td>
			<td><?php echo $lists['main']['font_family']; ?><?php echo mosToolTip( _LX_HELP_FONT_FAMILY ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_FONT_SIZE; ?>:</td>
			<td><input class="text_area" type="text" name="main_font_size" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->font_size; ?>" />&nbsp;pt&nbsp;<?php echo mosToolTip( _LX_HELP_FONT_SIZE ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-item_text_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_item_text_color" size="7" value="<?php echo $common['main']->item_text_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_item_text_color')" id="main-item_text_color" class="picker" style="background-color:<?php echo $common['main']->item_text_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('main-item_text_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="main_item_text_color_hl" size="7" value="<?php echo $common['main']->item_text_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'main_item_text_color_hl')" id="main-item_text_color_hl" class="picker" style="background-color:<?php echo $common['main']->item_text_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
			</tr>
			<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_ALIGN; ?>:</td>
			<td><?php echo $lists['main']['item_text_align']; ?><?php echo mosToolTip( _LX_HELP_ALIGN ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_ALIGN_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['main']['item_text_align_hl']; ?><?php echo mosToolTip( _LX_HELP_ALIGN_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WEIGHT; ?>:</td>
			<td><?php echo $lists['main']['item_text_weight']; ?><?php echo mosToolTip( _LX_HELP_WEIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WEIGHT_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['main']['item_text_weight_hl']; ?><?php echo mosToolTip( _LX_HELP_WEIGHT_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_DECORATION; ?>:</td>
			<td><?php echo $lists['main']['item_text_decoration']; ?><?php echo mosToolTip( _LX_HELP_DECORATION ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_DECORATION_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['main']['item_text_decoration_hl']; ?><?php echo mosToolTip( _LX_HELP_DECORATION_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WHITE_SPACE; ?>:</td>
			<td><?php echo $lists['main']['item_text_wspace']; ?><?php echo mosToolTip( _LX_HELP_WHITE_SPACE ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['main']['item_text_wspace_hl']; ?><?php echo mosToolTip( _LX_HELP_WHITE_SPACE_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_LABEL_PADDING; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_TOP; ?>:</td>
			<td><input class="text_area" type="text" name="main_inner_padding_top" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->inner_padding_top; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_TOP ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_RIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="main_inner_padding_right" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->inner_padding_right; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_RIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_BOTTOM; ?>:</td>
			<td><input class="text_area" type="text" name="main_inner_padding_bottom" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->inner_padding_bottom; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_BOTTOM ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_LEFT; ?>:</td>
			<td><input class="text_area" type="text" name="main_inner_padding_left" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['main']->inner_padding_left; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_LEFT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
	    </table>
<?php
		$tabs->endTab();

		$tabs->startTab( _LX_TAB_SUB_MENU, 'sub' );
		$tabs->startPane( 'subPane' );
		$tabs->startTab( _LX_TAB_COMMON, 'sub_common' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_COMMON; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_ITEM_WIDTH; ?>:</td>
			<td><input class="text_area" type="text" name="sub_item_width" size="3" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->item_width; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_ITEM_WIDTH ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_ITEM_HEIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="sub_item_height" size="3" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->item_height; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_ITEM_HEIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_SUB_DIRECTION; ?>:</td>
			<td><?php echo $lists['sub']['direction']; ?><?php echo mosToolTip( _LX_HELP_SUB_DIRECTION ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_SET_TRANSPARENCY; ?>:</td>
			<td><?php echo $lists['sub']['transparency_create']; ?><?php echo mosToolTip( _LX_HELP_SET_TRANSPARENCY ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<?php
		$style = ($sub->transparency_create == '0') ? 'style="display:none;"' : '';
		?>
		<tr id="sub-transparency_create" <?php echo $style; ?>>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" style="background-color:#E7EBEF;">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_TRANSPARENCY; ?>:</span></td>
			<td><input class="text_area" type="text" name="sub_transparency" size="3" onchange="javascript:change_preview(this)" value="<?php echo $sub->transparency; ?>" />&nbsp;%&nbsp;<?php echo mosToolTip( _LX_HELP_TRANSPARENCY ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_BACKGROUND, 'sub_bg' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_OUTER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-outer_bg_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_outer_bg_color" size="7" value="<?php echo $common['sub']->outer_bg_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_outer_bg_color')" id="sub-outer_bg_color" class="picker" style="background-color:<?php echo $common['sub']->outer_bg_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-outer_bg_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_outer_bg_color_hl" size="7" value="<?php echo $common['sub']->outer_bg_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_outer_bg_color_hl')" id="sub-outer_bg_color_hl" class="picker" style="background-color:<?php echo $common['sub']->outer_bg_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_INNER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-inner_bg_color').style.backgroundColor=this.value; change_preview(this)" class="text_area" type="text" name="sub_inner_bg_color" size="7" value="<?php echo $common['sub']->inner_bg_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_inner_bg_color')" id="sub-inner_bg_color" class="picker" style="background-color:<?php echo $common['sub']->inner_bg_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-inner_bg_color_hl').style.backgroundColor=this.value; change_preview(this)" class="text_area" type="text" name="sub_inner_bg_color_hl" size="7" value="<?php echo $common['sub']->inner_bg_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_inner_bg_color_hl')" id="sub-inner_bg_color_hl" class="picker" style="background-color:<?php echo $common['sub']->inner_bg_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BG_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_BACKGROUND_MARGIN; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_TOP; ?>:</td>
			<td><input class="text_area" type="text" name="sub_outer_padding_top" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->outer_padding_top; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_TOP ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_RIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="sub_outer_padding_right" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->outer_padding_right; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_RIGHT ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_BOTTOM; ?>:</td>
			<td><input class="text_area" type="text" name="sub_outer_padding_bottom" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->outer_padding_bottom; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_BOTTOM ); ?></td>
			</tr>
			<td width="185"><?php echo _LX_FIELD_LEFT; ?>:</td>
			<td><input class="text_area" type="text" name="sub_outer_padding_left" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->outer_padding_left; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_MARGIN_LEFT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_BORDER, 'sub_border' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_BORDER; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0"><tr>
			<td width="185"><?php echo _LX_FIELD_BORDER_TYPE; ?>:</td>
			<td colspan="2"><?php echo $lists['sub']['inner_border_type']; ?><?php echo mosToolTip( _LX_HELP_BORDER_TYPE ); ?></td>
			</tr></table>
			</td>
		</tr>
		<tr id="sub-inner_border_type">
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_BORDER_TYPE_ON_HIGHLIGHT; ?>:</span></td>
			<td colspan="2"><?php echo $lists['sub']['inner_border_type_hl']; ?><?php echo mosToolTip( _LX_HELP_BORDER_TYPE_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_BORDER_SIZE; ?>:</span></td>
			<td colspan="2"><input class="text_area" type="text" name="sub_inner_border_size" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->inner_border_size; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_BORDER_SIZE ); ?></td>
			</tr></table>
			</td>
		</tr>
		<tr>
			<td align="left">
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_COLOR; ?>:</span></td>
			<td width="10"><input onChange="javascript:document.getElementById('sub-inner_border_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_inner_border_color" size="7" value="<?php echo $common['sub']->inner_border_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_inner_border_color')" id="sub-inner_border_color" class="picker" style="background-color:<?php echo $common['sub']->inner_border_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BORDER_COLOR ); ?></td>
			</tr>
			<tr>
			<td class="sub" width="185"><span><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</span></td>
			<td width="10"><input onChange="javascript:document.getElementById('sub-inner_border_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_inner_border_color_hl" size="7" value="<?php echo $common['sub']->inner_border_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_inner_border_color_hl')" id="sub-inner_border_color_hl" class="picker" style="background-color:<?php echo $common['sub']->inner_border_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_BORDER_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr></table>
			</td>
		</tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->startTab( _LX_TAB_LABEL, 'sub_label' );
?>
		<table class="adminform" border="0" width="100%">
		<th colspan="2"><?php echo _LX_SECTION_LABEL_TEXT_SETTINGS; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_FONT_FAMILY; ?>:</td>
			<td><?php echo $lists['sub']['font_family']; ?><?php echo mosToolTip( _LX_HELP_FONT_FAMILY ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_FONT_SIZE; ?>:</td>
			<td><input class="text_area" type="text" name="sub_font_size" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->font_size; ?>" />&nbsp;pt&nbsp;<?php echo mosToolTip( _LX_HELP_FONT_SIZE ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-item_text_color').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_item_text_color" size="7" value="<?php echo $common['sub']->item_text_color; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_item_text_color')" id="sub-item_text_color" class="picker" style="background-color:<?php echo $common['sub']->item_text_color; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_COLOR ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_COLOR_ON_HIGHLIGHT; ?>:</td>
			<td><input onChange="javascript:document.getElementById('sub-item_text_color_hl').style.backgroundColor=this.value; change_preview(this);" class="text_area" type="text" name="sub_item_text_color_hl" size="7" value="<?php echo $common['sub']->item_text_color_hl; ?>" /></td>
			<td><a href="#" onClick="color_picker(this,'sub_item_text_color_hl')" id="sub-item_text_color_hl" class="picker" style="background-color:<?php echo $common['sub']->item_text_color_hl; ?>;">&nbsp;</a></td><td><?php echo mosToolTip( _LX_HELP_COLOR_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
			</tr>
			<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_ALIGN; ?>:</td>
			<td><?php echo $lists['sub']['item_text_align']; ?><?php echo mosToolTip( _LX_HELP_ALIGN ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_ALIGN_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['sub']['item_text_align_hl']; ?><?php echo mosToolTip( _LX_HELP_ALIGN_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WEIGHT; ?>:</td>
			<td><?php echo $lists['sub']['item_text_weight']; ?><?php echo mosToolTip( _LX_HELP_WEIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WEIGHT_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['sub']['item_text_weight_hl']; ?><?php echo mosToolTip( _LX_HELP_WEIGHT_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_DECORATION; ?>:</td>
			<td><?php echo $lists['sub']['item_text_decoration']; ?><?php echo mosToolTip( _LX_HELP_DECORATION ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_DECORATION_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['sub']['item_text_decoration_hl']; ?><?php echo mosToolTip( _LX_HELP_DECORATION_ON_HIGHLIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WHITE_SPACE; ?>:</td>
			<td><?php echo $lists['sub']['item_text_wspace']; ?><?php echo mosToolTip( _LX_HELP_WHITE_SPACE ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_WHITE_SPACE_ON_HIGHLIGHT; ?>:</td>
			<td><?php echo $lists['sub']['item_text_wspace_hl']; ?><?php echo mosToolTip( _LX_HELP_WHITE_SPACE_ON_HIGHLIGHT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
		<th colspan="2"><?php echo _LX_SECTION_LABEL_PADDING; ?></th>
		<tr>
			<td colspan="2" align="left">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td width="185"><?php echo _LX_FIELD_TOP; ?>:</td>
			<td><input class="text_area" type="text" name="sub_inner_padding_top" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->inner_padding_top; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_TOP ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_RIGHT; ?>:</td>
			<td><input class="text_area" type="text" name="sub_inner_padding_right" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->inner_padding_right; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_RIGHT ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_BOTTOM; ?>:</td>
			<td><input class="text_area" type="text" name="sub_inner_padding_bottom" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->inner_padding_bottom; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_BOTTOM ); ?></td>
			</tr>
			<tr>
			<td width="185"><?php echo _LX_FIELD_LEFT; ?>:</td>
			<td><input class="text_area" type="text" name="sub_inner_padding_left" size="2" onchange="javascript:change_preview(this)" value="<?php echo $common['sub']->inner_padding_left; ?>" />&nbsp;px&nbsp;<?php echo mosToolTip( _LX_HELP_PADDING_LEFT ); ?></td>
			</tr>
			</table>
			</td>
		</tr>
	    </table>
<?php
		$tabs->endTab();
		$tabs->endPane();
		$tabs->endTab();
		$tabs->endPane();
?>
		</td>
		<td width="35%" valign="top">
		<div>
<?php
		$tabs->startPane( 'aboutPane' );
		$tabs->startTab( 'About', 'about_tab' );
?>		
		<table class="adminform" border="0" width="100%">
		<th colspan="2">LxMenu Pro</th>
		<tr><td>
			<p style="font-weight:bold; text-align:center;">LxMenu Pro <br />:: a user friendly DHTML-menu component for Joomla!/Mambo ::</p>
			<div style="float:left; margin-right:15px;">
				<a href="http://www.menu4mambo.com" target="_blank"><img src="components/com_lxmenu/images/pack128.png" width="128" height="128" alt="Will be available soon at menu4mambo dot com" border="0"></a>
			</div>
			<p style="font-weight:bold;">Features:</p>
			<p>
			<ul>
			<li>Supports multiple menus, as many as you like</li>
			<li>Extended color picker including 4 color palettes</li>
			<li>Transparency support for main menu items and sub menu items</li>
			<li>Full featured realtime preview</li>
			<li>Displaying of menu selection state</li>
			<li>Relative, absolute or fixed positioning</li>
			<li>Horizontal or vertical menu orientation</li>
			<li>Real support for popup windows</li>
			<li>Selectable expand symbol</li>
			<li>Dimensioning of menu items' width, height and borders</li>
			<li>Absolute and relative dimensioning of main menu items</li>
			<li>SEF ready</li>
			<li>Font family selection including weight and alignment</li>
			<li>User friendly administration including the module management</li>
			<li>Multiple language support. Currently supported languages english, french, german and polish</li>
			<li>Possibility to assign different menu designs to different templates<b>(new)</b></li>
			<li>Main menu items may have different widths on horizontal orientation<b>(new)</b></li>
			<li>When javascript is not supported by visitors' browser the default mambo menu will be loaded<b>(new)</b></li>
			<li>... and much more</li>
			</ul>
			Available now at <a href="http://www.menu4joomla.com" target="_blank">menu4joomla dot com</a>.
			</p>
			<p>LxMenu&copy; and LxMenu Pro&copy; are &copy;opyright 2005 <a href="http://www.menu4joomla.com" target="_blank">www.menu4joomla.com</a></p>
		</td></tr>
		</table>
<?php
		$tabs->endTab();
		$tabs->endPane();
?>
		</div>
		</td></tr></table>
		
		<input type="hidden" name="main_id" value="<?php echo $main->id; ?>" />
		<input type="hidden" name="sub_id" value="<?php echo $sub->id; ?>" />
		<input type="hidden" name="common_main_id" value="<?php echo $common['main']->id; ?>" />
		<input type="hidden" name="common_sub_id" value="<?php echo $common['sub']->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
	  	<input type="hidden" name="task" value="" />
		<input type="hidden" name="color_target_id" value="" />
		<input type="hidden" name="color_target_name" value="" />
		<input type="hidden" name="mouse_x" value="" />
		<input type="hidden" name="mouse_y" value="" />
		</form>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<script type="text/javascript">
		var ie = document.all ? true : false;
		if (!ie) document.captureEvents(Event.MOUSEMOVE)
		document.onmousemove = get_mouse_coords;

		function get_mouse_coords(e){
			var ie = document.all ? true : false;
			if(ie){
				x = event.clientX + document.body.scrollLeft;
				y = event.clientY + document.body.scrollTop;
			}else{
				x = e.pageX;
				y = e.pageY;
			}

			if(x < 0){x = 0}
			if(y < 0){y = 0}  

			document.adminForm.mouse_x.value = x;
			document.adminForm.mouse_y.value = y;
			return true
		}
		</script>
		<?php
	}
}
?>
