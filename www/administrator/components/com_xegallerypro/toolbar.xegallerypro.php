<?php

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

if ($act) $task = $act;

switch ($task) {
  case "new":
    menuxegallerypro::NEW_MENU();
    break;  
    
    case "newcatg":
    menuxegallerypro::NEW_CTG_MENU();
    break;

    case "showcatg":
    menuxegallerypro::CTG_MENU();
    break;

  case "edit":
    menuxegallerypro::EDIT_MENU();
    break;
  case "editcatg":
    menuxegallerypro::EDIT_CTG_MENU();
    break;

  case "settings":
    menuxegallerypro::CONFIG_MENU();
    break;

  case "upload":
  case "upload2":
  case "uploadhandler":
  case "batchupload":
  case "batchuploadhandler":
    break;

  case "comments":
    menuxegallerypro::COMMENTS_MENU();
    break;

  default:
    menuxegallerypro::XEMAIN_MENU();
    break;
}
?>