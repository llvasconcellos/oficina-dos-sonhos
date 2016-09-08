<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: logs.php,v 1.7 2005/01/25 15:15:38 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/logs.html.php';
require_once($_DOCMAN->getPath('classes', 'mambots'));

switch ($task) {
    case "remove":
        removeLog($cid);
        break;
    case "show" :
    default :
        showLogs($option);
} 

function showLogs($option)
{
    global $database, $mainframe, $sectionid;

    $limit = $mainframe->getUserStateFromRequest("viewlistlimit", 'limit', 10);
    $limitstart = $mainframe->getUserStateFromRequest("view{$option}{$sectionid}limitstart", 'limitstart', 0);
    $search = $mainframe->getUserStateFromRequest("search{$option}{$sectionid}", 'search', '');
    $search = $database->getEscaped(trim(strtolower($search)));
    $where = array();

    if ($search) {
        $where[] = "LOWER(log_datetime) LIKE '%$search%'";
    } 
    // get the total number of records
    $database->setQuery("SELECT count(*) FROM #__docman_log" . (count($where) ? "\nWHERE " . implode(' AND ', $where) : ""));
    $total = $database->loadResult();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    } 

    $id = mosGetParam($_POST, 'id', 0);

    require_once($GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php');
    $pageNav = new mosPageNav($total, $limitstart, $limit);

    $database->setQuery("SELECT *" . "\nFROM #__docman_log" . (count($where) ? "\nWHERE " . implode(' AND ', $where) : "") . "\nORDER BY log_datetime DESC" . "\nLIMIT $limitstart,$limit");
    $rows = $database->loadObjectList();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    } 

    HTML_DMLogs::showLogs($option, $rows, $search, $pageNav);
} 

function removeLog($cid)
{
    global $database; 
    // echo "<pre>Delete record ID " ; print_r( $cid ); echo "</pre>";
    $log = new mosDMLog($database);
    $rows = $log->loadRows($cid); // For log mambots
    
    if ($log->remove($cid)) {
        if ($rows) {
            $logbot = new DOCMAN_mambot('onLogDelete');
            $logbot->setParm('user' , $_DMUSER);
            $logbot->copyParm('process' , 'delete log');
            $logbot->setParm('rows' , $rows);
            $logbot->trigger(); // Delete the logs
        } 
        mosRedirect("index2.php?option=com_docman&section=logs");
    } 
} 

?>
