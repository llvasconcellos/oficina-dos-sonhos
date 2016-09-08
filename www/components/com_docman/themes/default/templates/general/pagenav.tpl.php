<?php
/*
* Default Theme for DOCMan 1.3.0
* @version $Id: pagenav.tpl.php,v 1.6 2005/07/11 19:24:21 johanjanssens Exp $
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
*	$this->pagenav (object) : the pagenav object
*	$this->link    (nuber)  : the full page link
*
*/
?>

<div id="dm_nav">
<?php echo $this->pagenav->writePagesLinks( $this->link );?>
	<div>
	<?php echo $this->pagenav->writePagesCounter();?>
	</div>
</div>

