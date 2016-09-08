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
| Filename: lightbox.class.php                                        |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * Lightbox class; creates an instance of a lightbox.
 *
 * @access public
 */
class lightbox extends zoom{
	/**
	 * @var string
	 * @access private
	 */
	var $_session_id = null;
	/**
	 * @var array
	 * @access public
	 */
	var $_items = array();
	/**
	 * @var string
	 * @access private
	 */
	var $_file = null;
	
	/**
	 * Lighbox object constructor
	 *
	 * @return lightbox
	 * @access public
	 */
	function lightbox() {
		$this->_session_id = SID;
		$this->_file = 'media/'.uniqid('lightbox_').'.zip';
	}
	/**
	 * Add a new item (image OR gallery) to the lightbox object.
	 *
	 * @param int $object_id
	 * @param int $type
	 * @param int $qty
	 * @return boolean
	 * @access public
	 */
	function addItem($object_id, $type, $qty = 1) {
		$curr_id = $this->getNoOfItems();
		$this->_items[$curr_id] = new lightbox_item($object_id, $type, $qty);
		return true;
	}
	/**
	 * Remove an existing item from the lightbox object.
	 *
	 * @param int $id
	 * @return boolean
	 * @access public
	 */
	function removeItem($id) {
		unset($this->_items[$id]);
		$temp_array = array_values($this->_items);
		$this->_items = $temp_array;
		return true;
	}
	/**
	 * Update the data of a lightbox-item.
	 *
	 * @param int $id
	 * @param int $qty
	 * @return boolean
	 * @access public
	 */
	function editItem($id,$qty) {
		$this->_items[$id]->setQty($qty);
		return true;
	}
	/**
	 * Get the number of items in the lightbox.
	 *
	 * @return int
	 * @access public
	 */
	function getNoOfItems() {
		return sizeof($this->_items);
	}
	/**
	 * Create a ZIP-file containing all of the lightbox (media AND galleries).
	 *
	 * @return void
	 * @access public
	 */
	function createZipFile() {
		global $zoom, $mosConfig_live_site;
		// the idea is that the array of items is iterated through and images are added
		// to the filelist array automatically. Galleries, however, need to be parsed
		// individually!
		echo _ZOOM_LIGHTBOX_PARSEZIP;
			$filelist = array();
			foreach ($this->_items as $item) {
				if (isset($item->_image) || !empty($item->_image)) {
					// item has been identified as an image, so add it simply to the filelist...
					$item->_image->getInfo();
					$filelist[] = $zoom->_CONFIG['imagepath'].$item->_image->getDir().'/'.$item->_image->_filename;
				} else {
					// item has been identified as a gallery, so parse it for images an THEN
					// add those to the filelist...
					foreach ($item->_gallery->_images as $image) {
						$image->getInfo();
						$filelist[] = $zoom->_CONFIG['imagepath'].$item->_gallery->getDir().'/'.$image->_filename;
					}
				}
			}
			$remove_dir = $zoom->_CONFIG['imagepath'];
			echo '<b><font color="green">'._ZOOM_INFO_DONE.'</font></b><br />';
		echo _ZOOM_LIGHTBOX_DOZIP;
			if ($zoom->createArchive($filelist, $this->_file, $remove_dir)) {
				$zoom->EditMon->setEditMon(0, 'lightbox', $this->_file);
				echo '<b><font color="green">'._ZOOM_INFO_DONE.'</font></b><br />';
				echo _ZOOM_LIGHTBOX_DLHERE.': <a href="'.$this->_file.'"><img src="'.$mosConfig_live_site.'/components/com_zoom/www/images/save.png" border="0" /></a>';
			} else {
				echo '<b><font color="red">error!</font></b><br />';
			}
	}
}
/**
 * Lightbox_item class; creates an instance of a lightbox item.
 *
 * @access private
 */
class lightbox_item extends lightbox {
	/**
	 * @var int
	 * @access private
	 */
	var $_id = null;
	/**
	 * @var image
	 * @access private
	 */
	var $_image = null;
	/**
	 * @var gallery
	 * @access private
	 */
	var $_gallery = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_qty = null;
	
	/**
	 * Lightbox_item object constructor
	 *
	 * @param int $object_id
	 * @param int $type
	 * @param int $qty
	 * @return lightbox_item
	 * @access private
	 */
	function lightbox_item($object_id, $type, $qty = 1) {
		if ($type == 1) {
			$this->_image = new image($object_id);
		} elseif ($type == 2) {
			$this->_gallery = new gallery($object_id);
		}
		$this->_qty = $qty;		
	}
	/**
	 * Get the image from a lightbox item.
	 *
	 * @return image
	 * @access private
	 */
	function getImage() {
		return $this->_image;		
	}
	/**
	 * Get the gallery from a lightbox item.
	 *
	 * @return gallery
	 * @access private
	 */
	function getGallery() {
		return $this->_gallery;
	}
	/**
	 * Get the quantity of a lightbox item
	 *
	 * @return int
	 * @access private
	 */
	function getQty() {
		return $this->_qty;
	}
	/**
	 * Update the quantity of a lightbox item.
	 *
	 * @param int $qty
	 * @return void
	 * @access private
	 */
	function setQty($qty = 1) {
		$this->_qty = $qty;
	}
}
