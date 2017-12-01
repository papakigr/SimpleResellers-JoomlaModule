<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php 


$domains=array();
if($this->search->hasError || (count($this->search->arrayAvDomains)+count($this->search->arrayNotAvDomains))==0){
	$domains[]=array('domain'=>$this->search->domainName.'.'.$this->search->tld,'available'=>false,'error'=>true,'errorMessage'=>$this->search->errorMessage);
	
}
else{
	foreach($this->search->arrayAvDomains as $av){
		$domains[]=array('domain'=>$av,'available'=>true,'error'=>false);
	}
	foreach($this->search->arrayNotAvDomains as $av){
		$domains[]=array('domain'=>$av,'available'=>false,'error'=>false);
	}
}
print json_encode($domains);
?>
