<?php
/**
 * Hellos View for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:components/
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Hellos View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class mtwMigratorViewMigrate extends JView
{
	/**
	 * Hellos view display method
	 * @return void
	 **/
	function display($tpl = null)
	{
		JToolBarHelper::title(  JText::_( 'Migrate!' ), 'install.png' );
		//JToolBarHelper::deleteList();
		//JToolBarHelper::editListX();
		//JToolBarHelper::addNewX();
        //JToolBarHelper::cancel();
        //JToolBarHelper::save();
		//JToolBarHelper::spacer();

		$status = & $this->get('Migration');

		//print_r($status);
		//print_r($items);

		// Get data from the model
		///$items		= & $this->get( 'Data');

		//$this->assignRef('items',		$items);

		$errors = $this->__errorCheck($status);

		$this->assignRef('errors', $errors);

		parent::display($tpl);
	}

	function __errorCheck ( $status ) {

		//print_r($status);

		$errors = array();

		foreach ($status as $key => $value) {

			if ($value == 1062) {
				$errors[$key] = "FAILED! - Duplicate key";
            }else if ($value == 1054) {
                $errors[$key] = "FAILED! - Unknown columm";
			}else if ($value == 0) {
				$errors[$key] = "OK!";
			}else if ($value == 9999) {
				$errors[$key] = "Disable";
			}
		}

		return $errors;
	}

}
