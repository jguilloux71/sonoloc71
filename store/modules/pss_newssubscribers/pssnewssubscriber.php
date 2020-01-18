<?php
class PssNewsSubscriber extends ObjectModel
{
	public 		$id;
	
	/** @var string email */
	public 		$email;
	
	/** @var datetime date subscription */
	public 		$newsletter_date_add;
	
	/** @var string IP */
	public 		$ip_registration_newsletter;
	
	
	
 	protected 	$fieldsRequired = array();
 	protected 	$fieldsSize = array('email' => 255);
 	protected 	$fieldsValidate = array('email' => 'isEmail');
	
	protected 	$table = 'newsletter';
	protected 	$identifier = 'id';

	public function getFields()
	{
		parent::validateFields();
		$fields['email'] = pSQL($this->email);
		$fields['newsletter_date_add'] = $this->newsletter_date_add;
		$fields['ip_registration_newsletter'] = $this->ip_registration_newsletter;
		return $fields;
	}
	
	/**
	 * Return available subscribers
	 * @return array 
	 */
	public static function getSubscribers()
	{
		$query = '
			SELECT *
			FROM `'._DB_PREFIX_.'newsletter` n
			ORDER BY `newsletter_date_add` DESC, `email`';
		$subscribers = Db::getInstance()->ExecuteS($query);
		return $subscribers;
	}
	/**
	 * Return available subscribers
	 * @return true or false
	 */
	public static function existsAsSubscriber($email)
	{
		$query = '
			SELECT *
			FROM `'._DB_PREFIX_."newsletter`
			WHERE `email`='".pSQL($email)."'";
		$results = Db::getInstance()->ExecuteS($query);
		
//		print_r($results);
//		echo'<br />';

		if (empty($results))
			return false;
		else
			return true;
	}
	/**
	 * Return available subscribers
	 * @return true or false
	 */
	public static function existsAsCustomer($email)
	{
		$query = '
			SELECT id_customer
			FROM `'._DB_PREFIX_."customer`
			WHERE `email`='".pSQL($email)."'";
		$results = Db::getInstance()->ExecuteS($query);
		
//		print_r($results);
//		echo'<br />';

		if (empty($results))
			return false;
		else
			return true;
	}
}


