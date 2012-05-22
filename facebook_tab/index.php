<?php

require_once '../includes/init.php';

/*
 *
 * patchy_rain_nearby
 *http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png

 * * overcast
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0004_black_low_cloud.png
 *
 * partly_cloudy
 * * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0002_sunny_intervals.png
 *
 */
$countries = $db->select("countries");

include 'tab_page.php';
?>