<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: documents.php,v 1.49 2005/08/06 13:33:20 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/documents.html.php';

require_once ($_DOCMAN->getPath('classes' , 'file'));
require_once($_DOCMAN->getPath('classes', 'mambots'));
include_once($_DOCMAN->getPath('classes', 'params'));

switch ($task) {
    case "publish" :
        publishDocument($cid, 1);
        break;
    case "unpublish":
        publishDocument($cid, 0);
        break;
    case "approve":
        approveDocument($cid, 1);
        publishDocument($cid, 1);
        break;
    case "unapprove":
        approveDocument($cid, 0);
        publishDocument($cid, 0);
        break;
    case "new":
        editDocument(0);
        break;
    case "edit":
        editDocument($cid[0]);
        break;
    case "move_form":
        moveDocumentForm($cid);
        break;
    case "move_process":
        moveDocumentProcess($cid);
        break;
    case "remove":
        removeDocument($cid);
        break;
    case "save":
        saveDocument();
        break;
    case "cancel":
        cancelDocument();
        break;
    case "download" :
        downloadDocument($bid);
        break;
    case "show":
    default :
        showDocuments($pend, $sort, 0);
}

function showDocuments($pend, $sort, $view_type)
{
    global $_DOCMAN;
    require_once($_DOCMAN->getPath('classes', 'utils'));

    global $database, $mainframe, $option, $section;
    global $mosConfig_list_limit, $section, $menutype;

    $catid = $mainframe->getUserStateFromRequest("catidarc{option}{$section}", 'catid', 0);
    $limit = $mainframe->getUserStateFromRequest("viewlistlimit", 'limit', $mosConfig_list_limit);
    $limitstart = $mainframe->getUserStateFromRequest("view{$option}{$section}limitstart", 'limitstart', 0);
    $levellimit = $mainframe->getUserStateFromRequest("view{$option}{$section}limit", 'levellimit', 10);

    $search = $mainframe->getUserStateFromRequest("searcharc{$option}{$section}", 'search', '');
    $search = $database->getEscaped(trim(strtolower($search)));

    $where = array();

    if ($catid > 0) {
        $where[] = "a.catid='$catid'";
    }
    if ($search) {
        $where[] = "LOWER(a.dmname) LIKE '%$search%'";
    }
    if ($pend == 'yes') {
        $where[] = "a.approved LIKE '0'";
    }
    // get the total number of records
    $query = "SELECT count(*) "
     . "\n FROM #__docman AS a"
     . (count($where) ? "\n WHERE " . implode(' AND ', $where) : "");
    $database->setQuery($query);
    $total = $database->loadResult();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    // $where[] = "a.catid=cc.id";
    if ($sort == 'filename') {
        $sorttemp = "a.dmfilename";
    } else if ($sort == 'name') {
        $sorttemp = "a.dmname";
    } else if ($sort == 'date') {
        $sorttemp = "a.dmdate_published";
    } else {
        $sorttemp = "a.catid,a.dmname";
    }

    $query = "SELECT a.*, cc.name AS category, u.name AS editor"
     . "\n FROM #__docman AS a"
     . "\n LEFT JOIN #__users AS u ON u.id = a.checked_out"
     . "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
     . (count($where) ? "\n WHERE " . implode(' AND ', $where) : "")
     . "\n ORDER BY " . $sorttemp . " ASC" ;
    $database->setQuery($query);
    $rows = $database->loadObjectList();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }

    require_once($GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php');
    $pageNav = new mosPageNav($total, $limitstart, $limit); 
    
    // slice out elements based on limits
    $rows = array_slice($rows, $pageNav->limitstart, $pageNav->limit); 
    // add category name
    $list = DOCMAN_utils::categoryArray();
    for ($i = 0, $n = count($rows);$i < $n;$i++) {
        $row = &$rows[$i];
        $row->treename = array_key_exists($row->catid , $list) ?
        $list[$row->catid]->treename : '(orphan)';
    }
    // get list of categories
    $options = array();
    $options[] = dmHTML::makeOption('0', _DML_SELECT_CAT);
    $options[] = dmHTML::makeOption('-1', _DML_ALL_CATS);
    $lists['catid'] = dmHTML::categoryList($catid, "document.adminForm.submit();", $options); 
    // get unpublished documents
    $database->setQuery("SELECT count(*) FROM #__docman WHERE approved='0'");
    $number_pending = $database->loadResult();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    // get pending documents
    $database->setQuery("SELECT count(*) FROM #__docman WHERE published='0'");
    $number_unpublished = $database->loadResult();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }

    HTML_DMDocuments::showDocuments($rows, $lists, $search, $pageNav, $number_pending, $number_unpublished, $view_type);
}

/*
*    @desc Edit a document entry
*/
function editDocument($uid)
{
    require_once ("components/com_docman/classes/DOCMAN_utils.class.php");
    require_once ("components/com_docman/classes/DOCMAN_params.class.php");

    global $database, $my, $mosConfig_absolute_path, $mosConfig_live_site;
    global $_DOCMAN;

	 $uploaded_file = mosGetParam($_REQUEST, "uploaded_file", ""); 
	
    $doc = new mosDMDocument($database);
    if ($uid) {
        $doc->load($uid);
        if ($doc->checked_out) {
            if ($doc->checked_out <> $my->id) {
                mosRedirect("index2.php?option=$option", _DML_THE_MODULE . " $row->title " . _DML_IS_BEING);
            }
        } else { // check out document...
            $doc->checkout($my->id);
        }
    } else {
        $doc->init_record();
    }
    
    // Begin building interface information...
    $lists = array();
    
    $lists['document_url']        = ''; //make sure
    $lists['original_dmfilename'] = $doc->dmfilename;
    if (strcasecmp(substr($doc->dmfilename , 0, _DM_DOCUMENT_LINK_LNG) , _DM_DOCUMENT_LINK) == 0) {
        $lists['document_url'] = substr($doc->dmfilename , _DM_DOCUMENT_LINK_LNG);
        $doc->dmfilename = _DM_DOCUMENT_LINK ;
    } 

    // category select list
    $options = array(mosHTML::makeOption('0', _DML_SELECT_CAT));
    $lists['catid'] = dmHTML::categoryList($doc->catid, "", $options); 
    // check if we have at least one category defined
    $database->setQuery("SELECT id " . "\n FROM #__categories " . "\n WHERE section='com_docman' LIMIT 1");

    if (!$checkcats = $database->loadObjectList()) {
        mosRedirect("index2.php?option=com_docman&section=categories", _DML_PLEASE_SEL_CAT);
    }
    
    // select lists
    $lists['approved'] = mosHTML::yesnoRadioList('approved', 'class="inputbox"', $doc->approved);
    $lists['published'] = mosHTML::yesnoRadioList('published', 'class="inputbox"', $doc->published);
 
    // licenses list
    $database->setQuery("SELECT id, name " . "\n FROM #__docman_licenses " . "\n ORDER BY name ASC");
    $licensesTemp = $database->loadObjectList();
    $licenses[] = mosHTML::makeOption('0', _DML_NO_LICENSE);

    foreach($licensesTemp as $licensesTemp) {
        $licenses[] = mosHTML::makeOption($licensesTemp->id, $licensesTemp->name);
    }

    $lists['licenses'] = mosHTML::selectList($licenses, 'dmlicense_id',
        'class="inputbox" size="1"', 'value', 'text', $doc->dmlicense_id); 
    
    // licenses display list
    $licenses_display[] = mosHTML::makeOption('0', _DML_NO);
    $licenses_display[] = mosHTML::makeOption('1', _DML_YES);;
    $lists['licenses_display'] = mosHTML::selectList($licenses_display,
        'dmlicense_display', 'class="inputbox" size="1"', 'value', 'text', $doc->dmlicense_display);

    if ($uploaded_file == '') 
    {
        // Create docs List
        $dm_path      = $_DOCMAN->getCfg('dmpath');
        $fname_reject = $_DOCMAN->getCfg('fname_reject');
         
        $docFiles = mosReadDirectory($dm_path);
        
        $docs = array(mosHTML::makeOption('', _DML_SELECT_DOC));
        $docs[] = mosHTML::makeOption(_DM_DOCUMENT_LINK , _DML_LINKED);
        
        if ( count($docFiles) > 0 ) 
        {
            foreach ( $docFiles as $file ) 
            {
                
                if ( substr($file,0,1) == '.' ) continue; //ignore files starting with .
                if ( @is_dir($dm_path . '/' . $file) ) continue; //ignore directories
                if ( $fname_reject && preg_match("/^(".$fname_reject.")$/i", $file) ) continue; //ignore certain filenames

               	//$query = "SELECT * FROM #__docman WHERE dmfilename='" . $database->getEscaped($file) . "'";
              	//$database->setQuery($query);
             	//if (!($result = $database->query())) {
                //	echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
             	//}
               
                //if ($database->getNumRows($result) == 0 || $doc->dmfilename == $file) {
                    $docs[] = mosHTML::makeOption($file);
                //}
            } //end foreach $docsFiles
        }
        
        if ( count($docs) < 1 ) {
            mosRedirect("index2.php?option=$option&task=upload", _DML_YOU_MUST_UPLOAD);
        }

        $lists['dmfilename'] = mosHTML::selectList($docs, 'dmfilename',
            'class="inputbox" size="1"', 'value', 'text', $doc->dmfilename);
    } else { // uploaded_file isn't blank
        
    	$filename = split("\.", $uploaded_file);
     	$row->dmname = $filename[0]; 
       
        $docs = array(mosHTML::makeOption($uploaded_file));
        $lists['dmfilename'] = mosHTML::selectList($docs, 'dmfilename',
            'class="inputbox" size="1"', 'value', 'text', $doc->dmfilename);
    } // endif uploaded_file
    
    // permissions lists
    $lists['viewer']     = dmHTML::viewerList($doc, 'dmowner');
    $lists['maintainer'] = dmHTML::maintainerList($doc, 'dmmantainedby'); 
     
    // updater user information
    $last = array();
    if ($doc->dmlastupdateby > '0' && $doc->dmlastupdateby != $my->id) {
        $database->setQuery("SELECT id, name FROM #__users WHERE id='" . $doc->dmlastupdateby . "'");
        $last = $database->loadObjectList();
    } else $last[0]->name = $my->name ? $my->name : $my->username; // "Super Administrator"
     
    // creator user information
    $created = array();
    if ($doc->dmsubmitedby > '0' && $doc->dmsubmitedby != $my->id) {
        $database->setQuery("SELECT id, name FROM #__users WHERE id='" . $doc->dmsubmitedby . "'");
        $created = $database->loadObjectList();
    } else $created[0]->name = $my->name ? $my->name : $my->username; // "Super Administrator"
     
    // Imagelist
    $lists['image'] = dmHTML::imageList('dmthumbnail', $doc->dmthumbnail);
    
    // Params definitions
    $params_path = $mosConfig_absolute_path . '/administrator/components/com_docman/docman.params.xml';
	if(file_exists($params_path)) {
		$params =& new dmParameters( $doc->attribs, $params_path , 'params' );
	}
	
	/* ------------------------------ *
     *   MAMBOT - Setup All Mambots   *
     * ------------------------------ */
    $prebot = new DOCMAN_mambot('onBeforeEditDocument');
    $prebot->setParm('document' , $doc);
    $prebot->setParm('filename' , $filename);
    $prebot->setParm('user' , $_DMUSER);
    
     if (!$uid) {
        $prebot->copyParm('process' , 'new document');
    } else {
        $prebot->copyParm('process' , 'edit document');
    } 

    $prebot->trigger();

    if ($prebot->getError()) {
    	mosRedirect("index2.php?option=com_docman&section=documents", $prebot->getErrorMsg());
    } 

    HTML_DMDocuments::editDocument($doc, $lists, $last, $created, $params);
}

function removeDocument($cid)
{
    global $database;

    $document = new mosDMDocument($database);
    if ($document->remove($cid)) {
        mosRedirect("index2.php?option=com_docman&section=documents");
    }
}

function cancelDocument()
{
    global $database;

    $document = new mosDMDocument($database);
    if ($document->cancel()) {
        mosRedirect("index2.php?option=com_docman&section=documents");
    }
}

function publishDocument($cid, $publish = 1)
{
    global $database;

    $document = new mosDMDocument($database);
    if ($document->publish($cid, $publish)) {
        mosRedirect("index2.php?option=com_docman&section=documents");
    }
}

/*
*    @desc Approves a document
*/

function approveDocument($cid, $approved = 1)
{
    global $database;

    $document = new mosDMDocument($database);
    if ($document->approve($cid, $approved)) {
        mosRedirect("index2.php?option=com_docman&section=documents");
    }
}

/*
*    @desc Saves a document
*/

function saveDocument()
{
    global $database;

	//fetch current id
    $cid = mosGetParam($_POST , 'id' , 0); 
    
    //fetch params
    $params = mosGetParam( $_POST, 'params', '' );
	if (is_array( $params )) {
		$txt = array();
		foreach ($params as $k=>$v) {
			$txt[] = "$k=$v";
		}
		$_POST['attribs'] = implode( "\n", $txt );
	}
    
    $document = new mosDMDocument($database); // Create record
    $document->load($cid); // Load from id
    
     /* ------------------------------ *
     *   MAMBOT - Setup All Mambots   *
     * ------------------------------ */
    $logbot = new DOCMAN_mambot('onLog');
    $postbot = new DOCMAN_mambot('onAfterEditDocument');
    $logbot->setParm('document' , $doc);
    $logbot->setParm('file' , $_POST['dmfilename']);
    $logbot->setParm('user' , $_DMUSER);
    
     if (!$uid) {
        $logbot->copyParm('process' , 'new document');
    } else {
        $logbot->copyParm('process' , 'edit document');
    } 
    $logbot->copyParm('new' , !$uid);
    $postbot->setParmArray($logbot->getParm()); 
    
     $postbot->trigger();
    if ($postbot->getError()) {
      	$logbot->copyParm('msg' , $postbot->getErrorMsg());
       	$logbot->copyParm('status' , 'LOG_ERROR');
        $logbot->trigger();
        mosRedirect("index2.php?option=com_docman&section=documents", $postbot->getErrorMsg());
   	} 
    
    if ($document->save()) { // Update from browser
    	$logbot->copyParm('msg' , 'Document saved');
        $logbot->copyParm('status' , 'LOG_OK');
        $logbot->trigger(); 
        mosRedirect("index2.php?option=com_docman&section=documents");
    }
    
    $logbot->copyParm('msg' , $doc->getError());
    $logbot->copyParm('status' , 'LOG_ERROR');
    $logbot->trigger();
    
     mosRedirect("index2.php?option=com_docman&section=documents", $doc->getError());
    
}

function downloadDocument($bid)
{
    global $database, $_DOCMAN; 
    // load document
    $doc = new mosDMDocument($database);
    $doc->load($bid); 
    // download file
    $file = new DOCMAN_File($doc->dmfilename, $_DOCMAN->getCfg('dmpath'));
    $file->download();
    die; // Important!
}

function moveDocumentForm($cid)
{
    global $database;

    if (!is_array($cid) || count($cid) < 1) {
        echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
        exit;
    }
    // query to list items from documents
    $cids = implode(',', $cid);
    $query = "SELECT dmname FROM #__docman WHERE id IN ( " . $cids . " ) ORDER BY id, dmname";
    $database->setQuery($query);
    $items = $database->loadObjectList(); 
    // category select list
    $options = array(mosHTML::makeOption('1', _DML_SELECT_CAT));
    $lists['categories'] = dmHTML::categoryList("", "", $options);

    HTML_DMDocuments::moveDocumentForm($cid, $lists, $items);
}

function moveDocumentProcess($cid)
{
    global $database, $my; 
    // get the id of the category to move the document to
    $categoryMove = mosGetParam($_POST, 'catid', ''); 
    // preform move
    $doc = new mosDMDocument($database);
    $doc->move($cid, $categoryMove); 
    // output status message
    $cids = implode(',', $cid);
    $total = count($cid);

    $cat = new mosDMCategory ($database);
    $cat->load($categoryMove);

    $msg = $total . " Documents moved to " . $cat->name;
    mosRedirect('index2.php?option=com_docman&section=documents&mosmsg=' . $msg);
}
?>
