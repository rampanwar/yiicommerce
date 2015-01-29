<?php

class AdmindashboardModule extends CWebModule
{
	public function init()
	{
		parent::init();
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admindashboard.models.*',
			'admindashboard.components.*',
		));
		$this->setComponents(array(
			'errorHandler' => array(
				'errorAction' => Yii::app()->createUrl($this->id.'/site/error'),
			),
			'user' => array(
				'allowAutoLogin'=>true,
				'class' => 'admindashboard.components.AdminUser',
				'loginUrl' => Yii::app()->createUrl($this->id.'/admin/login'),
			),
		));
		Yii::app()->theme = "admin";
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action)){
			// this method is called before any module controller action is performed
			// you may place customized code here
			
			$operation = ucfirst(strtolower($this->getId())) . ucfirst(strtolower($controller->getId())) . ucfirst(strtolower($action->getId()));
			//echo $operation; exit;
			//echo 'access : ';var_dump(Yii::app()->user->checkAccess($operation)); exit;
			if(!Yii::app()->user->checkAccess($operation)){
				if(Yii::app()->request->isAjaxRequest){
					prd("access_denied");
				}else{
					if(Yii::app()->user->isGuest){
						Yii::app()->request->redirect($this->user->loginUrl);
					}else{
						Yii::app()->request->redirect(BASE_PATH);
					}
				}
				Yii::app()->end();
			}else{
				
			}
			return true;
		}
		else{
			return false;
		}
	}
}