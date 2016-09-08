<?php
/*
*@ SlideShow Module
*@ Package slideshow
*@ (C) 2006 Rami
*@ Copyright  2006 - Rami. All rights reserved.
*@ URL: http://lady-beetle.com.
*@ version 1.0
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
global $mosConfig_absolute_path, $mosConfig_live_site;

$type 			= $params->get( 'type', 'jpg' );
$folder 		= $params->get( 'folder' );
$link 			= $params->get( 'link' );
$width 			= $params->get( 'width' );
$height 		= $params->get( 'height' );
$target 		= $params->get( 'target' );
$border 		= $params->get( 'border' );
$slidespeed 	= $params->get( 'slidespeed' );
$align 	= $params->get( 'align' );
$alt_line 	= $params->get( 'alt_line' );
$credit 	= $params->get( 'credit' );

$abspath_folder = $mosConfig_absolute_path .'/'. $folder;
$the_array 		= array();
$the_image 		= array();

if (is_dir($abspath_folder)) {
	if ($handle = opendir($abspath_folder)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != '.' && $file != '..' && $file != 'CVS' && $file != 'index.html' ) {
				$the_array[] = $file;
			}
		}
	}
	closedir($handle);

	foreach ($the_array as $img) {
		if (!is_dir($abspath_folder .'/'. $img)) {
			if (eregi($type, $img)) {
				$the_image[] = $img;
			}
		}
	}

	if (!$the_image) {
		echo 'No images found';
	} else {
  	$i = count($the_image);
  	$random = mt_rand(0, $i - 1);
  	$image_name = $the_image[$random];

  	$i = $abspath_folder . '/'. $image_name;
  	$size = getimagesize ($i);

  	if ($width == '') {
  		$width = 100;
  	}
  	if ($height == '') {
  		$coeff = $size[0]/$size[1];
  		$height = (int) ($width/$coeff);
  	}
}
$image = $mosConfig_live_site .'/'. $folder .'/'. $image_name;
?>

<script language="JavaScript1.1">
<!--

//*****************************************
// Blending Image Slide Show Script- 
// © Dynamic Drive (www.dynamicdrive.com)
// For full source code, visit http://www.dynamicdrive.com/
//*****************************************

//specify interval between slide (in seconds)
var slidespeed=<?=$slidespeed?>*1000;

//specify images
var slideimages=new Array()
//specify corresponding links
var slidelinks=new Array()

var newwindow=1 //open links in new window? 1=yes, 0=no
//-->
</script>
<?php
$i = 0;
foreach ($the_image as $imag) {
		if (eregi($type, $imag)) {
		$theimage = $mosConfig_live_site .'/'. $folder .'/'. $imag;
?>
		<script language="JavaScript1.1">
			slideimages[<?= $i; ?>] = "<?= $theimage; ?>";
		</script>
<?php
		$i++;
		}
}
?>
<script language="JavaScript1.1">
var imageholder=new Array()
var ie=document.all
for (i=0;i<slideimages.length;i++){
imageholder[i]=new Image()
imageholder[i].src=slideimages[i]
}

function gotoshow(){
if (newwindow)
window.open(slidelinks[whichlink])
else
window.location=slidelinks[whichlink]
}
</script>
<style type="text/css">
<!--
.ramicradit {
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>


<div align="<?=$align?>">
		<?php if ($link) { ?>
  		<a href="<?php echo $link; ?>" target="<?=$target?>">
  		<?php } ?>
<img src="<?=$image?>" name="slide" border="<?=$border?>" style="filter:blendTrans(duration=3)" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $alt_line; ?>" alt="<?php echo $alt_line; ?>">
		<?php if ($link) { ?>
  		</a>
  		<?php } ?>
<script language="JavaScript1.1">
<!--
var whichlink=0
var whichimage=0
var blenddelay=(ie)? document.images.slide.filters[0].duration*1000 : 0
function slideit(){
if (!document.images) return
if (ie) document.images.slide.filters[0].apply()
document.images.slide.src=imageholder[whichimage].src
if (ie) document.images.slide.filters[0].play()
whichlink=whichimage
whichimage=(whichimage<slideimages.length-1)? whichimage+1 : 0
setTimeout("slideit()",slidespeed+blenddelay)
}
slideit()
//-->
</script>
</div>
<?php if ($credit == "yes"){
echo "<span class=\"ramicradit\"><a href=\"http://lady-beetle.com\" target=\"_blank\">Lady-Beetle.com</a></span>";
}
?>
  	<?php
}
?>
