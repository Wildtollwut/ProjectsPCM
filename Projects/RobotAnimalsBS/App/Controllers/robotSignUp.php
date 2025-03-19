<?php
require_once("../Helpers/init.php");

$userInput = $_POST;
$username = $_POST["username"] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password2 = $_POST['password2'] ?? null;
$messages = [];
$sql_signUp= '';
$userData = getUserAttributesFromPOST($userInput);
$status = false;
//dd([$userData, $userInput]);
//dd([$email, $_POST]);
try {
    // returns false if email is not in DB
    // returns array if email exists in DB
    $sql_checkMail = queryGetLogin($email);
    $sql_checkUsername = queryCheckUsername($username);
//    dd($sql_checkMail);

    // check if email already exists in DB
    if ($sql_checkMail) {
        $messages[] = "Diese E-Mail ist bereits vergeben.";
    }
    // check if Username already exists in DB
    if($sql_checkUsername) {
        $messages[] = "Dieser Benutzername ist bereits vergeben.";
    }
    // check if the passwords match
    if ($password !== $password2) {
        $messages[] = "Passwörter müssen übereinstimmen";
    }
    //dd($messages);
    // save user in DB
    if (empty($messages)) {
        $sql_signUp = queryInsertUser($userData);
        $messages[] = "Registrierung war erfolgreich";
        $status = true;
//        dd($sql_signUp);
    }
} catch (Throwable $e) {
    $message = "Error: Fehler bei der Registrierung {$e->getMessage()}";

//        print_r($e->getTraceAsString());
//        redirect(getResourceUrl("loginRobot.php"));
}

if ($status) {
    $_SESSION['login'] = $userData;
}
else {
    http_response_code(500);
}

echo json_encode(['data' => [
    'status' => $status,
    'message' => $messages,
]]);

sleep(1);