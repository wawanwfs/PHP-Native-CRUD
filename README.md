# PHP Native CRUD

Aplikasi CRUD sederhana berbasis PHP native + MySQL, dengan fitur login session dan manajemen data user.

## Fitur Utama

- Login user (dengan validasi status akun aktif/nonaktif)
- Session timeout otomatis
- Tambah user
- Edit user
- Hapus user
- List semua user

## Struktur File

- `/index.php` : halaman login
- `/home.php` : dashboard dan daftar user
- `/register.php` : proses tambah user
- `/edit.php` : proses edit user
- `/delete.php` : proses hapus user
- `/logout.php` : logout session
- `/db.php` : konfigurasi koneksi database (mendukung environment variable)

## Konfigurasi Database

`db.php` mendukung environment variable berikut:

- `DB_HOST` (default: `db`)
- `DB_PORT` (default: `3306`)
- `DB_USER` (default: `user`)
- `DB_PASSWORD` (default: `userpassword`)
- `DB_NAME` (default: `crud-php-native`)

## Skema Tabel

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  status TINYINT(1) NOT NULL DEFAULT 1
);
```

## Menjalankan dengan Docker Compose

```bash
docker compose up -d --build
```

Layanan yang tersedia:

- App PHP: `http://localhost`
- phpMyAdmin: `http://localhost:8080`
- MySQL: `localhost:3306`

## Menjalankan Secara Lokal (Tanpa Docker)

1. Siapkan MySQL dan buat database `crud-php-native`.
2. Buat tabel `users` sesuai skema di atas.
3. Set environment variable koneksi database sesuai kebutuhan.
4. Jalankan server PHP:

```bash
php -S 127.0.0.1:8000
```

5. Buka `http://127.0.0.1:8000`.

## Catatan

- Password saat ini disimpan menggunakan `md5` sesuai implementasi existing.
- Workflow GitHub Actions (`.github/workflows/cloudflare-tunnel.yml`) digunakan untuk preview publik sementara via Cloudflare Tunnel.
