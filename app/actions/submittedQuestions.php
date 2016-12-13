<?php

if (!$user->isAdmin()) {
    $app->redirect('');
}

$query = $db->prepare('SELECT * FROM questions_sets WHERE valid=0;');

$query->execute();

$results = $query->fetchAll();

include_once $app->getConfig()['app']['app_dir'].'pages/'.$app->getAction().'.php';