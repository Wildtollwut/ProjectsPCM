<?php
    require_once("../App/Helpers/init.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $robot = queryGet("SELECT * FROM robots WHERE robotID=$id");               
    }

    $manufacturers = queryGet("SELECT * FROM manufacturers ORDER BY name ASC");    
    $robotTypes = queryGet("SELECT * FROM robotTypes ORDER BY typeName ASC");    
    $colors = queryGet("SELECT * FROM colors ORDER BY name ASC");

    $robotData = getAttributesFromRobotArray($robot);
    //dd($robot);

?>

<?php getHeader("Roboter loeschen");?>

<h2>Roboter vernichten?</h2>
<table>
    <tr>
        <td>Robotername</td>
        <td><?php echo $robotData['name']?></td>
    </tr>
    <tr>
        <td>Hersteller</td>
        <td>
            <?php foreach($manufacturers as $manufacturer) :
                    if($robotData['manufacturerID'] == $manufacturer["manufacturerID"]) 
                        echo $manufacturer["name"];
                endforeach; 
            ?>
        </td>
    </tr>
    <tr>
        <td>Robotertyp</td>
        <td>
            <?php foreach($robotTypes as $type) :
                    if($robotData['robotTypeID'] == $type["typeID"])
                        echo $type["typeName"];
                endforeach;
            ?>
        </td>
    </tr>
    <tr>
        <td>Seriennummer</td>
        <td><?php echo $robotData['serialNumber']?></td>
    </tr>
    <tr>
        <td>Gebaut am</td>
        <td><?php echo $robotData['createdAt']?></td>
    </tr>
    <tr>
        <td>Bearbeitet am</td>
        <td><?php echo $robotData['updatedAt']?></td>
    </tr>
    <tr>
        <td>X-Koordinate</td>
        <td><?php echo $robotData['x_coordinate']?></td>
    </tr>
    <tr>
        <td>Y-Koordinate</td>
        <td><?php echo $robotData['y_coordinate']?></td>
    </tr>
    <tr>
        <td>Farbe</td>
        <td>
            <?php foreach($colors as $color) :
                    if($robotData['colorID'] == $color["hexValue"])
                        echo $color["name"];
                endforeach;
            ?>
        </td>
    </tr>
    <tr>
        <td>Material</td>
        <td><?php echo $robotData['material']?></td>
    </tr>
</table>

<h3>Möchtest du <span style="color: <?php echo $robotData['colorID']?>"><?php echo $robotData['name']?></span> vernichten?</h3>

<?php getRoot("index.php", "Nein"); ?>
<?php getRoot("../App/Controllers/robotDelete.php?id=" . $id, "Ja"); ?>
<p>Löschung kann nicht Rückgängig gemacht werden!</p>



<?php getFooter();?>