<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i = 11;
    if ($i % 2 == 0){
        $fazit = "gerade";
    }
    else{
        $fazit = "nicht gerade";
    }

    echo "Das Ergebnis: Die Zahl $i ist $fazit.";

    echo "<hr>\n";

    $fazit = ($i % 2 == 0) ? "gerade" : "nicht gerade";
    echo "Das Ergebnis: Die Zahl $i ist $fazit.";

    $name = $_POST["name"] ?? "Namenlos";
    
    ?>
</body>
</html>