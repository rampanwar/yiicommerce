<?php
class Controller extends CController
{
	public $TIME_STAMP = "";
	public $layout='/layouts/main';
	public $menu=array();
	public $breadcrumbs=array();
	
	public function init(){
		$this->TIME_STAMP = date("Y-m-d H:i:s");
		
		$this->initUser();
		
		parent::init();
	}
	protected function initUser(){
		if(!Yii::app()->user->isGuest){
			$currentUser = Users::Model()->findByPk(Yii::app()->user->id);
			Yii::app()->user->name = $currentUser->user_name;
		}
	}
}