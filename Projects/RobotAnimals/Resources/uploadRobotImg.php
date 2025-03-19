<?php
require_once("../App/Helpers/init.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $robot = queryGet("SELECT * FROM robots WHERE robotID=$id");
}

?>

<?php getHeader("Roboter Aussehen konfigurieren");?>

<h2>Roboter Aussehen konfigurieren</h2>

<form action="../App/Controllers/robotUploadImg.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
    <label for="robotImg">Bild auswählen:</label>
    <br><br>
    <input type="file" name="robotImg" id="robotImg">
    <br><br>
    <canvas style="height: 200px; width: 200px; border: #111111 1px solid; "></canvas>
    <br>
    <button type="submit">Hochladen</button>
</form>

<?php getRoot("index.php", "Zurück zur Liste"); ?>
<br><br><br><br>
<h4>todo:</h4>
<p>select auswahl < > 3 parts</p>
<p>Robotertyp/humanoid/animal/plant</p>
<p>kopf/kopf/bluete</p>
<p>torso/koerper/blatt</p>
<p>beine/(ohren?schwanz?usw?)/topf</p>
<p>Bilder als Datei speichern und nur den Pfad in der Datenbank speichern?</p>


<?php getFooter();?>