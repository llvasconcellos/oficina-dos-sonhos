<?php
//zOOm Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Image Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: August, 2005                                                  |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Mambo. It's the most feature-rich gallery component    |
|              for Mambo! For documentation and a detailed list       |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| Filename: view.php                                                  |
| Version: 2.1                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/

// Get the posted variables...
$task = mosGetParam($_REQUEST, 'task', '');
$key = mosGetParam($_REQUEST, 'key');
if($task == 'send' && !empty($submit)){
	// Save data to dbase & send an e-mail to the friend...
	// Get the image with the corresponding key...
	$zoom->_gallery->_images[$key]->getInfo();
	$to_name = mosGetParam($_REQUEST, 'to_name', '');
	$from_name = mosGetParam($_REQUEST, 'from_name', '');
	$to_email = mosGetParam($_REQUEST, 'to_email', '');
	$from_email = mosGetParam($_REQUEST, 'from_email', '');
	$message = mosGetParam($_REQUEST, 'message', '');
	$imgid = $zoom->_gallery->_images[$key]->_id;
	$zoom->setEcard();
	?>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td width="30" class="<?php echo $zoom->_tabclass[1]; ?>">&nbsp;</td>
	    <td class="<?php echo $zoom->_tabclass[1]; ?>" align="left" valign="top">
			<a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid); ?>">
			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN;?>
			</a> > <a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&catid='.$zoom->_gallery->_id); ?>"><?php echo $zoom->_gallery->_name;?>
			</a> > <strong><a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&page=view&catid='.$zoom->_gallery->_id.'&key='.$key); ?>"><?php echo $zoom->_gallery->_images[$key]->_filename;?></a></strong>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/ecard_big.png" border="0" alt="<?php echo _ZOOM_ECARD_SENDAS;?>" />&nbsp;<b><font size="4"><?php echo _ZOOM_ECARD_SENDAS;?></font></b></td>
	</tr>
	</table>
	<br /><br /><center><h5>
	<?php
	if ($zoom->ecard->save($imgid, $to_name, $from_name, $to_email, $from_email, $message)) {
		if ($zoom->ecard->send()) {
			echo _ZOOM_ECARD_SUCCESS."<br />";
			echo "<a href=\"index.php?option=com_zoom&Itemid=".$Itemid."&page=ecard&task=viewcard&ecdid=".$zoom->ecard->_id."\"> "._ZOOM_ECARD_CLICKHERE."</a>";
		} else {
			echo _ZOOM_ECARD_ERROR." $to_email!";
		}
	} else {
		echo _ZOOM_ECARD_ERROR." $to_email!";
	}
	echo "\t</h5></center>\n";
} elseif ($task == 'viewcard') {
    // Delete overdue records of eCards from the database, before anyone can see them...
    $now = date("Y-m-d");
    $database->setQuery("DELETE FROM #__zoom_ecards WHERE end_date <= $now");
    $database->query();
	$ecdid = mosGetParam($_REQUEST, 'ecdid', null);
	$back = mosGetParam($_REQUEST, 'back', false);
	if (!empty($back)) {
		$back = true;
	}
	$zoom->setEcard($ecdid);
	if ($zoom->ecard->getInfo()) {
		$zoom->ecard->_image->getInfo();
		$zoom->setGallery($zoom->ecard->_image->_catid);
		?>
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="30" class="<?php echo $zoom->_tabclass[1]; ?>">&nbsp;</td>
		    <td class="<?php echo $zoom->_tabclass[1]; ?>" align="left" valign="top">
				<a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid); ?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN; ?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN; ?>
				</a> > <a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&catid='.$zoom->_gallery->_id); ?>"><?php echo $zoom->_gallery->_name; ?></a>
			</td>
		</tr>
		</table>
		<center>
		<?php
		if ($back) {
			// begin BACK HTML...
			?>
			<center>
				<a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&page=ecard&task=viewcard&ecdid='.$ecdid); ?>" onmouseover="return overlib('<?php echo _ZOOM_ECARD_TURN2; ?>');" onmouseout="return nd();">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/ecard_turn.png" border="0">
			</center>
			<table width="400" border="0" cellspacing="0" cellpadding="0" background="<?php echo $mosConfig_live_site;?>components/com_zoom/www/images/ecard_back.png" height="250">
				<tr height="250">
					<td align="center" valign="middle" width="198" height="250">
					    <center>
						<?php echo $zoom->ecard->getMessage();?>
						</center>
					</td>
					<td width="16" height="250"></td>
					<td height="250">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" height="250">
							<tr height="69">
								<td align="center" valign="middle" height="69"></td>
							</tr>
							<tr height="55">
								<td align="center" valign="middle" height="55">
								    <center>
									<?php echo _ZOOM_ECARD_SENDER;?>
									</center>
								</td>
							</tr>
							<tr height="25">
								<td align="center" valign="middle" height="25">
								    <center>
									<?php echo $zoom->ecard->getName("from");?>
									</center>
								</td>
							</tr>
							<tr height="30">
								<td align="center" valign="bottom" height="30">
								    <center>
									<?php echo $zoom->ecard->getEmail("from");?>
									</center>
								</td>
							</tr>
							<tr>
								<td></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
		} else {
			$img_path = $mosConfig_live_site."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$zoom->ecard->_image->_viewsize;
			// begin FRONT HTML...
			echo ("<a href=\"".sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&page=ecard&task=viewcard&ecdid='.$ecdid.'&back=1')."\" onmouseover=\"return overlib('"._ZOOM_ECARD_TURN."');\" onmouseout=\"return nd();\">\n"
			 . "\t<img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/ecard_turn.png\" border=\"0\" alt=\"\" />\n"
			 . "</a><br />\n");
			  if ($zoom->isImage($zoom->ecard->_image->_type)) {
			  	if (isset($destWidth) && isset($destHeight)) {
			  		?>
			  		<img src="<?php echo $img_path;?>" alt="" border="1" name="zImage" width="<?php echo $destWidth;?>" height="<?php echo $destHeight;?>" />
			  		<?php
			  	} else {
			  		?>
			  		<img src="<?php echo $img_path;?>" alt="" border="1" name="zImage" />
			  		<?php
			  	}
			  } elseif ($zoom->isDocument($zoom->ecard->_image->_type)) {
			  	?>
			  	<img src="<?php echo $zoom->ecard->_image->_thumbnail;?>" alt="" border="1" name="zImage" />
			  	<?php
			  } elseif ($zoom->isMovie($zoom->ecard->_image->_type)) {
			  	if ($zoom->isRealMedia($zoom->ecard->_image->_type)) {
			  		?>
			  		<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" height="304" width="320">
			  			<param name="controls" value="ImageWindow" />
			  			<param name="autostart" value="true" />
			  			<param name="src" value="<?php echo $img_path;?>" />
			  			<embed height="320" src="<?php echo $img_path;?>" type="audio/x-pn-realaudio-plugin" width="304" controls="ImageWindow" autostart="true" /> 
			  		</object>
			  		<?php
			  	} elseif ($zoom->isQuicktime($zoom->ecard->_image->_type)) {
			  		?>
			  		<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="304" width="320">
			  			<param name="src" value="<?php echo $img_path;?>" />
			  			<param name="autoplay" value="true" />
			  			<param name="controller" value="true" />
			  			<embed height="304" pluginspage="http://www.apple.com/quicktime/download/" src="<?php echo $img_path;?>" type="video/quicktime" width="320" controller="false" autoplay="true" />
			  		</object>
			  		<?php
			  	} else {
			  		?>
			  		<object id="MediaPlayer1" width="320" height="304" classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" type="application/x-oleobject">
			  			<param name="URL" value="<?php echo $img_path;?>" />
			  			<embed src="<?php echo $img_path;?>" height="304" width="320" border="0" type="application/x-mplayer2"/></embed>
			  		</object>
			  		<?php
			  	}
			  }
		}
	} else {
		?>
		<script language="javascript" type="text/javascript">
		<!--
		alert('<?php echo html_entity_decode(_ZOOM_ALERT_ECARDEXPIRED);?>');
		location = '<?php echo sefRelToAbs("index.php");?>';
		//-->
		</SCRIPT>
		<?php
	}
} else {
    $zoom->_gallery->_images[$key]->getInfo();
	// Display form with image and userfields...
	$img_path = $mosConfig_live_site."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$zoom->_gallery->_images[$key]->_viewsize;
	?>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
       	<td width="30" class="<?php echo $zoom->_tabclass[1]; ?>">&nbsp;</td>
       	<td class="<?php echo $zoom->_tabclass[1]; ?>" align="left" valign="top">
			<a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid); ?>">
			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN; ?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN; ?>
			</a> > <a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&catid='.$zoom->_gallery->_id); ?>"><?echo $zoom->_gallery->_name; ?>
			</a> > <strong><a href="<?php echo sefRelToAbs('index.php?option=com_zoom&Itemid='.$Itemid.'&page=view&catid='.$zoom->_gallery->_id.'&key='.$key); ?>"><?php echo $zoom->_gallery->_images[$key]->_filename; ?></a></strong>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/ecard_big.png" border="0" alt="<?php echo _ZOOM_ECARD_SENDAS; ?>">&nbsp;<b><font size="4"><?php echo _ZOOM_ECARD_SENDAS; ?></font></b></td>
	</tr>
	</table>
	<center>
	<br />
	<?php
	  if ($zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
	  	if (isset($destWidth) && isset($destHeight)) {
	  		?>
	  		<img src="<?php echo $img_path;?>" alt="" border="1" name="zImage" width="<?php echo $destWidth;?>" height="<?php echo $destHeight;?>" />
	  		<?php
	  	} else {
	  		?>
	  		<img src="<?php echo $img_path;?>" alt="" border="1" name="zImage" />
	  		<?php
	  	}
	  } elseif ($zoom->isDocument($zoom->_gallery->_images[$key]->_type)) {
	  	?>
	  	<img src="<?php echo $zoom->_gallery->_images[$key]->_thumbnail; ?>" alt="" border="1" name="zImage" />
	  	<?php
	  } elseif ($zoom->isMovie($zoom->_gallery->_images[$key]->_type)) {
	  	if ($zoom->isRealMedia($zoom->_gallery->_images[$key]->_type)) {
	  		?>
	  		<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" height="304" width="320">
	  			<param name="controls" value="ImageWindow" />
	  			<param name="autostart" value="true" />
	  			<param name="src" value="<?php echo $img_path;?>" />
	  			<embed height="320" src="<?php echo $img_path;?>" type="audio/x-pn-realaudio-plugin" width="304" controls="ImageWindow" autostart="true" /> 
	  		</object>
	  		<?php
	  	} elseif ($zoom->isQuicktime($zoom->_gallery->_images[$key]->_type)) {
	  		?>
	  		<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="304" width="320">
	  			<param name="src" value="<?php echo $img_path;?>" />
	  			<param name="autoplay" value="true" />
	  			<param name="controller" value="true" />
	  			<embed height="304" pluginspage="http://www.apple.com/quicktime/download/" src="<?php echo $img_path;?>" type="video/quicktime" width="320" controller="false" autoplay="true" />
	  		</object>
	  		<?php
	  	} else {
	  		?>
	  		<object id="MediaPlayer1" width="320" height="304" classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" type="application/x-oleobject">
	  			<param name="URL" value="<?php echo $img_path;?>" />
	  			<embed src="<?php echo $img_path;?>" height="304" width="320" border="0" type="application/x-mplayer2"/></embed>
	  		</object>
	  		<?php
	  	}
	  }
	?>
	<br />
	<form name="ecard" method="post" action="index.php" onSubmit="return validateCard(this)">
	<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td	nowrap><?php echo _ZOOM_ECARD_YOURNAME; ?>:</td>
		<td><input name="from_name"	type="text"	class="inputbox" /></td>
	</tr>
	<tr>
		<td	nowrap><?php echo _ZOOM_ECARD_YOUREMAIL; ?>:</td>
		<td><input name="from_email" type="text" class="inputbox" /></td>
	</tr>
	<tr>
		<td	nowrap><?php echo _ZOOM_ECARD_FRIENDSNAME; ?>:</td>
		<td><input name="to_name" type="text" class="inputbox" /></td>
	</tr>
	<tr>
		<td	nowrap><?php echo _ZOOM_ECARD_FRIENDSEMAIL; ?>:</td>
		<td><input name="to_email" type="text" class="inputbox" /></td>
	</tr>
	<tr>
		<td	nowrap valign="top"><?php echo _ZOOM_ECARD_MESSAGE; ?>:</td>
		<td><textarea name="message" id="message" class="inputbox" rows=3 cols=25></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit" value="<?php echo _ZOOM_ECARD_SENDCARD; ?>" class="button" />
		</td>
	</tr>
	</table>
	<input type="hidden" name="option" value="com_zoom" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
	<input type="hidden" name="page" value="ecard" />
	<input type="hidden" name="task" value="send" />
	<input type="hidden" name="catid" value="<?php echo $zoom->_gallery->_id; ?>" />
	<input type="hidden" name="key" value="<?php echo $key; ?>" />
	</form>
	</center>
	<?php
}