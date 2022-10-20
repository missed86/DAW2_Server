<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 17</title>
</head>

<body>
<h2>Escribe un programa que diga cuál es la primera cifra de un número entero introducido por teclado. Se permiten números de hasta 5 cifras.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"><br>
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {

            echo "<br><br>";
            if($_POST['a']<=99999) {
                $a = strval($_POST['a']);
                echo $a[0];
            }else {
                echo "Solo se permite un máximo de 5 cifras.";
            }
        }
        ?>
    </form>
</body>

</html>