<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Template\TemplateEngine;
use Cpnv\ChoicesBundle\Container;

/**
 * Class AbstractController
 * @package Cpnv\ChoicesBundle\Controller
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
abstract class AbstractController
{
    /**
     * @var Container $container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param $template
     * @param null $vars
     */
    public function render($template, $vars = null)
    {
        try {
            TemplateEngine::render($template, $vars);
        } catch (\Exception $e) {
            echo 'Error rendering template :' . $template . ' ' . $e->getMessage();
        }
    }

    /**
     * @param $path
     * @return bool
     */
    public function redirect($path)
    {
        header('Location: ' . $path);
        return 1;
    }

    /**
     * @return \Cpnv\ChoicesBundle\Db\DbConnection
     */
    public function getDB()
    {
        return $this->container->getDbConnection();
    }
}
