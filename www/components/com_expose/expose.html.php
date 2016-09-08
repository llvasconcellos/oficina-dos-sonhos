<?php



defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class expose_html{



	function writeGameFlash($msg){

		?>

		<table align=center border="0">

	 	 <tr>

		   <td>

			<iframe src="components/com_expose/expose.html" frameborder="0" width="930" height="570"></iframe>

		   </td>

		 </tr>

		</table>

		<?php

	}

}

?>