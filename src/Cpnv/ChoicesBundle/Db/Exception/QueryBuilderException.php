<?php

namespace Cpnv\ChoicesBundle\Db\Exception;

/**
 * Class QueryBuilderException
 * @package Cpnv\ChoicesBundle\Db\Exception
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class QueryBuilderException extends \Exception
{
    /**
     * QueryBuilderException constructor.
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}