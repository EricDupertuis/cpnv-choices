<?php

$config = [];

$config['app'] = require_once('config/app.php');
$config['routes'] = require_once('config/routing.php');
$config['db'] = require_once('config/database.php');

foreach ($config['routes'] as $route) {
    if ($_SERVER['REQUEST_URI'] === $route['prefix']) {
        include_once('actions/'.$route['action'].'.php');
    }
}
