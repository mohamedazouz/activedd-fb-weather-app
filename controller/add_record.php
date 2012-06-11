<?php

require_once '../includes/init.php';

$hour = ($_POST['hour'] - LOCAL_TIME);
if ($hour < 0) {
    $hour = 23 - abs($hour) + 1;
}
$_POST['hour'] = $hour;
$id = $db->insert("post_timer", $_POST);

$rec = $db->select_record("post_timer", "id=$id");
$records = $db->select("post_timer");
$output = "";
foreach ($records as $value) {
    $file = __dir__ . "/../cron/cron_record.php {$value['id']}";
    $output .= "{$value['min']} {$value['hour']} * * * php $file\n";
}
file_put_contents('/tmp/crontab.txt', $output . PHP_EOL);
echo exec('crontab /tmp/crontab.txt');
include 'timer_page.php';
?>
