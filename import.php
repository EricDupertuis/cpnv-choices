<?php

/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

include "bootstrap.php";

// droits d'accès
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

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $query = $db->prepare('
                    INSERT INTO questions_sets (answer_one, answer_two, users_id, valid) 
                    VALUES (:qone, :qtwo, :id, :valid);
                ');
                $one = $data[0];
                $two = $data[1];
                $query->bindParam('qone', $one, PDO::PARAM_STR);
                $query->bindParam('qtwo', $two, PDO::PARAM_STR);
                $query->bindParam('id', intval($_SESSION['id']), PDO::PARAM_INT);
                $query->bindParam('valid', intval(1), PDO::PARAM_INT);

                $query->execute();

                $row++;
            }

            fclose($handle);
        }
    }
}

include_once 'pages/import.php';