<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> table td{
        border: 1px solid burlywood;
        padding: 0.4rem;
        text-align: right;
    }
    table tr:nth-child(2n){
        background-color: cornsilk;
    }
    </style>
</head>
<body>

    <table>
        <?php
        
        for($zahl1 = 1; $zahl1 <=10; $zahl1++){
            echo "<tr>\n";
            for($zahl2 = 1; $zahl2 <=10; $zahl2++){
                $erg = $zahl1 * $zahl2;
                echo "<td>$erg</td>\n";
            }
            echo "</tr>\n";
        }
        ?>
    </table>




</body>
</html>