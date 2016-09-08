<?

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/
    
function com_install() {

  global $database;



  $database->setQuery( "UPDATE #__components"

  ." SET admin_menu_link='option=categories&section=com_xegallerypro'"

  ." WHERE admin_menu_link = 'option=com_xegallerypro&act=categories'");

  if (!$database->query()) {

    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";

    exit();

  }

  echo "Corrected category menu link... <b>OK</b><br />";



  chdir("../components/com_xegallerypro");
  

  mkdir("img_pictures", 0755);

  mkdir("img_thumbnails", 0755);

  echo "Created image and thumbnail dir... <b>OK</b><br />";



  echo "<p><b><?php echo _xegallerypro_USPJEH;?></b></p>";



}

?>