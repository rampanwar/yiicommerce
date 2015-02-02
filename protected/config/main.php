<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Ecomm Site',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.admindashboard.*',
		'ext.yii-mail.YiiMailMessage',
	),
	
	'defaultController'=>'users',
	
	'theme'=>'bootstrap',
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'pass',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admindashboard'=>array(
			'defaultController'=>'admin',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
			'class'=>"application.components.WebUser",
			'loginUrl'=>array('users/login'),
			//'defaultRoles'=>array('guest', 'admin'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'class'=>"application.components.RoutingManager",
			'showScriptName'=>false,
			//'caseSensitive' => false,
			'rules'=>array(
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				
				//'terms_and_conditions'=>"pages/index",
				//'<slug>'=>"pages/visit",
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('guest'),
			'itemTable'=>'authitem',
			'itemChildTable'=>'authitemchild',
			'assignmentTable'=>'authassignment',
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii_db',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'request'=>array(
			'class'=>'CHttpRequest',
			'enableCsrfValidation'=>false,
		),
		'input'=>array(   
			'class'=>'CmsInput',  
			'cleanPost'=>true,  
			'cleanGet'=>true,   
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace, log',
					'enabled'=>YII_DEBUG,
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'browser' => array(
			'class' => 'application.extensions.browser.CBrowserComponent',
		),
		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.email',
 			'logging' => true,
 			'dryRun' => false
 		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);