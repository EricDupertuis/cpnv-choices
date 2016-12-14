<?php

include_once 'bootstrap.php';

session_destroy();

$app->redirect('');
