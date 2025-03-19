<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $bilder =[
    [
        "pfad" => "img/1.jpg",
        "alt" => "Blumen",
        "title" => "Blumen"
    ],
    [
        "pfad" => "img/2.jpg",
        "alt" => "Blumen",
        "title" => "Blumen"
    ],
    [
        "pfad" => "img/2.jpg",
        "alt" => "Blumen",
        "title" => "Blumen"
    ]
    ];

    $zufallszahl = array_rand($bilder);
    echo "<img src='{$bilder[$zufallszahl]['pfad']}' 
        height= '200'
        width= '200'
        alt = '{$bilder[$zufallszahl]['alt']}'
        title ='{$bilder[$zufallszahl]['title']}'>\n";
    
    //echo $bilder[2]['pfad'];
    ?>
    


</body>
</html>