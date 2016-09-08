<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: update.class.php                                          |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// Common functions for the installer(s)
// XML library
require_once( "$mosConfig_absolute_path/components/com_zoom/lib/minixml/minixml.inc.php" );

if($zoom->_mambotype == 2){
	$zlib_prefix = "$mosConfig_absolute_path/administrator/includes/pcl/";
}else{
	$zlib_prefix = "$mosConfig_absolute_path/administrator/classes/";
}
// Extract functions
require_once( $zlib_prefix."pclzip.lib.php" );
require_once( $zlib_prefix."pclerror.lib.php" );
require_once( $zlib_prefix."pcltrace.lib.php" );
require_once( $zlib_prefix."pcltar.lib.php" );

// Correct mask
@umask(0);
//
// Base class for the updater
//
class zoomUpdater extends zoom {
	// name of the XML file with installation information
	var $i_installfilename	= "";
	var $i_installarchive	= "";
	var $i_installdir		= "";
	var $i_iswin			= false;
	var $i_errno			= 0;
	var $i_error			= "";
	var $i_installtype		= "";
	var $i_installversion   = "";
	var $i_unpackdir		= "";
	var $i_docleanup		= true;
	var $_sql               = "";

	// XML document
	var $i_xmldoc			= null;

	//
	// Let the show begin...
	//
	function zoomUpdater($p_filename = null, $p_unpack = true)
	{
		$this->i_iswin = (substr(PHP_OS, 0, 3) == 'WIN' && stristr ( $_SERVER["SERVER_SOFTWARE"], "microsoft"));
		$this->installArchive($p_filename);
		if($p_unpack)
		{
			if($this->extractArchive())
			{
				$this->findInstallFile();
			}
		}
	}

	function findInstallFile()
	{
		$installfilefound = false;
		// Try to find the package XML file
		$filesindir = $this->readDirectory( $this->installDir() ,".xml");
		if(count($filesindir) > 0)
		{
			foreach($filesindir as $file)
			{
				$packagefile = $this->isPackageFile($this->installDir() . $file);
				if(!is_null($packagefile) && !$installfilefound )
				{
					$this->xmlDoc($packagefile);
					return true;
				}
			}
		}
		else
		{
			return false;
		}
	}

	function pathName($p_path)
	{
		$retval = "";

		if($this->isWindows())
		{
			$retval = str_replace('/','\\',$p_path);
			if(substr($retval,-1) != '\\')
			$retval .= '\\';

			// Remove double \\
			$retval = str_replace('\\\\','\\',$retval);
		}
		else
		{
			$retval = str_replace('\\','/',$p_path);
			if(substr($retval,-1) != '/')
			$retval .= '/';

			// Remove double //
			$retval = str_replace('//','/',$retval);
		}

		return $retval;
	}

	function isPackageFile($p_file)
	{
		global $zoom;
		$xmlDoc = new MiniXMLDoc();
		$xmlDoc->fromFile($p_file);
		$iszoomupdate = & $xmlDoc->getElementByPath('zoomupdate');
		if($iszoomupdate) {
			// Set the type
			$this->installType($iszoomupdate->attribute("type"));
			$this->installFilename($p_file);
			return $xmlDoc;
		}
		return null;
	}

	function xmlDoc($p_xmldoc = null)
	{
		if(!is_null($p_xmldoc)) {
			$this->i_xmldoc = $p_xmldoc;
		}

		return $this->i_xmldoc;
	}
	function installArchive($p_filename = null)
	{
		if(!is_null($p_filename))
		$this->i_installarchive = $p_filename;

		return $this->i_installarchive;
	}

	function installFilename($p_filename = null)
	{
		if(!is_null($p_filename))
		{
			if($this->isWindows())
			{
				$this->i_installfilename = str_replace('/','\\',$p_filename);
			}
			else
			{
				$this->i_installfilename = str_replace('\\','/',$p_filename);
			}
		}

		return $this->i_installfilename;
	}
	
	function readDirectory( $path, $filter='.' ) {
		$arr = array();
		if (!@is_dir( $path )) {
			return $arr;
		}
		$handle = opendir( $path );
	
		while ($file = readdir($handle)) {
			if (($file <> ".") && ($file <> "..") && preg_match( "/$filter/", $file )) {
				//check for xml files with two periods . in the title : for example template.xml.bak which we want to avoid
				if ($filter == ".xml"){
					$file_count = explode(".",$file);
					if (count($file_count) == "2"){
						$arr[] = trim( $file );
					}
				} else {
					$arr[] = trim( $file );
				}
	
			}
		}
		closedir($handle);
		asort($arr);
		return $arr;
	} 

	function installDir($p_dirname = null)
	{
		if(!is_null($p_dirname))
		{
			$this->i_installdir = $this->pathName($p_dirname);
		}
		return $this->i_installdir;
	}

	function unpackDir($p_dirname = null)
	{
		if(!is_null($p_dirname))
		{
			$this->i_unpackdir = $this->pathName($p_dirname);
		}
		return $this->i_unpackdir;
	}

	//
	// Install method MUST be overridden
	//
	function install()
	{
		die("Hmm... someone forget to make the install method..");
	}

	function isWindows()
	{
		return $this->i_iswin;
	}

	function errno($p_errno = null)
	{
		if(!is_null($p_errno))
		$this->i_errno = $p_errno;

		return $this->i_errno;
	}

	function error($p_error = null)
	{
		if(!is_null($p_error))
		$this->i_error = $p_error;

		return $this->i_error;
	}

	function setError($p_errno, $p_error)
	{
		$this->errno($p_errno);
		$this->error($p_error);
	}

	function getError($p_full = false)
	{
		if($p_full)
		{
			return $this->errno() . " " . $this->error();
		}
		else
		{
			return $this->error();
		}
	}

	//
	// copyFiles
	// Arguments:
	// $p_sourceir	: Source directory
	// $p_destdir	: Destination directory
	// $p_files		: array with filenames
	//
	function copyFiles($p_sourcedir, $p_destdir, $p_files)
	{
		if(is_array($p_files) && count($p_files) > 0)
		{
			foreach($p_files as $_file)
			{
				$filesource	= $this->pathName($p_sourcedir) . $_file;
				$filedest	= $this->pathName($p_destdir) . $_file;
				if($this->isWindows())
				{
					$filesource = str_replace('/','\\',$filesource);
					$filedest	= str_replace('/','\\',$filedest);
				}
				else
				{
					$filesource = str_replace('\\','/',$filesource);
					$filedest	= str_replace('\\','/',$filedest);
				}

				if(file_exists($filesource))
				{
					if(!(copy($filesource,$filedest) && chmod($filedest, 0777)))
					{
						$this->setError(1,"Failed to copy file: $filesource to $filedest");
						return false;
					}
				}
				else
				{
					$this->setError(1,"File $filesource does not exist!");
					return false;
				}
			}
		}
		else
		{
			return false;
		}
		return true;
	}

	//
	// readInstallFile
	//
	function readInstallFile()
	{
		global $zoom;
		if($this->installFilename() == "")
		{
			$this->setError(1,"No filename specified");
			return false;
		}
		$this->i_xmldoc = new MiniXMLDoc();
		$this->i_xmldoc->fromFile($this->installFilename());

		// Check that it's a installation file
		$main_element = &$this->i_xmldoc->getElementByPath('zoomupdate');
		$version_element = &$this->i_xmldoc->getElementByPath('zoomupdate/version');
		if(!$main_element)
		{
			$this->setError(1,"File :'" . $this->installFilename() . "' is not a valid zOOm Image Gallery Updater installation file");
			return false;
		}

		$this->installType($main_element->attribute('type'));
		$this->installVersion($version_element->getValue());
		
		return true;
	}

	//
	// Installation type
	//
	function installType($p_installtype = null)
	{
		if(!is_null($p_installtype))
		$this->i_installtype = $p_installtype;

		return $this->i_installtype;
	}
	
	//
	// Installation version
	//
	function installVersion($p_installversion = null)
	{
		if(!is_null($p_installversion))
		$this->i_installversion = $p_installversion;

		return $this->i_installversion;
	}

	function extractArchive()
	{
		global $mosConfig_absolute_path;
		$base_Dir = $this->pathName($mosConfig_absolute_path . "/media/");

		$archivename	= $base_Dir . $this->installArchive();
		$tmpdir			= uniqid("install_");

		if($this->isWindows())
		{
			$extractdir	= str_replace('/','\\',$this->pathName($base_Dir . "$tmpdir"));
			$archivename = str_replace('/','\\',$archivename);
		}
		else
		{
			$extractdir	= str_replace('\\','/',$this->pathName($base_Dir . "$tmpdir"));
			$archivename = str_replace('\\','/',$archivename);
		}

		$this->unpackDir($extractdir);
		// Find the extension of the file
		$fileext = substr(strrchr(basename($this->installArchive()), '.'), 1);
		if($fileext == "gz" || $fileext == "tar")
		{
			PclTarExtract($archivename,$extractdir);
			if(PclErrorCode() != 1)
			{
				echo "<font color=\"red\">".PclErrorString()."<br />Updater -  error</font>";
				TrDisplay();
				exit();
			}
			$this->installDir($extractdir);
		}
		else
		{
			$zipfile = new PclZip($archivename);
			if($this->isWindows()) {
				define('OS_WINDOWS',1);
			} else {
				define('OS_WINDOWS',0);
			}

			$ret = $zipfile->extract(PCLZIP_OPT_PATH,$extractdir);
			if($ret == 0)
			{
				$this->setError(1,"Unrecoverable error '".$zipfile->errorName(true)."'","Updater -  error");
				return false;
			}
			$this->installDir($extractdir);
		}

		// Try to find the correct install dir. in case that the package have subdirs
		// Save the install dir for later cleanup
		$filesindir = $this->readDirectory( $this->installDir() ,"");
		if(count($filesindir) == 1)
		{
			if(is_dir($extractdir . $filesindir[0]))
			{
				$this->installDir($extractdir . $filesindir[0]);
			}
		}
		return true;
	}
}
class zoomUpdaterComponent extends zoomUpdater
{
	var $i_componentdir		= "";
	var $i_componentadmindir	= "";
	var $i_componentname		= "";
	var $i_hasinstallfile		= false;
	var $i_installfile		= "";

	function zoomUpdaterComponent($p_filename = null,$p_unpack = true)
	{
		global $mosConfig_absolute_path;
		parent::zoomUpdater($p_filename,$p_unpack);
	}

	function componentDir($p_dirname = null)
	{
		if(!is_null($p_dirname))
		{
			$this->i_componentdir = $this->pathName($p_dirname);
		}
		return $this->i_componentdir;
	}

	function componentAdminDir($p_dirname = null)
	{
		if(!is_null($p_dirname))
		{
			$this->i_componentadmindir = $this->pathName($p_dirname);
		}
		return $this->i_componentadmindir;
	}

	function componentName($p_name = null)
	{
		if(!is_null($p_name))
		{
			$this->i_componentname = $p_name;
		}
		return $this->i_componentname;
	}

	function hasInstallfile($p_hasinstallfile = null)
	{
		if(!is_null($p_hasinstallfile))
		{
			$this->i_hasinstallfile = $p_hasinstallfile;
		}
		return $this->i_hasinstallfile;
	}
	function installfile($p_installfile = null)
	{
		if(!is_null($p_installfile))
		{
			$this->i_installfile = $p_installfile;
		}
		return $this->i_installfile;
	}
	
	function isUpdated(){
		global $zoom;
		if($this->installType() == "update"){
			$currVersion = (int)$zoom->_CONFIG['version'];
			if($this->installVersion() >= $currVersion)
				return true;
			else
				return false;
		}elseif($this->installType() == "safemode"){
			$currVersion = (int)$zoom->_CONFIG['safemode'];
			if($this->installVersion() >= $currVersion)
				return true;
			else
				return false;
		}
	}

	//
	// The real Updater...
	//
	function install($p_fromdir = null)
	{
		global $mosConfig_absolute_path, $database;

		if(!is_null($p_fromdir))
		{
			$this->installDir($p_fromdir);
		}

		// added by aje for install from directory
		if (!$this->installfile()) {
			$this->findInstallFile();
		}

		if(!$this->readInstallFile())
		{
			$this->setError(1,"Installation file not found: <br />" . $this->installDir());
			return false;
		}

		if($this->installType() != "update")
		{
			if($this->installType() != "safemode")
			{
				$this->setError(1,"Installation file is not a zOOm Image Gallery safe-mode update file");
				return false;
			}else{
				$this->setError(1,"Installation file is not a zOOm Image Gallery update file");
				return false;
			}
		}

		// In case there where an error doring reading or extracting the archive
		if($this->errno())
		{
			return false;
		}

		// aje moved down to here. ??  seemed to be some referencing problems
		$xml = $this->xmlDoc();

		// Set some vars
		$e = &$xml->getElementByPath('zoomupdate/name');
		$this->componentName($e->getValue());
		$this->componentDir($mosConfig_absolute_path . "/components/" . strtolower("com_" . str_replace(" ","",$this->componentName())) . "/");
		$this->componentAdminDir($mosConfig_absolute_path . "/administrator/components/" . strtolower("com_" . str_replace(" ","",$this->componentName())));

		if(!file_exists($this->componentDir()))
		{
			$this->setError(1,"zOOm Image Gallery is not properly installed! Please re-install component.");
			return false;
		}

		if(!file_exists($this->componentAdminDir()))
		{
			$this->setError(1,"zOOm Image Gallery is not properly installed! Please re-install component.");
			return false;
		}


		// Find files to copy
		$files_element = &$xml->getElementByPath('zoomupdate/files');
		if(is_null($files_element))
		{
			$this->setError(1,"No files found to copy");
			return false;
		}

		$component_files = $files_element->getAllChildren();
		$copyfiles = array();
		foreach($component_files as $component_file)
		{
			if(basename($component_file->getValue()) != $component_file->getValue())
			{
				$newdir = dirname($component_file->getValue());
				if(!file_exists($this->componentDir() . "$newdir") && !mkdir($this->componentDir() . "$newdir",0777))
				{
					$this->setError(1,"Failed to create directory'" . $this->componentDir() . "$newdir" . "'");
					return false;
				}
			}
			$copyfiles[] = $component_file->getValue();
		}

		if(!$this->copyFiles($this->installDir(), $this->componentDir(), $copyfiles))
		{
			return false;
		}
		// Is there any images?
		$files_element = &$xml->getElementByPath('zoomupdate/images');
		if(!is_null($files_element))
		{
			$component_files = $files_element->getAllChildren();
			$copyfiles = array();

			foreach($component_files as $component_file)
			{
				if(basename($component_file->getValue()) != $component_file->getValue())
				{
					$newdir = dirname($component_file->getValue());
					if(!file_exists($this->componentDir() . "$newdir") && !mkdir($this->componentDir() . "$newdir",0777))
					{
						$this->setError(1,"Failed to create directory'" . $this->componentDir() . "$newdir" . "'");
						return false;
					}
				}

				$copyfiles[] = $component_file->getValue();
			}

			if(!$this->copyFiles($this->installDir(), $this->componentDir(), $copyfiles))
			{
				$this->setError(1,"Could not copy image files");
				return false;
			}
		}

		// find administrator files
		$files_element = &$xml->getElementByPath('zoomupdate/administration/files');
		if(!is_null($files_element))
		{
			$component_files = $files_element->getAllChildren();
			$copyfiles = array();
			foreach($component_files as $component_file)
			{
				if(basename($component_file->getValue()) != $component_file->getValue())
				{
					$newdir = dirname($component_file->getValue());
					if(!file_exists($this->componentAdminDir() . "$newdir") && !mkdir($this->componentAdminDir() . "$newdir",0777))
					{
						$this->setError(1,"Failed to create directory '" . $this->componentAdminDir() . "$newdir" . "'");
						return false;
					}
				}
				$copyfiles[] = $component_file->getValue();
			}

			if(!$this->copyFiles($this->installDir(), $this->componentAdminDir(), $copyfiles))
			{
				$this->setError(1,"Could not copy administrator files");
				return false;
			}
		}
		// Is there any images?
		$files_element = &$xml->getElementByPath('zoomupdate/administration/images');
		if(!is_null($files_element))
		{
			$component_files = $files_element->getAllChildren();
			$copyfiles = array();
			foreach($component_files as $component_file)
			{
				if(basename($component_file->getValue()) != $component_file->getValue())
				{
					$newdir = dirname($component_file->getValue());
					if(!file_exists($this->componentAdminDir() . "$newdir") && !mkdir($this->componentAdminDir() . "$newdir",0777))
					{
						$this->setError(1,"Failed to create directory '" . $this->componentAdminDir() . "$newdir" . "'");
						return false;
					}
				}

				$copyfiles[] = $component_file->getValue();
			}

			if(!$this->copyFiles($this->installDir(), $this->componentAdminDir(), $copyfiles))
			{
				$this->setError(1,"Could not copy administrator image files");
				return false;
			}
		}

		// Copy the XML - we should use it during uninstall
		if(!$this->copyFiles($this->installDir(), $this->componentDir(), array(basename($this->installFilename()))))
		{
			$this->setError(1,"Could not copy installation XML file");
			return false;
		}

		// Are there any SQL queries??
		$query_element = &$xml->getElementByPath('zoomupdate/queries');
		if(!is_null($query_element))
		{
			$queries = $query_element->getAllChildren();
			foreach($queries as $query)
			{
				$database->setQuery( $query->getValue() );
				$database->query();
			}
		}

		// Is there an updatefile ?
		$installfile_elemet = &$xml->getElementByPath('zoomupdate/updatefile');
		if(!is_null($installfile_elemet))
		{
			if(!$this->copyFiles($this->installDir(), $this->componentDir(), array($installfile_elemet->getValue())))
			{
				$this->setError(1,"Could not copy installation file");
				return false;
			}
			$this->hasInstallfile(true);
			$this->installFile($installfile_elemet->getValue());
		}
		
		// Finally register which installversion has just been installed, corresponding
		// with the type of installation...
		if($this->installType() == 'update')
		{
			$database->setQuery("UPDATE #__zoom_config SET version = '".$this->installVersion()."'");
		}
		elseif($this->installType() == 'safemode')
		{
			$database->setQuery("UPDATE #__zoom_config SET safemodeversion = '".$this->installVersion()."'");
		}
		$database->query();

		return true;
	}
}