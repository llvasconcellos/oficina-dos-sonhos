<?php
/**
* HeXimage - A Mambo/Joomla! photo gallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg - All rights reserved!
* 
*
**/

# heximage.php front end translation
DEFINE("_HeXimage_AlbumName","Photo Album");
DEFINE("_HeXimage_TotalAlbums","There are ");
DEFINE("_HeXimage_AmmountAlbums","albums");
DEFINE("_HeXimage_TotalPictures","There are ");
DEFINE("_HeXimage_AmmountPictures","pictures in the database");
DEFINE("_HeXimage_NoImage","The album is empty, no photo's found in the database.");
DEFINE("_HeXimage_First","First");
DEFINE("_HeXimage_Next","Next");
DEFINE("_HeXimage_Previous","Previous");
DEFINE("_HeXimage_Last","Last");
DEFINE("_HeXimage_Photo_Nav1","Picture's");
DEFINE("_HeXimage_Photo_Nav2","of");
# Configuration back-end translation
DEFINE("_HeXimage_Off_Line","Switch the gallery frontend offline.");
DEFINE("_HeXimage_Offline_Message","Message, which is presented to the frontend users.");
DEFINE("_HeXimage_Hostname_Sql","The name of the MySQL server (default localhost).");
DEFINE("_HeXimage_Database_Sql","The name of the database.");
DEFINE("_HeXimage_Username_Sql","MySQL username.");
DEFINE("_HeXimage_Password_Sql","MySQL password.");
DEFINE("_HeXimage_Component_Logo","The top logo of the HeXimage photo gallery component. ");
DEFINE("_HeXimage_Gallery_Message","The message on the front page if no album is selected.");
DEFINE("_HeXimage_EpP","Number of thumbs per page.");
DEFINE("_HeXimage_TpP","Display the ammount of thumbs per row.");
DEFINE("_HeXimage_Tborder","Create a border arround the thumb.");
DEFINE("_HeXimage_TbColor","The color of the border arround the thumb.");
DEFINE("_HeXimage_GrP","No = Text, Yes = Graphics. You can upload you're own images in the com_heximage/images directory and define the correct name in the fields below.");
DEFINE("_HeXimage_PnA","Page navigation arrow ");
DEFINE("_HeXimage_PnavW","Page navigation width in % ");
DEFINE("_HeXimage_AlignM","Alignment of the images.");
DEFINE("_HeXimage_ASCDESC","Sort Ascending/Descending.");
DEFINE("_HeXimage_SmnT","The amount of search result to display.");
DEFINE("_HeXimage_Wmode","The image viewer as an new window or window less, it requires i.e. 5.5 or higher.");
DEFINE("_HeXimage_Offsite","Wheter the images are located on the same server or located on an other server.<br>If Offsite = Yes, you must manually upload the images and thumb with an external ftp program to the correct folders and define the correct names for the Image/Thumb base map in the fields below.<br>Don't forget the trailing slash / at the end.<b>Do not use the upload/Create thumb option if Offsite = yes<b>");
DEFINE("_HeXimage_Image_Base","The abolute url to the image directory. If Offsite = yes you must start the location with http://");
DEFINE("_HeXimage_Thumb_Base","The abolute url to the thumb directory. If Offsite = yes you must start the location with http://");
DEFINE("_HeXimage_DrMc","If no, then right mouse function is not allowed in window mode");
DEFINE("_HeXimage_Copy","Copyright text if rightmouse is disabled.");
DEFINE("_HeXimage_Show_Ad","Show/hide the album description.");
DEFINE("_HeXimage_Thumb_Size","The size of an thumb in pixels (standard 96 x 72 px) * it will be also used for the thumb generation script.");
DEFINE("_HeXimage_WtMu","Watermark functionality only works if both Window mode and Use watermark set as yes.");
DEFINE("_HeXimage_WtMa","Location of the watermark file");
DEFINE("_HeXimage_WtMq","Quality percentage of the watermark, default value = 100 %");
DEFINE("_HeXimage_WtMt","Transparancy percentage of the watermark, default value = 50 %. (100% is solid)");
# Album  back-end translation
DEFINE("_HeXimage_Album_manager","Album manager");
DEFINE("_HeXimage_Album_Name","Album name");
DEFINE("_HeXimage_Album_Descripion","Description");
DEFINE("_HeXimage_Album_Published","Published");
DEFINE("_HeXimage_AdEdit_Album","Add/Edit Album");
# Photo back-end translation
DEFINE("_HeXimage_Pm","Photo manager");
DEFINE("_HeXimage_Preview","Preview");
DEFINE("_HeXimage_UrI","Url");
DEFINE("_HeXimage_AbM","Album");
DEFINE("_HeXimage_Photo_Description","Description");
DEFINE("_HeXimage_Photo_Published","Published");
DEFINE("_HeXimage_AdEdit_photo","Add/Edit photo");
DEFINE("_HeXimage_Pname","Name of the image + extension * example <i>image001.jpg</i>.");
DEFINE("_HeXimage_TnaMe","Thumb");
DEFINE("_HeXimage_Tname","Name of the thumb + extension (same as Photo name) * example <i>image001.jpg</i>.");
DEFINE("_HeXimage_DoTi","Description of the image, it will be displayed when the mouse is hoovering on top of an image.");
DEFINE("_HeXimage_Choose_Album","Select album");
DEFINE("_HeXimage_AlbumType","The album where the image is located in.");
DEFINE("_HeXimage_Hw","Horizontal size.");
DEFINE("_HeXimage_HsiZe","The width of the image when displayed in the viewer screen (window less mode)");
DEFINE("_HeXimage_Vw","Vertical size.");
DEFINE("_HeXimage_VsiZe","The height of the image when displayed in the viewer screen (window less mode)");
# Photo Edit translation
DEFINE("_HeXimage_PeN","Photo name :");
DEFINE("_HeXimage_TeN","Thumb name :");
# Upload back-end translation
DEFINE("_HeXimage_UcT","Upload/Create thumb.");
DEFINE("_HeXimage_Submit","Submit");
DEFINE("_HeXimage_Clear","Clear");
DEFINE("_HeXimage_UPL","Image succesfull uploaded and no errors while making the thumb.");
DEFINE("_HeXimage_ImGU","The image is uploaded in the directory :");
DEFINE("_HeXimage_thbU","The thumb is uploaded in the directory :");
# Thumb back-end translation * not yet integrated

# Database back-end translation * not yet integrated

# HeXimage_search translation
DEFINE("_HeXimage_Srest","Search result");
DEFINE("_HeXimage_SaLb","Album");
DEFINE("_HeXimage_SDeSCr","Description");
DEFINE("_HeXimage_SsiZe","Size");
DEFINE("_HeXimage_NFnd","No images found");
# HeXimage_search module translation 2.1.1 or higher
DEFINE("_HeXimage_SrcD","Enter a Description");
DEFINE("_HeXimage_SrcH","Search");
# HeXimage_album module translation 2.1.1 or higher
DEFINE("_HeXimage_AnPa","No published albums found.");
?>