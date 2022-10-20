<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 8</title>
</head>
<body>
<h2>Muestra la tabla de multiplicar de un número introducido por teclado. El resultado se debe mostrar en una tabla (&lt;table&gt; en HTML).</h2>
    <form action="" method="post">
        Introduce un número: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a'])) {
            $num = $_POST['a'];
            echo "<table>";
            for ($i=1; $i <= 10; $i++) { 
                echo "<tr><td>$num x $i = ". $num*$i . "</td></tr>";
            }
            echo "</table>";
        } 
        ?>
    </form>
</body>
</html>