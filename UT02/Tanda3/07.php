<?php
$pass = 1234;
if (isset($_POST['a'])) {
    $contador = $_POST['contador'];
    $a = $_POST['a'];
    if ($pass == $a) {
        $resultado = "La caja fuerte se ha abierto satisfactoriamente";
    } else {
        if ($contador < 3) {
            $contador++;
            $resultado = "Lo siento, esa no es la combinación. Quedan " . 4 - $contador . " intentos";
        } else {
            $resultado = "Ni lo intentes!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 7</title>
</head>

<body>
    <h2>Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El programa nos pedirá la combinación para abrirla.
        Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto satisfactoriamente”.
        Tendremos cuatro oportunidades para abrir la caja fuerte.</h2>
    <form method="POST">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="hidden" name="contador" value="<?php if (isset($contador)) echo $contador;
                                                    else echo 0; ?>">
        <input type="submit" name="enviar" value="Accion">
    </form>

    <?php
    if(isset($resultado)){
        echo "<br><br>";
        echo $resultado;
    }
    ?>

</body>

</html>