<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->p_id,
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->p_id)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->p_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->p_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'p_id',
		'p_subcategory_id',
		'p_supplier_id',
		'p_name',
		'p_description',
		'p_sku',
		'p_manufacturer_id',
		'p_manufacturere_part_number',
		'p_used',
		'p_price',
		'p_qty',
		'p_discount',
		'p_country',
		'p_state',
		'p_city',
		'p_date_created',
		'p_date_updated',
		'p_deleted',
	),
)); ?>
