<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: tooltip.tpl.php,v 1.3 2005/04/10 22:59:34 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display document details (called by document/list_item.tpl.php)
* 
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*  $this->doc->data	 (object) : holds the document data
*  $this->doc->links (object) : holds the document operations
*  $this->doc->paths (object) : holds the document paths      
*/
?>
<div id=dm_tooltip>
<table summary=todo cellspacing=0>
<caption><?php echo _DML_TPL_DETAILSFOR ?><em>&nbsp;<?php echo $this->doc->data->dmname ?></em></caption>
<col id=prop />
<col id=val />
<thead>
	<tr>
		<td>Property</td><td>Value</td>
	</tr>
</thead>
<tbody>
<?php 
if($this->theme->conf->details_name) : 
	?>
	<tr>
 		<td><?php echo _DML_TPL_NAME ?></td><td><?php echo $this->doc->data->dmname ?></td>
 	</tr>
	<?php 	
endif;	
if($this->theme->conf->details_description) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_DESC ?></td><td><?php echo $this->doc->data->dmdescription ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filename) :
	 ?>
 	<tr>
 		<td><?php echo _DML_TPL_FNAME ?></dt><td><?php echo $this->doc->data->filename ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filesize) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_FSIZE ?></dt><td><?php echo $this->doc->data->filesize ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filetype) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_FTYPE ?></td><td><?php echo $this->doc->data->filetype ?>&nbsp;&nbsp(<?php echo _DML_TPL_MIME.$this->doc->data->mime ?>)</td>
	</tr>
	<?php 
endif;
if($this->theme->conf->details_submitter) :
	?>
	<tr>
 		<td><?php echo _DML_TPL_SUBBY ?></td><td><?php echo $this->doc->data->submited_by ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_created) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_SUBDT ?></td>
 		<td>
 			 <?php  $this->plugin('dateformat', $this->doc->data->dmdate_published , _DML_TPL_DATEFORMAT_LONG); ?>
 		</td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_readers) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_OWNER ?></td><td><?php echo $this->doc->data->owner ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_maintainers) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_MAINT ?></td><td><?php echo $this->doc->data->maintainedby ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_downloads) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_HITS ?></td><td><?php echo $this->doc->data->dmcounter._DML_TPL_HITS ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_updated) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_LASTUP ?></td>
 		<td>
 			<?php  $this->plugin('dateformat', $this->doc->data->dmlastupdateon , _DML_TPL_DATEFORMAT_LONG); ?>
 		</td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_homepage) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_HOME ?></td><td><?php echo $this->doc->data->dmurl ?></td>
 	</tr>
	<?php 
endif; 
?>
</tbody>
</table>
</div>