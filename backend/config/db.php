<?php
try {
    $host = getenv('DB_HOST');
    $db   = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    $port = getenv('DB_PORT') ?: 3306;

    if (!$host || !$db || !$user) {
        throw new Exception("Database ENV variables missing");
    }

    $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 5
        ]
    );
} catch (Throwable $e) {
    error_log("MYSQL ERROR: " . $e->getMessage());
    http_response_code(500);
    echo "MySQL connection failed";
    exit;
}
