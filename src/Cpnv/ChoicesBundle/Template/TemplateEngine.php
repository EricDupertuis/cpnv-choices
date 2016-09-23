<?php

namespace Cpnv\ChoicesBundle\Template;

/**
 * Class TemplateEngine
 * @package Cpnv\ChoicesBundle\Template
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class TemplateEngine
{
    static public function render($template, $vars)
    {
        $output = file_get_contents('../src/Cpnv/ChoicesBundle/Resources/Views/'.$template);

        if (!$output) {
            return "Error loading template file ($output).";
        }

        foreach ($vars as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        echo $output;
    }
}
