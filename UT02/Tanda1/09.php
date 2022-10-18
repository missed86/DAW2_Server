<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 9</title>
</head>
<body>
    <h1>Volumen de un cono</h1>
    <form action="" method="post">
        Radio: <input type="number" name="r" value="<?php if (isset($_POST['r'])) echo $_POST['r'] ?>">
        Altura: <input type="number" name="h" value="<?php if (isset($_POST['h'])) echo $_POST['h'] ?>">
        <input type="submit" name="enviar" value="Calcula">
        <?php
            if (isset($_POST['r']) && isset($_POST['h'])) {
                $r = $_POST['r'];
                $h = $_POST['h'];
                echo "<br><br>";
                echo "El volumen del cono es: ". 13*$r*pi()*2*$h ." cm<sup>3</sup>";
                
            }
        ?>
    </form>
</body>
</html>