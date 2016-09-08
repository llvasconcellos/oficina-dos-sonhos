<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: list_item.tpl.php,v 1.14 2005/09/30 21:17:46 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/*
* Display a documents list item (called by document/list.tpl.php)
*
* This template is called when u user preform browse the docman
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path


* Template variables :
*   $this->doc->data  (object) : holds the document data
*   $this->doc->links (object) : holds the document operations
*   $this->doc->paths (object) : holds the document paths
*/

/** edited by mic */

if(!$this->doc->data->approved) : 
	?><dt class="dm_unapproved"><?php
elseif(!$this->doc->data->published) :
	?><dt class="dm_unpublished"><?php
else : 
	?><dt><?php
endif;

//output document image
switch($this->theme->conf->doc_image) :
 	case 0 :  //none
		//do nothing
	break;
 	
 	case 1 :   //icon
 		if($this->doc->links->download) :
 		?><a class="dm_icon" href="<?php echo $this->doc->links->download;?>"><?php
 		else :
		?><a class="dm_icon"><?php
		endif;
		?>
			<img src="<?php echo $this->doc->paths->icon;?>" alt="file icon" />
		</a>
		<?php
	break;
 	
 	case 2  :  //thumb
 		if($this->doc->data->dmthumbnail) :
 		if($this->doc->links->download)   :
 		?><a class="dm_thumb" href="<?php echo $this->doc->links->download;?>"><?php
 		else :
		?><a class="dm_thumb"><?php
		endif;
		?>
			<img src="<?php echo $this->doc->paths->thumb; ?>" alt="" />
		</a>
 		<?php
 		endif;
 	break;
endswitch;

//output document link
if($this->doc->links->download) :	 
?><a class="dm_name" href="<?php echo $this->doc->links->download;?>"><?php
else :
?><a class="dm_name"><?php
endif;
	echo $this->doc->data->dmname;
 	if($this->doc->data->state) :
 		?><span><?php echo $this->doc->data->state ?></span><?php
 	endif;
 	if($this->theme->conf->item_tooltip) :
 		$this->item = &$this->doc;
 		$tooltip = $this->fetch('documents/tooltip.tpl.php');
 		$icon    = $this->theme->path."images/icons/16x16/tooltip.png";
 		echo $this->plugin('tooltip',  $this->doc->data->id, 'DOCMan Tooltip', $tooltip, $icon);
 	endif; 
?>
</a>
</dt>

<?php
//output document date
if ( $this->theme->conf->item_date ) : 
	?>
	<dd class="dm_date">
	<?php $this->plugin('dateformat', $this->doc->data->dmdate_published, _DML_TPL_DATEFORMAT_SHORT); ?>
	</dd>
	<?php 
endif;
//output document description
if ( $this->theme->conf->item_description  ) : 
	?>
	<dd class="dm_description">
		<?php echo $this->doc->data->dmdescription;?>
	</dd>
	<?php 
endif;
//output document url
if ( $this->theme->conf->item_homepage && $this->doc->data->dmurl != '') : 
	?>
 	<dd class="dm_homepage">
		<?php echo _DML_TPL_HOMEPAGE;?>: <a href="<?php echo $this->doc->data->dmurl;?>"><?php echo $this->doc->data->dmurl;?></a>
	</dd>
	<?php 
endif;
//output document counter
if ( $this->theme->conf->item_hits  ) : 
	?>
	<dd class="dm_counter">
		<?php echo _DML_TPL_HITS;?>: <?php echo $this->doc->data->dmcounter;?>
	</dd>
	<?php 
endif; 
?>
<dd class="dm_taskbar">
<ul>
<?php include $this->loadTemplate('documents/tasks.tpl.php');  ?>
</ul>
</dd>
