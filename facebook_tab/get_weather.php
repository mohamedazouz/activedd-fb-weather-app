<?php

require_once '../includes/init.php';
if ($_POST['city_id']) {
    $city = $db->select_record("cities", "ID={$_POST['city_id']}");
    $country = $db->select_record("countries", "Code='{$city['CountryCode']}'");
    $query = array("city" => $city['Name'] . "," . $country['Name']);

    $geocode = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($query['city']) . '&sensor=false');

    $output = json_decode($geocode);
    $lat = $output->results[0]->geometry->location->lat;
    $lon = $output->results[0]->geometry->location->lng;



    $city_ = $lat . "," . $lon;

    $num_of_days = "&num_of_days=5";
    $url = WeatherForecastURL . "?key=" . WeatherKeyAPI . "&q=" . $city_ . "&format=json" . $num_of_days;
echo $url;
    $response_weather = file_get_contents($url);
    $response_weather = json_decode($response_weather, true);
    $current_weather = $response_weather['data']['current_condition'];
    $other_weather = $response_weather['data']['weather'];
    
//    $out = array($jsonData);
//
//    for ($i = 0; $i < 5; $i++) {
//        array_push($out, getDayWeather($response_weather["data"]["weather"][$i], $i));
//    }
    include 'weather_condition.php';
}

function getDayWeather($response_weather, $day) {
    $jsonData = array();
    $jsonData['msg'] = "Lastest Weather Observation";
    $jsonData['link'] = "";
    $jsonData['name'] = date("D", strtotime("+" . $day . " day")) . "(" . $response_weather['date'] . ")";
    $jsonData['caption'] = $response_weather["tempMinC"] . " &deg;C  , " . $response_weather["tempMaxC"] . " &deg;C  - " . $response_weather["windspeedKmph"] . " Kmph";
    $jsonData['img'] = $response_weather["weatherIconUrl"][0]["value"];
    $jsonData['des'] = $response_weather["weatherDesc"][0]["value"];
    return $jsonData;
}

?>
