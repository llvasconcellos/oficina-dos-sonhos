<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: toolbar.docman.html.php,v 1.30 2005/02/22 16:19:42 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_TOOLBAR')) {
    return;
} else {
    define('_DOCMAN_TOOLBAR', 1);
} 

class TOOLBAR_docman {
    function NEW_DOCUMENT_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save();
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function MOVE_DOCUMENT_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save('move_process');
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function DOCUMENTS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::publishList();
        dmToolBar::unpublishList();
        dmToolBar::addNew();
        dmToolBar::editList();
        dmToolBar::move('move_form', 'Move');
        dmToolBar::deleteList();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::endTable();
    } 

    function UPLOAD_FILE_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::back();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function FILES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::deleteList();
        dmToolBar::upload();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::endTable();
    } 

    function EDIT_CATEGORY_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save();
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function CATEGORIES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::publishList();
        dmToolBar::unpublishList();
        dmToolBar::addNew('new', 'Add');
        dmToolBar::editList();
        dmToolBar::deleteList();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function LOGS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::deleteList();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function EDIT_GROUPS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save('saveg', 'Save');
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function GROUPS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::addNew('new', 'Add');
        dmToolBar::editList();
        dmToolBar::deleteList();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function EDIT_LICENSES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save();
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function LICENSES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::addNew('edit', 'Add');
        dmToolBar::editList();
        dmToolBar::deleteList();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function ORPHANS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::back();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function STATS_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::cpanel();
        dmToolBar::endTable();
    } 

    function NEW_THEME_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::back();
        dmToolBar::endTable();
    } 

    function EDIT_THEME_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save();
        dmToolBar::cancel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function CSS_THEME_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save('save_css');
        dmToolBar::cancel();
        dmToolBar::endTable();
    } 

    function THEMES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::publishList();
        dmToolBar::addNew('new', 'Add');
        dmToolBar::deleteList();
        dmToolBar::editCss();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function UPDATES_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::cpanel();
        dmToolBar::endTable();
    } 

    function CONFIG_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::save();
        dmToolBar::back();
        dmToolBar::divider();
        dmToolBar::cpanel();
        dmToolBar::spacer();
        dmToolBar::endTable();
    } 

    function CPANEL_MENU()
    {
        dmToolBar::startTable();
        dmToolBar::endTable();
    } 

    function _DEFAULT()
    {
        dmToolBar::startTable();
        dmToolBar::addNew();
        dmToolBar::editList();
        dmToolBar::deleteList();
        dmToolBar::cpanel();
        dmToolBar::endTable();
    } 
} // end class

?>
