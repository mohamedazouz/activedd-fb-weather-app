<?php

// includes
require_once 'config.php';

// database
require_once 'db.php';

require_once 'common.php';

// database
$db = new Cdb();
$db->connect();
$db->execute("SET NAMES 'utf8'");
$db->execute("SET time_zone = '+02:00'");


// authentication
require_once 'auth.php';
$auth = new Cauth();
$auth->users_table = 'members';
$auth->db = $db;
$auth->enable_verify = true;
$auth->start();
$login = $auth->is_logged;


?>