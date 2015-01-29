<?php
class PasswordReset extends CFormModel
{
	public $u_pass_old = '';
	public $u_pass = '';
	public $u_pass_confirm = '';
	public $captcha_code = '';
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_pass_old', 'required', 'on'=>'change_password'),
			
			array('u_pass, u_pass_confirm', 'length', 'max'=>20, 'min'=>8),
			array('u_pass, u_pass_confirm', 'required'),
			array('u_pass_confirm', 'compare', 'compareAttribute'=>'u_pass'),
			array('u_pass, u_pass_confirm', 'match', 'pattern'=>"/(?=.*\d)(?=.*[A-z]).{8,}/", 'message'=>"Password must contain atleast 1 numeber, 1 upper case and one lower case letter."),
			
			array('captcha_code', 'required', 'on'=>'change_password'),
			array('captcha_code', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'change_password'),
			//array('captcha_code', 'required', 'on'=>'register'),
			//array('captcha_code', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	public function attributeLabels()
	{
		return array(
			'u_pass_old' => 'Current Password',
			'u_pass' => 'New Password',
			'u_pass_confirm' => 'Confirm Password',
		);
	}
}