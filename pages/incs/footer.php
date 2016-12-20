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
                <?php if ($user->isAdmin()): ?>
                    <ul>
                        <li>
                            <a class="menu" href="/export.php">Exporter les questions</a>
                        </li>
                        <li>
                            <a class="menu" href="/submittedQuestions.php">Valider les questions</a>
                        </li>
                        <li>
                            <a class="menu" href="/import.php">Importer des questions</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </footer>
        </div>
        <script src="/public/js/script.js"></script>
    </body>
</html>