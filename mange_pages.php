<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
        <title>Mange Pages</title>
        <script type="text/javascript">
            String.prototype.capitalize = function(){ //v1.0
                return this.replace(/\w+/g, function(a){
                    return a.charAt(0).toUpperCase() + a.substr(1).toLowerCase();
                });
            };
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
                            out+= "<br>"+"Wrong account? "+'<a onclick="signout()" href="#">Sign out of Facebook. </a>';
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
                });
                $("#addrecord").click(function(){
                
                });

                $("#addrecord").click(function(){
                    if($("#city").val() && $("#country_id").val()){
                        if($("#facebook_pages").val()){
                            if($("#lang").val()){
                                if($("#hour").val() && $("#min").val()){

                                    data_send={
                                        "page_id":$("#facebook_pages > option:selected").attr("id"),
                                        "page_name":$("#facebook_pages > option:selected").attr("n"),
                                        "page_access_token":$("#facebook_pages").val(),
                                        "city":$("#city > option:selected").attr("n").capitalize()+","+$("#country_id > option:selected").attr("n").capitalize(),
                                        "text":$("#lang").val()==1?"Latest weather updates Brought to you  by ":"‫أخر أخبار الطقس و الحاله الجويه‬ من  ",
                                        "hour":$("#hour").val(),
                                        "min":$("#min").val()
                                    }
                                    $.post("controller/add_record.php", data_send, function(response){
                                        $('#posts').append(response);
                                    })
                                }else{
                                    showerror("Select Time");
                                }
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

            });

            function delete_record(id){
                $.post("controller/delete_record.php", {"id":id}, function(response){
                    $("#rec_"+id).remove();
                    $("#posts").focus();
                })
            }
            function showerror(msg){
                alert(msg)
            }
        </script>
    </head>
    <body>
<!--        <h1>M H D M Y FilePath</h1>
        <h1>5 11 * * * /asdasd</h1>-->
        <div id="fb-root"></div>
        <div id="container" style="display: none">
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
            <br>
            <br>
            <label>Select Time</label>
            <br>
            <select id="hour">
                <option value="" >Select Hour</option>
                <?php
                    for ($i = 0; $i <= 23; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
                </select>
                <select id="min">
                    <option value="" >Select Hour</option>
                <?php
                    for ($i = 0; $i <= 59; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
                </select>
                <br>
                <br>
                <br>
                <select id="lang">
                    <option value="">Select Language</option>
                    <option value="1">English</option>
                    <option value="2">Arabic</option>
                </select>
                <br>
                <br>
                <br>
                <button  id="addrecord">Add Record</button>

                <div>
                    <table id="table_results" class="data">
                        <thead>
                            <tr>
                                <th>
                                    page_name
                                </th>
                                <th>
                                    city
                                </th>
                                <th>
                                    hour
                                </th>
                                <th>
                                    min
                                </th>
                                <th>
                                    Delete
                                </th>

                            </tr>
                        </thead>
                        <tbody id="posts">
                        <?php
                        foreach ($post_pages as $rec) {
                            include 'controller/timer_page.php';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
