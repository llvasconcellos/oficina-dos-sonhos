<?php

/**
* Outputs a <link ... /> to a CSS stylesheet.
* 
* $Id: Savant2_Plugin_stylesheet.php,v 1.4 2005/04/12 19:34:49 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_stylesheet extends Savant2_Plugin 
{    
    /**
    * Output a <link ... /> to a CSS stylesheet.
    * 
    * @access public 
    * @param object $ &$savant A reference to the calling Savant2 object.
    * @param string $href The HREF leading to the stylesheet file.
    * @return string 
    */

    function plugin($href)
    {
        global $mainframe;
        
        ob_start();
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($href) ?>" />
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