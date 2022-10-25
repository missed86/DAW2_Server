<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 11</title>
</head>
<body>
<h2>Escribe un programa que muestre en tres columnas, el cuadrado y el cubo de los 5 primeros números enteros a partir de uno que se introduce por teclado.</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a'])) {
            
            $a = $_POST['a'];

            echo "<table>";
            for ($i=0; $i < 5; $i++) { 
                $a_new = $a+$i;
                $a_cuadrado = pow($a+$i,2);
                $a_cubo = pow($a+$i,3);
                echo "<tr><td>$a_new</td><td>$a_cuadrado</td><td>$a_cubo</td>";
            }
            echo "</table>";
            
        } 
        ?>
    </form>
</body>
</html>