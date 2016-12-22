<?php

/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

include_once 'bootstrap.php';

if (!$user->isAdmin()) {
    $app->redirect('');
}

// on check le paramètre GET
if (isset($_GET['validateId'])) {
    $query = $db->prepare('UPDATE questions_sets SET valid=1 WHERE id=:id;');
    $query->bindParam(':id', intval($_GET['validateId']));

    $query->execute();
    $app->redirect('submittedQuestions.php');
}

// On prend les questions non validée
$query = $db->prepare('SELECT * FROM questions_sets WHERE valid=0;');

$query->execute();

$results = $query->fetchAll();

include_once $app->getConfig()['app']['app_dir'].'pages/submittedQuestions.php';