<?php
class WebUser extends CWebUser
{
	protected $_model;
	public $data;
	
	public function getRole(){
		//prd($this->getId());
		if ( $this->_model === null ) {
			 $this->_model = $this->loadUser( $this->getId() );
		}
		//print_r($this->_model->u_id); exit;
		return $this->_model->u_role;
	}
	
	public function isAdmin(){
    $user = $this->loadUser( $this->getId() );
    return ($user->u_role === 'admin');
  }
 
  // Load user model.
  protected function loadUser($id=null)
	{
			if($this->_model===null)
			{
					if($id!==null)
							$this->_model=Users::model()->findByPk($id);
			}
			return $this->_model;
	}
	
}