<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: search.php,v 1.16 2005/08/10 01:26:24 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/search.html.php';
include_once dirname(__FILE__) . '/documents.php';
include_once dirname(__FILE__) . '/documents.html.php';

require_once($_DOCMAN->getPath('classes', 'mambots'));
require_once($_DOCMAN->getPath('classes', 'utils'));

$search_mode   = mosGetParam($_REQUEST, 'search_mode', 'any');
$ordering      = mosGetParam($_REQUEST, 'ordering', 'newest');
$invert_search = mosGetParam($_REQUEST, 'invert_search', 0);
$reverse_order = mosGetParam($_REQUEST, 'reverse_order', 0);
$search_where  = mosGetParam($_REQUEST, 'search_where', 0);
$search_phrase = mosGetParam($_REQUEST, 'search_phrase', '');
$search_catid  = mosGetParam($_REQUEST, 'catid', 0);

function fetchSearchForm($gid, $itemid)
{
    global $search_mode, $ordering, $invert_search, $reverse_order, $search_where, $search_phrase, $search_catid; 
    // category select list
    $options = array(mosHTML::makeOption('0', _DML_ALLCATS));
    $lists['catid'] = dmHTML::categoryList($search_catid , "", $options);

    $mode = array();
    $mode[] = mosHTML::makeOption('any' , _SEARCH_ANYWORDS);
    $mode[] = mosHTML::makeOption('all' , _SEARCH_ALLWORDS);
    $mode[] = mosHTML::makeOption('exact' , _SEARCH_PHRASE);
    $mode[] = mosHTML::makeOption('regex' , _DML_SEARCH_REGEX);

    $lists['search_mode'] = mosHTML::selectList($mode , 'search_mode', 'id="search_mode" class="inputbox"' , 'value', 'text', $search_mode);

    $orders = array();
    $orders[] = mosHTML::makeOption('newest', _SEARCH_NEWEST);
    $orders[] = mosHTML::makeOption('oldest', _SEARCH_OLDEST);
    $orders[] = mosHTML::makeOption('popular', _SEARCH_POPULAR);
    $orders[] = mosHTML::makeOption('alpha', _SEARCH_ALPHABETICAL);
    $orders[] = mosHTML::makeOption('category', _SEARCH_CATEGORY);

    $lists['ordering'] = mosHTML::selectList($orders, 'ordering', 'id="ordering" class="inputbox"',
        'value', 'text', $ordering);

    $lists['invert_search'] = '<input type="checkbox" class="inputbox" name="invert_search" '
     . ($invert_search ? ' checked ' : '')
     . '/>';
    $lists['reverse_order'] = '<input type="checkbox" class="inputbox" name="reverse_order" '
     . ($reverse_order ? ' checked ' : '')
     . '/>';

    $matches = array();
    if ($search_where && count($search_where) > 0) {
        foreach($search_where as $val) {
            $matches[ ] = mosHTML::makeOption($val, $val);
        } 
    } else {
        $matches[] = mosHTML::makeOption('search_description', 'search_description');
    } 

    $where = array();
    $where[] = mosHTML::makeOption('search_name' , _DML_NAME);
    $where[] = mosHTML::makeOption('search_description' , _DML_DESCRIPTION);
    $lists['search_where'] = mosHTML::selectList($where , 'search_where[]',
        'id="search_where" class="inputbox" multiple="multiple" size="2"' , 'value', 'text');

    return HTML_DMSearch::searchForm($lists, $search_phrase);
} 

function getSearchResult($gid, $itemid)
{
    global $search_mode, $ordering, $invert_search, $reverse_order, $search_where, $search_phrase, $search_catid;

    $search_mode = ($invert_search ? '-' : '') . $search_mode ;
    $searchList = array(
        array('search_mode' => $search_mode ,
            'search_phrase' => $search_phrase));
    $ordering = ($reverse_order ? '-' : '') . $ordering ;

    $rows = DOCMAN_Docs::search($searchList , $ordering , $search_catid , '', $search_where);
     
    // This acts as the search header - so they can perform search again
    if (count($rows) == 0) {
        $msg = _NOKEYWORD ;
    } else {
        $msg = sprintf(_DML_SEARCH . ' ' . _SEARCH_MATCHES , count($rows));
    } 

    $items = array();
    if (count($rows) > 0) 
    {
        foreach($rows as $row) {
            $doc = new DOCMAN_Document($row->id);

            $item = new StdClass();
            $item->links = &$doc->getLinkObject();
            $item->paths = &$doc->getPathObject();
            $item->data = &$doc->getDataObject();
            $item->data->category = $row->section;

            $items[] = $item;
        } 
    } 

    return $items;
} 

?>
