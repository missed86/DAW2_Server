<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 7</title>
</head>
<body>
    <h1>Precio más IVA</h1>
    <form action="" method="post">
        Precio sin IVA: <input type="number" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Calcula">
        <?php
            if (isset($_POST['a'])) {
                $a = $_POST['a'];
                echo "<br><br>";
                echo "Precio con IVA: " .round($a*1.21,2) ."€";
                
            }
        ?>
    </form>
</body>
</html>