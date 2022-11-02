<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 16</title>
</head>

<body>
    <h2>Escribe un programa que diga si un número introducido por teclado es o no primo. Un número primo es aquel que sólo es divisible entre él mismo y la unidad.</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a'])) {
            $num = $_POST['a'];
            if ($num >= 2) {
                $primo = true;
                for ($i = 2; $i < $num; $i++) {
                    if ($num % $i == 0) {
                        $primo = false;
                        break;
                    }
                }
            }else{
                $primo = false;
            }
            echo $primo ? "El número $num es primo" : "El número $num no es primo";
        }
        ?>
    </form>
</body>

</html>