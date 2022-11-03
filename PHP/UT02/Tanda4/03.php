<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 4 - Ejercicio 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ejercicio 3</h1>
<h2>
Escribe un programa que lea 15 números por teclado y que los almacene en un array. 
Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. 
El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente, muestra el contenido del array.
</h2>
<div>
    <table>
    <?php

        $numeros = array();

        for ($i=0; $i < 15; $i++) { 
            array_push($numeros,rand(0,100));
        }

        function ArrayPrintTable($array) {
            echo "<table>";
            echo "<tr>";
            foreach ($array as $key => $value) {
                echo "<td>$key</td>";
            }
            echo "</tr>";
            echo "<tr>";
            foreach ($array as $key => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
            echo "</table>";
        }

        echo "Array original";
        ArrayPrintTable($numeros);

        array_unshift($numeros, end($numeros));
        unset($numeros[count($numeros)-1]);

        echo "Array resultado";
        ArrayPrintTable($numeros);
    ?>
    </table>
</div>
</body>
</html>