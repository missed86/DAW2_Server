<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 16</title>
</head>

<body>
<h2>Escribe un programa que diga cuál es la última cifra de un número entero introducido por teclado.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"><br>
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $a = strval($_POST['a']);
            $string = $a[strlen($a)-1];


            echo "<br><br>";

            // echo $string;

            echo $a%10;
        }
        ?>
    </form>
</body>

</html>