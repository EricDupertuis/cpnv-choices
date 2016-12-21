<?php

include_once 'bootstrap.php';

if ($user->isLogged()) {
    $app->redirect('');
}

// On vérifie que l'utilisateur est connecté sinon on redirige
if (isset($_POST['username']) && $_POST['password'] != '') {
    $result = $user->connect($_POST['username'], $_POST['password']);

    if ($result) {
        $app->redirect('');
    }
}

include_once $app->getConfig()['app']['app_dir'].'pages/login.php';
