<?php
/*
* Default Theme for DOCMan 1.3.0 
* @version $Id: script_docupload.tpl.php,v 1.1 2005/04/15 21:20:43 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

/* 
* Display the upload document form (required)
* 
* This template is called when u user preform a upload operation on a document. 
* 
* General variables  :
*	$this->theme->path (string) : template path
*	$this->theme->name (string) : template name
*	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->step   (number)  : holds the current step
*   $this->update (boolean) : true, if we are updating a document
*   $this->method (string)  : hols the upload method used (http, link or transfer)
*
* Preformatted variables :
*	$this->html->docupload (string)(hardcoded, can change in future versions)
*
*/
?>
<?php
switch($this->step) :
	case '1' :  break;
	case '2' :  break;
	case '3' :  include $this->loadTemplate('scripts/form_docedit.tpl.php');  break;
endswitch;
?>