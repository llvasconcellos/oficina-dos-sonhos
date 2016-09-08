<?php
/**
* A DHTML menu component for Joomla!
* @version 1.12
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class TOOLBAR_config {
	function _DEFAULT() {
		global $_VERSION;
		mosMenuBar::startTable();
		$image = mosAdminMenus::ImageCheck( 'preview.png', '/administrator/images/', NULL, NULL, _LX_PREVIEW, 'preview' );
		$image2 = mosAdminMenus::ImageCheck( 'preview_f2.png', '/administrator/images/', NULL, NULL, _LX_PREVIEW, 'preview', 0 );
		?>
		<td align="center">
		<a class="toolbar" href="#" onClick="open_preview()" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('preview','','<?php echo $image2; ?>',1);">
		<?php echo $image._LX_PREVIEW; ?>
		</a>
		</td>
		<?php
		mosMenuBar::spacer();
		mosMenuBar::save('save', _LX_SAVE);
		mosMenuBar::spacer();
		if($_VERSION->RELEASE == "4.5" && $_VERSION->DEV_LEVEL >= "2" || $_VERSION->PRODUCT == "Joomla!"){
			mosMenuBar::apply('apply', _LX_APPLY);
			mosMenuBar::spacer();
		}
		mosMenuBar::cancel('cancel', _LX_CANCEL);
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
}
?>