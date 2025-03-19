<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
    $name = "Kathrin";
    $alter ="40";
    $wohnort ="Ruesselsheim";

    echo "<h1>Meine Variablen</h1><br>";
    echo "<p>Name: $name <br>Alter: $alter <br>Wohnort: $wohnort</p>\n";
    echo __FILE__;
    echo "<br><br>";
    ?>

    <?php
    $a ="Hallo";
    var_dump($a);
    $a = 7;
    var_dump($a);

    echo"<hr>";
    $string = "3 Monate und 12 Tage";
    $erg = $string + 3;
    echo $erg;

    echo"<hr>";
    $string ="22";
    var_dump($string);
    $zahl = (int)$string;
    var_dump($zahl);
    
    echo "<hr>";
    echo gettype($zahl);

    echo "<hr>";
    echo "<h2>Operatoren</h2>";
    $z1 = 6;
    $z2 = 4;
    echo $z1 % $z2;

    echo "<hr>";
    $a = 5;
    //$a = $a + 2;
    $a += 2;
    echo $a;
    echo "<br>";

    $a++;
    echo $a;
    echo "<br>";
    $a--;
    echo $a;
    echo "<br><hr>";

    $erg = (7 + 2) * 3;
    echo $erg;
    echo "<br><hr>";

    echo "<hr>";
    echo "<h2>Konkateniern</h2>";
    $koffer = "Rock";
    $koffer = $koffer . " und Pulli";
    $koffer .= " und T-Shirt";
    echo "Ich nehme $koffer mit.";
    echo "<br>\n<hr>";

    echo "<h2>Arrays</h2>";
    $obst = ["Apfel", "Birne", "Banane", 5];
    $obst2 = array("Birne", "Pflaume", "Melone", "Kiwi");
    echo $obst[0];
    $obst[] = "Orange";
    echo $obst[3];

    echo "<br>\n";
    echo "<pre>";
    print_r($obst);
    echo "</pre>";
    echo "<pre>";
    var_dump($obst);
    echo "</pre>";

    echo "<br>\n";
    echo "<hr>";
    foreach($obst2 as $o){
        echo "$o<br>\n";
    }

/*     echo "<br>";
    echo "<ul>";
    foreach($obst2 as $o){
        echo "<li>$o</li>";
    }
    echo "<ul>";

    echo "<hr>";
    echo "<br>\n";
    echo "<ol>";
    foreach($obst2 as $o){
        echo "<li>$o</li>\n";
    }
    echo "</ol>";
    echo "<hr>";
    echo "<br>\n"; */

    echo "<hr>";
    $farben = [
        "rot" => "#FF0000",
        "grün" => "#00FF00",
        "blau" => "#0000FF",
    ];
    $farben["schwarz"] = "#000000";
    //echo $farben["grün"];
    foreach($farben as $k => $v){
        echo "$k: $v<br>";
    }

    echo "<br>\n";
    echo "<hr>";
    echo "<ul>";
    foreach ($_SERVER as $k => $v){
        echo "<li>$k: $v</li>\n";
    }
    echo "</ul>";

    echo "<br>\n";
    echo "<hr>";
    $personen = [
        ["Peregrin", "Tuk"],
        ["Bilbo", "Beutlin"],
        ["Samweis", "Gamdschie"]
    ];
    echo $personen[1][1];
    echo "<br>";
    echo $personen[2][0];
    echo "<br>";
    $zufallszahl = array_rand($personen);
    echo $personen [$zufallszahl][0];
    echo "<br>\n";
    echo "<hr>";

    ?>

    <h2>Include</h2>;
    <?php
    include "header.php";
    ?>
    <p>PHP ist die beliebteste serverseitige Skriptsprache zur Erstellung von dynamischen Webseiten und kommt zum Beispiel in den bekannten Open-Source-Content-Management-Systeme wie WordPress oder Joomla! zum Einsatz. Dabei erfüllt PHP sowohl für kleine Verbesserungen in Webseiten aber genau so auch in großen Projekten ihren Zweck. Der erste Teil des umfangreichen Grundlagentrainings bietet Ihnen ein Einstieg in diese wichtige Sprache: Sie erfahren, wie Sie sich eine Entwicklungsumgebung einrichten und mit PHP starten, Sie sehen, wie Sie mit Variablen und verschiedenen Datentypen arbeiten, externe Dateien einbinden und mit Verzweigungen und Schleifen Dynamik in Ihr Programm bringen. Um optimal vom Kurs zu profitieren, sollten Sie über grundlegende HTML-Kenntnisse verfügen. Anhand von Code-Challenges am Ende jeden Kapitels können Sie das Erlernte sofort testen und Ihre Lösung auch gleich mit der von Ihrer Trainerin Florence Maurice angebotenen vergleichen.</p>
    <?php
    include "copyright.php";
    ?>

    <br>
    <hr>
    <h1>Startseite</h1>
    <?php
    include "nav.php";
    ?>
    <p>PHP ist die beliebteste serverseitige Skriptsprache zur Erstellung von dynamischen Webseiten und kommt zum Beispiel in den bekannten Open-Source-Content-Management-Systeme wie WordPress oder Joomla! zum Einsatz. Dabei erfüllt PHP sowohl für kleine Verbesserungen in Webseiten aber genau so auch in großen Projekten ihren Zweck. Der erste Teil des umfangreichen Grundlagentrainings bietet Ihnen ein Einstieg in diese wichtige Sprache: Sie erfahren, wie Sie sich eine Entwicklungsumgebung einrichten und mit PHP starten, Sie sehen, wie Sie mit Variablen und verschiedenen Datentypen arbeiten, externe Dateien einbinden und mit Verzweigungen und Schleifen Dynamik in Ihr Programm bringen. Um optimal vom Kurs zu profitieren, sollten Sie über grundlegende HTML-Kenntnisse verfügen. Anhand von Code-Challenges am Ende jeden Kapitels können Sie das Erlernte sofort testen und Ihre Lösung auch gleich mit der von Ihrer Trainerin Florence Maurice angebotenen vergleichen.</p>





    ?>
</body>
</html>