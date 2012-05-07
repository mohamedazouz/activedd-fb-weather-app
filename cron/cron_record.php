<?php

include 'config.php';
include_once'facebook-php-sdk/src/facebook.php';
require_once 'db.php';
// database
$db = new Cdb();
$db->connect();
$db->execute("SET NAMES 'utf8'");
$db->execute("SET time_zone = '+02:00'");

$rec = $db->select_record("post_timer", "id=$argv[1]");
$city = $db->select_record("cities", "ID={$rec['city']}");
$country= $db->select_record("countries", "Code='{$city['CountryCode']}'");

$page = array("name" => $rec['page_name'],
    "access_token" => $rec['page_access_token'],
    "id" => $rec['page_id'], "city" => $city['Name'].",".$country['Name']);
$lang = 1;
$days = 0;
include 'post_record.php';
?>
