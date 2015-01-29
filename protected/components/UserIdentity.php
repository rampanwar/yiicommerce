<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_role;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$record = array();
		if($this->username!="" && $this->password!=""){
			$record = Users::Model()->findByAttributes(array("u_email"=>$this->username), "u_deleted='0'");
			if(!empty($record)){
				$this->password = md5($this->password.$record->u_salt);
				//pr($record->u_pass);
				//pr($this->password);
			}
			//exit;
		}
		if(empty($record) || !isset($record->u_email))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($record->u_pass!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_role = $record->u_role;
			$this->_id = $record->u_id;
			$this->username = $record->user_name;
			$this->setState('user_name', $record->user_name);
			$this->setState('role', $record->u_role);
			$this->errorCode=self::ERROR_NONE;
		}
		//prd($this->errorCode);
		return !$this->errorCode;
	}
	public function getId(){
		return $this->_id;
	}	
	
	public function getRole(){
		return $this->_role;
	}
}