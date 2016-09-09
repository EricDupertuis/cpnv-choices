<?php

namespace Cpnv\ChoicesBundle\Db;

class QueryBuilder
{
    private $pdo;

    private $query = '';

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($db, $fields = [])
    {
        $this->query = 'SELECT ';
        foreach ($fields as $field) {
            if ($field = count($fields) - 1) {
                $this->query .= "$field, ";
            } else {
                $this->query .= $field;
            }
        }

        $this->query .= " FROM $db";

        return $this;
    }

    public function where($field, $value, $operator)
    {
        
    }

    public function getQuery()
    {
        return $this->query;
    }
}
