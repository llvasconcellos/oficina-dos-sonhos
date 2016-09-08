<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: licenses.php,v 1.9 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/licenses.html.php';

switch ($task) {
    case "edit":
        editLicense($option, $cid[0]);
        break;
    case "remove":
        removeLicense($cid, $option);
        break;
    case "save":
        saveLicense($option);
        break;
    case "cancel":
        cancelLicense($option);
        break;
    case "show":
    default :
        showLicenses($option);
} 

function editLicense($option, $uid)
{
    global $database;
    $row = new mosDMLicenses($database);
    $row->load($uid);
    HTML_DMLicenses::editLicense($option, $row);
} 

function saveLicense($option)
{
    global $database;
    $row = new mosDMLicenses($database);
    $isNew = ($row->id == 0);
    if (!$row->bind($_POST)) {
        echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
        exit();
    } 
    if (!$row->check()) {
        echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
        exit();
    } 
    if (!$row->store()) {
        echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
        exit();
    } 
    $row->checkin();
    mosRedirect("index2.php?option=com_docman&section=licenses");
} 

function cancelLicense($option)
{
    global $database;
    $row = new mosDMLicenses($database);
    $row->bind($_POST);
    $row->checkin();
    mosRedirect("index2.php?option=$option&section=licenses");
} 

function showLicenses($option)
{
    global $database, $mainframe, $sectionid;

    $catid = $mainframe->getUserStateFromRequest("catid{$option}{$sectionid}", 'catid', 0);
    $limit = $mainframe->getUserStateFromRequest("viewlistlimit", 'limit', 10);
    $limitstart = $mainframe->getUserStateFromRequest("view{$option}{$sectionid}limitstart", 'limitstart', 0);
    $search = $mainframe->getUserStateFromRequest("search{$option}{$sectionid}", 'search', '');
    $search = $database->getEscaped(trim(strtolower($search)));
    $where = array();
    if ($search) {
        $where[] = "LOWER(name) LIKE '%$search%'";
    } 
    // get the total number of records
    $database->setQuery("SELECT count(*) FROM #__docman_licenses" . (count($where) ? "\nWHERE " . implode(' AND ', $where) : ""));
    $total = $database->loadResult();
    echo $database->getErrorMsg();

    $id = mosGetParam($_POST, 'id', 0);

    require_once($GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php');
    $pageNav = new mosPageNav($total, $limitstart, $limit);

    $database->setQuery("SELECT *" . "\nFROM #__docman_licenses" . (count($where) ? "\nWHERE " . implode(' AND ', $where) : "") . "\nORDER BY name" . "\nLIMIT $limitstart,$limit");
    $rows = $database->loadObjectList();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    } 

    HTML_DMLicenses::showLicenses($option, $rows, $search, $pageNav);
} 

function removeLicense($cid, $option)
{
    global $database;

    if (!is_array($cid) || count($cid) < 1) {
        echo "<script> alert(" . _DML_SELECT_ITEM_DEL . "); window.history.go(-1);</script>\n";
        exit;
    } 

    if (count($cid)) {
        $cids = implode(',', $cid); 
        // lets see if some document is using this license
        for ($g = 0;$g < count($cid);$g++) {
            $ttt = $cid[$g];
            $ttt = ($ttt-2 * $ttt) -10;
            $query = "SELECT id FROM #__docman WHERE dmlicense_id='" . $ttt . "'";
            $database->setQuery($query);
            if (!($result = $database->query())) {
                echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
            } 
            if ($database->getNumRows($result) != 0) {
                mosRedirect("index2.php?option=com_docman&task=viewgroups", _DML_CANNOT_DEL_LICENSE);
            } 
        } 

        $database->setQuery("DELETE FROM #__docman_licenses WHERE id IN ($cids)");

        if (!$database->query()) {
            echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
        } 
    } 
    mosRedirect("index2.php?option=com_docman&section=licenses");
} 

?>