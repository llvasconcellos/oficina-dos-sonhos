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
| Filename: upload.php                                                |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$formtype = mosGetParam($_REQUEST,'formtype');
if ($zoom->_CONFIG['readEXIF'] && !(bool) ini_get('safe_mode')) {
	include_once($mosConfig_absolute_path."/components/com_zoom/lib/iptc/JPEG.php");
	include_once($mosConfig_absolute_path."/components/com_zoom/lib/iptc/EXIF.php");
	include_once($mosConfig_absolute_path."/components/com_zoom/lib/iptc/Photoshop_IRB.php");
	include_once($mosConfig_absolute_path."/components/com_zoom/lib/iptc/XMP.php");
	include_once($mosConfig_absolute_path."/components/com_zoom/lib/iptc/Photoshop_File_Info.php");
}
$zoom->createProgressScript('upload');
?>
<script language="Javascript">
<!--
function submitCount() {
	document.count_form.submit();
	return false;
}
var disabled = false;

function disable(theForm, elmnt) {
	document.forms[theForm].elements[elmnt].disabled = true;
	disabled = true;
}
function enable(theForm, elmnt) {
	document.forms[theForm].elements[elmnt].disabled = false;
	disabled = false;
}
function toggleDisabled(theForm, elmnt) {
	if (disabled == true) {
		enable(theForm, elmnt);
	} else {
		disable(theForm, elmnt);
	}
}
// -->
</script>
<!-- Begin header -->
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center" width="100%"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
			<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN;?>
		</a>&nbsp; | &nbsp;
		<?php
		if(isset($return)){
			?>
			<a href="<?php echo "index".$backend.".php?option=com_zoom&page=mediamgr&catid=".$catid."&Itemid=".$Itemid;?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/back.png" alt="<?echo _ZOOM_BACK;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_BACK;?>
			</a>
			<?php
		}
		?>
		</td>
	</tr>
<tr>
	<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/upload_f2.png" border="0" alt="<?php echo _ZOOM_HD_UPLOAD;?>">&nbsp;<b><font size="4"><?php echo _ZOOM_HD_UPLOAD;?></font></b></td>
</tr>
<tr>
	<td height="10">&nbsp;</td>
</tr>
<tr>
	<td align="center" width="100%">
		<link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.css" />
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.js"></script>
		<div class="tab-page" id="modules-cpanel">
			<script type="text/javascript">
				var tabPane1 = new WebFXTabPane( document.getElementById( "modules-cpanel" ), 0 )
			</script>
			<div class="tab-page" id="module19">
				<h2 class="tab"><?php echo _ZOOM_UPLOAD_SINGLE;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module19" ) );
					//-->
				</script>
				<?php
				include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/upl_single.php');
				?>
			</div>
			<div class="tab-page" id="module20">
				<h2 class="tab"><?php echo _ZOOM_UPLOAD_MULTIPLE;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module20" ) );
					//-->
				</script>
				<?php
				include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/upl_multiple.php');				
				?>
			</div>
			<div class="tab-page" id="module21">
				<h2 class="tab"><?php echo _ZOOM_UPLOAD_DRAGNDROP;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module21" ) );
					//-->
				</script>
				<?php
				include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/upl_dragndrop.php');
				?>
			</div>
			<div class="tab-page" id="module22" align="center">
				<h2 class="tab"><?php echo _ZOOM_UPLOAD_SCANDIR;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module22" ) );
					//-->
				</script>
				<?php
				include_once($mosConfig_absolute_path.'/components/com_zoom/www/admin/upl_scan.php');
				?>
			</div>
		</div>
</tr>
<tr>
	<td height="10">&nbsp;</td>
</tr>
</table>
<script language="javascript" type="text/javascript">
<!--
<?php
// switch between single file and multiple files form.
switch ($formtype){
	case 'single':
		echo "tabPane1.setSelectedIndex(0);\n";
		break;
	case 'multiple':
		echo "tabPane1.setSelectedIndex(1);\n";
		break;
	case 'dragndrop':
		echo "tabPane1.setSelectedIndex(2);\n";
		break;
	case 'scan':
		echo "tabPane1.setSelectedIndex(3);\n";
		break;
	default:
		echo "tabPane1.setSelectedIndex(0);\n";
		break;
}
?>
//-->
</script>