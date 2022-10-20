<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 19</title>
</head>

<body>
<h2>Realiza un programa que diga si un número entero positivo introducido por teclado es capicúa. Se permiten números de hasta 5 cifras.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {

            echo "<br><br>";
            $a = $_POST['a'];
            if($a<=99999) {
                $string = strval($a);
                $reverse = strrev(strval($a));
                if ($string == $reverse) 
                    echo "Es capicúa!";
                else
                    echo "No es capicúa!";
            }else {
                echo "Solo se permite un máximo de 5 cifras.";
            }
            
        }
        ?>
    </form>
</body>

</html>