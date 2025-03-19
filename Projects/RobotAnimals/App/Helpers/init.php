<?php

try {

    $pdo = new PDO('mysql:host=db;port=3306;dbname=mydatabase;charset=utf8mb4','myuser','mypassword');

    // Set PDO error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e)
{
    echo 'fehler: '. $e->getMessage();
    die;
}

require_once('functions.php');
require_once('functions.query.php');


