
<?php
    
    date_default_timezone_set("Europe/Berlin");
    $uhrzeit_h = date ("H");
    $uhrzeit_hm = date ("H:i");

    switch ($uhrzeit_h){
        case "09":
            echo "Guten Morgen! Es ist $uhrzeit_hm.";
            $farbe ="orange";
            break;
        case "10":
            echo "Guten Morgen! Es ist $uhrzeit_hm.";
            $farbe ="blue";
            break;
        case "11":
            echo "Guten Morgen! Es ist $uhrzeit_hm.";
            $farbe ="yellow";
            break;
        default: echo "Guten Morgen! Es ist $uhrzeit_hm.";
    }

    echo "<h1>$uhrzeit_hm</h1>";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <style> body {background-color: <?php echo $farbe;?>} </style>
</head>
<body>


</body>
</html>