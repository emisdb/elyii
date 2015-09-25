<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $linky;
//	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email', 'required'),
			array('subject, body, linky', 'safe'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
//			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
//			array('verifyCode', 'captcha', 'allowEmpty'=>'yes'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Имя',
			'email'=>'E-mail',
			'subject'=>'телефон',
			'body'=>'Комментарий',
			'linky'=>'Ссылка',
//			'verifyCode'=>'Verification gg Code',
		);
	}
}