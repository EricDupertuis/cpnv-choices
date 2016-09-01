<?php

require_once('Autoloader.php');
Autoloader::register();

$app = new Cpnv\ChoicesBundle\Container(
    [
        'config' => require_once('config/app.php'),
        'routes' => require_once('config/routing.php')
    ]
);

try {
    $app->run();
} catch (\Cpnv\RouterBundle\RouterException $e) {
    echo $e->getMessage();
}