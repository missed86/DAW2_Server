<?php

if (isset($_POST['numerosecreto'])) {
    $numerosecreto = $_POST['numerosecreto'];
} else {
    $numerosecreto = rand(1, 100);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Adivino</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 10px;
        }

        * {
            font-weight: normal;
        }

        table th {
            font-weight: bold;
        }

        html,
        input {
            font-family: Roboto, Verdana, Geneva, Tahoma, sans-serif;
            padding: 5px 5px;
        }
    </style>
</head>

<body>
    <h1>Adivina el número</h1>
    <h2>
    En este ejercicio se debe crear un programa que pida al usuario adivinar un número entre 1 y 100, dándole pistas para facilitar la tarea.
    </h2>
    <p id="resultado">
        <form action="" method="post">
        <?php
        if (isset($_POST['input']) && $_POST['input'] == $numerosecreto) {
            echo "<p>Felicidades! Has acertado el número!</p>";
            echo "<p><button onclick='window.location()'>Otra vez?</button></p>";
        } else { ?>
    
        <p>Introduce un número: <input type="number" name="input" value="<?php if (isset($_POST['input'])) echo $_POST['input'] ?>" autofocus></p>
        <input type="hidden" name="numerosecreto" value="<?php if (isset($numerosecreto)) echo $numerosecreto ?>">
        <p><input type="submit" value="Comprobar número"></p>
    
    <?php
        }
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            if ($input == '') {
                echo "No ha escrito ningún número";
            } elseif ($input < 0){
                echo "No ha escrito un número entero positivo";
            } elseif ($input>$numerosecreto){
                echo "Demasiado grande";
            } elseif ($input<$numerosecreto){
                echo "Demasiado pequeño";
            }
        }
    ?>
    </form>
</p>
</body>

</html>