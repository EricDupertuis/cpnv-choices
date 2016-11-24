<?php

if (isset($_POST['username']) && $_POST['password'] != '') {
    $user->connect($_POST['username'], $_POST['password']);
}

$app->render('login');
