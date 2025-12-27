<?php
require __DIR__ . "/../../vendor/autoload.php";

$mongoClient = new MongoDB\Client("mongodb://10.202.43.40:27017"); 

$mongoDB = $mongoClient->guvi_project;
$loginLogs = $mongoDB->login_logs;
?>