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

class PapakidomainsViewPapakidomains extends JViewLegacy
{
	function display($tpl = null)
	{
		$model = $this->getModel();
		$tlds = $model->getTlds();
		$this->assignRef( 'tlds',	$tlds );
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_PAPAKIDOMAINS'));
		parent::display($tpl);
	}
	
}