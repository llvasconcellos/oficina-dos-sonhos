<?php
/**
* HeXimage_album - A Mambo/Joomla! module for showing/blocking IP's
* @version 2.1.2
* @package HeXimage_album
* @copyright (C) 2006 by A.J.W.P. Ruitenberg - All rights reserved!
* 
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
global $mosConfig_absolute_path;

require($mosConfig_absolute_path."/administrator/components/com_heximage/config.heximage.php");
    if (file_exists($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php')) {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/'.$mosConfig_lang.'.php');
    } else {
      include($mosConfig_absolute_path.'/components/com_heximage/languages/english.php');
    }
// get parameters from mod file
$params->def('amount'); 
$params->def('sort'); 
// set VAR
$amnt = $params->def('amount'); 
$srt = $params->def('sort'); 
// set SQL
$query = "SELECT * FROM #__heximage_album WHERE published = '1' ORDER BY album_name $srt LIMIT $amnt";
$database->setQuery( $query );
$rows = $database->loadObjectList();
$item_count = count($rows);

// replace functions
$nospace = str_replace (" ", "%20", $row->album_name);

if ($item_count == 0){ echo _HeXimage_AnPa ;}
else{
?>
<ul>
<?php foreach ($rows as $row) {	?>
  <li><a href="index.php?option=com_heximage&task=selector&albumselected=<?php echo $row->album_name;?>"><?php echo $row->album_name; ?></a></li>
<?php } ?>
</ul>
<?php } ?>