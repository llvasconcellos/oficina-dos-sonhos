<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: themes.php,v 1.14 2005/05/24 01:20:43 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/themes.html.php';

include_once ($_DOCMAN->getPath('classes', 'install'));
include_once ($_DOCMAN->getPath('classes', 'params'));
  
// XML library
require_once($mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php');

switch ($task) {
    case "new" :
    case 'new':
        newTheme();
        break;
    case 'edit':
        editTheme($cid[0]);
        break;
    case 'save':
        saveTheme();
        break;
    case "uploadfile" :
        $userfile = mosGetParam($_FILES, 'userfile', null);
        uploadTheme($userfile);
        break;
    case "installfromdir" :
        $userfile = mosGetParam($_REQUEST, 'userfile', '');
        installTheme($userfile);
        break;
    case 'edit_css':
        editThemeCSS($cid[0]);
        break;
    case 'save_css':
        saveThemeCSS();
        break;
    case "remove" :
        removeTheme($cid[0]);
        break;
    case "publish":
        publishTheme($cid[0]);
        break;
    default :
        showThemes();
} 

/**
* Compiles a list of installed, version 4.5+ templates
* 
* Based on xml files found.  If no xml file found the template
* is ignored
*/
function showThemes()
{
    global $database, $mainframe, $_DOCMAN;
    global $mosConfig_absolute_path, $mosConfig_list_limit;

    $limit = $mainframe->getUserStateFromRequest('viewlistlimit', 'limit', $mosConfig_list_limit);
    $limitstart = $mainframe->getUserStateFromRequest("view{com_docman}limitstart", 'limitstart', 0);

    $themesBaseDir = mosPathName($_DOCMAN->getPath('themes'));

    $rows = array(); 
    // Read the template dir to find templates
    $themesDirs = mosReadDirectory($themesBaseDir);

    $rowid = 0; 
    // Check that the directory contains an xml file
    foreach($themesDirs as $themeDir) {
        $path = mosPathName($themesBaseDir . $themeDir);
        $xmlFilesInDir = mosReadDirectory($path, '.xml');

        foreach($xmlFilesInDir as $xmlFile) {
            $rows[] = &parseXMLFile($rowid, $path . $xmlFile);
            $rowid++;
        } 
    } 

    require_once($GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php');
    $pageNav = new mosPageNav(count($rows), $limitstart, $limit);

    $rows = array_slice($rows, $pageNav->limitstart, $pageNav->limit);

    HTML_DMThemes::showThemes($rows, $pageNav);
} 

function editTheme($cid)
{
    global $_DOCMAN, $mosConfig_absolute_path ;

    $themes_path = $_DOCMAN->getPath('themes', $cid);

    $lists = array();
    $row = parseXMLFile(0, $themes_path . "themeDetails.xml"); 
    // published
    $published = ($_DOCMAN->getCfg('icon_theme') == $cid) ? 1 : 0;
    $lists['published'] = mosHTML::yesnoRadioList('published', 'class="inputbox"', $published); 
    // get params definitions
    require($themes_path . "themeConfig.php");
    $params = &new dmParameters('', $themes_path . "themeDetails.xml", 'theme');
    $params->_params = new themeConfig();

    HTML_DMThemes::editTheme($row, $lists, $params);
} 

function saveTheme()
{
    global $_DOCMAN, $database;

    $id = mosGetParam($_POST, 'id', '');
    $params = mosGetParam($_POST, 'params', '');

    $path = $_DOCMAN->getPath('themes', $id);

    require($_DOCMAN->getPath('classes', 'config'));
    $config = new DOCMAN_Config("themeConfig", $path . "themeConfig.php");

    foreach($params as $key => $value) {
        $config->setCfg($key, $value, true);
    } 

    if ($config->saveConfig()) {
        mosRedirect("index2.php?option=com_docman&section=themes", _DML_CONFIG_UPDATED);
    } else {
        mosRedirect("index2.php?option=com_docman&section=themes", _DML_CONFIG_ERROR);
    } 
} 

function publishTheme($cid)
{
    global $_DOCMAN;

    if ($cid == '') {
        echo "<script> alert('Select a category to publish); window.history.go(-1);</script>\n";
        exit;
    } 

    $_DOCMAN->setCfg('icon_theme', $cid);
    $_DOCMAN->saveConfig();

    mosRedirect('index2.php?option=com_docman&section=themes');
} 

/**
* Remove the selected template
*/
function removeTheme($cid)
{
    global $_DOCMAN;

    $cur_template = $_DOCMAN->getCfg('icon_theme');

    if ($cur_template == $cid) {
        echo "<script>alert(\"You can not delete template in use.\"); window.history.go(-1); </script>\n";
        exit();
    } 

    $installer = new DOCMAN_Installer();
    if (!$installer->uninstallPackage($cid, 'theme')) {
        showErrorMessage($installer);
        exit();
    } 

    HTML_DMThemes::showInstallMessage('', 'Uninstall ' . $installer->filename . ' - Success' ,
        'index2.php?option=com_docman&section=themes');
} 

function newTheme()
{
    global $_DOCMAN;

    $startdir = $_DOCMAN->getPath('themes');
    HTML_DMThemes::showInstallForm('Install Theme', $startdir);
} 

function uploadTheme($userfile)
{ 
    // Check if file uploads are enabled
    if (!(bool)ini_get('file_uploads')) {
        HTML_DMThemes::showInstallMessage("The updater can't continue before file uploads are enabled.",
            'Updater - Error', 'index2.php?option=com_docman&task=cpanel');
        exit();
    } 

    $installer = new DOCMAN_Installer();
    $file = $installer->uploadPackage($userfile);
    if (!$file) {
        showErrorMessage($installer);
        exit();
    } 

    if (!$installer->extractPackage()) {
        showErrorMessage($installer);
        exit();
    } 

    if (!$installer->installPackage()) {
        showErrorMessage($installer);
        $installer->unextractPackage();
        exit();
    } 

    $installer->unextractPackage();

    HTML_DMThemes::showInstallMessage('', 'Install ' . $installer->installArchive() . ' - Success' ,
        'index2.php?option=com_docman&section=themes');
} 

function installTheme($userfile)
{ 
    // Check that the zlib is available
    if (!extension_loaded('zlib')) {
        HTML_DMThemes::showInstallMessage("The installer can't continue before zlib is installed",
            'Installer - Error', 'index2.php?option=com_docman&task=cpanel');
        exit();
    } 

    $installer = new DOCMAN_Installer();

    $path = mosPathName($userfile);
    if (!is_dir($path)) {
        $path = dirname($path);
    } 

    if (!$installer->installPackage($path)) {
        showErrorMessage($installer);
        exit();
    } 

    HTML_DMThemes::showInstallMessage('', 'Install ' . $installer->installFilename() . ' - Success' ,
        'index2.php?option=com_docman&section=themes');
} 

function showErrorMessage($installer)
{
    $title = '';

    switch ($installer->errno()) {
        case 1 :
            $title = 'Upload ' . $installer->installArchive() . ' -  Upload Error';
            break;
        case 2 :
            $title = 'Extract ' . $installer->installArchive() . ' - Extract Failed';
            break;
        case 3 :
            $title = 'Install ' . $installer->installArchive() . ' - Install Failed';
            break;
        case 4 :
            $title = 'Uninstall ' . $installer->installArchive() . ' - Uninstall Failed';
            break;
        default :
            $title = 'Error';
    } 

    HTML_DMThemes::showInstallMessage($installer->getError(), $title,
        'index2.php?option=com_docman&section=themes');
} 

function editThemeCSS($p_tname)
{
    global $_DOCMAN;

    $file = $_DOCMAN->getPath('themes', $p_tname) . "/css/theme.css";

    if ($fp = fopen($file, 'r')) {
        $content = fread($fp, filesize($file));
        $content = htmlspecialchars($content);

        HTML_DMThemes::editCSSSource($p_tname, $content);
    } else {
        mosRedirect('index2.php?option=com_docman&section=themes', 'Operation Failed: Could not open' . $file);
    } 
} 

function saveThemeCSS()
{
    global $_DOCMAN;

    $theme = trim(mosGetParam($_POST, 'theme', ''));
    $filecontent = mosGetParam($_POST, 'filecontent', '', _MOS_ALLOWHTML);

    if (!$theme) {
        mosRedirect('index2.php?option=com_docman&section=themes', 'Operation failed: No template specified.');
    } 

    if (!$filecontent) {
        mosRedirect('index2.php?option=com_docman&section=themes', 'Operation failed: Content empty.');
    } 

    $file = $_DOCMAN->getPath('themes', $theme) . "/css/theme.css";

    if (is_writable($file) == false) {
        mosRedirect('index2.php?option=com_docman&section=themes', 'Operation failed: The file is not writable.');
    } 

    if ($fp = fopen ($file, 'w')) {
        fputs($fp, stripslashes($filecontent));
        fclose($fp);
        mosRedirect('index2.php?option=com_docman&section=themes');
    } else {
        mosRedirect('index2.php?option=com_docman&section=themes', 'Operation failed: Failed to open file for writing.');
    } 
} 

function parseXMLFile($id, $xmlfile)
{
    global $_DOCMAN, $mosConfig_absolute_path; 
    // XML library
    require_once($mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php'); 
    // Read the file to see if it's a valid template XML file
    $xmlDoc = &new DOMIT_Lite_Document();
    $xmlDoc->resolveErrors(true);
    if (!$xmlDoc->loadXML($xmlfile, false, true)) {
        return false;
    } 

    $element = &$xmlDoc->documentElement;

    if ($element->getTagName() != 'mosinstall') {
        return false;
    } 
    if ($element->getAttribute('type') != 'theme') {
        return false;
    } 

    $row = new StdClass();
    $row->id = $id;
    $element = &$xmlDoc->getElementsByPath('name', 1);
    $row->name = $element->getText();

    $element = &$xmlDoc->getElementsByPath('creationDate', 1);
    $row->creationdate = $element ? $element->getText() : 'Unknown';

    $element = &$xmlDoc->getElementsByPath('author', 1);
    $row->author = $element ? $element->getText() : 'Unknown';

    $element = &$xmlDoc->getElementsByPath('copyright', 1);
    $row->copyright = $element ? $element->getText() : '';

    $element = &$xmlDoc->getElementsByPath('authorEmail', 1);
    $row->authorEmail = $element ? $element->getText() : '';

    $element = &$xmlDoc->getElementsByPath('authorUrl', 1);
    $row->authorUrl = $element ? $element->getText() : '';

    $element = &$xmlDoc->getElementsByPath('version', 1);
    $row->version = $element ? $element->getText() : '';

    $element = &$xmlDoc->getElementsByPath('description', 1);
    $row->description = $element ? trim($element->getText()) : '';

    $row->mosname = strtolower(str_replace(' ', '_', $row->name)); 
    // Get info from db
    if ($row->mosname == $_DOCMAN->getCfg('icon_theme')) {
        $row->published = 1;
    } else {
        $row->published = 0;
    } 

    $row->checked_out = 0;

    return $row;
} 

?>