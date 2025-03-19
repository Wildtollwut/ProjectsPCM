<?php
require_once("../App/Helpers/init.php");

$manufacturers = queryGet("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGet("SELECT * FROM robotTypes ORDER BY typeName ASC");
$colors = queryGet("SELECT * FROM colors ORDER BY name ASC");

?>

<?php getHeader("Show robots") ?>

<form method="post" action="../App/Controllers/robotCreate.php">

    <h2>Erstelle einen neuen Roboter</h2>

    <label for="name">Robotername</label><br>
    <input type="text" name="name" id="name"><br>

    <label for="manufacturerID">Hersteller</label><br>
    <select name="manufacturerID" id="manufacturerID">
        <option value="">-----</option>
        <?php foreach ($manufacturers as $manufacturer) : ?>
            <option value="<?php echo $manufacturer["manufacturerID"]; ?>"><?php echo $manufacturer["name"]; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="robotType">Robotertyp</label><br>
    <select name="robotType" id="robotType">
        <option>-----</option>
        <?php foreach ($robotTypes as $robotType) : ?>
            <option value="<?php echo $robotType["typeID"]; ?>"><?php echo $robotType["typeName"]; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="serialNumber">Seriennummer</label><br>
    <input type="text" name="serialNumber" id="serialNumber"><br>

    <label for="x_coordinate">X Koordinate</label><br>
    <input type="number" name="x_coordinate" id="x_coordinate" min="1" max="100"><br>

    <label for="y_coordinate">Y Koordinate</label><br>
    <input type="number" name="y_coordinate" id="y_coordinate" min="1" max="100"><br>

    <label for="color">Farbe</label><br>
    <select name="color" id="color">
        <option>-----</option>
        <?php foreach ($colors as $color) : ?>
            <option value="<?php echo $color["hexValue"]; ?>"><?php echo $color["name"]; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="material">Material</label><br>
    <input type="text" name="material" id="material"><br>

    <div id="animal" style="display: none">
        <label for="specie">Tierart</label><br>
        <input type="text" name="specie" id="specie"><br>

        <label for="noise">Tierlaut</label><br>
        <input type="text" name="noise" id="noise"><br>
    </div>

    <div id="plant" style="display: none">
        <label for="leaf">Blattart</label><br>
        <input type="text" name="leaf" id="leaf">
    </div>

    <div id="humanoid">

    </div>


    <br><br>
    <button type="submit">Roboter anlegen</button>
    <br>
    <?php getRoot("index.php", "Zurück zur Liste"); ?>

</form>

<script>
    $(document).ready(function() {

        // change on select RobotType
        // function isOptionSelected(selectId, valueToCheck) {
        //     return $(`#${selectId}`).val() === valueToCheck;
        // }


        $('#robotType').on('change', function () {
            let selectedValue = $(this).val();

            $('#animal, #plant, #humanoid').hide();

            if (selectedValue === '2') {
                console.log("animal");
                $('#animal').show();
            }
            if (selectedValue === '3') {
                $('#plant').show();
            }
            if (selectedValue === '1') {

            }
        });
    });
</script>

<?php getFooter() ?>

