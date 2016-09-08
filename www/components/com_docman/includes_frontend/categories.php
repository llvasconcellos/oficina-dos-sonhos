<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: categories.php,v 1.32 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/categories.html.php';
require_once($_DOCMAN->getPath('classes', 'model'));
require_once($_DOCMAN->getPath('classes', 'theme'));

function fetchCategory($id)
{
    global $_DMUSER;
    
    $cat = new DOCMAN_Category($id);
    
    // if the user is not authorized to access this category, redirect
    if(!$_DMUSER->canAccessCategory($cat->getDBObject())) {
    	_returnTo('' , _DML_NOT_AUTHORIZED);
    }
    
    return HTML_DMCategories::displayCategory($cat->getLinkObject(),
        $cat->getPathObject(),
        $cat->getDataObject());
} 

function fetchCategoryList($id)
{
    global $_DOCMAN, $_DMUSER;

    $children = DOCMAN_Cats::getChildsByUserAccess($id);
    if (count($children) == 0) {
        return;
    } 

    $items = array();
    foreach($children as $child) 
    {   
       $cat = new DOCMAN_Category($child->id);

     	$item = new StdClass();
       	$item->links = &$cat->getLinkObject();
       	$item->paths = &$cat->getPathObject();
        $item->data = &$cat->getDataObject();

       	$items[] = $item; 
    } 
    // display the entries
    return HTML_DMCategories::displayCategoryList($items);
} 

?>
