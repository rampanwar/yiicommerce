<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Attributes'=>array('index'),
	$model->a_id,
);

$this->menu=array(
	array('label'=>'List Attributes', 'url'=>array('index')),
	array('label'=>'Create Attributes', 'url'=>array('create')),
	array('label'=>'Update Attributes', 'url'=>array('update', 'id'=>$model->a_id)),
	array('label'=>'Delete Attributes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->a_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Attributes', 'url'=>array('admin')),
);
?>

<h1>View Attributes #<?php echo $model->a_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'a_id',
		'a_name',
		'a_selection',
		'a_date_created',
		'a_date_updated',
	),
)); ?>
