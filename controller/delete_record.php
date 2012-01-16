<?php

require_once '../includes/init.php';
if ($_POST['id']) {
    $rec = $db->delete("post_timer", "id = {$_POST['id']}");
}
?>
