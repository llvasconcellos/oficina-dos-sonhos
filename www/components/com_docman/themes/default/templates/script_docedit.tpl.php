<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: script_docedit.tpl.php,v 1.2 2005/04/15 21:20:43 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display the move document form (required)
* 
* This template is called when u user preform a move operation on a document. 
* 
* General variables  :
*	$this->theme->path (string) : template path
*	$this->theme->name (string) : template name
*	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon 
*	
*/
?>
<?php include $this->loadTemplate('scripts/form_docedit.tpl.php'); ?>