<?php

// todo icons

require_once("../App/Helpers/init.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $robot = queryGet("SELECT * FROM robots WHERE robotID=$id");

}

$robotData = getAttributesFromRobotArray($robot);
$manufacturers = queryGet("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGet("SELECT * FROM robotTypes ORDER BY typeName ASC");
$colors = queryGet("SELECT * FROM colors ORDER BY name ASC");
//dd(getUploadFile($robotData['img_path']));
?>

<?php getHeader("Show robots") ?>

<h2>Roboter Infokarte</h2>

<div class="container">
    <div class="card_container">
        <img src="<?php echo getUploadUrl($robotData['img_path']) ?>" alt="kein Bild gefunden"
             style="width: 200px; height: 200px"
        >
        <div class="card_data">
            <div class="info">
                <p>Name: <span style=" font-weight: bold; color: <?php echo $robotData['colorID'] ?>"><?php echo $robotData['name'] ?></span></p>
                <p>Hersteller: <?php foreach($manufacturers as $manufacturer) {
                        if($robotData['manufacturerID'] === $manufacturer["manufacturerID"])
                            echo $manufacturer["name"];
                    } ?>
                </p>
                <p>Roboter Typ: <?php foreach($robotTypes as $type) {
                        if($robotData['robotTypeID'] == $type["typeID"])
                            echo $type["typeName"];
                    } ?>
                </p>
                <p>Seriennummer: <?php echo $robotData['serialNumber'] ?></p>
                <p>Gebaut am: <?php echo $robotData['createdAt'] ?></p>
                <p>Letztes Update: <?php echo $robotData['updatedAt'] ?></p>
                <p>X Koordinate: <?php echo $robotData['x_coordinate'] ?></p>
                <p>Y Koordinate: <?php echo $robotData['y_coordinate'] ?></p>
                <p>Material: <?php echo $robotData['material'] ?></p>

            </div>
        </div>
    </div>

</div>

<?php getRoot("./showRobotList.php", "Roboter Liste"); ?>



<?php getFooter()?>
