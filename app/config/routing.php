<?php

return [
    'home' => [
        'prefix' => '/',
        'controller' => 'HomeController',
        'action' => 'index'
    ],
    'about' => [
        'prefix' => '/about',
        'controller' => 'AboutController',
        'action' => 'index'
    ],
    'test' => [
        'prefix' => '/test',
        'controller' => 'TestController',
        'action' => 'index'
    ],
    'login' => [
        'prefix' => '/login',
        'controller' => 'UserController',
        'action' => 'index'
    ]
];
