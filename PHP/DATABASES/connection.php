<?php
    
    $db_host = "localhost";
    $db_user = "dwes";
    $db_pass = "abc123";
    $db_name = "dwes";
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    $dwes = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

?>