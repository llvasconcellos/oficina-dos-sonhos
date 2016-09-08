<?php 
$a = $_GET['pic'];
require("../../administrator/components/com_heximage/config.heximage.php");
global $HeXimage_copytxt, $HeXimage_WT_USE, $a;
?>
<html>

<head>
<title>HeXimage viewer v2.1.2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="Webdesign, 3d ontwerp, grafimedia, php, mysql, design, 3dmax, portofolio, hexa.nu, HeXa, hexa-design, hexa">
<meta name="description" content="Webdesign en grafisch ontwerp">
<meta name="rating" content="general">
<meta name="robots" content="index,follow"> 
<meta name="url" content="http://www.hexa-design.com">
<meta name="author" content="A.J.W.P. Ruitenberg">
<meta name="progid" content="DreamweaverMX 2006">
<meta name="copyright" content="Copyright 2006 A.J.W.P. Ruitenberg">

<?php

if ($HeXimage_WT_USE == 0){echo "";}
if ($HeXimage_WT_USE == 1){?><META HTTP-EQUIV="REFRESH" CONTENT="0;URL=hexmarker.php?pic=<?php echo $a;?>"><?php }?>
</head>
<script language="javascript" src="hexviewer.js"></script>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#ffffff">
<font color="#000000" size="1" face="Arial">
<img border="0" src="images/loading.gif" name="il" onload="window.focus()" width="100" height="9"><br>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
form = unescape(params["pic"]);
pic = new Image();
pic.src=form;
document.write("<img src=" + form + " height=100% width=100% border=0 onload=resize()>");
//  End -->
</script>
<script language=JavaScript>

<!--

/*
Disable right mouse click Script © Hexa.nu (http://www.hexa-design.com) (info@hexa-design.com)
*/

var message="<?php echo $HeXimage_copytxt;?>";
function click(e) {
if (document.all) {
if (event.button==2||event.button==3) {
alert(message);
return false;
}
}
if (document.layers) {
if (e.which == 3) {
alert(message);
return false;
}
}
}
if (document.layers) {
document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;
// --> 
</script>

</font>
</body>

</html>
