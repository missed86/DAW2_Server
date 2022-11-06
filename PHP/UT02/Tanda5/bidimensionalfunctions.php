<?php
    function printBiArray($arrayBidimensional) {
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
    function printArray($array) {
        echo "<table>";
        echo "<tr>";
        foreach ($array as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
    function generaArrayBiInt($n, $m, $min, $max) {
        $x = array();
        for ($i=0; $i < $n; $i++) { 
            $y = array();
            for ($j=0; $j < $m; $j++){
                array_push($y, rand($min, $max));
            }
            array_push($x, $y);
        }
        return $x;
    }

    function filaDeArrayBiInt($arrayBi, $fila) {
        return $arrayBi[$fila];
    }
    function columnaDeArrayBiInt($arrayBi, $columna) {
        $arrayCol = array();
        foreach ($arrayBi as $value) {
            array_push($arrayCol, $value[$columna]);
        }
        return $arrayCol;
    }
    function coordenadasEnArrayBiInt($arrayBi, $find) {
        for ($i=0; $i < count($arrayBi); $i++) { 
            for ($j=0; $j < count($arrayBi[$i]); $j++) { 
                if ($arrayBi[$i][$j] == $find) {
                    return [$i, $j];
                }
            }
        }
        return [-1,-1];
    }
    
?>