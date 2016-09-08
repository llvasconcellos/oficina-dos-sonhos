<?php
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/

// ensure this file is being included by a parent file
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* heximage album table class
*/
class mosheximage_album extends mosDBTable {
  // INT(11) AUTO_INCREMENT
  var $albumid=null;
  // TEXT
  var $album_name=null;
  // TEXT
  var $album_description=null;  
  // TINYINT(1)
  var $published=null;

/**
* @param database A database album connector object
*/
 function mosheximage_album( &$db ) {
    $this->mosDBTable( '#__heximage_album', 'albumid', $db );

}}
/**
* heximage photo table class
*/
class mosheximage_photo extends mosDBTable {
 // INT(11) AUTO_INCREMENT
 var $photoid=null;
 // TEXT
 var $album_type=null;
 //varchar(255)
 var $thumb=null; 
 //varchar(255)
 var $url=null;
  // TEXT
 var $description=null;
  // SMALLINT(4)
 var $hsize=null;
 // SMALLINT
  var $vsize=null; 
  // CHAR(1)
  var $published=null; 
/**
* @param database A database album connector object
*/
  function mosheximage_photo( &$db ) {
   $this->mosDBTable( '#__heximage_photo', 'photoid', $db );	  
}}
?>
