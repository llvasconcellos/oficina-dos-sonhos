<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: tasks.tpl.php,v 1.14 2005/05/29 15:48:39 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/*
* Display the document tasks (called by document/list_item.tpl.php and documents/document.tpl.php)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->doc->links (object) : holds the tasks a user can preform on a document
*/

if ( $this->theme->conf->task_details ) :
	if( $this->doc->links->details ) : 
		?><li><a href="<?php echo $this->doc->links->details?>"><?php echo _DML_TPL_DOC_DETAILS ?></a></li><?php
    endif;
endif;
if ( $this->theme->conf->task_download ) :
	if( $this->doc->links->download  ) : 
		?><li><a href="<?php echo $this->doc->links->download ?>"><?php echo _DML_TPL_DOC_DOWNLOAD ?></a></li><?php
	endif;
endif;
if ( $this->theme->conf->task_view ) :
	if( $this->doc->links->view ) : 
		?><li><a href="<?php echo $this->doc->links->view ?>" type="popup"><?php echo _DML_TPL_DOC_VIEW ?></a></li><?php 
	endif;
endif;

if( $this->doc->links->edit) : 
	?><li><a href="<?php echo $this->doc->links->edit ?>"><?php echo _DML_TPL_DOC_EDIT ?></a></li><?php
endif;

if( $this->doc->links->checkout) : 
	?><li><a href="<?php echo $this->doc->links->checkout ?>"><?php echo _DML_TPL_DOC_CHECKOUT ?></a></li><?php
endif;

if( $this->doc->links->checkin ) : 
	?><li><a href="<?php echo $this->doc->links->checkin ?>"><?php echo _DML_TPL_DOC_CHECKIN ?></a></li><?php
endif;

if( $this->doc->links->reset  ) : 
	?><li><a href="<?php echo $this->doc->links->reset ?>"><?php echo _DML_TPL_DOC_RESET ?></a></li><?php
endif;

if( $this->doc->links->move ) : 
	?><li><a href="<?php echo $this->doc->links->move ?>"><?php echo _DML_TPL_DOC_MOVE ?></a></li><?php
endif;

if( $this->doc->links->delete ) : 
	?><li><a href="<?php echo $this->doc->links->delete ?>"><?php echo _DML_TPL_DOC_DELETE ?></a></li><?php
endif;

if( $this->doc->links->update ) : 
	?><li><a href="<?php echo $this->doc->links->update ?>"><?php echo _DML_TPL_DOC_UPDATE ?></a></li><?php
endif;

if( $this->doc->links->approve) : 
	?><li class="approve"><a href="<?php echo $this->doc->links->approve ?>"><?php echo _DML_TPL_DOC_APPROVE ?></a></li><?php
endif;

if( $this->doc->links->unpublish  ) : 
	?><li><a href="<?php echo $this->doc->links->unpublish ?>"><?php echo _DML_TPL_DOC_UNPUBLISH ?></a></li><?php 
endif;

if( $this->doc->links->publish) : 
	?><li class="publish"><a href="<?php echo $this->doc->links->publish ?>"><?php echo _DML_TPL_DOC_PUBLISH ?></a></li><?php
endif;


?>