<?php

require_once("../Helpers/init.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

//    $robot = queryGet("SELECT * FROM robots WHERE robotID=$id");
//    $robotData = getAttributesFromArray($robot);

    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM robots WHERE robotID = :robotID");
    $stmt->bindParam(":robotID", $id, PDO::PARAM_INT);
    $stmt->execute();
    $dataArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

   // dd([$uploadDir,$dataArray, $foldePath, $dataArray[0]['img_path']]);

    if (count($dataArray) > 0) {

        $uploadDir = getUploadPath();
        $completeDirPath = $uploadDir . $dataArray[0]['img_path'];
        $folderPath = dirname($completeDirPath);

        // Delete the folder
        deleteImgDirectory($folderPath);

        // Delete robot from database
        $sql_deleteRobot = queryDelete(
            'DELETE FROM robots 
            WHERE robotID = :robotID
            LIMIT 1',
            $id
        );

        echo json_encode((['data' => [
            'status' => true,
            'message' => 'Roboter erfolgreich vernichtet!'
        ]]));
    } else {
        http_response_code(500);
        echo json_encode(['data' => [
            'status' => false,
            'message' => 'Fehler! Roboter konnte nicht gelöscht werden.'
        ]]);
    }

}

exit;

//echo json_encode($data);
//redirect("../../Resources/index.php");

