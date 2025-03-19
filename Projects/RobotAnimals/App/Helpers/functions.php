<?php
/**
 * link to another url
 * 
 * @param string $link
 * @param string $text
 * @return void
 */
function getRoot($link, $text){
    echo "<br><a href='{$link}'>{$text}</a>";
}
function getRootID($link, $text, $id, $robotID){
    echo "<br><a href='{$link}' class='{$id}' data-id='{$robotID}'>{$text}</a>";
}

/**
 * Returns the root filesystem path of your project.
 *
 * Since this file is located in "App/Helpers", we go up two levels
 * to reach the project root (i.e. /var/www/html/Projects/RobotAnimals).
 */
function getRootPath() {
    return dirname(__DIR__, 2);
}

function getStoragePath() {
    return getRootPath() . DIRECTORY_SEPARATOR . "Storage";
}

function getUploadPath() {
    return getStoragePath() . DIRECTORY_SEPARATOR . "uploads";
}

/**
 * Returns the root URL of your project.
 *
 * This function builds the URL based on the current script's location.
 * It assumes the URL includes directories from the document root (e.g.
 * "/Projects/RobotAnimals/") and that the project root is the portion
 * preceding the "App" directory.
 */
function getRootUrl() {
    $protocol = $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    $domain = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    $base_dir = dirname(__DIR__ , 2);
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
    $base_url = preg_replace("!^{$doc_root}!", '', $base_dir);

    return "{$protocol}://{$domain}:{$port}{$base_url}";
}

function getStorageUrl() {
    return getRootUrl() . "/" . "Storage";
}

function getUploadUrl($file)
{
    return getStorageUrl() . "/uploads{$file}";
}

/**
 * print HTML header
 * 
 * @param string $title
 * @return void
 */
function getHeader($title){
    ?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $title ?></title>
            <link rel="stylesheet" href="../Assets/CSS/style.css?v=<?php echo time(); ?>">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        </head>
        <body>
    <?php
}

/**
 * print HTML footer
 * 
 * @return void
 */
function getFooter(){
    ?>
    </body>
    </html>
    <?php
}

/**
 * automatic redirect to another url
 * 
 * @param string $link
 * @return never
 */
function redirect($link){
    header("Location: {$link}");
    die;
}

/**
 * print vardump 
 * 
 * @param mixed $arg
 * @return void
 */
function dd($arg){
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die;
}

/**
 * fetch Attributes from $robot Array
 * 
 * @param array $robot
 * @return array{colorID: mixed, createdAt: mixed, manufacturerID: mixed, material: mixed, name: mixed, robotTypeID: mixed, serialNumber: mixed, updatedAt: mixed, x_coordinate: mixed, y_coordinate: mixed}
 */
function getAttributesFromArray($robot){
    return [
    'name' => $robot[0]['name'],
    'manufacturerID' => $robot[0]['manufacturerID'],
    'robotTypeID' => $robot[0]['type'],
    'serialNumber' => $robot[0]['serialNumber'],
    'createdAt' => $robot[0]["createdAt"],
    'updatedAt' => $robot[0]["updatedAt"],
    'x_coordinate' => $robot[0]['x_coordinate'],
    'y_coordinate' => $robot[0]['y_coordinate'],
    'colorID' => $robot[0]['color'],
    'material' => $robot[0]['material'],
    'specie' => $robot[0]['specie'],
    'noise' => $robot[0]['noise'],
    'leaf' => $robot[0]['leaf'],
    'img_path' => $robot[0]['img_path'],
    ];
}

/**
 * fetch Attributes from $_POST Array
 * 
 * @param mixed $robot
 * @return array{color: mixed, manufacturerID: mixed, material: mixed, name: mixed, robotType: mixed, serialNumber: mixed, x_coordinate: mixed, y_coordinate: mixed}
 */
function getAttributesFromPOST($robot){
    return [
        'manufacturerID' => $robot['manufacturerID'] ?? null,
        'name' => $robot['name'],
        'robotType' => $robot['robotType'],
        'serialNumber' => $robot['serialNumber'],
        'createdAt' => $robot['createdAt'],
        'updatedAt' => $robot['updatedAt'],
        'x_coordinate' => $robot['x_coordinate'],
        'y_coordinate' => $robot['y_coordinate'],
        'color' => $robot['color'],
        'material' => $robot['material'],
        'specie' => $robot['specie'],
        'noise' => $robot['noise'],
        'leaf' => $robot['leaf'],
        'img_path' => $robot['img_path'],
    ];
}


/**
 *
 * @param string $completeDirPath
 * @param string $imgName
 * @return string
 */
function checkIfPathDirectoryExists(string $completeDirPath, string $imgName): string
{
// check if path directory exists
    if (!file_exists($completeDirPath)) {
        // create new directory or file
        mkdir($completeDirPath, 0777, true);

    } else {
        // deletes existing files
        // It's a directory, so iterate through contents
        $items = scandir($completeDirPath);
        foreach ($items as $item) {
            // skip the pointers to current and parent directory
            if ($item === '.' || $item === '..') {
                continue;
            }
            $filePath = $completeDirPath . DIRECTORY_SEPARATOR . $item;

            // is_file checks if its a file
            // unlink deletes files
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }
    }

    // the final path to save in DB, saves a combo of both variables
    $uploadFile = $completeDirPath . $imgName;

    return $uploadFile;
}

/**
 * Delete Img Folder if Robot is deleted
 * @param $dir
 * @return bool
 */
function deleteImgDirectory($dir) {

    if (!file_exists($dir)) {
        // nothing found to delete
        return true;
    }

    // Delete all files in the directory
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $filePath = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_file($filePath)) {
            unlink($filePath);
        } elseif (is_dir($filePath)) {
            deleteImgDirectory($filePath);
        }
    }
    // Now delete the directory itself
    return rmdir($dir);
}
