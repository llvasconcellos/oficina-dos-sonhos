<?php
//Analog Clock2//
// $Id: mod_anaclock.php,v 1 2003/10/20 13:00:38 Atamrareang Exp $
//
// Copyright (C) 2000-2003 Miro International Pty Ltd
// All rights reserved.  Mambo Open Source is Free Software
// released under the GNU/GPL License.
//
// This source file is part of the Mambo Open Source Content
// Management System.
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$content = "<TABLE width=\"100%\" border=0 cellPadding=0 cellSpacing=0>
<TBODY><TR><TD align=left><center><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\"
 WIDTH=\"130\" HEIGHT=\"130\" id=\"anaclock\" ALIGN=\"\">
  <PARAM NAME=movie VALUE=\"modules/anaclock.swf\">
  <PARAM NAME=quality VALUE=high>
  <PARAM NAME=bgcolor VALUE=#FFFFFF>
  <param name=\"wmode\" value=\"transparent\">
  <param name=\"menu\" value=\"false\">
  <EMBED src=\"modules/anaclock.swf\" quality=high bgcolor=#FFFFFF  WIDTH=\"130\" HEIGHT=\"130\" wmode=\"transparent\" ALIGN=\"\" TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\" menu=\"false\">
  </EMBED></OBJECT></center></TD></TR></TBODY></TABLE>";
 $content .= "<center><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" 
 WIDTH=\"70\" HEIGHT=\"22\" id=\"digiclock\" ALING=\"\">
 <PARAM NAME=movie VALUE=\"modules/digiclock.swf\">
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#FFFFFF>
 <PARAM NAME=\"menu\" VALUE=\"false\">
 <EMBED src=\"modules/digiclock.swf\" base=\".\" quality=high bgcolor=#CACACA  WIDTH=\"70\" HEIGHT=\"22\" TYPE=\"application/x-shockwave-flash\" GINSPAGE=\"http://www.macromedia.com/go/getflashplayer\" menu=\"false\">
 </EMBED></OBJECT></center>\n";
?>