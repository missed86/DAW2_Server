<?php
if (isset($_POST['a'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    // Operaciones
    $resultado = $a+$b;
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
    <form action="" method="post">
        <p>Input1: <input type="number" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"></p>
        <p>Input2: <input type="number" name="b" value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>"></p>
        <p><input type="submit" value="Calcular"></p>
    </form>
    <p id="resultado">
        <?php
        if (isset($resultado)) {
            echo "<p>Resultado:</p>";
            echo $resultado;
        }
        ?>
    </p>
</body>

</html>