<?php

include_once 'bootstrap.php';

if (
    isset($_POST['password']) && $_POST['password'] !== ''
    && isset($_POST['username']) && $_POST['username'] !== ''
    && isset($_POST['email']) && $_POST['email'] !== ''
) {

    if ($user->checkIfUserNotRegistered($_POST['email'], $_POST['username'])) {
        $user->register($_POST['username'], $_POST['email'], $_POST['password']);
    } else {

    }
}

include_once $app->getConfig()['app']['app_dir'].'pages/register.php';