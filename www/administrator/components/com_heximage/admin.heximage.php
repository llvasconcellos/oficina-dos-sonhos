<?php
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/

// ensure this file is being included by a parent file
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
      if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    } 
// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
		| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_newsfeeds' ))) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}
require_once( $mainframe->getPath( 'admin_html' ) );
require_once( $mainframe->getPath( 'class' ) );
$task = mosGetParam( $_REQUEST, 'task', array(0) );
# Menu swithes
switch ($task) {
# Main control panel
	case "admin":
		showheximage_admin();
		break;
# Config.heximage.php task		
    case "config":
        showConfig( $option );
        break;
    case "savesettings":
        saveConfig ($option, $sql, $HeXimage_lineoff, $HeXimage_offline_message, $hostname_sql, $database_sql, $username_sql, $password_sql, $HeXimage_logo, $HeXimage_gallery_message, $HeXimage_Theme, $HeXimage_maxperpage, $HeXimage_thumbperrow, $HeXimage_shadow, $HeXimage_shadowCol, $HeXimage_TG, $HeXimage_first, $HeXimage_leftarrow, $HeXimage_rightarrow, $HeXimage_last, $HeXimage_PnWidth,$HeXimage_align, $HeXimage_Asort, $HeXimage_Psort, $HeXimage_aAsort, $HeXimage_aPsort, $HeXimage_Samnt, $HeXimage_windowmode, $HeXimage_offsite, $HeXimage_image_base, $HeXimage_thumb_base, $HeXimage_rightmouse, $HeXimage_copytxt, $HeXimage_SaDesc, $HeXimage_XsiZe, $HeXimage_YsiZe, $HeXimage_WT_USE, $HeXimage_WaterMark, $HeXimage_WMquality, $HeXimage_WMgamma);
        break;	
# Album menu task
	case "album":
		showheximage_album( $option );
		break;
	case "publish_album":
		publishheximage_album( $albumid, 1, $option );
		break;
	case "unpublish_album":
		publishheximage_album( $albumid, 0, $option );
		break;
	case "new_album":
		editheximage_album( 0, $option );
		break;
	case "edit_album":
		editheximage_album( $albumid[0], $option );
		break;
	case "remove_album":
		removeheximage_album( $albumid, $option );
		break;
	case "save_album":
		saveheximage_album( $option );
		break;
	case "cancel_album":
		cancelheximage_album( $option );
		break;
# Show photo task
	case "photo":
		showheximage_photo( $option);
		break;	
	case "publish_photo":
		publishheximage_photo( $photoid, 1, $option );
		break;
	case "unpublish_photo":
		publishheximage_photo( $photoid, 0, $option );
		break;
	case "new_photo":
		editheximage_photo( 0, $option );
		break;			
	case "edit_photo":
		editheximage_photo( $photoid[0], $option );
		break;
	case "remove_photo":
		removeheximage_photo( $photoid, $option );
		break;
	case "save_photo":
		saveheximage_photo( $option );
		break;
	case "cancel_photo":
		cancelheximage_photo( $option );
		break;
# Show about task
    case "about":
        showAbout();
        break;
# Upload & Create thumb task
    case "upload_thumb":
        heximage_uploadthumb($option);
        break;
    case "upload_thumb2":
        heximage_uploadthumb($option);
        break;				
# Default table query
	default:
		showheximage_photo( $option);
		break;
}
/**
* Publishes or Unpublishes one or more modules
* @param array An array of unique category albumid numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The current GET/POST option
*/
function publishheximage_album( $calbumid, $publish, $option ) {
	global $database;
	if (count( $calbumid ) < 1) {
		$action = $publish ? 'publish' : 'unpublish';
		echo "<script> alert('Select a item to ".$action."'); window.history.go(-1);</script>\n";
		exit;
	}
	$calbumids = implode( ',', $calbumid );
	$database->setQuery( "UPDATE #__heximage_album SET published=($publish) WHERE albumid IN ($calbumids)");
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (count( $calbumid ) == 1) {
		$row = new mosheximage_album( $database );
		$row->checkin( $calbumid[0] );
	}
	mosRedirect( "index2.php?option=com_heximage&task=album" );
}
function publishheximage_photo( $cphotoid, $publish, $option ) {
	global $database;
	if (count( $cphotoid ) < 1) {
		$action = $publish ? 'publish' : 'unpublish';
		echo "<script> alert('Select a item to ".$action."'); window.history.go(-1);</script>\n";
		exit;
	}
	$cphotoids = implode( ',', $cphotoid );
	$database->setQuery( "UPDATE #__heximage_photo SET published=($publish) WHERE photoid IN ($cphotoids)");
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (count( $cphotoid ) == 1) {
		$row = new mosheximage_photo( $database );
		$row->checkin( $cphotoid[0] );
	}
	mosRedirect( "index2.php?option=com_heximage&task=photo" );
}
/**
* Creates a new or edits and existing user record
* @param int The albumid of the user, 0 if a new entry
* @param string The current GET/POST option
*/
function editheximage_album( $calbumid, $option ) {
	global $database;
	$row = new mosheximage_album( $database );
	$row->load( $calbumid );
	HTML_heximage::editheximage_album( $row, $option );
}
function editheximage_photo( $cphotoid, $option) {
	global $database;
	$row = new mosheximage_photo( $database );
	$row->load( $cphotoid );
	$database->setQuery( "SELECT * FROM #__heximage_album ORDER BY album_name ASC" );
	$rowA = $database->loadObjectList( $calbumid);
	HTML_heximage::editheximage_photo( $row, $option, $rowA );
}
/**
* Removes records
* @param array An array of albumid keys to remove
* @param string The current GET/POST option
*/
function removeheximage_album( $calbumid, $option ) {
	global $database;
	if (!is_array( $calbumid ) || count( $calbumid ) < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	}
	$calbumids = implode( ',', $calbumid );
	$database->setQuery( "DELETE FROM #__heximage_album WHERE albumid IN ($calbumids)" );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}
	mosRedirect( "index2.php?option=com_heximage&task=album" );
}
function removeheximage_photo( $cphotoid, $option ) {
	global $database;
	if (!is_array( $cphotoid ) || count( $cphotoid ) < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	}
	$cphotoids = implode( ',', $cphotoid );
	$database->setQuery( "DELETE FROM #__heximage_photo WHERE photoid IN ($cphotoids)" );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}
	mosRedirect( "index2.php?option=com_heximage&task=photo" );
}
/**
* Saves the record from an edit form submit
* @param string The current GET/POST option
*/
function saveheximage_album( $option ) {
	global $database;
	$row = new mosheximage_album( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	mosRedirect( "index2.php?option=com_heximage&task=album" );
}
function saveheximage_photo( $option ) {
	global $database;
	$row = new mosheximage_photo( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	mosRedirect( "index2.php?option=com_heximage&task=photo" );
}
# Show deafault admin screen
function showheximage_admin() {
    HTML_heximage::showheximage_admin();
}
# Show about screen to user
function showAbout() {
    HTML_heximage::showAbout();
}
/**
* Cancels an edit operation
* @param string The current GET/POST option
*/
function cancelheximage_album( $option ) {
	global $database;
	$row = new mosheximage_album( $database );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( "index2.php?option=com_heximage&task=album" );
}
function cancelheximage_photo( $option ) {
	global $database;
	$row = new mosheximage_photo( $database );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( "index2.php?option=com_heximage&task=photo" );
}

# Upload & Create thumb function
function heximage_uploadthumb($option) {
global $mosConfig_absolute_path, $mosConfig_live_site, $database;
require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");

$idir = $mosConfig_absolute_path.$HeXimage_image_base;   // Path To Images Directory 
$tdir = $mosConfig_absolute_path.$HeXimage_thumb_base;   // Path To Thumbnails Directory 
$twidth = $HeXimage_XsiZe;   // Maximum Width For Thumbnail Images 
$theight = $HeXimage_YsiZe;   // Maximum Height For Thumbnail Images 
//$tquality = 100;
 if (!isset($_GET['subpage'])) {   // Image Upload Form Below   ?> 
<table width="100%">
  <tr><td width="100%" class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br>
  <?php echo _HeXimage_UcT ;?></td>
  </tr>
  <tr>
  <td><form method="post" action="index2.php?option=com_heximage&task=upload_thumb2&subpage=upload" enctype="multipart/form-data"> 
  <input name="imagefile" type="file" class="form" size="50"> 
  <br /><br /> 
  <input name="submit" type="submit" value="<?php echo _HeXimage_Submit;?>" class="form">  <input type="reset" value="<?php echo _HeXimage_Clear;?>" class="form"> 
  </form>
</td></tr></table>  
<? } else  if (isset($_GET['subpage']) && $_GET['subpage'] == 'upload') {   // Uploading/Resizing Script 
  $url = $_FILES['imagefile']['name'];   // Set $url To Equal The Filename For Later Use 
  if ($_FILES['imagefile']['type'] == "image/jpg" || $_FILES['imagefile']['type'] == "image/jpeg" || $_FILES['imagefile']['type'] == "image/pjpeg") { 
    $file_ext = strrchr($_FILES['imagefile']['name'], '.');   // Get The File Extention In The Format Of , For Instance, .jpg, .gif or .php 
    $copy = copy($_FILES['imagefile']['tmp_name'], "$idir" . $_FILES['imagefile']['name']);   // Move Image From Temporary Location To Permanent Location 
    if ($copy) {   // If The Script Was Able To Copy The Image To It's Permanent Location 
      print 'Image uploaded successfully.<br />';   // Was Able To Successfully Upload Image 
      $simg = imagecreatefromjpeg("$idir" . $url);   // Make A New Temporary Image To Create The Thumbanil From 
      $currwidth = imagesx($simg);   // Current Image Width 
      $currheight = imagesy($simg);   // Current Image Height 
      if ($currheight > $currwidth) {   // If Height Is Greater Than Width 
         $zoom = $twidth / $currheight;   // Length Ratio For Width 
         $newheight = $theight;   // Height Is Equal To Max Height 
         $newwidth = $currwidth * $zoom;   // Creates The New Width 
      } else {    // Otherwise, Assume Width Is Greater Than Height (Will Produce Same Result If Width Is Equal To Height) 
        $zoom = $twidth / $currwidth;   // Length Ratio For Height 
        $newwidth = $twidth;   // Width Is Equal To Max Width 
        $newheight = $currheight * $zoom;   // Creates The New Height 
      } 
      $dimg = imagecreatetruecolor($newwidth, $newheight);   // Make New Image For Thumbnail 
      imagetruecolortopalette($simg, false, 256);   // Create New Color Pallete 
      $palsize = ImageColorsTotal($simg); 
      for ($i = 0; $i < $palsize; $i++) {   // Counting Colors In The Image 
       $colors = ImageColorsForIndex($simg, $i);   // Number Of Colors Used 
       ImageColorAllocate($dimg, $colors['red'], $colors['green'], $colors['blue']);   // Tell The Server What Colors This Image Will Use 
      } 
      imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $newwidth, $newheight, $currwidth, $currheight);   // Copy Resized Image To The New Image (So We Can Save It) 
      imagejpeg($dimg, "$tdir" . $url, 100);   // Saving The Image 
      imagedestroy($simg);   // Destroying The Temporary Image 
      imagedestroy($dimg);   // Destroying The Other Temporary Image 
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br> 
      <?php echo _HeXimage_UPL;?></span></td>
  </tr>
  <tr>
    <td>
	<p><br><?php echo _HeXimage_ImGU;?> <b><?php echo $mosConfig_live_site.$HeXimage_image_base.$url ; ?></b><br>
	<?php echo _HeXimage_thbU;?> <b><?php echo $mosConfig_live_site.$HeXimage_thumb_base.$url ; ?></b></p>
	</td>
  </tr>
</table>

<?php
	$row = new mosheximage_photo( $database );
	$row->load( $cphotoid );
	$database->setQuery( "SELECT * FROM #__heximage_album ORDER BY album_name ASC" );
	$rowA = $database->loadObjectList( $calbumid);
	HTML_heximage::editheximage_photoupload( $row, $option, $rowA, $url, $currwidth, $currheight );
    } else { 
      print '<font color="#FF0000">ERROR: Unable to upload image.</font>';   // Error Message If Upload Failed 
    } 
  } else { 
    print '<font color="#FF0000">ERROR: Wrong filetype (has to be a .jpg or .jpeg. Yours is ';   // Error Message If Filetype Is Wrong 
    print $file_ext;   // Show The Invalid File's Extention 
    print '.</font>'; 
  } 
}
	
}
# show config.heximage.php
function showConfig( $option ) {
  global $mosConfig_absolute_path, $mosConfig_host, $mosConfig_user, $mosConfig_db, $mosConfig_password;
  require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      }
      if (form.HeXimage_maxperpage.value == ""){
        alert( "You must set entries per page greater 0!" );
      } else {
        submitform( pressbutton );
      }
    }
    </script>
    
    
    
    
    
  <form action="index2.php" method="post" name="adminForm" id="adminForm">
  <table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname">
        <img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;">
        <font style="color: #FF9E31;font-size : 18px;font-weight: bold;text-align: left;"><br>config.heximage.php</font>
    </td>
  </tr>
  </table>
  <?php
  $hextabs = new mosTabs( 0 );
  $hextabs->startPane( "Main config" );
    $hextabs->startTab("Backend","Backend-page");
    ?>
    <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
      <tr align="center" valign="middle">
        <td width="20%" align="left" valign="top"><strong><?php echo "Photo gallery offline:" ?></strong></td>
        <td width="20%" align="left" valign="top">
        <?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_lineoff', 'class="inputbox"', $HeXimage_lineoff );
        ?>
        </td>
        <td width="60%" align="left" valign="top"><?php echo _HeXimage_Off_Line ?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Offline message :</strong></td>
        <td align="left" valign="top">
          <?php $HeXimage_offline_message = stripslashes("$HeXimage_offline_message"); ?>
          <textarea class="inputbox" cols="30" rows="5" name="HeXimage_offline_message"><?php echo "$HeXimage_offline_message"; ?></textarea>
        </td>
        <td align="left" valign="top"><?php echo _HeXimage_Offline_Message ?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>MySQL hostname :</strong></td>
        <td align="left" valign="top"><input type="text" name="hostname_sql" value="<? echo "$mosConfig_host"; ?>"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Hostname_Sql ?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>MySQL database :</strong></td>
        <td align="left" valign="top"><input type="text" name="database_sql" value="<? echo "$mosConfig_db"; ?>"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Database_Sql ?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>MySQL user :</strong></td>
        <td align="left" valign="top"><input type="text" name="username_sql" value="<? echo "$mosConfig_user"; ?>"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Username_Sql ?> </td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>MySQL password :</strong></td>
        <td align="left" valign="top"><input type="text" name="password_sql" value="<? echo "$mosConfig_password"; ?>"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Password_Sql ?></td>
      </tr>
    </table>
    <?php
    $hextabs->endTab();
    $hextabs->startTab("Frontend","Frontend-page");
    ?>
    <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Component logo :</strong></td>
        <td align="left" valign="top"><input name="HeXimage_logo" type="text" value="<? echo "$HeXimage_logo"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Component_Logo ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Gallery message : </strong></td>
        <td align="left" valign="top"><textarea name="HeXimage_gallery_message" cols="50" rows="7"><?php echo stripslashes($HeXimage_gallery_message); ?></textarea></td>
        <td align="left" valign="top"><?php echo _HeXimage_Gallery_Message ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Theme selection : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_Theme" type="text" value="<? echo "$HeXimage_Theme"; ?>" size="50"></td>
        <td align="left" valign="top">*Not functional </td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Entries per Page :</strong></td>
        <td align="left" valign="top"><input name="HeXimage_maxperpage" type="text" value="<? echo "$HeXimage_maxperpage"; ?>" size="5"></td>
        <td align="left" valign="top"><?php echo _HeXimage_EpP ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Thumbs per row : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_thumbperrow" type="text" value="<? echo "$HeXimage_thumbperrow"; ?>" size="5"></td>
        <td align="left" valign="top"><?php echo _HeXimage_TpP ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Auto thumb border: </strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_shadow', 'class="inputbox"', $HeXimage_shadow );
        ?></td>
        <td align="left" valign="top"><?php echo _HeXimage_Tborder ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Thumb border color : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_shadowCol" type="text" value="<? echo "$HeXimage_shadowCol"; ?>" size="6"></td>
        <td align="left" valign="top"><?php echo _HeXimage_TbColor ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Graphical page navigation : </strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_TG', 'class="inputbox"', $HeXimage_TG );
        ?></td>
        <td align="left" valign="top"><?php echo _HeXimage_GrP ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Navigation arrow first : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_first" type="text" value="<? echo "$HeXimage_first"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_PnA ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Navigation arrow left : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_leftarrow" type="text" value="<? echo "$HeXimage_leftarrow"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_PnA ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Navigation arrow right : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_rightarrow" type="text" value="<? echo "$HeXimage_rightarrow"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_PnA ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Navigation arrow last : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_last" type="text" value="<? echo "$HeXimage_last"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_PnA ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Navigation width : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_PnWidth" type="text" value="<? echo "$HeXimage_PnWidth"; ?>" size="5"></td>
        <td align="left" valign="top"><?php echo _HeXimage_PnavW ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Alignment : </strong></td>
        <td align="left" valign="top"><select name="HeXimage_align" size="1">
		  <option value="<?php echo $HeXimage_align;?>" <?php if (!(strcmp("", $HeXimage_align))) {echo "SELECTED";} ?>>--&nbsp;<?php echo $HeXimage_align;?>&nbsp;--</option>
            <option value="left">Left</option>
			<option value="center">Center</option>
			<option value="right">Right</option>
          </select>        </td>
        <td align="left" valign="top"><?php echo _HeXimage_AlignM;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Album sort front-end : </strong></td>
        <td align="left" valign="top"><select name="HeXimage_Asort" size="1">
		  <option value="<?php echo $HeXimage_Asort;?>" <?php if (!(strcmp("", $HeXimage_Asort))) {echo "SELECTED";} ?>>--&nbsp;<?php echo $HeXimage_Asort;?>&nbsp;--</option>
            <option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
          </select></td>
        <td align="left" valign="top"><?php echo _HeXimage_ASCDESC;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Photo sort front-end : </strong></td>
        <td align="left" valign="top"><select name="HeXimage_Psort" size="1">
		  <option value="<?php echo $HeXimage_Psort;?>" <?php if (!(strcmp("", $HeXimage_Psort))) {echo "SELECTED";} ?>>--&nbsp;<?php echo $HeXimage_Psort;?>&nbsp;--</option>
            <option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
          </select></td>
        <td align="left" valign="top"><?php echo _HeXimage_ASCDESC;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Album sort back-end : </strong></td>
        <td align="left" valign="top"><select name="HeXimage_aAsort" size="1">
		  <option value="<?php echo $HeXimage_aAsort;?>" <?php if (!(strcmp("", $HeXimage_aAsort))) {echo "SELECTED";} ?>>--&nbsp;<?php echo $HeXimage_aAsort;?>&nbsp;--</option>
            <option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
          </select></td>
        <td align="left" valign="top"><?php echo _HeXimage_ASCDESC;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Photo sort back-end : </strong></td>
        <td align="left" valign="top"><select name="HeXimage_aPsort" size="1">
		  <option value="<?php echo $HeXimage_aPsort;?>" <?php if (!(strcmp("", $HeXimage_aPsort))) {echo "SELECTED";} ?>>--&nbsp;<?php echo $HeXimage_aPsort;?>&nbsp;--</option>
            <option value="ASC">Ascending</option>
			<option value="DESC">Descending</option>
          </select></td>
        <td align="left" valign="top"><?php echo _HeXimage_ASCDESC;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Search result : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_Samnt" type="text" value="<? echo "$HeXimage_Samnt"; ?>" size="5"></td>
        <td align="left" valign="top"><?php echo _HeXimage_SmnT;?></td>
      </tr>
    </table>
    <?php
    $hextabs->endTab();
    $hextabs->startTab("Fields","Fields-page");
    ?>
    <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Window mode : </strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_windowmode', 'class="inputbox"', $HeXimage_windowmode );
        ?></td>
        <td align="left" valign="top"><?php echo _HeXimage_Wmode ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Offsite :</strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_offsite', 'class="inputbox"', $HeXimage_offsite );
        ?></td>
        <td align="left" valign="top"><?php echo _HeXimage_Offsite ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Image base map : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_image_base" type="text" value="<? echo "$HeXimage_image_base"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Image_Base ?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Thumb base map : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_thumb_base" type="text" value="<? echo "$HeXimage_thumb_base"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Thumb_Base ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Disable right mouse click : </strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_rightmouse', 'class="inputbox"', $HeXimage_rightmouse );
        ?>        </td>
        <td align="left" valign="top"><?php echo _HeXimage_DrMc ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Copyright text : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_copytxt" type="text" value="<? echo "$HeXimage_copytxt"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_Copy;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Show album description :</strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_SaDesc', 'class="inputbox"', $HeXimage_SaDesc );
        ?></td>
        <td align="left" valign="top">*Not functional <?php echo _HeXimage_Show_Ad ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Thumb size : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_XsiZe" type="text" value="<? echo "$HeXimage_XsiZe"; ?>" size="4"> 
          x <input name="HeXimage_YsiZe" type="text" value="<? echo "$HeXimage_YsiZe"; ?>" size="4">        </td>
        <td align="left" valign="top"><?php echo _HeXimage_Thumb_Size ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Use watermark :</strong></td>
        <td align="left" valign="top"><?php
          $yesno[] = mosHTML::makeOption( '0', 'No' );
          $yesno[] = mosHTML::makeOption( '1', 'Yes' );
          echo mosHTML::yesnoRadioList( 'HeXimage_WT_USE', 'class="inputbox"', $HeXimage_WT_USE );
        ?></td>
        <td align="left" valign="top"><?php echo _HeXimage_WtMu ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Watermark :</strong></td>
        <td align="left" valign="top"><input name="HeXimage_WaterMark" type="text" value="<? echo "$HeXimage_WaterMark"; ?>" size="50"></td>
        <td align="left" valign="top"><?php echo _HeXimage_WtMa ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Watermark quality : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_WMquality" type="text" value="<? echo "$HeXimage_WMquality"; ?>" size="3"> 
        % </td>
        <td align="left" valign="top"><?php echo _HeXimage_WtMq ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top"><strong>Watermark Transparency : </strong></td>
        <td align="left" valign="top"><input name="HeXimage_WMgamma" type="text" value="<? echo "$HeXimage_WMgamma"; ?>" size="3"> %</td>
        <td align="left" valign="top"><?php echo _HeXimage_WtMt ;?></td>
      </tr>
      <tr align="center" valign="middle">
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
    <?php
    $hextabs->endTab();
  $hextabs->endPane();
  ?>
  <input type="hidden" name="id" value="">
  <input type="hidden" name="task" value="">
  <input type="hidden" name="option" value="<?php echo $option; ?>">
</form>
<?php	
}
# Save the config.heximage.php file
function saveConfig ($option, $sql, $HeXimage_lineoff, $HeXimage_offline_message, $hostname_sql, $database_sql, $username_sql, $password_sql, $HeXimage_logo, $HeXimage_gallery_message, $HeXimage_Theme, $HeXimage_maxperpage, $HeXimage_thumbperrow, $HeXimage_shadow, $HeXimage_shadowCol, $HeXimage_TG, $HeXimage_first,$HeXimage_leftarrow, $HeXimage_rightarrow, $HeXimage_last, $HeXimage_PnWidth,$HeXimage_align, $HeXimage_Asort, $HeXimage_Psort, $HeXimage_aAsort, $HeXimage_aPsort, $HeXimage_Samnt, $HeXimage_windowmode, $HeXimage_offsite, $HeXimage_image_base, $HeXimage_thumb_base, $HeXimage_rightmouse, $HeXimage_copytxt, $HeXimage_SaDesc, $HeXimage_XsiZe, $HeXimage_YsiZe, $HeXimage_WT_USE, $HeXimage_WaterMark, $HeXimage_WMquality, $HeXimage_WMgamma) {
  $configfile = "components/com_heximage/config.heximage.php";
  @chmod ($configfile, 0766);
  $permission = is_writable($configfile);
  if (!$permission) {
    mosRedirect("index2.php?option=$option&task=config", "Config file not writeable!");
    break;
  }
  $config = "<?php\n";
  $config .= "\$HeXimage_lineoff = \"$HeXimage_lineoff\";\n";
  $config .= "\$HeXimage_offline_message = \"$HeXimage_offline_message\";\n";
  $config .= "\$hostname_sql = \"$hostname_sql\";\n";
  $config .= "\$database_sql = \"$database_sql\";\n";
  $config .= "\$username_sql = \"$username_sql\";\n";
  $config .= "\$password_sql = \"$password_sql\";\n";
  $config .= "\$HeXimage_logo = \"$HeXimage_logo\";\n";
  $config .= "\$HeXimage_gallery_message = \"$HeXimage_gallery_message\";\n";
  $config .= "\$HeXimage_Theme = \"$HeXimage_Theme\";\n";
  $config .= "\$HeXimage_maxperpage = \"$HeXimage_maxperpage\";\n";
  $config .= "\$HeXimage_thumbperrow = \"$HeXimage_thumbperrow\";\n";
  $config .= "\$HeXimage_shadow = \"$HeXimage_shadow\";\n";
   $config .= "\$HeXimage_shadowCol = \"$HeXimage_shadowCol\";\n";
  $config .= "\$HeXimage_TG = \"$HeXimage_TG\";\n";
  $config .= "\$HeXimage_first = \"$HeXimage_first\";\n";
  $config .= "\$HeXimage_leftarrow = \"$HeXimage_leftarrow\";\n";
  $config .= "\$HeXimage_rightarrow = \"$HeXimage_rightarrow\";\n"; 
  $config .= "\$HeXimage_last = \"$HeXimage_last\";\n";
  $config .= "\$HeXimage_PnWidth = \"$HeXimage_PnWidth\";\n";
  $config .= "\$HeXimage_align = \"$HeXimage_align\";\n";
  $config .= "\$HeXimage_Asort = \"$HeXimage_Asort\";\n";
  $config .= "\$HeXimage_Psort = \"$HeXimage_Psort\";\n";
  $config .= "\$HeXimage_aAsort = \"$HeXimage_aAsort\";\n";
  $config .= "\$HeXimage_aPsort = \"$HeXimage_aPsort\";\n";
  $config .= "\$HeXimage_Samnt = \"$HeXimage_Samnt\";\n";
  $config .= "\$HeXimage_windowmode = \"$HeXimage_windowmode\";\n"; 
  $config .= "\$HeXimage_offsite = \"$HeXimage_offsite\";\n";           
  $config .= "\$HeXimage_image_base = \"$HeXimage_image_base\";\n"; 
  $config .= "\$HeXimage_thumb_base = \"$HeXimage_thumb_base\";\n";
  $config .= "\$HeXimage_rightmouse = \"$HeXimage_rightmouse\";\n"; 
  $config .= "\$HeXimage_copytxt = \"$HeXimage_copytxt\";\n"; 
  $config .= "\$HeXimage_SaDesc = \"$HeXimage_SaDesc\";\n";
  $config .= "\$HeXimage_XsiZe = \"$HeXimage_XsiZe\";\n";
  $config .= "\$HeXimage_YsiZe = \"$HeXimage_YsiZe\";\n";      
  $config .= "\$HeXimage_WT_USE = \"$HeXimage_WT_USE\";\n";  
  $config .= "\$HeXimage_WaterMark = \"$HeXimage_WaterMark\";\n";
  $config .= "\$HeXimage_WMquality = \"$HeXimage_WMquality\";\n";
  $config .= "\$HeXimage_WMgamma = \"$HeXimage_WMgamma\";\n";
  $config .= "?>";
  if ($fp = fopen("$configfile", "w")) {
    fputs($fp, $config, strlen($config));
    fclose ($fp);
  }
  mosRedirect("index2.php?option=$option", "Settings saved");
}
/**
* List the records
* @param string The current GET/POST option
*/
function showheximage_album($option ) {
	global $database, $mainframe, $mosConfig_live_site, $mosConfig_absolute_path, $HeXimage_aAsort;
	require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
	
	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 100 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );

	// get the total number of records
	$database->setQuery( "SELECT count(*) FROM #__heximage_album" );

	$total = $database->loadResult();
	echo $database->getErrorMsg();

	require_once("includes/pageNavigation.php");
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	# Do the main database query
	$database->setQuery( "SELECT * FROM #__heximage_album ORDER BY album_name $HeXimage_aAsort LIMIT $pageNav->limitstart,$pageNav->limit" );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;

	}
	HTML_heximage::showheximage_album( $rows, $pageNav, $option );
}
function showheximage_photo($option) {

	global $database, $mainframe, $mosConfig_live_site, $mosConfig_absolute_path, $HeXimage_aPsort;
	require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");	
	$pad = $mosConfig_live_site.'/'.$HeXimage_thumb_base;
	
	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 30 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
	
	// get the total number of records
	$database->setQuery( "SELECT count(*) FROM #__heximage_photo" );
	$total = $database->loadResult();
	echo $database->getErrorMsg();
	require_once("includes/pageNavigation.php");
	$pageNav2 = new mosPageNav( $total, $limitstart, $limit );
	
	# Do the main database query
	$database->setQuery( "SELECT * FROM #__heximage_photo ORDER BY photoid $HeXimage_aPsort LIMIT $pageNav2->limitstart,$pageNav2->limit " );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	
	}
	HTML_heximage::showheximage_photo( $rows, $pageNav2, $option, $pad );
}
?>