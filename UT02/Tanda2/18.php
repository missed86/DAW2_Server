<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 18</title>
</head>

<body>
<h2>Realiza un programa que nos diga cuántos dígitos tiene un número entero que puede ser positivo o negativo. Se permiten números de hasta 5 dígitos.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {

            echo "<br><br>";
            $a = abs($_POST['a']);
            if($a<=99999) {
                echo strlen(strval($a)). " cifras";
            }else {
                echo "Solo se permite un máximo de 5 cifras.";
            }
        }
        ?>
    </form>
</body>

</html>