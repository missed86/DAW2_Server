<?php
function printBiArray($arrayBidimensional)
{
    echo "<table>";
    foreach ($arrayBidimensional as $fila) {
        echo "<tr>";
        foreach ($fila as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
$sudoku1 = array(
    array(5, 3, 0, 0, 7, 0, 0, 0, 0),
    array(6, 0, 0, 1, 9, 5, 0, 0, 0),
    array(0, 9, 8, 0, 0, 0, 0, 6, 0),
    array(8, 0, 0, 0, 6, 0, 0, 0, 3),
    array(4, 0, 0, 8, 0, 3, 0, 0, 1),
    array(7, 0, 0, 0, 2, 0, 0, 0, 6),
    array(0, 6, 0, 0, 0, 0, 2, 8, 0),
    array(0, 0, 0, 4, 1, 9, 0, 0, 5),
    array(0, 0, 0, 0, 8, 0, 0, 7, 9),
);


function resuelveSudoku($sudoku1)
{
    $resolver = array(
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0)
    );

    $x = 0;
    $y = 0;
    $iteraciones = 0;

    for ($a = 0; $a < count($sudoku1); $a++) {
        for ($b = 0; $b < count($sudoku1[$a]); $b++) {
            $resolver[$a][$b] = $sudoku1[$a][$b];
        }
    }
    // Recorrer sudoku
    for ($y = 0; $y < count($sudoku1); $y++) {
        for ($x = 0; $x < count($sudoku1[$y]);) {
            if ($sudoku1[$y][$x] == 0) // solo modificar campos vacios
            {
                $error = false;

                $resolver[$y][$x]++;


                if ($resolver[$y][$x] > 9) {
                    $error = true;
                }

                //Buscando repetidos en eje X
                if (!$error) {
                    for ($posX = 0; $posX < count($sudoku1); $posX++) {
                        if ($x != $posX && $resolver[$y][$posX] == $resolver[$y][$x]) {
                            $error = true;
                            break;
                        }
                    }
                }
                //Buscando repetidos en eje Y
                if (!$error) {
                    for ($posY = 0; $posY < count($sudoku1[$y]); $posY++) {
                        if ($y != $posY && $resolver[$posY][$x] == $resolver[$y][$x]) {
                            $error = true;
                            break;
                        }
                    }
                }
                //Buscando repetidos en bloques de 3x3

                if (!$error) {
                    $bloqueX = (intval($x / 3));
                    $bloqueY = (intval($y / 3));

                    for ($posY = 0; $posY < 3; $posY++) {
                        for ($posX = 0; $posX < 3; $posX++) {
                            if (($bloqueY * 3 + $posY != $y && $bloqueX * 3 + $posX != $x)) {
                                if ($resolver[($bloqueY * 3 + $posY)][($bloqueX * 3 + $posX)] == $resolver[$y][$x]) {
                                    $error = true;
                                    break;
                                }
                            }
                        }
                    }
                }
                if ($error) {

                    if ($resolver[$y][$x] > 9) {
                        $resolver[$y][$x] = 0;
                        do {
                            if ($x == 0) {
                                $y--;
                                $x = 8;
                            } else {
                                $x--;
                            }
                            //$resolver[$y][$x]++;
                        } while ($sudoku1[$y][$x] != 0);


                        //Console.WriteLine($"Coords: {y},{x} | Valor: {$resolver[$y][$x]}");
                    }
                } else {
                    $x++;
                }
                $iteraciones++;
            } else {
                $x++;
            }
        }
    }
    return $resolver;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sudoku Resolver</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <?php

            if (isset($_POST['resuelve'])) {
                
                //Recoge datos de formulario a array bidimensional
                $posSudokuInput = 0;
                $sudokuInput = array();
                for ($i = 0; $i < 9; $i++) {
                    $fila = array();
                    for ($j = 0; $j < 9; $j++) {
                        $number = ($_POST['sudoku'][$posSudokuInput]!=null) ? $_POST['sudoku'][$posSudokuInput] : 0;
                        array_push($fila, $number);
                        $posSudokuInput++;
                    }
                    array_push($sudokuInput, $fila);
                }

                $resolver = resuelveSudoku($sudokuInput);

                for ($i = 0; $i < 9; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 9; $j++) {
                        $number = ($resolver[$i][$j] != 0) ? $resolver[$i][$j] : '';
                        echo "<td>$number</td>";
                    }
                    echo "</tr>";
                }
            } else {
                for ($i = 0; $i < 9; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 9; $j++) {
                        // $number = ($sudoku1[$i][$j] != 0) ? $sudoku1[$i][$j] : '';
                        echo "<td><input type=number name='sudoku[]' value=''></td>";
                    }
                    echo "</tr>";
                }
            }

            ?>
        </table>
        <p><input type="submit" value="Resuelve" name='resuelve'>
        <input type="submit" onclick="window.location()" value="Reset" name='reset'></p>
        
        
    </form>
</body>

</html>