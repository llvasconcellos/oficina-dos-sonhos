<?php
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_heximage {
	function showheximage_admin() {
?>
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%">
        <img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;">
        <font style="color: #FF9E31;font-size : 18px;font-weight: bold;text-align: left;"><br>
        HeXimage photo gallery component for Mambo/Joomla! </font></td>
    </tr>
    <tr>
      <td><p>&nbsp;</p>        <table width="450" border="0" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle" bgcolor="#FFFFFF">
    <td><a href="index2.php?option=com_heximage&task=config"><img src="components/com_heximage/images/configuration.jpg" width="118" height="89" border="0"></a></td>
    <td><a href="index2.php?option=com_heximage&task=album"><img src="components/com_heximage/images/albums.jpg" width="118" height="89" border="0"></a></td>
    <td><a href="index2.php?option=com_heximage&task=upload_thumb"><img src="components/com_heximage/images/uploadthumbs.jpg" width="118" height="89" border="0"></a></td>
  </tr>
  <tr align="center" valign="middle" bgcolor="#FFFFFF">
    <td><a href="index2.php?option=com_heximage&task=photo"><img src="components/com_heximage/images/photos.jpg" width="118" height="89" border="0"></a></td>
    <td><a href="index2.php?option=com_heximage&task=database"><img src="components/com_heximage/images/database.jpg" width="118" height="89" border="0"></a></td>
    <td><a href="index2.php?option=com_heximage&task=about"><img src="components/com_heximage/images/about.jpg" width="118" height="89" border="0"></a></td>
  </tr>
</table>

        <p>&nbsp;</p></td>
    </tr>
    </table>
<?	 }
function editheximage_photoupload( &$row, $option, $rowA, $url, $currwidth, $currheight ) {
		mosMakeHtmlSafe( $row, ENT_QUOTES ); ?>
		
	<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == "cancelbutton") {
				submitform( pressbutton );
				return;
			}
			
			// do field validation
			if (form.album_type.value == '') {
				alert( "Please select an album." );
			} else {
				submitform( pressbutton );
			}
		}
	</script>

	<form action="index2.php" method="post" name="adminForm" id="adminForm" class="adminForm">
		<table width="100%" border="0" cellpadding="3" cellspacing="0">
			<tr align="left" valign="top">
			  <td colspan="3" class="sectionname">			  <?php echo _HeXimage_AdEdit_photo ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_PeN ;?></td>
			  <td><input class="inputbox" type="text" size="50" maxlength="100" name="url" value="<?php echo $url; ?>" /></td>
			  <td><?php echo _HeXimage_Pname ;?></td>
		  </tr>
			<tr align="left" valign="top">
				<td><?php echo _HeXimage_TeN ;?></td>
				<td><input class="inputbox" type="text" size="50" maxlength="100" name="thumb" value="<?php echo $url; ?>" /></td>
			    <td><?php echo _HeXimage_Tname ;?></td>
			</tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Photo_Description ;?></td>
			  <td><textarea name="description" cols="50" class="inputbox"><?php echo $row->description; ?></textarea></td>
		      <td><?php echo _HeXimage_DoTi ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Album_Name ;?></td>
			  <td><select name="album_type">
          <option value="" <?php if (!(strcmp("", $row->album_type))) {echo "SELECTED";} ?>>---&nbsp;<?php echo _HeXimage_Choose_Album ;?>&nbsp;---</option>
          <?php
		  foreach ($rowA as $rowB)
		  	{
               ?>
          <option value="<?php echo $rowB->album_name ?>"<?php if (!(strcmp($rowB->album_name, $row->album_type))) {echo "SELECTED";} ?>><?php echo $rowB->album_name;?></option>
          <?php
               }
            ?>
        </select></td>
		      <td><?php echo _HeXimage_AlbumType;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Hw;?></td>
			  <td><input class="inputbox" type="text" size="5" maxlength="5" name="hsize" value="<?php echo $currwidth; ?>" /></td>
		      <td><?php echo _HeXimage_HsiZe ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Vw;?></td>
			  <td><input class="inputbox" type="text" size="5" maxlength="5" name="vsize" value="<?php echo $currheight; ?>" /></td>
		      <td><?php echo _HeXimage_VsiZe ;?></td>
	  </table>

		<input type="hidden" name="photoid" value="<?php echo $row->photoid; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
	</form>			
<?php }
	function showheximage_album( &$rows, $pageNav, $option ) {
?>
	<form action="index2.php" method="post" name="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
			<td width="100%" class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br><?php echo _HeXimage_Album_manager; ?></span></td>
			<td nowrap></td>
			<td> <?php //echo $pageNav->writeLimitBox(); ?> </td>
		</tr>
	</table>

	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
		<tr>
			<th width="20" align="center">#</th>
			<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" /></th>
			<th align="left"><?php echo _HeXimage_Album_Name ;?></th>
			<th align="left"><?php echo _HeXimage_Album_Descripion ;?></th>
			<th align="left">&nbsp;</th>
			<th align="left">&nbsp;</th>
			<th align="left">&nbsp;</th>
			<th align="left">&nbsp;</th>
			<th align="left">&nbsp;</th>
			<th align="left">&nbsp;</th>
			<th width="10%" align="center"><?php echo _HeXimage_Album_Published ;?></th>
		</tr>
<?php
		$k = 0;
		for($i=0; $i < count( $rows ); $i++) {
			$row = $rows[$i];
			$img = $row->published ? 'tick.png' : 'publish_x.png';
			$task = $row->published ? 'unpublish_album' : 'publish_album';
?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center"><?php echo $i+$pageNav->limitstart+1;?></td>
			<td><input type="checkbox" id="cb<?php echo $i;?>" name="albumid[]" value="<?php echo $row->albumid; ?>" onclick="isChecked(this.checked);" /></td>
			<td align="left"><a href="#edit_album" onclick="return listItemTask('cb<?php echo $i;?>','edit_album')"><?php echo $row->album_name; ?></a></td>
			<td align="left"><?php echo $row->album_description; ?></td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td width="10%" align="center"><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" border="0" alt="" /></a></td>
		</tr>
<?php
			$k = 1 - $k;
		}
?>
		<tr>
			<th align="center" colspan="19"> <?php //echo $pageNav->writePagesLinks(); ?></th>
		</tr>
		<tr>
			<td align="center" colspan="19"> <?php  //echo $pageNav->writePagesCounter(); ?></td>
		</tr>
	</table>
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	</form>
<?php
	}
	
	function editheximage_album( &$row, $option ) {
		mosMakeHtmlSafe( $row, ENT_QUOTES );
?>
	<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == "cancel") {
				submitform( pressbutton );
				return;
			}
			
			// do field validation
			if (form.album_name.value == '') {
				alert( "Please fill in Album name." );
			} else {
				submitform( pressbutton );
			}
		}
	</script>

	<form action="index2.php" method="post" name="adminForm" id="adminForm" class="adminForm">
		<table width="100%" border="0" cellpadding="3" cellspacing="0">
			<tr>
			  <td colspan="2" align="left" valign="top" class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br>
			  <?php echo _HeXimage_AdEdit_Album ;?></td>
		  </tr>
			<tr>
				<td width="10%" align="left" valign="top"><?php echo _HeXimage_Album_Name ;?></td>
				<td><input class="inputbox" type="text" size="50" maxlength="100" name="album_name" value="<?php echo $row->album_name; ?>" /></td>
			</tr>
			<tr>
			  <td align="left" valign="top"><?php echo _HeXimage_Album_Descripion ;?></td>
			  <td><textarea name="album_description" cols="50" class="inputbox"><?php echo $row->album_description; ?></textarea></td>
		  </tr>			
	  </table>

		<input type="hidden" name="albumid" value="<?php echo $row->albumid; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
	</form>
	
<?php 
	}
function showAbout() {
?>
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%">
        <img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;">
        <font style="color: #FF9E31;font-size : 18px;font-weight: bold;text-align: left;"><br>
        HeXimage photo gallery component for Mambo/Joomla! </font></td>
    </tr>
    <tr>
      <td>        <p><b>Program</b><br>
        HeXimage 2.0.x is my second release of the photo gallery script. This time many new features are added, such as watermarking<br />the images with transparant logo, fast thumb loading
        feature, an automatic language support and the whole script is fully<br />customizable
        for Mambo/Joomla! Also the bugfixes from version 1.0.b are solved.
        <br><br />
          If you have any wishes or have found a bug, please contact the author by
          mail: <a href="mailto:info@hexa-design.com">info@hexa-design.com</a><br>
          <br>
          E-mail: <a href="mailto:info@hexa-design.com">info@hexa-design.com</a><br>
          Website: <a href="http://www.hexa-design.com" target="_blank">www.hexa-design.com</a> or <a href="http://project.hexa-design.com" target="_blank">project.hexa-design.com</a> <br>
          Forum: <a href="http://project.hexa-design.com/index.php?option=com_simpleboard&Itemid=40">project.hexa-design.com/index.php?...&amp;Itemid=40</a>
          </p>
        <p><b>Warranty</b><br>
        This program is distributed in the hope that it will be useful, but WITHOUT ANY
        WARRANTY;<br>without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
        PARTICULAR PURPOSE.</p>
        <P>
      </td>
    </tr>
    </table>

<?php
	 }
	function showheximage_photo( &$rows, $pageNav2, $option, $pad) {	
?>
	<form action="index2.php" method="post" name="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
			<td width="100%" class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br>
			<?php echo _HeXimage_Pm ;?></td>
			<td nowrap>Display #</td>
			<td> <?php echo $pageNav2->writeLimitBox(); ?> </td>
		</tr>
	</table>

	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
		<tr>
			<th width="20">#</th>
			<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" /></th>
			<th align="left"><?php echo _HeXimage_Preview ;?></th>
			<th align="left"><?php echo _HeXimage_TnaMe ;?></th>
			<th align="left"><?php echo _HeXimage_UrI ;?></th>
			<th align="left"><?php echo _HeXimage_Photo_Description ;?></th>
			<th align="left"><?php echo _HeXimage_AbM ;?></th>
			<th width="15" align="left">HSize</th>
			<th width="5" align="center">x</th>
			<th width="15" align="left">Vsize</th>
			<th width="10%"><?php echo _HeXimage_Photo_Published ;?></th>
		</tr>
<?php
		$k = 0;
		for($i=0; $i < count( $rows ); $i++) {
			$row = $rows[$i];
			$img = $row->published ? 'tick.png' : 'publish_x.png';
			$task = $row->published ? 'unpublish_photo' : 'publish_photo';
?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center"><?php echo $i+$pageNav2->limitstart+1;?></td>
		  <td align="left"><input type="checkbox" id="cb<?php echo $i;?>" name="photoid[]" value="<?php echo $row->photoid; ?>" onclick="isChecked(this.checked);" /></td>
			<td align="left"><img src="<?php echo $pad.$row->thumb; ?>" border="0"></td>
			<td align="left"><a href="#edit_photo" onClick="return listItemTask('cb<?php echo $i;?>','edit_photo')"><?php echo $row->thumb; ?></a></td>
			<td align="left"><?php echo $row->url; ?></td>
			<td align="left"><?php echo $row->description; ?></td>
			<td align="left"><?php echo $row->album_type; ?></td>
			<td align="center"><?php echo $row->hsize; ?></td>
			<td align="center">x</td>
			<td align="center"><?php echo $row->vsize; ?></td>
			<td width="10%" align="center"><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" border="0" alt="" /></a></td>
		</tr>
<?php
			$k = 1 - $k;
		}
?>
		<tr>
			<th align="center" colspan="17"> <?php echo $pageNav2->writePagesLinks(); ?></th>
		</tr>
		<tr>
			<td align="center" colspan="17"> <?php echo $pageNav2->writePagesCounter(); ?></td>
		</tr>
	</table>
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	</form>
	 
<?	 }
function editheximage_photo( &$row, $option, $rowA ) {
		mosMakeHtmlSafe( $row, ENT_QUOTES ); ?>
		
	<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == "cancelbutton") {
				submitform( pressbutton );
				return;
			}
			
			// do field validation
			if (form.album_type.value == '') {
				alert( "Please select an album." );
			} else {
				submitform( pressbutton );
			}
		}
	</script>

	<form action="index2.php" method="post" name="adminForm" id="adminForm" class="adminForm">
		<table width="100%" border="0" cellpadding="3" cellspacing="0">
			<tr align="left" valign="top">
			  <td colspan="3" class="sectionname"><img src="components/com_heximage/images/logo.gif" align="absmiddle" style="margin-right:10px;"><br>
			  <?php echo _HeXimage_AdEdit_photo ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_PeN ;?></td>
			  <td><input class="inputbox" type="text" size="50" maxlength="100" name="url" value="<?php echo $row->thumb; ?>" /></td>
			  <td><?php echo _HeXimage_Pname ;?></td>
		  </tr>
			<tr align="left" valign="top">
				<td><?php echo _HeXimage_TeN ;?></td>
				<td><input class="inputbox" type="text" size="50" maxlength="100" name="thumb" value="<?php echo $row->thumb; ?>" /></td>
			    <td><?php echo _HeXimage_Tname ;?></td>
			</tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Photo_Description ;?></td>
			  <td><textarea name="description" cols="50" class="inputbox"><?php echo $row->description; ?></textarea></td>
		      <td><?php echo _HeXimage_DoTi ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Album_Name ;?></td>
			  <td><select name="album_type">
          <option value="" <?php if (!(strcmp("", $row->album_type))) {echo "SELECTED";} ?>>---&nbsp;<?php echo _HeXimage_Choose_Album ;?>&nbsp;---</option>
          <?php
		  foreach ($rowA as $rowB)
		  	{
               ?>
          <option value="<?php echo $rowB->album_name ?>"<?php if (!(strcmp($rowB->album_name, $row->album_type))) {echo "SELECTED";} ?>><?php echo $rowB->album_name;?></option>
          <?php
               }
            ?>
        </select></td>
		      <td><?php echo _HeXimage_AlbumType;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Hw;?></td>
			  <td><input class="inputbox" type="text" size="5" maxlength="5" name="hsize" value="<?php echo $row->hsize; ?>" /></td>
		      <td><?php echo _HeXimage_HsiZe ;?></td>
		  </tr>
			<tr align="left" valign="top">
			  <td><?php echo _HeXimage_Vw;?></td>
			  <td><input class="inputbox" type="text" size="5" maxlength="5" name="vsize" value="<?php echo $row->vsize; ?>" /></td>
		      <td><?php echo _HeXimage_VsiZe ;?></td>
	  </table>

		<input type="hidden" name="photoid" value="<?php echo $row->photoid; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
	</form>		
		
<?php }
}
?>
