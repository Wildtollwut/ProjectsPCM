<?php
include "htmlhelfer.php";
htmlanfang("Formulare");
?>



<form methode="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" encrypt="multipart/form-data">
    <p>
        <label for="vorname">Vorname</label>
        <input type="text" name="vorname" id="vorname">
    </p>
    <p>
        <label for="email">E-Mail</label>
        <input type="email" name="email" id="email">
    </p>
    <input type="submit">
    <br>
    <br>
    <input type="radio" name="anrede" value="Frau"><label for="Frau">Frau</label>
    <br>
    <label for="nachname">Nachname</label><br>
    <input type="text" name="nachname" id="nachname" sitze="20" maxlength="30"><br>

    <label name="thema"> Themen: </lable><br>
    <select name="thema" id="thema">
        <option value="HTML">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JavaScript">JavaScript</option>
        <option value="PHP">PHP</option>
    </select><br>

    <label for="kommentar">Kommentar:</label> <br>
    <textarea name="kommentar" id="kommentar" rows="3" cols="20"></textarea> <br>
    <input type="submit" value="Abschicken">


    Datei: <br>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">


</form>

<?php
    if (isset($_FILES["datei"])) {
        foreach($_FILES["datei"] as $k => $v){
            echo "$k: $v <br>\n";
        }
    }
    htmlende();
?>