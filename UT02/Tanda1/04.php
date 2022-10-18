
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 4</title>
</head>
<body>
    <h1>Calcula</h1>
    <form action="" method="post">
        <input type="number" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="number" name="b" value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>">
        <input type="submit" name="enviar" value="Calcula">
        <?php
            if (isset($_POST['a']) && isset($_POST['b'])) {
                $a = $_POST['a'];
                $b = $_POST['b'];
                echo "<br>";
                echo "Suma: ".$a+$b."<br>";
                echo "Resta: ".$a-$b."<br>";
                echo "Multiplicación: ".$a*$b."<br>";
                echo "División: ".$a/$b."<br>";
            }
        ?>
    </form>
</body>
</html>