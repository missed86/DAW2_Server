<?php
$array_str = "";
$array = array();
if (isset($_GET['a'])) {
    $a = $_GET['a'];

    $array = explode(" ", strlen($_GET['array']) > 0 ? $_GET['array'] . " " . $a : $a);
    $array_str = implode(" ", $array);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 13</title>
</head>

<body>
    <h2>Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos son negativos.</h2>
    <?php
    if (count($array) >= 10) {
        $pos = array();
        $neg = array();
        foreach ($array as $key => $value) {
            if ($value > 0)
                array_push($pos, $value);
            else
                array_push($neg, $value);
        }
        echo "Positivos(" . count($pos) . "): " . implode(", ", $pos);
        echo "<br>";
        echo "Negativos(" . count($neg) . "): " . implode(", ", $neg);
    } else {
        ?>
        <form action="" method="GET">
            Introduce un número: <input type="number" name="a" autofocus value="">
            <input type="hidden" name="array" value="<?php echo (isset($array_str)) ? $array_str : "" ?>">
            <input type="submit" name="enviar" value="Accion">
            <br><br>
        </form>
        <?php
    }
    ?>
</body>

</html>