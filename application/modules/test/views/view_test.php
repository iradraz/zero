<h1>Question of the test - Zero test</h1>
<?php
$this->load->module('test');
$sequence = $this->test->sequence_test_questions($test_id);
foreach ($sequence as $x => $x_value) {
    echo '<h2>' . ($x + 1) . '. ' . $x_value['question_asked'] . '</h2>';
    echo '<ol>';
    foreach ($x_value['answers'] as $answer_key => $answer_array) {
        echo '<li>' . $answer_array['answer'] . '</li>';
    }
    echo '</ol>';
}