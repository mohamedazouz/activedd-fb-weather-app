$(function(){
    $("#country_id").change(function(){
        if(!$(this).val()){
            $("#city").html('<option value="">Select City</option>');
        }else{
            $.post("../controller/getcities.php", {
                "code":$(this).val()
            }, function(response){
                $("#city").html(response);
                $("#city").change();
                $("#city").show();
            })
        }
    });
    $("#city").change(function(){
        if($(this).val()){ 
            $.post("get_weather.php", {
                "city_id":$(this).val()
            }, function(response){
                $("#weather_condition").html(response);
            })
        }
    });
    
})