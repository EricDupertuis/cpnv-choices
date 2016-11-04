<!DOCTYPE html>
<html>
    <?php include_once 'incs/head.php'?>
    <body>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="submit">
        </form>
    </body>
</html>