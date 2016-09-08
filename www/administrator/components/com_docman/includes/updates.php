<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: updates.php,v 1.14 2005/04/20 16:59:11 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

include_once dirname(__FILE__) . '/updates.html.php';

include_once ($_DOCMAN->getPath('classes', 'file'));
include_once ($_DOCMAN->getPath('classes', 'install'));
include_once ($mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php');

require_once ($mosConfig_absolute_path . '/administrator/components/com_installer/installer.class.php');

switch ($task) {
    case "install" :
        $package = mosGetParam($_REQUEST, 'package', null);
        $type = mosGetParam($_REQUEST, 'type', null);
        installUpdate($package, $type);
        break;
    case "check":
    default :
    	echo '<h1>No updates available</h1>';
        //showUpdates();
} 

function showUpdates()
{
    global $mosConfig_absolute_path, $_DOCMAN; 
    // Check if file uploads are enabled
    if (!(bool)ini_get('file_uploads')) {
        HTML_DMUpdates::showInstallMessage("The updater can't continue before file uploads are enabled.",
            'Updater - Error', 'index2.php?option=com_docman&task=cpanel');
        exit();
    } 

    $temp_dir = "$mosConfig_absolute_path/administrator/components/com_docman/temp/";

    $current_version = null;
    $basedir = null;

    $upload = &new DOCMAN_FileUpload;
    $url = $_DOCMAN->getCfg('smart_update') . "updates.xml";
    $path = $temp_dir;
    $fetched_updates = 0; 
    // fetch xml from remote server
    if ($upload->uploadURL($url, $path, _DM_VALIDATE_ADMIN)) {
        $fetched_updates = 1;
    } else {
        echo updateProgress($upload->_err, 'red');
        exit();
    } 
    // parse xml
    $mambots = null;
    $docbots = null;
    $modules = null;
    $themes = null;

    if ($fetched_updates) {
        $xmlDoc = &new DOMIT_Lite_Document();
        $xmlDoc->resolveErrors(true);
        if (!$xmlDoc->loadXML($temp_dir . 'updates.xml', true)) {
            echo updateProgress(_DML_ERROR_READING, 'red');
            exit();
        } 
        $element = &$xmlDoc->documentElement;
        if ($element->getTagName() != 'update') {
            echo updateProgress(_DML_XML_ERROR, 'red');
            exit();
        } 

        $mambots = &$xmlDoc->getElementsbyPath('/update/mambots/package');
        $docbots = &$xmlDoc->getElementsbyPath('/update/docbots/package');
        $modules = &$xmlDoc->getElementsbyPath('/update/modules/package');
        $themes = &$xmlDoc->getElementsbyPath('/update/themes/package');
    } 

    HTML_DMUpdates::showUpdates($mambots, $docbots, $modules, $themes);
} 

function installUpdate($package, $type)
{
    global $_DOCMAN; 
    // Check that the zlib is available
    if (!extension_loaded('zlib')) {
        HTML_DMUpdates::showInstallMessage("The updater can't continue before zlib is installed",
            'Updater - Error', 'index2.php?option=com_docman&task=cpanel');
        exit();
    } 

    $installer = new DOCMAN_Installer();

    $url = $_DOCMAN->getCfg('smart_update') . $package;

    if (!$installer->uploadPackageURL($url)) {
        showErrorMessage($installer);
        exit();
    } 

    if (!$installer->extractPackage()) {
        showErrorMessage($installer);
        exit();
    } 

    if (!$installer->installPackage()) {
        showErrorMessage($installer);
        cleanupInstall($installer->installArchive(), $installer->unpackDir());
        exit();
    } 

    cleanupInstall($installer->installArchive(), $installer->unpackDir());

    HTML_DMUpdates::showInstallMessage('', 'Install ' . $installer->installArchive() . ' - Success' ,
        'index2.php?option=com_docman&section=updates');
} 
// Needs to be reworked to a docman custom installer class
// Installer for templates/language files, ect ...
function installCustom()
{
    $xmlDoc = &new DOMIT_Lite_Document();
    $xmlDoc->resolveErrors(true);

    if (!$xmlDoc->loadXML($temp_dir . $xml_install, true)) {
        echo updateProgress(_ERROR_READING, 'red');
        exit();
    } 

    $element = &$xmlDoc->documentElement;
    if ($element->getTagName() != 'install') {
        echo updateProgress(_XML_ERROR, 'red');
        exit();
    } 
    // lets try to install the files
    $files_to_install = &$xmlDoc->getElementsbyPath('/install/files', 1);
    if (!is_null($files_to_install)) {
        $files = $files_to_install->childNodes;
        foreach($files as $our_files) {
            // try to chmod silently if old file exists
            @chmod($mosConfig_absolute_path . "/" . $our_files->getText(), 0755);
            @chmod(dirname($mosConfig_absolute_path . "/" . $our_files->getText()), 0755); 
            // create the directory if it doesn't exists
            @mkdir(dirname($mosConfig_absolute_path . "/" . $our_files->getText()), 0755);

            if (!@copy($temp_dir . $our_files->getText(), $mosConfig_absolute_path . "/" . $our_files->getText())) {
                mosredirect("index2.php?option=com_docman&section=updates", _DML_COULD_NOT_COPY . " " . $mosConfig_absolute_path . "/" . $our_files->getText());
            } else {
            } 
        } 
        echo updateProgress("OK.");
    } 
    // lets perform required database queries
    $queries_to_install = &$xmlDoc->getElementsbyPath('/install/queries', 1);
    if (!is_null($queries_to_install)) {
        echo _DML_UPDATING_DB;
        $queries = $queries_to_install->childNodes;
        foreach($queries as $our_query) {
            if (trim($our_query->getText()) <> '') {
                $database->setQuery($our_query->getText());
                if (!@$database->query()) {
                    echo $database->stderr(true);
                    return;
                } 
            } 
        } 
        echo updateProgress(_DML_OK);
    } 
    // some old files can be deleted if listed in xml installer
    $deletes = &$xmlDoc->getElementsbyPath('/install/deletes', 1);
    if (!is_null($deletes)) {
        echo _DML_DELETING_OLD;
        $del = $deletes->childNodes;
        foreach($del as $our_delete) {
            $database->setQuery($our_delete->getText());
            if (trim($our_delete->getText() <> '')) {
                if (!@unlink($mosConfig_absolute_path . "/" . $our_delete->getText())) {
                    echo updateProgress(_DML_ERROR_DELETING_OLD, 'red');
                } 
            } 
        } 
        echo updateProgress(_DMA_OK);
    } 
    // now, we can delete the fetched files, because we don't need it anymore
    $files_to_delete = &$xmlDoc->getElementsbyPath('/install/files', 1);
    if (!is_null($files_to_delete)) {
        $files = $files_to_delete->childNodes;
        foreach($files as $our_files) {
            // deletes the files
            @unlink($temp_dir . $our_files->getText());
        } 
    } 
    // delete the zipped package
    @unlink($temp_dir . $package); 
    // all done, so let's finish this
    echo "<br />" . _DML_PACKAGE . " '$package' " . _DML_INST_CLICK . " <a href=\"index2.php?option=com_docman&section=updates\">" . _DML_HERE . "</a> " . _DML_TO_CONT . "<br /><br />";
} 

function updateProgress($msg, $flag = 'green')
{
    return "<span style=\"color: $flag;\">$msg<br /></span>";
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
        default :
            $title = 'Error';
    } 

    HTML_DMUpdates::showInstallMessage($installer->getError(), $title,
        'index2.php?option=com_docman&section=updates');
} 

/**
* return to method
*/
// function returnTo( $section, $task ) {
// $url =  "index2.php?option=com_docman&section=$section";
// }

?>
