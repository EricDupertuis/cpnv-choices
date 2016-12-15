<?php include_once 'incs/head.php'; ?>
    <div class="container-fluid">
        <div class="souspage">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                Export:
                <input type="hidden" value="ok" name="export">
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
    </div>
<?php include_once 'incs/footer.php';
