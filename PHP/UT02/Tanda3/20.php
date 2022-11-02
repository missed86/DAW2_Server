<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda3 - Ejercicio 19</title>
    <style>
        :root {
            --size: 25px;
        }

        .piramide {
            text-align: center;
            width: 100%;
        }

        .piramide>.fila>div {
            display: inline-block;
            margin: 1px;
        }

        .fila {
            margin: 0px;
            padding: 0px;
            height: var(--size);
            margin: 2px;
        }

        .bolitas {
            width: var(--size);
            height: var(--size);
            border-radius: 50%;
            background-color: black;
        }

        .ladrillos {
            height: var(--size);
            width: calc(var(--size) * 2);
            background-color: #c93c20;
        }
    </style>
</head>

<body>
    <h2>Realiza un programa que pinte una pirámide por pantalla. La altura se debe pedir por teclado mediante un formulario.
        La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen de las 5 que se deben dar a elegir mediante un formulario.</h2>
    <form action="" method="post">
        Introduce un rango: <input type="number" name="a" autofocus value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>"><br>
        <select name="estilo" id="">
            <option value="">--Selecciona--</option>
            <option value="bolitas">Bolitas</option>
            <option value="ladrillos">Ladrillos</option>
        </select>
        <input type="submit" name="enviar" value="Accion"><br><br>
        <?php
        if (isset($_POST['a']) && $_POST['a'] != "" && $_POST['estilo'] != "") {
            $altura = $_POST['a'];
            $estilo = $_POST['estilo'];
            $pared = "<div class='$estilo'></div>";
            $espacio = "<div style='opacity:0' class='$estilo'></div>";

            $piramide = "<div class='piramide'>";
            $piramide .= "<div class='fila'>";
            $piramide .= $pared;
            $piramide .= "</div>";
            $piramide .= "<div class='fila'>";
            $piramide .= $pared;
            $piramide .= $pared;
            $piramide .= "</div>";
            for ($i = 1; $i <= $altura; $i++) {
                $piramide .= "<div class='fila'>";
                $piramide .= $pared;
                $piramide .= str_repeat($espacio, $i);
                $piramide .= $pared;
                $piramide .= "</div>";
            }
            $piramide .= "</div>";
            echo $piramide;
        }
        ?>
    </form>
</body>

</html>