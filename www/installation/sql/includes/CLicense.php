<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* The CIndex class for the License page (which displays the GPL to the user)
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

class CLicense
{
	function getBodyHTML()
	{
		return getBodyHTML( $this->getStepBarHTML(), $this->getMainHTML() );
	}
	
	function getFullHTML()
	{
		return getPageHTML( $this->getStepBarHTML(), $this->getMainHTML() );
	}

	function getStepBarHTML()
	{
		return getStepBar('license');
	}
	
	function getMainHTML()
	{
		global $lang;

		$mainHTML = "";
		$mainHTML .= getPageHeader( $lang['global']['step2'], $this->_getButtonsHTML() );
		$mainHTML .= '<iframe src="gpl.html" width="90%" height="500px" style="margin-left: 5%; margin-top:10px; margin-bottom:10px" />';

		return $mainHTML;
	}
	
	function _getButtonsHTML()
	{
		global $lang;
		return '<input name="ButtonNext" type="submit" class="button" value="' . $lang['global']['btnNext'] . '" onclick="window.location=\'index.php?task=db\'" />';
	}

}

?>