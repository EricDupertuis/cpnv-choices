<?php include_once 'incs/head.php'; ?>
    <div class="container">
        <div class="main">
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <label for="question1">Question 1</label>
                <input type="text" id="question2" name="question1">

            <label for="question2">Question 2</label>
            <input type="text" id="question2" name="question2">

            <input type="submit" value="submit">
        </form>
    </div>
<?php include_once 'incs/footer.php';
