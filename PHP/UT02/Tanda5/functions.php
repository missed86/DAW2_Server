<?php
    // Ejercicio 1
    function esCapicua($num) {
        if (strval($num) == join("",array_reverse(str_split(strval($num)))) && $num>99) {
            return true;
        }
        return false;
    }

    // Ejercicio 2
    function esPrimo($num) {
        if ($num >= 2) {
            $primo = true;
            for ($i = 2; $i < $num; $i++) {
                if ($num % $i == 0) {
                    $primo = false;
                    break;
                }
            }
        }else{
            $primo = false;
        }
        return $primo;
    }

    // Ejercicio 3
    function siguientePrimo($num) {
        do {
            $num++;
        } while (!esPrimo($num));
        return $num;
    }

    // Ejercicio 4
    function potencia($base, $exponente) {
        $resultado = $base;
        $resultado = 1;
        if ($exponente == 0) {
            $resultado = 1;
        } else {
            for ($i=0; $i < $exponente; $i++) { 
                $resultado *= $base;
            }
        }
        return $resultado;
    }

    // Ejercicio 5
    function digitos($num) {
        return strlen(strval($num));
    }

    // Ejercicio 6
    function voltea($num) {
        return intval(join("",array_reverse(str_split(strval($num)))));
    }

    // Ejercicio 7
    function digitoN($num, $posicion) {
        return intval(strval($num)[$posicion]);
    }

    // Ejercicio 8
    function posicionDeDigito($numero, $busqueda) {
        $array = str_split(strval($numero));
        foreach ($array as $key => $value) {
            if (intval($value)==$busqueda){
                return $key;
            }
        }
        return -1;
    }

    // Ejercicio 9
    function quitaPorDetras($num, $cantidad) {
        return intval($num/(potencia(10,$cantidad)));
    }

    // Ejercicio 10
    function quitaPorDelante($num, $cantidad) {
        $resta = digitos($num)-$cantidad;
        $paraquitar = quitaPorDetras($num, $resta);
        $redondeado = $paraquitar * potencia(10, $resta);
        return $num-$redondeado;
    }

    // Ejercicio 11
    function pegaPorDetras($num, $add) {
        $haciendohueco = $num* potencia(10,digitos($add));
        return $add+$haciendohueco;
    }

    // Ejercicio 12
    function pegaPorDelante($num, $add) {
        $primeros = $add * potencia(10,digitos($num));
        return $primeros+$num;
    }

    // Ejercicio 13
    function trozoDeNumero($num, $inicio, $fin){
        $resultado = quitaPorDelante($num, $inicio);
        $resultado = quitaPorDetras($resultado, digitos($num)-$fin-1);
        return $resultado;
    }

    // Ejercicio 14
    function juntaNumeros($num, $add) {
        $haciendohueco = $num* potencia(10,digitos($add));
        return $add+$haciendohueco;
    }

    // Ejercicio 15
    function binarioDecimal($bin) {
        $resultado = 0;
        $posicion = 0;
        for ($i=strlen($bin)-1; $i >= 0 ; $i--) { 
            if ($bin[$i] != '0' && $bin[$i] != '1') {
                echo "No es un número binario";
                return false;
            } elseif($bin[$i]=='1') {
                $resultado += potencia(2,$posicion);
            }
            $posicion++;
        }
        return $resultado;
    }
?>