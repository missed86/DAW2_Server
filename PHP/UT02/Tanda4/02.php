<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 4 - Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ejercicio 2</h1>
<h2>
Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.
</h2>
<div>
    <table>
    <?php

        $numeros = array();

        for ($i=0; $i < 10; $i++) { 
            array_push($numeros,rand(0,100));
        }

        foreach ($numeros as $key => $value) {
            $que_es = '';
            if ($value == min($numeros)){
                $que_es = 'mínimo';
            }
            if ($value == max($numeros)){
                $que_es = 'máximo';
            }
            echo "<tr><td>$value</td><td>$que_es</td></tr>";
        }
    ?>
    </table>
</div>
</body>
</html>