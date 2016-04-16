<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../components/helpers.php');
require_once( dirname(__FILE__) . '/../components/globalvariables.php');
require_once( dirname(__FILE__) . '/../components/COMMONFUNCTION.php');
Yii::setPathOfAlias('gservices', Yii::getPathOfAlias('system') . '/../trunk/globalservices/');
Yii::setPathOfAlias('uploads', Yii::getPathOfAlias('system') . '/../trunk/uploads/');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    'defaultController' => 'user',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'gservices.*',
        'application.enums.*',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '9773880647',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', 'localhost', '192.168.0.110'),
        ),
        //'systemadmin',
        'user',
        'client',
        'organization',
        'branches',
        'employee',
        'courses',
        'mode',
        'heardabout',
        'enquiry'
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'coreScriptPosition' => CClientScript::POS_END,
            /* 'packages' => array(
              'jquery' => array(
              'baseUrl' => 'js',
              'js' => array('jquery.min.js'),
              'coreScriptPosition' => CClientScript::POS_HEAD
              ),
              ), */
            'scriptMap' => array('jquery.js' => false),
        ),
        'request' => array(
            'enableCsrfValidation' => true,
        ),
        'user' => array(
// enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('user'), //after logout if user click back button this code will send him login page
            'class' => 'WebUser',
        /* 'module' => array(
          'loginUrl' => '/r_admin',
          'moduleId' => 'r_admin'
          ) */
        #'loginUrl' => '/site/login'
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'UserException/error', //'UserException/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
//              array(
//              'class'=>'CWebLogRoute',
//              ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => array(
// this is used in contact page
        'adminEmail' => ADMIN_EMAIL,
        'env' => DEVMOD
    ),
);
//Yii::app()->clientScript->coreScriptPosition = CClientScript::POS_END;
//Yii::app()->clientScript->registerCoreScript('jquery');
