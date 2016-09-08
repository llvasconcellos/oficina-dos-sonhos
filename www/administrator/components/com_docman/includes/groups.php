<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: groups.php,v 1.13 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/groups.html.php';

switch ($task) {
    case "new":
        editGroup($option, 0);
        break;
    case "edit":
        editGroup($option, $cid[0]);
        break;
    case "remove":
        removeGroup($cid);
        break;
    case "saveg":
    case "save":
        saveGroup($option);
        break;
    case "cancel":
        cancelGroup($option);
        break;
    case "emailgroup":
        emailGroup($gid);
        break;
    case "sendemail":
        sendEmail($gid);
        break;
    case "show" :
    default :
        showGroups($option);
} 

function editGroup($option, $uid)
{
    global $database;
    $row = new mosDMGroups($database);
    $row->load($uid);

    $musers = array();
    $toAddUsers = array(); 
    // get selected members
    if ($row->groups_members) {
        $database->setQuery("SELECT id,name,username " . "\nFROM #__users " . "\nWHERE id IN (" . $row->groups_members . ")" . "\nORDER BY name ASC"
            );
        $usersInGroup = $database->loadObjectList();

        if (!$database->getErrorNum()) {
            foreach($usersInGroup as $user) {
                $musers[] = mosHTML::makeOption($user->id, $user->id . "-" . $user->name . "(" . $user->username . ")");
            } 
        } 
    } 
    // get non selected members
    $query = "SELECT id,name,username FROM #__users ";
    if ($row->groups_members) {
        $query .= "\nWHERE id NOT IN (" . $row->groups_members . ")" ;
    } 
    $query .= "\nORDER BY name ASC";
    $database->setQuery($query);
    $usersToAdd = $database->loadObjectList();
    foreach($usersToAdd as $user) {
        $toAddUsers[] = mosHTML::makeOption($user->id, $user->id . "-" . $user->name . "(" . $user->username . ")");
    } 

    $usersList = mosHTML::selectList($musers, 'users_selected[]',
        'class="inputbox" size="20" onDblClick="moveOptions(document.adminForm[\'users_selected[]\'], document.adminForm.users_not_selected)" multiple="multiple"', 'value', 'text', null);
    $toAddUsersList = mosHTML::selectList($toAddUsers,
        'users_not_selected', 'class="inputbox" size="20" onDblClick="moveOptions(document.adminForm.users_not_selected, document.adminForm[\'users_selected[]\'])" multiple="multiple"',
        'value', 'text', null);

    HTML_DMGroups::editGroup($option, $row, $usersList, $toAddUsersList);
} 

function saveGroup($option)
{
    global $database;
    $row = new mosDMGroups($database);
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
    $members = mosGetParam($_POST, 'users_selected', array());
    $members_imploded = implode(',', $members);

    $database->setQuery("UPDATE #__docman_groups SET groups_members='" . $members_imploded . "' WHERE groups_id=$row->groups_id");
    $database->query();

    mosRedirect("index2.php?option=com_docman&section=groups&task=show");
} 

function showGroups($option)
{
    global $database;

    $search = trim(strtolower(mosGetParam($_POST, 'search', '')));
    $limit = intval(mosGetParam($_POST, 'limit', 10));
    $limitstart = intval(mosGetParam($_POST, 'limitstart', 0));
    $where = array();
    if ($search) {
        $where[] = "LOWER(groups_name) LIKE '%$search%'";
    } 
    // get the total number of records
    $database->setQuery("SELECT count(*) FROM #__docman_groups" . (count($where) ? "\nWHERE " . implode(' AND ', $where) : ""));
    $total = $database->loadResult();

    echo $database->getErrorMsg();

    if ($limit > $total) {
        $limitstart = 0;
    } 
    $database->setQuery("SELECT *" . "\nFROM #__docman_groups" .
        (count($where) ? "\nWHERE " . implode(' AND ', $where) : "") . "\nORDER BY groups_name" . "\nLIMIT $limitstart,$limit"
        );
    $rows = $database->loadObjectList();

    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    } 

    require_once($GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php');
    $pageNav = new mosPageNav($total, $limitstart, $limit);

    HTML_DMGroups::showGroups($option, $rows, $search, $pageNav);
} 

function removeGroup($cid)
{
    global $database;
    if (!is_array($cid) || count($cid) < 1) {
        echo "<script> alert('" . _DML_SELECT_ITEM_DEL . "'); window.history.go(-1);</script>\n";
        exit;
    } 
    if (count($cid)) {
        $cids = implode(',', $cid); 
        // lets see if some document is owned by this group and not allow to delete it
        for ($g = 0;$g < count($cid);$g++) {
            $ttt = $cid[$g];
            $ttt = ($ttt-2 * $ttt) -10;
            $query = "SELECT id FROM #__docman WHERE dmowner='" . $ttt . "'";
            $database->setQuery($query);
            if (!($result = $database->query())) {
                echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
            } 
            if ($database->getNumRows($result) != 0) {
                mosRedirect("index2.php?option=com_docman&section=groups", _DML_CANNOT_DEL_GROUP);
            } 
        } 
        $database->setQuery("DELETE FROM #__docman_groups WHERE groups_id IN ($cids)");
        if (!$database->query()) {
            echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
        } 
    } 
    mosRedirect("index2.php?option=com_docman&section=groups");
} 

function emailGroup($gid)
{
    global $database , $mosConfig_sitename;
    $lists = array();

    $database->setQuery("SELECT * FROM #__docman_groups WHERE groups_id=$gid");
    $email_group = $database->loadObjectList();

    $lists['leadin'] = _DML_THIS_IS . " [" . $mosConfig_sitename . "] "
     . _DML_SENT_BY . " '" . $email_group[0]->groups_name . "'";

    HTML_DMGroups::messageForm($email_group, $lists);
} 

function cancelGroup($option)
{
    global $database;
    $row = new mosDMGroups($database);
    $row->bind($_POST);
    $row->checkin();
    mosRedirect("index2.php?option=$option&section=groups");
} 

function sendEmail($gid)
{ 
    // this is a generic mass mail sender to groups members.
    // From frontend you will find a email to group function specific for a document.
    global $database, $my, $mosConfig_sitename;
    global $mosConfig_mailfrom, $mosConfig_fromname;

    $this_index = 'index2.php?option=com_docman&section=groups';

    $message = mosGetParam($_POST, "mm_message", '');
    $subject = mosGetParam($_POST, "mm_subject", '');
    $leadin = mosGetParam($_POST, "mm_leadin", '');

    if (!$message || !$subject) {
        mosRedirect($this_index . '&task=emailgroup&gid=' . $gid , _DML_FILL_FORM);
    } 

    $usertmp = trim(strtolower($my->usertype));
    if ($usertmp != "super administrator" && $usertmp != "superadministrator" && $usertmp != "manager") {
        mosRedirect("index2.php", _DML_ONLY_ADMIN_EMAIL);
    } 
    // Get the 'TO' list of addresses
    $database->setQuery("SELECT * "
         . "\n FROM #__docman_groups "
         . "\n WHERE groups_id='" . $gid . "'");

    $email_group = $database->loadObjectList();
    $database->setQuery("SELECT id,name,username,email "
         . "\n FROM #__users"
         . "\n WHERE id in ( " . $email_group[0]->groups_members . ")"
         . "\n   AND email !=''");
    $listofusers = $database->loadObjectList();
    if (! count($listofusers)) {
        mosRedirect($this_index , _DML_NO_TARGET_EMAIL . " " . $email_groups[0]->name);
    } 
    // Get 'FROM' sending email address (Use default)
    if (! $mosConfig_mailfrom) {
        $database->setQuery("SELECT email "
             . "\n FROM #__users "
             . "\nWHERE id='$my->id'");
        $my->email = $database->loadResult();
        echo $database->getErrorMsg();
        $mosConfig_mailfrom = $my->email;
    } 
    // Build e-mail message format
    $message =
    ($leadin ?
        (stripslashes($leadin) . "\r\n\r\n") :'')
     . stripslashes($message);
    $subject = stripslashes($subject); 
    // ------- Obsolete: ...kept for historical purposes....
    // $headers = "MIME-Version: 1.0\r\n"
    // . "From: "    .$mosConfig_sitename." <".$my->email.">\r\n"
    // . "Reply-To: ".$mosConfig_sitename." <".$my->email.">\r\n"
    // . "X-Priority: 3\r\n"
    // . "X-MSMail-Priority: Low\r\n"
    // . "X-Mailer: DOCMan\r\n"
    // ;
    // mail($emailtosend->email, $subject, $message, $headers);
    // TO:              SUBJECT:  (message) Headers
    // ------------   Send email using standard mosMail function
    foreach($listofusers as $emailtosend) {
        mosMail($mosConfig_mailfrom, $mosConfig_fromname, $emailtosend->email, $subject, $message);
    } 
    mosRedirect($this_index, _DML_EMAIL_SENT_TO . " " . count($listofusers) . " " . _DML_USERS);
} 

?>
