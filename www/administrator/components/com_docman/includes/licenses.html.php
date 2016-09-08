<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: licenses.html.php,v 1.13 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_LICENSES')) {
    return;
} else {
    define('_DOCMAN_HTML_LICENSES', 1);
} 

class HTML_DMLicenses {
    function editLicense($option, &$row)
    {
        mosMakeHtmlSafe($row);

        ?>
		
        <script language="javascript" type="text/javascript">
            function submitbutton(pressbutton) {
				  var form = document.adminForm;
				  if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				  }
		
				if (form.name.value == "") {
					alert ( "<?php echo _E_WARNTITLE;?>" );
				} else {
				  <?php getEditorContents('editor1', 'license');?>
				  submitform( pressbutton );
				}
			}
        </script>
		<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<table class="adminheading">
			<tr>
				<th><?php echo $row->id ? _DML_EDIT : _DML_ADD;?> <?php echo _DML_LICENSES;?></th>
            </tr>
		</table>

        <table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
				<tr>
					<td width="20%" align="right"><?php echo _DML_NAME;?>:</td>
					<td width="80%">
						<input class="inputbox" type="text" name="name" size="50" maxlength="100" value="<?php echo htmlspecialchars($row->name, ENT_QUOTES);?>" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right"><?php echo _DML_LICENSE_TEXT;?>:</td>
				<td>
					<?php
        			editorArea('editor1', $row->license, 'license', '700', '600', '60', '30');
        			?>
				</td>
			  </tr>
			  
			<input type="hidden" name="id" value="<?php echo $row->id;?>" />
			<input type="hidden" name="option" value="com_docman" />
			<input type="hidden" name="section" value="licenses" />
			<input type="hidden" name="task" value="" />
		</form>
	</table>
    <?php
    } 

    function showLicenses($option, $rows, $search, $pageNav)
    {
        global $database, $my, $mosConfig_absolute_path, $mosConfig_live_site;

        ?>
		<form action="index2.php" method="post" name="adminForm">
			<table class="adminheading">
				<tr>
					<th>DOCMan <?php echo _DML_LICENSES;?></th>
					<td nowrap="nowrap">
						<?php echo _DML_FILTER_NAME;?>
						<input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
					</td>
				</tr>
			</table>
			<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				<tr>
					<th width="2%" class="title"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows);?>);" /></th>
					<th class="title" width="100%" nowrap="nowrap"><div align="center">Name</div></th>
				</tr>
			   <?php
        $k = 0;
        for ($i = 0, $n = count($rows);$i < $n;$i++) {
            $row = &$rows[$i];
            echo "<tr class=\"row $k\">";
            echo "<td width=\"20\">";

            ?>
					<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id;?>" onclick="isChecked(this.checked);" />
					</td>
					<td align="center">
						<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">
						<?php echo $row->name;?>
						</a>
					</td>
				</tr>
				<?php
            $k = 1 - $k;
        } 

        ?>
		  </table>
		  
		  <?php echo $pageNav->getListFooter();?>
		  
		  <input type="hidden" name="option" value="com_docman" />
		  <input type="hidden" name="section" value="licenses" />
		  <input type="hidden" name="task" value="licenses" />
		  <input type="hidden" name="boxchecked" value="0" />
		</form>
	  <?php require_once ("../components/com_docman/footer.php");
    } 
} 

?>
