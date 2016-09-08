<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: pagetitle.tpl.php,v 1.1 2005/08/05 14:52:02 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: htp://www.mambodocman.com/
*/

/*
* Display the pagenav (required)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->pagetitle (object) : the pagetitle object
*
*/

foreach($this->pagetitle as $title) : 
	echo " | $title->title";
endforeach;
?>
