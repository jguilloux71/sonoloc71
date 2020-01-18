<?php
/**
 * Admin tool to list newsletter subscribers from front-office block.
 *
 * See LICENCE.txt for terms of use
 * History :
 * 	@version 0.8 (2012-11-12) 	: 
 *		add security check in export process to avoid external calls
 * 	@version 0.7 (2012-08-27) 	: 
 *		remove deprecated mysql_list_tables function
 *		Compatiblity with Prestashop 1.5
 * 	@version 0.6 (2012-02-10) 	: 
 *			> Correct display bugs : 
 *				> could import even if no listed subscribers
 *				> could export customers emails even if no listed subscribers
 *			> add control feature : in case of subscriber email edit, check if the new email is not already in the subscribers / customers tables
 *			> prestashop add-ons compliant
 * 	@version 0.5 (2011-11-24) 	: add import feature
 * 	@version 0.4 (2011-11-02) 	: also list / export customers (that have subscribed to newsletter) emails
 * 	@version 0.3 				: edit email of a subscriber
 * 	@version 0.2 				: include email list export
 * 	@version 0.1 				: first version
 */
if (!defined('_PS_VERSION_'))
  exit;
  
require_once(_PS_MODULE_DIR_.'pss_newssubscribers/pssnewssubscriber.php');

class pss_newssubscribers extends Module
{
	// true to activate debug traces
	private $DEBUG = false;
	
	// absolute URL to this module
	public $absoluteUrl;
	// absolute path (in OS sense) to this module
	public $absolutePath;
	// the admin URL to get configuration screen for current module
	private $confUrl;

	private $_warnings;
	
	private $classWarning;
	private $classError;
	
	private $token;

	function __construct()
	{
		// Module definition
		$this->name = 'pss_newssubscribers';
		// some changes between 1.3.x (and previous) and 1.4.x Prestashop versions
		if ($this->isPs12x() || $this->isPs13x()) 
		{
			$this->tab = 'Prestascope';
		} 
		else if ($this->isPs14x()) 
		{
			$this->tab = 'administration';
			$this->author = 'PrestaScope';
		}
		else if ($this->isPs15x())
		{
			$this->tab = 'administration';
			$this->author = 'PrestaScope';
			// set the version compliancy
			$this->ps_versions_compliancy = array('min' => '1.2', 'max' => '1.6');	// 1.2 included / 1.6 excluded
			// set the dependency with the block_newsletter module
			array_push($this->dependencies, 'blocknewsletter');
		}
		
		$this->version = '0.8';

		// full url & path to current module
		// Use Tools::getHttpHost(false, true).__PS_BASE_URI__
		$this->absoluteUrl = $this->is_https()?'https':'http'.'://'.$_SERVER['HTTP_HOST']. _MODULE_DIR_ . $this->name . '/';
		$this->absolutePath = _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.$this->name.DIRECTORY_SEPARATOR;
		
		// standard constructor
		parent::__construct();
		
		// custom display for module list
		$this->displayName = $this->l('PSS/Newsletter block subscribers');
		$buf = '<style type="text/css">';
		$buf .= 'a.descriptionLink {color:blue;text-decoration:underline;} a.descriptionLink:hover{color:red;text-decoration:none;}';
		$buf .= 'div.pssDescriptionDiv {background:#6a6a6a; color:white; padding:3px; margin-top:2px;}';
		$buf .= '</style>';
		$buf .= '<div class="pssDescriptionDiv">';
		$buf .= $this->l('Manage list of front-office newsletter block subscribers.').'<br /><b>'.$this->l('Click on configure link to access to module content.').'</b>';
		$buf .= '</div>';
        $this->description = $buf;
		
		// the admin URL to get configuration for current module
		$tab = Tools::getValue('tab');
		$token = Tools::getValue('token');
		$mainParts = explode('?', $_SERVER['REQUEST_URI']);
		$this->confUrl = $mainParts[0].'?tab=AdminModules&amp;configure='.$this->name.'&amp;token='.$token;
		
		// register the token to be reused for security call of export.php
		$this->token = $token;
		
		// initialize class to use to display warning / errors
		$this->classWarning = 'warn';
		if (!$this->isPs14x() && $this->isPs15x())
			$this->classWarning .= ' warning';
		$this->classError = 'error';
		if (!$this->isPs14x() && $this->isPs15x())
			$this->classError .= ' alert';
	}
	private function is_https()
	{
		return strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'? true : false;
	}
	function install()
	{
		// check required version - 1.2.x or 1.3.x or 1.4.x or 1.5.x
		if (!$this->isPs12x() && !$this->isPs13x() && !$this->isPs14x()&& !$this->isPs15x())
			return false;
		if (!parent::install())
			return false;
		return true;
	}
	public function uninstall() {
		if(!parent::uninstall())
			return false;
		return true;
	}
	/* *****************************************************************************************
	 *
	 *						FUNCTION TO DISPLAY BO FORMS AND MANAGE ACTIONS
	 *
	 * ***************************************************************************************** */
	/**
	 * Deal with BO configuration form user actions
	 */
	public function getContent()
	{
		global $cookie;
		
		// empty errors buffer
		$this->_errors = array();
		$this->_warnings = array();
		$validationMsg = '';

		// common title to all displays
		$this->_html = '<h2>Prestascope : '.$this->l('Block Newsletter subscribers list').'</h2>';
		
		// -------------------------------------------------------
		// check front-office module installation (in fact, thsi check is not mandatory for 1.5 versions - done at install time)
		//
		if (!$this->mysql_table_exists(_DB_PREFIX_.'newsletter', _DB_NAME_))
		{
			// the beginning of the HTML to display
			return $this->displayNoNewsletterBlockForm();
		}

		// any subscriber to load for action ?
		$id = Tools::getValue('id');
		if ($id)
			$subscriber = new PssNewsSubscriber($id);
		
		// get action value if any
		$action = Tools::getValue('action');
		$display = 'mainForm';
		if ($action)
		{
			$ok = true;
			// load the object to act on
			if (!Validate::isLoadedObject($subscriber))
			{
				$this->_errors[] = $this->l('Unable to load the subscriber from DB').' ('.$id.')';
				$ok = false;
			}
			if ($ok)
			{
				// >>> Action DELETE
				if ($action=='delete')
				{
					if (!$subscriber->delete())
					{
						$this->_errors[] = $this->l('Unable to delete the subscriber').' '.$id.$this->l(' in database');
						$ok = false;
					}
					if ($ok)
						$validationMsg = '<div class="conf ok">'.$this->l('Deleted successfully').'</div>';
				} 
				// >>> Action EDIT
				else if ($action=='edit')
				{
					// the submitted email
					$email = Tools::getValue('email');
					
					if ($subscriber->email != $email)
					{
						// validate the email
						if (!Validate::isEmail($email))
						{
							$this->_errors[] = $this->l('The email in invalid');
							$ok = false;
						}
						else if (PssNewsSubscriber::existsAsSubscriber($email))
						{
							$this->_errors[] = $this->l('The email already exists as Newsletter block subscriber');
							$ok = false;
						}
						else if (PssNewsSubscriber::existsAsCustomer($email))
						{
							$this->_errors[] = $this->l('The email already exists as Customer');
							$ok = false;
						}
						
						$subscriber->email = $email;
						if ($ok && !$subscriber->save())
						{
							$this->_errors[] = $this->l('Unable to update the subscriber').' '.$id.' '.$this->l('in database');
							$ok = false;
						}
						if ($ok)
							$validationMsg = '<div class="conf ok">'.$this->l('Updated successfully').'</div>';
						else
							$display = 'unitForm';	// stay on edit form
					}
					else
						$validationMsg = '<div class="conf ok">'.$this->l('No change').'</div>';
				}
			}
		}
		// >>> DELETE SELECTION
		elseif (Tools::getValue('submitDelsubscribers')) 
		{
			$subscriber = new PssNewsSubscriber();
			$selection = Tools::getValue('subscriberBox');
			if (!empty($selection))
			{
				$ok = $subscriber->deleteSelection($selection);
				if ($ok)
					$validationMsg = '<div class="conf ok">'.$this->l('Selection deleted successfully').'</div>';
				else
					$this->_errors[] = $this->l('An error occurs while deleting the selection');
			}
			else
				$validationMsg = '<div class="conf ok">'.$this->l('Nothing to delete').'</div>';
		}
		// >>> EXPORT LIST
		elseif (Tools::getValue('submitExportSubscribers')) 
		{
			$includeCustomersNewsletter = intVal(Tools::getValue('includeCustomersNewsletter'));
			$includeCustomersNewsletter = ($includeCustomersNewsletter===1?1:0);
			$this->exportList($includeCustomersNewsletter);
			return null;
		// >>> IMPORT EMAIL LIST
		}
		elseif (Tools::getValue('submitImportSubscribers')) 
		{
			if ($this->DEBUG)
			{
				print_r($_FILES['import_file_name']);
				echo '<br />';
			}
			// get the import file content
			if (!isset($_FILES['import_file_name']['tmp_name']) || empty($_FILES['import_file_name']['tmp_name']))
			{
				$this->_errors[] = $this->l('No file to upload');
			}
			else if ($_FILES['import_file_name']['error']) 
			{ 
				switch ($_FILES['import_file_name']['error'])
				{
					case 1: // UPLOAD_ERR_INI_SIZE    
						$this->_errors[] = $this->l('The uploaded file exceeds the size limit of your PHP settings');
						break;    
					case 2: // UPLOAD_ERR_FORM_SIZE    
						$this->_errors[] = $this->l('The uploaded file exceeds the size limit of 2MB');
						break;    
					case 3: // UPLOAD_ERR_PARTIAL    
						$this->_errors[] = $this->l('The file transfer has been interrupted');
						break;    
					case 4: // UPLOAD_ERR_NO_FILE    
						$this->_errors[] = $this->l('The uploaded file is empty');
						break;    
				}    
			}    
			else
			{    
				// load file content
				$lines = file($_FILES['import_file_name']['tmp_name']);
				if ($this->DEBUG)
				{
					echo '<br />>> Loaded from file ***********************************************<br />';
					print_r($lines);
					echo '<br />';
				}
				// check its size
				if (count($lines)==0)
				{
					$this->_errors[] = $this->l('The uploaded file is empty');
				}
				else 
				{
					// build a list of valid emails
					$emails = array();
					$someInvalidEmails = false;
					foreach($lines as $emailCandidate) 
					{
						// trim each email to remove the end of line chars
						$emailCandidate = trim($emailCandidate);
						if (Validate::isEmail($emailCandidate))
							$emails[] = $emailCandidate;
						else
						{
							$this->_warnings[] = $this->l('In file, email ').' '.$emailCandidate.' '.$this->l('is invalid');
							$someInvalidEmails = true;
						}
					}
					
					// if there any valid email to import ?
					if (count($emails )==0)
					{
						$this->_errors[] = $this->l('No valid Email provided in the uploaded file');
					}
					else if ($someInvalidEmails)
					{
						$this->_errors[] = $this->l('Some invalid emails found in file. Please, correct them before ask again for import.');
					}
					else
					{
						// import the emails
						$nbLoaded = count($emails);
						$nb = $this->importEmails($emails);
						if ($nb>0)
							$validationMsg = '<div class="conf ok">'.$nb.' '.$this->l('emails').' '.$this->l('over').' '.$nbLoaded.' '.$this->l('loaded from file').' '.$this->l('imported successfull').'</div>';
					}
					
				}
				
			}    
			
		}
		// >>>>>>>>>>> if no action, may be a display to show <<<<<<<<<<<<<
		else
		{
			if (Tools::getValue('display')!='')
				$display = Tools::getValue('display');
		}	
		
		// display errors if any
		if (!empty($this->_errors))
			foreach ($this->_errors as $error)
				$this->_html .= '<div class="alert error">'.$error.'</div>';

		// display warnings if any
		if (!empty($this->_warnings))
			foreach ($this->_warnings as $warnings)
				$this->_html .= '<div class="warn warning" style="width:inherit;">'.$warnings.'</div>';

		// display validation message if any
		if (!empty($validationMsg))
			$this->_html .= $validationMsg;
			
		if ($display=='mainForm')
			return $this->_displayMainForm();
		else if ($display=='unitForm')
			return $this->_displayFormEdit($id);
	}
	
	/**
	 * Build the BO configuration main form
	 */
	private function _displayMainForm()
	{
		global $cookie;

		// get sorted newsletter subscribers list from database
		$subscribers = PssNewsSubscriber::getSubscribers();
		
		// get count of client account that have subscribed to newsletter
		$countCustomers = $this->countClientNewsletter();
		
		$this->_html .= '
			<form method="post" action="'.$this->confUrl.'" enctype="multipart/form-data" method="post">
				<fieldset>
					<legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Subscribers list').'</legend>';
		if (count($subscribers)>0)
		{
			$this->_html .= '
					<div style="font-weight:bold;">'.$this->l('Number of listed subscribers').' : '.count($subscribers).'</div>
					<table class="table" cellpadding="0" cellspacing="0" style="width:100%; margin-top:15px;">
						<tr class="nodrag nodrop">
							<th class="center"><input type="checkbox" name="checkme" class="noborder" onclick="checkDelBoxes(this.form, \'subscriberBox[]\', this.checked)"></th>
							<th>'.$this->l('Email').'</th>
							<th>'.$this->l('Registration date').'</th>
							<th>'.$this->l('Registration IP').'</th>
							<th class="center">'.$this->l('Actions').'</th>
						</tr>
					';
			foreach ($subscribers as $subscriber)
			{
				// get image size
				$email = $subscriber['email'];
				$registrationDate = $subscriber['newsletter_date_add'];
				$registrationIP = $subscriber['ip_registration_newsletter'];

				$this->_html .= '
					<tr>
						<td class="center"><input type="checkbox" name="subscriberBox[]" value="'.$subscriber['id'].'" class="noborder"></td>
						<td class="left pointer"><a href="'.$this->confUrl.'&amp;display=unitForm&amp;id='.$subscriber['id'].'">'.$subscriber['email'].'</a></td>
						<td class="left pointer"><a href="'.$this->confUrl.'&amp;display=unitForm&amp;id='.$subscriber['id'].'">'.Tools::displayDate($subscriber['newsletter_date_add'], $cookie->id_lang, true).'</a></td>
						<td class="left pointer"><a href="'.$this->confUrl.'&amp;display=unitForm&amp;id='.$subscriber['id'].'">'.$subscriber['ip_registration_newsletter'].'</a></td>';
				$this->_html .= '
						<td class="center" style="white-space: nowrap;">'.
							'<a href="'.$this->confUrl.'&amp;display=unitForm&amp;id='.$subscriber['id'].'"><img src="../img/admin/edit.gif" alt="'.$this->l('Edit').'" title="'.$this->l('Edit').'"></a>'.
							'<a href="'.$this->confUrl.'&amp;action=delete&amp;id='.$subscriber['id'].'" onclick="return confirm(\''.$this->l('Delete this subscriber').' ?\');">
									<img src="../img/admin/delete.gif" alt="'.$this->l('Delete').'" title="'.$this->l('Delete').'">
							 </a>'.
						'</td>
					</tr>';
			}
			$this->_html .= '
					</table>
					<p>
						<input type="submit" class="button" name="submitDelsubscribers" value="'.$this->l('Delete selection').'" onclick="return confirm(\''.$this->l('Delete these subscribers').' ?\');">
					</p>
					<div class="pss_help">
						<table width="100%">
							<td style="width:20px;"><img src="'.$this->_path.'help2.png" alt="'.$this->l('User help').'" /></td>
							<td>
								<ul>
									<li>'.$this->l('Careful, you lost datas from deleted subscribers.').'</li>
								</ul>
							</td>
						</table>
					</div>
					<div style="height:20px;"></div>
					';
		} 
		else 
		{
			$this->_html .= '
					<div style="margin-top:30px; margin-bottom:30px;" class="'.$this->classWarning.'">'.$this->l('No subscriber to list').'</div>
					<p class="clear"></p>
					';
		}
		$this->_html .= '
					<p style="float:left; text-align:right;">
						<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						<input type="file" name="import_file_name" style="width:400px;">   
					</p>
					<p style="float:right; text-align:right;">
						<input type="checkbox" name="includeCustomersNewsletter" value="1" id="includeCustomersNewsletter"><label for="includeCustomersNewsletter" style="width:inherit; float:inherit; margin-left:10px;">'.$this->l('Include also the').' '.$countCustomers.' '.$this->l('customers with newsletter option').'</label>
					</p>
					<p class="clear"></p>
					<p style="float:left; text-align:left;">
						<input type="submit" class="button" name="submitImportSubscribers" value="'.$this->l('Import emails').'" >
					</p>
					<p style="float:right; text-align:right;">
						<input type="submit" class="button" name="submitExportSubscribers" value="'.$this->l('Export emails').'" >
					</p>
					<p class="clear"></p>
					<div class="pss_help">
						<table width="100%">
							<td style="width:20px;"><img src="'.$this->_path.'help2.png" alt="'.$this->l('User help').'" /></td>
							<td>
								<ul>
									<li>'.$this->l('Email file should contain one email per line').'</li>
								</ul>
							</td>
						</table>
					</div>
				</fieldset>
			</form>';
			
		return $this->_html;
	}
	/**
	 * Build the BO form to edit a subscriber
	 * @param $id : the subscriber id to edit / cannot be null for the moment (can't add a new subscriber)
	 */
	private function _displayFormEdit($id)
	{
		global $cookie;
		
		if (!$id)
			return '<div class="alert error">'.$this->l('Can\'t add a new subscriber').'</div>';
		
		// load the subscriber informations
		$subscriber = new PssNewsSubscriber($id);

		// Some CSS
		$this->_html .= '
			<style type="text/css">
				div.pss_help {font-size:11px;}
			</style>';
				
		// ------------------------------------------------------------
		// the subscriber edit panel
		$this->_html .= '
		<form method="post" action="'.$this->confUrl.'">
			<input type="hidden" name="action" value="edit" />
			<input type="hidden" name="id" value="'.$id.'" />
			<fieldset>
				<legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Edit Subscriber').'</legend>
				<label>'.$this->l('Email').': </label>
				<div class="margin-form">
					<input type="text" size="60" maxlength="32" name="email" value="'.$subscriber->email.'" /> <sup>*</sup>
				</div>
				<div class="clear"></div>
				<div class="margin-form clear pspace">
					<input type="submit" name="submitSlide" value="'.$this->l('Update').'" class="button" />
					<input type="button" value="'.$this->l('Back').'" class="button" onclick="javascript:document.location.href=\''.$this->confUrl.'\'"/>
				</div>
				<div class="small"><sup>*</sup> '.$this->l('Required field').'</div>
			</fieldset>
		</form>
		<div style="height:20px;"></div>';

		return $this->_html;
	}
	/**
	 * Display the form to inform user that the newsletter block is not active
	 */
	private function displayNoNewsletterBlockForm() 
	{
		global $cookie;
		
		$this->_html .= '
		<fieldset><legend><img src="../img/admin/nav-user.gif" />'.$this->l('Module warning').'</legend>
			<div style="text-align:center; color:red; font-size:15px; font-weight:bold;">'.$this->l('Important').' !!</div>
			<div style="height:20px;">&nbsp;</div>
			<div style="text-align:center;">'.$this->l('The Newsletter Block is not activated in your front-office.').'</div>
			<div style="height:10px;">&nbsp;</div>
			<div style="text-align:center;">'.$this->l('So the module have no interest for the moment.').'</div>
			<div style="height:40px;">&nbsp;</div>
			<div style="text-align:center;">'.$this->l('Please, try again after the block has been activated.').'</div>
		</fieldset>';
		return $this->_html;
	}
	/**
	 * Export all emails from list
	 */
	private function exportList($includeCustomersNewsletter) 
	{
		global $cookie;
		// redirect to url
//		$url = _MODULE_DIR_.$this->name.'/export.php?includeCustomersNewsletter='.$includeCustomersNewsletter;
		$id_employee = $cookie->id_employee;
		$pwd = $cookie->passwd;
		$url = _MODULE_DIR_.$this->name.'/export.php?includeCustomersNewsletter='.$includeCustomersNewsletter.'&id_employee='.$id_employee.'&pwd='.urlencode($pwd);
		if ($this->DEBUG)
		{
			echo '<br />>> Call for export emails ***********************************************<br />';
			echo '<br />... Include customers : '.$includeCustomersNewsletter.'<br />';
			echo '<br />... Employee id : '.$id_employee.'<br />';
			echo '<br />... Employee password : '.$pwd.'<br />';
			echo '<br />... So call URL : '.$url.'<br />';
			echo '<br />... Please, turn off DEBUG to get your CSV !<br />';
			die();
		}
		
		// redirect to the export function
		Tools::redirectAdmin($url);
		return true;
	}
	/**
	 * Get count of all customers that have subscribed to newsletter
	 */
	private function countClientNewsletter() 
	{
		$query = '
		SELECT count(*) as nb
			FROM  `'._DB_PREFIX_.'customer` 
			WHERE `newsletter`=1';
		return Db::getInstance()->getValue($query);
	}
	/**
	 * Import a list of emails into the newsletter table
	 */
	private function importEmails($emails)
	{
		// remove all emails already in the newsletter table
		$nbBefore = count($emails);
		$emails = $this->removeEmailAlreadyInDb(_DB_PREFIX_.'newsletter', 'email', $emails);
		// some emails have been removed here ?
		$nbAfter = count($emails);
		if ($nbAfter<$nbBefore)
		{
			if ($this->DEBUG)
				echo '... '.($nbBefore-$nbAfter).' emails found in newsletter list<br />';
			$this->_warnings[] = $this->l('In file').', '.($nbBefore-$nbAfter).' '.$this->l('emails have been found in newsletter list');
		}
		
		// remove also all emails already in the customer table
		$nbBefore = count($emails);
		$emails = $this->removeEmailAlreadyInDb(_DB_PREFIX_.'customer', 'email', $emails);
		// some emails have been removed here ?
		$nbAfter = count($emails);
		if ($nbAfter<$nbBefore)
		{
			if ($this->DEBUG)
				echo '... '.($nbBefore-$nbAfter).' emails found in customer list<br />';
			$this->_warnings[] = $this->l('In file').', '.($nbBefore-$nbAfter).' '.$this->l('emails have been found in customer list');
		}
		
		// now we have an array of emails not in DB
		if (count($emails)>0)
		{
			// build a multi-insert query
			$query = 'INSERT INTO '._DB_PREFIX_.'newsletter (email, newsletter_date_add, ip_registration_newsletter, http_referer ) VALUES ';
			$first = true;
			foreach ($emails as $email)
			{
				if (!$first) $query .= ', ';
				$query .= "('".$email."', NOW(), '127.0.0.1', '')";
				$first = false;
			}
			Db::getInstance()->Execute($query);
		}
		else
			$this->_warnings[] = $this->l('After controls, no emails remains from file');

		return count($emails);
	}
	/**
	 * Remove from an input array of emails all that are already in DB in the field of table
	 */
	private function removeEmailAlreadyInDb($table, $field, $emails)
	{
		if ($this->DEBUG)
		{
			echo '<br />>> Check emails in table '.$table.' ***********************************************<br />';
			echo '<br />>> Raw list of emails ----------------------------------------<br />';
			print_r($emails);
			echo '<br />';
		}
		// loop through all emails to build a query to check for emails already in DB
		$query = 'SELECT `'.$field.'` FROM `'.$table.'` WHERE `'.$field.'` IN (';
		$first = true;
		foreach ($emails as $email) 
		{
			if (!$first) $query .= ",";
			$query .= "'".$email."'";
			$first = false;
		}
		$query .= ')';
		if ($this->DEBUG)
			echo '>> Check in DB with query : '.$query .'<br />';

		// loop through results
		$emailsToRemove = Db::getInstance()->ExecuteS($query);
			
		// some emails to remove first ?
		if (count($emailsToRemove)>0)
		{
			if ($this->DEBUG)
			{
				echo '<br />>> Emails array to remove ----------------------------------------<br />';
				print_r($emailsToRemove);
				echo '<br />';
			}
			// join all input emails
			$stringEmails = implode(';', $emails);
			$stringEmails .= ';';
			
			if ($this->DEBUG)
				echo '>> All emails en single string : '.$stringEmails.'<br />';
			// loop through all emails to remove
			foreach($emailsToRemove as $emailToRemove) 
			{
				$emailToRemove = $emailToRemove['email'];
				$stringEmails = str_replace($emailToRemove.';', '', $stringEmails);
				if ($this->DEBUG)
					echo '>> After remove '.$emailToRemove.';'.' remains '.$stringEmails.'<br />';
			}
			// remove the trailing ;
			$stringEmails = substr($stringEmails, 0, strlen($stringEmails)-1);
			// rebuild the final emails array
			if (strlen(trim($stringEmails))>0)
				$emails = explode(';', trim($stringEmails));
			else
				$emails = array();
			if ($this->DEBUG)
			{
				echo '<br />>> Final list of emails ----------------------------------------<br />';
				print_r($emails);
				echo '<br />';
			}
		}
		return $emails;
	}
	
	// ******************************************************************************************
	//
	//
	// Tools for installation
	//
	//
	// ******************************************************************************************
	/**
	 * Check if installed Prestashop is a 1.2.x version
	 */
	public static function isPs12x() 
	{
		return self::checkPsVersion('1.2');
	}
	/**
	 * Check if installed Prestashop is a 1.3.x version
	 */
	public static function isPs13x() 
	{
		return self::checkPsVersion('1.3');
	}
	/**
	 * Check if installed Prestashop is a 1.4.x version
	 */
	public static function isPs14x() 
	{
		return self::checkPsVersion('1.4');
	}
	/**
	 * Check if installed Prestashop is a 1.5.x version
	 */
	public static function isPs15x() 
	{
		return self::checkPsVersion('1.5');
	}
	/**
	 * Check if installed Prestashop match an input radix
	 */
	public static function checkPsVersion($radixVersion) 
	{
		// get PS version
		$psVersion = _PS_VERSION_;
		if ($psVersion==null)
			return false;
		
		// look for version like 1.3.1, 1.3.7.0 or 1.4.3
		$subVersions = explode('.', $psVersion);
		$searchVersions = explode('.', $radixVersion);
		
		for ($i=0;$i<count($searchVersions);$i++) 
		{
			// compare each sub part of version
			if ($subVersions[$i] !== $searchVersions[$i]) 
				return false;
		}
		return true;
	}
	// ******************************************************************************************
	//
	//
	// Some other tools
	//
	//
	// ******************************************************************************************
	/**
	 * Check if a table exists in a db
	 */
	public function mysql_table_exists($table , $db) 
	{	
		// Change thanks to "sillage" from Prestashop forum contrib : http://www.prestashop.com/forums/topic/138519-module-gerer-les-inscrits-a-la-newsletter
		//$tables=mysql_list_tables($db); 
//		mysql_select_db($db);
		$tables = Db::getInstance()->executeS('SHOW TABLES');
		foreach($tables as $temp)
		{
			foreach ($temp as $key=>$value) 
			{
				if($value == $table) 
					return 1; 
			}
		}
		return 0; 
	}

}
?>