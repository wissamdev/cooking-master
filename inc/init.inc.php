<?php 

include("_conf.php");

$pdo = new PDO('mysql:host='.SERVEURBDD.';dbname='.NAMEBDD, USERBDD, PWDBDD, array
    (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


session_start();