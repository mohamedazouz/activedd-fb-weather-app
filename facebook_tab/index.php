<?php

require_once '../includes/init.php';

$countries = $db->select("countries");

include 'tab_page.php';
?>