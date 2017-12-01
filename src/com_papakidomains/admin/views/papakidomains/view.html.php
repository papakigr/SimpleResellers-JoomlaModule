<?php
/**
 * Hello View for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

/**
 * Hello View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class PapakidomainsViewPapakidomains extends JViewLegacy
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		//get the hello
		$tlds		= $this->get('Tlds');
		$params=$this->get('Params');

		//$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Papaki Domain Search' ) );
		//JToolBarHelper::preferences( 'com_papakidomains' );
		JToolBarHelper::save('save','Save');
		

		$this->assignRef('tlds',$tlds);
		$this->assignRef('params',$params);

		parent::display($tpl);
	}
}