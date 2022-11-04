<?php 
    function generaArrayInt($size, $min, $max) {
        $array = array();
        for ($i=0; $i < $size; $i++) { 
            array_push($array, rand($min,$max));
        }
        return $array;
    }

    function minimoArrayInt($array) {
        return min($array);
    }

    function maximoArrayInt($array) {
        return max($array);
    }
    function mediaArrayInt($array) {
        $suma=0;
        for ($i=0; $i < count($array); $i++) { 
            $suma+=$array[$i];
        }
        return $suma/count($array);
    }
    function estaEnArrayInt($array, $find) {
        foreach ($array as $value) {
            if($value == $find) {
                return true;
            }
        }
        return false;
    }
    function posicionEnArray($array, $find) {
        foreach ($array as $key => $value) {
            if($value == $find) {
                return $key;
            }
        }
        return -1;
    }
    function volteaArrayInt($array) {
        $newarray = array();
        for ($i=count($array)-1; $i >= 0; $i--) { 
            array_push($newarray, $array[$i]);
        }
        return $newarray;
    }
    function rotaDerechaArrayInt($array, $push){
        for ($i=0; $i < $push; $i++) { 
            array_unshift($array, $array[count($array)-1]);
            unset($array[count($array)-1]);
        }

        return $array;
    }
    function rotaIzquierdaArrayInt($array, $push){
        for ($i=0; $i < $push; $i++) { 
            array_push($array, $array[0]);
            array_splice($array, 0,1);
        }

        return $array;
    }
?>