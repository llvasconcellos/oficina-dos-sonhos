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
| Filename: upl_single.php                                            |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$single_submit = mosGetParam($_REQUEST,'single_submit');
$single_submit2 = mosGetParam($_REQUEST,'single_submit2');
$single_submit3 = mosGetParam($_REQUEST,'single_submit3'); 
if ($single_submit) {
	if (!$catid) {
		mosRedirect("index".$backend.".php?option=com_zoom&page=upload&formtype=single&Itemid=".$Itemid, _ZOOM_NOCAT);
	}
	// $image_name is an PHP auto-generated variable which holds the name of the uploaded file ($single_image).
	if (!empty($_FILES['single_image']['name'])) {
		$tag = ereg_replace(".*\.([^\.]*)$", "\\1", $_FILES['single_image']['name']);
		$tag = strtolower($tag);
		$setFilename = mosGetParam($_POST, 'setFilename');
		$ignoresizes = mosGetParam($_REQUEST, 'single_ignoresizes');
		if($setFilename) {
			$name = $_FILES['single_image']['name'];
		} else {
        	$name = mosGetParam($_POST, 'single_name');
		}
        $keywords = mosGetParam($_POST, 'single_keywords');
        $descr = mosGetParam($_POST, 'single_descr', null, _MOS_ALLOWHTML);
		//Check for right format
		if ($zoom->acceptableFormat($tag) || ($tag == "zip")) {
			$imagepath = $zoom->_CONFIG['imagepath'];
			$catdir = $zoom->_gallery->getDir();
			$filename = urldecode($_FILES['single_image']['name']);
			if (!isset($descr)) {
				$descr = $zoom->_CONFIG['tempDescr'];
			}
			if ($tag == "zip") {
				// reset script execution time limit (as set in MAX_EXECUTION_TIME ini directive)...
				// requires SAFE MODE to be OFF!
				if( ini_get( 'safe_mode' ) != 1 ) {
					set_time_limit(0);
				}
				// replace every space-character with a single "_"
    			$filename = ereg_replace(" ", "_", $filename);
    			// Get rid of extra underscores
    			$filename = ereg_replace("_+", "_", $filename);
    			$filename = ereg_replace("(^_|_$)", "", $filename);
				// Extract functions
				$base_Dir = $mosConfig_absolute_path."/media/";
				if (move_uploaded_file($_FILES['single_image']['tmp_name'], "$base_Dir$filename")) {
					$extractdir = $zoom->createTempDir();
					$extractdir_path = $mosConfig_absolute_path."/".$extractdir;
					$archivename = $base_Dir.$filename;
					@chmod($extractdir_path, 0777);
					if ($zoom->extractArchive($extractdir_path, $archivename)) {
						// Extraction success, now scan the directory...
						$extr_images = $zoom->toolbox->parseDir($extractdir_path, 0);
						// Create selection list in HTML
						$zoom->createCheckAllScript();
						?>
						<h2><?php echo _ZOOM_SCAN_STEP2;?></h2>
						<form name="select_img" method="post"action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&page=upload&formtype=single&Itemid=<?php echo $Itemid;?>">
						<?php
						$zoom->createFileList($extr_images, $extractdir);
						?>
						<br />
						<center><input class="button" type="submit" value="<?echo _ZOOM_UPLOAD;?>" name="single_submit2"></center>
						<input type="hidden" name="catid" value="<?php echo $catid;?>">
						<?php
						$zoom->_counter = 0;
						foreach ($extr_images as $image) {
							$name = $userfile_name[$zoom->_counter];
							?>
							<input type="hidden" name="images[]" value="<?php echo $image;?>">
							<input type="hidden" name="images_name[]" value="<?php echo $image;?>">
							<?php
							$zoom->_counter++;
						}
						echo ("<input type=\"hidden\" name=\"extractdir\" value=\"".$extractdir."\" />\n"
						 . "<input type=\"hidden\" name=\"archivename\" value=\"".$archivename."\" />\n"
						 . "<input type=\"hidden\" name=\"descr\" value=\"".$descr."\" />\n"
                         . "<input type=\"hidden\" name=\"keywords\" value=\"".$keywords."\" />\n"
                         . "<input type=\"hidden\" name=\"name\" value=\"".$name."\" />\n"
                         . "<input type=\"hidden\" name=\"setFilename\" value=\"".$setFilename."\" />\n"
                         . "<input type=\"hidden\" name=\"single_ignoresizes\" value=\"".$ignoresizes." />\n"
						 . "<input type=\"hidden\" name=\"catdir\" value=\"".$catdir."\" />\n");
						echo "</form>";
					}else{
						mosRedirect("index".$backend.".php?option=com_zoom&page=upload&formtype=single&Itemid=".$Itemid, _ZOOM_ALERT_PCLZIPERROR);
					}
				}
			// file isn't a zip-file, so look for other usable formats...
			} elseif($zoom->acceptableFormat($tag)) {
                if ($rotate[$img]) {
                    $rotate = true;
                    $degrees = $_POST['degrees'];
                }
                $zoom->toolbox->processImage($_FILES['single_image']['tmp_name'], $filename, $keywords, $name, $descr, $rotate, $degrees, $ignoresizes);
                if ($zoom->toolbox->_err_num > 0) {
                    $zoom->toolbox->displayErrors($err_num, $err_names, $err_types);
                } else {
                	mosRedirect("index".$backend.".php?option=com_zoom&page=upload&catid=".$catid."&formtype=single&Itemid=".$Itemid, _ZOOM_ALERT_UPLOADOK);
                }
			} else {
		      //Not the right format, back to uploadscreen-->
    		  mosRedirect("index".$backend.".php?option=com_zoom&page=upload&catid=".$catid."&formtype=single&Itemid=".$Itemid, _ZOOM_ALERT_WRONGFORMAT);
            }
        }
	} else {
		mosRedirect("index".$backend.".php?option=com_zoom&page=upload&catid=".$catid."&formtype=single&Itemid=".$Itemid, _ZOOM_ALERT_NOPICSELECTED);
	}
} elseif($single_submit2) {
	// reset script execution time limit (as set in MAX_EXECUTION_TIME ini directive)...
	// requires SAFE MODE to be OFF!
	$edir = mosGetParam($_REQUEST,'extractdir');
	$extractdir = $mosConfig_absolute_path."/".$edir;
	$archivename = mosGetParam($_REQUEST,'archivename');
	$catdir = mosGetParam($_REQUEST,'catdir');
	$name = mosGetParam($_REQUEST,'name');
    $setFilename = mosGetParam($_REQUEST,'setFilename');
    $ignoresizes = mosGetParam($_REQUEST, 'single_ignoresizes');
	$keywords = mosGetParam($_REQUEST,'keywords');
	$descr = mosGetParam($_REQUEST,'descr', null, _MOS_ALLOWHTML);
	$imagepath = $zoom->_CONFIG['imagepath'];
	$rotate = mosGetParam($_REQUEST,'rotate');
	$success = 0; //counts number of successfully processed files...
	foreach ($scannedimg as $img) {
		// this is the production code (for ZIP-files)...
		$theImage = $images[$img];
		$image_name = $images_name[$img];
		if (isset($setFilename)) {
			$name = $image_name;
		}
        if ($rotate[$img]) {
            $rotate = true;
            $key = "rotate$success";
            $degrees = $_REQUEST[$key];
        }
        if ($zoom->toolbox->processImage("$extractdir/$theImage", $image_name, $keywords, $name, $descr, $rotate, $degrees)) {
        	$success++;
        }
	}
	// if the deldir function wasn't able to delete the dir, inform user
	if (!$zoom->deldir("$extractdir")) {
		echo "Could not delete the directory ".$extractdir." !";
	}
	$zoom->platform->unlink($archivename);
	if ($zoom->toolbox->_err_num > 0) {
		$zoom->toolbox->displayErrors($err_num, $err_names, $err_types);
		echo "<br /><center><h4>".$success." "._ZOOM_ALERT_UPLOADSOK."</h4></center><br /><br />";
    } else {
        mosRedirect("index".$backend.".php?option=com_zoom&page=upload&catid=".$catid."&formtype=single&Itemid=".$Itemid, $success." "._ZOOM_ALERT_UPLOADSOK);
    }
} else {
	//Show upload screen
	?>
	<form enctype="multipart/form-data" name="single_form" method="post" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=upload&formtype=single" onsubmit="showMe();">
	<table border="0" cellpadding="3" cellspacing="2">
	<?php
	// if php safe_mode restriction is in use, warn the user! -> added by mic
	if( ini_get( 'safe_mode' ) == 1 ){ ?>
		<tr>
			<td>&nbsp;</td>
		 	<td><strong><font color="red"><?php echo _ZOOM_A_MESS_SAFEMODE1; ?></font></strong></td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<?php
	} ?>	
	<tr>
		<td><?php echo _ZOOM_FORM_IMAGEFILE;?>:&nbsp;</td>
		<td align="left">
			<input class="inputbox" type="file" name="single_image" size="50" />
		</td>
	</tr>	
	<tr>
		<td><?php echo _ZOOM_FORM_INGALLERY;?>:&nbsp;</td>
		<td>
			<?php
			echo $zoom->createCatDropdown('catid','<OPTION value="">---&nbsp;'._ZOOM_PICK.'&nbsp;---</OPTION>', 0, $catid);
			?>
		</td>
	</tr>	
	<tr>
		<td><?php echo _ZOOM_NAME;?>:&nbsp;</td>
		<td>
			<input type="text" name="single_name" size="50" value="<?php echo $zoom->_CONFIG['tempName'];?>" class="inputbox" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="checkbox" name="setFilename" id="single_setFilename" value="1"<?php if($zoom->_CONFIG['autonumber']) echo " checked";?> /><label for="single_setFilename"> <?php echo _ZOOM_FORM_SETFILENAME;?></label>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="checkbox" name="single_ignoresizes" id="single_ignoresizes" value="1" /><label for="single_ignoresizes"> <?php echo _ZOOM_FORM_IGNORESIZES;?></label>
		</td>
	</tr>
	<tr>
		<td><?php echo _ZOOM_KEYWORDS;?>:&nbsp;</td>
		<td>
			<input type="text" name="single_keywords" size="50" value="" class="inputbox" />
		</td>
	</tr>
	<tr>
		<td valign="top"><?php echo _ZOOM_DESCRIPTION;?>:&nbsp;</td>
		<td>
			<textarea class="inputbox" cols="50" rows="5" name="single_descr"><?php echo $zoom->_CONFIG['tempDescr'];?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input class="button" type="submit" name="single_submit" value="<?php echo _ZOOM_BUTTON_UPLOAD;?>" />
		</td>
	</tr>
	</table>
	</form>
	<?
	}
?>
