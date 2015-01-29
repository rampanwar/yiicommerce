<?php

class AttributesController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Attributes;
		$data_model=0;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attributes']))
		{
			$model->attributes=$_POST['Attributes'];
			if($model->save()) {
				if($model->a_selection=='1' || $model->a_selection=='5')
					$this->redirect(array('attributes/admin'));
				else
					$this->redirect(array("attributedata/manage/id/".$model->a_id));
			}
		}
		
		$this->render('create',array(
			'model'=>$model, 'data_model'=>$data_model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$data_model=0;
		if(count($model) > 0){
			$data_model = AttributeData::Model()->count("ad_attribute_id='$id'");
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attributes']))
		{
			$model->attributes=$_POST['Attributes'];
			if($model->save()) {
				if($model->a_selection=='1' || $model->a_selection=='5'){
					AttributeData::Model()->deleteAll("ad_attribute_id='$id'");
					$this->redirect(array('attributes/admin'));
				}else{
					$this->redirect(array("attributedata/manage/id/".$model->a_id));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model, 'data_model'=>$data_model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Attributes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attributes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attributes']))
			$model->attributes=$_GET['Attributes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Attributes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Attributes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Attributes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attributes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
