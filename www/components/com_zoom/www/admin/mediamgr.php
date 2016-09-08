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
| Filename: mediamgr.php                                              |
| Version: 2.5.2                                                      |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$task = mosGetParam($_REQUEST,'task');
$return = "mediamgr";
if ($task == 'edit' && $zoom->privileges->hasPrivilege('priv_editmedium')) {
	include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/editimg.php');
} elseif ($task == 'move' && $zoom->privileges->hasPrivilege('priv_editmedium')) {
	include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/movefiles.php');
} elseif ($task == 'delete' && $zoom->privileges->hasPrivilege('priv_delmedium')) {
	$zoom->createProgressScript($task);
	$keys = mosGetParam($_REQUEST,'keys');
	if ($keys) {
		$error = 0;
        foreach ($keys as $key) {
        	$zoom->_gallery->_images[$key]->getInfo();
			if (!$zoom->_gallery->_images[$key]->delete()) {
				$error++;
			}
        }
        if (!$error) {
        	mosRedirect("index".$backend.".php?option=com_zoom&page=mediamgr&Itemid=".$Itemid."&catid=".$catid, _ZOOM_ALERT_DELPIC);
        } else {
        	mosRedirect("index".$backend.".php?option=com_zoom&page=mediamgr&Itemid=".$Itemid."&catid=".$catid, _ZOOM_ALERT_NODELPIC);
        }
	} else {
	    mosRedirect("index".$backend.".php?option=com_zoom&page=mediamgr&Itemid=".$Itemid."&catid=".$catid, _ZOOM_ALERT_NOMEDIA);
	}
} else {
	$zoom->createSubmitScript('catselect');
	if ($task == "mediapp") {
		$mediapp = mosGetParam($_REQUEST, 'mediapp', 10);
    	if ($_SESSION['zoom_mediapp'] != $mediapp || empty($_SESSION['zoom_mediapp'])) {
    		$_SESSION['zoom_mediapp'] = $mediapp;
    	}
	}
	?>
	<br />
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center" width="100%"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
		<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN;?></a>
		</td>
	</tr>
	<tr>
		<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/mediamgr_f2.png" border="0" alt="<?php echo _ZOOM_MEDIAMGR;?>">&nbsp;<b><font size="4"><?php echo _ZOOM_MEDIAMGR;?></font></b></td>
	</tr>
	</table>
	<center>
	<form enctype="multipart/form-data" name="catselect" method="post" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&page=mediamgr&catid=<?php echo $catid;?>&Itemid=<?php echo $Itemid;?>">
	<?php
	// display gallery selection form... 
	echo $zoom->createCatDropdown('catid', '<OPTION value="">---&nbsp;'._ZOOM_PICK.'&nbsp;---</OPTION>', 1, $zoom->_gallery->_id);
	?>
	</form>
	<?php
	if ($zoom->_CONFIG['showoccspace']) {
		$calc_what = "zOOm";
    	if (!empty($zoom->_gallery->_id)) {
    		$zoom->dirStatistics($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir);
    		$calc_what = $zoom->_gallery->_name;
    	} else {
    	    $zoom->dirStatistics($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath']);
    	}
    	echo "<br /><h3>".sprintf(_ZOOM_DISKSPACEUSAGE, $calc_what).": ".$zoom->parseFolderSize($zoom->_folderSize)."</h3><br />";
	}
	if (!empty($catid)) {
		// display form containing editable media from the specified gallery...
		$zoom->createCheckAllScript();
		?>
		<script language="Javasript" type="text/javascript">
	      <!--
	      function submitForm(theTask, mediapp){
	        document.mediamgr.elements['task'].value = theTask;
	        if (theTask == "mediapp") {
	            document.mediamgr.mediapp.value = mediapp;
	        }
	        document.mediamgr.submit();
	        return false;
	      }
	      //-->
	    </script>
		<?php
		echo $zoom->createMediaEditForm($option, $page, $Itemid, $catid, $backend);
	}
}
?>