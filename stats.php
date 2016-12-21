<?php

include_once 'bootstrap.php';

if (!$user->isLogged()) {
    $app->redirect('');
}

$query = $db->prepare('SELECT COUNT(*) FROM questions_sets;');
$query->execute();

$nbQuestions = $query->fetch()[0];

$query = $db->prepare('SELECT count(*) FROM users;');
$query->execute();

$nbUsers = $query->fetch()[0];

$query = $db->prepare('SELECT user_id FROM users_answers GROUP BY user_id;');
$query->execute();

$activeUsers = count($query->fetchAll());

include_once $app->getConfig()['app']['app_dir'].'pages/stats.php';