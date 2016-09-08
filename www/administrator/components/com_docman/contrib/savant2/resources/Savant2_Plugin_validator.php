<?php

/**
* Output a <script></script> link to a JavaScript file.
* 
* $Id: Savant2_Plugin_validator.php,v 1.2 2005/04/15 21:20:43 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_validator extends Savant2_Plugin 
{
    /**
    * Output a <script></script> link to a dynamic generated JavaScript file.
    * 
    * @access public 
    * @return string 
    */

    function plugin($params = null)
    {
        global $mainframe, $mosConfig_live_site;
        global $task, $gid;
        
        $link = $mosConfig_live_site."/index2.php?option=com_docman&task=$task";
        if (is_array($params)) {
            $link .= "&" . DOCMAN_Utils::implode_assoc('=', '&', $params);
        }
        $link .= "&no_html=1&script=1";
        
        $link = htmlspecialchars(sefRelToAbs($link));
      
        ob_start();
        ?>
        <script language="javascript" type="text/javascript" src="<?php echo $link ?>"></script>
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