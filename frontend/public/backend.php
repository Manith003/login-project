<?php

$path = $_SERVER['REQUEST_URI'];

$path = strtok($path, '?');

if (str_starts_with($path, '/backend/api/')) {
    $file = __DIR__ . '/../..' . $path;

    if (file_exists($file)) {
        require $file;
        exit;
    }
}

http_response_code(404);
echo "Not Found";
