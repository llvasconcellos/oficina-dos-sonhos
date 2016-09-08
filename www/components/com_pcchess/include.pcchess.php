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

global $mosConfig_absolute_path;

/**************************************** LANGUAGE HANDLING ****************************************/
// Leave the next line in for all languages:
include_once($mosConfig_absolute_path . '/components/com_pcchess/pcc.lang.us.php');

// Uncomment the next line and change SAMPLE to the appropriate language for the language files.
//include_once($mosConfig_absolute_path . '/components/com_pcchess/pcc.lang.italian.php');

/************************************** END LANGUAGE HANDLING **************************************/


include_once($mosConfig_absolute_path . '/components/com_pcchess/chess.inc.php');

// General Functions
function pcc_UBBreplace( $var )
// Adapted from a function by Kirk Bushell.
// Obtained from http://www.liquidpulse.net/code/php/formatting/ubb_regular_expression_function
{
  # Strip any HTML tags
  $var = preg_replace( "/<\/?[^\\<>|\/]*>/", "", $var );

  # Bold, underline, and italic UBB tags
  $var = preg_replace( "/\[b\](.+)\[\/b\]/", "<b>\\1</b>", $var );
  $var = preg_replace( "/\[u\](.+)\[\/u\]/", "<u>\\1</u>", $var );
  $var = preg_replace( "/\[i\](.+)\[\/i\]/", "<i>\\1</i>", $var );

  # UBB Url tags
  $var = preg_replace( "/\[url=(.+)\](.+)\[\/url\]/", "<a href=\"\\1\">\\2</a>", $var );

  return $var;
}

function pcc_ConvertTextToList($text, $classname, $order=0) {
	return (empty($text) ? "" : "<" . ($order == 0 ? "ul" : "ol") . " class=\"" . $classname . "\">\n"
	 . pcc_ConvertLBToLI($text, $classname) 
	 . "</" . ($order == 0 ? "ul" : "ol") . ">\n");
}

function pcc_ConvertLBToLI($text, $classname) {
	$text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines
	$text = preg_replace("/\n\n+/", "\n\n", $text); // take care of duplicates
	$text = preg_replace('/\n?(.+?)(\n|\z)/s', "<li class=\"" . $classname . "\">$1</li>\n", $text);
	return $text;
}

function pcc_ConvertLBToBR($text) {
	$text = str_replace("\r\n", "\n", $text);
	$text = str_replace("\n", "<br />", $text);
	return $text;
}

function pcc_ConvertLBToSpace($text) {
	$text = str_replace("\r\n", "\n", $text);
	$text = str_replace("\n", " ", $text);
	return $text;
}

function pcc_AddOverlibCall($pcontent) {
	$content = str_replace("'","\\'", $pcontent);
	$content = str_replace("<", "\\u003C",$content);
	$content = str_replace(">", "\\u003E",$content);
	return (empty($content) ? "" : " onmouseover=\"return overlib('" . $content . "');\" onmouseout=\"return nd();\"");
}

//Echo Functions

function pcc_EchoPlayerList($player_list, $breakout=0) {
	global $pcc_lang;
	if (empty($player_list)) {
		echo "<h2>" . $pcc_lang['no_players'] . "</h2>";
	} else {
		echo "<h2>" . $pcc_lang['player_list_title'] . "</h2>\n";
		echo "<table class=\"pcc_gamelist\">\n";
		echo "<tr><th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_player'] . "</th>" .
		 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_active'] . "</th>" . 
		 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_complete'] . "</th>" . 
		 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_wins'] . "</th>" . 
		 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_draws	'] . "</th>";
		if ($breakout==1) {
			echo "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_active_white'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_complete_white'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_wins_white'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_draws_white'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_active_black'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_complete_black'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_wins_black'] . "</th>" . 
			 "<th class=\"pcc_gamelist\">" . $pcc_lang['player_list_th_draws_black'] . "</th>";
		}		 
		echo "</tr>\n";
		foreach ($player_list as $row) {
			$atag = "<a href=\"" . sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdPlayersMenuID() . 
			 "&amp;page=players&amp;user_id=" . $row->id) . "\">";
			echo "<tr><td class=\"pcc_gamelist\">" .  $atag . $row->username . "</a></td>" .
			 "<td class=\"pcc_gamelist\">" .  ($row->active_games_white + $row->active_games_black) . "</td>" . 
			 "<td class=\"pcc_gamelist\">" .  ($row->complete_games_white + $row->complete_games_black) . "</td>" . 
			 "<td class=\"pcc_gamelist\">" .  ($row->wins_white + $row->wins_black) . "</td>" .
			 "<td class=\"pcc_gamelist\">" .  ($row->draws_white + $row->draws_black) . "</td>";
			if ($breakout==1) {
				echo "<td class=\"pcc_gamelist\">" .  $row->active_games_white  . "</td>" . 
				 "<td class=\"pcc_gamelist\">" .  $row->complete_games_white . "</td>" . 
				 "<td class=\"pcc_gamelist\">" .  $row->wins_white . "</td>" .
				 "<td class=\"pcc_gamelist\">" .  $row->draws_white . "</td>" . 
				 "<td class=\"pcc_gamelist\">" .  $row->active_games_black . "</td>" . 
				 "<td class=\"pcc_gamelist\">" .  $row->complete_games_black . "</td>" .
				 "<td class=\"pcc_gamelist\">" .  $row->wins_black . "</td>" . 
				 "<td class=\"pcc_gamelist\">" .  $row->draws_black . "</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

function pcc_EchoNewGameForm() {
	global $pcc_lang;
	global $my;
	$submiturl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . "&amp;page=newchallenge");
	$playerlist = pcc_GetAllPlayers();
?>
<h2><?php echo $pcc_lang['new_game_form_heading'] ?></h2>
	<form action="<?php echo $submiturl ?>" method="post" name="pcc_data" class="pcchess_forminput">
	<input name="page" type="hidden" value="newchallenge">
	<input name="user_id" type="hidden" value="<?php echo $my->id ?>">
	<h3><?php echo $pcc_lang['new_game_form_color'] ?></h3>
	<input name="color" type="radio" value="0" checked="checked"> <?php echo $pcc_lang['new_game_form_white'] ?><br />
	<input name="color" type="radio" value="1"> <?php echo $pcc_lang['new_game_form_black'] ?><br />
	<h3><?php echo $pcc_lang['new_game_form_opponent'] ?></h3>
	<select name="challenger_id">
	  <option value="0" selected="selected"><?php echo $pcc_lang['new_game_form_any_player'] ?></option><?php
	  foreach ($playerlist as $row) {
	  	  if (!($row->id == $my->id)) {
		  	  echo "	  <option value=\"" . $row->id . "\">" . $row->username . "</option>\n";
		  }
	  }
?>	</select>
	<h3><?php echo $pcc_lang['new_game_form_notification'] ?></h3>
	<input name="notify" type="radio" value="1" checked="checked"> <?php echo $pcc_lang['new_game_form_notification_yes'] ?><br />
	<input name="notify" type="radio" value="0"> <?php echo $pcc_lang['new_game_form_notification_no'] ?><br />
	<h3><?php echo $pcc_lang['new_game_form_comment_head'] ?></h3>
	<textarea name="comment" cols="50" rows="5"></textarea><br />
	<input name="submit_pcc_data" type="submit" value="Create Game">
	</form>
<?php
}

function pcc_EchoForkGameForm($game_info, $move, $color) {
	global $pcc_lang;
	global $my;
	$submiturl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . "&amp;page=forkgame");
	if (!empty($my->id)) {
		?>
		<form action="<?php echo $submiturl ?>" method="post" name="pcc_fork" class="pcchess_forkgameform">
		<input name="page" type="hidden" value="forkgame">
		<input name="user_id" type="hidden" value="<?php echo $my->id ?>">
		<input name="game_id" type="hidden" value="<?php echo $game_info->game_id ?>">
		<input name="move" type="hidden" value="<?php echo $move ?>">
		<input name="color" type="hidden" value="<?php echo $color ?>">
		<select name="forkgame" onChange="this.form.fork_game_go.disabled = (this.form.forkgame.selectedIndex == 0);">
		<option value="0"><?php echo $pcc_lang['fork_game_first_option'] ?></option>
		<?php if ((($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id))) {
			echo "  <option value=\"1\">" . $pcc_lang['fork_game_same_players'] . "</option>\n" . 
			 "  <option value=\"2\">" . $pcc_lang['fork_game_switch_sides'] . "</option>";
		} ?>
 	  	<option value="3"><?php echo $pcc_lang['fork_game_open_white'] ?></option>
	  	<option value="4"><?php echo $pcc_lang['fork_game_open_black'] ?></option>
		</select>&nbsp;<input name="fork_game_go" id="fork_game_go" type="submit" value="<?php echo $pcc_lang['forms_go'] ?>" disabled="disabled"></form>
		<?php
	}
}

function pcc_ProcessForkGame($game_id, $move, $color, $forkgame, $user_id) {
	global $my, $database, $pcc_lang;
	
	if (! empty($my->id)) {
		if (! ($my->id == $user_id)) {
			echo "<p>" . $pcc_lang['process_fork_no_login'] . "</p>";
		} else {
			if (! (($color == "1") || ($color == "0"))) {
				echo "<p>" . $pcc_lang['process_fork_no_color'] . "</p>";
			} else {
				$game_info = pcc_GetInfoForOneGame($game_id);
				if (!empty($game_info)) {
					$last_move_no = ((0.0 + $move) <= $game_info->last_move_no ? 0.0 + $move : $game_info->last_move_no);
					$last_move_color = (((0.0 + $move) <= $game_info->last_move_no ? 0.0 + $color : 
					 ((0.0 + $color) <= $game_info->last_move_color ? 0.0 + $color : $game_info->last_move_color)));
					if ($forkgame == 1) {
						$white_user_id = $game_info->white_user_id;
						$black_user_id = $game_info->black_user_id;
						$notify_white = $game_info->notify_white;
						$notify_black = $game_info->notify_black;
						$complete = ($game_info->white_user_id == $user_id ? 3 : 4);
					} elseif ($forkgame == 2) {
						$white_user_id = $game_info->black_user_id;
						$black_user_id = $game_info->white_user_id;
						$notify_white = $game_info->notify_black;
						$notify_black = $game_info->notify_white;
						$complete = ($game_info->white_user_id == $user_id ? 4 : 3);
					} elseif ($forkgame == 3) {
						$white_user_id = $user_id;
						$black_user_id = 0;
						$notify_white = ($game_info->white_user_id == $user_id ? $game_info->notify_white : $game_info->notify_black);
						$notify_black = 0;
						$complete = 2;
					} elseif ($forkgame == 4) {
						$white_user_id = 0;
						$black_user_id = $user_id;
						$notify_white = 0;
						$notify_black = ($game_info->white_user_id == $user_id ? $game_info->notify_white : $game_info->notify_black);
						$complete = 2;
					} else {
						echo "<p>" . sprintf($pcc_lang['process_fork_bad_fork'], $forkgame) . "</p>";
						return false;
					}
					$query = "INSERT INTO #__chess_game (" .
					 "fork_from_game_id, \n" .
					 "start, \n" .
					 "white_user_id, \n" .
					 "black_user_id, \n" .
					 "result, \n" .
					 "complete, \n" .
					 "notify_white, \n" .
					 "notify_black, \n" .
					 "draw_offered, \n" .
					 "comment) \n" .
					 "VALUES ( " .
					 $game_id . ", \n" . 
					 "NOW(), \n" .
					 $white_user_id . ", \n" . 
					 $black_user_id . ", \n" . 
					 "0, \n" .
					 $complete . ", \n" .
					 $notify_white . ", \n" . 
					 $notify_black . ", \n" . 
					 "0, \n" .
					 "'" . htmlspecialchars(sprintf($pcc_lang['process_fork_comment'], $last_move_no, 
					 ($last_move_color == 0 ? $pcc_lang['white'] : $pcc_lang['black']),  
					 pcc_AwaitingChallengerName($game_info->white_username), pcc_AwaitingChallengerName($game_info->black_username),
					 date($pcc_lang['date_format'],  strtotime($game_info->start))),ENT_QUOTES) . "')";

					$database->setQuery( $query );
					$database->query();
					
					$query = "SELECT LAST_INSERT_ID()";
					$database->setQuery( $query );
					$new_game_id = $database->loadResult();
					
					$move_list = pcc_GetGameMoveList($game_id, $last_move_no, $last_move_color);
					
					$query = "INSERT INTO #__chess_move (" .
					 "game_id, " .
					 "move_no, " .
					 "color, " .
					 "move, " .
					 "comment, " .
					 "entered) \n" .
					 "VALUES ";
					$i = 0;
					foreach ($move_list as $row) {
						$i = $i + 1;
						if ($row->addmove == 1) {
							$query = $query . ($i == 1 ? " \n" : ", \n") . "(" .
							 $new_game_id . ", " .
							 $row->move_no . ", " .
							 $row->color . ", " .
							 "'" . $row->move . "', " .
							 ((($row->move_no == $last_move_no) && ($row->color == $last_move_color)) ? 
							  "'" . $pcc_lang['process_fork_last_move'] . "'" : "''") . ", " . 
							 "NOW())";
						} else {
							break;
						}
					}
					$database->setQuery( $query );
					$database->query();

					pcc_EchoGame($new_game_id, 1000, 1);
				} else {
					echo "<p>" . sprintf($pcc_lang['game_not_found'], $game_id) . "</p>";
				}
			}
		}
	} else {
		echo "<p>" . $pcc_lang['process_fork_no_login'] . "</p>";
	}
}

function pcc_EchoAcceptGameForm($game_info) {
	global $my, $pcc_lang;
	
	if (! empty($my->id)) {
		if ($game_info->complete == 3) {
			$acceptcolor = 1;
			$specific = true;
		} elseif ($game_info->complete == 4) {
			$acceptcolor = 0;
			$specific = true;
		} else {
			$acceptcolor = ($game_info->white_user_id == 0 ? 0 : 1);
			$specific = false;
		}
		echo "<h2>" . sprintf($pcc_lang['accept_game_header'], ($acceptcolor == 1 ? $pcc_lang["Black"] : $pcc_lang["White"]), 
		 ($acceptcolor == 1 ? pcc_AwaitingChallengerName($game_info->white_username) : pcc_AwaitingChallengerName($game_info->black_username))) . "</h2>\n";
		if (!empty($game_info->comment)) {
			echo "<p>" . $game_info->comment . "<p>\n";
		}
		$submiturl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . 
		 "&amp;page=acceptchallenge");
		$declineurl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . 
		 "&amp;page=declinechallenge&amp;game_id=" . $game_info->game_id);
?>
	<form action="<?php echo $submiturl ?>" method="post" name="pcc_data" class="pcchess_forminput">
	<input name="page" type="hidden" value="acceptchallenge">
	<input name="game_id" type="hidden" value="<?php echo $game_info->game_id ?>">
	<input name="user_id" type="hidden" value="<?php echo $my->id ?>">
	<input name="notify" type="radio" value="1" checked="checked"> <?php echo $pcc_lang['accept_game_notify'] ?><br />
	<input name="notify" type="radio" value="0"> <?php echo $pcc_lang['accept_game_no_notify'] ?><br />
	<input name="submit_pcc_data" type="submit" value="<?php echo $pcc_lang['accept_game_accept'] ?>">&nbsp;<?php if ($specific) {?><input name="decline_pcc_game" type="button" onClick="MM_goToURL('parent','<?php echo $declineurl ?>');return document.MM_returnValue" value="<?php echo $pcc_lang['accept_game_decline'] ?>"><?php } ?>
	</form>
<?php
		if ($game_info->total_no_moves > 0) {
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
			pcc_EchoGame($game_info->game_id, $move, $color, '', '', -1, '', true);
		}
	} else {
		echo "<p>" . $pcc_lang['accept_game_no_login'] . "</p>";
	}
}

function pcc_EchoRevokeChallengeForm($game_info) {
	global $my, $pcc_lang;
	
	if (! empty($my->id)) {
		echo "<h2>" . sprintf($pcc_lang['revoke_game_header'], pcc_AwaitingChallengerName($game_info->white_username), 
		 pcc_AwaitingChallengerName($game_info->black_username)) . "</h2>\n";
		if (!empty($game_info->comment)) {
			echo "<p>" . $game_info->comment . "<p>\n";
		}
		echo "<p>" . $pcc_lang['revoke_game_warn'] . "<p>\n";
		$declineurl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . 
		 "&amp;page=revokechallenge&amp;game_id=" . $game_info->game_id);
?>
	<form action="<?php echo $declineurl ?>" method="post" name="pcc_data" class="pcchess_forminput">
	<input name="decline_pcc_game" type="button" onClick="MM_goToURL('parent','<?php echo $declineurl ?>');return document.MM_returnValue" value="<?php echo $pcc_lang['revoke_game_revoke'] ?>">
	</form>
<?php
		if ($game_info->total_no_moves > 0) {
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
			pcc_EchoGame($game_info->game_id, $move, $color, '', '', -1, '', true);
		}
	} else {
		echo "<p>" . $pcc_lang['revoke_game_no_login'] . "</p>";
	}
}

function pcc_ProcessDeclineGame($game_id) {
	global $my, $database, $pcc_lang;
	
	if (! empty($my->id)) {
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (empty($game_info)) {
			echo "<p>" . sprintf($pcc_lang['game_not_found'], $game_id) . "</p>";
		} elseif ($game_info->complete < 2) {
			echo "<p>" . $pcc_lang['decline_already_begun'] . "</p>";
		} elseif (! ((($game_info->white_user_id == $my->id) && ($game_info->complete == 4)) || 
		 (($game_info->black_user_id == $my->id) && ($game_info->complete == 3)))) {
			echo "<p>" . $pcc_lang['decline_not_specific'] . "</p>";
		} else {
			$acceptcolor = ($game_info->complete == 4 ? 0 : 1);
			$from = $my->email;
			$fromname = $my->username;
			if ($acceptcolor == 0) {
				$notify_opponent = $game_info->notify_black;
				$user_name_opponent = $game_info->black_username;
				$recipient = $game_info->black_email;
			} else {
				$notify_opponent = $game_info->notify_white;
				$user_name_opponent = $game_info->white_username;
				$recipient = $game_info->white_email;
			}
			pcc_DeleteGame($game_info->game_id);
			if ($notify_opponent == 0) {
				$emailsent = false;
			} else {
				$subject = sprintf($pcc_lang['decline_subject'], $fromname);
				$body = sprintf($pcc_lang['decline_body'], $fromname, ($acceptcolor == "1" ? $pcc_lang["black"] : $pcc_lang["white"]));
				$emailsent = mosMail($from, $fromname, $recipient, $subject, $body);
			}
			echo "<p>" . sprintf(($emailsent ? $pcc_lang['decline_message_notify'] : $pcc_lang['decline_message_no_notify']), 
			 $user_name_opponent, ($acceptcolor == "1" ? $pcc_lang["black"] : $pcc_lang["white"])) . "</p>";
		}
	} else {
		echo "<p>" . $pcc_lang['decline_no_login'] . "</p>";
	}
}

// STOPPED INTERNATIONALIZATION TEST THIS NEXT LINE

function pcc_RevokeChallenge($game_id) {
	global $my, $database, $pcc_lang;
	if (! empty($my->id)) {
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (empty($game_info)) {
			echo "<p>" . sprintf($pcc_lang['game_not_found'],$game_id) . "</p>";
		} elseif ($game_info->complete < 2) {
			echo "<p>" . $pcc_lang['revoke_already_begun'] . "</p>";
		} elseif (! (((($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id)) && ($game_info->complete == 2)) || 
		 (($game_info->white_user_id == $my->id) && ($game_info->complete == 3)) || 
		 (($game_info->black_user_id == $my->id) && ($game_info->complete == 4)))) {
			echo "<p>" . $pcc_lang['revoke_not_specific'] . "</p>";
		} else {
			$gamedescription = pcc_AwaitingChallengerName($game_info->white_username) . $pcc_lang['v'] . pcc_AwaitingChallengerName($game_info->black_username);
			pcc_DeleteGame($game_info->game_id);
			echo "<p>" . sprintf($pcc_lang['revoke_success'], $gamedescription) . "</p>";
		}
	} else {
		echo "<p>" . $pcc_lang['revoke_no_login'] . "</p>";
	}
}

function pcc_DeleteGame($game_id) {
	global $database;
	$query = "DELETE FROM #__chess_game WHERE game_id = " . $game_id . " LIMIT 1";
	$database->setQuery( $query );
	$database->query();
	$query = "DELETE FROM #__chess_move WHERE game_id = " . $game_id;
	$database->setQuery( $query );
	$database->query();
}

function pcc_ProcessAcceptGame($game_id, $user_id, $notify) {
	global $my, $database, $pcc_lang;
	
	if (! empty($my->id)) {
		if (! ($my->id == $user_id)) {
			echo "<p>" . $pcc_lang['accept_no_login'] . "</p>";
		} else {
			$game_info = pcc_GetInfoForOneGame($game_id);
			if (empty($game_info)) {
				echo "<p>" . sprintf($pcc_lang['game_not_found'],$game_id) . "</p>";
			} elseif ((! (($game_info->white_user_id == 0) || ($game_info->black_user_id == 0))) && 
			 !(($game_info->complete == 3) || ($game_info->complete == 4))) {
				echo "<p>" . $pcc_lang['accept_already'] .  
				 "<a href=\"" . pcc_GetGamehref($game_info) . "\">" . 
				 pcc_AwaitingChallengerName($row->white_username) . $pcc_lang['v'] . 
		 		 pcc_AwaitingChallengerName($row->black_username) . "</a></p>";
			} elseif (($game_info->complete == 2) || ($game_info->complete == 3) || ($game_info->complete == 4)) {
				$acceptcolor = ($game_info->complete == 2 ? ($game_info->white_user_id == 0 ? 0 : 1) : ($game_info->complete == 4 ? 0 : 1));
				$from = $my->email;
				$fromname = $my->username;
				if ($acceptcolor == 0) {
					$notify_opponent = $game_info->notify_black;
					$user_name_opponent = $game_info->black_username;
					$recipient = $game_info->black_email;
				} else {
					$notify_opponent = $game_info->notify_white;
					$user_name_opponent = $game_info->white_username;
					$recipient = $game_info->white_email;
				}
				$query = "UPDATE #__chess_game SET " . 
				 "complete = 0, \n" . 
				 (($acceptcolor == 0) ? "white_user_id" : "black_user_id") . " = " . $my->id . ", \n" . 
				 (($acceptcolor == 0) ? "notify_white" : "notify_black") . " = " . ($notify == "0" ? '0' : '1') . " \n" . 
				 "WHERE game_id = " . $game_id;
				$database->setQuery( $query );
				$database->query();
				
				if ($notify_opponent == 0) {
					$emailsent = false;
				} else {
					$subject = $pcc_lang['accept_subject'];
					$url = pcc_GetGamehref($game_info);
					$body = sprintf($pcc_lang['accept_body'], $fromname, ($acceptcolor == "1" ? $pcc_lang["black"] : $pcc_lang["white"]), $url);
					$emailsent = mosMail($from, $fromname, $recipient, $subject, $body);
				}
				pcc_EchoGame($game_id, 1000, 1, "<p>" . sprintf(($emailsent ? $pcc_lang['accept_opponent_notified'] :
				 $pcc_lang['accept_opponent_not_notified']),$user_name_opponent, ($acceptcolor == "1" ? $pcc_lang["black"] : $pcc_lang["white"])) . ".<br />" .
				 ($notify == "0" ? $pcc_lang['accept_you_will_not_be_notified'] : $pcc_lang['accept_you_will_be_notified']) . "</p>");
			} else {
				echo "<p>" . $pcc_lang['accept_unknown'] . "<p>";
			}
		}
	} else {
		echo "<p>" . $pcc_lang['accept_no_login'] . "</p>";
	}
}

function pcc_ProcessNewGame($user_id, $color, $notify, $comment, $challenger_id) {
	global $my, $database, $pcc_lang;
	
	if (! empty($my->id)) {
		if (! ($my->id == $user_id)) {
			echo "<p>" . $pcc_lang['issue_challenge_no_login'] . "</p>";
		} else {
			if (! (($color == "1") || ($color == "0"))) {
				echo "<p>" . $pcc_lang['issue_challenge_no_color'] . "</p>";
			} else {
				$white_user_id = ($color == "0" ? $user_id : $challenger_id);
				$black_user_id = ($color == "1" ? $user_id : $challenger_id);
				$notify_white = ($color == "0" ? ($notify == "0" ? '0' : '1') : 0);
				$notify_black = ($color == "1" ? ($notify == "0" ? '0' : '1') : 0);
				$complete = ($challenger_id == "0" ? 2 : $color + 3);
				$query = "INSERT INTO #__chess_game (white_user_id, black_user_id, notify_white, notify_black, complete, comment, start) \n"
				 . "VALUES ("
				 . $white_user_id . ", \n"
				 . $black_user_id . ", \n"
				 . $notify_white . ", \n"
				 . $notify_black . ", \n"
				 . $complete . ", \n"
				 . "'" . htmlspecialchars($comment, ENT_QUOTES) . "', \n"
				 . "NOW())";
				$database->setQuery( $query );
				$database->query();
				
				echo "<p>" . sprintf($pcc_lang['issue_message'], ($color == "0" ? $pcc_lang["black"] : $pcc_lang["white"])) . " " .
				 ($notify == "0" ? $pcc_lang['issue_you_will_not_be_notified'] : $pcc_lang['issue_you_will_be_notified']) . "</p>";
			}
		}
	} else {
		echo "<p>" . $pcc_lang['issue_no_login'] . "</p>";
	}
}

function pcc_ShowAddMoveForm($game_id, $message='', $pcc_move='', $pcc_notify=1, $pcc_comment='') {
	global $my, $pcc_lang;
	
	$submiturl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdActiveGameMenuID() . "&amp;page=submitmove");
	if (! empty($message)) {
		echo "<span class=\"pcchess_error\">" . $message . "</span>\n";
	}
	$checked = (($pcc_notify == 1) ? " checked=\"checked\"" : '');
	?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_popupHelp() { //v1.0
  alert(<?php echo $pcc_lang[add_form_help_text] ?>);
}
//-->
</script>
	<br/><form action="<?php echo $submiturl ?>" method="post" name="pcc_data">
	<input name="page" type="hidden" value="submitmove">
	<input name="game_id" type="hidden" value="<?php echo $game_id ?>">
	<table><tr><td class="pcchess_formlabels"><?php echo $pcc_lang[add_form_move] ?></td><td class="pcchess_forminput"><input name="pcc_Move" type="text" size="8" maxlength="8" value="<?php echo $pcc_move ?>">
	<input name="submit_pcc_data" type="submit" value="<?php echo $pcc_lang['forms_go'] ?>">&nbsp;<input name="Help" type="button" onClick="MM_popupHelp()" value="<?php echo $pcc_lang[add_form_help] ?>"></td></tr>
	<tr><td colspan="2" class="pcchess_forminstruction"><?php echo $pcc_lang[add_form_instructions] ?></td></tr>
	<tr><td class="pcchess_formlabels"><?php echo $pcc_lang['add_form_comment'] ?></td><td class="pcchess_forminput"><input name="pcc_comment" type="text" size="30" maxlength="255" value="<?php echo htmlspecialchars($pcc_comment) ?>"></td></tr>
	<tr><td class="pcchess_formlabels"><input name="pcc_notify" type="checkbox" value="1"<?php echo $checked ?>></td><td class="pcchess_forminput"><?php echo $pcc_lang['add_form_notify'] ?></td></tr></table>
	</form>
	<?php
}

function pcc_EchoNewGameList ($game_list) {
	global $pcc_lang;
	echo "<table class=\"pcc_gamelist\">\n";
	echo "<tr><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_players'] . "</th><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_status'] . 
	 "</th><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_started'] . "</th>" . "<th class=\"pcc_gamelist\">" . $pcc_lang['game_list_comments'] . 
	 "</th></tr>\n";
	foreach ($game_list as $row) {
		$atag = "<a href=\"" . pcc_GetGamehref($row) . "\">";
		echo "<tr class=\"pcc_gamelist\"><td class=\"pcc_gamelist\">" . $atag . pcc_AwaitingChallengerName($row->white_username) . $pcc_lang['v'] . 
		 pcc_AwaitingChallengerName($row->black_username) . "</a>" . 
		 "</td><td class=\"pcc_gamelist\">" . pcc_GetGameStatus($row) . 
		 "</td><td class=\"pcc_gamelist\">" . date($pcc_lang['date_format'],  strtotime($row->start))  . 
		 "</td><td class=\"pcc_gamelist_comments\">" . pcc_ConvertLBToSpace(htmlspecialchars($row->comment)) . "</td></tr>\n";
	}
	echo "</table>\n";
}

function pcc_EchoGameList ($game_list, $showcomments = false) {
	global $pcc_lang;
	echo "<table class=\"pcc_gamelist\">\n";
	echo "<tr><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_players'] . "</th><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_status'] . 
	 "</th><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_started'] . "</th>" .
	 "<th class=\"pcc_gamelist\">" . $pcc_lang['game_list_num_moves'] . "</th><th class=\"pcc_gamelist\">" . $pcc_lang['game_list_last_move'] . "</th></tr>\n";
	foreach ($game_list as $row) {
		$atag = "<a href=\"" . pcc_GetGamehref($row) . "\">";
		echo "<tr class=\"pcc_gamelist\"><td class=\"pcc_gamelist\">" . $atag . pcc_AwaitingChallengerName($row->white_username) . $pcc_lang['v'] . 
		 pcc_AwaitingChallengerName($row->black_username) . "</a>" . 
		 "</td><td class=\"pcc_gamelist\">" . pcc_GetGameStatus($row) . 
		 "</td><td class=\"pcc_gamelist\">" . date($pcc_lang['date_format'],  strtotime($row->start))  . 
		 "</td><td class=\"pcc_gamelist\">" . round($row->move_and_color,0) . 
		 "</td><td class=\"pcc_gamelist\">" . date($pcc_lang['date_time_format'],  strtotime($row->last_move)) . "</td></tr>\n";
		if ($showcomments && (! empty($row->comment))) {
			echo "<tr><td class=\"pcc_gamelist_comments\" colspan=\"5\">" . pcc_ConvertLBToSpace(htmlspecialchars($row->comment)) . "</td></tr>\n";
		}
	}
	echo "</table>\n";
}

function pcc_DrawGame($game_id, $pcc_comment) {
	global $my, $database, $pcc_lang;
	if (empty($my->id)) {
		echo "<p>" . $pcc_lang['draw_no_login'] . "</p>";
	} elseif (empty($game_id)) {
		echo "<p>" . $pcc_lang['no_game_id'] . "</p>";
	} else {
		//Confirm game and user id.
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (! (($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id))) {
			echo "<p>" . sprintf($pcc_lang['draw_wrong_player'], $game_info->white_username, $game_info->black_username) . "</p>";
		} else {
			$nextmovecolor = ($game_info->move_and_color == 0 ? 0 : 
			 ((($game_info->move_and_color - round($game_info->move_and_color,0)) == 0) ? 1 : 0));
			$send = pcc_SendMoveEmail($game_id, $nextmovecolor, "DRAW", htmlspecialchars($pcc_comment, ENT_QUOTES));
			$emailmsg = ($send ? $pcc_lang['draw_message_notify'] : $pcc_lang['draw_message_no_notify']);
			$query = "UPDATE #__chess_game SET draw_offered = 1 \n WHERE game_id = " . $game_id;
			$database->setQuery( $query );
			$database->query();			
			echo pcc_EchoGame($game_id, 1000, 1, $emailmsg);
		}
	}
}

// STOPPED INTERNATIONALIZATION TEST THIS NEXT LINE

function pcc_ResignGame($game_id, $pcc_comment) {
	global $my, $database, $pcc_lang;
	if (empty($my->id)) {
		echo "<p>" . $pcc_lang['resign_no_login'] . "</p>";
	} elseif (empty($game_id)) {
		echo "<p>" . $pcc_lang['no_game_id'] . "</p>";
	} else {
		//Confirm game and user id.
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (! (($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id))) {
			echo "<p>" . sprintf($pcc_lang['resign_wrong_player'], $game_info->white_username, $game_info->black_username) . "</p>";
		} else {
			$nextmovecolor = ($game_info->move_and_color == 0 ? 0 : 
			 ((($game_info->move_and_color - round($game_info->move_and_color,0)) == 0) ? 1 : 0));
			$send = pcc_SendMoveEmail($game_id, $nextmovecolor, "RESIGN", htmlspecialchars($pcc_comment, ENT_QUOTES));
			$emailmsg = ($send ? $pcc_lang['resign_message_notify'] : $pcc_lang['resign_message_no_notify']);
			$query = "UPDATE #__chess_game SET result = " . ($nextmovecolor + 4 . ", \n"
			 . "complete = 1 \n"
			 . "WHERE game_id = " . $game_id);
			$database->setQuery( $query );
			$database->query();			
			echo pcc_EchoGame($game_id, 1000, 1, $emailmsg);
		}
	}
}

function pcc_ProcessAcceptDraw($game_id, $accept) {
	global $my, $database, $pcc_lang;
	if (empty($my->id)) {
		echo "<p>" . $pcc_lang['accept_draw_no_login'] . "</p>";
	} elseif (empty($game_id)) {
		echo "<p>" . $pcc_lang['no_game_id'] . "</p>";
	} else {
		//Confirm game and user id.
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (! (($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id))) {
			echo "<p>" . sprintf($pcc_lang['accept_draw_wrong_player'], $game_info->white_username, $game_info->black_username) . "</p>";
		} else {
			$nextmovecolor = ($game_info->move_and_color == 0 ? 0 : 
			 ((($game_info->move_and_color - round($game_info->move_and_color,0)) == 0) ? 1 : 0));
			$send = pcc_SendMoveEmail($game_id, 1-$nextmovecolor, ($accept ? "ACCEPT" : "REJECT"), htmlspecialchars($pcc_comment, ENT_QUOTES));
			$emailmsg = ($send ? ($accept ? $pcc_lang['accept_draw_accept_notify'] : $pcc_lang['accept_draw_reject_notify']) :
			 ($accept ? $pcc_lang['accept_draw_accept_no_notify'] : $pcc_lang['accept_draw_reject_no_notify']));
			$query = "UPDATE #__chess_game SET result = " . ($accept ? "3" : "0") . ", \n"
			 . "complete = " . ($accept ? "1" : "0") . ", \n"
			 . "draw_offered = 0 \n"
			 . "WHERE game_id = " . $game_id;
			$database->setQuery( $query );
			$database->query();			
			echo pcc_EchoGame($game_id, 1000, 1, $emailmsg);
		}
	}
}

function pcc_AwaitingChallengerName($user_name) {
	global $pcc_lang;
	return (empty($user_name) ? $pcc_lang['awaiting_player'] : $user_name);
}

function pcc_GetGameStatus($game_info) {
	global $pcc_lang;
	if ($game_info->complete == 2) {
		return ($game_info->white_user_id == 0 ? $pcc_lang['game_status_awaiting_white'] : $pcc_lang['game_status_awaiting_black']);
	} elseif ($game_info->complete == 3) {
		// awaiting acceptance from black
		return $pcc_lang['game_status_awaiting_black'];
	} elseif ($game_info->complete == 4) {
		// awaiting acceptance from white
		return $pcc_lang['game_status_awaiting_white'];
	} elseif ($game_info->complete == 5) {
		// awaiting acceptance from white
		return $pcc_lang['game_status_admin_suspend'];
	} elseif ($game_info->draw_offered == 1) {
		return (($game_info->move_and_color == 0.0 || !( ($game_info->move_and_color - round($game_info->move_and_color,0)) == 0.0)) ? 
		 $pcc_lang['game_status_white_draw_offer'] : $pcc_lang['game_status_black_draw_offer']);
	} elseif ($game_info->complete == 0) {
		return (($game_info->move_and_color == 0.0 || !( ($game_info->move_and_color - round($game_info->move_and_color,0)) == 0.0)) ? 
		 $pcc_lang['game_status_white_to_move'] : $pcc_lang['game_status_black_to_move']);
	} else {
		if ($game_info->result == 0) {
			return $pcc_lang['game_status_white_mated_black'];
		} elseif ($game_info->result == 1) {
			return $pcc_lang['game_status_black_mated_white'];
		} elseif ($game_info->result == 2) {
			return $pcc_lang['game_status_stalemate'];
		} elseif ($game_info->result == 3) {
			return $pcc_lang['game_status_draw_agreed_to'];
		} elseif ($game_info->result == 4) {
			return $pcc_lang['game_status_white_resigned'];
		} elseif ($game_info->result == 5) {
			return $pcc_lang['game_status_black_resigned'];
		} else {
			return $pcc_lang['game_status_unknown_result'];
		}
	}
}

function pcc_EchoGame($game_id, $move, $color, $message='', $pcc_move='', $pcc_notify=-1, $pcc_comment='', $calledfromacceptgame=false) {
	global $Notation, $NotationList, $my, $mainframe, $pcc_lang;
	
	$game_info = pcc_GetInfoForOneGame($game_id);
	if (empty($game_info)) {
		echo "<p>" . sprintf($pcc_lang['game_not_found'],$game_id) . "<p>";
	} else {
		pcc_SetItemID(pcc_GetGameItemId($game_info));
		if (empty($my->id)) {
			$mygame = false;
		} else {
			$mygame = (($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id));
		}
		
		if ((!$calledfromacceptgame) && (($game_info->complete == 2) && (! $mygame) && (! empty($my->id)))) {
			pcc_EchoAcceptGameForm($game_info);
		} elseif ((!$calledfromacceptgame) && (($game_info->complete == 3) && ($game_info->black_user_id == $my->id) && (! empty($my->id)))) {
			pcc_EchoAcceptGameForm($game_info);
		} elseif ((!$calledfromacceptgame) && (($game_info->complete == 4) && ($game_info->white_user_id == $my->id) && (! empty($my->id)))) {
			pcc_EchoAcceptGameForm($game_info);
		} elseif ((!$calledfromacceptgame) && ((((($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id)) && ($game_info->complete == 2)) || 
		 (($game_info->white_user_id == $my->id) && ($game_info->complete == 3)) || 
		 (($game_info->black_user_id == $my->id) && ($game_info->complete == 4))))) {
			if (empty($my->id)) {
				pcc_EchoAcceptGameForm($game_info);
			} else {
				pcc_EchoRevokeChallengeForm($game_info);
			}
		} else {
			$mainframe->setPageTitle(pcc_AwaitingChallengerName($game_info->white_username) . $pcc_lang['v'] . 
			 pcc_AwaitingChallengerName($game_info->black_username) . $pcc_lang['started'] . date($pcc_lang['date_format'],  strtotime($game_info->start)));
			$mainframe->appendPathWay(pcc_AwaitingChallengerName($game_info->white_username) . $pcc_lang['v'] . 
			 pcc_AwaitingChallengerName($game_info->black_username));
			if (! $calledfromacceptgame) {
				echo "<h2>" . pcc_AwaitingChallengerName($game_info->white_username) . $pcc_lang['v'] . 
				 pcc_AwaitingChallengerName($game_info->black_username) . $pcc_lang['started'] . date($pcc_lang['date_format'],  strtotime($game_info->start)) . "</h2>\n";
			} else {
				echo "<h2>" . $pcc_lang['echo_game_start_position'] . "</h2>\n";
			}
			$movelist = pcc_GetGameMoveList($game_id, $move, $color);
			if (read_Game($movelist, true)) {
				echo "<table class=\"pcchess_gamedisplay\">\n";
				echo "<tr><td class=\"pcchess_gamedisplay\">";
				echo "<table class=\"pcchess_movelist\">\n";
				$openrow = false;
				
				$nummoves = 0;
				$nummovesshow = 0;
				$nextmove_no = "P";
				$prevmove_no = "N";		
				$nextcolor = "0";
				foreach ($movelist as $row) {
					if ($row->color == 0) {
						echo "<tr>";
						$openrow = true;
						echo "<td class=\"pcchess_movelist\">" . $row->move_no . ".</td>";
					}
					
					$atag = "<a href=\"" . pcc_GetGamehref($game_info, $row->move_no, $row->color) ."\" class=\"pcchess_movelink" . 
					 ($row->addmove == 1 ? 'shown' : '') . "\"" .  ">";
					echo "<td class=\"pcchess_movelist" . (empty($row->comment) ? '' : '_comment') . "\"" .  
					 pcc_AddOverlibCall(pcc_ConvertLBToBR(date($pcc_lang['date_time_format'], strtotime($row->entered)) . 
					(empty($row->comment) ? '' : "\n\n" . htmlspecialchars($row->comment)))) . ">" . $atag . 
					pcc_TranslatePGN($NotationList[$nummoves]) . "</a></td>";
					
					if ($row->color == 1) {
						echo "</tr>\n";
						$openrow = false;
					}
					if ($row->addmove == 1) {
						$nummovesshow++;
					} else {
						if ($nextmove_no == "P") {
							$nextcolor = $row->color;
							$nextmove_no = $row->move_no;
							$prevmove_no = $row->move_no-1;
						}
					}
					$nummoves++;
				}
				if ($nummoves == 0) {
					$nextmove_no = 1;
					$nextcolor = 0;
				}
				//Take care of special case for previous button of being on last move.
				if (empty($my->id)) {
					$mymove = false;
					$blackonbottom = false;
				} else {
					$blackonbottom = ($game_info->black_user_id == $my->id);
					if (empty($movelist)) {
						$mymove = ($game_info->white_user_id == $my->id);
					} else {
						$row = end($movelist);
						if ($mygame) {
							$mymove = (($game_info->white_user_id == $my->id) && ($row->color == 1)) || 
							 (($game_info->black_user_id == $my->id) && ($row->color == 0));
						} else {
							$mymove = false;
						}
					}
				}
				$showaddmoveform = ((($nummovesshow == $nummoves) and $mymove) and ($game_info->complete == 0));
				if (($prevmove_no == "N") && ($nummovesshow > 1)){
					// flip to opposite color.
					$nextcolor = 1-$row->color;
					$prevmove_no = $row->move_no-$nextcolor;
				}
				if ($openrow) {
					echo "<td class=\"pcchess_movelist\">&nbsp;</td></tr>\n";
				}
	
				$showacceptdraw = false;
				if ($game_info->draw_offered == 1) {
					$showaddmoveform = false;
					if ($mymove) {
						if (empty($message)) {
							$message = $pcc_lang["echo_game_player_offered_draw"];
						}
					} elseif ($mygame) {
						$showacceptdraw = true;
					} else {
						$message = (($nextcolor == 0) ? $pcc_lang["echo_game_white_offered_draw"] : $pcc_lang["echo_game_black_offered_draw"]);
					}
				}
				
				if ($pcc_notify == -1) {
					// Read notify move if not passed in.
					$pcc_notify = (($nextcolor == 0) ? $game_info->notify_white : $game_info->notify_black);
				}
				echo "<tr><td class=\"pcchess_exportlink\" colspan=\"3\"><a class=\"pcchess_exportlink\" href=\"" . pcc_GetGamePGNhref($game_info) . 
				 "\">" . $pcc_lang["echo_game_export"] . "</a></td></tr>\n";
				echo "</table>\n";
				echo "</td>\n<td class=\"pcchess_gamedisplay\">";
				if (read_Game($movelist, false)) {
					echo get_current_Position($blackonbottom, $showaddmoveform);
					echo "\n<br/>";
					$event1 = "\"MM_goToURL('parent','";
					$event2 = "');return document.MM_returnValue\"";
					
					echo "<input value=\" |&lt; \" onclick=" . $event1 .
					 pcc_GetGamehref($game_info, "1", "0") . $event2 . " type=\"button\"" .
					 ($nummovesshow < 2 ? " disabled=\"disabled\"" : '') . "/>\n";
					
					echo "<input value=\" &lt;&lt; \" onclick=" . $event1 .
					 pcc_GetGamehref($game_info, $prevmove_no, $nextcolor) . $event2 . 
					 " type=\"button\"" .
					 ($nummovesshow < 2 ? " disabled=\"disabled\"" : '') . "/>\n";
		
					echo "<input value=\"" . $pcc_lang["echo_game_refresh"] . "\" onclick=" . $event1 .
					 pcc_GetGamehref($game_info) . $event2 . 
					 " type=\"button\"/>\n";
					
					echo "<input value=\" &gt;&gt; \" onclick=" . $event1 .
					 pcc_GetGamehref($game_info, $nextmove_no, $nextcolor) . $event2 . 
					 " type=\"button\"" . ($nummovesshow == $nummoves ? " disabled=\"disabled\"" : '') . "/>\n";
					
					$row = end($movelist);
					echo "<input value=\" &gt;| \" onclick=" . $event1 .
					 pcc_GetGamehref($game_info, $row->move_no, $row->color) . $event2 . 
					 " type=\"button\"" . ($nummovesshow == $nummoves ? " disabled=\"disabled\"" : '') . "/>\n<br/>";
					if ($showaddmoveform) {
						pcc_ShowAddMoveForm($game_id, $message, $pcc_move, $pcc_notify, $pcc_comment);
					} elseif ($showacceptdraw) {
						pcc_ShowAcceptDrawForm($game_id, $nextcolor);
					} elseif (! empty($message) ) {
						echo $message;
					} elseif (($game_info->complete > 1)) {
						echo $pcc_lang["echo_game_not_started"] . strtolower(pcc_GetGameStatus($game_info)) . ".";
					} elseif (!($game_info->complete == 0)) {
						echo $pcc_lang["echo_game_over"] . strtolower(pcc_GetGameStatus($game_info)) . ".";
					} elseif ($mymove) {
						echo $pcc_lang["echo_game_last_position_to_move"];
					} elseif ($mygame) {
						echo $pcc_lang["echo_game_opponents_move"];
					}
					if (($game_info->complete == 0) || ($game_info->result> 2) || (($game_info->complete == 1) && !($nummovesshow == $nummoves))) {
						pcc_EchoForkGameForm($game_info, $move, $color);
					} else {
						echo "<br />";
					}
					echo pcc_GetDiscussThisLink($game_info);
				} else {
					echo "<p>" . $pcc_lang["error"] . $query . "</p>";
				}
				echo "</td></tr></table>\n";
			} else {
				echo "<p>" . $pcc_lang["error"] . $query . "</p>";
			}
		}
	}
}

function pcc_TranslatePGN($move) {
	global $pcc_lang_pgn_find, $pcc_lang_pgn_replace, $pcc_lang_pgn_interim;
	$interim_move = str_replace($pcc_lang_pgn_find, $pcc_lang_pgn_interim, $move);
	return str_replace($pcc_lang_pgn_interim, $pcc_lang_pgn_replace, $interim_move);
}

function pcc_ShowAcceptDrawForm($game_id, $nextcolor) {
	global $my, $pcc_lang;
	$submiturl = sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdActiveGameMenuID() . "&amp;page=acceptdraw");
?>
	<br /><form action="<?php echo $submiturl ?>" method="post" name="pcc_data" class="pcchess_forminput">
	<input name="page" type="hidden" value="acceptdraw">
	<input name="game_id" type="hidden" value="<?php echo $game_id ?>">
	<input name="user_id" type="hidden" value="<?php echo $my->id ?>">
	<?php echo $pcc_lang['accept_draw_prompt'] ?> <input name="accept" type="radio" value="1"><?php echo $pcc_lang['Yes'] ?>&nbsp;
	<input name="accept" type="radio" value="0" checked="checked"><?php echo $pcc_lang['No'] ?> &nbsp;<input name="submit_pcc_data" type="submit" value="<?php echo $pcc_lang['forms_go'] ?>"></form>
<?php
}

function pcc_ProcessMove($game_id, $p_pcc_Move, $pcc_notify, $pcc_comment) {
	global $my, $database, $pgn_Move, $pcc_lang;
	$pcc_Move = htmlspecialchars($p_pcc_Move, ENT_QUOTES);
	if (empty($pcc_Move)) {
		pcc_EchoGame($game_id, 1000, 1, $pcc_lang['process_move_no_move']);
	} elseif (empty($my->id)) {
		echo "<p>" . $pcc_lang['process_move_no_login'] . "</p>";
	} elseif (empty($game_id)) {
		echo "<p>" . $pcc_lang['no_game_id'] . "</p>";
	} else {
		//Confirm game and user id.
		$game_info = pcc_GetInfoForOneGame($game_id);
		if (! (($game_info->white_user_id == $my->id) || ($game_info->black_user_id == $my->id))) {
			echo "<p>" . sprintf($pcc_lang['process_move_wrong_player'], $game_info->white_username, $game_info->black_username) . "</p>";
		} else {
			$nextmovecolor = ($game_info->move_and_color == 0 ? 0 : 
			 ((($game_info->move_and_color - round($game_info->move_and_color,0)) == 0) ? 1 : 0));
			$nextmove = ($game_info->move_and_color == 0 ? 1 : 
			 round($game_info->move_and_color,0) + ($nextmovecolor == 0 ? 1 : 0));
			$current_notify = (($nextmovecolor == 0) ? $game_info->notify_white : $game_info->notify_black);
			$new_notify = (($pcc_notify == 1) ? 1 : 0);
			if (! ($my->id == ($nextmovecolor == 0 ? $game_info->white_user_id : $game_info->black_user_id))) {
				echo "<p>" . $pcc_lang['echo_game_opponents_move'] . "</p>";
			} else {
				$movelist = pcc_GetGameMoveList($game_id, 1000, 1);
				if (read_Game($movelist, true)) {
					if (add_Move($pcc_Move)) {
					
						//Translate pgn notation:
						$pgn_Move = pcc_TranslatePGN($pgn_Move);
						
						$game_status = get_GameState();
						$query = "INSERT INTO #__chess_move (game_id, move_no, color, move, comment, entered) \n"
						 . "VALUES ("
						 . $game_id . ", \n"
						 . $nextmove . ", \n"
						 . $nextmovecolor . ", \n"
						 . "'" . $pcc_Move . "', \n"
						 . "'" . htmlspecialchars($pcc_comment, ENT_QUOTES) . "', \n"
						 . "NOW())";
						$database->setQuery( $query );
						$database->query();
						$send = pcc_SendMoveEmail($game_id, $nextmovecolor, $pgn_Move, htmlspecialchars($pcc_comment, ENT_QUOTES));
						$emailmsg = "<br/>" . ($send ? $pcc_lang['process_move_reject_notify'] : $pcc_lang['process_move_accept_no_notify']);
						if (!($new_notify == $current_notify)) {
							$query = "UPDATE #__chess_game SET " . (($nextmovecolor == 0) ? "notify_white" : "notify_black") . 
							 " = " . $new_notify . " \n"
							 . "WHERE game_id = " . $game_id;
							$database->setQuery( $query );
							$database->query();			
						}
						if (($game_status == 1) || ($game_status == 2)) {
							$query = "UPDATE #__chess_game SET result = " . ($game_status == 1 ? $nextmovecolor : 2) . ", \n"
							 . "complete = 1 \n "
							 . "WHERE game_id = " . $game_id;
							$database->setQuery( $query );
							$database->query();			
							echo pcc_EchoGame($game_id, 1000, 1, ($game_status == 1 ? sprintf($pcc_lang['process_move_checkmate'], $pgn_Move) :
							 sprintf($pcc_lang['process_move_stalemate'], $pgn_Move)) . "." . $emailmsg);
						} else {
							echo pcc_EchoGame($game_id, 1000, 1, sprintf($pcc_lang['process_move_added'], $pgn_Move) . $emailmsg);
						}
					} else {
						echo pcc_EchoGame($game_id, 1000, 1, sprintf($pcc_lang['process_move_invalid'], $pgn_Move), 
						 $pcc_Move, $pcc_notify, $pcc_comment);
					}
				} else {
					echo "<p>" . $pcc_lang['process_move_error'] . "</p>";
				}
			}
		}
	}
}

function pcc_SendMoveEmail($game_id, $move_color, $pgn_Move, $pcc_comment) {
	global $pcc_lang;
	$game_info = pcc_GetInfoForOneGame($game_id);

	if ($move_color == 0) {
		//white moved
		$from = $game_info->white_email;
		$fromname = $game_info->white_username;
		$recipient = $game_info->black_email;
		$send_email = $game_info->notify_black;
	} else {
		$from = $game_info->black_email;
		$fromname = $game_info->black_username;
		$recipient = $game_info->white_email;
		$send_email = $game_info->notify_white;
	}
	if ($send_email == 1) {
		$url = pcc_GetGamehref($game_info);
		$subject = $pcc_lang['send_mail_subject'];
		$comment = (empty($pcc_comment) ? "" : sprintf($pcc_lang['send_mail_comment'], $fromname) . "\"" . $pcc_comment . "\"");
		if ($pgn_Move == "RESIGN") $move = sprintf($pcc_lang['send_mail_resign'], $fromname, $game_info->white_username, $pcc_lang['v'],
		    $game_info->black_username, $url);
		elseif ($pgn_Move == "DRAW") $move = sprintf($pcc_lang['send_mail_draw_offer'], $fromname, $game_info->white_username, $pcc_lang['v'],
		    $game_info->black_username, $url);
		elseif ($pgn_Move == "ACCEPT") $move = sprintf($pcc_lang['send_mail_draw_accept'], $fromname, $game_info->white_username, $pcc_lang['v'],
		    $game_info->black_username, $url);
		elseif ($pgn_Move == "REJECT")$move = sprintf($pcc_lang['send_mail_draw_reject'], $fromname, $game_info->white_username, $pcc_lang['v'],
		    $game_info->black_username, $url);
		else $move = sprintf($pcc_lang['send_mail_move'], $fromname, $pgn_Move, $game_info->white_username, $pcc_lang['v'],
		    $game_info->black_username, $url);
		$body = $move . $comment;
		return mosMail($from, $fromname, $recipient, $subject, $body);
	} else {
		return false;
	}
}

//Database Functions
function pcc_GetGameMoveList($game_id, $move, $color) {
	global $database;
	if (($color + 0.0) == 0.0) {
		$cond = " (m.move_no < " . $move . " OR (m.move_no = " . $move . " AND m.color = 0))";
	} else {
		$cond = " (m.move_no <= " . $move . ")";
	}
	$cond = "if(" . $cond . ", 1, 0) addmove";
	$query = "SELECT m.move, m.move_no, m.color, m.comment, m.entered, "  . $cond . 
	 " FROM #__chess_move m WHERE m.game_id = " . $game_id . " ORDER BY m.move_no, m.color";
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetUserName($user_id) {
	global $database;
	$query = 'SELECT username FROM #__users WHERE id=' . $user_id;
	$database->setQuery( $query );
	return $database->loadResult();
}

//Returns Y in first (0) position if player has active games, otherwise N.
//Returns Y in second (1) position if player has complete games, otherwise N.
function pcc_HasGames() {
	global $database;
	global $my;
	if (! empty($my->id)) {
		$query = 'SELECT SUM(IF(g.complete = 0, 1, 0)) num_active, SUM(IF(g.complete = 1, 1, 0)) num_complete ' . 
		 ' FROM #__chess_game g ' . 
		 ' WHERE g.white_user_id = ' . $my->id . ' OR g.black_user_id = ' . $my->id;
		$database->setQuery( $query );
		$rows = $database->loadObjectList();
		if (empty ($rows)) {
			return 'NN';
		} else {
			return (($rows[0]->num_active > 0) ? 'Y' : 'N') . (($rows[0]->num_complete > 0) ? 'Y' : 'N');
		}
	} else {
		return 'NN';
	}
}

function pcc_GetInfoForOneGame($game_id) {
	global $database;
	$query = pcc_GetGameListSQL('g.game_id = ' . $game_id);
	$database->setQuery( $query );
	$res = $database->loadObjectList();
	if (empty($res)) {
		return;
	} else {
		return $res[0];
	}
}

function pcc_GetMyActiveGames() {
	global $database;
	global $my;
	$myid = (! empty($my->id) ? $my->id : -1);
	$query = pcc_GetGameListSQL('g.complete = 0 AND (g.white_user_id = ' . $myid . ' OR g.black_user_id = ' . $myid . ')');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetMyActiveGamesMyMove() {
	global $my;
	return pcc_GetActiveGamesPlayersMove((! empty($my->id) ? $my->id : -1));
}

function pcc_GetActiveGamesPlayersMove($userid) {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 0 AND (g.white_user_id = ' . $userid . ' OR g.black_user_id = ' . $userid . ')', 
	 'COALESCE(IF(g.white_user_id = ' . $userid . ', ((MAX(m.move_no + m.color/10) - MAX(m.move_no))*10) <> 0, ' .
	 '((MAX(m.move_no + m.color/10) - MAX(m.move_no))*10) = 0),0) OR ' .
	  '((COALESCE(COUNT(m.move_no),0) = 0) AND (g.white_user_id = ' . $userid . '))');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetMyActiveGamesNotMyMove() {
	global $my;
	return pcc_GetActiveGamesNotPlayersMove((! empty($my->id) ? $my->id : -1));
}

function pcc_GetActiveGamesNotPlayersMove($userid) {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 0 AND (g.white_user_id = ' . $userid . ' OR g.black_user_id = ' . $userid . ')', 
	 'COALESCE(IF(g.white_user_id = ' . $userid . ', ((MAX(m.move_no + m.color/10) - MAX(m.move_no))*10) = 0, ' .
	 '((MAX(m.move_no + m.color/10) - MAX(m.move_no))*10) <> 0),0) OR ' .
	  '((COALESCE(COUNT(m.move_no),0) = 0) AND (g.white_user_id <> ' . $userid . '))');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetNotMyActiveGames() {
	global $database;
	global $my;
	$myid = (! empty($my->id) ? $my->id : -1);
	$query = pcc_GetGameListSQL('g.complete = 0 AND !(g.white_user_id = ' . $myid . ' OR g.black_user_id = ' . $myid . ')');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetMyCompleteGames() {
	global $my;
	return pcc_GetCompleteGamesOnePlayer((! empty($my->id) ? $my->id : -1));
}

function pcc_GetCompleteGamesOnePlayer($userid) {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 1 AND (g.white_user_id = ' . $userid . ' OR g.black_user_id = ' . $userid . ')');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetNotMyCompleteGames() {
	global $database;
	global $my;
	$myid = (! empty($my->id) ? $my->id : -1);
	$query = pcc_GetGameListSQL('g.complete = 1 AND !(g.white_user_id = ' . $myid . ' OR g.black_user_id = ' . $myid . ')');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllActiveGames() {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 0');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllCompleteGames() {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 1');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllGamesAwaitingAnyPlayer() {
	global $database;
	$query = pcc_GetGameListSQL('g.complete = 2');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllGamesAwaitingAnyButOnePlayer($user_id) {
	global $database;
	$query = pcc_GetGameListSQL('((g.complete = 2) AND NOT (black_user_id = ' . $user_id . ' OR white_user_id = ' . $user_id . '))');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllGamesAwaitingAPlayer($user_id) {
	global $database;
	$query = pcc_GetGameListSQL('(g.complete = 3 AND black_user_id = ' . $user_id . ') OR (g.complete = 4 AND white_user_id = ' . $user_id . ')');
	$database->setQuery( $query );
	return $database->loadObjectList();
}


function pcc_GetAllGamesIssuedByAPlayer($user_id) {
	global $database;
	$query = pcc_GetGameListSQL('((g.complete = 4 AND black_user_id = ' . $user_id . ') OR (g.complete = 3 AND white_user_id = ' . $user_id . '))' .
	 ' OR ((g.complete = 2) AND (black_user_id = ' . $user_id . ' OR white_user_id = ' . $user_id . '))');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetAllPlayers() {
	global $database;
	$query = "SELECT u.id, \n" . 
	 " u.username, \n" . 
	 "  u.email, \n" . 
	 "  COUNT(g.game_id) games_white,  \n" . 
	 "  SUM(IF(g.complete=0,1,0)) active_games_white, \n" . 
	 "  SUM(IF(g.complete=1,1,0)) complete_games_white, \n" . 
	 "  SUM(IF((g.result = 0 or g.result = 5) AND (g.complete=1), 1, 0)) wins_white, \n" . 
	 "  SUM(IF((g.result = 2 or g.result = 3) AND (g.complete=1), 1, 0)) draws_white, \n" . 
	 "  0 as games_black,  \n" . 
	 "  0 as active_games_black,  \n" . 
	 "  0 as complete_games_black, \n" . 
	 "  0 as wins_black, \n" . 
	 "  0 as draws_black \n" . 
	 " FROM #__chess_game g INNER JOIN #__users u ON g.white_user_id = u.id  \n" . 
	 " GROUP BY u.id, u.username, u.email  \n" . 
	 " ORDER BY u.username, u.id";
	$database->setQuery( $query );
	$user_list = $database->loadObjectList();
	
	$query = "SELECT u.id, \n" . 
	 " u.username, \n" . 
	 "  u.email, \n" . 
	 "  0 as games_white,  \n" . 
	 "  0 as active_games_white,  \n" . 
	 "  0 as complete_games_white, \n" . 
	 "  0 as wins_white, \n" . 
	 "  0 as draws_white, \n" . 
	 "  COUNT(g.game_id) games_black,  \n" . 
	 "  SUM(IF(g.complete=0,1,0)) active_games_black, \n" . 
	 "  SUM(IF(g.complete=1,1,0)) complete_games_black, \n" . 
	 "  SUM(IF((g.result = 1 or g.result = 4) AND (g.complete=1), 1, 0)) wins_black, \n" . 
	 "  SUM(IF((g.result = 2 or g.result = 3) AND (g.complete=1), 1, 0)) draws_black \n" . 
	 " FROM #__chess_game g INNER JOIN #__users u ON g.black_user_id = u.id  \n" . 
	 " GROUP BY u.id, u.username, u.email  \n" . 
	 " ORDER BY u.username, u.id";
	$database->setQuery( $query );
	$black_list = $database->loadObjectList();
	
	foreach($black_list as $black) {
		$key = pcc_array_usearch('pcc_compare_user_objects', $black, $user_list);
		if ($key == -1) {
			// Add element to array and set white values.
			$user_list[] = $black;
		} else {
			//Set black values.
			$user_list[$key]->active_games_black = $black->games_black;
			$user_list[$key]->active_games_black = $black->active_games_black;
			$user_list[$key]->complete_games_black = $black->complete_games_black;
			$user_list[$key]->wins_black = $black->wins_black;
			$user_list[$key]->draws_black = $black->draws_black;
		}
	}
	uasort($user_list,'pcc_Compare_User_Names');
	return  $user_list;
}

function pcc_Compare_User_Names($a, $b) {
       $al = strtolower($a->username);
       $bl = strtolower($b->username);
       if ($al == $bl) {
           return 0;
       }
       return ($al > $bl) ? +1 : -1;
}

function pcc_array_usearch($cb, $ndl, $hs, $strict=false) {
   if (!is_array($hs)) user_error('Third argument to array_usearch is expected to be an array, '.gettype($hs).' given', E_USER_ERROR);
   foreach($hs as $key=>$value) if (call_user_func_array($cb, Array($ndl, $value, $key, $strict))) return $key;
   return -1;
};

function pcc_compare_user_objects($ndl, $value, $key, $strict) {
	return ($ndl->id == $value->id);
}

function pcc_GetAllGames(){
	global $database;
	$query = pcc_GetGameListSQL('');
	$database->setQuery( $query );
	return $database->loadObjectList();
}

function pcc_GetGameListSQL($where, $having = '') {
    return "SELECT g.game_id, \n " . 
     "g.start, \n " . 
     "g.white_user_id, \n " . 
     "g.black_user_id, \n " . 
     "g.notify_white, \n " . 
     "g.notify_black, \n " . 
     "uw.username white_username, \n " . 
     "ub.username black_username, \n " . 
     "uw.email white_email, \n " . 
     "ub.email black_email, \n " . 
     "g.result,  \n " . 
     "g.complete, \n " . 
     "g.draw_offered,  \n " . 
     "g.comment, \n " . 
     "g.discuss_url,  \n " .   
	 "MAX(m.move_no + m.color/10) move_and_color, \n " . 
     "MAX(m.move_no) last_move_no, \n " . 
     "((MAX(m.move_no + m.color/10) - MAX(m.move_no))*10) last_move_color, \n " . 
     "COALESCE(COUNT(m.move_no),0) total_no_moves, \n" . 
	 "MAX(m.entered) last_move \n " . 
     "FROM (#__chess_game g \n " . 
     "LEFT JOIN #__users uw ON g.white_user_id = uw.id \n " . 
     "LEFT JOIN #__users ub ON g.black_user_id = ub.id) \n " . 
     "LEFT JOIN #__chess_move m ON g.game_id = m.game_id \n " . 
     (! empty($where) ? "WHERE " . $where . " \n": "") .
	 "GROUP BY g.game_id, \n " . 
     "g.start, \n " . 
     "g.white_user_id, \n " . 
     "g.black_user_id, \n " . 
     "uw.username, \n " . 
     "ub.username, \n " . 
     "g.result,  \n " . 
     "g.comment, \n " . 
     "g.discuss_url,  \n " .   
     "g.complete, \n " . 
     "g.draw_offered  \n " . 
     (! empty($having) ? "HAVING " . $having . " \n": "") .
     "ORDER BY last_move DESC, g.start ASC ";
}

function pcc_GetGameItemId($game_info) {
	if ($game_info->complete == 0) {
		return pcc_GetItemIdActiveGameMenuID();
	} elseif ($game_info->complete == 1) {
		return pcc_GetItemIdCompleteGameMenuID();
	} elseif (($game_info->complete == 2) || ($game_info->complete == 3) || ($game_info->complete == 4)) {
		return pcc_GetItemIdNewGameMenuID();
	} else {
		return pcc_GetItemIdMainMenuID();
	}
}

function pcc_GetGamehref($game_info, $move=-1, $color=-1){
	if (empty($game_info)) {
		return sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdMainMenuID());
	} else {
		if ($move==-1) {
			return sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetGameItemId($game_info) . 
			 "&amp;page=showgame&amp;game_id=" . $game_info->game_id);
		} else {
			return sefRelToAbs("index.php?option=com_pcchess&amp;Itemid=" . pcc_GetGameItemId($game_info) . 
			 "&amp;page=showgame&amp;game_id=" . $game_info->game_id . "&amp;move=" . $move . "&amp;color=" . $color);
		}
	}
}

function pcc_GetGamePGNhref($game_info) {
	global $mosConfig_live_site;
	return $mosConfig_live_site ."/components/com_pcchess/exportpgn.php?game_id=" . $game_info->game_id;
}

function pcc_SetItemID($pItemid) {
	global $Itemid;
	if (empty($_REQUEST['Itemid']) || !(($_REQUEST['Itemid'] == pcc_GetItemIdActiveGameMenuID()) || 
	 ($_REQUEST['Itemid'] == pcc_GetItemIdCompleteGameMenuID()) || 
	 ($_REQUEST['Itemid'] == pcc_GetItemIdNewGameMenuID()) || 
	 ($_REQUEST['Itemid'] == pcc_GetItemIdPlayersMenuID()) || 
	 ($_REQUEST['Itemid'] == pcc_GetItemIdMainMenuID()))) {
		$_REQUEST['Itemid'] = $pItemid;
		$Itemid = $pItemid;
	}	
}

function pcc_GetDiscussThisLink($game_info) {
	global $pcc_lang;
	$link = "";
	$discuss_link = "";
	if (!empty($game_info->discuss_url)) {
		if (is_callable('pcc_GetLinkFromGameInfo', false)) {
			$link = pcc_GetLinkFromGameInfo($game_info);
		} else {
			$link_text = $pcc_lang['discuss_this_link_view_comments'];
			$discuss_link = $game_info->discuss_url;
		}
	} elseif (is_callable('pcc_DiscussThisLink', false)) {
		$discuss_link = pcc_DiscussLink($game_info);
		$link_text = $pcc_lang['discuss_this_link_this_game'];
	} elseif (is_callable('pcc_DiscussGeneralLink', false)) {
		$discuss_link = pcc_DiscussGeneralLink();
		$link_text = $pcc_lang['discuss_this_link_games'];
	} else {
		$discuss_link = '';
	}
	if (!empty($link)) {
		return $link;
	} elseif (!empty($discuss_link)) {
		return "\n<a href=\"" . $discuss_link . "\">" . $link_text . "</a>\n";
	} else {
		return '';
	}
}

// These functions ensure that the appropriate menu item is highlighted.
// If not using mambo menu items to control the flow, set all to the main chess menu item id
// and set the return value of pcc_UseMamboMenus to false.

function pcc_UseMamboMenus() {
	// If you want to display the menu items across the top of the component instead of using 
	// mambo menu items.
	global $mosConfig_live_site;
	return ($mosConfig_live_site == "http://www.princeclan.org");
}

function pcc_GetItemIdMainMenuID(){
	// Change return value to item id of main chess page.
	// This menu item should be a component menu item set to the PrinceClan Chess component.
	return 81;
}

function pcc_GetItemIdActiveGameMenuID(){
	// Change return value to item id of active games chess page.
	// The url for this menu item should look like this:
	// /index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdActiveGameMenuID() . "&amp;page=allactivegames
	return 84;
}

function pcc_GetItemIdCompleteGameMenuID(){
	// Change return value to item id of complete games chess page.
	// The url for this menu item should look like this:
	// "/index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdCompleteGameMenuID() . "&amp;page=allcompletegames
	return 86;
}

function pcc_GetItemIdNewGameMenuID(){
	// Change return value to item id of new game chess page.
	// The url for this menu item should look like this:
	// "/index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdNewGameMenuID() . "&amp;page=newgame
	return 85;
}

function pcc_GetItemIdPlayersMenuID(){
	// Change return value to item id of players chess page.
	// The url for this menu item should look like this:
	// "/index.php?option=com_pcchess&amp;Itemid=" . pcc_GetItemIdPlayersMenuID() . "&amp;page=players
	return 87;
}
?>