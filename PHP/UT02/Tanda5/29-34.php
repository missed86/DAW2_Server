<?php include 'bidimensionalfunctions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicios 29-34</title>
</head>
<body>
<h1>Ejercicio 29</h1>
<p>generaArrayBiInt: Genera un array de tamaño n x m con números aleatorios cuyo intervalo (mínimo y máximo) se indica como parámetro.<p>

    <?php
        $array = generaArrayBiInt(10,10,0,20);
        printBiArray($array)
    ?>
<h1>Ejercicio 30</h1>
<p>filaDeArrayBiInt: Devuelve la fila i-ésima del array que se pasa como parámetro.<p>

    <?php
        printArray(filaDeArrayBiInt($array,0));
    ?>

<h1>Ejercicio 31</h1>
<p>columnaDeArrayBiInt: Devuelve la columna j-ésima del array que se pasa como parámetro.<p>

    <?php
        printArray(columnaDeArrayBiInt($array,0));
    ?>
<h1>Ejercicio 32</h1>
<p>coordenadasEnArrayBiInt: Devuelve la fila y la columna (en un array con dos elementos) de la primera ocurrencia de un número dentro de un array bidimensional. 
    Si el número no se encuentra en el array, la función devuelve el array {-1, -1}.<p>

    <?php
        print_r(coordenadasEnArrayBiInt($array, 75));
    ?>

</body>
</html>