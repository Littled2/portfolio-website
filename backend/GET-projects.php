<?php

header('Content-Type: application/json');

// echo file_get_contents(__DIR__ . "/../resources/test-projects.json");
// exit;

$config = json_decode(file_get_contents(__DIR__ . "/../env.json"), true);

$externalApiUrl = "{$config['projects_url']}?user={$config['user_id']}";

$options = [
    'http' => [
        'method' => 'GET',
        'header' => "Accept: application/json\r\n"
    ]
];

$context = stream_context_create($options);

$response = @file_get_contents($externalApiUrl, false, $context);

if ($response === false) {
    http_response_code(500);
    echo json_encode('Failed to fetch data from external API');
    exit;
}

echo $response;

?>