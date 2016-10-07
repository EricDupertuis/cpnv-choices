<?php

namespace Cpnv\ChoicesBundle\Entity;

/**
 * Class User
 * @package Cpnv\ChoicesBundle\Entity
 */
class User
{
    private $id;

    private $username;

    private $email;

    private $password;

    private $isLogged = false;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function up()
    {
        return
        "
            CREATE TABLE IF NOT EXISTS 'user' (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(30) NOT NULL,
              `email` varchar(60) NOT NULL,
              `password` varchar(255) NOT NULL,
              PRIMARY KEY (`userId`),
              UNIQUE KEY `userEmail` (`userEmail`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
        ";
    }
}