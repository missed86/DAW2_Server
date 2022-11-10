<?php
function printArray($array)
{
    echo "<table>";
    echo "<tr>";
    foreach ($array as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
    echo "</table>";
}
function printArray_keys($array)
{
    echo "<table>";
    echo "<tr>";
    foreach ($array as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($array as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
    echo "</table>";
}
