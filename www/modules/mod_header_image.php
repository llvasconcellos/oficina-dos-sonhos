<?php
/**
* Content code
* @package Header Image Module
* @ Copyright (C) 2005 Mike Pillwax
* @ http://www.pillwax.com
* @ All rights reserved
* @ Header Image is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @ Version for Joomla! 1.0.x
*
* 1.0  - Initial version.
* 1.1  - Minor corrections after heavy testing by users...
*      - Added support for Main Menu ID / Current Menu Item ID.
* 1.2  - Debug Mode can now be switched from the parameters page.
*      - Added logic to ensure correct path generation.
* 1.3  - Some bug with the path generation fixed, now also checking the image path for missing slashes.
	   - Bug fixed that did only generate the first digit on a multidigit sec./cat.id
	   - Added the feature to define a hyperlink to the picture and allow it also for the default image.
	   - Added the feature to use a random image instead the default image in case the relevant image does not exist.
* 1.31 - Slash problem fix, we now send the full URL for the image and this now also supports Mambo installations.
		 that are in a subdir.
* 1.32 - Made some little modification to make sure that the default image shows when no related information is present.
       - Random image selection beefed up with only looking at files to not accidentally select a subdir as image.
* 1.4  - Now also supports HTML Code for incorporating other file types as images, such as MacroMedia Flash files.
* 1.41 - Now also supports page and table background mode where only file URL is sent.
* 1.42 - DIV tag is now only sent for image tags, not in other modes
* 1.43 - Filtering <br /> tags in html code textarea
*      - Allowing wildcards on files and smartly including html files with .html extension
* 1.44 - Fixed incorrect section/category behaviour on blogs and list of contents
* 1.45 - Moved common functions into include file for multiple instances
*      - Added support for MambelFish Multi-Language and localized files
* 1.46 - Fixed code error in localizaiton
*      - Improved the section/category-ID detection
* 1.50 - Added "Smart Mode" for images totally individual to content
*      - Fixed issue where no random file is generated
* 1.51 - Added SEF support for MambelFish multi-language sites
* 1.52 - Added Tooltip Box from Jaap Scheper
* 1.53 - Smart Mode Bugfix, Added ContentID capability to SmartMode with score compare of available files
* 1.54 - Fixed Tooltip for multiple instances.
* 1.55 - Added Support for MTREE Component - see http://www.mosets.com/tree
*      - Fix for SmartMode count of files
* 1.56 - Added 2/4-letter language code selection
*      - Added supression of default image option
*			 - Added VirtueMart support - see http://virtuemart.net
* 1.57 - Added Slideshow feature
*      - Added Component filter support
**/
$my_himg_version = '1.57';

// Look for support functions //
if (!function_exists( 'reverse_strrchr' )) {
    include_once($mosConfig_absolute_path."/modules/mod_header_image/mhi_helper_functions.inc");
}
// Look for MambelFish integration module //
if (!function_exists( 'LocalizeText' )) {
    include_once($mosConfig_absolute_path."/modules/mod_header_image/mhi_mambelfish_integration.inc");
}


defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );


/* ************** Load Variables *********************** */
$ImageFileType =trim($params->get( 'ImageFileType' ));
$imagesFolder = trim($params->get( 'imagesFolder' ));

$UseAdefaultImage = trim($params->get ( 'UseAdefaultImage', '1' ));
$defaultImageFilename = trim($params->get( 'defaultImageFilename' ));
$ImagePrefix = trim($params->get ( 'ImagePrefix' ));
$ImageExtension = trim($params->get( 'ImageExtension' ));

$LinkedTo = trim($params->get ( 'LinkedTo' ));
$LinkedToOption = strstr($LinkedTo,"_");
if ( $LinkedToOption<>'' ) { $LinkedTo=str_replace($LinkedToOption,"",$LinkedTo); }
$ComponentSpecificFiles = intval($params->get( 'ComponentSpecificFiles',0 ));

$Slideshow = intval($params->get ( 'Slideshow', 0 ));
$Slideshow_Frequency = intval($params->get ( 'Slideshow_Frequency', 10 ))*1000;
$Slideshow_Pause = intval($params->get ( 'Slideshow_Pause', 0 ));
$Slideshow_RandomOrder = $params->get ( 'Slideshow_RandomOrder', '' );
$Slideshow_Transition = $params->get ( 'Slideshow_Transition', 'fade' );
$Slideshow_BackgroundColor = $params->get ( 'Slideshow_BackgroundColor', '' );
$Slideshow_RandomImagesNr = intval($params->get ( 'Slideshow_RandomImagesNr', 0 ));
if ( ( $ImageFileType != 'images' ) or ( strpos($LinkedTo, 'smart') != 0 ) ) { $SlideShow = 0; }

$ImageBorder = trim($params->get ( 'ImageBorder', '0' ));
$ImageAltText = LocalizeText( trim($params->get ( 'ImageAltText', '' )) );

$ImageToolTip = intval($params->get ( 'ImageToolTip', 0 ));
$ImageToolTipTitle = LocalizeText( strip_tags( str_replace( "\r", " ",trim($params->get('ImageToolTipTitle','')) ) , ENT_QUOTES ) );
$ImageToolTipText = LocalizeText( strip_tags( str_replace( "\r"," ",trim($params->get('ImageToolTipText','')) ) , ENT_QUOTES ) );
$ImageToolTipWidth = intval($params->get ( 'ImageToolTipWidth', 100 ));
$ImageToolTipHeight = intval($params->get ( 'ImageToolTipHeight', 50 ));

$ImageHyperLink = trim($params->get ( 'ImageHyperLink' ));
$ImageHyperLinkOnDefault = trim($params->get( 'ImageHyperLinkOnDefault' ));

$UseRandomImage = trim($params->get ( 'UseRandomImage' ));
$RandomImagesFolder = trim($params->get ( 'RandomImagesFolder' ));

$HTMLCode = trim($params->get( 'HTMLCode' ));
$Localize = trim($params->get( 'Localize', '0' ));
$moduleclass_sfx = trim($params->get( 'moduleclass_sfx', '' ));
$debug = trim($params->get( 'Debug' ));

$_mosConfig_live_site = $mosConfig_live_site;
$_mosConfig_absolute_path = $mosConfig_absolute_path;

$id = intval( mosGetParam( $_REQUEST, 'id', '0' ) );
$itemid = intval( mosGetParam( $_REQUEST, 'Itemid', '0' ) );
$task = strtolower( mosGetParam( $_REQUEST, "task", '' ) );
$language = strtolower( mosGetParam( $_REQUEST, "lang", '' ) );
$my_component = strtolower(mosGetParam( $_REQUEST, 'option', '') );
if ( $my_component == '' ) { $my_component = 'com_content'; }

global $mosConfig_locale, $mosConfig_mbf_content;
global $database;


// Debug Hello...
if( $debug=='1' ) {
	echo '<b>HEADER IMAGE is in Debug Mode: Version is '.$my_himg_version.'</b><br>';
	echo 'Current Component is ['.$my_component.']<br>';
}


/* ************** Some logic to ensure correct parameters and paths **** */
// If no current MambelFish language is detected, use the site language
// And if no language is still found deactivate localization
$language = strtolower( mosGetParam( $_REQUEST, "lang", "") );
if ( ($language == "") and ($mosConfig_mbf_content == '1') ) {
    // If Language information not in Request Header it might be available through client cookie of MambelFish
    $mbfcookie = mosGetParam( $_COOKIE, 'mbfcookie', null );
	if (isset($mbfcookie["lang"]) && $mbfcookie["lang"] != "") {
		$language = strtolower( $mbfcookie["lang"] );
	}
}
// If still no language found, use the local language of the installation
if ( $language == '') { $language = strtolower( $mosConfig_locale ); }
if ( $language == '') {
	$Localize = '0'; 
} else {
	// Make the language code 2-letter if option is set
	if ( $Localize == '2' ) {
		$language=substr($language,0,2);
		// From here on we have the language set, so the option is reset to ON only
		$Localize='1';
	}
}


// make sure the extension is defined correctly
$ImageExtension = '.' . ltrim(strrchr($ImageExtension,"."),'.');
// check if ImageFileType is set to supported value, otherwise set to "image"
// look at HTMLCode and if it is empty, revert back to image mode
if (($ImageFileType != 'image') and ($ImageFileType != 'html') and ($ImageFileType != 'table')) { $ImageFileType = 'image'; }
if (($ImageFileType == 'html') and ($HTMLCode == '')) { $ImageFileType = 'image'; }
// check if image extension is there, otherwise use ".jpg" as default
if ( $ImageExtension == '' ) { $ImageExtension = '.jpg'; }

if (substr($_mosConfig_live_site, -1, 1) == '/') {
	// remove trailing slash from this path if there is one
    $_mosConfig_live_site = substr($_mosConfig_live_site, 0, strlen($_mosConfig_live_site)-1);
}
if (substr($_mosConfig_absolute_path, -1, 1) == '/') {
	// remove trailing slash from this path if there is one
    $_mosConfig_absolute_path = substr($_mosConfig_absolute_path, 0, strlen($_mosConfig_absolute_path)-1);
}
if (substr($imagesFolder, -1, 1) != '/') {
	// add trailing slash to this path is there is none
    $imagesFolder = $imagesFolder . '/';
}
if (substr($imagesFolder, 0, 1) != '/') {
	// add leading slash to this path is there is none
    $imagesFolder = '/' . $imagesFolder;
}
if (substr($RandomImagesFolder, -1, 1) != '/') {
	// add trailing slash to this path is there is none
    $RandomImagesFolder = $RandomImagesFolder . '/';
}
if (substr($RandomImagesFolder, 0, 1) != '/') {
	// add leading slash to this path is there is none
    $RandomImagesFolder = '/' . $RandomImagesFolder;
}
// Add langauge code to the folders if we are in localization
if ($Localize=='1') {
// Check if a localized version of the default image is there and change die folders, otherwise disable localization
// Also check if the localized directories are there and switch to them
    if ( $debug == '1' ) { echo 'Trying to localize...<br>'; }
    if ( file_exists($_mosConfig_absolute_path . $imagesFolder . $language . '/' . $defaultImageFilename) ) {
        if ( file_exists($_mosConfig_absolute_path . $imagesFolder . $language . '/') ) { $imagesFolder = $imagesFolder . $language . '/'; }
        if ( file_exists($_mosConfig_absolute_path . $RandomImagesFolder . $language . '/') ) { $RandomImagesFolder = $RandomImagesFolder . $language . '/'; }
        if ( $debug == '1' ) {
            echo 'Looking for localized images in: '.$_mosConfig_live_site.$imagesFolder.'<br>';
            echo 'Looking for localized random images in: '.$_mosConfig_live_site.$RandomImagesFolder.'<br>';
        }
    } else {
        if ( $debug == '1' ) { echo 'Localization deactivated, no localized default image found in: '.$_mosConfig_live_site.$imagesFolder.$language.'<br>'; }
        $Localize = '0';
    }
}


/* ************** Begin main code execution *********************** */

// set up the query, the '#__' is converted into the table prefix by MAMBO itself
// selects either section-id, category-id or the menu item id (that one comes from the browsers url)
$query = "";
$my_itemID = "";
$my_sectionID = "";
$my_categoryID = "";
$my_contentID = "";
$my_image_id = "";
$my_image_file = "";

switch ($LinkedTo) {
	case "section":
		$my_image_id = null;
    // get the contents section if shown
    if (( strpos($task,'view') !== false ) or ($task == '')) { $query = "select sectionid as my_image_id from #__content where id='$id'"; }
    // if a section only is selected and no contentitem shown, the image_id is the sectionnumber
    if ( strpos($task,'section') !== false ) {
        $query = "";
        $my_image_id = $id;
    }
    // if a category only is selected and no contentitem shown, get the categories assigned sectionnumber
    if ( strpos($task,'category') !== false ) { $query = "select section as my_image_id from #__categories where id='$id'"; }
		break;

	case "category":
		$my_image_id=null;
    // get the contents category if shown
    if (( strpos($task,'view') !== false ) or ($task == '')) { $query = "select catid as my_image_id from #__content where id='$id'"; }
    // if a section only is selected and no contentitem shown, the image_id is the sectionnumber
    if ( strpos($task,'section') !== false ) {
        $query = "select id as my_image_id from #__categories where section='$id' order by ordering asc";
    }
    // if a category only is selected and no contentitem shown, the image_id is the categorynumber
    if ( strpos($task,'category') !== false ) {
        $query = "";
        $my_image_id = $id;
    }
		break;

	case "mainitemid":
		if ( $itemid != "" ) {
			$query = "select parent as my_image_id from #__menu where id='$itemid'";
		} else {
			$query = "";
		}
		$my_image_id = null;
		break;

	case "itemid":
		$query = "";
		$my_image_id = intval( mosGetParam( $_REQUEST, 'Itemid', null ) );
		break;

	case "smart":
    // In Smart-Mode we do a hierarchical search: ItemID -> SectionID -> CategoryID -> ContentID
    // A resulting filename has Ixx_Sxx_Cxx_xx for each hierarchical level we can have

    // 1st level - MenuID
		$my_itemID = $itemid;
    if ( $my_itemID == "0" ) { $my_itemID = ""; }

    // 2nd level - SectionID
  	$database->setQuery( "select sectionid from #__content where id='$id'" );
  	$row = null;
  	if ( $database->loadObject( $row ) ) { $my_sectionID = $row->sectionid; }
    if ( $my_sectionID == "0" ) { $my_sectionID = ""; }

    // 3rd level - CategoryID
  	$database->setQuery( "select catid from #__content where id='$id'" );
  	$row = null;
  	if ( $database->loadObject( $row ) ) { $my_categoryID = $row->catid; }
    if ( $my_categoryID == "0" ) { $my_categoryID = ""; }

		// 4th level - ContentID in case we show some content
		$my_contentID = $id;
		if ( $my_contentID == "0" ) { $my_contentID = ""; }

	
		// With SMART-Mode Options, we modify some of the IDs to support additional components
		switch ($LinkedToOption) {

			// For MTREE Component
			case '_mtree':
				// We quickly check if we are now working with the com_mtree component
				if ( strtolower(mosGetParam( $_REQUEST, 'option', '')) == 'com_mtree' ) {				
					$my_categoryID = mosGetParam( $_REQUEST, 'cat_id', '' );
	  			if( $debug=='1' ) {
	  				echo 'MTREE Support: Category ID = <'.$my_categoryID.'><br>';
	  			}
				}
				break;
				
			// For VirtueMart Component
			case '_virtuemart':
				// We quickly check if we are now working with the com_virtuemart component
				if ( strtolower(mosGetParam( $_REQUEST, 'option', '')) == 'com_virtuemart' ) {				
					$my_categoryID = mosGetParam( $_REQUEST, 'category_id', '' );
					$my_contentID = mosGetParam( $_REQUEST, 'Itemid', '' );
	  			if( $debug=='1' ) {
	  				echo 'VirtueMart Support: Category ID = <'.$my_categoryID.'><br>';
	  				echo 'VirtueMart Support: Item ID = <'.$my_contentID.'><br>';
	  			}
				}
				break;
		}

    break;

}

// For section and category look into the database
if ( $query != "" ) {
	$database->setQuery( $query );
	$row = null;
	if ($database->loadObject( $row )) {
		$my_image_id = $row->my_image_id;

		// for linking to the main menu id, only subitems to the current menu item return a number - so use the Itemid
		switch ($LinkedTo) {
			case "mainitemid":
				if ( $my_image_id == 0) { $my_image_id = $itemid; }
				break;
		}
	}
} else {
    // if we are in Smart Mode, no query required - build the image-ID
    // we look at scores to find the right picture - max score 4

		// First we open the image directory to see whats there
		$search_dir = $_mosConfig_absolute_path . $imagesFolder;
		if ( $ComponentSpecificFiles == 1 ) { $search_dir .= $my_component; }

				if( $debug=='1' ) {
					echo "Smart Mode: <br>";
					echo "- Search Dir: ".$search_dir."<br>";
				}

    if ( file_exists($search_dir) ) {
			// Create an array for all files found
		 	$tmp = Array();
			if ($dir = opendir($search_dir)) {
				// Add the files
		   	while($file = readdir($dir)) {
		    	// Make sure the file exists, disregard any entries that are not files
	       	if (($file != ".") && ($file != "..") && ($file[0] != '.') && (strrpos($file,'.') !== false)) {
	        	array_push($tmp, $file);
	       	}
		   	}
		   	// Finish off the function
		   	closedir($dir);
			}
			if ( count($tmp)>0 ) {
				// We look at each file and build its score and use the file with the highest match score
				$max_score = 0;
				$tmp_count = 0;
				while ( $tmp_count < count($tmp) ) {
					$tmp_score = 0;
				    if ($my_categoryID != "") { if ( preg_match( '/c'.$my_categoryID.'[^0-9]/', $tmp[$tmp_count] ) > 0 ) { $tmp_score++; } }
				    if ($my_sectionID != "") { if ( preg_match( '/s'.$my_sectionID.'[^0-9]/', $tmp[$tmp_count] ) > 0 ) { $tmp_score++; } }
				    if ($my_itemID != "") { if ( preg_match( '/i'.$my_itemID.'[^0-9]/', $tmp[$tmp_count] ) > 0 ) { $tmp_score++; } }
				    if ($my_contentID != "") { if ( preg_match( '/ci'.$my_contentID.'[^0-9]/', $tmp[$tmp_count] ) > 0 ) { $tmp_score++; } }
						if ($ComponentSpecificFiles == 2) { if ( preg_match( '/_'.$my_component.'/', $tmp[$tmp_count] ) > 0 ) { $tmp_score++; } }
	
					// Store the filename with the highest score
					if ( $tmp_score > $max_score ) {
						$max_score = $tmp_score;
						// Remove the ImagePrefix and Extension
						$my_image_id = $tmp[$tmp_count];
						$my_image_id = str_replace ( $ImagePrefix, "", $my_image_id);
						$my_image_id = substr( $my_image_id, 0, strpos( $my_image_id, ".") );
					}
					$tmp_count++;
				}
				// send some debug info on the smart mode operation
				if( $debug=='1' ) {
					echo "Smart Mode: <br>";
					echo "- Search Dir: ".$search_dir."<br>";
					echo "- Category ID: ".$my_categoryID."| Section ID: ".$my_sectionID."| Item ID: ".$my_itemID."| Content ID: ".$my_contentID."<br>";
					echo "- Files found: ".count($tmp)."<br>- Highest scored file: (".$max_score.") ImageID=".$my_image_id."<br>";
				}
			}
    }

}

// Build the image information
if ( $UseAdefaultImage == '1') { $my_image = $defaultImageFilename; } else { $my_image = ""; }

if ($my_image_id!='') {
	$my_image = $ImagePrefix . $my_image_id . $ImageExtension;
}

// If we are in Slideshow-Mode, take the initial image and build the slide show
// For all other modes, continue with standard functionality
if ( $Slideshow == 1 ) {
	include($mosConfig_absolute_path."/modules/mod_header_image/mhi_slideshow_images.inc");
}

// For static images of if the slideshow module was unable to produce output
if ( $Slideshow == 0 ) {
	include($mosConfig_absolute_path."/modules/mod_header_image/mhi_static_images.inc");
}

?>