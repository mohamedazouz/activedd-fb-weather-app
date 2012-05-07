<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>COMING SOON ...</h1>
        <fb:fbml>
<fb:request-form
action="index.php"
method="POST"
invite="true"
type="YOUR APP NAME"
content="Your text goes here. <?php echo htmlentities("<fb:req-choice url=\"YOUR CANVAS URL\" label=\"Authorize My Application\">") ?>" >
<fb:multi-friend-selector showborder="false" actiontext="Invite your friends to use YOUR APP NAME.">
</fb:request-form>
</fb:fbml>
    </body>
</html>
