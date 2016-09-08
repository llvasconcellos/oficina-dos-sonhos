<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: logs.html.php,v 1.5 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

class HTML_DMLogs {
    function showLogs($option, $rows, $search, $pageNav)
    {
        global $database, $my, $mosConfig_absolute_path, $mosConfig_live_site;

        ?>
		<form action="index2.php" method="post" name="adminForm">
			<table class="adminheading">
				<tr>
					<th>DOCMan <?php echo _DML_DOWNLOAD_LOGS;?></th>
					<td nowrap="nowrap"><?php echo _FILTER;?>
						<input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
					</td>
				</tr>
			</table>
			<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				<tr>
					<th width="2%" class="title"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows);?>);" /></th>
					<th class="title" width="10%" nowrap="nowrap"><div align="center"><?php echo _DML_DATE;?></div></th>
					<th class="title" width="20%" nowrap="nowrap"><div align="center"><?php echo _DML_USER;?></div></th>
					<th class="title" width="20%" nowrap="nowrap"><div align="center"><?php echo _DML_IP;?></div></th>
					<th class="title" width="20%" nowrap="nowrap"><div align="center"><?php echo _DML_DOCUMENT;?></div></th>
					<th class="title" width="10%" nowrap="nowrap"><div align="center"><?php echo _DML_BROWSER;?></div></th>
					<th class="title" width="10%" nowrap="nowrap"><div align="center"><?php echo _DML_OS;?></div></th>
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
						<?php echo $row->log_datetime;?>
					</td>
					<td align="center">
						<?php if (!$row->log_user) echo _DML_ANONYMOUS;
            else {
                $database->setQuery("SELECT name FROM #__users WHERE id='$row->log_user'");
                $userLog = $database->loadResult();
                echo $userLog;
            } 

            ?>
					</td>
					<td align="center">
						<?php echo $row->log_ip;?>
					</td>
					<td align="center">
						 <?php
            $database->setQuery("SELECT dmname FROM #__docman WHERE id='$row->log_docid'");
            $docLog = $database->loadResult();
            echo $docLog;

            ?>
					</td>
					<td align="center">
						 <?php echo $row->log_browser;?>
					</td>
					<td align="center">
						 <?php echo $row->log_os;?>
					</td>
				</tr>
				<?php
            $k = 1 - $k;
        } 

        ?>
		</table>
		
		<?php echo $pageNav->getListFooter();?>
		
		<input type="hidden" name="option" value="com_docman" />
		<input type="hidden" name="section" value="logs" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		
		<?php require_once ("../components/com_docman/footer.php");
    } 
} 

?>
