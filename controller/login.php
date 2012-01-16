<?php

require_once '../includes/init.php';

$me = empty2false($auth->data);


if (isset($_POST['username']) && isset($_POST['pass'])) {
    $_POST['pass'] = md5($_POST['pass']);
    $id = $auth->login($_POST['username'], $_POST['pass']);
    header("Location: ../");
}
?>