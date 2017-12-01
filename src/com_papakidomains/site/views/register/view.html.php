<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_2
 * @license    GNU/GPL
	*/

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Papaki Domains Component
 *
 * @package    Papaki Domains
 */

class PapakidomainsViewRegister extends JViewLegacy
{
	function display($tpl = null)
	{
		$model = $this->getModel('register');
		//print_r($model);
		$domains=$model->getDomains();
		//print_r($domains);
		$this->setLayout('form');
		$this->assignRef( 'domainNames',	$domains );
		parent::display($tpl);
	}
	
}