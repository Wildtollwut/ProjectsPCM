<?php
$navigation = [
    "Startseite.php" => "Start",
    "Service.php" => "Service",
    "Impressum.php" => "Impressum"
    ];

    echo "<ul>";
    foreach($navigation as $nav => $title){
        echo "<li><a href='$nav' class='$title'>$title</a></li>\n";
    }
    echo "</ul>";
?>