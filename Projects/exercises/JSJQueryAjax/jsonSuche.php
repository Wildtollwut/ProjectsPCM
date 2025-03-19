<?php

$jsonFile = 'eintragen.json';


//check if file exists
if(!file_exists($jsonFile)) {
    echo 'JSON file not found';
    exit;
}

$dataArray = json_decode(file_get_contents($jsonFile), true);

//chef if json data is valid
if(!is_array($dataArray)){
    echo 'Invalid JSON file';
    exit;
}


$q = isset($_GET['sucheVorname']) ? trim($_GET['sucheVorname']) :'';

if(strlen($q) > 0) {
    $hint = "";

    //loop through json data to tind matching "vorname"
    foreach($dataArray as $entry){
        if (isset($entry['Vorname']) && stristr($entry['Vorname'], $q)){
            if($hint == ""){
                $hint = "<strong>" . htmlspecialchars($entry['Vorname']) . " " . htmlspecialchars($entry['Nachname']) . " - " . htmlspecialchars($entry['Nachricht']) . "</strong>";
            }else{
                $hint .= "<br><strong>" . htmlspecialchars($entry['Vorname']) . " " . htmlspecialchars($entry['Nachname']) . " - " . htmlspecialchars($entry['Nachricht']) . "</strong>";
            }
        }
    }
}

$response = empty($hint) ? "" : $hint;
echo $response;

// if(empty($hint)){
//     $response="kein Vorschlag";

// }else{
//     $response=$hint;
// }
// echo $response;

?>