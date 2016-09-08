<?php
/**
 * @version $Id $
 * @package JamboWorks
 * @subpackage FadeImages
 * @copyright 2006 JamboWorks LLC.  All rights reserved.
 * @license GNU General Public License
 */

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

$_MAMBOTS->registerFunction( 'onPrepareContent', 'botFadeImages' );

/**
* Code Highlighting Mambot
*
* Replaces {fadeimages} tags with highlighted text
*/
function botFadeImages( $published, &$row, &$params, $page=0 ) {
	global $mosConfig_absolute_path, $mosConfig_live_site, $mainframe;
	static $scriptDone;

	require_once( $mosConfig_absolute_path . '/includes/domit/xml_saxy_shared.php' );

	// define the regular expression for the bot
	$regex = "#{fadeimages\s*(.*?)}(.*?){/fadeimages}#s";

	// check whether mambot has been unpublished
	if (!$published) {
		return true;
	}
	$GLOBALS['_MAMBOT_FADEIMAGE_PARAMS'] =& $params;

	if (!$scriptDone) {
		$mainframe->addCustomHeadTag( '<script src="'.$mosConfig_live_site.'/mambots/content/fadeimages.js" type="text/javascript"></script>' );
		$scriptDone = true;
	}

	// perform the replacement
	$row->text = preg_replace_callback( $regex, 'botFadeImage_replacer', $row->text );

	return true;
}
/**
* Replaces the matched tags an image
* @param array An array of matches (see preg_match_all)
* @return string
*/
function botFadeImage_replacer( &$matches ) {
	static $counter;
	global $mosConfig_absolute_path, $mosConfig_live_site;

	if ($counter == null) {
		$counter = 0;
	}
 
	$params =& $GLOBALS['_MAMBOT_FADEIMAGE_PARAMS'];

	$attribs = str_replace( '&quot;', '"',  $matches[1] );
	$args = SAXY_Parser_Base::parseAttributes( $attribs );
	$text = $matches[2];

	$width	= (int) mosGetParam( $args, 'width', 100 );
	$height	= (int) mosGetParam( $args, 'height', 200 );
	$folder	= mosGetParam( $args, 'folder' );
	$folder	= str_replace( '..', '', $folder );

	$url = $mosConfig_live_site . '/images/stories';

	$path = $mosConfig_absolute_path . '/images/stories/' . $folder;
	if (is_dir( $path )) {
		$url .= '/' . $folder;
	}

	$images = explode( ',', $text );
	$text = '<script type="text/javascript">';
	$text .= "\nfadeimages{$counter} = new Array();";
	$n = count( $images );
	for ($i = 0; $i < $n; $i++) {
		$parts = explode( '|', trim( $images[$i] ) );
		$image = trim( $parts[0] );
		$link = @trim( $parts[1] );
		$target = @trim( $parts[2] );
		$text .= "\nfadeimages{$counter}[$i]=['$url/$image', '$link', '$target'];";
	}
	$text .= "\nnew fadeshow(fadeimages{$counter}, $width, $height, 0, 3000, 1, 'R')";
	$text .= "\n</script>";

	$counter++;
	return $text;
}
?>