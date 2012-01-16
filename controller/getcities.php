<?php

require_once '../includes/init.php';

if ($_POST['code']) {
    $cities = $db->select("cities", "CountryCode = '{$_POST['code']}'");
    include 'cities.php';
} else {
    echo "No City Found";
}
?>
