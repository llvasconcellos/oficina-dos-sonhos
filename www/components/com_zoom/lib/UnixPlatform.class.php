<?php
/*
 * $RCSfile: UnixPlatform.class.php,v $
 *
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2004 Bharat Mediratta
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
/**
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
 */

/**
 * An Unix version of the platform class
 * 
 * @access public
 */
class UnixPlatform extends zoom {

    function UnixPlatform() {
        //empty constructor
    }
    
    function copy($source, $dest) {
    	$umask = umask(0113);
    	$results = copy($source, $dest);
    	umask($umask);
    	return true;
    }
    
    function exec($cmd, &$results, &$status, $debugfile="") {
    	if (!empty($debugfile)) {
    		$cmd = "($cmd) 2>$debugfile";
    	} 
    	return exec($cmd, $results, $status);
    }
    
    function tempdir() {
    	return export_filename(getenv("TEMP"));
    }
    
    function file_exists($filename) {
    	return @file_exists($filename);
    }
    
    function is_link($filename) {
    	/* if the link is broken it will spew a warning, so ignore it */
    	return @is_link($filename);
    }
    
    function filesize($filename) {
    	return filesize($filename);
    }
    
    function getimagesize($filename) {
        return getimagesize($filename);
    }
    
    function fopen($filename, $mode, $use_include_path=0) {
    	return fopen($filename, $mode, $use_include_path);
    }
    
    function fclose($fp) {
        return @fclose($fp);
    }
    
    function is_dir($filename) {
    	return @is_dir($filename);
    }
    
    function is_file($filename) {
    	return @is_file($filename);
    }
    
    function opendir($path) {
    	return opendir($path);
    }
    
    function closedir($dir_handle) {
        return closedir($dir_handle);
    }
    
    function chdir($path) {
        return chdir($path);
    }
    
    function readdir($dir_handle) {
        return readdir($dir_handle);
    }
    
    function rename($oldname, $newname) {
    	return rename($oldname, $newname);
    }
    
    function stat($filename) {
    	return stat($filename);
    }
    
    function unlink($filename) {
    	return unlink($filename);
    }
    
    function is_executable($filename) {
    	return is_executable($filename);
    }
    
    function import_filename($filename) {
    	return $filename;
    }
    
    function export_filename($filename) {
    	return $filename;
    }
    
    function executable($filename) {
    	return $filename;
    }
    
    function mkdir($filename, $perms) {
    	$umask = umask(0);
    
    	/*
    	 * PHP 4.2.0 on Unix (specifically FreeBSD) has a bug where mkdir
    	 * causes a seg fault if you specify modes.
    	 *
    	 * See: http://bugs.php.net/bug.php?id=16905
    	 *
    	 * We can't reliably determine the OS, so let's just turn off the
    	 * permissions for any Unix implementation.
    	 */
    	if (!strcmp(phpversion(), "4.2.0")) {
    	    $results = mkdir($this->import_filename($filename, 0));
    	} else {
    	    $results = mkdir($this->import_filename($filename, 0), $perms);
    	}
    	
    	umask($umask);
    	return $results;
    }
    
    function rmdir($path) {
        return rmdir($path);
    }
    
    /**
     * @see platform::splitPath
     */
    function splitPath($path) {
	$slash = $this->getDirectorySeparator();
	$list = array();
	foreach (explode($slash, $path) as $element) {
	    if (!empty($element)) {
		$list[] = $element;
	    } else if (empty($list)) {
		$list[] = $slash;
	    }
	}
	return $list;
    }

    /**
     * @see platform::isSymlinkSupported
     */
    function isSymlinkSupported() {
	return true;
    }
}
?>
