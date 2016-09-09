<?php
/**
* $Id: config.php 48 2009-05-27 10:46:36Z happynoodleboy $
* @package      JCE
* @copyright    Copyright (C) 2005 - 2009 Ryan Demmer. All rights reserved.
* @author		Ryan Demmer
* @license      GNU/GPL
* JCE is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
class AdvcodeConfig 
{
	function getConfig(&$vars) {
		$document 	=& JFactory::getDocument();
		$jce 		=& JContentEditor::getInstance();
		
		$toggle 	= $jce->getSharedParam('advcode', 'toggle', '1');
		$state 		= $jce->getSharedParam('advcode', 'state', '1');
		$text		= htmlspecialchars($jce->getSharedParam('advcode', 'toggle_text', '[show/hide]'));

		if ($toggle == '1') {
			$document->addScript(JURI::root(true) . '/plugins/editors/jce/tiny_mce/plugins/advcode/js/toggle.js?version='. $jce->getVersion());
			$vars['onpageload'] = "function(){AdvCode.init('". $text ."', '". $state ."');}";		
		}
	}
}
?>