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
| Filename: catsmgr.php                                               |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$task = mosGetParam($_REQUEST,'task');
$altid = mosGetParam($_REQUEST,'altid');
if ($task == 'edit') {
    $catid = mosGetParam($_REQUEST,'catid');
    if ($catid) {
        if(is_array($catid))
          $catid = $catid[0];
        $zoom->setGallery($catid);
        include($mosConfig_absolute_path.'/components/com_zoom/www/admin/editcat.php');
    } else {
		//Back to new gallery page
		mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr", _ZOOM_ALERT_NOCAT);
	}
} elseif ($task == 'delete') {
	$zoom->createProgressScript($task);
	$catid = mosGetParam($_REQUEST,'catid');
	if ($catid) {
		foreach ($catid as $cid) {
			//Fetch directoryname
			$database->setQuery("SELECT catname, catdir FROM #__zoom WHERE catid=".$cid);
			$result = $database->query();
			$row = mysql_fetch_object($result);
			$dir = $row->catdir;
			$gallery = $row->catname;
			$dir = $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$dir;
			if($zoom->platform->is_dir($dir)){
				//Delete comments from database
				$database->setQuery("SELECT * FROM #__zoomfiles WHERE catid=".$cid);
				$result1 = $database->query();
				while ($row1 = mysql_fetch_object($result1)) {
					$database->setQuery("DELETE FROM #__zoom_comments WHERE imgid=".$row1->imgid);
					$database->query();
				}
				//Delete files from database
				$database->setQuery("DELETE FROM #__zoomfiles WHERE catid=".$cid);
				$database->query();
				//Finally, delete category from database
				$database->setQuery("DELETE FROM #__zoom WHERE catid=".$cid);
				$database->query();
				//Empty and delete directory
				$zoom->deldir($dir);
			}
		}
		mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr", _ZOOM_ALERT_DEL);
	} else {
	    mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr", _ZOOM_ALERT_NOCAT);
	}
} elseif ($task == 'publish' && $altid != 0) {
	//implementation here...
	$zoom->setGallery($altid, true);
	if ($zoom->_gallery->isPublished()) {
		$zoom->_gallery->unPublish();
	} else {
		$zoom->_gallery->publish();
	}
	mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr", _ZOOM_ALERT_EDITOK);
} elseif ($task == 'share' && $altid != 0) {
	//implementation here...
	$zoom->setGallery($altid, true);
	if ($zoom->_gallery->isShared()) {
		$zoom->_gallery->unShare();
	} else {
		$zoom->_gallery->share();
	}
	mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr", _ZOOM_ALERT_EDITOK);
} else {
	// show list of categories...
	$zoom->createCheckAllScript();
	?>
	<script language="Javasript" type="text/javascript">
      <!--
      function submitForm(theTask, catid){
        document.catsmgr.elements['task'].value = theTask;
        if( catid > 0 ){
        	document.catsmgr.elements['altid'].value = catid;
        }
        document.catsmgr.submit();
        return false;
      }
      //-->
    </script>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td align="center" width="100%"><a href="<?php echo "index".$backend.".php?option=com_zoom&page=admin&Itemid=".$Itemid;?>">
		<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?echo _ZOOM_MAINSCREEN;?>" border="0">&nbsp;&nbsp;<?echo _ZOOM_MAINSCREEN;?></a>
		</td>
	</tr>
	<tr>
		<td align="left"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/catsmgr_f2.png" border="0" alt="<?php echo _ZOOM_CATSMGR;?>">&nbsp;<b><font size="4"><?php echo _ZOOM_CATSMGR;?></font></b></td>
	</tr>
	</table>
	<br />
	<center>
	<table width="95%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right">
			<div align="right">
			<?php if($zoom->_isAdmin || $zoom->privileges->hasPrivilege('priv_creategal')){ ?>
			  <a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=new";?>" onmouseover="return overlib('<?php echo _ZOOM_NEW;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/new.png" border="0" onmouseover="MM_swapImage('new','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/new_f2.png',1);" onmouseout="MM_swapImgRestore();" name="new"></a>
			<?php } ?>
			<?php if($zoom->_isAdmin || $zoom->privileges->hasPrivilege('priv_editgal')){ ?>
              <a href="javascript:submitForm('edit');" onmouseover="return overlib('<?php  echo _ZOOM_EDIT;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/edit.png" border="0" onmouseover="MM_swapImage('edit','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/edit_f2.png',1);" onmouseout="MM_swapImgRestore();" name="edit"></a>
            <?php } if($zoom->_isAdmin || $zoom->privileges->hasPrivilege('priv_delgal')){ ?>
              <a href="javascript:submitForm('delete');" onmouseover="return overlib('<?php echo _ZOOM_DEL;?>');" onmouseout="return nd();" onClick="return confirm('<?php echo _ZOOM_CONFIRM_DEL;?>');"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/delete.png" border="0" onmouseover="MM_swapImage('delete','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/delete_f2.png',1);" onmouseout="MM_swapImgRestore();" name="delete"></a>
            <?php } ?>
            </div>
		</td>
	</tr>
	</table>
	<form  name="catsmgr" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php?option=com_zoom&Itemid=<?php echo $Itemid;?>&page=catsmgr" method="POST">
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="altid" value="0" />
	<?php echo $zoom->createCatMgrFormbody(); ?>
	</form>
	</center>
	<?php
}
?>