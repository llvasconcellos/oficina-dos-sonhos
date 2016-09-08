<?php
/**
* Content code
* @package Header Image Module - STATIC IMAGE MODULE
* @ Copyright (C) 2005 Mike Pillwax
* @ http://www.pillwax.com
* @ All rights reserved
* @ Header Image is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @ Version for Joomla! 1.0.x
*
* 1.0  - Initial version moved from module with v-1.57
**/

// Send the info for the CSS-Class with suffix
if ($ImageFileType=='image') {
	echo '<div class="moduletable' . $moduleclass_sfx . '">';
}

// For wildcard extension, look for the real file extension
if ( substr($my_image,-2,2) == '.*' ) {

  // remove the wildcard from the filename
  $my_image=substr($my_image,0,strlen($my_image)-2);

	// send some debug info on the wildcarded file
	if ( $debug=='1' ) { echo 'Looking for file: '.$my_image."<br>"; }

  // Find the file and get the full name
  $tmp_filename = '';

	// Try to open the storage directory
	$search_dir = $_mosConfig_absolute_path . $imagesFolder;
	if ( $ComponentSpecificFiles == 1 ) { $search_dir .= $my_component; }
	
	if ( file_exists($search_dir) ) {
		if($dir = opendir($search_dir)) {

    		// Look through the files
    	  while ( ($file = readdir($dir)) and ($tmp_filename == '') ) {
    	   	// Make sure the current entry is a file, disregard any entries that are not files
  	       	if (($file != ".") && ($file != "..") && ($file[0] != '.') && (strrpos($file,'.') !== false)) {
	            // If file matches, save the name
	            if ( strtolower(reverse_strrchr($file,'.')) == strtolower($my_image) ) { $tmp_filename = $file; }
	            // Debug info on the files found
	            if ( $debug=='1' ) { echo "File found: ".$file."<br>"; }
            }
  	   	}

  	   	// Finish off the function
  	   	closedir($dir);

        // If the wildcarded file was found, assign it as the file to send
        if ( $tmp_filename != '' ) {
            $my_image = $tmp_filename;
            // Tell in debug mode which file is the match
            if ( $debug=='1' ) { echo "Match is: ".$my_image.chr(10)."<br>"; }
        } else {
            // Tell in debug mode that no matching file was found
            if ( $debug=='1' ) { echo "No Match !<br>"; }
        }
    	}
    }

    // if no wildcard file was found, default image - but only if randomization is off
    if ( $tmp_filename == '' ) {
        if ( ( $UseRandomImage=='1' ) and ( $RandomImagesFolder != '' )) {
            $my_image = "";
        } else {
            if ( $UseAdefaultImage == '1') { $my_image = $defaultImageFilename; } else { $my_image = ""; }
        }
    }
}

if ($my_image != "") {
		if ( $ComponentSpecificFiles == 1 ) {
	    $my_image_url = $_mosConfig_live_site . $imagesFolder . $my_component.'/'.$my_image;
	    $my_image_file = $_mosConfig_absolute_path . $imagesFolder . $my_component.'/'.$my_image;
	  } else {
	    $my_image_url = $_mosConfig_live_site . $imagesFolder . $my_image;
	    $my_image_file = $_mosConfig_absolute_path . $imagesFolder . $my_image;
	  }
    if ( file_exists($my_image_file) === false ) { $my_image_file = ""; }
}

// Check if file actually exists, if not use default file
// This makes sure that at least the default image is shown
if ( $my_image_file != "" ) {

	// send the URL-Tag for the hyperlink if there is one defined, only in Image or HTML mode
	switch ($ImageFileType) {
		case 'image' or 'html':
			if ($ImageHyperLink != '') { echo '<a href="' . $ImageHyperLink . '">'; }
			break;
	}

	// send the image html info
	switch ($ImageFileType) {
		case 'image':
      // smart use of files - insert a html file or send an image tag for all other files
      if ( substr(strtolower($my_image_file),-4,4) == 'html') {
          echo chr(10) . implode('', file($my_image_file));
      } else {
          // Include Tooltip if defined
          if ( $ImageToolTip and ($ImageToolTipText!='') ) {
              echo "<script language=\"javascript\" type=\"text/javascript\">\n<!-- <![CDATA[ \n";
        			echo "function showTooltipBox( iToolTipText, iToolTipTitle, iToolTipWidth, iToolTipHeight ) {\n";
        			echo "	return overlib(iToolTipText, CAPTION, iToolTipTitle, ABOVE, RIGHT, WIDTH, iToolTipWidth, HEIGHT, iToolTipHeight);\n";
        			echo "}\n";
        			echo "// ]]> -->\n</script>";
        			echo "<span class=\"dm_link_tooltip\" onmouseover=\"javascript:showTooltipBox( '$ImageToolTipText', '$ImageToolTipTitle', '$ImageToolTipWidth', '$ImageToolTipHeight' )\" onmouseout=\"return nd();\"><img src=\"$my_image_url\" border=\"$ImageBorder\" class=\"moduletable$moduleclass_sfx\" /></span>";
          } else {
              echo "<img src=\"$my_image_url\" alt=\"$ImageAltText\" border=\"$ImageBorder\" class=\"moduletable$moduleclass_sfx\" />";
          }
      }
			break;
		case 'html':
      $HTMLCode = str_replace('<br />','', $HTMLCode);
			$HTMLCode = str_replace('#__image', $my_image_url, $HTMLCode);
			echo $HTMLCode;
      // Do not show the tooltip for html-files
      $ImageToolTip='0';
			break;
		case 'table':
			echo $my_image_url;
			break;
	}

	// send the hyperlink end tag, only in Image and HTML mode
	switch ($ImageFileType) {
		case 'image' or 'html':
			if ($ImageHyperLink != '') { echo '</a>'; }
			break;
	}

} else {

	// We only need to deal with a default image if the option is set, otherwise send nothing.
	if ( $UseAdefaultImage == '1' ) {

		// send the URL-Tag for the hyperlink if there is one defined and activated also for the default image
		// only in Image or HTML mode
		switch ($ImageFileType) {
			case 'image' or 'html':
				if (($ImageHyperLinkOnDefault == '1') and ($ImageHyperLink != '')) { echo '<a href="' . $ImageHyperLink . '">'; }
				break;
		}
	
		// Use the default image in case no other image can be determined
		$my_image = $imagesFolder . $defaultImageFilename;
	
		// if random image is active, randomly use one of the images from the defined folder
		if ( ($UseRandomImage=='1') and ($RandomImagesFolder != '')) {
	
			// Try to open the directory
	   	if ( file_exists($_mosConfig_absolute_path . $RandomImagesFolder) ) {
	    	if ($dir = opendir($_mosConfig_absolute_path . $RandomImagesFolder)) {
	    			// Create an array for all files found
	    	   	$tmp = Array();
	    			// Add the files
	    	   	while($file = readdir($dir)) {
	    		    	// Make sure the file exists, disregard any entries that are not files
	    	       	if (($file != ".") && ($file != "..") && ($file[0] != '.') && (strrpos($file,'.') !== false)) {
	    	        	array_push($tmp, $file);
	    	       	}
	    	   	}
	    	   	// Finish off the function
	    	   	closedir($dir);
	
	    	   	// Make a random choice from the files found
	    	   	if (count($tmp)>0) {
	    			$random_image = $tmp[mt_rand(0,count($tmp)-1)];
	    			if ( $random_image != '' ) {
	    					$my_image = $RandomImagesFolder . $random_image;
	    			}
	       	}
	
	    		// send some debug info on the random file
	    		if( $debug=='1' ) {
	    			echo 'This is a random file. <br>';
	    		}
	    	}
	   	}
	
		}
	
		$my_image_url = $_mosConfig_live_site . $my_image;
		$my_image_file = $_mosConfig_absolute_path . $my_image;
	
		// send the image html info
		switch ($ImageFileType) {
			case 'image':
	            // smart use of files - insert a html file or send an image tag for all other files
	            if ( substr(strtolower($my_image_file),-4,4) == 'html') {
	                echo chr(10) . implode('', file($my_image_file));
	            } else {
	                // Include Tooltip if defined
	                if ( $ImageToolTip and ($ImageToolTipText!='') ) {
	                    echo "<script language=\"javascript\" type=\"text/javascript\">\n<!-- <![CDATA[ \n";
				        			echo "function showTooltipBox( iToolTipText, iToolTipTitle, iToolTipWidth, iToolTipHeight ) {\n";
				        			echo "	return overlib(iToolTipText, CAPTION, iToolTipTitle, ABOVE, RIGHT, WIDTH, iToolTipWidth, HEIGHT, iToolTipHeight);\n";
				        			echo "}\n";
				        			echo "// ]]> -->\n</script>";
				        			echo "<span class=\"dm_link_tooltip\" onmouseover=\"javascript:showTooltipBox( '$ImageToolTipText', '$ImageToolTipTitle', '$ImageToolTipWidth', '$ImageToolTipHeight' )\" onmouseout=\"return nd();\"><img src=\"$my_image_url\" border=\"$ImageBorder\" class=\"moduletable$moduleclass_sfx\" /></span>";
	                } else {
	                    echo "<img src=\"$my_image_url\" alt=\"$ImageAltText\" border=\"$ImageBorder\" class=\"moduletable$moduleclass_sfx\" />";
	                }
	            }
				break;
			case 'table':
				echo $my_image_url;
				break;
			case 'html':
	            $HTMLCode = str_replace('<br />','', $HTMLCode);
				$HTMLCode = str_replace('#__image', $my_image_url, $HTMLCode);
				echo $HTMLCode;
				break;
		}
	
		// send the hyperlink end tag only in Image and HTML mode
		switch ($ImageFileType) {
			case 'image' or 'html':
				if (($ImageHyperLinkOnDefault == '1') and ($ImageHyperLink != '')) { echo '</a>'; }
				break;
		}
	}	
}

// no more output, end the CSS section
if ($ImageFileType=='image') {
	echo '</div>';
}

?>
