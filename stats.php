<?php

/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

include_once 'bootstrap.php';

if (!$user->isLogged()) {
    $app->redirect('');
}

// Nombres de questions
$query = $db->prepare('SELECT COUNT(*) FROM questions_sets;');
$query->execute();

$nbQuestions = $query->fetch()[0];

// Nb d'utilisateurs
$query = $db->prepare('SELECT count(*) FROM users;');
$query->execute();

$nbUsers = $query->fetch()[0];

// Nb d'utilisateurs ayant répondu à au moins une question
$query = $db->prepare('SELECT user_id FROM users_answers GROUP BY user_id;');
$query->execute();

$activeUsers = count($query->fetchAll());

include_once $app->getConfig()['app']['app_dir'].'pages/stats.php';