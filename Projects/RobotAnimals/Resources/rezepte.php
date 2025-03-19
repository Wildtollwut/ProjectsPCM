<?php

// Set jsonFile path
$jsonFile = 'rezepte.json';

// Get Rezeptname from the ajax request 
$rezeptname = $_POST['rezeptname'];

// Check if jsonFile exists
if(!file_exists($jsonFile)){
    http_response_code(500);
    echo json_encode(['data'=> [
        'status' => false,
        'message' => "Die Datei {$jsonFile} existiert nicht"
    ]]);
    exit();
}

// File exists: Get json content from $jsonFile
$json = file_get_contents($jsonFile);

// Convert json text to a PHP object/array 
$dataArray = json_decode($json, true);

// Add the new Rezept in the array $dataArraay
$dataArray[] = $rezeptname;

// Convert the new array in a json again
$newJson = json_encode($dataArray, JSON_PRETTY_PRINT);

// Save the new array in $jsonFile
$result = file_put_contents($jsonFile, $newJson);

// Check if newJson was saved corectly
if ($result === false) {
    http_response_code(500);
    echo json_encode(['data'=> [
        'status' => false,
        'message' => "Die Rezepte könnte nicht gespeichert werden",
    ]]);
    exit();
}

// The Rezept was saved. Give back a success message 
echo json_encode(['data'=> [
    'status' => true,
    'message' => "Die neue Rezepte wurde erfolgreich gespeichert",
    'rezepte' => $dataArray,
]]);
exit();
