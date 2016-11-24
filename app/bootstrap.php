<?php

// set all configurations in an array
$config = [];

$config['app'] = require_once('config/app.php');
$config['routes'] = require_once('config/routing.php');
$config['db'] = require_once('config/database.php');

// includes main class
include_once '../app/classes/User.php';
include_once '../app/classes/App.php';

session_start();

// set db connection
$db = new PDO(
    'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbName'] . ';charset=utf8mb4',
    $config['db']['user'],
    $config['db']['password']
);

// manage user
$user = new Kingdom\User($db);

// match routes with actions and create app object
foreach ($config['routes'] as $route) {
    if ($_SERVER['REQUEST_URI'] === $route['prefix']) {
        $app = new \Kingdom\App($config, $route['action'], $route['prefix']);
        include_once('actions/' . $app->getAction() . '.php');
    }
}
