<?php include_once 'incs/head.php'; ?>
    <div class="souspage">
        <div class="container">
            <div class="main">
                <h1>
                    <?php if ($user->isAdmin()): ?>
                        Ajouter une question
                    <?php else: ?>
                        Proposer une question
                    <?php endif; ?>
                </h1>
                <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                    <label for="question1">Question 1</label>
                    <input type="text" id="question2" name="question1">

                    <label for="question2">Question 2</label>
                    <input type="text" id="question2" name="question2">

                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
<?php include_once 'incs/footer.php';
