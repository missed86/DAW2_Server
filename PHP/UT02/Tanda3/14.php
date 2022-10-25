<?php
if (isset($_POST['a']) && isset($_POST['b'])) {
    $base = $_POST['a'];
    $exp = $_POST['b'];
    if ($exp > 0) {
        $resultado = pow($base, $exp);
        $mensaje = "El resultado de $base<sup>$exp</sup> es $resultado";
    } else {
        $mensaje = "El exponente debe ser positivo";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 14</title>
</head>

<body>
    <h2>Escribe un programa que pida una base y un exponente (entero positivo) y que calcule la potencia.</h2>
    <form action="" method="post">
        Base: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        Exponente: <input type="number" name="b" autofocus value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php echo isset($mensaje) ? $mensaje:""; ?>
    </form>
</body>

</html>