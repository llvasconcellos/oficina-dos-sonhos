<?php
//mod_pccb_latestrecipes module//
/**
* Content code
* @package hello_world
* @Copyright (C) 2005 Robert Prince
* @ All rights reserved
* @ pc_cookbook is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
include_once($mosConfig_absolute_path . '/components/com_pcchess/include.pcchess.php');
echo "<script type=\"text/javascript\" src=\"" . $mosConfig_live_site . "/includes/js/overlib_mini.js\"></script>";

if (!empty($my->id)) {
	//$gamelist = pcc_GetMyActiveGames();
	EchoGameUL(pcc_GetMyActiveGamesMyMove(), $pcc_lang['pcc_status_your_turn_header'], $pcc_lang['pcc_status_your_turn_none']);
	EchoGameUL(pcc_GetMyActiveGamesNotMyMove(), $pcc_lang['pcc_status_opp_turn_header'], $pcc_lang['pcc_status_opp_turn_none']);
	$gamelist = pcc_GetAllGamesAwaitingAPlayer($my->id);
	EchoGameUL($gamelist, $pcc_lang['pcc_status_spec_challenges'], $pcc_lang['pcc_status_spec_challenges_none']);
}
//List games awaiting a player.

$gamelist = pcc_GetAllGamesAwaitingAnyPlayer();
EchoGameUL($gamelist, $pcc_lang['pcc_status_open_challenges'], $pcc_lang['pcc_status_open_challenges_none']);

function EchoGameUL($gamelist, $title, $none_msg, $next_move_id = -1, $mymove = true) {
	global $mosConfig_live_site;
	$i = 0;
	$list_html = '';
	foreach ($gamelist as $row) {
		if (($next_move_id == -1) OR 
		 ((((($row->move_and_color - round($row->move_and_color,0)) == 0.0) ? 
		 $row->black_user_id : $row->white_user_id) == $next_move_id) == $mymove)) {
			$i++;
			$list_html = $list_html . "   <li class=\"chessgamelist\">" .
			 "<a class=\"chessgamelist\" href=\"" .  pcc_GetGamehref($row) . "\"" . 
			  pcc_AddOverlibCall(pcc_ConvertLBToBR(date('d M y H:i:s', strtotime($row->start)) . 
			 (empty($row->comment) ? '' : "\n\n" . htmlspecialchars($row->comment)))) . ">". pcc_AwaitingChallengerName($row->white_username) . " v. " . 
			 pcc_AwaitingChallengerName($row->black_username) . "</a></li>\n";
		}
	}
	if ($i > 0) {
		echo "<h4>" . $title . "</h4>\n";
		echo "<ul class=\"chessgamelist\">\n";
		echo $list_html;
		echo "</ul>\n";
	} else {
		echo "<h5 class=\"h4noentries\">" . $none_msg . "</h5>";
	}
}
?>
