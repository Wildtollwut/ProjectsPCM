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

<?php getHeader("Show robots") ?>
                                                        
<form method="post" action="../App/Controllers/robotUpdate.php?id=<?php echo $id?>">

    <h2>Update Roboter</h2>
    
    <label for="name">Robotername</label><br>
    <input type="text" name="name" id="name" value="<?php echo $robotData['name'];?>"><br>

    <label for="manufacturerID">Hersteller</label><br>
    <select name="manufacturerID" id="manufacturerID">
        <option value="">-----</option>   
        <?php foreach($manufacturers as $manufacturer) :  ?>
            <option value="<?php echo $manufacturer["manufacturerID"];?>"
                <?php if($robotData['manufacturerID'] === $manufacturer["manufacturerID"]) echo "selected"?>>
                    <?php echo $manufacturer["name"];?>
            </option>
        <?php endforeach;?>
    </select><br>

    <label for="robotType">Robotertyp</label><br>
    <select name="robotType" id="robotType">
        <option value="">-----</option>
        <?php foreach($robotTypes as $robotType) : ?>
            <option value="<?php echo $robotType["typeID"]?>"
                <?php if($robotData['robotTypeID'] == $robotType["typeID"]) echo "selected"?>>
                    <?php echo $robotType["typeName"];?>
            </option>
        <?php endforeach;?>
    </select><br>

    <label for="serialNumber">Seriennummer</label><br>
    <input type="text" name="serialNumber" id="serialNumber" value="<?php echo $robotData['serialNumber'];?>"><br>

    <label for="x_coordinate">X Koordinate</label><br> <!-- besser? -->
    <input type="number" 
            name="x_coordinate" 
            id="x_coordinate" 
            min="1" max="100" 
            value="<?php echo $robotData['x_coordinate'];?>"
        ><br>

    <label for="y_coordinate">Y Koordinate</label><br>
    <input type="number" name="y_coordinate" id="y_coordinate" min="1" max="100" value="<?php echo $robotData['y_coordinate'];?>"><br>

    <label for="color">Farbe</label><br>
    <select name="color" id="color" value="">
    <option value="">-----</option> 
        <?php foreach($colors as $color) : ?>
            <option value="<?php echo $color["hexValue"];?>"
                <?php if($robotData['colorID'] == $color["hexValue"]) echo "selected"?>>
                    <?php echo $color["name"];?></option>
        <?php endforeach;?>
    </select><br>

    <label for="material">Material</label><br>
    <input type="text" name="material" id="material" value="<?php echo $robotData['material'];?>"><br>
    
    <!-- <label for="specie">Tierart</label><br>
    <input type="text" name="specie" id="specie"><br>

    <label for="noise">Tierlaut</label><br>            
    <input type="text" name="noise" id="noise"><br>
        
    <label for="leaf">Blattart</label><br>
    <input type="text" name="leaf" id="leaf"> -->
    
    
    <h3>Möchtest du <span style="color: <?php echo $robotData['colorID']?>"><?php echo $robotData['name']?></span> aktualisieren?</h3>    
    <button type="submit">Roboter updaten</button>
    <br>
    <?php getRoot("index.php", "Zurück zur Liste"); ?>

</form>

<?php getFooter()?>