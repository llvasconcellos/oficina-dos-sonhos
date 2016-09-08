<?php

/**
* Output a <script></script> link to a JavaScript file.
* 
* $Id: Savant2_Plugin_javascript.php,v 1.4 2005/04/12 19:34:49 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_javascript extends Savant2_Plugin 
{
    /**
    * Output a <script></script> link to a JavaScript file.
    * 
    * @access public 
    * @param string $href The HREF leading to the JavaScript source
    * file.
    * @return string 
    */

    function plugin($href)
    {
        global $mainframe;
        
        ob_start();
        ?>
        <script language="javascript" type="text/javascript" src="<?php echo htmlspecialchars($href) ?>"></script>
        <?php 
        $html = ob_get_contents();
        ob_end_clean();
        
        if(method_exists($mainframe, 'addCustomHeadTag')) {
        	$mainframe->addCustomHeadTag($html);
        	return '';
        } 
        
        return $html;
    } 
} 

?>