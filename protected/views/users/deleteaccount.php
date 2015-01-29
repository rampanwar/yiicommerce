<h4>Delete account</h4>

<div class="alert alert-info">Your account will be deactivated and later you can request to recover your account.</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delete-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
	'focus'=>array($model, 'u_pass'),
)); ?>

<div class="control-group">
  <?php echo $form->labelEx($model,'u_email',array('class'=>"control-label")); ?>
  <div class="controls">
  <?php echo $form->textField($model,'u_email',array('disabled'=>"disabled", 'readonly'=>"readonly", 'style'=>"cursor:default; border-color:transparent; background-color:transparent; outline:none; box-shadow:none; padding-left:0;"));
  echo $form->error($model,'u_email'); ?>
  </div>
</div>

<div class="control-group">
  <?php echo $form->labelEx($model,'u_pass',array('class'=>"control-label")); ?>
  <div class="controls">
  <?php echo CHtml::passwordField('Users[u_pass]','',array());
  echo $form->error($model,'u_pass'); ?>
  <div class="cclear"></div>
  <div class="label" style="margin-top: 8px;">Enter your password for confirmation.</div>
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