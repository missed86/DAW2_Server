<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 5</title>
</head>

<body>
    <h2>Realiza un programa que resuelva una ecuación de primer grado (del tipo ax + b = 0)</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">x <input type="number" name="b" autofocus value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>"> = 0
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a']) && isset($_POST['b'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];

            $c = $b/$a;
            
            echo "<br><br>";
            
            echo "$a * <b>$c</b> + $b = 0";
        } 
        ?>
    </form>
</body>

</html>