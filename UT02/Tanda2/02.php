<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 2</title>
</head>

<body>
    <h2>Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5. respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.</h2>
    <form action="" method="post">
        Hora del día: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $a = $_POST['a'];

            echo "<br><br>";
            if ($a >= 0 && $a < 24) {
                if ($a >= 6 && $a < 12) {
                    echo "Buenos días";
                } elseif ($a >= 12 && $a <= 20) {
                    echo "Buenas tardes";
                } elseif (($a >= 21 && $a > 24) || ($a >= 0 && $a < 6)) {
                    echo "Buenas noches";
                }
            } else {
                echo "Hora erronea";
            }
        }
        ?>
    </form>
</body>

</html>