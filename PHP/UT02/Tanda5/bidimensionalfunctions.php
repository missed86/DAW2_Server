<?php
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
?>