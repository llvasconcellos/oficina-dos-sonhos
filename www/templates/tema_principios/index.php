<?php

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// needed to seperate the ISO number from the language file constant _ISO

$iso = explode( '=', _ISO );

// xml prolog

echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php

if ( $my->id ) {

	initEditor();

}

?>

<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />

<?php mosShowHead(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site; ?>/templates/tema_principios/css/template_css.css" />

</head>

<body>



<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">

<tr>

	<td width="6" bgcolor="#FFFFFF">

	<img src="<?php echo $mosConfig_live_site; ?>/templates/tema_principios/images/pixel.png" width="1" height="1" alt="spacer" />

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

			<img src="<?php echo $mosConfig_live_site; ?>/templates/tema_principios/images/header_short_escola.jpg" width="790" height="201" alt="header" />

			</td>

		</tr>

		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">

		<tr>

			<td width="100" valign="top" bgcolor="#EEEEEE">

			<?php mosLoadModules ( 'left' ); ?>

			</td>

			<td valign="top" width="2" bgcolor="#FFFFFF">&nbsp</td>

			<td valign="top">

			<br />

				<table width="99%" border="0" bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0">

				<tr>

					<td class="pathway">

					<?php mosPathWay(); ?>

					</td>

				</tr>

				</table>

			<br />

				<table width="99%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">

				<tr>

					<td class="mainpage">

					<?php mosMainBody(); ?>

					</td>

				</tr>

				</table>

			</td>

			<td>

			<img src="<?php echo $mosConfig_live_site;?>/templates/tema_principios/images/pixel.png" width="1" height="1" alt="spacer"/>

			</td>

			<td width="100" valign="top">

				<table width="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

				<tr>

					<td width="100" valign="top" bgcolor="#EEEEEE">

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

			<td width="51%" height="30" bgcolor="#FFFFFF"">&nbsp;</td>

			<td width="49%" align="center" valign="middle" bgcolor="#FFFFFF">

			<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>

			</td>

		</tr>

		</table>

	</td>

	<td width="6" bgcolor="#FFFFFF">

	<img src="<?php echo $mosConfig_live_site; ?>/templates/tema_principios/images/pixel.png" width="1" height="1" alt="spacer"/>

	</td>

</tr>

</table>

<?php mosLoadModules( 'debug', -1 );?>

</body>

</html>