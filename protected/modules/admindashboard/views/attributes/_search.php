<?php
/* @var $this AttributesController */
/* @var $model Attributes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'a_id'); ?>
		<?php echo $form->textField($model,'a_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_name'); ?>
		<?php echo $form->textField($model,'a_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_selection'); ?>
		<?php echo $form->textField($model,'a_selection',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_date_created'); ?>
		<?php echo $form->textField($model,'a_date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_date_updated'); ?>
		<?php echo $form->textField($model,'a_date_updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->