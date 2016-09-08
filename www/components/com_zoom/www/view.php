<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: December, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: view.php                                                  |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
if (array_key_exists('popup', $_REQUEST)) {
	$popup = $_REQUEST['popup'];
}
if ($popup) {
	define( "_VALID_MOS", 1 ); 
	include_once('../../../configuration.php');
	if (file_exists($mosConfig_absolute_path."/version.php")) {
		include_once($mosConfig_absolute_path."/version.php");
	} elseif (file_exists($mosConfig_absolute_path."/includes/version.php")) {
		include_once($mosConfig_absolute_path."/includes/version.php");
	}
	if (file_exists($mosConfig_absolute_path."/classes/database.php")) {
		include_once($mosConfig_absolute_path."/classes/database.php");
	} elseif (file_exists($mosConfig_absolute_path."/includes/database.php")) {
		include_once($mosConfig_absolute_path."/includes/database.php");
	}
	$database = new database($mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix);
	if (file_exists( $mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php" ) ) {
		include_once( $mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php" );
	} else {
		include_once( $mosConfig_absolute_path."/components/com_zoom/lib/language/english.php" );
	}
	// Create zOOm Image Gallery object
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/zoom.class.php");
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/toolbox.class.php");
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/editmon.class.php"); //like a common session-monitor...
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/gallery.class.php");
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/image.class.php");
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/comment.class.php");
	require_once($mosConfig_absolute_path."/components/com_zoom/lib/privileges.class.php");
	// Load configuration file...
	include($mosConfig_absolute_path."/components/com_zoom/etc/zoom_config.php");
	$zoom = new zoom();
	
	// get variables from HTTP request...
	$q = $zoom->decrypt($zoom->getParam($_REQUEST, 'q'));
	$params = split("&", $q);
	foreach ($params as $param) {
		$var = split("=", $param);
		if (count($var) === 2) {
			$_REQUEST[$var[0]] = $var[1];
		}
	}
	$catid = $zoom->getParam($_REQUEST, 'catid');
	$isAdmin = $zoom->getParam($_REQUEST, 'isAdmin', false);
	
	$zoom->toolbox = new toolbox();
	$zoom->setGallery($catid);
	if ($isAdmin) {
		$zoom->_isAdmin = true;
	}
	if ($zoom->isWin()) {
		require_once($mosConfig_absolute_path.'/components/com_zoom/lib/WinNtPlatform.class.php');
		$zoom->platform = new WinNtPlatform();
	} else {
		require_once($mosConfig_absolute_path.'/components/com_zoom/lib/UnixPlatform.class.php');
		$zoom->platform = new UnixPlatform();
	}
}
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// get variables from HTTP request...
$key = $zoom->getParam($_REQUEST,'key');
$PageNo = $zoom->getParam($_REQUEST,'PageNo');
$hit = $zoom->getParam($_REQUEST,'hit');
$delComment = $zoom->getParam($_REQUEST, 'delComment');
$submit = $zoom->getParam($_REQUEST,'submit');
$vote = $zoom->getParam($_REQUEST,'vote');
$hit = $zoom->getParam($_REQUEST,'hit');

// get the file-data for display
$zoom->_gallery->_images[$key]->getInfo(false);
if ($zoom->_gallery->_images[$key]->isMember($popup)) {
  if (isset($submit)) {
  	$uname = $zoom->getParam($_REQUEST,'uname');
  	$comment = $zoom->getParam($_REQUEST,'comment');
  	$zoom->_gallery->_images[$key]->addComment($uname,$comment);
  }
  if (isset($delComment)) {
  	$zoom->_gallery->_images[$key]->delComment($delComment);
  }
  if (isset($vote)) {
  	$zoom->_gallery->_images[$key]->rateImg($vote);
  }
  // update hitcounter for this image...
  if (isset($hit)) {
  	$zoom->_gallery->_images[$key]->hitPlus();
  }
  if ($zoom->_CONFIG['popUpImages']) {
  	?>
  	<?php echo "<?xml version=\"1.0\" encoding=\"" . _ZOOM_ISO . "\"?".">"; ?>
  	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  	<html xmlns="http://www.w3.org/1999/xhtml">
  	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _ZOOM_ISO; ?>">
  	<link href="../etc/popup.css" rel="stylesheet" media="screen">
  	<?php
  }
  if ($zoom->_CONFIG['readEXIF']) {
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/JPEG.php");
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/EXIF.php");
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/JFIF.php");
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/Photoshop_IRB.php");
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/PictureInfo.php");
	include($mosConfig_absolute_path."/components/com_zoom/lib/iptc/XMP.php");
	?>
	<style type="text/css" media="all">
	<!--
		.EXIF_Table {  padding: 3px; border: solid 1px black; outline: solid 1px black }
	-->
	</style>
	<?php
  }
  $img_path = $mosConfig_live_site."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$zoom->_gallery->_images[$key]->_viewsize;
  $img_loc = $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->_dir."/".$zoom->_gallery->_images[$key]->_viewsize;
  $dir_prefix = $mosConfig_live_site."/components/com_zoom/www/";
  if ($zoom->_CONFIG['popUpImages']) {
  	$url_prefix = "view.php?popup=1&catid=".$zoom->_gallery->_id;
  } else {
  	$url_prefix = "index.php?option=com_zoom&Itemid=".$Itemid."&page=view&catid=".$zoom->_gallery->_id;
  }
  if ($zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
  	$size = $zoom->platform->getimagesize($img_loc);
  } else {
      $size = $zoom->platform->getimagesize(str_replace($mosConfig_live_site, $mosConfig_absolute_path, $zoom->_gallery->_images[$key]->_thumbnail));
  }
  $first_img = 0;
  $last_img = count($zoom->_gallery->_images) - 1;
  if ($key == $first_img) {
  	$pid = $last_img;
  } else {
  	if ($key == $last_img) {
  		$pid = ($key == count($zoom->_gallery->_images)) ? $key : $key-1;
  	} else {
  		$pid = ($key == (count($zoom->_gallery->_images) - 1)) ? $key : $key-1;
  	}
  }
  if ($key == $last_img) {
  	$nid = $first_img;
  } else {
  	$nid = ($key == (count($zoom->_gallery->_images) - 1)) ? $key : $key+1;
  }
  if ($zoom->_CONFIG['slideshow']) {
  	$zoom->createSlideshow($key);
  }
  if ($zoom->_CONFIG['popUpImages']) {
  	?>
  	<script language="javascript" type="text/javascript">
  	<!--
  	function newLoc(id){
  		window.document.location= 'view.php?imgid=<?php echo $imgid;?>&isAdmin=<?php echo $isAdmin;?>&delComment=' +id;
  	}
  	function lb_add(){
  		window.opener.location = '<?php echo $mosConfig_live_site."/index.php?option=com_zoom&Itemid=".$Itemid."&page=lightbox&action=add&catid=".$zoom->_gallery->_id."&key=".$key."&PageNo=".$PageNo."&lb_type=3";?>'
  	}
  	function send_ecard(){
  		window.opener.location = '<?php echo $mosConfig_live_site."/index.php?option=com_zoom&Itemid=".$Itemid."&page=ecard&catid=".$zoom->_gallery->_id."&key=".$key;?>';
  		window.opener.focus();
  		window.close();
  	}
  	function searchKeyword(keyword){
  		window.opener.location = '<?php echo $mosConfig_live_site."/index.php?option=com_zoom&page=search&type=quicksearch&catid=".$zoom->_gallery->_id."&key=".$key;?>&sstring=' +keyword;
  		window.opener.focus();
  		window.close();
  	}
  	//-->
  	</script>
  	<script language="javascript" type="text/javascript" src="../../../includes/js/overlib_mini.js"></script>
  	<script language="javascript" type="text/javascript" src="../lib/js/prototype.js"></script>
  	<script language="javascript" type="text/javascript" src="../lib/js/scriptaculous.js"></script>
  	<title><?php echo $zoom->_CONFIG['zoom_title']." - ".$zoom->_gallery->_images[$key]->_filename;?></title>
  	</head>
  	<body>
  	<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
  	<center>
	<?php 
	if ($zoom->_CONFIG['close']) {
        ?>
        <a href="javascript:window.close()"><?php echo _ZOOM_CLOSE; ?></a><br /><br />
        <?php 
	} 
	?>
  	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  	<tr>
    	<td width="100%">&nbsp;</td>
  		<?php
            if($zoom->_CONFIG['lightbox']){
                echo ("\t\t<td align=\"right\" valign=\"top\" width=\"40\">\n"
                 . "\t\t<a href=\"javascript:lb_add();\" onmouseover=\"return overlib('"._ZOOM_LIGHTBOX_ITEM."', CAPTION, '"._ZOOM_LIGHTBOX."');\" onmouseout=\"return nd();\">\n"
                 . "\t\t<img src=\"".$dir_prefix."images/lightbox.png\" border=\"0\" name=\"lightbox\" /></a>&nbsp;\n"
                 . "\t\t</td>\n");
            }
            if($zoom->_CONFIG['ecards']){
                ?>
                <td align="right" valign="top" width="40">
                	<a href="javascript:send_ecard();" onmouseover="return overlib('<?php echo _ZOOM_ECARD_SENDAS; ?>', CAPTION, '<?php echo _ZOOM_ECARD_SENDCARD; ?>');" onmouseout="return nd();">
                	<img src="<?php echo $dir_prefix; ?>images/ecard.png" border="0" name="ecard" /></a>
                </td>
                <?php
  		    } // end IF ecards
  		?>
  	</tr>
  	</table>
  	</center>
  	<?php
  } else {
  	?>
  	<script language="javascript" type="text/javascript" src="components/com_zoom/lib/js/prototype.js"></script>
  	<script language="javascript" type="text/javascript" src="components/com_zoom/lib/js/scriptaculous.js"></script>
  	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  	<tr>
        <td width="30" class="sectiontableheader"></td>
        <td class="sectiontableheader" align="left" valign="middle">
		<?php
		if ($zoom->_CONFIG['mainscreen']) {
		    ?>
  			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid); ?>">
  			<img src="<?php echo $dir_prefix; ?>images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN; ?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN; ?>
  			</a> > 
  	        <?php 
		}
		    ?>
  			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&catid=".$zoom->_gallery->_id."&PageNo=".$PageNo); ?>"><?php echo $zoom->_gallery->_name; ?>
  			</a> > <strong><?php echo $zoom->_gallery->_images[$key]->_filename; ?></strong>
  		</td>
  		<?php
        if ($zoom->_CONFIG['lightbox']) {
            echo ("\t\t<td align=\"center\" valign=\"top\" class=\"sectiontableheader\" width=\"40\">\n"
             . "\t\t<a href=\"".sefRelToAbs("index.php?option=com_zoom&Itemid=".$Itemid."&page=lightbox&action=add&catid=".$zoom->_gallery->_id."&key=".$key)."\" onmouseover=\"return overlib('"._ZOOM_LIGHTBOX_ITEM."', CAPTION, '"._ZOOM_LIGHTBOX."');\" onmouseout=\"return nd();\">\n"
             . "\t\t<img src=\"".$mosConfig_live_site."/components/com_zoom/www/images/lightbox.png\" border=\"0\" name=\"lightbox\" /></a>&nbsp;\n"
             . "\t\t</td>\n");
        }
        if ($zoom->_CONFIG['ecards']) {
      		?>
      		<td align="center" valign="top" class="sectiontableheader" width="40">
      			<a href="<?php echo sefRelToAbs("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=ecard&catid=".$zoom->_gallery->_id."&key=".$key); ?>" onmouseover="return overlib('<?php echo _ZOOM_ECARD_SENDAS; ?>', CAPTION, '<?php echo _ZOOM_ECARD_SENDCARD; ?>');" onmouseout="return nd();">
      			<img src="<?php echo $dir_prefix; ?>images/ecard.png" border="0" name="ecard" /></a>
      		</td>
      		<?php
  		} // end IF ecards
  		?>
  	</tr>
  	</table>
  	<?php
  }
  ?>
  <link href="<?php echo $mosConfig_live_site; ?>/components/com_zoom/etc/zoom.css" rel="stylesheet" media="screen">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <?php
  if ($zoom->_CONFIG['slideshow'] && $zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
      ?>
      <tr>
      	<td align="center" valign="middle">
      		<div align="center">
      		<?php echo _ZOOM_SLIDESHOW; ?>
      		</div>
      	</td>
      </tr>
      <?php
  }
  ?>
  <tr>
  	<td align="center" valign="middle">
 		<div align="center">
		<?php
        if ($zoom->_CONFIG['navbuttons']) {
        ?>
  		<a href="<?php if($first_img==$key) echo "javascript:void(0);"; else echo $url_prefix."&key=".$first_img."&hit=".$hit; ?>" onmouseover="return overlib('<?php echo _ZOOM_FIRST_IMG; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/first_img.png" border="0" /></a>
  		<a href="<?php if($pid==$key) echo "javascript:void(0);"; else echo $url_prefix."&key=".$pid."&hit=".$hit; ?>" onmouseover="return overlib('<?php echo _ZOOM_PREV_IMG; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/prev.png" border="0" /></a>
  		<?php 
		}
		?>
		<?php
        if ($zoom->_CONFIG['slideshow'] && $zoom->isImage($zoom->_gallery->_images[$key]->_type)) { //Display play & stop buttons?
            ?>
            <a href="javascript:startSlideShow();" onmouseover="return overlib('<?php echo _ZOOM_PLAY; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/play.png" border="0" /></a>
            <a href="javascript:endSlideShow();" onmouseover="return overlib('<?php echo _ZOOM_STOP; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/stop.png" border="0" /></a>
            <?php
        }
  		?>
		<?php
        if ($zoom->_CONFIG['navbuttons']) {
            ?>
            <a href="<?php if($nid==$key) echo "javascript:void(0);"; else echo $url_prefix."&key=".$nid."&hit=".$hit; ?>" onmouseover="return overlib('<?php echo _ZOOM_NEXT_IMG; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/next.png" border="0" /></a>
            <a href="<?php if($last_img==$key) echo "javascript:void(0);"; else echo $url_prefix."&key=".$last_img."&hit=".$hit; ?>" onmouseover="return overlib('<?php echo _ZOOM_LAST_IMG; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix; ?>images/last_img.png" border="0" /></a>
            <?php 
        }
		?>
		</div>
  	</td>
  </tr>
  </table>
  <?php
  if ($zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
    if ($zoom->_CONFIG['zoomOn']) {
        $viewsize_info = getimagesize($img_loc);
	?>
	<div align="center">
	<div style="float:center" onmouseover="zoom_on(event,<?php echo $viewsize_info[0].",".$viewsize_info[1].",'".$img_path."'"; ?>);" onmousemove="zoom_move(event);" onmouseout="zoom_off();">
	<?php
    }
    ?>
	   <img src="<?php echo $img_path; ?>" alt="" id="zImage" name="zImage" style="padding:0;margin:0;border:0" />
    <?php
    if ($zoom->_CONFIG['zoomOn']) {
    ?>
	</div></div><div style="clear:both;"></div>
	<?php
    }
  } elseif ($zoom->isDocument($zoom->_gallery->_images[$key]->_type)) {
  	require_once($mosConfig_absolute_path."/components/com_zoom/lib/pdf.class.php");
  	$pdf = new PDF_parser($img_path);
  	//print_r($pdf->parse($img_path));
  	?>
  	<img src="<?php echo $zoom->_gallery->_images[$key]->_thumbnail; ?>" alt="" border="1" name="zImage"<?php echo ($zoom->_CONFIG['popUpImages']) ? " onClick=\"javscript:window.close()\"" : ""; ?> />
  	<?php
  } elseif ($zoom->isMovie($zoom->_gallery->_images[$key]->_type)) {
    $metadata = $zoom->_gallery->_images[$key]->_metadata;
  	if ($zoom->isRealMedia($zoom->_gallery->_images[$key]->_type)) {
  		?>
  		<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" height="304" width="320">
  			<param name="controls" value="ImageWindow" />
  			<param name="autostart" value="true" />
  			<param name="src" value="<?php echo $img_path; ?>" />
  			<embed height="320" src="<?php echo $img_path; ?>" type="audio/x-pn-realaudio-plugin" width="304" controls="ImageWindow" autostart="true" /> 
  		</object>
  		<?php
  	} elseif ($zoom->isQuicktime($zoom->_gallery->_images[$key]->_type)) {
  		?>
  		<object classid="CLSID:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="304" width="320">
  			<param name="src" value="<?php echo $img_path;?>" />
  			<param name="autoplay" value="true" />
  			<param name="controller" value="true" />
  			<embed height="304" pluginspage="http://www.apple.com/quicktime/download/" src="<?php echo $img_path;?>" type="video/quicktime" width="320" controller="true" autoplay="true" /> 
  		</object>
  		<?php
  	} else {
  		?>
  		<object id="MediaPlayer1" width="320" height="304" classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" type="application/x-oleobject">
  			<param name="URL" value="<?php echo $img_path;?>" />
			<param name="ShowControls" value="0"> 
  			<embed src="<?php echo $img_path; ?>" height="304" width="320" border="0" type="application/x-mplayer2"/></embed>
  		</object>
  		<?php
  	}
  } elseif ($zoom->isAudio($zoom->_gallery->_images[$key]->_type)) {
	$id3_data = $zoom->_gallery->_images[$key]->_metadata;
	if ($zoom->isPlayable($zoom->_gallery->_images[$key]->_type)) {
		$artist = (!empty($id3_data["comments_html"]["artist"][0])) ? $id3_data["comments_html"]["artist"][0] : "no artist";
		$title = (!empty($id3_data["comments_html"]["title"][0])) ? $id3_data["comments_html"]["title"][0] : "no title";
		$zoom->createPlaylist($img_path, $artist, $title);
		?>
        <object type="application/x-shockwave-flash" data="<?php echo $mosConfig_live_site; ?>/components/com_zoom/www/zoomplayer.swf" width="280" height="280" wmode="transparent">
            <param name="movie" value="<?php echo $mosConfig_live_site; ?>/components/com_zoom/www/zoomplayer.swf" />
            <param name="wmode" value="transparent" />
        </object>
		<?php
	} else {
    	?>
    	<img src="<?php echo $zoom->_gallery->_images[$key]->_thumbnail; ?>" alt="" border="1" name="zImage"<?php echo ($zoom->_CONFIG['popUpImages'] && !$zoom->isAudio($zoom->_gallery->_images[$key]->_type)) ? " onClick=\"javscript:window.close()\"" : ""; ?> />
    	<br />
    	<?php
	}
  }
  if ($zoom->_CONFIG['zoomOn'] && $zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
      ?>
      <!-- what would zOOm Image Gallery be withouts its zoom-function!? -->
      <p><img src="<?php echo $dir_prefix;?>images/zoom_plus.png" border="0">/<img src="<?php echo $dir_prefix; ?>images/zoom_minus.png" border="0">: <?php echo _ZOOM_IN_DESC; ?></p>
      <?php
  } //END IF zoom?
  if ($zoom->_CONFIG['properties']) {
      ?>
      <br /><br />
      <!-- beginning of floating-box to hide details when the Slideshow has started... -->
      <div id="details">
      <?php
      $properties_block = $zoom->createViewBlock(_ZOOM_PROPERTIES, 100);
      echo $properties_block['html'];
      ?>
      <table border="0" cellspacing="0" cellpadding="3">
              <?php if ($zoom->_CONFIG['showName']) { ?>
      		<tr>
      			<td align="left" width="100"><?php echo _ZOOM_IMGNAME; ?>: </td>
      			<td align="left"><?php echo $zoom->_gallery->_images[$key]->_name; ?></td>
      		</tr>
              <?php }
              if ($zoom->_CONFIG['showFilename']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_FILENAME; ?>: </td>
      			<td align="left">
      				<?php
      					if ($zoom->isDocument($zoom->_gallery->_images[$key]->_type)) {
      						echo "<a href=\"".$img_path."\" target=\"_TOP\">".$zoom->_gallery->_images[$key]->_filename."</a> "._ZOOM_CLICKDOCUMENT;
      					} else {
      						echo $zoom->_gallery->_images[$key]->_filename;
      					}
      				?>
      			</td>
      		</tr>
              <?php }
              if ($zoom->_CONFIG['showKeywords']) { ?>
              <tr>
      			<td align="left"><?php echo _ZOOM_KEYWORDS; ?>: </td>
      			<td align="left"><?php echo $zoom->_gallery->_images[$key]->getKeywords(2); ?></td>
      		</tr>
              <?php }
              if ($zoom->_CONFIG['showDate']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_DATE; ?>: </td>
      			<td align="left"><?php echo $zoom->convertDate($zoom->_gallery->_images[$key]->_date); ?></td>
      		</tr>
      		  <?php }
              if ($zoom->_CONFIG['showUsername']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_UNAME; ?>: </td>
      			<td align="left"><?php echo $zoom->_gallery->_images[$key]->getUsername(2); ?></td>
      		</tr>
              <?php }
              if ($zoom->_CONFIG['showDescr']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_DESCRIPTION; ?>: </td>
      			<td align="left"><?php echo $zoom->_gallery->_images[$key]->_descr; ?></td>
      		</tr>
      		<?php }
      		if ($zoom->_CONFIG['showHits']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_HITS; ?>: </td>
      			<td align="left"><?php echo $zoom->_gallery->_images[$key]->_hits; ?></td>
      		</tr>
      		<?php }
      		if ($zoom->_CONFIG['ratingOn']) { ?>
      		<tr>
      			<td align="left"><?php echo _ZOOM_RATING; ?></td>
      			<td align="left">
      			<?php
      				if ($zoom->_gallery->_images[$key]->_votenum!=0) {
      					if ($zoom->_gallery->_images[$key]->_votesum!=0) {
      						$rating = round($zoom->_gallery->_images[$key]->_votesum / $zoom->_gallery->_images[$key]->_votenum);
      					} else {
      						$rating = 0;
      					}
      					echo "<img src=\"".$dir_prefix."images/rating/rating".$rating.".gif\" border=\"0\" /> (".$zoom->_gallery->_images[$key]->_votenum." ";
      					if ($zoom->_gallery->_images[$key]->_votenum==1) {
      						echo _ZOOM_VOTE.")\n";
      					} else {
      						echo _ZOOM_VOTES.")\n";
      					}
      				} else {
      					echo _ZOOM_NOTRATED."\n";
      				}
      			?>
      			</td>
      		</tr>
      		<?php } ?>
      	</table>
      	<?php
      	echo $zoom->finishViewBlock($zoom->_CONFIG['properties_state'], $properties_block['prefix']);
      	// Display a link which enables the user to view EXIF-readings of the image, if readEXIF is set
      	// to TRUE.
      	$empty_span = "<span>&nbsp;</span>";
      	if ($zoom->_CONFIG['readEXIF'] && $zoom->isImage($zoom->_gallery->_images[$key]->_type)) {
      		// $exif = $zoom->_gallery->_images[$key]->exif_parse_file($img_loc);
      		$meta_block = $zoom->createViewBlock(_ZOOM_EXIF_SHOWHIDE, 100);
      		echo $meta_block['html'];
      		$metadata_viewable = Interpret_EXIF_to_HTML( get_EXIF_JPEG( $img_loc ), $img_loc );
      		if (!empty($metadata_viewable)) {
      			echo $metadata_viewable;
      		} else {
      		    echo $empty_span;
      		}
      		echo $zoom->finishViewBlock($zoom->_CONFIG['meta_state'], $meta_block['prefix']);
      	}
      	// Do the same for the ID3 tag parser...
      	if ($zoom->_CONFIG['readID3'] && $zoom->isAudio($zoom->_gallery->_images[$key]->_type)) {
      		$meta_block = $zoom->createViewBlock(_ZOOM_ID3_SHOWHIDE, 100);
      		echo $meta_block['html'];
      		$metadata_viewable = $zoom->toolbox->interpret_ID3_to_HTML($id3_data);
      		if (!empty($metadata_viewable)) {
      			echo $metadata_viewable;
      		} else {
      		    echo $empty_span;
      		}
      	    echo $zoom->finishViewBlock($zoom->_CONFIG['meta_state'], $meta_block['prefix']);
      	}
      	if ($zoom->isMovie($zoom->_gallery->_images[$key]->_type)) {
      		$meta_block = $zoom->createViewBlock(_ZOOM_VIDEO_SHOWHIDE, 100);
      		echo $meta_block['html'];
      		$metadata_viewable = $zoom->toolbox->interpret_META_to_HTML($metadata);
      		if (!empty($metadata_viewable)) {
      			echo $metadata_viewable;
      		} else {
      		    echo $empty_span;
      		}
      		echo $zoom->finishViewBlock($zoom->_CONFIG['meta_state'], $meta_block['prefix']);
      	}
      	// Display comments-form for input of comments, if comments are allowed ofcourse...
      	// The Edit-Monitor registers the user input and does not allow him/ her to add a comment again
      	// that session.
      	if ($zoom->_CONFIG['commentsOn']) {
      	    $comments_block = $zoom->createViewBlock(_ZOOM_COMMENTS, 100);
      	    echo $comments_block['html'];
          	?>
          	<table border="0" cellpadding="3" cellspacing="0" width="90%">
          		<?php
          		if (empty($zoom->_gallery->_images[$key]->_comments)) {
          			echo ("<tr>\n"
          			 . "\t<td>&nbsp;</td>\n"
          			 . "\t<td align=\"center\" valign=\"bottom\">"._ZOOM_NO_COMMENTS."</td>\n"
          			 . "</tr>\n");
          		} else {
          			// Display comments found in the database.
          			foreach ($zoom->_gallery->_images[$key]->_comments as $comment) {
          				if ($count>1) {
          	            	$colour=$zoom->_tabclass[0];
          	            	$count=0;
          	        	} else {
          	            	$colour=$zoom->_tabclass[1];
          	        	}
          	        	$cmtrow = "";
          	        	if ($zoom->_isAdmin) {
          	        		// the adminstrator is able to delete comments directly through the hyperlink...
          	        		$cmtrow = "<tr><td width=\"125\" align=\"left\">".$comment->getName().":&nbsp;</td><td align=\"left\"><font color=\"#ff0000\">".$comment->getComment($dir_prefix)."</font>&nbsp;(".$comment->getDate().")</td><td width=\"50\">\n";
          	        		if (!$zoom->_CONFIG['popUpImages']) {
          	        			$cmtrow .= "<a href=\"index.php?option=com_zoom&page=view&Itemid=".$Itemid;
          	        		} else {
          	        			$cmtrow .= "<a href=\"view.php?popup=1";
          	        		}
          	        		$cmtrow .= "&catid=".$zoom->_gallery->_id."&key=".$key."&delComment=".$comment->getId()."&isAdmin=".$isAdmin."\"><img src=\"".$dir_prefix."images/delete.png\" border=\"0\" title=\""._ZOOM_DELETE."\" /></a></td></tr>\n";
          	        	} else {
          	        		$cmtrow = "<tr><td width=\"125\" align=\"left\">".$comment->getName().":&nbsp;</td><td align=\"left\"><font color=\"#ff0000\">".$comment->getComment($dir_prefix)."</font>&nbsp;(".$comment->getDate().")</td></tr>\n";
          	        	}
          	        	echo $cmtrow;
          	        	$count++;
          			}
          		}
          		?>
          		</td>
          	</tr>
          	</table>
          	<form method="post" name="post" action="<?php echo $url_prefix;?>" onSubmit="MM_validateForm('uname','','R','comment','','R');return document.MM_returnValue">
        	<table border="0" cellspacing="0" cellpadding="0" height="100">
			<tr>
				<td align="left" valign="top" width="80"><?php echo _ZOOM_YOUR_NAME;?>:&nbsp;</td>
				<td align="left" valign="top">
				<?php
				if (!empty($my->username)) {
					?>
					<input type="hidden" name="uname" value="<?php echo $my->username;?>" />
					<?php
					echo $my->username;
				} else {
					?>
					<input class="inputbox" type="text" name="uname" size="25" value="" />
					<?php
				}
				?>
				<br /></td>
			</tr>
			<tr>
				<td align="left" valign="top" width="80"><?php echo _ZOOM_COMMENTS;?>: </td>
				<td align="left" valign="top">
					<textarea name="comment" class="inputbox" rows="2" cols="35" wrap="virtual" onselect="Scriptaculous.storeCaret(this);" onclick="Scriptaculous.storeCaret(this);" onkeyup="Scriptaculous.storeCaret(this);"></textarea>
					<input type="hidden" name="popup" value="<?php echo $popup;?>" />
					<input type="hidden" name="key" value="<?php echo $key;?>" />
					<input type="hidden" name="isAdmin" value="<?php echo $isAdmin;?>" />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="<?php echo _ZOOM_ADD;?>" class="button" /></td>
			</tr>
    		</table>
    		<table border="0" cellspacing="5" cellpadding="0" height="20">
    			<tr height="15">
    				<td width="80">&nbsp;</td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':D')"><img title="Very Happy" src="<?php echo $dir_prefix; ?>images/smilies/icon_biggrin.gif" alt="Very Happy" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':)')"><img title="Smile" src="<?php echo $dir_prefix; ?>images/smilies/icon_smile.gif" alt="Smile" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':(')"><img title="Sad" src="<?php echo $dir_prefix; ?>images/smilies/icon_sad.gif" alt="Sad" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':o')"><img title="Surprised" src="<?php echo $dir_prefix; ?>images/smilies/icon_surprised.gif" alt="Surprised" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':shock:')"><img title="Shocked" src="<?php echo $dir_prefix; ?>images/smilies/icon_eek.gif" alt="Shocked" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':?')"><img title="Confused" src="<?php echo $dir_prefix; ?>images/smilies/icon_confused.gif" alt="Confused" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon('8)')"><img title="Cool" src="<?php echo $dir_prefix; ?>images/smilies/icon_cool.gif" alt="Cool" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':lol:')"><img title="Laughing" src="<?php echo $dir_prefix; ?>images/smilies/icon_lol.gif" alt="Laughing" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':x')"><img title="Mad" src="<?php echo $dir_prefix; ?>images/smilies/icon_mad.gif" alt="Mad" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':P')"><img title="Razz" src="<?php echo $dir_prefix; ?>images/smilies/icon_razz.gif" alt="Razz" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':oops:')"><img title="Embarassed" src="<?php echo $dir_prefix; ?>images/smilies/icon_redface.gif" alt="Embarassed" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':cry:')"><img title="Crying or Very sad" src="<?php echo $dir_prefix; ?>images/smilies/icon_cry.gif" alt="Crying or Very sad" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':evil:')"><img title="Evil or Very Mad" src="<?php echo $dir_prefix; ?>images/smilies/icon_evil.gif" alt="Evil or Very Mad" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':twisted:')"><img title="Twisted Evil" src="<?php echo $dir_prefix; ?>images/smilies/icon_twisted.gif" alt="Twisted Evil" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':roll:')"><img title="Rolling Eyes" src="<?php echo $dir_prefix; ?>images/smilies/icon_rolleyes.gif" alt="Rolling Eyes" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':wink:')"><img title="Wink" src="<?php echo $dir_prefix; ?>images/smilies/icon_wink.gif" alt="Wink" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':!:')"><img title="Exclamation" src="<?php echo $dir_prefix; ?>images/smilies/icon_exclaim.gif" alt="Exclamation" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':?:')"><img title="Question" src="<?php echo $dir_prefix; ?>images/smilies/icon_question.gif" alt="Question" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':idea:')"><img title="Idea" src="<?php echo $dir_prefix; ?>images/smilies/icon_idea.gif" alt="Idea" border="0" /></a></td>
    				<td width="15" height="15"><a href="javascript:Scriptaculous.emoticon(':arrow:')"><img title="Arrow" src="<?php echo $dir_prefix; ?>images/smilies/icon_arrow.gif" alt="Arrow" border="0" /></a></td>
    			</tr>
    		</table>
      		</form>
          	<?php
            echo $zoom->finishViewBlock($zoom->_CONFIG['comments_state'], $comments_block['prefix']);
      	} //END if commentsOn?
      	// Now, display a table which will display the images to rate the image...
      	// Images are from 1-star to 5-stars.
      	if ($zoom->_CONFIG['ratingOn']) {
      	    $rating_block = $zoom->createViewBlock(_ZOOM_RATING, 100);
      	    echo $rating_block['html'];
      		?>
      		<div align="center" style="width: 100%;height:20px">
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=0" onmouseover="return overlib('<?php echo _ZOOM_RATE0; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating0.gif" border="0" alt="" style="margin-right: 15px" /></a>
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=1" onmouseover="return overlib('<?php echo _ZOOM_RATE1; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating1.gif" border="0" alt="" style="margin-right: 15px" /></a>
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=2" onmouseover="return overlib('<?php echo _ZOOM_RATE2; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating2.gif" border="0" alt="" style="margin-right: 15px" /></a>
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=3" onmouseover="return overlib('<?php echo _ZOOM_RATE3; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating3.gif" border="0" alt="" style="margin-right: 15px" /></a>
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=4" onmouseover="return overlib('<?php echo _ZOOM_RATE4; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating4.gif" border="0" alt="" style="margin-right: 15px" /></a>
      		<a href="<?php echo $url_prefix."&key=".$key;?>&vote=5" onmouseover="return overlib('<?php echo _ZOOM_RATE5; ?>');" onmouseout="return nd();"><img src="<?php echo $dir_prefix;?>images/rating/rating5.gif" border="0" alt="" /></a>
      		</div>
      		<?php
      		echo $zoom->finishViewBlock($zoom->_CONFIG['rating_state'], $rating_block['prefix']);
      	}
      	?>
      </div>
      <?php //close properties boxes
  }
  ?>
  </center>
  <?php
} else {
	echo _NOT_AUTH;
}
if ($zoom->_CONFIG['popUpImages']) {
	echo "</body>\n</html>";
}
?>