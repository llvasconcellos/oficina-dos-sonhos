<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: DOCMAN_model.class.php,v 1.30 2005/05/29 21:15:51 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_MODEL')) {
    return;
} else {
    define('_DOCMAN_MODEL', 1);
} 

require_once($_DOCMAN->getPath('classes', 'utils'));

class DOCMAN_Model 
{
    var $objDBTable = null;

    var $objFormatData = null;
    var $objFormatLink = null;
    var $objFormatPath = null;

    function DOCMAN_Model()
    {
        $this->objFormatData = new stdClass();
        $this->objFormatLink = new stdClass();
        $this->objFormatPath = new stdClass();
    } 

    function getLink($identifier)
    {
        if (isset($this->objFormatLink->$identifier))
            return $this->objFormatLink->$identifier;
        else
            return null;
    } 

    function getPath($identifier)
    {
        if (isset($this->objFormatPath->$identifier))
            return $this->objFormatPath->$identifier;
        else return $null;
    } 

    function getData($identifier)
    {
        if (isset($this->objFormatData->$identifier))
            return $this->objFormatData->$identifier;
        else
            return null;
    } 

    function setData($identifier, $data)
    {
        $this->objFormatData->$identifier = $data;
    } 

    function &getLinkObject()
    {
        return $this->objFormatLink;
    } 

    function &getPathObject()
    {
        return $this->objFormatPath;
    } 

    function &getDataObject()
    {
        return $this->objFormatData;
    } 

    function getDBObject()
    {
        return $this->objDBTable;
    } 

    function _format($objDBTable)
    {
    } 

    function _formatLink($task, $params = null)
    {
        $link = DOCMAN_Utils::taskLink($task, $this->objDBTable->id, $params);
        return $link;
    } 
} 

class DOCMAN_Category extends DOCMAN_Model 
{
    function DOCMAN_Category($id)
    {
        global $database;
        $this->objDBTable = new mosDMCategory($database);
        $this->objDBTable->load($id);

        $this->_format($this->objDBTable);
    } 

    function getPath($identifier, $type = 1, $param = null)
    {
        $result = null;

        switch ($identifier) {
            case 'icon' :
                $result = DOCMAN_Utils::pathIcon ('folder.png', $type, $param);
                break;

            default :
                $result = parent::getPath($identifier);
        } 

        return $result;
    } 

    function _format(&$objDBCat)
    {
        global $_DOCMAN;

        $user = $_DOCMAN->getUser(); 
        // format category data
        $this->objFormatData = DOCMAN_Utils::get_object_vars($objDBCat);

        $this->objFormatData->files = DOCMAN_Cats::countDocsInCatByUser($objDBCat->id, $user, true); 
        // format category links
        $this->objFormatLink->view = $this->_formatLink('cat_view'); 
        // format category paths
        $this->objFormatPath->thumb = DOCMAN_Utils::pathThumb($objDBCat->image);
        $this->objFormatPath->icon = DOCMAN_Utils::pathIcon ('folder.png', 1);
    } 
} 

class DOCMAN_Document extends DOCMAN_Model 
{
    function DOCMAN_Document($id)
    {
        global $database;
        $this->objDBTable = new mosDMDocument($database);
        $this->objDBTable->load($id);

        $this->_format($this->objDBTable);
    } 

    function getPath($identifier, $type = 1, $param = null)
    {
        $result = null;

        switch ($identifier) {
            case 'icon' :
                $result = DOCMAN_Utils::pathIcon ($this->objFormatData->filetype . ".png", $type, $param);
                break;

            default :
                $result = parent::getPath($identifier);
        } 

        return $result;
    } 

    function _format(&$objDBDoc)
    {
        global $_DOCMAN;

        $user = $_DOCMAN->getUser();

        require_once($_DOCMAN->getPath('classes', 'file'));
        $file = new DOCMAN_file($objDBDoc->dmfilename, $_DOCMAN->getCfg('dmpath'));
        
        require_once($_DOCMAN->getPath('classes', 'params'));
        $params = & new dmParameters( $objDBDoc->attribs, '' , 'params' );  
        
        // format document data
        $this->objFormatData = DOCMAN_Utils::get_object_vars($objDBDoc);

        $this->objFormatData->owner 			= $this->_formatUserName($objDBDoc->dmowner);
        $this->objFormatData->submited_by 		= $this->_formatUserName($objDBDoc->dmsubmitedby);
        $this->objFormatData->maintainedby 		= $this->_formatUserName($objDBDoc->dmmantainedby);
        $this->objFormatData->lastupdatedby 	= $this->_formatUserName($objDBDoc->dmlastupdateby);
        $this->objFormatData->checkedoutby 		= $this->_formatUserName($objDBDoc->checked_out);
        $this->objFormatData->filename 			= $objDBDoc->dmfilename;
        $this->objFormatData->filesize 			= $file->getSize();
        $this->objFormatData->filetype 			= $file->ext;
        $this->objFormatData->mime 				= $file->mime;
        $this->objFormatData->state 			= $this->_formatState($objDBDoc); 
        $this->objFormatData->params			= $params;
        
        // format document links ONLY those the user can perform.
        if ($user->canEdit($objDBDoc)) {
            $this->objFormatLink->edit = $this->_formatLink('doc_edit');
        } else {
            $this->objFormatLink->edit = 0;
        } 

        if ($user->canMove($objDBDoc)) {
            $this->objFormatLink->move = $this->_formatLink('doc_move');
        } else {
            $this->objFormatLink->move = 0;
        }
        
        if ($user->canDelete($objDBDoc)) {
            $this->objFormatLink->delete = $this->_formatLink('doc_delete');
        } else {
            $this->objFormatLink->delete = 0;
        }
        
         if ($user->canUpdate($objDBDoc)) {
            $this->objFormatLink->update = $this->_formatLink('doc_update');
        } else {
            $this->objFormatLink->update = 0;
        }    

        if ($user->canReset($objDBDoc)) {
            $this->objFormatLink->reset = $this->_formatLink('doc_reset');
        } else {
            $this->objFormatLink->reset = 0;
        } 

        if ($user->canCheckin($objDBDoc) && $objDBDoc->checked_out) {
            $this->objFormatLink->checkin = $this->_formatLink('doc_checkin');
        } else {
            $this->objFormatLink->checkin = 0;
        } 

        if ($user->canCheckout($objDBDoc) && !$objDBDoc->checked_out) {
            $this->objFormatLink->checkout = $this->_formatLink('doc_checkout');
        } else {
            $this->objFormatLink->checkout = 0;
        } 

        if ($user->canApprove($objDBDoc) && !$objDBDoc->approved) {
            $this->objFormatLink->approve = $this->_formatLink('doc_approve');
        } else {
            $this->objFormatLink->approve = 0;
        } 

        if ($user->canPublish($objDBDoc)) {
            $this->objFormatLink->publish = $this->_formatLink('doc_publish');
        } else {
            $this->objFormatLink->publish = 0;
        } 

        if ($user->canUnPublish($objDBDoc)) {
            $this->objFormatLink->unpublish = $this->_formatLink('doc_unpublish');
        } else {
            $this->objFormatLink->unpublish = 0;
        }
        
        if ($user->canDownload($objDBDoc)) {
            $this->objFormatLink->download = $this->_formatLink('doc_download');
        } else {
            $this->objFormatLink->download = 0;
        }
        
        if ($user->canDownload($objDBDoc)) 
        {    
            $viewtypes = trim($_DOCMAN->getCfg('viewtypes'));
		
        	if ($viewtypes != '' && ($viewtypes == '*' || stristr($viewtypes, $file->ext))) {
           	 	$this->objFormatLink->view = $this->_formatLink('doc_view');
        	} else {
            	$this->objFormatLink->view = 0;
        	}
        	
        } else {
            $this->objFormatLink->view = 0;
        }
        
        $this->objFormatLink->details = $this->_formatLink('doc_details'); 
        
        // format document paths
        $this->objFormatPath->icon = DOCMAN_Utils::pathIcon ($file->ext . ".png");
        $this->objFormatPath->thumb = DOCMAN_Utils::pathThumb($objDBDoc->dmthumbnail, 1);
    } 
    
    //  @desc Translate the numeric ID to a character string
    //  @param integer $ The numeric ID of the user
    //  @return string Contains the user name in string format
    function _formatUserName($userid)
    {
        global $database;

        switch ($userid) 
        {
            case '-1':
                return _DML_EVERYBODY;
                break;
            case '0':
                return _DML_ALL_REGISTERED;
                break;
            
            default:
            
                if ($userid > '0') 
                {
                    $user = new mosUser($database);
                    $user->load($userid);
                    return $user->username;
                } 

				if($userid < '-5') 
				{
      				$calcgroups = (abs($userid) - 10);
      				
      				$group = new mosDMGroups($database);
                    $group->load($userid);
        			return $group->groups_name;
				}	
                break;
        }
         
        return "USER ID?";
    } 

    function _formatState(&$objDBDoc)
    {
        global $_DOCMAN;

        $days = $_DOCMAN->getCfg('days_for_new');
        $hot = $_DOCMAN->getCfg('hot');

        $result = null;

        if ($days > 0 &&
            (DOCMAN_Utils::Daysdiff ($objDBDoc->dmdate_published) > ($days -2 * $days)) && (DOCMAN_Utils::Daysdiff ($objDBDoc->dmdate_published) <= 0)) {
            $result = _DML_NEW;
        } 

        if ($hot > 0 && $objDBDoc->dmcounter >= $hot) {
            $result .= _DML_HOT;
        } 

        return $result;
    }
} 

?>
