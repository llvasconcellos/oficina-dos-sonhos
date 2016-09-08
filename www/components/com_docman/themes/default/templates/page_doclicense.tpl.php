<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: page_doclicense.tpl.php,v 1.2 2005/04/10 22:59:34 johanjanssens Exp $
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
*	$this->html->doclicense (string)(hardcoded, can change in future versions)
*   $this->html->license    (string)(the actual license text)
*/
?>

<?php echo $this->plugin('stylesheet', $this->theme->path."css/theme.css") ?>

<h3 class="componentheading"><?php echo _DML_TPL_LICENSE_DOC;?></h3>

<div class="dm_license_body">
	<?php echo $this->license; ?>
</div>

<div class="dm_license_form">
<?php echo $this->html->doclicense ?>
</div>

<dd class="dm_taskbar">
	<ul>
		<li><a href="javascript: history.go(-1);"><?php echo _DML_TPL_BACK ?></a></li>
	</ul>
</dd>


