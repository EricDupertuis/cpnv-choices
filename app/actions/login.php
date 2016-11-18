<?php

if (isset($_POST['username']) && $_POST['password'] != '') {
    $user->setUsername($_POST['username']);
    $user->setPassword($_POST['password']);
}

require_once $config['app']['app_dir'].'pages/login.php';