<?php defined('_JEXEC') or die('Restricted access'); ?>
<h3><?php echo JText::_( 'COM_PAPAKIDOMAINS_PAPAKI_DOMAINS_SEARCH' ); ?></h3>
<form action="<?php print JRoute::_('index.php');?>" method="get">

<input type="text" name="domain" value="www." style=" border: 1px solid #3D598F;font-size: 13px; padding: 1px; width: 150px;height: 18px;"/> 
<select name="tld" id="tld2" style=" border: 1px solid #3D598F;font-size: 13px; padding: 1px; width: 70px;">
          <?php
	foreach($this->tlds as $tld){
		//print '<li><label><input type="checkbox" name="tld" value="'.$tld->tld.'" checked="checked"/>'.strtoupper($tld->tld).'</label></li>';
		print '<option value="'.$tld->tld.'"> .'.strtoupper($tld->tld).' </option>';
	}
?>
</select>
<input type="submit" value="<?php echo JText::_( 'COM_PAPAKIDOMAINS_SEARCH' ); ?>" style="padding: 1px;width: 100px; margin-top:5px" />
</form>