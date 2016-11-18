<?php

namespace Kingdom;

/**
 * Class User
 */
class User
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    const ROLE_USER = 'ROLE_USER';

    private $username;

    private $email;

    private $permissions = [];

    private $password;

    private $salt;

    /**
     * @var \PDO $db
     */
    private $db;

    /**
     * User constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function connect($username, $password)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username=:username');
        $stmt->bindParam(':username', $username);

        $stmt->execute();
        $user = $stmt->fetchAll();

        if ($user == null) {
            return false;
        }

        var_dump(password_verify($password, $user['password']), $user, $password);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['logged'] = true;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $data
     */
    public function register($username, $email, $passwd)
    {
        $salt = uniqid(mt_rand(), true);
        $password = password_hash($passwd, PASSWORD_DEFAULT);

        $query = $this->db->prepare('
          INSERT INTO users (username, email, password) 
          VALUES (:username, :email, :password)
        ');

        $query->bindParam('username', $username);
        $query->bindParam('password', $password);
        $query->bindParam('email', $email);

        if ($query->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;

            return true;
        } else {
            return false;
        }
    }

    public function checkPermissions()
    {

    }

    /**
     * @param string $email
     * @param string $username
     * @return bool
     */
    public function checkIfUserNotRegistered($email, $username)
    {
        $checkQuery = $this->db->prepare('SELECT * FROM users WHERE email = :email OR username = :username');
        $checkQuery->bindParam('email', $email);
        $checkQuery->bindParam('username', $username);

        $checkQuery->execute();
        $checkResults = $checkQuery->fetchAll();

        if (count($checkResults) > 0) {
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
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
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
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
