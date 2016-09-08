<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: page_msgbox.tpl.php,v 1.4 2005/01/25 22:28:01 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display a msgbox  (required)
* 
* This template is called when the component is down (configuration setting 
* 'section is down') or when the users hasn't the necessary access permissions.
*
* General variables  :
*	$this->theme->path (string) : template path
*	$this->theme->name (string) : template name
*	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template Variables :
*	$this->msg (string) : the msg to be displayed
*/
?>

<?php echo $this->plugin('stylesheet', $this->theme->path . "/css/theme.css") ?>

<?php
if ($this->theme->conf->item_tooltip) : 
    echo $this->plugin('overlib');
endif; 

?>

<div id="dm_msgbox">
  	<p><?php echo $this->msg ?></p>
</div>