<?php

if (!$user->isLogged()) {
    $app->redirect('login');
};

if (isset($_POST['q1']) || isset($_POST['q2'])) {
    $query = $db->prepare('
      INSERT INTO users_answers (questions_sets_id, answer, users_id)
      VALUES (:qs, :a, :u);
    ');

    $query->bindParam(':qs', intval($_POST['qid']), PDO::PARAM_INT);
    if (isset($_POST['q1'])) {
        $query->bindParam(':qs', intval($_POST['q1']), PDO::PARAM_INT);
    } elseif (isset($_POST['q2'])) {
        $query->bindParam(':qs', intval($_POST['q2']), PDO::PARAM_INT);
    } else {
        $app->addFlash('warning', 'Erreur en soumettant le formulaire');
        $app->redirect('');
    }
    $query->bindParam(':u', intval($_SESSION['id']), PDO::PARAM_INT);

    if (!$query->execute()) {
        $app->addFlash('warning', 'Erreur en soumettant le formulaire');
        $app->redirect('');
    }
}


$exclude = '';

$query = $db->prepare('
  SELECT qs.id FROM questions_sets AS qs
    INNER JOIN users_answers AS ua
    ON ua.questions_sets_id = qs.id
    WHERE qs.users_id = :id
;
');

$query->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);

$query->execute();
$ids = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($ids as $index => $item) {
    if (count($ids) == $index + 1) {
        $exclude .= $item['id'];
    } else {
        $exclude .= $item['id'].', ';
    }
}

$query = $db->prepare('SELECT * FROM questions_sets WHERE id NOT IN ('.$exclude.');');
$query->execute();

$question = $query->fetchAll()[0];

if (!$question) {
    $app->addFlash('warning', 'Plus de questions disponibles');
}

include_once $app->getConfig()['app']['app_dir'].'pages/'.$app->getAction().'.php';