<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: page_docmove.tpl.php,v 1.9 2005/08/05 15:01:34 johanjanssens Exp $
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
*	$this->html->docmove (string)(hardcoded, can change in future versions)
*/
?>

<?php $this->splugin('pagetitle', _DML_TPL_TITLE_MOVE ) ?>

<?php echo $this->plugin('stylesheet', $this->theme->path."css/theme.css") ?>

<?php echo $this->html->menu; ?>

<h2 id="dm_title"><?php echo _DML_TPL_TITLE_MOVE;?></h2>

<?php echo $this->html->docmove ?>

<dl>
<dd class="dm_taskbar">
	<ul>
		<li><a href="javascript: history.go(-1);"><?php echo _DML_TPL_BACK ?></a></li>
	</ul>
</dd>
</dl>

