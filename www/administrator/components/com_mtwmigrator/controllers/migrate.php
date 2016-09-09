<?php
/**
 * Hello Controller for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:components/
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Hello Hello Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class mtwMigratorControllerMigrate extends mtwMigratorController
{

	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
		parent::registerDefaultTask('migrate');

		// Register Extra tasks
		//$this->registerTask( 'add'  , 	'edit' );
	}


    function migrate(){

		$model =& $this->getModel('migrate');

		//print_r($model);

		//echo "dsd";

		//print_r($model);
/*
		if ( !$model->getConnectToExternalDB() ) {
            $msg = JText::_( $model->_errors[0] );
        
            $link = 'index.php?option=com_mtwmigrator';
            $this->setRedirect($link, $msg);
		}
 */
		//print_r($model);
		if ( $model->_errors[0] ) {
            $msg = JText::_( $model->_errors[0] );
        
            $link = 'index.php?option=com_mtwmigrator';
            $this->setRedirect($link, $msg);
		}

		JRequest::setVar( 'view', 'migrate' );
		parent::display();
    }




    function display() {
        
        JRequest::setVar( 'view', 'migrate' );
        
        parent::display();
    }


}
?>
