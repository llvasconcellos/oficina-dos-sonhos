<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: mod_docman_news.php,v 1.4 2005/04/18 14:05:40 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2004 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
*/

/**
* * ensure this file is being included by a parent file
*/
defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

global $_DOCMAN;
$_DOCMAN->setType(_DM_TYPE_MODULE);
$_DOCMAN->loadLanguage('modules');

global $mosConfig_absolute_path;

$cacheDir = $mosConfig_absolute_path . "/cache/";
$LitePath = $mosConfig_absolute_path . "/includes/Cache/Lite.php";
require_once($mosConfig_absolute_path . "/includes/domit/xml_domit_rss_lite.php");

$rssDoc = &new xml_domit_rss_document_lite();
$rssDoc->useCacheLite(true, $LitePath, $cacheDir, 3600);
$rssDoc->loadRSS('http://www.mambodocman.com/index2.php?option=com_rss&no_html=1');
$totalChannels = $rssDoc->getChannelCount();

echo "<table>";
for ($i = 0; $i < $totalChannels; $i++) {
    echo "<tr><td><hr /></td></tr><tr><td class=\"smalldark\">";
    $currChannel = &$rssDoc->getChannel($i);
    echo "<a name=\"News at www.mambodocman.com\"></a> <a href=\"" . $currChannel->getLink() . "\" target=\"_child\">" . $currChannel->getTitle() . "</a>";
    echo '<br />' . $currChannel->getDescription() . "\n\n";
    echo "</td></tr>";
    $actualItems = $currChannel->getItemCount();
    $setItems = 5;
    if ($setItems > $actualItems) {
        $totalItems = $actualItems;
    } else {
        $totalItems = $setItems;
    } 
    for ($j = 0; $j < $totalItems; $j++) {
        $currItem = &$currChannel->getItem($j);
        echo "<tr><td>";
        echo "<a href=\"" . $currItem->getLink() . "\" target=\"_child\">" . $currItem->getTitle() . "</a><br />" . $currItem->getDescription();
        echo "</td></tr>";
    } 
} 
echo "</table>";

?>