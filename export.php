<?php

include_once 'bootstrap.php';

if (isset($_POST['export']) && $_POST['export'] == 'ok') {
    $query = $db->prepare('SELECT * FROM questions_sets');
    $query->execute();

    $qs = $query->fetchAll();

    foreach ($qs as $q) {
        
    }
}

include_once 'pages/export.php';
