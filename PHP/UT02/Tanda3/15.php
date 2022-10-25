<?php
if (isset($_POST['a']) && isset($_POST['b'])) {
    $base = $_POST['a'];
    $exp = $_POST['b'];
    if ($exp > 0) {
        $mensaje = "<ul>";
        for ($i=1; $i<=$exp ; $i++) {
            $resultado = pow($base,$i);
            $mensaje .= "<li>$base<sup>$i</sup> = $resultado</li>";
        }
        $mensaje.= "</ul>";
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
    <title>UT02 - Tanda3 - Ejercicio 15</title>
</head>

<body>
    <h2>Escribe un programa que dados dos números, uno real (base) y un entero positivo (exponente), 
        saque por pantalla todas las potencias con base el numero dado y exponentes entre uno y el exponente introducido. 
        No se deben utilizar funciones de exponenciación. 
        Por ejemplo, si introducimos el 2 y el 5, se deberán mostrar 2<sup>1</sup>, 2<sup>2</sup>, 2<sup>3</sup>, 2<sup>4</sup>, 2<sup>5</sup>.</h2>
    <form action="" method="post">
        Base: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        Exponente: <input type="number" name="b" autofocus value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php echo isset($mensaje) ? $mensaje:""; ?>
    </form>
</body>

</html>