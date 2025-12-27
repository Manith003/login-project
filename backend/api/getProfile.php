<?php
require "../config/db.php";
require "../config/redis.php";

$token = $_GET['token'];
$userId = $redis->get("session:$token");

if (!$userId) {
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM profiles WHERE user_id = ?");
$stmt->execute([$userId]);

echo json_encode($stmt->fetch());
