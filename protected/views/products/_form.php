<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'p_subcategory_id'); ?>
		<?php echo $form->textField($model,'p_subcategory_id'); ?>
		<?php echo $form->error($model,'p_subcategory_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_supplier_id'); ?>
		<?php echo $form->textField($model,'p_supplier_id'); ?>
		<?php echo $form->error($model,'p_supplier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_name'); ?>
		<?php echo $form->textField($model,'p_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'p_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_description'); ?>
		<?php echo $form->textArea($model,'p_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_sku'); ?>
		<?php echo $form->textField($model,'p_sku',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'p_sku'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_manufacturer_id'); ?>
		<?php echo $form->textField($model,'p_manufacturer_id'); ?>
		<?php echo $form->error($model,'p_manufacturer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_manufacturere_part_number'); ?>
		<?php echo $form->textField($model,'p_manufacturere_part_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'p_manufacturere_part_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_used'); ?>
		<?php echo $form->textField($model,'p_used',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'p_used'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_price'); ?>
		<?php echo $form->textField($model,'p_price',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'p_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_qty'); ?>
		<?php echo $form->textField($model,'p_qty'); ?>
		<?php echo $form->error($model,'p_qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_discount'); ?>
		<?php echo $form->textField($model,'p_discount',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'p_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_country'); ?>
		<?php echo $form->textField($model,'p_country'); ?>
		<?php echo $form->error($model,'p_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_state'); ?>
		<?php echo $form->textField($model,'p_state'); ?>
		<?php echo $form->error($model,'p_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_city'); ?>
		<?php echo $form->textField($model,'p_city'); ?>
		<?php echo $form->error($model,'p_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_date_created'); ?>
		<?php echo $form->textField($model,'p_date_created'); ?>
		<?php echo $form->error($model,'p_date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_date_updated'); ?>
		<?php echo $form->textField($model,'p_date_updated'); ?>
		<?php echo $form->error($model,'p_date_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_deleted'); ?>
		<?php echo $form->textField($model,'p_deleted',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'p_deleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->