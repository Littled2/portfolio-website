<?php

if(!isset($_GET["id"]) || !isset($_GET["fileID"]) || !isset($_GET["fileType"])) {
    http_response_code(403);
    echo "No id or fileID provided";
    exit;
}


header('Content-Type: application/json');

$config = json_decode(file_get_contents(__DIR__ . "/../env.json"), true);


if(!file_exists(__DIR__ . "/../resources/images/project-images")) {
    mkdir(__DIR__ . "/../resources/images/project-images");
}

// Search for cached file
$relative_images_path = "/resources/images/project-images";
$directory = __DIR__ . "/.." . $relative_images_path;
$searchName = $_GET["fileID"];

// Scan the directory
$files = scandir($directory);

// Search for the file
$foundFile = null;
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;

    $fileNameWithoutExt = pathinfo($file, PATHINFO_FILENAME);

    if (strcasecmp($fileNameWithoutExt, $searchName) === 0) {
        $foundFile = $file;
        break;
    }
}

// Redirect if found
if ($foundFile) {
    $fileUrl = $relative_images_path . '/' . $foundFile;

    // Redirect to the file
    header('Location: ' . $fileUrl);
    exit;
}



// No cached file found, download it


$externalApiUrl = "{$config['project_image_url']}?id={$_GET['id']}&fileID={$_GET['fileID']}";

echo $externalApiUrl;

$options = [
    'http' => [
        'method' => 'GET',
        'header' => "Accept: application/json\r\n"
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($externalApiUrl, false, $context);

if ($response === false) {
    http_response_code(500);
    echo json_encode('Failed to fetch data from external API');
    exit;
}

file_put_contents($directory . "/" . $_GET["fileID"] . "." . $_GET["fileType"], $response);

// Redirect to this file
header('Location: ' . $relative_images_path . "/" . $_GET["fileID"] . "." . $_GET["fileType"]);


?>