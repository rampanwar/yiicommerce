<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->p_id), array('view', 'id'=>$data->p_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_subcategory_id')); ?>:</b>
	<?php echo CHtml::encode($data->p_subcategory_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_supplier_id')); ?>:</b>
	<?php echo CHtml::encode($data->p_supplier_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_name')); ?>:</b>
	<?php echo CHtml::encode($data->p_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_description')); ?>:</b>
	<?php echo CHtml::encode($data->p_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_sku')); ?>:</b>
	<?php echo CHtml::encode($data->p_sku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_manufacturer_id')); ?>:</b>
	<?php echo CHtml::encode($data->p_manufacturer_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('p_manufacturere_part_number')); ?>:</b>
	<?php echo CHtml::encode($data->p_manufacturere_part_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_used')); ?>:</b>
	<?php echo CHtml::encode($data->p_used); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_price')); ?>:</b>
	<?php echo CHtml::encode($data->p_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_qty')); ?>:</b>
	<?php echo CHtml::encode($data->p_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_discount')); ?>:</b>
	<?php echo CHtml::encode($data->p_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_country')); ?>:</b>
	<?php echo CHtml::encode($data->p_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_state')); ?>:</b>
	<?php echo CHtml::encode($data->p_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_city')); ?>:</b>
	<?php echo CHtml::encode($data->p_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->p_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->p_date_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->p_deleted); ?>
	<br />

	*/ ?>

</div>