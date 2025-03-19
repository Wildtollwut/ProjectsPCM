<?php
require_once("../Helpers/init.php");

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$message = '';

$status = false;

try {
    // returns false if email is not in DB
    // returns array if email exists in DB
    $sql_login = queryGetLogin($email);

    // check if email exists in DB
    if ($sql_login) {
        if ($sql_login['password'] !== $password) {
            $message = "Password stimmt nicht Überein";
        }
        else {
            $_SESSION['login'] = $sql_login;
            $message = "Login war erfolgreich";
            $status = true;
        }
    } else {
        $message = "Ungültige Email";
    }

} catch (Throwable $e) {
    $message = "Error: {$e->getMessage()}";

//        print_r($e->getTraceAsString());
//        redirect(getResourceUrl("loginRobot.php"));
}
if (!$status) {
    http_response_code(500);
}

echo json_encode(['data' => [
    'status' => $status,
    'message' => $message
]]);

sleep(1);
