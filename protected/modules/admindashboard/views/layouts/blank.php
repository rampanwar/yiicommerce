<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo CHtml::encode(Yii::app()->name); ?> - Admin Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  $cs = Yii::app()->getClientScript()
  ->registerCssFile(THEME_PATH.'/css/base.css')
  ->registerCssFile(THEME_PATH.'/css/bootstrap.min.css')
  ->registerCssFile(CSS_PATH.'/custom.css')
  ->registerScriptFile(THEME_PATH.'/js/bootstrap.min.js', CClientScript::POS_END)
  ;
  ?>
</head>

<body>
<br>
<div id="mainBody">
  <div class="container">
  <?php echo $content; ?>
  </div>
</div>
<div id="footerSection">
	<div class="container">
  	<div class="row">
    2012 - 2013 © Free Bootstrappage Admin. Brought to you by <a id="poweredBy" href="http://www.bootstrappage.com" target="_blank" title="Free Admin template design and developments"> Free bootstrappage admin template</a>
    </div>
  </div>
</div>
</body>
</html>