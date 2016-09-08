<?php
/**
* A DHTML menu component for mambo
* @version 1.15
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo
* @subpackage lxmenu
*/

define('_CURRENT_LXMENU_VERSION', 115);

function com_install(){
	global $database;
	?>
	<table width="100%" border="0" style="background:#F0F0F0;">
	<tr>
		<td style="text-align:center;">
			Installation Process:<br />

	<?php
	$updates[107][] = 	"ALTER TABLE `#__lxmenu_main` ADD `transparency_create` TINYINT(1) NOT NULL AFTER `hide_delay` ,".
						"ADD `transparency` SMALLINT(3) NOT NULL AFTER `transparency_create`";
	$updates[107][] = 	"UPDATE #__lxmenu_main SET transparency_create='0'";
	$updates[108][] = 	"ALTER TABLE `#__lxmenu` ADD `item_text_direction` VARCHAR(10) NOT NULL AFTER `item_height`";
	$updates[108][] = 	"UPDATE #__lxmenu SET item_text_direction='ltr'";
	$updates[111][] = 	"ALTER TABLE `#__lxmenu_main` ADD `menu_align` VARCHAR(10) NOT NULL AFTER `transparency`";
	$updates[111][] = 	"UPDATE #__lxmenu_main SET menu_align='left'";
	$updates[115][] = 	"ALTER TABLE #__lxmenu DROP `item_text_direction`";
	$updates[115][] = 	"ALTER TABLE #__lxmenu_sub ADD `direction` VARCHAR(10) NOT NULL AFTER `transparency`";
	$updates[115][] = 	"UPDATE #__lxmenu_sub SET direction='right'";
	$updates[116] = array();
	$errors = array();
	
	$query = "SELECT version FROM #__lxmenu_config";
	$database->setQuery($query);
	$row = $database->loadObjectList();
	
	if(!$row){
		echo '<font color="black"><b>No previous database version found. Trying a fresh database installation!</b></font><br />';
		$query = "INSERT INTO #__lxmenu_config VALUES ('1', '"._CURRENT_LXMENU_VERSION."')";
		$database->setQuery($query);
		$database->query();
		if($error = $database->getErrorMsg()){
			$errors[] = $error;
		}
	}elseif($row[0]->version < _CURRENT_LXMENU_VERSION){
		echo '<font color="black"><b>An older database found. Trying a database update!</b></font><br />';
		if(!empty($updates)){
			foreach($updates as $version => $statements){
				if($version > $row[0]->version && !empty($statements)){
					foreach($statements as $statement){
						$database->setQuery($statement);
						$database->query();
						if($error = $database->getErrorMsg()){
							$errors[] = $error;
						}
					}
				}
			}
		}
		$query = "UPDATE #__lxmenu_config SET version = '"._CURRENT_LXMENU_VERSION."'"
			   . "\n WHERE id='1'";
		$database->setQuery($query);
		$database->query();
		if($error = $database->getErrorMsg()){
			$errors[] = $error;
		}
	}else{
		echo '<font color="black"><b>No database update needed. The database is already up to date!</b></font><br />';
	}
	if(empty($errors)){
		echo '<br /><font color="green"><b>Installation completed without any errors.</b></font><br /><br />';
	}else{
		echo '<br /><font color="red"><b>Database update failed with following database errors:</b></font><br /><br />';
		foreach($errors as $error){
			echo '<font color="red">'.$error.'</font><br />';
		}
	}
?>
		</td>
	</tr>
	<tr>
		<td>
		<p>For XHTML compliance you need to add the following code snippet into your template between the tags &lt;head&gt; and &lt;/head&gt;</p>
		<form name="install_hint" method="post" action="">
			<textarea name="textarea" cols="130" rows="8">
<?php
echo '
<?php
if(file_exists($mosConfig_absolute_path."/modules/mod_lxmenu/css_lxmenu.css")){
?>
	<link href="<?php echo $mosConfig_live_site; ?>/modules/mod_lxmenu/css_lxmenu.css" rel="stylesheet" type="text/css"/>
<?php
}
?>';
?>
			</textarea>
		</form>
		</td>
	</tr>
</table>
<?php
}
?>