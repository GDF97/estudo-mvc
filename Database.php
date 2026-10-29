<?php

require_once __DIR__ . "/app/config/LoadEnv.php";

$envPath = __DIR__ . "/.env";

loadEnv($envPath);

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$db_name = getenv('DB_NAME');
$pw = getenv('DB_PASS');

try {
    $dns = "mysql:host=$host;dbname=$db_name";
    $pdo = new PDO($dns, $user, $pw);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>

<?php
