<?php
/**
* @version $Id $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software and parts of it may contain or be derived from the
* GNU General Public License or other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
 */
/**
 * plugin_googlemap2.php,v 2.12 2008/07/29 13:34:11
 * @copyright (C) Reumer.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
 /* ----------------------------------------------------------------
 * 2008-07-29 version 2.12: Improved by Mike Reumer
 * - use no javascript message of the language defined in Joomla.
 * - Changed proxy so local file are read local and also use file gets too
 * - Added domready instead of timeout, so in IE less problems with other modules
 * - Added multiple kml files
 * - Changed when to place marker and text
 /* ----------------------------------------------------------------
 * 2008-04-14 version 2.11: Improved by Mike Reumer
 * - The following new possibilties are added
 *   - Adsmanager
 *   - Local Search
 *   - Googlebar
 *   - Traffic overlay
 * - Added panoramio pictures
 * - Set caption and zoom for lightbox and keep the center of the map the same
 * - Extra parameters centerlat and centerlon for different center then map
 * - If encoding can't be detected it will not be converted. In geocoding function
 *   Warning: mb_convert_encoding() [function.mb-convert-encoding]: Illegal character encoding specified
 * - Added the scale option  
 * - Problem authorname disappeared
 *   - Removed & at getting language object: $lang = JFactory::getLanguage();
 * - Add new maptype Google Earth and improved version check function
 * - Send encoding always to google script. 1.5 has always utf-8. Also for geocoding!
 * - Added Gunload() for memory release.
 * - MSID parameter added for my maps from maps.google.com integrate easy.
 *   - make sure the ampersand in KMl url is correct & and not &amp;
 * - Extra check at encoding that domxml_open_mem is correct and doesn't provide a null object.
 *   - Also add configuration parameter for Joomla 1.0.x for setting site encoding default or UTF-8 for geocoding an address.
 * - Lightbox translation didn't work because configuration parameter was one line
 * - Remove www. before url because this isn't necessary in url of site 
 * - The parameters may be lower case or upper case.
 * - Added a second renderer for kml
 *   - Now sidebar is possible
 *   - for geoxml a roxy is required for outside domain access of kml-files.
 /* ----------------------------------------------------------------
 * 2007-09-24 version 2.10: Improved by Mike Reumer
 * - The kml is only positioned if no coordinates are entered.<br />
 *   - Removed condition text=''
 * - Made it possible to call the plugin as a module
 *   - The custumAddHeadtags doesn't work in modules!
 * - Removed notice when xml of gecode doesn't deliver coordinates
 *   - use of xpath and remove of xmlns attributes!
 * - Possible to use a effect on Map.
 *   - Get Mootools script
 *   - If effect then call mootool functions
 * - Possible to show the map in a lightbox/modalbox
 *   - Get Moodalbox hack script
 *   - Extra parameter to place button/link
 *   - Parameter for the text of button/link
 * - Clear debug text after replaceing mosmap tag
 * - Extra parameter to select a version of the plugin
 * - Possibility to use joomfish as language selector
 * - Extra parameter for url to a icon
 * - Solved problem that calling in hack other plugins that frontend 
 *   editor breaks
 * 	 - Add extra event onMap so only the Google Maps plugin is called
 * - Directory of plugin in J15 is different then J10x.
 * - Improved lightbox:
 *   - Beter close an reopen
 *   - Possible to make lightbox bigger
 * - The overview won't open correctly. New timer for opening overview
 * - htmlspecialchars_decode breaks other extensions 
 *   - Replace by correct implementatiom
 *   - Placed all functions and variables in a class to hide it from other programs
 * - A variable joomla_version wasn't defined correctly.
 * - Changed injectCustomHeadTags so Joomla 1.5 can add scripts in header
 *   - Added extra parameter for the bodytext.
 *   - Removed check for Joomla 1.5 so if header is already done the replace is possible
 * - Multiple domain based on PHP variable instead of Joomla because 1.5 doesn't have it.
 *   Now there is no configuration change necessary for Joomla.
 /* ----------------------------------------------------------------
 * 2007-09-22 version 2.9: Improved by Mike Reumer
 * - #6022: strip <br> etc out of address for geocoding.
 * - #6023: Center and zoom the map based on the kml-file
 *   - If coordinates are entered center and zoom the map based on these coordinates
 *   - If no coordinates are entered center and zoom the map based on the kml-file
 *   - moved KML-file actions from end to middle of code.
 * - #6024: Show direction form when no text
 *   - If dir=1 make always a infowindow with the directions form
 * - #6025: Polylines don't show in Opera.
 *   - Added lines: var _mSvgForced = true; var _mSvgEnabled = true; when browser is Opera!
 * - #6037: Labels of directions form couln't be changed.
 *   - Names of parameters didn't match.
 * - #6131: Solved problems with PHP5 and opening files and wrong coding of xml.
 * - #6470: Added debug mechanisme for debugging options.
 * - #6471: If server side geocoding fails do it at the client side.
 * - #6472: Only remove quotes that surround the content of a parameter and change double qoutes to single quotes in text
 *   So HTML is better resolved for generated bu EasyTube plugin and others.
 * - #6637: The direction form doesn't have a css-class.
 *   - Gave the direction form a class for css-styling.
 *   - Place the direction form within the first pair of div before the closing div
 * - #7055: The replacement of the mosmap code isn't done correctly step by step.
 *   - replace str_replace with preg_replace for 1 item.
 * - #7132: Placed kml-file also in overviewmap.
 *   - Created a second xml variable for the kml-file for the overview map.
 /* ----------------------------------------------------------------
 * 2007-03-24 version 2.8: Improved by Mike Reumer and Arjan Menger of WELLdotCOM (www.welldotcom.nl) with donation
 * - artf6173: wheel-mouse zooming
 *   - Problem with multiple maps solved by naming function unique.
 *   - Problem with scroll wheel moves page too by adding cancelevent
 * - artf7734: Load kml overlay out of file
 *   - New parameter for KML-overlay
 * - #4494: Add buttons for driving directions
 * - #5274 PHP problem URL file-access is disabled in the server configuration
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2007-02-10 version 2.7: Improved by Keith Slater and Mike Reumer
 * - artf7666: Check if javascript is enabled or browser is compatible.
 * - artf7564: Multiple urls
 *   - Added the option to get the single key or search in the multiple url's for a key.
 * - artf6182: Localization
 *   - Get language from the site itself
 *	 - Get language as parameter from the {mosmap}
 *   - Set language if available as parameter or setting
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-12-11 version 2.6: Improved by Eugene Trotsan and Mike Reumer
 * - artf7020: Extra parameter for address.
 *	 - Get the coordinates of the address at google when parameter lon/lat are empty.
 *   - Problem with SimpleXMLElement PHP >= 5
 * - artf6293: Tool tips
 *   - New parameter for tooltip 
 * - artf6995: Turn off overview
 *   - A new value for overview. 2 for overview window to be closed initially.
 * - artf6294 : Turn off infowindow of marker
 *   - New parameter to set infowindow initially closed (0) or open (1 default)
 * - artf6996: Alignment of the map
 *   - New parameter align for the map.
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-10-27 version 2.5: Improved by Mike Reumer
 * - artf6794: Multiple contentitems with maps won't work
 *   - Placed a random text in the name of the googlemap and it's functions.
 * - artf6758: Warning: Wrong value for parameter 4 in call to preg_match_all()
 *   - PREG_OFFSET_CAPTURE has to be combined with PREG_PATTERN_ORDER
 * - artf6755 Call-time pass-by-reference has been deprecated
 *   - Removed & in the call of functions
 * - artf6756 : Warning about variable not defined
 *   - Correctly defined a global parameter
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-10-13 version 2.4: Improved by Mike Reumer
 * - artf6402: Googlemap plugin with tabs not working
 *   - Added a function to look if the offsetposition is changed
 *   - Only make a map when its visible on the page
 *   - Changed event for displaying map in interval for checking if map is visible
 *   - Made important variable in scripts dedicated to the number of the map
 * - artf6456 : Placing defaults of parameters in backoffice
 *   - Created the possibility to set parameters for the plugin in the 
 *     administator of Joomla.
 * - artf6409: Joomla 1.5 support
 *   - Plugin made ready for Joomla 1.5 with configparameter legacy on!
 *   - Calls for Joomla 1.0.x and for Joomla 1.5 created with correct params
 *   - Use a plugin parameter for Joomla 1.5 if plugin is published or not
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-10-02 version 2.3: Improved by Mike Reumer
 * - artf6183: Links not working in Marker
 *   - changed chopping of key and value and translate special htmlcodes
 * - artf6249: Overview initial not the same maptype as map
 *   - changed order of creating controls and setting maptype
 * - artf6280: In IE a big wrong shadow for Marker
 *   - API initialization with wrong version. Removed ".x"
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-09-27 version 2.2: Improved by Mike Reumer
 * - artf6122 Parameters width and height flexible
 *   - Removed px behind width and height
 *   - Changed defaults for width and height parameters
 *   - Check for backward compatibility if units are given
 * - artf6148 Option to turn off the map type selector visibility
 *   - If zoomType is None then no Zoomcontrols (default empty => Small zoomcontrols).
 *   - If showMaptype is 0 then no Maptype controls
 * - artf6176 : Remove mosmap tag if unpublished
 *   - Moved Published within the plugin to remove all the tags
 * - artf6174 : Multiple maps on article w/ {mospagebreak}'s
 *   - Replaced Google maps initialization to the header
 * - Moved default so they are set each {mosmap} 
 * - Settimeout higher for activating to show googlemap (for IE compatibility)
 * - New parameter zoom_new for continues zoom and Doubleclick center and zoom (default 0 => off)
 * - New parameter overview for a overview window at bottom right (default 0 => off)
 * - Scripts made XHTML compliant
 * - artf6150 Documentation with installation
 * ---------------------------------------------------------------- */
/* ----------------------------------------------------------------
 * 2006-09-21: Improved by PILLWAX Industrial Solutions Consulting
 *	- Fixed Script invocation from <body onLoad> to correct JavaScript call
 *   - Add Defaults for parameters
 * ---------------------------------------------------------------- */

/** ensure this file is being included by a parent file */

global $mainframe;

if(method_exists($mainframe,'registerEvent')){
	defined( '_JEXEC' ) or die( 'Restricted access' );
	$mainframe->registerEvent( 'onPrepareContent', 'Pre15x_PluginGoogleMap2' );
	$mainframe->registerEvent( 'onMap', 'Pre15x_PluginGoogleMap2' );
}else{
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	$_MAMBOTS->registerFunction( 'onPrepareContent', 'Pre10x_PluginGoogleMap2' );
	$_MAMBOTS->registerFunction( 'onMap', 'Pre10xonMap_PluginGoogleMap2' );
}

if (!defined('_CMN_JAVASCRIPT')) define('_CMN_JAVASCRIPT', "<b>JavaScript must be enabled in order for you to use Google Maps.</b> <br/>However, it seems JavaScript is either disabled or not supported by your browser. <br/>To view Google Maps, enable JavaScript by changing your browser options, and then try again.");

/* Switch call to function of 1.5 to the real module 
 */
function Pre15x_PluginGoogleMap2( &$row, &$params, $page=0 ) {
	$database = &JFactory::getDBO();

	// Get Plugin info
	$plugin =& JPluginHelper::getPlugin('content', 'plugin_googlemap2'); 

	$plugin_params = new JParameter( $plugin->params );
	$joomla_version = 1.5;

	//$published = $plugin->published;
	// Solve bug in Joomal 1.5 that when plugin is unpublished that the tag is not removed
	// So use a parameter of plugin to set published for Joomla 1.5
	$published = $plugin_params->get( 'publ', '0' );
	$id = intval( JRequest::getVar('id', null) );	
	$id = explode(":", $id);
	$id = $id[0];
	$pluginmap = new PluginGoogleMap2();

	if( !$pluginmap->core($published, $row, $params, $page, $plugin_params, $id, $joomla_version) ){
		echo "problem";
	}
	
	unset($database, $plugin, $plugin_params, $joomla_version, $published, $id, $pluginmap);
	return true;
}

/* Switch call to function of 1.0.x to the real module
 */
function Pre10x_PluginGoogleMap2( $published, &$row, $mask=0, $page=0 ) {
	global $database;

	// load plugin parameters
	$query = "SELECT id"
		. "\n FROM #__mambots"
		. "\n WHERE element = 'plugin_googlemap2'"
		. "\n AND folder = 'content'"
		;
	$database->setQuery( $query );
	$id = $database->loadResult();
	$plugin = new mosMambot( $database );
	$plugin->load( $id );
	$plugin_params =& new mosParameters( $plugin->params );
	$joomla_version = 1.0;

	$id = intval( mosGetParam( $_REQUEST, 'id', null ) );

	$pluginmap = new PluginGoogleMap2();
	
	if( !$pluginmap->core($published, $row, $mask, $page, $plugin_params, $id, $joomla_version) ){
		echo "problem";
	}

	unset($query, $id, $plugin, $plugin_params, $joomla_version, $pluginmap);
	return true;
}

function Pre10xonMap_PluginGoogleMap2( $published, &$row, $mask=0, $page=0 ) {
	global $database;

	// load plugin parameters
	$query = "SELECT id"
		. "\n FROM #__mambots"
		. "\n WHERE element = 'plugin_googlemap2'"
		. "\n AND folder = 'content'"
		;
	$database->setQuery( $query );
	$id = $database->loadResult();
	$plugin = new mosMambot( $database );
	$plugin->load( $id );
	$plugin_params =& new mosParameters( $plugin->params );
	$joomla_version = 1.0;

	$id = intval( mosGetParam( $_REQUEST, 'id', null ) );

	$pluginmap = new PluginGoogleMap2();
	$pluginmap->event = '10xonMap';

	if( !$pluginmap->core($published, $row, $mask, $page, $plugin_params, $id, $joomla_version) ){
		echo "problem";
	}

	unset($query, $id, $plugin, $plugin_params, $joomla_version, $pluginmap);
	return true;
}

class PluginGoogleMap2 {
	var $debug_plugin = '0';
	var $debug_text = '';
	var $event = '';

	/* If PHP < 5 then htmlspecialchars_decode doesn't exists
	 */
	
	function _htsdecode($string, $options=0) {
		if (function_exists('htmlspecialchars_decode')) {
			return htmlspecialchars_decode($string, $options);
		} else {
			return strtr($string,array_flip(get_html_translation_table(HTML_SPECIALCHARS, $options)));
		}
	}
	
	function debug_log($text)
	{
		if ($this->debug_plugin =='1')
			$this->debug_text .= "\n// ".$text." (".round($this->memory_get_usage()/1024)." KB)";
	
		return;
	}

	function get_index($string)
	{
		$string = preg_replace("/^.*\[/", '', $string);
		$string = preg_replace("/\].*$/", '', $string);
		return $string;
	}
    // Only define function if it doesn't exist
    function memory_get_usage()
    {
		if ( function_exists( 'memory_get_usage' ) )
			return memory_get_usage(); 
		else
			return 0;
    }

	function injectCustomHeadTags($html, $check, &$row) {
		global $mainframe;

		// Get buffer
		// Is there a difference between J15/J10
		$buf = &$row;
		if (!function_exists('jimport')) {
			// version 1.0.x
			$screen = ob_get_contents();
			$header = $mainframe->getHead();
		} else {
			$screen = '';
			$header = '';
			$header = $mainframe->getHead();
		}
			
		// Check if code already is inserted?
		$check = str_replace("/", "\/",$check);
		$check = str_replace(".", "\.",$check);
		$check = str_replace("?", "\?",$check);
		$check = "/".$check."/is";
		$chk = preg_match($check, $buf) + preg_match($check, $screen) + preg_match($check, $header);
		if ($chk==0) {
			// Check for head
			$head = preg_match("/<head>/is", $buf);
			$hd = preg_match("/<head>/is", $screen);
			// if no head do mainframe replace
			if ($head==0) {
				// With Joomla 10x onMap add header doesn't work
				if ($hd==0) {
					$this->debug_log("Mainframe header replace");
					$mainframe->addCustomHeadTag($html);
				}
				else {
					$this->debug_log("With Joomla 10x onMap add header doesn't work and header not available so place it in body");
					echo $html;
				}
			} else {
				// if head then place in head the scripts
				$buf = preg_replace("/<head(| .*?)>(.*?)<\/head>/is", "<head$1>$2".$html."</head>", $buf);						
			}
		} else
			$this->debug_log("No replace script already available");

		unset($buf, $screen, $header, $check, $chk, $head, $hd);
	}
	
	/* If PHP < 5 then SimpleXMLElement doesn't exists
	 */
	function get_geo($address, $key, $iso)
	{
		$this->debug_log("get_geo(".$address.")");
	
		$coords = '';
		$getpage='';
		$replace = array("\n", "\r", "&lt;br/&gt;", "&lt;br /&gt;", "&lt;br&gt;", "<br>", "<br />", "<br/>");
		$address = str_replace($replace, '', $address);
	
		$this->debug_log("Address: ".$address);
		
		$uri = "http://maps.google.com/maps/geo?q=".urlencode($address)."&output=xml&oe=".$iso."&key=".$key;
		$this->debug_log("get_geo(".$uri.")");
		
		if ( !class_exists('SimpleXMLElement') )
		{
			// PHP4
			$ok = false;
			$this->debug_log("SimpleXMLElement doesn't exists so probably PHP 4.x");
			if (ini_get('allow_url_fopen'))
				if (($getpage = file_get_contents($uri)))
					$ok = true;

			if (!$ok) {
				$this->debug_log("URI couldn't be opened probably ALLOW_URL_FOPEN off");
				if (function_exists('curl_init')) {
					$this->debug_log("curl_init does exists");
					$ch = curl_init();
					$timeout = 5; // set to zero for no timeout
					curl_setopt ($ch, CURLOPT_URL, $uri);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					$getpage = curl_exec($ch);
					curl_close($ch);
				} else
					$this->debug_log("curl_init doesn't exists");
			}
	
			$this->debug_log("Returned page: ".$getpage);
	
			if (function_exists('mb_detect_encoding')) {
				$enc = mb_detect_encoding($getpage);
				if (!empty($enc))
					$getpage = mb_convert_encoding($getpage, $iso, $enc);
			}
				
			if (function_exists('domxml_open_mem')&&($getpage<>'')) {
				$responsedoc = domxml_open_mem($getpage);
				if ($responsedoc !=null) {				
					$response = $responsedoc->get_elements_by_tagname("Response");
					if ($response!=null) {
						$placemark = $response[0]->get_elements_by_tagname("Placemark");
						if ($placemark!=null) {
							$point = $placemark[0]->get_elements_by_tagname("Point");
							if ($point!=null) {
								$coords = $point[0]->get_content();
								$this->debug_log("Coordinates: ".join(", ", explode(",", $coords)));
								return $coords;
							}
						}
					}
				}
			}
			$this->debug_log("Coordinates: null");
			return null;
		}
		else
		{
			// PHP5
			$this->debug_log("SimpleXMLElement does exists so probably PHP 5.x");
			$ok = false;
			if (ini_get('allow_url_fopen')) { 
				if (file_exists($uri)) {
					$getpage = file_get_contents($uri);
					$ok = true;
				}
			} 
			
			if (!$ok) { 
				$this->debug_log("URI couldn't be opened probably ALLOW_URL_FOPEN off");
				if (function_exists('curl_init')) {
					$this->debug_log("curl_init does exists");
					$ch = curl_init();
					$timeout = 5; // set to zero for no timeout
					curl_setopt ($ch, CURLOPT_URL, $uri);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					$getpage = curl_exec($ch);
					curl_close($ch);
				} else
					$this->debug_log("curl_init doesn't exists");
			}
	
			$this->debug_log("Returned page: ".$getpage);
			if (function_exists('mb_detect_encoding')) {
				$enc = mb_detect_encoding($getpage);
				if (!empty($enc))
					$getpage = mb_convert_encoding($getpage, $iso, $enc);
			}
	
			if ($getpage <>'') {
				$expr = '/xmlns/';
				$getpage = preg_replace($expr, 'id', $getpage);
				$xml = new SimpleXMLElement($getpage);
				foreach($xml->xpath('//coordinates') as $coordinates) {
					$coords = $coordinates;
					break;
				}
				if ($coords=='') {
					$this->debug_log("Coordinates: null");
					return null;
				}
				$this->debug_log("Coordinates: ".join(", ", explode(",", $coords)));
				return $coords;
			}
		}
		$this->debug_log("get_geo totally wrong end!");
	}
	
	function randomkeys($length)
	{
		$key = "";
		$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
		for($i=0;$i<$length;$i++)
		{
			$key .= $pattern{rand(0,35)};
		}
		unset($i, $pattern);
		return $key;
	}
	
	function translate($orgtext, $lang) {
		$langtexts = preg_split("/[\n\r]+/", $orgtext);
		$text = "";

		if (is_array($langtexts)) {
			$replace = array("\n", "\r", "<br/>", "<br />", "<br>");
			$firsttext = "";
			foreach($langtexts as $langtext)
			{
				$values = explode(";",$langtext, 2);
				if (count($values)>1) {
					$values[0] = trim(str_replace($replace, '', $values[0]));
					if ($firsttext == "")
						$firsttext = $values[1];
						
					if (trim($lang)==$values[0])
					{
						$text = $values[1];
						break;
					}
				}
			}
			// Not found
			if ($text=="")
				$text = $firsttext;
		}	
		
		if ($text=="")
			$text = $orgtext;
	
		$text = $this->_htsdecode($text, ENT_NOQUOTES);
	
		unset($langtexts, $replace, $langtext, $values);
		return $text;
	}

	function get_API_key ($params, $url) {
		$key = trim($params->get( 'Google_API_key', '' ));
		$this->debug_log("key: ".$key);
		$this->debug_log("url: ".$url);
		if ($key=='')
		{
			$url = trim($url);
			$replace = array('http://', 'https://');
			$url = str_replace($replace, '', $url);
			$multikey = trim($params->get( 'Google_Multi_API_key', '' ));
			if ($multikey!='') {
				$this->debug_log("multikey: ".$multikey);
				$replace = array("\n", "\r", "<br/>", "<br />", "<br>");
				$sites = preg_split("/[\n\r]+/", $multikey);
				foreach($sites as $site)
				{
					$values = explode(";",$site, 2);
					$values[0] = trim(str_replace($replace, '', $values[0]));
					$values[1] = str_replace($replace, '', $values[1]);
					$this->debug_log("values[0]: ".$values[0]);
					$this->debug_log("values[1]: ".$values[1]);
					if ($url==$values[0])
					{
						$key = trim($values[1]);
						break;
					}
				}
			}
			$this->debug_log("key: ".$key);
		}
		unset($replace, $multikey, $sites, $site, $values);
		return $key;
	}

	function check_google_api_version($version, $checkversion) {
		if ($version=='2.x')
			return true;
			
		$ver1 = explode(".", $version);
		$ver2 = explode(".", $checkversion);
		$cont = true;
		$x = 0;
		while ($cont&&(count($ver1)>$x)&&(count($ver2)>$x)) {
			if (is_numeric($ver2[$x])&&is_numeric($ver1[$x])) {
				if (intval($ver1[$x]) > intval($ver2[$x]))
					return true;
				if (($ver1[$x]!='x')&&(intval($ver2[$x]) > intval($ver1[$x]))) {
					$cont = false;
				}
			} elseif (($ver1[$x]!='x')&&($ver2[$x] > $ver1[$x])) {
				if ($ver1[$x] > $ver2[$x])
					return true;

				$cont = false;
			}

			$x++;
		}
		if ((count($ver1)<=$x)&&(count($ver2)>$x)&&$cont)
			$cont = false;
			
		return $cont;			
	}
	
	/** Real module
	 */
	function core( $published, &$row, $mask=0, $page=0, &$params, $id, $joomla_version=1.0 ) {
		global $mainframe, $mosConfig_locale;
		global $iso_client_lang; // This is a global of Joomfish!

		if ($joomla_version< 1.5) {
			global $mosConfig_live_site, $mosConfig_locale, $iso_client_lang;
			$plugin_path = "mambots";
			$geoiso = $params->get( 'geoenc', 'site' );
			if ($geoiso=='site')
				$geoiso=trim(str_replace('charset=','',_ISO));

			$iso=trim(str_replace('charset=','',_ISO));
			$no_javascript = _CMN_JAVASCRIPT;
		} else {
			$plugin_path = "plugins";
			$mosConfig_live_site = JURI::base();
			$lang = JFactory::getLanguage();
			$mosConfig_locale = $lang->getTag();
			$iso = "utf-8";
			$geoiso=$iso;
			$no_javascript = JText::_( '_CMN_JAVASCRIPT' );
		}

		// get the parameter on what code should plugin trigger!
		$plugincode = $params->get( 'plugincode', 'mosmap' );
	
		$singleregex='/({'.$plugincode.'\s*)(.*?)(})/si';
		$regex='/{'.$plugincode.'\s*.*?}/si';
	
		$cnt=preg_match_all($regex,$row->text,$matches,PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER);
		$first=true;
		$first_mootools=true;
		$first_modalbox=true;
		$first_localsearch=true;
		$first_panoramio=true;
		$first_kmlrenderer=true;
		
		for($counter = 0; $counter < $cnt; $counter ++)
		{
			// Parameters can get the default from the plugin if not empty or from the administrator part of the plugin
			$this->debug_plugin = $params->get( 'debug', '0' );
			$google_API_version = $params->get( 'Google_API_version', '2.x' );
			$timeinterval = $params->get( 'timeinterval', '500' );
			$urlsetting = $params->get( 'urlsetting', 'http_host' );
			$width = $params->get( 'width', '100%' );
			$height = $params->get( 'height', '400px' );
			$deflatitude = $params->get( 'lat', '52.075581' );
			$deflongitude = $params->get( 'lon', '4.541513' );
			$centerlat = $params->get( 'centerlat', '' );
			$centerlon = $params->get( 'centerlon', '' );
			$address = $params->get( 'address', '' );
			$zoom = $params->get( 'zoom', '10' );
			$controltype = $params->get( 'controlType', 'user' );
			$showmaptype = $params->get( 'showMaptype', '1' );
			$showscale = $params->get( 'showScale', '0' );
			$zoom_new = $params->get( 'zoomNew', '0' );
			$zoom_wheel = $params->get( 'zoomWheel', '0' );
			$keyboard = $params->get( 'keyboard', '0' );
			$overview = $params->get( 'overview', '0' );
			$navlabel = $params->get( 'navlabel', '0' );
			$dragging = $params->get( 'dragging', '1' );
			$marker = $params->get( 'marker', '1' );
			$icon = $params->get( 'icon', '' );
			$iconwidth = $params->get( 'iconwidth', '' );
			$iconheight = $params->get( 'iconheight', '' );
			$iconshadow = $params->get( 'iconshadow', '' );
			$iconshadowwidth = $params->get( 'iconshadowwidth', '' );
			$iconshadowheight = $params->get( 'iconshadowheight', '' );
			$iconshadowanchorx = $params->get( 'iconshadowanchorx', '' );
			$iconshadowanchory = $params->get( 'iconshadowanchory', '' );
			$iconanchorx = $params->get( 'iconanchorx', '' );
			$iconanchory = $params->get( 'iconanchory', '' );
			$iconinfoanchorx = $params->get( 'iconinfoanchorx', '' );
			$iconinfoanchory = $params->get( 'iconinfoanchory', '' );
			$icontransparent = $params->get( 'icontransparent', '' );
			$iconimagemap = $params->get( 'iconimagemap', '' );
			$gotoaddr = $params->get( 'gotoaddr', '0' );
			$erraddr = $params->get( 'erraddr', 'Address ## not found!' );
			$txtaddr = $params->get( 'txtaddr', 'Address: <br />##' );
			$align = $params->get( 'align', 'center' );
			$langtype = $params->get( 'langtype', '' );
			$dir = $params->get( 'dir', '0' );
			$dirtype = $params->get( 'dirtype', 'D' );
			$avoidhighways = $params->get( 'avoidhighways', '0' );
			$traffic = $params->get( 'traffic', '0' );
			$panoramio = $params->get( 'panoramio', '0' );
			$adsmanager = $params->get( 'adsmanager', '0' );
			$maxads = $params->get( 'maxads', '3' );
			$localsearch = $params->get( 'localsearch', '0' );
			$adsense = $params->get( 'adsense', '' );
			$channel = $params->get( 'channel', '' );
			$googlebar = $params->get( 'googlebar', '0' );
			$searchlist = $params->get( 'searchlist', '0' );
			$searchtarget = $params->get( 'searchtarget', '0' );
			$searchzoompan = $params->get( 'searchzoompan', '1' );
			$txt_get_dir = $params->get( 'txtgetdir', 'Get Directions' );
			$txt_from = $params->get( 'txtfrom', '' );
			$txt_to = $params->get( 'txtto', '' );
			$txt_diraddr = $params->get( 'txtdiraddr', 'Address: ' );
			$txt_dir = $params->get( 'txtdir', 'Directions: ' );
			$txt_driving = $params->get( 'txt_driving', '' );
			$txt_avhighways = $params->get( 'txt_avhighways', '' );
			$txt_walking = $params->get( 'txt_walking', '' );
			$dirdef = $params->get( 'dirdefault', '0' );
			$lightbox = $params->get( 'lightbox', '0' );
			$lbxwidth = $params->get( 'lbxwidth', '100%' );
			$lbxheight = $params->get( 'lbxheight', '700px' );
			$txtlightbox = $params->get( 'txtlightbox', '0' );
			$lbxcaption =  $params->get( 'lbxcaption', '' );
			$lbxzoom =  $params->get( 'lbxzoom', '' );
			$effect = $params->get( 'effect', 'none' );
			$kmlrenderer = $params->get( 'kmlrenderer', 'google' );
			$kmlsidebar = $params->get( 'kmlsidebar', 'none' );
			$kmlsbwidth = $params->get( 'kmlsbwidth', '200' );
			$kmlsbsort = $params->get( 'kmlsbsort', 'none' );
			$kmlmessshow = $params->get( 'kmlmessshow', '0' );
			$proxy = $params->get( 'proxy', '1' );
			$sv = $params->get( 'sv', 'none' );
			$svwidth = $params->get( 'svwidth', '100%' );
			$svheight = $params->get( 'svheight', '300' );
			$svyaw = $params->get( 'svyaw', '0' );
			$svpitch = $params->get( 'svpitch', '0' );
			$svzoom = $params->get( 'svzoom', '' );
			
			// Key should be filled in the administrtor part or as parameter with the plugin out of content item
			$startmem = round($this->memory_get_usage()/1024);
			$this->debug_log("Memory Usage Start: " . $startmem . " KB");
			$this->debug_log("HTTP_HOST: ".$_SERVER['HTTP_HOST']);
			$this->debug_log("SERVER_PORT: ".$_SERVER['SERVER_PORT']);
			$this->debug_log("mosConfig_live_site: ".$mosConfig_live_site);
			if ($urlsetting=='mosconfig')
				$key = $this->get_API_key($params, $mosConfig_live_site);
			else 
				$key = $this->get_API_key($params, $_SERVER['HTTP_HOST']);
			
			// get default lang from $mosConfig_locale
			$this->debug_log("langtype: ".$langtype);
			$this->debug_log("mosConfig_locale: ".$mosConfig_locale);
			$this->debug_log("iso_client_lang: ".$iso_client_lang);
		
			if ($langtype == 'site') 
			{
				if ($joomla_version< 1.5) 
					$locale_parts = explode('_', $mosConfig_locale);
				else
					$locale_parts = explode('-', $mosConfig_locale);
				$lang = $locale_parts[0];
				
			} else if ($langtype == 'config') 
			{
				$lang = $params->get( 'lang', '' );
			} else if ($langtype == 'joomfish')
			{
				$lang = $iso_client_lang;
			} else {
				$lang = '';
			} 
	
			$this->debug_log("lang : ".$lang);
			
			//Translate parameters
			$erraddr = $this->translate($erraddr, $lang);
			$txtaddr = $this->translate($txtaddr, $lang);
			$txtaddr = str_replace(array("\r\n", "\r", "\n"), '', $txtaddr );
			$txt_get_dir = $this->translate($txt_get_dir, $lang);
			$txt_from = $this->translate($txt_from, $lang);
			$txt_to = $this->translate($txt_to, $lang);
			$txt_diraddr = $this->translate($txt_diraddr, $lang);
			$txt_dir = $this->translate($txt_dir, $lang);
			$txtlightbox = $this->translate($txtlightbox, $lang);
			$txt_driving = $this->translate($txt_driving, $lang);
			$txt_avhighways = $this->translate($txt_avhighways, $lang);
			$txt_walking = $this->translate($txt_walking, $lang);
	
			// Next parameters can be set as default out of the administrtor module or stay empty and the plugin-code decides the default. 
			$zoomType = $params->get( 'zoomType', '' );
			$mapType = $params->get( 'mapType', '' );
	
			// default empty and should be filled as a parameter with the plugin out of the content item
			$code='';
			$lbcode='';
			$mapclass='';
			$tolat='';
			$tolon='';
			$toaddress='';
			$text='';
			$tooltip='';
			$kml = array();
			$msid='';
			$client_geo = 0;
			$show = 1;
			$imageurl='';
			$imagex='';
			$imagey='';
			$imagexyunits='';
			$imagewidth='';
			$imageheight='';
			$imageanchorx='';
			$imageanchory='';
			$imageanchorunits='';
			$searchtext='';
			$latitude='';
			$longitude='';

			// Give the map a random name so it won't interfere with another map
			$mapnm = $id."_".$this->randomkeys(5)."_".$counter;
			if ($_SERVER['SERVER_PORT'] == 443)
				$protocol = "https://";
			else
				$protocol = "http://";
			
			$mosmap=$matches[0][$counter][0];
	
			if (!$published )
			{
				$row->text = str_replace($mosmap, $code, $row->text);
			} else
			{
				//track if coordinates different from config
				$inline_coords = 0;
				$inline_tocoords = 0;
	
				// Match the field details to build the html
				preg_match($singleregex,$mosmap,$mosmapparsed);
	
				$fields = explode("|", $mosmapparsed[2]);

				foreach($fields as $value)
				{
					$value=trim($value);
					$values = explode("=",$value, 2);
					$values[0] = trim(strtolower($values[0]));
					if (count($values)>1)
						$values[1] = trim($values[1]);
					$values=preg_replace("/^'/", '', $values);
					$values=preg_replace("/'$/", '', $values);
					$values=preg_replace("/^&#39;/",'',$values);
					$values=preg_replace("/&#39;$/",'',$values);
	
					if($values[0]=='debug'){
						$this->debug_plugin=$values[1];
					}else if($values[0]=='mapname'){
						$mapnm=$values[1];
					}else if($values[0]=='mapclass'){
						$mapclass=$values[1];
					}else if($values[0]=='width'){
						$width=$values[1];
					}else if($values[0]=='height'){
						$height=$values[1];
					}else if($values[0]=='lat'&&$values[1]!=''){
						$latitude=$values[1];
						$inline_coords = 1;
					}else if($values[0]=='lon'&&$values[1]!=''){
						$longitude=$values[1];
						$inline_coords = 1;
					}else if($values[0]=='centerlat'){
						$centerlat=$values[1];
						$inline_coords = 1;
					}else if($values[0]=='centerlon'){
						$centerlon=$values[1];
						$inline_coords = 1;
					}else if($values[0]=='tolat'){
						$tolat=$values[1];
						$inline_tocoords = 1;
					}else if($values[0]=='tolon'){
						$tolon=$values[1];
						$inline_tocoords = 1;
					}else if($values[0]=='zoom'){
						$zoom=$values[1];
					}else if($values[0]=='key'){
						$key=$values[1];
					}else if($values[0]=='controltype'){
						$controltype=$values[1];
					}else if($values[0]=='keyboard'){
						$keyboard=$values[1];
					}else if($values[0]=='zoomtype'){
						$zoomType=$values[1];
					}else if($values[0]=='text'){
						$text=html_entity_decode(html_entity_decode(trim($values[1])));
						$text=str_replace("\"","\\\"", $text);
						$text=str_replace("&#39;","'", $text);
					}else if($values[0]=='tooltip'){
						$tooltip=trim($values[1]);
					}else if($values[0]=='maptype'){
						$mapType=$values[1];
					}else if($values[0]=='showmaptype'){
						$showmaptype=$values[1];
					}else if($values[0]=='showscale'){
						$showscale=$values[1];
					}else if($values[0]=='zoomnew'){
						$zoom_new=$values[1];
					}else if($values[0]=='zoomwheel'){
						$zoom_wheel=$values[1];
					}else if($values[0]=='overview'){
						$overview=$values[1];
					}else if($values[0]=='navlabel'){
						$navlabel=$values[1];
					}else if($values[0]=='dragging'){
						$dragging=$values[1];
					}else if($values[0]=='marker'){
						$marker=$values[1];
					}else if($values[0]=='icon'){
						$icon=$values[1];
					}else if($values[0]=='iconwidth'){
						$iconwidth=$values[1];
					}else if($values[0]=='iconheight'){
						$iconheight=$values[1];
					}else if($values[0]=='iconshadow'){
						$iconshadow=$values[1];
					}else if($values[0]=='iconshadowwidth'){
						$iconshadowwidth=$values[1];
					}else if($values[0]=='iconshadowheight'){
						$iconshadowheight=$values[1];
					}else if($values[0]=='iconshadowanchorx'){
						$iconshadowanchorx=$values[1];
					}else if($values[0]=='iconshadowanchory'){
						$iconshadowanchory=$values[1];
					}else if($values[0]=='iconanchorx'){
						$iconanchorx=$values[1];
					}else if($values[0]=='iconanchory'){
						$iconanchory=$values[1];
					}else if($values[0]=='iconinfoanchorx'){
						$iconinfoanchorx=$values[1];
					}else if($values[0]=='iconinfoanchory'){
						$iconinfoanchory=$values[1];
					}else if($values[0]=='icontransparent'){
						$icontransparent=$values[1];
					}else if($values[0]=='iconimagemap'){
						$iconimagemap=$values[1];
					}else if($values[0]=='address'){
						$address=trim($values[1]);
					}else if($values[0]=='toaddress'){
						$toaddress=trim($values[1]);
					}else if($values[0]=='gotoaddr'){
						$gotoaddr=$values[1];
					}else if($values[0]=='align'){
						$align=$values[1];
					}else if($values[0]=='lang'){
						$lang=$values[1];
					}else if($values[0]=='kml'){
						$kml[0]=$values[1];
					}else if(preg_match("/kml\[[0-9]+\]/", $values[0])){
						$kml[$this->get_index($values[0])] = $values[1];
					}else if($values[0]=='msid'){
						$msid=$values[1];
					}else if($values[0]=='traffic'){
						$traffic=$values[1];
					}else if($values[0]=='panoramio'){
						$panoramio=$values[1];
					}else if($values[0]=='adsmanager'){
						$adsmanager=$values[1];
					}else if($values[0]=='maxads'){
						$maxads=$values[1];
					}else if($values[0]=='localsearch'){
						$localsearch=$values[1];
					}else if($values[0]=='adsense'){
						$adsense=$values[1];
					}else if($values[0]=='channel'){
						$channel=$values[1];
					}else if($values[0]=='googlebar'){
						$googlebar=$values[1];
					}else if($values[0]=='searchtext'){
						$searchtext=$values[1];
					}else if($values[0]=='searchlist'){
						$searchlist=$values[1];
					}else if($values[0]=='searchtarget'){
						$searchtarget=$values[1];
					}else if($values[0]=='searchzoompan'){
						$searchzoompan=$values[1];
					}else if($values[0]=='dir'){
						$dir=$values[1];
					}else if($values[0]=='dirtype'){
						$dirtype=$values[1];
					}else if($values[0]=='avoidhighways'){
						$avoidhighways=$values[1];
					}else if($values[0]=='lightbox'){
						$lightbox=$values[1];
					}else if($values[0]=='lbxwidth'){
						$lbxwidth=$values[1];
					}else if($values[0]=='lbxheight'){
						$lbxheight=$values[1];
					}else if($values[0]=='lbxcaption'){
						$lbxcaption=$values[1];
					}else if($values[0]=='lbxzoom'){
						$lbxzoom=$values[1];
					}else if($values[0]=='show'){
						$show=$values[1];
					}else if($values[0]=='imageurl'){
						$imageurl=$values[1];
					}else if($values[0]=='imagex'){
						$imagex=$values[1];
					}else if($values[0]=='imagey'){
						$imagey=$values[1];
					}else if($values[0]=='imagexyunits'){
						$imagexyunits=$values[1];
					}else if($values[0]=='imagewidth'){
						$imagewidth=$values[1];
					}else if($values[0]=='imageheight'){
						$imageheight=$values[1];
					}else if($values[0]=='imageanchorx'){
						$imageanchorx=$values[1];
					}else if($values[0]=='imageanchory'){
						$imageanchory=$values[1];
					}else if($values[0]=='imageanchorunits'){
						$imageanchorunits=$values[1];
					}else if($values[0]=='kmlrenderer'){
						$kmlrenderer=$values[1];
					}else if($values[0]=='kmlsidebar'){
						$kmlsidebar=$values[1];
					}else if($values[0]=='kmlsbwidth'){
						$kmlsbwidth=$values[1];
					}else if($values[0]=='kmlsbsort'){
						$kmlsbsort=$values[1];
					}else if($values[0]=='kmlmessshow'){
						$kmlmessshow =$values[1];
					}else if($values[0]=='sv'){
						$sv =$values[1];
					}else if($values[0]=='svwidth'){
						$svwidth =$values[1];
					}else if($values[0]=='svheight'){
						$svheight=$values[1];
					}else if($values[0]=='svyaw'){
						$svyaw=$values[1];
					}else if($values[0]=='svpitch'){
						$svpitch=$values[1];
					}else if($values[0]=='svzoom'){
						$svzoom=$values[1];
					}
				}
				
				$this->debug_log("Plugin Google Maps version 2.12h");
				$this->debug_log("Parameters: ");
				$this->debug_log("- debug: ".$this->debug_plugin);
				$this->debug_log("- dir: ".$dir);
				$this->debug_log("- text: ".$text);
				$this->debug_log("- icon: ".$icon);
				$this->debug_log("- iconwidth: ".$iconwidth);
				$this->debug_log("- iconheight: ".$iconheight);
				$this->debug_log("- iconinfoanchory: ".$iconinfoanchory);
				$this->debug_log("- searchlist: ".$searchlist);
				$this->debug_log("- searchzoompan: ".$searchzoompan);
				$this->debug_log("- kmlrenderer: ".$kmlrenderer);
				$this->debug_log("- kmlmessshow: ".$kmlmessshow);
				
				if($inline_coords == 0 && !empty($address))
				{
					$coord = $this->get_geo($address, $key, $geoiso);
					if ($coord=='') {
						$client_geo = 1;
					} else {
						list ($longitude, $latitude, $altitude) = explode(",", $coord);
						$inline_coords = 1;
					}
				}

				if($inline_tocoords == 0 && !empty($toaddress))
				{
					$tocoord = $this->get_geo($toaddress, $key, $geoiso);
					if ($tocoord=='') {
						$client_togeo = 1;
					} else {
						list ($tolon, $tolat, $altitude) = explode(",", $tocoord);
						$inline_tocoords = 1;
					}
				}
	
				if (is_numeric($svwidth))
				{
					$svwidth .= "px";
				}
				if (is_numeric($svheight))
				{
					$svheight.= "px";
				}
				if (is_numeric($kmlsbwidth))
				{
					$kmlsbwidth .= "px";
				}
				if (is_numeric($lbxwidth))
				{
					$lbxwidth .= "px";
				}
				if (is_numeric($lbxheight))
				{
					$lbxheight .= "px";
				}
				if (is_numeric($width))
				{
					$width .= "px";
				}
				if (is_numeric($height))
				{
					$height .= "px";
				}
				if ($msid!=''&&count($kml)==0) {
					$kml[0]=$protocol.'maps.google.com/maps/ms?';
					if ($lang!='')
						$kml[0] .= "hl=".$lang."&amp;";
					$kml[0].='ie='.$iso.'&amp;msa=0&amp;msid='.$msid.'&amp;output=kml';
					$this->debug_log("- msid: ".$kml[0]);
				}
				
				if ($googlebar=='1'||$localsearch=='1') {
					$searchoption = array();
	
					switch ($searchlist) {
					case "suppress":
						$searchoption[] ="resultList : G_GOOGLEBAR_RESULT_LIST_SUPPRESS";
						break;
					
					case "inline":
						$searchoption[] ="resultList : G_GOOGLEBAR_RESULT_LIST_INLINE";
						break;

					case "div":
						$searchoption[] ="resultList : document.getElementById('searchresult".$mapnm."')";
						break;
	
					default:
						if(empty($searchlist))
							$searchoption[] ="resultList : G_GOOGLEBAR_RESULT_LIST_INLINE";
						else {
							$searchoption[] ="resultList : document.getElementById('".$searchlist."')";
							$extsearchresult= true;
						}
						break;
					}
					
					switch ($searchtarget) {
					case "_self":
						$searchoption[] ="linkTarget : G_GOOGLEBAR_LINK_TARGET_SELF";
						break;
					
					case "_blank":
						$searchoption[] ="linkTarget : G_GOOGLEBAR_LINK_TARGET_BLANK";
						break;
	
					case "_top":
						$searchoption[] ="linkTarget : G_GOOGLEBAR_LINK_TARGET_TOP";
						break;
	
					case "_parent":
						$searchoption[] ="linkTarget : G_GOOGLEBAR_LINK_TARGET_PARENT";
						break;
	
					default:
						$searchoption[] ="linkTarget : G_GOOGLEBAR_LINK_TARGET_BLANK";
						break;
					}
					
					if ($searchzoompan=="1")
						$searchoption[] ="suppressInitialResultSelection : false
										  , suppressZoomToBounds : false";
					else
						$searchoption[] ="suppressInitialResultSelection : true
										  , suppressZoomToBounds : true";
										  
					$searchoptions = implode(', ', $searchoption);
				} else 
					$searchoptions = "";

				if ($icon!='') {
					$code .= "\n<img src='".$icon."' style='display:none' alt='icon' />";
					if ($iconshadow!='')
						$code .= "\n<img src='".$iconshadow."' style='display:none' alt='icon shadow' />";
					if ($icontransparent!='')
						$code .= "\n<img src='".$icontransparent."' style='display:none' alt='icon transparent' />";
				} 
				if ($sv!='none') {
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-0.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-1.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-2.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-3.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-4.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-5.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-6.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-7.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-8.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-9.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-10.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-11.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-12.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-13.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-14.png' style='display:none' alt='streetview icon' />";
					$code .= "\n<img src='http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-15.png' style='display:none' alt='streetview icon' />";
				}
				// Generate the map position prior to any Google Scripts so that these can parse the code
				$code.= "<!-- fail nicely if the browser has no Javascript -->
						<noscript><blockquote class='warning'><p>".$no_javascript."</p></blockquote></noscript>";
						
				if ($align!='none')
					$code.="<div style=\"text-align:".$align."\">";
						
				if ($gotoaddr=='1')
				{
					$code.="<form name=\"gotoaddress".$mapnm."\" class=\"gotoaddress\" action=\"javascript:gotoAddress".$mapnm."();return false;\">";
					$code.="	<input id=\"txtAddress".$mapnm."\" name=\"txtAddress".$mapnm."\" type=\"text\" size=\"25\" value=\"\">";
					$code.="	<input name=\"goto\" type=\"button\" class=\"button\" onClick=\"gotoAddress".$mapnm."();return false;\" value=\"Goto\">";
					$code.="</form>";
				}

				if ($lightbox=='1'&&$show==1) {
					$code.="<a href='javascript:void(0)' onclick='javascript:MOOdalBox.open(\"googlemap".$mapnm."\", \"".$lbxcaption."\", \"".$lbxwidth." ".$lbxheight."\", map".$mapnm.", ".((!empty($lbxzoom))?$lbxzoom:"null").");return false;' class='lightboxlink'>".$txtlightbox."</a>";
				}
				if ($lightbox=='1'&&$show==0) {
					$lbcode.="<a href='javascript:void(0)' onclick='javascript:MOOdalBox.open(\"googlemap".$mapnm."\", \"".$lbxcaption."\", \"".$lbxwidth." ".$lbxheight."\", map".$mapnm.", ".((!empty($lbxzoom))?$lbxzoom:"null").");return false;' class='lightboxlink'>".$txtlightbox."</a>";
				}

				if ($kmlrenderer!="google"&&($kmlsidebar=="left"||$kmlsidebar=="right"))
					$code.="<table style=\"width:100%;\">
							<tr>";

				if ($kmlrenderer!="google"&&$kmlsidebar=="left")
					$code.="<td style=\"width:".$kmlsbwidth.";height:".$height.";vertical-align:top;\"><div id=\"kmlsidebar".$mapnm."\" style=\"align:left;width:".$kmlsbwidth.";height:".$height.";overflow:auto;\"></div></td>";

				if ($kmlrenderer!="google"&&($kmlsidebar=="left"||$kmlsidebar=="right"))
					$code.="<td>";
					
				if ($sv=='top') {
					$code.="<div id='svpanorama".$mapnm."' style='width:".$svwidth."; height:".$svheight.(($kmlsidebar=="right")?"float:left;":"").";'></div>";
				}
				$code.="<div id=\"googlemap".$mapnm."\" ".((!empty($mapclass))?"class=\"".$mapclass."\"" :"")." style=\"width:".$width."; height:".$height.";".(($show==0)?"display:none;":"").(($kmlsidebar=="right")?"float:left;":"")."\"></div>";
				if ($sv=='bottom') {
					$code.="<div id='svpanorama".$mapnm."' style='width:".$svwidth."; height:".$svheight.(($kmlsidebar=="right")?"float:left;":"").";'></div>";
				}

				if ($kmlrenderer!="google"&&($kmlsidebar=="left"||$kmlsidebar=="right"))
					$code.="</td>";
				
				if ($kmlrenderer!="google"&&$kmlsidebar=="right")
					$code.="<td style=\"width:".$kmlsbwidth.";height:".$height.";vertical-align:top;\"><div id=\"kmlsidebar".$mapnm."\" style=\"align:left;width:".$kmlsbwidth.";height:".$height.";overflow:auto;\"></div></td>";
					
				if ($kmlrenderer!="google"&&($kmlsidebar=="left"||$kmlsidebar=="right"))
					$code.="</tr>
							</table>";

				if ($searchlist=='div') {
					$code.="<div id=\"searchresult".$mapnm."\"></div>";
				}
				if ($kmlsidebar=="left"||$kmlsidebar=="right")
					$code.="<div style=\"clear: both;\"></div>";
					
				if ((!empty($tolat)&&!empty($tolon))||!empty($address)||($dir=='5'))
					$code.= "<div id=\"dirsidebar".$mapnm."\"></div>";

				if ($align!='none')
					$code.="</div>";
	
				// Only add the google javascript once
				if($first)
				{
//					https loading of google maps api not working yet
//					$head = "<script src=\"".$protocol."maps.google.com/maps?file=api&amp;v=".$google_API_version."&amp;oe=".$iso;
					$head = "<script src=\"http://maps.google.com/maps?file=api&amp;v=".$google_API_version."&amp;oe=".$iso;
					if ($lang!='') 
						$head .= "&amp;hl=".$lang;
	
					$head .= "&amp;key=".$key."\" type=\"text/javascript\"></script>";
					$this->debug_log('Google API script');
					$this->injectCustomHeadTags($head, "maps.google.com/maps?file=api", $row->text);
					$first=false;
				}
	
				if (($lightbox=="1"||$effect!="none"||$dir=="3"||$dir=="4"||strpos($text, "MOOdalBox"))&&$first_mootools&&($joomla_version< 1.5)) {
					$head ="<script src='".$mosConfig_live_site."/".$plugin_path."/content/mootools/mootools-release-1.11.js' type='text/javascript'></script>";
					$this->debug_log('mootools');
					$this->injectCustomHeadTags($head, "/mootools", $row->text);
					$first_mootools = false;
				}
				if (($lightbox=="1"||$dir=="3"||$dir=="4"||strpos($text, "MOOdalBox"))&&$first_modalbox)	{
					$head = "<link rel='stylesheet' href='".$mosConfig_live_site."/".$plugin_path."/content/moodalbox121/css/moodalbox.css' type='text/css' /><script src='".$mosConfig_live_site."/".$plugin_path."/content/moodalbox121/js/modalbox1.2hack.js' type='text/javascript'></script>";	
					$this->debug_log('modalbox');
					$this->injectCustomHeadTags($head, "modalbox1.2hack.js", $row->text);
					$first_modalbox = false;
				}
				if ($panoramio=="1"&&$first_panoramio)	{
					$head = "<script src='".$mosConfig_live_site."/".$plugin_path."/content/panoramio/pano_layer.js' type='text/javascript'></script>";	
					$this->debug_log('panoramio');
					$this->injectCustomHeadTags($head, "pano_layer.js", $row->text);
					$first_panoramio = false;
				}
				if ($localsearch=="1"&&$first_localsearch) {
					$head = "<script src='".$protocol."www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=".$key."' type='text/javascript'></script>
							<script src='".$protocol."www.google.com/uds/solutions/localsearch/gmlocalsearch.js".((!empty($adsense))?"?adsense=".$adsense:"").((!empty($channel)&&!empty($adsense))?"&amp;channel=".$channel:"")."' type='text/javascript'></script>
							<style type='text/css'>
							  @import url('".$protocol."www.google.com/uds/css/gsearch.css');
							  @import url('".$protocol."www.google.com/uds/solutions/localsearch/gmlocalsearch.css');
							</style>";
					$this->debug_log('localsearch');
					$this->injectCustomHeadTags($head, "gmlocalsearch.js", $row->text);
					$first_localsearch = false;
				}
				if ($kmlrenderer=='geoxml'&&$first_kmlrenderer) {
					$head = "<script src='".$mosConfig_live_site."/".$plugin_path."/content/geoxml/geoxml.js' type='text/javascript'></script>";
					$this->debug_log('geoxml');
					$this->injectCustomHeadTags($head, "geoxml.js", $row->text);
					$first_kmlrenderer = false;
				}
	
				$code.="<script type='text/javascript'>//<![CDATA[\n";
				if ($this->debug_plugin=="1")
					$code.="function VersionControl(opt_no_style){
							  this.noStyle = opt_no_style;
							};
							VersionControl.prototype = new GControl();
							VersionControl.prototype.initialize = function(map) {
							  var display = document.createElement('div');
							  map.getContainer().appendChild(display);
							  display.innerHTML = '2.'+G_API_VERSION;
							  display.className = 'api-version-display';
							  if(!this.noStyle){
								display.style.fontFamily = 'Arial, sans-serif';
								display.style.fontSize = '11px';
							  }
							  this.htmlElement = display;
							  return display;
							}
							VersionControl.prototype.getDefaultPosition = function() {
							  return new GControlPosition(G_ANCHOR_BOTTOM_LEFT, new GSize(3, 38));
							}
						";

				// Globale map variable linked to the div
				$code.="var tst".$mapnm."=document.getElementById('googlemap".$mapnm."');
				var tstint".$mapnm.";
				var map".$mapnm.";
				var mySlidemap".$mapnm.";
				var overviewmap".$mapnm.";
				var ovmap".$mapnm.";
				var xml2".$mapnm.";
				var imageovl".$mapnm.";
				var directions".$mapnm.";
				";
				
				if ($proxy=="1")
					$code .= "\nvar proxy = '".$mosConfig_live_site."/".$plugin_path."/content/plugin_googlemap2_proxy.php?';";

				if ($panoramio=="1")
					$code.="var panoramio".$mapnm.";";
				if ($traffic=='1') 
					$code.="var trafficInfo".$mapnm.";";
				if ($localsearch=='1') 
					$code.="var localsearch".$mapnm.";";
				if ($adsmanager=='1') 
					$code.="var adsmanager".$mapnm.";";
				if ($kmlrenderer=='geoxml') 
					$code.="var exml".$mapnm.";";
				
				if ($icon!='') {
					$code.="\nmarkericon".$mapnm." = new GIcon(G_DEFAULT_ICON);";
					$code.="\nmarkericon".$mapnm.".image = '".$icon."';";
					if ($iconwidth!=''&&$iconheight!='')
						$code.="\nmarkericon".$mapnm.".iconSize = new GSize(".$iconwidth.", ".$iconheight.");";
					if ($iconshadow !='') {
						$code.="\nmarkericon".$mapnm.".shadow = '".$iconshadow."';";
		
						if ($iconshadowwidth!=''&&$iconshadowheight!='') 
							$code.="\nmarkericon".$mapnm.".shadowSize = new GSize(".$iconshadowwidth.", ".$iconshadowheight.");";
						if ($iconshadowanchorx!=''&&$iconshadowanchory!='')
							$code.="\nmarkericon".$mapnm.".infoShadowAnchor = new GPoint(".$iconshadowanchorx.", ".$iconshadowanchory.");";
					}
					if ($iconanchorx!=''&&$iconanchory!='')
						$code.="\nmarkericon".$mapnm.".iconAnchor = new GPoint(".$iconanchorx.", ".$iconanchory.");";
					if ($iconinfoanchorx!=''&&$iconinfoanchory!='')
						$code.="\nmarkericon".$mapnm.".infoWindowAnchor = new GPoint(".$iconinfoanchorx.", ".$iconinfoanchory.");";
					if ($icontransparent!='') 			
						$code.="\nmarkericon".$mapnm.".transparent = '".$icontransparent."';";
					if ($iconimagemap!='')
						$code.="\nmarkericon".$mapnm.".imageMap = [".$iconimagemap."];";
				}
				
				if ($sv!='none') {
					$code.="\nvar svclient".$mapnm.";
							var svmarker".$mapnm.";
							var svlastpoint".$mapnm.";
							var svpanorama".$mapnm.";
							";
					$code.="\nvar guyIcon".$mapnm." = new GIcon(G_DEFAULT_ICON);
							guyIcon".$mapnm.".image = 'http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-0.png';
							guyIcon".$mapnm.".transparent = 'http://maps.google.com/intl/en_us/mapfiles/cb/man-pick.png';
							guyIcon".$mapnm.".imageMap = [26,13, 30,14, 32,28, 27,28, 28,36, 18,35, 18,27, 16,26, 16,20, 16,14, 19,13, 22,8];
							guyIcon".$mapnm.".iconSize = new GSize(49, 52);
							guyIcon".$mapnm.".iconAnchor = new GPoint(25, 35);
							guyIcon".$mapnm.".infoWindowAnchor = new GPoint(25, 5);
							";
				}
	
				if ( strpos(" ".$_SERVER['HTTP_USER_AGENT'], 'Opera') )
				{
					$code.="var _mSvgForced = true;
							var _mSvgEnabled = true; ";
				}
	
				if($zoom_wheel=='1')
				{
					$code.="function CancelEvent".$mapnm."(event) { 
								var e = event; 
								if (typeof e.preventDefault == 'function') e.preventDefault(); 
									if (typeof e.stopPropagation == 'function') e.stopPropagation(); 
		
								if (window.event) { 
									window.event.cancelBubble = true; // for IE 
									window.event.returnValue = false; // for IE 
								} 
							}
						";
				}
	
				if ($gotoaddr=='1')
				{
					$code.="function gotoAddress".$mapnm."() {
								var address = document.getElementById('txtAddress".$mapnm."').value;
	
								if (address.length > 0) {
									var geocoder = new GClientGeocoder();
									geocoder.setViewport(map".$mapnm.".getBounds());
	
									geocoder.getLatLng(address,
									function(point) {
										if (!point) {
											var erraddr = '{$erraddr}';
											erraddr = erraddr.replace(/##/, address);
										  alert(erraddr);
										} else {
										  var txtaddr = '{$txtaddr}';
										  txtaddr = txtaddr.replace(/##/, address);
										  map".$mapnm.".setCenter(point);
										  map".$mapnm.".openInfoWindowHtml(point,txtaddr);
										  setTimeout('map".$mapnm.".closeInfoWindow();', 5000);
										}
									  });
								  }
							}";
				}
	
				if (($dir!='0')||(!empty($tolat)&&!empty($tolon))||!empty($toaddress)) {
				    $code .="function handleErrors".$mapnm."(){
								var dirsidebar".$mapnm." = document.getElementById('dirsidebar".$mapnm."');
								var newelem = document.createElement('p');
								if (directions".$mapnm.".getStatus().code == G_GEO_UNKNOWN_ADDRESS)
									newelem.innerHTML = 'No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.<br />Error code: ' + directions".$mapnm.".getStatus().code;
								else if (directions".$mapnm.".getStatus().code == G_GEO_SERVER_ERROR)
									newelem.innerHTML = 'A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.<br />Error code: ' + directions".$mapnm.".getStatus().code;
							    else if (directions".$mapnm.".getStatus().code == G_GEO_MISSING_QUERY)
									 newelem.innerHTML = 'The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.<br />Error code: ' + directions".$mapnm.".getStatus().code;
								//   else if (directions".$mapnm.".getStatus().code == G_UNAVAILABLE_ADDRESS)  <--- Doc bug... this is either not defined, or Doc is wrong
								//     newelem.innerHTML = 'The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons.<br />Error code: ' + directions".$mapnm.".getStatus().code;
								   else if (directions".$mapnm.".getStatus().code == G_GEO_BAD_KEY)
									 newelem.innerHTML = 'The given key is either invalid or does not match the domain for which it was given.<br />Error code: ' + directions".$mapnm.".getStatus().code;
								
								   else if (directions".$mapnm.".getStatus().code == G_GEO_BAD_REQUEST)
									 newelem.innerHTML = 'A directions request could not be successfully parsed.<br />Error code: ' + directions".$mapnm.".getStatus().code;
								   else newelem.innerHTML = 'An unknown error occurred.';
								dirsidebar".$mapnm.".appendChild(newelem); 
							}
								";
					}
					
				if ($dir!='0') {
					$code.="\nDirectionMarkersubmit".$mapnm." = function( formObj ){
								if(formObj.dir[1].checked ){
									tmp = formObj.daddr.value;
									formObj.daddr.value = formObj.saddr.value;
									formObj.saddr.value = tmp;
								}";
					if ($dir=='1')
						$code.="\nformObj.submit();";
					elseif ($dir=='2')
						$code.="\nformObj.submit();";
					elseif ($dir=='3')
						$code.="\nfor (var i=0; i < formObj.dirflg.length; i++) {
								   if (formObj.dirflg[i].checked) {
									  var dirflg= formObj.dirflg[i].value;
									  break;
								   }
								}
								MOOdalBox.open('".$protocol."maps.google.com/maps?dir=to&dirflg='+dirflg+'&saddr='+formObj.saddr.value+'&hl=en&daddr='+formObj.daddr.value+'".(($lang!='')?"&amp;hl=".$lang:"")."&pw=2', '".$lbxcaption."', '".$lbxwidth." ".$lbxheight."', null, 16);";
					elseif ($dir=='5') 
  							$code .= "\nfor (var i=0; i < formObj.dirflg.length; i++) {
										   if (formObj.dirflg[i].checked) {
											  var dirflg= formObj.dirflg[i].value;
											  break;
										   }
										}
										var dirsidebar".$mapnm." = document.getElementById('dirsidebar".$mapnm."');
										if (directions".$mapnm.") {
											directions".$mapnm.".clear();
											if ( dirsidebar".$mapnm.".hasChildNodes() )
												{
													while ( dirsidebar".$mapnm.".childNodes.length >= 1 )
													{
														dirsidebar".$mapnm.".removeChild( dirsidebar".$mapnm.".firstChild );       
													} 
												}
										} else {
											directions".$mapnm." = new GDirections(map".$mapnm.", dirsidebar".$mapnm.");
									        GEvent.addListener(directions".$mapnm.", 'error', handleErrors".$mapnm.");
										}
										options = Array();
										if (dirflg=='w')
											options.travelMode = G_TRAVEL_MODE_WALKING;
										if (dirflg=='h')
											options.avoidHighways = true;
										directions".$mapnm.".load('from: '+formObj.saddr.value+' to: '+formObj.daddr.value, options);
									";
					else
						$code.="\nfor (var i=0; i < formObj.dirflg.length; i++) {
								   if (formObj.dirflg[i].checked) {
									  var dirflg= formObj.dirflg[i].value;
									  break;
								   }
								}
								MOOdalBox.open('".$protocol."maps.google.com/maps?dir=to&dirflg='+dirflg+'&saddr='+formObj.saddr.value+'&hl=en&daddr='+formObj.daddr.value+'".(($lang!='')?"&amp;hl=".$lang:"")."', '".$lbxcaption."', '".$lbxwidth." ".$lbxheight."', null, 16);";
						
					$code.="\nif(formObj.dir[1].checked )
								setTimeout('DirectionRevert".$mapnm."()',100);
							};";
					
					$code.="\nDirectionRevert".$mapnm." = function(){
								formObj = document.getElementById('directionform".$mapnm."');
								tmp = formObj.daddr.value;
								formObj.daddr.value = formObj.saddr.value;
								formObj.saddr.value = tmp;
							};";
				}
				
				// Function for overview
				if(!$overview==0&&$this->check_google_api_version($google_API_version, "2.93"))
				{
					$code.="\nfunction checkOverview".$mapnm."() {
						        var overmap = overviewmap".$mapnm.".getOverviewMap();
								if (overmap) {
								  // ======== get a reference to the GMap2 ===========
								  ovmap".$mapnm." = overviewmap".$mapnm.".getOverviewMap();
							";
								  
					if($overview==2)
					{
						$code.="\n		setTimeout('overviewmap".$mapnm.".hide(true);',1);";
					}

					switch ($mapType) {
					case "Satellite":
					
						$code.="\n		setTimeout('ovmap".$mapnm.".setMapType(G_SATELLITE_MAP);',1);";
						break;
					
					case "Hybrid":
						$code.="\n		setTimeout('ovmap".$mapnm.".setMapType(G_HYBRID_MAP);',1);";
						break;

					case "Terrain":
						$code.="\n		setTimeout('ovmap".$mapnm.".setMapType(G_PHYSICAL_MAP);',1);";
						break;
					
					case "Earth":
						$code.="\n		setTimeout('ovmap".$mapnm.".setMapType(G_SATELLITE_3D_MAP);',1);";
						break;

					default:
						$code.="\n		setTimeout('ovmap".$mapnm.".setMapType(G_NORMAL_MAP);',1);";
						break;
					}

					$code.= "\n	} else {
								  setTimeout('checkOverview".$mapnm."()',100);
								}
							  }";
				}

				// Functions to wacth if the map has changed
				$code.="\nfunction checkMap".$mapnm."()
				{
					if (tst".$mapnm.")
						if (tst".$mapnm.".offsetWidth != tst".$mapnm.".getAttribute(\"oldValue\"))
						{
							tst".$mapnm.".setAttribute(\"oldValue\",tst".$mapnm.".offsetWidth);
	
							if (tst".$mapnm.".getAttribute(\"refreshMap\")==0)
								if (tst".$mapnm.".offsetWidth > 0) {
									clearInterval(tstint".$mapnm.");";
				if ($effect !='none') 
					$code .="\n					mySlidemap".$mapnm." = new Fx.Slide('googlemap".$mapnm."',{wait:true, duration: 1500, transition:Fx.Transitions.Bounce.easeOut, mode: '".$effect."'})
									mySlidemap".$mapnm.".hide();
									mySlidemap".$mapnm.".slideIn();
									mySlidemap".$mapnm.".slideOut().chain(function(){
											mySlidemap".$mapnm.".slideIn();
										});";
		
				$code .="\n					getMap".$mapnm."();
									tst".$mapnm.".setAttribute(\"refreshMap\", 1);
								} 
						}
				}
				";

				if ($sv!="none") {
					$code .="function onYawChange".$mapnm."(newYaw) {
								var GUY_NUM_ICONS = 16;
								var GUY_ANGULAR_RES = 360/GUY_NUM_ICONS;
								if (newYaw < 0) {
									newYaw += 360;
								}
								var guyImageNum = Math.round(newYaw/GUY_ANGULAR_RES) % GUY_NUM_ICONS;
								var guyImageUrl = 'http://maps.google.com/intl/en_us/mapfiles/cb/man_arrow-' + guyImageNum + '.png';
								svmarker".$mapnm.".setImage(guyImageUrl);
							}

							function onNewLocation".$mapnm."(point) {
								// Get the original x + y coordinates
								svmarker".$mapnm.".setLatLng(point.latlng);
								map".$mapnm.".panTo(point.latlng);
								svlastpoint".$mapnm." = point.latlng;
							}

							function onDragEnd".$mapnm."() {
								var latlng = svmarker".$mapnm.".getLatLng();
								if (svpanorama".$mapnm.") {
									svclient".$mapnm.".getNearestPanorama(latlng, svonResponse".$mapnm.");
								}
							}

							function svonResponse".$mapnm."(response) {
								if (response.code != 200) {
									svmarker".$mapnm.".setLatLng(svlastpoint".$mapnm.");
									map".$mapnm.".setCenter(svlastpoint".$mapnm.");
								} else {
									var latlng = new GLatLng(response.Location.lat, response.Location.lng);
									svmarker".$mapnm.".setLatLng(latlng);
									svlastpoint".$mapnm." = latlng;
									svpanorama".$mapnm.".setLocationAndPOV(latlng, null);
								}
							}
							";
				}
	
				// Function for displaying the map and marker
				$code.="	function getMap".$mapnm."(){
					if (tst".$mapnm.".offsetWidth > 0) {
						map".$mapnm." = new GMap2(document.getElementById('googlemap".$mapnm."')".(($googlebar=='1'&&!empty($searchoptions))?", { googleBarOptions: {".$searchoptions." } }":"").");
						map".$mapnm.".getContainer().style.overflow='hidden';
						";
				
				if ($sv!="none")
					$code.="svclient".$mapnm." = new GStreetviewClient();";
					
				if($keyboard=='1'&&$controltype=='user')
				{
					$code.="new GKeyboardHandler(map".$mapnm.");
					";
				} 
				if($dragging=="0")
					$code.="map".$mapnm.".disableDragging();";

				if ($controltype=='user') {
					switch ($zoomType) {
						case "Large":
							$code.="map".$mapnm.".addControl(new GLargeMapControl());";
							break;
						case "Small":
							$code.="map".$mapnm.".addControl(new GSmallMapControl());";
							break;
						case "3D-large":
							$code.="map".$mapnm.".addControl(new GLargeMapControl3D());";
							break;
						case "3D-small":
							$code.="map".$mapnm.".addControl(new GSmallZoomControl3D());";
							break;
						default:
							break;
					}
					
					if($showmaptype!='0')
					{
						$code.="map".$mapnm.".addControl(new GMapTypeControl());";
					} 
	
					if ($showscale==1)
						$code.="map".$mapnm.".addControl(new GScaleControl());";
				} else
					$code.="map".$mapnm.".setUIToDefault();";
				
				if ($this->check_google_api_version($google_API_version, "2.93"))
					$code.="map".$mapnm.".addMapType(G_PHYSICAL_MAP);";
				if ($this->check_google_api_version($google_API_version, "2.113"))
					$code.="map".$mapnm.".addMapType(G_SATELLITE_3D_MAP);";

				if(!$overview==0&&$this->check_google_api_version($google_API_version, "2.93"))
				{
					$code.="overviewmap".$mapnm." = new GOverviewMapControl();";
					$code.="map".$mapnm.".addControl(overviewmap".$mapnm.", new GControlPosition(G_ANCHOR_BOTTOM_RIGHT));";
					$code.="setTimeout('checkOverview".$mapnm."()',100);";

				} elseif (!$overview==0) {
					$code.="overviewmap".$mapnm." = new GOverviewMapControl();";
					$code.="map".$mapnm.".addControl(overviewmap".$mapnm.", new GControlPosition(G_ANCHOR_BOTTOM_RIGHT));";
					
					if($overview==2)
					{
						$code.="overviewmap".$mapnm.".hide(true);";
					}
				}

				if($navlabel == 1)
					$code.="map".$mapnm.".addControl(new GNavLabelControl(), new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(7, 30)));";

				if($client_geo == 1)
				{
					$code.="var geocoder = new GClientGeocoder();";
					$replace = array("\n", "\r", "&lt;br/&gt;", "&lt;br /&gt;", "&lt;br&gt;");
					$addr = str_replace($replace, '', $address);

					$code.="var address = \"".$addr."\";";
					$code.="geocoder.getLatLng(address, function(point) {
								if (!point)";
								
					if ($latitude !=''&&$longitude!='')
						$code.="var point = new GLatLng( $latitude, $longitude);";
					else
						$code.="var point = new GLatLng( $deflatitude, $deflongitude);";
				} else { 
					if ($latitude !=''&&$longitude!='')
						$code.="var point = new GLatLng( $latitude, $longitude);";
					else
						$code.="var point = new GLatLng( $deflatitude, $deflongitude);";
				}
				if (!empty($centerlat)&&!empty($centerlon))
					$code.="var centerpoint = new GLatLng( $centerlat, $centerlon);";
				else
					$code.="var centerpoint = point;";

				if ($inline_coords == 0 && count($kml)>0)
					$code.="map".$mapnm.".setCenter(new GLatLng(0, 0), 0);
					";					
				else
					$code.="map".$mapnm.".setCenter(centerpoint, ".$zoom.");
					";					
					
				if (count($kml)>0) {
					switch ($kmlrenderer) {
						case "google":
						default:
							$code .= "var xml = [];";
							foreach ($kml as $idx => $val) {
								
								$code .= "var kmlurl = '".$kml[$idx]."';";
								$code .= "kmlurl = kmlurl.replace(/&amp;/g, String.fromCharCode(38));";
								$code .= "\nxml[".$idx."] = new GGeoXml(kmlurl);";
								$code .= "\nmap".$mapnm.".addOverlay(xml[".$idx."]);";
							}
							if ($inline_coords==0)
								$code .= "\nxml[0].gotoDefaultViewport(map".$mapnm.");";

							break;
						case "geoxml":
							$code .= "var kml".$mapnm." = [];";
							foreach ($kml as $idx => $val) {
								$code .= "\nvar kmlurl = '".$kml[$idx]."';";
								$code .= "\nkmlurl = escape(kmlurl.replace(/&amp;/g, String.fromCharCode(38)));";
								$code .= "\nkml".$mapnm.".push(kmlurl);";
							}
							$xmloptions = array();
							if ($kmlsidebar=="left"||$kmlsidebar=="right") {
								$xmloptions[] = "sidebarid: 'kmlsidebar".$mapnm."'";
							} else {
								if ($kmlsidebar!="none")
									$xmloptions[] = "sidebarid: '".$kmlsidebar."'";
							}
							if ($kmlmessshow=='1')
								$xmloptions[] = "messshow: true";
							
							if ($inline_coords==1)
								$xmloptions[] = "nozoom: true";

							if ($dir!='0') {
								$xmloptions[] = "directions: true";
							}
							
							if ($kmlsbsort=='asc') {
								$xmloptions[] = "sortbyname: 'asc'";
							}elseif ($kmlsbsort=='desc') {
								$xmloptions[] = "sortbyname: 'desc'";
							} else 	
								$xmloptions[] = "sortbyname: 'none'";
								
							$code .= "\nexml".$mapnm." = new GeoXml(\"exml".$mapnm."\", map".$mapnm.", kml".$mapnm.", {".implode(",",$xmloptions)."});";
							$code .= "\nexml".$mapnm.".parse(); ";
							break;
					}
				}
				
				if ($traffic=='1') {
					$code .= "\ntrafficInfo".$mapnm." = new GTrafficOverlay();";
					$code .= "\nmap".$mapnm.".addOverlay(trafficInfo".$mapnm.");";
				}

				if ($panoramio=="1") {
					$code .= "panoramio".$mapnm." = new PanoramioLayer(map".$mapnm.");";
					$code .= "panoramio".$mapnm.".enable(map".$mapnm.");";
				}

				if ($localsearch=='1') {
					$code .= "localsearch".$mapnm." = new google.maps.LocalSearch(".((!empty($searchoptions))?"{ ".$searchoptions." }":"").");";
					$code .= "map".$mapnm.".addControl(localsearch".$mapnm.", new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));";
					if (!empty($searchtext))
						$code .= "localsearch".$mapnm.".execute('".$searchtext."');";
				}
				
				if ($googlebar=='1') {
					$code .= "map".$mapnm.".enableGoogleBar();";
				}

				if ($adsmanager=='1') {
					$code .= "adsmanager".$mapnm." = new GAdsManager(map".$mapnm.", ".((!empty($adsense))?"'".$adsense."'":"''").", { maxAdsOnMap: ".$maxads.((!empty($searchtext))?", keywords: '".$searchtext."'":"").((!empty($channel)&&!empty($adsense))?", channel: '".$channel."'":"")."}); ";
					$code .= "adsmanager".$mapnm.".enable();";
				}

				if ($this->debug_plugin=="1")
					$code.="map".$mapnm.".addControl(new VersionControl());";

				if ((!empty($tolat)&&!empty($tolon))||!empty($toaddress)) {
					// Route
					$xmloptions = array();
					if ($dirtype=='W')
						$xmloptions[] = "travelMode : G_TRAVEL_MODE_WALKING";
					else
						$xmloptions[] = "travelMode : G_TRAVEL_MODE_DRIVING";
					
					if ($avoidhighways=='1')
						$xmloptions[] = "avoidHighways : true";
					else
						$xmloptions[] = "avoidHighways : false";
					
					$code .= "var dirsidebar".$mapnm." = document.getElementById('dirsidebar".$mapnm."');";
					$code .= "if (directions".$mapnm.") {
									directions".$mapnm.".clear();
									if ( dirsidebar".$mapnm.".hasChildNodes() )
									{
										while ( dirsidebar".$mapnm.".childNodes.length >= 1 )
										{
											dirsidebar".$mapnm.".removeChild( dirsidebar".$mapnm.".firstChild );       
										} 
									}
							} else {
									directions".$mapnm." = new GDirections(map".$mapnm.", dirsidebar".$mapnm.");
									GEvent.addListener(directions".$mapnm.", 'error', handleErrors".$mapnm.");
								}
						";
					$code .= "directions".$mapnm.".load('from: ".$latitude.", ".$longitude." to: ".$tolat.", ".$tolon."', {".implode(",",$xmloptions)."});";
				}
				
				switch ($mapType) {
				case "Satellite":
					$code.="map".$mapnm.".setMapType(G_SATELLITE_MAP);";
					break;
				
				case "Hybrid":
					$code.="map".$mapnm.".setMapType(G_HYBRID_MAP);";
					break;

				case "Terrain":
					if ($this->check_google_api_version($google_API_version, "2.93"))
						$code.="map".$mapnm.".setMapType(G_PHYSICAL_MAP);";
					else 
						$code.="map".$mapnm.".setMapType(G_NORMAL_MAP);";
					break;

				case "Earth":
					if ($this->check_google_api_version($google_API_version, "2.113"))
						$code.="map".$mapnm.".setMapType(G_SATELLITE_3D_MAP);";
					else 
						$code.="map".$mapnm.".setMapType(G_NORMAL_MAP);";
					break;
				
				default:
					$code.="map".$mapnm.".setMapType(G_NORMAL_MAP);";
					break;
				}

				if($zoom_new=='1'&&$controltype=='user')
				{
					$code.="
					map".$mapnm.".enableContinuousZoom();
					map".$mapnm.".enableDoubleClickZoom();
					";
				} else {
					$code.="
					map".$mapnm.".disableContinuousZoom();
					map".$mapnm.".disableDoubleClickZoom();
					";
				}

				if($zoom_wheel=='1'&&$controltype=='user')
				{
					$code.="map".$mapnm.".enableScrollWheelZoom();
					";
				} 

				if (($inline_coords == 0 && count($kml)==0) // No inline coordinates and no kml => standard configuration
					||($latitude !=''&&$longitude!='')) { // Inline coordinates and text is not empty

//					previous:  ||($inline_coords == 1 && $text !='')) { // Inline coordinates and text is not empty
//					previous: if (($inline_coords == 1&&!(count($kml)>0&&$text==''))||($inline_coords == 0 && count($kml)==0)) {

					$options = '';
					
					if ($tooltip!='') 
						$options .= (($options!='')?', ':'')."title:\"".$tooltip."\"";
					if ($icon!='')
						$options .= (($options!='')?', ':'')."icon:markericon".$mapnm;
					
					$code.="var marker".$mapnm." = new GMarker(point".(($options!='')?', {'.$options.'}':'').");";
					
					$code.="map".$mapnm.".addOverlay(marker".$mapnm.");
					";

					if ($text!=''||$dir!='0') {

						if ($dir!='0') {
							$dirform="<form id='directionform".$mapnm."' action='".$protocol."maps.google.com/maps' method='get' target='_blank' onsubmit='DirectionMarkersubmit".$mapnm."(this);return false;' class='mapdirform'>";
								
							$dirform.="<br />".$txt_dir."<input ".(($txt_to=='')?"type='hidden' ":"type='radio' ")." ".(($dirdef=='0')?"checked":"")." name='dir' value='to'>".(($txt_to!='')?$txt_to."&nbsp;":"")."<input ".(($txt_from=='')?"type='hidden' ":"type='radio' ").(($dirdef=='1')?"checked":"")." name='dir' value='from'>".(($txt_from!='')?$txt_from:"");
							$dirform.="<br />".$txt_diraddr."<input type='text' class='inputbox' size='20' name='saddr' id='saddr' value='' /><br />";

							if ($txt_driving!=''||$dirtype=="D")
								$dirform.="<input ".(($txt_driving=='')?"type='hidden' ":"type='radio' ")."class='radio' name='dirflg' value='' ".(($dirtype=="D")?"checked":"")." />".$txt_driving.(($txt_driving!='')?"&nbsp;":"");
							if ($txt_avhighways!=''||$dirtype=="1")
								$dirform.="<input ".(($txt_avhighways=='')?"type='hidden' ":"type='radio' ")."class='radio' name='dirflg' value='h' ".(($avoidhighways=='1')?"checked":"")." />".$txt_avhighways.(($txt_avhighways!='')?"&nbsp;":"");
							if ($txt_walking!=''||$dirtype=="W")
								$dirform.="<input ".(($txt_walking=='')?"type='hidden' ":"type='radio' ")."class='radio' name='dirflg' value='w' ".(($dirtype=="W")?"checked":"")." />".$txt_walking.(($txt_walking!='')?"&nbsp;":"");
							if ($txt_driving!=''||$txt_avhighways!=''||$txt_walking!='')
								$dirform.="<br />";	
							$dirform.="<input value='".$txt_get_dir."' class='button' type='submit' style='margin-top: 2px;'>";
							
							if ($dir=='2')
								$dirform.= "<input type='hidden' name='pw' value='2'/>";

							if ($lang!='') 
								$dirform.= "<input type='hidden' name='hl' value='".$lang."'/>";

							if (!empty($address))
								$dirform.="<input type='hidden' name='daddr' value='".$address." (".$latitude.", ".$longitude.")'/></form>";
							else
								$dirform.="<input type='hidden' name='daddr' value='".$latitude.", ".$longitude."'/></form>";
							
							// Add form before div or at the end of the html.
							$pat="/&lt;\/div&gt;$/";
							if (preg_match($pat, $text))
								$text = preg_replace($pat, $dirform."</div>", $text);
							else
								$text.=$dirform;
						}
						
						$text = $this->_htsdecode($text, ENT_NOQUOTES);

						// If marker 
						if ($marker==1)
							$code.="marker".$mapnm.".openInfoWindowHtml(\"".$text."\");";
						
						$code.="GEvent.addListener(marker".$mapnm.", 'click', function() {
								marker".$mapnm.".openInfoWindowHtml(\"".$text."\");
								});
						";
					}
				}
				
				if ($imageurl!='') {
					$code .= "imageovl".$mapnm." = new GScreenOverlay('$imageurl',
											new GScreenPoint($imagex, $imagey, '$imagexyunits', '$imagexyunits'),  // screenXY
											new GScreenPoint($imageanchorx, $imageanchory, '$imageanchorunits', '$imageanchorunits'),  // overlayXY
											new GScreenSize($imagewidth, $imageheight)  // size on screen
										);
								map".$mapnm.".addOverlay(imageovl".$mapnm.");
						";
				}
				if ($sv=='top'||$sv=='bottom'||($sv!='none'&&$sv!='top'&&$sv!='bottom')) {
					if ($sv!='none'&&$sv!='top'&&$sv!='bottom')
						$code.="\nvar panobj = document.getElementById('".$sv."');
								";
					else
						$code.="\nvar panobj = document.getElementById('svpanorama".$mapnm."');
								";
					$svopt = "";
					if ($svyaw!='0')
						$svopt .= "yaw:".$svyaw;
					if ($svpitch!='0')
						$svopt .= (($svopt=="")?"":", ")."pitch:".$svpitch;
					if ($svzoom!='')
						$svopt .= (($svopt=="")?"":", ")."zoom:".$svzoom;
						
					$code.="\nsvpanorama".$mapnm." = new GStreetviewPanorama(panobj);
							svlastpoint".$mapnm." = map".$mapnm.".getCenter();
							svpanorama".$mapnm.".setLocationAndPOV(svlastpoint".$mapnm.", ".(($svopt!='')?"{".$svopt."}":'null').");
							svmarker".$mapnm." = new GMarker(svlastpoint".$mapnm.", {icon: guyIcon".$mapnm." , draggable: true});
							map".$mapnm.".addOverlay(svmarker".$mapnm.");
							GEvent.addListener(svmarker".$mapnm.", 'dragend', onDragEnd".$mapnm.");
							GEvent.addListener(svpanorama".$mapnm.", 'initialized', onNewLocation".$mapnm.");
							GEvent.addListener(svpanorama".$mapnm.", 'yawchanged', onYawChange".$mapnm."); 
							";
				}

				if($zoom_wheel=='1')
				{
					$code.="GEvent.addDomListener(tst".$mapnm.", 'DOMMouseScroll', CancelEvent".$mapnm.");
							GEvent.addDomListener(tst".$mapnm.", 'mousewheel', CancelEvent".$mapnm.");
						";
				}

				/* remove copyright, terms and mapdata. Do not use 					
				$code.= "test_div = document.getElementById('googlemap".$mapnm."');";
				$code.= "test_obj = test_div.childNodes[1].style.display='none';";
				$code.= "test_obj = test_div.childNodes[2].style.display='none';";
				*/

				if($client_geo == 1)
				{
					$code.="		       
								  });";
				}

				// End of script voor showing the map 
				$code.="}
			}
			//]]></script>
			";
	
			// Call the Maps through timeout to render in IE also
			// Set an event for watching the changing of the map so it can refresh itself
			$code.= "<script type=\"text/javascript\">//<![CDATA[
					if (GBrowserIsCompatible()) {
                        window.onunload=function(){window.onunload;GUnload()};
						tst".$mapnm.".setAttribute(\"oldValue\",0);
						tst".$mapnm.".setAttribute(\"refreshMap\",0);
						";
			$code.= "if (window.MooTools==null)
						tstint".$mapnm."=setInterval(\"checkMap".$mapnm."()\",".$timeinterval.");
					else
						window.addEvent('domready', function() {
   								tstint".$mapnm."=setInterval('checkMap".$mapnm."()',".$timeinterval.");
							});
					";

			$code.= "}
			//]]></script>
			";
			$endmem = round($this->memory_get_usage()/1024);
			$diffmem = $endmem-$startmem;
			$this->debug_log("Memory Usage End: " . $endmem . " KB (".$diffmem." KB)");
			if ($this->debug_text!='')
				$code = "\n<!-- ".$this->debug_text."\n-->\n".$code;
				
			$this->debug_text = '';
			// Depending of show place the code at end of page or on the {mosmap} position		
			if ($show==0) {
				$row->text = preg_replace($regex, $lbcode, $row->text, 1);
				$row->text .= $code;
			} else
				$row->text = preg_replace($regex, $code, $row->text, 1);
			} 
	
		}

		return true;
	}
}
?>
