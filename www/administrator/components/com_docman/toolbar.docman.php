<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: toolbar.docman.php,v 1.22 2005/02/22 16:19:42 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

require_once($mainframe->getPath('toolbar_html'));
require_once($mainframe->getPath('toolbar_default'));

require_once dirname(__FILE__) . '/toolbar.docman.class.php';

global $section;

if ($task == "cpanel")
    TOOLBAR_docman::CPANEL_MENU ();
else {
    switch ($section) {
        case "categories" : {
                switch ($task) {
                    case "edit":
                        TOOLBAR_docman::EDIT_CATEGORY_MENU ();
                        break;

                    case "new":
                        TOOLBAR_docman::EDIT_CATEGORY_MENU ();
                        break;

                    case "show" :
                    default :
                        TOOLBAR_docman::CATEGORIES_MENU ();
                } 
            } 
            break;

        case "documents" : {
                switch ($task) {
                    case "new":
                    case "edit":
                        TOOLBAR_docman::NEW_DOCUMENT_MENU();
                        break;
                    case "move_form":
                        TOOLBAR_docman::MOVE_DOCUMENT_MENU();
                        break;
                    case "show":
                    default:
                        TOOLBAR_docman::DOCUMENTS_MENU();
                } 
            } 
            break;

        case "files" : {
                switch ($task) {
                    case "upload":
                        TOOLBAR_docman::UPLOAD_FILE_MENU();
                        break;
                    case "show":
                    default:
                        TOOLBAR_docman::FILES_MENU();
                        break;
                } 
            } 
            break;

        case "groups" : {
                switch ($task) {
                    case "edit":
                        TOOLBAR_docman::EDIT_GROUPS_MENU();
                        break;
                    case "new":
                        TOOLBAR_docman::EDIT_GROUPS_MENU();
                        break;
                    case "show":
                    default:
                        TOOLBAR_docman::GROUPS_MENU();
                } 
            } 
            break;

        case "licenses" : {
                switch ($task) {
                    case "edit":
                        TOOLBAR_docman::EDIT_LICENSES_MENU();
                        break;
                    case "show":
                    default:
                        TOOLBAR_docman::LICENSES_MENU();
                } 
            } 
            break;

        case "logs" : {
                switch ($task) {
                    case "show":
                    default:
                        TOOLBAR_docman::LOGS_MENU();
                } 
            } 
            break;

        case "orphans" : {
                switch ($task) {
                    case "show":
                    default :
                        TOOLBAR_docman::ORPHANS_MENU();
                } 
            } 
            break;

        case "themes" : {
                switch ($task) {
                    case "new":
                        TOOLBAR_docman::NEW_THEME_MENU ();
                        break;
                    case "edit":
                        TOOLBAR_docman::EDIT_THEME_MENU();
                        break;
                    case "edit_css":
                        TOOLBAR_docman::CSS_THEME_MENU();
                        break;
                    case "show":
                    default :
                        TOOLBAR_docman::THEMES_MENU ();
                } 
            } 
            break;

        case "updates" : {
                switch ($task) {
                    default :
                        TOOLBAR_docman::UPDATES_MENU ();
                } 
            } 
            break;

        case "config" : {
                switch ($task) {
                    case "show":
                    default:
                        TOOLBAR_docman::CONFIG_MENU ();
                } 
            } 
            break;

        case "docman" :
        default : {
                switch ($task) {
                    case "stats":
                        TOOLBAR_docman::STATS_MENU ();
                        break;

                    case "cpanel":
                    default:
                        TOOLBAR_docman::CPANEL_MENU ();
                        break;
                } 
            } 
    } 
} 

?>