<?php

if (!$user->isLogged()) {
    $app->redirect('login');
};

require_once $config['app']['app_dir'].'pages/index.php';