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
| Filename: new.php                                                   |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// retrieve all variables from the form...
$theButton = mosGetParam($_REQUEST, 'theButton');
if ( $theButton == 'save' ){
	$catname = $zoom->cleanString(mosGetParam($_REQUEST,'catname'));
	$catdir = mosGetParam($_REQUEST, 'catdir');
	$parent = mosGetParam($_REQUEST,'parent');
	$hidemsg = mosGetParam($_REQUEST,'hidemsg');
	$catdescr = $zoom->cleanString(mosGetParam($_REQUEST,'catdescr', null, _MOS_ALLOWHTML));
	$catpass = mosGetParam($_REQUEST,'catpass');
	$keywords = $zoom->cleanString(mosGetParam($_REQUEST,'keywords'));
	$shared = mosGetParam($_REQUEST,'shared');
	$published = mosGetParam($_REQUEST,'published');
	$selections = mosGetParam($_REQUEST,'selections');
	if (trim($catname)){
		//Create directory
		$zoom->checkDuplicate($catdir, 'directory');
		$mkdir = $zoom->_tempname;
        $html_file = "<html><body bgcolor=\"#FFFFFF\"></body></html>";
		if ($zoom->createdir($zoom->_CONFIG['imagepath'].$mkdir, 0777)){
			$zoom->createdir($zoom->_CONFIG['imagepath'].$mkdir."/thumbs", 0777);
			$zoom->createdir($zoom->_CONFIG['imagepath'].$mkdir."/viewsize", 0777);
            $zoom->writefile($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$mkdir."/index.html", $html_file);
            $zoom->writefile($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$mkdir."/thumbs/index.html", $html_file);
            $zoom->writefile($mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$mkdir."/viewsize/index.html", $html_file);
			//Save data in the database
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
				//hash the password with md5 encryption...
				$catpass = md5($catpass);
			}else{
				$catpass = "";
			}
			$uid = $zoom->_CurrUID;
            if(empty($selections))
                $selections = 1;
            else
                $selections = implode(',', $selections);
            // replace space-character with 'air'...or nothing!
            $keywords = ereg_replace(" ", "", $keywords);
			$database->setQuery("INSERT INTO #__zoom (catname,catdescr,catdir,catpassword,catkeywords,subcat_id,pos,hideMsg,shared,published,uid,catmembers) VALUES ('".mysql_escape_string($catname)."','".mysql_escape_string($catdescr)."','".mysql_escape_string($mkdir)."','".mysql_escape_string($catpass)."','".mysql_escape_string($keywords)."','$parent','$pos', '$hidemsg','$shared','$published','$uid','$selections')");
			$database->query();
			mosRedirect("index".$backend.".php?option=com_zoom&page=catsmgr&Itemid=".$Itemid, _ZOOM_ALERT_NEWGALLERY);
		}else{
			mosRedirect("index".$backend.".php?option=com_zoom&page=catsmgr&Itemid=".$Itemid, "Error creating directory!");
		}
	}else{
		//Back to new gallery page
		mosRedirect("index".$backend.".php?option=com_zoom&page=new&Itemid=".$Itemid, _ZOOM_NONAME);
	}
}else{
	//Show form
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
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.catname.value == "") {
				alert ( "<?php echo _E_WARNTITLE; ?>" );
			} else {
				<?php getEditorContents( 'zOOmEditor1', 'catdescr' ) ; ?>
				submitform(pressbutton);
			}
		}
	</script>
	<center>
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td align="center" width="100%">
			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin";?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_MAINSCREEN;?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_MAINSCREEN;?>
			</a>&nbsp; | &nbsp;
			<a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr";?>">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/back.png" alt="<?echo _ZOOM_BACK;?>" border="0" />&nbsp;&nbsp;<?php echo _ZOOM_BACK;?>
			</a>
			</td>
		</tr>
		<tr>
			<td align="left">
				<img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/new_f2.png" border="0" alt="<?php echo _ZOOM_HD_NEW;?>">
				&nbsp;<b><font size="4"><?php echo _ZOOM_HD_NEW;?></font></b>
			</td>
		</tr>
	</table>
	<br />
     <table cellspacing="0" cellpadding="4" border="0" width="100%">
     <tr>
         <td width="85%" class="tabpadding" align="center">
         	<button onclick="submitbutton('save');" onmouseout="MM_swapImgRestore();return nd();" onmouseover="MM_swapImage('save','','images/save_f2.png',1);return overlib('<?php echo _ZOOM_SAVE;?>');" class="button">
         		<img src="images/save.png" alt="<?php echo _ZOOM_BUTTON_CREATE;?>" border="0" name="save" />
         	</button>
	        <button onclick="submitbutton('cancel');" onmouseout="MM_swapImgRestore();return nd();" onmouseover="MM_swapImage('cancel','','images/cancel_f2.png',1);return overlib('<?php echo _ZOOM_RESET;?>');" class="button">
	        	<img src="images/cancel.png" alt="" border="0" name="cancel" />
	        </button>
         </td>
     </tr>
     </table>
	<form method="post" name="adminForm" action="index<?php echo ($zoom->_isBackend) ? "2" : "";?>.php">
	<link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.css" />
	<script language="javascript" type="text/javascript" src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/tabs/tabpane.js"></script>
	<table cellspacing="0" cellpadding="4" border="0" width="100%">
	<tr>
		<td align="left" valign="top">
			<table border="0" width="100%">
			<tr>
				<td><?php echo _ZOOM_HD_AFTER;?>: </td>
				<td>
				<?php echo $zoom->createCatDropdown('parent','<option value="0" selected>> '._ZOOM_TOPLEVEL.'</option>\n', 0, 0);?>
				</td>
			</tr>
			<tr>
				<td><?php echo _ZOOM_HD_NAME;?>:</td>
				<td>
					<input class="inputbox" type="text" name="catname" value="<?php echo $zoom->_CONFIG['tempName']; ?>" size="50">
				</td>
			</tr>
			<tr>
				<td><?php echo _ZOOM_HD_DIR;?>:</td>
				<td>
					<input class="inputbox" type="text" name="catdir" value="<?php echo $zoom->newdir();?>" size="50">
				</td>
			</tr>
			<tr>
		    	<td><?php echo _ZOOM_PASS;?>:</td>
		    	<td>
		    		<input class="inputbox" type="password" name="catpass" value="" size="50">
		    	</td>
		  	</tr>
		    <tr>
		        <td><?php echo _ZOOM_KEYWORDS;?>: </td>
		        <td valign="center">
		        	<input type="text" name="keywords" size="50" value="" class="inputbox">
		        </td>
		    </tr>
			<tr>
				<td><?php echo _ZOOM_DESCRIPTION;?>:</td>
				<td>
					<?php
					// parameters : areaname, content, hidden field, width, height, rows, cols
					editorArea( 'zOOmEditor1',  $zoom->_CONFIG['tempDescr'], 'catdescr', '500', '200', '45', '5' ) ; ?>
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
							<input type="checkbox" name="hidemsg" value="1">
						</td>
					</tr>
				    <tr>
				        <td>
							<?php echo _ZOOM_PUBLISHED;?>:
						</td>
						<td>
							<input type="checkbox" name="published" value="1" checked>
						</td>
				    </tr>
				    <tr>
				    	<td>
				    		<?php echo _ZOOM_HD_SHARE;?>:
				    	</td>
				    	<td>
				    		<input type="checkbox" name="shared" value="1">
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
				        $userlist = $zoom->getUsersList();
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
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
	<input type="hidden" name="page" value="<?php echo $page; ?>" />
	<input type="hidden" name="theButton" value="" />
	</form>
    </center><br />
	<?
}
?>