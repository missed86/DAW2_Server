<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 4 - Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ejercicio 1</h1>
<h2>Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. 
    En el array “cuadrado” se deben almacenar los cuadrados de los valores que hay en el array “numero”. 
    En el array “cubo” se deben almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de los tres arrays dispuesto en tres columnas.
</h2>
<div>
    <table>
    <tr><th>numero</th><th>cuadrado</th><th>cubo</th></tr>
    <?php

        $numero = array();
        $cuadrado = array();
        $cubo = array();

        for ($i=0; $i < 20; $i++) { 
            $n = rand(0,100);
            array_push($numero,$n);
            array_push($cuadrado,pow($n,2));
            array_push($cubo,pow($n,3));
        }
        foreach ($numero as $key => $value) {
            echo "<tr><td>$value</td><td>$cuadrado[$key]</td><td>$cubo[$key]</td></tr>";
        }
    ?>
    </table>
</div>
</body>
</html>