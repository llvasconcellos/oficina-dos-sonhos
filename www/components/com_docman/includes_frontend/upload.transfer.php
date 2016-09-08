<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: upload.transfer.php,v 1.17 2005/08/07 17:40:25 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_METHOD_TRANSFER')) {
    return true;
} else {
    define('_DOCMAN_METHOD_TRANSFER' , 1);
} 

include_once dirname(__FILE__) . '/upload.transfer.html.php';

class DMUploadMethod 
{
    function fetchMethodForm($uid, $step, $update = false)
    {
        global $task;
        
        switch ($step) 
        {
            case 2: // Input the filename (Form)
            {
                $lists = array();
                $lists['action']    = _taskLink($task, $uid, array('step' => $step + 1));
                return HTML_DMUploadMethod::transferFileForm($lists);
            } break;

            case 3: // Copy the file and edit the document
            {
                $url   = stripslashes(mosGetParam($_REQUEST , 'url' , 'http://'));
                $file  = stripslashes(mosGetParam($_REQUEST , 'localfile' , ''));
                $err = DMUploadMethod::transferFileProcess($uid, $step, $url, $file);
                if($err['_error']) {
                	_returnTo($task, $err['_errmsg'], '', array("method" => 'transfer' , "step" => $step - 1 ,"localfile" => $file , "url" => DOCMAN_Utils::safeEncodeURL($url)));
                }
                
                $catid = $update ? 0 : $uid;
                $docid = $update ? $uid : 0;
                
                return fetchEditDocumentForm($docid , $file->name, $catid);
            } break;

            default: break;
        } 
        return true;
    }
       
    function transferFileProcess($uid, $step, $url, &$file)
    {
        global $_DMUSER, $_DOCMAN;

        if ($file == '') {
            return array(
				'_error' => 1,
				'_errmsg'=> _FILENAME_REQUIRED
         	);
        } 

        /* ------------------------------ *
     	*   MAMBOT - Setup All Mambots   *
     	* ------------------------------ */
        $logbot = new DOCMAN_mambot('onLog');
        $prebot = new DOCMAN_mambot('onBeforeUpload');
        $postbot = new DOCMAN_mambot('onAfterUpload');
        $logbot->setParm('filename' , $file);
        $logbot->setParm('user' , $_DMUSER);
        $logbot->copyParm('process' , 'upload');
        $prebot->setParmArray ($logbot->getParm()); // Copy the parms over
        $postbot->setParmArray($logbot->getParm());

        /* ------------------------------ *
     	*   Pre-upload                    *
     	* ------------------------------ */
        $prebot->trigger();
        if ($prebot->getError()) {
            $logbot->setParm('msg' , $prebot->getErrorMsg());
            $logbot->copyParm('status' , 'LOG_ERROR');
            $logbot->trigger();
            
            return array(
				'_error' => 1,
				'_errmsg'=> $prebot->getErrorMsg()
         	);
        } 

		/* ------------------------------ *
     	*   Upload                        *
     	* ------------------------------ */
			
        $path = $_DOCMAN->getCfg('dmpath').'/';
   		
   		//get file validation settings
   		if ($_DMUSER->isAdmin) {
      		$validate = _DM_VALIDATE_ADMIN;
   		} else {
     		if ($_DOCMAN->getCfg('user_all', false)) {
        		$validate = _DM_VALIDATE_USER_ALL ;
      		} else {
           		$validate = _DM_VALIDATE_USER;
       		} 
  		}
  		
  		//upload the file
  		$upload = new DOCMAN_FileUpload();
  		$file = $upload->uploadURL($url, $path, $validate, $file);

      /* -------------------------------- *
	 	 *    Post-upload                   *
	 	 * -------------------------------- */
       
        if (! $file) {
            $msg = _DML_ERROR_UPLOADING . " - " . $upload->_err;
            $logbot->setParm('msg' , $msg);
             $logbot->setParm('file', $url);
            $logbot->copyParm('status' , 'LOG_ERROR');
            $logbot->trigger();
            
             return array(
				'_error' => 1,
				'_errmsg'=> $msg
         	);
        } 
        
       	$msg = "&quot;" . $file->name . "&quot; " . _DML_UPLOADED;

       	$logbot->copyParm(array('msg' => "'" . $file->name . "'" . _DML_UPLOADED ,'status' => 'LOG_OK'));
       	$logbot->trigger();
       	
       	$postbot->setParm('file', $file);
       	$postbot->trigger();
       	
      	if ($postbot->getError()) {
          	$logbot->setParm('msg' , $postbot->getErrorMsg());
          	$logbot->copyParm('status' , 'LOG_ERROR');
           	$logbot->trigger();
           	
          	return array(
				'_error' => 1,
				'_errmsg'=> $postbot->getErrorMsg()
         	);
        } 
        
       	return array(
			'_error' => 0,
			'_errmsg'=> $msg
        ); 
    } 
} 

?>
