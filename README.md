# PHP Native CRUD - Cloudflare Tunnel Workflow

Repository ini memiliki workflow GitHub Actions untuk menjalankan aplikasi PHP dan membuka akses publik melalui Cloudflare Tunnel selama maksimal 6 jam.

## File Workflow

- `.github/workflows/cloudflare-tunnel.yml`

## Cara Menjalankan

1. Buka tab **Actions** pada repository.
2. Pilih workflow **Cloudflare Tunnel Preview**.
3. Klik **Run workflow**.
4. Lihat log langkah **Show public URL** untuk mendapatkan link `https://*.trycloudflare.com`.

## Auto Stop 6 Jam

Workflow menggunakan:

- `timeout-minutes: 360` pada job (maksimum 6 jam), dan
- `sleep 21600` (6 jam) untuk mempertahankan tunnel tetap hidup.

Setelah 6 jam, job berhenti otomatis.
