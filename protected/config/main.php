<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Inventory Management System',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.PHPExcel.PHPExcel',
		
		'ext.giix-components.*', // giix components
		//useradmin modules components and models import
		'application.modules.UserAdmin.components.*',
        'application.modules.UserAdmin.models.*',
		
		//bootstrap import
		        'bootstrap.components.*',
                'bootstrap.behaviors.*',
                'bootstrap.helpers.*',
	),
	//bootstrap import
	'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change this if necessary
    ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
			'ext.giix-core', // giix generators,
			
		),
		),
		'UserAdmin'=>array(
		
			'cache_time' => 3600,//cache expiration time for user admin login session
		
		),//useradmin modules 
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			    'class'=>'UWebUser',//useradmin extension
                'allowAutoLogin'=>true,
                'loginUrl'=>array('/UserAdmin/auth/login'),//useradmin extension
		),

		
	    // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_ims',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
		*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'shakyapranin@gmail.com',
	),
);