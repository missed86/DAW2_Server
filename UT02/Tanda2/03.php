<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 3</title>
</head>

<body>
    <h2>Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día de la semana.</h2>
    <form action="" method="post">
        Día de la semana(1-7): <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $dia = $_POST['a'];
            $arrayDias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            echo "<br><br>";
            
            if ($dia > 0 && $dia <=7) {
                echo $arrayDias[$dia-1];
            } else {
                echo "Día erróneo";
            }
        } 
        ?>
    </form>
</body>

</html>