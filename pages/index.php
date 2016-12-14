<?php include_once 'incs/head.php'; ?>
<div class="container-fluid">
    <div class="main">
        <p>Tu préfères...</p>
        <form id="choice-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="solution left" id="q1">
                        <input name="q1" type="radio" href="#" value="1"> <?php echo $question['answer_two']; ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="solution right" id="q2">
                        <input name="q2" type="radio" href="#" value="1"> <?php echo $question['answer_two']; ?>
                    </div>
                </div>
            </div>
            <input type="hidden" name="qid" value="<?php echo $question['id']; ?>">
        </form>
        <div class="or">
            <p>OU</p>
        </div>
    </div>
</div>
<?php include_once 'incs/footer.php';
