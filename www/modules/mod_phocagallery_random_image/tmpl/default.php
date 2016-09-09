<?php // no direct access
defined('_JEXEC') or die('Restricted access');

if ($phocagallery_module_width !='') {
	$pgWidth ='width:'.$phocagallery_module_width.'px;';
} else {
	$pgWidth = '';
}


?>
<div id ="phocagallery-module-ri" style="text-align:center;<?php echo $pgWidth;?>">


<center><?php
foreach ($output as $value) {
	echo $value;
}
?></center>


</div>
<div style="clear:both"></div>

