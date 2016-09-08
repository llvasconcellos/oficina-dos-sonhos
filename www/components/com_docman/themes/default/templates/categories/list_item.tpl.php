<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: list_item.tpl.php,v 1.5 2005/01/25 22:28:01 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display a category list item (called by categories/list.tpl.php)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$item->data		(object) : holds the category data
*  $item->links 	(object) : holds the category operations
*  $item->paths 	(object) : holds the category paths      
*/

?>
<dt class="dm_row">
<?php	
switch ($this->theme->conf->cat_image) :
	case 0 : //none 
	
		//do nothing
	break;
	
	case 1 : //icon
		?><a class="dm_icon" href="<?php echo $item->links->view;?>"><img src="<?php echo $item->paths->icon;?>" alt="folder icon" /></a><?php
	break;
			
	case 2 : //thumb	
		if($item->data->image) :
		?><a class="dm_thumb" href="<?php echo $item->links->view;?>"><img src="<?php echo $item->paths->thumb;?>" alt="<?php echo $item->data->name;?>" /></a><?php 
		endif;
	break;
endswitch;
?>
	<a class="dm_name" href="<?php echo $item->links->view;?>"><?php echo $item->data->name;?></a>
</dt>

<dd class="dm_files"><?php echo $item->data->files;?></dd>
<?php
if($item->data->description != '') :
	?><dd class="dm_description"><?php echo $item->data->description;?></dd><?php
endif; 
?>