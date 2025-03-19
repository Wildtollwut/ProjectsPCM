<?php
    require_once("../App/Helpers/init.php");

    $robots = queryGet("SELECT * FROM robots ORDER BY name ASC");  
    $manufacturers = queryGet("SELECT * FROM manufacturers ORDER BY name ASC");    
    $robotTypes = queryGet("SELECT * FROM robotTypes ORDER BY typeName ASC");    
   
?>

<?php getHeader("Roboter Liste") ?>

<?php getRoot("./showRobotMap.php", "Alle Roboter auf Karte anzeigen"); ?>
<?php getRoot("./createRobot.php", "Neuen Roboter erstellen"); ?>


    <h2>Roboterliste</h2>

    <table class="table">
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
            <th>Aussehen</th>
            <th>Info</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        
    <?php foreach ($robots as $row) :?>
        <tr class="table-row"style="background-color: <?php echo $row["color"]?>;">
            <td><?php echo $row["name"]?></td>
            <td><?php foreach($manufacturers as $manufacturer) :
                        if ($manufacturer["manufacturerID"] == $row["manufacturerID"])
                            echo $manufacturer["name"];
                    endforeach;
                ?>
            </td>
            <td><?php foreach($robotTypes as $type):
                        if($type["typeID"] == $row["type"])
                         echo $type["typeName"];
                    endforeach;
                ?>
            </td>            
            <td><?php echo $row["serialNumber"]?></td>
            <td><?php echo $row["createdAt"]?></td>
            <td><?php echo $row["updatedAt"]?></td>
            <td><?php echo $row["x_coordinate"]?></td>
            <td><?php echo $row["y_coordinate"]?></td>
            <td><?php echo $row["material"]?></td>
            <td><a href="uploadRobotImg.php?id=<?php echo $row['robotID']?>" class="picture" data-id="<?php echo $row['robotID']?>">Bild</a></td>
            <td><a href="showRobotCard.php?id=<?php echo $row['robotID']?>" class="card" data-id="<?php echo $row['robotID']?>">Infokarte</a></td>
            <td><?php getRoot("./updateRobot.php?id=" . $row['robotID'], "Update"); ?></td>
            <td><a href="../App/Controllers/AJAXrobotDelete.php?id=<?php echo $row['robotID']?>" class="delete" data-id="<?php echo $row['robotID']?>">DELETE</a></td>
        </tr>

    <?php endforeach;?>
    </table>
    
    <script>
        $(document).ready( function(){
            $('.delete').on('click', function(e){
                e.preventDefault();
                const row = $(this).closest("tr");
                const href = $(this).attr('href');
                console.log(href);
                console.log(row);
                
                //let robotID = $(this).data('id');
                //console.log(robotID);

                if(confirm('Möchten Sie diesen Roboter löschen?') === true){
                    $.ajax({
                        url: href,
                        //url: "../App/Controllers/AJAXrobotDelete.php?=id" + robotID,
                        type: 'DELETE',                     
                    })
                    .done(function(response){
                        
                        const jsonObj = JSON.parse(response);
                        const {data} = jsonObj;
                        console.log(data.message);

                        row.hide(2000);

                    })
                    .fail(function(error){
                        console.error(error);
                        const {data} = JSON.parse(error.responseText);
                        alert(data.message);
                    })
                }

                
            }
        )});
    </script>


<?php getFooter()?>



