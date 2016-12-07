<?php

if (!$user->isAdmin()) {
    $app->redirect('');
}

$query = $db->prepare('SELECT * FROM questions_set WHERE confirmed = 1;');

$query->execute();

$results = $query->fetchAll();

$app->render();