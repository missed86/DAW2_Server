<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 4 - Ejercicio 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ejercicio 5</h1>
<h2>
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado año 
y que muestre a continuación un diagrama de barras horizontales con esos datos. 
Las barras del diagrama se pueden dibujar a base de la concatenación de una imagen.
</h2>
<div>
    <?php $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")?>
    <?php if (!isset($_POST['meses'])): ?>
        <form action="" method="post">
            <table>
            <?php
                foreach ($meses as $key => $value) {
                echo "<tr><td>$value</td><td><input type=\"number\" name=\"meses[]\" required></td></tr>";

                }
            ?>
            </table>
        <br><input type="submit" value="OK">
    </form>
    <?php else:?>
        <table>
        <?php 
            $barsize = 300;
            foreach ($_POST['meses'] as $key => $value) {
                $sizepercentage = floor($barsize*$value/max($_POST['meses']));
                echo "<tr><td>$meses[$key]</td><td style='width:{$barsize}px'><div style='background-color:blue; width:${sizepercentage}px; height:10px'> </div></td>";
            }
        ?>
        <table>
    <?php endif;?>

</div>
</body>
</html>