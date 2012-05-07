<?php

require_once '../includes/init.php';
if ($_POST['id']) {
    $rec = $db->delete("post_timer", "id = {$_POST['id']}");
    $records = $db->select("post_timer");
    $output = "";
    foreach ($records as $value) {
        $file = __dir__ . "/../cron/cron_record.php {$value['id']}";
        $output .= "{$value['min']} {$value['hour']} * * * php $file\n";
    }
    file_put_contents('/tmp/crontab.txt', $output . PHP_EOL);
    echo exec('crontab /tmp/crontab.txt');
}
?>
