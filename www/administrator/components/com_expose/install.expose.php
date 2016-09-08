<?php
//****************************************************************************
//Component: Expose
//Version  : 1.0.0
//Author   : Josh
//E-Mail   : webmaster@gotgtek.com
//Web Site : www.gotgtek.com
//Copyright: Copyright 2006 by GTEK Technologies and Slooz.com
//License  : GNU General Public License (GPL), see http://www.slooz.com for details
//
//Joomla 1.x flash gallery component.
//****************************************************************************

function com_install(){
	global $database;

	$database->setQuery( "SELECT id FROM #__components WHERE admin_menu_link = 'option=com_expose'" );
	$id = $database->loadResult();

	//add new admin menu images
	$database->setQuery( "UPDATE #__components SET admin_menu_img = '../administrator/components/com_expose/expose_icon.png', admin_menu_link = 'option=com_expose' WHERE id='$id'");
	$database->query();

echo( "<p align='left'><b><u>Congratulations!</u></b> Expose has been successfully installed.<br> To use it, simply add a 'Component' type menu item and<br> point it to Expose.  Additionally, you may wish to edit the<br> EXPOSE files located in /com_expose/expose to suit your needs.<br><b><u>Default PASSWORD is manager</u></b></p>" );
echo( "<p align='left'><b>System Rerquirements</b><br>This application requires that PHP version 4 or higher, the GD library, DOMXML library and<br> the iconv library extensions are installed on your web server (iconv comes on most Un*x-type<br> OSes). You will need Flash Player 8 to open the application in a web browser.</p>" );
echo( "<p align='left'><b>Disclaimer</b><br>This software comes as is, without any warranties or claims for fitness, either explicit or implied.<br> I, the author of this software, shall not be held liable should the use of this software cause any<br> kind of damage or loss.</p>" );
echo( "<p align='left'><b>License</b><br>You may use this software free of charge. You may not distribute it without the prior consent<br> of the author, nor sell it. This software includes the AMFPHP component, and an JPEG<br> encoder, courtesy of Uro Tinic and Cristi Cuturicu. This package also comes with the<br> Medrano font, courtesy of Tepid Monkey.</p>" );
echo( "<p align='left'><b>Copyright</b><br>Copyright 2005, Ivan Dramaliev, junker@slooz.com <a href=http://www.slooz.com target=_blank>http://www.slooz.com</a><br> component integration by GTEK Technologies <A href=http://www.gotgtek.com target=_blank>http://www.gotgtek.com</a></p>" );
}

?>


