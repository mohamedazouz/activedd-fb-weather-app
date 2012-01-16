<?php

include_once '../config.php';

if ($_GET['land']) {
?>
    <script type = "text/javascript">

        window.open('','_self','');
        window.close();

    </script>
<?php

} else {

    $app_id = FACEBOOK_APPLICATION_ID;
    $app_secret = FACEBOOK_APPLICATION_SECRET;
    $my_url = FACEBOOK_APPLICATION_URL;
    $code = $_REQUEST["code"];

    $json = array();
    if (isset($_GET['error'])) {
        $json['access_token'] = "-1";
    } else {
        $token_url = "https://graph.facebook.com/oauth/access_token?client_id="
                . $app_id . "&redirect_uri=" . urlencode($my_url) . "&client_secret="
                . $app_secret . "&code=" . $code;

        $access_token = file_get_contents($token_url);
        $access_token = substr($access_token, strpos($access_token, "=") + 1);
        header("Location: ../../?access_token=$access_token");
    }
}
?>