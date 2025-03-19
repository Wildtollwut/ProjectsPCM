<?php 

$jsonFile = 'rezepte.json';
$rezeptIndex = $_POST['rezeptIndex'];

$json = file_get_contents($jsonFile);
//var_dump($json);

// Convert Json text to a PHP Object/Array 
$dataArray = json_decode($json, true);
//var_dump($dataArray);

// Filter and delete all occurrences from the Array
// $newDataArray = array_filter($dataArray, function($content) {
//     return $content !== $_POST['rezeptname'];
// });

array_splice($dataArray, $rezeptIndex, 1);
//unset($dataArray[$rezeptIndex]);
//var_dump($dataArray);

// Convert the new array back to Json String
$newJson = json_encode(array_values($dataArray), JSON_PRETTY_PRINT);

//var_dump($newJson);
// Save the Json String in $jsonFile
$result = file_put_contents($jsonFile, $newJson);

echo json_encode($dataArray);
