<?php

class AdminController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLogin()
	{
		$this->layout='/layouts/blank';
		$model=new LoginForm;
		if(Yii::app()->request->isAjaxRequest){
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(array('admin/index'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout() {
		Yii::app()->user->logout(false);
		$this->redirect(array('admin/login'));
	}

}