<?php

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



require_once( $mainframe->getPath( 'front_html' ) );



$Itemid = mosGetParam( $_REQUEST, "Itemid", "" );



showGame($Itemid);



function showGame($Itemid){

	$swf="expose.html";

	expose_html::writeGameFlash($swf);

}



?>