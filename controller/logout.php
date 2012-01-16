<?php

require_once '../includes/init.php';

$me = empty2false($auth->data);

$auth->logout();
header("Location: ../");
?>