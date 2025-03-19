<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stil.css" rel="stylesheet">
</head>
<body>
    <h1>Einbindung von Klassen</h1>
    <div>
        <?php 
            require_once("Klasse1.class.php");
            require_once("Kunde.class.php");
            require_once("Konto.class.php");

            $o1 = new Kunde();
            $o2 = new Konto();
            $o1->vname="Gunther";
            $o2->einzahlen(2);
            echo $o2->kontostand;
            $o2->kontostand = 10;
            echo $o2->kontostand;


            

        ?>
    </div>
</body>
</html>