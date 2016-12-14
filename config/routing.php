<?php

return [
    'home' => [
        'prefix' => '/',
        'action' => 'index'
    ],
    'login' => [
        'prefix' => '/login',
        'action' => 'login'
    ],
    'logout' => [
        'prefix' => '/logout',
        'action' => 'logout'
    ],
    'register' => [
        'prefix' => '/register',
        'action' => 'register'
    ],
    'answerQuestion' => [
        'prefix' => '/answer',
        'action' => 'answerQuestion'
    ],
    'adminAddQuestion' => [
        'prefix' => '/addQuestion',
        'action' => 'addQuestion'
    ],
    'adminSubmittedQuestion' => [
        'prefix' => '/submittedQuestions',
        'action' => 'submittedQuestions'
    ]
];
