<?php

/**
 * Class User
 */
class User
{
    private $username;

    private $email;

    private $permissions;

    /**
     * @var PDO $db
     */
    private $db;

    /**
     * User constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function connect($username, $password)
    {
        $stmt = $this->db->prepare('SELECT * users WHERE username=:username');
        $stmt->bindParam(':username', $username);

        $stmt->execute();
        $user = $stmt->fetchAll();

        if ($user == null) {
            return false;
        }

        if ($this->checkHash($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['password'] = $user['password'];

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $password
     * @param $hashedPassword
     * @return bool
     */
    private function checkHash($password, $hashedPassword)
    {
        if (password_verify($password, $hashedPassword)) {
            return true;
        }

        return false;
    }

    public function checkPermissions()
    {

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
}
