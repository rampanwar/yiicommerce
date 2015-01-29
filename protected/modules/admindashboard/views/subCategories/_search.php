<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sc_id'); ?>
		<?php echo $form->textField($model,'sc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_name'); ?>
		<?php echo $form->textField($model,'sc_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_description'); ?>
		<?php echo $form->textArea($model,'sc_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_category_id'); ?>
		<?php echo $form->textField($model,'sc_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_date_created'); ?>
		<?php echo $form->textField($model,'sc_date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_date_updated'); ?>
		<?php echo $form->textField($model,'sc_date_updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->