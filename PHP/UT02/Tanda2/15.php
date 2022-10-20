<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 15</title>
</head>

<body>
    <h2>Realiza un programa que nos diga si hay probabilidad de que nuestra pareja nos está siendo infiel. El programa irá haciendo preguntas que el usuario contestará con verdadero o falso. Puedes utilizar radio buttons. Cada pregunta contestada como verdadero sumará 3 puntos. Las preguntas contestadas con falso no suman puntos. Utiliza el fichero test_infidelidad.txt para obtener las preguntas y las conclusiones del programa.</h2>
    <form action="" method="post">
        <ol>
            <li>
                Tu pareja parece estar más inquieta de lo normal sin ningún motivo aparente.<br>
                <input type="radio" name="p1" value=1 id=""> Sí <br>
                <input type="radio" name="p1" value=0 id=""> No <br>
            </li>
            <li>
                Ha aumentado sus gastos de vestuario<br>
                <input type="radio" name="p2" value=1 id=""> Sí <br>
                <input type="radio" name="p2" value=0 id=""> No <br>
            </li>
            <li>
                Ha perdido el interés que mostraba anteriormente por ti<br>
                <input type="radio" name="p3" value=1 id=""> Sí <br>
                <input type="radio" name="p3" value=0 id=""> No <br>
            </li>
            <li>
                Ahora se afeita y se asea con más frecuencia (si es hombre) o ahora se arregla el pelo y se asea con más frecuencia (si es mujer)<br>
                <input type="radio" name="p4" value=1 id=""> Sí <br>
                <input type="radio" name="p4" value=0 id=""> No <br>
            </li>
            <li>
                No te deja que mires la agenda de su teléfono móvil<br>
                <input type="radio" name="p5" value=1 id=""> Sí <br>
                <input type="radio" name="p5" value=0 id=""> No <br>
            </li>
            <li>
                A veces tiene llamadas que dice no querer contestar cuando estás tú delante<br>
                <input type="radio" name="p6" value=1 id=""> Sí <br>
                <input type="radio" name="p6" value=0 id=""> No <br>
            </li>
            <li>
                Últimamente se preocupa más en cuidar la línea y/o estar bronceado/a<br>
                <input type="radio" name="p7" value=1 id=""> Sí <br>
                <input type="radio" name="p7" value=0 id=""> No <br>
            </li>
            <li>
                Muchos días viene tarde después de trabajar porque dice tener mucho más trabajo<br>
                <input type="radio" name="p8" value=1 id=""> Sí <br>
                <input type="radio" name="p8" value=0 id=""> No <br>
            </li>
            <li>
                Has notado que últimamente se perfuma más<br>
                <input type="radio" name="p9" value=1 id=""> Sí <br>
                <input type="radio" name="p9" value=0 id=""> No <br>
            </li>
            <li>
                Se confunde y te dice que ha estado en sitios donde no ha ido contigo<br>
                <input type="radio" name="p10" value=1 id=""> Sí <br>
                <input type="radio" name="p10" value=0 id=""> No <br>
            </li>
        </ol>

        <input type="submit" name="enviar" value="Accion">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $resultado = 0;
        
        echo "<br><br>";
        for ($i = 1; $i < 10; $i++) {
            if (!isset($_POST['p'.$i])) {
                $resultado = -1;
                break;
            } else {
                $resultado += $_POST['p'.$i]*3;
            }
        }

        if ($resultado > 0 && $resultado <= 10) {
            echo "¡Enhorabuena! tu pareja parece ser totalmente fiel.";
        } elseif ($resultado >= 11 && $resultado <= 21) {
            echo "Quizás exista el peligro de otra persona en su vida o en su mente, aunque seguramente será algo sin importancia. No bajes la guardia.";
        } elseif ($resultado >= 21 && $resultado <= 30) {
            echo "Tu pareja tiene todos los ingredientes de estar viviendo un romance con otra persona. Te aconsejamos que indagues un poco más y averigües qué es lo que está pasando por su cabeza.";
        } else {
            echo "Tienes que contestar todas las preguntas!";
        }
    }
    ?>
</body>

</html>