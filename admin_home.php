<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <!-- facebook-->
        <script type="text/javascript">

            String.prototype.capitalize = function(){ //v1.0
                return this.replace(/\w+/g, function(a){
                    return a.charAt(0).toUpperCase() + a.substr(1).toLowerCase();
                });
            };
            function signout(){
                FB.logout(function(response) {
                    $("#user-loginned").hide();
                });
            }
            $(document).ready(function(){
                
                id=<?php echo FACEBOOK_APPLICATION_ID ?>;
                FB.init({appId: id, status: true, cookie: true, xfbml: true});
                FB.getLoginStatus(function(response){
                    if (response.status === 'connected') {
                        var uid = response.authResponse.userID;
                        accessToken = response.authResponse.accessToken;
                        FB.api('/me',{
                            access_token:accessToken
                        }, function(response) {
                            var out='<a href="http://facebook.com/'+response.username+'">'+response.name+'</a>';
                            out+= "<br>"+"Wrong account? "+'<a onclick="signout()" href="javascript:void(0)">Sign out of Facebook. </a>';
                            $("#facebook-username").html(out);
                            $("#facebook-upp").attr("src", "https://graph.facebook.com/"+response.username+"/picture")
                            $("#container").show();
                            FB.api('/me/accounts',{
                                access_token:accessToken
                            }, function(response) {
                                $("#auth").hide();
                                var out='<option value="">Select Page</option>';
                                for(i=0;i<response.data.length;i++){
                                    out+='<option  id="'+response.data[i].id+'" n="'+response.data[i].name+'"  value="'+response.data[i].access_token+'" >'+response.data[i].name+'</option>'
                                }
                                $("#facebook_pages").html(out);
                            })
                        });

                    } else if (response.status === 'not_authorized') {
                    } else {
                    }
                });
                $("#auth").click(function(){
                    var accessToken="";
                    FB.getLoginStatus(function(response){
                        if (response.status === 'connected') {
                            var uid = response.authResponse.userID;
                            accessToken = response.authResponse.accessToken;
                            FB.api('/me',{
                                access_token:accessToken
                            }, function(response) {
                                $("#auth").hide();
                                var out='<a href="http://facebook.com/'+response.username+'">'+response.name+'</a>';
                                out+= "<br>"+"Wrong account? "+'<a onclick="signout()" href="javascript:void(0)">Sign out of Facebook. </a>';
                                $("#facebook-username").html(out);
                                $("#facebook-upp").attr("src", "https://graph.facebook.com/"+response.username+"/picture")
                                $("#container").show();
                                FB.api('/me/accounts',{
                                    access_token:accessToken
                                }, function(response) {
                                    var out='<option value="">Select Page</option>';
                                    for(i=0;i<response.data.length;i++){
                                        out+='<option  id="'+response.data[i].id+'" n="'+response.data[i].name+'"  value="'+response.data[i].access_token+'" >'+response.data[i].name+'</option>'
                                    }
                                    $("#facebook_pages").html(out);
                                })
                            });

                        } else if (response.status === 'not_authorized') {
                            window.location ="<?php echo FACEBOOK_AUTH_URL . FACEBOOK_APPLICATION_ID . FACEBOOK_AUTH_URL_REDIRCT_PARAM . FACEBOOK_APPLICATION_URL . FACEBOOK_AUTH_URL_PERMISSION_PARAM . FACEBOOK_APPLICATION_PERMISSION ?>"
                        } else {
                            window.location ="<?php echo FACEBOOK_AUTH_URL . FACEBOOK_APPLICATION_ID . FACEBOOK_AUTH_URL_REDIRCT_PARAM . FACEBOOK_APPLICATION_URL . FACEBOOK_AUTH_URL_PERMISSION_PARAM . FACEBOOK_APPLICATION_PERMISSION ?>"
                        }
                    });
                })

                $("#country_id").change(function(){
                    if(!$(this).val()){
                        $("#city").hide();
                    }else{
                        $.post("controller/getcities.php", {"code":$(this).val()}, function(response){
                            $("#city").html(response);
                            $("#city").change();
                            $("#city").show();
                        })
                    }
                })

                $("#getweather").click(function(){
                    if($("#city").val() && $("#country_id").val()){
                        data_send={
                            "city":$("#city > option:selected").attr("n").capitalize()+","+$("#country_id > option:selected").attr("n").capitalize()
                        }
                        if($("#facebook_pages").val()){
                            if($("#lang").val()){
                                $.post("controller/postweather.php", data_send, function(response){
                                    page={
                                        "name":$("#facebook_pages > option:selected").attr("n"),
                                        "access_token":$("#facebook_pages").val(),
                                        "id":$("#facebook_pages > option:selected").attr("id"),
                                        "city":data_send['city']
                                    }
                                    if(response.data.error){
                                        showerror("Wrong City");
                                    }else{
                                    
                                        var text=$("#lang").val()==1?"Latest weather updates Brought to you  by ":"‫أخر أخبار الطقس و الحاله الجويه‬ من  ";
                                        post_page(page, response,text);
                                   
                                    }
                                },"json")
                            }else{
                                showerror("choose language");
                            }
                        }else{
                            showerror("you should select Page")
                        }
                    }else{
                        showerror("you should select country and city")
                    }
                })
                function showerror(msg){
                    alert(msg)
                }
                function post_page(page,response,text){
                    id=<?php echo FACEBOOK_APPLICATION_ID ?>;
                    var jsonData={
                        msg:text+page.name,
                        link:"https://www.facebook.com/pages/"+encodeURI(page.name)+"/"+page.id+"?sk=app_"+id,
                        name:page['city'],
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
                        var ids=response.id.split("_");
                        var post_link="http://www.facebook.com/permalink.php?story_fbid="+ids[1]+"&id="+ids[0];
                        var out='<a href="'+post_link+'" target="_blanck">See post Of  '+page['city']+'</a>';
                        $("#posts").append(out);

                    });
                }
            })
            function openopen(){
                id=<?php echo FACEBOOK_APPLICATION_ID ?>;
                url="<?php echo urlencode(FACEBOOK_APPLICATION_URL . "&land=1") ?>";

                window.open("http://www.facebook.com/dialog/pagetab?app_id="+id+"&next="+url,"PageTab","width=500,height=200");
            }
        </script>
        <title>Weather Application</title>
    </head>
    <body>
        <div id="fb-root"></div>
        <div>
            Welcome Mr. <?php echo $me['username'] ?>
            <a href="controller/logout.php" id="logout" >Logout</a>
        </div>

        <br>
        <br>
        <br>
        <br>

        <a id="auth" href="javascript:void(0)">Authenticate Account from Facebook</a>

        <br>
        <br>
        <br>
        <br>

        <div id="container" style="display: none">

            <a href="javascript:void(0)" onclick='openopen()'>
                Add Application to your page</a>
            <br/>
            <br/>
            <br/>
            <a href="manage_con.php" >
                Mange Pages</a>
            <br/>
            <br/>
            <br/>
            <div id="user-loginned">
                This is your account in facebook
                <br>
                <br>
                <br>
                <img src="" id="facebook-upp" style="float: left;margin-right: 10px;" />
                <div id="facebook-username" style="float: left;"> </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <label>Country</label>
                <select name="country" id="country_id" class="required country" >
                    <option value="">Select Country</option>
                    <?php foreach ($countries as $rec) {
                    ?>
                        <option  n="<?php echo $rec['Name'] ?>"  value="<?php echo $rec['Code'] ?>" ><?php echo $rec['Name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>

            <div class="row">
                <label>City</label>
                <select id="city" name="city" id="city" style="display:  none">
                </select>
            </div>

            <br>
            <div class="row">
                <label>Pages</label>
                <select name="pages" id="facebook_pages" >
                </select>
            </div>
            <br>
            <select id="lang">
                <option value="">Select Language</option>
                <option value="1">English</option>
                <option value="2">Arabic</option>
            </select>

            <button  id="getweather">Get weather</button>
            <br/>
            <br/>
            <br/>
            <div id="posts">
            </div>
        </div>

    </body>
</html>
