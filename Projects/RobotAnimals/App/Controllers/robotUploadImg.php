<?php

// todo delete folder if robot gets deletet
//

// ABSOLUTE: /var/www/html/Projects/RobotAnimals/App/Controllers/robotUploadImg.php
// ABSOLUTE: http://localhost:9000/Projects/RobotAnimals/App/Controllers/robotUploadImg.php
// RELATIVE: ./App/Controllers/robotUploadImg.php
// RELATIVE: ../../Controllers/App/robotUploadImg.php

    require_once("../Helpers/init.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }



if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_FILES['robotImg'])) {

        $rootUrl = getRootUrl();
        $uploadDir = getUploadPath();
        // directory where the images are stored
        $img_path = "/robots/{$id}/";

        $completeDirPath = $uploadDir . $img_path;

        // original name of uploaded file,
        // basename() ensures only the file name, not the path is extracted
        $imgName = basename ($_FILES['robotImg']['name']);

        $DbImgPath = $img_path . $imgName;
    //dd([$rootUrl, $uploadDir, $img_path, $completeDirPath]);
        $uploadFile = checkIfPathDirectoryExists($completeDirPath, $imgName);


        // move_uploaded_file() moves the file from temporary location to
        // tmp_name = temporary location of the file
        if(move_uploaded_file($_FILES['robotImg']['tmp_name'], $uploadFile)) {
            $sql_queryUploadImgPath = queryUploadImgPath(sql_uploadRobotImgPath: "UPDATE robots 
                                        SET img_path = :robotImg 
                                        WHERE robotID = :robotID",
                                        robotImgPath: $DbImgPath, robotID: $id);

        }else {
        echo "Error: Could not upload the file.";
        }

        redirect("../../Resources/index.php");






//
//        $img = file_get_contents($_FILES['robotImg']['tmp_name']);
//        $sql_queryUploadRobotImg = queryUploadImg(sql_uploadRobotImg: "UPDATE robots
//                                SET img = :robotImg
//                                WHERE robotID = :robotID
//                                ", robotImg: $img, robotID: $id);
//







    }



