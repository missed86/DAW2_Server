<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 3</title>
</head>
<body>
    <h2>Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle do-while.</h2>
    <ul>
    <?php 
    $i=5;
    do {
        echo "<li>" . $i ."</li>";
        $i+=5;
    }
    while ($i <= 100)
    ?>
    </ul>
</body>
</html>