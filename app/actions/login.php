<?php

if (isset($_POST['username']) && $_POST['password'] != '') {
    $user->connect($_POST['username'], $_POST['password']);
}

require_once $config['app']['app_dir'].'pages/login.php';