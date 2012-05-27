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
		$("#weather_condition").html('<div class="loading"></div>');
            getWeather($(this).val(),function(response){
                $("#weather_condition").html(response);
            });
        }
    });
    var city=$("#default_city").val()?$("#default_city").val():"608";
    getWeather(city,function(response){
        $("#weather_condition").html(response);
    });

    
})

function getWeather(value,callback){
    $.post("get_weather.php", {
        "city_id":value
    }, function(response){
        callback(response);
    })
}