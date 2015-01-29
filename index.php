<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
//include_once("common-function");

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

Yii::createWebApplication($config);
require_once(dirname(__FILE__).'/protected/config/common-function.php');

define('DOC_URL', $_SERVER['DOCUMENT_ROOT'].Yii::app()->baseUrl);
define('BASE_PATH', Yii::app()->baseUrl);
define('HTTP_BASE_PATH', 'http://'.Yii::app()->request->getServerName().BASE_PATH); 
define('HTTPS_BASE_PATH', 'https://'.Yii::app()->request->getServerName().BASE_PATH);
define('THEME_PATH', Yii::app()->theme->baseUrl);
define('ADMIN_THEME', Yii::app()->baseUrl.'/themes/admin');
define('CSS_PATH', Yii::app()->baseUrl.'/css');
define('JS_PATH', Yii::app()->baseUrl.'/js');

Yii::app()->run();
