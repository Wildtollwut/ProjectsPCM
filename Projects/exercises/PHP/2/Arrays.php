<?php

$zahlenArray = [23, 54.65, 5, 76, 23.87 , 45, 84.53, 32, 1.76, 95, 45];

function sortieren ($zArray){
   return arsort($zArray);

}

function formatieren(float $zArray): string{
    return number_format($zArray, 2, ",", ".");
}

print_r($zahlenArray);
echo "<br>";

arsort($zahlenArray);
print_r($zahlenArray);
$ergebnis = array_map("formatieren", $zahlenArray);
echo "<br>";

print_r($ergebnis);


?>