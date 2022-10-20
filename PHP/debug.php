<?php
    function varName($var) {
        foreach($GLOBALS as $varName => $value) {
            if ($value === $var) {
                return $varName;
            }
        }
        return;
    }
    function console($debug) {
        if (is_array($debug)) {
            echo "<script>let jrewoprje = []; let Odjasidjaso;";
            foreach ($debug as $id=>$value) {
                echo "Odjasidjaso = {'id': '$id', 'value': '$value'};";
                echo "jrewoprje.push(Odjasidjaso);";
            }
            echo "console.log('$".varName($debug)."',jrewoprje);</script>";
        } else {
            echo "<script>console.log('$".varName($debug).":','$debug')</script>";

        }
    }
?>