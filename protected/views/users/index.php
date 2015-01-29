<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'Users',
);
?>
<h4>Personal Information</h4>
<div class="row-fluid">
  <div class="form">
  <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'account-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
      'class'=>"form-horizontal",
    ),
    'focus'=>array($model,'u_email')
  )); ?>
  <?php if($model->u_type=='0') { ?>
    <div class="control-group individual">
      <?php echo CHtml::label('First Name','Users_u_fname',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textField($model,'u_fname',array('placeholder'=>"First Name"));
      echo $form->error($model,'u_fname'); ?>
      </div>
    </div>
    <div class="control-group individual">
      <?php echo $form->labelEx($model,'u_lname',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textField($model,'u_lname',array('placeholder'=>"Last Name"));
      echo $form->error($model,'u_lname'); ?>
      </div>
    </div>
    <div class="control-group individual">
      <?php echo $form->labelEx($model,'u_gender',array('class'=>"control-label")); ?>
      <div class="controls">
      <div class="radioList">
      <?php
      echo $form->radioButtonList($model,'u_gender',array('1'=>'Male', '2'=>'Female', '3'=>'Other'),array('separator'=>'&nbsp; ', 'labelOptions'=>array()));
      echo $form->error($model,'u_gender'); ?>
      </div>
      </div>
    </div>
    <?php } else if($model->type=='1') { ?>
    <div class="control-group organization" style="display: none;">
      <?php echo $form->labelEx($model,'u_organization_name',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textField($model,'u_organization_name');
      echo $form->error($model,'u_organization_name'); ?>
      </div>
    </div>
  <?php } ?>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_pphone',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      //echo CHtml::dropDownList('country','',$countries,array('prompt'=>'Select Country', 'style'=>"width:120px;"));
      //echo CHtml::textField('dialCode','',array('disabled'=>'disabled', 'style'=>"width:40px;"));
      echo $form->textField($model,'u_pphone');
      echo $form->error($model,'u_pphone'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_address_main',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textArea($model,'u_address_main');
      echo $form->error($model,'u_address_main'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_main_landmark',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textField($model,'u_main_landmark');
      echo $form->error($model,'u_main_landmark'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_main_country',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->dropDownList($model,'u_main_country',$countries,array('prompt'=>'Select Country', 'style'=>"width:220px;"));
      echo $form->error($model,'u_main_country'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_main_state',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->dropDownList($model,'u_main_state',$states,array('prompt'=>'Select State', 'style'=>"width:220px;"));
      echo $form->error($model,'u_main_state'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_main_city',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->dropDownList($model,'u_main_city',$cities,array('prompt'=>'Select City', 'style'=>"width:220px;"));
      echo $form->error($model,'u_main_city'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model,'u_main_pin',array('class'=>"control-label")); ?>
      <div class="controls">
      <?php
      echo $form->textField($model,'u_main_pin');
      echo $form->error($model,'u_main_pin'); ?>
      </div>
    </div>
    <div class="control-group buttons">
      <label class="control-label">&nbsp;</label>
      <div class="controls">
      <?php echo CHtml::submitButton('Update', array('class'=>"btn btn-primary")); ?>
      </div>
    </div>
  
  <?php $this->endWidget(); ?>
  </div>
  
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#Users_u_main_country").change(function(){
		var country_id = $(this).val();
		$("#Users_u_main_state").html('<option value="">Select State</option>');
		$("#Users_u_main_city").html('<option value="">Select City</option>');
		$.ajax({
			url: baseUrl+'/users/autocomplete',
			data: {req_type: 0, main_id:country_id},
			type: "POST",
			dataType: "JSON",
			success: function(return_data){
				if(return_data.error==0){
					var opt_array = ['<option value="">Select State</option>'];
					for(var i in return_data.data){
						opt_array.push('<option value="'+i+'">'+return_data.data[i]+'</option>');
					}
					$("#Users_u_main_state").html(opt_array.join(" "));
				}
			},
			error: function(){
			}
			});
	});
  $("#Users_u_main_state").change(function(){
		var state_id = $(this).val();
		$("#Users_u_main_city").html('<option value="">Select City</option>');
		$.ajax({
			url: baseUrl+'/users/autocomplete',
			data: {req_type: 1, main_id:state_id},
			type: "POST",
			dataType: "JSON",
			success: function(return_data){
				if(return_data.error==0){
					var opt_array = ['<option value="">Select City</option>'];
					for(var i in return_data.data){
						opt_array.push('<option value="'+i+'">'+return_data.data[i]+'</option>');
					}
					$("#Users_u_main_city").html(opt_array.join(" "));
				}
			},
			error: function(){
			}
			});
	});
  /*
	$("#country").change(function(){
		var temp = this.value;
		if(temp)
		temp = '+'+dialCode[temp];
		else
		temp="";
		$("#dialCode").val(temp);
	});
	*/
});
//var dialCode = {};
<?php 
//foreach($countryData as $country){
//echo 'dialCode['.$country->countryID.'] = '.$country->dialCode.';';
//}
?>
</script>