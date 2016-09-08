<?php

if( defined( '_dmConfig') ) {
 return true;
 } else { 
define('_dmConfig',1); 
 }
class dmConfig
{
// Last Edit: Sex, 2008-Jun-27 17:07
// Edited by: marcia
var $docman_version = "1.3 RC2";
var $dmpath = "";
var $isDown = "0";
var $perpage = "5";
var $registered = "2";
var $viewtypes = "html|htm|pdf|doc|txt|jpg|jpeg|gif|png";
var $icon_size = "1";
var $icon_theme = "default";
var $trimwhitespace = "1";
var $days_for_new = "5";
var $hot = "100";
var $display_license = "0";
var $default_order = "name";
var $default_order2 = "DESC";
var $showdmoptions = "1";
var $dmaccess = "1";
var $default_reader = "0";
var $default_editor = "-6";
var $reader_assign = "3";
var $editor_assign = "2";
var $author_can = "2";
var $emailgroups = "0";
var $user_upload = "0";
var $extensions = "zip|rar|pdf|txt";
var $fname_reject = "index.htm.?|\.htaccess";
var $maxAllowed = "1024000";
var $user_all = "0";
var $overwrite = "0";
var $fname_lc = "0";
var $fname_blank = "0";
var $security_anti_leech = "0";
var $security_allowed_hosts = "localhost";
var $log = "0";
var $smart_update = "http://mosdocman.sourceforge.net/updates/";
var $maintainer = "1";
var $methods = array (
  0 => 'http',
  1 => 'link',
  2 => 'transfer',
);
var $user_approve = "-3";
var $user_publish = "-3";
var $default_viewer = "-1";
}
?>