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
| Filename: editcat.php                                               |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$theButton = mosGetParam($_REQUEST, 'theButton');
if( $theButton == 'save' ){
    if (get_magic_quotes_gpc()) {
    	$newname = mosGetParam($_REQUEST,'newname');
    	$newdescr = mosGetParam($_REQUEST,'newdescr', null, _MOS_ALLOWHTML);
    	$catpass = mosGetParam($_REQUEST,'catpass');
    	$keywords = mosGetParam($_REQUEST,'keywords');
    } else {
        $newname = mosGetParam($_REQUEST,'newname');
    	$newdescr = mosGetParam($_REQUEST,'newdescr', null, _MOS_ALLOWHTML);
    	$catpass = mosGetParam($_REQUEST,'catpass');
    	$keywords = mosGetParam($_REQUEST,'keywords');
    }
	$parent = mosGetParam($_REQUEST,'parent');
	$hidemsg = mosGetParam($_REQUEST,'hidemsg');
	$shared = mosGetParam($_REQUEST,'shared');
	$published = mosGetParam($_REQUEST,'published');
	$selections = mosGetParam($_REQUEST,'selections');
	if (isset($newname)){
		//Save changes
		$database->setQuery("SELECT pos FROM #__zoom WHERE catid=$parent");
		$result1 = $database->query();
		$row = mysql_fetch_object($result1);
		$pos = $row->pos;
		if($parent==0){
			$pos = 0;
		}else{
			$pos++;
		}
		if(!isset($hidemsg)){
			$hidemsg = 0;
		}
		if($catpass != "" || !empty($catpass)){
			$catpass = md5($catpass);
		}else{
			$catpass = "";
		}
	    if(empty($selections))
	        $selections = 1;
	    else
	        $selections = implode(',', $selections);
	    // replace space-character with 'air'...or nothing!
	    $keywords = trim(ereg_replace(" ", "", $keywords));
		$database->setQuery("UPDATE #__zoom SET catname='".mysql_escape_string($newname)."', catdescr='".mysql_escape_string($newdescr)."', catpassword='".mysql_escape_string($catpass)."', catkeywords='".mysql_escape_string($keywords)."', subcat_id='$parent', pos='$pos', hideMsg='$hidemsg', shared = '$shared', published='$published', catmembers='$selections' WHERE catid=".mysql_escape_string($catid));
		$database->query();
		//Unpublish/ publish the images of a gallery too...
		//Check if there are ANY images in the gallery...
		$database->setQuery("SELECT imgid FROM #__zoomfiles WHERE catid=$catid");
		$result = $database->query();
		if(mysql_num_rows($result) != 0){
			while($row = mysql_fetch_object($result)){
				if($published == 0)
					$database->setQuery("UPDATE #__zoomfiles SET published = 0 WHERE imgid = ".$row->imgid);
				else
					$database->setQuery("UPDATE #__zoomfiles SET published = 1 WHERE imgid = ".$row->imgid);
				$database->query();
			}
		}
		mosRedirect("index".$backend.".php?option=com_zoom&page=$page&task=$task&catid=$catid&Itemid=$Itemid", _ZOOM_ALERT_EDITOK);
	}
}
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
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			window.history.go(-1);
			return;
		}
		// do field validation
		if (form.newname.value == "") {
			alert ( "<?php echo _E_WARNTITLE; ?>" );
		} else {
			<?php getEditorContents( 'zOOmEditor2', 'newdescr' ) ; ?>
			submitform(pressbutton);
		}
	}
</script>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center" width="100%">
			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?echo _ZOOM_MAINSCREEN;?>
			</a>&nbsp; | &nbsp;
			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr";?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/back.png" alt="<?echo _ZOOM_BACK;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_BACK;?>
			</a>
		</td>
	</tr>
	<tr>
		<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/edit_f2.png" border="0" alt="<?php echo _ZOOM_EDIT;?>">&nbsp;<b><font size="4"><?php echo _ZOOM_EDIT;?></font></b></td>
	</tr>
</table>
<br />
<center>
<table cellspacing="0" cellpadding="4" border="0" width="100%">
<tr>
     <td width="85%" class="tabpadding" align="center">
     	<button onclick="submitbutton('save');" onmouseout="MM_swapImgRestore();return nd();"  onmouseover="MM_swapImage('save','','images/save_f2.png',1);return overlib('<?php echo _ZOOM_SAVE;?>');" class="button"><img src="images/save.png" alt="" border="0" name="save" /></button>
     	<button onclick="submitbutton('cancel');" onmouseout="MM_swapImgRestore();return nd();"  onmouseover="MM_swapImage('cancel','','images/cancel_f2.png',1);return overlib('<?php echo _CMN_CANCEL;?>');" class="button"><img src="images/cancel.png" alt="" border="0" name="cancel" /></button>
     </td>
</tr>
</table>
<form name="adminForm" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php" method="POST">
<link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.css" />
<script language="javascript" type="text/javascript" src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.js"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/dhtml.js"></script>
<table cellspacing="0" cellpadding="4" border="0" width="100%">
<tr>
	<td align="left" valign="top">
		<table border="0" width="100%">
		<tr>
			<td><?php echo _ZOOM_HD_AFTER;?>: </td>
			<td>
			<?php echo $zoom->createCatDropdown('parent','<option value="0" selected>> '._ZOOM_TOPLEVEL.'</option>\n', 0, $zoom->_gallery->_subcat_id, $zoom->_gallery->_id);?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ZOOM_HD_NAME;?>:</td>
			<td>
				<input class="inputbox" type="text" name="newname" value="<?php echo $zoom->_gallery->_name; ?>" size="50">
			</td>
		</tr>
		<tr>
	    	<td><?php echo _ZOOM_PASS;?>:</td>
	    	<td>
	    		<input class="inputbox" type="password" name="catpass" value="" onClick="javascript:this.form.catpass.focus();this.form.catpass.select();" size="50">
	    	</td>
	  	</tr>
	    <tr>
	        <td><?php echo _ZOOM_KEYWORDS;?>: </td>
	        <td valign="center">
	        	<input type="text" name="keywords" size="50" value="<?php echo $zoom->_gallery->_keywords;?>" class="inputbox">
	        </td>
	    </tr>
		<tr>
			<td><?php echo _ZOOM_DESCRIPTION;?>:</td>
			<td>
				<?php
				// parameters : areaname, content, hidden field, width, height, rows, cols
				editorArea( 'zOOmEditor2', $zoom->_gallery->_descr, 'newdescr', '500', '200', '45', '5' ) ; ?>
			</td>
		</tr>
		</table>
	</td>
<?php
if (!$zoom->_isBackend) {
	echo "\t</tr><tr>";
}
?>
	<td align="left" valign="top">
		<div class="tab-page" id="modules-cpanel">
			<script language="javascript" type="text/javascript">
				<!--
				var tabPane1 = new WebFXTabPane( document.getElementById( "modules-cpanel" ), 0 )
				//-->
			</script>
			<input type="hidden" name="formsubmit" value="submit">
	    	<div class="tab-page" id="module19">
				<h2 class="tab"><?php echo _ZOOM_ITEMEDIT_TAB1;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module19" ) );
					//-->
				</script>
				<table border="0" width="300" cellpadding="4">
				<tr>
					<td><?php echo _ZOOM_HD_HIDEMSG;?>:</td>
					<td>
						<input type="checkbox" name="hidemsg" value="1"<?php echo ($zoom->_gallery->_hideMsg) ? " checked" : "";?>>
					</td>
				</tr>
			    <tr>
			        <td>
						<?php echo _ZOOM_PUBLISHED;?>:
					</td>
					<td>
						<input type="checkbox" name="published" value="1"<?php if($zoom->_gallery->isPublished()) echo " checked";?>>
					</td>
			    </tr>
			    <tr>
			    	<td>
			    		<?php echo _ZOOM_HD_SHARE;?>:
			    	</td>
			    	<td>
			    		<input type="checkbox" name="shared" value="1"<?php if($zoom->_gallery->isShared()) echo " checked";?>>
			    	</td>
			    </td>
			    </table>
		    </div>
		    <div class="tab-page" id="module20">
				<h2 class="tab"><?php echo _ZOOM_ITEMEDIT_TAB2;?></h2>
				<script language="javascript" type="text/javascript">
					<!--
					tabPane1.addTabPage( document.getElementById( "module20" ) );
					//-->
				</script>
			    <table border="0" width="300" cellpadding="4">
			    <tr>
			        <td>
				    <?php
				    $userlist = $zoom->getUsersList($zoom->_gallery->_members);
				    foreach($userlist as $item){
				        echo $item."\n";
				    }
				    ?>
				    </td>
			    </tr>
			    </table>
		    </div>
	    </div>
	</td>
</tr>
</table>
<input type="hidden" name="catid" value="<?php echo $zoom->_gallery->_id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
<input type="hidden" name="page" value="<?php echo $page; ?>" />
<input type="hidden" name="task" value="<?php echo $task; ?>" />
<input type="hidden" name="theButton" value="" />
</form><br />