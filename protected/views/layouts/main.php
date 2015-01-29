<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php
	Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_HEAD)->registerCoreScript('yiiactiveform');
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(THEME_PATH.'/css/base.css')
  ->registerCssFile(THEME_PATH.'/css/bootstrap.min.css')
  ->registerCssFile(THEME_PATH.'/css/bootstrap-responsive.css')
  ->registerCssFile(THEME_PATH.'/css/font-awesome.css')
  ->registerCssFile(THEME_PATH.'/css/prettify.css')
  ->registerCssFile(CSS_PATH.'/custom.css')
  ->registerScriptFile(THEME_PATH.'/js/bootstrap.min.js', CClientScript::POS_END)
  ;
  ?>
<script type="text/javascript">
var baseUrl = "<?php echo BASE_PATH; ?>";
</script>
</head>

<body>
<?php
	echo $this->beginContent("/layouts/header");
	$this->endContent();
	//echo $this->beginContent("/layouts/menu");
	//$this->endContent();
?>
	<?php if(isset($this->breadcrumbs)):
	//	$this->widget('zii.widgets.CBreadcrumbs', array(
	//		'links'=>$this->breadcrumbs,
	//	));
	endif?>

<div id="mainBody">
	<div class="container">
	<?php echo $content; ?>
  </div>
</div>

<?php
	echo $this->beginContent("/layouts/footer");
	$this->endContent();
?>
</body>
</html>