<?php

$jsonFile = "eintragen.json";

if(!file_exists($jsonFile)){
    echo "Json file not found";
    http_response_code(500);
    exit;
}

$dataArray = json_decode(file_get_contents($jsonFile), true);

if(!is_array( $dataArray )){
    echo "invalid json data";
    exit;
}

$q = isset($_GET['Vorname']) ? trim($_GET['Vorname']) : '';
$hint= [];

if(strlen($q) > 0){
    
    foreach($dataArray as $entry){
        $vorname=$entry['Vorname'];
        $nachname=$entry['Nachname'];
        if(isset($entry['Vorname']) && stristr($entry['Vorname'], $q)){  //where like
            $hint[] = trim(htmlspecialchars($entry['Vorname'] . " " . $entry['Nachname']));
        }                 
    }
    $hint = array_unique($hint);
}

echo json_encode($hint);


