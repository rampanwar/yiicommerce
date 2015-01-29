<?php
class Controller extends CController
{
	public $TIME_STAMP = "";
	public $layout='//layouts/main';
	public $menu=array();
	public $breadcrumbs=array();
	public $adminEmail = "admin@ecomm.com";
	
	public function init(){
		$this->TIME_STAMP = date('Y-m-d H:i:s');
		$this->initUser();
		parent::init();
	}
	
	public function beforeAction($action){
		$operation = ucfirst(strtolower($this->getId())) . ucfirst(strtolower($this->getAction()->getId()));
		if(isset($this->module)){
		//prd($this->module->id);
			$operation = ucfirst(strtolower($this->module->id)) . $operation;
		}
		//echo $operation; exit;
		//echo 'access : ';var_dump(Yii::app()->user->checkAccess($operation)); exit;
		if(!Yii::app()->user->checkAccess($operation)){
			if(Yii::app()->request->isAjaxRequest){
				prd("access_denied");
			}else{
				if(isset($this->module)){
					if(Yii::app()->user->isGuest){
						$this->redirect(Yii::app()->getModule('admindashboard')->user->loginUrl);
					}else{
						$this->redirect(BASE_PATH);
					}
				}else{
					$this->redirect(BASE_PATH);
				}
			}
			Yii::app()->end();
		}else{
			
		}
		
		return parent::beforeAction($this->getAction());
	}
	
	protected function initUser(){
		if(!Yii::app()->user->isGuest){
			$currentUser = Users::Model()->findByPk(Yii::app()->user->id);
			Yii::app()->user->name = $currentUser->user_name;
			Yii::app()->user->data = $currentUser->attributes;
		}
	}
	public function encodeUser($user){
		//prd(md5($user->u_id));
		return md5($user->u_id);
	}
	
	public function random($l){
		$code='';
		$arr = array('a','b','c','d','e','f','g','h','i','j','k',  'm','n',  'p','q','r','s','t','u','v','w','x','y','z',  '1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H',  'J','K','L','M','N',  'P','Q','R','S','T','U','V','W','X','Y','Z');
		//pr(count($arr));
		for($i=0;$i<$l;$i++){
			$a = rand(0,56);
			$code.= $arr[$a];
		}
		return $code;
	}
}