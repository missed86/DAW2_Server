<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 18</title>
</head>

<body>
    <h2>Escribe un programa que obtenga los números enteros comprendidos entre dos números introducidos por teclado y validados como distintos, 
        el programa debe empezar por el menor de los enteros introducidos e ir incrementando de 7 en 7.</h2>
    <form action="" method="post">
        Introduce un rango: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">-<input type="number" name="b" value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a']) && isset($_POST['b'])) {
            $a= $_POST['a'];
            $b= $_POST['b'];
            if ($a == $b) {
                $mensaje = "Los números no pueden ser iguales";
            } else {
                $resultado = "";
                for ($i=$a; $i < $b; $i+=7) { 
                    $resultado .= $i . " ";
                }
                $mensaje = $resultado;
            }
            
            echo $mensaje;
        }
        ?>
    </form>
</body>

</html>