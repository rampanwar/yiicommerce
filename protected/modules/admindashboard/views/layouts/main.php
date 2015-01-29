<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_HEAD)->registerCoreScript('yiiactiveform');
  $cs = Yii::app()->getClientScript()
  ->registerLinkTag("stylesheet/less", "text/css", ADMIN_THEME.'/themes/less/bootstrap.less')
  ->registerScriptFile(ADMIN_THEME.'/themes/js/less/less.js')
  ->registerLinkTag("stylesheet/less", "text/css", ADMIN_THEME.'/themes/style/fullcalendar.css')
  ->registerLinkTag("stylesheet/less", "text/css", ADMIN_THEME.'/themes/style/delta.main.css')
  ->registerLinkTag("stylesheet/less", "text/css", ADMIN_THEME.'/themes/style/delta.grey.css')
  ->registerCssFile(CSS_PATH.'/custom.css')
  ;
  //prd($cs);
  ?>
<script type="text/javascript">
var baseUrl = "<?php echo BASE_PATH.'/'.$this->module->getId(); ?>";
</script>
</head>
<body>
<br>
<?php
echo $this->beginContent("/layouts/menu");
$this->endContent();
?>
<div id="mainBody">
<?php
echo $this->beginContent("/layouts/header");
$this->endContent();
?>
  <div class="container-fluid">
  <?php echo $content; ?>
  </div>
</div>
<?php
echo $this->beginContent("/layouts/footer");
$this->endContent();

$cs = Yii::app()->getClientScript()
//->registerScriptFile(ADMIN_THEME.'/themes/js/excanvas.min.js', CClientScript::POS_END)
->registerScriptFile(ADMIN_THEME.'/themes/js/jquery.ui.custom.js', CClientScript::POS_HEAD)
->registerScriptFile(ADMIN_THEME.'/themes/js/bootstrap.min.js', CClientScript::POS_END)
//->registerScriptFile(ADMIN_THEME.'/themes/js/jquery.flot.min.js', CClientScript::POS_END)
//->registerScriptFile(ADMIN_THEME.'/themes/js/jquery.peity.min.js', CClientScript::POS_END)
//->registerScriptFile(ADMIN_THEME.'/themes/js/fullcalendar.min.js', CClientScript::POS_END)
->registerScriptFile(ADMIN_THEME.'/themes/js/delta.js', CClientScript::POS_END)
//->registerScriptFile(ADMIN_THEME.'/themes/js/delta.dashboard.js', CClientScript::POS_END)
;
?>
</body>
</html>