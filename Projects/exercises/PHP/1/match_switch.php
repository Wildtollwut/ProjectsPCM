<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $obst= "Apfel";
        echo match ($obst){
            "Apfel" => "$obst ist ein heimisches Obst",
            "Banane" => "$obst ist eine Südfrucht",
            "Orange" => "$obst ist eine Zitrusfrucht",
            default => "kenne ich nicht"
        };

        echo "<hr>\n";
        $obst2 = "Banane";
        switch ($obst2){
            case "Apfel":
                echo "$obst2 ist ein heimisches Obst";
                break;
            case "Banane":
                echo "$obst2 ist eine Südfrucht";
                break;
            case "Orange":
                echo "$obst2 ist eine Zitrusfrucht";
                break;
            default: "kenne ich nicht";

        }






    ?>
</body>
</html>