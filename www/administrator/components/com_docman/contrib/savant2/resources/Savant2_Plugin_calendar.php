<?php

/**
* Outputs a tooltip.
* 
* $Id: Savant2_Plugin_calendar.php,v 1.2 2005/07/29 12:04:15 johanjanssens Exp $
* @author Johan Janssens <johan.janssens@users.sourceforge.net>
* @package Savant2
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
*/

require_once dirname(__FILE__) . '/Plugin.php';

class Savant2_Plugin_calendar extends Savant2_Plugin 
{
    /**
    * Output a tooltip
    * 
    * @access public 
    * @return string 
    */

    function plugin()
    {
        global $mainframe, $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_locale;
        
        $tmp_locale = substr($mosConfig_locale, 0, 2); 
        
        // now try to get the locale data
        if (file_exists($mosConfig_absolute_path.'/includes/js/calendar/lang/calendar-' . $tmp_locale . '.js')) {
            $tmp_cal_source = $mosConfig_live_site . '/includes/js/calendar/lang/calendar-' . $tmp_locale . '.js';
        } else {
        	$tmp_cal_source = $mosConfig_live_site . '/includes/js/calendar/lang/calendar-en.js'; 
        }
        
        ob_start();
        ?>
        <!-- Begin Calendar -->
        <link rel="stylesheet" type="text/css" media="all" href="includes/js/calendar/calendar-mos.css" title="green" />
    	<script type="text/javascript" src="includes/js/calendar/calendar.js"></script>
    	<script language="JavaScript" type="text/javascript" src="<?php echo $tmp_cal_source;?>"></script>
        <!-- End Calendar -->
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