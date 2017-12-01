<?php
/**
 * Hello Model for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

/**
 * Hello Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class PapakidomainsModelPapakidomains extends JModelLegacy 
{
	var $_tlds;
	var $_params;
	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		
		parent::__construct();

		//$array = JRequest::getVar('cid',  0, '', 'array');
		//$this->setId((int)$array[0]);
	}

	/**
	 * Method to set the hello identifier
	 *
	 * @access	public
	 * @param	int Hello identifier
	 * @return	void
	 */
	

	/**
	 * Method to get a hello
	 * @return object with data
	 */
	function &getTlds()
	{
		
		$query = ' SELECT * FROM #__papakidomains_tlds order by tld';
		//$this->_db->setQuery( $query );
		//$this->_tlds = $this->_db->loadObject();
		//$query = $this->_buildQuery();
		$this->_tlds = $this->_getList( $query );
		return $this->_tlds;
	}
	function &getParams(){
		$this->_params = JComponentHelper::getParams( 'com_papakidomains' );
		return $this->_params;
		$query = " SELECT params FROM #__components where name='papakidomains'";
		$this->_params = $this->_getList( $query );
		return $this->_tlds;
	}
	/**
	 * Method to store a record
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function store()
	{	
		
		$data = JRequest::get( 'post' );

		$query = ' update #__papakidomains_tlds set enabled=0';
		$this->_db->setQuery ($query);
		$this->_db->query();
		foreach($data['tlds'] as $tld){
			$this->_db->setQuery (" update #__papakidomains_tlds set enabled=1 where tld='".$tld."'");
			$this->_db->query();
		}
		//$params=&JComponentHelper::getParams( 'com_papakidomains' );
		//$params->set('api_key',$data['api_key']);
		//$params->set($parameter, $value);
		
		$query = " update #__extensions set params='{\"api_key\":\"".$data['api_key']."\",\"admin_email\":\"".$data['admin_email']."\"}' where name='papakidomains' or element='com_papakidomains'";
		$this->_db->setQuery ($query);
		if(!$this->_db->query()){
			$jAp=& JFactory::getApplication();
			$jAp->enqueueMessage(nl2br($this->_db->getErrorMsg()),'error'); 
			return false;
		}
		return true;
	}

	

}