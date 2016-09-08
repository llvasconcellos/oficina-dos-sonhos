<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: August, 2005                                                  |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: search.php                                                |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$images = array();
$galleries = array();
$type = $_REQUEST['type'];
$i = 1;
$zoom->_counter = 0;
$tabcnt = 0;
$startRow = 0;

//Set the page no
if (empty($_GET['PageNo'])) {
    if($startRow == 0){
        $PageNo = $startRow + 1;
    }
} else {
    $PageNo = $_GET['PageNo'];
    $startRow = ($PageNo - 1) * $zoom->_pageSize;
}	
//Set the counter start
if ($PageNo % $zoom->_pageSize == 0) {
    $CounterStart = $PageNo - ($zoom->_pageSize - 1);
} else {
    $CounterStart = $PageNo - ($PageNo % $zoom->_pageSize) + 1;
}	
//Counter End
$CounterEnd = $CounterStart + ($zoom->_pageSize - 1);

if ($type == 'quicksearch') {
	$suchstring = trim(strtolower($sstring));
	$database->setQuery("SELECT DISTINCT img.imgid AS id, img.catid AS gallery_id, users.name AS name, users.username AS username "
	 . "FROM #__zoomfiles AS img"
	 . " LEFT JOIN #__zoom AS cats ON img.catid = cats.catid"
	 . " LEFT JOIN #__users AS users ON img.uid = users.id"
	 . "   WHERE cats.catpassword = '' "
	 . "    AND img.published = 1"
	 . "    AND LOWER(img.imgdescr) LIKE '%$suchstring%' "
	 . "    OR LOWER(img.imgname) LIKE '%$suchstring%' "
	 . "    OR LOWER(img.imgfilename) LIKE '%$suchstring%' "
     . "    OR img.imgdate LIKE '%$suchstring%'"
     . "    OR LOWER(img.imgkeywords) LIKE '%$suchstring%'"
	 . "    OR LOWER(cats.catname) LIKE '%$suchstring%' "
	 . "    OR LOWER(cats.catdescr) LIKE '%$suchstring%' "
     . "    OR LOWER(cats.catkeywords) LIKE '%$suchstring%'"
     . "    OR LOWER(users.name) LIKE '%$suchstring%'"
     . "    OR LOWER(users.username) LIKE '%$suchstring%'"
	 . " ORDER BY id DESC");
	// Displaying query-results:
	$zoom->_result = $database->query();
	while ($row1 = mysql_fetch_object($zoom->_result)) {
		$images[] = new image($row1->id);
        $galleries[] = $row1->gallery_id;
	}
    //Then search through pdf-documents...
    $database->setQuery("SELECT imgid, catid FROM #__zoomfiles WHERE imgfilename LIKE '%.pdf'");
    $zoom->_result = $database->query();
    while ($row2 = mysql_fetch_object($zoom->_result)) {
        $pdf_doc = new image($row2->imgid);
        if ($zoom->toolbox->searchPdf($pdf_doc, $suchstring)) {
            $images[] = $pdf_doc;
            $galleries[] = $row2->catid;
        }
    }
    $startRow = 0;

	//Set the page no
	$PageNo = mosGetParam($_REQUEST,'PageNo');
	if (!$PageNo) {
	    if ($startRow == 0) {
	        $PageNo = $startRow + 1;
	    }
	} else {
	    $startRow = ($PageNo - 1) * $zoom->_pageSize;
	}
	//Total of record
	$RecordCount = sizeof($images);	
	$endRow = $startRow + $zoom->_pageSize -1;
	if ($endRow >= $RecordCount) {
		$endRow = $RecordCount - 1;	
	}
	//Set Maximum Page
	$MaxPage = $RecordCount % $zoom->_pageSize;
	if ($RecordCount % $zoom->_pageSize == 0) {
		if ($RecordCount != 0 && $zoom->_pageSize != 0) {
			$MaxPage = $RecordCount / $zoom->_pageSize;
		} else {
			$MaxPage = 0;
		}		
	} else {
		$MaxPage = ceil($RecordCount / $zoom->_pageSize);
	}
	//Set the counter start
	$CounterStart = 1;
	//Counter End
	$CounterEnd = $MaxPage;
	?>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
	       <td width="30" class="<?php echo $zoom->_tabclass[1]; ?>"></td>
	       <td class="<?php echo $zoom->_tabclass[1]; ?>">
			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid); ?>">
			<img src="<?php $mosConfig_live_site; ?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN; ?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN; ?>
			</a> > <?php echo _ZOOM_SEARCHRESULTS.' "<b>'.$suchstring.'</b>"'; ?>
			</td>
		</tr>
	</table>
	<table border="0" cellspacing="0" cellpadding="3" width="100%">
	<tr>
		<td align="center" valign="center" colspan="4">
		<?php
		if ($RecordCount != 0) {
			echo sprintf(_ZOOM_IMGFOUND, $RecordCount, $PageNo, $MaxPage);
		} elseif(!$zoom->_gallery->_hideMsg) {
			echo "<span class=\"small\">"._ZOOM_NOPICS."</span>";
		}
		?>
		</td>
	</tr>
	<?php
	$tabcnt = 0;
	for ($counter = $startRow; $counter <= $endRow; $counter++) {
		$zoom->_counter++;
		$image = $images[$counter];
        $zoom->setGallery($galleries[$counter]);
		$image->getInfo();
		$imgKey = $zoom->_gallery->getImageKey($image->_id);
		if ($zoom->_gallery->isMember() || $image->isMember()) {
			echo "\t<tr class=\"".$zoom->_tabclass[$tabcnt]."\"><td width=\"20\">&nbsp; ".$zoom->_counter." &nbsp;</td>\n";
			if (!$zoom->_CONFIG['popUpImages']) {
				?>
				<td align="left" width="<?php echo $zoom->_CONFIG['size'];?>">
				<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=view&catid=".$zoom->_gallery->_id."&key=".$imgKey."&hit=1");?>">
				<?php
			} else {
			    $params = $zoom->encrypt("catid=".$zoom->_gallery->_id."&key=".$imgKey."&isAdmin=".$zoom->_isAdmin."&hit=1");
				?>
				<td align="left" width="<?php echo $zoom->_CONFIG['size'];?>">
				<a href="javascript:void(0);" onclick="window.open('components/com_zoom/www/view.php?popup=1&q=<?php echo $params; ?>', 'win1', 'width=<?php if($image->_size[0]<450){ echo "450";}elseif($image->_size[0]>$zoom->_CONFIG['maxsize']){ echo $zoom->_CONFIG['maxsize'] + 50;}else{ echo $image->_size[0] + 40;} ?>, height=<?php if($image->_size[1]<350){ echo "350";}elseif($image->_size[1]>$zoom->_CONFIG['maxsize']){ echo $zoom->_CONFIG['maxsize'] + 50;}else{ echo $image->_size[1] + 100;} ?>,scrollbars=1').focus()">
				<?php
			}
			echo ("<img src=\"".$image->_thumbnail."\" alt=\"\" border=\"0\" /></td>\n"
			 . "\t\t\t<td width=\"10\"></td>\n"
			 . "\t\t\t<td align=\"left\">\n"
			 . "\t\t\t\t<b>".$zoom->highlight($suchstring, $image->_filename)."</b><br />\n");
			if ($zoom->_CONFIG['showHits']) {
				echo "\t\t\t\thits = ".$image->_hits."<br />\n\t\t\t\t";
			}
			if ($zoom->_CONFIG['ratingOn']) {
				if($image->_votenum!=0){
					if ($image->_votesum!=0) {
						$rating = round($image->_votesum / $image->_votenum);
					} else {
						$rating = 0;
					}
					?>
					<img src="<?php $mosConfig_live_site; ?>/components/com_zoom/www/images/rating/rating<?php echo $rating;?>.gif" alt="" border="0" /> (<?php echo $image->_votenum;?>
					<?php
					if ($image->_votenum==1) {
						echo _ZOOM_VOTE.")<br />\n";
					} else {
						echo _ZOOM_VOTES.")<br />\n";
					}
				} else {
					echo _ZOOM_NOTRATED."<br />\n";
				}
			}
			echo ("\t\t\t\t<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_id)."\">\n"
			 . "\t\t\t\t\t".$zoom->highlight($suchstring, $zoom->_gallery->getCatVirtPath())."</a>\n"
			 . "\t\t\t</td>\n"
			 . "\t\t</tr>\n");
			if ($tabcnt >= 1) {
				$tabcnt = 0;
			} else {
				$tabcnt++;
			}
		}
		
	}
	?>
	<tr>
		<td align="left" valign="top" class="<?php echo $zoom->_tabclass[$tabcnt];?>" colspan="3">
			<?php
			if ($zoom->_CONFIG['showSearch'] && $zoom->_CONFIG['showKeywords']) {
				$zoom->createSubmitScript('browse');
			}
			?>
			<form action="index.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=search&type=quicksearch" method="POST" name="browse">
			<?php
			echo $zoom->createKeywordsDropdown('sstring', '<option value="">>>Search by keyword<<</option>', 1);
			?>&nbsp;
			</form>
		</td>
		<td align="center" valign="top" class="<?php echo $zoom->_tabclass[$tabcnt];?>">
            <form name="searchzoom" action="index.php" target=_top method="post">
			<input type="hidden" name="option" value="com_zoom" />
			<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" >
			<input type="hidden" name="page" value="search" />
			<input type="hidden" name="type" value="quicksearch" />
			<input type="hidden" name="sorting" value="3" />
			<input type="text" name="sstring" style="border: 1px solid; font: 10px Arial" onBlur="if(this.value=='') this.value='<?php echo $suchstring;?>';" onFocus="if(this.value=='<?php echo $suchstring;?>') this.value='';" value="<?php echo $suchstring;?>" />
			<a href="javascript:document.forms.searchzoom.submit();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/find.png" border="0" width="16" height="16"></a>
			</form>
		</td>
	</tr>
	<?php
	echo "</table><center>";
	//Print First & Previous Link if necessary
	if ($PageNo !=	1) {
		$PrevStart = $PageNo - 1;
		echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=1")."\">"._ZOOM_FIRST." </a>:	";
		echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$PrevStart")."\">"._ZOOM_PREVIOUS." << </a>\n";
	}
	$c = 0;
	//Print	Page No
	for ($c=$CounterStart;$c<=$CounterEnd;$c++) {
		if ($c < $MaxPage) {
			if ($c == $PageNo) {
				if ($c %	$RecordCount ==	0) {
					echo "<u><strong>$c</strong></u> ";
				} else {
					echo "<u><strong>$c</strong></u> | ";
				}
			} elseif($c % $RecordCount == 0) {
				echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$c")."\"><strong>$c</strong></a> ";
			} else {
				echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$c")."\"><strong>$c</strong></a> | ";
			}
		} else {
			if ($PageNo == $MaxPage) {
				echo "<u><strong>$c</strong></u> ";
				break;
			} else {
				echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$c")."\"><strong>$c</strong></a> ";
			}
		}
	}
	if ($PageNo < $MaxPage) {
		$NextPage = $PageNo + 1;
		echo "<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$NextPage")."\">>> "._ZOOM_NEXT."</a>";
		echo " : <a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=search&type=quicksearch&sstring=".$sstring."&PageNo=$MaxPage")."\">"._ZOOM_LAST."</a>\n";
	}
	echo "</center>\n";
}