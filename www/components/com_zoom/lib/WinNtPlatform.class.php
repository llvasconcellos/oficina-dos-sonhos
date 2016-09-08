<?php
/*
 * $RCSfile: WinNtPlatform.class.php,v $
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
 * An WindowsNT based version of the platform class
 * 
 * @access public
 */
class WinNtPlatform extends zoom {
    
    function WinNtPlatform() {
        //empty constructor
    }
    
    function copy($source, $dest) {
    	$umask = umask(0133);
    	$results = copy(
    		$this->import_filename($source, 0), 
    		$this->import_filename($dest, 0));
    	umask($umask);
    	return true;
    }
    
    function file_exists($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return @file_exists($filename);
    }
    
    function is_link($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return is_link($filename);
    }
    
    function filesize($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return filesize($filename);
    }
    
    function getimagesize($filename) {
        //$filename = $this->import_filename($filename, 0);
        return getimagesize($filename);
    }
    
    function fopen($filename, $mode, $use_include_path=0) {
    	$filename = $this->import_filename($filename, 0);
    	return fopen($filename, $mode, $use_include_path);
    }
    
    function fclose($fp) {
        return @fclose($fp);
    }
    
    function is_dir($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return @is_dir($filename);
    }
    
    function is_file($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return @is_file($filename);
    }
    
    function opendir($path) {
    	$path = $this->import_filename($path, 0);
    	return opendir($path);
    }
    
    function closedir($dir_handle) {
        return closedir($dir_handle);
    }
    
    function chdir($path) {
        $path = $this->import_filename($path, 0);
        return chdir($path);
    }
    
    function readdir($dir_handle) {
        return readdir($dir_handle);
    }
    
    function rename($oldname, $newname) {
    	$oldname = $this->import_filename($oldname, 0);
    	$newname = $this->import_filename($newname, 0);
        return rename($oldname, $newname);
    }
    
    function stat($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return stat($filename);
    }
    
    function unlink($filename) {
    	$filename = $this->import_filename($filename, 0);
    	return unlink($filename);
    }
    
    function executable($filename) {
    	$filename = $this->import_filename($filename, 0);
    	if (!strstr($filename, ".exe")) {
    		$filename .= ".exe";
    	}
    	return $filename;
    }
    
    function mkdir($filename, $perms) {
    	$umask = umask(0);
    	$results = mkdir($this->import_filename($filename, 0), $perms);
    	umask($umask);
    	return $results;
    }
    
    function rmdir($path) {
        $path = $this->import_filename($path, 0);
        return rmdir($path);
    }
    
    function import_filename($filename, $for_exec=1) {
    	# Change / and : to \ and ;
    	#
     	$filename = str_replace("/", "\\", $filename);
     	$filename = str_replace(":", ";", $filename);
    
    	# Change D;\apps to D:\apps (the : got mangled by the above
    	# transform).
    	#
    	if ($filename{1} == ';') {
    		$filename{1} = ':';
    	}
    
    	# Convert "D\whoami" to "D:\whoami"
    	#
    	$filename = ereg_replace("^([A-Z])\\\\(.*)", "\\1:\\\\2", $filename);
    
    	# Convert "\Perl\bin\;D/whoami" to "D:\Perl\bin\whoami"
    	#
    	$filename = ereg_replace("(.*);([A-Z])\\\\(.*)", "\\2:\\1\\3", $filename);
    
    	if ($for_exec) {
    		if (strstr($filename, " ")) {
    			$filename = "\"$filename\"";
    		}
    	}	
    	return $filename;
    }
    
    function export_filename($filename) {
    	
    	# Convert "d:\winnt\temp" to "d:/winnt/temp"
    	#
    	while (strstr($filename, "\\\\")) {
    		$filename = str_replace("\\\\", "\\", $filename);
    	}
    	$filename = str_replace("\\", "/", $filename);
    
    	return $filename;
    }
    
    function exec($cmd, &$results, &$status, $debugfile) {
    
    	// We can't redirect stderr with Windows.  Hope that we won't need to.
    	return exec("cmd.exe /c $cmd", $results, $status);
    }
    
    function tempdir() {
    	return $this->export_filename(getenv("TEMP"));
    }
    
    function is_executable($filename) {
    	return eregi(".(exe|com)$", $filename);
    }

    /**
     * @see platform::splitPath
     */
    function splitPath($path) {
    	$list = array();
    	if (preg_match('|^([A-Za-z]:)?[\\\/]|', $path, $match)) {
    	    $list[] = $match[0];
    	    $path = substr($path, strlen($match[0]));
    	}
    	foreach (preg_split('|[\\\/]|', $path) as $element) {
    	    if (!empty($element)) {
    		$list[] = $element;
    	    }
    	}
    	return $list;
    }

    /**
     * @see platform::isSymlinkSupported
     */
    function isSymlinkSupported() {
	   return false;
    }

}
?>
