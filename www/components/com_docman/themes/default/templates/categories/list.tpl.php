<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: list.tpl.php,v 1.8 2005/04/10 22:59:34 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display the category list (required)
* 
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->items (array)  : holds an array of dcoument items 
*/
?>

<div id="dm_cats"> 
<h3><?php echo _DML_TPL_CATS;?><span><?php echo _DML_TPL_FILES;?></span></h3>
<dl >
<?php
 	/* 
     * Include the list_item template and pass the item to it 
    */
  
	foreach($this->items as $item) :
		if($this->theme->conf->cat_empty || $item->data->files != 0) :
			include $this->loadTemplate('categories/list_item.tpl.php');
		endif;
	endforeach;
?>
</dl>
</div>