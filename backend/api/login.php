<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

require __DIR__ . "/../config/db.php";
require __DIR__ . "/../config/redis.php";
require __DIR__ . "/../config/mongo.php";


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
  echo json_encode(["error" => "Email or password missing"]);
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo json_encode(["error" => "User not found"]);
  exit;
}

if (!password_verify($password, $user['password'])) {
  echo json_encode(["error" => "Invalid password"]);
  exit;
}

$token = bin2hex(random_bytes(16));

$redis->set("session:$token", $user['id'], 3600);

$loginLogs->insertOne([
  "user_id" => $user['id'],
  "email" => $user['email'],
  "ip" => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
  "user_agent" => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
  "login_time" => new MongoDB\BSON\UTCDateTime()
]);


echo json_encode(["token" => $token]);
?>
