<?php

if (!$user->isLogged()) {
    $app->redirect('login');
};

$app->render();