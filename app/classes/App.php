<?php

namespace Kingdom;


class App
{
    private $route;

    private $action;

    public function getTemplate($action)
    {

    }

    public function redirect($route) {
        header('Location: /'.$route);
        die();
    }
}
