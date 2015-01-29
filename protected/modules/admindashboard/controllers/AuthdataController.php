<?php

class AuthdataController extends Controller
{
	public function actionIndex()
	{
		$authlist = AuthitemChild::Model()->findAll(array('order'=>"child"));
		$this->render('index', array("authlist"=>$authlist));
	}

	public function actionCreate()
	{
		if(Yii::app()->request->isPostRequest) {
			//prd($_POST);
			if(trim($_POST['Authitem']['name'])!='' && trim($_POST['parent'])!=''){
				$newAuth = new Authitem();
				$checkAuth = $newAuth->find("name = '".trim($_POST['Authitem']['name'])."'");
				if(count($checkAuth) == 0) {
					$newAuth->attributes = $_POST['Authitem'];
					//$newAuth->name = trim($_POST['Authitem']['name']);
					//$newAuth->description = trim($_POST['Authitem']['description']);
					$newAuth->type = "0";
					//$newAuth->bizrule = NULL;
					//$newAuth->data = NULL;
					$newAuth->isNewRecord = true;
					$newAuth->save(true);
				}
				
				$authRule = new AuthitemChild();
				$authRule->parent = trim($_POST['parent']);
				$authRule->child = $newAuth->name;
				$authRule->isNewRecord = true;
				$authRule->save(true);
			}
			$this->redirect(array("authdata/create"));
		}
		$roles = CHtml::listData(Authitem::Model()->findAll("type='2'"), "name", "name");
		//prd($roles);
		$this->render('create', array("roles"=>$roles));
	}

	public function actionDelete()
	{
		if(isset($_GET['id']) && $_GET['id']!="") {
			$delCriteria = new CDbCriteria();
			$delCriteria->condition = "child=:child";
			$delCriteria->params = array(":child"=>$_GET['id']);
			$authlist = AuthitemChild::Model()->find()->delete();
		}
		$this->redirect(array('authdata/index'));
	}
}