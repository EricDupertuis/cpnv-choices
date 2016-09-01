<?php

namespace Cpnv\ChoicesBundle;

use Cpnv\RouterBundle\Router;

class Container
{
    private $router;

    private $routes;

    private $requestUri;

    private $requestMethod;

    public function __construct($config)
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->router = new Router($this->requestUri);
        $this->routes = $config['routes'];
    }

    public function run()
    {
        foreach ($this->routes as $name => $prefix) {
            $this->router->get($prefix, function () use ($name) {
                echo $name;
            });
        }

        $this->router->run();
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param Router $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param mixed $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }
}