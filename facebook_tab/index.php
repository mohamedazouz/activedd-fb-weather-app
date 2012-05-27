<?php

require_once '../includes/init.php';


$default_city = file_get_contents("http://freegeoip.net/json/{$_SERVER['REMOTE_ADDR']}");
$default_city = json_decode($default_city, true);
$default_city = $db->select_record("cities", "Name ='{$default_city['city']}'");

$countries = $db->select("countries");

include 'tab_page.php';
?>