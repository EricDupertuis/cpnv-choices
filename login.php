<?php

include_once 'bootstrap.php';

if ($user->isLogged()) {
    $app->redirect('');
}

if (isset($_POST['username']) && $_POST['password'] != '') {
    $result = $user->connect($_POST['username'], $_POST['password']);

    if ($result) {
        $app->redirect('');
    }
}

include_once $app->getConfig()['app']['app_dir'].'pages/login.php';
