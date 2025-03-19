<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $alter = 12;
        if ($alter > 17 || $alter <= 6){
            echo "Mit $alter wahrscheinlich kein Schulkind";
        }
        else {
            echo "Mit $alter wahrscheinlich Schulkind";
        }
        echo "<hr>";

        if($alter <= 17 && $alter >= 6){
            echo "Mit $alter wahrscheinlich Schulkind";
        }
        else {
            echo "Mit $alter wahrscheinlich kein Schulkind";
        }


    ?>
</body>
</html>