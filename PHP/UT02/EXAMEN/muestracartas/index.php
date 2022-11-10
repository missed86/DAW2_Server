
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra Cartas</title>
    <link rel="stylesheet" href="examen.css">
</head>

<body>
    <h1>MUESTRA CARTAS (FORMULARIO)</h1>
    <P>
    Elija un número de cartas y un palo.    
    </p>
    <form action="resultado.php" method="POST">
        <label>Número de cartas:</label>
        <input type="number" name="numero" autofocus min="3" max="12">
        <select name="palo" id="">
            <option value="c">Corazones</option>
            <option value="d">Diamantes</option>
            <option value="t">Tréboles</option>
            <option value="p">Picas</option>
        </select>
        <p>
            <input type="submit" value="Contar">
            <input type="reset" value="Borrar">
        </p>
    </form>

</body>

</html>