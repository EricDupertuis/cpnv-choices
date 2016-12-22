<?php

/**
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 25.11.2016
 */

include_once 'bootstrap.php';

// on vérifie l'action
if (isset($_POST['export']) && $_POST['export'] == 'ok') {
    $query = $db->prepare('SELECT * FROM questions_sets');
    $query->execute();

    $qs = $query->fetchAll();

    // on ouvre le fichier avec fopen en write mode
    $output = fopen("php://output",'w') or die("Can't open php://output");
    // on met les headers de contenu
    header("Content-Type:application/csv");
    // On précise le nom num fichier
    header("Content-Disposition:attachment;filename=questions-export" . date('Y-m-d') . ".csv");

    // on crée une ligne le header du fichier
    fputcsv($output, array('question1','question2'));

    // on insère une ligne par clé du tableau
    foreach ($qs as $q) {
        $return = [$q['answer_one'], $q['answer_two']];
        fputcsv($output, $return);
    }
} else {
    include_once 'pages/export.php';
}
