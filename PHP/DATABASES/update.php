<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require('connection.php');
    if(isset($_POST['update'])) {

        $data = [
            'cod' => $_POST["delCod"],
            'nombre_corto' => $_POST["nombre_corto"],
            'descripcion' => $_POST["descripcion"],
            'pvp' => $_POST["PVP"],
            'familia' => $_POST["addFamilia"]
        ];
        print_r($data);
        $sql = "UPDATE producto 
                SET nombre_corto = :nombre_corto, descripcion= :descripcion, PVP = :pvp, familia= :familia
                WHERE cod = :cod";
      
        try {    
            $resultado = $dwes->prepare($sql)->execute($data);
            header("Location: index.php");
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
