<?php

include_once 'bootstrap.php';

if (!$user->isLogged()) {
    $app->redirect('login.php');
};

// on vérifie qu'on ait répondu à une des questions
if (isset($_POST['q1']) || isset($_POST['q2'])) {
    $query = $db->prepare('
      INSERT INTO users_answers
      VALUES (:qs, :a, :u);
    ');

    $query->bindParam(':qs', intval($_POST['qid']), PDO::PARAM_INT);

    $query->bindParam(':qs', intval($_POST['qid']), PDO::PARAM_INT);

    if (isset($_POST['q1'])) {
        $query->bindParam(':a', intval('1'), PDO::PARAM_INT);
    } elseif (isset($_POST['q2'])) {
        $query->bindParam(':a', intval('2'), PDO::PARAM_INT);
    } else {
        // erreur a ce niveau, on met un message flash
        $app->addFlash('warning', 'Erreur en soumettant le formulaire');
        $app->redirect('');
    }
    $query->bindParam(':u', intval($_SESSION['id']), PDO::PARAM_INT);

    if ($query->execute()) {
        $app->redirect('');
    } else {
        $app->addFlash('warning', 'Erreur en soumettant le formulaire');
        $app->redirect('');
    }

    die();
}
$exclude = '';

// on crée un query pour aller chercher une question dans la base
// On prend toutes les questions auxquelles l'utilisateur à déjà répondu
$query = $db->prepare('
  SELECT qs.id FROM questions_sets AS qs
    INNER JOIN users_answers AS ua
    ON ua.questions_sets_id = qs.id
    WHERE ua.user_id = :id
;
');

$query->bindParam(':id', intval($_SESSION['id']), PDO::PARAM_INT);

$query->execute();

$ids = $query->fetchAll(PDO::FETCH_ASSOC);

// on crée un chaîne ce caractère avec les IDs des questions déjà répondues
foreach ($ids as $index => $item) {
    if (count($ids) == $index + 1) {
        $exclude .= $item['id'];
    } else {
        $exclude .= $item['id'].', ';
    }
}

// ON prend une des questions non répondue en enlevant les IDs, ou on prend la première qui vient
if (empty($exclude)) {
    $query = $db->prepare('SELECT * FROM questions_sets LIMIT 1;');
} else {
    $query = $db->prepare('SELECT * FROM questions_sets WHERE id NOT IN ('.$exclude.') LIMIT 1;');
}

$query->execute();

$questionArray = $query->fetchAll();

if ($questionArray != null) {
    $question = $questionArray[0];
} else {
    $question = null;
}

if ($question == null) {
    $app->addFlash('warning', 'Plus de questions disponibles');
}

include_once $app->getConfig()['app']['app_dir'].'pages/index.php';