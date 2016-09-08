<?php

/**
* 
* $Id: Savant2_Plugin_overlib.php,v 1.5 2005/04/12 19:34:49 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_overlib extends Savant2_Plugin 
{
    /**
    * Output necessary overlib tags
    * 
    * @access public 
    * @return string 
    */

    function plugin()
    {
        global $mosConfig_live_site;

        ob_start();
        ?>
        <!-- Begin overLib -->
        <div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000"></div>
        <script language="javascript" type="text/javascript" src="<?php echo $mosConfig_live_site ?>/includes/js/overlib_mini.js"></script>
        <!-- End overLib -->
        <?php 
        $html = ob_get_contents();
        ob_end_clean();
        
        return $html;
    } 
} 

?>