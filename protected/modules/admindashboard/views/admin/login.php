<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
	'focus'=>array($model,'username')
)); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php echo $form->textField($model,'username');
		echo $form->error($model,'username'); ?>
    </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php echo $form->passwordField($model,'password');
		echo $form->error($model,'password'); ?>
		<p class="hint">
		</p>
    </div>
	</div>

	<div class="control-group">
		<div class="controls">
		<?php 
		echo $form->checkBox($model,'rememberMe',array('class'=>"pull-left"));
		echo '<span class="pull-left">&nbsp;</span>';
		echo $form->label($model,'rememberMe',array('class'=>"pull-left"));
		echo $form->error($model,'rememberMe'); ?>
    </div>
	</div>

	<div class="control-group">
  	<label class="control-label">&nbsp;</label>
		<div class="controls">
		<?php echo CHtml::submitButton('Login',array('class'=>"btn btn-primary")); ?>
    </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
