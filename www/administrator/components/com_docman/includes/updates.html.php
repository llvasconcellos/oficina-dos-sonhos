<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: updates.html.php,v 1.7 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_UPDATES')) {
    return;
} else {
    define('_DOCMAN_HTML_UPDATES', 1);
} 

class HTML_DMUpdates {
    function showUpdates(&$mambots, &$docbots, &$modules, &$themes)
    {
        $tabs = new mosTabs(0);

        ?>
		<style>
			table.adminheading th.update { background-image: url(components/com_docman/images/updates.png) }
		</style>

		<table class="adminheading">
			<tr>
				<th class="update"><?php echo _DML_CHECKING_UP ?></th>
			</tr>
		</table>
		
		<?php
        $tabs->startPane("updatesPane");
        $tabs->startTab('Mambots', "mambots-page");

        ?>
		
		<table class="adminform">
		<?php HTML_DMUpdates::showPackages($mambots);
        ?>
		</table>
		
		<?php
        $tabs->endTab();
        $tabs->startTab('DocBots', "docbots-page");

        ?>
		
		<table class="adminform">
		<?php HTML_DMUpdates::showPackages($docbots);
        ?>
		</table>
		
		<?php
        $tabs->endTab();
        $tabs->startTab('Modules', "modules-page");

        ?>
       
        <table class="adminform">
		<?php HTML_DMUpdates::showPackages($modules);
        ?>
		</table>
		
		<?php
        $tabs->endTab();
        $tabs->startTab('Themes', "themes-page");

        ?>
		
		<table class="adminform">
		<?php HTML_DMUpdates::showPackages($themes);
        ?>
		</table>
		
		<?php $tabs->endPane();
        ?>
		<?php
    } 

    function showPackages($packages)
    {
        $size = $packages->getLength();
        if ($size != 0) {
            $row = 0;
            for($i = 0; $i < $size; $i++) {
                $package = $packages->item($i);
                HTML_DMUpdates::showPackage($package, $row);
                if ($row) {
                    $row = 0;
                } 
                $row++;
            } 
        } else {
            echo updateProgress(_DML_NO_UP_AVAIL, 'red');
        } 
    } 

    function showPackage($package, $row)
    {
        global $mosConfig_absolute_path;

        ?>
		<tr class="row<?php echo $row ?>">
			<td colspan="2"><b><?php echo $package->getText() ?></b> - <i><?php echo $package->getAttribute("version")?></i><?php echo ' - ' . _DML_RELEASED_ON . ' ' . $package->getAttribute("date") ?> -->
		<?php

        $basedir = $mosConfig_absolute_path . $package->getAttribute("basedir_version"); 
        // lets read here the local xml if any with current version number
        $xml_local_version = &new DOMIT_Lite_Document();
        $xml_local_version->resolveErrors(true);
        if (@$xml_local_version->loadXML($mosConfig_absolute_path . $package->getAttribute("basedir_version"), true)) {
            $local_version = &$xml_local_version->getElementsbyPath('version', 1);
            $current_version = $local_version->getText();
        } else {
            $current_version = 0;
        } 

        $flag = version_compare($current_version, $package->getAttribute("version"));
        if ($flag == '-1' && !$current_version) {

            ?><a href="index2.php?option=com_docman&section=updates&task=install&package=<?php echo $package->getAttribute("package") ?>&type=<?php echo $package->getAttribute("type") ?>"><?php echo _DML_INSTALL ?></a><?php
        } elseif ($flag == '-1' && $current_version) {

            ?><a href="index2.php?option=com_docman&section=updates&task=install&package=<?php echo $package->getAttribute("package") ?>&type=<?php echo $package->getAttribute("type") ?>"><?php echo _DML_UPGRADE ?></a><?php
            if ($current_version) {
                echo updateProgress(" (" . _DML_YOU_HAVE_VERSION . " " . $current_version . ")", 'red');
            } 
        } else {
            echo updateProgress(_DML_UPTODATE, 'green');
        } 

        ?>
        	</td>
        </tr>
       	<tr class="row<?php echo $row ?>"><td colspan="2"><?php echo updateProgress($package->getAttribute("info"), 'gray') ?></td></tr>
       	<?php
    } 
    /**
    * 
    * @param string $ 
    * @param string $ 
    * @param string $ 
    * @param string $ 
    */
    function showInstallMessage($message, $title, $url)
    {
        global $PHP_SELF;

        ?>
<table class="adminheading">
	<tr>
		<th class="update">
			<?php echo $title;
        ?>
		</th>
	</tr>
</table>
<table class="adminform">
	<tr>
		<td align="Left">
			<strong><?php echo $message;
        ?></strong>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			[&nbsp;<a href="<?php echo $url;
        ?>" style="font-size: 16px; font-weight: bold">Continue ...</a>&nbsp;]
		</td>
	</tr>
</table>
<?php
    } 
} 

?>
