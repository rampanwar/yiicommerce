<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Attributes', 'url'=>array('index')),
	array('label'=>'Manage Attributes', 'url'=>array('admin')),
);
?>

<h1>Create Attributes</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'data_model'=>$data_model)); ?>