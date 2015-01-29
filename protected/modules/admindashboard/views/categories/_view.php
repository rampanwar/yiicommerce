<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->c_id), array('view', 'id'=>$data->c_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_type')); ?>:</b>
	<?php echo CHtml::encode($data->c_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_name')); ?>:</b>
	<?php echo CHtml::encode($data->c_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_description')); ?>:</b>
	<?php echo CHtml::encode($data->c_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_parent_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->c_parent_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->c_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->c_date_updated); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('c_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->c_deleted); ?>
	<br />

	*/ ?>

</div>