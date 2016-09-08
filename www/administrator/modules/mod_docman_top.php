<?php/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: mod_docman_top.php,v 1.4 2005/04/18 14:05:40 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2004 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
*/

/**
* * ensure this file is being included by a parent file
*/
defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

global $_DOCMAN;
$_DOCMAN->setType(_DM_TYPE_MODULE);
$_DOCMAN->loadLanguage('modules');

$database->setQuery("SELECT * FROM #__docman ORDER BY dmcounter DESC LIMIT 10");
$rows = $database->loadObjectList();

?>
<table class="adminlist">
	<tr>
	    <th colspan="3"><?php echo _DML_MOD_MOST_TITLE;?></th>
	</tr>
<?php
if (!count($rows)) echo '<tr><td>' . _DML_MOD_MOST_NODOCUMENTS . '</tr></td>';
foreach ($rows as $row) {
    ?>
	<tr>
	    <td><a href="#edit" onClick="submitcpform('<?php echo $row->id;?>', '<?php echo $row->id;?>')"><?php echo $row->dmname;?></a>
	    </td>
	    <td align="right"><?php echo $row->dmcounter;?></td>
	</tr>
<?php
} 

?>
</table>