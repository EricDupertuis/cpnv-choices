<?php include_once 'incs/head.php'; ?>
    <div class="souspage">
        <div class="container">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                <h1>Importer des questions</h1>
                <input type="file" name="uploadedCsv" id="uploadedCsv">
                <input type="submit" value="Uploader un fichier CSV" name="submit">
            </form>
        </div>
    </div>
<?php include_once 'incs/footer.php';
