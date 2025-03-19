<?php
    require_once("../App/Helpers/init.php");
    require_once("../App/Models/Robot.class.php");
    require_once("../App/Models/RobotAnimal.class.php");
    
    $showRobotsCLASS = queryGet("SELECT name, x_coordinate, y_coordinate, color FROM robots");
    
    $robots = [];

    foreach($showRobotsCLASS as $robot) {
        $robots[] = new Robot( 
                        $robot["name"],
                        $robot["x_coordinate"], 
                        $robot["y_coordinate"], 
                        $robot["color"]
                    );

    }

?>

<?php getHeader("Show robots") ?>

<?php foreach($robots as $robot) : ?>  
    <div class="robot" style="
        top: <?php echo $robot->getY()?>%; 
        left: <?php echo $robot->getX()?>%;
        color: <?php echo $robot->getColor()?>;"
    >
        <?php echo $robot->getName()?>
    </div>
<?php endforeach; ?>

<?php getRoot("./showRobotList.php", "Roboter Liste"); ?>
<?php getRoot("./createRobot.php", "Neuen Roboter erstellen"); ?>


<?php getFooter()?>


<?php
        // $sql_showRobotsARR = "SELECT name, x_coordinate, y_coordinate, color FROM robots";
        // $showRobotsARR = $pdo->query($sql_showRobotsARR)->fetchAll(PDO::FETCH_ASSOC);

        // $sql_showRobotsCLASS = "SELECT name, x_coordinate, y_coordinate, color FROM robots";
        // $showRobotsCLASS = $pdo->query($sql_showRobotsCLASS)
        //                         ->fetchAll(
        //                                 PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,
        //                                 "Robot",
        //                                 array($name, $x_coordinate, $y_coordinate, $color)
        //                             );

