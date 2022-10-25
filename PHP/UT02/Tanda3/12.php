<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 12</title>
</head>
<body>
<h2>Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. El primer término de la serie de Fibonacci es 0, 
    el segundo es 1 y el resto se calcula sumando los dos anteriores, por lo que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144... 
    El número n se debe introducir por teclado.</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a'])) {
            
            $a = $_POST['a'];
            $array = array(0,1);
            for ($i=1; $i < $a; $i++) { 
                $fibonacci = $array[$i]+$array[$i-1];
                array_push($array, $fibonacci);
            }
            echo implode(', ', $array);
        } 
        ?>
    </form>
</body>
</html>