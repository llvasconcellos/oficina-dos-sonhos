<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: upload.php,v 1.32 2005/08/07 17:40:25 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/upload.html.php';
include_once dirname(__FILE__) . '/documents.php';

require_once($_DOCMAN->getPath('classes', 'mambots'));
require_once($_DOCMAN->getPath('classes', 'file'));

function fetchDocumentUploadForm($uid, $step, $method, $update)
{
    global $_DMUSER, $_DOCMAN;

    //preform permission check
    if($_DMUSER->canPreformTask(null, 'Upload'))	{
    	_returnTo('', _DML_NOLOG_UPLOAD);
    }
    
    //check to see if method is available
    if(!methodAvailable($method))	{
    	_returnTo('upload', _DML_UPLOADMETHOD , array('step' => 1));
    }
       
   	switch($step) 
   	{
      	case '1' : 
   			return fetchMethodsForm($uid, $step, $method);
      		break;
   		case '2' :
   		case '3' :
           	return fetchMethodForm($uid, $step, $method, $update);
   			break;
      	
      	default : break;
    } 
}

function fetchMethodsForm($uid, $step, $method)
{
	global $task;
	
	// Prompt with a list of upload methods
   	$lists = array();
   	$lists['methods'] = dmHTML::uploadSelectList();
   	$lists['action']  = _taskLink($task, $uid, array('step' => $step + 1));
     		
    return HTML_DMUpload::uploadMethodsForm($lists);
}

function fetchMethodForm($uid, $step, $method, $update)
{
	global $_DOCMAN, $task;
	
  	$method_file = $_DOCMAN->getPath('includes_f', 'upload.'.$method) ; 	
   	if (! file_exists($method_file)) {
       _returnTo($task, "Protocol " . $method . " not supported", '', array('step' => 1));
   	} 
   
    require_once($method_file);
   
    return DMUploadMethod::fetchMethodForm($uid, $step, $update);
}

function methodAvailable($method)
{
	global $_DOCMAN, $_DMUSER;
	 
	if($_DMUSER->isAdmin || is_null($method)) {
		return true;
	}
	
	$methods = $_DOCMAN->getCfg('methods', array('http'));
	if(!in_array($method, $methods)) {
		return false;
	} 	
	return true;
}
?>
