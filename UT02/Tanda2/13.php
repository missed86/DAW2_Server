<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 13</title>
</head>

<body>
    <h2>Escribe un programa que ordene tres números enteros introducidos por teclado.</h2>
    <form action="" method="post">
        <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"><br>
        <input type="number" name="b" autofocus value="<?php if (isset($_POST['b'])) echo $_POST['b'] ?>"><br>
        <input type="number" name="c" autofocus value="<?php if (isset($_POST['c'])) echo $_POST['c'] ?>"><br>
        <input type="submit" name="enviar" value="Accion">
        <?php
        if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
            $array = array($_POST['a'],$_POST['b'],$_POST['c']);
            sort($array);
            echo "<br><br>";
            echo join(", " ,$array);
            
        } 
        ?>
    </form>
</body>

</html>