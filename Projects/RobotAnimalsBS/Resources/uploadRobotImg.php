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

//dd($id);
?>

<?php getHeader("Roboter Aussehen konfigurieren"); ?>


    <div class="card">
    <div class="card-header">
        Möchtest das Aussehen deines Roboters ändern?
    </div>
    <div class="card-body">
        <form action="../App/Controllers/robotUploadImg.php?id=<?php echo $id ?>" method="post"
              enctype="multipart/form-data">
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
                                <img class="my-2 rounded-5 m-auto img-fluid border border-warning border-5" id="robotPreview" style="display: none" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="bi bi-upload"></i> Hochladen
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

        </form>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="<?php echo getResourceUrl("showRobotList.php"); ?>" class="btn btn-link">
            Zurück zur Liste
        </a>
    </div>

    <script>
        $(document).ready(function () {
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
        });
    </script>

<?php getFooter(); ?>