<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
include 'includes/config.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>All About Egypt</title>
        <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="//connect.facebook.net/en_US/all.js"></script>        
        <script type="text/javascript">
            $(document).ready(function(){
                cities=[
                    "Cairo,Egypt",
                    "Alexandria,Egypt",
                    "Sharm,Egypt"
                ];
                for(i=0;i<cities.length;i++){
                    $.post("controller/postweather.php", {"city":cities[i]}, function(response){
                        page={
                            "name":"Prog Mania",
                            "access_token":"AAAEHmwroyiYBAMcy1aHquy9gRiYvEqkmTJc5YJZCoviwrkY3BmKPBgZCkxpvgCmoWJZAZAzZBBRkhhXzjZCKsiJWpgZBHDvpdCOHdRJmp2cmAZDZD",
                            /*"name":"All About Egypt",
                            "access_token":"AAAEHmwroyiYBAAbSGPm4ZAbGq9XLH096e5WHn9COZBBXJMZC2ffSEpba2i0WcJFGAlGy9waudz8Yo5EV31kgTGh7cxYCZBIaqlBrHz90FAZDZD",
                            "id":"195035983885974"*/
                            "id":"103332079703347"

                        }
                        if(response.data.error){
                            alert("Wrong City");
                        }else{
                            lang=1;
                            var text=lang==1?"Latest weather updates Brought to you  by ":"‫أخر أخبار الطقس و الحاله الجويه‬ من  ";
                            post_page(page, response,text);
                        }
                    },"json")
                }
                function post_page(page,response,text){
                    id=<?php echo FACEBOOK_APPLICATION_ID ?>;
                    var jsonData={
                        msg:text+page.name,
                        link:"https://www.facebook.com/pages/"+encodeURI(page.name)+"/"+page.id+"?sk=app_"+id,
                        name:response.data.request[0].query,
                        caption:response.data.current_condition[0].temp_C + " &deg;C  - " + response.data.current_condition[0].windspeedKmph+" Kmph",
                        img:response.data.current_condition[0].weatherIconUrl[0].value,
                        des:response.data.current_condition[0].weatherDesc[0].value
                    }
                    FB.api("/"+page.id+"/feed",'post',{
                        access_token:page.access_token,
                        message:jsonData.msg,
                        picture:jsonData.img,
                        link:jsonData.link,
                        name:jsonData.name,
                        caption:jsonData.caption,
                        description:jsonData.des
                    }, function(response) {
                        document.write(JSON.stringify(response));
                    });
                }
            })
            
        </script>
    </head>
    <body>
    </body>
</html>