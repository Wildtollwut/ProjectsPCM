<?php
include "htmlhelfer.php";
htmlanfang("Formulare");

function kostenrechnung(int $stunden, int $lohn){
    $ergebnis = $stunden * $lohn;
    return $ergebnis;
}
?>


<form methode="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="stundenzahl">Stundenanzahl:</label><br>
    <input type="text" id="stundenzahl" name="stundenzahl">
    <br>
    <label for="stundenlohn">Stundenlohn:</label><br>    
    <select name="stundenlohn">
        <?php
        for ($lohn = 10; $lohn <= 100; $lohn +=5){
            echo "<option>$lohn </option>\n";
        }
        ?>
    </select><br>
    
    <input type="submit" value="Absenden">

</form>



<?php
    if(!empty($_POST["stundenzahl"]) && !empty($_POST["stundenlohn"])){

        $stundenzahl = (int) $_POST["stundenzahl"];
        $stundenlohn = (int) $_POST["stundenlohn"];

        $ergebnis = kostenrechnung($stundenzahl, $stundenlohn);
        $ergebnis = number_format($ergebnis, 2, ",", ".");
        echo "<p>Die Gesamtkosten bei $stundenzahl Stunden und einem Stundensatz von $stundensatz sind $ergebnis </p>";
    }
    htmlende();
?>