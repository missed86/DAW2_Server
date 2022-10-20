<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 1</title>
</head>
<body>
    <h2>Escribe un programa que pida por teclado un día de la semana y que diga qué asignatura toca a primera hora ese día.</h2>
    <form action="" method="post">
        Día de la semana: <input type="text" name="a" value="<?php if (isset($_POST['a'])) echo $_POST['a'] ?>">
        <input type="submit" name="enviar" value="Accion">
        <?php
            if (isset($_POST['a'])) {
                $dia_semana = $_POST['a'];
                
                switch (strtolower($dia_semana)) {
                    case "lunes":
                        $asig = "Empresa";
                        break;
                    case "martes":
                        $asig = "Desarrollo Web Entorno Servidor";
                        break;
                    case "miercoles":
                        $asig = "Desarrollo Web Entorno Servidor";
                        break;
                    case "jueves":
                        $asig = "Inglés";
                        break;
                    case "viernes":
                        $asig = "Inglés";
                        break;
                    case "sabado":
                        $asig = "Es fin de semana! No hay clase!";
                        break;
                    case "domingo":
                        $asig = "Es fin de semana! No hay clase!";
                        break;
                    default:
                        $asig = "Error";
                }

                echo "<br><br>";
                echo "El ".strtolower($dia_semana)." a primera hora tienes $asig";
                
            }
        ?>
    </form>
</body>
</html>