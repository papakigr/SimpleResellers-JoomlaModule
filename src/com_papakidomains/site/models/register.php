<?php
/**
 * Papaki Domains Model for Papaki Domains Component
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license    GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');
jimport('joomla.log.log');
jimport('joomla.log.entry');
/**
 * Papaki Domains Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class papakidomainsModelRegister extends JModelLegacy
{
    public $_domains;
    public function getDomains()
    {
        //return 'fgsdgfdgsd';
        $data = JRequest::get('post');
        $domains = '';
        if (isset($data['domains'])) {
            if (is_array($data['domains'])) {
                $domains = implode(', ', $data['domains']);
            } else {
                $domains = $data['domains'];
            }
        } elseif (isset($data['domainNames'])) {
            if (is_array($data['domainNames'])) {
                $domains = implode(', ', $data['domainNames']);
            } else {
                $domains = $data['domainNames'];
            }
        }

        $this->_domains = $domains;
        //$this->_domains='saffsafds';
        return $this->_domains;
    }
    public function register()
    {
        $data = JRequest::get('post');
        $params = JComponentHelper::getParams('com_papakidomains');
        $admin_email = $params->get('admin_email');

        $subject = "Domain Request";
        $domainNames = $this->getDomains();
        //$businessTypeRadioButton =  $data['businessTypeRadioButton'];
        //$drast =  $data['businessDrast'];
        //$type = $data['DropDownListCompanyType'];
        //$doy = $data['doy'];
        $stateProvince = $data['stateProvince'];
        $fullname = $data['fullname'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $emailText = $data['emailText'];
        $postcode = $data['postcode'];
        $address1 = $data['address1'];
        $phoneNum = $data['phoneNum'];
        $mobile = $data['mobile'];
        $fax = $data['fax'];
        $stateProvince = $data['stateProvince'];
        $city = $data['city'];
        $country = $data['country'];
        //$afm  = $data['afm'];

        $text = "<html><body>

	<table align=\"center\" border=\"0\" cellspacing=\"0\" width=\"100%\">
															<tbody>

															  <tr>
																<td>
																<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\"margin:1px \">";

        $text = $text . "<tr align=\"left\">
		  <td width=\"40%\" align=\"right\" valign=\"top\" class=\"medgray\"><div align=\"left\">&nbsp;Επωνυμία Εταιρίας/Φορέα - ή - Το Ονοματεπώνυμο σας : </div></td>
		  <td valign=\"middle\">" . $fullname . "</td>
		</tr>
		<tr align=\"left\">
		  <td width=\"40%\" align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Όνομα : </div></td>
		  <td><label>" . $firstname . "</label></td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\"  width=\"40%\"><div align=\"left\">&nbsp;Επίθετο : </div></td>
		  <td>" . $lastname . "</td>
		</tr>";

        $text = $text . "<tr align=\"left\">
		  <td align=\"right\" ><div align=\"left\">&nbsp;Email : </div></td>
		  <td><label>" . $emailText . "</label></td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Διεύθυνση : </div></td>
		  <td><label>" . $address1 . "</label></td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" width=\"40%\"><div align=\"left\">&nbsp;Περιοχή :</div></td>
		  <td>" . $stateProvince . "</td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Πόλη/Χωριό :</div></td>
		  <td>" . $city . "</td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Ταχ.Κώδικας : </div></td>
		  <td>" . $postcode . "</td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Χώρα :</div></td>
		  <td class=\"style15\">" . $country . "</td>
		</tr>
		<tr align=\"left\">
		  <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Τηλέφωνο :</div></td>
		  <td><label>" . $phoneNum . "</label></td>
		</tr>";
        if (strlen($mobile) != 0) {
            $text = $text . "<tr align=\"left\">
		  <td align=\"right\" ><div align=\"left\">&nbsp;Κινητό (Προαιρετικό): </div></td>
		  <td>" . $mobile . "</td>
		</tr>";
        }
        if (strlen($fax) != 0) {
            $text = $text . "<tr align=\"left\">
		  <td align=\"right\"><div align=\"left\">&nbsp;Fax (Προαιρετικό): </div></td>
		  <td>" . $fax . "</td>
		</tr>";
        }
        $text = $text . "
		<tr align=\"left\">
		  <td colspan=\"2\">&nbsp;</td>
		</tr>

	  </table></td>
															  </tr>

	<tr><td colspan=\"2\">επιθυμεί να κατοχυρώσει τα παρακάτω ονόματα χώρου </td></tr>														 <tr><td colspan=\"2\">" . $domainNames . "</td></tr>
															</tbody>
														</table></body></html>";
        if (JDEBUG) {
            JFactory::getApplication()->enqueueMessage($text);
        }
        $mailer = JFactory::getMailer();
        $config = JFactory::getConfig();
        $sender = array($emailText, $fullname);
        $mailer->setSender($sender);
        $mailer->setSubject('Domain Request');
        $mailer->setBody($text);
        $mailer->isHTML(true);
        $mailer->addRecipient($admin_email);
        $send = $mailer->Send();

        return true;
    }
}
