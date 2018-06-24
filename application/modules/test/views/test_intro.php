Test name: <?php
foreach ($query->result() as $row)
    echo $row->test_name;
?> 
<br>
<br><a href="<?php echo base_url('questions/addquestions/') . $row->test_id?>"> add questions</a>
<br>show questions
<br>generate mixed test

<br><br>
return