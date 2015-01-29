<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_subcategory_id'); ?>
		<?php echo $form->textField($model,'p_subcategory_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_supplier_id'); ?>
		<?php echo $form->textField($model,'p_supplier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_name'); ?>
		<?php echo $form->textField($model,'p_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_description'); ?>
		<?php echo $form->textArea($model,'p_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_sku'); ?>
		<?php echo $form->textField($model,'p_sku',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_manufacturer_id'); ?>
		<?php echo $form->textField($model,'p_manufacturer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_manufacturere_part_number'); ?>
		<?php echo $form->textField($model,'p_manufacturere_part_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_used'); ?>
		<?php echo $form->textField($model,'p_used',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_price'); ?>
		<?php echo $form->textField($model,'p_price',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_qty'); ?>
		<?php echo $form->textField($model,'p_qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_discount'); ?>
		<?php echo $form->textField($model,'p_discount',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_country'); ?>
		<?php echo $form->textField($model,'p_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_state'); ?>
		<?php echo $form->textField($model,'p_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_city'); ?>
		<?php echo $form->textField($model,'p_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_date_created'); ?>
		<?php echo $form->textField($model,'p_date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_date_updated'); ?>
		<?php echo $form->textField($model,'p_date_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_deleted'); ?>
		<?php echo $form->textField($model,'p_deleted',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->