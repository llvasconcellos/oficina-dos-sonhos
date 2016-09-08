<div id="pcchess">
<?php
//pc_chess Component//
/**
* Content code
* @package hello_world
* @Copyright (C) 2005 Robert Prince
* @ All rights reserved
* @ pc_chess is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.2
**/
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
?>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

<?php global $mosConfig_absolute_path;
global $mosConfig_live_site, $my;
include($mosConfig_absolute_path . '/components/com_pcchess/smf.pcchess.com.php');
include_once($mosConfig_absolute_path . '/components/com_pcchess/include.pcchess.php');
$hasgames = pcc_HasGames();
if (array_key_exists('page', $_REQUEST)) {
	$page = $_REQUEST['page'];
} else {
	$page = "allactivegames";
}	
global $my;
$myusername = pcc_GetUserName($my->id);

if (!pcc_UseMamboMenus()) {
	echo "<ul class=\"pcc_toplinks\">";
	echo "   <li class=\"pcc_toplinks\"><a href=\"" . $mosConfig_live_site . "/index.php?option=com_pcchess&amp;Itemid=" . 
	 pcc_GetItemIdActiveGameMenuID() . "&amp;page=allactivegames\">" . $pcc_lang['toplink_activegames'] . "</a></li>";
	echo "   <li class=\"pcc_toplinks\"><a href=\"" . $mosConfig_live_site . "/index.php?option=com_pcchess&amp;Itemid=" . 
	 pcc_GetItemIdCompleteGameMenuID() . "&amp;page=allcompletegames\">" . $pcc_lang['toplink_completegames'] . "</a></li>";
	echo "   <li class=\"pcc_toplinks\"><a href=\"" . $mosConfig_live_site . "/index.php?option=com_pcchess&amp;Itemid=" . 
	 pcc_GetItemIdNewGameMenuID() . "&amp;page=newgame\">" . $pcc_lang['toplink_newgame'] . "</a></li>";
	echo "   <li class=\"pcc_toplinks\"><a href=\"" . $mosConfig_live_site . "/index.php?option=com_pcchess&amp;Itemid=" . 
	 pcc_GetItemIdPlayersMenuID() . "&amp;page=players\">" . $pcc_lang['toplink_players'] . "</a></li>";
	echo "</ul>\n";
}
echo "<h1 class=\"firstheader\">" . $pcc_lang['component_title'] . "</h1>\n";
switch ($page)
{
case 'allactivegames':
	pcc_SetItemID(pcc_GetItemIdActiveGameMenuID());
	$mainframe->setPageTitle($pcc_lang['active_game_html_title']);
	if (empty($my->id)) {
		$game_list = pcc_GetAllActiveGames();
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['active_game_all'] . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<p>" . $pcc_lang['active_game_no_games'] . "</p>";
		}
	} else {
		$game_list = pcc_GetAllGamesAwaitingAPlayer($my->id);
		if (! empty($game_list)) {
			echo "<h2>" . sprintf($pcc_lang['active_game_specific_challenges'], $myusername) . "</h2>\n";
			pcc_EchoNewGameList ($game_list);
		}
		$game_list = pcc_GetMyActiveGamesMyMove();
		if (! empty($game_list)) {
			echo "<h2>" . sprintf($pcc_lang['active_game_awaiting_move'], $myusername) . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . sprintf($pcc_lang['active_game_no_awaiting_move'], $myusername) . "</h2>";
		}
		$game_list = pcc_GetMyActiveGamesNotMyMove();
		if (! empty($game_list)) {
			echo "<h2>" . sprintf($pcc_lang['active_game_opponents_move'], $myusername) . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . sprintf($pcc_lang['active_game_no_opponents_move'], $myusername) . "</h2>";
		}
		$game_list = pcc_GetNotMyActiveGames();
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['active_game_other'] . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['active_game_no_other'] . "</h2>";
		}
	}
	break;
case 'allcompletegames':
	pcc_SetItemID(pcc_GetItemIdCompleteGameMenuID());
	$mainframe->setPageTitle($pcc_lang['complete_game_html_title']);
	if (empty($my->id)) {
		$game_list = pcc_GetAllCompleteGames();
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['complete_game_all'] . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['complete_game_no_games'] . "</h2>";
		}
	} else {
		$game_list = pcc_GetMyCompleteGames();
		if (! empty($game_list)) {
			echo "<h2>" . sprintf($pcc_lang['complete_game_player'], $myusername) . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . sprintf($pcc_lang['complete_game_no_player'], $myusername) . "</h2>";
		}
		$game_list = pcc_GetNotMyCompleteGames();
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['complete_game_other'] . "</h2>\n";
			pcc_EchoGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['complete_game_no_other'] . "</h2>";
		}
	}
	break;
case 'showgame':
	if (array_key_exists('move', $_REQUEST)) {
		$move = $_REQUEST['move'];
		if (array_key_exists('color', $_REQUEST)) {
			$color = $_REQUEST['color'];
		} else {
			$color = "1";
		}
	} else {
		$move = "100000";
		$color = "1";
	}
	pcc_EchoGame($_REQUEST['game_id'], $move, $color);
	break;
case 'submitmove':
	pcc_SetItemID(pcc_GetItemIdActiveGameMenuID());
	if (empty($_POST['game_id'])) {
		echo "<p>" . $pcc_lang['submit_move_corrupt'] . "</p>";
	} elseif (empty($_POST['pcc_Move'])) {
		pcc_EchoGame($_POST['game_id'], 1000, 1, $pcc_lang['submit_move_empty']);
	} elseif (strtoupper($_POST['pcc_Move']) == "RESIGN") {
		if (!($_POST['pcc_Move'] == "RESIGN")) {
			pcc_EchoGame($_POST['game_id'], 1000, 1, $pcc_lang['submit_move_resign_caps_warn'], 
			 $pcc_move=$_POST['pcc_Move'], (($_POST['pcc_notify']=="1") ? 1 : 0), $_POST['pcc_comment']);
		} else {
			pcc_ResignGame($_POST['game_id'], $_POST['pcc_comment']);
		}
	} elseif (strtoupper($_POST['pcc_Move']) == "DRAW") {
		if (!($_POST['pcc_Move'] == "DRAW")) {
			pcc_EchoGame($_POST['game_id'], 1000, 1, $pcc_lang['submit_move_resign_caps_warn'], 
			 $pcc_move=$_POST['pcc_Move'], (($_POST['pcc_notify']=="1") ? 1 : 0), $_POST['pcc_comment']);
		} else {
			pcc_DrawGame($_POST['game_id'], $_POST['pcc_comment']);
		}
	} else {
		pcc_ProcessMove($_POST['game_id'], $_POST['pcc_Move'], (($_POST['pcc_notify']=="1") ? 1 : 0), $_POST['pcc_comment']);
	}
	break;
case 'acceptdraw':
	pcc_SetItemID(pcc_GetItemIdActiveGameMenuID());
	pcc_ProcessAcceptDraw($_POST['game_id'], $_POST['accept']=="1");
	break;
case 'newgame':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	$mainframe->setPageTitle($pcc_lang['new_game_html_title']);
	if (! empty($my->id)) {
		$game_list = pcc_GetAllGamesAwaitingAPlayer($my->id);
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['new_game_specific'] . "</h2>\n";
			pcc_EchoNewGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['new_game_no_specific'] . "</h2>";
		}
		$game_list = pcc_GetAllGamesAwaitingAnyButOnePlayer($my->id);
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['new_game_open'] . "</h2>\n";
			pcc_EchoNewGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['new_game_no_open'] . "</h2>";
		}
		$game_list = pcc_GetAllGamesIssuedByAPlayer($my->id);
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['new_game_pending'] . "</h2>\n";
			pcc_EchoNewGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['new_game_no_pending'] . "</h2>";
		}
		pcc_EchoNewGameForm();
	} else {
		$game_list = pcc_GetAllGamesAwaitingAnyPlayer($my->id);
		if (! empty($game_list)) {
			echo "<h2>" . $pcc_lang['new_game_open_not_logged_in'] . "</h2>\n";
			pcc_EchoNewGameList ($game_list);
		} else {
			echo "<h2>" . $pcc_lang['new_game_no_open'] . "</h2>";
		}
	}
	break;
case 'acceptchallenge':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	pcc_ProcessAcceptGame($_POST['game_id'], $_POST['user_id'], $_POST['notify']);
	break;
case 'newchallenge':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	pcc_ProcessNewGame($_POST['user_id'], $_POST['color'], $_POST['notify'], $_POST['comment'], $_POST['challenger_id']);
	break;
case 'declinechallenge':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	pcc_ProcessDeclineGame($_REQUEST['game_id']);
	break;
case 'revokechallenge':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	pcc_RevokeChallenge($_REQUEST['game_id']);
	break;
case 'forkgame':
	pcc_SetItemID(pcc_GetItemIdNewGameMenuID());
	if (!(($_REQUEST['forkgame'] >= 1) && ($_REQUEST['forkgame'] <= 4))) {
			pcc_EchoGame($_REQUEST['game_id'], $_REQUEST['move'], $_REQUEST['color'], $pcc_lang['fork_game_no_player_selected']);
	} else {
		pcc_ProcessForkGame($_POST['game_id'], $_REQUEST['move'], $_REQUEST['color'], $_REQUEST['forkgame'], $_POST['user_id']);
	}
	break;
case 'players':
	pcc_SetItemID(pcc_GetItemIdPlayersMenuID());
	if (empty($_REQUEST['user_id'])) {
		$breakout = ($_REQUEST['breakout'] == "1" ? 1 : 0);
		$mainframe->setPageTitle($pcc_lang['players_html_title']);
		pcc_EchoPlayerList(pcc_GetAllPlayers(), $breakout);
	} else {
		$playeruserid = $_REQUEST['user_id'];
		$playerusername = pcc_GetUserName($playeruserid);
		$mainframe->setPageTitle(sprintf($pcc_lang['player_html_title'], $playerusername));		
		if (empty($playerusername)) {
			echo "<h2>" . sprintf($pcc_lang['players_not_found'], $playeruserid) . "</h2>\n";
		} else {
			$mainframe->appendPathWay($playerusername);
			$game_list = pcc_GetActiveGamesPlayersMove($playeruserid);
			if (! empty($game_list)) {
				echo "<h2>" . sprintf($pcc_lang['active_game_awaiting_move'], $playerusername) . "</h2>\n";
				pcc_EchoGameList ($game_list);
			} else {
				echo "<h2>" . sprintf($pcc_lang['active_game_no_awaiting_move'], $playerusername) . "</h2>";
			}
			$game_list = pcc_GetActiveGamesNotPlayersMove($playeruserid);
			if (! empty($game_list)) {
				echo "<h2>" . sprintf($pcc_lang['active_game_opponents_move'], $playerusername) . "</h2>\n";
				pcc_EchoGameList ($game_list);
			} else {
				echo "<h2>" . sprintf($pcc_lang['active_game_no_opponents_move'], $playerusername) . "</h2>";
			}
			$game_list = pcc_GetCompleteGamesOnePlayer($playeruserid);
			if (! empty($game_list)) {
				echo "<h2>" . sprintf($pcc_lang['complete_game_player'], $playerusername) . "</h2>\n";
				pcc_EchoGameList ($game_list);
			} else {
				echo "<h2>" . sprintf($pcc_lang['complete_game_no_player'], $playerusername) . "</h2>";
			}
		}
	}
	break;
case 'showallgames':
	$mainframe->setPageTitle($pcc_lang['all_games_html_title']);
	$mainframe->appendPathWay($pcc_lang['all_games_pathway']);
	pcc_SetItemID(pcc_GetItemIdMainMenuID());
	echo "<h2>" . $pcc_lang['all_games_header'] . "</h2>\n";
	pcc_EchoGameList(pcc_GetAllGames());
	break;
default:
	pcc_SetItemID(pcc_GetItemIdMainMenuID());
	echo "<p>" . $pcc_lang['unknown_request'] . "</p>";
    break;
}
?>
</div>