<?php

namespace Cpnv\ChoicesBundle;

use Cpnv\RouterBundle\Router;
use Cpnv\ChoicesBundle\Db\DbConnection;
use Cpnv\ChoicesBundle\User\UserManager;

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

    protected $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

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

        $this->user = new UserManager();
    }

    public function run()
    {
        foreach ($this->routes as $route => $conf) {
            $this->router->get($conf['prefix'], function () use ($route, $conf) {
                $controllerName = "Cpnv\\ChoicesBundle\\Controller\\".$conf['controller'];
                $controller = new $controllerName($this);
                $controller->indexAction();
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

    public function getDbConnection()
    {
        return $this->dbConnection;
    }
}