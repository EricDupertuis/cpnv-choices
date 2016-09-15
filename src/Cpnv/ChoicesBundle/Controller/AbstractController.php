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
        TemplateEngine::render($template, $vars);
    }
}
