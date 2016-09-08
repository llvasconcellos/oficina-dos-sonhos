<?php
/**
* Content code
* @package MambelFish multi-language integration
* @ Copyright (C) 2006 Mike Pillwxa
* @ http://www.pillwax.com
* @ All rights reserved
* @ Header Image is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @ Version for Joomla 1.0.x
*
* 1.0  	- Initial version.
* 1.0.1 - Fix for empty delimiter
* 1.0.2 - Fix for incorrect languange comparison
* 1.0.3 - Correction on language comparison
* 1.0.4 - Further correction on language comparison
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function LocalizeText ( $title ) {
    // Multiple Language support with MambelFish
    // added by Michael Pillwax - PILLWAX Industrial Solutions Consulting
    // http://www.pillwax.com

   	global $mosConfig_locale, $mosConfig_mbf_content;

    // No MambelFish, get out
    if ( $mosConfig_mbf_content != '1' ) {
        return $title;
    }

    // Get the current site language
    $language = strtolower( mosGetParam( $_REQUEST, "lang", "") );
    if ( ($language == "") and ($mosConfig_mbf_content == '1') ) {
        // If Language information not in Request Header it might be available through client cookie of MambelFish
        $mbfcookie = mosGetParam( $_COOKIE, 'mbfcookie', null );
    	if (isset($mbfcookie["lang"]) && $mbfcookie["lang"] != "") {
    		$language = strtolower( $mbfcookie["lang"] );
    	}
    }
    // If still no language found, use the local language of the installation
    if ( $language == '') { $language = strtolower( $mosConfig_locale ); }

		if ( $language ) {

	    // Split the title into the different language parts:
	    // Example: en=English|de=Deutsch
	    $lang_title = preg_split('/(=|\|)/',$title);
	    $i=0;
	
	    while ( $i<count($lang_title) ) {
					if ( $lang_title[$i] ) {
		        if ( strpos( $language, strtolower($lang_title[$i]) ) !== false ) {
		            if ( ($i+1)<=count($lang_title) ) { $title = $lang_title[$i+1]; }
		        }
					}
	        $i=$i+2;
	    }

		}

    return $title;
}

?>