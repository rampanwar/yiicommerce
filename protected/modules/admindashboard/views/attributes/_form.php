<?php
/* @var $this AttributesController */
/* @var $model Attributes */
/* @var $form CActiveForm */
?>

<div class="form">
<?php echo CHtml::hiddenField('ad_count',$data_model); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attributes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'afterValidate'=>'js:showWarning',
	),
	'focus'=>array($model, 'a_name'),
)); ?>

	<p class="note row-fluid required">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'a_name',array('class'=>"formLabel")); ?>
    <div class="formData radioList">
		<?php echo $form->textField($model,'a_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'a_name'); ?>
    </div>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'a_selection',array('class'=>"formLabel")); ?>
    <div class="formData radioList">
		<?php echo $form->dropDownList($model,'a_selection',array('1'=>"Text-Box", '2'=>"Radio-Button", '3'=>"Check-Box", '4'=>"Drop-Down", '5'=>"Description-Box"),array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'a_selection'); ?>
    </div>
	</div>
	<?php 
	if($model->a_id > 0) { ?>
	<div id="manage_data_link" class="row-fluid" style="margin: 10px 0; <?php echo ($model->a_selection=="1" || $model->a_selection=="5" ? 'display:none;' : ''); ?>"><?php echo CHtml::link("Manage Data", $this->createUrl('attributedata/manage/id/'.$model->a_id), array('class'=>'formCancel')); ?></div>
  <?php } ?>
  
	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
					echo CHtml::link("Cancel", $this->createUrl('attributes/admin'), array('class'=>'formCancel'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
	$("#Attributes_a_selection").change(function(){
		if($(this).val()=='1' || $(this).val()=='5')
			$("#manage_data_link").hide();
		else
			$("#manage_data_link").show();
	});
	
});
function showWarning(){
	if(( $("#Attributes_a_selection").val()=='1' || $("#Attributes_a_selection").val()=='5' ) && $("#ad_count").val() > 0) {
		return confirm("All data related to this attribute will be deleted.");
	}
	return true;
}
</script>