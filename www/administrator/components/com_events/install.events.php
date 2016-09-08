<?php
// $Id: install.events.php,v 1.5 2004/09/15 05:37:31 davemac2 Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// ################################################################
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################

function com_install() {
global $database;

// Do the clean up if installed on a previous installation

$database->setQuery("SELECT count(id) as count, max(id) as lastInstalled FROM #__components WHERE name='Events'");
$reginfo = $database->loadObjectList();
$lastInstalled = $reginfo[0]->lastInstalled;

// Check if there are more registered instances of the Events component
if ($reginfo[0]->count <> "1") {
	// Get duplicates
	$sql="SELECT * FROM #__components WHERE name='Events' AND id!='$lastInstalled' AND admin_menu_link LIKE 'option=com_events'";
	$database->setQuery($sql);
	$toberemoved = $database->loadObjectList();
	foreach ($toberemoved as $remid){
		// Delete duplicate entries
		$database->setQuery("DELETE FROM #__components WHERE id='$remid->id' or parent='$remid->id'");
		$database->query();
	}
}
    

// Well done
    echo "Installed Successfully";
    echo "<div align='left'>";
    include ("../components/com_events/index.html");
    echo "</div>";
}

?>
