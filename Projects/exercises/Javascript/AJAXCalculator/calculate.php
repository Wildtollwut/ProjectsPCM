<?php

$q = isset($_POST['calculation']) ? trim($_POST['calculation']) : '';

// if(!is_numeric(substr($q,0,1))){
    
//     exit;
// }

$result = eval("return $q;");
$response = empty($result) ? "" : $result;
$data = ["data" => $response] ;

// var_dump($q);                                   // var_dump output ' "string(3) \'5*5\" 25" '
// $parts = explode('"', $result);     // Split at " quotes
// $response = trim(end($parts));         // Get last part and removes spaces

echo json_encode($data);
//echo $response;