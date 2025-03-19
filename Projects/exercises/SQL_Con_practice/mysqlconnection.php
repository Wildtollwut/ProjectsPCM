<?php
    //phpinfo();
    try {

        $pdo = new PDO('mysql:host=db;port=3306;dbname=mydatabase;charset=utf8mb4','myuser','mypassword');

        // Set PDO error mode to exception for better debugging
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e)
    {
        echo 'fehler: '. $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $sql = 'SELECT ID, bezeichnung, kategorie_ID FROM test';

        echo '<table>';
        foreach($pdo->query($sql) as $row) {
    ?>

            <tr>
                <td><?= $row[1]; ?></td>
                <td><?= $row[2]; ?></td>
                <td><a href="bearbeiten.php?ID<?= $row[0]; ?>">Bearbeiten</a></td>
                <td><a href="loeschen.php?ID<?= $row[0]; ?>">Loeschen</a></td>
            </tr>

    <?php
        }
        echo '</table>'; 
    ?>
    <p><a href="neu.php">Neuen Begriff eintragen</a></p>







<?php
        // exec INSERT UPDATE DELETE
/*         $sql = "INSERT INTO test
                VALUES (3, 'Ohne Moos nix los...', 2);";

        $pdo->exec($sql); */

/*         $sql = "UPDATE test SET kategorie_ID =2 WHERE ID = 1";
        $pdo->exec($sql); */


/*         $sql = 'SELECT *FROM test';
        echo'<pre>';
        foreach($pdo->query($sql) as $row) {  
            //print_r($row); 
            echo "$row[0]: $row[1] <br>";
        }
        echo'<pre>'; */

/*         $abfrage = $pdo->query('SELECT * FROM test');
        echo'<pre>';
        while ($row = $abfrage->fetch(PDO::FETCH_NUM)){
            print_r($row);
        }
        echo'<pre>'; */

/*         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        echo '<pre>';
        $row = $pdo->query('SELECT * FROM test')->fetchALL();
        print_r($row);
        echo'</pre>'; */
    
/*         echo '<pre>';
        $sql = 'SELECT kategorie_ID, bezeichnung FROM test';
        $row = $pdo->query($sql)->fetchALL(PDO::FETCH_GROUP);
        print_r($row);
        echo'</pre>'; */
        
/*         $ergebnis = $pdo->query('SELECT * FROM test');
        $anzahl = $ergebnis->rowCount();
        echo'Anzahl Datensaetze: ' . $anzahl . '<br>';
        while($row = $ergebnis->fetch()){
            echo $row['bezeichnung'] . '<br>';
        } */

/*         $sql = 'INSERT INTO test
                (ID, bezeichnung, kategorie_ID)
                VALUES (?,?,?)';
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['4', 'TGIF...', '2']);
        echo $stmt->rowCount() . ' Datensatz betroffen'; */

        //===oder===

/*         $sql = 'INSERT INTO test
                (ID, bezeichnung, kategorie_ID)
                VALUES (:ID, :bezeichnung, :kategorie_ID)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':ID' => 5,
            ':bezeichnung' => 'Bezeichnung bitte hier einfuegen...',
            'kategorie_ID'=> 1
        ]);
        echo $stmt->rowCount() . ' Datensatz betroffen'; */
        
/*         $sql = 'SELECT ID, bezeichnung, kategorie_ID
                FROM test
                WHERE kategorie_ID = :kategorie_ID';

        $stmt= $pdo->prepare($sql);
        $kat = 2;
        //per Wert
        $stmt->bindValue('kategorie_ID', $kat);
        //per Referenz
        //$stmt->bindParam('kategorie_ID', $kat);
        $kat = 2;
        $stmt->execute();
        echo '<pre>';
        while ($row = $stmt->fetch(PDO::FETCH_GROUP)) {
            print_r($row);
        }
        echo '</pre>'; */
        
/*         $id = 4;
        $sql = 'UPDATE test
                SET kategorie_ID = 2
                WHERE ID = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        $sql = 'DELETE FROM test
                WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
 */

    ?>

</body>
</html>