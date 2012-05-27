
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Weather Application</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/custom-form-elements.js"></script>
        <link rel="stylesheet" type="text/css" href="js/form.css"/>

        <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="select_country">

                <select id="city" name="city_id" class="styled">
                    <option value="">Select City</option>
                </select>
                <label>CITIES</label>
                <select id="country_id" class="styled" name="country_id">
                    <option value="">Choose Country</option>
                    <?php foreach ($countries as $rec) {
                    ?>
                        <option  n="<?php echo $rec['Name'] ?>"  value="<?php echo $rec['Code'] ?>" ><?php echo $rec['Name'] ?></option>
                    <?php } ?>
                </select>
                <label>COUNTRY</label>
            </div>
            <div style="clear:both"></div>
            <input type="hidden" value="<?= $default_city['ID'] ?>" id="default_city"/>
            <div id="weather_condition">
			<div class="loading"></div>
            </div>
        </div>
    </body>
</html>
