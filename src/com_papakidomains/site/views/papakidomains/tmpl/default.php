<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
var tlds=new Array();
<?php
	$comma='';
	foreach($this->tlds as $tld){
		//print $comma.'"'.$tld->tld.'"'."\n";
		print 'tlds.push("'.$tld->tld.'");'."\n";
		$comma=',';
	}
?>		
var basic_tlds=['gr','eu','com','net','org','info','me','biz','mobi','co'];
var total=tlds.length-1;	  
if(total>10) total=10;
var tld;
function Search(){
	var domain=$j('input#domain').val().replace('www.','');
	var arr=domain.split('.');
	domain=arr[0];
	var found=false;
	//$j('h3.notfound').hide();
	
	//total=$j('select').length;
	$j('.available_tlds').empty();
	$j('form#add_domains #pd-submit').hide();
	$j('form#add_domains').show();
	
	tld=$j('select#tld').val();
	SearchOne(domain,tld,true,true);	
}
function SearchOthers(domain){
	var count=0;
	for(i=0;i<tlds.length;i++){
		if(count>8) break;
		if(tlds[i]!=tld){
			count++;
			SearchOne(domain,tlds[i],false,false);
		}
	}
}
function SearchOne(domain,tld,checked,search_others){
	$j('img#loading').css('visibility','visible');
	theid=tld.replace('.','_');
	$j('form#add_domains ul.available_tlds').append('<li id="'+theid+'" style="display:none"></li>');
	$j.post(
		   "<?php print JRoute::_('index.php');?>", 
		   { 'domain':domain,'tld':tld,option:'com_papakidomains',format:'raw' },
		    function(data){
				  theid=tld.replace('.','_');
				 if(data[0].error){
					 $j('form#add_domains ul.available_tlds li#'+theid).attr('title','<?php print JText::_('COM_PAPAKIDOMAINS_SEARCH_ERROR');?>').append('<label><img src="<?php print  JURI::root( true );?>/components/com_papakidomains/error.png"  /> '+data[0].domain+'</label>').show();
				 }
				 else{
					 if(data[0].available){
						found=true;
						if(checked) c=' checked="checked" ';
						else c='';
						$j('form#add_domains ul.available_tlds li#'+theid).append('<label><input type="checkbox" name="domains[]" value="'+data[0].domain+'" '+c+'/>'+data[0].domain+'</label>').show();
						$j('form#add_domains #pd-submit').show();
					}
					else{
						//$j('form#add_domains ul.available_tlds li#'+theid).attr('title','<?php echo JText::_( 'COM_PAPAKIDOMAINS_DOMAIN_UNAVAILABLE' ); ?>').append('<label><input disabled="disabled" type="checkbox" name="domains[]" value="'+data[0].domain+'"/>'+data[0].domain+'</label>').show();
					}
				 }
				if(--total<=0){
					$j('img#loading').css('visibility','hidden');
				}
				if(search_others){
					SearchOthers(domain);
				}
			  },
		   'json'
	);
}
function qs(key, default_)
{
  if (default_==null) default_="";
  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
  var qs = regex.exec(window.location.href.replace('&amp;','&'));
  if(qs == null)
    return default_;
  else
    return qs[1];
}
$j(document).ready(function() {
	if(qs('domain')!='' && qs('tld')!=''){
		$j('input#domain').val('www.'+'<?php print str_replace('www.','',isset($_GET['domain'])?$_GET['domain']:'');?>');
		$j('select#tld').val(qs('tld'));
		Search();
	}
	$j('input#domain').keypress(function(e){
		if(e.which == 13){
			Search();
		}
	});

});
</script>
<style type="text/css">
#papakidomains_search li {
	
}
#main #papakidomains_search li {
	padding:5px;
	padding-left:0;
}
#main #papakidomains_search ul {
	padding:0;
	margin:0;
	overflow:hidden;
}
#main #papakidomains_search ul.search_tlds {
	margin:5px;
}
.search_tlds li {
	padding:5px;
	height:20px;
	width: 15%;
}
#main #papakidomains_search ul li input {
	width:20px;
}
#papakidomains_search input#domain {
	border: 1px solid #3D598F;
	font-size: 16px;
	padding: 3px 3px;
	width: 300px;
}
#papakidomains_search select#tld{border: 1px solid #3D598F; font-size:16px; padding: 2px 3px; width:100px;}
#papakidomains_search td {
	text-align:center
}
#main #papakidomains_search .available_tlds li{font-size: 16px;
    padding-right: 0;
    width: 25%;}
#papakidomains_search button#search_btn{
    font-size: 16px;
    height: 31px;
    width: 100px;
}
</style>
<div id="papakidomains_search">
  <h1><?php echo JText::_( 'COM_PAPAKIDOMAINS_PAPAKI_DOMAINS_SEARCH' ); ?></h1>
  <div style="">
          <label><strong style="font-size:16px;"><?php echo JText::_( 'COM_PAPAKIDOMAINS_DOMAIN' ); ?>:</strong>
            <input type="text" name="domain" id="domain" value="www."/>
          </label>
          <select name="tld" id="tld">
          <?php
	foreach($this->tlds as $tld){
		//print '<li><label><input type="checkbox" name="tld" value="'.$tld->tld.'" checked="checked"/>'.strtoupper($tld->tld).'</label></li>';
		print '<option value="'.$tld->tld.'"> .'.strtoupper($tld->tld).' </option>';
	}
?>
</select>
          <button type="button" id="search_btn" onclick="Search()"><?php echo JText::_( 'COM_PAPAKIDOMAINS_SEARCH' ); ?></button>
        <img src="<?php print  JURI::root( true );?>/components/com_papakidomains/ajax-loader.gif" style=" visibility:hidden" alt="Loading" id="loading" />
        </div>
        <br />
        <hr />


  <br />
  <br />
   <form  id="add_domains" action="<?php echo JRoute::_(JURI::base().'index.php?option=com_papakidomains&view=register');?>" method="post" style="display:none">
    <h2><?php echo JText::_( 'COM_PAPAKIDOMAINS_AVAILABILITY_RESULTS' ); ?></h2>
    <ul class="available_tlds">
    </ul>
    <input id="pd-submit" style="display:none" type="submit" value="<?php echo JText::_( 'COM_PAPAKIDOMAINS_REGISTER' ); ?>" />
  </form>
</div>
