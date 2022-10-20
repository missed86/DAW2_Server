
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 10</title>
</head>
<body>
    <h1>Conversor Mb a Kb</h1>
    <form action="" method="post">
        <input type="number" name="mb" value="<?php if (isset($_POST['mb'])) echo $_POST['mb'] ?>">
        <input type="submit" name="enviar" value="Convertir">
        <?php
            if (isset($_POST['mb'])) {
                $mb = $_POST['mb'];
                echo "<br>";
                echo $mb*1024 ." Kb";
            }
        ?>
    </form>
</body>
</html>