<?php
require __DIR__ . "/../../vendor/autoload.php";

$mongoClient = new MongoDB\Client($_ENV['MONGO_URI']);
$mongoDB = $mongoClient->guvi_project;
$loginLogs = $mongoDB->login_logs;
