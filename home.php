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

// Proses hapus user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo "<script>
        if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
            window.location='delete.php?id=$id';
        }
    </script>";
}

// Proses Edit user
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $row = $result->fetch_assoc();
    echo "<script>
        var username = prompt('Username baru:', '$row[username]');
        var password = prompt('Password baru:');
        var status = prompt('Status baru (1: Aktif, 0: Nonaktif):', '$row[status]');
        if (username && password && status) {
            window.location='edit.php?id=$id&username=' + username + '&password=' + password + '&status=' + status;
        }
    </script>";
}

// Ambil data user
$result = $conn->query("SELECT * FROM users");
?>

<h2>Selamat datang, <?= $_SESSION['username']; ?> | <a href='logout.php'>Logout</a></h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['status'] == 1 ? "Aktif" : "Nonaktif" ?></td>
        <td>
            <a href='home.php?edit=<?= $row['id'] ?>'>Edit</a> | 
            <a href='home.php?delete=<?= $row['id'] ?>'>Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<h3>Tambah User</h3>
<form method="POST" action="register.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Status: <select name="status">
        <option value="1">Aktif</option>
        <option value="0">Nonaktif</option>
    </select><br>
    <button type="submit">Tambah</button>
</form>
