<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Элвис',
	'sourceLanguage' => 'en_US',
	'language' => 'ru',
//	'charset'=>'windows-1251',
	'charset'=>'utf-8',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/**/
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','0.0.0.0','::1'),
		),
       'Dude',		
      'map',		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'returnUrl'=>'/elyii/index.php?r=regions',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*			'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		/*	*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=elvisdb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
//			'charset' => 'cp1251',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
			'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			 'transportType'=>'smtp',
			 'transportOptions'=>array(
			   'host'=>'smtp.mail.yahoo.com',
			   'username'=>'emisdb',//contohna nama_email@yahoo.co.id
			   'password'=>'!Q@W#E',
			   'port'=>'465',
			   'encryption'=>'ssl',
			 ),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		)
	
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'emisdb@yahoo.com',
	),
);