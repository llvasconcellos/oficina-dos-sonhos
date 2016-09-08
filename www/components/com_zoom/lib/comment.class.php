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
| Filename: comment.class.php                                         |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * Comment class; creates an instance of a comment and has helper-functions for smilies
 * support.
 *
 * @access public
 */
class comment extends image {
	/**
	 * @var int
	 * @access private
	 */
	var $_id = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_name = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_comment = null;
	/**
	 * @var datetime
	 * @access private
	 */
	var $_date = null;
	
	/**
	 * Comment object constructor
	 *
	 * @param int $comment_id
	 * @return comment
	 * @access public
	 */
	function comment($comment_id) {
		$this->_id = $comment_id;
		$this->_getInfo();
	}
	/**
	 * Retrieves data from the 'mos_zoom_comments' table and assigns it to
	 * the class variables...
	 *
	 * @return boolean
	 * @access private
	 */
	function _getInfo() {
		global $database;
		$database->setQuery("SELECT cmtcontent, date_format(cmtdate, '%d-%m-%y') AS date, cmtname FROM #__zoom_comments WHERE cmtid=".mysql_escape_string($this->_id));
		$this->_result = $database->query();
		if (mysql_num_rows($this->_result)) {
				while($row = mysql_fetch_object($this->_result)){
				$this->_name = stripslashes($row->cmtname);
				$this->_comment = stripslashes($row->cmtcontent);
				$this->_date = $row->date;
			}
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Replace phpBB smilies-code with relatively located images
	 *
	 * @param string $message
	 * @param string $url_prefix
	 * @param array $smilies
	 * @return string
	 * @access private
	 */
	function _processSmilies($message, $url_prefix='', $smilies) { 
		global $orig, $repl; 
		if (!isset($orig)) { 
			$orig = $repl = array(); 
			for($i = 0; $i < count($smilies); $i++) { 
				$orig[] = "/(?<=.\W|\W.|^\W)" . preg_quote($smilies[$i][0], "/") . "(?=.\W|\W.|\W$)/"; 
				$repl[] = '<img src="'. $url_prefix .'images/smilies' . '/' . ($smilies[$i][1]) . '" alt="' . ($smilies[$i][2]) . '" border="0" />'; 
			} 
		}
		if (count($orig)) { 
			$message = preg_replace($orig, $repl, ' ' . $message . ' '); 
			$message = substr($message, 1, -1); 
		} 
		return $message; 
	}
	/**
	 * Get the the name of the 'commentator'.
	 *
	 * @return string
	 * @access public
	 */
	function getName() {
		return $this->_name;
	}
	/**
	 * Get the formatted comment itself.
	 *
	 * @param string $dir_prefix
	 * @return string
	 * @access public
	 */
	function getComment($dir_prefix = "") {
		global $zoom;
		$smilies = $this->_getSmiliesTable();
		return $this->_processSmilies( $this->_comment, $dir_prefix, $smilies );
	}
	/**
	 * Get the date of a comment (of when it was submitted).
	 *
	 * @return datetime
	 * @access public
	 */
	function getDate() {
		return $this->_date;
	}
	/**
	 * Get the id of a comment.
	 *
	 * @return int
	 * @access public
	 */
	function getId() {
		return $this->_id;
	}
}