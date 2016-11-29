function nextQuestion(val) {
    console.log(val);
};

$('.left').click(function () {
    console.log(0);
    nextQuestion(0);
});
$('.right').click(function () {
    nextQuestion(1)
});