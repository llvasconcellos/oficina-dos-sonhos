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
| Filename: movefiles.php                                             |
| Version: 2.5.2                                                      |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$keys = mosGetParam($_REQUEST,'keys');
$submit = mosGetParam($_REQUEST,'submit');
if ($submit && (isset($keys) && !empty($keys) && is_array($keys))) {
	//First, copy the file to the target gallery-dir. Then, second, delete the
	//image from the source gallery (meanwhile, update the database ;-) )...
	$movecat = mosGetParam($_REQUEST,'movecat');
	$err_num = 0;
	$zoom->_counter = 0;
	foreach ($keys as $key) {
	    
		//get dir of source gallery...
		$database->setQuery("SELECT catdir FROM #__zoom WHERE catid = ".$movecat." LIMIT 1");
		$result = $database->query();
		while ($row = mysql_fetch_object($result)) {
			$movedir = $row->catdir;
		}
		// get filename of image...
		$zoom->_gallery->_images[$key]->getInfo();
		$filename = $zoom->_gallery->_images[$key]->_filename;
		$imgid = $zoom->_gallery->_images[$key]->_id;
		//now copy the file...
		if ($zoom->platform->copy($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$filename, $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$movedir."/".$filename)) {
			//delete the file from the OLD location...
			if ($zoom->platform->unlink($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$filename)) {
			    if ($zoom->platform->file_exists($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/thumbs/".$filename)) {
			    	//Do the same for the thumbnail...
    				if ($zoom->platform->copy($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/thumbs/".$filename, $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$movedir."/thumbs/".$filename)) {
    					if ($zoom->platform->unlink($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/thumbs/".$filename)) {
    					    if ($zoom->platform->file_exists($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/viewsize/".$filename)) {
    					    	if ($zoom->platform->copy($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/viewsize/".$filename, $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$movedir."/viewsize/".$filename)) {
    					    		if (!$zoom->platform->unlink($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/viewsize/".$filename)) {
    					    			$err_num++;
    					    		}
    					    	} else {
    					    	    $err_num++;
    					    	}
    					    }
    					} else {
    					    $err_num++;
    					}
    				} else {
    					$err_num++;
    				}
			    }
			} else {
				$err_num++;
			}
		} else {
			$err_num++;
		}
		//update dbase...
		if ($err_num <= 0) {
			$database->setQuery("UPDATE #__zoomfiles SET catid = '$movecat' WHERE imgid = '$imgid'");
    		if (!$database->query()) {
    			$err_num++;
    		} else {
    		    $zoom->_counter++;
    		}
		}
	}
	mosRedirect("index".$backend.".php?option=com_zoom&page=mediamgr&catid=".$catid."&Itemid=".$Itemid, sprintf(_ZOOM_ALERT_MOVE, $zoom->_counter, $err_num));
} elseif ((isset($catid) && !empty($catid)) && (isset($keys) && !empty($keys) && is_array($keys))) {
	//Step 2: select images...
	//zOOm already generated an array with images, so we just have to walk through them...
	$zoom->createSubmitScript("select_cat");
    $zoom->createCheckAllScript();
    ?>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
    	<tr>
    		<td width="33%" align="left">
    			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/move_f2.png" border="0" alt="<?php echo _ZOOM_MOVEFILES;?>" />
    			&nbsp;
    			<strong><font size="4"><?php echo _ZOOM_MOVEFILES;?></font></strong>
    		</td>
    
    		<td width="33%" align="center">
    			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
    			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0" />
    			<?php echo _ZOOM_MAINSCREEN;?></a>&nbsp; | &nbsp;
    			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$catid."&page=mediamgr";?>">
    				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/back.png" alt="<?echo _ZOOM_BACK;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_BACK;?>
    			</a>
    		</td>
    		<td width="33%" align="right">&nbsp;</td>
    	</tr>
    </table>
	<h3><?php echo _ZOOM_MOVEFILES_STEP1;?></h3>
	<form name="select_cat" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php" method="POST">
	<center>
	<?php
	echo $zoom->createCatDropDown('movecat', '<option value="">---&nbsp;'._ZOOM_PICK.'&nbsp;---</option>', 0, 0, $zoom->_gallery->_id);
	foreach ($keys as $key) {
		?>
		<input type="hidden" name="keys[]" value="<?php echo $key;?>" />
		<?php
	}
	?>
	<br /><br />
	<input class="button" type="submit" value="<?echo _ZOOM_BUTTON_MOVE;?>" name="submit">
	</center>
	<input type="hidden" name="option" value="<?php echo $option;?>" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
	<input type="hidden" name="catid" value="<?php echo $zoom->_gallery->_id;?>" />
	<input type="hidden" name="page" value="movefiles" />
	</form>
	<?php
} else {
	mosRedirect("index".$backend.".php?option=com_zoom&page=mediamgr&catid=".$catid."&Itemid=".$Itemid, _ZOOM_ALERT_NOMEDIA);
}