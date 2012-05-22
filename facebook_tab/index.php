<?php

require_once '../includes/init.php';

/*
 *
 * patchy_rain_nearby
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png

 * * overcast
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0004_black_low_cloud.png
 *
 * partly_cloudy
 * * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0002_sunny_intervals.png
 *
 * thundery_outbreaks_in_nearby
 *
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0016_thundery_showers.png
 *
 * moderat_or_heavy_rain_in_area_with_thunder
 *
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0024_thunderstorms.png
 *
 * moderate_or_heavy_rain_shower
 *http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0010_heavy_rain_showers.png
 *
 * mist
 *http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0006_mist.png
 *
 * moderate_rain
 *
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0018_cloudy_with_heavy_rain.png
 *
 *
 * heavy_rain
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0018_cloudy_with_heavy_rain.png
 *
 light_drizzle
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0017_cloudy_with_light_rain.png
 *
 *patchy_light_drizzle
 *http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png
 */
$countries = $db->select("countries");

include 'tab_page.php';
?>