<?php

if (!$user->isAdmin()) {
    $app->redirect('');
}

if (isset($_POST['question1']) && isset($_POST['question2'])) {
    $query = $db->prepare('INSERT INTO questions_sets (answer_one, answer_two, users_id) VALUES (:one, :two, :id);');
    $query->bindParam('one', $_POST['question1']);
    $query->bindParam('two', $_POST['question2']);
    $query->bindParam('id', $_SESSION['id']);

    if ($query->execute()) {
        return $app->redirect('');
    }
}

$app->render();