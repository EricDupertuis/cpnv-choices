<?php

if (isset($_POST['question1']) && isset($_POST['question2'])) {
    $query = $db->prepare('INSERT INTO questionsSet (user_id) VALUES (:user_id);');
    $query->bindParam('user_id', $user->getId());

    if ($query->execute()) {
        $setId = $db->lastInsertId();
    };

    $queryQ1 = $db->prepare('INSERT INTO answers ()');
}

$app->render();