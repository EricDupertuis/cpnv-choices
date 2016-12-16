<?php include_once 'incs/head.php'; ?>
    <div class="container-fluid">
        <div class="souspage">
            <div class="souspage-content">
                <table>
                    <tr>
                        <th>question 1</th>
                        <th>question 2</th>
                        <th>Valider</th>
                    </tr>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?php echo $result['answer_one'] ?></td>
                            <td><?php echo $result['answer_two'] ?></td>
                            <td><a href="<?php echo $_SERVER['REQUEST_URI'] . '?validateId=' . $result['id']; ?>">Valider</a></td>
                t        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php include_once 'incs/footer.php';
