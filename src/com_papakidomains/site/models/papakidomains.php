<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );


class PapakidomainsModelPapakidomains extends JModelLegacy 
{
	 var $_tlds;
	 var $_search;
	function getTlds()
	{
		$query = ' SELECT * FROM #__papakidomains_tlds where enabled=1';
		$this->_tlds = $this->_getList( $query );
		return $this->_tlds;
	}
	function getParams(){
		$params = JComponentHelper::getParams( 'com_papakidomains' );
		return $params;
	}
	function search()
	{
		$data = JRequest::get( 'post' );
		//print_r($_POST);
		$params = JComponentHelper::getParams( 'com_papakidomains' );
		require("./components/com_papakidomains/lib/usablewebLib.php"); 
		
		$pap_apikey=$params->get('api_key');
		$search = new PapakiDomainNameSearch($data['domain'],$data['tld']);
		$search->apikey = $pap_apikey;  
	 	$search->use_curl = true;
  		$search->exec_request_for(_TYPE_DS,true);
		$this->_search=$search;
		
		return $this->_search;
	}
}