<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: menu.tpl.php,v 1.11 2005/04/14 15:32:08 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/*
* Display the menu (required)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->links (object) : holds the different menu links
*   $this->perms (number) : upload user permissions
*
*/
?>

<div id="dm_header">
<?php
if($this->theme->conf->menu_home) : 
	?>
	<div>
		<img src="<?php echo $this->theme->icon;?>home.png" alt="<?php echo _DML_TPL_CAT_VIEW;?>" />
		<a href="<?php echo $this->links->home;?>"><?php echo _DML_TPL_CAT_VIEW;?></a>
	</div>
	<?php
endif;
if($this->theme->conf->menu_search) :
	?> 
	<div>
		<img src="<?php echo $this->theme->icon;?>search.png" alt="<?php echo _DML_TPL_SEARCH_DOC;?>" />
		<a href="<?php echo $this->links->search;?>"><?php echo _DML_TPL_SEARCH_DOC;?></a>
	</div>
	<?php
endif;
	/*
	 * Check to upload permissions and show the appropriate icon/text
	 * Values for $this->perms->upload
	 *		- DM_TPL_AUTHORIZED 	: the user is authorized to upload
	 *		- DM_TPL_NOT_LOGGED_IN  : the user isn't logged in
	 *		- DM_TPL_NOT_AUTHORIZED : the user isn't authorized to upload
	*/
if($this->theme->conf->menu_upload) :
	switch($this->perms->upload) :
		case DM_TPL_AUTHORIZED :
		?>
		<div>
			<img src="<?php echo $this->theme->icon;?>submit.png" alt="<?php echo _DML_TPL_SUBMIT;?>" />
			<a href="<?php echo $this->links->upload;?>"><?php echo _DML_TPL_SUBMIT;?></a>
		</div>
		<?php break;
	endswitch;
endif;
	?>
</div>