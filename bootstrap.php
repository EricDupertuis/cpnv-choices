<?php
/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

// On crée un tableau de config
$config = [];

// on assigne les fichiers de configs à une clé du tableau
$config['app'] = require_once('config/app.php');
$config['db'] = require_once('config/database.php');

// includes main class
include_once './classes/User.php';
include_once './classes/App.php';

session_start();

// On crée l'objet db
$db = new PDO(
    'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbName'] . ';charset=utf8mb4',
    $config['db']['user'],
    $config['db']['password']
);

// On instancie la classe App et User
$app = new App($config);
$user = new User($db);

