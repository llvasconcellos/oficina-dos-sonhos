<?php
// Language file for princeclan chess component.
// This is the core U.S. English file, and should be included whether before the local language file.

$pcc_lang = array(
	//General Messages.
	'date_time_format'					=> "d M y H:i:s",
	'date_format'						=> "d M y",
	'forms_go'							=> "Go",
	'game_not_found'					=> "Game number %s could not be found.",
	'no_game_id'						=> "No game_id present.",
	'v'									=> " v. ",
	'black'								=> "black",
	'white'								=> "white",
	'Black'								=> "Black",
	'White'								=> "White",
	'started'							=> " started ",
	'error'								=> "Error: ",
	'Yes'								=> "Yes",
	'No'								=> "No",
	
	//Top links and main page title.
	'toplink_activegames' 				=>	"Active Games",
	'toplink_newgame' 					=>	"New Game",
	'toplink_completegames' 			=>	"Complete Games",
	'toplink_players' 					=>	"Players",
	'component_title' 					=>	"PrinceClan Correspondence Chess Club",
	
	//Active games.
	'active_game_html_title'			=> "Active Chess Games",
	'active_game_all'					=> "All Active Games:",
	'active_game_no_games'				=> "There are no active games.",
	'active_game_specific_challenges'	=> "Challenges Issued Specifically to %s:",
	'active_game_awaiting_move'			=> "Games Awaiting Move by %s:",
	'active_game_no_awaiting_move'		=> "There are no games awaiting a move by %s.",
	'active_game_opponents_move'		=> "Games Awaiting Move by %s's Opponent:",
	'active_game_no_opponents_move'		=> "There are no games awaiting a move by %s's opponent.",
	'active_game_other'					=> "Other Active Games:",
	'active_game_no_other'				=> "There are no other active games.",
	
	//Complete games.
	'complete_game_html_title'			=> "Complete Chess Games",
	'complete_game_all'					=> "All Complete Games:",
	'complete_game_no_games'			=> "There are no complete games.",
	'complete_game_player'				=> "%s's Complete Games:",
	'complete_game_no_player'			=> "%s has no complete games.",
	'complete_game_other'				=> "Other Complete Games:",
	'complete_game_no_other'			=> "There are no other complete games.",
	
	//Submit move.
	'submit_move_corrupt'				=> "The data for the move to add is corrupted. Please try again.",
	'submit_move_empty'					=> 'The move is empty. Please enter a move.',
	'submit_move_resign_caps_warn'		=> 'You must type "RESIGN" in all caps in order to resign.',
	'submit_move_draw_caps_warn'		=> 'You must type "DRAW" in all caps in order to offer a draw.',
	
	//New games.
	'new_game_html_title'				=> "New Chess Games",
	'new_game_specific'					=> "Click one of the challenges specific to you to accept:",
	'new_game_no_specific'				=> "There are no challenges specific to you.",
	'new_game_open'						=> "Click one of the open challenges to accept:",
	'new_game_open_not_logged_in'		=> "Log in or register to accept one of the open challenges:",
	'new_game_no_open'					=> "There are no open challenges.",
	'new_game_pending'					=> "The following challenges were issued by you:",
	'new_game_no_pending'				=> "There are no pending challenges issued by you.",
	
	//Fork game.
	'fork_game_no_player_selected'		=> "You must select a player option to<br />create a new game at this position.",
	
	//Players.
	'players_html_title'				=> "Chess Players",
	'player_html_title'					=> "%s's Chess Games",
	'players_not_found'					=> "%s is not a recognized user id.",
	'players_html_title'				=> "Chess Players",
	'players_html_title'				=> "Chess Players",
	'players_html_title'				=> "Chess Players",

	//All games.
	'all_games_html_title'				=> "All Chess Games",
	'all_games_pathway'					=> "All Games",
	'all_games_header'					=> "All Games in the System",

	//All games.
	'unknown_request'					=> "Unknown Request",
	
	//pcc_EchoPlayerList()
	'no_players'						=> "There are no players yet.",
	'player_list_title'					=> "Player List and Results Summary",	
	'player_list_th_player'				=> "Player",
	'player_list_th_active'				=> "Active<br />Games",
	'player_list_th_complete'			=> "Complete<br />Games",
	'player_list_th_wins'				=> "Wins",
	'player_list_th_draws'				=> "Draws",
	'player_list_th_active_white'		=> "Active<br />Games<br />White",
	'player_list_th_complete_white'		=> "Complete<br />Games<br />White",
	'player_list_th_wins_white'			=> "Wins<br />White",
	'player_list_th_draws_white'		=> "Draws<br />White",
	'player_list_th_active_black'		=> "Active<br />Games<br />Black",
	'player_list_th_complete_black'		=> "Complete<br />Games<br />Black",
	'player_list_th_wins_black'			=> "Wins<br />Black",
	'player_list_th_draws_black'		=> "Draws<br />Black",
	
	//pcc_EchoNewGameForm()
	'new_game_form_heading'				=> "Enter info to issue a challenge:",
	'new_game_form_color'				=> "Color:",
	'new_game_form_white'				=> "White",
	'new_game_form_black'				=> "Black",
	'new_game_form_opponent'			=> "Opponent:",
	'new_game_form_any_player'			=> "** Any Player **",
	'new_game_form_notification'		=> "Notification:",
	'new_game_form_notification_yes'	=> "Notify me via email when my opponent moves.",
	'new_game_form_notification_no'		=> "Do not notify me via email when my opponent moves - I will check daily.",
	'new_game_form_comment_head'		=> "Comments:",
	
	//pcc_EchoForkGameForm()
	'fork_game_first_option'			=> "--Create new game at this position--",
	'fork_game_same_players'			=> "Use same players",
	'fork_game_switch_sides'			=> "Same players, switch sides",
	'fork_game_open_white'				=> "Post open challenge with me as white",
	'fork_game_open_black'				=> "Post open challenge with me as black",

	//pcc_ProcessForkGame()
	'process_fork_no_login'				=> "You must be logged in correctly to create a new game.",
	'process_fork_no_color'				=> "A correct color was not selected.",
	'process_fork_bad_fork'				=> "The fork value %s is incorrect.",
	'process_fork_comment'				=> "This game was forked at move %1\$s/%2\$s from the game between " . 
										   "%3\$s v. %4\$s that was started on %5\$s.",
	'process_fork_last_move'			=> "Last move transferred from parent game.",
	
	//pcc_EchoAcceptGameForm()
	'accept_game_header'				=> "Accept Offer to Play %1\$s v. %2\$s",
	'accept_game_notify'				=> "Notify me via email when my opponent moves.",
	'accept_game_no_notify'				=> "Do not notify me via email when my opponent moves - I will check daily.",
	'accept_game_accept'				=> "Accept Challenge",
	'accept_game_decline'				=> "Decline Challenge",
	'accept_game_no_login'				=> "You must be logged in to accept a challenge for a new game.",

	//pcc_EchoRevokeChallengeForm()
	'revoke_game_header'				=> "Your Challenge for the Game %s v. %s",
	'revoke_game_warn'    				=> "WARNING: Once you click &quot;Revoke Challenge&quot; this game will be deleted with no prompting.",
	'revoke_game_revoke'				=> "Revoke Challenge",
	'revoke_game_no_login'				=> "You must be logged in to revoke a challenge for a new game.",
	
	//pcc_ProcessDeclineGame()
	'decline_already_begun'				=> "This game has already begun an may not be declined.",
	'decline_not_specific'				=> "This challenge was not specific to you so you may not decline it.",
	'decline_subject'					=> "Prince Clan Chess: Your challenge to %s has been declined.",
	'decline_body'						=> "%1\$s declined to accept your challenge to play %2\$s.",
	'decline_message_notify'			=> "%1\$s has been notified by email of your declining to play %2\$s.",
	'decline_message_no_notify'			=> "%1\$s has not been notified by email of your declining to play %2\$s.",
	'decline_no_login'					=> "You must be logged in to decline a game.",
	
	//pcc_RevokeChallenge()
	'revoke_already_begun'				=> "This game has already begun an may not be revoked.",
	'revoke_not_specific'				=> "This challenge was not specific to you so you may not revoke it.",
	'revoke_success'					=> "The challenge issued for %s has been revoked.",
	'revoke_no_login'					=> "You must be logged in to revoke a challenge.",

	//pcc_ProcessAcceptGame()
	'accept_no_login'					=> "You must be logged in to accept a challenge.",
	'accept_already'					=> "This game was already accepted by someone else: ",
	'accept_subject'					=> "Prince Clan Chess: Your challenge has been accepted.",
	'accept_body'						=> "%1\$s agreed to play %2\$s at %3\$s.",
	'accept_you_will_be_notified'		=> "You will be notified by email when your opponent moves.",
	'accept_you_will_not_be_notified'	=> "You will not be notified by email when<br />your opponent moves. Please check back daily.",
	'accept_unknown'					=> "Unknown situation in pcc_ProcessAcceptGame().",
	'accept_opponent_notified'			=> "%1\$s has been notified by email of your agreement to play %2\$s.",
	'accept_opponent_not_notified'		=> "%1\$s has not been notified by email of your agreement to play %2\$s.",
	
	//pcc_ProcessNewGame()
	'issue_challenge_no_login'			=> "You must be logged in correctly to issue a challenge.",
	'issue_challenge_no_color'			=> "A correct color was not selected.",
	'issue_you_will_be_notified'		=> "You will be notified via email when this challenge is accepted.",
	'issue_you_will_not_be_notified'	=> "You will not be notified via email when this challenge is accepted. Please check back daily.",
	'issue_message'						=> "Your request for an opponent to play %s has been saved.",
	'issue_no_login'					=> "You must be logged in to create a new game.",

	//pcc_ShowAddMoveForm()
	'add_form_move'						=> "Move:",
	'add_form_help'						=> "Help",
	'add_form_instructions'				=> "Type RESIGN in Move to resign, DRAW to offer draw.",
	'add_form_comment'					=> "Comment:",
	'add_form_notify'					=> "Notify me when my opponent moves.",

	//Game List
	'game_list_players'					=> "Players",
	'game_list_status'					=> "Status",
	'game_list_started'					=> "Started",
	'game_list_num_moves'				=> "#&nbsp;Moves",
	'game_list_last_move'				=> "Last&nbsp;Move",
	'game_list_comments'				=> "Comments",
	
	//pcc_DrawGame()
	'draw_no_login'						=> "You must be logged in to offer a draw.",
	'draw_wrong_player'					=> "This game is between %1\$s and %2\$s. Only these players may offer draws in this game.",
	'draw_message_notify'				=> ' An email was sent to notify<br />your opponent of your draw offer.',
	'draw_message_no_notify'			=> ' Your opponent has not been<br />notified of your draw offer.',

	//pcc_ResignGame()
	'resign_no_login'					=> "You must be logged in to resign.",
	'resign_wrong_player'				=> "This game is between %1\$s and %2\$s. Only these players may resign in this game.",
	'resign_message_notify'				=> ' An email was sent to notify<br />your opponent of your resignation.',
	'resign_message_no_notify'			=> ' Your opponent has not been<br />notified of your resignation.',

	//pcc_ProcessAcceptDraw()
	'accept_draw_no_login'				=> "You must be logged in to accept or reject a draw.",
	'accept_draw_wrong_player'			=> "This game is between %1\$s and %2\$s. Only these players may accept or reject draws in this game.",
	'accept_draw_accept_notify'			=> ' An email was sent to notify<br />your opponent that you accept the draw.',
	'accept_draw_accept_no_notify'		=> ' Your opponent has not been<br />notified that you accept the draw.',
	'accept_draw_reject_notify'			=> ' An email was sent to notify<br />your opponent that you reject the draw.',
	'accept_draw_reject_no_notify'		=> ' Your opponent has not been<br />notified that you reject the draw.',

	//pcc_AwaitingChallengerName()
	'awaiting_player'					=> "&lt;Awaiting Player&gt;",

	//pcc_GetGameStatus()
	'game_status_awaiting_white'		=> "Awaiting white",
	'game_status_awaiting_black'		=> "Awaiting black",
	'game_status_admin_suspend'			=> "Admin suspend",
	'game_status_white_draw_offer'		=> "White offered draw",
	'game_status_black_draw_offer'		=> "Black offered draw",
	'game_status_white_to_move'			=> "White to move",
	'game_status_black_to_move'			=> "Black to move",
	'game_status_white_mated_black'		=> "White mated black",
	'game_status_black_mated_white'		=> "Black mated white",
	'game_status_stalemate'				=> "Stalemate",
	'game_status_draw_agreed_to'		=> "Draw agreed to",
	'game_status_white_resigned'		=> "White resigned",
	'game_status_black_resigned'		=> "Black resigned",
	'game_status_unknown_result'		=> "Unknown result",
	
	//pcc_EchoGame()
	'echo_game_start_position'			=> 'The game will start in the following position:',
	'echo_game_player_offered_draw'		=> "You offered your opponent a draw.<br />You must wait for a response.",
	'echo_game_white_offered_draw'		=> "White has offered a draw.<br />Black has not responded.",
	'echo_game_black_offered_draw'		=> "You offered your opponent a draw.<br />You must wait for a response.",
	'echo_game_export'					=> "export game",
	'echo_game_refresh'					=> "Refresh",
	'echo_game_not_started'				=> "Game not started, ",
	'echo_game_over'					=> "Game over, ",
	'echo_game_last_position_to_move'	=> "Go to the last position to enter your move.",
	'echo_game_opponents_move'			=> "It's your opponent's move.",
	
	//pcc_ShowAcceptDrawForm()
	'accept_draw_prompt'				=> 'Accept the draw?',

	//pcc_ProcessMove()
	'process_move_no_move'				=> "You must enter a move.",
	'process_move_no_login'				=> "You must be logged in to enter a move.",
	'process_move_wrong_player'			=> "This game is between %1\$s and %2\$s. Only these players may enter a move in this game.",
	'process_move_accept_no_notify'		=> ' Your opponent has not been<br />notified of your move.',
	'process_move_reject_notify'		=> ' An email was sent to notify<br />your opponent of your move.',
	'process_move_checkmate'			=> 'The move %s resulted in checkmate. You win!',
	'process_move_stalemate'			=> 'The move %s resulted in stalemate. The game is a draw.',
	'process_move_added'				=> 'The move %s was added to the game.',
	'process_move_invalid'				=> 'The move %s is not valid from this position.',
	'process_move_error'				=> 'There was an error reading your game from the database.',
	
	//pcc_SendMoveEmail()
	'send_mail_subject'					=> "Prince Clan Chess Automated Move Notification",
	'send_mail_comment'					=> " %s made the following comment: ",
	'send_mail_resign'					=> "%1\$s resigned in the game %2\$s%3\$s%4\$s at %5\$s.",
	'send_mail_draw_offer'				=> "%1\$s offered a draw in the game %2\$s%3\$s%4\$s at %5\$s.",
	'send_mail_draw_accept'				=> "%1\$s accepted a draw in the game %2\$s%3\$s%4\$s at %5\$s.",
	'send_mail_draw_reject'				=> "%1\$s rejected a draw in the game %2\$s%3\$s%4\$s at %5\$s.",
	'send_mail_move'					=> "%1\$s made the move %2\$s in the game %3\$s%4\$s%5\$s at %6\$s.",
	
	//pcc_GetDiscussThisLink()
	'discuss_this_link_view_comments'	=> 'View comments about this game in the Chess forum.',
	'discuss_this_link_this_game'		=> 'Discuss this game in the Chess forum.',
	'discuss_this_link_games'			=> 'Discuss games in the Chess forum.',
	
	//Module
	'pcc_status_your_turn_header'		=> 'Chess Games - Your Turn',
	'pcc_status_your_turn_none'			=> 'There are no chess games in which it is your turn.',
	'pcc_status_opp_turn_header'		=> "Chess Games - Opponent's Turn",
	'pcc_status_opp_turn_none'			=> "There are no chess games in which it is your opponent's turn.",
	'pcc_status_spec_challenges'		=> "Chess Challenges Specific to You",
	'pcc_status_spec_challenges_none'	=> "There are no chess challenges specific to you.",
	'pcc_status_open_challenges'		=> "Open Chess Challenges",
	'pcc_status_open_challenges_none'	=> "There are no open chess challenges.",

	'add_form_help_text'				=> "'Enter moves using the notation start-end using algebraic notation for square positions. For example, e2-e4.\\n\\n' +
	 'Clicking on the start and end square will put the correct notation in the move box.\\n\\n' +
	 'To castle, enter the start square and the target square for the King. For example, e1-g1 or e1-c1. All castling rules are enforced.\\n\\n' +
	 'To capture a pawn en passant, enter the square of the pawn being moved and the square the pawn will end up in. For example, e4-f3.\\n\\n' +
	 'Pawns are automatically promoted to queens unless specified. For example, e7-e8 N will promote the pawn to a Knight. Use Q, B, R, N. ' +
	 'The space between the target square and piece designation is mandatory.\\n\\n' +
	 'Type DRAW to offer or accept a draw. There is no way to withdraw a draw offer once made.\\n\\n'+
	 'Type RESIGN to resign. There is no way to withdraw a resignation.'",


	'end'								=> "end"
);

$pcc_lang_pgn_find = array(
    "K",
    "Q",
    "R",
    "B",
    "N");

$pcc_lang_pgn_interim = array(
    "~",
    "@",
    "*",
    "$",
    "%");

$pcc_lang_pgn_replace = array(
    "K",
    "Q",
    "R",
    "B",
    "N");
?>