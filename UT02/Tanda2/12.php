<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT02 - Tanda2 - Ejercicio 12</title>
</head>

<body>
    <h2>Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan de conocimientos en las diferentes asignaturas del curso.</h2>
    
    <form action="" method="post">
        <ol>
            <li>
              ¿Cuál de los siguientes tipos de datos de Java tiene más precisión?<br>
              <input type="radio" name="r1" value="0">a) int<br>
              <input type="radio" name="r1" value="1">b) double<br>
              <input type="radio" name="r1" value="0">c) float<br>
            </li>

            <li>
              ¿Cuál es el lenguaje que se utiliza para hacer consultas en las bases de datos?<br>
              <input type="radio" name="r2" value="0">a) XML<br>
              <input type="radio" name="r2" value="0">b) SELECT<br>
              <input type="radio" name="r2" value="1">c) SQL<br>
            </li>

            <li>
              Para insertar un hiperenlace en una página se utiliza la etiqueta...<br>
              <input type="radio" name="r3" value="0">a) href<br>
              <input type="radio" name="r3" value="1">b) a<br>
              <input type="radio" name="r3" value="0">c) link<br>
            </li>

            <li>
                ¿En qué directorio se encuentran los archivos de configuración de Linux?<br>
                <input type="radio" name="r4" value="1">a) /etc<br>
                <input type="radio" name="r4" value="0">b) /config<br>
                <input type="radio" name="r4" value="0">c) /cfg<br>
            </li>

            <li>
                ¿Cuál de las siguientes memorias es volátil?<br>
                <input type="radio" name="r5" value="1">a) RAM<br>
                <input type="radio" name="r5" value="0">b) EPROM<br>
                <input type="radio" name="r5" value="0">c) ROM<br>
            </li>

          </ol>

          <input type="submit" name="submit" value="Aceptar">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $r1 = $_POST['r1'];
            $r2 = $_POST['r2'];
            $r3 = $_POST['r3'];
            $r4 = $_POST['r4'];
            $r5 = $_POST['r5'];
            
            $resultado = $r1+$r2+$r3+$r4+$r5;
            
            echo "<br><br>";
            
            echo "Nota: $resultado";
        } 
        ?>
    </form>
</body>

</html>