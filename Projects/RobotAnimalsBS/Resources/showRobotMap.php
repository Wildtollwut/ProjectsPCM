<?php
require_once("../App/Helpers/init.php");
require_once("../App/Models/Robot.class.php");

$showRobotsCLASS = queryGetAll("SELECT name, x_coordinate, y_coordinate, color FROM robots");

$robots = [];

foreach ($showRobotsCLASS as $robot) {
    $robots[] = new Robot(
        $robot["name"],
        $robot["x_coordinate"],
        $robot["y_coordinate"],
        $robot["color"]
    );
};

?>

<?php getHeader("Roboter Map") ?>
    <div class="card">
        <div class="card-header">
            Landkarte
        </div>
        <div class="card-body ">
            <div class="justify-items-center">
                <img src="<?php echo getAssetUrl("IMG/map.webp") ?>" class="card-img" alt="...">
                <?php foreach ($robots as $robot) : ?>
                    <div class="robot "
                         style="
                                 top: <?php echo $robot->getY() ?>%;
                                 left: <?php echo $robot->getX() ?>%;
                                 color: <?php echo $robot->getColor() ?>;"
                    >
                        <a type="button"

                           data-tooltip="tooltip"
                           data-bs-custom-class="custom-tooltip"
                           data-bs-title="<?php echo $robot->getName() ?>"
                           data-robot-color="<?php echo $robot->getColor() ?>"
                           style="--robot-color: <?php echo $robot->getColor(); ?>;"
                        >
                            <i class="bi bi-geo-alt-fill"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="<?php echo getResourceUrl("createRobot.php") ?>" role="button"
               class="btn btn-primary btn-sm d-inline-flex align-items-center update">
                <i class='bi bi-wrench-adjustable me-1'></i> Neuer Roboter
            </a>
            <a href="<?php echo getResourceUrl("showRobotList.php"); ?>" class="btn btn-link">
                Zurück zur Liste
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('body').tooltip({
                selector: "[data-tooltip=tooltip]",
                container: "body"
            });
        });
    </script>

<?php getFooter() ?>


