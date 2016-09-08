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
| Filename: upl_scan.php                                              |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$urls = mosGetParam($_REQUEST,'urls');
$scannedimg=mosGetParam($_REQUEST,'scannedimg');
$temp_files = null;
if ($urls) {
	$zoom->showProgress();
	$descr = mosGetParam($_REQUEST,'descr', null, _MOS_ALLOWHTML);
	$setFilename = mosGetParam($_REQUEST, 'setFilename');
	$ignoresizes = mosGetParam($_REQUEST, 'scan_ignoresizes');
	$imgname = mosGetParam($_REQUEST, 'imgname');
	$keywords = mosGetParam($_REQUEST, 'keywords');
	$zoom->createCheckAllScript();
	if (!$catid){
		mosRedirect("index".$backend.".php?option=com_zoom&page=upload&formtype=scan&Itemid=".$Itemid, _ZOOM_NOCAT);
	}
	/* Process all urls first */
	$temp_files = array();
	$userfile = array();
	$userfile_name = array();
	foreach ($urls as $url) {
		// Get rid of any extra white space
		$url = trim($url);
		/*
 		* Check to see if the URL is a local directory (inspired by
 		* code from Jared (hogalot)
        * First, append the Joomla!-path if it isn't there already.
 		*/
        if (stristr($url, $mosConfig_absolute_path) !== true && !$zoom->platform->is_dir($url)) {
            if(substr($url,0,strlen($url)) == "/") {
                $theUrl = $mosConfig_absolute_path.$url;
            } else {
                $theUrl = $mosConfig_absolute_path."/".$url;
            }
        } else {
            $theUrl = $url;
        }
		if ($zoom->platform->is_dir($theUrl)) {
			echo "<p>"._ZOOM_SCAN_STEP2_DESCR1." <i>$url</i> "._ZOOM_SCAN_STEP2_DESCR2."</p>";
			$handle = $zoom->platform->opendir($theUrl);
			while (($file = $zoom->platform->readdir($handle)) != false) {
				if ($file != "." && $file != "..") {
					$tag = ereg_replace(".*\.([^\.]*)$", "\\1", $file);
					$tag = strtolower($tag);
					if ($zoom->acceptableFormat($tag)) {
						/* Tack it onto userfile */
						$userfile_name[] = $file;
						if (substr($url,-1) == "/") {
							$userfile[] = $url . $file;
						} else {
							$userfile[] = $url . "/" . $file;
						}
					}
				}
			}
			closedir($handle);
		} else {
			// Get rid of any preceding whitespace (fix for odd browsers like konqueror)
			$url = eregi_replace("^[[:space:]]+", "", $url);
			// If the URI doesn't start with a scheme, prepend 'http://'
			if (!$zoom->platform->is_file($url)) {
				if (!ereg("^(http|ftp)", $url)) {
					$url = "http://$url";
				}
			}
			/* Parse URL for name and file type */
			$url_stuff = parse_url($url);
			$name = basename($url_stuff["path"]);
			$tag = ereg_replace(".*\.([^\.]*)$", "\\1", $url);
			$tag = strtolower($tag);
			//Dont output warning messages if we cant open url
			/*
 			* Try to open the url in lots of creative ways.
 			* Do NOT use $zoom->platform->fopen here because that will pre-process
 			* the URL in win32 style (ie, convert / to \, etc).
	 		*/
			$id = @fopen($url, "rb");
			if (!ereg("http", $url)) {
				if (!$id) $id = @fopen("http://$url", "rb");
				if (!$id) $id = @fopen("http://$url/", "rb");
			}
			if (!$id) $id = @fopen("$url/", "rb");
			if ($id) {
				echo '<p>' . _ZOOM_A_MESS_PROCESSING_FILE . ' ' . urldecode($url) . '</p>';
			} else {
				echo '<p>' . _ZOOM_A_MESS_NOTOPEN_URL. ' "'. $url . '"</p>';
				continue;
			}
			// copy file locally
			$file = $mosConfig_absolute_path . "/media/photo.$name";
			$od = $zoom->platform->fopen($file, "wb");
			if ($id && $od) {
				while (!feof($id)) {
					fwrite($od, fread($id, 65536));
				}
				fclose($id);
				fclose($od);
			}
			// Make sure we delete this file when we're through...
			$temp_files[$file]++;
			// If this is an image - add it to the processor array
			if ($zoom->acceptableFormat($tag)) {
				// Tack it onto userfile
				$userfile_name[] = $name;
				$userfile[] = $file;
			} else {
				// Slurp the file
				echo '<p>' . sprintf( _ZOOM_A_MESS_PARSE_URL, $url ) . '</p>';
				$fd = $zoom->platform->fopen ($file, "r");
				$contents = fread ($fd, $zoom->platform->filesize ($file));
				fclose ($fd);
				// We'll need to add some stuff to relative links
				$base_url = $url_stuff["scheme"] . '://' . $url_stuff["host"];
				$base_dir = '';
				if ($url_stuff["port"]) {
	  			  $base_url .= ':' . $url_stuff["port"];
				}
				// Hack to account for broken dirname
				if (ereg("/$", $url_stuff["path"])) {
					$base_dir = $url_stuff["path"];
				} else {
					$base_dir = dirname($url_stuff["path"]);
				}
				// Make sure base_dir ends in a / ( accounts for empty base_dir )
				if (!ereg("/$", $base_dir)) {
					$base_dir .= '/';
				}
				$things = array();
				while ($cnt = eregi('(src|href)="?([^" >]+\.$zoom->acceptableFormatRegexp())[" >]',
						    $contents, 
						    $results)) {
					$things[$results[2]]++;
					$contents = str_replace($results[2], "", $contents);
					$userfile_name[] = $results[2];
				}
				// Add each unique link to an array we scan later
				foreach (array_keys($things) as $thing) {
					/* 
				 	* Some sites (slashdot) have images that start with // and this
		 			* confuses Gallery.  Prepend 'http:'
			 		*/
					if (!strcmp(substr($thing, 0, 2), "//")) {
						$thing = "http:$thing";
					}
					// Absolute Link ( http://www.foo.com/bar )
					if (substr($thing, 0, 4) == 'http') {
						$userfile[] = $thing;
					// Relative link to the host ( /foo.bar )
					} elseif (substr($thing, 0, 1) == '/') {
						$userfile[] = $base_url . $thing;
					// Relative link to the dir ( foo.bar )
					} else {
						$userfile[] = $base_url . $base_dir . $thing;
					}
				}
			}// END if is-image?
		}// END if is_dir?
		if (sizeof($userfile) > 0) {
			?>
			<h2><?php echo _ZOOM_SCAN_STEP2;?></h2>
			<form name="select_img" method="post"action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=upload&formtype=scan">
			<?php
			$zoom->createFileList($userfile);
			?>
			<br /><input class="button" type="submit" value="<?echo _ZOOM_UPLOAD;?>" name="submit_scan" />
			<br />
			<input type="hidden" name="catid" value="<?php echo $catid;?>" />
			<?php
			$zoom->_counter = 0;
			foreach ($userfile as $file) {
				$name = $userfile_name[$zoom->_counter];
				?>
				<input type="hidden" name="userfile[]" value="<?php echo $file;?>" />
				<input type="hidden" name="userfile_name[]" value="<?php echo $name;?>" />
				<?php
				$zoom->_counter++;
			}
			if (isset($setFilename)) {
				echo '<input type="hidden" name="setFilename" value="'.$imgname.'" />';
			} else {
				echo '<input type="hidden" name="imgname" value="'.$imgname.'" />';
			}
			?>
			<input type="hidden" name="scan_ignoresizes" value="<?php echo $ignoresizes; ?>" />
			</form>
			<?php
		}else{
			echo '<p><center><span class="small">'. _ZOOM_NOIMG . '</span></center></p>';
		}// END if userfiles found?
        echo '<p><strong>' . count($userfile) . ' ' . _ZOOM_ALERT_IMGFOUND . '</strong></p>';
        $zoom->hideProgress();
	}// END foreach urls...
}elseif($scannedimg){
	// Now, finally, it's time to start uploading...
	echo '<h2>'._ZOOM_SCAN_STEP3.'</h2>';
	$i = 0;
	foreach ($scannedimg as $image) {
		$filename = urldecode($userfile_name[$image]);
		// Get the actual image (with path and everything)...
		if(!$zoom->platform->is_file($userfile[$image])) {
			$theImage = $mosConfig_absolute_path."/".$userfile[$image];
		} else {
			$theImage = $userfile[$image];
		}
        if (!empty($usercaption) && is_array($usercaption)) {
    		$caption = $zoom->removeTags(array_shift($usercaption));
        }
        if (!$descr) {
            $descr = $zoom->_CONFIG['tempDescr'];
        }
        if (isset($setFilename)) {
            $name = $filename;
        } else {
            $name = $imgname;
        }
        if ($rotate[$image]) {
            $key = "rotate$i";
            $degrees = mosGetParam($_REQUEST, $key);
            $rotatelt = $rotate[$image];
        }
        $ignoresizes = mosGetParam($_REQUEST, 'scan_ignoresizes');
        if ($zoom->toolbox->processImage($theImage, $filename, $keywords, $name, $descr, $rotatelt, $degrees, $ignoresizes)) {
            $i++;
        }
	} // end of foreach-loop
	if($zoom->toolbox->_err_num > 0)
		$zoom->toolbox->displayErrors($err_num, $err_names, $err_types);
	echo '<p><center><h4>' . $i . ' ' . _ZOOM_ALERT_UPLOADSOK . '</h4></center></p>';
}else{
	// Display form...
	?>
	<form name="scan_form" method="POST" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=upload&formtype=scan" onsubmit="showMe();">
	<table border="0" cellpadding="3" cellspacing="3">
	<?php
	// if php safe_mode restriction is in use, warn the user! -> added by mic
	if( ini_get( 'safe_mode' ) == 1 ){ ?>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2"><strong><font color="red"><?php echo _ZOOM_A_MESS_SAFEMODE1; ?></font></strong></td>
		</tr>
		<?php
	} ?>
	<tr>
		<td colspan="3"><h3><?php echo _ZOOM_SCAN_STEP1;?></h3></td>
	</tr>
	<tr>
		<td><?php echo _ZOOM_FORM_INGALLERY; ?>:&nbsp;</td>
		<td colspan="2">
			<?php echo $zoom->createCatDropdown('catid', '<OPTION value="">---&nbsp;'._ZOOM_PICK.'&nbsp;---</OPTION>', 0, $zoom->_gallery->_id);?>
		</td>
	</tr>		
	<tr>
		<td><?php echo _ZOOM_FORM_LOCATION;?>:&nbsp;</td>
		<td>
			<input type="text" name="urls[]" size=40 class="inputbox" />
		</td>
		<td>&nbsp;<?php echo _ZOOM_SCAN_STEP1_DESCR;?></td>
	</tr>
	<tr>
		<td><?php echo _ZOOM_NAME;?>:&nbsp;</td>
		<td>
			<input type="text" name="imgname" size="40" value="<?php echo $zoom->_CONFIG['tempName'];?>" class="inputbox" />
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="checkbox" name="setFilename" id="scan_setFilename" value="1"<?php if($zoom->_CONFIG['autonumber']) echo " checked";?> /><label for="scan_setFilename">&nbsp;<?php echo _ZOOM_FORM_SETFILENAME;?></label>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="checkbox" name="scan_ignoresizes" id="scan_ignoresizes" value="1" /><label for="scan_ignoresizes">&nbsp;<?php echo _ZOOM_FORM_IGNORESIZES;?></label>
		</td>
	</tr>
	<tr>
		<td><?php echo _ZOOM_KEYWORDS;?>:&nbsp;</td>
		<td colspan="2">
			<input type="text" name="keywords" size="40" value="" class="inputbox" />
		</td>
	</tr>
	<tr>
		<td valign="top"><?php echo _ZOOM_DESCRIPTION;?>:&nbsp;</td>
		<td colspan="2">
			<textarea class="inputbox" cols="50" rows="5" name="descr" /><?php echo $zoom->_CONFIG['tempDescr'];?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="submit" value="<?php echo _ZOOM_BUTTON_UPLOAD;?>" name="submit_url" class="button" />
		</td>
	</tr>
	</table>
	<?php
} //END IF urls?
if ($temp_files) {
	// Clean up the temporary url file
	foreach ($temp_files as $tf => $junk) {
		$zoom->platform->unlink($tf);
	}
} 
?>
