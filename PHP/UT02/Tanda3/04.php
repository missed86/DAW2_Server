<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 4</title>
</head>
<body>
    <h2>Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle for</h2>
    <ul>
    <?php 
        for ($i=320; $i >= 160 ; $i-=20) { 
            echo "<li>" . $i ."</li>";
        }
    ?>
    </ul>
</body>
</html>