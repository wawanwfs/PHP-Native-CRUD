<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.location='home.php';</script>";
        exit();
    }

    $conn->query("INSERT INTO users (username, password, status) VALUES ('$username', '$password', '$status')");
    echo "<script>alert('User berhasil ditambahkan!'); window.location='home.php';</script>";
}
?>
