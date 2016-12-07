<?php include_once 'incs/head.php'; ?>
    <div class="container">
        <div class="main">
            <table>
                <tr>
                    <th>question 1</th>
                    <th>question 2</th>
                    <th>Valider</th>
                </tr>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td><?php echo $result['question1'] ?></td>
                        <td><?php echo $result['question2'] ?></td>
                        <td><a href="#">Valider</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php include_once 'incs/footer.php';
