<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require __DIR__ . "/../config/db.php";


$stmt = $pdo->prepare(
  "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
);

$stmt->execute([
  $_POST['name'],
  $_POST['email'],
  password_hash($_POST['password'], PASSWORD_BCRYPT)
]);

echo json_encode(["status" => "success"]);
exit;
?>
