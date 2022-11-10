<?php

$jugador1_num = rand(1,5);
$jugador2_num = rand(1,5);

$suma = $jugador1_num + $jugador2_num;

if($suma %2 == 0) {
    $jugador1_status = "Gana";
    $jugador2_status = "Pierde";
} else {
    $jugador1_status = "Pierde";
    $jugador2_status = "Gana";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pares y Nones</title>
    <link rel="stylesheet" href="examen.css">
</head>

<body>
    <h1>Pares y nones</h1>
    <h2>
    En este ejercicio se debe crear un programa que muestre una mano del juego "Pares y nones".    
    </h2>
    <table>
    <tr>
      <td><img src="img/<?=strtolower($jugador1_status)?>.svg" alt="<?=$jugador1_status?>" height="100"></td>
      <td><img src="img/<?=$jugador1_num?>.svg" alt="<?=$jugador1_num?>" height="200"></td>
      <td><img src="img/<?=$jugador2_num?>.svg" alt="<?=$jugador2_num?>" height="200"></td>
      <td><img src="img/<?=strtolower($jugador2_status)?>.svg" alt="<?=$jugador2_status?>" height="100"></td>
    </tr>
    </table>
</body>

</html>