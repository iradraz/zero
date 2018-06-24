<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 75%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr {
    }
</style>
<h2>Full Available Tests:</h2>

<table>

    <tr>
        <th>Test num</th>
        <th>Test name</th>
        <th># of Questions</th>
        <th>Action</th>
    </tr>
    <?php foreach ($query as $key => $value) { ?>
        <tr>
            <td><?php echo ($key + 1); ?></td>
            <td><?php echo $value['test_name']; ?></td>
            <td><?php echo $value['count']; ?></td>
            <td>
                <a href="<?php echo base_url('test/view_test/' . $value['test_id']); ?>">View Test</a> |
                <a href="<?php echo base_url('test/edit_test/' . $value['test_id']); ?>">Edit Test</a> |
                <a href="<?php echo base_url('test/mix_test/' . $value['test_id']); ?>">Mixed Test</a>
            </td>
        </tr>
    <?php } ?>
</table>