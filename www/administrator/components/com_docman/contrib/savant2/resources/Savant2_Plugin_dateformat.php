<?php

/**
* 
* Outputs a formatted date using strftime() conventions.
* 
* $Id: Savant2_Plugin_dateformat.php,v 1.2 2005/04/12 19:34:49 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_dateformat extends Savant2_Plugin {
	
	/**
	* 
	* The default strftime() format string to use for dates.
	* 
	* You can preset the default format string via Savant::loadPlugin().
	* 
	* $conf = array(
	*     'format' => '%Y-%m-%d %H:%M:%S'
	* );
	* 
	* $Savant->loadPlugin('dateformat', $conf);
	* 
	* ... and in your template, to use the default format string:
	* 
	*     $this->plugin('date', $datestring);
	* 
	* ... or, to use a custom string at call-time:
	* 
	*     $this->plugin('date', $datestring, '%b');
	* 
	* @access public
	* 
	* @var string
	* 
	*/
	
	var $format = '%c';
	
	
	/**
	* 
	* The default strftime() format string to use for dates.
	* 
	* You can preset the custom format strings via Savant::loadPlugin().
	* 
	* $conf = array(
	*     'custom' => array(
	*         'mydate' => '%Y-%m-%d',
	*         'mytime' => '%R'
	*     )
	* );
	* 
	* $Savant->loadPlugin('dateformat', $conf);
	* 
	* ... and in your template, to use a preset custom string by name:
	* 
	*     $this->plugin('date', $datestring, 'mydate');
	* 
	* @access public
	* 
	* @var array
	* 
	*/
	
	var $custom = array(
		'date' => '%Y-%m-%d',
		'time' => '%H:%M:%S'
	);
	
	
	/**
	* 
	* Outputs a formatted date using strftime() conventions.
	* 
	* @access public
	* 
	* @param string $datestring Any date-time string suitable for
	* strtotime().
	* 
	* @param string $format The strftime() formatting string, or a named
	* custom string key from $this->custom.
	* 
	* @return string
	* 
	*/
	
	function plugin($datestring, $format = null)
	{
		settype($format, 'string');
		
		// does the format string have a % sign in it?
		if (strpos($format, '%') === false) {
			// no, look for a custom format string
			if (isset($this->custom[$format])) {
				// found a custom format string
				$format = $this->custom[$format];
			} else {
				// did not find the custom format, revert to default
				$format = $this->format;
			}
		}
		
		// convert the date string to the specified format
		if (trim($datestring != '')) {
			return strftime($format, strtotime($datestring));
		} else {
			// no datestring, return VOID
			return;
		}
	}

}
?>