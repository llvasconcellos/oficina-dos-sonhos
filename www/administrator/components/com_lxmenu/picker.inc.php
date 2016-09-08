<?php
/**
* A DHTML menu component for mambo
* @version 1.04
* @package lxmenu
* @copyright (C) 2004 - 2005 by Georg Lorenz
* @license Released under the terms of the GNU General Public License
**/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
?>
<div id="picker" style="display:none; position:absolute; left:450px; top:350px; cursor:move; z-index:1000; border:1px solid #6F6F6F; background-color:#F7F7F7; padding:10px; text-align:left;" onMouseDown="dragstart(this)" onMouseMove="drag(event)" onMouseUp="dragstop()">
	<div style="width:20px; height:20px;"></div>
	<div style="position:absolute; top:5px; left:90%; width:14px; height:14px;">
		<a class="close_button" href="#" onClick="javascript:document.getElementById('picker').style.display='none';">X</a>
	</div>
	<div id="current_color"><div id="new_color"></div></div>
	<div style="cursor:auto;">
		<?php
		echo '<table class="palette" cellpadding="0" cellspacing="0">';
		for($i=0;$i<12;$i++){
			echo '<tr>';
			for($j=0;$j<3;$j++){
				for($k=0;$k<=5;$k++){
					$r=strlen(dechex($j*51+($i%2)*51*3))>1 ? dechex($j*51+($i%2)*51*3) : '0'.dechex($j*51+($i%2)*51*3);
					$g=strlen(dechex(floor($i/2)*51))>1 ? dechex(floor($i/2)*51) : '0'.dechex(floor($i/2)*51);
					$b=strlen(dechex($k*51))>1 ? dechex($k*51) : '0'.dechex($k*51);
					$color = strtoupper('#'.$r.$g.$b);
					echo '<td class="cell"><a name="select" style="background-color:'.$color.';" href="#" onClick="get_color(\''.$color.'\')" onMouseover="javascript:document.getElementById(\'new_color\').style.backgroundColor=\''.$color.'\';" title="'.$color.'"></a></td>';
				}
			}
			echo '</tr>';
		}
		echo '</table>';
		?>
	</div>
</div>
