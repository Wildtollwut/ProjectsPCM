<?php
require_once("../Helpers/init.php");

// Errors via $_SESSION[errors]
$errors = [];
$robot = $_POST;

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
            redirect(getResourceUrl("createRobot.php"));
        }

        // save robot
        $robotData = getAttributesFromPOST($robot);

        $sql_insertRobot = queryInsertRobot(
            "INSERT INTO robots (manufacturerID, name, type, serialNumber, x_coordinate, y_coordinate, color, material)
                                VALUES (:manufacturerID, 
                                    :name, 
                                    :type, 
                                    :serialNumber, 
                                    :x_coordinate, 
                                    :y_coordinate, 
                                    :color, 
                                    :material
                                    );",
            $robot
        );

        redirect("../../Resources/showRobotMap.php");

    } catch (Throwable $e) {
        $errors = explode("||", $e->getMessage());
        $_SESSION['error_message'] = implode(" || ", $errors);
        redirect(getResourceUrl("createRobot.php"));
    }
}

redirect("../../Resources/showRobotMap.php");

