<?php

// set all configurations in an array
$config = [];

$config['app'] = require_once('config/app.php');
$config['db'] = require_once('config/database.php');

// includes main class
include_once './classes/User.php';
include_once './classes/App.php';

session_start();

// set db connection
$db = new PDO(
    'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbName'] . ';charset=utf8mb4',
    $config['db']['user'],
    $config['db']['password']
);

// manage user
$app = new \Kingdom\App($config);
$user = new Kingdom\User($db);

