<h4>Update Password</h4>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reset-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
	'focus'=>array($model,'u_pass_old'),
));
?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'u_pass_old',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
		echo $form->passwordField($model,'u_pass_old');
		echo $form->error($model,'u_pass_old'); ?>
		<p class="hint">
		</p>
    </div>
	</div>
	
  <div class="control-group">
		<?php echo $form->labelEx($model,'u_pass',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
		echo $form->passwordField($model,'u_pass');
		echo $form->error($model,'u_pass'); ?>
		<p class="hint">
		</p>
    </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'u_pass_confirm',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo $form->passwordField($model,'u_pass_confirm');
		echo $form->error($model,'u_pass_confirm'); ?>
    </div>
	</div>
	<?php
  if(CCaptcha::checkRequirements()){ ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'captcha_code',array('class'=>"control-label")); ?>
		<div class="controls">
    <?php
		$this->widget('CCaptcha');
		echo '<br />';
		echo $form->textField($model,'captcha_code');
		echo $form->error($model,'captcha_code'); ?>
    </div>
	</div>
	<?php } ?>

<div class="control-group">
  <label class="control-label">&nbsp;</label>
  <div class="controls">
  <?php echo CHtml::submitButton('Submit',array('class'=>"btn btn-primary"));
        
  ?>
</div>

<?php $this->endWidget(); ?>
</div>