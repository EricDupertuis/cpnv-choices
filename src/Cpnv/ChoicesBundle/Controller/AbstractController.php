<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Template\TemplateEngine;
use Cpnv\ChoicesBundle\Container;

/**
 * Class AbstractController
 * @package Cpnv\ChoicesBundle\Controller
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
abstract class AbstractController extends Container
{
    public function render($template, $vars)
    {
        try {
            TemplateEngine::render($template, $vars);

        } catch (\Exception $e) {
            echo 'Error rendering template :' . $template . ' ' . $e->getMessage();
        }
    }

    public function redirect($path)
    {
        header('Location: ' . $path);
    }
}
