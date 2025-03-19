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


$manufacturers = queryGetAll("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGetAll("SELECT * FROM robotTypes ORDER BY typeName ASC");
$colors = queryGetAll("SELECT * FROM colors ORDER BY name ASC");

$robotData = getAttributesFromRobotArray($robot);
//dd($robot);

?>

<?php getHeader("Update einen Roboter") ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger" role="alert">
        <p class="h4">Roboter konnte nicht geändert werden!</p>
        <p>Folgende Angaben fehlen:</p>
        <?php $errorList = explode(" || ", $_SESSION['error_message']) ?>
        <ul>
            <?php foreach ($errorList as $error): ?>
                <?php echo "<li >$error</li>"; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

    <form method="post" action="../App/Controllers/robotUpdate.php?id=<?php echo $id ?>">
        <div class="card">
            <div class="card-header" style="background-color: <?php echo $robotData['colorID'] ?>">
                <p class="h2" style="color: white; font-weight: bold"><?php echo $robotData['name'] ?>
                </p>
            </div>

            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-3 d-flex ms-2 align-items-center">
                        <div class="flex-column mb-2">
                            <form action="../App/Controllers/robotUploadImg.php?id=<?php echo $id ?>" method="post"
                                  enctype="multipart/form-data">
                                <div class="mb-2">
                                    <label class="mb-2" for="robotImg">Bild auswählen:</label>
                                    <input class="form-control form-control-sm" type="file" name="robotImg"
                                           id="robotImg" accept="image/*">
                                </div>
                                <div>
                                    <img class="my-2 rounded-5 m-auto img-fluid border border-warning border-5"
                                         id="robotPreview" style="display: none"/>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="bi bi-upload"></i> Hochladen
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="d-flex col-md-auto offset-md-right">
                        <div class="vr"></div>
                    </div>

                    <div class="col-8 pb-4">
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="name">Robotername</label>
                            <input type="text" name="name" id="name" value="<?php echo $robotData['name']; ?>"
                                   class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="manufacturerID">Hersteller</label>
                            <select name="manufacturerID" id="manufacturerID" class="form-select">
                                <option value="">-----</option>
                                <?php foreach ($manufacturers as $manufacturer) : ?>
                                    <option value="<?php echo $manufacturer["manufacturerID"]; ?>"
                                        <?php if ($robotData['manufacturerID'] === $manufacturer["manufacturerID"]) echo "selected" ?>>
                                        <?php echo $manufacturer["name"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="robotType">Robotertyp</label>
                            <select name="robotType" id="robotType" class="form-select">
                                <option value="">-----</option>
                                <?php foreach ($robotTypes as $robotType) : ?>
                                    <option value="<?php echo $robotType["typeID"] ?>"
                                        <?php if ($robotData['robotTypeID'] == $robotType["typeID"]) echo "selected" ?>>
                                        <?php echo $robotType["typeName"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="serialNumber">Seriennummer</label>
                            <input type="text" name="serialNumber" id="serialNumber"
                                   value="<?php echo $robotData['serialNumber']; ?>" class="form-control">
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <label class="form-label mb-1" for="x_coordinate">X Koordinate</label>
                                <input name="x_coordinate" min="1" max="100" type="number" id="x_coordinate"
                                       value="<?php echo $robotData['x_coordinate'] ?>"
                                       class="form-control"/>
                            </div>
                            <div class="col-sm-3 pe-0">
                                <label class="form-label mb-1" for="y_coordinate">Y Koordinate</label>
                                <input name="y_coordinate" min="1" max="100" type="number" id="y_coordinate"
                                       value="<?php echo $robotData['y_coordinate'] ?>"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="color">Farbe</label>
                            <select name="color" id="color" value="" class="form-select">
                                <option value="">-----</option>
                                <?php foreach ($colors as $color) : ?>
                                    <option value="<?php echo $color["hexValue"]; ?>"
                                        <?php if ($robotData['colorID'] == $color["hexValue"]) echo "selected" ?>>
                                        <?php echo $color["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1" for="material">Material</label>
                            <input type="text" name="material" id="material"
                                   value="<?php echo $robotData['material']; ?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2" id="animal" style="display: none">
                            <label class="form-label mb-1" for="specie">Tierart</label>
                            <input type="text" name="specie" id="specie" class="form-control">

                            <label class="form-label mb-1" for="noise">Tierlaut</label>
                            <input type="text" name="noise" id="noise" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2" id="plant" style="display: none">
                            <label class="form-label mb-1" for="leaf">Blattart</label>
                            <input type="text" name="leaf" id="leaf" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class='bi bi-wrench-adjustable me-1'></i> Roboter Bearbeiten
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

        $("#robotImg").on("change", function (event) {
            let file = event.target.files[0]; // Get the selected file
            if (file) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#robotPreview").attr("src", e.target.result).fadeIn(500);
                };
                reader.readAsDataURL(file); // Read file as DataURL
            }
        });
    </script>

<?php getFooter() ?>