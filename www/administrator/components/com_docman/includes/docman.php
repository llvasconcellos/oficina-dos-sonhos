<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: docman.php,v 1.4 2005/01/25 15:15:38 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/docman.html.php';

switch ($task) {
    case "cpanel":
        showCPanel();
        break;

    case "stats":
        showStatistics();
        break;

    case "credits" :
        showCredits();
        break;

    case "license":
        mosRedirect("index2.php?option=com_admin&task=help&page=apdx.license");
        break;

    default:
        showCPanel();
} 

function showCPanel()
{
    HTML_DMDocman::showCPanel();
} 

function showCredits()
{
    HTML_DMDocman::showCredits();
} 

function showStatistics()
{
    global $database;
    $database->setQuery("SELECT id, catid , dmname , dmcounter from #__docman WHERE dmowner='-1' OR dmowner='0' order by dmcounter desc limit 50");
    $row = $database->loadObjectList();
    HTML_DMDocman::showStatistics($row);
} 

?>
