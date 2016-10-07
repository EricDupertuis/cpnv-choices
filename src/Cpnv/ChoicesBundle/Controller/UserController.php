<?php

namespace Cpnv\ChoicesBundle\Controller;

use Cpnv\ChoicesBundle\Db\QueryBuilder;

/**
 * Class UserController
 * @package Cpnv\ChoicesBundle\Controller
 * @author Eric Dupertuis
 */
class UserController extends AbstractController
{
    /**
     * @return string|void
     */
    public function indexAction()
    {
        if (isset($_POST['login']) && $_POST['login'] == true) {
            $this->redirect('/');
        }

        if (!empty($_POST)) {
            try {
                $this->login($_POST['email'], $_POST['password']);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        return $this->render('login.php', ['test' => 'doggo', 'var' => 1]);
    }

    /**
     * @param $email
     * @param $pass
     */
    private function login($email, $pass)
    {
        $qb = new QueryBuilder();
        $qb->select('user')
            ->where('email', '=', $email)
            ->andWhere('password', '=', $pass);

        $db = $this->getDB();
        var_dump($qb->getQuery());
        $db->execute($qb->getQuery());

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        var_dump($hash);

        //$user = $this->dbConnection->execute($qb->getQuery());
    }
}
