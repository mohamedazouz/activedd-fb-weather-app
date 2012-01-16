<?php

require_once '../includes/init.php';

$id = $db->insert("post_timer", $_POST);
$rec = $db->select_record("post_timer", "id=$id");
include 'timer_page.php';
?>
