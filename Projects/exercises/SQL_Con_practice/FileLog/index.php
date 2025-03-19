<?php
    date_default_timezone_set('Europe/Berlin');

    $file = 'file.txt';
    $current = file_get_contents($file);
    $current = "John Smith\n";
    file_put_contents($file, $current, FILE_APPEND);
    $current1 = "Jane Doe\n";
    file_put_contents($file, $current1, FILE_APPEND);

    $current2 = gmdate("M d Y H:i:s\n");
    file_put_contents($file, $current2, FILE_APPEND);

    $heute = date("Y-m-d H:i:s");
    file_put_contents(  "$file", $heute, FILE_APPEND);



    $file2 = 'file2.txt';
    $content = "Add this to the file\n";

    $fp = fopen($file2,"a");



    fwrite($fp, $content);




    
    fclose($fp);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>