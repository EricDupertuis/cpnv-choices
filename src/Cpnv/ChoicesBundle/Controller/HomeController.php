<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Controller\AbstractController;
use Cpnv\ChoicesBundle\Db\QueryBuilder;
use Cpnv\ChoicesBundle\Db\DbConnection;

/**
 * Class HomeController
 * @package Cpnv\ChoicesBundle\Controller
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class HomeController extends AbstractController
{
    public function indexAction()
    {
        $query = new QueryBuilder();
        var_dump('test');
    }
}
