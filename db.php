<?php
$host = "db";
$user = "user";
$pass = "userpassword";
$db = "crud-php-native";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
