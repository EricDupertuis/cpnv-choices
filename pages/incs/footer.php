                </div>
            <footer>
                <p>© Kingdom - 2016</p>
                <p>
                    <?php
                        if (isset($_SESSION['logged'])) {
                            echo 'logged as ' . $_SESSION['username'];
                        } else {
                            echo 'not logged in';
                        }
                    ?>
                </p>
            </footer>
        </div>
        <script src="/public/js/script.js"></script>
    </body>
</html>