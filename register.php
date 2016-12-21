<?php

include_once 'bootstrap.php';

// on vérifie les données fournies par le formulaire
if (
    isset($_POST['password']) && $_POST['password'] !== ''
    && isset($_POST['username']) && $_POST['username'] !== ''
    && isset($_POST['email']) && $_POST['email'] !== ''
) {
    // On vérifie que l'utilisateur n'est pas déjà inscrit sinon on renvoit un warning
    if ($user->checkIfUserNotRegistered($_POST['email'], $_POST['username'])) {
        $user->register($_POST['username'], $_POST['email'], $_POST['password']);
    } else {
        $app->addFlash('warning', 'Cette adresse mail est déjà utilisée');
    }
}

include_once $app->getConfig()['app']['app_dir'].'pages/register.php';