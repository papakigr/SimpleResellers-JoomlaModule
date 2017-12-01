<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="JavaScript">
   function check_data(form)
    { 
      if (form.fullname.value.length < 1) {
	   showMessage(form.fullname, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_COMPANYNAME');?>");
	   return false;
      }
	if (form.firstname.value.length < 1) {
	showMessage(form.firstname, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_FIRSTNAME');?>");
	return false;
      }
	  if (form.lastname.value.length < 1) {
	showMessage(form.lastname, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_LASTNAME');?>");
	return false;
      }
	  if (form.phoneNum.value.length < 1) {
	showMessage(form.phoneNum, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_PHONE');?>");
	return false;
      }
     if (form.emailText.value.length < 1) {
	   showMessage(form.emailText, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_EMAIL');?>");
	   return false;
      }
	  if (form.emailText.value.search(/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/) == -1)
	{
	    return showMessage(form.emailText, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_EMAIL2');?>");
		return false;
	}
	 
	 /*if (document.getElementById("list_tr").style.display == 'block'){
	  	if (form.DropDownListCompanyType.selectedIndex < 1){
			showMessage(form.DropDownListCompanyType, "Δεν έχετε επιλέξει τον τύπο της εταιρίας σας.");
			return false;
		}
	  }
	  
	  if (document.getElementById("afm_tr").style.display == 'block'){
		  if (form.afm.value.length < 1) {
			showMessage(form.afm, "Δεν έχετε συμπληρώσει το ΑΦΜ σας");
			return false;
		  }
	
		if (form.TaxOfficeId.selectedIndex < 1) {
			showMessage(form.TaxOfficeId, "Δεν έχετε επιλέξει τη ΔΟΥ σας");
			return false;
		  }
	  }*/
	  if (form.address1.value.length < 1) {
	showMessage(form.address1, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_ADDRESS');?>");
	return false;
      }
	  if (form.phoneNum.value.length > 0)
	  {
		if (form.phoneNum.value.search(/^\+[0-9]{1,3}\.[0-9]{1,14}$/) == -1){ 
			showMessage(form.phoneNum, '<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_PHONE2');?>');
			return false;
		}
	  }

	 if (form.fax.value.length > 0) 
	 {
		if (form.fax.value.search(/^\+[0-9]{1,3}\.[0-9]{1,14}$/) == -1)
		{ 
			showMessage(form.fax, '<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_FAX');?>');
			return false;
	 	}
	}
    
	if (form.city.value.length < 1) {
	showMessage(form.city, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_CITY');?>");
	return false;
      }
	  if (form.postcode.value.length < 1) {
	showMessage(form.zip, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_ZIP');?>");
	return false;
      }
	 /*if (form.username.value.length < 1) {
	showMessage(form.username, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_CITY');?>Δεν έχετε συμπληρώσει το Όνομα χρήστη");
	return false;
      }
	 if (form.password.value.length < 1) {
		showMessage(form.password, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_CITY');?>Δεν έχετε συμπληρώσει τον Κωδικό σας.");
		return false;
      }
	  if (form.password.value.length < 4) {
		showMessage(form.password, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_CITY');?>Ο κωδικός πρέπει να είναι από 4 έως 16 χαρακτήρες.");
		return false;
      }
	  if (!CompareStrings(form.password.value, form.verify.value)){
	  	showMessage(form.password, "<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ERROR_CITY');?>Οι κωδικοί δεν ταιριάζουν μεταξύ τους.");
		return false;
	  }*/
	
		//edw add ton neo usser
	  form.submit();		     	  
   } 
	
	function CompareStrings(a,b){
		if (a!=b)
			return false;
		else
			return true;
	}

	
function showMessage(frmObj, message)
{
	alert(message);
    if (frmObj.type == "hidden")
           return false;
	else{
          //window.focus();
	  return false;}
}

function CheckSelected(){
	var grp = form1.businessTypeRadioButton	
	
	for (var i = 0; i < grp.length - 1; i++){
		if(grp[i].checked){
			switch(grp[i].value){
				case 0:
					TrHide(true);
				break;
				case 1:
					TrHide(false);
				break;
				case 2:
					TrHide(3);
				break;
				default:
					TrHide(true);
				break;
			}
		}
	}
}

	function TrHide(bool){
		if (bool==true){			
			document.getElementById("afm_tr").style.display = 'none';
			document.getElementById("list_tr").style.display = 'none';
			document.getElementById("doy_tr").style.display = 'none';
			document.getElementById("drast_ep").style.display = 'none';
		}else if(bool==false) {
			document.getElementById("afm_tr").style.display = 'block';
			document.getElementById("list_tr").style.display = 'block';
			document.getElementById("doy_tr").style.display = 'block';
			document.getElementById("drast_ep").style.display = 'block';
		}else if(bool==3){
			document.getElementById("afm_tr").style.display = 'block';
			document.getElementById("list_tr").style.display = 'none';
			document.getElementById("doy_tr").style.display = 'block';
			document.getElementById("drast_ep").style.display = 'none';
		}
	}
</script>
<style type="text/css">
#register_form table,
#register_form td{border:0; border-collapse:separate}
#register_form {font-size:13px;}
#register_form td{padding:2px;}
#register_form input[type="text"],
#register_form select{border:1px solid #666; padding:2px 3px; width:250px;}
#register_form select{width:258px}
</style>
<h3><?php print JText::_('COM_PAPAKIDOMAINS_FORM_HEADER');?></h3>
<strong><?php print $this->domainNames ?></strong><br /><br />

<form id="register_form" name="form1" method = "post" action="<?php echo JURI::base() ?>index.php?option=com_papakidomains&task=send_registration" onSubmit="return check_data(form1);">
  <input type="hidden" name="domainNames" value="<?php print $this->domainNames ?>" />
  <table align="center" border="0" cellspacing="0" width="100%" cellpadding="2">
    <tbody>
      <tr>
        <td width="100%" align="left" valign="top"><p><?php print JText::_('COM_PAPAKIDOMAINS_FORM_INSTRUCTIONS');?></p></td>
      </tr>
      <tr>
        <td><br />
<br />
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" style="margin:1px ">
            
            <tr align="left">
              <th width="277" align="right" valign="top" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_COMPANYNAME');?> : </div></th>
              <td valign="middle"><input name="fullname" type="text" id="fullaname" size="32"><br />
                <span class="smgray"><?php print JText::_('COM_PAPAKIDOMAINS_FORM_COMPANYNAME_INFO');?></span></td>
            </tr>
            <tr align="left">
              <th width="277" align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_FIRSTNAME');?> : </div></th>
              <td><label>
                  <input name="firstname" type="text" id="firstname" size="32">
                </label></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray" width="277"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_LASTNAME');?> : </div></th>
              <td><input name="lastname" type="text" id="lastname" size="32"></td>
            </tr>
            
            
            
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_EMAIL');?> : </div></th>
              <td><label>
                  <input name="emailText" type="text" id="email_id" size="32">
                </label></td>
            </tr>
            <tr align="left" valign="top">
              <td class="medgray"><div align="right" class="smgray"></div></td>
              <td class="medgray"><span class="smgray"><?php print JText::_('COM_PAPAKIDOMAINS_FORM_EMAILINFO');?></span></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ADDRESS');?> : </div></th>
              <td><label>
                  <input name="address1" type="text" id="streetNum" size="32">
                </label></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray" width="277"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_AREA');?> :</div></th>
              <td><span class="style15">
                <input name="stateProvince" type="text" id="stateProvince" size="32">
                </span></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_CITY');?> :</div></th>
              <td><span class="style15">
                <input name="city" type="text" id="city" size="32" maxlength="50">
                </span></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_ZIP');?> : </div></th>
              <td><input name="postcode" type="text" id="zip" size="32" maxlength="50"></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_COUNTRY');?> :</div></th>
              <td class="style15"><select name="country" id="country" size="1">
                  <option selected="selected" value="GR">Ελλάδα</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia</option>
                  <option value="BA">Bosnia-Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territories</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Island</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, Democratic republic of the (former Zaire)</option>
                  <option value="CK">Cook Islands</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">Cote D'ivoire</option>
                  <option value="HR">Croatia</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="TP">East Timor</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (Malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="FX">France (Metropolitan)</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe (French)</option>
                  <option value="GU">Guam (United States)</option>
                  <option value="GT">Guatemala</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard &amp; McDonald Islands</option>
                  <option value="VA">Holy See (Vatican City State)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KR">Korea Republic of</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Lao People's Democratic Republic</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macau</option>
                  <option value="MK">Macedonia The Former Yugoslav Republic of</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia Federated States of</option>
                  <option value="MD">Moldavia Republic of</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="AN">Netherlands Antilles</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Island</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Reunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="SH">Saint Helena</option>
                  <option value="KN">Saint Kitts and Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="PM">Saint Pierre and Miquelon</option>
                  <option value="VC">Saint Vincent and the Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SK">Slovakia (Slovak Republic)</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia and South Sandwich Islands</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard &amp; Jan Mayen Islands</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="TW">Taiwan Province of China</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania United Republic of</option>
                  <option value="TH">Thailand</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad &amp; Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks &amp; Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="GB">United Kingdom</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="US">United States of America</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VE">Venezuela</option>
                  <option value="VN">Viet Nam</option>
                  <option value="VG">Virgin Islands (British)</option>
                  <option value="VI">Virgin Islands (United States)</option>
                  <option value="WF">Wallis &amp; Futuna Islands</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="YU">Yugoslavia</option>
                  <option value="ZM">Zambia</option>
                </select></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_PHONE');?> :</div></th>
              <td><label>
                  <input name="phoneNum" type="text" id="phoneNum" size="32">
                </label></td>
            </tr>
            <tr align="left" valign="top">
              <td class="medgray"><div align="right" class="smgray"></div></td>
              <td class="medgray"><span class="smgray"><?php print JText::_('COM_PAPAKIDOMAINS_FORM_EG');?> +30.2105555555 <br>
                </span></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_MOBILE');?>: </div></th>
              <td><input name="mobile" type="text" id="mobile" size="32"></td>
            </tr>
            <tr align="left">
              <th align="right" class="medgray"><div align="left">&nbsp;<?php print JText::_('COM_PAPAKIDOMAINS_FORM_FAX');?>: </div></th>
              <td><input name="fax" type="text" id="fax" size="32"></td>
            </tr>
            <tr align="left">
              <td colspan="2" class="medgray">&nbsp;</td>
            </tr>
            
            
            <TR>
              <TD colspan="2" class="black" height="1" style="padding:0">&nbsp;</TD>
            </TR>
            <TR>
              <TD align="right" colspan="2"><input type="submit" name="imgBtnContinue" id="imgBtnContinue"  value="<?php print JText::_('COM_PAPAKIDOMAINS_FORM_CONTINUE');?>"/></TD>
            </TR>
          </table></td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </tbody>
  </table>
</form>
