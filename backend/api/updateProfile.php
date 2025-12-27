<?php
require "../config/db.php";
require "../config/redis.php";

$userId = $redis->get("session:" . $_POST['token']);

if (!$userId) {
  exit;
}

$stmt = $pdo->prepare(
  "REPLACE INTO profiles (user_id, age, dob, contact) VALUES (?, ?, ?, ?)"
);

$stmt->execute([
  $userId,
  $_POST['age'],
  $_POST['dob'],
  $_POST['contact']
]);
