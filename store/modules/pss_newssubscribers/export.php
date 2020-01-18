<?php
define('_PSS_NEWSSUBSCRIBERS_EXPORT_DEBUG_', false);

if (!_PSS_NEWSSUBSCRIBERS_EXPORT_DEBUG_)
{
	header('Content-Type: text/csv; charset=ISO-8859-1');
	header('Content-Disposition: attachment; filename="pss_news_subscribers_list.csv"'); 
}

// include Prestashop framework	
$path = explode('modules',dirname(__FILE__));
include($path[0].'config/config.inc.php');

// ------------------------------------------------------------------
// security check to avoid external calls for hacking purpose
//
// admin call should pass id employee and its pwd (as stored in DB)
$id_employee = intVal(Tools::getValue('id_employee'));
$passwd = Tools::getValue('pwd');
if (_PSS_NEWSSUBSCRIBERS_EXPORT_DEBUG_)
{
	echo '$id_employee : '.$id_employee.'<br />';
	echo '$passwd : '.$passwd.'<br />';
}
if ($id_employee==0 || Empty($passwd) || !Employee::checkPassword($id_employee, $passwd))
{
	die("What are you fucking doing here ???");
	exit();
}

// get parameters
$includeCustomersNewsletter = (intVal(Tools::getValue('includeCustomersNewsletter')) === 1 ? true : false);

// include the object class
include(_PS_MODULE_DIR_.'pss_newssubscribers/pssnewssubscriber.php');

// load subscribers
$subscribers = PssNewsSubscriber::getSubscribers();

// build an array with all emails to export
$emails = array();
foreach ($subscribers as $subscriber)
	$emails[] = $subscriber['email'];
	
// by option, load also customers that have subscribed to newsletter
if ($includeCustomersNewsletter)
{
	$query = 'SELECT email FROM `'._DB_PREFIX_.'customer` WHERE `newsletter`=1';
	$customersNewsletters = Db::getInstance()->ExecuteS($query);
	foreach ($customersNewsletters as $customersNewsletter)
		$emails[] = $customersNewsletter['email'];
}

// remove (not possible ?) doublons
$emails = array_unique($emails);

// export objects
$buffer = '';
if (count($emails)>0)
{
	foreach ($emails as $email)
	{
		$buffer .= $email;
		$buffer .= "\n";
	}
} 
else
	$buffer = 'nothing to export';
echo utf8_decode($buffer);

?>