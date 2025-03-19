<?php
$jsonFile = 'eintragen.json';

$inputData = file_get_contents("php://input"); //get json input from ajax ???


//deode existing JSON 
if(file_exists($jsonFile)){
    $dataArray = json_decode(file_get_contents($jsonFile), true);
}else{
    $dataArray = [];
}

// convert new input to an array
$newData = json_decode($inputData, true);

//append new data
$dataArray[] = $newData;

//save updated data to json file
if(file_put_contents($jsonFile, json_encode($dataArray, JSON_PRETTY_PRINT))){
    echo "Daten erfolgreich gespeichert";
}else{
    echo "Fehler beim speichern der Daten";
}

$filteredData = array_filter($dataArray, function($entry){
    return isset ($entry ['name']) && strtolower($entry['name']) === 'katelyn';
});
echo json_encode(array_values($filteredData), JSON_PRETTY_PRINT);

?>