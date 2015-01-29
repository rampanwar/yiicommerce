<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */

$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	$model->sc_id=>array('view','id'=>$model->sc_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubCategories', 'url'=>array('index')),
	array('label'=>'Create SubCategories', 'url'=>array('create')),
	array('label'=>'View SubCategories', 'url'=>array('view', 'id'=>$model->sc_id)),
	array('label'=>'Manage SubCategories', 'url'=>array('admin')),
);
?>

<h1>Update SubCategories <?php echo $model->sc_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'parentCategories'=>$parentCategories)); ?>