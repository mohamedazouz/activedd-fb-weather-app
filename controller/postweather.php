<?php

include_once '../includes/config.php';
if ($_POST['city']) {
    $city=  urlencode($_POST['city']);
    $num_of_days=$_POST['days']?"&num_of_days=2":"";
    $url = WeatherForecastURL . "?key=" . WeatherKeyAPI . "&q=" .$city  . "&format=json".$num_of_days;
    $response_weather = file_get_contents($url);
    echo $response_weather;
    /*$response_weather = json_decode($response_weather, true);
    $jsonData = array();
    $jsonData['msg'] = urlencode("Lastest Weather Observation Provided by " . $_POST['page_name']);
    $jsonData['link'] = "";
    $name = $response_weather["data"]["request"][0]["query"];
    $jsonData['name'] = urlencode(substr($name, 0, strpos($name, ",")));
    $jsonData['caption'] = urlencode($response_weather["data"]["current_condition"][0]["temp_C"] . " &deg;C  - " . $response_weather["data"]["current_condition"][0]["windspeedKmph"] . " Kmph");
    $jsonData['img'] = urlencode($response_weather["data"]["current_condition"][0]["weatherIconUrl"][0]["value"]);
    $jsonData['des'] = urlencode($response_weather["data"]["current_condition"][0]["weatherDesc"][0]["value"]);*/
    
    //$url = "https://api.facebook.com/method/stream.publish?access_token={$_POST['page_access_token']}&message={$jsonData['msg']}&picture={$jsonData['img']}&link={$jsonData['link']}&description={$jsonData['des']}&caption={$jsonData['caption']}";
    //$user_info = file_get_contents($url);
} else {
    echo "No Weather";
}
?>




