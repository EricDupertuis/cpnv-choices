<?php

include_once 'bootstrap.php';

// Goodbye session
session_unset();
session_destroy();

$app->redirect('');
