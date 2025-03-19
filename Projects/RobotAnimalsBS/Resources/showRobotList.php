<?php
require_once("../App/Helpers/init.php");

$robots = queryGetAll("SELECT * FROM robots ORDER BY name ASC");
$manufacturers = queryGetAll("SELECT * FROM manufacturers ORDER BY name ASC");
$robotTypes = queryGetAll("SELECT * FROM robotTypes ORDER BY typeName ASC");

?>

<?php getHeader("Roboter Liste") ?>
<div class="px-3">
    <table class="table table-sm table-bordered table-striped">
        <thead class="table-warning">
        <tr>
            <th>Robotername</th>
            <th>Hersteller</th>
            <th>Robotertyp</th>
            <th>Seriennummer</th>
            <th>Geabaut am</th>
            <th>Geändert am</th>
            <th>X-Koordinate</th>
            <th>Y-Koordinate</th>
            <th>Material</th>
            <th>Farbe</th>
            <th>Optionen</th>
        </tr>
        </thead>
        <tfoot class="table-group-divider t_foot">
        <tr class="table-warning">
            <th>Robotername</th>
            <th>Hersteller</th>
            <th>Robotertyp</th>
            <th>Seriennummer</th>
            <th>Geabaut am</th>
            <th>Geändert am</th>
            <th>X-Koordinate</th>
            <th>Y-Koordinate</th>
            <th>Material</th>
            <th>Farbe</th>
            <th>Optionen</th>
        </tr>
        </tfoot>
        <tbody class="t_body table-group-divider">
        <?php foreach ($robots as $row) : ?>
            <tr class="table-row">
                <td><?php echo $row["name"] ?></td>
                <td><?php foreach ($manufacturers as $manufacturer) :
                        if ($manufacturer["manufacturerID"] == $row["manufacturerID"])
                            echo $manufacturer["name"];
                    endforeach;
                    ?>
                </td>
                <td><?php foreach ($robotTypes as $type):
                        if ($type["typeID"] == $row["type"])
                            echo $type["typeName"];
                    endforeach;
                    ?>
                </td>
                <td><?php echo $row["serialNumber"] ?></td>
                <td><?php echo $row["createdAt"] ?></td>
                <td><?php echo $row["updatedAt"] ?></td>
                <td><?php echo $row["x_coordinate"] ?></td>
                <td><?php echo $row["y_coordinate"] ?></td>
                <td><?php echo $row["material"] ?></td>

                <!-- Colorbadge-->
                <td>
                <span class="badge"
                      style="background-color: <?php echo $row["color"] ?>;"><?php echo $row["color"] ?></span>
                </td>

                <!-- Option-Buttons -->
                <td>
                    <!-- Update-Button, redirect with location.href -->
                    <div class="d-grid gap-2 d-md-flex ">
                        <a href="<?php echo getResourceUrl("updateRobot.php?id={$row['robotID']}") ?>" role="button"
                           class="btn btn-outline-primary btn-sm d-inline-flex align-items-center update">
                            <i class='bi bi-wrench-adjustable me-1'></i> Bearbeiten
                        </a>
                        <!--  Dropdown menu-->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Extra
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="showRobotCard.php?id=<?php echo $row['robotID'] ?>">Infokarte</a>
                                </li>
                                <li><a class="dropdown-item" href="uploadRobotImg.php?id=<?php echo $row['robotID'] ?>">Bild
                                        hochladen</a></li>
                            </ul>
                        </div>
                        <!-- Delte-Button, no redirect Confirm-Window -->
                        <button type="button"
                                class="btn btn-outline-danger btn-sm delete"
                                data-bs-toggle="modal"
                                data-tooltip="tooltip"
                                data-bs-target="#delete-modal"
                                data-bs-title="Robot löschen"
                                data-id="<?php echo $row["robotID"] ?>"
                                data-name="<?php echo $row['name'] ?>">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!--    const robotID = $(this).data('id');-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Roboter vernichten!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Möchtest du
                <span class="fw-bold" id="robot-name-placeholder"></span> (ID: <span id="robot-id-placeholder"></span>)
                wirklich löschen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nein</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Ja, löschen</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('body').tooltip({
            selector: "[data-tooltip=tooltip]",
            container: "body"
        });

        $('.img').on('click', function (e) {
            e.preventDefault();
            const robotID = $(this).data('id');
            const target_url = $(this).data('target');
            const url_id = target_url + "?id=" + robotID;

            if (!robotID) {
                alert("Roboter-ID fehlt!")
                return;
            }

            location.replace(url_id);

        })

        $('.delete').on('click', function (e) {
            e.preventDefault();
            const row = $(this).closest("tr");
            const robotName = $(this).data('name');
            const robotID = $(this).data('id');

            // Update modal content with robot ID and name
            $('#robot-id-placeholder').text(robotID);
            $('#robot-name-placeholder').text(robotName);

            if (!robotID) {
                alert("Roboter-ID fehlt!");
                return;
            }
            console.log(row);

            $('#confirm-delete').on('click', function () {
                //const robotID = $(this).data('id');
                //const row = $(this).closest("tr");

                if (!robotID) {
                    alert("Roboter-ID fehlt!");
                    return;
                }
                // console.log(robotID);

                $.ajax({
                    url: "../App/Controllers/AJAXrobotDelete.php?id=" + robotID,
                    type: 'DELETE',

                }).done(function (response) {
                    $('#delete-modal').modal('hide');
                    const jsonObj = JSON.parse(response);
                    const {data} = jsonObj;
                    console.log(data.message);

                    row.hide(2000);

                }).fail(function (error) {
                    console.error(error);
                    const {data} = JSON.parse(error.responseText);
                    alert(data.message);
                })
            })
        });
    });
</script>

<?php getFooter() ?>



