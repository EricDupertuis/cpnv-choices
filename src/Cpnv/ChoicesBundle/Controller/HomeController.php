<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Controller\AbstractController;
use Cpnv\ChoicesBundle\Db\QueryBuilder;
use Cpnv\ChoicesBundle\Entity\User;

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
        $db = $this->container->getDbConnection();

        $query->select(User::class, '*')
            ->where('name', '=', 'eric');

        $db->execute($query->getQuery());
    }
}
