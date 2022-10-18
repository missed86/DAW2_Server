<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 4</title>
</head>

<body>
    <h2>Escribe un programa que calcule el salario semanal de un trabajador teniendo en cuenta que las horas ordinarias (40 primeras horas de trabajo) se pagan a 12 euros la hora. A partir de la hora 41, se pagan a 16 euros la hora.</h2>
    <form action="" method="post">
        Horas semanales: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $a = $_POST['a'];
            
            echo "<br><br>";
            
            if ($a > 40) {
                echo "Salario semanal: " . 40*12+($a-40)*16 . "€";
            } else {
                echo "Salario semanal: " . $a*12 . "€";
            }
        } 
        ?>
    </form>
</body>

</html>