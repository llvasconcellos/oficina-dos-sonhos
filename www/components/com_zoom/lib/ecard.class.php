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
| Filename: ecard.class.php                                           |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * Ecard class; creates an instance of an ecard and contains functions for
 * ecard registration and sending.
 *
 * @access public
 */
class ecard extends image {
	/**
	 * @var datetime
	 * @access private
	 */
	var $_id = null;
	/**
	 * @var image
	 * @access private
	 */
	var $_image = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_to_name = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_from_name = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_to_email = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_from_email = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_message = null;
	/**
	 * @var datetime
	 * @access private
	 */
	var $_end_date = null;
	/**
	 * @var string
	 * @access private
	 */
	var $_user_ip = null;
	//--------------------Default Constructor of the ecard-class------------//
	/**
	 * Ecard object constructor
	 *
	 * @param int $id
	 * @return ecard
	 * @access public
	 */
	function ecard($id = 0) {
		$this->_user_ip = getenv('REMOTE_ADDR');
		if($id == 0) {
			$this->_id = date("U").rand(100, 500);
		} else {
			$this->_id = $id;
			$this->getInfo();
		}
	}
	/**
	 * Retrieves data from the 'mos_zoom_ecards' table and assigns it to
	 * the class variables...
	 *
	 * @return boolean
	 * @access public
	 */
	function getInfo() {
		global $database;
		$database->setQuery("SELECT * FROM #__zoom_ecards WHERE ecdid = ".mysql_escape_string($this->_id)." LIMIT 1");
		$result = $database->query();
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_object($result)){
				$this->_image = new image($row->imgid);
				$this->_to_name = $row->to_name;
				$this->_from_name = $row->from_name;
				$this->_to_email = $row->to_email;
				$this->_from_email = $row->from_email;
				$this->_message = $row->message;
				$this->_end_date = $row->end_date;
				$this->_user_ip = $row->user_ip;
			}
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Save a newly entered eCard into the database...
	 *
	 * @param int $imgid
	 * @param string $to_name
	 * @param string $from_name
	 * @param string $to_email
	 * @param string $from_email
	 * @param string $message
	 * @return boolean
	 * @access public
	 */
	function save($imgid, $to_name, $from_name, $to_email, $from_email, $message) {
		global $database, $zoom;
		$this->_image = $imgid;
		$this->_to_name = trim(mysql_escape_string($to_name));
		$this->_from_name = trim(mysql_escape_string($from_name));
		$this->_to_email = trim(mysql_escape_string($to_email));
		$this->_from_email = trim(mysql_escape_string($from_email));
		$this->_message = trim(mysql_escape_string($message));
		// construct the end-date for this eCard...
		$lifetime = $zoom->_CONFIG['ecards_lifetime'];
		$tempDate = date('Y-m-d');
		$date_arr = explode("-", $tempDate);
		if ($lifetime == 7 || $lifetime == 14) {
			// 7 means seven days, or a WEEK; 14 means fourteen days, or TWO WEEKS
			list( $date_arr[2], $date_arr[1], $date_arr[0] ) = $this->addDays( $date_arr[2], $date_arr[1], $date_arr[0], $lifetime );
		} elseif ($lifetime == 1 || $lifetime == 3) {
			// 1 means ONE MONTH; 3 means THREE MONTHS
			for($i = 1; $i <= $lifetime; $i++) {
				$date_arr[1]++;
				if(!checkdate($date_arr[1], $date_arr[2], $date_arr[0])){
					$date_arr[0]++; //add one year
					$date_arr[1] = 1; //set no. of months to one (new year!)
				}
			}
		} else {
			return false;
		}
		for ($i = 0; $i < count($date_arr); $i++) {
		    if (strlen($date_arr[$i]) == 1) {
		    	$date_arr[$i] = "0".$date_arr[$i];
		    }
		}
		ksort($date_arr);
		$this->_end_date = implode("-", $date_arr);
		$database->setQuery("INSERT INTO #__zoom_ecards "
		 . "SET ecdid='".$this->_id."',imgid='".$this->_image."', to_name='".$this->_to_name."',from_name='".$this->_from_name."',"
		 . "to_email='".$this->_to_email."',from_email='".$this->_from_email."',message='".$this->_message."',"
		 . "end_date='".$this->_end_date."', user_ip='".$this->_user_ip."'");
		 if ($database->query()) {
		 	return true;
		 } else {
		 	return false;
		 }
	}
	/**
	 * Send the ecard(-link) to the friend the user entered.
	 *
	 * @return boolean
	 * @access public
	 */
	function send() {
		global $mosConfig_live_site, $mosConfig_host, $_SERVER;
		$messageUrl = sefRelToAbs($mosConfig_live_site."/index.php?option=com_zoom&Itemid=".$Itemid."&page=ecard&task=viewcard&ecdid=".$this->_id);
		$subject = _ZOOM_ECARD_SUBJ." ".$this->_from_name;
		
		$msg  = "$this->_to_name,\n\n";
		$msg .= $this->_from_name." "._ZOOM_ECARD_MSG1." ".$mosConfig_live_site."\n\n";
		$msg .= html_entity_decode(_ZOOM_ECARD_MSG2)."\n\n";
		$msg .= "URL: $messageUrl\n\n";
		$msg .= html_entity_decode(_ZOOM_ECARD_MSG3)."\n";
		$msg .= "\n\n\n\n\n";
		$msg .= "------------------------------------------------------------------------------------------------------------------\n";
		$msg .= "|  zOOm Media Gallery! - a multi-gallery component\n";
		$msg .= "|  copyright (C) 2004-2005 by Mike de Boer, http://www.zoomfactory.org\n";
		$msg .= "------------------------------------------------------------------------------------------------------------------";
		
		$from = $mosConfig_live_site;
		if (mosMail($this->_from_email, $this->_from_name, $this->_to_email, $subject, $msg)){
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Get the ecdid of an ecard.
	 *
	 * @return int
	 * @access public
	 */
	function getId() {
		return $this->_id;
	}
	/**
	 * Get the name of the sender OR receiver of an ecard.
	 *
	 * @param string $which
	 * @return string
	 * @access public
	 */
	function getName( $which = "to" ) {
		if ($which == "to") {
			return $this->_to_name;
		} elseif ($which == "from") {
			return $this->_from_name;
		}
	}
	/**
	 * Get the email address of the sender OR receiver of an ecard.
	 *
	 * @param string $which
	 * @return string
	 * @access public
	 */
	function getEmail( $which = "to" ) {
		if ($which == "to") {
			return $this->_to_email;
		} elseif ($which == "from") {
			return $this->_from_email;
		}
	}
	/**
	 * Get the message of an ecard.
	 *
	 * @return string
	 * @access public
	 */
	function getMessage() {
		return $this->_message;
	}
	/**
	* Add a number of days to a distant epoch to a give date.
	*
	* @param int $day in format DD
	* @param int $month in format MM
	* @param int $year in format CCYY
	* @param string format for returned date
	*/
	function addDays ( $day, $month, $year, $n ) {
		$days = $this->toDays($day, $month, $year);
		return $this->fromDays($days + $n);
	}
	/** 
	* Converts a date to number of days since a
	* distant unspecified epoch.
	*
	* !!Based on PEAR library function!!
	* @param int $day in format DD
	* @param int $month in format MM
	* @param int $year in format CCYY
	* @return integer number of days
	*/
	function toDays( $day=0, $month=0, $year=0) {
		if (!$day) {
			$day = intval( date( "d" ) );
		}
		if (!$month) {
			$month = intval( date( "m" ) );
		}
		if (!$year) {
			$year = intval( date( "Y" ) );
		}
	
		$century = floor( $year / 100 );
	    $year = $year % 100;
	
	    if($month > 2) {
	        $month -= 3;
	    } else {
	        $month += 9;
	        if ($year) {
	            $year--;
	        } else {
	            $year = 99;
	            $century --;
	        }
	    }
	    
	    return ( floor( (146097 * $century) / 4 ) +
	        floor( (1461 * $year) / 4 ) +
	        floor( (153 * $month + 2) / 5 ) +
	        $day + 1721119);
	}
	/**
	* Converts number of days to a distant unspecified epoch.
	*
	* !!Based on PEAR library function!!
	* @param int $days number of days
	* @param string format for returned date
	*/
	function fromDays( $days ) {
	    $days -= 1721119;
	    $century = floor( ( 4 * $days - 1) /  146097 );
	    $days = floor( 4 * $days - 1 - 146097 * $century );
	    $day = floor( $days /  4 );
	
	    $year = floor( ( 4 * $day +  3) /  1461 );
	    $day = floor( 4 * $day +  3 -  1461 * $year );
	    $day = floor( ($day +  4) /  4 );
	
	    $month = floor( ( 5 * $day -  3) /  153 );
	    $day = floor( 5 * $day -  3 -  153 * $month );
	    $day = floor( ($day +  5) /  5 );
	
	    if ($month < 10) {
	        $month +=3;
	    } else {
	        $month -=9;
	        if ($year++ == 99) {
	            $year = 0;
	            $century++;
	        }
	    }
	
		return array( $day, $month, ($century*100 + $year) );
	}
}
?>