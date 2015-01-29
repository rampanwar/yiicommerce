<?php
/* @var $this SubCategoriesController */
/* @var $data SubCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sc_id), array('view', 'id'=>$data->sc_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_name')); ?>:</b>
	<?php echo CHtml::encode($data->sc_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_description')); ?>:</b>
	<?php echo CHtml::encode($data->sc_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->sc_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->sc_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->sc_date_updated); ?>
	<br />


</div>