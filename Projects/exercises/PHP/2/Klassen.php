<?php

class Nachspeise
{
    public $name;
    public $zutaten = [];
    public function hatzutat($zutat)
    {
        return in_array($zutat, $this->zutaten);
    }
}

$kuchen = new Nachspeise;
$kuchen->name = "Kuchen";
$kuchen->zutaten = ["Eier", "Mehl", "Butter"];

echo $kuchen->name;
if($kuchen->hatzutat("Eier")){
    echo " ist nicht vegan.<br>\n";
}
else {
    echo " ist vegan.<br>\n";
}

?>