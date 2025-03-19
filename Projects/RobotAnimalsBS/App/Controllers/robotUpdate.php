<?php
require_once("../Helpers/init.php");

// Errors via $_SESSION[errors]
$errors = [];
$robot = $_POST;
$id = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Check if form was sent
if (isset($_POST['manufacturerID'])) {

    try {
        // form validation
        if (empty($_POST["name"])) {
            $errors[] = "Robotername";
        }
        if (empty($_POST["manufacturerID"])) {
            $errors[] = "Hersteller";
        }
        if (empty($_POST["x_coordinate"])) {
            $errors[] = "X-Koordinate";
        }
        if (empty($_POST["y_coordinate"])) {
            $errors[] = "Y-Koordinate";
        }

        // error check and display
        if (!empty($errors)) {
            $_SESSION['error_message'] = implode(" || ", $errors);
            redirect(getResourceUrl("updateRobot.php?id=$id"));
        }

        // save robot
        $robotData = getAttributesFromPOST($robot);

        $sql_updateRobot = queryUpdate(
            'UPDATE robots 
                SET manufacturerID = :manufacturerID, 
                name = :name, 
                type = :type, 
                serialNumber = :serialNumber, 
                x_coordinate = :x_coordinate, 
                y_coordinate = :y_coordinate, 
                color = :color, 
                material = :material
                WHERE robotID = :robotID
                LIMIT 1',
        $robotData,
            $id
        );

    } catch (Throwable $e) {
        $errors = explode("||", $e->getMessage());
        $_SESSION['error_message'] = implode(" || ", $errors);
        redirect(getResourceUrl("updateRobot.php?id=$id"));

    }
}


redirect("../../Resources/showRobotMap.php");

