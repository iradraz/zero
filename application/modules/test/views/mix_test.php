<div class="questions">
    <h1>Question of the test - mixed test</h1>
    <br>
    <?php
    $this->load->module('test');
    $sequence = $this->test->mix_test_questions($test_id);
    foreach ($sequence as $x => $x_value) {
        echo '<h2>' . ($x + 1) . '. ' . $x_value['question_asked'] . '</h2>';
        echo '<ol>';
        foreach ($x_value['answers'] as $answer_key => $answer_array) {
            echo '<li>' . $answer_array['answer'] . '</li>';
        }
        echo '</ol>';
    }
    ?>
    <br>
</div>
<div class="answers">
    <style>
        th{
            background-color: #4CAF50;
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 6px;
            padding-right: 6px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;

        }
        td{

            text-align: center;
        }
    </style>

    <h2>Answer key table:</h2>

    <table>
        <tr>
            <th>#</th>
            <th>Answer</th>
        </tr>
        <?php foreach ($sequence as $x => $x_value) { ?>
            <tr>
                <td><?php echo ($x + 1); ?></td>
                <?php
                $counter = 1;
                foreach ($x_value['answers'] as $answer_key => $answer_array) {

                    if ($answer_array['answer_correct'] == 1) {
                        echo '<td>' . $counter . '</td>';
                        $counter = 1;
                    }
                    $counter++;
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class = "2nd-section">
    <h4>Test Actions:</h4>
    <a href = "<?php echo base_url('test/generatePDF/') . $test_id; ?>" target="_blank">Generate PDF</a>
</div>