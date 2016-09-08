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
| Filename: update.php                                                |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$submit = mosGetParam($_REQUEST,'submit');
require($mosConfig_absolute_path.'/components/com_zoom/lib/update.class.php');

if($submit){
	?>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center" width="100%"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
		<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?echo _ZOOM_MAINSCREEN;?></a>
		</td>
	</tr>
	<?php
	// Check that the zlib is available
	if(!extension_loaded('zlib')){
		echo "<font color=\"red\">The installer can't continue before zlib is installed<br />Updater - Error</font>";
		exit();
	}
	if(!isset($userfile) || $userfile == ""){
		echo "<font color=\"red\">No file selected<br />'Updater -  error'</font>";
		exit();
	}
	$msg = "";
	$base_Dir = "$mosConfig_absolute_path/media/";
	if(move_uploaded_file($userfile, $base_Dir . $userfile_name) && chmod($base_Dir . $userfile_name, 0777)){
		$updater = new zoomUpdaterComponent($userfile_name);
		if($updater->install() === false){
			echo "<font color=\"red\">".$updater->getError()."<br />Updater -  error</font>";
			if(file_exists($updater->unpackDir()))
			{
				echo $updater->unpackDir();
				$zoom->deldir($updater->unpackDir());
				$zoom->platform->unlink($mosConfig_absolute_path . "/media/$userfile_name");
			}
			exit();
		}else{
			echo "<font color=\"green\">".$updater->getError(false)."<br />Updater -  Success</font>";
			if(file_exists($updater->unpackDir()))
			{
				$zoom->deldir($updater->unpackDir());
				$zoom->platform->unlink($mosConfig_absolute_path . "/media/$userfile_name");
			}
		}
	}else{
		echo "<font color=\"red\">".$msg." Ensure that all directories have the required permissions.<br />Updater -  error</font>";
	}
	echo "<br />";
}else{
?>
<form enctype="multipart/form-data" name="selection" method="post" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=update">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center" width="100%"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
	<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?echo _ZOOM_MAINSCREEN;?></a>
	</td>
</tr>
<tr>
	<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/update_f2.png" border="0" alt="<?php echo _ZOOM_UPDATE;?>">&nbsp;<b><font size="4"><?php echo _ZOOM_UPDATE;?></font></b></td>
</tr>
<tr>
	<td height="10">&nbsp;</td>
</tr>
<tr>
	<td align="center">
		<?php
		if ($zoom->platform->is_file("$mosConfig_absolute_path/components/com_zoom/etc/update.xml")) {
			// XML library
    		require_once( "$mosConfig_absolute_path/components/com_zoom/lib/minixml/minixml.inc.php" );
    		$xmlDoc = new MiniXMLDoc();
    		$xmlDoc->fromFile("$mosConfig_absolute_path/components/com_zoom/etc/update.xml");
    		$iszoomupdate = & $xmlDoc->getElementByPath('zoomupdate');
    		if($iszoomupdate){
    			$date =& $xmlDoc->getElementByPath('zoomupdate/creationDate');
    			echo "<p>"._ZOOM_UPDATE_XMLDATE.": <font color=\"red\">" . $date->getValue() . "</font></p><br />";
    		}
		} else {
		    echo "<p>"._ZOOM_UPDATE_XMLDATE.": <font color=\"red\">"._ZOOM_UPDATE_NOUPDATES."</font></p><br />";
		}
		?>
	</td>
</tr>

<tr>
	<td align="center">
		<?php echo _ZOOM_UPDATE_PACKAGE;?>
		<input class="inputbox" type="file" name="userfile" size="30">
	</td>
</tr>
<tr>
	<td align="center">
		<br /><br />
		<input class="button" type="submit" name="submit" value="<?php echo _ZOOM_BUTTON_UPLOAD;?>">
	</td>
</tr>
</table>
</form>
<?php
}
?>