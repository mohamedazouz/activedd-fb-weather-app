<?php

$country = file_get_contents('http://freegeoip.net/json/' . $_SERVER['REMOTE_ADDR']);
$country=json_decode($country, true);
echo json_encode($country)."<br>";
echo $country['country_name'].",".$country['city']."<br>";
echo $country['region_name'].",".$country['country_code'];
?>