<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo "Pageviews = " . $_SESSION['access_token'];
unset($_SESSION['access_token']);
?>
