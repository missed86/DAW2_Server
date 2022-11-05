<?php
$primitiva = array();
for ($i=0; $i < 6; $i++) { 
    array_push($primitiva,rand(1,40));
}
$reintegro = rand(0,9);

echo print_r($primitiva)."<br>".$reintegro;

?>