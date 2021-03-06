<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Kingdom</title>
    <link href="/public/style.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="/vendor/jquery/jquery-2.2.4.min.js"></script>
</head>
<body>
    <div class="wrap">
        <header class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <a href="/"><img id="logo" src="/public/images/kingdom-logo.png" alt="Logo - Kingdom"></a>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <ul class="nav">
                        <?php if ($_SESSION['logged']) : ?>
                            <li><a class="menu" href="/logout.php">Se déconnecter</a></li>
                        <?php else: ?>
                            <li><a class="menu" href="/login.php">Se connecter</a></li>
                        <?php endif; ?>
                        <?php if (!$_SESSION['logged']) : ?>
                        <li><a class="menu" href="/register.php">S'inscrire</a></li>
                        <?php endif; ?>
                        <li><a class="menu" href="/addQuestion.php">Proposer une question</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <?php if (!empty($app->getFlash())) : ?>
            <div class="alert alert-<?php echo $app->getFlash()['type']?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $app->getFlash()['message']; ?>
            </div>
        <?php endif; ?>
