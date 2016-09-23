<?php

namespace Cpnv\RouterBundle;

/**
 * Class Router
 * @package Cpnv\RouterBundle
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class Router
{
    private $url;

    private $routes = [];

    private $method;

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param $path
     * @param $callable
     * @return Route
     */
    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        /**
         * @TODO: implement allowed method for routes
         */
        $this->routes['GET'][] = $route;
        $this->routes['POST'][] = $route;
        return $route;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function run()
    {
        if (!$this->routes[$this->method]) {
            throw new RouterException(
                "Method : " . $this->method . "Does not exist",
                1
            );
        }

        /**
         * @var Route $route
         */
        foreach ($this->routes[$this->method] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }

        throw new RouterException('No matching routes');
    }
}
