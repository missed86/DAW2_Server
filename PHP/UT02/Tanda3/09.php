<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 9</title>
</head>
<body>
<h2>Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado.</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a'])) {
            $num = $_POST['a'];

            echo "El número indicado tiene ". strlen(strval($num)) . " cifras.";
        } 
        ?>
    </form>
</body>
</html>