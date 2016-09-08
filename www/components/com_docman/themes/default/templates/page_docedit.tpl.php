<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: page_docedit.tpl.php,v 1.7 2005/08/05 15:01:34 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display the move document form (required)
* 
* This template is called when u user preform a move operation on a document. 
* 
* General variables  :
*	$this->theme->path (string) : template path
*	$this->theme->name (string) : template name
*	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Preformatted variables :
*	$this->html->docedit (string)(hardcoded, can change in future versions)
*/
?>

<?php $this->splugin('pagetitle', _DML_TPL_TITLE_EDIT ) ?>

<?php echo $this->plugin('stylesheet', $this->theme->path."css/theme.css") ?>
<?php echo $this->plugin('overlib'); ?>
<?php echo $this->plugin('calendar'); ?>
<?php echo $this->plugin('validator'); ?>

<?php echo $this->html->menu; ?>

<h2 id="dm_title"><?php echo _DML_TPL_TITLE_EDIT;?></h2>

<ul class="dm_toolbar">
<li><a title="Cancel" class="dm_btn" id="dm_btn_cancel" href="javascript:submitbutton('cancel');" >Cancel</a></li>
<li><a title="Save"   class="dm_btn" id="dm_btn_save"   href="javascript:submitbutton('save');">Save</a></li>
</ul>

<?php echo $this->html->docedit ?>

<div class="clr"></div>

<script language="javascript" type="text/javascript">
<!--
	list = document.getElementById('dmthumbnail');
	img  = document.getElementById('dmthumbnail_preview');
	list.onchange = function() {
		var index = list.selectedIndex;
		if(list.options[index].value!='') {
			img.src = 'images/stories/' + list.options[index].value;
		} else {
			img.src = 'images/blank.png';
		}
	}
//-->
</script>

