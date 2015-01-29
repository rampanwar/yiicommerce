<?php
/* @var $this AuthdataController */
/*
$this->breadcrumbs=array(
	'Authdata'=>array('/admindashboard/authdata'),
	'Create',
);
*/
?>
<h1>AuthData Add</h1>
<?php 
$model = new Authitem();
$form = $this->beginWidget('CActiveForm', array(
	'focus'=>array($model,'name'),
));
?>
<div class="row-fluid">
	<label>name</label><?php echo $form->textField($model, "name"); ?>
</div>
<div class="row-fluid">
	<label>parent</label><?php echo CHtml::dropDownList("parent", "admin", $roles); ?>
</div>
<div class="row-fluid">
	<label>description</label><?php echo $form->textArea($model, "description"); ?>
</div>
<div class="row-fluid">
<?php
	echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
	echo '&nbsp;&nbsp;';
	echo CHtml::link("Cancel", $this->createUrl("authdata/index"));
?>
</div>
<?php $this->endWidget(); ?>