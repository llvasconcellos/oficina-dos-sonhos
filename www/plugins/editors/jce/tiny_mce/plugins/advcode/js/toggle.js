/**
* @version		$Id: toggle.js 49 2009-05-28 10:02:46Z happynoodleboy $
* @package      JCE
* @copyright    Copyright (C) 2005 - 2009 Ryan Demmer. All rights reserved.
* @author		Ryan Demmer
* @license      GNU/GPL
* JCE is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

var AdvCode = {
	init : function(link, state){
		$ES('textarea.mceEditor').each(function(el){
			var cookie = Cookie.get('jce_editor_' + el.id + '_state');
			
			if(parseInt(state) == 0){
				$('editor-xtd-buttons').setStyle('display', 'none');
				el.className = 'mceNoEditor';
			}else{
				if(parseInt(cookie) == 0){
					$('editor-xtd-buttons').setStyle('display', 'none');
					el.className = 'mceNoEditor';
				}else{
					el.className = 'mceEditor';
				}	
			}
			
			new Element('div', {
				'class'		: 'advcode_toggle', 
				'styles' 	: {'cursor' : 'pointer'},
				'events' 	: {
					'click' : function(){
						if(!tinyMCE.get(el.id)){
							tinyMCE.execCommand('mceAddControl', false, el.id);
							Cookie.set('jce_editor_' + el.id + '_state', '1');
							el.className = 'mceEditor';
							
							$('editor-xtd-buttons').setStyle('display', '');
						}else{
							tinyMCE.execCommand('mceRemoveControl', false, el.id);							
							Cookie.set('jce_editor_' + el.id + '_state', '0');
							el.className = 'mceNoEditor';
							
							$('editor-xtd-buttons').setStyle('display', 'none');
						}
					}	
				}
			}).setHTML(link).injectBefore(el);
		});									 
	}
}