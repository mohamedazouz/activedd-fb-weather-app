<?php

include 'config.php';
include_once'facebook-php-sdk/src/facebook.php';


$cities = array("Cairo,Egypt", "Alexandria,Egypt", "Sharm,Egypt");

$facebook = new Facebook(array(
            'appId' => FACEBOOK_APPLICATION_ID,
            'secret' => FACEBOOK_APPLICATION_SECRET,
        ));
$facebook->setAccessToken($page['access_token']);

foreach ($cities as $city) {
    $city_ = urlencode($city);
    $num_of_days = $days ? "&num_of_days=2" : "";
    $url = WeatherForecastURL . "?key=" . WeatherKeyAPI . "&q=" . $city_ . "&format=json" . $num_of_days;
    $response_weather = file_get_contents($url);
    $response_weather = json_decode($response_weather, true);
    $jsonData = array();
    $message=$lang==0?"Latest weather updates Brought to you  by ":"‫أخر أخبار الطقس و الحاله الجويه‬ من  ";
    $jsonData['message'] = "$message{$page['name']}";
    $jsonData['link'] = "https://www.facebook.com/pages/{$page['name']}/{$page['id']}?sk=app_" . FACEBOOK_APPLICATION_ID;
    $name = $response_weather["data"]["request"][0]["query"];
    $jsonData['name'] = $name;
    $jsonData['caption'] = ($response_weather["data"]["current_condition"][0]["temp_C"] . " &deg;C  - " . $response_weather["data"]["current_condition"][0]["windspeedKmph"] . " Kmph");
    $jsonData['picture'] = ($response_weather["data"]["current_condition"][0]["weatherIconUrl"][0]["value"]);
    $jsonData['description'] = ($response_weather["data"]["current_condition"][0]["weatherDesc"][0]["value"]);
    $jsonData['access_token'] = $page['access_token'];
    $result = $facebook->api("/{$page['id']}/feed/",
                    'post',
                    $jsonData);
    echo json_encode($result);
}
?>