<?php

include_once 'bootstrap.php';

if (!$user->isLogged()) {
    $app->redirect('');
}

if (isset($_POST['question1']) && isset($_POST['question2'])) {
    $query = $db->prepare('INSERT INTO questions_sets (answer_one, answer_two, users_id, valid) VALUES (:qone, :qtwo, :id, :valid);');
    $query->bindParam('qone', $_POST['question1'], PDO::PARAM_STR);
    $query->bindParam('qtwo', $_POST['question2'], PDO::PARAM_STR);
    $query->bindParam('id', intval($_SESSION['id']), PDO::PARAM_INT);

    if ($user->isAdmin() == true) {
        $valid = 1;
    } else {
        $valid = 0;
    }

    $query->bindParam('valid', $valid, PDO::PARAM_INT);

    if ($query->execute()) {
        $app->addFlash('success', 'Questions ajoutée avec succès');
    } else {
        $app->addFlash('warning', 'Erreur lors de l\' ajout d\'une question');
    }
}

include_once $app->getConfig()['app']['app_dir'].'pages/addQuestion.php';
