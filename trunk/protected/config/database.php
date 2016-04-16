<?php

// This is the database connection configuration.

$host = 'localhost'; //$_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] :
$username = 'root';
$password = '';
$dbName = 'mis';

return array(
    //'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database

    'connectionString' => 'mysql:host=' . $host . ';dbname=' . $dbName,
    'emulatePrepare' => true,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
);
