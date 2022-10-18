<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 11</title>
</head>

<body>
    <h2>Escribe un programa que dada una hora determinada (horas y minutos), calcule los segundos que faltan para llegar a la medianoche.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">:<input type="number" name="b" autofocus value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>"> = 0
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a']) && isset($_POST['b'])) {
            $horas = $_POST['a'];
            $minutos = $_POST['b'];

            $resultado = (((24-$horas)*60)+(60-$minutos))*60;
            
            echo "<br><br>";
            
            echo "Quedan $resultado segundos para la media noche.";
        } 
        ?>
    </form>
</body>

</html>