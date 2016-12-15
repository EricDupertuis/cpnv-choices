<?php

include_once 'bootstrap.php';

if (isset($_POST['export']) && $_POST['export'] == 'ok') {
    $query = $db->prepare('SELECT * FROM questions_sets');
    $query->execute();

    $qs = $query->fetchAll();

    $output = fopen("php://output",'w') or die("Can't open php://output");
    header("Content-Type:application/csv");
    header("Content-Disposition:attachment;filename=questions-export" . date('Y-m-d') . ".csv");

    fputcsv($output, array('question1','question2'));

    foreach ($qs as $q) {
        var_dump($q);
        $return = [$q['answer_one'], $q['answer_two']];
        fputcsv($output, $return);
    }
} else {
    include_once 'pages/export.php';
}
