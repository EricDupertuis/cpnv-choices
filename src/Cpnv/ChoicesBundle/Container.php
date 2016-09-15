<?php

namespace Cpnv\ChoicesBundle;

use Cpnv\RouterBundle\Router;
use Cpnv\ChoicesBundle\Db\DbConnection;

/**
 * Class Container
 * @package Cpnv\ChoicesBundle
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class Container
{
    private $router;

    private $routes;

    private $requestUri;

    private $requestMethod;

    private $dbConnection;

    /**
     * Container constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->router = new Router($this->requestUri);
        $this->routes = $config['routes'];
        $this->dbConnection = new DbConnection(
            $config['db']['host'],
            $config['db']['dbName'],
            $config['db']['user'],
            $config['db']['password']
        );
    }

    public function run()
    {
        foreach ($this->routes as $name => $prefix) {
            var_dump($prefix);var_dump($name);
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