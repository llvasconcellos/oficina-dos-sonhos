<?php
/**
* A DHTML menu component for mambo
* @version 1.15
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
?>
<style>
#main_outer {
	position: absolute;
	top: 0px;
	left: 0px;
	width: <?php echo $common['main']->item_width; ?>px;
	height: <?php echo $common['main']->item_height; ?>px;
	text-decoration : <?php echo $common['main']->item_text_decoration; ?>;
	background: <?php echo $common['main']->outer_bg_color; ?>;
	<?php
	if($main->transparency_create == '1'){
	?>
	filter: alpha(opacity=<?php echo $main->transparency; ?>);
	-moz-opacity:<?php echo $main->transparency / 100; ?>;
	<?php
	}
	?>
}
#main_outer:hover {
	text-decoration : <?php echo $common['main']->item_text_decoration_hl; ?>;
	background: <?php echo $common['main']->outer_bg_color_hl; ?>;
	<?php
	if($main->transparency_create == '1'){
	?>
	filter: alpha(opacity=<?php echo $main->transparency; ?>);
	-moz-opacity:<?php echo $main->transparency / 100; ?>;
	<?php
	}
	?>
}
#main_inner {
	font-size: <?php echo $common['main']->font_size; ?>pt;
	font-family: <?php echo $common['main']->font_family; ?>;
	font-weight: <?php echo $common['main']->item_text_weight; ?>;
	text-align: <?php echo $common['main']->item_text_align; ?>;
	text-decoration: <?php echo $common['main']->item_text_decoration; ?>;
	<?php
	if($common['main']->inner_border_type != 'none'){
	?>
	border-width: <?php echo $common['main']->inner_border_size; ?>px;
	border-style: <?php echo $common['main']->inner_border_type; ?>;
	border-color: <?php echo $common['main']->inner_border_color; ?>;
	<?php
	}
	?>
	margin-top: <?php echo $common['main']->outer_padding_top; ?>px;
	margin-right: <?php echo $common['main']->outer_padding_right; ?>px;
	margin-bottom: <?php echo $common['main']->outer_padding_bottom; ?>px;
	margin-left: <?php echo $common['main']->outer_padding_left; ?>px;
	padding-top: <?php echo $common['main']->inner_padding_top; ?>px;
	padding-right: <?php echo $common['main']->inner_padding_right; ?>px;
	padding-bottom: <?php echo $common['main']->inner_padding_bottom; ?>px;
	padding-left: <?php echo $common['main']->inner_padding_left; ?>px;
	background: <?php echo $common['main']->inner_bg_color; ?>;
	color: <?php echo $common['main']->item_text_color; ?>;
}
#main_inner:hover {
	font-size: <?php echo $common['main']->font_size; ?>pt;
	font-family: <?php echo $common['main']->font_family; ?>;
	font-weight: <?php echo $common['main']->item_text_weight_hl; ?>;
	text-align: <?php echo $common['main']->item_text_align_hl; ?>;
	text-decoration: <?php echo $common['main']->item_text_decoration_hl; ?>;
	<?php
	if($common['main']->inner_border_type_hl != 'none'){
	?>
	border-width: <?php echo $common['main']->inner_border_size; ?>px;
	border-style: <?php echo $common['main']->inner_border_type_hl; ?>;
	border-color: <?php echo $common['main']->inner_border_color_hl; ?>;
	<?php
	}
	?>
	margin-top: <?php echo $common['main']->outer_padding_top; ?>px;
	margin-right: <?php echo $common['main']->outer_padding_right; ?>px;
	margin-bottom: <?php echo $common['main']->outer_padding_bottom; ?>px;
	margin-left: <?php echo $common['main']->outer_padding_left; ?>px;
	padding-top: <?php echo $common['main']->inner_padding_top; ?>px;
	padding-right: <?php echo $common['main']->inner_padding_right; ?>px;
	padding-bottom: <?php echo $common['main']->inner_padding_bottom; ?>px;
	padding-left: <?php echo $common['main']->inner_padding_left; ?>px;
	background: <?php echo $common['main']->inner_bg_color_hl; ?>;
	color: <?php echo $common['main']->item_text_color_hl; ?>;
}

#sub_outer {
	position: absolute;
	<?php
	if($main->direction == 'horizontal'){
	?>
	top: <?php echo $common['main']->item_height; ?>px;
	left: 0px;
	<?php
	}else{
	?>
	top: 0px;
	left: <?php echo $common['main']->item_width; ?>px;
	<?php
	}
	?>
	width: <?php echo $common['sub']->item_width; ?>px;
	height: <?php echo $common['sub']->item_height; ?>px;
	text-decoration : <?php echo $common['sub']->item_text_decoration; ?>;
	background: <?php echo $common['sub']->outer_bg_color; ?>;
	<?php
	if($sub->transparency_create == '1'){
	?>
	filter: alpha(opacity=<?php echo $sub->transparency; ?>);
	-moz-opacity:<?php echo $sub->transparency / 100; ?>;
	<?php
	}
	?>
}

#sub_outer:hover {
	text-decoration : <?php echo $common['sub']->item_text_decoration_hl; ?>;
	background: <?php echo $common['sub']->outer_bg_color_hl; ?>;
	<?php
	if($sub->transparency_create == '1'){
	?>
	filter: alpha(opacity=<?php echo $sub->transparency; ?>);
	-moz-opacity:<?php echo $sub->transparency / 100; ?>;
	<?php
	}
	?>
}

#sub_inner {
	font-size: <?php echo $common['sub']->font_size; ?>pt;
	font-family: <?php echo $common['sub']->font_family; ?>;
	font-weight: <?php echo $common['sub']->item_text_weight; ?>;
	text-align: <?php echo $common['sub']->item_text_align; ?>;
	text-decoration: <?php echo $common['sub']->item_text_decoration; ?>;
	<?php
	if($common['sub']->inner_border_type != 'none'){
	?>
	border-width: <?php echo $common['sub']->inner_border_size; ?>px;
	border-style: <?php echo $common['sub']->inner_border_type; ?>;
	border-color: <?php echo $common['sub']->inner_border_color; ?>;
	<?php
	}
	?>
	margin-top: <?php echo $common['sub']->outer_padding_top; ?>px;
	margin-right: <?php echo $common['sub']->outer_padding_right; ?>px;
	margin-bottom: <?php echo $common['sub']->outer_padding_bottom; ?>px;
	margin-left: <?php echo $common['sub']->outer_padding_left; ?>px;
	padding-top: <?php echo $common['sub']->inner_padding_top; ?>px;
	padding-right: <?php echo $common['sub']->inner_padding_right; ?>px;
	padding-bottom: <?php echo $common['sub']->inner_padding_bottom; ?>px;
	padding-left: <?php echo $common['sub']->inner_padding_left; ?>px;
	background: <?php echo $common['sub']->inner_bg_color; ?>;
	color: <?php echo $common['sub']->item_text_color; ?>;
}

#sub_inner:hover {
	font-size: <?php echo $common['sub']->font_size; ?>pt;
	font-family: <?php echo $common['sub']->font_family; ?>;
	font-weight: <?php echo $common['sub']->item_text_weight_hl; ?>;
	text-align: <?php echo $common['sub']->item_text_align_hl; ?>;
	text-decoration: <?php echo $common['sub']->item_text_decoration_hl; ?>;
	<?php
	if($common['sub']->inner_border_type_hl != 'none'){
	?>
	border-width: <?php echo $common['sub']->inner_border_size; ?>px;
	border-style: <?php echo $common['sub']->inner_border_type_hl; ?>;
	border-color: <?php echo $common['sub']->inner_border_color_hl; ?>;
	<?php
	}
	?>
	margin-top: <?php echo $common['sub']->outer_padding_top; ?>px;
	margin-right: <?php echo $common['sub']->outer_padding_right; ?>px;
	margin-bottom: <?php echo $common['sub']->outer_padding_bottom; ?>px;
	margin-left: <?php echo $common['sub']->outer_padding_left; ?>px;
	padding-top: <?php echo $common['sub']->inner_padding_top; ?>px;
	padding-right: <?php echo $common['sub']->inner_padding_right; ?>px;
	padding-bottom: <?php echo $common['sub']->inner_padding_bottom; ?>px;
	padding-left: <?php echo $common['sub']->inner_padding_left; ?>px;
	background: <?php echo $common['sub']->inner_bg_color_hl; ?>;
	color: <?php echo $common['sub']->item_text_color_hl; ?>;
}
</style>

<?php
$height = $common['main']->item_height + $common['main']->outer_padding_top + $common['main']->outer_padding_bottom;
$width = $common['main']->item_width + $common['main']->outer_padding_left + $common['main']->outer_padding_right;

if($main->direction == 'horizontal'){
	$height = $height * 2 + 70;
	$width = $width + 50;
}else{
	$width = $width * 2 + 50;
	$height = $height + 70;
}
?>
<div id="menu_preview" style="position:absolute; left:35%; top:270px; z-index:900; cursor:move; width:<?php echo $width; ?>px; height:<?php echo $height; ?>px; border:1px solid #6F6F6F; background-color:#F7F7F7; display:none;" onMouseDown="dragstart(this)" onMouseMove="drag(event)" onMouseUp="dragstop()">

	<div style="position:relative; top:0px; left:0px; width:100%; height:16px; background:#DFDFDF;">
		<div style="position:relative; float:right; width:14px; height:14px; padding-right:2px;">
			<a class="close_button" href="#" onClick="open_preview()">X</a>
		</div>
	</div>
	<div style="position: relative; top: 25px; left: 25px; width: 100%; height: 100%;">
	<a id="main_outer" href="#" style="z-index: 0;">
		<div id="main_inner"><?php echo _LX_MAIN_MENU; ?></div>
	</a>
	
	<a id="sub_outer" href="#" style="visibility: visible; z-index: 1;">
		<div id="sub_inner"><?php echo _LX_SUB_MENU; ?></div>
	</a>
	</div>

</div>
