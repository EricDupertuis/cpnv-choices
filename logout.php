<?php

/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

include_once 'bootstrap.php';

// Goodbye session
session_unset();
session_destroy();

$app->redirect('');
