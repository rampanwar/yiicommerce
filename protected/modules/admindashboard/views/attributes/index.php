<?php
/* @var $this AttributesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attributes',
);

$this->menu=array(
	array('label'=>'Create Attributes', 'url'=>array('create')),
	array('label'=>'Manage Attributes', 'url'=>array('admin')),
);
?>

<h1>Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
