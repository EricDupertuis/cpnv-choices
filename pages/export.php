<?php include_once 'incs/head.php'; ?>
    <div class="souspage">
        <div class="container">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                <h1>Exporter les questions</h1>
                <input type="hidden" value="ok" name="export">
                <input type="submit" value="exporter" name="submit">
            </form>
        </div>
    </div>
<?php include_once 'incs/footer.php';
