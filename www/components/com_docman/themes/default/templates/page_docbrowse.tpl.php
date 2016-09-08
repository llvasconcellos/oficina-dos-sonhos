<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: page_docbrowse.tpl.php,v 1.8 2005/08/05 15:01:34 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* Display the documents overview (required)
* 
* This template is called when u user preform browse the docman  
* 
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Preformatted html variables :
*	$this->html->menu     (string)(fetched from : general/menu.tpl.php)
*	$this->html->pathway  (string)(fetched from : general/pathway.tpl.php)
*	$this->html->category (string)(fetched from : categories/category.tpl.php)
*	$this->html->cat_list (string)(fetched from : categories/list.tpl.php)
*	$this->html->doc_list (string)(fetched from : documents/list.tpl.php)
*	$this->html->pagenav  (string)(fetched from : general/pagenav.tpl.php)
*	$this->html->pagetitle(string)(fetched from : general/pagetitle.tpl.php)                          
*/
?>

<?php $this->splugin('pagetitle', _DML_TPL_TITLE_BROWSE.$this->html->pagetitle ) ?>

<?php echo $this->plugin('stylesheet', $this->theme->path . "css/theme.css") ?>

<?php echo $this->plugin('javascript', $this->theme->path . "js/theme.js") ?>

<?php
if ($this->theme->conf->item_tooltip) :
    echo $this->plugin('overlib');
endif;

?>

<?php echo $this->html->menu; ?>

<h2 id="dm_title"><?php echo _DML_TPL_TITLE_BROWSE;?></h2>

<?php echo $this->html->pathway; ?>

<?php echo $this->html->category; ?>

<?php echo $this->html->cat_list; ?>

<?php echo $this->html->doc_list; ?>

<?php echo $this->html->pagenav; ?>