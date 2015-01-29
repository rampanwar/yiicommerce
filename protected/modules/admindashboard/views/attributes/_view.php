<?php
/* @var $this AttributesController */
/* @var $data Attributes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->a_id), array('view', 'id'=>$data->a_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_name')); ?>:</b>
	<?php echo CHtml::encode($data->a_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_selection')); ?>:</b>
	<?php echo CHtml::encode($data->a_selection); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->a_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->a_date_updated); ?>
	<br />


</div>