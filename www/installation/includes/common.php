<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* Common functions used throughout the JoomlaPack Installer script
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

// Limit error reporting to fatal errors
error_reporting( E_ERROR | E_PARSE );

// Use no caching, as this installation script is meant to be always run, not loaded from cache
header ("Cache-Control: no-cache, must-revalidate");	// HTTP/1.1
header ("Pragma: no-cache");	// HTTP/1.0

ob_start();

/**
* Utility function to return a value from a named array or a specified default
*/

define( "_MOS_NOTRIM", 0x0001 );
define( "_MOS_ALLOWHTML", 0x0002 );
function mosGetParam( &$arr, $name, $def=null, $mask=0 ) {
	$return = null;
	if (isset( $arr[$name] )) {
		if (is_string( $arr[$name] )) {
			if (!($mask&_MOS_NOTRIM)) {
				$arr[$name] = trim( $arr[$name] );
			}
			if (!($mask&_MOS_ALLOWHTML)) {
				$arr[$name] = strip_tags( $arr[$name] );
			}
			if (!get_magic_quotes_gpc()) {
				$arr[$name] = addslashes( $arr[$name] );
			}
		}
		return $arr[$name];
	} else {
		return $def;
	}
}

/**
* Generates a random password
*/
function mosMakePassword($length) {
	$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$len = strlen($salt);
	$makepass="";
	mt_srand(10000000*(double)microtime());
	for ($i = 0; $i < $length; $i++)
		$makepass .= $salt[mt_rand(0,$len - 1)];
	return $makepass;
}

/**
* Chmods files and directories recursivel to given permissions
* @param path The starting file or directory (no trailing slash)
* @param filemode Integer value to chmod files. NULL = dont chmod files.
* @param dirmode Integer value to chmod directories. NULL = dont chmod directories.
* @return TRUE=all succeeded FALSE=one or more chmods failed
*/
function mosChmodRecursive($path, $filemode=NULL, $dirmode=NULL)
{
	$ret = TRUE;
	if (is_dir($path)) {
		$dh = opendir($path);
		while ($file = readdir($dh)) {
			if ($file != '.' && $file != '..') {
				$fullpath = $path.'/'.$file;
				if (is_dir($fullpath)) {
					if (!mosChmodRecursive($fullpath, $filemode, $dirmode))
						$ret = FALSE;
				} else {
					if (isset($filemode))
						if (!@chmod($fullpath, $filemode))
							$ret = FALSE;
				} // if
			} // if
		} // while
		closedir($dh);
		if (isset($dirmode))
			if (!@chmod($path, $dirmode))
				$ret = FALSE;
	} else {
		if (isset($filemode))
			$ret = @chmod($path, $filemode);
	} // if
	return $ret;
} // mosChmodRecursive


// Loads the internationalisation files for the installer, honouring the user's chosen language (browser settings)
function loadLanguages()
{
    global $lang;
    
    // Load default language (English)
    $langEnglish = parse_ini_file(JPIDIR . "/lang/en.ini", true);

    // Try to get user's preffered language (set in browser's settings and transmitted through the request)
    $prefLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if( file_exists(JPIDIR . "/lang/$prefLang.ini") && ( $prefLang != 'en' ) ) {
        $langLocal = parse_ini_file(JPIDIR . "/lang/$prefLang.ini", true);
        $JPLang = array_merge($langEnglish, $langLocal);
        unset( $langLocal );
        unset( $langEnglish );
    } else {
        $lang = $langEnglish;
    }
    
}

/*****************************************************************************************************************/
// HTML Output functions
/*****************************************************************************************************************/

/**
* Returns the HTML for the body of the main page. Optionally, you can supply the HTML for the step bar and the main page area.
*/
function getBodyHTML( $stepsHTML = "&nbsp;", $mainHTML = "&nbsp;" )
{
    global $lang, $SAJAX_INCLUDED;
	
	$out = "";
	$out .= '	<div id="header">' . $lang['global']['title'] . ' 2.0</div>' . "\n" . "\n";
	$out .= '	<div id="infoDisplay">&nbsp;</div>' . "\n" . "\n";
    $out .= '	<div id="mainWrapper">' . "\n";
	$out .= '		<div id="Container">' . "\n";
	$out .= '			<div id="stepBar">' . "\n";
	$out .= $stepsHTML;

	$out .= '			</div>' . "\n";
	$out .= "\n";
	$out .= '			<div id="mainContent">' . "\n";
	$out .= $mainHTML;
	$out .= '			</div>' . "\n";
	$out .= "\n";
	$out .= '		</div>' . "\n";
	$out .= '		<div id="clear"></div>' . "\n";
	$out .= '	</div>' . "\n";
	$out .= '	<div id="Footer">' . "\n";
	$out .= '		<p>Copyright 2007-2008 <a href="http://www.joomlapack.net">JoomlaPack Developers</a> - All Rights Reserved</p>';
	$out .= '		<p>JoomlaPack Installer is free software, distributed under the terms of the <a href="http://www.gnu.org/copyleft/gpl.html">GNU General Public Licence</a></p>';
	$out .= '	</div>' . "\n";
	
	return $out;
}

/**
* Returns the HTML for the main page. Optionally, you can supply the HTML for the step bar and the main page area.
*/
function getPageHTML( $stepsHTML = "&nbsp;", $mainHTML = "&nbsp;" )
{
    global $lang, $SAJAX_INCLUDED;
	
	$out = "";
    
    $out .= "<?xml version=\"1.0\" encoding=\"utf-8\"?".">" . "\n";
	$out .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";
    $out .= '<html xmlns="http://www.w3.org/1999/xhtml">' . "\n";
    $out .= '<head>' . "\n";
    $out .= '	<title>' . $lang['global']['title'] . '</title>' . "\n";
	$out .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . "\n";
    $out .= '	<link rel="shortcut icon" href="../images/favicon.ico" />' . "\n";
    $out .= '	<link rel="stylesheet" href="install.css" type="text/css" />' . "\n";
	
	if ($SAJAX_INCLUDED) {
		$out .= '	<script type="text/javascript">' . "\n";
		$out .= sajax_get_javascript();
		$out .= '	</script>' . "\n";
	}

	$out .= '	<script type="text/javascript" src="install.js"></script>' . "\n";
	
    $out .= '</head>' . "\n";
    $out .= '<body>' . "\n";
	$out .= getBodyHTML( $stepsHTML, $mainHTML );
    $out .= '</body>' . "\n";
    $out .= '</html>';

	return $out;
}

/**
* Returns the HTML for a page's header
* @param $title string The page's title
* @param $buttonsHTML string The HTML for the buttons area
*/
function getPageHeader( $title, $buttonsHTML )
{
	$out = "";
	$out .= '<table>' . "\n";
	$out .= '	<tr>' . "\n";
	$out .= '		<td width="75%"><h1>' . $title . '</h1></td>' . "\n";
	$out .= '		<td><div id="buttons">' . $buttonsHTML . '</div></td>' . "\n";
	$out .= '	</tr>' . "\n";
	$out .= '</table>' . "\n";

	return $out;
}

/**
* Returns the HTML for the step bar steps on the left
*/
function getStepBar( $currentTask )
{
    global $lang;
    
    $out = "";
    $out .= _drawStep( $lang['global']['step1'], 'index', $currentTask );
    $out .= _drawStep( $lang['global']['step2'], 'license', $currentTask );
    $out .= _drawStep( $lang['global']['step3'], 'db', $currentTask );
    $out .= _drawStep( $lang['global']['step4'], 'config', $currentTask );
    $out .= _drawStep( $lang['global']['step5'], 'finish', $currentTask );
    return $out;
}

function getLayoutTable( $left, $right )
{
	$out = "";
	$out .= '<table class="block">' . "\n";
	$out .= '	<tr>' . "\n";
	$out .= '		<td class="left" valign="top">' . $left . '</td>' . "\n";
	$out .= '		<td class="right" valign="top">' . $right . '</td>' . "\n";
	$out .= '	</tr>' . "\n";
	$out .= '</table>' . "\n";
	
	return $out;
}

function getColored( $stringToShow, $red=false )
{
	return $red ? "<span class=\"red\">$stringToShow</span>" : "<span class=\"green\">$stringToShow</span>";
}

/**
* Returns the HTML for a single step of the step bar on the left
*/
function _drawStep( $label, $stepName, $activeStep )
{
    if( $stepName == $activeStep ) {
        return "<div class=\"stepbar-on\">$label</div>";
    } else {
        return "<div class=\"stepbar-off\">$label</div>";
    }
}
?>