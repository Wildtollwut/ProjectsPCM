<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sekunden = 200;
        $minuten = $sekunden / 60;
        $minuten = floor($minuten);

        $restsek = $sekunden % 60;
        
        echo "$sekunden Sekunden sind $minuten Minuten und $restsek Sekunden.<br>\n";

    ?>

</body>
</html>