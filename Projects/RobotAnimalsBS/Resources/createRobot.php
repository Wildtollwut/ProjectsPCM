<?php
require_once("../App/Helpers/init.php");

$manufacturers = queryGetAll("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGetAll("SELECT * FROM robotTypes ORDER BY typeName ASC");
$colors = queryGetAll("SELECT * FROM colors ORDER BY name ASC");
?>

<?php getHeader("Erstelle einen Roboter") ?>

<form method="post" action="../App/Controllers/robotCreate.php" class="row g-2">

    <div class="card">
        <div class="card-header">
            Möchtest du einen neuen Roboter anlegen?
        </div>
        <div class="card-body col-8">
            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <p class="h4">Roboter konnte nicht erstellt werden!</p>
                    <p>Folgende Angaben fehlen:</p>
                    <?php $errorList = explode(" || ", $_SESSION['error_message']) ?>
                    <ul>
                    <?php foreach($errorList as $error): ?>
                    <?php echo "<li >$error</li>"; ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <div class="col-md-6 mb-2">
                <label class="form-label" for="name">Robotername</label>
                <input type="text" name="name" id="name" class="form-control m-0"/>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label " for="manufacturerID">Hersteller</label>
                <select name="manufacturerID" id="manufacturerID" class="form-select">
                    <option value="">-----</option>
                    <?php foreach ($manufacturers as $manufacturer) : ?>
                        <option value="<?php echo $manufacturer["manufacturerID"]; ?>"><?php echo $manufacturer["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label " for="robotType">Robotertyp</label>
                <select class="form-select" name="robotType" id="robotType">
                    <option>-----</option>
                    <?php foreach ($robotTypes as $robotType) : ?>
                        <option value="<?php echo $robotType["typeID"]; ?>"><?php echo $robotType["typeName"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label " for="serialNumber">Seriennummer</label>
                <input type="text" name="serialNumber" id="serialNumber" class="form-control m-0">
            </div>
            <div class="row g-4 mb-2">
                <div class="col-sm-3">
                    <label class="form-label " for="x_coordinate">X Koordinate</label>
                    <input name="x_coordinate" min="1" max="100" type="number" id="x_coordinate" class="form-control m-0"/>
                </div>
                <div class="col-sm-3 pe-0">
                    <label class="form-label " for="y_coordinate">Y Koordinate</label>
                    <input name="y_coordinate" min="1" max="100" type="number" id="y_coordinate" class="form-control m-0"/>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label " for="color">Farbe</label>
                <select class="form-select" name="color" id="color">
                    <option>-----</option>
                    <?php foreach ($colors as $color) : ?>
                        <option value="<?php echo $color["hexValue"]; ?>"><?php echo $color["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label " for="material">Material</label>
                <input class="form-control m-0" type="text" name="material" id="material">
            </div>
            <div class="col-md-6 mb-2" id="animal" style="display: none">
                <label class="form-label " for="specie">Tierart</label>
                <input class="form-control m-0" type="text" name="specie" id="specie">
                <label class="form-label " for="noise">Tierlaut</label>
                <input class="form-control m-0" type="text" name="noise" id="noise">
            </div>
            <div class="col-md-6 mb-2" id="plant" style="display: none">
                <label class="form-label " for="leaf">Blattart</label>
                <input class="form-control m-0" type="text" name="leaf" id="leaf">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                <i class='bi bi-wrench-adjustable me-1'></i> Roboter anlegen
            </button>
            <a href="<?php echo getResourceUrl("showRobotList.php"); ?>" class="btn btn-link">
                Zurück zur Liste
            </a>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {

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

