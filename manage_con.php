<?php

require_once 'includes/init.php';
$me = empty2false($auth->data);

if (!$me) {
    include 'login.php';
} else {
    $countries = $db->select("countries");
    $post_pages= $db->select("post_timer");
    include 'mange_pages.php';
}
?>