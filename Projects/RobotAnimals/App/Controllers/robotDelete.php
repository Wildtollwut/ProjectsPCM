<?php

require_once("../Helpers/init.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

//dd($id);

$sql_deleteRobot = queryDelete('DELETE FROM robots 
                                                WHERE robotID = :robotID
                                                LIMIT 1',
                                                $id);

redirect("../../Resources/index.php");