<?php
include("funcionesutiles.php");

$inputsnecesarios = 10; 
if (isset($_POST['a']) && $_POST['a']!='') {
    $a = $_POST['a'];
    $array = explode(" ", $_POST['arraytext']);
    array_push($array, $a);

    if (count($array) < $inputsnecesarios) {
        $arraytext = trim(join(" ", $array));
    } else {
        // Operaciones
        $resultado = $array;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Ejercicio 1. Nombre</h1>
    <h2>
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Qui dicta laborum necessitatibus eum numquam esse illo consectetur,
        animi, quos consequuntur, iste itaque nam. Explicabo ex in,
        dolores facere dolore voluptatum.
    </h2>
    <?php if (!isset($resultado)): ?>

        <form action="" method="post">
            <p>Input1: <input type="number" name="a" value="" autofocus></p>
            <!-- Input oculto para almacenar valores -->
            <input type="hidden" name="arraytext" value="<?php if (isset($arraytext)) echo $arraytext ?>"></p>
            <p><input type="submit" value="Calcular"></p>
        </form>

    <?php else: ?>

        <p id="resultado">
            <p>Resultado:</p>
            <?php
                printArray_keys($resultado);
            ?>
        </p>
    
    <?php endif; ?>
</body>

</html>