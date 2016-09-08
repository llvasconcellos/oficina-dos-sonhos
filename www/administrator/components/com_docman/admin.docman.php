<?php

/**
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: admin.docman.php,v 1.35 2005/04/18 12:11:26 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.'); 
// ensure user has access to this function
if (!($acl -> acl_check('administration', 'edit', 'users', $my -> usertype, 'components', 'all') | $acl -> acl_check('administration', 'edit', 'users', $my -> usertype, 'components', 'com_docman'))){
    mosRedirect('index2.php', _DML_NOT_AUTH);
}

require_once $mainframe->getPath('admin_html');
require_once $mainframe->getPath('class'); 

$_DOCMAN = new dmMainFrame(_DM_TYPE_ADMIN);
$_DOCMAN->loadLanguage('backend');

$_DMUSER = $_DOCMAN->getUser();

require_once $_DOCMAN->getPath('classes', 'html');

$cid = mosGetParam($_POST, 'cid', array(0));
$gid = mosGetParam($_REQUEST, 'gid', '0');

if (!is_array($cid)){
    $cid = array(0);
} 
// retrieve some expected url (or form) arguments
$pend      = mosGetParam($_REQUEST, 'pend', 'no');
$updatedoc = mosGetParam($_POST, 'updatedoc', '0');
$sort      = mosGetParam($_REQUEST, 'sort', '0');
$view_type = mosGetParam($_REQUEST, 'view', 1);

if (($task == 'cpanel') || ($section == null)){
    include_once($_DOCMAN -> getPath('includes', 'docman'));
}else{
    include_once($_DOCMAN -> getPath('includes', $section));
}

?>