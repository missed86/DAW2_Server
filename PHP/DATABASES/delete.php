<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require('connection.php');
    if(isset($_POST['delete'])) {
        print_r($_POST);
        $data = ['cod' => $_POST["delCod"]];
        $sql = "DELETE FROM producto WHERE cod = :cod";
      
        try {    
            $resultado = $dwes->prepare($sql)->execute($data);
            header("Location: index.php");
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
