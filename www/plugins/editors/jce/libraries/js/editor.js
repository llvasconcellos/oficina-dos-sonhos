/**
* @version		$Id: editor.js 49 2009-05-28 10:02:46Z happynoodleboy $
* @package      JCE
* @copyright    Copyright (C) 2005 - 2009 Ryan Demmer. All rights reserved.
* @author		Ryan Demmer
* @license      GNU/GPL
* JCE is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
var JContentEditor = {
	// Set the editor content
	setContent : function(id, html){
		if(tinyMCE.get(id)){
			tinyMCE.activeEditor.setContent(html);
		}else{
			document.getElementById(id).value = html;
		}
	},
	// Get the editor content
	getContent : function(id){
		if(tinyMCE.get(id)){
			return tinyMCE.activeEditor.getContent();
		}
		return document.getElementById(id).value;
	},
	// Process save / apply
	save : function(id){
		var ed = tinyMCE.get(id);
		if(ed && !ed.getContent()){
			ed.setContent(ed.getElement().value);
		}
		tinyMCE.triggerSave();
	}
};