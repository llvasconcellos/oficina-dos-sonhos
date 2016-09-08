<?php

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/
    
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class mosxegallerypro extends mosDBTable {

  var $id=null;

  var $catid=null;

  var $imgtitle=null;

  var $imgauthor=null;

  var $imgtext=null;

  var $imgdate=null;

  var $imgcounter=null;

  var $imgvotes=null;

  var $imgvotesum=null;

  var $published=null;

  var $imgfilename=null;

  var $imgthumbname=null;
  
  var $imgordering=null;

  var $checked_out=null;
  
  var $owner=null;
  var $approved=null;
  var $useruploaded=null;



  function mosxegallerypro( &$db ) {

    $this->mosDBTable( '#__xegallerypro', 'id', $db );

  }
}
  
?>

<?php
class mosCatgs extends mosDBTable {
	/** @var int Primary key */
	var $cid=null;
	/** @var string */
	var $name=null;
	/** @var string */
	var $description=null;
	/** @var string */
	var $parent=null;
	/** @var string */
	var $published=null;
	/** @var string */
	var $ordering=null;
	/** @var int */
	var $access=null;
        /**
        * @param database A database connector object
        */
        function mosCatgs( &$db ) {
                $this->mosDBTable( '#__xegallerypro_catg', 'cid', $db );
        }

        function check() {
                $this->cid = intval( $this->cid );
                return true;
        }
}



?>

