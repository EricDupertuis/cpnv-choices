<?php

namespace Cpnv\ChoicesBundle\Db;

use Cpnv\ChoicesBundle\Db\Exception\QueryBuilderException;

/**
 * Class QueryBuilder
 * @package Cpnv\ChoicesBundle\Db
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class QueryBuilder
{
    private $query = '';

    const DESC = 'DESC';

    const ASC = "ASC";

    private $allowedOperators = [
        '=',
        '>',
        '<',
        '>=',
        '<='
    ];

    /**
     * @param $table
     * @param array $fields
     * @return QueryBuilder $this
     */
    public function select($table, $fields = [])
    {
        $this->query = 'SELECT ';

        if (count($fields) === 0) {
            $this->query .= '*';
        } else {
            foreach ($fields as $field) {
                if ($field == count($fields) - 1) {
                    $this->query .= "$field, ";
                } else {
                    $this->query .= $field;
                }
            }
        }

        $this->query .= " FROM $table";

        return $this;
    }

    /**
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @return QueryBuilder $this
     */
    public function where($field, $operator, $value)
    {
        if ($this->validateOperator($operator)) {
            $this->query .= " WHERE $field $operator " . $this->escape($value);
        }

        return $this;
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return QueryBuilder $this
     */
    public function andWhere($field, $operator, $value)
    {
        if ($this->validateOperator($operator)) {
            $this->query .= " AND WHERE $field $operator " . $this->escape($value);
        };

        return $this;
    }

    /**
     * @param $field
     * @param string $order
     * @return $this
     */
    public function orderBy($field, $order = 'ASC')
    {
        $this->query .= " ORDER BY $field ";
        $this->query .= $order;

        return $this;
    }

    /**
     * @param $field
     * @param string $order
     * @return $this
     */
    public function andOrderBy($field, $order = 'ASC')
    {
        $this->query .= ", $field $order";
        return $this;
    }

    /**
     * @param $value
     * @return string
     */
    private function escape($value)
    {
        if (gettype($value) === 'string') {
            return "\"$value\"";
        } else {
            return $value;
        }
    }

    /**
     * @param $operator
     * @return bool
     * @throws QueryBuilderException
     */
    private function validateOperator($operator)
    {
        if (in_array($operator, $this->allowedOperators)) {
            return true;
        } else {
            throw new QueryBuilderException('Operator is not recognised or allowed');
        }
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
}
