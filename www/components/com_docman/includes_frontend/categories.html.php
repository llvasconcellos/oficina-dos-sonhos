<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: categories.html.php,v 1.31 2005/01/25 23:06:53 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_CATEGORIES')) {
    return;
} else {
    define('_DOCMAN_HTML_CATEGORIES', 1);
} 

class HTML_DMCategories 
{
    function displayCategory(&$links, &$paths, &$data)
    {
        $tpl = &new DOCMAN_Theme(); 
        
        // Assign values to the Savant instance.
        $tpl->assignRef('links', $links);
        $tpl->assignRef('paths', $paths);
        $tpl->assignRef('data', $data); 
        
        // Display a template using the assigned values.
        return $tpl->fetch('categories/category.tpl.php');
    } 

    function displayCategoryList(&$items)
    {
        $tpl = &new DOCMAN_Theme(); 
        
        // Assign values to the Savant instance.
        $tpl->assignRef('items', $items); 
        
        // Display a template using the assigned values.
        return $tpl->fetch('categories/list.tpl.php');
    } 
} 

?>