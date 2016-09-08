<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: July, 2005                                                    |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Mambo. It's the most feature-rich gallery component    |
|              for Mambo! For documentation and a detailed list       |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: install.zoom.php                                          |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
**/
function com_install(){
	global $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_lang;
		// get language file
	if (file_exists($mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php")){
		include_once($mosConfig_absolute_path."/components/com_zoom/lib/language/".$mosConfig_lang.".php");
	}else{
		include_once($mosConfig_absolute_path."/components/com_zoom/lib/language/english.php");
	}
	//end language
	echo '<p>'._ZOOM_INSTALL_CREATE_DIR;
	if (@mkdir ($mosConfig_absolute_path."/images/zoom", 0777)) {
    	@chmod ($mosConfig_absolute_path."/images/zoom", 0777);
    	@chmod ($mosConfig_absolute_path."/components/com_zoom/etc/audiolist.php", 0777);
    	@chmod ($mosConfig_absolute_path."/components/com_zoom/etc/safemode.php", 0777);
    	@chmod ($mosConfig_absolute_path."/components/com_zoom/etc/zoom_config.php", 0777);
		echo ('<font color="green">' . '&nbsp;' . _ZOOM_INSTALL_CREATE_DIR_SUCC . '</font></p>'
		 . '<table border="0" cellspacing="0" cellpadding="0" background="' . $mosConfig_live_site . '/components/com_zoom/www/images/zoom_logo_faded.gif" style="background-repeat:no-repeat; background-position:top right;" width="75%">'
	 	 . '<tr><td align="center">'
	 	 . '<p>' . _ZOOM_INSTALL_MESS1 . '</p>'
	 	 . '<p><strong>' . _ZOOM_INSTALL_MESS2 . '</strong></p>'
	 	 . '<p>' . _ZOOM_INSTALL_MESS3 . '</p>'
	 	 . '<p>' . _ZOOM_INSTALL_MESS4 . '</p>'
	 	 . '</td></tr></table>');
	} else {
		echo ('<font color="red"><strong>' . '&nbsp;' . _ZOOM_INSTALL_CREATE_DIR_FAIL . '</strong></font></p>'
		 . '<table border="0" cellspacing="0" cellpadding="0" background="' . $mosConfig_live_site . '/components/com_zoom/www/images/zoom_logo_faded.gif" style="background-repeat:no-repeat; background-position:top right;" width="75%">'
		 . '<tr><td align="left">'
		 . '<p><strong>' . _ZOOM_INSTALL_MESS_FAIL1 . '</strong></p>'
		 . '<p>' . _ZOOM_INSTALL_MESS_FAIL2 . '</p>'
		 . '<p>' . _ZOOM_INSTALL_MESS_FAIL3 . '</p'
		 . '</td></tr></table>');
	}
}
?>