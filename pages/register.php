<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Kingdom</title>
    <link href="/public/style.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrap">
        <div class="container-fluid">
            <div class="main">
                <p class="log-logo">
                    <img id="logo" src="../public/images/kingdom-logo.png" alt="Logo - Kingdom">
                </p>
                <div class="log">
                    <h1>Inscription</h1>
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">

                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
<?php include_once 'incs/footer.php'; ?>