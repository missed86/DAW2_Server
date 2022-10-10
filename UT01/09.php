<?php

$euro_peseta = 166.3860;
$pesetas = 33000;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 09</title>
</head>

<body>
    <?php
    echo $pesetas . " pesetas son " . round($pesetas / $euro_peseta,2) . " euros.";
    ?>
</body>

</html>