<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <?php
    
        $x = 144;
        $y = 999;

        echo "<p> x = $x </p>";
        echo "<p> y = $y </p>";
        $operacion = $x+$y;
        echo "<p> x+y = {$operacion} </p>";
        $operacion = $x-$y;
        echo "<p> x-y = {$operacion} </p>";
        $operacion = $x*$y;
        echo "<p> x*y = {$operacion} </p>";
        $operacion = $x/$y;
        echo "<p> x/y = {$operacion} </p>";
    ?>
</body>
</html>