<?php

namespace Cpnv\ChoicesBundle\Template;

/**
 * Class TemplateEngine
 * @package Cpnv\ChoicesBundle\Template
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class TemplateEngine
{
    /**
     * @param $template
     * @param $vars
     * @return string
     */
    public static function render($template, $vars)
    {
        $file = '../src/Cpnv/ChoicesBundle/Resources/Views/'.$template;

        if (!file_exists($file)) {
            return "Error loading template file ($file).";
        }

        extract($vars);

        include_once($file);

        return true;
    }
}
