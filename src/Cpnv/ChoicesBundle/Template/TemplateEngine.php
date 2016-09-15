<?php

namespace Cpnv\ChoicesBundle\Template;

/**
 * Class TemplateEngine
 * @package Cpnv\ChoicesBundle\Template
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class TemplateEngine
{
    private function getFile($templateName)
    {

    }

    private function parse()
    {

    }

    static public function render($template, $vars)
    {
        $html = file_get_contents('../src/Cpnv/ChoicesBundle/Resources/Views/'.$template);

        foreach ($vars as $templateVar) {

        }
    }
}
