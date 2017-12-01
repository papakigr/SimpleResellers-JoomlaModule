<?php
/**
 * Hello World default controller
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class PapakidomainsController extends JControllerLegacy 
{
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	 function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		//$this->registerTask( 'store' );
	}
	function display( $cachable = false,$urlparams = array())
	{
		parent::display($cachable,$urlparams);	
	}
	function save()
	{
		$model = $this->getModel('papakidomains');
		//var_dump($model);
		//die();
		if ($model->store()) {
			$msg = JText::_( 'Changes Saved!' );
		} else {
			$msg = JText::_( 'Error Saving' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_papakidomains';
		$this->setRedirect($link, $msg);
	}
}