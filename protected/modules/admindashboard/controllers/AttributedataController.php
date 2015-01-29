<?php

class AttributedataController extends Controller
{
	public $defaultAction = "manage";
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
	// return the filter configuration for this controller, e.g.:
	return array(
		'inlineFilterName',
		array(
			'class'=>'path.to.FilterClass',
			'propertyName'=>'propertyValue',
		),
	);
	*/
	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionManage($id)
	{
		if($id > 0) {
			$model=new AttributeData;
			if(isset($_POST['AttributeData']))
			{
				$AttributeData = $_POST['AttributeData'];
				//prd($AttributeData);
				foreach($AttributeData['ad_value'] as $key=>$dataVal) {
					$check = AttributeData::Model()->find("ad_attribute_id=".$AttributeData['ad_attribute_id']." AND ad_value='".$dataVal."'");
					if(count($check)==0) {
						$model=new AttributeData();
						$model->attributes=$_POST['AttributeData'];
						//prd($_POST['AttributeData']);
						//$model->ad_attribute_id = $AttributeData['ad_attribute_id'];
						$model->ad_value = $dataVal;
						$model->ad_is_default = (isset($AttributeData['ad_is_default']) && $key == $AttributeData['ad_is_default'] ? '1' : '0');
						if($AttributeData['ad_delete'][$key]=='1') {
							$model->deleteByPk($key);
						} else if(trim($AttributeData['ad_value'][$key])!="") {
							if($key > 100000 && $AttributeData['ad_new'][$key]=='1') {
								$model->ad_id = NULL;
								$model->isNewRecord = true;
							} else {
								$model->ad_id = $key;
								$model->isNewRecord = false;
							}
							$model->save(false);
						}
						//prd($model->attributes);
						$model->primaryKey = NULL;
					}
				}
				//exit;
				$this->redirect(array("attributes/admin"));
			}
			$attribute=Attributes::Model()->findByPk($id);
			$data = $model->findAll("ad_attribute_id='$id'");
			$this->render('manage', array(
				'attribute'=>$attribute, 'id'=>$id, 'model'=>$model, 'data'=>$data,
			));
		} else {
			$this->redirect(array('attributes/admin'));
		}
	}
}