
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 1</title>
</head>
<body>
    <h1>Multiplica</h1>
    <form action="" method="post">
        <input type="number" name="a" id="">
        <input type="number" name="b" id="">
        <input type="submit" name="enviar" value="multiplica">
        <?php
            if (isset($_POST['enviar'])) {
                $a = $_POST['a'];
                $b = $_POST['b'];
                echo "<br>";
                echo $a * $b;
            }
        ?>
    </form>
</body>
</html>