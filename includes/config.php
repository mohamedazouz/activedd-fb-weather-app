<?php

// if u work on local machine, then enable this option, this uses next static values instead of real ones, all from 'includes/localmode.php' :
// $session, $uid, $me
define("LOCAL_MODE", true);


// Database Configuration
if (LOCAL_MODE) {
    define("DB_HOST", "192.168.1.201");
    define("DB_USER", "weather");
    define("DB_PASS", "xwwx11");
    define("DB_DATABASE", "weather");
    define("FACEBOOK_APPLICATION_ID", "132288390221814");
    define("FACEBOOK_APPLICATION_SECRET", "4106ee3f534188d928c131e0ee62cfe5");
    define("LOCAL_TIME", "0");
    define("FACEBOOK_APPLICATION_URL", "http://localhost/weatherforcast/includes/facebook_auth/fb_authenticate.php?code");
} else {

    define("DB_HOST", "localhost");
    define("DB_USER", "weather");
    define("DB_PASS", "qunEMIF09*&");
    define("DB_DATABASE", "weather");
    define("FACEBOOK_APPLICATION_ID", "289837461064230");
    define("FACEBOOK_APPLICATION_SECRET", "8b5c0f3518eedf3ba199c1cbd0e6814c");
    define("LOCAL_TIME", "6");
    define("FACEBOOK_APPLICATION_URL", "http://fbcommons.activedd.com/weatherforcast/includes/facebook_auth/fb_authenticate.php?code");
}
date_default_timezone_set('Africa/Cairo');
//facebook keys
define("FACEBOOK_AUTH_URL", "https://www.facebook.com/dialog/oauth?client_id=");
define("FACEBOOK_AUTH_URL_REDIRCT_PARAM", "&redirect_uri=");
define("FACEBOOK_AUTH_URL_PERMISSION_PARAM", "&scope=");
define("FACEBOOK_APPLICATION_PERMISSION", "publish_stream,offline_access,manage_pages");

//weather url
define("WeatherForecastURL", "http://free.worldweatheronline.com/feed/weather.ashx");
define("WeatherKeyAPI", "9e471fd5c5151005111909");


define("default_place", "Cairo,Egypt");
?>
