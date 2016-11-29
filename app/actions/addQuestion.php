<?php

if (isset($_POST['question1']) && isset($_POST['question2'])) {
    $query = $db->prepare('INSERT INTO questionsSet (user_id) VALUES (:user_id);');
    $query->bindParam('user_id', $user->getId());

    if ($query->execute()) {
        $setId = $db->lastInsertId();
    };

    $query = $db->prepare('INSERT INTO answers (answer_one, answer_two, questions_id) VALUES (:one, :two, :id),');
    $query->bindParam('one', $_POST['question1']);
    $query->bindParam('two', $_POST['question2']);

    if ($query->execute()) {
        return $app->redirect('');
    }
}

$app->render('/addQuestion');