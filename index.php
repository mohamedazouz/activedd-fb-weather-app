<?php

require_once 'includes/init.php';
$me = empty2false($auth->data);

if (!$me) {
    include 'login.php';
} else {
    $countries=$db->select("countries");
    include 'admin_home.php';
}

?>

