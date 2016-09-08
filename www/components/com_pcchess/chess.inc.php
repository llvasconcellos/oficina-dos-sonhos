<?php

#  These php3 scripts are freeware.
#  That means, you may use and change it freely for any purpose.
#  However, please send an email to the author 
#  (http://www.mailchess.de/chessphpfeedback.html)
#  if you use this script in any way.

#  This software is provided 'as-is',
#  without any express or implied warranty.
#  In no event the author will be held liable
#  for any damages arising from the use of this software.

#  Please send comments or bug reports to http://www.mailchess.de/chessphpfeedback.html

#  Modified for inclusion into the Prince Clan Chess component for Mambo.



# These variables are set before a move is verified or executed

$move_from_Square = 0;
$move_to_Square = 0;
$move_promotion_figur = 0;


# These variables are set after each execution of a move
# They describe the status of position

$move_ep_Square = 0;
$move_turn = 1;
$move_castling_ws = TRUE;
$move_castling_wl = TRUE;
$move_castling_bs = TRUE;
$move_castling_bl = TRUE;
$move_PlyNumber = 0;


# Variables for the move list
# Only used in move_count

$move_list_from = array(200);
$move_list_to = array(200);
$move_list_count = 0;

# For creating the notation
$pgn_piece = "";
$pgn_from_digit = "";
$pgn_from_letter = "";
$pgn_capture = FALSE;
$pgn_square_list = array(8);  // For writing Sge2 (if two or more pieces can enter a square)

# For handling of result when mate or so

$State = 0;

# How a piece can move

$ab_Bishop = array(-9, -11, 9, 11);
$ab_Rook   = array(-1, 10, 1, -10);
$ab_Knight = array(19, 21, 12, -8, -19, -21, -12, 8);
$ab_Queen  = array(-9, -11, 9, 11, -1, 10, 1, -10);
$ab_King   = array(-9, -11, 9, 11, -1, 10, 1, -10);

# Constants for get_GameState()

define("gsRunning" , 0);
define("gsMate" , 1);
define("gsStalemate" , 2);
define("gsCheck" , 3);

# The values of the pieces

define("WK" , 6);    define("BK" , -6);
define("WQ" , 5);    define("BQ" , -5);
define("WR" , 2);    define("BR" , -2);
define("WB" , 3);    define("BB" , -3);
define("WN" , 4);    define("BN" , -4);
define("WP" , 1);    define("BP" , -1);


# The values of the squares

define("sq_a1",21);define("sq_b1",22);define("sq_c1",23);define("sq_d1",24);
define("sq_a2",31);define("sq_b2",32);define("sq_c2",33);define("sq_d2",34);
define("sq_a3",41);define("sq_b3",42);define("sq_c3",43);define("sq_d3",44);
define("sq_a4",51);define("sq_b4",52);define("sq_c4",53);define("sq_d4",54);
define("sq_a5",61);define("sq_b5",62);define("sq_c5",63);define("sq_d5",64);
define("sq_a6",71);define("sq_b6",72);define("sq_c6",73);define("sq_d6",74);
define("sq_a7",81);define("sq_b7",82);define("sq_c7",83);define("sq_d7",84);
define("sq_a8",91);define("sq_b8",92);define("sq_c8",93);define("sq_d8",94);

define("sq_e1",25);define("sq_f1",26);define("sq_g1",27);define("sq_h1",28);
define("sq_e2",35);define("sq_f2",36);define("sq_g2",37);define("sq_h2",38);
define("sq_e3",45);define("sq_f3",46);define("sq_g3",47);define("sq_h3",48);
define("sq_e4",55);define("sq_f4",56);define("sq_g4",57);define("sq_h4",58);
define("sq_e5",65);define("sq_f5",66);define("sq_g5",67);define("sq_h5",68);
define("sq_e6",75);define("sq_f6",76);define("sq_g6",77);define("sq_h6",78);
define("sq_e7",85);define("sq_f7",86);define("sq_g7",87);define("sq_h7",88);
define("sq_e8",95);define("sq_f8",96);define("sq_g8",97);define("sq_h8",98);


# The board variable
# It is surrounded by "edge values"; empty squares are 0

$first_Position  = array(
  100,100,100,100,100,100,100,100,100,100,
  100,100,100,100,100,100,100,100,100,100,
  100,WR ,WN ,WB ,WQ ,WK ,WB ,WN ,WR ,100,
  100,WP ,WP ,WP ,WP ,WP ,WP ,WP ,WP ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,BP ,BP ,BP ,BP ,BP ,BP ,BP ,BP ,100,
  100,BR ,BN ,BB ,BQ ,BK ,BB ,BN ,BR ,100,
  100,100,100,100,100,100,100,100,100,100,
  100,100,100,100,100,100,100,100,100,100);

$empty_Position  = array(
  100,100,100,100,100,100,100,100,100,100,
  100,100,100,100,100,100,100,100,100,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,0  ,0  ,0  ,0  ,0  ,0  ,0  ,0  ,100,
  100,100,100,100,100,100,100,100,100,100,
  100,100,100,100,100,100,100,100,100,100);


$Board = array(120);

$Notation = "";
$NotationList = array();

$pgn_Move = "";  // last move is inserted into the mail separately

# Only for debugging

function print_Position() {
         global $Board;
         for ($i = 11; $i >= 0; $i--) {
             for ($j = 0; $j <= 9; $j++) {
                 $k = $Board[$i * 10 + $j];
                 if ($k != 100) {
                          if ($k == 0)
                               echo "--";
                          else if ($k > 0)
                               echo "+" . $k;
                          else
                               echo $k;
                          echo "|";     
                 }
             }
             echo "<br>\n";    
        }
}

# help function for creating notation

function get_pgn_piece($aPiece) {
        switch (Abs($aPiece)) {
               case WK: return "K";
               case WQ: return "Q";
               case WR: return "R";
               case WB: return "B";
               case WN: return "N";
               case WP: return "";
        }
        return "X";
}

# 0..63 to 21..98

function c0_21($i) {
        return ($i >> 3) * 10 + ((($i + 8) % 8)) + 21;
}

# 21..98 to 0..63

function c21_0($i) {
        return ((floor($i / 10) - 2) << 3) + (($i % 10) - 1);
}

# The following functions search the corresponding piece what can move to $from
# Used for checking whether a square is attacked

function search_Queen($from, $turn) {
         global $Board, $ab_Queen, $pgn_square_list;
         $retVal = 0;
         for ($i = 0; $i <= 7; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Queen[$i];
                     if ($Board[$j] == 100)
                                   break;
                     if ($Board[$j] == $turn * WQ) {
                                   $pgn_square_list[$retVal] = $j;
                                   $retVal++;
                     }
                     if ($Board[$j] != 0)
                            break;
               }
         }
         return $retVal;
}

function search_Rook($from, $turn) {
         global $Board, $ab_Rook, $pgn_square_list;
         $retVal = 0;
         for ($i = 0; $i <= 3; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Rook[$i];
                     if ($Board[$j] == 100)
                                   break;
                     if ($Board[$j] == $turn * WR)  {
                                   $pgn_square_list[$retVal] = $j;
                                   $retVal++;
                     }
                     if ($Board[$j] != 0)
                            break;
               }
         }
         return $retVal;
}

function search_Bishop($from, $turn) {
         global $Board, $ab_Bishop, $pgn_square_list;
         $retVal = 0;
         for ($i = 0; $i <= 3; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Bishop[$i];
                     if ($Board[$j] == 100)
                                   break;
                     if ($Board[$j] == $turn * WB)  {
                                   $pgn_square_list[$retVal] = $j;
                                   $retVal++;
                     }
                     if ($Board[$j] != 0)
                            break;
               }
         }
         return $retVal;
}

function search_Knight($from, $turn) {
         global $Board, $ab_Knight, $pgn_square_list;
         $retVal = 0;
         for ($i = 0; $i <= 7; $i++) {
               $j = $from;
               $j = $j + $ab_Knight[$i];
               if ($Board[$j] == $turn * WN) {
                             $pgn_square_list[$retVal] = $j;
                             $retVal++;
               }
         }
         return $retVal;
}

function search_King($from, $turn) {
         global $Board, $ab_King, $pgn_square_list;
         $retVal = 0;
         for ($i = 0; $i <= 7; $i++) {
               $j = $from;
               $j = $j + $ab_King[$i];
               if ($Board[$j] == $turn * WK)  {
                             $pgn_square_list[$retVal] = $j;
                             $retVal++;
               }
         }
         return $retVal;
}


function search_capturePawn($from, $turn) {
    global $Board, $pgn_square_list;
    $retVal = 0;
    if ($Board[$from + (-$turn * 9 )] == $turn * WP)  {
             $pgn_square_list[$retVal] = $j;
             $retVal++;
    }
    if ($Board[$from + (-$turn * 11)] == $turn * WP) {
             $pgn_square_list[$retVal] = $j;
             $retVal++;
    }
    return $retVal;
}

function search_Pawn($from, $turn) {
    global $Board, $pgn_square_list;
    $retVal = 0;
    if ($Board[$from + (-$turn * 10)] == $turn * WP) {
          $pgn_square_list[$retVal] = $j;
          $retVal++;
    }
    else if ($Board[$from + (-$turn * 10)] == 0)
        if (
          (($turn == 1) && (($from > sq_h3) && ($from < sq_a5))) ||
          (($turn != 1) && (($from > sq_h4) && ($from < sq_a6)))
        )
             if ($Board[$from + (-$turn * 20)] == $turn * WP) {
                         $pgn_square_list[$retVal] = $j;
                         $retVal++;
             }
    return $retVal;
}


# Check whether the king is attacked
# The turn is changed and it is looked for a opponent's piece what is able to reach this square 

function attacked($from, $turn) {
      if (
        (search_King($from, -$turn) != 0)
        || (search_Queen($from, -$turn) != 0)
        || (search_Rook($from, -$turn) != 0)
        || (search_Bishop($from, -$turn) != 0)
        || (search_Knight($from, -$turn) != 0)
        || (search_CapturePawn($from, -$turn) != 0)
      )
              return TRUE;
      else
              return FALSE;
}


# A "free" square may not be a edge value (100) or a square where an own piece is placed

function is_Square_free($Square, $turn) {
         global $Board;
         if ($Board[$Square] == 100)
                     return FALSE;
         if (
            (($turn ==  1) && ($Board[$Square] > 0)) ||
            (($turn !=  1) && ($Board[$Square] < 0))
         )
                     return FALSE;
         return TRUE;
}


# Adds a move to the list

function Move_to_List($from, $to) {
         global $move_list_count, $move_list_to, $move_list_from;
         $move_list_from[$move_list_count] = $from;
         $move_list_to[$move_list_count] = $to;
         $move_list_count++;
}


# The following functions check the squares where a piece from a certain square can move to
# They are added to the move list (it must still be verified whether the move is legal)
# If a $to is a legal square (instead of 0), the return value is TRUE if the move list contains this square

function get_QueenSquares($from, $turn, $to) {
    global $Board, $ab_Queen;
    for ($i = 0; $i <= 7; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Queen[$i];
                     if (!is_Square_free($j, $turn))
                                   break;
                     Move_to_List($from, $j);
                     if ($j == $to)
                            return TRUE;
                     if ($Board[$j] != 0)
                            break;
               }
         }
    return FALSE;
}

function get_RookSquares($from, $turn, $to) {
    global $Board, $ab_Rook;     
    for ($i = 0; $i <= 3; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Rook[$i];
                     if (!is_Square_free($j, $turn))
                               break;
                     Move_to_List($from, $j);
                     if ($j == $to)
                            return TRUE;
                     if ($Board[$j] != 0)
                            break;
               }
         }
    return FALSE;
}

function get_BishopSquares($from, $turn, $to) {
    global $Board, $ab_Bishop;     
    for ($i = 0; $i <= 3; $i++) {
               $j = $from;
               while (TRUE) {
                     $j = $j + $ab_Bishop[$i];
                     if (!is_Square_free($j, $turn))
                               break;
                     Move_to_List($from, $j);
                     if ($j == $to)
                            return TRUE;
                     if ($Board[$j] != 0)
                            break;
               }
         }
    return FALSE;
}

function get_KnightSquares($from, $turn, $to) {
    global $ab_Knight;     
    for ($i = 0; $i <= 7; $i++) {
        $j = $from;
        $j = $j + $ab_Knight[$i];
        if (is_Square_free($j, $turn)) {
           Move_to_List($from, $j);
           if ($j == $to)
              return TRUE;
        }
    }
    return FALSE;
}

function get_KingSquares($from, $turn, $to) {
    global $Board, $ab_King;
    global $move_castling_ws, $move_castling_wl, $move_castling_bs, $move_castling_bl;
    for ($i = 0; $i <= 7; $i++) {
        $j = $from;
        $j = $j + $ab_King[$i];
        if (is_Square_free($j, $turn)) {
             Move_to_List($from, $j);
             if ($j == $to)
                    return TRUE;
        }
    }

# Additionally check castling possibilities
    if ($turn == 1) {
      if ($move_castling_ws) {
        if  (
          (($Board[sq_e1] == WK) && ($Board[sq_h1] == WR))
          && (($Board[sq_f1] == 0) && (!attacked(sq_f1, $turn)))
          && (($Board[sq_g1] == 0) && (!attacked(sq_g1, $turn)))
          && (!attacked(sq_e1, $turn))
        ) {
             Move_to_List(sq_e1, sq_g1);
             if (sq_g1 == $to)
                   return TRUE;
        }
      }
      if ($move_castling_wl) {
        if  (
          (($Board[sq_e1] == WK) && ($Board[sq_a1] == WR))
          && ($Board[sq_b1] == 0)
          && (($Board[sq_d1] == 0) && (!attacked(sq_d1, $turn)))
          && (($Board[sq_c1] == 0) && (!attacked(sq_c1, $turn)))
          && (!attacked(sq_e1, $turn))
        ) {
            Move_to_List(sq_e1, sq_c1);
            if (sq_c1 == $to)
                  return TRUE;
        }
      }
    }
    else {
      if ($move_castling_bs) {
        if (
          (($Board[sq_e8] == BK) && ($Board[sq_h8] == BR))
          && (($Board[sq_f8] == 0) && (!attacked(sq_f8, $turn)))
          && (($Board[sq_g8] == 0) && (!attacked(sq_g8, $turn)))
          && (!attacked(sq_e8, $turn))
        ) {
             Move_to_List(sq_e8, sq_g8);
             if (sq_g8 == $to)
                  return TRUE;
        }
      }
      if ($move_castling_bl) {
        if (
          (($Board[sq_e8] == BK) && ($Board[sq_a8] == BR))
          && ($Board[sq_b8] == 0)
          && (($Board[sq_d8] == 0) && (!attacked(sq_d8, $turn)))
          && (($Board[sq_c8] == 0) && (!attacked(sq_c8, $turn)))
          && (!attacked(sq_e8, $turn))
        ) {
              Move_to_List(sq_e8, sq_c8);
              if (sq_c8 == $to)
                  return TRUE;
        }
      }
    }
    return FALSE;
}

function get_PawnSquares($from, $turn, $to) {
    global $Board, $move_ep_Square;

# Check the square in front of the pawn
    if ($Board[$from + ($turn * 10)] == 0) {
      Move_to_List($from, $from + ($turn * 10));
      if ($from + ($turn * 10) == $to)
                  return TRUE;

# If the pawn is located on the second rank, check the next square too
      if (
        (($turn == 1) && (($from > sq_h1) && ($from < sq_a3)))
        || (($turn <> 1) && (($from > sq_h6) && ($from < sq_a8)))
      )
        if ($Board[$from + ($turn * 20)] == 0) {
           Move_to_List($from, $from + ($turn * 20));
           if ($from + ($turn * 20) == $to)
                  return TRUE;
        }
    }

# Check capture possibilities
    if ($turn == 1) {
      if (
        (($Board[$from + ($turn * 9)] != 100) && ($Board[$from + ($turn * 9)] < 0))
        || ($from + ($turn * 9) == $move_ep_Square)
      ) {
          Move_to_List($from, $from + ($turn * 9));
          if ($from + ($turn * 9) == $to)
                  return TRUE;
      }
      if (
        (($Board[$from + ($turn * 11)] != 100) && ($Board[$from + ($turn * 11)] < 0))
        || ($from + ($turn * 11) == $move_ep_Square)
      ) {
          Move_to_List($from, $from + ($turn * 11));
          if ($from + ($turn * 11) == $to)
                  return TRUE;
      }
    }
    else {
      if (
        (($Board[$from + ($turn * 9)] != 100) && ($Board[$from + ($turn * 9)] > 0))
        || ($from + ($turn * 9) == $move_ep_Square)
      ) {
          Move_to_List($from, $from + ($turn * 9));
          if ($from + ($turn * 9) == $to)
                  return TRUE;
      }
      if (
        (($Board[$from + ($turn * 11)] != 100) && ($Board[$from + ($turn * 11)] > 0))
        || ($from + ($turn * 11) == $move_ep_Square)
      ) {
          Move_to_List($from, $from + ($turn * 11));
          if ($from + ($turn * 11) == $to)
                  return TRUE;
      }
    }
    return FALSE;
}


# Returns the king's place

function get_King($white) {
    global $Board;
    if ($white)
        $j = WK;
    else
        $j = BK;
    for ($i = 0; $i <= 119; $i++) {
        if ($Board[$i] == $j)
             return $i;
    }
    return -1;
}


# Checks whether a move is legal according to the set move variables

function is_Move_possible() {
      global $Board, $move_list_count, $move_turn, $move_ep_Square, $move_to_Square;
      global $move_from_Square, $pgn_piece, $pgn_from_digit, $pgn_from_letter, $pgn_capture, $pgn_square_list;
# Legal from square?
      $f = $Board[$move_from_Square];
      if (($f == 0) || ($f == 100))
           return FALSE;

# The right colored piece on it?
      if (
        (($move_turn == 1) && ($f < 0)) ||
        (($move_turn != 1) && ($f > 0))
      )
        return FALSE;
# Get the to squares of the corresponding piece
# The function returns TRUE if our to_square fits with one of them

      $f = Abs($f);
      $b = FALSE;
      $move_list_count = 0;
      if ($f == WK)
          $b = get_KingSquares($move_from_Square, $move_turn, $move_to_Square);
      else if ($f == WQ)
          $b = get_QueenSquares($move_from_Square, $move_turn, $move_to_Square);
      else if ($f == WR)
          $b = get_RookSquares($move_from_Square, $move_turn, $move_to_Square);
      else if ($f == WB)
          $b = get_BishopSquares($move_from_Square, $move_turn, $move_to_Square);
      else if ($f == WN)
          $b = get_KnightSquares($move_from_Square, $move_turn, $move_to_Square);
      else if ($f == WP)
          $b = get_PawnSquares($move_from_Square, $move_turn, $move_to_Square);

# Set piece to the new square and check whether own king is attacked
      if ($b) {
            $rv_f  = $Board[$move_from_Square];
            $rn_f  = $Board[$move_to_Square];
            $rep_f = $Board[$move_to_Square + (-$move_turn * 10)];

            $Board[$move_to_Square] = $Board[$move_from_Square];
            $Board[$move_from_Square] = 0;
            if (($f == WP) && ($move_ep_Square == $move_to_Square))
               $Board[$move_to_Square + (-$move_turn * 10)] = 0;

            $RetVal = false;
            $i = get_King($move_turn == 1);
            if ($i != -1)
               $RetVal = !attacked($i, $move_turn);

            $Board[$move_from_Square]                     = $rv_f;
            $Board[$move_to_Square]                       = $rn_f;
            $Board[$move_to_Square + (-$move_turn * 10)]  = $rep_f;

            $pgn_piece = "";           // for adding a move to pgn notation
            $pgn_from_digit = "";
            $pgn_from_letter = "";
            $pgn_capture = FALSE;
            if ($RetVal) {
                 $pgn_piece = get_pgn_piece($Board[$move_from_Square]);
                 $pgn_capture =  ($Board[$move_to_Square] != 0) || (($f == WP) && ($move_ep_Square == $move_to_Square));
                 $i = 1;
                 switch (Abs($Board[$move_from_Square])) {
                        case WQ:  $i = search_Queen($move_to_Square, $move_turn);
                                  break;
                        case WR:  $i = search_Rook($move_to_Square, $move_turn);
                                  break;
                        case WB:  $i = search_Bishop($move_to_Square, $move_turn);
                                  break;
                        case WN:  $i = search_Knight($move_to_Square, $move_turn);
                                  break;
                 }
                 if ($i > 1) {
                      $hl = c21_0($move_from_Square) % 8;
                      $hr = floor(c21_0($move_from_Square) / 8);
                      for ($j = 0; $j < $i; $j++) {
                            if ($move_from_Square != $pgn_square_list[$j]) {
                                  $file = c21_0($pgn_square_list[$j])  % 8;
                                  $rank = floor(c21_0($pgn_square_list[$j]) / 8);
                                  if ($hl == $file)
                                          $pgn_from_digit = floor(c21_0($move_from_Square) / 8) + 1;
                                  if ($hr == $rank)
                                          $pgn_from_letter = chr((c21_0($move_from_Square) % 8) + 97);



                           }
                     }
                     # neither on the same file nor the same rank (knight)
                     if ($pgn_from_digit == "")
                           $pgn_from_letter = chr((c21_0($move_from_Square) % 8) + 97);
                }

            }
            return $RetVal;
     }
     return FALSE;
}


# Execute a move according to the set move variables
# Sets ep-square and castling rights
# Changes the turn

function execute_Move() {
     global $Board, $move_turn, $move_promotion_figur, $move_ep_Square, $move_to_Square, $move_from_Square;
     global $move_castling_ws, $move_castling_wl, $move_castling_bs, $move_castling_bl, $pgn_castling, $move_PlyNumber;

# Set from- and to-square

     $Board[$move_to_Square] = $Board[$move_from_Square];
     $Piece = Abs($Board[$move_from_Square]);
     $Board[$move_from_Square] = 0;

     $pgn_castling = "";

     $ep = $move_ep_Square;
     $move_ep_Square = 0;
     if ($Piece == WP) {

# if to-square is ep-square, remove pawn above

        if ($ep == $move_to_Square)
            $Board[$move_to_Square + (-$move_turn * 10)] = 0;

# if promotion, set new piece

        if ($move_promotion_figur != 0)
             $Board[$move_to_Square] =  $move_promotion_figur;

# set new ep_square if double step and an opponent's pawn is placed on the nearby square

        if ($move_from_Square + ($move_turn * 20) == $move_to_Square) {
               $move_ep_Square =  $move_from_Square + ($move_turn * 10);
        }
     }
     else if ($Piece == WK) {

# set rook and castling rights if necessary

          if ($move_from_Square == sq_e1) {
                    if ($move_to_Square == sq_g1) {
                             $Board[sq_h1] = 0;
                             $Board[sq_f1] = WR;
                             $pgn_castling = "O-O";
                    }
                    else if ($move_to_Square == sq_c1) {
                             $Board[sq_a1] = 0;
                             $Board[sq_d1] = WR;
                             $pgn_castling = "O-O-O";
                    }
                    $move_castling_ws = FALSE;
                    $move_castling_wl = FALSE;
          }
          else if ($move_from_Square == sq_e8) {
                    if ($move_to_Square == sq_g8) {
                             $Board[sq_h8] = 0;
                             $Board[sq_f8] = BR;
                             $pgn_castling = "O-O";
                    }
                    else if ($move_to_Square == sq_c8) {
                             $Board[sq_a8] = 0;
                             $Board[sq_d8] = BR;
                             $pgn_castling = "O-O-O";
                    }
                    $move_castling_bs = FALSE;
                    $move_castling_bl = FALSE;
          }

     }
     if (($move_from_Square == sq_h1) || ($move_to_Square == sq_h1))
          $move_castling_ws = FALSE;
     if (($move_from_Square == sq_a1) || ($move_to_Square == sq_a1))
          $move_castling_wl = FALSE;
     if (($move_from_Square == sq_h8) || ($move_to_Square == sq_h8))
          $move_castling_bs = FALSE;
     if (($move_from_Square == sq_a8) || ($move_to_Square == sq_a8))
          $move_castling_bl = FALSE;

     $move_turn = -$move_turn;
     $move_PlyNumber++;
}


# Converts e4 to 55, for example
# If it cannot be converted, return 0 (an illegal square)

function get_Square($Feld) {
    if (strlen($Feld) != 2)
               return 0;
    $x = ord($Feld[0]) - 97;
    $y = $Feld[1];
    if (($x < 0) || ($x > 7) || ($y < 1) || ($y > 8))
               return 0;
    $x = (($y - 1) << 3) + $x;
    $x = ($x >> 3) * 10 + ((($x + 8) % 8)) + 21;
    if (($x < 21) || ($x > 98))
               return 0;
    return $x;
}


# Syntax must be "h7-h8Q", castling e1-g1

function check_MoveSyntax($Move) {
         if ((strlen($Move) < 5) || (strlen($Move) > 6))
                 return FALSE;
         if ($Move[2] != "-")
                 return FALSE;
         return TRUE;
}


# Resets the move variables

function reset_Move_Vars() {
  global $move_turn, $move_promotion_figur, $move_ep_Square, $move_to_Square, $move_from_Square;
  global $move_castling_ws, $move_castling_wl, $move_castling_bs, $move_castling_bl, $move_PlyNumber;
  $move_from_Square = 0;
  $move_to_Square = 0;
  $move_ep_Square = 0;
  $move_promotion_figur = 0;
  $move_turn = 1;
  $move_castling_ws = TRUE;
  $move_castling_wl = TRUE;
  $move_castling_bs = TRUE;
  $move_castling_bl = TRUE;
  $move_PlyNumber = 0;
}


# Extracts from- and to-square from a move (e2-e4, e1-g1, h7-h8Q)
# and sets the move variables
# Then it checks whether the move is legal (it does not execute the move)

function set_Move_Vars($aMove) {
    global $Board, $move_turn, $move_promotion_figur, $move_to_Square, $move_from_Square;
    if (!check_MoveSyntax($aMove))
               return FALSE;
    $move_from_Square = get_Square(substr($aMove, 0, 2));
    $move_to_Square = get_Square(substr($aMove, 3, 2));
    $move_promotion_figur = 0;

# Check whether promotion piece is defined
    if (
      (Abs($Board[$move_from_Square]) == WP) &&
      (($move_to_Square > sq_h7) || ($move_to_Square < sq_a2))
    )  {
           if (strlen($aMove) < 6)
                  $s_promotion_figur = "Q";
           else
                  $s_promotion_figur = substr($aMove, 5, 1);
           if ($s_promotion_figur == "Q")
                  $move_promotion_figur = $move_turn * WQ;
           else if ($s_promotion_figur == "R")
                  $move_promotion_figur = $move_turn * WR;
           else if ($s_promotion_figur == "B")
                  $move_promotion_figur = $move_turn * WB;
           else if ($s_promotion_figur == "N")
                  $move_promotion_figur = $move_turn * WN;
           else return FALSE;
    }
    if (($move_to_Square == 0))
        return FALSE;
    if (($move_from_Square == 0))
        return FALSE;
    if ((!is_Move_possible()))
        return FALSE;
    return TRUE;
}


# Counts all legal moves to check for mate and stalemate

function Move_Count() {
  global $Board, $move_list_count, $move_list_to, $move_turn, $move_ep_Square;
  $RetVal = 0;
  $King_Place = get_King($move_turn == 1);
  if ($King_Place != -1) {

# get the moves from all pieces on the board

    for ($i = 0; $i <= 63; $i++) {
        $v = c0_21($i);
        $f = $Board[$v];
        if (
          (($f != 0) && ($f != 100))
          && (!(($move_turn == 1) && ($f < 0)))
          && (!(($move_turn != 1) && ($f > 0)))
        ) {
            $move_list_count = 0;

            if (Abs($f) == WK)
                get_KingSquares($v, $move_turn, 0);
            else if (Abs($f) == WQ)
                get_QueenSquares($v, $move_turn, 0);
            else if (Abs($f) == WR)
                get_RookSquares($v, $move_turn, 0);
            else if (Abs($f) == WB)
                get_BishopSquares($v, $move_turn, 0);
            else if (Abs($f) == WN)
                get_KnightSquares($v, $move_turn, 0);
            else if (Abs($f) == WP)
                get_PawnSquares($v, $move_turn, 0);

            for ($k = 0; $k < $move_list_count; $k++) {
                 $n = $move_list_to[$k];

# execute move on board after saving the old values
# do not forget ep, second part of castling is not necessary (only check for check)

                 $rep   = $n + (-$move_turn * 10);
                 $rep_f = $Board[$n + (-$move_turn * 10)];
                 $rn_f  = $Board[$n];
                 $rv_f  = $Board[$v];

                 $Board[$n] = $Board[$v];
                 $Board[$v] = 0;
                 if ((Abs($f) == WP) && ($move_ep_Square == $n))
                       $Board[$n + (-$move_turn * 10)] = 0;

# king in check? If not, add to legal moves

                 if (Abs($f) == WK)
                         $w = $n;
                 else
                         $w = $King_Place;
                 if (!attacked($w, $move_turn)) {
                         $RetVal++;
                         if (
                           (Abs($f) == WP) &&
                           (($n < sq_a2) || ($n > sq_h7))
                         )
                         # Promotion +3
                                $RetVal = $RetVal + 3;
                 }

# Restore board for next loop

                 $Board[$n]   = $rn_f;
                 $Board[$v]   = $rv_f;
                 $Board[$rep] = $rep_f;
            }
        }
    }
  }
  return $RetVal;
}

# Returns a value depended on mate, stalemate, check and nothing of all
//# The "view point" is the own side after execution a move - the opponent

function get_GameState() {
   global $move_turn;

# Running
  $RetVal = 0;
  $c = Move_Count();
  if ($c == 0) {
# Mate
        $RetVal = 1;
        if (!attacked(get_King($move_turn == 1), $move_turn))
# Stalemate
                  $RetVal = 2;
  }
  else
        if (attacked(get_King($move_turn == 1), $move_turn))
# Check
                  $RetVal = 3;
  return $RetVal;
}

function State_to_String($i) {
        switch ($i) {
                case gsMate      : return "Mate";
                case gsStalemate : return "Stalemate";
                case gsCheck     : return "Check";
                default          : return "";
        }
}        

# Sets up the first position and resets the move variables

function set_first_Position() {
  global $Board, $first_Position, $Notation;
  $Notation = "";
  $NotationList = array();
  for ($i = 0; $i <= 119; $i++)
       $Board[$i] = $first_Position[$i];
  reset_Move_Vars();
}

# Reads a game an sets up the last (current) position
# $Moves are delivered as sql result

function read_Game($rows, $showall) {
    global $Notation;
    set_first_Position();
    $l = 0;
	foreach ($rows as $row) {
		if ($showall || $row->addmove == 1) {
			$l++;
			if (!add_Move($row->move))
				   return FALSE;
		   if ($l > 7) {
				   $Notation = $Notation . "\n";
				   $l = 0;
			}
		}
    }
    return TRUE;
}


# Checks the syntax of move (e2-e4), initiate the variables and execute it if possible

function add_Move($Move) {
        global $Notation, $NotationList, $State, $pgn_piece, $pgn_from_letter, $pgn_from_digit, $pgn_capture;
        global $move_promotion_figur, $pgn_castling, $pgn_Move, $move_PlyNumber;
        if (!set_Move_Vars($Move))
               return FALSE;
		execute_Move();

# Create pgn notation
        $MoveNumber = "";
        if ($move_PlyNumber % 2) {
               $MoveNumber = (floor($move_PlyNumber / 2) + 1) . ".";
               $MoveNumber1 = $MoveNumber;
        }
        else
               $MoveNumber1 = (floor(($move_PlyNumber - 1) / 2) + 1) . ". ... ";

        if ($pgn_castling == "") { // This is set in execute_Move() unlike all other "pgn_" values which are set in is_Move_Possible()
          $pgn_Move = substr($Move, 3, 2);    // a promotion letter is cut  --> add it below with =
          if ($pgn_capture) {
                 $capture = "x";
                 if ($pgn_piece == "")   // Pawn
                       $pgn_piece = substr($Move, 0, 1);
          }
          else
                 $capture = "";
          if ($move_promotion_figur != 0)
                 $pgn_Move = $pgn_Move . "=" . get_pgn_piece($move_promotion_figur);
          $pgn_Move = $pgn_piece . $pgn_from_letter . $pgn_from_digit . $capture . $pgn_Move;
        }
        else
          $pgn_Move = $pgn_castling;

        $State = get_GameState();
        if ($State == 3)
               $pgn_Move = $pgn_Move . "+";
        else if ($State == 1)
               $pgn_Move = $pgn_Move . "#";

        $Notation = $Notation . $MoveNumber . $pgn_Move . " ";
		$NotationList[] = $pgn_Move;
        $pgn_Move = $MoveNumber1 . $pgn_Move;

        return TRUE;
}

# Delivers html. The gif files must be located in /images

function do_get_current_Position($Moves) {
        if (!read_Game($Moves))
              return "";
        return get_current_Position(false);
}

function get_current_Position($BlackBelow, $showaddmoveform) {

# Please note: The following simple html page is NOT an "official" part of these scripts which actually only verify chess moves.
# However, you may use it to display the board, but you must add any missing features or needed adjustments by yourself.
# BTW, the JavaScripts assigned to the squares need an html input text field with the name "pcc_Move" in a form named "pcc_data" as available on the demo pages.

        global $Board;

        $fa  = "<font color=\"#000000\" size=\"-1\" face=\"MS Sans Serif\">";
        $fe  = "</font>";
        $dc  = "\"#D5D5D5\"";
        $k   = "abcdefgh";
        $ds  = "\"#F8E1B8\"";
	$dz  = "";

        $s = "<table " . ($showaddmoveform ? "style=\"cursor:pointer\" " : '') . 
		 "border=\"3\"><tbody><tr><td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody>";
# Coordinates
	$s = $s . "<tr><td bgcolor=" . $dc . ">&nbsp;</td>";
	for ($i = 0; $i < 8; $i++) {
                $l = $i;
                if ($BlackBelow) $l = Abs($l - 7);
		$s = $s . "<td bgcolor=" . $dc . " align=\"center\">&nbsp;" . $fa . substr($k, $l, 1) . $fe . "&nbsp;</td>\n";
        }
	$s = $s . "<td bgcolor=" . $dc . ">&nbsp;</td></tr>";
#
        for ($i = 0; $i < 8; $i++) {
		$s = $s . "<tr>";
                $l = Abs($i - 8);
                if ($BlackBelow) $l = Abs($l - 9);
                $y = $l;
                $s = $s . "<td bgcolor=" . $dc . " align=\"center\">&nbsp;" . $fa . $l . $fe . "&nbsp;</td>\n";
		if ($ds == "\"#F8E1B8\"") {
                     $ds = "\"#AE823E\"";
                }
		else {
                     $ds = "\"#F8E1B8\"";
                }
		for ($j = 0; $j < 8; $j++) {
                        $x = $j;
                        if ($BlackBelow) $x = Abs($x - 7);
		        $x = substr($k, $x, 1);
			if ($ds == "\"#F8E1B8\"") {
                               $ds = "\"#AE823E\"";
                        }
			else {
                               $ds = "\"#F8E1B8\"";
                        }
                        $id = '"' . $x . $y . '"';
                        $id1 = '"-' . $x . $y . '"';
                        $col = '"#FFFFFF"';
                        $dz = "<td bgcolor=" . $ds . " id=" . $id . 
						 ($showaddmoveform ? " onclick='document.getElementById(" . $id . ").style.backgroundColor=" . 
						 $col . ";d=document.pcc_data.pcc_Move;if(d.value.length==0)d.value=" . $id . ";else d.value=d.value+" . $id1 . "'" : '')  . ">";
		   	$dz = $dz . "<img border=\"0\" ";

# /images is path to pictures of pieces
                        $x = Abs($j - 7);
                        $x = ($i << 3) + $x;
                        if (!$BlackBelow) $x = Abs($x - 63);
                        $x = ($x >> 3) * 10 + ((($x + 8) % 8)) + 21;
                        if      ($Board[$x] == WK) $si = "fwk33.gif";
                        else if ($Board[$x] == WQ) $si = "fwd33.gif";
                        else if ($Board[$x] == WR) $si = "fwt33.gif";
                        else if ($Board[$x] == WB) $si = "fwl33.gif";
                        else if ($Board[$x] == WN) $si = "fws33.gif";
                        else if ($Board[$x] == WP) $si = "fwb33.gif";
                        else if ($Board[$x] == BK) $si = "fsk33.gif";
                        else if ($Board[$x] == BQ) $si = "fsd33.gif";
                        else if ($Board[$x] == BR) $si = "fst33.gif";
                        else if ($Board[$x] == BB) $si = "fsl33.gif";
                        else if ($Board[$x] == BN) $si = "fss33.gif";
                        else if ($Board[$x] == BP) $si = "fsb33.gif";
                        else                       $si = "fleer.gif";
			global $mosConfig_live_site;
			$dz = $dz . "src=\"" . $mosConfig_live_site . "/components/com_pcchess/images/" . $si . 
			 "\" height=\"33\" width=\"33\" alt=\"" . $Board[$x] . "\"/></td>\n";
			$s = $s . $dz;
		}
                $l = Abs($i - 8);
                if ($BlackBelow) $l = Abs($l - 9);
                $s = $s . "<td bgcolor=" . $dc . " align=\"center\">&nbsp;" . $fa . $l . $fe . "&nbsp;</td>";
		$s = $s . "</tr>";
	}

# Coordinates
	$s = $s . "<tr><td bgcolor=" . $dc . ">&nbsp;</td>";
	for ($i = 0; $i < 8; $i++) {
                $l = $i;
                if ($BlackBelow) $l = Abs($l - 7);
		$s = $s . "<td bgcolor=" . $dc . " align=\"center\">&nbsp;" . $fa . substr($k, $l, 1) . $fe . "&nbsp;</td>";
        }
	$s = $s . "<td bgcolor=" . $dc . ">&nbsp;</td></tr>";
#
        $s = $s . "</tbody></table></td></tr></tbody></table>";

        return $s;
}

# FEN (for instance "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1" to $board

function set_FEN($FEN) {
        global $Board, $empty_Position, $Notation,
        $move_ep_Square, $move_turn, $move_PlyNumber,
        $move_castling_ws, $move_castling_wl, $move_castling_bs, $move_castling_bl;

        for ($i = 0; $i <= 119; $i++)
          $Board[$i] = $empty_Position[$i];
        reset_Move_Vars();
        $Notation = "";

        $i = 0;
        $k = 56;
        $idx = 0;
        while ($idx < strlen($FEN)) {
                $j = c0_21($i + $k);
                $c = substr($FEN, $idx, 1);
                switch ($c) {
                        case "K": $Board[$j] = WK; break;
                        case "Q": $Board[$j] = WQ; break;
                        case "R": $Board[$j] = WR; break;
                        case "B": $Board[$j] = WB; break;
                        case "N": $Board[$j] = WN; break;
                        case "P": $Board[$j] = WP; break;
                        case "k": $Board[$j] = BK; break;
                        case "q": $Board[$j] = BQ; break;
                        case "r": $Board[$j] = BR; break;
                        case "b": $Board[$j] = BB; break;
                        case "n": $Board[$j] = BN; break;
                        case "p": $Board[$j] = BP; break;

                        case "1": $i = $i + 0; break;
                        case "2": $i = $i + 1; break;
                        case "3": $i = $i + 2; break;
                        case "4": $i = $i + 3; break;
                        case "5": $i = $i + 4; break;
                        case "6": $i = $i + 5; break;
                        case "7": $i = $i + 6; break;
                        case "8": $i = $i + 7; break;
                        case "/": $i = -1; $k = $k - 8; break;
                        case "_": $i = -1; $k = $k - 8; break;
                        case " ": $idx++;
                                  if (substr($FEN, $idx, 1) == "b")
                                        $move_turn = -1;

                                  $idx = $idx + 2;
                                  $Castling = "";
                                  while ($idx < strlen($FEN)) {
                                        $c = substr($FEN, $idx, 1);
                                        if ($c == " ")
                                                break;
                                        $Castling = $Castling . $c;
                                        $idx++;
                                  }

                                  $move_castling_ws = strstr($Castling, 'K');
                                  $move_castling_wl = strstr($Castling, 'Q');
                                  $move_castling_bs = strstr($Castling, 'k');
                                  $move_castling_bl = strstr($Castling, 'q');

                                  $idx++;
                                  $ep = "";
                                  while ($idx < strlen($FEN)) {
                                        $c = substr($FEN, $idx, 1);
                                        if ($c == " ")
                                                break;
                                        $ep = $ep . $c;
                                        $idx++;
                                  }
                                  $move_ep_Square = get_Square($ep);

                                  $nb = "";
                                  $idx = strlen($FEN);
                                  while ($idx > 0) {
                                        $c = substr($FEN, $idx, 1);
                                        if ($c == " ")
                                                break;
                                        $nb = $c . $nb;
                                        $idx--;
                                  }
                                  if ($nb != "") {
                                        $nb = ($nb - 1) * 2;
                                        if ($move_turn == -1)
                                                $nb++;
                                        $move_PlyNumber = $nb;
                                  }

                                  return TRUE;
                }
                $i++;
                $idx++;
        }
        return FALSE;
}

function get_FEN() {
        global $Board,
        $move_ep_Square, $move_turn, $move_PlyNumber,
        $move_castling_ws, $move_castling_wl, $move_castling_bs, $move_castling_bl;

        $s = "";
        $i = 56;
        while ($i > -1) {
                $j = 0;
                $l = 0;
                $f = "";
                while ($j < 8) {
                        $k = c0_21($i + $j);

                        switch ($Board[$k]) {
                                case WK: $f = "K"; break;
                                case WQ: $f = "Q"; break;
                                case WR: $f = "R"; break;
                                case WB: $f = "B"; break;
                                case WN: $f = "N"; break;
                                case WP: $f = "P"; break;
                                case BK: $f = "k"; break;
                                case BQ: $f = "q"; break;
                                case BR: $f = "r"; break;
                                case BB: $f = "b"; break;
                                case BN: $f = "n"; break;
                                case BP: $f = "p"; break;
                                
                                default: $l++;
                        }
                        if (($f != "") || ($j == 7)) {
                                if ($l > 0) {
                                        $s = $s . $l;
                                        $l = 0;
                                }
                                $s = $s . $f;
                                $f = "";
                        }
                        $j++;
                }
                $i = $i - 8;
                if ($i > -1)
                        $s = $s . "/";
        }
        if ($move_turn == 1)
                $s = $s . " w ";
        else
                $s = $s . " b ";

        $r = "";
        if ($move_castling_ws) $r = $r . "K";
        if ($move_castling_wl) $r = $r . "Q";
        if ($move_castling_bs) $r = $r . "k";
        if ($move_castling_bl) $r = $r . "q";
        if ($r == "")
                $r = "-";
        $s = $s . $r;

        if ($move_ep_Square > 0) {
                $s = $s . " " . chr((c21_0($move_ep_Square) % 8) + 97);
                $i = floor(c21_0($move_ep_Square) / 8) + 1;
                $s = $s . $i . " 0 ";
        }
        else
                $s = $s . " - 0 ";

        $i = $move_PlyNumber;
        if ($move_turn == -1)
                $i--;
        $i = floor($i / 2) + 1;

        return $s . $i;
}

function is_Move_legal($FEN, $Move) {
        set_FEN($FEN);
        if (!set_Move_Vars($Move))
               return FALSE;
        return TRUE;
}

?>