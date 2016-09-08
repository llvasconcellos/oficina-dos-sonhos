<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: September, 2005                                               |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: galleryshow.php                                           |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
if (!$catid) {
	//No gallery selected, show main screen
	$zoom->createSubmitScript('browse');
	?>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left" class="componentheader" width="30%"><h3><?php echo $zoom->_CONFIG['zoom_title'];?></h3></td>
		<?php
		if ($zoom->_CONFIG['showSearch'] && $zoom->_CONFIG['showKeywords']) {
		?>
		<td align="right" valign="bottom" class="componentheader">
			<div align="right">
			<form action="index.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=search&type=quicksearch" method="POST" name="browse">
			<?php
			echo $zoom->createKeywordsDropdown('sstring', '<option value="">>>'._ZOOM_SEARCH_KEYWORD.'<<</option>', 1);
			?>
			</form>
			</div>
		</td>
		<?php
		}
		?>
		<td align="right" valign="bottom" class="componenentheader" width="200">
			<div align="right">
			<?php if ($zoom->_CONFIG['displaylogo']) { ?>
				<a href="http://www.zoomfactory.org" target="_blank"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/zoom_logo_small.gif" border="0" alt="" /></a>
			<?php
			}
			if ($zoom->_CONFIG['showSearch']) {
			?>
			<form name="searchzoom" action="index.php" target=_top method="post">
			<input type="hidden" name="option" value="com_zoom" />
			<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
			<input type="hidden" name="page" value="search" />
			<input type="hidden" name="type" value="quicksearch" />
			<input type="hidden" name="sorting" value="3" />
			<input type="text" name="sstring" onBlur="if(this.value=='') this.value='<?php echo _ZOOM_SEARCH_BOX;?>';" onFocus="if(this.value=='<?php echo _ZOOM_SEARCH_BOX;?>') this.value='';" VALUE="<?php echo _ZOOM_SEARCH_BOX;?>" class="inputbox" />
			<a href="javascript:document.forms.searchzoom.submit();">&nbsp;<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/find.png" border="0" width="16" height="16" /></a>
			</form>
			</div>
			<?php
			}
			?>
		</td>
	</tr>
	</table>
	<table border="0" width="100%" cellspacing="0" cellpadding="5">
	<tr><td width="6%">&nbsp;</td>
	<?php
	//Get every category from the database and echo it on the screen
	$zoom->_counter = 0;
	$orderMethod = $zoom->getCatOrderMethod();
	if ($zoom->_isAdmin) {
		$database->setQuery("SELECT catid FROM #__zoom WHERE subcat_id=0 AND pos=0 ORDER BY ".$orderMethod);
	} else {
		$database->setQuery("SELECT catid FROM #__zoom WHERE subcat_id=0 AND pos=0 AND published=1 ORDER BY ".$orderMethod);
	}
	$zoom->_result = $database->query();
	while ($row = mysql_fetch_object($zoom->_result)) {
        $zoom->setGallery($row->catid, true);
        if ($zoom->_gallery->isMember()) {
        	if ($zoom->_CONFIG['catImg']) {
            	$zoom->_gallery->setCatImg();
            }
            //select the first image from the gallery handled by the loop...
            if ($zoom->_CONFIG['showMetaBox']) {
                // display category info, including image...
                $img_num = $zoom->_gallery->getNumOfImages();
                $subcat_num = $zoom->_gallery->getNumOfSubCats();
                $subcat_html = ($subcat_num <= 0) ? "" : ", ".$subcat_num." "._ZOOM_SUBGALLERIES;
            }	 
            if ($zoom->_counter >= $zoom->_CONFIG['catcolsno']) {
                echo "</tr><tr><td>&nbsp;</td>";
                $zoom->_counter = 0;
            }
            if ($zoom->_CONFIG['catImg']) {
                ?>
                <td align="left" valign="top" width="47%"><a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_id);?>" <?php echo ($zoom->_CONFIG['showMetaBox']) ? "onmouseover=\"return overlib('".$img_num." "._ZOOM_IMAGES.$subcat_html."', CAPTION, '".$zoom->_gallery->_name."');\" onmouseout=\"return nd();\"" : "";?>>
                <img border="0" hspace="0" src="<?php echo (empty($zoom->_gallery->_cat_img->_thumbnail)) ? 'components/com_zoom/www/images/noimg.gif' : $zoom->_gallery->_cat_img->_thumbnail;?>" align="right" />
                <?php
            } else {
            	?>
            	<td align="left" valign="top" width="50%"><a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_id);?>" <?php echo ($zoom->_CONFIG['showMetaBox']) ? "onmouseover=\"return overlib('".$img_num." "._ZOOM_IMAGES.$subcat_html."', CAPTION, '".$zoom->_gallery->_name."');\" onmouseout=\"return nd();\"" : "";?>>
            	<?php
            }
            echo $zoom->_CONFIG['galleryPrefix'].$zoom->_gallery->_name."</a><br />".$zoom->_gallery->_descr;
            if (!$zoom->_gallery->_published) {
            	echo "<br /><font color=\"red\">(unpublished)</font>";
            }
            echo "</td>\n";
            $zoom->_counter++;
        }
	}
    ?>
	</tr>
	</table>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<?php
	    if ($zoom->_isAdmin) {
      		echo '<td align="left" class="'.$zoom->_tabclass[1].'"><a href="'.sefRelToAbs('index.php?option=com_zoom&Itemid=' .$Itemid. '&page=admin').'"><img src="images/M_images/arrow.png" border="0" /> '._ZOOM_ADMINSYSTEM.'</a></td>';
		} elseif ($zoom->privileges->hasPrivileges()) {
	    	echo '<td align="left" class="'.$zoom->_tabclass[1].'"><a href="'.sefRelToAbs('index.php?option=com_zoom&Itemid=' .$Itemid. '&page=admin').'"><img src="images/M_images/arrow.png" border="0" /> '._ZOOM_USERSYSTEM.'</a></td>';
		}
	    ?>
		<td align="right" colspan="3" class="<?php echo $zoom->_tabclass[1];?>">
		<div align="right">
		<?php if ($zoom->_CONFIG['toptenOn']) { ?>
			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=special&sorting=0");?>"><?php echo _ZOOM_TOPTEN;?></a>&nbsp;|&nbsp;
		<?php } if ($zoom->_CONFIG['lastsubmOn']) { ?>
			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=special&sorting=1");?>"><?php echo _ZOOM_LASTSUBM;?></a>&nbsp;|&nbsp;
		<?php } if ($zoom->_CONFIG['commentsOn']) { ?>
			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=special&sorting=2");?>"><?php echo _ZOOM_LASTCOMM;?></a>&nbsp;|&nbsp;
		<?php } if ($zoom->_CONFIG['ratingOn']) { ?>
			 <a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=special&sorting=4");?>"><?php echo _ZOOM_TOPRATED;?></a>
		<?php } ?>
		</div>
		</td>
	</tr>
	</table>
	<?php
} else {
	if (!isset($catpass) && strlen($zoom->_gallery->_password) > 0 && !$zoom->_isAdmin && !$zoom->EditMon->isEdited($zoom->_gallery->_id, 'pass')) {
		?>
		<center>
		<form name="form1" method="post" action="index.php">
		<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td class="sectiontableheader" colspan="2">
				<?php echo _ZOOM_PASS_REQUIRED;?>
			</td>
		</tr>
		<tr height="50">
			<td class="<?php echo $zoom->_tabclass[0];?>">
				<?php echo _ZOOM_PASS;?>:
			</td>
			<td class="<?php echo $zoom->_tabclass[0];?>">
       			<input name="catpass" type="password" size="10" />
			</td
		</tr>
		<tr>
			<td class="<?php echo $zoom->_tabclass[1];?>" colspan="2" align="center">
				<div align="center">
				<input type="submit" name="submit" value="<?php echo _ZOOM_PASS_BUTTON; ?>" class="button">
				<script language="javascript" type="text/javascript">
					<!--
					 form1.catpass.focus();
					 form1.catpass.select();
					 //-->
				</script>
				</div>
			</td>
		</tr>
		</table>
		<input type="hidden" name="option" value="com_zoom" />
		<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
		<input type="hidden" name="catid" value="<?php echo $catid;?>" />
		</form>
		</center>
		<?php
	} elseif (isset($catpass)) {
		if ($zoom->_gallery->checkPassword($catpass)) {
			$valid = true;
		} else {
			?>
			<script language="javascript" type="text/javascript">
				<!--
				alert('<?php echo html_entity_decode(_ZOOM_PASS_INNCORRECT);?>');
				location = '<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_subcat_id);?>';
				//-->
			</SCRIPT>
			<?php
		}
	} else {
		$valid = true;
	}
	if ($valid && $zoom->_gallery->isMember()) {
	$imagedir = $zoom->_gallery->_dir;
	$parent = $zoom->_gallery->getSubcatName();

	$i = 1;
	$startRow = 0;

	//Set the page no
	if (empty($_REQUEST['PageNo'])) {
	    if ($startRow == 0) {
	        $PageNo = $startRow + 1;
	    }
	} else {
	    $PageNo = $_REQUEST['PageNo'];
	    $startRow = ($PageNo - 1) * $zoom->_CONFIG['PageSize'];
	}	
 	//Total of record
 	$RecordCount = $zoom->_gallery->getNumOfImages();//Number of files in gallery
	$endRow = $startRow + $zoom->_CONFIG['PageSize'] -1;
	if ($endRow >= $RecordCount) {
		$endRow = $RecordCount - 1;
	}
 	//Set Maximum Page
 	$MaxPage = ceil($RecordCount % $zoom->_CONFIG['PageSize']);
 	if ($RecordCount % $zoom->_['PageSize'] == 0) {
    	$MaxPage = ceil($RecordCount / $zoom->_CONFIG['PageSize']);
 	} else {
    	$MaxPage = ceil($RecordCount / $zoom->_CONFIG['PageSize']);
 	}
 	//Set the counter start
	$CounterStart = 1;
	//Counter End
	$CounterEnd = $MaxPage;
 	?>
	<script language="javascript" type="text/javascript">
		function submitform(pressbutton){
			document.adminForm.theButton.value=pressbutton;
			try {
				document.adminForm.onsubmit();
				}
			catch(e){}
			document.adminForm.submit();
		} 
		function submitbutton(pressbutton, theKey) {
			var form = document.adminForm;
			form.key.value = theKey;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			if (pressbutton == 'lightbox') {
				form.page.value = 'lightbox';
				form.action.value = 'add';
			}
			if (pressbutton == 'edit') {
				form.page.value = 'editimg';
			}
			if (pressbutton == 'delete') {
			    form.action.value = 'delimg';
			}
			submitform(pressbutton);
		}
	</script>
	<form name="adminForm" action="index.php" method="POST">
	<table border="0" cellspacing="0" cellpadding="3" width="100%">
	<tr>
 		<?php
            if ($zoom->_CONFIG['mainscreen']) {
		?>	
    	<td width="30" class="sectiontableheader"></td>
		<td class="sectiontableheader">
			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid);?>">
			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN;?>
			</a> >
			<?php
            	if ($zoom->_gallery->_pos==1) echo " <a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_subcat_id)."\">".$parent."</a> > ";
					elseif ($zoom->_gallery->_pos>=2) echo "..> <a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_subcat_id)."\">".$parent."</a> > "; 
						echo $zoom->_gallery->_name;
					if (!$zoom->_gallery->_published) {
						echo " <font color=\"red\">(unpublished)</font>";
					}
					if ($zoom->_isAdmin) {
            			echo ' | <a href="'.sefRelToAbs('index.php?option=com_zoom&Itemid=' .$Itemid. '&page=admin').'">'._ZOOM_ADMINSYSTEM.'</a>';
					} elseif ($zoom->privileges->hasPrivileges()) {
						echo ' | <a href="'.sefRelToAbs('index.php?option=com_zoom&Itemid=' .$Itemid. '&page=admin').'">'._ZOOM_USERSYSTEM.'</a>';
				}
	   		?>	
		<?php
			}
		?>	
		</td>
		<?php
		if ($zoom->_CONFIG['lightbox'] && $zoom->_gallery->getNumOfImages() > 0) {
			?>
			<td align="right" class="sectiontableheader">
				<div align="right">
				<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=lightbox&action=add&catid=".$zoom->_gallery->_id."&PageNo=".$PageNo."&lb_type=2");?>" onmouseover="return overlib('<?php echo _ZOOM_LIGHTBOX_GALLERY;?>', CAPTION, '<?php echo _ZOOM_LIGHTBOX;?>');" onmouseout="return nd();"><img src="components/com_zoom/www/images/lightbox.png" border="0" name="lightbox" /></a>
				</div>
			</td>
			<?php
		}
		?>
	</tr>
	</table>
	<center>
	<table border="0" cellspacing="0" cellpadding="3" width="80%">
	<tr>
		<?php
		$zoom->_counter = 0;
		foreach ($zoom->_gallery->_subcats as $subcat) {
			array_shift($zoom->_gallery->_subcats);
			if ($zoom->_counter >= $zoom->_CONFIG['catcolsno']) {
				echo "<td>&nbsp;</td></tr><tr>\n";
				$zoom->_counter = 0;
			}
			if ($zoom->_CONFIG['catImg']) {
				$subcat->setCatImg();
			}
			if ($zoom->_CONFIG['showMetaBox']) {
				$img_num = $subcat->getNumOfImages();
				$subcat_num = $subcat->getNumOfSubCats();
				$subcat_html = ($subcat_num <= 0) ? "" : ", ".$subcat_num." "._ZOOM_SUBGALLERIES;
			}			
			if ($subcat->isMember()) {
				?>
				<td valign="top" align="left">
					<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$subcat->_id); ?>" <?php echo ($zoom->_CONFIG['showMetaBox']) ? "onmouseover=\"return overlib('".$img_num." "._ZOOM_IMAGES.$zoom->quotesJS($subcat_html)."', CAPTION, '".$zoom->quotesJS($subcat->_name)."');\" onmouseout=\"return nd();\"" : "";?>>
					
				<?php
				if ($zoom->_CONFIG['catImg']) {
					echo "\t\t<img src=\"".(($subcat->_cat_img->_thumbnail == "") ? "components/com_zoom/www/images/folder.png" : $subcat->_cat_img->_thumbnail)."\" border=\"0\" align=\"left\" hspace=\"3\" />\n";
				}
    			echo $zoom->_CONFIG['galleryPrefix'].$subcat->_name."</a><br />".$subcat->_descr;
    			if (!$subcat->_published) {
    				echo "<br /><font color=\"red\">(unpublished)</font>";
    			}
    			echo "</td>\n";
    			$zoom->_counter++;
			}
		}
		?>
	</tr>
	</table>
 	<table border="0" cellpadding="3" cellspacing="0" width="100%">
	<tr>
		<td colspan="<?php echo $zoom->_CONFIG['columnsno']?>" align="center">
		<div align="center">
			<H2><?php echo $zoom->_gallery->_name;?></H2>
			<?php if ($zoom->_CONFIG['showHits']) {?>
			<?php
			if ($RecordCount != 0) {
				echo sprintf(_ZOOM_IMGFOUND, $RecordCount, $PageNo, $MaxPage);
			} elseif (!$zoom->_gallery->_hideMsg) {
				echo "<span class=\"small\">"._ZOOM_NOPICS."</span>";
			}
			?>
			<?php 
			}
			?>
		</div>
		</td>
	</tr>
	<tr>
	<?php
	$columnwidth = round(100 / $zoom->_CONFIG['columnsno']);
	$inforow = "";
	$zoom->_counter = 0;
	for ($counter = $startRow; $counter <= $endRow; $counter++) {
		$image = $zoom->_gallery->_images[$counter];
		$image->getInfo();
		// if($zoom->_CONFIG['viewtype'] == 1){ viewtype is going to implemented later on (with CSS support)...
		if ($image->isMember()) {
			// Basic and original multi-column compact style layout...
			$features =  "\t\t<td align=\"center\" valign=\"bottom\" width=\"".$columnwidth."%\" nowrap=\"nowrap\">\n";
			if ($zoom->isImage($image->_type)) {
				$size = $zoom->platform->getimagesize($zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$image->_filename);
			}
			if($zoom->_CONFIG['lightbox']) {
	  			$features .= ("\t\t<button onclick=\"submitbutton('lightbox', ".$counter.");\" onmouseover=\"return overlib('"._ZOOM_LIGHTBOX_ITEM."', CAPTION, '"._ZOOM_LIGHTBOX."');\" onmouseout=\"return nd();\" class=\"button\">\n"
				 . "\t\t<img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/lb_small.png\" border=\"0\" name=\"lb_small".$counter."\" /></button>");
	        }
			if ($zoom->_isAdmin || ($zoom->privileges->hasPrivilege('priv_delmedium') && ($image->_uid == $zoom->_CurrUID | $zoom->_gallery->isShared()))) {
				$features .= ("<button onclick=\"submitbutton('delete', ".$counter.");\" onmouseover=\"return overlib('"._ZOOM_DELETE."', CAPTION, '"._ZOOM_ACTION."');\" onmouseout=\"return nd();\" class=\"button\"><img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/delete.png\" border=\"0\" name=\"delimg".$counter."\" /></button>");
			}
			if ($zoom->_isAdmin || ($zoom->privileges->hasPrivilege('priv_editmedium') && ($image->_uid == $zoom->_CurrUID | $zoom->_gallery->isShared()))) {
				$features .= ("<button onclick=\"submitbutton('edit', ".$counter.");\" onmouseover=\"return overlib('"._ZOOM_BUTTON_EDIT."', CAPTION, '"._ZOOM_ACTION."');\" onmouseout=\"return nd();\" class=\"button\"><img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/edit.png\" border=\"0\" name=\"editimg".$counter."\" /></button>\n");
			}
			if ($zoom->_CONFIG['lightbox'] || $zoom->_isAdmin || (($zoom->privileges->hasPrivilege('priv_delmedium') || $zoom->privileges->hasPrivilege('priv_editmedium')) && $image->_uid == $zoom->_CurrUID)) {
				$features .= "<br />\n";
			}
			echo $features;
			$descr = $zoom->removeTags($image->_descr);
			if ($zoom->_CONFIG['showMetaBox']) {
				$link = "<a onmouseover=\"return overlib('".$zoom->quotesJS($descr)."', CAPTION, '".$zoom->quotesJS($image->_name)."');\" onmouseout=\"return nd();\"";
			} else {
				$link = "<a";
			}
			if (!$zoom->_CONFIG['popUpImages']) {
				$link .= " href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=view&catid=".$zoom->_gallery->_id."&PageNo=".$PageNo."&key=".$counter."&hit=1")."\">\n";
			} else {
				// encrypt the parameter string for optimal security...
				$params = $zoom->encrypt("catid=".$zoom->_gallery->_id."&key=".$counter."&isAdmin=".$zoom->_isAdmin."&hit=1");
				$link .= " href=\"javascript:void(0)\" onClick=\"window.open('".$mosConfig_live_site."/components/com_zoom/www/view.php?popup=1&q=".$params."', 'win1', 'width=";
				if ($size[0] < 550) {
					$link .= "550";
				} elseif ($size[0] > $zoom->_CONFIG['maxsize']) {
					$link .= $zoom->_CONFIG['maxsize'] + 50;
				} else {
					$link .= $size[0] + 40;
				}
				$link .= ", height=";
				if ($size[1] < 550) {
					$link .= "550";
				} elseif ($size[1] > $zoom->_CONFIG['maxsize']) {
					$link .= $zoom->_CONFIG['maxsize'] + 50;
				} else {
					$link .= $size[1] + 100;
				}
				$link .= ", scrollbars=1, resizable=1').focus()\">\n";
			}
			$link .= "<img border=\"1\" src=\"".$image->_thumbnail."\" />\n<br /></a>\n</td>\n";
			echo $link;
			// begin inforow here...
			$inforow .= "\t\t<td align=\"center\" valign=\"top\" width=\"".$columnwidth."%\">\n\t\t";
			if ($zoom->_CONFIG['showName']) {
				$inforow .= (empty($image->_name)) ? $image->_filename : $image->_name;
				$inforow .= "<br />\n";
			}
			if ($zoom->_CONFIG['commentsOn']) {
				// Adding comment-notification, eg. show a pic with last comment-author and date as alt-text.
				if ($mycom = $image->_comments[0]) {
					$inforow .= "\t\t<img border=\"0\" align=\"center\" src=\"".$mosConfig_live_site."/components/com_zoom/www/images/comment.png\" onmouseover=\"return overlib('".$mycom->getName().": ".$mycom->getDate()."', CAPTION, '"._ZOOM_COMMENTS."');\" onmouseout=\"return nd();\" />= ".$image->getNumOfComments();
					if ($zoom->_CONFIG['showHits']) {
						$inforow .= ", ";
					}
				}
			}
			if ($zoom->_CONFIG['showHits']) {
				$inforow .= $image->_hits . 'x ' . _ZOOM_HITS . "\n";
			}
			$inforow .= "\t\t</td>\n";
			//Counter to count the number of rows...
			$zoom->_counter++;
			$i++;
			if ($zoom->_counter % $zoom->_CONFIG['columnsno'] == 0) { 
				echo "</tr><tr>\n";
				$inforow .= "\t\t</tr><tr>\n";
				echo $inforow;
				$inforow = "";
			} elseif ($counter == $endRow && $zoom->_counter % $zoom->_CONFIG['columnsno'] != 0) {
				$remainder = $zoom->_CONFIG['columnsno'] - ($zoom->_counter % $zoom->_CONFIG['columnsno']);
				for ($x = 0; $x < $remainder; $x++) {
					echo "<td>&nbsp;</td>\n";
					$inforow .= "<td>&nbsp;</td>\n";
				}
				$inforow .= "\t\t</tr><tr>\n";
				echo "</tr><tr>\n";
				echo $inforow;
			}
		}// END if isMember()
		/**
		}elseif ($zoom->_CONFIG['viewtype'] == 2){
			// flat style (simple table layout...)
			
		}
		**/
	}// END for loop images.
	?>
	</tr>
	<tr>
		<td colspan="<?php echo $zoom->_CONFIG['columnsno']; ?>" align="center">
		<br />
		<div align="center">
		<?php
        //Print First & Previous Link if necessary
        if ($PageNo != 1) {
            $PrevStart = $PageNo - 1;
            echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=1")."\">"._ZOOM_FIRST." </a>: ";
            echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$PrevStart")."\">"._ZOOM_PREVIOUS." << </a>\n";
        }
        $c = 0;
        //Print Page No
        for ($c=$CounterStart; $c <= $CounterEnd; $c++) {
            if($c < $MaxPage){
                if ($c == $PageNo) {
                    if ($c % $RecordCount == 0) {
                        echo "<u><strong>$c</strong></u> ";
                    } else {
                        echo "<u><strong>$c</strong></u> | ";
                    }
                } elseif ($c % $RecordCount == 0) {
                    echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$c")."\"><strong>$c</strong></a> ";
                } else {
                    echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$c")."\"><strong>$c</strong></a> | ";
                }//END IF
            } else {
                if ($PageNo == $MaxPage) {
                    echo "<u><strong>$c</strong></u> ";
                } else {
                    echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$c")."\"><strong>$c</strong></a> ";
                }
            }
        }
        if ($PageNo < $MaxPage) {
          $NextPage = $PageNo + 1;
          echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$NextPage")."\">>> "._ZOOM_NEXT."</a>";
          echo " : <a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=$catid&PageNo=$MaxPage")."\">"._ZOOM_LAST."</a>\n";
        }
        ?>
      </div>
      <br />
	  </td>
	</tr>
	</table>
	<input type="hidden" name="catid" value="<?php echo $zoom->_gallery->_id; ?>" />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
	<input type="hidden" name="lb_type" value="1" />
	<input type="hidden" name="page" value="" />
	<input type="hidden" name="key" value="" />
	<input type="hidden" name="action" value="" />
	<input type="hidden" name="PageNo" value="<?php echo $PageNo; ?>" />
	<input type="hidden" name="theButton" value="" />
	</form>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<?php
		if ($zoom->_CONFIG['showSearch'] && $zoom->_CONFIG['showKeywords']) {
			$zoom->createSubmitScript('browse');
		?>
		<td align="left" valign="top" class="sectiontableheader">
			<form action="index.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=search&type=quicksearch" method="POST" name="browse">
			<?php echo $zoom->createKeywordsDropdown('sstring', '<option value="">>>'._ZOOM_SEARCH_KEYWORD.'<<</option>', 1);?>
			&nbsp;
			</form>
		</td>
		<td align="left" valign="top" class="sectiontableheader">
            <form name="searchzoom" action="index.php" target=_top method="post">
			<input type="hidden" name="option" value="com_zoom" />
			<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
			<input type="hidden" name="page" value="search" />
			<input type="hidden" name="type" value="quicksearch" />
			<input type="hidden" name="sorting" value="3" />
			<input type="text" name="sstring" onBlur="if(this.value=='') this.value='<?php echo _ZOOM_SEARCH_BOX;?>';" onFocus="if(this.value=='<?php echo _ZOOM_SEARCH_BOX;?>') this.value='';" VALUE="<?php echo _ZOOM_SEARCH_BOX;?>" class="inputbox" />
			<a href="javascript:document.forms.searchzoom.submit();">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/find.png" border="0" width="16" height="16" /></a>
			</form>
		</td>
		<?php
		} 
		if ($zoom->_CONFIG['lightbox']) { 
		?>
		<td align="right" valign="top" class="sectiontableheader">
			<a href="<?php echo sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=lightbox&catid=".$catid."&PageNo=".$PageNo);?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/lb_view.png" border="0" /><?php echo _ZOOM_LIGHTBOX_VIEW;?>
			</a>
		</td>
		<?php
		} ?>
	</tr>
	</table>
	<?php
	} else {
		echo _NOT_AUTH;
	}
}
?>