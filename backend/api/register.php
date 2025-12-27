<?php
require __DIR__ . "/../config/db.php";


$stmt = $pdo->prepare(
  "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
);

$stmt->execute([
  $_POST['name'],
  $_POST['email'],
  password_hash($_POST['password'], PASSWORD_BCRYPT)
]);
