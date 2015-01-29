<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		//'afterValidate'=>''
	),
	'focus'=>array($model,'c_type'),
)); ?>

	<p class="note row-fluid required">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'c_type',array('class'=>"formLabel")); ?>
    <div class="formData radioList">
		<?php echo $form->radioButtonList($model,'c_type',array('0'=>"Parent",'1'=>"Sub"),array('separator'=>'&nbsp; ', 'labelOptions'=>array())); ?>
		<?php echo $form->error($model,'c_type'); ?>
    </div>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'c_name',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textField($model,'c_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'c_name'); ?>
    </div>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'c_description',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->textArea($model,'c_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'c_description'); ?>
    </div>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'c_parent_category_id',array('class'=>"formLabel")); ?>
    <div class="formData">
		<?php echo $form->dropDownList($model,'c_parent_category_id',$parentCategories,array('prompt'=>"Select Parent Category")); ?>
		<?php echo $form->error($model,'c_parent_category_id'); ?>
    </div>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
					echo CHtml::link("Cancel", $this->createUrl('categories/admin'), array('class'=>'formCancel'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->