<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @module Phoca - Phoca Module
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz 
 *							Willem Hilders www.willemhilders.nl
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');// no direct access
include_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_phocagallery'.DS.'helpers'.DS.'phocagallery.php' );
include_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_phocagallery'.DS.'helpers'.DS.'phocagalleryrender.php' );
include_once( JPATH_SITE.DS.'components'.DS.'com_phocagallery'.DS.'helpers'.DS.'phocagallery.php' );
require_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_phocagallery'.DS.'helpers'.DS.'phocalibrary.php' );

$user 				= &JFactory::getUser();
$db 				= &JFactory::getDBO();
$menu 				= &JSite::getMenu();
$document			= &JFactory::getDocument();
//$tmpl['formaticon'] = PhocaGalleryHelperFront::getFormatIcon();
$library 			= &PhocaLibrary::getLibrary();

// LIBRARY
$libraries['pg-css-ie-mri'] 			= $library->getLibrary('pg-css-ie-mri');
$libraries['pg-css-ie-hover']			= $library->getLibrary('pg-css-ie-hover');
$libraries['pg-group-shadowbox']		= $library->getLibrary('pg-group-shadowbox');
$libraries['pg-group-highslide']		= $library->getLibrary('pg-group-highslide');

// CSS
$document->addStyleSheet(JURI::base(true).'/modules/mod_phocagallery_random_image/assets/phocagallery_module_random_image.css');


if ( $libraries['pg-css-ie-mri']->value == 0 ) {
	$document->addCustomTag("<!--[if lt IE 8]>\n<link rel=\"stylesheet\" href=\"".JURI::base(true)."/modules/mod_phocagallery_random_image/assets/phocagallery_moduleieall_random_image.css\" type=\"text/css\" />\n<![endif]-->");
	$library->setLibrary('pg-css-ie-mri', 1);
}

// PARAMS - direct from Phoca Gallery Global configuration
$component 		= 'com_phocagallery';
$table 			=& JTable::getInstance('component');
$table->loadByOption( $component );
$paramsC	 	= new JParameter( $table->params );

// PARAMS
$tmpl['formaticon'] 		= $paramsC->get( 'icon_format', 'gif' );
$limit_start 				= $params->get( 'limit_start', 0 );
$limit_count 				= $params->get( 'limit_count', 1 );
$category_id 				= $params->get( 'category_id', '' );
// Display Description in Detail window ---
$display_description_detail = $params->get( 'display_description_detail', 0 );
// Display Description in Detail window - set the height of description text
$description_detail_height 	= $params->get( 'description_detail_height', 16 );
// Image categories
$img_cat_size				= 'medium';
// Display # pictures
$display_categories         = $params->get( 'display_categories', '' );
$display_not_categories     = $params->get( 'display_not_categories', '' );
// Font
$font_color 				= $params->get( 'font_color', '#135cae' );
$background_color 			= $params->get( 'background_color', '#fcfcfc' );
$background_color_hover 	= $params->get( 'background_color_hover', '#f5f5f5' );
$image_background_color 	= $params->get( 'image_background_color', '#f5f5f5' );
$border_color 				= $params->get( 'border_color','#e8e8e8' );
$border_color_hover 		= $params->get( 'border_color_hover','#135cae' );
$phocagallery_module_width 	= $params->get( 'phocagallery_module_width', '' );
// Display or hide name, icon detail link
$display_name 				= $params->get( 'display_name', 1 );
$display_icon_detail 		= $params->get( 'display_icon_detail', 1 );
$display_icon_download 		= $params->get( 'display_icon_download', 0 );
// Font
$font_size_name 			= $params->get( 'font_size_name', 12 );
$char_length_name 			= $params->get( 'char_length_name', 11 );
// Open window parameters - modal popup box or standard popup window
$tmpl['detailwindow'] = $params->get( 'detail_window', 0 );
// Get image height and width
$medium_image_width 		= $paramsC->get( 'medium_image_width' , 100 );
$medium_image_height 		= $paramsC->get( 'medium_image_height', 100 );
$front_modal_box_width 		= $paramsC->get( 'front_modal_box_width', 680 );
$front_modal_box_height 	= $paramsC->get( 'front_modal_box_height', 560 );
$front_popup_window_width 	= $paramsC->get( 'front_popup_window_width', 680 );
$front_popup_window_height 	= $paramsC->get( 'front_popup_window_height', 560 );
// CSS
$image_background_shadow 	= $params->get( 'image_background_shadow', 'none' );
		
if ( $image_background_shadow != 'none' ) {	
	$imageBgCSS = 'background: url(\''.JURI::base(true).'/components/com_phocagallery/assets/images/'.$image_background_shadow.'.'.$tmpl['formaticon'].'\') 0 0 no-repeat;';
} else {
	$imageBgCSS = 'background: '.$image_background_color .';';
}
	
$document->addCustomTag( "<style type=\"text/css\">\n"
						." #phocagallery-module-ri .name {color: $font_color ;}\n"
						." #phocagallery-module-ri .phocagallery-box-file {background: $background_color ; border:1px solid $border_color ;}\n"
						." #phocagallery-module-ri .phocagallery-box-file-first { $imageBgCSS }\n"
						." #phocagallery-module-ri .phocagallery-box-file:hover, .phocagallery-box-file.hover {border:1px solid $border_color_hover ; background: $background_color_hover ;}\n"
						." </style>\n");

if ( $libraries['pg-css-ie-hover']->value == 0 ) {
	$document->addCustomTag( PhocaGalleryHelperRender::renderIeHover());
	$library->setLibrary('pg-css-ie-hover', 1);
}
//END CSS

// PARAMS
if ($display_description_detail == 1) {
	$front_popup_window_height	= $front_popup_window_height + $description_detail_height;
}
// PARAMS - Height of box
$category_box_space 	= $params->get( 'category_box_space', 0 );
// PARAMS - Display Buttons (height will be smaller)
$detail_buttons 	= $params->get( 'detail_buttons', 1 );
// PARAMS - Detail buttons
if ($detail_buttons != 1) {
	$front_popup_window_height	= $front_popup_window_height - 45;
}

// PARAMS
$modal_box_overlay_color 	= $params->get( 'modal_box_overlay_color', '#000000' );
$modal_box_overlay_opacity 	= $params->get( 'modal_box_overlay_opacity', 0.3 );
$modal_box_border_color 	= $params->get( 'modal_box_border_color', '#6b6b6b' );
$modal_box_border_width 	= $params->get( 'modal_box_border_width', '2' );

// Window
// =======================================================
// DIFFERENT METHODS OF DISPLAYING THE DETAIL VIEW
// =======================================================
		
// MODAL - will be displayed in case e.g. highslide or shadowbox too, because in there are more links 
JHTML::_('behavior.modal', 'a.modal-button');

// CSS 
$document->addCustomTag( "<style type=\"text/css\"> \n"  
	." #sbox-window.phocagallery-random-window   {background-color:".$modal_box_border_color.";padding:".$modal_box_border_width."px} \n"
	." #sbox-overlay.phocagallery-random-overlay  {background-color:".$modal_box_overlay_color.";} \n"			
	." </style> \n");
	

// BUTTON (IMAGE - standard, modal, shadowbox)
$button = new JObject();
$button->set('name', 'image');

// BUTTON (ICON - standard, modal, shadowbox)
$button2 = new JObject();
$button2->set('name', 'icon');

// BUTTON OTHER (geotagging, downloadlink, ...)
$buttonOther = new JObject();
$buttonOther->set('name', 'other');

$tmpl ['highslideonclick']	= '';// for using with highslide
		
// -------------------------------------------------------
// STANDARD POPUP
// -------------------------------------------------------

if ($tmpl['detailwindow'] == 1) {
	$button->set('methodname', 'js-button');
	$button->set('options', "window.open(this.href,'win2','width=".$front_popup_window_width.",height=".$front_popup_window_height.",menubar=no,resizable=yes'); return false;");
	
	$button2->methodname 		= &$button->methodname;
	$button2->options 			= &$button->options;
	$buttonOther->methodname  	= &$button->methodname;
	$buttonOther->options 		= &$button->options;
	
}

// -------------------------------------------------------
// MODAL BOX
// -------------------------------------------------------

else if ($tmpl['detailwindow'] == 0 || $tmpl['detailwindow'] == 2) { 
	
	// Button
	$button->set('modal', true);
	$button->set('methodname', 'modal-button');
	
	$button2->modal 			= &$button->modal;
	$button2->methodname 		= &$button->methodname;
	$buttonOther->modal 		= &$button->modal;
	$buttonOther->methodname  	= &$button->methodname;
	
	// Modal - Image only
	if ($tmpl['detailwindow'] == 2) {
		
		$button->set('options', "{handler: 'image', size: {x: 200, y: 150}, overlayOpacity: ".$modal_box_overlay_opacity.", classWindow: 'phocagallery-random-window', classOverlay: 'phocagallery-random-overlay'}");
		$button2->options 		= &$button->options;
		$buttonOther->set('options', "{handler: 'iframe', size: {x: ".$front_modal_box_width.", y: ".$front_modal_box_height."}, overlayOpacity: ".$modal_box_overlay_opacity.", classWindow: 'phocagallery-random-window', classOverlay: 'phocagallery-random-overlay'}");
	
	// Modal - Iframe 			
	} else {
	
		$button->set('options', "{handler: 'iframe', size: {x: ".$front_modal_box_width.", y: ".$front_modal_box_height."}, overlayOpacity: ".$modal_box_overlay_opacity.", classWindow: 'phocagallery-random-window', classOverlay: 'phocagallery-random-overlay'}");
		$button2->options 		= &$button->options;
		$buttonOther->options  	= &$button->options;
	
	}
} 

// -------------------------------------------------------
// SHADOW BOX
// -------------------------------------------------------

else if ($tmpl['detailwindow'] == 3) {

	// Random Number - because of more modules on the site
	$randName	= 'PhocaGalleryRIM' . substr(md5(uniqid(time())), 0, 8);
	$randName2	= 'PhocaGalleryRIM2' . substr(md5(uniqid(time())), 0, 8);
	
	$sb_slideshow_delay			= $params->get( 'sb_slideshow_delay', 5 );
	$sb_lang					= $paramsC->get( 'sb_lang', 'en' );
	
	$button->set('methodname', 'shadowbox-button-rim');
	$button->set('options', "shadowbox[".$randName."];options={slideshowDelay:".$sb_slideshow_delay."}");
		
	$button2->methodname 		= &$button->methodname;
	$button2->set('options', "shadowbox[".$randName2."];options={slideshowDelay:".$sb_slideshow_delay."}");
	
	$buttonOther->set('modal', true);
	$buttonOther->set('methodname', 'modal-button');
	$buttonOther->set('options', "{handler: 'iframe', size: {x: ".$front_modal_box_width.", y: ".$front_modal_box_height."}, overlayOpacity: ".$modal_box_overlay_opacity.", classWindow: 'phocagallery-random-window', classOverlay: 'phocagallery-random-overlay'}");
	
	
	
		//$document->addScript(JURI::base(true).'/components/com_phocagallery/assets/js/shadowbox/adapter/shadowbox-mootools.js');
		$document->addScript(JURI::base(true).'/components/com_phocagallery/assets/js/shadowbox/shadowbox.js');	
		
	if ( $libraries['pg-group-shadowbox']->value == 0 ) {
		$document->addCustomTag('<script type="text/javascript">
Shadowbox.loadSkin("classic", "'.JURI::base(true).'/components/com_phocagallery/assets/js/shadowbox/src/skin");
Shadowbox.loadLanguage("'.$sb_lang.'", "'.JURI::base(true).'/components/com_phocagallery/assets/js/shadowbox/src/lang");
Shadowbox.loadPlayer(["img"], "'.JURI::base(true).'/components/com_phocagallery/assets/js/shadowbox/src/player");
window.onload = function(){
Shadowbox.init();
}
</script>');
		$library->setLibrary('pg-group-shadowbox', 1);
	}
}
		
// -------------------------------------------------------
// HIGHSLIDE JS
// -------------------------------------------------------

else if ($tmpl['detailwindow'] == 4) {
	
	$button->set('methodname', 'highslide');
	$button2->methodname 		= &$button->methodname;
	$buttonOther->methodname 	= &$button->methodname;
	
	$document->addScript(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslide-full.js');
	$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslide.css');
	$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslideimage.css');
			
	if ( $libraries['pg-group-highslide']->value == 0 ) {
		$document->addCustomTag( PhocaGalleryHelperRender::renderHighslideJSAll());
		$library->setLibrary('pg-group-highslide', 1);
	}
	
	$document->addCustomTag( PhocaGalleryHelperRender::renderHighslideJSRI($front_modal_box_width, $front_modal_box_height));
	$tmpl['highslideonclick'] = 'return hs.htmlExpand(this, phocaZoomRI )';
}

// -------------------------------------------------------
// HIGHSLIDE JS IMAGE ONLY
// -------------------------------------------------------

else if ($tmpl['detailwindow'] == 5) {

	$button->set('methodname', 'highslide');
	$button2->methodname 		= &$button->methodname;
	$buttonOther->methodname 	= &$button->methodname;
	
	$document->addScript(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslide-full.js');
	$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslide.css');
	$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/js/highslide/highslideimage.css');
	
	if ( $libraries['pg-group-highslide']->value == 0 ) {
		$document->addCustomTag( PhocaGalleryHelperRender::renderHighslideJSAll());
		$library->setLibrary('pg-group-highslide', 1);
	}
	
	$document->addCustomTag( PhocaGalleryHelperRender::renderHighslideJSRI($front_modal_box_width, $front_modal_box_height));
	$tmpl['highslideonclick2']	= 'return hs.htmlExpand(this, phocaZoomRI )';
	$tmpl['highslideonclick']	= 'return hs.expand(this, phocaImageRI )';

}		
		
		

// ACCESS RIGHTS
// All categories where the user has access
$query = 'SELECT cc.title AS text, cc.id AS id, cc.parent_id as parentid, cc.alias as alias, cc.access as access, cc.params as params'
		. ' FROM #__phocagallery_categories AS cc'
		. ' WHERE cc.published = 1'
		. ' AND cc.access <= '. $user->get('aid', 0);
if ($display_categories) {
		$query .= ' AND cc.id IN ('. $display_categories . ')' ;
}
if ($display_not_categories) {
		$query .= ' AND cc.id NOT IN ('. $display_not_categories . ')' ;
}

		$query .= ' ORDER BY cc.ordering';

$db->setQuery( $query );
$categories = $db->loadObjectList();

$unSet = 0;
foreach ($categories as $key => $category) { 
	// USER RIGHT - ACCESS =======================================
	$rightDisplay	= 1;
	
	if (isset($categories[$key]->params))
	{
		$rightDisplay = PhocaGalleryHelper::getUserRight ($categories[$key]->params, 'accessuserid', $category->access, $user->get('aid', 0), $user->get('id', 0), 0);
	}
		
	if ($rightDisplay == 0)
	{
		unset($categories[$key]);
		$unSet = 1;
	}
	// ============================================================
}
if ($unSet == 1) {
	$categories = array_values($categories);
}	

$allowedCategories = $categories;

// From objects to array only
$allowedCategoriesArray = array();
foreach ($allowedCategories as $key => $value) {
	$allowedCategoriesArray[] = $value->id;
}

// Implode the array
$implodeAllowedCategoriesArray = implode( ',', $allowedCategoriesArray);

// Category ID
if ($category_id !='') {
	$implodeAllowedCategoriesArray = $category_id;
}

$image = '';
$query = 'SELECT cc.id AS idcat, a.id AS idimage' .
' FROM #__phocagallery_categories AS cc' .
' LEFT JOIN #__phocagallery AS a ON a.catid = cc.id' .
' WHERE a.published = 1' .
' AND cc.published = 1' .
' AND cc.id IN ('.$implodeAllowedCategoriesArray.')' . // not images from not accessable categories
' ORDER BY RAND()' .
' LIMIT ' . $limit_start . ',' . $limit_count ;

$db->setQuery($query);
$images 		= $db->loadObjectList();
$imageArray 	= array();



// QUERIES - all data we need to display the image
if ($images) {

	foreach ($images as $valueImage) {
		$imageArray[] = $valueImage->idimage;
	}
	$imageIds = implode(',', $imageArray);

	$query = 'SELECT cc.id, a.id, a.catid, a.title, a.alias, a.filename ,'
	. ' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(\':\', cc.id, cc.alias) ELSE cc.id END as catslug, '
	. ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug'
	. ' FROM #__phocagallery_categories AS cc'
	. ' LEFT JOIN #__phocagallery AS a ON a.catid = cc.id'
	. ' WHERE a.id in (' . $imageIds . ')';

	$db->setQuery($query);
	$imagesArray = $db->loadObjectList();
	$output	= array();

	// Maximum size of module image is 100 x 100
	jimport( 'joomla.filesystem.file' );
	
	$i = 0;
	foreach($imagesArray as $valueImages){
		$output[$i] = '';
		// Path
		$file_thumbnail = PhocaGalleryHelperFront::displayFileOrNoImage($valueImages->filename, $img_cat_size);
		$valueImages->linkthumbnailpath 	= $file_thumbnail['rel'];
		$valueImages->linkthumbnailpathabs 	= $file_thumbnail['abs'];

		// -------------------------------------------------------------------- SEF PROBLEM
		// Is there an Itemid for category
		$items	 = $menu->getItems('link', 'index.php?option=com_phocagallery&view=category&id='.$valueImages->id);
		$itemscat= $menu->getItems('link', 'index.php?option=com_phocagallery&view=categories');

		if(isset($itemscat[0]))
		{
			$itemid = $itemscat[0]->id;
			//No JRoute now
			$siteLink ='index.php?option=com_phocagallery&view=detail&catid='. $valueImages->catslug .'&id='. $valueImages->slug .'&Itemid='.$itemid . '&tmpl=component&detail='.$tmpl['detailwindow'].'&buttons='.$detail_buttons;
		}
		else if(isset($items[0]))
		{
			$itemid = $items[0]->id;
			//No JRoute now
			$siteLink = 'index.php?option=com_phocagallery&view=detail&catid='. $valueImages->catslug .'&id='. $valueImages->slug .'&Itemid='.$itemid . '&tmpl=component&detail='.$tmpl['detailwindow'].'&buttons='.$detail_buttons ;
		}
		else
		{
			$itemid = 0;
			//No JRoute now
			$siteLink = 'index.php?option=com_phocagallery&view=detail&catid='. $valueImages->catslug .'&id='. $valueImages->slug . '&tmpl=component&detail='.$tmpl['detailwindow'].'&buttons='.$detail_buttons ;
		}
		// ---------------------------------------------------------------------------------

		// Different links for different actions: image, zoom icon, download icon
		$thumbLink	= PhocaGalleryHelper::getThumbnailName($valueImages->filename, 'large');
		$imgLink	= JURI::base(true) . str_replace( '..', '', $thumbLink['rel'] );
		
		if ($tmpl['detailwindow'] == 2 ) {
			$valueImages->link 		= $imgLink;
			$valueImages->link2		= $imgLink;
			$valueImages->linkother	= $siteLink;
		
		} else if ( $tmpl['detailwindow'] == 3 ) {
		
			$valueImages->link 		= $imgLink;
			$valueImages->link2 	= $imgLink;
			$valueImages->linkother	= $siteLink;
		
		} else if ( $tmpl['detailwindow'] == 5 ) {
			
			$valueImages->link 		= $imgLink;
			$valueImages->link2 	= $siteLink;
			$valueImages->linkother	= $siteLink;
			
		} else {
		
			$valueImages->link 		= $siteLink;
			$valueImages->link2 	= $siteLink;
			$valueImages->linkother	= $siteLink;
			
		}
		
		
		
		$imageWidth 	= 100;
		$imageHeight	= 100;
		$imageWidthBg 	= 100;	
		$imageHeightBg	= 100;
		$boxImageHeight = 100;
		$boxImageWidth 	= 120;
		if (JFile::exists($valueImages->linkthumbnailpathabs)) {
			list($width, $height) = GetImageSize( $valueImages->linkthumbnailpath );
			
			if ($width > $height)
			{
				if ($width > 100)
				{
					$imageWidth		= 100;
					$rate 			= $width / 100;
					$imageHeight	= $height / $rate;
				}
				else
				{
					$imageWidth		= $width;
					$imageHeight	= $height;
				}
			}
			else
			{
				if ($height > 100)
				{
					$imageHeight	= 100;
					$rate 			= $height / 100;
					$imageWidth 	= $width / $rate;
				}
				else
				{
					$imageWidth		= $width;
					$imageHeight	= $height;
				}
			}
		}

		if ($display_name == 1) {
			$boxImageHeight = $boxImageHeight + 20;
		}

		if ($display_icon_detail == 1 || $display_icon_download == 1 ) {
			$boxImageHeight = $boxImageHeight + 20;
		}

		if ( $category_box_space > 0 ) {
			$boxImageHeight = $boxImageHeight + $category_box_space;
		}

		if ( $image_background_shadow != 'none' ) {
			$boxImageHeight = $boxImageHeight + 18;
			$imageWidthBg 	= 118;	
			$imageHeightBg	= 118;
		}


		$output[$i] .= '<div class="phocagallery-box-file" style="height:'.$boxImageHeight.'px; width:'.$boxImageWidth.'px;float:left">' . "\n";
		$output[$i] .= '<center>'  . "\n";
		$output[$i] .= '<div class="phocagallery-box-file-first" style="height:'.$imageHeightBg.'px;width:'.$imageWidthBg.'px;">'. "\n"
			.'<div class="phocagallery-box-file-second">' . "\n"
			.'<div class="phocagallery-box-file-third">' . "\n"
			.'<center>' . "\n"
			.'<a class="'.$button->methodname.'" title="'.$valueImages->title.'" href="'. JRoute::_($valueImages->link).'"'; 
		
		if ($tmpl['detailwindow'] == 1) {
			$output[$i] .= ' onclick="'. $button->options.'"';
		} else if ($tmpl['detailwindow'] == 4 || $tmpl['detailwindow'] == 5) {
			$output[$i] .= ' onclick="'. $tmpl['highslideonclick'].'"';
		} else {
			$output[$i] .= ' rel="'.$button->options.'"';
		}
		
		
		$output[$i] .= ' >' . "\n";
		$output[$i] .= '<img src="'.JURI::base(true).'/'.$valueImages->linkthumbnailpath.'" alt="'.$valueImages->title.'" width="'.$imageWidth.'" height="'.$imageHeight.'" />';
		$output[$i] .= '</a>'
			 .'</center>' . "\n"
			 .'</div>' . "\n"
			 .'</div>' . "\n"
			 .'</div>' . "\n"
			 .'</center>' . "\n";

		// Name
		if ($display_name == 1) {
			$output[$i] .= '<div class="name" style="text-align:center;color: '.$font_color.' ;font-size:'.$font_size_name.'px;">'.PhocaGalleryHelperFront::wordDelete($valueImages->title, $char_length_name, '...').'</div>';
		}

		// Icons
		if ($display_icon_detail == 1 || $display_icon_download == 1) {
			
			$output[$i] .= '<div class="detail" style="text-align:right;margin:0;padding:0">';
			
			// Icon Detail
			if ($display_icon_detail == 1) {
				$output[$i] .= '<a class="'.$button2->methodname.'" title="'. JText::_('Image Detail').'" href="'.JRoute::_($valueImages->link2).'"';
				
				if ($tmpl['detailwindow'] == 1) {
					$output[$i] .= ' onclick="'. $button->options.'"';
				} else if ($tmpl['detailwindow'] == 2) {
					$output[$i] .= ' rel="'. $button->options.'"';
				} else if ($tmpl['detailwindow'] == 4 ) {
					$output[$i] .= ' onclick="'. $tmpl['highslideonclick'].'"';
				} else if ($tmpl['detailwindow'] == 5 ) {
					$output[$i] .= ' onclick="'. $tmpl['highslideonclick2'].'"';
				} else {
					$output[$i] .= ' rel="'. $button2->options.'"';
				}
				$output[$i] .= ' >';
				$output[$i] .= JHTML::_('image', 'components/com_phocagallery/assets/images/icon-view.'.$tmpl['formaticon'], JText::_('Image Detail'));
				$output[$i] .= '</a>';
			}
	
			// Icon Download
			if ($display_icon_download == 1) {
				$output[$i] .= ' <a class="'. $buttonOther->methodname.'" title="'. JText::_('Image Download').'" href="'. JRoute::_($valueImages->linkother . '&phocadownload=1').'"';
				
				if ($tmpl['detailwindow'] == 1) {
					$output[$i] .= ' onclick="'. $buttonOther->options.'"';
				} else if ($tmpl['detailwindow'] == 4 ) {
					$output[$i] .= ' onclick="'. $tmpl['highslideonclick'].'"';
				} else if ($tmpl['detailwindow'] == 5 ) {
					$output[$i] .= ' onclick="'. $tmpl['highslideonclick2'].'"';
				} else {
					$output[$i] .= ' rel="'. $buttonOther->options.'"';
				}
				$output[$i] .= ' >';
				$output[$i] .= JHTML::_('image', 'components/com_phocagallery/assets/images/icon-download.'.$tmpl['formaticon'], JText::_('Image Download'));
				$output[$i] .= '</a>';
			}
			
			$output[$i] .= '</div>';// End detail
			
		}
		$output[$i] .= '</div>';

		$i++;
	}
} else {
	$i = 0;
	$output[$i] = ''; // there is no image to get it as random image
}

require(JModuleHelper::getLayoutPath('mod_phocagallery_random_image'));
?>