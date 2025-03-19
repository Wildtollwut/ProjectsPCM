<?php
session_start();

$isLoggedIn = isset($_SESSION['login']);

require_once('constants.php');

try {

    $pdo = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4",
    DB_USERNAME,
    DB_PASSWORD
);

    // Set PDO error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo 'Fehler: '. $e->getMessage();
    die;
}

require_once('functions.php');
require_once('functions.query.php');


