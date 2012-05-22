<?php

require_once '../includes/init.php';

/*
 *
 * patchy_rain_nearby  Done
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png

 * * overcast done
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0004_black_low_cloud.png
 *
 * partly_cloudy Done
 * * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0002_sunny_intervals.png
 *
 * thundery_outbreaks_in_nearby Done
 *
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0016_thundery_showers.png
 *
 * moderat_or_heavy_rain_in_area_with_thunder Done
 *
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0024_thunderstorms.png
 *
 * moderate_or_heavy_rain_shower done
 *http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0010_heavy_rain_showers.png
 *
 * mist ?????
 *http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0006_mist.png
 *
 * moderate_rain done
 *
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0018_cloudy_with_heavy_rain.png
 *
 *
 * heavy_rain done
 * http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0018_cloudy_with_heavy_rain.png
 *
 light_drizzle done
 * http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0017_cloudy_with_light_rain.png
 *
 *patchy_light_drizzle done
 *http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png
 
 light_rain_shower done
 http:\/\/www.worldweatheronline.com\/images\/wsymbols01_png_64\/wsymbol_0009_light_rain_showers.png
 
 *light_snow
 *http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0011_light_snow_showers.png
 
 *thundery_outbreaks_in_nearby
 http://www.worldweatheronline.com//images//wsymbols01_png_64//wsymbol_0032_thundery_showers_night.png
 
 */
$countries = $db->select("countries");

include 'tab_page.php';
?>