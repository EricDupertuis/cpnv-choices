<?php

if ($user->isLogged()) {
    $app->redirect('');
}

if (isset($_POST['username']) && $_POST['password'] != '') {
    $result = $user->connect($_POST['username'], $_POST['password']);

    if ($result) {
        $app->redirect('');
    }
}

$app->render('login');
