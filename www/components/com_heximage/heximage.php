<?php
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/
# Variables - Don't change anything here!!!
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
include_once ("hexjava.inc");
# Check if HeXimage is offline
  if ($HeXimage_lineoff == 1) {
    require($mosConfig_absolute_path."/components/com_heximage/offline.php");
  }  else {
    if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    }
$heximageversion       = "2.1.2"; 

# Functions of HeXimage
function  HeXimage_header(){
global $mosConfig_live_site, $mosConfig_absolute_path, $HeXimage_logo, $HeXimage_Theme, $HeXimage_shadow;
require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
include_once ("hexjava.inc");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site.$HeXimage_Theme;?>css/styles.css" />
<?php if ($HeXimage_logo <> ''){
							$pad1 = $mosConfig_live_site;
							echo '<img src='.$pad1.$HeXimage_logo.'><br>';
						}
else{echo '&nbsp';}

 }
// HeXimage first page
function HeXimage_noalbum($task){
global $mosConfig_dbprefix,$mosConfig_absolute_path,$mosConfig_live_site,$hostname,$username_sql,$password_sql,$database_sql,$sql,$HeXimage_maxperpage,$HeXimage_thumbperrow, $HeXimage_offsite, $HeXimage_image_base,$HeXimage_thumb_base, $HeXimage_align, $HeXimage_Asort, $HeXimage_Psort, $HeXimage_PnWidth, $HeXimage_shadow, $HeXimage_shadowCol;

require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");

# Check if HeXimage is offline
  if ($HeXimage_lineoff == 1) {
    require($mosConfig_absolute_path."/components/com_heximage/offline.php");
  }  else {
    if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    }
if ($HeXimage_offsite == 0){
$pad1 = $mosConfig_live_site.$HeXimage_image_base;
$pad2 = $mosConfig_live_site.$HeXimage_thumb_base;
}
if ($HeXimage_offsite == 1){
$pad1 = $HeXimage_image_base;
$pad2 = $HeXimage_thumb_base;
}

$dbchoose1 = $mosConfig_dbprefix."heximage_album";
$dbchoose2 = $mosConfig_dbprefix."heximage_photo";

$sql = mysql_pconnect($hostname_sql, $username_sql, $password_sql) or die (mysql_error());
mysql_select_db($database_sql, $sql);
$query_album = "SELECT * FROM $dbchoose1 WHERE published = '1' ORDER BY album_name $HeXimage_Asort";
$album = mysql_query($query_album, $sql) or die(mysql_error());
$row_album = mysql_fetch_assoc($album);
$totalRows_album = mysql_num_rows($album);

$maxRows_albumfoto = $HeXimage_maxperpage;
$pageNum_albumfoto = 0;
if (isset($_GET['pageNum_albumfoto'])) {
  $pageNum_albumfoto = $_GET['pageNum_albumfoto'];
}
$startRow_albumfoto = $pageNum_albumfoto * $maxRows_albumfoto;

mysql_select_db($database_sql, $sql);
$query_albumfoto = "SELECT * FROM $dbchoose2 WHERE published = '1' ORDER BY rand()";
$query_limit_albumfoto = sprintf("%s LIMIT %d, %d", $query_albumfoto, $startRow_albumfoto, $maxRows_albumfoto);
$albumfoto = mysql_query($query_limit_albumfoto, $sql) or die(mysql_error());
$row_albumfoto = mysql_fetch_assoc($albumfoto);

if (isset($_GET['totalRows_albumfoto'])) {
  $totalRows_albumfoto = $_GET['totalRows_albumfoto'];
} else {
  $all_albumfoto = mysql_query($query_albumfoto);
  $totalRows_albumfoto = mysql_num_rows($all_albumfoto);
}
$totalPages_albumfoto = ceil($totalRows_albumfoto/$maxRows_albumfoto)-1;
?>
<?php echo stripslashes($HeXimage_gallery_message); ?>
<br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="156"><div align="left">Album</div></td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td><table cellpadding=4 cellspacing=0 border=0> 
<form name=form> 
	<tr> 
		<td nowrap> 
          <select name="fieldname" onChange="openDir( this.form )">
            <option value="value">---------------------</option>
            <?php
do {  
?>
            <option value="index.php?option=com_heximage&task=selector&albumselected=<?php echo $row_album['album_name']?>"><?php echo $row_album['album_name']?></option>
            <?php
} while ($row_album = mysql_fetch_assoc($album));
  $rows = mysql_num_rows($album);
  if($rows > 0) {
      mysql_data_seek($album, 0);
	  $row_album = mysql_fetch_assoc($album);
  }
?>
          </select></td> 
    </tr> 
</form> 
</table></td>
    <td align="left" valign="top"><?php echo _HeXimage_TotalAlbums."($totalRows_album)&nbsp;"._HeXimage_AmmountAlbums ?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
<div align="<?php echo $HeXimage_align;?>">
      <?php
  do { // horizontal looper
 $noimage = _HeXimage_NoImage;
if ($totalRows_albumfoto == 0){echo "<div align='center'>$noimage</div>";}
if ($totalRows_albumfoto > 0){
if ($HeXimage_windowmode == 0){
?>
<a href="#" onclick="ButtonClick('<img src=<?php echo $pad1.$row_albumfoto['url']; ?>>','<?php echo $row_albumfoto['hsize']; ?>','<?php echo $row_albumfoto['vsize']; ?>');"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>></a>
<?php }
if ($HeXimage_windowmode == 1){
?>
<a href="javascript:view('<?php echo $pad1.$row_albumfoto['url']; ?>')"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>><?php }?>
<?php }?></a>
          <?php
    $row_albumfoto = mysql_fetch_assoc($albumfoto);
    if (!isset($nested_albumfoto)) {
      $nested_albumfoto= 1;
    }
    if (isset($row_albumfoto) && is_array($row_albumfoto) && $nested_albumfoto++%$HeXimage_thumbperrow==0) {
      echo '<br>';
    }
  } while ($row_albumfoto); //end horizontal looper 
?>
</div>
    </td>
  </tr>
</table>
<div align="center"><?php echo _HeXimage_TotalPictures."($totalRows_albumfoto)&nbsp;"._HeXimage_AmmountPictures ;?></div>
<?php
mysql_free_result($albumfoto);
mysql_free_result($album);
}} //end of no album selection?>

<?php function HeXimage_albumselected($task){
global $mosConfig_dbprefix,$mosConfig_absolute_path,$mosConfig_live_site,$hostname,$username_sql,$password_sql,$database_sql,$sql,$HeXimage_maxperpage, $HeXimage_thumbperrow, $HeXimage_TG, $HeXimage_first, $HeXimage_leftarrow, $HeXimage_rightarrow, $HeXimage_last, $HeXimage_offsite, $HeXimage_image_base,$HeXimage_thumb_base, $HeXimage_align, $HeXimage_Asort, $HeXimage_Psort, $HeXimage_SaDesc, $HeXimage_PnWidth, $HeXimage_shadow, $HeXimage_shadowCol;

require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");

# Check if HeXimage is offline
  if ($HeXimage_lineoff == 1) {
    require($mosConfig_absolute_path."/components/com_heximage/offline.php");
  }  else {
    if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    }
if ($HeXimage_offsite == 0){
$pad1 = $mosConfig_live_site.$HeXimage_image_base;
$pad2 = $mosConfig_live_site.$HeXimage_thumb_base;
}
if ($HeXimage_offsite == 1){
$pad1 = $HeXimage_image_base;
$pad2 = $HeXimage_thumb_base;}

$dbchoose1 = $mosConfig_dbprefix."heximage_photo";
$dbchoose2 = $mosConfig_dbprefix."heximage_album";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_albumfoto = $HeXimage_maxperpage;
$pageNum_albumfoto = 0;
if (isset($_GET['pageNum_albumfoto'])) {
  $pageNum_albumfoto = $_GET['pageNum_albumfoto'];
}
$startRow_albumfoto = $pageNum_albumfoto * $maxRows_albumfoto;

$colname_albumfoto = "1";
if (isset($_GET['albumselected'])) {
  $colname_albumfoto = (get_magic_quotes_gpc()) ? $_GET['albumselected'] : addslashes($_GET['albumselected']);
}
$sql = mysql_pconnect($hostname_sql, $username_sql, $password_sql) or die (mysql_error());
mysql_select_db($database_sql, $sql);
$query_albumfoto = sprintf("SELECT * FROM $dbchoose1 WHERE album_type = '%s' AND published = '1'ORDER BY photoid $HeXimage_Psort", $colname_albumfoto);
$query_limit_albumfoto = sprintf("%s LIMIT %d, %d", $query_albumfoto, $startRow_albumfoto, $maxRows_albumfoto);
$albumfoto = mysql_query($query_limit_albumfoto, $sql) or die(mysql_error());
$row_albumfoto = mysql_fetch_assoc($albumfoto);

if (isset($_GET['totalRows_albumfoto'])) {
  $totalRows_albumfoto = $_GET['totalRows_albumfoto'];
} else {
  $all_albumfoto = mysql_query($query_albumfoto);
  $totalRows_albumfoto = mysql_num_rows($all_albumfoto);
}
$totalPages_albumfoto = ceil($totalRows_albumfoto/$maxRows_albumfoto)-1;

mysql_select_db($database_sql, $sql);
$query_album = "SELECT * FROM $dbchoose2 WHERE published = '1' ORDER BY album_name $HeXimage_Asort";
$album = mysql_query($query_album, $sql) or die(mysql_error());
$row_album = mysql_fetch_assoc($album);
$totalRows_album = mysql_num_rows($album);

$queryString_albumfoto = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_albumfoto") == false && 
        stristr($param, "totalRows_albumfoto") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_albumfoto = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_albumfoto = sprintf("&totalRows_albumfoto=%d%s", $totalRows_albumfoto, $queryString_albumfoto);
?>
<?php echo stripslashes($HeXimage_gallery_message); ?><br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="156" align="left" valign="top"><div align="left">Album</div></td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td><table cellpadding=4 cellspacing=0 border=0> 
<form name=form> 
	<tr> 
		<td nowrap> 
          <select name="fieldname" onChange="openDir( this.form )">
            <option value="value">---------------------</option>
<?php
do {  
?>
            <option value="index.php?option=com_heximage&task=selector&albumselected=<?php echo $row_album['album_name']?>"><?php echo $row_album['album_name']?></option>
            <?php
} while ($row_album = mysql_fetch_assoc($album));
  $rows = mysql_num_rows($album);
  if($rows > 0) {
      mysql_data_seek($album, 0);
	  $row_album = mysql_fetch_assoc($album);
  }
?>
          </select></td> 
    </tr> 
</form> 
</table> </td>
    <td align="left" valign="top"><?php echo _HeXimage_TotalAlbums."($totalRows_album)&nbsp;"._HeXimage_AmmountAlbums ?></td>
  </tr>
</table>
<?php //if ($HeXimage_SaDesc == 1){
//echo $row_album['album_description'];}
//else{echo '&nbsp';}
?>
<br>
<div align="<?php echo $HeXimage_align;?>">
<?php
  do { // horizontal looper
$noimage = _HeXimage_NoImage;
if ($totalRows_albumfoto == 0){echo "<div align='center'>$noimage</div>";}
if ($totalRows_albumfoto > 0){
if ($HeXimage_windowmode == 0){
?>
<a href="#" onclick="ButtonClick('<img src=<?php echo $pad1.$row_albumfoto['url']; ?>>','<?php echo $row_albumfoto['hsize']; ?>','<?php echo $row_albumfoto['vsize']; ?>');"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>>
<?php ;}
if ($HeXimage_windowmode == 1){
?>
<a href="javascript:view('<?php echo $pad1.$row_albumfoto['url']; ?>')"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>><?php } // windowmode
?>
<?php }?></a>
  <?php
    $row_albumfoto = mysql_fetch_assoc($albumfoto);
    if (!isset($nested_albumfoto)) {
      $nested_albumfoto= 1;
    }
    if (isset($row_albumfoto) && is_array($row_albumfoto) && $nested_albumfoto++%$HeXimage_thumbperrow==0) {
      echo "<br class=clear>";
    }
  } while ($row_albumfoto); //end horizontal looper 
?></div>
<table border="0" width="<?php echo $HeXimage_PnWidth;?>" align="center">
<?php
 if ($HeXimage_TG == 0){ ?>
   <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, 0, $queryString_albumfoto); ?>"><?php echo _HeXimage_First;?></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_albumfoto > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, max(0, $pageNum_albumfoto - 1), $queryString_albumfoto); ?>"><?php echo _HeXimage_Previous;?></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto < $totalPages_albumfoto) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, min($totalPages_albumfoto, $pageNum_albumfoto + 1), $queryString_albumfoto); ?>"><?php echo _HeXimage_Next;?></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto < $totalPages_albumfoto) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, $totalPages_albumfoto, $queryString_albumfoto); ?>"><?php echo _HeXimage_Last;?></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
<?php ;}
 if ($HeXimage_TG == 1){ ?>
   <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, 0, $queryString_albumfoto); ?>"><?php echo '<img src='.$HeXimage_first.' border=0 >';?></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_albumfoto > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, max(0, $pageNum_albumfoto - 1), $queryString_albumfoto); ?>"><?php echo '<img src='.$HeXimage_leftarrow.' border=0 >';?></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto < $totalPages_albumfoto) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, min($totalPages_albumfoto, $pageNum_albumfoto + 1), $queryString_albumfoto); ?>"><?php echo '<img src='.$HeXimage_rightarrow.' border=0 >';?></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_albumfoto < $totalPages_albumfoto) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_albumfoto=%d%s", $currentPage, $totalPages_albumfoto, $queryString_albumfoto); ?>"><?php echo '<img src='.$HeXimage_last.' border=0 >';?></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
 <?php ;} ?>
</table>
<div align="center"><?php echo _HeXimage_Photo_Nav1;?> <?php echo ($startRow_albumfoto + 1) ?> - <?php echo min($startRow_albumfoto + $maxRows_albumfoto, $totalRows_albumfoto) ?> <?php echo _HeXimage_Photo_Nav2;?> <?php echo $totalRows_albumfoto ?> </div>
<?php
mysql_free_result($albumfoto);
mysql_free_result($album);
} }//end of album selection

# Heximage search
function HeXimage_search(){
global $mosConfig_dbprefix,$mosConfig_absolute_path,$mosConfig_live_site,$hostname,$username_sql,$password_sql,$database_sql,$sql,$HeXimage_maxperpage, $HeXimage_thumbperrow, $HeXimage_TG, $HeXimage_first, $HeXimage_leftarrow, $HeXimage_rightarrow, $HeXimage_last, $HeXimage_offsite, $HeXimage_image_base, $HeXimage_thumb_base, $HeXimage_align, $HeXimage_Asort, $HeXimage_Psort, $HeXimage_SaDesc, $HeXimage_XsiZe, $HeXimage_YsiZe, $HeXimage_Samnt, $HeXimage_windowmode, $HeXimage_PnWidth, $HeXimage_shadow, $HeXimage_shadowCol;

require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
include_once ("hexjava.inc");
# Check if HeXimage is offline
  if ($HeXimage_lineoff == 1) {
    require($mosConfig_absolute_path."/components/com_heximage/offline.php");
  }  else {
    if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    }
if ($HeXimage_offsite == 0){
$pad1 = $mosConfig_live_site.$HeXimage_image_base;
$pad2 = $mosConfig_live_site.$HeXimage_thumb_base;
}
if ($HeXimage_offsite == 1){
$pad1 = $HeXimage_image_base;
$pad2 = $HeXimage_thumb_base;}

$dbchoose1 = $mosConfig_dbprefix."heximage_photo";
$dbchoose2 = $mosConfig_dbprefix."heximage_album";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_albumfoto = $HeXimage_Samnt;
$pageNum_albumfoto = 0;
if (isset($_GET['pageNum_albumfoto'])) {
  $pageNum_albumfoto = $_GET['pageNum_albumfoto'];
}
$startRow_albumfoto = $pageNum_albumfoto * $maxRows_albumfoto;

$colname_albumfoto = "1";
if (isset($_POST['description'])) {
  $colname_albumfoto = (get_magic_quotes_gpc()) ? $_POST['description'] : addslashes($_POST['description']);
}
$sql = mysql_pconnect($hostname_sql, $username_sql, $password_sql) or die (mysql_error());
mysql_select_db($database_sql, $sql);
$query_albumfoto = sprintf("SELECT * FROM $dbchoose1 WHERE description LIKE '%%%s%%' AND published = '1' ORDER BY photoid ASC", $colname_albumfoto);
$query_limit_albumfoto = sprintf("%s LIMIT %d, %d", $query_albumfoto, $startRow_albumfoto, $maxRows_albumfoto);
$albumfoto = mysql_query($query_limit_albumfoto, $sql) or die(mysql_error());
$row_albumfoto = mysql_fetch_assoc($albumfoto);

if (isset($_GET['totalRows_albumfoto'])) {
  $totalRows_klantenzoeken = $_GET['totalRows_albumfoto'];
} else {
  $all_albumfoto = mysql_query($query_albumfoto);
  $totalRows_albumfoto = mysql_num_rows($all_albumfoto);
}
$totalPages_albumfoto = ceil($totalRows_albumfoto/$maxRows_albumfoto)-1;

$queryString_albumfoto = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_albumfoto") == false && 
        stristr($param, "totalRows_albumfoto") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_albumfoto = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_albumfoto = sprintf("&totalRows_albumfoto=%d%s", $totalRows_albumfoto, $queryString_albumfoto);
?>
<strong><?php echo _HeXimage_Srest;?></strong><br>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="4">
  <tr bgcolor="#d3d3d3">
    <td width="2%" align="center" bgcolor="#d3d3d3"><strong>ID</strong></td>
    <td width="<?php echo $HeXimage_XsiZe;?>" align="center" bgcolor="#d3d3d3"><div align="center"><strong>Thumb</strong></div></td>
    <td width="15%" bgcolor="#d3d3d3"><strong><?php echo _HeXimage_SaLb;?></strong></td>
    <td bgcolor="#d3d3d3"><strong><?php echo _HeXimage_SDeSCr;?></strong></td>
    <td bgcolor="#d3d3d3">&nbsp;</td>
    <td width="8%" align="center" bgcolor="#d3d3d3"><div align="center"><strong><?php echo _HeXimage_SsiZe;?></strong></div></td>
  </tr>
  <?php do {
  $noimage = _HeXimage_NoImage;
 ?>
  <tr align="left" valign="top" bgcolor="#f5f5f5">
    <td align="center" valign="middle" bgcolor="#f5f5f5"> <a href="geschiedenisopklant.php?recordID=<?php echo $row_klantenzoeken['reparatieID']; ?>"> <?php echo $row_albumfoto['photoid']; ?></a></td>
    <td align="center" valign="middle" ><?php
	if ($HeXimage_windowmode == 0){
		 if ($row_albumfoto['thumb'] <> ''){?> <div align=center><a href="#" onclick="ButtonClick('<img src=<?php echo $pad1.$row_albumfoto['url']; ?>>','<?php echo $row_albumfoto['hsize']; ?>','<?php echo $row_albumfoto['vsize']; ?>');"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>><?php ; }
			else {echo '<div align="center"><b>'._HeXimage_NFnd.'</b></div>';}}
	if ($HeXimage_windowmode == 1){
		if ($row_albumfoto['thumb'] <> ''){?><a href="javascript:view('<?php echo $pad1.$row_albumfoto['url']; ?>')"><img src="<?php echo $pad2.$row_albumfoto['thumb']; ?>" alt="<?php echo $row_albumfoto['description']; ?>" width="<?php echo $HeXimage_XsiZe ;?>" height="<?php echo $HeXimage_YsiZe ;?>" border="0" <?php if ($HeXimage_shadow == 1) {echo 'style="border:1px solid '.$HeXimage_shadowCol.'"';}
if ($HeXimage_shadow == 0){echo 'border="0"';}?>><?php ; }
			else {echo '<div align="center"><b>'._HeXimage_NFnd.'</b></div>';}}?><br />
        <?php echo $row_albumfoto['thumb'];  ?></td>
    <td><?php echo stripslashes($row_albumfoto['album_type']); ?></td>
    <td><?php echo stripslashes($row_albumfoto['description']); ?></td>
    <td>&nbsp;</td>
    <td align="center"><div align="center"><?php echo '<b>'.$row_albumfoto['hsize'].'</b>'.' x '.'<b>'.$row_albumfoto['vsize'].'</b>';?></div></td>
    </tr>
  <?php } while ($row_albumfoto = mysql_fetch_assoc($albumfoto)); ?>
</table>
<?php
mysql_free_result($albumfoto);
}
}
# Heximage footer
function HeXimage_footer(){
global $heximageversion;
echo "<br><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='10%'></td><td><div align='center'>HeXimage version ".$heximageversion."</div></td><td width='10%'></td></tr></table>";
}

# Switch tasks
switch ($task) {
	case 'selector':
	HeXimage_header();
    HeXimage_albumselected($task);
	HeXimage_footer();
	break;
	case 'search':
	HeXimage_header();
    HeXimage_search($task);
	HeXimage_footer();
	break;
	default:
	HeXimage_header();
	HeXimage_noalbum($task);
	HeXimage_footer();
	break;
	} // Close switch tag
} 
?>