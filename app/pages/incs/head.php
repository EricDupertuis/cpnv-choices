<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Kingdom</title>
    <link href="/public/style.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <header class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <img id="logo" src="/public/images/kingdom-logo.png" alt="Logo - Kingdom">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <ul class="nav">
                        <?php if ($_SESSION['logged']) : ?>
                            <li><a class="menu" href="/logout">Se déconnecter</a></li>
                        <?php else: ?>
                            <li><a class="menu" href="/login">Se connecter</a></li>
                        <?php endif; ?>
                        <li><a class="menu" href="/register">S'inscrire</a></li>
                        <span id="line-menu"></span>
                    </ul>
                </div>
            </div>
        </header>