<h1>Forgot Password</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgot-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
	'focus'=>'input[type=text]',
)); ?>

<div class="control-group">
  <?php echo $form->labelEx($model,'u_email',array('class'=>"control-label")); ?>
  <div class="controls">
  <?php echo $form->textField($model,'u_email');
  echo $form->error($model,'u_email'); ?>
  </div>
</div>

<div class="control-group">
  <label class="control-label">&nbsp;</label>
  <div class="controls">
  <?php echo CHtml::submitButton('Submit',array('class'=>"btn btn-primary"));
        
  ?>
  </div>
</div>

<?php $this->endWidget(); ?>
</div>