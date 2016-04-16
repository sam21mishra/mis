<?php

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

//looking for host
$host = $_SERVER['HTTP_HOST'];

// if working copy is running into developer mode then error reporting will be on
if($host == 'localhost' || $host == '192.168.0.102')
    $error_reporting = 1;
else
    $error_reporting = 0;

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors',$error_reporting);
if ($error_reporting) {
    error_reporting(E_ALL);
}

require_once($yii);
Yii::createWebApplication($config)->run();
