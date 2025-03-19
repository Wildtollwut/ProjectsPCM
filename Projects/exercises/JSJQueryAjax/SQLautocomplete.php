<?php
function dd($arg){
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die;
}

try {
    $pdo = new PDO('mysql:host=db;port=3306;dbname=mydatabase;charset=utf8mb4','myuser','mypassword');
    // Set PDO error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    echo 'fehler: '. $e->getMessage();
    die;
}


$q = isset($_POST['name']) ? trim($_POST['name']) : '';


// $sql = "SELECT name FROM robots"; // WHERE name LIKE '%$q%'";
// $dataArray = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//dd($dataArray);

$hint= [];

if(strlen($q) > 0){
    
    $sql = "SELECT robotId, name, serialNumber FROM robots WHERE name LIKE ?"; //'%$q%'";
    //$dataArray = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$q%"]);
    $dataArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //dd($dataArray);

    foreach($dataArray as $entry){

        if(isset($entry['name']) && stristr($entry['name'], $q)){  //where like
            $hint[] = [
                'id' =>$entry['robotId'],
                'name'=> trim(htmlspecialchars($entry['name'])),
                'serialNumber'=> trim(htmlspecialchars($entry['serialNumber']))
            ] ;
        }  
        //dd($hint);               
    }
    
}
echo json_encode(['data' => $hint, 'test' => 'Mirko']);
//dd( $hint);


