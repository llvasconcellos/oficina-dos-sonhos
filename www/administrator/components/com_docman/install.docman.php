<?php

function com_install()
{ 
    // file operations
    chdir("../");
    @mkdir("dmdocuments", 0777);
    @mkdir("mambots/docman", 0777);
    @copy("components/com_docman/index.html", "dmdocuments/index.html");
    @chmod("components/com_docman", 0755);
    @chmod("administrator/components/com_docman/classes/DOCMAN_download.class.php", 0755);
    @chmod("administrator/components/com_docman/classes/DOCMAN_utils.php", 0755);
    
    @rename("administrator/components/com_docman/modules/admin/mod_docman_latest.php", "administrator/modules/mod_docman_latest.php");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_top.php", "administrator/modules/mod_docman_top.php");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_logs.php", "administrator/modules/mod_docman_logs.php");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_latest.xml", "administrator/modules/mod_docman_latest.xml");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_top.xml", "administrator/modules/mod_docman_top.xml");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_logs.xml", "administrator/modules/mod_docman_logs.xml");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_news.php", "administrator/modules/mod_docman_news.php");
    @rename("administrator/components/com_docman/modules/admin/mod_docman_news.xml", "administrator/modules/mod_docman_news.xml");
 
    //mambo installer doesn't like two xml files in a components root directory
    @rename("administrator/components/com_docman/docman.params.php", "administrator/components/com_docman/docman.params.xml");
    
    // db operations
    global $database;
    $database -> setQuery("SELECT id FROM #__components WHERE name= 'DOCMan'");
    $id = $database -> loadResult();
 
    // remove admin menu images
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/blank.png' WHERE parent = '$id'");
    $database -> query(); 

    // add new admin menu images
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/document.png', name = '<b>Files</b>' WHERE parent='$id' AND name = 'Files'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/content.png', name = '<b>Documents</b>' WHERE parent='$id' AND name = 'Documents'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/controlpanel.png', name = '<b>Management</b>' WHERE parent='$id' AND name = 'Management'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/config.png', name = '<b>Configuration</b>' WHERE parent='$id' AND name = 'Configuration'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/template.png', name = '<b>Themes</b>' WHERE parent='$id' AND name = 'Themes'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/credits.png', name = '<b>Credits</b>' WHERE parent='$id' AND name = 'Credits'");
    $database -> query();
    $database -> setQuery("UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/license.png', name = '<b>License</b>' WHERE parent='$id' AND name = 'License'");
    $database -> query();
}

?>