<?php
/**
* @mod_typewriterticker version 1.00a based on:
* @version $Id: mod_latestnews.php 2483 2006-02-19 06:09:54Z stingrey $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

global $mosConfig_offset, $mosConfig_live_site, $mainframe;

$type 		= intval( $params->get( 'type', 1 ) );
$count 		= intval( $params->get( 'count', 5 ) );
$catid 		= trim( $params->get( 'catid' ) );
$secid 		= trim( $params->get( 'secid' ) );
$show_front	= $params->get( 'show_front', 1 );
$now 		= date( 'Y-m-d H:i:s', time() );
$access 	= !$mainframe->getCfg( 'shownoauth' );
$linkto 	= intval( $params->get( 'linkto', 0 ) );
$tickerspeed	 = intval( $params->get( 'tickerspeed', 50 ) );
$tickerinterval  = intval( $params->get( 'tickerinterval', 120000 ) );


$nullDate = $database->getNullDate();
// select between Content Items, Static Content or both
switch ( $type ) {
	case 2: 
	//Static Content only
		$query = "SELECT a.id, a.title, a.introtext"
		. "\n FROM #__content AS a"
		. "\n WHERE ( a.state = 1 AND a.sectionid = 0 )"
		. "\n AND ( a.publish_up = '$nullDate' OR a.publish_up <= '$now' )"
		. "\n AND ( a.publish_down = '$nullDate' OR a.publish_down >= '$now' )"
		. ( $access ? "\n AND a.access <= $my->gid" : '' )
		. "\n ORDER BY a.created DESC"
		. "\n LIMIT $count"
		;
		$database->setQuery( $query );
		$rows = $database->loadObjectList();
		break;

	case 3: 
	//Both
		$query = "SELECT a.id, a.title, a.sectionid, a.catid, a.introtext, cc.access AS cat_access, s.access AS sec_access, cc.published AS cat_state, s.published AS sec_state"
		. "\n FROM #__content AS a"
		. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id"
		. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
		. "\n LEFT JOIN #__sections AS s ON s.id = a.sectionid"
		. "\n WHERE a.state = 1"
		. "\n AND ( a.publish_up = '$nullDate' OR a.publish_up <= '$now' )"
		. "\n AND ( a.publish_down = '$nullDate' OR a.publish_down >= '$now' )"
		. ( $access ? "\n AND a.access <= $my->gid" : '' )
		. ( $catid ? "\n AND ( a.catid IN ( $catid ) )" : '' )
		. ( $secid ? "\n AND ( a.sectionid IN ( $secid ) )" : '' )
		. ( $show_front == '0' ? "\n AND f.content_id IS NULL" : '' )
		. "\n ORDER BY a.created DESC"
		. "\n LIMIT $count"
		;
		$database->setQuery( $query );
		$temp = $database->loadObjectList();
		
		$rows = array();
		if (count($temp)) {
			foreach ($temp as $row ) {
				if (($row->cat_state == 1 || $row->cat_state == '') &&  ($row->sec_state == 1 || $row->sec_state == '') &&  ($row->cat_access <= $my->gid || $row->cat_access == '' || !$access) &&  ($row->sec_access <= $my->gid || $row->sec_access == '' || !$access)) {
					$rows[] = $row;
				}
			}
		}
		unset($temp);
		break;

	case 1:  
	default:
	//Content Items only
		$query = "SELECT a.id, a.title, a.introtext, a.sectionid, a.catid"
		. "\n FROM #__content AS a"
		. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id"
		. "\n INNER JOIN #__categories AS cc ON cc.id = a.catid"
		. "\n INNER JOIN #__sections AS s ON s.id = a.sectionid"
		. "\n WHERE ( a.state = 1 AND a.sectionid > 0 )"
		. "\n AND ( a.publish_up = '$nullDate' OR a.publish_up <= '$now' )"
		. "\n AND ( a.publish_down = '$nullDate' OR a.publish_down >= '$now' )"
		. ( $access ? "\n AND a.access <= $my->gid AND cc.access <= $my->gid AND s.access <= $my->gid" : '' )
		. ( $catid ? "\n AND ( a.catid IN ( $catid ) )" : '' )
		. ( $secid ? "\n AND ( a.sectionid IN ( $secid ) )" : '' )
		. ( $show_front == '0' ? "\n AND f.content_id IS NULL" : '' )
		. "\n AND s.published = 1"
		. "\n AND cc.published = 1"
		. "\n ORDER BY a.created DESC"
		. "\n LIMIT $count"
		;
		$database->setQuery( $query );
		$rows = $database->loadObjectList();
		break;
}


// needed to reduce queries used by getItemid for Content Items
if ( ( $type == 1 ) || ( $type == 3 ) ) {
	$bs 	= $mainframe->getBlogSectionCount();
	$bc 	= $mainframe->getBlogCategoryCount();
	$gbs 	= $mainframe->getGlobalBlogSectionCount();
}

// Output
?>



<?php
foreach ( $rows as $row ) {
	// get Itemid
	switch ( $type ) {
		case 2:
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE type = 'content_typed'"
			. "\n AND componentid = $row->id"
			;
			$database->setQuery( $query );
			$Itemid = $database->loadResult();
			break;

		case 3:
			if ( $row->sectionid ) {
				$Itemid = $mainframe->getItemid( $row->id, 0, 0, $bs, $bc, $gbs );
			} else {
				$query = "SELECT id"
				. "\n FROM #__menu"
				. "\n WHERE type = 'content_typed'"
				. "\n AND componentid = $row->id"
				;
				$database->setQuery( $query );
				$Itemid = $database->loadResult();
			}
			break;

		case 1:
		default:
			$Itemid = $mainframe->getItemid( $row->id, 0, 0, $bs, $bc, $gbs );
			break;
	}

	// Blank itemid checker for SEF
	if ($Itemid == NULL) {
		$Itemid = '';
	} else {
		$Itemid = '&amp;Itemid='. $Itemid;
	}

	$link = sefRelToAbs( 'index.php?option=com_content&amp;task=view&amp;id='. $row->id . $Itemid );
	?>

	<?php
	//link to originating article or url provided in intro text?
	switch ( $linkto ) {
		case 0:
			$tickeroutput = $tickeroutput . "<li class=\"typewriterticker" . $moduleclass_sfx . "\">" . "<a href=\"" . $link ."\">" . $row->title . "</a></li>" ;
			break;

		case 1:
			$tickeroutput = $tickeroutput . "<li class=\"typewriterticker" . $moduleclass_sfx . "\">" . "<a href=\"http://" . $row->introtext ."\">" . $row->title . "</a></li>" ;
			break;
	
	}
	
}
?>

<!-- output as typewriter ticker -->
<script language="Javascript1.2"> 
<!--
// please keep these lines on when you copy the source
// made by: Nicolas - http://www.javascript-page.com

var tags_before_clock = "<ul>";
var tags_after_clock  = "</ul>";
var speed = <?php echo $tickerspeed;?>;
var speed2 = <?php echo $tickerinterval;?>;

function initArray() {

this.length = initArray.arguments.length;
  for (var i = 0; i < this.length; i++) {
  this[i] = initArray.arguments[i];
  }
}

var mymessage = new initArray(
'<?php echo $tickeroutput?>'
);

var mymessage2 = mymessage;
var x = 0;
var y = 0;

if(navigator.appName == "Netscape") {
document.write('<layer id="ticker"></layer><br>');
}

if (navigator.appVersion.indexOf("MSIE") != -1){
document.write('<span id="ticker"></span><br>');
}

function upticker(){ 

if (y > mymessage2.length - 1) {
  y = 0;
  setTimeout("upticker()",speed);
}

else{

  if (x > mymessage2[y].length) {
    mymessage = mymessage2[y]; 
    x = 0; y++;
    setTimeout("upticker()",speed2);
  }

  else {
    mymessage = mymessage2[y].substring(0,x++);
    setTimeout("upticker()",speed);
  }

  if(navigator.appName == "Netscape") {
 	/*Netscape 4 code below, unsupported */
	/*document.ticker.document.write(tags_before_clock+mymessage+tags_after_clock);
    document.ticker.document.close();*/
	
	/*Netscape 6:*/
		alayer = document.getElementById("ticker");
		alayer.innerHTML = tags_before_clock+mymessage+tags_after_clock;

  }

  if (navigator.appVersion.indexOf("MSIE") != -1){
    ticker.innerHTML = tags_before_clock+mymessage+tags_after_clock;
  }
  
  
   
}
} 

setTimeout("upticker()",speed);
//-->
</script>
