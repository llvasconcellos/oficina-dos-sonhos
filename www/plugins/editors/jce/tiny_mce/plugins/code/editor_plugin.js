/**
* $Id: editor_plugin.js 26 2009-05-25 10:21:53Z happynoodleboy $
* @package      JCE
* @copyright    Copyright (C) 2005 - 2009 Ryan Demmer. All rights reserved.
* @author		Ryan Demmer
* @license      GNU/GPL
* JCE is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
(function() {
	var each = tinymce.each;

	tinymce.create('tinymce.plugins.CodePlugin', {
		init : function(ed, url) {
			var t = this;
			
			t.editor = ed;
			t.url = url;
			
			ed.onPreInit.add(function() {
				// Add iframe to valid elements
				if(ed.getParam('code_javascript')){
					ed.serializer.addRules('script[src|charset|defer|type|xml::space]');
				}
				if(ed.getParam('code_css')){
					ed.serializer.addRules('style[type|media|dir|lang|xml::lang]');
				}
			});
			
			ed.onInit.add(function() {
				ed.dom.loadCSS(url + "/css/content.css");
			});
			
			ed.onBeforeSetContent.add(function(ed, o) {							   
				// test for PHP, Script or Style
				if (/<(\?|script|style)/.test(o.content)) {
					// Remove javascript if not enabled
					if(!ed.getParam('code_javascript')){
						o.content = o.content.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi, '');
					}
					// Remove style if not enabled
					if(!ed.getParam('code_css')){
						o.content = o.content.replace(/<style[^>]*>([\s\S]*?)<\/style>/gi, '');
					}
					// Remove PHP if not enabled
					if(!ed.getParam('code_php')){
						o.content = o.content.replace(/<\?(php)?([\s\S]*?)\?>/gi, '');
					}
					// PHP code within an attribute
					o.content = o.content.replace(/"([^"]+)"/g, function(a, b){
						if(/<\?(php)?/.test(b)){
							b = ed.dom.encode(b);
						}
						return '"'+ b +'"';
					});
					// PHP code within a textarea
					if(/<textarea/.test(o.content)){
						o.content = o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi, function(a, b, c){
							if(/<\?(php)?/.test(c)){
								c = ed.dom.encode(c);
							}
							return '<textarea' + b + '>' + c + '</textarea>';															 
						});
					}
					// Preserve script elements
					o.content = o.content.replace(/<(script|style)([^>]+)>([\s\S]*?)<\/(script|style)>/gi, function(v, a, b, c) {
						a = a.toUpperCase();
						
						// Remove prefix and suffix code for script element
						c = t._trim(c);
						
						c = c.replace(/<\?(php)?/gi, '<span class="mcePHP">');
						c = c.replace(/\?>/g, '</span>');
						
						b = b.replace(/(language="[a-z]+")/gi, '');	

						// Output fake element
						return '<span '+b+'class="mce'+ a +'"><!--'+ a + c + a +'--></span>';
					});
					// PHP code within an element
					o.content = o.content.replace(/<([^>]+)<\?(php)?(.+)\?>([^>]*)>/gi, '<$1mce:php="$3"$4>');
					// PHP code other				
					o.content = o.content.replace(/<\?(php)?([\s\S]*?)\?>/gi, '<span class="mcePHP"><!--PHP$2PHP--></span>');
					//o.content = o.content.replace(/\?>/g, 'PHP--></span>');
				}
			});

			ed.onPreProcess.add(function(ed, o) {
				var dom = ed.dom;
			
				if (o.get) {
					each(dom.select('span.mceSCRIPT', o.node), function(n) {
						dom.replace(t._buildScript(n), n);
					});
					each(dom.select('span.mceSTYLE', o.node), function(n) {
						dom.replace(t._buildStyle(n), n);
					});
				}
			});
			
			ed.onPostProcess.add(function(ed, o) {
				if (o.get){
					// Process converted php
					if(/mcePHP/.test(o.content) || /&lt;\?(php)?/.test(o.content)){
						o.content = o.content.replace(/&lt;span class="mcePHP"&gt;([^"]+)&lt;\/span&gt;/g, function(a, b, c, d, e){
							return t._decode(a);
						});
						o.content = o.content.replace(/"(.*?)&lt;\?(php)?([^"]+)\?&gt;(.*?)"/g, function(a, b, c, d, e){
							return '"' + b + '<?php' + t._decode(d) + '?>' + e + '"';
						});
						o.content = o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi, function(a, b, c){
							if(/&lt;\?php/.test(c)){
								c = t._decode(c);	
							}
							return '<textarea' + b + '>' + c + '</textarea>';
						});
						o.content = o.content.replace(/mce:php="([^"]+)"/g, function(a, b){
							return '<?php' + t._decode(b) + '?>';
						});
						o.content = o.content.replace(/<span class="mcePHP">(<!--PHP)?([\s\S]*?)(PHP-->)?<\/span>/g, function(a, b, c, d){
							return '<?php' + t._decode(c) + '?>';																				   
						});
					}
					if(/<(script|style)/.test(o.content)){
						o.content = o.content.replace(/<(script|style)([^>]+)>([\s\S]+?)<\/(script|style)>/, function(a, b, c, d){
							d = (b == 'script') ? '<!--\n' + d + '\n// -->' : '<!--\n' + d + '\n-->';
							return '<' + b + c + '>'+ d +'</' + b + '>';	
						});	
					}
				}
			});
		},
		
		_buildScript : function(n){
			var ed = this.editor, dom = ed.dom, ob, p = {}, h;			
			
			// Setup base parameters
			each(['src', 'type', 'defer', 'charset', 'xml:space'], function(na) {
				var v = dom.getAttrib(n, na);				
				if (v)
					p[na] = v;
			});
			h = n.innerHTML.replace(/<!--SCRIPT([\s\S]*?)SCRIPT-->/, '$1');
			// Create iframe element
			ob = dom.create('script', p, h);
			// Remove identifier
			dom.removeClass(ob, 'mceSCRIPT');	
			return ob;
		},
		
		_buildStyle : function(n){
			var ed = this.editor, dom = ed.dom, ob, p = {}, h;			
			
			// Setup base parameters
			each(['type', 'media', 'dir', 'lang', 'xml:lang'], function(na) {
				var v = dom.getAttrib(n, na);				
				if (v)
					p[na] = v;
			});
			h = n.innerHTML.replace(/<!--STYLE([\s\S]*?)STYLE-->/, '$1');
			// Create iframe element
			ob = dom.create('style', p, h);
			// Remove identifier
			dom.removeClass(ob, 'mceSTYLE');	
			return ob;
		},
		
		_decode : function(s){
			return s.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&').replace(/&quot;/g, '"');	
		},
		
		_encode : function(s){
			return s.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/&/g, '&amp;').replace(/"/g, '&quot;');	
		},
		
		// Private internal function
		 _trim : function(s) {
			// Remove prefix and suffix code for element
			s = s.replace(/(<!--\[CDATA\[|\]\]-->)/gi, '\n');
			s = s.replace(/^[\r\n]*|[\r\n]*$/g, '');
			s = s.replace(/^\s*(\/\/\s*<!--|\/\/\s*<!\[CDATA\[|<!--|<!\[CDATA\[)[\r\n]*/gi, '');
			s = s.replace(/\s*(\/\/\s*\]\]>|\/\/\s*-->|\]\]>|-->|\]\]-->)\s*$/g, '');

			return s;
		},

		getInfo : function() {
			return {
				longname : 'Code',
				author : 'Ryan Demmer',
				authorurl : 'http://www.joomlacontenteditor.net',
				infourl : 'http://www.joomlacontenteditor.net',
				version : '1.5.1'
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('code', tinymce.plugins.CodePlugin);
})();