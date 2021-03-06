<?php $img = getfileName($current_weather[0]['weatherIconUrl'][0]['value']) ?>
<div class="wrapper <?= $img ?>">
    <div class="weather-result">
        <div class="weather-states"></div>
        <div class="view">
            <table width="230" height="150" border="0"><tr><td valgin="middle"><?= $city['Name'] ?> <br/>
<?= $current_weather[0]['temp_C'] . "°-" . $other_weather[0]['tempMinC'] . "°" ?></td></tr></table>


        </div>
        <div class="weather_states_title"> <?= $current_weather[0]['weatherDesc'][0]['value'] ?></div>
        <div class="weather_staticses">
            <div class="weather_staticses_1">
                humidity  <br/>
                wind speed <br/>
                pressure
            </div>
            <div class="weather_staticses_2">
<?= $current_weather[0]['humidity'] ?>%  <br/>
                <?= $current_weather[0]['windspeedKmph'] ?>km/h <br/>
                <?= $current_weather[0]['pressure'] ?> h Pa</div>
        </div>
        <div style="clear:both"></div>
        <div class="weather-table">
            <table width="392" border="0" cellspacing="0" cellpadding="0">
                <tr class="day">
<?php
                $size = sizeof($other_weather);
                $i = 0;
                foreach ($other_weather as $value) {
?>
                    <td><?= date("D", strtotime($value['date'])) ?></td>
<?php if (++$i < $size) {
?>
                        <td rowspan="3" valign="bottom"><img src="images/sep.png" width="1" height="69" /></td>
<?php }
                } ?>
                </tr>
                <tr>
<?php
                foreach ($other_weather as $value) {

                    $img_value = getfileName($value['weatherIconUrl'][0]['value']);
?>

                    <td><img src="images/icons/<?= $img_value ?>.png" width="65"   /></td>
<?php } ?>
                </tr>
                <tr class="temp">
<?php foreach ($other_weather as $value) {
?>
                    <td><?= "{$value['tempMaxC']}°- {$value['tempMinC']}°" ?></td>
<?php } ?>
                </tr>
            </table>

        </div>

    </div>
</div>
<?

                function getfileName($img) {
                    $img = explode("/", $img);
                    $img = explode(".", $img[sizeof($img) - 1]);
                    $img = $img[0];
                    return $img;
                }
?>