<?php
// Header Image Module//
// Include File for common functions //
/**
* Content code
* @package Header Image Module
* @ Copyright (C) 2005 Mike Pillwxa
* @ http://www.pillwax.com
* @ All rights reserved
* @ Header Image is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @ Version for Mambo 4.2.x
*
* 1.0  - Initial version.
**/

function reverse_strrchr($haystack, $needle)
{
   $pos = strrpos($haystack, $needle);
   if($pos === false) {
       return $haystack;
   }
   return substr($haystack, 0, $pos);
}

?>