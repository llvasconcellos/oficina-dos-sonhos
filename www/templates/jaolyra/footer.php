<?php
/**
* @version $Id: footer.php 85 2005-09-15 23:12:03Z eddieajau $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

global $_VERSION;

// NOTE - You may change this file to suit your site needs
?>
<center><b>Oficina dos Sonhos</b> - Rua Senador Nilo Coelho, 181 - Costa e Silva - Joinville - Santa Catarina - Brasil - (47) 3425-5063</center>
<br />
<div style="float:left;width:300px;padding-left:148px">
Copyright &copy; 
<?php 
	echo JHTML::_('date', 'now', '2005 - %Y');
	echo " ";
	echo $mainframe->getCfg('sitename');
?>.</div>
<div style="float:right;width:200px;padding-right:109px;">Desenvolvido por <a target="_blank" href="http://www.devhouse.com.br">DevHouse</a></div>
<br />
<?php 
	/*$version = new JVersion();
	echo $version->URL; */
?>
