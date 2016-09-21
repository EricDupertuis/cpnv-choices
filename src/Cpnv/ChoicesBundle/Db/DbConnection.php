<?php

namespace Cpnv\ChoicesBundle\Db;

/**
 * Class DbConnection
 * @package Cpnv\ChoicesBundle\Db
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 */
class DbConnection
{
    /**
     * @var \PDO $connection
     */
    private $connection;

    private $driver = 'mysql';

    private $host;

    private $dbName;

    private $charset = 'utf8';

    private $user;

    private $password;

    public function __construct($host, $dbName, $user, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;

        $this->connect(
            $this->host,
            $this->dbName,
            $this->user,
            $this->password
        );
    }

    /**
     * @param $host
     * @param $dbName
     * @param $user
     * @param $password
     */
    public function connect($host, $dbName, $user, $password)
    {
        $this->connection = new \PDO(
            "mysql:host=".$host.";dbname=".$dbName.";port=3306;",$user,$password
        );
    }

    /**
     * @param $query
     * @return bool
     */
    public function execute($query)
    {
        return $this->connection->query($query)->execute();
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }
}
