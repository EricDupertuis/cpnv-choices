<?php

if (isset($_POST['question']) && isset($_POST['answer']) && is_int($_POST['answer'])) {
    $answer = $_POST['answer'];

    if ($answer != 0 || $answer != 1) {
        return json_encode(['error' => 'answer parameter not valid']);
    }



} else {
    return json_encode(['error' => 'answer parameter not given']);
}


