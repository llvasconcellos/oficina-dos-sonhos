<?php
/**
* Content code
* @package Header Image Module - SLIDESHOW IMAGE MODULE
* @ Copyright (C) 2005 Mike Pillwax
* @ http://www.pillwax.com
* @ All rights reserved
* @ Header Image is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @ Version for Joomla! 1.0.x
*
* 1.0  - Initial version.
**/


// Build the image file list, we use the initially found image as the starter image
// and look for additional images that carry a # sign at the end with any number
// eg. ..._#001, ..._#002, ..._#003

$gallery = "HeaderImage";
$filter = $ImagePrefix . $my_image_id;


// Generate the slideshow image list
if ( file_exists( $_mosConfig_absolute_path.$imagesFolder ) ) {
	// Create an array for all files found
 	$tmp = Array();
	if ($dir = opendir( $_mosConfig_absolute_path.$imagesFolder )) {
		// Add the files
	  while($file = readdir($dir)) {
	    	// Make sure the file exists, disregard any entries that are not files
	     	if (($file != ".") && ($file != "..") && ($file[0] != '.') && (strrpos($file,'.') !== false)) {

					// If the current file is part of a slideshow, store the filename
					if ( preg_match( '/'.$filter.'(\.|_[0-9])/', $file ) > 0 ) { array_push( $tmp, $imagesFolder.$file ); }

	     	}
	  }
   	// Finish off the function
   	closedir($dir);
	}

	if ( count($tmp)>0 ) {
		// Sort all identified slideshow files and build the file list for the client
  	sort($tmp, SORT_STRING);
  }

}

// In case no image files are found, see if we may display random images
if ( (count($tmp) == 0) and ($UseRandomImage=='1') and ($RandomImagesFolder != '') and ($Slideshow_RandomImagesNr > 0) ) {

	// Try to open the directory
 	if ( file_exists( $_mosConfig_absolute_path . $RandomImagesFolder ) ) {
  	if ($dir = opendir( $_mosConfig_absolute_path . $RandomImagesFolder )) {
  			// Create an array for all files found
  	   	$tmp = Array();
  	   	$files = Array();
  			// Make a file list of all random images
  	   	while ($file = readdir($dir)) {
  		    	// Make sure the file exists, disregard any entries that are not files
  	       	if (($file != ".") && ($file != "..") && ($file[0] != '.') && (strrpos($file,'.') !== false)) {
  	        	array_push($files, $RandomImagesFolder.$file);
  	       	}
  	   	}
  	   	// Finish off the function
  	   	closedir($dir);

  	   	// Make a random choice from the files found
  	   	if ( count($files)>0 ) {
					if ( $Slideshow_RandomImagesNr > count($files) ) { $Slideshow_RandomImagesNr = count($files); }
					$rand_files = array_rand($files, $Slideshow_RandomImagesNr);
					if( !is_array($rand_files) ) { $rand_files = array($rand_files); } // make sure it stays an array
					// Build the randomized file list
					foreach ( $rand_files as $key ) {
						array_push($tmp,$files[$key]);
					}
  			}
    }

		// send some debug info on the random file
		if( $debug=='1' ) {
			echo 'This is a random file slideshow. <br>';
		}
 	}

}


if ( count($tmp) > 0 ) {

	// Send the Header
	echo "<!-- HEADER IMAGE SLIDE SHOW -->\n";

	// Send the file list to the browser
  echo "<script type=\"text/javascript\">
					var $gallery = new Array()
			 ";

	$i=0;
	$width_max=0;
	$height_max=0;
  foreach ( $tmp as $file ) {
		// get image sizes 
		list($width, $height, $type, $attr) = getimagesize("$mosConfig_absolute_path$file", $info);
		if ( $width > $width_max) { $width_max = $width; }
		if ( $height > $height_max) { $height_max = $height; }		

		echo $gallery."[".$i."] = [\"$mosConfig_live_site$file\",\"\",\"\",\"$ImageAltText\"]\n";

		$i++;
	}
	echo "</script>\n";

	// Invoke the slideshow script
	switch ($Slideshow_Transition) {
		case "fade":
			echo "<script type=\"text/javascript\" src=\"$mosConfig_live_site/modules/mod_header_image/mhi_slideshow_fade.js\"></script>\n";
			break;
		
		case "slide-l2r":
			echo "<script type=\"text/javascript\" src=\"$mosConfig_live_site/modules/mod_header_image/mhi_slideshow_slide-l2r.js\"></script>\n";
			break;
	}

	// Send the Slideshow content
	echo "<script type=\"text/javascript\">\n";

	// Select the slideshow script
	switch ($Slideshow_Transition) {
		case "fade":
			echo "	new fadeshow($gallery, $width_max, $height_max, $ImageBorder, \"$Slideshow_BackgroundColor\", $Slideshow_Frequency, $Slideshow_Pause, \"$Slideshow_RandomOrder\")\n";
			break;
		
		case "slide-l2r":
			echo "	new slideshow($gallery, $width_max, $height_max, $ImageBorder, \"$Slideshow_BackgroundColor\", $Slideshow_Frequency, $Slideshow_Pause, \"$Slideshow_RandomOrder\")\n";
			break;
	}

	echo "</script>
				<!-- HEADER IMAGE SLIDE SHOW END -->
			";

} else {

	// No files for a slideshow found, disable Slideshow
	$Slideshow = 0;

}

?>