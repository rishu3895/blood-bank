<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "Qwerty@12345";
$db_name = "Users";

$db = new PDO('mysql:host='.$db_host.';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);