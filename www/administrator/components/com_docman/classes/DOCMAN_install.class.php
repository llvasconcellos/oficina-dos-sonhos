<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: DOCMAN_install.class.php,v 1.13 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_INSTALL')) {
    return true;
} else {
    define('_DOCMAN_INSTALL', 1);
} 

require_once($_DOCMAN->getPath('classes', 'file'));

require_once ($mosConfig_absolute_path . '/administrator/components/com_installer/installer.class.php');

require_once($mainframe->getPath('installer_class', 'mambot'));
require_once($mainframe->getPath('installer_class', 'module'));
// map the element to the required derived class
$classMap = array('mambot' => 'mosInstallerMambot',
    'module' => 'mosInstallerModule',
    'theme' => 'DOCMAN_InstallerTheme',
    );

class DOCMAN_Installer extends mosInstaller {
    var $i_uploaddir = "";

    function DOCMAN_Installer()
    {
        global $mosConfig_absolute_path;

        $uploaddir = $mosConfig_absolute_path . "/media/";
        $this->uploaddir($uploaddir);

        parent::mosInstaller();
    } 

    function uploadPackage($package)
    {
        $upload = &new DOCMAN_FileUpload();

        $file = $upload->uploadHTTP($package, $this->uploaddir());
        if (!$file) {
            $this->setError(1, $upload->_err);
            return false;
        } 

        $this->installArchive($file->name);
        return $file;
    } 

    function uploadPackageURL($url)
    {
        $upload = &new DOCMAN_FileUpload();

        $file = $upload->uploadURL($url, $this->uploaddir());
        if (!$file) {
            $this->setError(1, $upload->_err);
            return false;
        } 

        $this->installArchive($file->name);
        return $file;
    } 

    function extractPackage()
    {
        if (!$this->extractArchive()) {
            $this->setError(2, $this->getError());
            return false;
        } 

        return true;
    } 

    function unextractPackage()
    {
        cleanupInstall($this->installArchive(), $this->unpackDir());
        return true;
    } 

    function installPackage($p_fromdir = null)
    {
        global $classMap;

        $this->installDir($p_fromdir);

        if (!$this->findInstallFile()) {
            $this->setError(3, $this->getError());
            return false;
        } 

        typecast($this, $classMap[$this->installType()]);

        if (!$this->install($p_fromdir)) {
            $this->setError(3, $this->getError());
            return false;
        } 

        return true;
    } 

    function uninstallPackage($package, $type)
    {
        global $mainframe, $classMap;

        $this->filename = $package;

        typecast($this, $classMap[$type]);

        if (!$this->uninstall($package)) {
            $this->setError(4, $this->getError());
            return false;
        } 

        return true;
    } 

    function uploaddir($p_uploaddir = null)
    {
        return $this->setVar('i_uploaddir', $p_uploaddir);
    } 
} 

/**
* Template installer
* 
* @package DOCMAN_1.3.0
*/
class DOCMAN_InstallerTheme extends DOCMAN_Installer {
    /**
    * Custom install method
    * 
    * @param boolean $ True if installing from directory
    */
    function install($p_fromdir = null)
    {
        global $mosConfig_absolute_path, $database;

        if (!$this->preInstallCheck($p_fromdir, 'theme')) {
            return false;
        } 

        $xml = &$this->xmlDoc();
        $mosinstall = &$xml->documentElement; 
        // Set some vars
        $e = &$xml->getElementsByPath('name', 1);
        $this->elementName($e->getText());
        $this->elementDir(mosPathName($mosConfig_absolute_path
                 . '/components/com_docman/themes/' . strtolower(str_replace(" ", "_", $this->elementName())))
            );

        if (!file_exists($this->elementDir()) && !mkdir($this->elementDir(), 0777)) {
            $this->setError(1, _DML_FAILEDTOCREATEDIR . ' "' . $this->elementDir() . '"');
            return false;
        } 

        if ($this->parseFiles('files') === false) {
            return false;
        } 
        if ($this->parseFiles('images') === false) {
            return false;
        } 
        if ($this->parseFiles('css') === false) {
            return false;
        } 
        if ($this->parseFiles('media') === false) {
            return false;
        } 
        // Are there parameters
        $params_element = &$xml->getElementsByPath('params', 1);
        if (!is_null($params_element)) {
            $params = &$this->parseParams($params_element);
            if ($this->writeConfigFile($params) === false) {
                return false;
            } 
        } 
        if ($e = &$xml->getElementsByPath('description', 1)) {
            $this->setError(0, $this->elementName() . '<p>' . $e->getText() . '</p>');
        } 

        return $this->copySetupFile('front');
    } 

    function parseParams(&$element)
    {
        $params = new StdClass();
        foreach ($element->childNodes as $param) {
            $name = $param->getAttribute('name');
            $default = $param->getAttribute('default');
            if ($name[0] != '@') {
                $params->$name = $default;
            } 
        } 

        return $params;
    } 

    function writeConfigFile(&$params)
    {
        global $_DOCMAN;

        $theme = strtolower(str_replace(" ", "_", $this->elementName()));
        $path = $_DOCMAN->getPath('themes', $theme);

        require($_DOCMAN->getPath('classes', 'config'));
        $config = new DOCMAN_Config('themeConfig', $path . "themeConfig.php");
        $config->_config = $params;

        return $config->saveConfig();
    } 
    /**
    * Custom install method
    * 
    * @param int $ The id of the module
    * @param string $ The URL option
    * @param int $ The client id
    */
    function uninstall($id)
    {
        global $database, $mosConfig_absolute_path; 
        // Delete directories
        $path = $mosConfig_absolute_path
         . '/components/com_docman/themes/' . $id;

        $id = str_replace('..', '', $id);
        if (trim($id)) {
            if (is_dir($path)) {
                return deldir(mosPathName($path));
            } else {
                $this->setError(4, _DML_DIRNOTEXISTS);
                return false;
            } 
        } else {
            $this->setError(4, _DML_TEMPLATEEMPTY);
            return false;
        } 
    } 
} 

/**
* 
* @param string $ An existing base path
* @param string $ A path to create from the base path
* @param int $ Directory permissions
* @return boolean True if successful
*/
if ( !function_exists('mosMakePath') ) 
{
    //Function needed in Mambo 4.5.1
    function mosMakePath($base, $path = '', $mode = 0777)
    {
        // check if dir exists
        if (file_exists($base . $path)) {
            return true;
        }
        $path = str_replace('\\', '/', $path);
        $path = str_replace('//', '/', $path);
        $parts = explode('/', $path);

        $n = count($parts);
        if ($n < 1) {
            return mkdir($base, $mode);
        } else {
            $path = $base;
            for ($i = 0; $i < $n; $i++) {
                $path .= $parts[$i] . '/';
                if (!file_exists($path)) {
                    if (!mkdir($path, $mode)) {
                        return false;
                    }
                }
            }
            return true;
        }
    }
} 

function typecast(&$old_object, $new_classname)
{
    if (class_exists($new_classname)) {
        $old_serialized_object = serialize($old_object);
        $old_classname = get_class($old_object);
        $new_serialized_object = 'O:' . strlen($new_classname) . ':"' . $new_classname . '":' .
        substr($old_serialized_object, $old_serialized_object[2] + strlen($old_classname) + 7);
        $old_object = unserialize($new_serialized_object);
    } else
        return false;
} 

?>
