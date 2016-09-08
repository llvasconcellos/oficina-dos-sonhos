<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: document.tpl.php,v 1.15 2005/08/06 13:10:12 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display document details (required)
* 
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->data		(object) : holds the document data
*   $this->links 	(object) : holds the document operations
*   $this->paths 	(object) : holds the document paths      
*/
?>
<div id="dm_details" class="dm_doc">
<?php 
if ($this->data->dmthumbnail) : 
	?><img src="<?php echo $this->paths->thumb ?>" alt="<?php echo $this->data->dmname;?>" /><?php 
endif; 
?>
<table summary="todo" cellspacing="0" >
<caption><?php echo _DML_TPL_DETAILSFOR ?><em>&nbsp;<?php echo $this->data->dmname ?></em></caption>
<col id="prop" />
<col id="val" />
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
 		<td><?php echo _DML_TPL_NAME ?></td><td><?php echo $this->data->dmname ?></td>
 	</tr>
	<?php 	
endif;	
if($this->theme->conf->details_description) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_DESC ?></td><td><?php echo $this->data->dmdescription ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filename) :
	 ?>
 	<tr>
 		<td><?php echo _DML_TPL_FNAME ?></td><td><?php echo $this->data->filename ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filesize) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_FSIZE ?></td><td><?php echo $this->data->filesize ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_filetype) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_FTYPE ?></td><td><?php echo $this->data->filetype ?>&nbsp;(<?php echo _DML_TPL_MIME.":&nbsp;".$this->data->mime ?>)</td>
	</tr>
	<?php 
endif;
if($this->theme->conf->details_submitter) :
	?>
	<tr>
 		<td><?php echo _DML_TPL_SUBBY ?></td><td><?php echo $this->data->submited_by ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_created) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_SUBDT ?></td>
 		<td>
 			 <?php  $this->plugin('dateformat', $this->data->dmdate_published , _DML_TPL_DATEFORMAT_LONG); ?>
 		</td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_readers) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_OWNER ?></td><td><?php echo $this->data->owner ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_maintainers) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_MAINT ?></td><td><?php echo $this->data->maintainedby ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_downloads) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_HITS ?></td><td><?php echo $this->data->dmcounter."&nbsp;"._DML_TPL_HITS ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_updated) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_LASTUP ?></td>
 		<td>
 			<?php  $this->plugin('dateformat', $this->data->dmlastupdateon , _DML_TPL_DATEFORMAT_LONG); ?>
 		</td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_homepage) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_HOME ?></td><td><?php echo $this->data->dmurl ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_crc_checksum) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_CRC_CHECKSUM ?></td><td><?php echo $this->data->params->get('crc_checksum'); ?></td>
 	</tr>
	<?php 
endif;
if($this->theme->conf->details_md5_checksum) : 
	?>
 	<tr>
 		<td><?php echo _DML_TPL_MD5_CHECKSUM ?></td><td><?php echo $this->data->params->get('md5_checksum'); ?></td>
 	</tr>
	<?php 
endif; 
?>
</tbody>
</table>
<div class="clr"></div>
</div>
<dl>
<dd class="dm_taskbar">
<ul>
<?php 
	$this->links->details = 0;
	$this->doc = &$this;
	include $this->loadTemplate('documents/tasks.tpl.php'); 
?>
<li><a href="javascript: history.go(-1);"><?php echo _DML_TPL_BACK ?></a></li>
</ul>
</dd>
</dl>
 	