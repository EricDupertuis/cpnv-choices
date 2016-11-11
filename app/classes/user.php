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
        $stmt = $this->db->prepare('SELECT * users WHERE username=:username');
        $stmt->bindParam(':username', $username);

        $stmt->execute();
        $user = $stmt->fetchAll();

        if ($user == null) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['password'] = $user['password'];

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $data
     */
    public function register($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO \'user\' (username, email, password, permissions)
            VALUES (:username, :email, :password, :permissions)
        ');

        if (isset($data['username']) && $data['username'] != '') {

        }
    }

    public function checkPermissions()
    {

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
