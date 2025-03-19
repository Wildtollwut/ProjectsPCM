<?php
echo "Vielen dank fuer Ihre Datan.....<br>";
foreach($_POST as $name => $wert){
    echo htmlspecialchars($name)
        . ": "
        . htmlspecialchars($wert)
        ."<br>";
}