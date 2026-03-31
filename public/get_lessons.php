<?php

header('Content-Type: application/json');

$json = file_get_contents(__DIR__ . '/../app/data/lessons.json');

if (!$json) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not load lesson data']);
    exit;
}

// Pass the raw JSON straight to  frontend
echo $json;