<?php
include "htmlhelfer.php";
htmlanfang("Formulare");

if(isset($_POST["vorname"])){

echo "Vielen Dank<br>\n";
echo htmlspecialchars($_POST["vorname"]);
echo htmlspecialchars($_POST["email"]);
};

htmlende();