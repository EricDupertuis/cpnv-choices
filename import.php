<?php

include "bootstrap.php";

if (!$user->isLogged()) {
    $app->redirect('/login.php');
}

if (!$user->isAdmin()) {
    $app->redirect('/');
}

if (isset($_FILES)) {
// check if file is CSV or CSV compatible
    $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
    if (in_array($_FILES['uploadedCsv']['type'], $mimes)) {
        // https://secure.php.net/manual/en/function.fgetcsv.php
        if (($handle = fopen($_FILES['uploadedCsv']['tmp_name'], "r")) !== false) {

            $data = fgetcsv($handle, 1000, ",");

            foreach ($data as $line) {
                $query = $db->prepare('
                    INSERT INTO questions_sets (answer_one, answer_two, users_id, valid) 
                    VALUES (:qone, :qtwo, :id, :valid);
                ');
                $one = $line[0];
                $two = $line[1];
                $query->bindParam('qone', $one, PDO::PARAM_STR);
                $query->bindParam('qtwo', $two, PDO::PARAM_STR);
                $query->bindParam('id', intval($_SESSION['id']), PDO::PARAM_INT);
                $query->bindParam('valid', intval(1), PDO::PARAM_INT);

                $query->execute();
            }

            fclose($handle);
        }
    }
}

include_once 'pages/import.php';