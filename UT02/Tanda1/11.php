
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 11</title>
</head>
<body>
    <h1>Conversor Kb a Bb</h1>
    <form action="" method="post">
        <input type="number" name="kb" value="<?php if (isset($_POST['kb'])) echo $_POST['kb'] ?>">
        <input type="submit" name="enviar" value="Convertir">
        <?php
            if (isset($_POST['kb'])) {
                $kb = $_POST['kb'];
                echo "<br>";
                echo $kb/1024 ." Mb";
            }
        ?>
    </form>
</body>
</html>