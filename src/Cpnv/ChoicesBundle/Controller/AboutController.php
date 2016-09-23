<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Interfaces\ControllerInterface;

class AboutController extends AbstractController implements ControllerInterface
{
    public function indexAction()
    {
        var_dump('test about page');
    }
}
