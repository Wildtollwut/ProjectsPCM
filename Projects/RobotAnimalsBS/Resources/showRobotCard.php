<?php

require_once("../App/Helpers/init.php");

if (!isset($_GET['id'])) {
    die("ID ist notwendig");
}

$id = $_GET['id'];
$robot = queryGet("SELECT * FROM robots WHERE robotID=$id LIMIT 1");

if (!$robot) {
    die("Robot existiert nicht. Willst du mein Programm hacken?? vergiss es, Penner!!!");
}

$robotData = getAttributesFromRobotArray($robot);
$manufacturers = queryGetAll("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGetAll("SELECT * FROM robotTypes ORDER BY typeName ASC");
$colors = queryGetAll("SELECT * FROM colors ORDER BY name ASC");
$manufacturer_img = '';
$trimImgPath = '';

if ($robotData['img_path']) {
    $trimImgPath = ltrim($robotData['img_path'], "/");
}

//dd( getAssetUrl('$manufacturers["img_path"]'));

?>

<?php getHeader("Infokarte") ?>

<div class="card">
    <div class="card-header" style="background-color: <?php echo $robotData['colorID'] ?>">
        <p class="h2" style="color: white; font-weight: bold"><?php echo $robotData['name'] ?>
        </p>
    </div>

    <div class="card-body">
        <div class="row g-0">
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <img src="<?php echo getUploadUrl($trimImgPath) ?>" alt="kein Bild gefunden"
                     style="width: 300px; height: 300px; text-align: center"
                     class="img-fluid rounded"
                >
            </div>

            <div class="d-flex col-md-auto offset-md-right">
                <div class="vr"></div>
            </div>

            <div class="col-md-5">
                <p class="p-card">Hersteller: <span style="font-weight: initial">
                        <?php foreach ($manufacturers as $manufacturer) {
                            if ($robotData['manufacturerID'] === $manufacturer["manufacturerID"])
                                echo $manufacturer["name"];
                        } ?></span>
                </p>
                <p class="p-card">Roboter Typ: <span style="font-weight: initial">
                        <?php foreach ($robotTypes as $type) {
                            if ($robotData['robotTypeID'] == $type["typeID"])
                                echo $type["typeName"];
                        } ?></span>
                </p>
                <p class="p-card">Seriennummer: <span style="font-weight: initial">
                        <?php echo $robotData['serialNumber'] ?></span></p>
                <p class="p-card">Gebaut am: <span style="font-weight: initial">
                        <?php echo $robotData['createdAt'] ?></span></p>
                <p class="p-card">Letztes Update: <span style="font-weight: initial">
                        <?php echo $robotData['updatedAt'] ?></span></p>
                <p class="p-card">X Koordinate: <span style="font-weight: initial">
                        <?php echo $robotData['x_coordinate'] ?></span></p>
                <p class="p-card">Y Koordinate: <span style="font-weight: initial">
                        <?php echo $robotData['y_coordinate'] ?></span></p>
                <p class="p-card">Material: <span style="font-weight: initial">
                        <?php echo $robotData['material'] ?></span></p>
            </div>

            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <img src="<?php foreach ($manufacturers as $manufacturer) {
                    if ($robotData['manufacturerID'] === $manufacturer["manufacturerID"])
                        echo getAssetUrl($manufacturer["img_path"]);
                }
                ?>" alt="kein Bild gefunden"
                     style="opacity: 70%; width: 300px; height: 200px; text-align: center"
                     class="img-fluid rounded"
                >
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="<?php echo getResourceUrl("showRobotList.php"); ?>" class="btn btn-link">
            Zurück zur Liste
        </a>
    </div>
</div>

<?php getFooter() ?>
