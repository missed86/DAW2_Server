<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra Cartas (Resultado)</title>
    <link rel="stylesheet" href="examen.css">
</head>

<body>
    <h1>MUESTRA CARTAS (RESULTADO)</h1>
    <?php

    if (isset($_POST['numero']) && $_POST['numero']!='') {
        $palo_name = ['c' => 'corazones', 'd' => 'diamantes', 't' => 'tréboles', 'p' => 'picas'];
        $numero = $_POST['numero'];
        $palo = $_POST['palo'];
        $cartas = array();
        for ($i = 0; $i < $numero; $i++) {
            array_push($cartas, rand(1, 10));
        }
        echo "<h2>$numero cartas de " . $palo_name[$palo] . "</h2><p>";

        foreach ($cartas as $value) {
            echo "<img src='img/" . $palo . $value . ".svg' alt='3' width='100'>";
        }
        echo "</p><p>";

        $temp = 0;
        foreach ($cartas as $value) {
            if ($value == $temp) {
                echo "Hay cartas iguales seguidas.";
                break;
            } else {
                $temp = $value;
            }
        }
        
    } else {
        echo "<p>Error, no se ha enviado la información necesaria</p>";
    }
    echo "<p><a href='index.php'>Volver al formulario.</a></p>";
    ?>
    </p>
</body>

</html>