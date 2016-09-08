<?php

/*
* Default Theme for DOCMan 1.3.0
* @version $Id: pathway.tpl.php,v 1.8 2005/02/16 09:48:37 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/


/*
* Display the pathway (required)
*
* General variables  :
*	$this->theme->path (string) : template path
* 	$this->theme->name (string) : template name
* 	$this->theme->conf (object) : template configuartion parameters
*	$this->theme->icon (string) : template icon path
*
* Template variables :
*	$this->links (array) : an array of link objects
*
*/
?>

<div id="dm_pathway">

<?php
/*
* Traverse through the links object array and display each link,
* remove the last item of the array and only display it's name.
*
* Link object variables
*	$link->link (string) : url of the link
*	$link->name (string) : name of the link
*	$link->title (string): title of the link
*/
	$last = array_pop($this->links);
	foreach($this->links as $link) : 
		?><a href="<?php echo $link->link; ?>"><?php echo $link->title; ?></a>&nbsp;&#187;&nbsp;<?php
	endforeach;
	echo ' '.$last->title;
?>
</div>
