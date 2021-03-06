<?php

/**
 * Class User
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 04.11.2016
 */
class User
{
    private $username;

    private $email;

    private $password;

    private $isAdmin;

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

        if (password_verify($password, $user[0]['password'])) {
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['logged'] = true;


            if ($user[0]['isAdmin'] == 1) {
                $_SESSION['isAdmin'] = true;
            }

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
        $password = password_hash($passwd, PASSWORD_BCRYPT);

        $query = $this->db->prepare('
          INSERT INTO users (username, email, password) 
          VALUES (:username, :email, :password)
        ');

        $query->bindParam('username', $username);
        $query->bindParam('password', $password);
        $query->bindParam('email', $email);

        if ($query->execute()) {
            $this->connect($username, $password);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isLogged()
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
            return true;
        }

        return false;
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
     * @return bool
     */
    public function getId()
    {
        if (isset($_SESSION['id'])) {
            return $_SESSION['id'];
        }


        return false;
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
