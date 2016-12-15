<?php include_once 'incs/head.php' ?>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
        <div class="container-fluid">
            <div class="souspage">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="submit">
            </div>
        </div>
    </form>
<?php include_once 'incs/footer.php'; ?>