<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $host = htmlspecialchars($_SERVER['HTTP_HOST']);
    $uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])),"/\\");
    $extra = 'mysqlconnection.php';

    if (empty($_POST['ID'])){
?>  
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="ID">ID</label><br>
        <input type="text" name="ID" id="ID" maxlength="25"><br>

        <label for="bezeichnung">Text</label><br>        
        <textarea name="bezeichnung" id="bezeichnung" rows="5" cols="30"></textarea><br>

        <input type="submit" value="Eintragen">
    </form>
</body>
</html>

<?php 

} else {
    try {
        $pdo = new PDO('mysql:host=db;port=3306;dbname=mydatabase;charset=utf8mb4','myuser','mypassword');
        $title = $_POST["ID"];
        $text = $_POST["bezeichnung"];
        $sql = 'INSERT INTO test (ID, bezeichnung)
                VALUES (?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $text]);
        
        header("Location: http://$host$uri/$extra");

    }catch ( PDOException $e ) {
        echo '';
    }
}

    
?>
    
