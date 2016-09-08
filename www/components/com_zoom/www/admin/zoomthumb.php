<?php

//zOOm Media Gallery//

/** 

-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Jetze van der Wal                                           |
| Copyright: copyright (C) 2005 by Jetze van der Wal                  |
| http://mamboforge.net/project/zoomthumb                             |
| Description: an addition to zOOm Media Gallery;                     |
|              a Joomla! component written by                         |
|              Mike de Boer, <http://www.mikedeboer.nl>.              |
|              for Joomla!! check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: zoomthumb.php                                             |
| @Version@: 1.0.beta.1.0.                                            |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Jetze van der Wal 
**/

// MOS Intruder Alerts

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$task = mosGetParam($_REQUEST,'task');
$altid = mosGetParam($_REQUEST,'altid');

switch (strtolower($task)) {
	
	case "step2": //step1 produced galleryid, so now list thumbnails in that gallery
		//@version@ make pictures show in 30 max per page// allow sorting, on name, date etc
		echo '<div align="left" style="clear: both;">';
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step1">(back to step 1:: select gallery)</a></p>';
		echo '<p id="step"><strong>Step 2 :: choose thumbnail</strong></p>';
		$catid = mosGetParam($_REQUEST,'catid');
		if ($catid==''){
			echo '<p>Warning: no gallery id was detected in the url.</p>';
			break;
		};
		//get path for gallery
		$query = "SELECT catdir FROM #__zoom WHERE catid=".$catid;
		$database->setQuery( $query );
		$catdir = $database->loadResult();
		
		// get all images in this gallery
		$database->setQuery("SELECT * FROM #__zoomfiles WHERE catid=".$catid);
		$result = $database->query();
		
		//@version@ upgrade html styling in following urls
		while ($row = mysql_fetch_object($result)){
		    $filename = '/'.$zoom->_CONFIG['imagepath'].'/'.$catdir.'/thumbs/'.$row->imgfilename;
		    if (!is_file($mosConfig_absolute_path.$filename)) {
		    	$filename = $mosConfig_live_site.'/components/com_zoom/www/images/filetypes/generic.png';
		    } else {
		        $filename = $mosConfig_live_site.$filename;
		    }
			echo '<div style="clear: both;"><a style="float: left;" href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step3&imgid='.$row->imgid.'"><img style="margin: 2px" src="'.$filename.'"></a>Title: '.$row->imgname.'<br />Descr: '.$row->imgdescr.'<br />'.(($row->published==0)?('Warning NOT published'):('Published')).'<br />File: '.$row->imgfilename.'</div>';
		}
		
	break;
	case "step3": //select styling
		$imgid = mosGetParam($_REQUEST,'imgid');
		if ($imgid==''){
			echo '<p>Warning: no image id was detected in the url.</p>';
			break;
		};
		
		//get image properties using imgid
		$query = "SELECT * FROM #__zoomfiles WHERE imgid=".$imgid;
		$database->setQuery( $query );
		$result = $database->query();
		$row1 = mysql_fetch_object($result);
		
		//get catdir using catid from img porperties
		$query = "SELECT catdir FROM #__zoom WHERE catid=".$row1->catid;
		$database->setQuery( $query );
		$result = $database->query();
		$row2 = mysql_fetch_object($result);
		
		//display info
		echo '<div align="left" style="clear: both;">';
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step1">(back to step 1:: select gallery)</a></p>';
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step2&catid='.$row1->catid.'">(back to step 2:: select image)</a></p>';
		echo '<p id="step"><strong>Step 3 :: choose styling</strong></p>';
		
		// display image
		echo '<div style="clear: both;"><img style="margin: 2px; float: left" src="'.$mosConfig_live_site.'/'.$zoom->_CONFIG['imagepath'].'/'.$row2->catdir.'/thumbs/'.$row1->imgfilename .'"></a>Title: '.$row1->imgname.'<br />Descr: '.$row1->imgdescr.'<br />'.(($row1->published==0)?('Warning NOT published'):('Published')).'<br />File: '.$row1->imgfilename.'</div>';
		
		//get some Caption configuration settings defined in the ZoomThumb-Joomla!t-settings
		$query = "SELECT id FROM #__mambots WHERE element = 'moszoomthumb' AND folder = 'content'";
		$database->setQuery( $query );
		$id = $database->loadResult();
		$mambot = new mosMambot( $database );
		$mambot->load( $id );
		$param =& new mosParameters( $mambot->params );
		
		$showZoomcaption = $param->get('caption_show', '1'); //is mambot configured to show caption by default?
		$captionlength = $param->get('caption_length', '0'); //max length of caption
		
		$defaultcaption =($captionlength<>'0')?(substr($row1->imgdescr,0,intval($captionlength))):$row1->imgdescr;
		//// compute default value
		if($showZoomcaption=='1'){
			$defaultcaptionlabel = 'Default, use Zoom Gallery caption : '.$defaultcaption ;
		} else {
			$defaultcaptionlabel = 'Default, no caption used';
		};
		
		$captionwarning =($captionlength <> '0')?(':: caption length is limited to '.$captionlength.' characters'):('');
		
		// create form code for selection of specific mambot codes
		echo '<div style="clear: both;">';
		echo '<form  name="zoomthumbform" action="index'.(($zoom->_isBackend) ? "2" : "").'.php?option=com_zoom&Itemid='.$Itemid.'&task=step4&catid='.$row1->catid.'&imgid='.$imgid.'&page=zoomthumb" method="POST">';
		echo '<p>Select the style for the main box (containing both the image as well as the caption):</p>';
		echo '<input type="radio" name="style_m" value="1" checked> Style 1 (is default)'.$param->get('div_mother_1_descr', '').'<br />';
		echo '<input type="radio" name="style_m" value="2"> Style 2'.$param->get('div_mother_2_descr', '').'<br />';
		echo '<input type="radio" name="style_m" value="3"> Style 3'.$param->get('div_mother_3_descr', '').'<br />';
		echo '<input type="radio" name="style_m" value="4"> Style 4'.$param->get('div_mother_4_descr', '').'<br />';
		echo '<p>Select the style for the image box:</p>';
		echo '<input type="radio" name="style_i" value="1" checked> Style 1 (is default)'.$param->get('image_2_descr', '').'<br />';
		echo '<input type="radio" name="style_i" value="2"> Style 2 '.$param->get('image_2_descr', '').'<br />';
		echo '<p>Select the style for the caption box:</p>';
		echo '<input type="radio" name="style_c" value="1" checked> Style 1 (is default)'.$param->get('div_caption_1_descr', '').'<br />';
		echo '<input type="radio" name="style_c" value="2"> Style 2 '.$param->get('div_caption_1_descr', '').'<br />';
		echo '<p>Caption options '.$captionwarning.'</p>';
		echo '<input type="radio" name="caption" value="1" checked>'.$defaultcaptionlabel.'<br />';
		echo '<input type="radio" name="caption" value="2">Do not use a caption<br />';
		//@nextversion@0.9.0 :: get next onclick javascript to work
		//@nextversion@0.9.0 :: maybe allow user to display Zoom Caption despite mambot config says not to?
		echo '<input type="radio" name="caption" value="3">Use following caption: <textarea rows="3" cols="25" name="altcaptiontext" ></textarea><br />Note: do not enter any of the following characters: &quot; { } ( ) or =<br />';
		echo '<br /><input type="submit" value="Finish up :: generate mambot code"><br />';
		echo '<p>Note: styles and caption options are both defined in the main configuration settings of the Zoom Thumb mambot.</p>';
		echo '';
		//alternative caption
		echo '';
		echo '</form>';
		echo '</div>';
	break;
	case "step4":// show mambotcode
		echo '<div align="left" style="clear: both;">';
		
		$imgid= mosGetParam($_REQUEST,'imgid');
		$catid= mosGetParam($_REQUEST,'catid');
		$style_m = mosGetParam($_REQUEST,'style_m');
		$style_i = mosGetParam($_REQUEST,'style_i');
		$style_c = mosGetParam($_REQUEST,'style_c');
		$captionOption = mosGetParam($_REQUEST,'caption');
		$captionAlttext = mosGetParam($_REQUEST,'altcaptiontext');
		
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step1">(back to step 1:: select gallery)</a></p>';
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step2&catid='.$catid.'">(back to step 2:: select image)</a></p>';
		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step3&imgid='.$imgid.'">(back to step 3:: select styling)</a></p>';
		echo '<p id="step"><strong>Step 4 :: the resulting mambot code</strong></p>';
		
		if ($imgid==''){
			echo '<p>Warning: no image id was detected in the url.</p>';
			break;
		};
		
		echo '<p>Copy Paste the following code into your text</p>';
		
		
		$thumbzoomcode .= '{moszoomthumb';
		$thumbzoomcode .= ' imgid='.$imgid;
		
		$thumbzoomcode .= ($style_m<>'1')?(' style_m='.$style_m):('');
		$thumbzoomcode .= ($style_i<>'1')?(' style_i='.$style_i):('');
		$thumbzoomcode .= ($style_c<>'1')?(' style_c='.$style_c):('');
		
		switch ($captionOption){
			case '2':
				$thumbzoomcode .= ' caption=(none)';
			break;
			case '3':
				$thumbzoomcode .= ' caption=('.$captionAlttext.')';
			break;
		};
		
		$thumbzoomcode .= '}';
		
		echo '<form  name="zoomthumbcode">';
		//@work@ add copytoclipboard button;
		echo '<textarea rows="3" cols="25" name="zoomthumbcode">'.$thumbzoomcode.'</textarea>';
		//echo '<input type="text" name="zoomthumbcode" size="40" value="'.$thumbzoomcode.'">';
		echo '</form>';
		
		
		
	break;
	
	case "step1": //select source gallery
	default: //step 1
		//@version@: add language, add better list by using mothernames as well
		echo '<div align="left"><p id="step"><strong>Step 1 :: choose gallery</strong></p>';
		$zoom->_CAT_LIST = null;
		$zoom->_getCatList(0, '>&nbsp;', '>&nbsp;');
		
		if(isset($zoom->_CAT_LIST)){
			foreach($zoom->_CAT_LIST as $category){
		 		echo '<p><a href="index'.$backend.'.php?option=com_zoom&Itemid='.$Itemid.'&page=zoomthumb&task=step2&catid='.$category['id'].'">Select:: </a> '.$category['catname']. '</p>';
			}
		}else{ 
			//@version@::get language here
			echo '<p>No gallery found.</p>';
		};
		
};

//too much fluf at the bottom of the page right now due to all the embedding. So i add a lot of height to clear things up
echo '<div align="left" style="clear: both; height: 300px;"></div><a href="http://mamboforge.net/projects/zoomthumb/@work@">Zoom Thumb</a>, use your Zoom gallery images in your Joomla! content.<hr></div>';




?>
