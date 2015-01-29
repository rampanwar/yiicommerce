<?php
class AdminUser extends CWebUser
{
	protected $_model;
	
	public function getRole(){
		//prd($this->getId());
		if ( $this->_model === null ) {
			 $this->_model = Users::model()->findByPk( $this->getId() );
		}
		//print_r($this->_model->u_id); exit;
		return $this->_model->u_role;
	}
	
}