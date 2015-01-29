<?php

?>
<?php $this->widget('zii.widgets.CMenu',array(
	'htmlOptions'=>array('id'=>"topMenu", 'class'=>"nav pull-right"),
	'items'=>array(
		array('label'=>'Home', 'url'=>BASE_PATH),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
		array('label'=>'Login', 'url'=>array('/users/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'), 'visible'=>!Yii::app()->user->isGuest)
	),
)); ?>
