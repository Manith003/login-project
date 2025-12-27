<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Handle backend API routes
if (str_starts_with($path, '/backend/api/')) {
    $file = __DIR__ . '/../..' . $path;

    if (file_exists($file)) {
        require $file;
        exit;
    }

    http_response_code(404);
    echo "API Not Found";
    exit;
}

return false;
