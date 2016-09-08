<?php

/**
* Outputs a tooltip.
* 
* $Id: Savant2_Plugin_tooltip.php,v 1.5 2005/04/12 19:34:49 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_tooltip extends Savant2_Plugin 
{
    /**
    * Output a tooltip
    * 
    * @access public 
    * @return string 
    */

    function plugin($id, $title, $tooltip, $icon)
    {
        global $mosConfig_live_site;
        
        //Strip all whitespace around <TAGS>.  
        $tooltip = preg_replace("/(\s+)?(\<.+\>)(\s+)?/", "$2",  $tooltip);
        
        ob_start();
        ?>
         
        <script language="javascript" type="text/javascript">
  		<!-- <![CDATA[
  			function showTooltip<?php echo $id ?>() {
  				return overlib('<?php echo $tooltip ?>', CAPTION, '<?php echo $title ?>', ABOVE, RIGHT, WIDTH, 320);	
  			}
  		// ]]> --> 
		</script>
		<span class="dm_link_tooltip" onmouseover="javascript:showTooltip<?php echo $id ?>()" onmouseout="return nd();"><img src="<?php echo $icon ?>" alt=""/></span>
        <?php
        
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    } 
} 

?>