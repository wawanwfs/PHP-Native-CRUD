<?php
$host = getenv("DB_HOST") ?: "db";
$port = (int)(getenv("DB_PORT") ?: 3306);
$user = getenv("DB_USER") ?: "user";
$pass = getenv("DB_PASSWORD") ?: "userpassword";
$db = getenv("DB_NAME") ?: "crud-php-native";

mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
