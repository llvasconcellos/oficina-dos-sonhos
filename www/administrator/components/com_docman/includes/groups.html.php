<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: groups.html.php,v 1.20 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_GROUPS')) {
    return;
} else {
    define('_DOCMAN_HTML_GROUPS', 1);
} 

class HTML_DMGroups 
{
    function showGroups($option, $rows, $search, $pageNav)
    {
        global $database, $my;

        ?>
        <form action="index2.php" method="post" name="adminForm">
			<table class="adminheading">
				<tr>
					<th>DOCMan - <?php echo _DML_TITLE_GROUPS;?></th>
					<td nowrap="nowrap">
                    <?php echo _DML_FILTER_NAME . ":";?>
                    <input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
					</td>
				</tr>
            </table>
			<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				<tr>
					<th width="2%" class="title"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows);?>);" /></th>
					<th class="title" width="30%"><div align="center"><?php echo _DML_GROUP;?></div></th>
					<th class="title" width="65%"><div align="center"><?php echo _DML_DESCRIPTION;?></div></th>
					<th class="title" width="5%"><div align="center"><?php echo _DML_EMAIL;?></div></th>
				</tr>
				<?php
        $k = 0;
        for ($i = 0, $n = count($rows);$i < $n;$i++) {
            $row = &$rows[$i];
            echo "<tr class='row $k'>";
            echo "<td width='20'>";

            ?>
				<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->groups_id;?>" onclick="isChecked(this.checked);" />
					</td>
					<td align="center">
						<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">
					<?php echo $row->groups_name;?>
						</a>
					</td>
					<td width="60%" align="center"><?php echo $row->groups_description;?></td>
					<td width="10%" align="center"><a href="index2.php?option=com_docman&section=groups&task=emailgroup&gid=<?php echo $row->groups_id;?>"><img src="../components/com_docman/themes/default/images/icons/16x16/email.png" border=0></a></td>
			  <?php
            echo "</tr>";
            $k = 1 - $k;
        } 

        ?>
		
		</table>
		<?php echo $pageNav->getListFooter();?>
	  <input type="hidden" name="option" value="com_docman" />
      <input type="hidden" name="section" value="groups" />
	  <input type="hidden" name="task" value="" />
	  <input type="hidden" name="boxchecked" value="0" />
	</form>
	
  <?php require_once ("../components/com_docman/footer.php");
    } 

    function editGroup($option, &$row, $usersList, $toAddUsersList)
    {
        global $mosConfig_live_site;
        mosMakeHtmlSafe($row);
        $tabs = new mosTabs(0);

        ?>
		<script>
			function submitbutton(pressbutton) {
		
			  var form = document.adminForm;
		
			  if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			  }
		
			  // do field validation
		
			  if (form.groups_name.value == ""){
				alert( "<?php echo _DML_ENTRY_NAME;?>" );
			  } else {
				allSelected(document.adminForm['users_selected[]']);
				submitform( pressbutton );
			  }
			}
		</script>
		
		<script>
			// moves elements from one select box to another one
			function moveOptions(from,to) {
			  // Move them over
			  for (var i=0; i<from.options.length; i++) {
				var o = from.options[i];
				if (o.selected) {
				  to.options[to.options.length] = new Option( o.text, o.value, false, false);
				}
			  }
			  // Delete them from original
			  for (var i=(from.options.length-1); i>=0; i--) {
				var o = from.options[i];
				if (o.selected) {
				  from.options[i] = null;
				}
			  }
			  from.selectedIndex = -1;
			  to.selectedIndex = -1;
			}
		
			function allSelected(element) {
		
			   for (var i=0; i<element.options.length; i++) {
					var o = element.options[i];
					o.selected = true;
		
				}
			 }
		</script>
	
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<script language="Javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/includes/js/tabs/tabpane.css" />
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/tabs/tabpane.js"></script>
	
			   <table class="adminheading">
					<tr>
						<th><?php echo $row->groups_id ? _DML_EDIT : _DML_ADD; echo _DML_GROUP; ?>
						</th>
					</tr>
				</table>
		<?php
        $tabs->startPane("content-pane");
        $tabs->startTab(_DML_GROUP, "group-page");
        ?>
	
			<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
				<form action="index2.php" method="post" name="adminForm" id="adminForm">
					<tr>
						<td width="20%" align="right"><?php echo _DML_GROUP;?>:</td>
						<td width="80%">
							<input class="inputbox" type="text" name="groups_name" size="50" maxlength="100" value="<?php echo htmlspecialchars($row->groups_name, ENT_QUOTES);?>" />
						</td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _DML_DESCRIPTION;?></td>
						<td valign="top">
							<textarea name="groups_description" cols="80" rows="19"><?php echo htmlspecialchars($row->groups_description, ENT_QUOTES);?></textarea>
						</td>
					</tr>
		   </table>
	
		<?php
        $tabs->endTab();
        $tabs->startTab(_DML_MEMBERS, "members-page");
        ?>
		   <table>
				<tr>
					<td width="200px"><?php echo _DML_USERS_AVAILABLE;?></td>
					<td width="40px">&nbsp;</td>
					<td width="200px"><?php echo _DML_MEMBERS_IN_GROUP;?></td>
				</tr>
				<tr>
					<td width="200px"><?php echo $toAddUsersList;?></td>
					<td width="40px">
						<input style="width: 50px" type="button" name="Button" value="&gt;" onClick="moveOptions(document.adminForm.users_not_selected, document.adminForm['users_selected[]'])" />
						<br /><br />
						<input style="width: 50px" type="button" name="Button" value="&lt;" onClick="moveOptions(document.adminForm['users_selected[]'],document.adminForm.users_not_selected)" />
						<br />
						<br />
					</td>
					<td width="200px"><?php echo $usersList;?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="center"><?php echo mosToolTip(_DML_ADD_GROUP_TIP . '</span>', _DML_TOOLTIP . '...<br />' . _DML_ADDING_USERS);?></td>
					<td>&nbsp;</td>
				</tr>
			</table>
			</div>
			<input type="hidden" name="groups_id" value="<?php echo $row->groups_id;?>" />
			<input type="hidden" name="option" value="com_docman" />
      		<input type="hidden" name="section" value="groups" />
			<input type="hidden" name="task" value="" />
		</form>
	
		<?php
        $tabs->endTab();
        $tabs->endPane();
    } 

    function messageForm($group, &$list)
    {

        ?>
        <form action="index2.php?option=com_docman&section=groups&task=sendemail&gid=<?php echo $group[0]->groups_id;?>" name="adminForm" method="POST">
        <table cellpadding="4" cellspacing="0" border="0" width="100%">
            <tr>
                <td width="100%"><span class="sectionname"><img src="images/mos_gel.png" width="70" height="67" align="middle"><?php echo _EMAIL_GROUP;?></span></td>
            </tr>
        </table>
        <table cellpadding="5" cellspacing="1" border="0" width="100%" class="adminform">
            <tr>
                <td width="150"><?php echo _DML_GROUP;?>:</td>
                <td width="85%"><?php echo $group[0]->groups_name;?></td>
			</tr>
            <tr>
                <td width="150"><?php echo _SUBJECT;?>:</td>
                <td width="85%"><input class="inputbox" type="text" name="mm_subject" value="" size="50"></td>
            </tr>
            </tr>
                <td width="150"><?php echo _EMAIL_LEADIN;?>:</td>
                <td width="85%"><textarea cols="50" rows="2" name="mm_leadin" wrap="virtual" 
					class="inputbox"><?php echo $list['leadin'];?></textarea></td>
			<tr>
            <tr>
                <td width="150" valign="top"><?php echo _MESSAGE;?>:</td>
                <td width="85%"><textarea cols="50" rows="5" name="mm_message" wrap="virtual" class="inputbox"></textarea></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="<?php echo _SEND_EMAIL;?>">
        </form>
        <?php
    } 
} 

?>
