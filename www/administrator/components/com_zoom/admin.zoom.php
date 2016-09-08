<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: July, 2005                                                    |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Mambo. It's the most feature-rich gallery component    |
|              for Mambo! For documentation and a detailed list       |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: admin.zoom.php                                            |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
**/
// MOS Intruder	Alerts
defined( '_VALID_MOS' )	or die(	'Direct	Access to this location	is not allowed.' );

// Turn off Magic quotes runtime, because it interferes with saving info to the 
// database and vice versa.
set_magic_quotes_runtime(0); 

// Create zOOm Image Gallery object
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/zoom.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/toolbox.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/ftplib.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/pdf.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/editmon.class.php'); //like a common session-monitor...
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/gallery.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/image.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/comment.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/ecard.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/lightbox.class.php');
require_once($mosConfig_absolute_path.'/components/com_zoom/lib/privileges.class.php');
// Load configuration file...
include_once($mosConfig_absolute_path.'/components/com_zoom/etc/zoom_config.php');

$zoom = new zoom();
$zoom->_isBackend = true;
// now create an instance of the ToolBox!
$zoom->toolbox = new toolbox();
// list of common inclusions:
if (file_exists($mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php")){ 
	include($mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php");
}else{ 
	include($mosConfig_absolute_path."/components/com_zoom/lib/language/english.php");
}
if($zoom->isWin()){
	require_once($mosConfig_absolute_path.'/components/com_zoom/lib/WinNtPlatform.class.php');
	$zoom->platform = new WinNtPlatform();
}else{
	require_once($mosConfig_absolute_path.'/components/com_zoom/lib/UnixPlatform.class.php');
	$zoom->platform = new UnixPlatform();
}

// Update the Edit Monitor, eg. delete unnecessary rows
$zoom->EditMon->updateEditMon();
// load gallery object if a catid is specified...
$catid = intval(mosGetParam($_REQUEST,'catid'));
if (isset($catid) && !is_array($catid) && !is_array($_POST['catid']) && !empty($catid) && !($catid == 0)){
//Above code should fix deleting issue. -Steven Pignataro
//if (isset($catid) && !is_array($catid) && !empty($catid) && !($catid == 0)){
	$zoom->setGallery($catid);
}
if ($zoom->_isBackend) {
	$backend = "2";
} else {
	$backend = "";
}
// Standard (D)HTML...
echo ("<div id=\"overDiv\" style=\"position:absolute; visibility:hidden; z-index:1000;\"></div>\n"
 . "\t<script language=\"JavaScript\" type=\"text/JavaScript\" src=\"" . $mosConfig_live_site . "/includes/js/overlib_mini.js\"></script>\n");

$page = mosGetParam($_REQUEST,'page');
switch ($page){
	case 'admin':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/admin.php');
		$zoom->adminFooter();
		break;
	case 'catsmgr':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/catsmgr.php');
		$zoom->adminFooter();
		break;
	case 'mediamgr':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/mediamgr.php');
		$zoom->adminFooter();
		break;
	case 'editimg':
		if($zoom->_isAdmin || ($zoom->_isUser && $zoom->_CONFIG['allowUserUpload'])){
			include($mosConfig_absolute_path.'/components/com_zoom/www/admin/editimg.php');
		}else{
			echo "Error: You'll have to be logged in as admin or user/editor to view this page!";
		}
		break;
	case 'new':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/new.php');
		$zoom->adminFooter();
		break;
	case 'upload':
	   	include($mosConfig_absolute_path.'/components/com_zoom/www/admin/upload.php');
	   	$zoom->adminFooter();
	   	break;
	case 'zoomthumb':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/zoomthumb.php');
		break;
	case 'settings':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/settings.php');
		$zoom->adminFooter();
		break;
	case 'update':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/update.php');
		$zoom->adminFooter();
		break;
	case 'movefiles':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/movefiles.php');
		$zoom->adminFooter();
		break;
	case 'credits':
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/credits.php');
		$zoom->adminFooter();
	    break;
	default:
		include($mosConfig_absolute_path.'/components/com_zoom/www/admin/admin.php');
		$zoom->adminFooter();
		break;
}
