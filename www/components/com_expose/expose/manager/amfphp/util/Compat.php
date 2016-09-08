<?php

if (!function_exists("ob_get_clean")) {
   function ob_get_clean() {
       $ob_contents = ob_get_contents();
       ob_end_clean();
       return $ob_contents;
   }
}

?>