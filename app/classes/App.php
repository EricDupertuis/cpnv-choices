<?php

namespace Kingdom;


class App
{
    private $route;

    private $action;

    private $config;

    public function __construct($config, $action, $route)
    {
        $this->config = $config;
        $this->action = $action;
        $this->route = $route;
    }

    public function render()
    {
        require_once $this->config['app']['app_dir'].'pages/'.$this->action.'.php';
    }

    public function redirect($route) {
        header('Location: /'.$route);
        die();
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }
}
