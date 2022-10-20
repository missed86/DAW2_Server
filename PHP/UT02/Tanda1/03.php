
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 3</title>
</head>
<body>
    <h1>Pesetas a euros</h1>
    <form action="" method="post">
        <input type="number" name="pesetas" value="<?php if (isset($_POST['pesetas'])) echo $_POST['pesetas'] ?>">
        <input type="submit" name="enviar" value="A pesetas">
        <?php
            if (isset($_POST['pesetas'])) {
                $pesetas = $_POST['pesetas'];
                echo "<br>";
                echo round($pesetas/166.3860,2). "€";
            }
        ?>
    </form>
</body>
</html>