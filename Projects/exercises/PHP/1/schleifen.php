
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i = 1;
    while ($i < 7){
        echo "$i. Hallo, While Schleife<br>";
        $i++;
    }


    do{
        echo "$i. Hallo, Do-While Schleife<br>";
        $i++;
    }while ($i < 10);


    for($i = 1; $i <= 10; $i++){
        echo "$i. Hallo, For Schleife <br>";
    }


    echo "<select name= 'alter'>\n ";
    for ($min = 1, $max = 10; $min < 70; $min +=10, $max += 10){
        echo "<option>$min -$max </option>\n";
    }
    echo "</select><br>\n";

    $min = 1;
    $max = 6;
    $zaehler = 0;

    while(1){
        $zahl1 = rand($min, $max);
        $zahl2 = rand($min, $max);
        echo "$zahl1 $zahl2<br>\n";
        $zaehler++;
        if($zahl1 == $zahl2){
            break;
        }

    }
    echo "Beim $zaehler. Versuch geklappt."



    ?>
</body>
</html>