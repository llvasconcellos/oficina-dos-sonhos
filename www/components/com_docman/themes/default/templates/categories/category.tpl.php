<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: category.tpl.php,v 1.5 2005/01/25 22:28:01 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/*
* Display category details (required)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->data		(object) : holds the category data
*  $this->links 	(object) : holds the category operations
*  $this->paths 	(object) : holds the category paths
*/
?>

<div class="dm_cat">

<?php
	if($this->data->title != '') : 
		?><div class="dm_name"><?php echo $this->data->title;?></div><?php
	endif;
	
	if($this->data->description != '') : 
		?><div class="dm_description"><?php echo $this->data->description;?></div><?php
	endif;

	if($this->data->image) : 
		?>
 		<div class="dm_thumb">
			<a href="<?php echo $this->paths->thumb; ?>" target="_blank">
				<img src="<?php echo $this->paths->thumb; ?>" alt="" />
			</a>
		</div>
 		<?php 
 	endif; 
 ?>
	<div class="clr"></div>
</div>
