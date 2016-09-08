<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: toolbar.docman.class.php,v 1.2 2005/03/11 14:44:56 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

/**
* MenuBar class
* @package DOCMan_1.3.0
*/
class dmToolBar {

	/**
	* Writes the start of the button bar table
	*/
	function startTable() {
		?>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		function MM_swapImgRestore() { //v3.0
		var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}
		//-->
		</script>
		<style>
		<?php if(!class_exists('joomlaVersion')) { ?>
			table#toolbar {
				margin-right: 10px;
			}

			table#toolbar a.toolbar {
				color : #808080;
				text-decoration : none;
				display: block;
				border: 1px solid #DDD;
				width: 55px;
				padding: 2px 1px 2px 1px;
			}
			table#toolbar a.toolbar:hover {
				color : grey;
				border: 1px solid grey;
				background-color: #DDD;
				padding: 3px 0px 1px 2px;
			}
			table#toolbar a.toolbar:active {
				color : #FF9900;
			}
		<?php } ?>
		</style>
		<table id="toolbar" cellpadding="3" cellspacing="0" border="0">
		<tr height="60" valign="middle" align="center">
		<?php
	}

	/**
	* Writes a spacer cell
	* @param string The width for the cell
	*/
	function spacer( $width='' ) {
		?>
		<td width="<?php echo $width;?>">&nbsp;</td>
		<?php
	}

	/**
	* Write a divider between menu buttons
	*/
	function divider() {
		$image = mosAdminMenus::ImageCheckAdmin( 'menu_divider.png', '/administrator/images/' );
		?>
		<td>
		<?php echo $image; ?>
		</td>
		<?php
	}

	/**
	* Writes the end of the menu bar table
	*/
	function endTable() {
		?>
		</tr>
		</table>
		<?php
	}

	/**
	* Writes a common icon button
	* @param string The task
	* @param string The alt text
	* @param string The icon name
	*/
	function icon( $task, $alt, $icon, $path = "/administrator/images/") {

		$icon = ($icon != 'cpanel') ? $icon.'_f2.png' : $icon.'.png';


		?>
		<td>
		<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
		<img name="<?php echo $task;?>" width="32" height="32" src="images/<?php echo $icon;?>" alt="<?php echo $alt;?>" border="0" align="middle" /><br />
		<?php echo $alt; ?>
		</a>
		</td>
		<?php
	}

	function save($task='save', $alt='Save') {
    	dmToolBar::icon($task, $alt, 'save');
    }

    function cancel($task='cancel', $alt='Cancel') {
    	dmToolBar::icon($task, $alt, 'cancel');
    }

   	function addNew($task = 'new', $alt = 'New') {
   		dmToolBar::icon($task, $alt, 'new');
   	}

    function cpanel() {
        dmToolBar::icon('cpanel', 'cpanel', 'cpanel');
    }

    function upload($task = 'upload', $alt = 'Upload') {
    	dmToolBar::icon($task, $alt, 'upload');
    }

    function move($task = 'move', $alt = 'Move') {
    	dmToolBar::icon($task, $alt, 'move');
    }


    /**
	* Writes a cancel button that will go back to the previous page without doing
	* any other operation
	*/
	function back($task = 'back', $alt = 'Back') {
		$image = mosAdminMenus::ImageCheckAdmin( 'back.png', '/administrator/images/', NULL, NULL, 'back', 'cancel' );
		$image2 = mosAdminMenus::ImageCheckAdmin( 'back_f2.png', '/administrator/images/', NULL, NULL, 'back', 'cancel', 0 );
		?>
		<td>
		<a class="toolbar" href="javascript:window.history.back();">
		<img name="<?php echo $task;?>" width="32" height="32" src="images/<?php echo $icon.'_f2.png';?>" alt="<?php echo $alt;?>" border="0" align="middle" /><br />
		<?php echo $alt; ?>
		</a>
		</td>
		<?php
    }

	/**
	* Writes a common icon button for a list of records
	* @param string The task
	* @param string The alt text
	* @param string The icon name
	*/
	function iconList( $task, $alt, $icon, $path = "/administrator/images/" ) {
		$image = mosAdminMenus::ImageCheckAdmin( $icon.".png", $path, NULL, NULL, $alt, $task );
		$image2 = mosAdminMenus::ImageCheckAdmin( $icon."_f2.png", $path, NULL, NULL, $alt, $task, 0 );
		?>
     	<td>
		<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Please make a selection from the list to <?php echo $task;?>'); } else {submitbutton('<?php echo $task;?>', '');}" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('<?php echo $task;?>','','<?php echo $image2; ?>',1);">
		<img name="<?php echo $task;?>" width="32" height="32" src="images/<?php echo $icon.'_f2.png';?>" alt="<?php echo $alt;?>" border="0" align="middle" /><br />
		<?php echo $alt; ?>
		</a>
		</td>
     	<?php
	}

	function publishList($task='publish', $alt='Publish') {
		dmToolBar::iconList($task, $alt, 'publish');
	}

	function unpublishList($task='unpublish', $alt='Unpublish') {
		dmToolBar::iconList($task, $alt, 'unpublish');
	}

	function deleteList($task='remove', $alt='Delete') {
		dmToolBar::iconList($task, $alt, 'delete');
	}

	function editList($task='edit', $alt='Edit') {
		dmToolBar::iconList($task, $alt, 'edit');
	}

	function editCss( $task='edit_css', $alt='Edit CSS') {
		dmToolBar::iconList($task, $alt, 'css');
	}
}

?>
