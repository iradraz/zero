<script>
    $(function ()
    {
        $("form").submit(function ()
        {
            $(this).children(':input[value=""]').attr("disabled", "disabled");

            return true; // ensure form still submits
        });
    });
</script>
<h1>Add question to test</h1>
<form action="<?php echo base_url('questions/addquestions/') . $test_id; ?>" method="post">
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

<h1>Question of the test - Zero test</h1>
<?php
$this->load->module('test');
$sequence = $this->test->sequence_test_questions($test_id);
foreach ($sequence as $x => $x_value) {
    echo '<h2>' . ($x+1) . '. ' . $x_value['question_asked'] . '</h2>';
    echo '<ol>';
    foreach ($x_value['answers'] as $answer_key => $answer_array) {
        echo '<li>' . $answer_array['answer'] . '</li>';
    }
    echo '</ol>';
}
?>
<br>
Generate mixed answer test