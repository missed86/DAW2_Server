<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 17</title>
</head>

<body>
    <h2>Realiza un programa que sume los 100 números siguientes a un número entero y positivo introducido por teclado. 
        Se debe comprobar que el dato introducido es correcto (que es un número positivo).</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a'])) {
            $num = $_POST['a'];
            if ($num > 0) {
                $resultado = 0;
                for ($i = $num; $i <= $num+100; $i++) {
                   $resultado += $i;
                }
                $mensaje = $resultado;
            } else {
                $mensaje = "El número debe ser positivo";
            }
            echo $mensaje;
        }
        ?>
    </form>
</body>

</html>