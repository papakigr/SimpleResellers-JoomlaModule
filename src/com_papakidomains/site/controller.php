<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_1#Creating_the_Entry_Point
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**

 */
class PapakidomainsController extends JControllerLegacy
{
	/**
	 * Method to display the view
	 *
	 * @access    public
	 */
	function display($cachable = false,$urlparams = array())
	{
		parent::display($cachable,$urlparams);
	}
	
	function send_registration(){
		
		$model = $this->getModel('register');
		$model->register();
		
		$msg='Registration has been sent. We will reply';
		$link = 'index.php?option=com_papakidomains&view=register';		
		$this->setRedirect($link, $msg);
	}
}