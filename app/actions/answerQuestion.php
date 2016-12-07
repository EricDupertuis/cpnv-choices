<?php

if (isset($_POST['question']) && isset($_POST['answer']) && is_int($_POST['answer'])) {
    $answer = $_POST['answer'];

    if ($answer != 0 || $answer != 1) {
        return json_encode(['error' => 'answer parameter not valid']);
    }

    $query = $db->prepare('
      INSERT INTO users_answers (questions_sets_id, answer, user_id)
      VALUES (:qset, :answer, :user);
    ');

    $query->bindParam('qset', $_POST['question']);
    $query->bindParam('answer', $_POST['answer']);
    $query->bindParam('user', $_SESSION['id']);

    $query->execute();

    return json_encode(['success' => 'answer inserted']);

} else {
    return json_encode(['error' => 'answer parameter not given']);
}
