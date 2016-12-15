<?php include_once 'incs/head.php'; ?>
    <div class="container-fluid">
        <div class="souspage">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                Select file to upload:
                <input type="file" name="uploadedCsv" id="uploadedCsv">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
<?php include_once 'incs/footer.php';
