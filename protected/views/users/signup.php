<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
	'Signup',
);
?>

<h1>Signup</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
	'focus'=>array($model,'u_email')
)); ?>

	<p class="note required">Fields with <span class="required">*</span> are required.</p>

	<div class="control-group">
		<?php echo $form->labelEx($model,'u_email',array('class'=>"control-label")); ?>
		<div class="controls">
			<?php echo $form->textField($model,'u_email');
      echo $form->error($model,'u_email'); ?>
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

	<div class="control-group">
		<?php echo $form->labelEx($model,'u_role',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo $form->dropDownList($model,'u_type',array('0'=>'Individual', '1'=>'Organization'), array());
		echo $form->error($model,'u_type'); ?>
		<br /><br />
    <div class="radioList">
		<?php
		echo $form->radioButtonList($model,'u_role',array('buyer'=>'Buyer', 'supplier'=>'Supplier/Buyer'),array('separator'=>'&nbsp; ', 'labelOptions'=>array()));
		echo $form->error($model,'u_role'); ?>
    <br />
    <span class="label label-info"></span>
    </div>
    </div>
	</div>

<hr class="soften">
<br />

	<div class="control-group individual">
		<?php echo $form->labelEx($model,'u_fname',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo $form->textField($model,'u_fname',array('placeholder'=>"First Name"));
		echo $form->textField($model,'u_lname',array('placeholder'=>"Last Name"));
		echo $form->error($model,'u_fname'); ?>
    </div>
	</div>
	<div class="control-group individual">
		<?php echo $form->labelEx($model,'u_gender',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo $form->radioButtonList($model,'u_gender',array('1'=>'Male', '2'=>'Female', '3'=>'Other'), array('separator'=>'&nbsp; ', 'labelOptions'=>array('style'=>'display: inline; margin-right: 10px; font-weight: normal;')));
		echo $form->error($model,'u_gender'); ?>
    </div>
	</div>
  
	<div class="control-group organization" style="display: none;">
		<?php echo $form->labelEx($model,'u_organization_name',array('class'=>"control-label")); ?>
		<div class="controls">
    <?php
		echo $form->textField($model,'u_organization_name');
		echo $form->error($model,'u_organization_name'); ?>
    </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'u_pphone',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo CHtml::dropDownList('country','',$countries,array('prompt'=>'Select Country', 'style'=>"width:120px;"));
		echo CHtml::textField('dialCode','',array('disabled'=>'disabled', 'style'=>"width:40px;"));
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
		echo $form->dropDownList($model,'u_main_state',array(),array('prompt'=>'Select State', 'style'=>"width:220px;"));
		echo $form->error($model,'u_main_state'); ?>
    </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'u_main_city',array('class'=>"control-label")); ?>
		<div class="controls">
		<?php
    echo $form->dropDownList($model,'u_main_city',array(),array('prompt'=>'Select City', 'style'=>"width:220px;"));
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

	<div class="control-group buttons">
  	<label class="control-label">&nbsp;</label>
    <div class="controls">
		<?php echo CHtml::submitButton('Create Account', array('class'=>"btn btn-primary")); ?>
    </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
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
  $("#Users_u_type").change(function(){
		if($(this).val()=='0'){
			$(".organization").hide();
			$(".individual").show();
		}else if($(this).val()=='1'){
			$(".organization").show();
			$(".individual").hide();
		}
	});
  $("#country").change(function(){
		var temp = this.value;
		if(temp)
		temp = '+'+dialCode[temp];
		else
		temp="";
		$("#dialCode").val(temp);
	});
});
var dialCode = {};
<?php 
foreach($countryData as $country){
echo 'dialCode['.$country->countryID.'] = '.$country->dialCode.';';
}
?>

</script>