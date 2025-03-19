<?php

function arbeitskosten($stundensatz, $stundenAnzahl){
    $erg = $stundenAnzahl * $stundensatz;
    echo "Die Kosten für $stundenAnzahl Stunden, bei einem Stundensatz von $stundensatz €, liegen bei $erg €";
}

arbeitskosten(13, 20);

?>