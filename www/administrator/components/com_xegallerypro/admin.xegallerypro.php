<?php

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
require_once($mosConfig_absolute_path."/administrator/components/com_xegallerypro/class.xegallerypro.php");
require_once( $mainframe->getPath( 'admin_html' ) );


/**************************************************\
                     Start
                   Functions
\**************************************************/

$id = mosGetParam($_REQUEST,"id",null);
?>


<?php
/**************************************************\
                     End
                   Functions
\**************************************************/
switch ($act) {
  case "showcatg":
    $task = "showcatg";
    break;

  case "upload":
    $task = "upload";
    break;
	
  case "upload2":
    $task = "upload2";
    break;

  case "settings":
    $task = "settings";
    break;  
    
}

switch ($task) {
  case "publish":
    publishPicture( $id, 1, $option );
    break;

  case "unpublish":
    publishPicture( $id, 0, $option );
    break;

  case "new":
    editPicture( $option, 0 );
    break;

  case "edit":
    editPicture( $option, $id[0] );
    break;

  case "remove":
    removePicture( $id, $option );
    break;

  case "save":
    savePicture( $option );
    break;

  case "categories":
    mosRedirect( "index2.php?option=categories&section=com_xegallerypro" );
    break;


  case "publishcmt":
    publishComment( $id, 1, $option );
    break;

  case "unpublishcmt":
    publishComment( $id, 0, $option );
    break;

  case "removecmt":
    removeComment( $id, $option );
    break;

  case "upload":
    showUpload( $option, $batchul );
    break;
	
  case "upload2":
    showUpload2( $option, $batchul2 );
    break;
	
  case "uploadhandler":
    require_once($mosConfig_absolute_path."/administrator/components/com_xegallerypro/config.xegallerypro.php");
    echo "<p />";
    if (strlen($screenshot) > 0 and $screenshot != "none")
      copy ($screenshot, $mosConfig_absolute_path.$ag_pathimages."/$screenshot_name");
    echo "Upload complete...<br />";
    if ($thumbcreation)
      resize_image($mosConfig_absolute_path.$ag_pathimages."/$screenshot_name", $mosConfig_absolute_path.$ag_paththumbs."/tn_$screenshot_name", "$ag_thumbwidth", "$ag_thumbcreation", "$ag_thumbquality");
    echo "Thumbnail complete...<br />";
    mosRedirect( "index2.php?option=com_xegallerypro&act=upload&batchul=1" );
    break;
	
  case "uploadhandler2":
    require_once($mosConfig_absolute_path."/administrator/components/com_xegallerypro/config.xegallerypro.php");
    echo "<p />";
    if (strlen($screenshot) > 0 and $screenshot != "none")
      copy ($screenshot, $mosConfig_absolute_path.$ag_pathimages."/$screenshot_name");
	  copy ($screenshot, $mosConfig_absolute_path.$ag_paththumbs."/tn_$screenshot_name");
    echo "Upload complete...<br />";
    mosRedirect( "index2.php?option=com_xegallerypro&act=upload2&batchul2=1" );
    break;

  case "settings":
    showConfig( $option );
    break;

  case "savesettings":
    saveConfig ($option, $ag_pathimages, $ag_paththumbs, $ag_thumbcreation, $ag_thumbwidth, $ag_thumbquality, $ag_showdetail, $ag_showrating, $ag_showcomment, $ag_anoncomment, $ag_perpage, $ag_maxvoting, $ag_toplist, $ag_slideshow, $ag_bbcodesupport, $ag_approve,$ag_maxuserimage,$ag_maxfilesize,$ag_maxwidth,$ag_maxheight,$ag_category);
    break;

/*********** Hack ************/

               	   	case "newcatg":
                	editCatg( 0, $option);
                	break;
                	
                	case "editcatg":
                	editCatg( $cid[0], $option );
                	break;
                	
                	case "showcatg":
                	viewCatg( $option );
                	break;
                	
                	case "savecatg":
                	saveCatg( $option , $task);
                	break;
                	
                	case "removecatg":
                	removeCatg( $cid, $option );
                	break;
                	
                	case "publishcatg":
                	publishCatg( $cid, 1, $option );
                	break;
                	
                	case "unpublishcatg":
                	publishCatg( $cid, 0, $option );
                	break; 

                	case "approvepic":
                	approvePicture($id, 1, $option );
                	break;
                	
                	case "rejectpic":
                	approvePicture( $id, 0, $option );
                	break;
                	
                	case "cancelcatg":
                	cancelCatg( $option );
                	break;

                	case "orderupcatg":
                	orderCatg( $cid[0], -1, $option );
                	break;
                	
                	case "orderdowncatg":
                	orderCatg( $cid[0], 1, $option );
                	break;
                	

/*********** /Hack ************/


    
    
  default:
    showPictures( $option );
    break;
}

function showPictures( $option ) {
  global $database,$mainframe;

  # Prepare pagelimit choices
        $limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
        $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );


  # Prepare category and search choices
	$catid = $mainframe->getUserStateFromRequest("catid{$option}", 'catid', 0);
    $limit = $mainframe->getUserStateFromRequest('viewlistlimit', 'limit', $mosConfig_list_limit);
    $limitstart = $mainframe->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);
    $search = $mainframe->getUserStateFromRequest("search{$option}", 'search', '');
    $search = $database->getEscaped(trim(strtolower($search)));
    $sort = $mainframe->getUserStateFromRequest("sort{$option}",'sort', 0);
        
   $where = array();
  if ($catid > 0) {
    $where[] = "catid='$catid'";
  } 
  if ($sort == 1) {
    $where[] = 'approved = 0';
  }
  if ($sort == 2) {
    $where[] = 'approved = 1';
  }
  if ($sort == 3) {
    $where[] = 'useruploaded = 1';
  }
  if ($sort == 4) {
    $where[] = 'useruploaded = 0';
  }
  if ($search) {
    $where[] = "LOWER(imgtitle) LIKE '%$search%' OR LOWER(imgtext) LIKE '%$search%' ";
  }

  # Get total number of records
  $database->setQuery( "SELECT count(*) FROM #__xegallerypro AS a " . (count($where) ? 'WHERE ' . implode(' AND ', $where) : ''));
  $total = $database->loadResult();
  echo $database->getErrorMsg();
  if ($limit > $total) {
    $limitstart = 0;
  }

  # Do the main database query
  $where[] = 'a.catid = cc.cid';
  $whereclause = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';
  $database->setQuery("SELECT a.*, cc.name AS category 
					FROM #__xegallerypro AS a, #__xegallerypro_catg AS cc 
					$whereclause 
					ORDER BY a.catid ASC, a.ordering ASC 
					LIMIT $limitstart, $limit");
  $rows = $database->loadObjectList();
  if ($database->getErrorNum()) {
    echo $database->stderr();
    return false;
  }

  $clist = ShowDropDownCategoryList($catid, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"');  

  $s_options[] = mosHTML::makeOption("Show All Photos", 0);
  $s_options[] = mosHTML::makeOption("1","Show Not Published Photos");
  $s_options[] = mosHTML::makeOption("2","Show Published Photos");
  $s_options[] = mosHTML::makeOption("4","Admin Uploaded Photos");
  $slist = mosHTML::selectList($s_options, 'sort', 'class="inputbox" size="1" onchange="document.adminForm.submit();"','value', 'text', $sort);

  # Set up page navigation
  include_once("includes/pageNavigation.php");
  $pageNav = new mosPageNav( $total, $limitstart, $limit  );

    # Bring it all to the screen
  HTML_xegallerypro::showPictures( $option, $rows, $clist, $slist, $search, $pageNav );
}

function removePicture( $cid, $option ) {
  global $database;
  if (!is_array( $cid ) || count( $cid ) < 1) {
    echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
    exit;
  }
  if (count( $cid )) {
    $cids = implode( ',', $cid );
    $database->setQuery( "DELETE FROM #__xegallerypro WHERE id IN ($cids)" );
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    }
  }
  mosRedirect( "index2.php?option=$option" );
}


function publishPicture( $cid=null, $publish=1,  $option ) {
  global $database;

  if (!is_array( $cid ) || count( $cid ) < 1) {
    $action = $publish ? 'publish' : 'unpublish';
    echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode( ',', $cid );

  $database->setQuery( "UPDATE #__xegallerypro SET published='$publish', approved='$publish' WHERE id IN ($cids)" );
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    exit();
  }

  mosRedirect( "index2.php?option=$option" );
}


function editPicture( $option, $uid ) {
  global $database, $mosConfig_absolute_path;
  require_once($mosConfig_absolute_path."/administrator/components/com_xegallerypro/config.xegallerypro.php");

  # oop database connector
  $row = new mosxegallerypro( $database );

  # load the row from the db table
  $row->load( $uid );

  $clist = ShowDropDownCategoryList( $row->catid ,"catid",' size="1"');  
  
  # Create Picture List
  $imgFiles = mosReadDirectory( "$mosConfig_absolute_path$ag_pathimages" );
  $images = array( mosHTML::makeOption( '', 'Select Image') );
  foreach ($imgFiles as $file) {
    if (eregi( "bmp|gif|jpg|png|swf", $file )) {
      $images[] = mosHTML::makeOption( $file );
    }
  }
  $imagelist = mosHTML::selectList( $images, 'imgfilename', "class=\"inputbox\" size=\"1\""
  . " onchange=\"javascript:if (document.forms[0].imgfilename.options[selectedIndex].value!='') {document.imagelib2.src='..$ag_pathimages/' + document.forms[0].imgfilename.options[selectedIndex].value} else {document.imagelib2.src='../images/M_images/blank.png'}\"",
  'value', 'text', $row->imgfilename );

  # Create Thumbail List
  $thuFiles = mosReadDirectory( "$mosConfig_absolute_path$ag_paththumbs" );
  $thumbs = array( mosHTML::makeOption( '', 'Select Thumbnail') );
  foreach ($thuFiles as $tfile) {
    if (eregi( "bmp|gif|jpg|png|swf", $tfile )) {
      $thumbs[] = mosHTML::makeOption( $tfile );
    }
  }
  $thumblist = mosHTML::selectList( $thumbs, 'imgthumbname', "class=\"inputbox\" size=\"1\""
  . " onchange=\"javascript:if (document.forms[0].imgthumbname.options[selectedIndex].value!='') {document.imagelib.src='..$ag_paththumbs/' + document.forms[0].imgthumbname.options[selectedIndex].value} else {document.imagelib.src='../images/M_images/blank.png'}\"",
  'value', 'text', $row->imgthumbname );

  if (!$uid) $row->published = 0;

  HTML_xegallerypro::editPicture( $option, $row, $clist, $imagelist, $thumblist, $ag_pathimages, $ag_paththumbs );
}

function savePicture( $option ) {
  global $database;

  $row = new mosxegallerypro( $database );

  if (!$row->bind( $_POST )) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }

  $row->imgdate = mktime();

  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }

  mosRedirect( "index2.php?option=$option" );
}

function resize_image($src_file, $dest_file, $new_size, $method, $dest_qual)
{
	$imagetype = array( 1 => 'GIF', 2 => 'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD', 6 => 'BMP', 7 => 'TIFF', 8 => 'TIFF', 9 => 'JPC', 10 => 'JP2', 11 => 'JPX', 12 => 'JB2', 13 => 'SWC', 14 => 'IFF');
	$imginfo = getimagesize($src_file);
	
	if ($imginfo == null) die("ERROR: Source file not found!");
	
	$imginfo[2] = $imagetype[$imginfo[2]];
	
	// GD can only handle JPG & PNG images
	if ($imginfo[2] != 'JPG' && $imginfo[2] != 'PNG' && $imginfo[2] != 'GIF' && ($method == 'gd1' || $method == 'gd2')) die("ERROR: GD can only handle JPG and PNG files!");
	
	// height/width
	$srcWidth = $imginfo[0];
	$srcHeight = $imginfo[1];
	
	echo "Creating thumbnail from $imginfo[2], $imginfo[0] x $imginfo[1]...<br>";
	
	$ratio = max($srcWidth, $srcHeight) / $new_size;
	$ratio = max($ratio, 1.0);
	$destWidth = (int)($srcWidth / $ratio);
	$destHeight = (int)($srcHeight / $ratio);
	
	// Method for thumbnails creation
	switch ($method) {
		
		case "gd1" :
		if (!function_exists('imagecreatefromjpeg')) {
			die('GD image library not installed!');
		}
		if ($imginfo[2] == 'JPG')
		$src_img = imagecreatefromjpeg($src_file);
		else if ($imginfo[2] == 'JPG')
		$src_img = imagecreatefromjpeg($src_file);
		else
		$src_img = imagecreatefromgif($src_file);
		if (!$src_img){
			$ERROR = $lang_errors['invalid_image'];
			return false;
		}
		$dst_img = imagecreate($destWidth, $destHeight);
		imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $destWidth, (int)$destHeight, $srcWidth, $srcHeight);
		imagejpeg($dst_img, $dest_file, $dest_qual);
		imagedestroy($src_img);
		imagedestroy($dst_img);
		break;
		
		case "gd2" :
		if (!function_exists('imagecreatefromjpeg')) {
			die('GD image library not installed!');
		}
		if (!function_exists('imagecreatetruecolor')) {
			die('GD2 image library does not support truecolor thumbnailing!');
		}
		
		if ($imginfo[2] == 'JPG') {
			$src_img = imagecreatefromjpeg($src_file);}
			else if ($imginfo[2] == 'PNG'){
				$src_img = imagecreatefrompng($src_file);}
				else {
					$src_img = imagecreatefromgif($src_file);}
					
					
		if (!$src_img){
			$ERROR = $lang_errors['invalid_image'];
			return false;
		}
		$dst_img = imagecreatetruecolor($destWidth, $destHeight);
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $destWidth, (int)$destHeight, $srcWidth, $srcHeight);
		imagejpeg($dst_img, $dest_file, $dest_qual);
		imagedestroy($src_img);
		imagedestroy($dst_img);
		break;
	}
	
	// Set mode of uploaded picture
	chmod($dest_file, octdec('755'));
	
	// We check that the image is valid
	$imginfo = getimagesize($dest_file);
	if ($imginfo == null){
		return false;
	} else {
		return true;
	}
}

function showUpload( $option, $batchul) {
	global $my;
  echo "<table cellpadding='4' cellspacing='0' border='0' width='70%'><tr><td width='100%' class='sectionname' align='center'><tr><td align='left'>.: Photo uploader :.<br/><br/>";
  echo "<form action='index2.php?task=uploadhandler' method='post' name='adminForm' enctype='multipart/form-data'>";
  echo "<table width='50%' border='1' cellpadding='4' cellspacing='2' class='adminForm' align='center'>";
  echo "<tr align='center' valign='middle'><td align='center' valign='top'>";
  if ($batchul) echo "Upload completed. Choose next picture:<p />";
  echo "<input type='hidden' name='option' value='$option' />";
  echo "<input type='hidden' name='approved' value='0' />";
  echo "<input type='hidden' name='owner' value='$my->username' />";
  echo "<input type='file' name='screenshot' /><br />";
  echo "<input type='checkbox' name='thumbcreation' value='ON' checked /> Create Thumbnail<br />";
  echo "<input type='submit' value='Upload' />";
  echo "</td></tr></table></form></td></tr></table>";
}

function showUpload2( $option, $batchul2) {
	global $my;
  echo "<table cellpadding='4' cellspacing='0' border='0' width='70%'><tr><td width='100%' class='sectionname' align='center'><tr><td align='left'>.: Flash *.swf uploader :.<br/><br/>";
  echo "<form action='index2.php?task=uploadhandler2' method='post' name='adminForm' enctype='multipart/form-data'>";
  echo "<table width='50%' border='1' cellpadding='4' cellspacing='2' class='adminForm' align='center'>";
  echo "<tr align='center' valign='middle'><td align='center' valign='top'>";
  if ($batchul2) echo "Upload completed. Choose next Flash *.swf:<p />";
  echo "<input type='hidden' name='option' value='$option' />";
  echo "<input type='hidden' name='approved' value='0' />";
  echo "<input type='hidden' name='owner' value='$my->username' />";
  echo "<input type='file' name='screenshot' /><br />";
  echo "<input type='submit' value='Upload' />";
  echo "</td></tr></table></form></td></tr></table>";
}

function showConfig( $option ) {
  global $mosConfig_absolute_path;
  require($mosConfig_absolute_path."/administrator/components/com_xegallerypro/config.xegallerypro.php");
  
  $arr_ag_category  = explode(",",$ag_category);
  
  $clist = testCat($arr_ag_category,"ag_category[]",$extras=" multiple  size=\"6\"",$levellimit="4");
?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      }
      if (form.ag_paththumbs.value == ""){
        alert( "Thumbnails path must be provided!" );
      } else {
        submitform( pressbutton );
      }
    }
    </script>

  <form action="index2.php" method="POST" name="adminForm">
  <table cellpadding="4" cellspacing="0" border="0" width="100%" >
  <tr>
    <td width="100%" class="sectionname">
      
    </td>
  </tr>
  </table>
<script language="javascript" src="js/dhtml.js"></script>
<table cellpadding="3" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="" class="tabpadding">&nbsp;</td>
    <td id="tab1" class="offtab" onclick="dhtml.cycleTab(this.id)">Config</td>
    <td id="tab2" class="offtab" onclick="dhtml.cycleTab(this.id)">Gallery</td>
    <td width="90%" class="tabpadding">&nbsp;</td>
  </tr>
</table>

  <div id="page1" class="pagetext">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <TR>
      <th  colspan="3"><div align="center">General Settings</div></th>
    </TR>
    <tr align="center" valign="middle">
      <td width="20%" align="left" valign="top"><strong><?php echo "Photo Path:" ?></strong></td>
      <td width="20%" align="left" valign="top"><input type="text" name="ag_pathimages" value="<? echo "$ag_pathimages"; ?>"></td>
      <td width="60%" align="left" valign="top"><?php echo "Path where the photos will be stored." ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Thumbnails Path:" ?></strong></td>
      <td align="left" valign="top"><input type="text" name="ag_paththumbs" value="<? echo "$ag_paththumbs"; ?>"></td>
      <td align="left" valign="top"><?php echo "Path where the thumbnails will be stored." ?></td>
    </tr>
    <TR>
      <th colspan="3"><div align="center">Thumbnail Settings</div></th>
    </TR>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Thumbnail Creator:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        $thumbcreator[] = mosHTML::makeOption( 'none', 'None' );
        $thumbcreator[] = mosHTML::makeOption( 'gd1', 'GD Library' );
        $thumbcreator[] = mosHTML::makeOption( 'gd2', 'GD2 Library' );
        #$thumbcreator[] = mosHTML::makeOption( 'im', 'ImageMagick' );
        $mc_ag_thumbcreation = mosHTML::selectList( $thumbcreator, 'ag_thumbcreation', 'class="inputbox" size="3"', 'value', 'text', $ag_thumbcreation );
        echo $mc_ag_thumbcreation;
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Choose image processor for thumbnail creation." ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Thumbnail Width:" ?></strong></td>
      <td align="left" valign="top"><input type="text" name="ag_thumbwidth" value="<? echo "$ag_thumbwidth"; ?>"></td>
      <td align="left" valign="top"><?php echo "Width of the thumbnails created." ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Thumbnail Quality:" ?></strong></td>
      <td align="left" valign="top"><input type="text" name="ag_thumbquality" value="<? echo "$ag_thumbquality"; ?>"></td>
      <td align="left" valign="top"><?php echo "Quality of the thumbnails created." ?></td>
    </tr>
  </table>
  </div>
  <div id="page2" class="pagetext">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <TR>
      <th colspan="3"><div align="center">Sound Settings</div></th>
    </TR>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Music Active:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yesno[] = mosHTML::makeOption( '0', 'No' );
        $yesno[] = mosHTML::makeOption( '1', 'Yes' );
        $yn_ag_showdetail = mosHTML::selectList( $yesno, 'ag_showdetail', 'class="inputbox" size="2"', 'value', 'text', $ag_showdetail );
        echo $yn_ag_showdetail;
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Gallery-MP3 soundfile playing at start?" ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "URL - MP3 Musicfile:" ?></strong></td>
      <td align="left" valign="top"><input type="text" name="ag_perpage" value="<? echo "$ag_perpage"; ?>"></td>
      <td align="left" valign="top"><?php echo "Insert the URL (.mp3) - that will play backgroundsound" ?></td>
    </tr>
      <th colspan="3"><div align="center">Flash Settings</div></th>
    </TR>
	
	<tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Gallery Distance to Top:" ?></strong></td>
      <td align="left" valign="top"><input type="text" name="ag_toplist" value="<? echo "$ag_toplist"; ?>"></td>
      <td align="left" valign="top"><?php echo "Insert the Distance - Gallery to Top (10 = 10pixel)" ?></td>
    </tr>
	
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Show Gallery Infotext by start:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_ag_approve = mosHTML::selectList( $yesno, 'ag_showrating', 'class="inputbox" size="2"', 'value', 'text', $ag_showrating );
        echo $yn_ag_approve;
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Shows your Infotext when the Gallery starts..." ?></td>
    </tr>  
	
	<tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Gallery Infotext:" ?></strong></td>
      <td align="left" valign="top">
	  <textarea name="ag_showcomment" rows="10" cols="40"><? echo $ag_showcomment; ?></textarea>
      </td>
      <td align="left" valign="top"><?php echo "Insert your Gallery-Infotext (Shows by clicking Menu)" ?></td>
    </tr>
	
	 <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Fullscreen Image Active:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_ag_approve = mosHTML::selectList( $yesno, 'ag_approve', 'class="inputbox" size="2"', 'value', 'text', $ag_approve );
        echo $yn_ag_approve;
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Shows a Fullscreen with the current clicked Photo" ?></td>
      </tr>  
	
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "URL Image Active:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_ag_slideshow = mosHTML::selectList( $yesno, 'ag_slideshow', 'class="inputbox" size="2"', 'value', 'text', $ag_slideshow );
        echo $yn_ag_slideshow;
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Shows a new Window(URL) with the current clicked Photo" ?></td>
      </tr>  
	  
      <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Background transparency:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_maxvoting" value="<? echo $ag_maxvoting; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Set your Gallery-Background-Alpha - Photo section transpanency (100=no 0=fulltransparency)" ?></td>
    </tr>   
	
	<tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Menu Background Color:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_bbcodesupport" value="<? echo $ag_bbcodesupport; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Chose your Menu-Background-Color - TopMenu (Original '0xE6E6E6' is like '#E6E6E6')" ?></td>
    </tr>  
	
	</tr>  
      <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Gallery Background Color:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_maxuserimage" value="<? echo $ag_maxuserimage; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Chose your Gallery-Background-Color - Photo section (Original '0xE6E6E6' is like '#E6E6E6')" ?></td>
    </tr>     
    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Thumbs Background Color:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_maxfilesize" value="<? echo $ag_maxfilesize; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Chose your Thumbs-Background-Color - Thumbnail section (Original '0x666666' is like '#666666')" ?></td>
    </tr>
    
    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Max width of the Gallery:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_maxwidth" value="<? echo $ag_maxwidth; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Max width of the Flash-Photo Gallery (Original: 550)" ?></td>
    </tr>

    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Max height of the Gallery:" ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="ag_maxheight" value="<? echo $ag_maxheight; ?>">
      </td>
      <td align="left" valign="top"><?php echo "Max height of the Flash-Photo Gallery (Original: 420)" ?></td>
    </tr>
	
     <TR>
      <th colspan="3"><div align="center">Support</div></th>
    </TR>
	
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Support:</strong></td>
      <td align="left" valign="top">
      Visit Xe-Media Software...
      </td>
      <td align="left" valign="top">Forum: <a href="http://www.xe-media.ch/software">www.xe-media.ch</a> | <a href="mailto:support@xe-media.ch">support@xe-media.ch</a></td>
    </tr>

  </table>
  </div>
  <script language="javascript" type="text/javascript">dhtml.cycleTab('tab2');</script>
  <input type="hidden" name="option" value="<?php echo $option; ?>">
  <input type="hidden" name="act" value="<?php echo $act; ?>">
  <input type="hidden" name="task" value="">
  <input type="hidden" name="boxchecked" value="0">
</form>
<?php
}

function saveConfig ($option, $ag_pathimages, $ag_paththumbs, $ag_thumbcreation, $ag_thumbwidth, $ag_thumbquality, $ag_showdetail, $ag_showrating, $ag_showcomment, $ag_anoncomment, $ag_perpage, $ag_maxvoting, $ag_toplist, $ag_slideshow, $ag_bbcodesupport, $ag_approve,$ag_maxuserimage,$ag_maxfilesize,$ag_maxwidth,$ag_maxheight,$ag_category) {
  $configfile = "components/com_xegallerypro/config.xegallerypro.php";
  @chmod ($configfile, 0766);
  $permission = is_writable($configfile);
  if (!$permission) {
    $mosmsg = "Config file not writeable!";
    mosRedirect("index2.php?option=$option&act=config",$mosmsg);
    break;
  }
  $ag_category2 = implode ( ",",$ag_category);
  
  $config = "<?php\n";
  $config .= "\$ag_pathimages = \"$ag_pathimages\";\n";
  $config .= "\$ag_paththumbs = \"$ag_paththumbs\";\n";
  $config .= "\$ag_thumbcreation = \"$ag_thumbcreation\";\n";
  $config .= "\$ag_thumbwidth = \"$ag_thumbwidth\";\n";
  $config .= "\$ag_thumbquality = \"$ag_thumbquality\";\n";
  $config .= "\$ag_showdetail = \"$ag_showdetail\";\n";
  $config .= "\$ag_showrating = \"$ag_showrating\";\n";
  $config .= "\$ag_showcomment = \"$ag_showcomment\";\n";
  $config .= "\$ag_anoncomment = \"$ag_anoncomment\";\n";
  $config .= "\$ag_perpage = \"$ag_perpage\";\n";
  $config .= "\$ag_maxvoting = \"$ag_maxvoting\";\n";
  $config .= "\$ag_toplist = \"$ag_toplist\";\n";
  $config .= "\$ag_slideshow = \"$ag_slideshow\";\n";
  $config .= "\$ag_bbcodesupport = \"$ag_bbcodesupport\";\n";
  $config .= "\$ag_approve = \"$ag_approve\";\n";
  $config .= "\$ag_maxuserimage = \"$ag_maxuserimage\";\n";
  $config .= "\$ag_maxfilesize = \"$ag_maxfilesize\";\n";
  $config .= "\$ag_maxwidth = \"$ag_maxwidth\";\n";
  $config .= "\$ag_maxheight = \"$ag_maxheight\";\n";
  $config .= "\$ag_category = \"$ag_category2\";\n";
  $config .= "?>";

  if ($fp = fopen("$configfile", "w")) {
    fputs($fp, $config, strlen($config));
    fclose ($fp);
  }
  mosRedirect("index2.php?option=$option&task=settings", "Settings saved");
}

?>

<?php
/**************************************************\
                     Start
                   Functions
\**************************************************/



function viewCatg( $option) {
global $database, $mainframe;
        $limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
        $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
        $search = $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
        $search = $database->getEscaped( trim( strtolower( $search ) ) );

        $where = "";
        if ($search) {
                $where = " WHERE a.name LIKE '%$search%' OR a.description LIKE '%$search%'";
        }

        $database->setQuery( "SELECT COUNT(*) FROM #__xegallerypro_catg AS a $where" );
        $total = $database->loadResult();

        require_once( "includes/pageNavigation.php" );
        $pageNav = new mosPageNav( $total, $limitstart, $limit  );

        $database->setQuery( "SELECT a.*, g.name AS groupname"
        . "\nFROM #__xegallerypro_catg AS a"
        . "\nLEFT JOIN #__groups AS g ON g.id = a.access"
        . "\n$where"
        . "\nORDER BY a.ordering"
        . "\n LIMIT $pageNav->limitstart,$pageNav->limit"
        );
        $rows = $database->loadObjectList();
        HTML_xegallerypro::showCatgs( $rows, $search, $pageNav, $option );
}

function editCatg( $uid, $option ) {
	global $database, $my;
	$row = new mosCatgs( $database );
	// load the row from the db table
	$row->load( $uid );
	
	
	// make order list
	$orders = mosGetOrderingList( "SELECT ordering AS value, name AS text"
	. "\nFROM #__xegallerypro_catg"
	. "\n ORDER BY ordering"
	);
	$orderlist = mosHTML::selectList( $orders, 'ordering', 'class="inputbox" size="1"',
	'value', 'text', intval( $row->ordering ) );
	
	
	// make the select list for the image positions
	$yesno[] = mosHTML::makeOption( '0', 'No' );
	$yesno[] = mosHTML::makeOption( '1', 'Yes' );
	
	// build the html select list
	$publist = mosHTML::selectList( $yesno, 'published', 'class="inputbox" size="2"',
	'value', 'text', $row->published );
	
	// get list of groups
	$database->setQuery( "SELECT id AS value, name AS text FROM #__groups ORDER BY id" );
	$groups = $database->loadObjectList();
	
	$glist = mosHTML::selectList( $groups, 'access', 'class="inputbox" size="1"',
	'value', 'text', intval( $row->access ) );
	
	
	$Lists["catgs"]=ShowDropDownCategoryList("$row->parent","parent","dests");
	HTML_xegallerypro::editCatg( $row, $publist, $option , $glist , $Lists,$orderlist );
}

function saveCatg( $option, $task ) {
        global $database, $my;

        $row = new mosCatgs( $database );
        if (!$row->bind( $_POST )) {
                echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
                exit();
        }
        mosMakeHtmlSafe($row->name);

        if (!$row->check()) {
                echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
                exit();
        }
        if (!$row->store()) {
                echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
                exit();
        }
        $row->checkin();
		$row->updateOrder( "" );
        mosRedirect( "index2.php?option=$option&task=showcatg" );
}

function publishCatg( $cid=null, $publish=1, $option ) {
        global $database, $my;

        if (!is_array( $cid ) || count( $cid ) < 1) {
                $action = $publish ? 'publish' : 'unpublish';
                echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
                exit;
        }

        $cids = implode( ',', $cid );

        $database->setQuery( "UPDATE #__xegallerypro_catg SET published='$publish'"
        . "\nWHERE cid IN ($cids)"
        );
        if (!$database->query()) {
                echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
                exit();
        }

        if (count( $cid ) == 1) {
                $row = new mosCatgs( $database );
                $row->checkin( $cid[0] );
        }
        mosRedirect( "index2.php?option=$option&task=showcatg" );
}

function removeCatg( $cid, $option ) {
	global $database;

	
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		foreach ($cid as $cc) {

				$database->setQuery( "DELETE FROM #__xegallerypro_catg WHERE cid =$cc" );
				$database->query();
				echo $database->getErrorMsg();				
				}
	}
	
	mosRedirect( "index2.php?option=$option&task=showcatg",$error);
}


function cancelCatg( $option ) {
        global $database;

        $row = new mosCatgs( $database );
        $row->bind( $_POST );
        $row->checkin();
        mosRedirect( "index2.php?option=$option&task=showcatg" );
}


function ShowCategoryPath($cat) {
 global $database,$mosConfig_lang;

  $cat=intval($cat);

  $parent_id = 1000;

  while($parent_id) {
    // read name and parent_id
    $query = "select * from #__xegallerypro_catg where cid=$cat";

               $database->setQuery($query);
               $result= $database->query();

    $parent_id = @mysql_result($result,0,'parent');
    $name = @mysql_result($result,0,'name');

    // write path
    if(empty($path)) {
      $path = $name;
    }
    else {
      $path = $name . ' » ' . $path;
    }

    // next looping
    $cat = $parent_id;
  }
  return $path . " ";
}

function ShowDropDownCategoryList($cat,$cname="cat",$extra=null,$flag=0) {
global $database;

  $category = "<select name=\"$cname\" class=\"inputbox\" $extra>";
  if($flag==1) { $add_category = true; }

  if($add_category) {
    $category .= "<OPTION VALUE=0></OPTION>";
  }
  else {
    $category .= "<OPTION VALUE='0'></OPTION>";
  }

  $query = "select * from #__xegallerypro_catg"
          . "\nORDER BY name asc";

          $database->setQuery($query);
          $result= $database->query();


  $num_rows = mysql_num_rows($result);


  $i = 0;
  while($i < $num_rows){
    $category_id = mysql_result($result,$i,"cid");
    $category_name = mysql_result($result,$i,'name'.$mosConfig_lang);

    if($category_id != $hide) {
      $category_list .= "<OPTION  VALUE='$category_id' ";

      if($category_id == $cat){
                    $category_list .= " SELECTED";
            }

       $category_list .= ">".ShowCategoryPath($category_id)."</OPTION>\n";
    }
    $i++;
  }
  $categories = explode("\n",$category_list);
  asort($categories);
  $category .= implode("\n",$categories);

  $category .= "</select>";

return $category;
}

function orderCatg( $uid, $inc, $option ) {
	global $database;
	$fp = new mosCatgs( $database );
	$fp->load( $uid );
	$fp->move( $inc );

mosRedirect( "index2.php?option=$option&task=showcatg" );
}

function testCat($cat,$cname,$extras="",$levellimit="4") {
   global $database;

          $database->setQuery("select cid as id,parent,name from
          #__xegallerypro_catg"
          . "\nORDER BY name"
          );
                         
		  $items = $database->loadObjectList();

// establish the hierarchy of the menu
	$children = array();
// first pass - collect children
	foreach ($items as $v ) {
		$pt = $v->parent;
		$list = @$children[$pt] ? $children[$pt] : array();
		array_push( $list, $v );
		$children[$pt] = $list;
	}
// second pass - get an indent list of the items
	$list = catTreeRecurse( 0, '', array(), $children );

// assemble menu items to the array
	$items = array();
	$items[] = mosHTML::makeOption( '', ' ' );
	foreach ($list as $item) {
		//if ($item->id != $menu->id) {
			$items[] = mosHTML::makeOption( $item->id, $item->treename );
		//}
	}
asort($items);
// build the html select list
	$parlist =selectList2( $items, $cname, 'class="inputbox" '.$extras,
		'value', 'text', $cat );
return $parlist;
}		


function catTreeRecurse($id, $indent="&nbsp;&nbsp;&nbsp;", $list, &$children, $maxlevel=9999, $level=0 , $seperator=" » ") {
	if (@$children[$id] && $level <= $maxlevel) {
                foreach ($children[$id] as $v) {
                        $id = $v->id;
                        $txt = $v->name;
                        $pt = $v->parent;
                        $list[$id] = $v;
                        $list[$id]->treename = "$indent$txt";
                        $list[$id]->children = count( @$children[$id] );
                        $list = catTreeRecurse( $id, "$indent$txt$seperator", $list, $children, $maxlevel, $level+1 );
                        //$list = catTreeRecurse( $id, "*", $list, $children, $maxlevel, $level+1 );                        
                }
        }

        return $list;
}

## multiple select list

function selectList2( &$arr, $tag_name, $tag_attribs, $key, $text, $selected ) {
		reset( $arr );
		$html = "\n<select name=\"$tag_name\" $tag_attribs>";
		for ($i=0, $n=count( $arr ); $i < $n; $i++ ) {
			$k = $arr[$i]->$key;
			$t = $arr[$i]->$text;
			$id = @$arr[$i]->id;

			$extra = '';
			$extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
			if (is_array( $selected )) {
				foreach ($selected as $obj) {
					$k2 = $obj;
					if ($k == $k2) {
						$extra .= " selected=\"selected\"";
						break;
					}
				}
			} else {
				$extra .= ($k == $selected ? " selected=\"selected\"" : '');
			}
			$html .= "\n\t<option value=\"".$k."\"$extra>" . $t . "</option>";
		}
		$html .= "\n</select>\n";
		return $html;
	}


/**************************************************\
                     End
                   Functions
\**************************************************/
?><br>
<font class='smalldark'><b>Xe-GalleryV1 Pro</b><br />
</font>

Xe-Media Software<br />
Copyright (c) 2006<br />
<a href='http://www.xe-media.ch/software' target='_blank'>www.xe-media.ch</a><br />
