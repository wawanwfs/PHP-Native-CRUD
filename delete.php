<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE id='$id'");
    echo "<script>alert('User berhasil dihapus!'); window.location='home.php';</script>";
}
?>
