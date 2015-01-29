<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */

$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	$model->sc_id,
);

$this->menu=array(
	array('label'=>'List SubCategories', 'url'=>array('index')),
	array('label'=>'Create SubCategories', 'url'=>array('create')),
	array('label'=>'Update SubCategories', 'url'=>array('update', 'id'=>$model->sc_id)),
	array('label'=>'Delete SubCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sc_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubCategories', 'url'=>array('admin')),
);
?>

<h1>View SubCategories #<?php echo $model->sc_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sc_id',
		'sc_name',
		'sc_description',
		'sc_category_id',
		'sc_date_created',
		'sc_date_updated',
	),
)); ?>
