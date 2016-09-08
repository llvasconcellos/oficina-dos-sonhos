<?php

function com_uninstall()
{
    @unlink("modules/mod_docman_latest.php");
    @unlink("modules/mod_docman_top.php");
    @unlink("modules/mod_docman_logs.php");
    @unlink("modules/mod_docman_news.php");
    @unlink("modules/mod_docman_latest.xml");
    @unlink("modules/mod_docman_top.xml");
    @unlink("modules/mod_docman_logs.xml");
    @unlink("modules/mod_docman_news.xml");
}

?>