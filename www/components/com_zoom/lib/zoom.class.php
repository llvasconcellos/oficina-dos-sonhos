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
| Filename: zoom.class.php                                            |
| Version: 2.5.3                                                      |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class zoom {
	//first, some of the default internal variables...
	/**
	 * @var string
	 * @access private
	 */
	var $_sql = null;
	/**
	 * @var table
	 * @access private
	 */
	var $_result = null;
	/**
	 * @var array
	 * @access public
	 */
	var $_CONFIG = null;
	/**
	 * @var toolbox
	 * @access public
	 */
	var $toolbox = null;
	/**
	 * @var ftplib
	 * @access public
	 */
	var $ftplib = null;
	/**
	 * @var editmon
	 * @access public
	 */
	var $EditMon = null;
	/**
	 * @var gallery
	 * @access public
	 */
	var $_gallery = null;
	/**
	 * @var ecard
	 * @access public
	 */
	var $ecard = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_counter = null;
	/**
	 * @var boolean
	 * @access private
	 */
	var $_isAdmin = null;
	/**
	 * @var privileges
	 * @access public
	 */
    var $privileges = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_CurrUID = null;
	/**
	 * @var int
	 * @access public
	 */
	var $_startRow = null;
	/**
	 * @var int
	 * @access public
	 */
	var $_pageSize = null;
	/**
	 * @var array
	 * @access public
	 */
	var $_tabclass = null;
	/**
	 * @var string
	 * @access public
	 */
	var $_EXIF_cachefile = null;
	/**
	 * @var array
	 * @access public
	 */
	var $_CAT_LIST = null;
	/**
	 * @var boolen
	 * @access public
	 */
	var $_isWin = null;
	/**
	 * @var boolean
	 * @access public
	 */
	var $_isBackend = null;
	/**
	 * @var int
	 * @access public
	 */
	var $_mambotype = null;
	/**
	 * @var string
	 * @access public
	 */
	var $_tempname = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_folderCount = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_fileCount = null;
	/**
	 * @var byte
	 * @access private
	 */
	var $_folderSize = null;
	/**
	 * @var platform
	 * @access public
	 */
	var $platform = null; 
	/**
	 * zOOm object contructor.
	 *
	 * @return zoom
	 * @access public
	 */
	function zoom() {
		global $version;
		// initialize object variables with some values...
		$this->getConfig();
		$this->_currUID = -1;
		$this->_checkRights();
		$this->_counter = 0;
		$this->_startRow = 0;
		$this->_tabclass = Array("sectiontableentry1", "sectiontableentry2");
		$this->_EXIF_cachefile = "exif.dat";
		$this->_isWin = (strtolower(PHP_OS) == 'winnt') ? TRUE : FALSE;
		$this->_isBackend = false;
		// get child-objects...
		$this->EditMon = new editmon();
		// mambo version detection (which is necessary for backward-compatibility)...
		if (eregi("4\.5[ \t]", $version)) {
			$this->_mambotype = 1;
		} else {
			$this->_mambotype = 2;
		}
		if ($this->privileges->hasPrivileges()) {
			$this->ftplib = new ftplib();
		}
	}
	/**
	* @return boolean
	* @desc check if the native OS is Windows (NT) or UNIX based.
	*/
	function isWin() {
		return $this->_isWin;
	}
	//--------------------zOOm Security Functions--------------------------//
	/**
	* @return void
	* @desc Check the usertype and privileges of the current session for admin or edit rights.
	* @access public
	*/
	function _checkRights() {
  		global $my, $database;
		if (strtolower($my->usertype) == 'administrator' || strtolower($my->usertype) == 'superadministrator' || strtolower($my->usertype) == 'super administrator') {
			$this->_isAdmin = true;
		} else {
			$this->_isAdmin = false;
		}
		$this->_CurrUID = $my->id;
		if (isset($my->gid)) {
		    //get the exact ARO gid, because Mambo messed/ trims it up for some reason...
		    $database->setQuery("SELECT gid FROM #__users WHERE id = '$my->id' LIMIT 1");
		    $result = $database->query();
		    while ($row = mysql_fetch_object($result)) {
		    	$gid = $row->gid;
		    }
		}
		$this->privileges = new privileges($database, $gid);
	}
    /**
    * @return string
    * @param int $userspass
    * @desc Create a HTML select list of users and permitted usertypes.
    * @access public
    */
    function getUsersList($userspass = 0) {
        global $database;
        // Create users List
        $database->setQuery("SELECT id,name,username FROM #__users ORDER BY name ASC");
        if ($this->_result = $database->query()) {
        	$musers = array();
	        $musers = array("<select name=\"selections[]\" class=\"inputbox\" size=\"20\" multiple=\"multiple\">");
	        $musers[] = "<option value=\"0\">"._ZOOM_USERSLIST_LINE1."</option>";
	        if(@in_array(1, $userspass)) {
	            $musers[] = "<option value=\"1\" selected>"._ZOOM_USERSLIST_ALLOWALL."</option>";
	        } else {
	            $musers[] = "<option value=\"1\">"._ZOOM_USERSLIST_ALLOWALL."</option>";
	        }
	        if (@in_array(2, $userspass)) {
	            $musers[] = "<option value=\"2\" selected>"._ZOOM_USERSLIST_MEMBERSONLY."</option>";
	        } else {
	            $musers[] = "<option value=\"2\">"._ZOOM_USERSLIST_MEMBERSONLY."</option>";
	        }
	        // append the rest of the users to the array
	        // and select the already access-granted users from the passed userlist...
	        while ($row = mysql_fetch_object($this->_result)) {
	            if ($userspass == 0) {
	                $musers[] = "<option value=\"".$row->id."\">".$row->id."-".$row->name."(".$row->username.")"."</option>";
	            } else {
	                if (in_array($row->id, $userspass)) {
	                    $selected = "selected";
	                } else {
	                    $selected = "";
	                }
	                $musers[] = "<option value=\"".$row->id."\"".$selected.">".$row->id."-".$row->name."(".$row->username.")"."</option>";
	            }
	        }
	        $musers[] = "</select>";
        }
        return $musers;
    }
 	//--------------------END zOOm Security Functions----------------------//
	//--------------------Filesystem Functions-----------------------------//
	/**
	* @return boolean
	* @param string $dst_dir
	* @desc remove a gallery directory completely using the PHP ftp-library (SAFE MODE = ON)
	* @access public
	*/
	function ftp_rmAll($dst_dir) {
	   $ar_files = $this->ftplib->nlist('', $dst_dir);
	   //check whether we really got something from the ftp_nlist function	
       if (is_array($ar_files)) {
           foreach ($ar_files as $dir) {
              if ($dir != "." && $dir != "..") {
                 if ($ftplib->size($dir) === -1) { // dirname
                   $this->ftp_rmAll($dir); // recursion
                 } else {
                   $this->ftplib->delete($dir); // del file
                 }
              }
           }
           $this->ftplib->rmdir($dst_dir); // delete empty directories
           return true;
        } else {
            return false;
        }
    }
	/**
	* @return boolean
	* @param string $dir
	* @desc remove a gallery completely including sub-directories.
	* @access public
	*/
    function deldir($dir) {
        global $mosConfig_absolute_path;
        $result = true;
             if ($this->_CONFIG['safemodeON']) {    
	             $dir = substr($dir,strlen($mosConfig_absolute_path));
       	         $ftp_dirtoremove = $this->_CONFIG['ftp_hostdir'].$dir;
                 //remove directory
                 $result = $this->ftp_rmAll($ftp_dirtoremove); //do it recursively with helper function
             return $result;    
           /*
            
                 $dir = substr($dir,strlen($mosConfig_absolute_path));
                 $dir = $this->_CONFIG['ftp_hostdir'].$dir;
                 //initialize FTP connection
                 $connected = $ftp_connect($this->_CONFIG['ftp_server']);  
                 // login
                 $login_result = $ftp_login($this->_CONFIG['ftp_username'], $this->_CONFIG['ftp_pass']);   
                 // verify connection
                 if (!$connected || !$login_result) {
                     echo ("Error connecting FTP\n"
                      . "Error connecting to FTP-Server ".$this->_CONFIG['ftp_server']." for user ".$this->_CONFIG['ftp_username']);
                     $result = false;
            } else {
                //create directory
                //$result = ftp_rmdir($conn_id,$path);//this won't work with subdirectory      
                $result = $this->ftp_rmAll($dir); //do it recursively with helper function
                }       
                //Close connection
                $this->ftplib->quit();      
                return $result;
            
            */
        } else {
            $current_dir = $this->platform->opendir($dir);
            while ($entryname = $this->platform->readdir($current_dir)) {
                if ($this->platform->is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")) {
                    $this->deldir("${dir}/${entryname}");
                } elseif($entryname != "." and $entryname!="..") {
                    $this->platform->unlink("${dir}/${entryname}");
                }
            }
            $this->platform->closedir($current_dir);
            $this->platform->rmdir(${dir});
            return true;
        }
    } 
	/**
	* @return string
	* @desc Generate a random directory-name for a new gallery.
	* @access public
	*/
	function newdir() {
		$newdir = "";
		srand((double) microtime() * 1000000);
		for ($acc = 1; $acc <= 6; $acc++){
		    $newdir .= chr(rand (0,25) + 65);
	   	}
		return $newdir;
	}
	/**
	* @return boolean
	* @param string $path
	* @param int $mode
	* @desc Create a directory (generally used when creating a new gallery) in ftp- or normal-mode.
	* @access public
	*/
	function createdir($path, $mode = '0777') {
		global $mosConfig_absolute_path;
		$result = true;
		if ($this->_CONFIG['safemodeON']) {
			//append directory on host to the path...
			$path = $this->_CONFIG['ftp_hostdir']."/".$path;
			//initialize FTP connection
			$connected = $this->ftplib->connect($this->_CONFIG['ftp_server']);	
			// login
			$login_result = $this->ftplib->login($this->_CONFIG['ftp_username'], $this->_CONFIG['ftp_pass']);
			// verify connection
			if (!$connected || !$login_result) {
				echo ("<strong>Error connecting FTP</strong><br />\n"
				 . "Error connecting to FTP-Server ".$this->_CONFIG['ftp_server']." for user ".$this->_CONFIG['ftp_user_name']);
				$result = false;
			} else {
				//create directory
				//$result = ftp_mkdir($conn_id,$path); //this won't work with subdirectories
				$dir = split("/", $path);
		   		$path = "";
				$result = true;
		   		for ($i = 1; $i < count($dir); $i++) {
		       		$path .= "/".$dir[$i];
		       		//echo "$path\n";
		       		if (!@$this->ftplib->chdir($path)) {
		        		@$this->ftplib->chdir("/");
		        		if (!@$this->ftplib->mkdir($path)) {
		        			$result = false;
		         			break;
		         		} else {
							//@ftp_chmod($conn_id, $mode, $path); //this gives problems with some servers
							$chmod_cmd="CHMOD ".$mode." ".$path;
							$chmod=$this->ftplib->site($chmod_cmd);
						}
		       		}
		   		}
			}
			//Close connection
			$this->ftplib->quit();
		} else {
			//prepend full path to Mambo to the $path variable...
			$path = $mosConfig_absolute_path."/".$path;
			$result = $this->platform->mkdir($path, $mode);
			@chmod($path, $mode);
		}
		return $result;
	}
	/**
    * @return boolean
    * @param int $mode
    * @desc Create a temporary directory in the Mambo 'media' dir with a unique name.
    * @access public
    */
	function createTempDir($mode = 0777) {
	    $tmpdir = "media/".substr(uniqid("zoom_"), 0, 13); //support filesystems which only support 14 char dirnames
	    if ($this->createdir($tmpdir, $mode)) {
	    	return $tmpdir;
	    } else {
	        return false;
	    }
	}
    /**
    * @return boolean
    * @param string $filename
    * @param string $content
    * @desc Write content to a file on the filesystem. $filename needs to be a FULL path.
    * @access public
    */
    function writefile($filename, $content) {
        if ($fp = $this->platform->fopen($filename, 'w+')) {
		      fputs($fp, $content, strlen($content));
		      $this->platform->fclose($fp);
        }
        return true;
    }
    /**
    * @return boolean
    * @param string $audiofile
    * @param string $artist
    * @param string $title
    * @desc Create a play-list (XML-file) which is compliant with the zOOm Player. Params may be array or string datatype.
    * @access public
    */
    function createPlaylist($audiofile, $artist, $title) {
    	global $mosConfig_absolute_path;
    	$pl_file = $mosConfig_absolute_path."/components/com_zoom/etc/audiolist.xml";
    	$playlist = ("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
    	 . "<player showDisplay=\"yes\" showPlaylist=\"no\" autoStart=\"yes\">\n");
    	if (is_array($audiofile)) {
    		// this means that both the variables $artist AND $title are arrays too...
    		$this->_counter = 0;
    		foreach ($audiofile as $file) {
    			$playlist .= ("\t<song path=\"".$file."\" title=\"".$artist[$this->_counter]." - ".$title[$this->_counter]."\"/>\n");
    			$this->_counter++;
    		}
    	} else {
    		$playlist .= ("\t<song path=\"".$audiofile."\" title=\"".$artist." - ".$title."\"/>\n");
    	}
    	$playlist .= ("</player>\n");
    	if ($this->writefile($pl_file, $playlist)) {
    		return true;
    	} else {
    		return false;
    	}
    }
	/**
	* @return boolean
	* @param string $extractdir
	* @param string $archivename
	* @desc Extract an archive (zip-file) to a given directory using the PCL library.
	* @access public
	*/
	function extractArchive($extractdir, $archivename) {
		global $mosConfig_absolute_path;
		if ($this->_mambotype == 2) {
			$zlib_prefix = "$mosConfig_absolute_path/administrator/includes/pcl/";
		} else {
			$zlib_prefix = "$mosConfig_absolute_path/administrator/classes/";
		}
		require_once( $zlib_prefix."pclzip.lib.php" );
		$zipfile = new PclZip($archivename);
		if ($this->_isWin) {
			define('OS_WINDOWS',1);
		}
		$ret = $zipfile->extract(PCLZIP_OPT_PATH, $extractdir);
		if($ret <= 0) {
			return false;
		} else {
			return true;
		}
	}
	/**
	* @return boolean
	* @param array $filelist
	* @param string $archivename
	* @param string $remove_dir
	* @desc Create an archive (zip-file) containing files from the array $filelist.
	* @access public
	*/
	function createArchive($filelist, $archivename, $remove_dir) {
		global $mosConfig_absolute_path;
		if ($this->_mambotype == 2) {
			$zlib_prefix = "$mosConfig_absolute_path/administrator/includes/pcl/";
		} else {
			$zlib_prefix = "$mosConfig_absolute_path/administrator/classes/";
		}
		require_once($zlib_prefix."pclzip.lib.php");
		$zipfile = new PclZip($archivename);
		if ($this->_isWin) {
			define('OS_WINDOWS',1);
		}
		$ret = $zipfile->create($filelist, '', $remove_dir);
		if($ret <= 0) {
			return false;
		} else {
			return true;
		}
	}
	/**
	* @return void
	* @param string $directory
	* @desc Calculate the size of directory, including sub-directories.
	* @access public
	*/
	function dirStatistics($directory) {
		$oldDir = getcwd();
		$this->platform->chdir($directory);
		$directory = getcwd();
		if ($open = $this->platform->opendir($directory)) {
			while ($file = $this->platform->readdir($open)) {
				if ($file == '..' || $file == '.') { continue; };
				if ($this->platform->is_file($file)) {
					$this->_fileCount++;
					$this->_folderSize += filesize($file);
				} elseif($this->platform->is_dir($file)) {
					$this->_folderCount++;
				}
			}
			if ($this->_folderCount > 0) {
				$open2 = $this->platform->opendir($directory);
				while ($folders = $this->platform->readdir($open2)) {
					$folder = $directory.'/'.$folders;
					if ($folders == '..' || $folders == '.') { continue; };
					if (is_dir($folder)) {
						$this->dirStatistics($folder);
					}
				}
				$this->platform->closedir($open2);
			}
			$this->platform->closedir($open);
		}
		$this->platform->chdir($oldDir);
	}
	/**
	* @return string
	* @param int $bytes
	* @desc Parse the byte-value returned by dirStatistics() to human readable formats.
	* @access public
	*/
	function parseFolderSize($bytes) {
		$size = $bytes / 1024;
		if ($size < 1024){
			$size = number_format($size, 2);
			$size .= 'kb';
		} else {
			if ($size / 1024 < 1024) {
				$size = number_format($size / 1024, 2);
				$size .= 'mb';
			} elseif($size / 1024 / 1024 < 1024) {
				$size = number_format($size / 1024 / 1024, 2);
				$size .= 'gb';
			} else {
				$size = number_format($size / 1024 / 1024 / 1024, 2);
				$size .= 'tb';
			}
		}
		return $size;
	}
	//--------------------END Filesystem Functions-------------------------//
	//--------------------Accepted file format functions-------------------//
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if the processed file can be accepted by zOOm.
	* @access public
	*/
	function acceptableFormat($tag) {
		return ($this->isImage($tag) || $this->isMovie($tag) || $this->isDocument($tag) || $this->isAudio($tag));
	}
	/**
	* @return string
	* @desc Generate a regular expression from the file formats zOOm can accept for use with the function eregi().
	* @access public
	*/
	function acceptableFormatRegexp() {
		return "(" . join("|", $this->_acceptableFormatList()) . ")";
	}
	/**
	* @return string
	* @desc Generate a comma-seperated list of acceptable file-formats for display purposes only.
	* @access public
	*/
	function acceptableFormatCommaSep() {
		return join(", ", $this->_acceptableFormatList());
	}
	/**
	* @return array
	* @desc Returns list of acceptable movie extensions.
	* @access private
	*/
	function _acceptableMovieList() {
	    return array('avi', 'mpg', 'mpeg', 'wmv', 'mov', 'rm', 'swf');
	}
	/**
	* @return array
	* @desc Returns list of acceptable image extensions.
	* @access private
	*/
	function _acceptableImageList() {
	    return array('jpg', 'jpeg', 'gif', 'png');
	}
	/**
	* @return array
	* @desc Returns list of acceptable document extensions.
	* @access private
	*/
	function _acceptableDocumentList() {
		return array('doc', 'ppt', 'pdf', 'rtf');
	}
	/**
	* @return array
	* @desc Returns list of acceptable audio extensions.
	* @access private
	*/
	function _acceptableAudioList() {
		return array('mp3','ogg','wma');
	}
	/**
	* @return array
	* @desc Returns list of audio extensions that can be played by the zOOm Player.
	* @access private
	*/
	function _playableAudioList() {
		return array('mp3','wma');
	}
	/**
	* @return array
	* @desc Returns list of movie extensions that can be thumbnailed by FFMPEG (with absolute compatibility in mind).
	* @access public
	*/
	function thumbnailableMovieList() {
		// this list doesn't have to be this big, BUT these are the formats supported by FFmpeg...
		return array('avi', 'ac3', 'asf', 'asx', 'dv', 'm4v', 'mpg', 'mpeg', 'mjpeg', 'mov', 'mp4', 'm4a', 'rm', 'rpm', 'wc3', 'wmv', 'swf');
	}
	/**
	* @return array
	* @desc Returns list of acceptable extensions that can be thumbnailed by the graphics library and/ or ffmpeg.
	*/
	function thumbnailableList() {
		return array_merge($this->_acceptableImageList(), $this->thumbnailableMovieList());
	}
	/**
	* @return array
	* @desc Returns list of document extensions that can be indexed by zOOm.
	* @access private
	*/
	function _indexableList() {
		return array('pdf');
	}
	/**
	* @return array
	* @desc Returns list of all acceptable extensions.
	* @access private
	*/
	function _acceptableFormatList() {
	    return array_merge($this->_acceptableImageList(), $this->_acceptableMovieList(), $this->_acceptableDocumentList(), $this->_acceptableAudioList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is an image.
	* @access public
	*/
	function isImage($tag) {
	    return in_array($tag, $this->_acceptableImageList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is a movie.
	* @access public
	*/
	function isMovie($tag) {
	    return in_array($tag, $this->_acceptableMovieList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is an audio file.
	* @access public
	*/
	function isAudio($tag) {
		return in_array($tag, $this->_acceptableAudioList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file can be played by the zOOm Player.
	* @access public
	*/
	function isPlayable($tag) {
		return in_array($tag, $this->_playableAudioList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is a Real Media file.
	* @access public
	*/
	function isRealmedia($tag) {
		if($tag == 'rm') {
			return true;
		} else {
			return false;
		}
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is an Apple Quicktime file.
	* @access public
	*/
	function isQuicktime($tag) {
		if($tag == 'mov') {
			return true;
		} else {
			return false;
		}
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is a document.
	* @access public
	*/
	function isDocument($tag) {
		return in_array($tag, $this->_acceptableDocumentList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file can be resized by the zOOm toolbox.
	* @access public
	*/
	function isThumbnailable($tag) {
		return in_array($tag, $this->thumbnailableList());
	}
	/**
	* @return boolean
	* @param string $tag
	* @desc Check if a file is indexable by the zOOm toolbox.
	* @access public
	*/
	function isIndexable($tag) {
		return in_array($tag, $this->_indexableList());
	}
	//--------------------END Accepted file format functions---------------//
	//--------------------Module auto-detection----------------------------//
	/**
	* @return boolean
	* @desc Check if the zOOm Module by Per Lasse Baasch has been installed.
	* @access public
	*/
	function getModule() {
		global $database;
		$database->setQuery("SELECT title FROM #__modules WHERE module = 'mod_zoom'");
		if ($this->_result = $database->query()) {
			if (mysql_num_rows($this->_result) != 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	}	
	//--------------------END Module auto-detection------------------------//
	//--------------------Cleaning String-datatype-------------------------//
	/**
	* @return string
	* @param string $text
	* @param boolean $checkslashes
	* @desc Remove needless clutter from a given string.
	* @access public
	*/
	function cleanString($text, $checkslashes = true) {
		// code adapted from the phpDig package,
		// a PHP search engine/ webspider.
		// Copyright (C) 2001 - 2003, Antoine Bajolet, http://www.toiletoine.net/
		// Copyright (C) 2003 - current, Charter, http://www.phpdig.net/

		//replace blank characters by spaces
		$text = trim($text);
		$text = ereg_replace("[\r\n\t]+"," ",$text);
		//delete content of head, script, and style tags
		$text = eregi_replace("<head[^>]*>.*</head>"," ",$text);
		$text = preg_replace("/<script[^>]*?>.*?<\/script>/is"," ",$text); // less conservative
		$text = eregi_replace("<style[^>]*>.*</style>"," ",$text);
		$text = preg_replace("/<iframe[^>]*?>.*?<\/iframe>/is"," ",$text);
		// clean tags
		/* $text = preg_replace("/<[\/\!]*?[^<>]*?>/is"," ",$text); */
		$text = ereg_replace("[[:space:]]+"," ",$text);
		$text = ($checkslashes && get_magic_quotes_gpc()) ? stripslashes($text) : $text;
		return $text;
	}
	/**
	* @return string
	* @param string $msg
	* @desc remove HTML tags from a string.
	* @access public
	*/
	function removeTags($msg) {
		$msg = strip_tags($msg);
		return $msg;
	}
	/**
	* @return string
	* @param string $it
	* @param string $text
	* @desc Highlight a substring in text red.
	* @access public
	*/
	function highlight($it, $text) {
		$replacement = '<font color="red">'.quotemeta($it).'</font>';
		return eregi_replace($it, $replacement, $text);
	}
	/**
	* @return string
	* @param string $Name
	* @desc Switch to the next entry in an array safely.
	* @access public
	*/
	function getRequestShift($Name)	{
	  $Result = mosGetParam($_REQUEST,$Name);
	  if (!$Result) {
	    return null;
	  }
	  if (is_array($Result)) {
	    return array_shift($Result);
	  }
	  return $Result;   
	}
	/**
	* @return various
	* @param array $arr
	* @param string $name
	* @param various $def
	* @param int $mask
	* @desc Utility function to return a value from a named array or a specified default
	* @access public
	*/
	function getParam(&$arr, $name, $def=null, $mask=0 ) {
		$return = null;
		if (isset( $arr[$name] )) {
			if (is_string( $arr[$name] )) {
				$arr[$name] = trim( $arr[$name] );
				$arr[$name] = $this->removeTags( $arr[$name] );
				if (!get_magic_quotes_gpc()) {
					$arr[$name] = addslashes( $arr[$name] );
				}
			} elseif (is_array($arr[$name])) {
			    if (!get_magic_quotes_gpc()) {
			    	$arr[$name] = $this->addSlashesOnArray( $arr[$name] );
			    }
			}
			return $arr[$name];
		} else {
			return $def;
		}
	}
	/**
	 * AddSlash array
	 * This function traverses a multidimentional array and adds slashes to the values.
	 * NOTE that the input array is and argument by reference.!!
	 * Twin-function to stripSlashesOnArray
	 *
	 * @param	array		Multidimensional input array, (REFERENCE!)
	 * @return	array
	 */
	function addSlashesOnArray(&$theArray)	{
		if (is_array($theArray))	{
			reset($theArray);
			while(list($Akey,$AVal)=each($theArray))	{
				if (is_array($AVal))	{
					$this->addSlashesOnArray($theArray[$Akey]);
				} elseif (is_string($AVal)) {
					$theArray[$Akey] = addslashes($AVal);
				}
			}
			reset($theArray);
		}
	}
	/**
	 * StripSlash array
	 * This function traverses a multidimentional array and strips slashes to the values.
	 * NOTE that the input array is and argument by reference.!!
	 * Twin-function to addSlashesOnArray
	 *
	 * @param	array		Multidimensional input array, (REFERENCE!)
	 * @return	array
	 */
	function stripSlashesOnArray(&$theArray)	{
		if (is_array($theArray))	{
			reset($theArray);
			while(list($Akey,$AVal)=each($theArray))	{
				if (is_array($AVal))	{
					$this->stripSlashesOnArray($theArray[$Akey]);
				} else {
					$theArray[$Akey] = stripslashes($AVal);
				}
			}
			reset($theArray);
		}
	}
	/**
	 * Either slashes ($cmd=add) or strips ($cmd=strip) array $arr depending on $cmd
	 *
	 * @param	array		Multidimensional input array
	 * @param	string		"add" or "strip", depending on usage you wish.
	 * @return	array
	 */
	function slashArray($arr,$cmd)	{
		if ($cmd=='strip')	$this->stripSlashesOnArray($arr);
		if ($cmd=='add')	$this->addSlashesOnArray($arr);
		return $arr;
	}
	/**
	 * Strip the slashes off a string safely, depending on the magic_quotes_gpc setting.
	 *
	 * @param $string
	 * @return string
	 */
	function stripslashesSafe($string) {
	    if (get_magic_quotes_gpc()) {
	    	$string = stripslashes($string);
	    }
	    return $string;
	}
	/**
	 * Replace single or double quotes of a string with html equivalent.
	 *
	 * @param string $string
	 * @return string
	 */
	function quotesJS($string) {
	    return preg_replace("/['\"]/", "&quot;", $string);
	}
	//--------------------END Cleaning Strings Datatype--------------------//
	//--------------------URI Encryption functions-------------------------//
	/**
	* @return string
	* @param string $string
	* @desc Encrypt given URI parameters, so admin functions will not be available to hackers.
	* @access public
	*/
	function encrypt($string) {
		$convert = '';
		if (isset($string) && substr($string,1,4) != 'obfs') {
			for ($i=0; $i < strlen($string); $i++) {
				$dec = ord(substr($string,$i,1));
				if (strlen($dec) == 2) $dec = 0 . $dec;
				$dec = 324 - $dec;
				$convert .= $dec;
			}
			$convert = '{obfs:' . $convert . '}';
			return ($convert);
		} else {
		    return $string;
		}
	}
	/**
	* @return string
	* @param string $string
	* @desc Decrypt a given URI parameter (which has to encrypted first!), so zOOm can use the original parameters again.
	* @access public
	*/
	function decrypt($string) {
		$convert = '';
		if (isset($string) && substr($string,1,4) == 'obfs') {
			for ($i=6; $i < strlen($string)-1; $i = $i+3) {
				$dec = substr($string,$i,3);
				$dec = 324 - $dec;
				$dec = chr($dec);			
				$convert .= $dec;
			}
			return ($convert);
		} else {
		     return($string);
		}
	}
	//--------------------END URI Encryption functions---------------------//
	//--------------------Date Handling functions--------------------------//
	/**
	* @return unknown
	* @param unknown $zdate
	* @desc Converts zooms date to a unix string and returns then local date as defined in the language string
	* @access public
	*/
	function convertDate($zdate) {
		// contributed by mic (developer@mamboworld.net) 2004.12.30 
        $tmp_year = substr( $zdate, 6, 2 ); // year
        $tmp_mon = substr( $zdate, 3, 2 ); // month
        $tmp_day = substr( $zdate, 0, 2 ); // day
        $tmp_hour = substr( $zdate, 10, 2 ); // hour
        $tmp_min = substr( $zdate, 13, 2 ); // min
        $tmp_sec = substr( $zdate, 16, 2 ); // sec
        
        $new_date = mktime( $tmp_hour, $tmp_min, $tmp_sec, $tmp_mon, $tmp_day, $tmp_year );
        $newdate = strftime ( _ZOOM_DATEFORMAT, $new_date );
        return $newdate;
	}
	//--------------------END Date Handling functions----------------------//
	//--------------------Database Editing Functions-----------------------//
	/**
	* @return void
	* @desc Get the data from the files zoom_config.php and safemode.php
	* @access public
	*/
	function getConfig() {
		global $database, $mosConfig_absolute_path, $zoomConfig;
		foreach ($zoomConfig as $key => $val) {
			$this->_CONFIG[$key] = $val;
		}
		// setup ACL permissions...
		//$this->_mos_add_acl( 'action', 'edit', 'users', 'super administrator', 'content', 'all' ); 
		if (strlen($this->_CONFIG['safemodeversion']) > 0) {
			include_once($mosConfig_absolute_path."/components/com_zoom/etc/safemode.php");
			$this->_CONFIG['ftp_server'] = $ftp_server;
			$this->_CONFIG['ftp_username'] = $ftp_username;
			$this->_CONFIG['ftp_pass'] = $ftp_pass;
			$this->_CONFIG['ftp_hostdir'] = $ftp_hostdir;
		}
		$this->_pageSize = $this->_CONFIG['PageSize'];
		if ((bool) ini_get('safe_mode')) {
			$this->_CONFIG['readEXIF'] = false;
			$this->_CONFIG['readID3'] = false;
		}
	}
	/**
	* @return boolean
	* @desc Save the newly entered configuration data into the files zoom_config.php and safemode.php
	* @access public
	*/
	function saveConfig() {
		global $database, $acl, $_REQUEST, $mosConfig_absolute_path;
		$s01 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s01']));
		$s02 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s02']));
		$s03 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s03']));
		$s04 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s04']));
		$s05 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s05']));
		$s06 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s06']));
		$s07 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s07']));
		$s08 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s08']));
		$s09 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s09']));
		$s10 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s10']));
		$s11 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s11']));
		$s12 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s12']));
		$s13 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s13']));
		$s14 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s14']));
		//s15 has been deprecated: 'allow user upload'
		$s16 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s16']));
		$s17 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s17']));
		// s18 is the CSS textarea...thus skipped.
		$s19 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s19']));
		$s20 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s20']));
		$s21 = (isset($_REQUEST['s21'])) ? 1 : 0;
		$s22 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s22']));
		$s23 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s23']));
		$s24 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s24']));
		$s25 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s25']));
		$s26 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s26']));
		// s27 has been deprecated 'access level'
		$s28 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s28']));
		// s27 has been deprecated 'zoomModule'
		// s30, s31, s32 have been deprecated => old user privs system.
		$s33 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s33']));
		$s34 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s34']));
		$s35 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s35']));
		$s36 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s36']));
		$s37 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s37']));
        $s38 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s38']));
        $s39 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s39']));
        $s40 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s40']));
        $s41 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s41']));
        $s42 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s42']));
        $s43 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s43']));
        $s44 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s44']));
        $s45 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s45']));
        if(strlen($this->_CONFIG['safemodeversion']) > 0) {
        	$s46 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s46']));
        } else {
        	$s46 = 0;
        }
        // variables s47 till s49 are in use by the ftp feature and handled separately.
        $s50 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s50']));
        $s51 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s51']));
        // variable s52 is in use by the ftp feature and handled seperately.
        $s53 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s53']));
        $s54 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s54']));
        $s55 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s55']));
        $s56 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s56']));
        $s57 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s57']));
        $s58 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s58']));// mp3 configuration variable...
        $s59 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s59']));
        // variable s60 is in use by the second CSS area, thus skipped...
        $s60 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s61']));
        $s61 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s62']));
        $s62 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s63']));
        $s63 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s64']));
        $s65 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s65']));
        // variables s66 till s71 were in use by the zOOm Module. Deprecated.
		// variable s72 = toptenOn (for Top Ten link on main page)
		$s72 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s72']));
		// variable s73 = lastsubmOn (for Last Submition link on main page)
		$s73 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s73']));
		// variable s74 = close (for close button in view.php)
		$s74 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s74']));
		// variable s73 = mainscreen (for mainscreen link)
		$s75 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s75']));
		// variable s76 = navbuttons (for buttons at the top on view.php)
		$s76 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s76']));
		// variable s77 = property
		$s77 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s77']));
		$s78 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s78']));
		$s79 = $this->stripslashesSafe(mysql_escape_string($_REQUEST['s79']));
		if(!isset($s29) || empty($s29)) {
			$s29 = 0;
		}
		// the representation and meaning of each s-variable explains itself
		// in the following statement:
		$cfg_content = "<?php\n";
	    $cfg_content .= "defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );\n";
	    $cfg_content .= "\$zoomConfig['conversiontype'] = \"{$s01}\";\n";
	    $cfg_content .= "\$zoomConfig['zoom_title'] = \"{$s28}\";\n";
		$cfg_content .= "\$zoomConfig['imagepath'] = \"{$s02}\";\n";
		$cfg_content .= "\$zoomConfig['IM_path'] = \"{$s03}\";\n";
		$cfg_content .= "\$zoomConfig['NETPBM_path'] = \"{$s04}\";\n";
		$cfg_content .= "\$zoomConfig['FFMPEG_path'] = \"{$s36}\";\n";
		$cfg_content .= "\$zoomConfig['PDF_path'] = \"{$s45}\";\n";
		$cfg_content .= "\$zoomConfig['JPEGquality'] = \"{$s05}\";\n";
		$cfg_content .= "\$zoomConfig['maxsize'] = \"{$s26}\";\n";
		$cfg_content .= "\$zoomConfig['size'] = \"{$s06}\";\n";
		$cfg_content .= "\$zoomConfig['columnsno'] = \"{$s07}\";\n";
		$cfg_content .= "\$zoomConfig['PageSize'] = \"{$s08}\";\n";
		$cfg_content .= "\$zoomConfig['orderMethod'] = \"{$s24}\";\n";
		$cfg_content .= "\$zoomConfig['catOrderMethod'] = \"{$s51}\";\n";
		$cfg_content .= "\$zoomConfig['commentsOn'] = \"{$s09}\";\n";
		$cfg_content .= "\$zoomConfig['cmtLength'] = \"{$s44}\";\n";
		$cfg_content .= "\$zoomConfig['galleryPrefix'] = \"{$s50}\";\n";
		$cfg_content .= "\$zoomConfig['showoccspace'] = \"{$s79}\";\n";
		$cfg_content .= "\$zoomConfig['ratingOn'] = \"{$s17}\";\n";
		$cfg_content .= "\$zoomConfig['toptenOn'] = \"{$s72}\";\n";
		$cfg_content .= "\$zoomConfig['lastsubmOn'] = \"{$s73}\";\n";
		$cfg_content .= "\$zoomConfig['close'] = \"{$s74}\";\n";
		$cfg_content .= "\$zoomConfig['mainscreen'] = \"{$s75}\";\n";
		$cfg_content .= "\$zoomConfig['navbuttons'] = \"{$s76}\";\n";
		$cfg_content .= "\$zoomConfig['properties'] = \"{$s77}\";\n";
		$cfg_content .= "\$zoomConfig['mediafound'] = \"{$s78}\";\n";
		$cfg_content .= "\$zoomConfig['zoomOn'] = \"{$s19}\";\n";
		$cfg_content .= "\$zoomConfig['popUpImages'] = \"{$s10}\";\n";
		$cfg_content .= "\$zoomConfig['catImg'] = \"{$s11}\";\n";
		$cfg_content .= "\$zoomConfig['slideshow'] = \"{$s12}\";\n";
		$cfg_content .= "\$zoomConfig['displaylogo'] = \"{$s13}\";\n";
		$cfg_content .= "\$zoomConfig['readEXIF'] = \"{$s14}\";\n";
		$cfg_content .= "\$zoomConfig['readID3'] = \"{$s58}\";\n";
		$cfg_content .= "\$zoomConfig['tempDescr'] = \"{$s16}\";\n";
		$cfg_content .= "\$zoomConfig['tempName'] = \"{$s20}\";\n";
		$cfg_content .= "\$zoomConfig['autonumber'] = \"{$s21}\";\n";
		$cfg_content .= "\$zoomConfig['showHits'] = \"{$s22}\";\n";
        $cfg_content .= "\$zoomConfig['showName'] = \"{$s38}\";\n";
        $cfg_content .= "\$zoomConfig['showDescr'] = \"{$s39}\";\n";
        $cfg_content .= "\$zoomConfig['showKeywords'] = \"{$s40}\";\n";
        $cfg_content .= "\$zoomConfig['showDate'] = \"{$s41}\";\n";
        $cfg_content .= "\$zoomConfig['showUsername'] = \"{$s59}\";\n";
        $cfg_content .= "\$zoomConfig['showFilename'] = \"{$s42}\";\n";
		$cfg_content .= "\$zoomConfig['showSearch'] = \"{$s37}\";\n";
		$cfg_content .= "\$zoomConfig['showMetaBox'] = \"{$s43}\";\n";
		$cfg_content .= "\$zoomConfig['animate_box'] = \"{$s65}\";\n";
		$cfg_content .= "\$zoomConfig['properties_state'] = \"{$s60}\";\n";
		$cfg_content .= "\$zoomConfig['meta_state'] = \"{$s61}\";\n";
		$cfg_content .= "\$zoomConfig['comments_state'] = \"{$s62}\";\n";
		$cfg_content .= "\$zoomConfig['rating_state'] = \"{$s63}\";\n";
		$cfg_content .= "\$zoomConfig['catcolsno'] = \"{$s23}\";\n";
		$cfg_content .= "\$zoomConfig['utype'] = \"{$s27}\";\n";
		$cfg_content .= "\$zoomConfig['lightbox'] = \"{$s25}\";\n";
		$cfg_content .= "\$zoomConfig['ecards'] = \"{$s34}\";\n";
		$cfg_content .= "\$zoomConfig['ecards_lifetime'] = \"{$s35}\";\n";
		$cfg_content .= "\$zoomConfig['safemodeON'] = \"{$s46}\";\n";
		$cfg_content .= "\$zoomConfig['version'] = \"{$this->_CONFIG['version']}\";\n";
		$cfg_content .= "\$zoomConfig['safemodeversion'] = \"{$this->_CONFIG['safemodeversion']}\";\n";
		$cfg_content .= "?>";
	    $cfg_file = $mosConfig_absolute_path.'/components/com_zoom/etc/zoom_config.php';
		@chmod ($cfg_file, 0766);
		$permission = is_writable($cfg_file);
		if (!$permission) {
			echo "Error: zOOm Configuration file ".$cfg_file." is not writable!";
			exit();
		}
		$this->writefile($cfg_file, $cfg_content);
		// now save the usermenu-item link, if the s33 was checked or delete it otherwise...
		if ($s33 == 1 && !$this->issetUserMenu()) {
			// all ok, insert menu-option...
			$database->setQuery("INSERT INTO #__menu (`id`,`menutype`,`name`,`link`,`type`,`published`,`parent`,`componentid`,`sublevel`,`ordering`,`checked_out`,`checked_out_time`,`pollid`,`browserNav`,`access`,`utaccess`,`params`) VALUES ('','usermenu','Upload Media','index.php?option=com_zoom&page=admin','url','1','0','0','0','0','0','0000-00-00 00:00:00','0','0','1','2','')");
			$database->query();
		} elseif($s33 == 0 && $theId = $this->issetUserMenu()) {
			$database->setQuery("DELETE FROM #__menu WHERE id = ".$theId);
			$database->query();
		}
		// save the privileges config into the mos_zoom_priv table...
		$gtree = $acl->get_group_children_tree( null, 'USERS', false ); 
		foreach ($gtree as $group) {
		    if ($group->value != 29 && $group->value != 30) {
		    	$privileges = new privileges($database, $group->value);
    			foreach ($privileges->getPrivileges() as $privilege => $value) {
    				$privileges->setPrivilege($privilege, $_REQUEST[$privilege.'_'.$group->value]);
    			}
    			if (!$privileges->savePrivileges()) {
    				return false;
    			}
		    }
		}
		return true;
	}
	/**
	* @return void
	* @desc Standard optimization of the zOOm tables to remove unneeded overhead.
	* @access public
	*/
	function optimizeTables() {
		global $database;
		$database->setQuery("OPTIMIZE TABLE `#__zoom`");
		$database->query();
		$database->setQuery("OPTIMIZE TABLE `#__zoomfiles`");
		$database->query();
		$database->setQuery("OPTIMIZE TABLE `#__zoom_comments`");
		$database->query();
		$database->setQuery("OPTIMIZE TABLE `#__zoom_editmon`");
		$database->query();
		$database->setQuery("OPTIMIZE TABLE `#__zoom_priv`");
		$database->query();
	}
	//--------------------END Database Editing Functions-------------------//
	//--------------------Database Querying Functions----------------------//
	/**
	* @return array
	* @desc gentle solution to avoid the use of the pompous smilies-table. From the authors of phpBB...
	* @access private
	*/
	function _getSmiliesTable() {
		return array(
			array(':!:', 'icon_exclaim.gif', 'Exclamation'),
			array(':?:', 'icon_question.gif', 'Question'),
			array(':D', 'icon_biggrin.gif', 'Very Happy'),
			array(':d', 'icon_biggrin.gif', 'Very Happy'),
			array(':-D', 'icon_biggrin.gif', 'Very Happy'),
			array(':grin:', 'icon_biggrin.gif', 'Very Happy'),
			array(':)', 'icon_smile.gif', 'Smile'),
			array(':-)', 'icon_smile.gif', 'Smile'),
			array(':smile:', 'icon_smile.gif', 'Smile'),
			array(':(', 'icon_sad.gif', 'Sad'),
			array(':-(', 'icon_sad.gif', 'Sad'),
			array(':sad:', 'icon_sad.gif', 'Sad'),
			array(':o', 'icon_surprised.gif', 'Surprised'),
			array(':-o', 'icon_surprised.gif', 'Surprised'),
			array(':eek:', 'icon_surprised.gif', 'Surprised'),
			array(':shock:', 'icon_eek.gif', 'Shocked'),
			array(':?', 'icon_confused.gif', 'Confused'),
			array(':-?', 'icon_confused.gif', 'Confused'),
			array(':???:', 'icon_confused.gif', 'Confused'),
			array('8)', 'icon_cool.gif', 'Cool'),
			array('8-)', 'icon_cool.gif', 'Cool'),
			array(':cool:', 'icon_cool.gif', 'Cool'),
			array(':lol:', 'icon_lol.gif', 'Laughing'),
			array(':x', 'icon_mad.gif', 'Mad'),
			array(':-x', 'icon_mad.gif', 'Mad'),
			array(':mad:', 'icon_mad.gif', 'Mad'),
			array(':P', 'icon_razz.gif', 'Razz'),
			array(':p', 'icon_razz.gif', 'Razz'),
			array(':-P', 'icon_razz.gif', 'Razz'),
			array(':razz:', 'icon_razz.gif', 'Razz'),
			array(':oops:', 'icon_redface.gif', 'Embarassed'),
			array(':cry:', 'icon_cry.gif', 'Crying or Very sad'),
			array(':evil:', 'icon_evil.gif', 'Evil or Very Mad'),
			array(':twisted:', 'icon_twisted.gif', 'Twisted Evil'),
			array(':roll:', 'icon_rolleyes.gif', 'Rolling Eyes'),
			array(':wink:', 'icon_wink.gif', 'Wink'),
			array(';)', 'icon_wink.gif', 'Wink'),
			array(';-)', 'icon_wink.gif', 'Wink'),
			array(':idea:', 'icon_idea.gif', 'Idea'),
			array(':arrow:', 'icon_arrow.gif', 'Arrow'),
			array(':|', 'icon_neutral.gif', 'Neutral'),
			array(':-|', 'icon_neutral.gif', 'Neutral'),
			array(':neutral:', 'icon_neutral.gif', 'Neutral'),
			array(':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green')
		);
	}
	/**
	* @return void
	* @param int $parent
	* @param string $ident
	* @param string $ident2
	* @desc Create a list of all galleries.
	* @access private
	*/
	function _getCatList($parent, $ident='', $ident2='') {
		global $database;
		// The author of Coppermine Gallery inspired me for this piece of code.
		// Main trick is the use of recursion. For every sub-category (or each level,
		// or each value of pos) the entire method is called again. And so on...and so on...
		$database->setQuery("SELECT catid, catname, published, shared, uid FROM #__zoom WHERE subcat_id=$parent ORDER BY pos");
		$this->_result = $database->query();
		$rowset = Array();
		while ($row = mysql_fetch_array($this->_result)) {
			$rowset[] = $row;
		}
		foreach ($rowset as $subcat) {
			if (((($subcat['uid'] == $this->_CurrUID) || ($subcat['shared'] == 1))
			  && ($this->privileges->hasPrivilege('priv_creategal') | $this->privileges->hasPrivilege('priv_editgal') | $this->privileges->hasPrivilege('priv_delgal') | $this->privileges->hasPrivilege('priv_upload')))
			  || $this->_isAdmin) {
				$this->_CAT_LIST[] = array(
					'id' => $subcat['catid'],
					'catname' => $ident.$subcat['catname'],
					'published' => $subcat['published'],
					'shared' => $subcat['shared'],
					'uid' => $subcat['uid'],
					'virtpath' => $ident2.$subcat['catname']);
			}
			$this->_getCatList($subcat['catid'], $ident.'>&nbsp;', $ident2.$subcat['catname'].'>&nbsp;');
		}
	}
	/**
	* @return array
	* @desc Create an array filled with ALL the keywords that can be found in the zOOm tables.
	* @access private
	*/
	function _getKeywordsList() {
		global $database;
		$database->setQuery("SELECT cat.catkeywords, img.imgkeywords AS keywords "
			. "  FROM #__zoom as cat "
			. "LEFT JOIN"
			. "  #__zoomfiles AS img "
			. "ON cat.catid"
			. "    WHERE cat.published = 1 "
			. "    AND cat.catkeywords <> '' "
			. "    AND img.published = 1 "
			. "    AND img.imgkeywords <> ''");
		if ($this->_result = $database->query()) {
			$keywords = array();
			$newkeys = array();
			$allkeys = array();
			// first, put the keywords from both columns into an array...
			while($row = mysql_fetch_object($this->_result)) {
				$allkeys[] = (!empty($row->keywords)) ? $row->keywords : "";
			}
			// now, delete empty rows...
			$this->_counter = 0;
			foreach ($allkeys as $akey) {
				if (!empty($akey)) {
					$newkeys[] = $akey;
				}
			}
			// then, get each individual keyword and put it into the array '$keywords'
			foreach ($newkeys as $newkey) {
				$temp = explode(",", $newkey);
				if (is_array($temp)) {
					foreach ($temp as $t) {
						if (!empty($t)) {
							$keywords[] = $t;
						}
					}
				}
			}
			// remove duplicate keywords...
			$keywords = array_unique($keywords);
			sort($keywords);
		}
		return $keywords;
	}
	/**
	* @return int
	* @param string $option
	* @desc Find the Itemid back.
	* @access public
	*/
	function getItemid($option) {
		global $database;
		$database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=".mysql_escape_string($option)."'");
		if ($this->_result = $database->query()) {
			$row = mysql_fetch_object($this->_result);
			return $row->id;
		} else {
			return null;
		}		
	}
	/**
	* @return string
	* @desc Return the method of ordering of media.
	* @access public
	*/
	function getOrderMethod() {
		switch ($this->_CONFIG['orderMethod']) {
			case 1:
				return "imgdate ASC";
				break;
			case 2:
				return "imgdate DESC";
				break;
			case 3:
				return "imgfilename ASC";
				break;
			case 4:
				return "imgfilename DESC";
				break;
			case 5:
				return "imgname ASC";
				break;
			case 6:
				return "imgname DESC";
				break;
		}
	}
	/**
	* @return string
	* @desc Return the method of ordering of galleries.
	* @access public
	*/
	function getCatOrderMethod() {
		// manual gallery ordering will be added later on...
		switch ($this->_CONFIG['catOrderMethod']) {
			case 1:
				return "catid ASC";
				break;
			case 2:
				return "catid DESC";
				break;
			case 3:
				return "catname ASC";
				break;
			case 4:
				return "catname DESC";
				break;
		}
	}
	/**
	* @return void
	* @param int $gallery_id
	* @param boolean $galleryview
	* @desc Create a new gallery object with the given gallery id.
	* @access public
	*/
	function setGallery($gallery_id, $galleryview = false) {
		$this->_gallery = null;
		$this->_gallery = new gallery($gallery_id, $galleryview);
	}
	/**
	* @return void
	* @param int $id
	* @desc Create a new ecard object with the given ecard-id.
	* @access public
	*/
	function setEcard($id = 0) {
		$this->ecard = null;
		$this->ecard = new ecard($id);
	}
	/**
	* @return boolean
	* @desc Check if the link 'Upload Media' already exists in the Mambo user-menu.
	* @access public
	*/
	function issetUserMenu(){
		global $database;
		$database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=com_zoom&page=admin' LIMIT 1");
		if ($this->_result = $database->query()) {
			if (mysql_num_rows($this->_result) > 0) {
				$row = mysql_fetch_object($this->_result);
				return $row->id;
			} else {
				return false;
			}
		}		
	}
	/**
	* @return object
	* @param int $userid
	* @desc Get info of a user with a given user-id.
	* @access public
	*/
	function getUserInfo($userid) {
		global $database;
		$database->setQuery("SELECT name, username, email, usertype, registerDate, lastvisitDate FROM #__users WHERE id=$userid LIMIT 1");
		if ($result = $database->query()) {
			return mysql_fetch_object($result);
		} else {
			return false;
		}
	}
	/**
	* @return void
	* @param string $checkThis
	* @param string $checkWhat
	* @desc Check if a filename OR gallery-directory already exists and if it does; do something about it!
	* @access public
	*/
	function checkDuplicate($checkThis, $checkWhat = 'filename') {
		global $database;
		// There are two things this function can check for:
		// - duplicate filenames
		// - duplicate directories (of galleries)
		if ($checkWhat === "directory") {
			$database->setQuery("SELECT catid FROM #__zoom WHERE catdir = '$checkThis'");
			if($this->_result = $database->query()){
				if (mysql_num_rows($this->_result) > 0) {
					$newname = $this->newdir();
					$this->checkDuplicate($newname, 'directory');
				} else {
					$this->_tempname = $checkThis;
				}
			} else {
				$this->_tempname = $checkThis;
			}
		} else {
			$database->setQuery("SELECT imgid FROM #__zoomfiles WHERE imgfilename = '$checkThis' AND catid = '".$this->_gallery->_id."'");
			if ($this->_result = $database->query()) {
				if (mysql_num_rows($this->_result) > 0) {
					// filename exists already for this gallery, so change the filename and test again...
					// the filename will be changed accordingly:
					// if a filename exists, add the suffix _{number} incrementally,
					// thus 'afile_1.jpg' will become 'afile_2.jpg' and so on...
					$newname = preg_replace( "/^(.+?)(_?)(\d*)(\.[^.]+)?$/e", "'\$1_'.(\$3+1).'\$4'", $checkThis );
					$this->checkDuplicate($newname);
				} else {
					$this->_tempname = $checkThis;
				}
			} else {
				 $this->_tempname = $checkThis;
			}
		}
	}
	//--------------------END Database Querying Functions------------------// 
	//--------------------HTML content-creation functions------------------//
	/**
	* @return void
	* @param int $key
	* @desc Create the zOOm Slideshow
	* @access public
	*/
	function createSlideshow($key) {
		global $mosConfig_live_site;
		?>
		<script language="JavaScript" type="text/JavaScript">
		// (C) 2000 www.CodeLifter.com
		// http://www.codelifter.com
		// Free for all users, but leave in this  header
		// NS4-6,IE4-6
		// Fade effect only in IE; degrades gracefully
		var stopstatus = 0;
		
		// Set slideShowSpeed (milliseconds)
		var slideShowSpeed = 8000;
		
		// Duration of crossfade (seconds)
		var crossFadeDuration = 3;
		
		// Specify the image files
		var Pic = new Array(); // don't touch this
		<?php
  		$i = 0;
  		$j = 0;
  		while ($i<count($this->_gallery->_images)) {
  			$this->_gallery->_images[$i]->getInfo();
  			if ($this->isImage($this->_gallery->_images[$i]->_type) && $this->_gallery->_images[$i]->isMember()) {
				echo "Pic[$i] = '".$mosConfig_live_site."/".$this->_CONFIG['imagepath'].$this->_gallery->_dir."/".$this->_gallery->_images[$i]->_viewsize."';\n\t\t";
  			}
			if ($i == $key) {
	  			$j = $i;
			}
  		    $i++;
  		}
		?>
		
		var t;
		var j = <?php echo "$j\n" ?>;
		var keyPic = '<?php echo $mosConfig_live_site."/".$this->_CONFIG['imagepath'].$this->_gallery->_dir."/".$this->_gallery->_images[$key]->_viewsize."'\n";?>;
		var p = Pic.length;
		var pos = j;
		var preLoad = new Array();
		
		function preLoadPic(index){
  			if (Pic[index] != ''){
				window.status='Loading : '+Pic[index];
				preLoad[index] = new Image();
				preLoad[index].src = Pic[index];
				Pic[index] = '';
				window.status='';
  			}
		}
		
		function runSlideShow(){
	  		if (stopstatus != '1'){
				for (var i = 0; i < document.images.length; i++) {
				    if (document.images[i].src.indexOf('<?php echo $this->_gallery->_dir; ?>') >= 0) {
        				document.images[i].src = preLoad[j].src;
                        new Effect.Appear(document.images[i], {duration:1.0});
				    }
				}
				pos = j;
				j = j + 1;
				if (j > (p-1)) j=0;
				t = setTimeout('runSlideShow()', slideShowSpeed);
				preLoadPic(j);
  			}
		}
		
		function startSlideShow() {
		    stopstatus = 0;
		    Element.hide($('details'));
		    runSlideShow();
		}

		function endSlideShow(){
  			stopstatus = 1;
  			for (var i = 0; i < document.images.length; i++) {
			    if (document.images[i].src.indexOf('<?php echo $this->_gallery->_dir; ?>') >= 0) {
    				document.images[i].src = keyPic;
			    }
			}
			Element.show($('details'));
		}

		preLoadPic(j);
		
		</script>
		<?php
	}
	/**
	* @return void
	* @param string $formname
	* @desc Create a script that submits a given form and reloads the page as well.
	* @access public
	*/
	function createSubmitScript($formname) {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		function reloadPage() {
			document.<?php echo $formname;?>.submit();
			return false;
		}
		// -->
		</script>
		<?php
	}
	/**
	* @return void
	* @desc Create a script which can check/ uncheck all the checkboxes with the same name in a form.
	* @access public
	*/
	function createCheckAllScript() {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		function checkUncheckAll(oCheckbox, sName)
			{
			var el, i = 0, bWhich = oCheckbox.checked, oForm = oCheckbox.form;
			while (el = oForm[i++]) 
				if (el.type == 'checkbox' && el.name == sName) el.checked = bWhich;
			}
		// -->
		</script>
		<?php
	}
	/**
	* @return void
	* @desc Create a script that can toggle the state of a form element.
	* @access public
	*/
	function createFormControlScript() {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		var disabled = false;
		
		function disable(theForm ,elmnt) {
			document.forms[theForm].elements[elmnt].disabled = true;
			disabled = true;
		}
		function enable(elmnt) {
			document.forms[theForm].elements[elmnt].disabled = false;
			disabled = false;
		}
		function toggleDisabled(elmnt) {
			if (disabled == true) {
				enable(elmnt);
			} else {
				disable(elmnt);
			}
		}
		// -->
		</script>
		<?php
	}
	/**
	* @return void
	* @param string $status
	* @desc Create a floating box which will inform the user of what zOOm is doing at a given time/ status.
	* @access public
	*/
	function createProgressScript($status) {
		global $mosConfig_live_site;
		$animation = "$mosConfig_live_site/components/com_zoom/www/images/progress.gif";
		$display = "hidden";
		switch ($status) {
			case 'upload':
				$img_from = "$mosConfig_live_site/components/com_zoom/www/images/folder_small.gif";
				$img_to = "$mosConfig_live_site/components/com_zoom/www/images/web.gif";
				break;
			case 'delete':
				$img_from = "$mosConfig_live_site/components/com_zoom/www/images/web.gif";
				$img_to = "$mosConfig_live_site/components/com_zoom/www/images/trash.gif";
				$display = "visible";
				break;
			case 'search':
				$img_from = "$mosConfig_live_site/components/com_zoom/www/images/spacer.gif";
				$img_to = "$mosConfig_live_site/components/com_zoom/www/images/spacer.gif";
				$animation = "$mosConfig_live_site/components/com_zoom/www/images/progress_search.gif";
				break;
			default:
				$img_from = "$mosConfig_live_site/components/com_zoom/www/images/folder_small.gif";
				$img_to = "$mosConfig_live_site/components/com_zoom/www/images/web.gif";
				break;
		}
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		isIE=document.all;
		isNN=!document.all&&document.getElementById;
		isN4=document.layers;
		isHot=false;
		
		function ddInit(e){
		  topDog=isIE ? "BODY" : "HTML";
		  whichDog=isIE ? document.all.progress : document.getElementById("progress");  
		  hotDog=isIE ? event.srcElement : e.target;  
		  while (hotDog.id!="titleBar"&&hotDog.tagName!=topDog){
		    hotDog=isIE ? hotDog.parentElement : hotDog.parentNode;
		  }  
		  if (hotDog.id=="titleBar"){
		    offsetx=isIE ? event.clientX : e.clientX;
		    offsety=isIE ? event.clientY : e.clientY;
		    nowX=parseInt(whichDog.style.left);
		    nowY=parseInt(whichDog.style.top);
		    ddEnabled=true;
		    document.onmousemove=dd;
		  }
		}
		
		function dd(e){
		  if (!ddEnabled) return;
		  whichDog.style.left=isIE ? nowX+event.clientX-offsetx : nowX+e.clientX-offsetx; 
		  whichDog.style.top=isIE ? nowY+event.clientY-offsety : nowY+e.clientY-offsety;
		  return false;  
		}
		
		function ddN4(whatDog){
		  if (!isN4) return;
		  N4=eval(whatDog);
		  N4.captureEvents(Event.MOUSEDOWN|Event.MOUSEUP);
		  N4.onmousedown=function(e){
		    N4.captureEvents(Event.MOUSEMOVE);
		    N4x=e.x;
		    N4y=e.y;
		  }
		  N4.onmousemove=function(e){
		    if (isHot){
		      N4.moveBy(e.x-N4x,e.y-N4y);
		      return false;
		    }
		  }
		  N4.onmouseup=function(){
		    N4.releaseEvents(Event.MOUSEMOVE);
		  }
		}
		
		function hideMe(){
		  if (isIE||isNN) whichDog.style.visibility="hidden";
		  else if (isN4) document.progress.visibility="hide";
		}
		
		function showMe(){
		  if (isIE||isNN) whichDog.style.visibility="visible";
		  else if (isN4) document.progress.visibility="show";
		}
		
		document.onmousedown=ddInit;
		document.onmouseup=Function("ddEnabled=false");
		// -->
		</script>
		<style type="text/css" media="screen">
		<!--
		#progress     { 
		 background-color: #fff;
		 visibility: <?php echo $display;?>;
		 z-index: 1000;
		 margin-top: -30px;
		 margin-left: -190px;
		 padding: 2px;
		 position: absolute;
		 top: 50%;
		 left: 50%;
		 width: 380px;
		 height: 60px;
		 border: solid 3px #666 }
		body>#content { 
		 margin-left:-200px;
		 margin-top:-40px; 
		}
		-->
		</style>
		<div id="progress">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="right"><img src="<?php echo $img_from;?>" border="0" /></td>
			<td align="center"><img src="<?php echo $animation;?>" border="0" /></td>
			<td align="left"><img src="<?php echo $img_to;?>" border="0" /></td>
		</tr>
		<tr>
			<td align="center" valign="middle" colspan="3">
			<p><?php echo _ZOOM_PROGRESS_DESCR;?></p>	
			</td>
		</tr>
		</table>
		</div>
		<?php
	}
	/**
	* @return void
	* @desc Show the progress DIV (createProgressScript() needs to be executed in advance for this function to work).
	* @access public
	*/
	function showProgress() {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		showMe();
		// -->
		</script>
		<?php
	}
	/**
	* @return void
	* @desc Hide the progress DIV (createProgressScript() needs to be executed in advance for this function to work).
	* @access public
	*/
	function hideProgress() {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		hideMe();
		// -->
		</script>
		<?php
	}
	/**
	* @return string
	* @param string $caption
	* @param int $width
	* @desc Create a block that will contain descriptive data of a medium. The layout is similar to the WinXP/ Longhorn blocks.
	* @access public
	*/
	function createViewBlock($caption) {
		global $mosConfig_live_site;
		
		$prefix = $this->_get_rand_id(4); //create a unique prefix for each block...
		
		$html = ("\t<div class=\"blockContainer\" id=\"".$prefix."Container\">\n"
		 . "\t\t<div class=\"blockHeader\" id=\"".$prefix."Header\" onMouseOver=\"Scriptaculous.changeArrow('".$prefix."','white', '".$mosConfig_live_site."');\" onMouseOut=\"Scriptaculous.changeArrow('".$prefix."','grey', '".$mosConfig_live_site."');\"");
		if ($this->_CONFIG['animate_box']) {
			$html .= " onclick=\"Scriptaculous.slide('".$prefix."', '".$mosConfig_live_site."');\">\n";
		} else {
		    $html .= " onclick=\"Scriptaculous.toggleDisplay('".$prefix."', '".$mosConfig_live_site."');\">\n";
		}
		$html .= ("\t\t\t<a href=\"javascript:void(0);\" class=\"blockHeader\">\n"
		 . "\t\t\t<img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/blocks/arrow_up_grey.png\" border=\"0\" align=\"right\" name=\"".$prefix."Image\" id=\"".$prefix."Image\" />".$caption."</a>\n"
		 . "\t\t</div>\n"
		 . "\t<div class=\"blockBody\" id=\"".$prefix."Body\">\n");
		return array('prefix' => $prefix, 'html' => $html);
	}
	/**
	* @return html
	* @desc Generate the closing tags of the ViewBlock.
	* @see zoom::createViewBlock()
	* @access public
	*/
	function finishViewBlock($def_state, $prefix) {
	    global $mosConfig_live_site;
	    $html = ("\t</div></div><br />\n");
	    if ($def_state == 0) {
	        $html .= ("<script language=\"javascript\" type=\"text/javascript\">\n");
	    	if ($this->_CONFIG['animate_box']) {
	    		$html .= ("Scriptaculous.slide('".$prefix."', '".$mosConfig_live_site."');");
	    	} else {
	    	    $html .= ("Scriptaculous.toggleDisplay('".$prefix."', '".$mosConfig_live_site."');");
	    	}
	    	$html .= ("Scriptaculous.changeArrow('".$prefix."', 'white', '".$mosConfig_live_site."');</script>\n");
	    }
	    return $html;
	}
	/**
	* @return string
	* @param int $length
	* @desc Generate a random prefix for the viewBlock layer.
	* @see zoom::createViewBlock()
	* @access private
	*/
	function _get_rand_id($length)
	{
		if ($length>0) { 
			$rand_id="";
			for ($i=1; $i<=$length; $i++) {
				mt_srand((double)microtime() * 1000000);
				$num = mt_rand(1,36);
				$rand_id .= $this->_assign_rand_value($num);
			}
		}
		return $rand_id;
	}
	/**
	* @return void
	* @param int $num
	* @desc Turn a integer value into a #random# string.
	* @see zoom::_get_rand_id()
	* @access public
	*/
	function _assign_rand_value($num)
	{
		switch ($num) {
			case "1":
			 $rand_value = "a";
			break;
			case "2":
			 $rand_value = "b";
			break;
			case "3":
			 $rand_value = "c";
			break;
			case "4":
			 $rand_value = "d";
			break;
			case "5":
			 $rand_value = "e";
			break;
			case "6":
			 $rand_value = "f";
			break;
			case "7":
			 $rand_value = "g";
			break;
			case "8":
			 $rand_value = "h";
			break;
			case "9":
			 $rand_value = "i";
			break;
			case "10":
			 $rand_value = "j";
			break;
			case "11":
			 $rand_value = "k";
			break;
			case "12":
			 $rand_value = "l";
			break;
			case "13":
			 $rand_value = "m";
			break;
			case "14":
			 $rand_value = "n";
			break;
			case "15":
			 $rand_value = "o";
			break;
			case "16":
			 $rand_value = "p";
			break;
			case "17":
			 $rand_value = "q";
			break;
			case "18":
			 $rand_value = "r";
			break;
			case "19":
			 $rand_value = "s";
			break;
			case "20":
			 $rand_value = "t";
			break;
			case "21":
			 $rand_value = "u";
			break;
			case "22":
			 $rand_value = "v";
			break;
			case "23":
			 $rand_value = "w";
			break;
			case "24":
			 $rand_value = "x";
			break;
			case "25":
			 $rand_value = "y";
			break;
			case "26":
			 $rand_value = "z";
			break;
			case "27":
			 $rand_value = "0";
			break;
			case "28":
			 $rand_value = "1";
			break;
			case "29":
			 $rand_value = "2";
			break;
			case "30":
			 $rand_value = "3";
			break;
			case "31":
			 $rand_value = "4";
			break;
			case "32":
			 $rand_value = "5";
			break;
			case "33":
			 $rand_value = "6";
			break;
			case "34":
			 $rand_value = "7";
			break;
			case "35":
			 $rand_value = "8";
			break;
			case "36":
			 $rand_value = "9";
			break;
		}
		return $rand_value;
	}
	/**
	* @return void
	* @desc Create the footer which appears at the bottom of every Admin/ User System page.
	* @access public
	*/
	function adminFooter() {
		?>
		<p align="center">
			<b>zOOm Media Gallery <?php echo $this->_CONFIG['version'];?></b><br />Copyright &copy; 2003 - 2005 by Mike de Boer.
			<br />&copy; FOOOD's Icons. All rights reserved. COMMERCIAL! Visit him at <a href="http://foood.net" target="blank">Foood.net</a>
		</p>
		<?php
	}
	/**
	* @return string
	* @param string $sel_name
	* @param string $first_opt
	* @param int $onchange
	* @param int $sel
	* @param int $exclude
	* @desc Create a HTML dropdown form element which contains a list of galleries (ordered and indented).
	* @access public
	*/
	function createCatDropdown($sel_name = "catid", $first_opt, $onchange=0, $sel=0, $exclude=0) {
		if ($onchange==0) {
			$html = "<select name=\"$sel_name\" class=\"inputbox\">";
		} elseif ($onchange==1) {
			$html = "<select name=\"$sel_name\" class=\"inputbox\" onchange=\"reloadPage()\">";
		}
		$html .= $first_opt;
		// NOW, I'm going to offer the users infinite level of navigation and gallery-creation;
		// check the function 'getCatList()' for more info...code inspired by Coppermine.
		$this->_CAT_LIST = null;
		$this->_getCatList(0, ">&nbsp;", ">&nbsp;");
		if (isset($this->_CAT_LIST)) {
			foreach ($this->_CAT_LIST as $category) {
				if ($category['id'] != $exclude || $exclude == 0) {
					$html.= "<option value=\"".$category['id']."\"".($sel == $category['id'] ? " selected": "").">".$category['catname']."</option>\n";
				}
			}
		}
		return $html."</select>";
	}
	/**
	* @return string
	* @param string $sel_name
	* @param string $first_opt
	* @param int $onchange
	* @param string $sel
	* @desc Create a HTML dropdown form element which contains a list of ALL keywords.
	* @access public
	*/
	function createKeywordsDropdown($sel_name, $first_opt, $onchange=0, $sel="") {
		if ($onchange==0) {
			$html = "<select name=\"".$sel_name."\" class=\"inputbox\">\n";
		} elseif ($onchange==1) {
			$html = "<select name=\"".$sel_name."\" class=\"inputbox\" onchange=\"reloadPage()\">\n";
		}
		$html .= $first_opt;
		$keywords = $this->_getKeywordsList();
		if (isset($keywords)) {
			foreach ($keywords as $keyword) {
		 		$html.= "<option value=\"".$keyword."\">".$keyword."</option>\n";
			}
		}
		return $html."</select>\n";
	}
	/**
	* @return string
	* @desc Create the HTML body of the Gallery Manager.
	* @access public
	*/
	function createCatMgrFormbody() {
		// This function creates the table of catsmgr.php...it uses the 'virtpath'-column
		// of the internal CAT_LIST variable. Check the 'getCatList()' function for more details...
		global $Itemid, $mosConfig_live_site;
		$html = "";
		$this->_CAT_LIST = null;
		$this->_getCatList(0, '>&nbsp;', '>&nbsp;');
		$i = 0;
		$table_class = "";
		$header_class = " class=\"sectiontableheader\"";
		if ($this->_isBackend) {
			$table_class = " class=\"adminlist\"";
			$header_class = "";
			$this->_tabclass = array("row0", "row1");
		}
		$html .= ("\n\t<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\"$table_class>\n"
		 . "\t<tr$header_class>\n"
		 . "\t\t<th height=\"20\" width=\"50\">&nbsp;</th>\n"
		 . "\t\t<th align=\"left\">"._ZOOM_HD_NAME."</th>\n"
		 . "\t\t<th align=\"left\">"._ZOOM_PUBLISHED."</th>\n"
		 . "\t\t<th align=\"left\">"._ZOOM_SHARED."</th>\n"
		 . "\t\t<th align=\"left\">"._ZOOM_HD_CREATEDBY."</th>\n"
		 . "\t</tr>");
		if (isset($this->_CAT_LIST)) {
			foreach ($this->_CAT_LIST as $category) {
				$i++;
				$bgcolor = ($i & 1) ? $this->_tabclass[1] : $this->_tabclass[0];
				$edit_link = "javascript:void(0);";
				if ($this->privileges->hasPrivilege('priv_editgal') || $this->_isAdmin) {
					$edit_link = "index";
    				if ($this->_isBackend) {
    					$edit_link .= "2";
    				}
    				$edit_link .= ".php?option=com_zoom&page=catsmgr&task=edit&catid=".$category['id']."&Itemid=".$Itemid;
				}
		 		$html .= ("\n\t<tr class=\"".$bgcolor."\">\n"
		 		 . "\t\t<td><input type=\"checkbox\" name=\"catid[]\" value=\"".$category['id']."\" id=\"catno_$i\"></td>\n"
		 		 . "\t\t<td onmousedown=\"document.getElementById('catno_$i').checked = (document.getElementById('catno_$i').checked ? false : true);\"><a href=\"".$edit_link."\">".$category['virtpath']."</a></td>\n"
		 		 . "\t\t<td width=\"20\" align=\"center\" onmousedown=\"document.getElementById('catno_$i').checked = (document.getElementById('catno_$i').checked ? false : true);\"><a href=\"javascript:");
		 		if ($this->_isAdmin || $this->privileges->hasPrivilege('priv_editgal')) {
		 			$html .= "submitForm('publish', ".$category['id'].")";
		 		} else {
		 		    $html .= "void(0)";
		 		}
		 		$html .= (";\"><img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/");
		 		// special cells with published, shared and userid info...
		 		$html .= ($category['published']) ? "publish_g.png\" onmouseover=\"return overlib('"._ZOOM_UNPUBLISH."');\" onmouseout=\"return nd();\"" : "publish_x.png\" onmouseover=\"return overlib('"._ZOOM_PUBLISH."');\" onmouseout=\"return nd();\"";
		 		$html .= (" border=\"0\" /></a></td>\n"
		 		 . "\t\t<td width=\"20\" align=\"center\" onmousedown=\"document.getElementById('catno_$i').checked = (document.getElementById('catno_$i').checked ? false : true);\"><a href=\"javascript:");
		 		if ($this->_isAdmin || $this->privileges->hasPrivilege('priv_editgal')) {
		 			$html .= "submitForm('share', ".$category['id'].")";
		 		} else {
		 		    $html .= "void(0)";
		 		}
		 		$html .= (";\"><img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/");
		 		$html .= ($category['shared']) ? "share_u.png\" onmouseover=\"return overlib('"._ZOOM_UNSHARE."');\" onmouseout=\"return nd();\"" : "share_l.png\" onmouseover=\"return overlib('"._ZOOM_SHARE."');\" onmouseout=\"return nd();\"";
		 		$cat_user = $this->getUserInfo($category['uid']);
		 		$html .= (" border=\"0\" /></a></td>\n"
		 		 . "\t\t<td width=\"40\" align=\"center\" onmousedown=\"document.getElementById('catno_$i').checked = (document.getElementById('catno_$i').checked ? false : true);\">".$cat_user->username."</td>\n"
		 		 . "\t</tr>\n");
		 	}
		}
		$html .= ("\n\t<tr$header_class>"
		 . "\t\t<th height=\"20\" align=\"left\"><input type=\"checkbox\" name=\"checkall\" onclick=\"checkUncheckAll(this, 'catid[]');\" id=\"checkall\"></th>\n"
		 . "\t\t<th height=\"20\" colspan=\"4\" align=\"left\" onmousedown=\"document.getElementById('checkall').checked = (document.getElementById('checkall').checked ? false : true);checkUncheckAll(document.getElementById('checkall'), 'catid[]');\">\n"
		 . "\t\t\t<strong><label onclick=\"javascript: return (document.getElementById('checkall') ? false : true);checkUncheckAll(document.getElementById('checkall'), 'catid[]');\" for=\"checkall\">"._ZOOM_HD_CHECKALL."</label></strong>\n"
		 . "\t\t</th>\n"
		 . "\t</tr>\n"
		 . "\t</table>\n");
		return $html;
	}
	/**
	* @return string
	* @desc Create the HTML body of the Media Manager.
	* @access public
	*/
	function createMediaEditForm($option, $page, $Itemid, $catid, $backend) {
		global $mosConfig_live_site, $mosConfig_absolute_path;
		$this->createCheckAllScript();
		$i = 0;
		$this->_counter = 0;
		$table_class = "";
		$header_class = " class=\"sectiontableheader\"";
		if ($this->_isBackend) {
			$table_class = " class=\"adminlist\"";
			$header_class = "";
			$this->_tabclass = array("row0", "row1");
		}
		
		$i = 1;
    	$startRow = 0;
    	$PageSize = empty($_SESSION['zoom_mediapp']) ? 10 : $_SESSION['zoom_mediapp'];
    
    	//Set the page no
    	if (empty($_REQUEST['PageNo'])) {
    	    if ($startRow == 0) {
    	        $PageNo = $startRow + 1;
    	    }
    	} else {
    	    $PageNo = $_REQUEST['PageNo'];
    	    $startRow = ($PageNo - 1) * $PageSize;
    	}	
     	//Total of record
     	$RecordCount = $this->_gallery->getNumOfImages();//Number of files in gallery
    	$endRow = $startRow + $PageSize;
    	if ($endRow >= $RecordCount) {
    		$endRow = $RecordCount - 1;
    	}
     	//Set Maximum Page
     	$MaxPage = ceil($RecordCount % $PageSize);
     	if ($RecordCount % $PageSize == 0) {
        	$MaxPage = ceil($RecordCount / $PageSize);
     	} else {
        	$MaxPage = ceil($RecordCount / $PageSize);
     	}
     	//Set the counter start
    	$CounterStart = 1;
    	//Counter End
    	$CounterEnd = $MaxPage;
		?>
		<table width="80%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		    <td align="center" width="50%">
		        <div align="center">
		        <?php
                $c = 0;
                //Print Page No
                for ($c=$CounterStart; $c <= $CounterEnd; $c++) {
                    if($c < $MaxPage){
                        if ($c == $PageNo) {
                            if ($c % $RecordCount == 0) {
                                echo "<u><strong>$c</strong></u> ";
                            } else {
                                echo "<u><strong>$c</strong></u> | ";
                            }
                        } elseif ($c % $RecordCount == 0) {
                            echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> ";
                        } else {
                            echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> | ";
                        }//END IF
                    } else {
                        if ($PageNo == $MaxPage) {
                            echo "<u><strong>$c</strong></u> ";
                        } else {
                            echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> ";
                        }
                    }
                }
                echo $this->createMediaPPDropdown($PageSize);
		        ?>
		        </div>
		    </td>
			<td align="right">
				<div align="right">
				<?php if ($this->_isAdmin || $this->privileges->hasPrivilege('priv_upload')) { ?>
				  <a href="<?php echo "index".$backend.".php?option=com_zoom&page=upload&return=mediamgr&catid=".$catid."&Itemid=".$Itemid;?>" onmouseover="return overlib('<?php echo _ZOOM_UPLOAD;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/new.png" border="0" onmouseover="MM_swapImage('new','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/new_f2.png',1);" onmouseout="MM_swapImgRestore();" name="new"></a>
				<?php } if($this->_isAdmin || $this->privileges->hasPrivilege('priv_editmedium')) { ?>
	              <a href="javascript:submitForm('edit');" onmouseover="return overlib('<?php  echo _ZOOM_BUTTON_EDIT;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/edit.png" border="0" onmouseover="MM_swapImage('edit','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/edit_f2.png',1);" onmouseout="MM_swapImgRestore();" name="edit"></a>
	            <?php } if ($this->_isAdmin) { ?>
	              <a href="javascript:submitForm('move');" onmouseover="return overlib('<?php echo _ZOOM_MOVEFILES;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/move.png" border="0" onmouseover="MM_swapImage('movefiles','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/move_f2.png',1);" onmouseout="MM_swapImgRestore();" name="movefiles"></a>
	            <?php } if ($this->_isAdmin || $this->privileges->hasPrivilege('priv_delmedium')) { ?>
	              <a href="javascript:submitForm('delete');" onmouseover="return overlib('<?php echo _ZOOM_DELETE;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/delete.png" border="0" onmouseover="MM_swapImage('delete','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/delete_f2.png',1);" onmouseout="MM_swapImgRestore();" name="delete"></a>
	            <?php } ?>
	            </div>
			</td>
		</tr>
		</table>
		<form  name="mediamgr" action="index<?php echo ($this->_isBackend) ? "2" : ""; ?>.php?option=com_zoom&page=mediamgr&Itemid=<?php echo $Itemid;?>" method="POST">
	    <input type="hidden" name="task" value="" />
	    <input type="hidden" name="return" value="mediamgr" />
	    <input type="hidden" name="catid" value="<?php echo $this->_gallery->_id; ?>" />
	    <input type="hidden" name="mediapp" value="" />
		<table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center">
				<div align="center">
		<?php
		echo ("\t\t\t<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"100%\"$table_class>\n"
		 . "\t\t\t<tr$header_class>\n"
		 . "\t\t\t\t<th width=\"50\">&nbsp;</th>\n"
		 . "\t\t\t\t<th align=\"left\">"._ZOOM_NAME."</th>\n"
		 . "\t\t\t\t<th align=\"left\">"._ZOOM_FILENAME."</th>\n"
		 . "\t\t\t\t<th align=\"left\">"._ZOOM_HD_PREVIEW."</th>\n"
		 . "\t\t\t</tr>\n");
        if (($this->privileges->hasPrivilege('priv_editmedium') | $this->privileges->hasPrivilege('priv_delmedium')) || $this->_isAdmin) {
            for ($counter = $startRow; $counter <= $endRow; $counter++) {
                $image = $this->_gallery->_images[$counter];
                $i++;
                $image->getInfo();
                $bgcolor = ($i & 1) ? $this->_tabclass[1] : $this->_tabclass[0];
                if ($this->_isAdmin || $this->privileges->hasPrivilege('priv_editmedium')) {
                	$edit_link = "index";
                	if ($this->_isBackend) {
                		$edit_link .= "2";
                	}
                	$edit_link .= ".php?option=com_zoom&page=mediamgr&task=edit&catid=".$image->_catid."&key=".$this->_counter."&Itemid=".$Itemid;
                } else {
                    $edit_link = "javascript:void(0);";
                }
                echo ("\t\t\t<tr class=\"".$bgcolor."\">\n"
                 . "\t\t\t\t<td align=\"center\" width=\"10\"><input type=\"checkbox\" name=\"keys[]\" value=\"".$this->_counter."\" id=\"mediumno_$i\"></td>\n"
                 . "\t\t\t\t<td onmousedown=\"document.getElementById('mediumno_$i').checked = (document.getElementById('mediumno_$i').checked ? false : true);\"><a href=\"".$edit_link."\">".$image->_name."</a><br /></td>\n"
                 . "\t\t\t\t<td onmousedown=\"document.getElementById('mediumno_$i').checked = (document.getElementById('mediumno_$i').checked ? false : true);\">".$image->_filename."<br />\n"
                 . "\t\t\t\t</td>\n"
                 . "\t\t\t\t<td onmousedown=\"document.getElementById('mediumno_$i').checked = (document.getElementById('mediumno_$i').checked ? false : true);\"><img src=\"".$image->_thumbnail."\" border=\"0\" /></td>\n"
                 . "\t\t\t</tr>\n");
                $this->_counter++;
            }
        }
		echo ("\t\t\t<tr$header_class>\n"
		 . "\t\t\t\t<th height=\"20\" align=\"center\" align=\"left\"><input type=\"checkbox\" name=\"checkall\" onclick=\"checkUncheckAll(this, 'keys[]');\" id=\"checkall\"></th>\n"
		 . "\t\t\t\t<th height=\"20\" align=\"left\" onmousedown=\"document.getElementById('checkall').checked = (document.getElementById('checkall').checked ? false : true);checkUncheckAll(document.getElementById('checkall'), 'keys[]');\">\n"
		 . "\t\t\t<strong><label onclick=\"javascript: return (document.getElementById('checkall') ? false : true);checkUncheckAll(document.getElementById('checkall'), 'keys[]');\" for=\"checkall\">"._ZOOM_HD_CHECKALL."</label></strong>\n"
		 . "\t\t\t\t</th>\n"
		 . "\t\t\t\t<th height=\"20\" align=\"center\">");
        $c = 0;
        //Print Page No
        for ($c=$CounterStart; $c <= $CounterEnd; $c++) {
            if($c < $MaxPage){
                if ($c == $PageNo) {
                    if ($c % $RecordCount == 0) {
                        echo "<u><strong>$c</strong></u> ";
                    } else {
                        echo "<u><strong>$c</strong></u> | ";
                    }
                } elseif ($c % $RecordCount == 0) {
                    echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> ";
                } else {
                    echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> | ";
                }//END IF
            } else {
                if ($PageNo == $MaxPage) {
                    echo "<u><strong>$c</strong></u> ";
                } else {
                    echo "<a href=\"index".$backend.".php?option=com_zoom&page=".$page."&Itemid=".$Itemid."&catid=$catid&PageNo=$c\"><strong>$c</strong></a> ";
                }
            }
        }
        echo $this->createMediaPPDropdown($PageSize);
		echo ("</th>\n"
		 . "\t\t\t\t<th height=\"20\" align=\"center\">&nbsp;</th>\n"
		 . "\t\t\t</tr>\n"
		 . "\t\t\t</table>\n"
		 . "\t\t\t</div>"
		 . "\t\t</td>"
		 . "\t</tr>"
		 . "\t</table>"
		 . "\t</form>"
		 . "\t</center>");
		 
	}
	/**
	*
	*/
	function createMediaPPDropdown($crt_no) {
	    $html = "<select name=\"media_pp\" class=\"inputbox\" onchange=\"submitForm('mediapp', this.value)\">\n";
	    $values = array(5, 10, 25, 50, 100);
	    foreach ($values as $value) {
	    	$html .= "<option value=\"$value\"".(($value == $crt_no) ? " selected" : "").">$value</option>";
	    }
	    return $html;
	}
	/**
	* @return void
	* @param array $imagelist
	* @param string $extractloc
	* @desc Create a HTML table filled with media found by the 'scan' feature OR the zip-upload.
	* @access public
	*/
	function createFileList(&$imagelist, $extractloc = "") {
		global $mosConfig_live_site, $mosConfig_absolute_path;
		$this->createCheckAllScript();
		$tabcnt = 0;
		$this->_counter = 0;
		$i = 0;
		$header_class = " class=\"sectiontableheader\"";
		if ($this->_isBackend) {
			$table_class = " class=\"adminlist\"";
			$header_class = "";
			$this->_tabclass = array("row0", "row1");
		}
		echo ("<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"95%\">\n"
		 . "\t\t\t<tr$header_class>\n"
		 . "\t\t\t\t<td width=\"50\" class=\"sectiontableheader\">&nbsp;</td>\n"
		 . "\t\t\t\t<td class=\"sectiontableheader\">"._ZOOM_FILENAME."</td>\n"
		 . "\t\t\t\t<td class=\"sectiontableheader\">"._ZOOM_HD_PREVIEW."</td>\n"
		 . "\t\t\t</tr>\n");
		foreach ($imagelist as $image) {
			$i++;
			$bgcolor = ($i & 1) ? $this->_tabclass[1] : $this->_tabclass[0];
			$tag = ereg_replace(".*\.([^\.]*)$", "\\1", $image);
			if ($this->isImage($tag)) {
				if (!$this->platform->is_file($image)) {
					$image_path = $mosConfig_absolute_path."/".$extractloc."/".$image;
					$image_virt = $mosConfig_live_site."/".$extractloc."/".$image;
					$imginfo = $this->platform->getimagesize($image_path);
					$ratio = max($imginfo[0], $imginfo[1]) / $this->_CONFIG['size'];
					$ratio = max($ratio, 1.0);
					$imgWidth = (int)($imginfo[0] / $ratio);
					$imgHeight = (int)($imginfo[1] / $ratio);
				} else {
					$image_path = $image;
					$image_virt = $image_path;
					$imginfo = $this->platform->getimagesize($image_virt);
					$ratio = max($imginfo[0], $imginfo[1]) / $this->_CONFIG['size'];
					$ratio = max($ratio, 1.0);
					$imgWidth = (int)($imginfo[0] / $ratio);
					$imgHeight = (int)($imginfo[1] / $ratio);
				}
			} elseif ($this->isAudio($tag)) {
				$image_virt = $mosConfig_live_site."/components/com_zoom/www/images/filetypes/audio.png";
				$imgWidth = $imgHeight = 64;
			} elseif ($this->isDocument($tag)) {
				$image_virt = $mosConfig_live_site."/components/com_zoom/www/images/filetypes/document.png";
				$imgWidth = $imgHeight = 64;
			} elseif ($this->is) {
				$image_virt = $mosConfig_live_site."/components/com_zoom/www/images/filetypes/document.png";
				$imgWidth = $imgHeight = 64;
			} elseif ($this->isMovie($tag)) {
				$image_virt = $mosConfig_live_site."/components/com_zoom/www/images/filetypes/video.png";
				$imgWidth = $imgHeight = 64;
			}
			echo ("\t\t\t<tr class=\"".$bgcolor."\">\n"
			 . "\t\t\t\t<td align=\"center\" width=\"10\"><input type=\"checkbox\" name=\"scannedimg[]\" value=\"".$this->_counter."\" id=\"mediumno_$i\" checked></td>\n"
			 . "\t\t\t\t<td width=\"100%\" onmousedown=\"document.getElementById('mediumno_$i').checked = (document.getElementById('mediumno_$i').checked ? false : true);\">".$image."<br />\n");
			if ($this->isImage($tag)) {
				echo ("\t\t\t\t\t<input type=\"checkbox\" name=\"rotate[]\" value=\"1\">"._ZOOM_ROTATE."&nbsp;\n"
				 . "\t\t\t\t\t<input type=\"radio\" name=\"rotate".$this->_counter."\" value=\"90\">"._ZOOM_CLOCKWISE."\n"
				 . "\t\t\t\t\t<input type=\"radio\" name=\"rotate".$this->_counter."\" value=\"-90\">"._ZOOM_CCLOCKWISE."\n"
				 . "\t\t\t\t</td>\n");
			} else {
				echo ("\t\t\t\t</td>\n");
			}
			echo ("\t\t\t\t<td><img src=\"".$image_virt."\" border=\"0\" width=\"".$imgWidth."\" height=\"".$imgHeight."\"></td>\n"
			 . "\t\t\t</tr>\n");
			$tabcnt++ ;
			$this->_counter++;
		}
		echo ("\t\t\t<tr$header_class>\n"
		 . "\t\t\t\t<th height=\"20\" align=\"center\" align=\"left\"><input type=\"checkbox\" name=\"checkall\" onclick=\"checkUncheckAll(this, 'keys[]');\" id=\"checkall\" checked></th>\n"
		 . "\t\t\t\t<th height=\"20\" colspan=\"20\" align=\"left\" onmousedown=\"document.getElementById('checkall').checked = (document.getElementById('checkall').checked ? false : true);checkUncheckAll(document.getElementById('checkall'), 'scannedimg[]');\">\n"
		 . "\t\t\t<strong><label onclick=\"javascript: return (document.getElementById('checkall') ? false : true);checkUncheckAll(document.getElementById('checkall'), 'scannedimg[]');\" for=\"checkall\">"._ZOOM_HD_CHECKALL."</label></strong>\n"
		 . "\t\t\t\t</th>\n"
		 . "\t\t\t</tr>\n"
		 . "\t\t\t</table>\n");
	}
	//--------------------END content-creation functions-------------------//
}
