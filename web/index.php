<?php

include_once('../app/bootstrap.php');

use Cpnv\ChoicesBundle\Db\QueryBuilder;

$builder = new QueryBuilder();

$builder->select('user', ['name', 'test'])
    ->where('name', '=', 3)
    ->andWhere('email', '=', 'dupertuis.eric@gmail.com')
    ->orderBy('name', $builder::DESC)
    ->andOrderBy('lastname', $builder::ASC);

var_dump($builder->getQuery());