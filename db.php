<?php
$host = getenv("DB_HOST") ?: "db";
$port = (int)(getenv("DB_PORT") ?: 3306);
$user = getenv("DB_USER") ?: "user";
$pass = getenv("DB_PASSWORD") ?: "userpassword";
$db = getenv("DB_NAME") ?: "crud-php-native";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db, $port);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
