<?php

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

require_once $config['app']['app_dir'].'pages/register.php';