
<tr id="rec_<?php echo $rec['id']; ?>">
    <td><?php echo $rec['page_name']; ?></td>
    <td><?php $city = $db->select_record("cities", "ID ={$rec['city']}");
echo $city['Name']; ?></td>
    <td><?php
        $hour = ($rec['hour'] + LOCAL_TIME);
        if ($hour > 23) {
            $hour = $hour - 23 - 1;
        }
        echo $hour;
?></td>
    <td><?php echo $rec['min']; ?></td>
    <td><a href="javascript:void(0)" onclick="delete_record(<?php echo $rec['id']; ?>)">X</a></td>
</tr>