<?php
// Locatie van de watermerk-afbeelding
require("../../administrator/components/com_heximage/config.heximage.php");
global $HeXimage_WaterMark, $HeXimage_WMquality, $HeXimage_WMgamma;

$watermark_src = $HeXimage_WaterMark;

//old
//$watermark_src = 'HeXa.png'; 
$a = $_GET['pic'];
// Locatie van de bronafbeelding, deze wordt 'gemerkt'
$image_src = $a;

/**
*	Locatie om het 'gemerkte' bestand op te slaan (optioneel)
*	Indien je het bestand op wilt slaan dien je hier het complete pad 
*	op te geven en te controleren dat de map beschrijfbaar is door de webserver
**/
$dst_location = FALSE;

/**
*	gamma: 
*		100 is complete dekking,
*		50 is half transparant,
*		0 is geen watermerk
*		Iedere afgeronde waarde tussen 0 en 100 is toegestaan
**/
$gamma = $HeXimage_WMgamma;

/**
*	De array $gd-mapper wordt gebruikt om te controleren of de 
*	gd-versie van de server het gewenste afbeeldingstype ondersteund
**/
$gd_mapper = array( 1=>IMG_GIF,
		    2=>IMG_JPG,
		    3=>IMG_PNG);

/**
*	De array $img_mapper wordt verderop gebruikt om de juiste functie
* 	aan te roepen om de uiteindelijke afbeelding te genereren
**/
$img_mapper = array( 1=>'imagegif',
		     2=>'imagejpeg',
		     3=>'imagepng');

/**
*	De array $mime_types kan worden gebruik voor php-versie ouder dan 4.3.0
*	Oudere versies geven namelijk niet de 'mime-type' terug met functie 'getimagesize'
**/
$mime_types = array( 1=>'image/gif',
		     2=>'image/jpeg',
		     3=>'image/png');

/**
*	De array $methods wordt gebruik om de juiste image-stream uit de bronafbeelding
*	te genereren
*/
$methods    = array( 1=>'imagecreatefromgif',
		     2=>'imagecreatefromjpeg',
		     3=>'imagecreatefrompng');

/**
*	watermerk posities kunnen zowel procentueel als numeriek zijn
*	Indien procentueel, altijd het %-karakter erachter plaatsen
*
*	$wm_pos_x is positie vanaf bovenkant,
*	$wm_pos_y is positie vanaf linkerkant
*	
*	Indien waarden negatief wordt deze berekent vanaf de onderkant resp. rechterkant
**/
$wm_pos_x = '5';
$wm_pos_y = -5;

/**
*	Kwaliteit van de uiteindelijke afbeelding, deze kan alleen ingesteld worden
*	wanneer de doel-afbeelding een jpeg bestand is.
*	
*	Indien je de standaard wilt gebruiken (75) kun je deze variabele op FALSE laten
*	zodat de kwaliteits-factor niet wordt toegepast.
*	
*	Als je de kwaliteit wel aan wilt passen is ieder getal
*	tussen 1 (lage kwaliteit) en 100 (hoge kwaliteit) toegestaan.
*/
$quality = $HeXimage_WMquality;

if($dst_location && !is_writable(dirname($dst_location))){
	die($dst_location.' is not writeable');
}

/**
*	 Haal informatie op van het watermerk-bestand
*/
$wm_info	= getimagesize($watermark_src);

/**
*	controleer of de gd-versie het type voor het watermerk ondersteund
*/
if(!imagetypes() & $gd_mapper[$wm_info[2]] || empty($gd_mapper[$wm_info[2]])){
	die('watermark-image-type is not supported. Check for'.$wm_info[2].'
	at <a href="http://nl3.php.net/manual/nl/function.getimagesize.php">getimagesize()</a>');
}
$watermark	= imagecreatefrompng($watermark_src);
$wm_width	= imagesx($watermark);
$wm_height	= imagesy($watermark);

/**	 haal informatie op van het bronbestand */
$src_info	= getimagesize($image_src);

/**
*	controleer of de gd-versie het type voor de source-image ondersteund
*/
if(!imagetypes() & $gd_mapper[$src_info[2]] || empty($gd_mapper[$src_info[2]])){
	die('src-image-type is not supported. Check for'.$src_info[2].'
	at <a href="http://nl3.php.net/manual/nl/function.getimagesize.php">getimagesize()</a>');
}
$image		= imagecreatetruecolor($wm_width, $wm_height);
$image		= $methods[$src_info[2]]($image_src);

/**
*	Posities van watermerk calculeren
*	indien niet numeriek is de x-positie een procentuele waarde
*/
if(!is_numeric($wm_pos_x)){
	// haal getal op m.b.v. intval
	$wm_pos_x = intval($wm_pos_x);
	$procent_x= $wm_pos_x/100;
	// bereken procentuele x-positie van het watermerk
	$wm_pos_x = round(($procent_x * $src_info[0]) - ($procent_x * $wm_width));
}else{
	// numeriek gegeven voor de zekerheid omzetten naar een integer
	$wm_pos_x = intval($wm_pos_x);
	
	if($wm_pos_x < 0){
		$wm_pos_x = ($src_info[0] + $wm_pos_x) - $wm_width;
	}
}
/**
*	indien niet numeriek is de y-positie een procentuele waarde
*/
if(!is_numeric($wm_pos_y)){
	// haal getal op
	$wm_pos_y 	= intval($wm_pos_y);
	$procent_y	= $wm_pos_y/100;
	
	// bereken procentuele y-positie van het watermerk
	$wm_pos_y = round(($procent_y * $src_info[1]) - ($procent_y * $wm_height));
}else{
	// numeriek gegeven voor de zekerheid omzetten naar een integer
	$wm_pos_y = intval($wm_pos_y);
	
	if($wm_pos_y < 0){
		$wm_pos_y = ($src_info[1] + $wm_pos_y) - $wm_height;
	}
}

/**
*	Functie omschrijving voor imagecopymerge:
*	int imagecopymerge ( resource dst_im, resource src_im, int dst_x, int dst_y, int src_x, int src_y, int src_w, int src_h, int pct)
*
*	Copieert een deel van src_im naar dst_im beginnend op de x en y coordinaten 'src_x' en 'src_y' met 
*	een breedte van src_w en een hoogte van src_h
*
*	Dit gecopieerde deel wordt op de doel-afbeelding geplaatst (de gemerkte afbeelding) op 
*	de x- en y-positie 'dst_x' en 'dst_y'
*
*	pct is de transparancy instelling van het watermerk.
*
*	ps: int betekent 'integer', dus hier mogen 'geen' haakjes worden gebruikt
*/
imagecopymerge($image, $watermark, $wm_pos_x, $wm_pos_y, 0, 0, $wm_width, $wm_height, $gamma);

/**
*	Indien $dst_location gegeven is de afbeelding opslaan
**/
if($dst_location){

/** 
*	Indien het doelbestand een JPEG is en $quality niet FALSE is
*/
	if($src_info[2] == 2 && $quality){
		$img_mapper[$src_info[2]]($image,$dst_location,$quality);
	}else{
		$img_mapper[$src_info[2]]($image,$dst_location);
	}
	
}else{
/**
*	Anders afbeelding direct 'printen'
*
*	verstuur juiste header, 'mime' is vanaf php versie 4.3.0 beschikbaar
*	Voor oudere php-versie onderstaande regel gebruiken
*	header('content-type: '.$mime_types[$src_iinfo[2]]);
**/
	header('content-type: '.$src_info['mime']);
	if($src_info[2] == 2 && $quality){
		$img_mapper[$src_info[2]]($image,'',$quality);
	}else{
		$img_mapper[$src_info[2]]($image);
	}
}

/**
*	verwijder beide afbeelding-streams uit het geheugen
**/
imagedestroy($image);
imagedestroy($watermark);



 ?>