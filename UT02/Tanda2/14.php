<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 14</title>
</head>

<body>
    <h2>Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 5.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"><br>
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $a = $_POST['a'];

            echo "<br><br>";

            if ($a % 2 == 0)
                echo "Es par. <br>";
            if ($a % 5 == 0)
                echo "Es divisible entre 5";
        }
        ?>
    </form>
</body>

</html>