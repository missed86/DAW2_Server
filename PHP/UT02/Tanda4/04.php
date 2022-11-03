<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 4 - Ejercicio 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ejercicio 4</h1>
<h2>
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla separados por espacios. 
El programa pedirá entonces por teclado dos valores y a continuación cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente. 
Los números que se han cambiado deben aparecer resaltados de un color diferente.
</h2>
<div>
    <?php

        $numeros = array();
        $a = rand(0,20);
        $b = rand(0,20);

        for ($i=0; $i < 100; $i++) { 
            array_push($numeros,rand(0,20));
        }

        foreach ($numeros as $key => $value) {
            if ($value == $a){
                echo "<span style='color:blue'>$b </span>";
            } else {
                echo "$value ";
            }
        }
    ?>
</div>
</body>
</html>