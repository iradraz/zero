<script>
$(function()
{
    $("form").submit(function()
    {
        $(this).children(':input[value=""]').attr("disabled", "disabled");

        return true; // ensure form still submits
    });
});
</script>
<form action="<?php echo base_url('questions/addquestions/') . $test_id;?>" method="post">
    Question #: <textarea  col="15" row="3" name="question_asked"></textarea><br>
    <b>Correct Answer</b>:<br> <textarea  col="15" row="3" name="answer1"></textarea><input type="checkbox" name="correct_answer" disabled checked><br>
    <input type="hidden" name="test_id" value="<?php echo $test_id; ?>" />
    <input type="hidden" name="answer_correct" value="1" />
    Wrong Answer:<br> <textarea  col="15" row="3" name="answer2"></textarea><br>
    Wrong Answer:<br> <textarea  col="15" row="3" name="answer3"></textarea><br>
    Wrong Answer:<br> <textarea  col="15" row="3" name="answer4"></textarea><br>
    Wrong Answer:<br> <textarea  col="15" row="3" name="answer5"></textarea><br>
    Wrong Answer:<br> <textarea  col="15" row="3" name="answer6"></textarea><br>
    <input type="submit" value="Submit">
</form>
<br><br>
second section shows questions of the test