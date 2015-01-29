<?php
/* @var $this AttributedataController */
/*
$this->breadcrumbs=array(
	'Attributedata'=>array('/admindashboard/attributedata'),
	'Manage',
);
*/
?>
<style type="text/css">
.data-row {
	width: 400px;
	margin-bottom: 10px;
}
.subDefault {
	margin: 8px 15px !important;
}
.subDelete {
	float: right;
	line-height: 30px;
	cursor: pointer;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		//'afterValidate'=>''
	),
	'id'=>'attributedata-form',
	'focus'=>array($model,'c_type'),
)); ?>

	<p class="note row-fluid required">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'ad_attribute_id',array('class'=>"formLabel")); ?>
    <div class="formData">
    <?php
			echo $attribute->a_name;
      echo $form->hiddenField($model,'ad_attribute_id',array('value'=>$id));
      echo $form->error($model,'ad_attribute_id'); ?>
		</div>
	</div>
	
	<div class="row-fluid">
		<?php echo $form->labelEx($model,'ad_value',array('class'=>"formLabel")); ?>
    <div id="data_div" class="formData">
		<?php
			$i = 0;
			while($i < count($data)){ ?>
			<div class="data-row">
			<?php
			echo $form->textField($model,'ad_value['.(isset($data[$i]) ? $data[$i]->ad_id : $i).']',array('value'=>(isset($data[$i]) ? $data[$i]->ad_value : ''),'size'=>60,'maxlength'=>255));
			echo $form->radioButton($model,'ad_is_default',array('id'=>'AttributeData_ad_value_'.(isset($data[$i]) ? $data[$i]->ad_id : $i).']', 'checked'=>(isset($data[$i]) && $data[$i]->ad_is_default=='1' ? 'checked' : ''), 'class'=>'subDefault', 'uncheckValue'=>NULL, 'value'=>(isset($data[$i]) ? $data[$i]->ad_id : $i)));
			echo CHtml::link('Delete','',array('class'=>'subDelete'));
			echo $form->hiddenField($model,'ad_delete['.(isset($data[$i]) ? $data[$i]->ad_id : $i).']',array('class'=>'ad_delete'));
			echo $form->error($model,'ad_value['.(isset($data[$i]) ? $data[$i]->ad_id : $i).']');
			?>
			</div>
			<?php
			$i++;
			};
		?>
		<div class="data-row"><?php echo CHtml::htmlButton('Add More',array('id'=>"add_data_row", 'style'=>"float: right;")); ?></div>
    </div>
	</div>
	
	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Save');
					echo CHtml::link("Cancel", $this->createUrl('attributes/admin'), array('class'=>'formCancel'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
var DATA_ROW = '<div class="data-row">\
	<input value="" size="60" maxlength="255" name="AttributeData[ad_value][COUNT]" id="AttributeData_ad_value_COUNT" type="text" />\
	<input class="subDefault" name="AttributeData[ad_is_default]" id="AttributeData_ad_is_default" value="1" type="radio" />\
	<a class="subDelete">Delete</a>\
	<input class="ad_delete" name="AttributeData[ad_delete][COUNT]" id="AttributeData_ad_delete_COUNT" type="hidden" value="0" />\
	<input class="ad_new" name="AttributeData[ad_new][COUNT]" id="AttributeData_ad_new_COUNT" type="hidden" value="1">\
</div>';
var DATA_COUNTER = 100001;
$(document).ready(function(){
	$('#add_data_row').click(function(){
		var temp_row = DATA_ROW.replace(/COUNT/g, DATA_COUNTER);
		$(this).parent().before(temp_row);
		DATA_COUNTER++;
	});
	$('#add_data_row').trigger('click');
	$(".subDelete").live('click', function(){
		if($(this).siblings('.ad_new').length > 0) {
			$(this).parent().slideUp('slow', function(){
				$(this).remove();
			});
		} else {
			$(this).parent().slideUp('slow');
			$(this).siblings('.ad_delete').val('1');
		}
	});
});
</script>