<?php

namespace Cpnv\RouterBundle;

/**
 * Class Route
 * @package Cpnv\RouterBundle
 * @author Eric Dupertuis
 */
class Route
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var
     */
    private $callable;

    /**
     * @var array
     */
    private $matches = [];

    /**
     * @var array
     */
    private $params = [];

    /**
     * Route constructor.
     * @param $path
     * @param $callable
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

        if (!preg_match('#^'.$path.'$#i', $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * @return mixed
     */
    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }
}
