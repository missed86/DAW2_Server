<?php include 'arrayfunctions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 20-28</title>
</head>
<body>
<h1>Ejercicio 20</h1>
<p>generaArrayInt: Genera un array de tamaño n con números aleatorios cuyo
    intervalo (mínimo y máximo) se indica como parámetro.<p>
    <?php
        print_r(generaArrayInt(10,0,20));
    ?>
<h1>Ejercicio 21</h1>
<p>minimoArrayInt: Devuelve el mínimo del array que se pasa como parámetro.<p>
    <?php
        echo minimoArrayInt(generaArrayInt(10,0,20));
    ?>
<h1>Ejercicio 22</h1>
<p>maximoArrayInt: Devuelve el máximo del array que se pasa como parámetro.<p>
    <?php
        echo maximoArrayInt(generaArrayInt(10,0,20));
    ?>
<h1>Ejercicio 23</h1>
<p>mediaArrayInt: Devuelve la media del array que se pasa como parámetro.<p>
    <?php
        echo mediaArrayInt([9,9,10,10]);
    ?>
<h1>Ejercicio 24</h1>
<p>estaEnArrayInt: Dice si un número está o no dentro de un array.<p>
    <?php
        echo estaEnArrayInt([9,9,10,10],10);
    ?>
    ?>
<h1>Ejercicio 25</h1>
<p>posicionEnArray: Busca un número en un array y devuelve la posición (el índice) en la que se encuentra.<p>
    <?php
        echo posicionEnArray([9,9,10,10],10);
    ?>
<h1>Ejercicio 26</h1>
<p>volteaArrayInt: Le da la vuelta a un array.<p>
    <?php
        print_r(volteaArrayInt([1,2,3,4]));
    ?>
</body>
<h1>Ejercicio 27</h1>
<p>rotaDerechaArrayInt: Rota n posiciones a la derecha los números de un array.<p>
    <?php
        print_r(rotaDerechaArrayInt([1,2,3,4],3));
    ?>
<h1>Ejercicio 27</h1>
<p>rotaIzquierdaArrayInt: Rota n posiciones a la izquierda los números de un array.<p>
    <?php
        print_r(rotaIzquierdaArrayInt([1,2,3,4],1));
    ?>
</body>
</html>