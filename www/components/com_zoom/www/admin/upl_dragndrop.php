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
| Filename: upl_dragndrop.php                                         |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
if (!isset($catid)){
	echo "<p align=\"center\"><h3>"._ZOOM_INFO_CHECKCAT."</h3></p>";
}
$zoom->createFormControlScript("JUploadForm");
?>
<form name="choose_cat" method="post" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=upload&formtype=dragndrop">
    <div align="center">
	<?php
		echo "<p>"._ZOOM_FORM_INGALLERY.": \n";
		echo $zoom->createCatDropdown('catid', '<OPTION value="">---&nbsp;'._ZOOM_PICK.'&nbsp;---</OPTION>', 1, $catid).'</p>';
	?>
	</div>
</form>
 <applet 
  code="JUpload/startup.class"
  archive="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/admin/JUpload.jar"
  width="600"
  height="300"
  name="JUpload"
  mayscript="mayscript"
  alt="JUpload applet">

 <!-- Java Plug-In Options -->
 <param name="progressbar" value="true">
 <param name="boxmessage" value="Loading JUpload Applet ...">
 <param name="boxbgcolor" value="#c0c0c0">

 <!-- Target links -->
 <param name="actionURL" value="<?php echo ($zoom->_isBackend) ? "../" : $mosConfig_live_site."/";?>components/com_zoom/www/admin/save_dnd.php?catid=<?php echo $catid; ?>&dnd_uid=<?php echo $my->id; ?>">
 <param name="imageURL" value="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/zoom_dragndrop.gif">

 <!-- Colors -->
 <param name="backgroundColor" value="#c0c0c0">
 <param name="mainSplitpaneLocation" value="320">

 <!-- Switches -->
 <param name="checkResponse" value="true">
 <param name="showSuccessDialog" value="true">
 <param name="hideShowAll" value="true"> 
 <param name="showPicturePreview" value="true">
 <param name="addWindowTitle" value="<?php echo _ZOOM_ADD;?>">
 <param name="customFileFilter" value="true">
 <param name="customFileFilterDescription" value="<?php echo _ZOOM_FORM_IMAGEFILTER;?>">
 <param name="customFileFilterExtensions" value="<?php echo $zoom->acceptableFormatCommaSep();?>">
 <param name="includeFormFields" value="catid,dnd_uid,dnd_name,dnd_setFilename,dnd_keywords,dnd_descr,dnd_mospath">
 <param name="labelAdd" value="<?php echo _ZOOM_BUTTON_ADDIMAGES;?>">
 <param name="labelRemove" value="<?php echo _ZOOM_BUTTON_REMIMAGES;?>">
 <param name="labelUpload" value="<?php echo _ZOOM_BUTTON_UPLOAD;?>">
 <param name="checkJavaVersion" value="true">
 <param name="checkJavaVersionGotoURL" value="http://java.sun.com/j2se/downloads.html">
 Your browser does not support applets, or you disabled applets in your Internet-options.
 To use this applet, please install the newest version of Sun's java. You can get it from <a href="http://www.java.com/">java.com</a>

 </applet>
 <form name="JUploadForm">
    <table border="0" cellpadding="0" cellspacing="0">
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><font color="red"><?php echo _ZOOM_A_MESS_NOJAVA; ?></font>
		</td>
	</tr>	
	<tr><td colspan="2">&nbsp;</td></tr>	
	<tr>
		<td><?php echo _ZOOM_NAME; ?>:&nbsp;</td>
		<td>
			<input type="text" name="dnd_name" size="50" value="<?php echo $zoom->_CONFIG['tempName'];?>" class="inputbox">
		</td>
	</tr>	
	<tr><td colspan="2">&nbsp;</td></tr>	
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="checkbox" name="dnd_setFilename" value="1"<?php if($zoom->_CONFIG['autonumber']) echo " checked"; ?> />
			<?php echo _ZOOM_FORM_SETFILENAME; ?>
		</td>
	</tr>	
	<tr><td colspan="2">&nbsp;</td></tr>	
	<tr>
		<td valign="center"><?php echo _ZOOM_KEYWORDS; ?>:&nbsp;</td>
		<td valign="center">
			<input type="text" name="dnd_keywords" size="50" value="" class="inputbox" />
		</td>
	</tr>	
	<tr><td colspan="2">&nbsp;</td></tr>	
	<tr>
		<td><?php echo _ZOOM_DESCRIPTION;?>:&nbsp;</td>
    	<td>
        	<textarea class="inputbox" cols="50" rows="5" name="dnd_descr"><?php echo $zoom->_CONFIG['tempDescr']; ?></textarea>
        	<input type="hidden" name="dnd_mospath" value="<?php echo $mosConfig_absolute_path; ?>" />
    	</td>
	</tr>
    </table>
</form>