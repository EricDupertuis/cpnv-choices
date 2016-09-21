<?php

namespace Cpnv\ChoicesBundle\User;

use Cpnv\ChoicesBundle\Entity\User;

/**
 * Class UserManager
 * @package Cpnv\ChoicesBundle\User
 */
class UserManager
{
    const ROLES = ['ANON', 'USER', 'ADMIN'];

    private $user;

    public function __construct()
    {
        $this->user = new User();
        session_start();

        if (isset($_SESSION['username']) && $_SESSION['isLogged'] === true) {
            $this->user->setUsername($_SESSION['username']);
            $this->user->setId($_SESSION['id']);
            $this->user->setEmail($_SESSION['email']);
        }
    }
}
