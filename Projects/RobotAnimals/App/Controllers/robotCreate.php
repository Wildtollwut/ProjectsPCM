<?php
    require_once("../Helpers/init.php");
    
    $errors = [];
    $robot = $_POST;

    // Check if form was sent
    if(isset($_POST['manufacturerID'])){
        
        try{ 
            // form validation 
            if(empty($_POST["manufacturerID"])){ 
                    $errors[] = "Bitte Hersteller angeben";
            }
            if(empty($_POST["name"])){ 
                    $errors[] = "Bitte Name angeben";
            }
            if(empty($_POST["x_coordinate"])){ 
                    $errors[] = "Bitte X-Koordinate angeben";
            }
            if(empty($_POST["y_coordinate"])){ 
                    $errors[] = "Bitte Y-Koordinate angeben";
            }

            // error check and display
            if (!empty($errors)){
                throw new Exception(implode("||", $errors));
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
    
        } catch(Throwable $e){
            $errors = explode("||", $e->getMessage()) ;
            
            echo "<h2>Roboter konnte nicht erstellt werden:</h2>";
            echo "<ul>";
            foreach($errors as $error){
                echo "<li>{$error}</li>";
            }
            echo "</ul>";

            getRoot("../../Resources/createRobot.php", "Zurück");
            
            die;
        }
    }


    redirect("../../Resources/showRobotMap.php");

