
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 2</title>
</head>
<body>
    <h1>Euros a pesetas</h1>
    <form action="" method="post">
        <input type="number" name="euros" value="<?php if (isset($_POST['euros'])) echo $_POST['euros'] ?>">
        <input type="submit" name="enviar" value="A pesetas">
        <?php
            if (isset($_POST['euros'])) {
                $euros = $_POST['euros'];
                echo "<br>";
                echo round($euros*166.3860,0). " pts.";
            }
        ?>
    </form>
</body>
</html>