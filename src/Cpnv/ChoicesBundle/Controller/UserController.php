<?php

namespace Cpnv\ChoicesBundle\Controller;

/**
 * Class UserController
 * @package Cpnv\ChoicesBundle\Controller
 * @author Eric Dupertuis
 */
class UserController extends AbstractController
{
    public function indexAction()
    {
        if (isset($_POST['login']) && $_POST['login'] == true) {
            $this->redirect('/');
        }
        $vars = [
            'test'
        ];

        echo $this->render('login.html', $vars);
    }
}
