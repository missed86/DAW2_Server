<?php

    // @ $dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
    // $error = $dwes->connect_errno;

    // if ($error != null) {
    //     echo "Error al conectar a la base de datos";
    //     exit();
    // } else {
    //     echo "Conexion bien";
    // }
    
    $db_host = "localhost";
    $db_user = "dwes";
    $db_pass = "abc123";
    $db_name = "dwes";
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    $dwes = new PDO("mysql:host=$localhost;dbname=$db_name", $db_user, $db_pass, $opciones);

?>