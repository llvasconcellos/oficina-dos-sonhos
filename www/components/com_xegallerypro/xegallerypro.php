<?

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/


defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_live_site, $database;

    require( $mosConfig_absolute_path . "/administrator/components/com_xegallerypro/config.xegallerypro.php" );
    require_once( $mosConfig_absolute_path . "/administrator/components/com_xegallerypro/class.xegallerypro.php" );

    $picturepath=$mosConfig_live_site . $ag_pathimages . "/";

    $thumbnailpath=$mosConfig_live_site . $ag_paththumbs . "/";

    $uid=intval( mosGetParam( $_REQUEST, "uid", 0 ) );
	
	//infotext
	//echo $ag_showcomment;
	
	//musicfile
	//echo $ag_perpage;
	
	//musicactive
	//echo $ag_showdetail;
	
	//fullscreen
	//echo $ag_approve;
	
	//imagebg
	//echo $ag_maxuserimage;
	
	//thumbsbg
	//echo $ag_maxfilesize;
	
	//abstand von oben
	//echo $ag_toplist;
	
	//infotext by start
	//echo $ag_showrating;
	
	//gallery transparency
	//echo $ag_maxvoting;
	
	//gallery URL Image
	//echo $ag_slideshow;
	
    //gallery Menu Color
	//echo $ag_bbcodesupport;
	
	if ($ag_showdetail == 0) {
   		$ag_perpage = "nosound";
  	}

	$gallerylist = "cache/xeV1galleryDemoPro.xml";
	createGallery("cache/xeV1galleryDemoPro.xml", $params);

?>
<style type="text/css">
  div.abstand { margin-top:<? echo $ag_toplist; ?>px; }
</style>
<table border="0" align="center" height="100%"><tr><td><div class="abstand"></div><br/>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="<? echo $ag_maxwidth;  ?>" height="<? echo $ag_maxheight;  ?>" id="Xe-GalleryV1Pro" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="<? echo $mosConfig_live_site; ?>/components/com_xegallerypro/Xe-GalleryV1ProV1Demo.swf?gallerylist=<? echo $gallerylist; ?>&amp;musicfile=<? echo $ag_perpage; ?>&amp;fullscreen=<? echo $ag_approve; ?>&amp;imagebg=<? echo $ag_maxuserimage; ?>&amp;thumbsbg=<? echo $ag_maxfilesize; ?>&amp;gotext=<? echo $ag_showrating; ?>&amp;urlOn=<? echo $ag_slideshow; ?>&amp;imgalpha=<? echo $ag_maxvoting; ?>&amp;menubg=<? echo $ag_bbcodesupport; ?>&amp;infotext=<? echo $ag_showcomment; ?>" />
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="#ffffff" />
<embed src="<? echo $mosConfig_live_site; ?>/components/com_xegallerypro/Xe-GalleryV1ProV1Demo.swf?gallerylist=<? echo $gallerylist; ?>&amp;musicfile=<? echo $ag_perpage; ?>&amp;fullscreen=<? echo $ag_approve; ?>&amp;imagebg=<? echo $ag_maxuserimage; ?>&amp;thumbsbg=<? echo $ag_maxfilesize; ?>&amp;gotext=<? echo $ag_showrating; ?>&amp;urlOn=<? echo $ag_slideshow; ?>&amp;imgalpha=<? echo $ag_maxvoting; ?>&amp;menubg=<? echo $ag_bbcodesupport; ?>&amp;infotext=<? echo $ag_showcomment; ?>" quality="high" wmode="transparent" bgcolor="#ffffff" width="<? echo $ag_maxwidth;  ?>" height="<? echo $ag_maxheight;  ?>" name="Xe-GalleryV1Pro" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</td></tr></table>

<?
				  
function createGallery($file, &$params)
{
	global $database, $mosConfig_absolute_path, $mosConfig_live_site;
	$database->SetQuery("SELECT name FROM #__xegallerypro_catg WHERE published = '1' ORDER BY ordering asc");
	$catnames=$database->loadObjectList();
	
	$playlist = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$playlist .= "<album>\n";
	foreach($catnames as $catname) {
		$database->SetQuery("SELECT * FROM #__xegallerypro as a " . "\n left join #__xegallerypro_catg as c on c.cid=a.catid" . "\n  WHERE a.published = '1' AND c.name = '" . $catname->name . "'");
	$rows = $database->loadObjectList();
	   $playlist .= "<gallery name = '" . $catname->name . "'>";
	   	   foreach($rows as $row) {
	   	   $playlist .= "<pic><image>" . $mosConfig_live_site . "/components/com_xegallerypro/img_pictures/" . $row->imgfilename . "</image><caption>" . $row->imgtitle . "</caption><thumbnail>" . $mosConfig_live_site . "/components/com_xegallerypro/img_thumbnails/" . $row->imgthumbname . "</thumbnail><infos>" . $row->imgtext . "</infos></pic>\n";
           }
	   $playlist .= "</gallery>";
	   }
       
    
	$playlist .= "</album>";
	
	$playlist = utf8_encode($playlist);
	
	$thefile = fopen($mosConfig_absolute_path . "/" . $file, "w+");
	fwrite($thefile, $playlist);
	fclose($thefile);
}

?>