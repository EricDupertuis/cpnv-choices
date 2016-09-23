<?php

namespace Cpnv\ChoicesBundle\Template;

/**
 * Class TemplateEngine
 * @package Cpnv\ChoicesBundle\Template
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class TemplateEngine
{
    private $file;

    static public function render($template, $vars)
    {
        $html = file_get_contents('../src/Cpnv/ChoicesBundle/Resources/Views/'.$template);

        if (!file_exists($html)) {
            return "Error loading template file ($html).";
        }

        $output = file_get_contents($html);

        foreach ($vars as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}
