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
| Filename: editmon.class.php                                         |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * EditMon class; the zOOm Edit Monitor, which keeps track of user actions like
 * commenting / rating of a medium, sending eCards and creating lightboxes.
 *
 * @access public
 */
class editmon extends zoom{
	/**
	 * @var int
	 * @access private
	 */
	var $_lifetime = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_session_id = null;
	/**
	 * Editmon object contructor.
	 *
	 * @return editmon
	 * @access public
	 */
	function editmon() {
		global $mosConfig_lifetime, $mainframe;
		$this->_lifetime = $mosConfig_lifetime;
		$this->_session_id = $mainframe->_session->session_id;
	}
	/**
	 * Register that a user has performed an action which may not be repeated
	 * (specified by the admin).
	 *
	 * @param int $id
	 * @param string $which
	 * @param string $filename
	 * @return boolean
	 * @access public
	 */
	function setEditMon($id, $which, $filename='') {
		global $database;
		$today = time() + intval($this->_lifetime);
		$sid = md5($this->_session_id);
		if (!$this->isEdited($id, $which, $filename)) {
			switch ($which){
				case 'comment':
					$database->setQuery("INSERT INTO #__zoom_editmon (user_session,comment_time,object_id) VALUES ('$sid','$today','".mysql_escape_string($id)."')");
					break;
				case 'vote':
					$database->setQuery("INSERT INTO #__zoom_editmon (user_session,vote_time,object_id) VALUES ('$sid','$today','".mysql_escape_string($id)."')");
					break;
				case 'pass':
					$database->setQuery("INSERT INTO #__zoom_editmon (user_session,pass_time,object_id) VALUES ('$sid','$today','".mysql_escape_string($id)."')");
					break;
				case 'lightbox':
					$database->setQuery("INSERT INTO #__zoom_editmon (user_session,lightbox_time,lightbox_file) VALUES ('$sid','$today','".mysql_escape_string($filename)."')");
					break;
			}
			if ($database->query()) {
				return true;
			} else {
				return false;
			}
		}
	}
	/**
	 * Delete rows of the 'mos_zoom_editmon' table which are out-of-date.
	 *
	 * @return void
	 * @access public
	 */
	function updateEditMon() {
		global $database;
		$now = time();
		// first, delete rows containing vote, commment and gallery-pass times...
		$database->setQuery("DELETE FROM #__zoom_editmon WHERE vote_time<'$now' OR comment_time<'$now' OR pass_time<'$now'");
		$database->query();
		// second, delete lightbox rows and files...
		$database->setQuery("SELECT lightbox_file FROM #__zoom_editmon WHERE lightbox_time<'$now'");
		$this->_result = $database->query();
		while ($lightbox = mysql_fetch_object($this->_result)) {
			@unlink($lightbox->lightbox_file);
			$database->setQuery("DELETE FROM #__zoom_editmon WHERE lightbox_time<'$now'");
			$database->query();
		}
	}
	/**
	 * Checks if a user has the right to edit a medium, or if he/ she already
	 * edited the medium before.
	 *
	 * @param int $id
	 * @param string $which
	 * @param string $filename
	 * @return boolean
	 * @access public
	 */
	function isEdited($id, $which, $filename='') {
		global $database;
		$now = time();
		$sid = md5($this->_session_id);
		switch ($which) {
			case 'comment':
				$database->setQuery("SELECT edtid FROM #__zoom_editmon WHERE user_session='$sid' AND comment_time>'$now' AND object_id=".mysql_escape_string($id));
				break;
			case 'vote';
				$database->setQuery("SELECT edtid FROM #__zoom_editmon WHERE user_session='$sid' AND vote_time>'$now' AND object_id=".mysql_escape_string($id));
				break;
			case 'pass':
				$database->setQuery("SELECT edtid FROM #__zoom_editmon WHERE user_session='$sid' AND pass_time>'$now' AND object_id=".mysql_escape_string($id));
				break;
			case 'lightbox':
				$database->setQuery("SELECT edtid FROM #__zoom_editmon WHERE user_session='$sid' AND lightbox_time>'$now' AND lightbox_file='".mysql_escape_string($filename)."'");
				break;
		}
		$this->_result = $database->query();
		if (mysql_num_rows($this->_result) > 0) {
			return true;
		}else{
			return false;
		}
	}
}