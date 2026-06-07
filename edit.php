<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User belum login!'); window.location='index.php';</script>";
    exit();
}

if (time() - $_SESSION['start_time'] > 60) { // Timeout 1 menit
    session_destroy();
    echo "<script>alert('Waktu session sudah habis!'); window.location='index.php';</script>";
    exit();
}

include "db.php";

if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['password']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $status = $_GET['status'];

    // Update data user di database
    $sql = "UPDATE users SET username='$username', password='$password', status='$status' WHERE id='$id'";
    
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil diubah'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: {$conn->error}'); window.location='home.php';</script>";
    }
} else {
    echo "<script>alert('Data tidak lengkap!'); window.location='home.php';</script>";
}
?>