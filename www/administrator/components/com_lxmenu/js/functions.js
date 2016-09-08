/**
* Lxmenu v1.11
* Copyright 2005 Georg Lorenz
* DHTML Menu Component for Mambo Open Source
* Mambo Open Source is Free Software
* Released under GNU/GPL License: http://www.gnu.org/copyleft/gpl.html
**/

function hide(value, id)
{
	if(value == 'none' || value == '0' || value == 'vertical'){
		document.getElementById(id).style.display = 'none';
	}else{
		document.getElementById(id).style.display = '';
	}
}

function get_color(color){
	if(document.adminForm.color_target_id.value != ''){
		var target_id = document.adminForm.color_target_id.value;
		var target_name = document.adminForm.color_target_name.value;
		var field;
		if(field = document.getElementsByName(target_name)) {
			for(var i=0;i<field.length;i++) {
				if(field[i]) {
					field[i].value = color;
					change_preview(field[i]);
				}
			}
		}
		document.getElementById(target_id).style.backgroundColor = color;
		document.getElementById('picker').style.display = 'none';
	}
}

function color_picker(element,field_name){
	var picker = document.getElementById('picker');
	var y_pos = Math.abs(document.adminForm.mouse_y.value)-50;
	var x_pos = Math.abs(document.adminForm.mouse_x.value)+100;
	document.getElementById('current_color').style.backgroundColor = element.style.backgroundColor;
	document.getElementById('new_color').style.backgroundColor = element.style.backgroundColor;
	picker.style.top = y_pos+'px';
	picker.style.left = x_pos+'px';
/*	var selected = document.getElementsByName('select');
	for(var i=0;i<selected.length;i++) {
		if(selected[i].style.backgroundColor == element.style.backgroundColor) {
			selected[i].style.borderWidth = '2px';
			selected[i].style.borderStyle = 'solid';
			selected[i].style.borderColor = 'white';
		}else{
			selected[i].style.borderWidth = '2px';
			selected[i].style.borderStyle = 'solid';
			selected[i].style.borderColor = selected[i].style.backgroundColor;
		}
	}*/
	
	picker.style.display = '';
	document.adminForm.color_target_id.value = element.id;
	document.adminForm.color_target_name.value = field_name;
}

function open_preview(){
	var preview = document.getElementById('menu_preview');
	if(preview.style.display == 'none'){
		preview.style.display = '';
	}else{
		preview.style.display = 'none';
	}
}

function add_style(selector, rule){
	if (!document.styleSheets) return;
	if (document.styleSheets[0].cssRules){
		var count = document.styleSheets[document.styleSheets.length-1].cssRules.length;
		document.styleSheets[document.styleSheets.length-1].insertRule(selector+' {'+rule+'}', count);
	}else if (document.styleSheets[0].rules){
		document.styleSheets[document.styleSheets.length-1].addRule(selector, rule);
	}else{
		return;
	}
}

function dim_preview(direction){
	var main_width = parseInt(document.adminForm.main_item_width.value);
	var main_height = parseInt(document.adminForm.main_item_height.value);
	var sub_width = parseInt(document.adminForm.sub_item_width.value);
	var sub_height = parseInt(document.adminForm.sub_item_height.value);
	c_width = (main_width>sub_width) ? main_width : sub_width;
	c_height = (main_height>sub_height) ? main_height : sub_height;
	if(direction == 'horizontal'){
		div_height = eval(main_height + sub_height + 70);
		div_width = eval(c_width + 50);
	}else{
		div_height = eval(c_height + 70);
		div_width = eval(main_width + sub_width + 50);
	}
	document.getElementById('menu_preview').style.width = div_width+'px';
	document.getElementById('menu_preview').style.height = div_height+'px';
}

function change_preview(element){

	switch(element.name) {
		case "main_direction":
			if(element.value == 'horizontal'){
				document.getElementById('sub_outer').style.top = document.adminForm.main_item_height.value+'px';
				document.getElementById('sub_outer').style.left = '0px';
			}else{
				document.getElementById('sub_outer').style.top = '0px';
				document.getElementById('sub_outer').style.left = document.adminForm.main_item_width.value+'px';
			}
			dim_preview(element.value);
		break;
		case "main_item_width":
			document.getElementById('main_outer').style.width = element.value+'px';
			if(document.adminForm.main_direction.value == 'vertical'){
				document.getElementById('sub_outer').style.left = element.value+'px';
			}
			dim_preview(document.adminForm.main_direction.value);
		break;
		case "main_item_height":
			document.getElementById('main_outer').style.height = element.value+'px';
			if(document.adminForm.main_direction.value == 'horizontal'){
				document.getElementById('sub_outer').style.top = element.value+'px';
			}
			dim_preview(document.adminForm.main_direction.value);
		break;
		case "main_transparency_create":
			if(element.value == '1'){
				add_style('#main_outer', 'filter: alpha(opacity='+document.adminForm.main_transparency.value+')');
				add_style('#main_outer', '-moz-opacity:'+eval(document.adminForm.main_transparency.value / 100));
			}else{
				add_style('#main_outer', 'filter: alpha(opacity=100)');
				add_style('#main_outer', '-moz-opacity:1');
			}
		break;
		case "main_outer_bg_color":
			add_style('#main_outer', 'background:'+element.value);
		break;
		case "main_outer_bg_color_hl":
			add_style('#main_outer:hover', 'background:'+element.value);
		break;
		case "main_inner_bg_color":
			add_style('#main_inner', 'background:'+element.value);
		break;
		case "main_inner_bg_color_hl":
			add_style('#main_inner:hover', 'background:'+element.value);
		break;
		case "main_inner_border_type":
			add_style('#main_inner', 'border-style:'+element.value);
		break;
		case "main_inner_border_type_hl":
			add_style('#main_inner:hover', 'border-style:'+element.value);
		break;
		case "main_inner_border_size":
			document.getElementById('main_inner').style.borderWidth = element.value+'px';
		break;
		case "main_inner_border_color":
			add_style('#main_inner', 'border-color:'+element.value);
		break;
		case "main_inner_border_color_hl":
			add_style('#main_inner:hover', 'border-color:'+element.value);
		break;
		case "main_font_family":
			document.getElementById('main_inner').style.fontFamily = element.value;
		break;
		case "main_font_size":
			document.getElementById('main_inner').style.fontSize = element.value+'pt';
		break;
		case "main_item_text_direction":
			add_style('#main_inner', 'direction:'+element.value);
			add_style('#main_inner:hover', 'direction:'+element.value);
		break;
		case "main_item_text_color":
			add_style('#main_inner', 'color:'+element.value);
		break;
		case "main_item_text_color_hl":
			add_style('#main_inner:hover', 'color:'+element.value);
		break;
		case "main_item_text_align":
			add_style('#main_inner', 'text-align:'+element.value);
		break;
		case "main_item_text_align_hl":
			add_style('#main_inner:hover', 'text-align:'+element.value);
		break;
		case "main_item_text_weight":
			add_style('#main_inner', 'font-weight:'+element.value);
		break;
		case "main_item_text_weight_hl":
			add_style('#main_inner:hover', 'font-weight:'+element.value);
		break;
		case "main_item_text_decoration":
			add_style('#main_inner', 'text-decoration:'+element.value);
		break;
		case "main_item_text_decoration_hl":
			add_style('#main_inner:hover', 'text-decoration:'+element.value);
		break;
		case "main_item_text_wspace":
			add_style('#main_inner', 'white-space:'+element.value);
		break;
		case "main_item_text_wspace_hl":
			add_style('#main_inner:hover', 'white-space:'+element.value);
		break;
		case "main_outer_padding_top":
			document.getElementById('main_inner').style.marginTop = element.value+'px';
		break;
		case "main_outer_padding_right":
			document.getElementById('main_inner').style.marginRight = element.value+'px';
		break;
		case "main_outer_padding_bottom":
			document.getElementById('main_inner').style.marginBottom = element.value+'px';
		break;
		case "main_outer_padding_left":
			document.getElementById('main_inner').style.marginLeft = element.value+'px';
		break;
		case "main_inner_padding_top":
			document.getElementById('main_inner').style.paddingTop = element.value+'px';
		break;
		case "main_inner_padding_right":
			document.getElementById('main_inner').style.paddingRight = element.value+'px';
		break;
		case "main_inner_padding_bottom":
			document.getElementById('main_inner').style.paddingBottom = element.value+'px';
		break;
		case "main_inner_padding_left":
			document.getElementById('main_inner').style.paddingLeft = element.value+'px';
		break;
		
		//sub items
		case "sub_item_width":
			document.getElementById('sub_outer').style.width = element.value+'px';
			dim_preview(document.adminForm.main_direction.value);
		break;
		case "sub_item_height":
			document.getElementById('sub_outer').style.height = element.value+'px';
			dim_preview(document.adminForm.main_direction.value);
		break;
		case "sub_transparency_create":
			if(element.value == '1'){
				add_style('#sub_outer', 'filter: alpha(opacity='+document.adminForm.sub_transparency.value+')');
				add_style('#sub_outer', '-moz-opacity:'+eval(document.adminForm.sub_transparency.value / 100));
			}else{
				add_style('#sub_outer', 'filter: alpha(opacity=100)');
				add_style('#sub_outer', '-moz-opacity:1');
			}
		break;
		case "sub_outer_bg_color":
			add_style('#sub_outer', 'background:'+element.value);
		break;
		case "sub_outer_bg_color_hl":
			add_style('#sub_outer:hover', 'background:'+element.value);
		break;
		case "sub_inner_bg_color":
			add_style('#sub_inner', 'background:'+element.value);
		break;
		case "sub_inner_bg_color_hl":
			add_style('#sub_inner:hover', 'background:'+element.value);
		break;
		case "sub_inner_border_type":
			add_style('#sub_inner', 'border-style:'+element.value);
		break;
		case "sub_inner_border_type_hl":
			add_style('#sub_inner:hover', 'border-style:'+element.value);
		break;
		case "sub_inner_border_size":
			document.getElementById('sub_inner').style.borderWidth = element.value+'px';
		break;
		case "sub_inner_border_color":
			add_style('#sub_inner', 'border-color:'+element.value);
		break;
		case "sub_inner_border_color_hl":
			add_style('#sub_inner:hover', 'border-color:'+element.value);
		break;
		case "sub_font_family":
			document.getElementById('sub_inner').style.fontFamily = element.value;
		break;
		case "sub_font_size":
			document.getElementById('sub_inner').style.fontSize = element.value+'pt';
		break;
		case "sub_item_text_direction":
			add_style('#sub_inner', 'direction:'+element.value);
			add_style('#sub_inner:hover', 'direction:'+element.value);
		break;
		case "sub_item_text_color":
			add_style('#sub_inner', 'color:'+element.value);
		break;
		case "sub_item_text_color_hl":
			add_style('#sub_inner:hover', 'color:'+element.value);
		break;
		case "sub_item_text_align":
			add_style('#sub_inner', 'text-align:'+element.value);
		break;
		case "sub_item_text_align_hl":
			add_style('#sub_inner:hover', 'text-align:'+element.value);
		break;
		case "sub_item_text_weight":
			add_style('#sub_inner', 'font-weight:'+element.value);
		break;
		case "sub_item_text_weight_hl":
			add_style('#sub_inner:hover', 'font-weight:'+element.value);
		break;
		case "sub_item_text_decoration":
			add_style('#sub_inner', 'text-decoration:'+element.value);
		break;
		case "sub_item_text_decoration_hl":
			add_style('#sub_inner:hover', 'text-decoration:'+element.value);
		break;
		case "sub_item_text_wspace":
			add_style('#sub_inner', 'white-space:'+element.value);
		break;
		case "sub_item_text_wspace_hl":
			add_style('#sub_inner:hover', 'white-space:'+element.value);
		break;
		case "sub_outer_padding_top":
			document.getElementById('sub_inner').style.marginTop = element.value+'px';
		break;
		case "sub_outer_padding_right":
			document.getElementById('sub_inner').style.marginRight = element.value+'px';
		break;
		case "sub_outer_padding_bottom":
			document.getElementById('sub_inner').style.marginBottom = element.value+'px';
		break;
		case "sub_outer_padding_left":
			document.getElementById('sub_inner').style.marginLeft = element.value+'px';
		break;
		case "sub_inner_padding_top":
			document.getElementById('sub_inner').style.paddingTop = element.value+'px';
		break;
		case "sub_inner_padding_right":
			document.getElementById('sub_inner').style.paddingRight = element.value+'px';
		break;
		case "sub_inner_padding_bottom":
			document.getElementById('sub_inner').style.paddingBottom = element.value+'px';
		break;
		case "sub_inner_padding_left":
			document.getElementById('sub_inner').style.paddingLeft = element.value+'px';
		break;
	}
}

var dragobject = null;

var dragx = 0;
var dragy = 0;

var posx = 0;
var posy = 0;

function draginit() {
	document.onmousemove = drag;
	document.onmouseup = dragstop;
}

function dragstart(element) {
	dragobject = element;
	dragx = posx - dragobject.offsetLeft;
	dragy = posy - dragobject.offsetTop;
}


function dragstop() {
	dragobject=null;
}


function drag(ereignis) {
	posx = document.all ? window.event.clientX : ereignis.pageX;
	posy = document.all ? window.event.clientY : ereignis.pageY;
	if(dragobject != null) {
	    dragobject.style.left = (posx - dragx) + "px";
    	dragobject.style.top = (posy - dragy) + "px";
	}
}
