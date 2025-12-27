<?php
try {
    $host = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
    $db   = $_ENV['DB_NAME'] ?? getenv('DB_NAME');
    $user = $_ENV['DB_USER'] ?? getenv('DB_USER');
    $pass = $_ENV['DB_PASS'] ?? getenv('DB_PASS');
    $port = $_ENV['DB_PORT'] ?? getenv('DB_PORT');

    if (!$host || !$db || !$user || !$port) {
        throw new Exception("ENV variables missing");
    }

    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 5
        ]
    );
} catch (Throwable $e) {
    error_log("DB ERROR: " . $e->getMessage());
    http_response_code(500);
    die("MySQL connection failed");
}
