<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 5</title>
</head>
<body>
    <h1>Area de un rectangulo</h1>
    <form action="" method="post">
        Alto: <input type="number" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        Ancho: <input type="number" name="b" value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>">
        <input type="submit" name="enviar" value="Calcula">
        <?php
            if (isset($_POST['a']) && isset($_POST['b'])) {
                $a = $_POST['a'];
                $b = $_POST['b'];
                echo "<br><br>";
                echo $a*$b." m<sup>2</sup>";
                
            }
        ?>
    </form>
</body>
</html>