            <footer>
                <p>© Kingdom - 2016</p>
                <p>
                    <?php
                        if ($_SESSION['logged']) {
                            echo 'logged as' . $_SESSION['username'];
                        } else {
                            echo 'not logged';
                        }
                    ?>
                </p>
            </footer>
        </div>
    </body>
</html>