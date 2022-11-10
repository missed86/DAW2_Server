<?php
//
$array_frutas = array();

for ($i = 0; $i < rand(7, 20); $i++) {
    $fruta = "&#" . rand(127815, 127827) . ";";
    array_push($array_frutas, $fruta);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DisFruta PHP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 10px;
        }

        * {
            font-weight: normal;
        }

        table th {
            font-weight: bold;
        }

        html,
        input {
            font-family: Roboto, Verdana, Geneva, Tahoma, sans-serif;
            padding: 5px 5px;
        }
    </style>
</head>

<body>
    <center>
        <h1>DisFruta con PHP</h1>
    </center>

    <h2>9 frutas</h2>

    <p style="font-size: 7rem">
        <?php
        foreach ($array_frutas as $key => $value) {
            echo $value . " ";
        }
        ?>
    </p>

    <h2>Resultados</h2>
    <?php
    for ($i = 127815; $i <= 127827; $i++) {
        $fruta = "&#" . $i . ";";
        $count = 0;
        foreach ($array_frutas as $value) {
            if ($value == $fruta) {
                $count++;
            }
        }
        if ($count == 1) {
            echo "<p>La fruta <span style='font-size: 2rem'>$fruta</span> está <strong>$count</strong> vez en la lista.</p>";
        } elseif ($count > 1) {
            echo "<p>La fruta <span style='font-size: 2rem'>$fruta</span> está <strong>$count</strong> veces en la lista.</p>";
        }
    }
    ?>

    <br>
    <center><button onclick="location.reload()">¡¡¡ DisFruta otra vez !!!</button></center>
    <br>
</body>

</html>