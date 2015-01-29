<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row-fluid">
		<?php //echo $form->label($model,'c_id',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php //echo $form->textField($model,'c_id'); ?>
		</div>
	</div>-->

	<div class="row-fluid">
		<?php echo $form->label($model,'c_type',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_type',array('size'=>1,'maxlength'=>1)); ?>
		</div>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'c_name',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_name',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'c_description',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textArea($model,'c_description',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'c_parent_category_id',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_parent_category_id'); ?>
		</div>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'c_date_created',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_date_created'); ?>
		</div>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'c_date_updated',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_date_updated'); ?>
		</div>
	</div>

	<!--<div class="row-fluid">
		<?php //echo $form->label($model,'c_deleted',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php //echo $form->textField($model,'c_deleted',array('size'=>1,'maxlength'=>1)); ?>
		</div>
	</div>-->

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->