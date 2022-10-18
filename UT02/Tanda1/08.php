<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Ejercicio 8</title>
</head>
<body>
    <h1>Salario semanal</h1>
    <form action="" method="post">
        Horas trabajadas: <input type="number" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Calcula">
        <?php
            if (isset($_POST['a'])) {
                $a = $_POST['a'];
                echo "<br><br>";
                echo "Salario semanal: " .$a*12 ."€";
                
            }
        ?>
    </form>
</body>
</html>