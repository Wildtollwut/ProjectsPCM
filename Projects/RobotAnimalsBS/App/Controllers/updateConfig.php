<?php
require_once("../Helpers/init.php");

// Errors via $_SESSION[errors]

// Path to constants file
$constantsFile = getRootPath() . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR . 'constants.php';
$errors = [];


if (isset($_POST['DB_HOST'])) {
    try {

        if (empty($_POST['DB_HOST'])) {
            $errors[] = "Hostnamen";
        }
        if (empty($_POST['DB_PORT'])) {
            $errors[] = "Port";
        }
        if (empty($_POST['DB_USERNAME'])) {
            $errors[] = "Benutzername";
        }
        if (empty($_POST['DB_PASSWORD'])) {
            $errors[] = "Passwort";
        }
        if (empty($_POST['DB_NAME'])) {
            $errors[] = "Datenbankname";
        }

        //dd($errors);
        if (!empty($errors)) {
            $_SESSION['error_message'] = '<p>Folgende Angaben fehlen: || </p>' . implode(" || ", $errors);
            //dd($_SESSION['error_message']);
            redirect(getResourceUrl("settings.php"));
        }


        // Read the current file contents
        $fileContents = file_get_contents($constantsFile);

        // Get new settings (from a form, for example)
        $newHost = $_POST['DB_HOST'];
        $newPort = $_POST['DB_PORT'] ?? null;
        $newUsername = $_POST['DB_USERNAME'] ?? null;
        $newPassword = $_POST['DB_PASSWORD'] ?? null;
        $newName = $_POST['DB_NAME'] ?? null;
        try {

            $pdo = new PDO("mysql:host=" .
                $_POST['DB_HOST'] . ";port=" .
                $_POST['DB_PORT'] . ";dbname=" .
                $_POST['DB_NAME'] .
                ";charset=utf8mb4",
                $_POST['DB_USERNAME'],
                $_POST['DB_PASSWORD']
            );

            // Set PDO error mode to exception for better debugging
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $_SESSION['error_message'] = 'Datenbank nicht gefunden! Bitte überprüfen Sie die Einstellungen.';
            redirect(getResourceUrl("settings.php"));
        }
        // Read the current file contents
        $fileContents = file_get_contents($constantsFile);


        // Update constants dynamically
        $fileContents = preg_replace("/define\('DB_HOST', '.*?'\);/", "define('DB_HOST', '$newHost');", $fileContents);
        $fileContents = preg_replace("/define\('DB_PORT', '.*?'\);/", "define('DB_PORT', '$newPort');", $fileContents);
        $fileContents = preg_replace("/define\('DB_USERNAME', '.*?'\);/", "define('DB_USERNAME', '$newUsername');", $fileContents);
        $fileContents = preg_replace("/define\('DB_PASSWORD', '.*?'\);/", "define('DB_PASSWORD', '$newPassword');", $fileContents);
        $fileContents = preg_replace("/define\('DB_NAME', '.*?'\);/", "define('DB_NAME', '$newName');", $fileContents);

        //dd($fileContents);


        // Write back to the file
        if (file_put_contents($constantsFile, $fileContents)) {
            $_SESSION['success_message'] = "Datenbank einstellungen erfolgreich aktualisiert!";

        } else {
            $_SESSION['error_message'] = 'Error: ' . implode(" || ", $errors);
        }

        redirect(getResourceUrl("settings.php"));


    } catch (Exception $e) {
        $_SESSION['error_message'] = implode(" || ", $errors);
        redirect(getResourceUrl("settings.php"));
    }

}


