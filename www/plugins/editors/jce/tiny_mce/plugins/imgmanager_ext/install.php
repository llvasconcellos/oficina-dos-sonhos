<?php

defined('_JEXEC') or die('Restricted access');

function com_install() {
    global $mainframe;
	
	jimport('joomla.filesystem.folder');
	
	$language =& JFactory::getLanguage();		
	$language->load( 'com_jce_imgmanager_ext', JPATH_SITE );
	
	$cache = JPATH_SITE .DS. 'tmp';
	
	if( !JFolder::exists( $cache ) ){
		if( !JFolder::create( $cache ) ){
			$mainframe->enqueueMessage( JText::_('NO CACHE DESC'), 'error' );
		}
	}	
	if( JFolder::exists( $cache ) && is_writable( $cache ) ){
		$mainframe->enqueueMessage( JText::_('CACHE DESC') );
	}else{
		$mainframe->enqueueMessage( JText::_('NO CACHE DESC'), 'error' );
	}
	if( !function_exists( 'gd_info' ) ){
		$mainframe->enqueueMessage( JText::_('NO GD DESC'), 'error' );
	}else{
		$info = gd_info();
		$mainframe->enqueueMessage( JText::_('GD DESC') . ' - ' . $info['GD Version'] );
	}
}