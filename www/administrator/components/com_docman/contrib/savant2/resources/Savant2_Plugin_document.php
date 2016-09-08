<?php

/**
* 
* $Id: Savant2_Plugin_document.php,v 1.1 2005/05/29 21:15:51 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_document extends Savant2_Plugin {
	
	function plugin($id)
	{
		global $_DOCMAN;
		
		if(!$id) {
			return;
		}
		
		require_once($_DOCMAN->getPath('classes', 'model'));
		$doc = &new DOCMAN_Document($id);
		
		$item = new StdClass();
       	$item->links = &$doc->getLinkObject();
       	$item->paths = &$doc->getPathObject();
        $item->data  = &$doc->getDataObject();
        
		return $item;
	}

}
?>