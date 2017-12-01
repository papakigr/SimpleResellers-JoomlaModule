<?php defined('_JEXEC') or die('Restricted access'); ?>
<style type="text/css">
ul.extensions {
	width:100%;
	overflow:hidden;
}
ul.extensions li {
	list-style:none;
	float:left;
	width:9%;
	padding:5px;
	padding-left:0;
	font-size:16px;
}
#editcell {
	font-size:16px;
}
</style>
<form action="index.php" method="post" name="adminForm" id="adminForm">
  <div id="editcell">
    <table>
      <tr>
        <th>Api Key:</th>
        <td><input type="text" name="api_key" size="140" value="<?php print $this->params->get('api_key');?>" /></td>
      </tr>
      <tr>
        <th>Admin Email:</th>
        <td><input type="text" name="admin_email" size="140" value="<?php print $this->params->get('admin_email');?>" /><br />
          <span style="font-size:11px;">(Domain Requests are sent here)</span></td>
      </tr>
    </table>
  </div>
  <h4><?php echo JText::_( 'Choose below which extensions your visitors will be able to search for:' ); ?></h4>
  <ul  class="extensions">
    <?php 
	//print_r($this->tlds);
	foreach($this->tlds as $tld){
		//print_r($tld);
		print '<li><label><input type="checkbox" name="tlds[]" value="'.$tld->tld.'" ';
		if($tld->enabled)
			print 'checked="checked" ';
			
         print '/>'.strtoupper($tld->tld).'</label></li>';
	}
	?>
  </ul>
  <input type="hidden" name="option" value="com_papakidomains" />
  <input type="hidden" name="task" value="store" />
</form>
